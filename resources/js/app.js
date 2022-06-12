require('./bootstrap');

import {createApp} from 'vue';

import BlogCreateEditor from './components/blog/BlogCreateEditor';
import BlogShowGuide from './components/blog/BlogShowGuide';

createApp({
    components: {
        BlogCreateEditor,
        BlogShowGuide
    }
}).mount('#app')
