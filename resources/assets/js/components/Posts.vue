<template>
	<div>
		<div v-for="post in store.posts" :key="post.id">
			<div slot="title">
				<h1>
					<a :href="'/blog/' + post.id">
						{{ post.title }}
					</a>
				</h1>
			</div>
			<div slot="timestamp">
			</div>
			<br>
			<div slot="body">
				<div class="cover-post-body">
					<a :href="'/blog/' + post.id">
						{{ post.body }}
					</a>
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
</template>

<script>
import store from '../store.js'
import Post from './Post.vue'
export default {
	components: {
		Post
	},
	data() {
		return {
			store
		}
	}, 
}
</script>