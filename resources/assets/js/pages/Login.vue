<template>

    <div class="vue-page">

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


</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                email: '',
                password: '',
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {
        
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

        
        }

    }

</script>
