<template>
    <div class="container">
        <b-row>
            <b-col cols="9">
                <b-row class="my-3" v-for="movie in movies" :key="movie.id">
                    <b-col class="col-xs-3">
                        <img :src="`${imageUrl}${imageSizeSmall}${movie.poster_path}`" alt="">
                    </b-col>
                    <b-col>
                        <p class="ml-2 my-0 text-left">{{ movie.title }}</p>
                        <p class="ml-2 my-0 text-left text-white-50">{{ movie.year }}</p>
                        <p class="ml-2 my-0 text-left text-white-50">{{ movie.overview }}</p>
                    </b-col>
                    <hr/>
        {{ movie }}
                </b-row>
            </b-col>

            <b-col cols="3">
                <b-list-group class="sticky-top">
                    <b-list-group-item class="text-black-50">1 item</b-list-group-item>
                </b-list-group>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: 'MovieSearch',
        data() {
            return {
                imageSizeLarge: '/w500',
                imageSizeMedium: '/w342',
                imageSizeSmall: '/w185',
                imageSizeXSmall: '/w92'
            }
        },
        props: {
            movies: {
                type: Array,
                required: true
            },
            genres: {
                type: Array,
                required: true
            },
            imageUrl: {
                type: String
            }
        }
    }
</script>
