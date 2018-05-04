<template>
	<div>
		<slot name="title"> 
			<div class="blog-post-title">
				<h1>
					{{ post.title }}
				</h1>
			</div>
		</slot>
		<slot name="timestamp"> 
			<div class="timestamp" @mouseover="mouseover" @mouseleave="mouseover">
				{{ this.timeFormat }}
			</div>
		</slot>
		<slot name="body"> 
			<div class="blog-post-body">
				{{ post.body }}
			</div>
		</slot>
	</div>	
</template>

<script>
import store from '../store.js'
export default {
	props: [
		'post'
	],

	computed: {
		timeFormat: function() {
			let prettyTime = moment.utc(this.post.created_at).local().fromNow();
			let uglyTime = moment.utc(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
			return this.displayTime = this.timeFromNow ? prettyTime : uglyTime
		}
	},

	methods: {
		mouseover() {
			this.timeFromNow = !this.timeFromNow
		}
	},

	data() {
		return {
			timeFromNow: true,

			// post: []
		}
	},

	created() {
	},

	mounted() {
  //   	axios.get('/post/{post}').then( response => {
		// 	this.post = response.data
		// });
	}
	// computed: {
	// 	index: function() {
	// 		var index = store.posts.map(function(array) {
	// 			return array.id
	// 		}).indexOf(postId);
	// 	}
	// }
}
</script>