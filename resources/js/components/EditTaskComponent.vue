<template>
  <!-- Modal -->
  <div class="modal" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" method="PUT" @submit.prevent="editTask()">
            <input type="text" v-model="editText">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
          
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="editModalClose" @click="closeModal">Close</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
            
        props: {
            editId: {required: true},
        },

        data() {
            return {
                id: this.editId,
                editText:''
            };
        },

        mounted() {            
            //Get Task detail for editing..
            axios.get('api/gettask/'+this.id).then((res) => { 
                this.editText = res.data.title;

            }).catch(
                (err) => console.error(err)
            ); 
        },


        methods: {

            editTask(id){

                axios.put('api/gettask/',{ id:this.id,title:this.editText }).then((res) => {

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

            //Execute Parent Component close event..
            closeModal(){
                this.$root.$emit('closeModal');
            }
        }
    }
</script>
