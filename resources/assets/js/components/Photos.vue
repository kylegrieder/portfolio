<template>
	<div>
		<div class="container" id='photos'>
			<div class="row">
				<div class="card" v-for="photo in photos">
					<div :class="photo.orientation">
						<a :href="photo.url" target="_blank"><img :src="photo.url"/></a>
					</div>
					<div v-if="photo.description">
						<p class="card-text">{{ photo.description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { mapState, mapGetters } from 'vuex'

export default {
	data() {
		return {}
	},
	computed: {
		...mapState({
			photos: state => state.photos
		})
	},
	methods: {
		...mapGetters([
			'getPhotos'
		])
	},
	mounted() {
		this.getPhotos()
	}
}
</script>