<template>
	<div>
		<div v-for="post in posts" :key="post.id">
			<div>
				<h1>
					<a :href="'/blog/' + post.id">
						{{ post.title }}
					</a>
				</h1>
			</div>
			<div class="timestamp" @mouseover="hover" @mouseleave="hover">
				<div v-if="timeFormat">
					{{ fromNow(post.created_at) }}
				</div>
				<div v-if="!timeFormat">
					{{ timestamp(post.created_at) }}
				</div>
			</div>
			<br>
			<div class="cover-post-body">
				<a :href="'/blog/' + post.id">
					{{ post.body }}
				</a>
			</div>
			<br>
			<br>
		</div>
	</div>
</template>

<script>
export default {
	methods: {

		fromNow(time) {
			return moment.utc(time).local().fromNow();
		},
		timestamp(time) {
			return moment.utc(time).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
		},

		hover() {
			this.timeFormat = !this.timeFormat
		}
	},

	data() {
		return {
			posts: [], 
			timeFormat: true
		}
	}, 

	mounted() {
		axios.get('/posts').then( response => {
			this.posts = response.data
			this.posts.forEach(function(post) {
				post.timeFormat = true;
			})
		})
	}
}
</script>