<template>
	<div>
		<post v-for="post in posts" :initialPost="post" :key="post.id">
			<div slot="title">
				<h1>
					<router-link :to="blogUrlPathforPost(post.created_at)" append>
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
					<router-link :to="blogUrlPathforPost(post.created_at)" append>
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
	},
	methods: {
		blogUrlPathforPost(dateTime) {
			return `${moment(dateTime).format('YYYY')}/${moment(dateTime).format('MM')}/${moment(dateTime).format('DD')}`
		}
	}
}
</script>