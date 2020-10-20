import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"
import moment from 'moment'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
        photos: [],
        posts: []
    },
    getters: {
        getPhotos(state) {
            return state.photos
        },
        getPosts(state) {
            return state.posts
        }
    },
    actions: {
        retrievePhotos: ({commit}) => {
            axios.get('/api/photos').then(({data}) => {
                commit('setPhotos', data)
            })
        },
        retrievePosts: ({commit}) => {
            axios.get('/api/posts').then(({data}) => {
                commit('setPosts', data)
            })
        },
    },
    mutations: {
        setPhotos(state, photos) {
            state.photos = photos
        },
        setPosts(state, posts) {
            state.posts = posts
        }
    }
})
