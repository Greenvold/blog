<template>
    <div v-if="!loading">
        <div class="card mt-2 px-5 py-2">
            <div class="my-2 w-full">
                <label for="comment">New Comment</label>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                v-model="name"
                            />
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                v-model="email"
                            />
                        </div>
                    </div>
                </div>
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
        loading: false,
        email: "",
        name: "",
        reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
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
            if (!this.newComment || !this.name || !this.email) {
                this.$noty.warning("Please fill in all the fields.");
                return;
            }
            if (!this.reg.test(this.email)) {
                this.$noty.warning("Please enter proper email address!");
                return;
            }
            const formData = new FormData();
            formData.append("name", this.name);
            formData.append("email", this.email);
            formData.append("body", this.newComment);
            formData.append("post_id", this.entity_id);
            Axios.post(`/comment`, formData).then(({ data }) => {
                this.comments = {
                    ...this.comments,
                    data: [data, ...this.comments.data]
                };
                this.newComment = "";
                this.name = "";
                this.email = "";
                this.$noty.success("Comment created successfully!");
            });
        }
    }
};
</script>
