
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import velocity from 'velocity-animate'

import Vue from 'vue'

import lodash from 'lodash';
Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });


import moment from 'moment';
Object.defineProperty(Vue.prototype, '$moment', { value: moment });

import Vuex from 'vuex'
Vue.use(Vuex);
Vue.prototype.$http = axios;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.component('auth', require('./components/Auth.vue'));
Vue.component('page-menu', require('./components/PageMenu.vue'));
Vue.component('spinner', require('./components/Spinner.vue'));

// CONTENT ITEMS 
Vue.component('facts', require('./components/Facts.vue'));
Vue.component('image-block', require('./components/ImageBlock.vue'));
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

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'register',
            component: require('./pages/Register')
        },
        {
            path: '/login',
            name: 'login',
            component: require('./pages/Login')
        },
        {
            path: '/landing',
            name: 'landing',
            component: require('./pages/LandingPage.vue')
        },
        {
            path: '/registrations',
            name: 'registrations',
            component: require('./pages/Registrations')
        },
        {
            path: '/events',
            name: 'events',
            component: require('./pages/Events.vue')
        },
    ],
});


const app = new Vue({
    el: '#app',
    store,
    router,

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

        window.addEventListener('resize', this.screenResize);

    },

    methods: {

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
