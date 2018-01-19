<template>

    <transition-group name="image" 
        tag="div" 
        class="image-block" 
        appear
        v-bind:css="false"
        v-on:before-enter="beforeEnter"
        v-on:enter="enter"
        v-on:leave="leave"
    >
        <div class="image" 
            v-for="(image, index) in images"
            :class="image.span ? 'grid-span-' + image.span : '' "
            :key="image.file"
            :data-index="index"
            @mouseenter="image.hover = true"
            @mouseleave="image.hover = false"
        >

            <transition name="image-info" v-if="image.info">
                <div class="image-info" v-if="image.hover">
                    <div class="info-header">{{ image.infoHeader }}</div>
                    <div class="info-text">{{ image.info }}</div>
                    <a :href="image.infoLink" target="_blank">{{ image.infoLinkText }}</a>
                </div>
            </transition>

            <transition name="image-flip" v-if="image.info">
                <img v-if="!image.hover" :src="'/images/' + image.file" class="image">
            </transition>
            <img v-else :src="'/images/' + image.file" class="image">

        </div>

    </transition-group>

</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                images: [
                    {
                        file: 'waterfront.jpg',
                        hover: false,
                    },
                    {
                        file: 'teacher.jpg',
                        hover: false,
                        span: '2-2'
                    },
                    {
                        file: 'smiles_2.jpg',
                        hover: false,
                    },
                    {
                        file: 'boarding_houses.jpg',
                        hover: false,
                    },
                    {
                        file: 'students.jpg',
                        hover: false,
                        span: '4-2',
                    },
                    {
                        file: 'logo-white.jpg',
                        hover: false,
                        infoHeader: 'Brentwood College School',
                        info: 'Learn why over 250 students from BC choose boarding at Brentwood',
                        infoLink: 'https://www.brentwood.bc.ca/about-brentwood',
                        infoLinkText: 'Learn more about Brentwood...',
                        span: 'logo-center'
                    },
                    {
                        file: 'gallery.jpg',
                        hover: false,
                    },
                    {
                        file: 'seals.jpg',
                        hover: false,
                    },
                    {
                        file: 'volleyball.jpg',
                        hover: false,
                        span: '2-2'
                    },
                    {
                        file: 'acting.jpg',
                        hover: false,
                    },
                    {
                        file: 'mark.jpg',
                        hover: false,
                    },
                    {
                        file: 'traps.jpg',
                        hover: false,
                    },
                    {
                        file: 'lesmis.jpg',
                        hover: false,
                        infoHeader: 'Musical',
                        info: 'Learn why over 250 students from BC choose boarding at Brentwood',
                        infoLink: 'https://www.brentwood.bc.ca/about-brentwood',
                        infoLinkText: 'Learn more about Brentwood...',
                        span: '2-2'
                    },
                    {
                        file: 'rowing_girls.jpg',
                        hover: false,
                    },
                    {
                        file: 'classroom.jpg',
                        hover: false,
                    },
                    {
                        file: 'crooks.jpg',
                        hover: false,
                    },
                    {
                        file: 'dance.jpg',
                        hover: false,
                        span: '2-2'
                    },
                    {
                        file: 'kayaks.jpg',
                        hover: false,
                        span: '2-2'
                    },
                    {
                        file: 'smiles.jpg',
                        hover: false,
                    },
                    {
                        file: 'patio.jpg',
                        hover: false,
                    },
                    {
                        file: 'phantom.jpg',
                        hover: false,
                    },
                    {
                        file: 'rowing.jpg',
                        hover: false,
                    },
                    {
                        file: 'dance_jump.jpg',
                        hover: false,
                    },
                    {
                        file: 'rowing_sunrise.jpg',
                        hover: false,
                        span: '2-1'
                    },
                    {
                        file: 'rugby.jpg',
                        hover: false,
                    },
                    {
                        file: 'basketball_girls.jpg',
                        hover: false,
                    },
                    {
                        file: 'campq.jpg',
                        hover: false,
                    },
                    {
                        file: 'piano.jpg',
                        hover: false,
                    },
                ]
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {
        
        },

        methods: {

            shuffle: function () {
                this.images = _.shuffle(this.images)
            },

			beforeEnter: function (el) {
				el.style.opacity = 0
			},

			enter: function (el, done) {
				var delay = Math.floor(Math.random() * (1000 - 1 + 1)) + 1;
				setTimeout(function () {
                    Velocity(
                        el,
                        { opacity: 1 },
                        { complete: done }
                    )
				}, delay)
			},

			leave: function (el, done) {
				var delay = el.dataset.index * 150
				setTimeout(function () {
                    Velocity(
                        el,
                        { opacity: 0 },
                        { complete: done }
                    )
				}, delay)
			}
        
        }

    }

</script>
