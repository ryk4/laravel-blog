<template>
    <div v-if="dataLoaded" v-for="comment in this.comments" class="col-md-9 mb-3">
        <div class="comment-section">
            <div class="row">
                <div class="col-md-1">
                    <div class="vote-area text-center py-2">
                        <div><a href="#" class="vote-link">+</a></div>
                        <div><b>{{ comment.votes }}</b></div>
                        <div><a href="#" class="vote-link">-</a></div>
                    </div>
                </div>
                <div class="col-md-10  vote-text">
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
                    <input class="form-control form-control-custom" id="title" name="title">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="title">Email address *</label>
                    <input class="form-control form-control-custom" id="title" name="title">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="title">Website</label>
                    <input class="form-control form-control-custom" id="title" name="title">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-9">
                    <textarea class="form-control form-control-custom" id="title" name="title" rows="3"></textarea>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-custom-neutral w-100 h-100">Comment</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogShowComment",
    props: ['blog'],
    data() {
        return {
            dataLoaded: false,
            comments: [],
        }
    },
    methods: {
        getComments() {
            axios.get(`/api/blogs/${this.blog}/comments`).then(res => {
                this.comments = res.data.data;
                this.dataLoaded = true;
            });
        }
    },
    mounted() {
        this.getComments();
    },
    created() {
    }
}
</script>

<style scoped>

</style>
