// window objects
import Vue from 'vue'

import _ from 'lodash'
import axios from 'axios'
import jQuery from 'jquery'
import marked from 'marked'
import moment from 'moment'

const $ = jQuery
const Popper = require('@popperjs/core')

const imports = {
    _,
    $,
    axios,
    events: new Vue(),
    jQuery,
    marked,
    moment,
    Popper
}

Object.assign(window, imports)

import('bootstrap')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Vue plugins //
// Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import store from './store.js'

// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './routes.js'

// Bootstrap Vue
import {BootstrapVue, BootstrapVueIcons} from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

// date formats constants
import dateFormats from './constants/dateFormats'
window.DATE_FORMATS = dateFormats

// component registration
const requireComponent = require.context('./components', true, /\.vue$/)
requireComponent.keys().forEach((fileName) => {
    const config = requireComponent(fileName)
    const name = fileName.split('/').pop().split('.')[0]

    Vue.component(name, config.default || config)
})

const app = new Vue({
    el: '#app',
    store,
    router,
    created() {
        this.$store.dispatch('retrievePosts')
    }
});
