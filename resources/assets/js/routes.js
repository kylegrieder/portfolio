import VueRouter from 'vue-router'

let routes = [
    {
        path: '/',
        component: require('./components/views/Home.vue').default
    },
    {
        path: '/blog',
        component: require('./components/views/Posts.vue').default
    },
    {
        path:'/blog/:year/:month/:day/:title',
        component: require('./components/views/Post.vue').default
    },
    {
        path: '/projects',
        component: require('./components/views/Projects.vue').default
    },
    {
        path: '/photos',
        component: require('./components/views/Photos.vue').default
    },
    {
        path: '/new-post',
        component: require('./components/views/NewPost.vue').default
    },
    {
        path: '*',
        component: require('./components/views/NotFound.vue').default
    }
]

export default new VueRouter({
    routes
})
