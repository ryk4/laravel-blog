require('./bootstrap');

import {createApp} from 'vue';
import {createPinia} from 'pinia';

const pinia = createPinia();

import BlogCreateEditor from './components/blog/BlogCreateEditor';
import BlogCreateSelect2 from './components/blog/BlogCreateSelect2';
import BlogShowComment from './components/blog/BlogShowComment';

createApp({
    components: {
        BlogCreateEditor,
        BlogCreateSelect2,
        BlogShowComment
    }
}).use(pinia).mount('#app')
