<template>

    <div class="auth">


        <div class="auth-show" 
            @click="toggle"
            @mouseover="hover = true" 
            @mouseleave="hover = false"
            :class="hover ? 'hover' : ''"
        >
            <div class="login-button"></div>
        </div>

        <transition name="fade">

            <div class="modal"
                v-if="showLogin"
            >

                <div class="login-container">

                    <div class="input-block">
                        <div class="label">Email</div>
                        <div class="input">
                            <input v-model="email" type="email">
                        </div>
                    </div>

                    <div class="input-block">
                        <div class="label">Password</div>
                        <div class="input">
                            <input v-model="password" type="password" @keyup.enter="login">
                        </div>
                    </div>

                    <div class="input-block">
                        <button @click.prevent.stop="login">Login</button>
                    </div>


                </div>


            </div>

        </transition>

    </div>

</template>

<script>

    export default {

        props: ['userId'],

        data: function() {
            return {
                email: 'mikeminckler@gmail.com',
                password: 'password',
				showLogin: false,
                hover: false,
            }
        },

        watch: {
        
        },

        computed: {

            auth() {
                return this.$store.state.user.id > 0 ? true : false;
            }
        
        },

        mounted() {

            if (this.userId > 0) {
                this.loadUser();
            }
        
        },

        methods: {

            login: function() {
            
                if (this.email && this.password) {

                    this.$http.post('/login', {'email': this.email, 'password': this.password}).then( response => {
                        this.$store.dispatch('setUser', response.data.user);
                        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf;
                        this.showLogin = false;
                    }, error => {
                    
                    });

                }
            
            },

            logout: function() {

                this.$http.post('/logout').then( response => {
                    this.$store.dispatch('setUser', {});
                    location.reload();
                }, error => {
                
                });
            
            },

            loadUser: function() {
            
                this.$http.post('/users/load', {'user_id': this.userId}).then( response => {
                    this.$store.dispatch('setUser', response.data.user);
                }, error => {
                
                });
            
            },

            toggle: function() {
            
                if (this.auth) {
                    this.logout();
                } else {
                    this.showLogin = true;
                }
            
            }

        
        }

    }

</script>
