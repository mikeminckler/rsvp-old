
import axios from "axios";
Object.defineProperty(Vue.prototype, "$http", { value: axios });

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

import velocity from 'velocity-animate'

import Vue from 'vue'

import lodash from 'lodash';
Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });

import moment from 'moment';
Object.defineProperty(Vue.prototype, '$moment', { value: moment });

import Vuex from 'vuex'
Vue.use(Vuex);

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Auth from './components/Auth.vue';
Vue.component('auth', Auth);
import PageMenu from './components/PageMenu.vue';
Vue.component('page-menu', PageMenu);
import Spinner from './components/Spinner.vue';
Vue.component('spinner', Spinner);

// CONTENT ITEMS 
import Facts from './components/Facts.vue';
Vue.component('facts', Facts);
import ImageBlock from './components/ImageBlock.vue';
Vue.component('image-block', ImageBlock);
import List from './components/List.vue';
Vue.component('list', List);
import Logo from './components/Logo.vue';
Vue.component('logo', Logo);
import Registration from './components/Registration.vue';
Vue.component('registration', Registration);
import YoutubeVideo from './components/YoutubeVideo.vue';
Vue.component('youtube-video', YoutubeVideo);
import HtmlVideo from './components/HtmlVideo.vue';
Vue.component('html-video', HtmlVideo);

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
        },
        introComplete: false,
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
        },
        setIntroComplete (state, value) {
            state.introComplete = value;
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
        },

        videoEnded({ commit, state }, videoName) {
            if (videoName == 'logo') {
                commit('setIntroComplete', true);
            }
        },
    
    }

});

import Register from './pages/Register.vue';
import Login from './pages/Login.vue';
import LandingPage from './pages/LandingPage.vue';
import Registrations from './pages/Registrations.vue';
import Events from './pages/Events.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'register',
            component: Register,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/landing',
            name: 'landing',
            component: LandingPage,
        },
        {
            path: '/registrations',
            name: 'registrations',
            component: Registrations,
        },
        {
            path: '/events',
            name: 'events',
            component: Events,
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
