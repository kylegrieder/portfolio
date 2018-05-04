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
import store from '../store.js'
export default {
	props: [
		'initialPost', 
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
			post: this.initialPost
		}
	},

	created() {
	},

	mounted() {
		var id = _.last( window.location.pathname.split('/'));
    	axios.get('/post/' + id).then( response => {
    		if (this.initialPost) {
    			this.post = this.initialPost
    		} else {
				this.post = _.first(response.data)
    		}
		});
	}
}
</script>