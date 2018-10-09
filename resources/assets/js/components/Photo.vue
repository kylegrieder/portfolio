<template>
	<div class="card">
		<div :class="photo.orientation">
			<!-- <a v-html="image().outerHTML"></a> -->
			<a>
				{{ image() }}
			</a>
		</div>
		<div v-if="photo.description">
			<p class="card-text">{{ photo.description }}</p>
		</div>
	</div>
</template>

<script>
export default {
	props: [
		'photo'
	],
	methods: {
		image() {
			return loadImage(this.photo.url, function(img, meta) {
				if (img.type == 'error') {
					console.log('Error loading image: ' + this.photo.url)
				}
				console.log(img)
				// console.log('orientation', meta.exif.get('Orientation'))
				return img
			},
				{orientation: true}
			)
		}
	}
}
</script>