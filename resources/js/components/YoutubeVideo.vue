<template>

    <div class="youtube-player" :id="'div_player_' + divId" :class="show ? 'visible' : ''">
        <div :id="'player_' + divId"></div>
    </div>

</template>

<script>

    export default {

        props: ['videoId', 'autoplay', 'options', 'pause'],

        data: function() {
            return {
                player: {},
                show: false,
                parentWidth: 0,
                padding: 10,
            }
        },

        watch: {

            ready() {
                this.loadVideo(); 
            },

            screen() {
                if (this.id) {
                    this.resize();
                }
            },

            id() {
                this.cueVideo();
            },

			pause() {
				if (this.pause) {
					if (this.$lodash.isFunction(this.player.pauseVideo)) {
						this.player.pauseVideo();
					}
				}
			}

        },

        computed: {

            ready() {
                return this.$store.state.youtubeReady;
            },

            screen() {
                return this.$store.state.screen;
            },

            id() {
                return this.options ? this.options.videoId : this.videoId;
            },

            playerWidth() {
                return this.parentWidth > 360 ? this.parentWidth : 360;
            },

            divId() {
                return Math.random().toString(36).slice(2);
            }


        },

        mounted() {

            document.addEventListener("keyup", key => {
                if (key.keyCode == 27) {
                    this.$emit('ended');
                }
            });

            if (this.ready) {
                this.loadVideo();
            }

        },

        methods: {

            loadVideo: function() {

                var vue = this;

                if (this.id) {

                    this.player = new YT.Player('player_' + this.divId, {
                        videoId: this.id,
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

                }

            },

            cueVideo: function() {

                if (this.$lodash.isFunction(this.player.loadVideoById)) {
                    //this.hide();
                    this.player.loadVideoById(this.id);
                } else {
                    this.loadVideo();
                }
            
            },

            showPlayer: function() {

                this.setParentWidth();

                if (this.player.getIframe().parentElement.animate) {
                    this.player.getIframe().parentElement.animate([
                        {
                            width: '0',
                            height: '0'
                        },
                        {
                            width: this.playerWidth + 'px',
                            height: '0'
                        },
                        {
                            width: this.playerWidth + 'px',
                            height: 'calc((' + this.playerWidth + 'px * 9) / 16)'
                        }

                    ], 1000
                    );
                }

                this.resize();
                this.show = true;

            },

            hide: function() {
                
                this.player.getIframe().parentElement.animate([
                    {
                        width: this.playerWidth + 'px',
                        height: 'calc((' + this.playerWidth + 'px * 9) / 16)'
                    },
                    {
                        width: this.playerWidth + 'px',
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
               
                var div = document.getElementById('div_player_' + this.divId);
                div.style.opacity = 1;

                //this.player.setVolume(20);
                this.showPlayer();

                if (this.autoplay) {
                    setTimeout( () => {
                        this.player.playVideo();
                    }, 2000);
                }

            },


            resize: function() {

                this.setParentWidth();

                this.player.getIframe().style.width = this.playerWidth + 'px';
                this.player.getIframe().style.height = 'calc((' + this.playerWidth + 'px * 9) / 16)';
            
                this.player.getIframe().parentElement.style.width = this.playerWidth + 'px';
                this.player.getIframe().parentElement.style.height = 'calc((' + this.playerWidth + 'px * 9) / 16)';

            },

            setParentWidth: function() {
                this.parentWidth = this.player.getIframe().parentElement.parentElement.clientWidth - (this.padding * 2);
            },

            onPlayerStateChange: function(event) {

                if (event.data == YT.PlayerState.ENDED) {
                    //this.hide();
					this.$emit('ended');
                }

            },

        
        }

    }

</script>
