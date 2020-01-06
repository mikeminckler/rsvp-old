<template>

    <div class="vue-page landing-page">

        <div class="flex"
            v-if="!$store.state.introComplete"
        >
            <html-video 
                :options="{name: 'logo', autoplay: true}"
            ></html-video>
        </div>

        <div class="section"
            v-if="$store.state.introComplete"
            >
                <image-block></image-block>
        </div>

            <div class="content-select section" v-if="$store.state.introComplete == 'foobar'">
                <h2>Learn More About</h2>

                <div v-for="content in pageContent"
                    :key="content.id"
                    class="content-select-item"
                    v-if="content.label"
                    >
                        <div class="content-select-text" @click="showContent(content)"> {{ content.label }}</div>
                </div>

            </div>

            <div class="section"
                v-if="$store.state.introComplete == 'foobar'"
                >
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
                            options: {
                                videoId: 'l3enBQNb8kM'
                            }
                        },
                        {
                            id: 1,
                            component: 'youtube-video',
                            label: 'Academics',
                            initial: false,
                            options: {
                                videoId: 'J_7c_ZA-m0o'
                            }
                        },
                        {
                            id: 2,
                            component: 'youtube-video',
                            label: 'Oceanfront Campus',
                            initial: false,
                            options: {
                                videoId: 'qxBJ30Z22rI'
                            }
                        },
                        {
                            id: 3,
                            component: 'youtube-video',
                            label: 'Course Programming',
                            initial: false,
                            options: {
                                videoId: 'WWshW0N51AQ'
                            }
                        },
                        {
                            id: 4,
                            component: 'youtube-video',
                            label: 'Brentwood by Air',
                            initial: false,
                            options: {
                                videoId: 'QesHCVRZiVM'
                            }
                        },
                        {
                            id: 5,
                            component: 'youtube-video',
                            label: 'Life On Campus',
                            initial: false,
                            options: {
                                videoId: '8ykX_6Evxxg'
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
