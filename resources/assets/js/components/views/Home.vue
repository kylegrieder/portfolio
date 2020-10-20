<template>
    <b-container>
        <nav-header/>
        <div>
            <b-row class="justify-content-center mb-5">
                <img class="w-50 rounded-custom" src="/images/me.jpeg"/>
            </b-row>
            <b-row class="text-large col-md-10 offset-md-1">
                <b-col cols="12" class="my-2">
                    Hi. I'm Kyle.
                </b-col>
                <b-col cols="12" class="my-2">
                    I'm a husband, dad, gamer, and software engineer.
                </b-col>
                <b-col cols="12" class="my-2">
                    Above, you'll find links to my Instagram and Twitter. There is also a link to my Github profile where the repo for this site is hosted. It's called
                    "portfolio", and it is built using Laravel and Vue. There is some other stuff there that I've worked on as well.
                </b-col>
                <b-col cols="12" class="my-2">
                    I currently work at <a href="https://clearlink.com" target="_blank" class="text-white-50">Clearlink</a> as a Senior Software
                    Engineer, using Laravel, Vue, Bootstrap, Docker, and other technologies.
                </b-col>
            </b-row>
        </div>
    </b-container>
</template>
<script>
    export default {
        name: 'Home'
    }
</script>
