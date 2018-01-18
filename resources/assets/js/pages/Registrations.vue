<template>

    <div class="vue-page registrations">

        <h1>Registrations</h1>

        <div class="section">

            <div class="registration-grid grid-header">
                <div class="grid-cell">Name</div>
                <div class="grid-cell">Email</div>
                <div class="grid-cell">Event</div>
                <div class="grid-cell">Date</div>
                <div class="grid-cell">Location</div>
                <div class="grid-cell">Host</div>
                <div class="grid-cell">Host Email</div>
            </div>

            <div class="registration-grid"
                v-for="(registration, index) in registrations"    
            >
                <div class="grid-cell">{{ registration.name }}</div>
                <div class="grid-cell">{{ registration.email }}</div>
                <div class="grid-cell">{{ registration.event.title }}</div>
                <div class="grid-cell">{{ registration.event.date }}</div>
                <div class="grid-cell">{{ registration.event.location }}</div>
                <div class="grid-cell">{{ registration.event.host_name }}</div>
                <div class="grid-cell">{{ registration.event.host_email }}</div>
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
                registrations: []
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {
            this.loadRegistrations();        
        },

        methods: {

            loadRegistrations: function() {
                this.$http.post('/registrations/load').then( response => {
                    this.registrations = response.data.registrations;
                }, error => {
                
                });
            },
        
        }

    }

</script>
