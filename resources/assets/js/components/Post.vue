<template>
	<div>
		<div name="title" class="blog-post-title">
			<h1>
				<!-- {{ this.title }} -->
			</h1>
		</div>
		<div name="timestamp" class="timestamp" @mouseover="hover" @mouseleave="hover">
			<!-- {{ this.displayTime }} -->
		</div>
		<br>
		<div name="body" class="blog-post-body">
			<!-- {{ this.body }} -->
		</div>
		<br />
		<br />
	</div>	
</template>

<script>
import store from '../store.js'
export default {
	props: [
		'postId'
	],

	methods: {
		hover() {
			this.timeFromNow = !this.timeFromNow;
		}
	},

	data() {
		return {
			id: postId,
			// title: '',
			// body: this.post.body,
			// displayTime: this.post.displayTime,
			// timeFromNow: true,
		}
	},

	// mounted() {
 //    	axios.get('/post/{post}').then( response => {
	// 		this.posts = response.data
	// 	})
	// }
	// computed: {
	// 	index: function() {
	// 		var index = store.posts.map(function(array) {
	// 			return array.id
	// 		}).indexOf(postId);
	// 	}
	// }
	
	// computed: {
	// 	displayTime: function () {
	// 		if (this.timestampFormat) {
	// 			return this.post.displayTime = moment.utc(this.post.created_at).local().fromNow();
	// 		} else {
	// 			return this.post.displayTime = moment.utc(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
	// 		}
	// 	},
	// },
}
</script>