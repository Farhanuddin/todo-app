<template>
    <li>{{task.title}}</li>
</template>

<script>
    export default {
        mounted() {
            console.log('Task Component mounted.')
        },

        data() {
            return {
                test: 'farhan'
            };
        }
    }
</script>
