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
        path: '/photos',
        component: require('./views/Photos.vue')
    },
    {
        path:'/blog/{id}',
        component: require('./components/Photo.vue')
    }
]

export default new VueRouter({
	routes
})