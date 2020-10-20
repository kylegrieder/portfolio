<template>
    <b-container>
        <nav-header/>
        <b-row v-if="post">
            <b-col>
                <b-row>
                    <b-col>
                        <h1 class="text-orange">
                            {{ this.post.title }}
                        </h1>
                    </b-col>
                </b-row>
                <b-row class="my-2">
                    <b-col>
                        <span @mouseover="mouseover" @mouseleave="mouseover">
                            {{ this.formattedTime }}
                        </span>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <div class="text-medium" v-html="compiledMarkdown(post.body)"/>
                    </b-col>
                </b-row>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import {mapState} from 'vuex'
import {formatDateTime} from "../../helpers/utilities"
import moment from "moment"

export default {
    name: 'Post',
    data() {
        return {
            post: null,
            timeFromNow: true
        }
    },
    computed: {
        formattedTime() {
            return formatDateTime(this.post.created_at, this.timeFromNow ? 'relative' : 'absolute')
        },
        ...mapState({
            posts: (state) => state.posts
        })
    },
    methods: {
        compiledMarkdown(markdown) {
            return marked(markdown, {sanitize: true})
        },
        mouseover() {
            this.timeFromNow = !this.timeFromNow
        },
        getPost() {
            const {day, month, title, year} = this.$route.params
            this.post = this.posts.find((post) => {
                return moment(post.created_at).format('YYYY') === year &&
                    moment(post.created_at).format('MM') === month &&
                    moment(post.created_at).format('DD') === day &&
                    _.kebabCase(post.title) === title
            })
        }
    },
    watch: {
        posts() {
            this.getPost()
        }
    },
    mounted() {
        this.getPost()
    }
}
</script>
