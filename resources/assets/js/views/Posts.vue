<template>
	<div>
		<post v-for="post in posts" :initialPost="post" :key="post.id">
			<div slot="title">
				<h1>
					<router-link :to="blogUrlPathforPost(post)" append>
						{{ post.title }}
					</router-link>
				</h1>
			</div>
			<div slot="body">
				<div class="cover-post-body">
					<router-link :to="blogUrlPathforPost(post)" append>
						<vue-markdown :source="post.body"></vue-markdown>
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
	},
	methods: {
		blogUrlPathforPost(post) {
			const dateTime = post.created_at
			const title = post.title

			return `${moment(dateTime).format('YYYY')}/` +
			`${moment(dateTime).format('MM')}/${moment(dateTime).format('DD')}/${_.kebabCase(title)}`
		}
	}
}
</script>
