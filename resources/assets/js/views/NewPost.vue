<template>
    <div>
        <div class="d-flex">
            <div class="p-6">
                <textarea class="w-100 h-100" v-model="post"></textarea>
            </div>
            <div class="p-6">
                <vue-markdown class="w-100 h-100" :source="post"></vue-markdown>
            </div>
        </div>
        <button class="btn btn-default" @click="submit">Submit</button>
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
