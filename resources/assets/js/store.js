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
        getPost: (state, getters) => (params) => {
            return getters.getPosts.find((post) => {
                return moment(post.created_at).format('YYYY') === params['year'] &&
                        moment(post.created_at).format('MM') === params['month'] &&
                        moment(post.created_at).format('DD') === params['day'] &&
                        _.kebabCase(post.title) === params['title']
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
