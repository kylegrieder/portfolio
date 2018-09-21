<template>
	<div>
		<slot name="title">
			<div class="blog-post-title">
				<h1>
					{{ this.post.title }}
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
				{{ this.post.body }}
			</div>
		</slot>
	</div>
</template>

<script>

export default {
	props: [
		'initialPost',
	],

	data() {
		return {
		}
	},

	computed: {
		timeFormat: function() {
			let prettyTime = moment(this.post.created_at).local().fromNow();
			let uglyTime = moment(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
			return this.displayTime = this.timeFromNow ? prettyTime : uglyTime
		}
	},

	methods: {
		mouseover() {
			this.timeFromNow = !this.timeFromNow
		}
	},

	created() {
	},

	mounted() {
		if (this.initialPost) {
			this.post = this.initialPost
		} else {
			var id = _.last( window.location.pathname.split('/'));
	    	axios.get('/api/post/' + id).then( response => {
				this.post = _.first(response.data)
			});
		}
	}
}
</script>