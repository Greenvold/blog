<template>
    <div class="media my-3">
        <avatar :username="comment.name" class="mr-3" :size="30"></avatar>
        <div class="media-body">
            <h6 class="mt-0">{{ comment.name }}</h6>
            <small>{{ comment.body }}</small>
        </div>
    </div>
</template>

<script>
import Avatar from "vue-avatar";
import Axios from "axios";

export default {
    components: {
        Avatar
    },
    props: {
        comment: {
            required: true,
            default: () => ({})
        }
    }
};
</script>
