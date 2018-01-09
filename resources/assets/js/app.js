
//window._ = require('lodash');
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
Vue.component('registration', require('./components/Registration.vue'));
Vue.component('youtube-video', require('./components/YoutubeVideo.vue'));

//Vue.component('page-content', require('./components/PageContent.vue'));

const store = new Vuex.Store({


    state: {
        user: {
            id: ''
        },
        registered: false,
        youtubeReady: false
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
        }
    
    },

    actions: {

        setUser({ commit, state }, user) {
            commit('setUser', user);
        },
        setRegistered({ commit, state }, registered) {
            commit('setRegistered', registered);
        },
        setYoutubeReady({ commit, state }, ready) {
            commit('setYoutubeReady', ready);
        }
    
    }



});


const app = new Vue({
    el: '#app',
    store,

    data: {
    },

    mounted() {

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        window.onYouTubeIframeAPIReady = function() {
            app.$store.dispatch('setYoutubeReady', true);
        }

    },

    methods: {

    
    }
});
