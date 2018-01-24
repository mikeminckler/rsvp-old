<template>

    <transition name="fade">
        <div class="page-menu" v-if="$store.state.user.id">

            <div class="menu-item"
                v-for="item in items"    
            >
                <router-link :to="{ name: item.route }">{{ item.label }}</router-link>
            </div>

        </div>
    </transition>

</template>

<script>

    export default {

        data: function() {
            return {
                items: [
                    { route: 'landing', label: 'Landing' },
                    { route: 'register', label: 'Register' },
                    { route: 'registrations', label: 'Registrations' },
                    { route: 'events', label: 'Event' },
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
