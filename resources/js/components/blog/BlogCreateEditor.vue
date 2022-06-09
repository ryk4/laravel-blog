<template>
    <div class="col-md-12 my-2">
        <QuillEditor theme="snow" toolbar="essential" />
    </div>
</template>

<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components: {
        QuillEditor
    },
    name: "BlogCreateEditor"
}
</script>

<style scoped>

</style>
