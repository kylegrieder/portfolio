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
			<div class="row">
				<div class="col-lg-12">
					<div class="blog-post-body">
						{{ this.post.body }}
					</div>
				</div>
			</div>
		</slot>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	props: [
		'initialPost',
	],

	data() {
		return {
			post: {}
		}
	},

	computed: {
		timeFormat: function() {
			let prettyTime = moment(this.post.created_at).local().fromNow();
			let uglyTime = moment(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
			return this.displayTime = this.timeFromNow ? prettyTime : uglyTime
		},
		...mapGetters([
			'getPost'
		])
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
			setTimeout(() => {
				this.post = this.getPost(this.$route.params)
			}, 1)
		}
	}
}
</script>