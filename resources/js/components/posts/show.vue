<template>
    <div class="card">
        <div class="card-header">
            {{ post.title }}
        </div>
        <div class="card-body">
            {{ post.body }}
        </div>
        <div class="card-footer">
            Posted by: {{ post.author.name }} at {{ post.created_at }}
        </div>
    </div>
</template>
<script>
export default {
    props: ["post"]
};
</script>
