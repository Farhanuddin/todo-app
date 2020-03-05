<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">TaskList</div>
                    <editTask v-if="showEditModal" :editId="editId"></editTask>
                    <div class="card-body">
                        Task list Component.
                        <ul>
                            <li v-for="task in tasks">
                                {{task.title}}
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editModal" @click="addEditId(task.id)">Edit</button>
                                <button type="button" @click="deleteTask(task.id)">Delete</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
            console.log('Task List Component mounted.');
            console.log(this.tasks);

            //grabTask Even Listener..
            this.$root.$on('grabTasks', data => {
                this.grabAllTasks();
            });

            //grabTask Even Listener..
            this.$root.$on('closeModal', data => {
                this.closeModal();
            });
        },

        created() {
            //Grab all Tasks
            this.grabAllTasks();
        },

        methods: {

            //Grab all Tasks
            grabAllTasks() {

                axios.get('api/gettasks').then((res) => {
                    console.log('in axios'); 
                    console.log(res.data.data); 
                    this.tasks = res.data.data;
                }).catch(
                    (err) => console.error(err)
                );
            },

            deleteTask(taskId) {            
    
                if(confirm("Delete this Task?")){
                    
                      axios.delete('api/delete-task/'+taskId).then((res) => {
                        
                      this.grabAllTasks();

                    }).catch(
                        (err) => console.error(err)
                    );                    

                }
            
            },

            addEditId(id){
                this.editId = id;
                this.showEditModal = true;
            },

            closeModal(){
                this.editId = '';
                this.showEditModal = false;
            }

        }
    }
</script>