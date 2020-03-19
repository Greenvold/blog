<template>
    <div class="card">
        <div class="card-header">New blog post</div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" v-model="title" />
                <small id="titleHelp" class="form-text text-muted"
                    >Title of the post that will be shown on homepage.</small
                >
            </div>
            <div class="form-group">
                <label for="desc">Short description</label>
                <textarea
                    name="desc"
                    id="desc"
                    cols="30"
                    rows="3"
                    class="form-control"
                    v-model="desc"
                ></textarea>
                <small id="titleHelp" class="form-text text-muted"
                    >Short description will be show on the blog post home
                    page.</small
                >
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea
                    name="body"
                    id="body"
                    cols="30"
                    rows="10"
                    class="form-control"
                    v-model="body"
                ></textarea>
                <small id="titleHelp" class="form-text text-muted"
                    >Main content of your new post. This content will be shown
                    upon opening the blog post.</small
                >
            </div>
            <div class="form-group">
                <button class="btn btn-primary" @click="submit">Submit</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: "",
            desc: "",
            body: ""
        };
    },
    methods: {
        submit() {
            if (!this.title || !this.desc || !this.body) {
                this.$noty.warning(
                    "Please fill in all fields before submitting. Thank you."
                );
                return;
            }
            const formData = new FormData();
            formData.append("title", this.title);
            formData.append("desc", this.desc);
            formData.append("body", this.body);

            axios.post("/post", formData).then(() => {
                this.$noty.success("You have successfully submitted new post.");
            });
        }
    }
};
</script>
