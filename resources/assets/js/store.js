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
        },
        getPost: (state, getters) => (date) => {
            return getters.getPosts.find((post) => {
                return moment(post.created_at).format('YYYY') == date['year'] && 
                        moment(post.created_at).format('MM') == date['month'] && 
                        moment(post.created_at).format('DD') == date['day']
            })
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