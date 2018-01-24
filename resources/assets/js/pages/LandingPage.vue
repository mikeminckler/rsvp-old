<template>

    <div class="vue-page landing-page">

        <div class="content-select">
            <h2>Learn More About</h2>

            <div v-for="content in pageContent"
                :key="content.id"
                class="content-select-item"
                v-if="content.label"
                >
                    <div class="content-select-text" @click="showContent(content)"> {{ content.label }}</div>
            </div>

        </div>

        <transition-group name="grid" tag="div" class="section-grid">

            <div class="column"
                v-for="(content, index) in pageItems"
                :key="content.id"
                :class="content.span ? 'grid-span-' + content.span : '' "
            >
                <div class="component">
                    <component :is="content.component" :options="content.options"></component>
                </div>

            </div>

        </transition-group>

    </div> 

</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                pageItems: [],

                pageContent: [
                        {
                            id: 0,
                            component: 'youtube-video',
                            label: 'Boarding',
                            initial: false,
                            span: '2-2',
                            options: {
                                videoId: 'l3enBQNb8kM'
                            }
                        },
                        {
                            id: 1,
                            component: 'html-video',
                            label: '30sec',
                            initial: false,
                            options: {
                                src: '/videos/30sec.webm'
                            }
                        },
                    ]
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {

            this.pageItems = _.filter(this.pageContent, function(item) {
                return item.initial;
            });
        
        },

        methods: {
        
            showContent: function(content) {
            
                this.pageItems = _.filter(this.pageItems, function(item) {
                    return item.id != content.id;
                });
                this.pageItems.unshift(content);
            
            },

        }

    }

</script>
