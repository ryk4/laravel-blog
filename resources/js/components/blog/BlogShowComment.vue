<template>
    <div v-if="dataLoaded" v-for="comment in this.comments" class="col-md-9 mb-2">
        <div class="comment-section">
            <div class="row py-2">
                <!--                <div class="col-md-1">-->
                <!--                    <div class="vote-area text-center py-2">-->
                <!--                        <div><a href="#" class="vote-link">+</a></div>-->
                <!--                        <div><b>{{ comment.votes }}</b></div>-->
                <!--                        <div><a href="#" class="vote-link">-</a></div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="col-md-12  vote-text">
                    <div class="d-flex justify-content-between">
                        <div><b>{{ comment.name }}</b> <span class="ms-5 text-muted ">{{ comment.created_at }}</span>
                        </div>
                        <div v-if="isAdmin">
                            <a @click="deleteComment(comment.id)" class="remove-comment">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mt-2">{{ comment.comment }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="comment-section p-2">
            <div class="row">
                <div class="col-md-4 mt-md-0 mt-3">
                    <label class="form-label" for="title">Display name *</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.name }" id="title"
                           v-model="commentCreateForm.name" placeholder="Enter display name">
                    <div v-if="errors.name" class="invalid-feedback">
                        {{ errors.name[0] }}
                    </div>
                </div>
                <div class="col-md-4 mt-md-0 mt-3">
                    <label class="form-label" for="email">Email address *</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.email }" id="email"
                           v-model="commentCreateForm.email" placeholder="Enter email">
                    <div v-if="errors.email" class="invalid-feedback">
                        {{ errors.email[0] }}
                    </div>
                </div>
                <div class="col-md-4 mt-md-0 mt-3">
                    <label class="form-label" for="website">Website</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.website }"
                           id="website" v-model="commentCreateForm.website" placeholder="www.yourwebsite.com">
                    <div v-if="errors.website" class="invalid-feedback">
                        {{ errors.website[0] }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-9">
                    <textarea class="form-control form-control-custom" :class="{ 'is-invalid': errors.comment }"
                              id="comment" rows="3"
                              v-model="commentCreateForm.comment" placeholder="Enter your comment here :)"></textarea>
                    <div v-if="errors.comment" class="invalid-feedback">
                        {{ errors.comment[0] }}
                    </div>
                </div>
                <div class="col-md-3 mt-md-0 mt-3">
                    <button type="submit" class="btn btn-custom-neutral w-100 h-100" @click="postComment">Comment
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BlogService from "../../Services/BlogService";

import {useAuthStore} from "../../store/modules/Auth";

import {createPinia} from 'pinia';

const pinia = createPinia()
const authStore = useAuthStore(pinia);

import Notification from "./../Helpers/Notification";

export default {
    name: "BlogShowComment",
    props: ['blog'],
    data() {
        return {
            dataLoaded: false,
            comments: [],
            commentCreateForm: {},
            errors: [],
        }
    },
    methods: {
        getComments() {
            BlogService.getComments(this.blog).then(res => {
                this.comments = res.data.data;
                this.dataLoaded = true;
            });
        },
        postComment() {
            let data = {
                'name': this.commentCreateForm.name,
                'email': this.commentCreateForm.email,
                'website': this.commentCreateForm.website,
                'comment': this.commentCreateForm.comment,
            }

            BlogService.postComment(data, this.blog).then(res => {
                this.resetFormFields();
                this.getComments();
            }).catch(e => {
                if (e.response.status === 429) {
                    Notification.methods.warning('Too many requests. Wait before trying again');
                }

                this.errors = e.response.data.errors;
            });
        },
        deleteComment(comment) {
            Notification.methods.confirm().then(() => {
                BlogService.deleteComment(this.blog, comment).then(res => {
                    this.getComments();
                    Notification.methods.success('Comment deleted');
                }).catch(e => {
                    this.errors = e.response.data.errors;
                });
            });
        },
        resetFormFields() {
            this.commentCreateForm.name = '';
            this.commentCreateForm.email = '';
            this.commentCreateForm.website = '';
            this.commentCreateForm.comment = '';

            this.errors = [];
        }
    },
    mounted() {
        this.resetFormFields();
        this.getComments();

        authStore.checkIfLoggedInAsAdmin();
    },
    created() {
    },
    computed: {
        isAdmin() {
            return authStore.user.is_admin;
        }
    }
}
</script>

<style scoped>
.remove-comment {
    text-decoration: none;
    color: #FF5161;
    cursor: pointer;
}
</style>
