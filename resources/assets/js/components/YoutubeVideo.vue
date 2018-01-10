<template>

    <transition name="youtube-transition">
        <div class="youtube-player" v-show="show">
            <div id="player"></div>
        </div>
    </transition>

</template>

<script>

    export default {

        props: ['videoId', 'autoplay'],

        data: function() {
            return {
                player: {},
                show: false,
                parentWidth: 0
            }
        },

        watch: {

            ready() {
                this.loadVideo(); 
            },

            screen() {
                this.resize();
            }

        },

        computed: {

            ready() {
                return this.$store.state.youtubeReady;
            },

            screen() {
                return this.$store.state.screen;
            }

        },

        mounted() {

            if (this.ready) {
                this.loadVideo();
            }

        },

        methods: {

            loadVideo: function() {

                var vue = this;
           
                this.player = new YT.Player('player', {
                    videoId: this.videoId,
                    events: {
                        'onReady': vue.onPlayerReady,
                        'onStateChange': vue.onPlayerStateChange
                    },
                    playerVars: {
                        showinfo: 0,
                        controls: 0,
                        rel: 0,
                        modestbranding: 1,
                        iv_load_policy: 3,
                        fs: 0,
                        enablejsapi: 1,
                        disablekb: 1
                    }
                });
            
            },

            onPlayerReady: function() {

                this.show = true;

                this.resize();

                if (this.autoplay) {
                    setTimeout( () => {
                        this.player.playVideo();
                    }, 2000);
                }

            },

            onPlayerStateChange: function(event) {

                if (event.data == YT.PlayerState.ENDED) {
                    this.player.getIframe().style.opacity = '0';
                    this.show = false;
                }

            },

            resize: function() {

                // this gets the container above this component
                this.parentWidth = this.player.getIframe().parentElement.parentElement.clientWidth;

                this.player.getIframe().style.width = this.parentWidth + 'px';
                this.player.getIframe().style.height = 'calc((' + this.parentWidth + 'px * 9) / 16)';
                this.player.setVolume(20);
                this.player.getIframe().style.opacity = '1';
            
            }

        
        }

    }

</script>
