<template>
    <div>
        <form action="#" @submit.prevent="addTask()">
            <input type="text" class="form-control" v-model="inputTask">
            <button type="submit">Add Task</button>
        </form>
    </div>
</template>

<script>
    export default {

        //Data for this Component..
        data() {
            return {
                inputTask: ''
            };
        },

        mounted() {
            console.log('Add Task Component mounted.');
        },

        methods: {

            addTask() {
                console.log(this.inputTask);
                axios.post('api/add-task', { task: this.inputTask } )
                      .then( (res) => {
                        console.log(res);
                        //Empty Input 
                        this.inputTask = '';

                        this.$root.$emit('grabTasks');

                      }).catch( (err) => console.log(err) );
            }
        }
    }
</script>