import Vue from 'vue'
import Vuex from 'vuex'

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