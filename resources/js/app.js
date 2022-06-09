require('./bootstrap');

import { createApp } from 'vue';

import BlogCreateEditor from './components/blog/BlogCreateEditor';

createApp({
    components: {
        BlogCreateEditor
    }
}).mount('#app')
