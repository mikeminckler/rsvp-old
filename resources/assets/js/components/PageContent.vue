<template>

    <div class="page-content">

    </div>

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
