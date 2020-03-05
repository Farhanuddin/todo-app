<template>
	<div>
		<add-task></add-task>
		<task-list></task-list>
	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('App Component Mounted...')
        },

        data() {
            return {
                test: 'farhan'
            };
        },
    }
</script>
