<template>
  <!-- Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Task</h4>
        </div>
        <div class="modal-body">
          <form action="#" method="PUT" @submit.prevent="editTask()">
            <input type="text" v-model="editText">
                {{editText }}
              <button type="submit" class="btn btn-default">Edit</button>
                
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" @click="closeModal">Close</button>
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
            
            console.log('Edit Task mounted. id: '+ this.id);

            axios.get('api/gettask/'+this.id).then((res) => { 
                console.log(res.data);
                this.editText = res.data.title;
            }).catch(
                (err) => console.error(err)
            ); 
        },


        methods: {

            editTask(id){

                axios.put('api/gettask/',{ id:this.id,title:this.editText }).then((res) => { 
                    console.log(res.data);
                    this.editText = res.data.title;
                }).catch(
                    (err) => console.error(err)
                );

            },

            closeModal(){
                console.log('close modal 1');
                this.$root.$emit('closeModal');
            }
        }
    }
</script>
