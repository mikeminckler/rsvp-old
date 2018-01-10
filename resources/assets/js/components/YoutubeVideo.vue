<template>

    <div class="youtube-player" :class="show ? 'visible' : ''">
        <div id="player"></div>
    </div>

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

            showPlayer: function() {

                this.parentWidth = this.player.getIframe().parentElement.parentElement.clientWidth;

                this.player.getIframe().parentElement.animate([
                    {
                        width: '0',
                        height: '0'
                    },
                    {
                        width: this.parentWidth + 'px',
                        height: '0'
                    },
                    {
                        width: this.parentWidth + 'px',
                        height: 'calc((' + this.parentWidth + 'px * 9) / 16)'
                    }

                ], 1000
                );

                this.resize();
                this.show = true;

            },

            hide: function() {
                
                this.player.getIframe().parentElement.animate([
                    {
                        width: this.parentWidth + 'px',
                        height: 'calc((' + this.parentWidth + 'px * 9) / 16)'
                    },
                    {
                        width: this.parentWidth + 'px',
                        height: '0'
                    },
                    {
                        width: '0',
                        height: '0'
                    }

                ], 1000
                );

                this.player.getIframe().parentElement.style.width = '0';
                this.player.getIframe().parentElement.style.height = '0';

                this.show = false;
            },

            onPlayerReady: function() {

                this.player.setVolume(20);
                this.showPlayer();

                if (this.autoplay) {
                    setTimeout( () => {
                        this.player.playVideo();
                    }, 2000);
                }

            },


            resize: function() {

                this.parentWidth = this.player.getIframe().parentElement.parentElement.clientWidth;
                this.player.getIframe().style.width = this.parentWidth + 'px';
                this.player.getIframe().style.height = 'calc((' + this.parentWidth + 'px * 9) / 16)';
            
                this.player.getIframe().parentElement.style.width = this.parentWidth + 'px';
                this.player.getIframe().parentElement.style.height = 'calc((' + this.parentWidth + 'px * 9) / 16)';

            },

            onPlayerStateChange: function(event) {

                if (event.data == YT.PlayerState.ENDED) {
                    this.hide();
                }

            },

        
        }

    }

</script>
