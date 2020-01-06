<template>

    <video :id="'video_' + options.name">
        <source :src="'/videos/' + options.name + '.webm'" type="video/webm">
        <source :src="'/videos/' + options.name + '.mp4'" type="video/mp4">
    </video>

</template>

<script>

export default {

    props: ['options'],

    mixins: [],

    data: function() {
        return {
        }
    },

    watch: {
    
    },

    computed: {

        controls() {
            return this.options.controls ? true : false;
        },

        autoplay() {
            return this.options.autoplay ? true : false;
        }
    
    
    },

    mounted() {

        var video = document.getElementById("video_" + this.options.name);

        if (this.controls) {
            video.setAttribute("controls","controls");
        }

        if (this.autoplay) {
            video.setAttribute("autoplay","autoplay");
        }

        video.addEventListener('ended', ()=>  {
            this.$emit('videoEnded', this.options.name);
            this.$store.dispatch('videoEnded', this.options.name);
        });
    
    },

    methods: {
    
    }

}

</script>
