<template>
    <div v-if="dataLoaded" v-for="comment in this.comments" class="col-md-9 mb-2">
        <div class="comment-section">
            <div class="row">
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
                        <!--                        <div> Reply</div>-->
                    </div>
                    <div class="mt-2">{{ comment.comment }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="comment-section">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label" for="title">Display name *</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.name }" id="title"
                           v-model="commentCreateForm.name">
                    <div v-if="errors.name" class="invalid-feedback">
                        {{ errors.name[0] }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="email">Email address *</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.email }" id="email"
                           v-model="commentCreateForm.email">
                    <div v-if="errors.email" class="invalid-feedback">
                        {{ errors.email[0] }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="website">Website</label>
                    <input class="form-control form-control-custom" :class="{ 'is-invalid': errors.website }"
                           id="website" v-model="commentCreateForm.website">
                    <div v-if="errors.website" class="invalid-feedback">
                        {{ errors.website[0] }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-9">
                    <textarea class="form-control form-control-custom" :class="{ 'is-invalid': errors.comment }"
                              id="comment" rows="3"
                              v-model="commentCreateForm.comment"></textarea>
                    <div v-if="errors.comment" class="invalid-feedback">
                        {{ errors.comment[0] }}
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-custom-neutral w-100 h-100" @click="postComment">Comment
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BlogService from "../../Services/BlogService";

export default {
    name: "BlogShowComment",
    props: ['blog'],
    data() {
        return {
            dataLoaded: false,
            comments: [],
            commentCreateForm: {},
            errors: []
        }
    },
    methods: {
        async getComments() {

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
                this.errors = e.response.data.errors;
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
    },
    created() {
    }
}
</script>

<style scoped>

</style>
