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

            //Add Task to database..
            addTask() { 
            console.log(this.inputTask);
                if(this.inputTask != ''){
                    axios.post('api/add-task', { task: this.inputTask } )
                          .then( (res) => {

                            //Empty Input 
                            this.inputTask = '';

                            //Par Task Update Response..
                            if(res.data.status == 200){
                                toastr.success(res.data.msg); 
                            }else{
                                toastr.error('Something went wrong.' + res.data.msg);
                            }
                        
                            //Grab all updated tasks via event..
                            this.$root.$emit('grabTasks');

                          }).catch( (err) => console.log(err) );                
                }else{
                    alert('Task cannot be Empty');
                }

            }
        }
    }
</script>