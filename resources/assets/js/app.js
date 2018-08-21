
window.Vue = require('vue')
require('vuex')
require('./bootstrap')

// new Vue instance for event emitting and listening.
window.events = new Vue()

// exif photo data
var exif = require('exif-js')
window.EXIF = exif;

// moment for date stuffs
window.moment = require('moment')
// date formats constant
import dateFormats from './constants/dateFormats'
window.DATE_FORMATS = dateFormats

// Vuex
import Store from './store.js'
const store = new Vuex.Store(Store)

import Components from './components'

const app = new Vue({
    el: '#app',
    store
});
