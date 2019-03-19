<template>
    <div>
        <slot name="title">
            <div class="blog-post-title">
                <h1>
                    {{ this.post.title }}
                </h1>
            </div>
        </slot>
        <slot name="timestamp">
            <div class="timestamp">
                <span @mouseover="mouseover" @mouseleave="mouseover">
                    {{ this.formattedTime }}
                </span>
            </div>
        </slot>
        <slot name="body">
            <div class="row">
                <div class="col-lg-12 blog-post-body">
                    <vue-markdown :source="post.body"></vue-markdown>
                </div>
            </div>
        </slot>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    props: [
        'initialPost',
    ],

    data() {
        return {
            post: {},
            timeFromNow: true
        }
    },

    computed: {
        formattedTime: function() {
            let prettyTime = moment.utc(this.post.created_at).local().fromNow();
            let uglyTime = moment.utc(this.post.created_at).local().format(DATE_FORMATS.LOCALIZED.SHORTDATETIME);
            return this.timeFromNow ? prettyTime : uglyTime
        },
        ...mapGetters([
            'getPost'
        ])
    },

    methods: {
        mouseover() {
            this.timeFromNow = !this.timeFromNow
        }
    },

    mounted() {
        this.post = this.initialPost ? this.initialPost : this.getPost(this.$route.params)
    }
}
</script>
