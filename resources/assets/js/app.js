
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


import Vue from 'vue'

import lodash from 'lodash';
Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });


import moment from 'moment';
Object.defineProperty(Vue.prototype, '$moment', { value: moment });

import Vuex from 'vuex'
Vue.use(Vuex);
Vue.prototype.$http = axios;

Vue.component('auth', require('./components/Auth.vue'));
Vue.component('page-menu', require('./components/PageMenu.vue'));
Vue.component('spinner', require('./components/Spinner.vue'));

// CONTENT ITEMS 
Vue.component('facts', require('./components/Facts.vue'));
Vue.component('list', require('./components/List.vue'));
Vue.component('logo', require('./components/Logo.vue'));
Vue.component('registration', require('./components/Registration.vue'));
Vue.component('youtube-video', require('./components/YoutubeVideo.vue'));
Vue.component('html-video', require('./components/HtmlVideo.vue'));

const store = new Vuex.Store({


    state: {
        user: {
            id: ''
        },
        registered: false,
        youtubeReady: false,
        screen: {
            width: window.innerWidth,
            height: window.innerHeight
        }
    },

    mutations: {
    
        setUser (state, user) {
            state.user = user;
        },
        setRegistered (state, registered) {
            state.registered = registered;
        },
        setYoutubeReady (state, ready) {
            state.youtubeReady = ready;
        },
        setScreenSize (state, screen) {
            state.screen = screen;
        }
    
    },

    actions: {

        setUser({ commit, state }, user) {
            commit('setUser', user);
        },
        setRegistered({ commit, state }, registered) {
            commit('setRegistered', registered);

            app.pageItems = [];

            setTimeout(function() {
                app.pageItems = _.filter(app.pageContent, function(item) {
                    return item.label == '30sec';
                });
            }, 1000);


        },
        setYoutubeReady({ commit, state }, ready) {
            commit('setYoutubeReady', ready);
        },
        setScreenSize({ commit, state }, screen) {
            commit('setScreenSize', screen);
        }
    
    }



});


const app = new Vue({
    el: '#app',
    store,

    data: {

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
                    component: 'html-video',
                    label: '30sec',
                    initial: false,
                    options: {
                        src: '/videos/30sec.webm'
                    }
                },
                {
                    id: 2,
                    component: 'logo',
                    initial: false,
                    options: {
                        width: '400'
                    }
                },
                {
                    id: 3,
                    component: 'registration',
                    initial: true,
                },
                {
                    id: 4,
                    component: 'facts',
                    label: 'Facts',
                    initial: false
                },
                {
                    id: 5,
                    component: 'list',
                    label: 'Info Session Benifits',
                    initial: false,
                },
            ]
    },

    mounted() {

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        window.onYouTubeIframeAPIReady = function() {
            app.$store.dispatch('setYoutubeReady', true);
        }

        window.addEventListener('resize', this.screenResize);

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

        screenResize: _.debounce(
            function(event) {
                let screen = {
                    width: event.currentTarget.innerWidth,
                    height: event.currentTarget.innerHeight,
                }
                app.$store.dispatch('setScreenSize', screen);
            }, 100
        ),

    
    }
});
