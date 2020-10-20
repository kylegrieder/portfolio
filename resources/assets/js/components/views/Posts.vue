<template>
    <b-container>
        <nav-header/>
        <router-link
            append
            class="post"
            :to="blogUrlPathforPost(post)"
            v-for="(post, index) in posts"
            :key="post.id"
        >
            <div :class="postClass(index)">
                <h1 class="text-orange">
                    {{ post.title }}
                </h1>
                <span class="mb-1 border-bottom border-secondary" v-html="formattedDateTime(post.created_at).italics()"/>
                <div class="blog-post text-medium" v-html="compiledMarkdown(post.body)"/>
            </div>
        </router-link>
    </b-container>
</template>

<script>
import {mapState} from 'vuex'
import {formatDateTime} from "../../helpers/utilities"

export default {
    name: 'Posts',
    data() {
        return {}
    },
    computed: {
        ...mapState({
            posts: state => state.posts
        }),
        formattedDateTime() {
            return (dateTime) => {
                return formatDateTime(dateTime, 'relative')
            }
        },
        postClass() {
            return (index) => {
                let classes = 'mt-2 pb-2'

                if (index < this.posts.length - 1) {
                    classes += ' border-bottom border-pink'
                }

                return classes
            }
        }
    },
    filters: {
        italics(value) {
            return value.italics()
        }
    },
    methods: {
        blogUrlPathforPost(post) {
            const dateTime = post.created_at
            const title = post.title

            return `${moment(dateTime).format('YYYY')}/` +
                `${moment(dateTime).format('MM')}/${moment(dateTime).format('DD')}/${_.kebabCase(title)}`
        },
        compiledMarkdown(markdown) {
            return marked(markdown, {sanitize: true})
        }
    }
}
</script>
