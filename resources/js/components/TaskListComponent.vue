<template>

    <div class="list-wrapper">
       <button type="button" class="btn btn-success" @click="grabAllTasks" >All</button>
       <button type="button" class="btn btn-info" @click="grabCompletedTasks" >Completed</button>
       <button type="button" class="btn btn-warning" @click="grabActiveTasks" >Active</button>
       <button type="button" class="btn btn-dark" @click="clearCompletedTasks" >Clear Completed</button>
      <!--  <button type="button" class="btn btn-warning" @click="removeCompletedTasks" >Remove Completed</button> -->
       <ul class="d-flex flex-column-reverse todo-list">
            <li  v-for="task in tasks">
                <span :class="{'done-task': task.completed }"> {{task.title}}</span>
                <div style="margin-left:auto">
                    <i v-if="!task.completed"  class="fa fa-pencil-square-o" data-toggle="modal" data-target="#editModal" aria-hidden="true" @click="addEditId(task.id)"></i>
                    <i v-if="!task.completed"  class="fa fa-check-square" aria-hidden="true" @click="completeTask(task.id)"></i>
                    <i class="fa fa-times" aria-hidden="true" @click="deleteTask(task.id)"></i>
                </div>
            </li>
        </ul>
        <editTask v-if="showEditModal" :editId="editId"></editTask>
    </div>
</template>

<script>
    export default {

        //Data for this Component..
        data() {
            return {
                tasks: [],
                inputTask: {

                },
                editId : '',
                showEditModal: false,
            };
        },

        mounted() {
 
            //grabTask Event Listener..
            this.$root.$on('grabTasks', data => {
                this.grabAllTasks();
            });

            //CloseModal Event Listener..
            this.$root.$on('closeModal', data => {
                this.closeModal();
            });
        },

        created() {
            //Grab all Tasks and update the task property..
            this.grabAllTasks();
        },

        methods: {

            //Grab all Tasks and update the task property..
            grabAllTasks() {

                axios.get('api/gettasks').then((res) => {
                    this.tasks = res.data.data;
                }).catch(
                    (err) => console.error(err)
                );
            },

            //Grab Completed Tasks
            grabCompletedTasks() {

                axios.get('api/gettasks?completed=1').then((res) => {
                    this.tasks = res.data.data;
                }).catch(
                    (err) => console.error(err)
                );
            },

            //Grab Completed Tasks
            grabActiveTasks() {

                axios.get('api/gettasks?completed=0').then((res) => {
                    this.tasks = res.data.data;
                }).catch(
                    (err) => console.error(err)
                );
            },            
            //Delete single Task..
            deleteTask(taskId) {            
    
                if(confirm("Delete this Task?")){                    
                      
                      axios.delete('api/delete-task/'+taskId).then((res) => {


                        if(res.data.status == 204){
                            toastr.error(res.data.msg); 
                        }else{
                            toastr.error('Something went wrong.' + res.data.msg);
                        }

                      //Update Tasks list properties..
                      this.grabAllTasks();

                    }).catch(
                        (err) => console.error(err)
                    );                    

                }
            
            },

            //Assign edit id properties on updaet click
            addEditId(id){
                this.editId = id;
                this.showEditModal = true;
            },

            //Close Modal and remove edit variables assignment..
            closeModal(){
                this.editId = '';
                this.showEditModal = false;
            },

            //Complete Task
            completeTask(id){

                axios.put('api/gettask-complete/',{ taskid:id }).then((res) => {
                    console.log(res);
                    //Par Task Update Response..
                    if(res.data.status == 200){
                        toastr.success(res.data.msg); 
                    }else{
                        toastr.error('Something went wrong.' + res.data.msg);
                    }
                    
                    //Re-execute Grab tasks event..
                    this.$root.$emit('grabTasks');

                }).catch(
                    (err) => console.error(err)
                );
            },

            //Clear Completed Tasks..
            clearCompletedTasks(){

                axios.post('api/clear-complete-task')
                      .then( (res) => {

                        //Empty Input 
                        this.inputTask = '';

                        //Par Task Update Response..
                        if(res.data.status == 200){
                            toastr.success(res.data.msg); 
                            this.grabAllTasks();
                        }else{
                            toastr.error('Something went wrong.' + res.data.msg);
                        }
                    
                        //Grab all updated tasks via event..
                        this.$root.$emit('grabTasks');

                      }).catch( (err) => console.log(err) );                
            }


        }
    }
</script>

<style scoped>

.done-task{
    text-decoration: line-through;    
}
</style>
