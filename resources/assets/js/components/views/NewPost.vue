<template>
    <b-container>
        <nav-header/>
        <div class="row mb-3">
            <div class="text-justify col-5">
                Post Title:
                <b-form-input v-model="title"></b-form-input>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-justify col-12">
                Post Body:
                <b-form-textarea v-model="post" rows="18"></b-form-textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-5 my-2 text-justify">
                <b-form-input placeholder="Password" v-model="password"></b-form-input>
            </div>
            <b-button class="col-auto mb-2 mt-2" variant="light" @click="submit()">Submit</b-button>
        </div>
        <div class="row">
            <b-button block v-b-toggle.markdown class="mb-2 mx-1" variant="light">Show Markdown</b-button>
        </div>
        <b-collapse id="markdown">
            <div class="row mb-2">
                <div class="col-12">
                    <div v-html="compiledMarkdown"></div>
                </div>
            </div>
        </b-collapse>
    </b-container>
</template>

<script>
    export default {
        name: 'NewPost',
        data() {
            return {
                post: '',
                title: '',
                password: ''
            }
        },
        computed: {
            compiledMarkdown() {
                return marked(this.post, { sanitize: true })
            }
        },
        methods: {
            submit() {
                axios.post('/api/newPost', {
                    postTitle: this.title,
                    postBody: this.post,
                    password: this.password
                }).then(() => {
                    if (window.confirm('Post Successfully Submitted.\nDo you want to go to "/blog"?')) {
                        window.location.href = '/#/blog'
                        window.location.reload()
                    }
                }).catch((e) => {
                    alert(`Error:${e}`)
                })
            }
        },
    }
</script>
