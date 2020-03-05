<template>
    
    <div>
      <form action="#" @submit.prevent="addTask()">   
            <div class="add-items d-flex"> 
                <input type="text" class="form-control todo-list-input" v-model="inputTask" placeholder="Write your Todo Here...?">
                <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>    
            </div>
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

                if(this.inputTask != ''){ 
                    if(this.inputTask.length < 100){

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
                        alert('Task length cannot be more then 100');                    
                    }                                         
                }else{
                    alert('Task cannot be Empty');
                }

            }
        }
    }
</script>