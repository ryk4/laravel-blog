<template>
    <div class="col-md-12 my-2">
        <QuillEditor toolbar="essential" v-model:content="content" :options="options" contentType="html"/>
    </div>
    <input type="hidden" name="sometext" :value="content"/>
    <button @click.prevent="submit" class="mt-5">Click test</button>
</template>

<script>
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components: {
        QuillEditor
    },
    name: "BlogCreateEditor",
    data: function () {
        return {
            content: '',
            options: {
                contentType: 'html',
                placeholder: 'Compose an epic...',
                readOnly: false,
                theme: 'snow',
            }
        }
    },
    methods: {
        submit() {
            console.log('submitting');
            console.log(this.content);
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
