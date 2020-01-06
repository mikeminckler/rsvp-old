<template>

    <div class="page-menu" v-if="$store.state.user.id">

        <div class="menu-item"
            v-for="item in items"    
        >
            <router-link class="menu-link" :to="{ name: item.route }">{{ item.label }}</router-link>
        </div>

    </div>

</template>

<script>

    export default {

        data: function() {
            return {
                items: [
                    { route: 'landing', label: 'Landing' },
                    { route: 'register', label: 'Registration Page' },
                    { route: 'registrations', label: 'Registrations' },
                    { route: 'events', label: 'Events' },
                ]    
            }
        },

        computed: {
            page() {
                return window.location.pathname;
            }
        },

        mounted() {

            this.loadContent();

        },

        methods: {

            loadContent: function() {
            

            
            }
        
        
        
        }

    }

</script>
