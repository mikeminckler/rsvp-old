<template>

    <div class="vue-page">

        <div class="flexbox">

            <div class="flex">
                <registration></registration> 
            </div>


            <div class="flex-2">


                <div class="image-block">
                    <div class="image" 
                        v-for="image in images"
                        :class="image.span ? 'grid-span-' + image.span : '' "
                    >
                        <img :src="'/images/' + image.file" class="image">
                    </div>
                </div>



            </div>

        </div>


    </div>

</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                images: [
                    {
                        file: 'kayaks.jpg',
                    },
                    {
                        file: 'patio.jpg',
                    },
                    {
                        file: 'waterfront.jpg',
                    },
                    {
                        file: 'boarding_houses.jpg',
                    },
                    {
                        file: 'gallery.jpg',
                    },
                    {
                        file: 'logo-white.jpg',
                        span: '2-1'
                    },
                    {
                        file: 'volleyball.jpg',
                    },
                    {
                        file: 'acting.jpg',
                    },
                    {
                        file: 'students.jpg',
                        span: '2-1',
                    },
                    {
                        file: 'mark.jpg',
                    },
                    {
                        file: 'smiles.jpg',
                    },
                    {
                        file: 'phantom.jpg',
                    },
                    {
                        file: 'rowing.jpg',
                    },
                    {
                        file: 'dance.jpg',
                    },
                    {
                        file: 'lesmis.jpg',
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
        
        }

    }

</script>
