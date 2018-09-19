import VueRouter from 'vue-router'

let routes = [
	{
		path: '/',
		component: require('./views/Home.vue')
	},
	{
		path: '/blog',
		component: require('./components/Posts.vue')
	},

]

export default new VueRouter({
	routes
})