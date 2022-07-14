import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

// import {createApp} from 'vue';


import {createPinia} from 'pinia';

const pinia = createPinia();

import BlogCreateEditor from './components/blog/BlogCreateEditor.vue';
import BlogCreateSelect2 from './components/blog/BlogCreateSelect2.vue';
import BlogShowComment from './components/blog/BlogShowComment.vue';

//Helper components
import LargeTextPopover from "./components/helpers/LargeTextPopover.vue";

createApp({
    components: {
        BlogCreateEditor,
        BlogCreateSelect2,
        BlogShowComment,
        LargeTextPopover,
    }
}).use(pinia).mount('#app')

