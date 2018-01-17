<template>

    <div class="section">

        <div class="input-block">
            <div class="label">Title</div>
            <div class="input">
                <input type="text" v-model="title" placeholder="Title">
            </div>
        </div>

        <div class="input-block">
            <div class="label">Date</div>
            <div class="input">
                <input type="text" v-model="date" placeholder="YYYY-MM-DD HH:MM">
            </div>
        </div>

        <div class="input-block">
            <div class="label">Location</div>
            <div class="input">
                <input type="text" v-model="location" placeholder="Location">
            </div>
        </div>

        <div class="input-block">
            <div class="label">Host</div>
            <div class="input">
                <input type="text" v-model="hostName" placeholder="Name">
            </div>
        </div>

        <div class="input-block">
            <div class="label">Host Email</div>
            <div class="input">
                <input type="text" v-model="hostEmail" placeholder="Email">
            </div>
        </div>

        <div class="input-block">
            <button @click.prevent.stop="submit">Save Event</button>
        </div>

    </div>

</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                title: '',
                date: '',
                location: '',
                hostName: '',
                hostEmail: ''
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {
        
        },

        methods: {
        
            submit: function()
            {
            
                let post_data = {
                    'title': this.title,
                    'date': this.date,
                    'location': this.location,
                    'host_name': this.hostName,
                    'host_email': this.hostEmail
                }
                

                this.$http.post('/events/create', post_data).then( response => {

                    this.$router.push({ name: 'home' });

                }, error => {
                
                });
            
            }
        }

    }

</script>
