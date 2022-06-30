<template>
    <span class="invalid">{{ this.content }}</span>
</template>

<script>
export default {
    props: {
        content: String,
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>