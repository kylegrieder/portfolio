<template>
	<div>
		<div class="container" id='photos'>
			<div class="row">
				<div class="card" v-for="photo in store.photos">
					<div :class="photo.orientation">
						<a :href="photo.url" target="_blank"><orientation-image :url="photo.url" :orientation="getOrientation(photo.url)"></orientation-image></img></a>
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
import store from '../store.js'
import Photo from './Photo.vue'
import OrientationImage from './OrientationImage.vue'

export default {
	components: {
		Photo,
		OrientationImage
	},

	methods: {
		getOrientation(imageURL) {
			var img = new Image();
			img.src = imageURL;
			EXIF.getData(img, function() {
				var orientation = EXIF.getTag(this, "Orientation")
				return orientation;
			});
		}
	},

	data() {
		return {
			store
		}
	}, 

	mounted() {
		axios.get('/pics').then(response => {
			store.photos = response.data
		});
	}
}
</script>