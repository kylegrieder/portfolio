// vue on the window
window.Vue = require('vue')
require('vuex')
require('./bootstrap')

// image exif data handler
import * as exif from 'exif-js'

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
                this.getExif()
            })
        },
        getPosts() {
            axios.get('/api/posts').then(response => {
                store.state.posts = response.data
            })
        },
        getExif() {
            var img1 = `<img src="${store.state.photos[0].url}"/>`
            exif.getData(img1, (data) => {
                console.log(data)
                var manu = EXIF.getTag(this, "Manufacturer")
                var model = EXIF.getTag(this, "Model")
                console.log(`${manu} ${model}`)
            })
        }
    },
    created() {
        this.getPhotos()
        this.getPosts()
    }
});
