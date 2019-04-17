<template>
    <div class="container">
        <b-row class="my-3" v-for="movie in movies" :key="movie.id">
            <img :src="`${imageApiBaseUrl}${imageSizeXSmall}${movie.poster_path}`" alt="">
            <p>{{ movie.title }}</p>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: 'MovieSearch',
        data() {
            return {
                movies: phpvars.movies,
                genres: phpvars.genres,
                imageApiBaseUrl: phpvars.urls.tmdb.api.image,
                imageSizeLarge: '/w500',
                imageSizeMedium: '/w342',
                imageSizeSmall: '/w185',
                imageSizeXSmall: '/w92'
            }
        }
    }
</script>
