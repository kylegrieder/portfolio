<template>
	<div>
		<slot name="title">
			<h1>
				<a :href="'/blog/' + post.id">
					{{ post.title }}
				</a>
			</h1>
		</slot>
		<slot name="timestamp" class="timestamp" @mouseover="hover" @mouseleave="hover">
			{{ post.displayTime }}
		</slot>
		<br>
		<slot name="body" class="cover-post-body">
			<a :href="'/blog/' + post.id">
				{{ post.body }}
			</a>
		</slot>
		<br />
		<br />
	</div>	
</template>

<script>
export default {
	props: [
	'post'
	],

	methods: {
		hover() {
			this.timestampFormat = !this.timestampFormat;
		}
	},

	data() {
		return {
			id: this.post.id,
			title: this.post.title,
			body: this.post.body,
			time: this.post.created_at,
		}
	},

	created() {
		Event.$on('mouseover', function() {
			hover();
		}); 
	},
	
	computed: {
		displayTime: function () {
			if (this.timestampFormat) {
				return this.post.displayTime = moment.utc(this.post.created_at).local().fromNow();
			} else {
				return this.post.displayTime = moment.utc(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
			}
		},
	},
}
</script>