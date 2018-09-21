// vue on the window
window.Vue = require('vue')
require('vuex')
require('./bootstrap')

// new Vue instance for event emitting and listening.
window.events = new Vue()

// moment for date stuffs
window.moment = require('moment')
// date formats constant
import dateFormats from './constants/dateFormats'
window.DATE_FORMATS = dateFormats

// Vuex
import store from './store.js'

// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './routes.js'

// component registration
const files = require.context('./components', true, /\.vue$/)
files.keys().forEach((key) => {

    let fileName = '';
    let path = key.replace(/(\.\/|\.vue)/g, '')

    fileName = _.last(path.split('/')) // necessary for nested folders to work.
    Vue.component(fileName, require('./components/' + path))
})

const app = new Vue({
    el: '#app',
    store,
    router,

    methods: {
        getPhotos() {
            axios.get('/api/photos').then(response => {
                store.state.photos = response.data
            })
        },
        getPosts() {
            axios.get('/api/posts').then(response => {
                store.state.posts = response.data
            })
        }
    },

    mounted() {
        this.getPhotos()
        this.getPosts()
    }
});
