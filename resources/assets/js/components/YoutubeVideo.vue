<template>

    <div class="youtube" :class="status">
        <div id="player"></div>
    </div>

</template>

<script>

    export default {

        props: ['videoId'],

        data: function() {
            return {
                player: {},
                status: ''
            }
        },

        watch: {

            ready() {
                this.loadVideo(); 
            }
        
        },

        computed: {
            ready() {
                return this.$store.state.youtubeReady;
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
                this.player.getIframe().style.cssText = 'width: 100vw; height: 56.25vw;';
                this.player.setVolume(20);
                    this.player.getIframe().style.opacity = '1';

                this.status = 'loaded';

                setTimeout( () => {
                    this.player.playVideo();
                }, 2000);

            },

            onPlayerStateChange: function(event) {

                if (event.data == YT.PlayerState.ENDED) {
                    this.player.getIframe().style.opacity = '0';
                    this.status = 'ended';
                }

            }
        
        }

    }

</script>
