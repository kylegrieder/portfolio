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
            axios.get('/api/photos').then(response => {
                state.photos = response.data
            });
        },
        getPosts(state) {
            axios.get('/api/posts').then(response => {
                state.posts = response.data
            });
        }
    },
    actions: {
    },
    mutations: {
        setPhotos({state}, photos) {
            state.photos = photos
        },
        setPosts({state}, posts) {
            state.posts = posts
        }
    }
})