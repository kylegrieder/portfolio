// vue on the window
window.Vue = require('vue')
require('./bootstrap')

// new Vue instance for event emitting and listening.
window.events = new Vue()

// moment for date stuffs
window.moment = require('moment')

import {Loading, InfiniteScroll, Table, TableColumn} from 'element-ui'

Vue.use(Loading)
Vue.use(InfiniteScroll)
Vue.use(Table)
Vue.use(TableColumn)

Vue.component('wiserei', require('./components/Wiserei.vue'))

const app = new Vue({
    el: '#app'
})
