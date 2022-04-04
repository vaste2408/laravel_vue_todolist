require('./bootstrap');

//require('alpinejs');

import { createApp } from 'vue';
import router from './router'

import Index from './App.vue';

createApp({
    components: {
        Index
    }
}).use(router).mount('#app')
