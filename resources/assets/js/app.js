
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.Event = new Vue();

import dateFormats from './constants/dateFormats'
    window.DATE_FORMATS = dateFormats
import AutoRotate from 'vue-jpeg-auto-rotation'
    Vue.use(AutoRotate)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Posts from './components/Posts.vue'
import Post from './components/Post.vue'
import Photos from './components/Photos.vue'
import Photo from './components/Photo.vue'

const app = new Vue({
    el: '#app', 

    components: {
        Posts, 
        Post, 
        Photos, 
        Photo, 
        AutoRotate
    },

    data: {
    }
});
