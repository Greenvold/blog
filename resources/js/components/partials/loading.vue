<template>
    <div class="text-center d-flex justify-content-center align-items-center">
        <div class="spinner-border" :class="color" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>
<script>
export default {
    name: "AppLoading",
    props: {
        color: {
            default: "text-primary"
        }
    }
};
</script>
