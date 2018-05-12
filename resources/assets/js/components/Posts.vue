<template>
	<div>
		<post v-for="post in store.posts" :initialPost="post" :key="post.id">
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
import store from '../store.js'
import Post from './Post.vue'
export default {
	components: {
		Post,
	},

	data() {
		return {
			store
		}
	}, 

	mounted() {
		axios.get('/posts').then(response => {
			store.posts = response.data
		});
	}
}
</script>