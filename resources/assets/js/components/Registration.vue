<template>

    <div class="registration-form">

        <transition name="initial" appear>
            <div class="input-container">
                <div class="logo">
                    <img src="images/bcs_logo_white.png" class="logo"/>
                </div>
            </div>
        </transition>

        <transition name="initial" appear>
            <div class="input-container">
                <div class="">
                    <h1>Information Session Registration</h1>
                </div>
            </div>
        </transition>

        <transition name="initial" appear>
            <div class="input-container">
                <div class="input-block">
                    <input type="text" v-model="name" placeholder="Name" class="center" />
                </div>
            </div>
        </transition>

        <transition name="initial" appear>
            <div class="input-container">
                <div class="input-block">
                    <input type="text" v-model="email" placeholder="Email" class="center" />
                </div>
            </div>
        </transition>


        <transition name="expander">
            <div class="input-container" v-if="name.length && validEmail">
                <div class="input-block">
                    <p class="italic center">Which event are you planning on attending?</p>
                </div>
            </div>
        </transition>

        <transition name="expander">
            <div class="input-container" v-if="name.length && validEmail">

                <transition-group name="expander">

                    <div class="flexbox" 
                        v-for="(event, index) in events"
                        :key="event.id"    
                    >
                        <div>
                            <input type="checkbox" 
                                v-model="selectedEvents"
                                :id="'event_' + event.id" 
                                :value="event.id" 
                             />
                        </div>
                        <div class="event-info">
                            <label :for="'event_' + event.id">
                                <span class="bold">{{ event.title }}</span> {{ event.date }}<br /> {{ event.location }}
                            </label>
                        </div>
                    </div>

                </transition-group>

            </div>
        </transition>

        <transition name="button">
            <div v-if="valid" class="input-container">
                <div class="input-block center">
                    <button @click.stop.prevent="submit">Complete Registration</button>
                </div>
            </div>
        </transition>

    </div>

</template>

<script>

    export default {

        props: [],

        mixins: [],

        data: function() {
            return {
                name: '',
                email: '',
                events: [],
                selectedEvents: []
            }
        },

        watch: {
        
        },

        computed: {
            valid() {
                return this.name.length && this.email.length && this.selectedEvents.length ? true : false;
            },
            validEmail() {
                let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                let email = String(this.email);
                return Boolean(email.match(mailformat));
            }
        },

        mounted() {
            this.loadEvents();
        },

        methods: {
        
            loadEvents: function() {
                this.$http.post('/events/load').then( response => {
                    this.events = response.data.events;
                }, error => {
                
                });
            },

            submit: function() {

                let post_data = {
                    'name': this.name,
                    'email': this.email,
                    'events': this.selectedEvents
                }
                
                this.$http.post('/events/register', post_data).then( response => {
                    this.$store.dispatch('setRegistered', true);
                }, error => {
                
                });


            }

        }
    }

</script>
