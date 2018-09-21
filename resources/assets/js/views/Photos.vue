<template>
	<div>
		<div class="container" id='photos'>
			<div class="row">
				<photo v-for="photo in photos" :photo="photo" :key="photo.id"></photo>
			</div>
		</div>
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
			photos: state => state.photos
		})
	}
}
</script>