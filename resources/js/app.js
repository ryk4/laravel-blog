require('./bootstrap');

import { createApp } from 'vue';

import BlogCreateEditor from './components/Blog/BlogCreateEditor';

createApp({
    components: {
        BlogCreateEditor
    }
}).mount('#app')
