<template>

    <transition name="fade">
        <div class="page-menu" v-if="$store.state.user.id">

            <div class="menu-item">
                <a href="/" class="menu-item">Home</a>
            </div>

            <div class="menu-item">
                <a href="/registrations" class="menu-item">Registrations</a>
            </div>

        </div>
    </transition>

</template>

<script>

    export default {

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
