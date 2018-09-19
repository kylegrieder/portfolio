<template>
	<div>
		<post v-for="post in posts" :initialPost="post" :key="post.id">
			<div slot="title">
				<h1>
					<a :href="'/blog/' + post.id">
						{{ post.title }}
					</a>
				</h1>
			</div>
			<div class="timestamp">
				<template slot="timestamp">
				</template>
			</div>
			<div slot="body">
				<div class="cover-post-body">
					<a :href="'/blog/' + post.id">
						{{ post.body }}
					</a>
				</div>
			</div>
		</post>
	</div>
</template>

<script>
import {mapState, mapGetters} from 'vuex'
import store from '../store.js'
export default {
	data() {
		return {}
	},
	computed: {
		...mapState({
			posts: state => state.posts
		})
	},
	methods: {
		...mapGetters([
			'getPosts'
		])
	},
	mounted() {
		this.getPosts()
	}
}
</script>