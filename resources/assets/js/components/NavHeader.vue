<template>
    <div>
        <b-row class="justify-content-center mt-2">
            <a href="https://twitter.com/kylemcgriffin" target="_blank">
                <img class="svg mx-1 my-2" src="/images/twitter.svg" alt="twitter"/>
            </a>
            <a href="https://instagram.com/kgfromthemv" target="_blank">
                <img class="svg mx-2 my-2" src="/images/instagram.svg" alt="instagram"/>
            </a>
            <a href="https://github.com/kylegrieder" target="_blank">
                <img class="svg mx-1 my-2" src="/images/github.svg" alt="github"/>
            </a>
            <a href="mailto:kyle.grieder@gmail.com" target="_blank">
                <img class="svg mx-1 my-2" src="/images/envelope.svg" alt="email"/>
            </a>
        </b-row>

        <b-row class="justify-content-center">
            <router-link id="title" to="/">
                <span class="display-4 text-off-white">
                    kyle grieder
                </span>
            </router-link>
        </b-row>
        <b-row class="justify-content-center raleway-light m-4">
            <div>
                <router-link to="/blog">
                    <span class="h4 text-red">
                        blog
                    </span>
                </router-link>
                &#xFF5C
                <router-link to="/projects">
                    <span class="h4 text-red">
                        projects
                    </span>
                </router-link>
            </div>
        </b-row>
        <b-row>
            <slot/>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: 'NavHeader'
    }
</script>
