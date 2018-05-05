<template>
	<div>
		<div class="container" id='photos'>
			<div class="row">
				<div class="card" v-for="photo in store.photos">
					<div :class="photo.orientation">
						<img :src="photo.url" alt="Card image cap"/>
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
export default {
	components: {
		Photo
	},

	methods: {
	},

	data() {
		return {
			store
		}
	}, 

	mounted() {
		axios.get('/pics').then(response => {
			this.store = response.data
		})
	}
}
</script>