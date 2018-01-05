<template>

    <div class="registration-form">

        <transition name="expander" appear>
            <div class="input-container">
                <div class="logo">
                    <img src="images/bcs_logo_white.png" class="logo"/>
                </div>
            </div>
        </transition>

        <transition name="expander" appear>
            <div class="input-container" v-if="!complete">
                <div class="center">
                    <h1>Information Session Registration</h1>
                </div>
            </div>
        </transition>

        <transition name="expander" appear>
            <div class="input-container" v-if="!complete">
                <div class="input-block">
                    <input type="text" v-model="name" placeholder="Name" class="center" />
                </div>
            </div>
        </transition>

        <transition name="expander" appear>
            <div class="input-container" v-if="!complete">
                <div class="input-block">
                    <input type="text" v-model="email" placeholder="Email" class="center" />
                </div>
            </div>
        </transition>


        <transition name="expander">
            <div class="input-container" v-if="name.length && validEmail && !complete">
                <div class="input-block">
                    <p class="italic center">Which event are you planning on attending?</p>
                </div>
            </div>
        </transition>

        <transition name="expander">
            <div class="input-container" v-if="name.length && validEmail && !complete">

                <transition-group name="list">

                    <div class="flexbox" 
                        v-for="(event, index) in events"
                        :key="event.id"    
                    >
                        <div>
                            <input type="checkbox" 
                                v-model="selectedEvents"
                                :id="'event_' + event.id" 
                                :value="event" 
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

        <transition name="expander">
            <div v-if="valid && !complete" class="input-container">
                <div class="input-block center">
                    <button @click.stop.prevent="submit" 
                        class="register-button" 
                        :class="sending ? 'sending' : ''"
                    >
                            <transition name="button-text">

                                <div key="button-sending" 
                                    v-if="sending"
                                    class="button-text"
                                >Saving</div>

                                <div key="buton-default" 
                                    class="button-text"
                                    v-else >Complete Registration</div>

                            </transition>
                    </button>
                </div>
            </div>
        </transition>

        <transition name="complete">
            <div class="registration-complete" v-if="complete">

                <div class="center">
                    <h1>Registration Complete</h1>
                </div>

                <p class="center">A confirmation email has been sent to <br/><span class="bold">{{ email }}</span></p>

                <div class="center italic">
                    <h1>Thank You</h1>
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
                name: 'Mike Minckler',
                email: 'mike@gmail.com',
                events: [],
                selectedEvents: [],
                sending: false,
                complete: false,
                buttonText: 'Complete Registration'
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

                if (this.sending != true) {

                    this.sending = true;

                    let post_data = {
                        'name': this.name,
                        'email': this.email,
                        'events': this.$lodash.map(this.selectedEvents, 'id')
                    }
                    
                    this.$http.post('/events/register', post_data).then( response => {

                        setTimeout( () => {
                            this.displayComplete();
                        }, 1000);

                    }, error => {
                    
                    });

                }

            },

            displayComplete: function() {
            
                this.complete = true;
                setTimeout( () => {
                    this.$store.dispatch('setRegistered', true);
                }, 4000);
            
            }

        }
    }

</script>
