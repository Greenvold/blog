<template>
    <div v-if="!loading">
        <div class="card mt-2 px-5 py-2">
            <div class="my-2 w-full">
                <label for="comment">New Comment</label>
                <textarea
                    name="comment"
                    id="comment"
                    cols="30"
                    rows="2"
                    class="form-control"
                    v-model="newComment"
                ></textarea>
                <button @click="addComment" class="btn btn-sm btn-primary mt-2">
                    <small>Add new comment</small>
                </button>
            </div>
            <Comment
                v-for="comment in comments.data"
                :key="comment.id"
                :comment="comment"
            />
            <div class="text-center">
                <button
                    v-if="comments.next_page_url"
                    @click="fetchComments"
                    class="btn btn-success"
                >
                    Load More
                </button>
                <span v-else>No more comments to show :)</span>
            </div>
        </div>
    </div>
    <div v-else class="mt-3">
        <app-loading />
    </div>
</template>

<script>
import Comment from "./comment.vue";
import Axios from "axios";

export default {
    props: ["entity_id"],
    components: {
        Comment
    },
    created() {
        this.fetchComments();
    },

    data: () => ({
        comments: {
            data: []
        },
        newComment: "",
        loading: false
    }),
    methods: {
        fetchComments() {
            this.loading = true;
            const url = this.comments.next_page_url
                ? this.comments.next_page_url
                : `/comments/${this.entity_id}`;

            Axios.get(url).then(({ data }) => {
                this.comments = {
                    ...data,
                    data: [...this.comments.data, ...data.data]
                };
                this.loading = false;
            });
        },
        addComment() {
            if (!this.newComment) return;

            Axios.post(`/comments/${this.entity_id}`, {
                body: this.newComment
            }).then(({ data }) => {
                this.comments = {
                    ...this.comments,
                    data: [data, ...this.comments.data]
                };
                this.newComment = "";
                this.$noty.success(this.$t("noty_comments_success"));
            });
        }
    }
};
</script>
