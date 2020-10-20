<template>
    <b-container>
        <nav-header/>
        <div id='photos'>
            <div class="row">
                <photo v-for="photo in photos" :photo="photo" :key="photo.id"></photo>
            </div>
        </div>
    </b-container>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'Photos',
    data() {
        return {}
    },
    computed: {
        ...mapState({
            photos: state => state.photos
        })
    },
}
</script>
