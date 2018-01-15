<template>

    <div class="content">

        <h2>Information Session Benifits</h2>

        <div class="grid-list">
            <div class="grid-list-item" v-for="item in items">
                <div class="grid-list-icon"></div>
                <div class="grid-list-text">{{ item }}</div>
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
                items: [
                    'Get a head a start',
                    'find the right fit',
                    'Ask questions one on one',
                    'get to know us',
                    'Unique Scheduling',
                    'Univeristy Placement',
                    'Academic Opportunities',
                    'Financial Aid',
                    'Courses'
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
