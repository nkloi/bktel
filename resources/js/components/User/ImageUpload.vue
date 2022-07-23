<template>
    <input type="file" accept="image/*" @change="onChange">
</template>

<script>
    export default {
        methods: {
            onChange(event) {
                if (! event.target.files.length) return;

                let file = event.target.files[0];

                let reader = new FileReader(); 

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;

                    this.$emit('loaded', { src, file });
                };
            }
        }
    }
</script>