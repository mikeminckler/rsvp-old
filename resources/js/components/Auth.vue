<template>

    <div class="auth">
        <div class="link logout px-4" v-if="auth" @click.prevent.stop="logout">Logout</div>
    </div>

</template>

<script>

    export default {

        props: ['userId'],

        data: function() {
            return {
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


            loadUser: function() {
            
                this.$http.get('/users/load', {'user_id': this.userId}).then( response => {
                    this.$store.dispatch('setUser', response.data.user);
                }, error => {
                
                });
            
            },

            logout: function() {

                this.$http.post('/logout').then( response => {
                    this.$store.dispatch('setUser', {});
                    this.$router.push({ name: 'events' });
                    location.reload();
                }, error => {
                
                });
            
            },

        
        }

    }

</script>
