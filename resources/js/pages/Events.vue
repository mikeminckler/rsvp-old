<template>

    <div class="vue-page">


        <div class="section" v-if="!selectedEvent.id">

            <h1>Events</h1>

            <div class="grid-events">
                <div class="ignore" v-for="event in events">
                    <div class="grid-cell link" @click="selectEvent(event)">{{ event.title }}</div>
                    <div class="grid-cell">{{ event.start_date }}</div>
                    <div class="grid-cell">{{ event.end_date }}</div>
                    <div class="grid-cell">{{ event.location }}</div>
                    <div class="grid-cell">{{ event.host_name }}</div>
                    <div class="grid-cell">{{ event.host_email }}</div>
                </div>
            </div>

            <div class="">
                <button @click.prevent.stop="addEvent">Add An Event</button>
            </div>

        </div>

        <div class="section form" v-if="selectedEvent.id">

            <div class="input-block">
                <div class="label">Title</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.title" placeholder="Title">
                </div>
            </div>

            <div class="input-block">
                <div class="label">Start Date</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.start_date" placeholder="YYYY-MM-DD HH:MM:SS">
                </div>
            </div>

            <div class="input-block">
                <div class="label">End Date</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.end_date" placeholder="YYYY-MM-DD HH:MM:SS">
                </div>
            </div>

            <div class="input-block">
                <div class="label">Location</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.location" placeholder="Location">
                </div>
            </div>

            <div class="input-block">
                <div class="label">Host</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.host_name" placeholder="Name">
                </div>
            </div>

            <div class="input-block">
                <div class="label">Host Email</div>
                <div class="input">
                    <input type="text" v-model="selectedEvent.host_email" placeholder="Email">
                </div>
            </div>

            <div class="input-block">
                <div class="label">All Day Event</div>
                <div class="input">
                            <input type="checkbox" 
                                v-model="selectedEvent.all_day"
                             />
                </div>
            </div>

            <div class="flex justify-start items-center">
                <button @click.prevent.stop="submit">Save Event</button>
                <div class="text-gray-700 ml-4 px-2 bg-gray-100 rounded cursor-pointer border" @click="selectedEvent = {id: null}">Canel</div>
            </div>

            <div class="">
                <div class="" v-for="error in errors">
                    <div class="" v-for="message in error"> {{ message }}</div>
                </div>
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
                events: [],
                selectedEvent: {
                    id: null,
                    title: '',
                    date: '',
                    location: '',
                    host_name: '',
                    host_email: '',
                    all_day: '',
                },
                errors: [],
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {

            this.loadEvents();
        
        },

        methods: {
        
            submit: function()
            {
            
                let post_data = {
                    'title': this.selectedEvent.title,
                    'start_date': this.selectedEvent.start_date,
                    'end_date': this.selectedEvent.end_date,
                    'location': this.selectedEvent.location,
                    'host_name': this.selectedEvent.host_name,
                    'host_email': this.selectedEvent.host_email,
                    'all_day': this.selectedEvent.all_day ? true : null,
                }

                let url = '/events/create';
                if (this.selectedEvent.id >= 1) {
                    url = '/events/' + this.selectedEvent.id;
                }
                this.$http.post(url, post_data).then( response => {
                    this.selectedEvent = {
                        id: null,
                    };
                    this.loadEvents();
                }, error => {
                    this.errors = error.response.data.errors;
                });
            
            },

            loadEvents: function() {

                this.errors = [];
                this.$http.get('/events/load').then( response => {
                    this.events = response.data.events;
                }, error => {
                
                });

            },

            selectEvent: function(event) {
                this.errors = [];
                this.selectedEvent = event;
            },

            addEvent: function() {
                
                let event = {
                    id: 0.1,
                    title: '',
                    date: '',
                    location: '',
                    host_name: '',
                    host_email: '',
                    all_day: '',
                };

                this.selectedEvent = event;
            }
        }

    }

</script>
