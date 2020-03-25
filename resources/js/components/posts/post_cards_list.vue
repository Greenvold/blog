<template>
    <div class="row">
        <div class="col-lg-12">
            <appPostCard
                :post="post"
                v-for="post in posts.data"
                :key="post.id"
            />
        </div>
        <div class="col-lg-12 d-flex">
            <div style="margin: 0 auto;">
                <pagination
                    :data="posts"
                    @pagination-change-page="getResults"
                ></pagination>
            </div>
        </div>
    </div>
</template>
<script>
import appPostCard from "./post_card.vue";
export default {
    data() {
        return {
            posts: {}
        };
    },
    components: {
        appPostCard
    },
    mounted() {
        // Fetch initial results
        axios.get("/post").then(response => {
            this.posts = response.data;
        });
    },
    methods: {
        // Our method to GET results from a Laravel endpoint
        getResults(page = 1) {
            axios.get("/post?page=" + page).then(response => {
                this.posts = response.data;
            });
        }
    }
};
</script>
