<template>
    <div class="card my-2" @click="redirect" style="cursor:pointer;">
        <div class="card-body">
            <h5>{{ post.title }}</h5>
            <small>{{ post.desc }}</small>
        </div>
        <div class="card-footer">
            {{ post.author.name }}
        </div>
    </div>
</template>
<script>
export default {
    props: ["post"],
    methods: {
        redirect() {
            window.location = "/post/" + this.post.id;
        }
    }
};
</script>
