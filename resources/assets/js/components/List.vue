<template>

    <div class="info-list">

        <h2>One Hour Will Make a Lifetime of Difference</h2>

        <div class="info-session-info">
            <div class="admissions-team">
                <img src="/images/admissions.jpg" />
                <div class="cta small-screen">
                    <button class="cta" @click.prevent.stop="scrollTo('registration_form')">Register Now</button>
                </div>
            </div>
            <p>We warmly invite you to join our Admissions team at an Information Session near you to discover the opportunities a Brentwood education offers.</p>
            <p>These sessions allow prospective families to find out if Brentwood is the right fit for your family.</p>
            <p>Learn why Brentwood is a dynamic and progressive place of learning, where student choice is at the forefront.</p>

        </div>

        <div class="grid-list">

            <div class="grid-list-item" v-for="item in items">
                <div class="grid-list-icon"></div>
                <div class="grid-list-text">{{ item }}</div>
            </div>

        </div>

    </div>

</template>

<script>

	import Scroller from './Scroller';

    export default {

        props: [],

        mixins: [Scroller],

        data: function() {
            return {
                items: [
                    'Over $1 Million in student financial aid',
                    '9 to 1 student to faculty ratio',
                    '80% of students accepted to their 1st choice university',
                    '100% university placement',
                    'Over 30 arts and 20 athletic options',
                    'Truly Co-ed 50/50, female/male',
                    '14 AP courses',
                ]
            }
        },

        watch: {
        
        },

        computed: {
        
        },

        mounted() {
        
        },

        methods: {

        }

    }

</script>
