// vue on the window
window.Vue = require('vue')
require('./bootstrap')

// new Vue instance for event emitting and listening.
window.events = new Vue()

// moment for date stuffs
window.moment = require('moment')

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import InifiniteLoading from 'vue-infinite-loading'
Vue.use(InifiniteLoading)

// ElementUI
import {Loading, InfiniteScroll, Table, TableColumn} from 'element-ui'
import en from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

locale.use(en)

Vue.use(Loading)
Vue.use(InfiniteScroll)
Vue.use(Table)
Vue.use(TableColumn)

Vue.component('wiserei', require('./components/Wiserei.vue'))

const app = new Vue({
    el: '#app'
})
