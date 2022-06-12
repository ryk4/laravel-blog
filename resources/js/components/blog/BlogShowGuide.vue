<template>
    <div class="col-md-12 my-2">
        <QuillEditor toolbar="essential" v-model:content="content" :options="options" contentType="html"/>
    </div>
    <input type="hidden" name="guide" :value="content"/>
</template>

<script>
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

export default {
    components: {
        QuillEditor
    },
    name: "BlogShowGuide",
    props: ['guide'],
    data: function () {
        return {
            content: '',
            options: {
                contentType: 'html',
                readOnly: true,
                theme: 'bubble',
            }
        }
    },
    methods: {
        setOldValues() {
            console.log('getting initial values');
            console.log(this.guide);

            if (this.guide) {
                this.content = this.guide;
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
