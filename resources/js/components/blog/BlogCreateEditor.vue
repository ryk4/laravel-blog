<template>
    <div class="col-md-12 my-2">
        <QuillEditor toolbar="full" v-model:content="content" :options="options" contentType="html"/>
    </div>
    <input type="hidden" name="guide" :value="content"/>
</template>

<script>
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    components: {
        QuillEditor
    },
    name: "BlogCreateEditor",
    props: ['old'],
    data: function () {
        return {
            content: '',
            options: {
                contentType: 'html',
                placeholder: 'Start writing blog...',
                readOnly: false,
                theme: 'snow',
            }
        }
    },
    methods: {
        setOldValues() {
            if (this.old) {
                this.content = this.old;
            }
        }
    },
    created() {
        this.setOldValues();

    }
}
</script>

<style scoped>

</style>
