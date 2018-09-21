<template>
	<div>
		<post v-for="post in posts" :initialPost="post" :key="post.id">
			<div slot="title">
				<h1>
					<router-link :to="'/blog/' + post.id">
						{{ post.title }}
					</router-link>
				</h1>
			</div>
			<div class="timestamp">
				<template slot="timestamp">
				</template>
			</div>
			<div slot="body">
				<div class="cover-post-body">
					<router-link :to="'/blog/' + post.id">
						{{ post.body }}
					</router-link>
				</div>
			</div>
		</post>
	</div>
</template>

<script>
import { mapState } from 'vuex'

export default {
	data() {
		return {}
	},
	computed: {
		...mapState({
			posts: state => state.posts
		})
	}
}
</script>