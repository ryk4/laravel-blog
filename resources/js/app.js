require('./bootstrap');

import {createApp} from 'vue';

import BlogCreateEditor from './components/blog/BlogCreateEditor';
import BlogCreateSelect2 from './components/blog/BlogCreateSelect2';
import BlogShowGuide from './components/blog/BlogShowGuide';

createApp({
    components: {
        BlogCreateEditor,
        BlogShowGuide,
        BlogCreateSelect2
    }
}).mount('#app')
