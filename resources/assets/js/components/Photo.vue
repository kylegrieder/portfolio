<template>
	<div class="card">
		<div :class="photo.orientation">
			<a :href="photo.url" target="_blank"><img :src="photo.url"/></a>
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
	]
}
</script>