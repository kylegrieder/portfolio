<template>
    <div>
        <div class="row my-5">
            <div class="col-12">
                <b-form-textarea v-model="post"></b-form-textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <b-button block v-b-toggle.markdown class="my-1 mx-2" variant="light">Show Markdown</b-button>
            </div>
            <div class="col-2">
                <b-button class="my-1" variant="light" @click="submit">Submit</b-button>
            </div>
        </div>
        <b-collapse id="markdown">
            <div class="row my-2">
                <div class="col-12">
                    <vue-markdown class="markdown-parser" :source="post"></vue-markdown>
                </div>
            </div>
        </b-collapse>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: ''
            }
        },
        methods: {
            submit() {
                //submit stuff
            }
        }
    }
</script>
