import VueRouter from 'vue-router'

let routes = [
    {
        path: '/',
        component: require('./views/Home.vue')
    },
    {
        path: '/blog',
        component: require('./views/Posts.vue')
    },
    {
        path:'/blog/:year/:month/:day',
        component: require('./components/Post.vue')
    },
    {
        path: '/photos',
        component: require('./views/Photos.vue')
    },
    {
        path: '/new-post',
        component: require('./views/NewPost.vue')
    }
]

export default new VueRouter({
    routes
})
