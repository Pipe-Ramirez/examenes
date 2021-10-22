<template>
  <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form v-on:submit.prevent="saveQuestTL()" action="">
          <div class="card-header"> Texto libre
            <div class="float-right">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="alert alert-danger m-2" role="alert" id="message3">
            Debes llenar todos los campos
          </div>
          <div class="p-3">
            <div class="">
              <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
              <textarea v-model="descrip" class="form-control" id="input1" rows="3"></textarea>
            </div>
            <div class="">
              <label for="exampleFormControlInput1" class="form-label">Puntaje</label>
              <input v-model="puntaje" type="number" class="form-control" id="input2" >
            </div>
          </div>

          <div class="card-header">
            <button type="submit" class="btn btn-primary">Guardar pregunta</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      props:['examenid'],
      data(){
        return{
          descrip:'',
          puntaje:'',
          required:'border-color:#dc3545;box-shadow: 1px 1px 3px #dc3545;list-style:none;',
        }
      },
        mounted() {
            // console.log('Component mounted.')
        },
        methods:{
          saveQuestTL(){
            var int = 0;
            var input1=document.getElementById('input1');
            var input2=document.getElementById('input2');
            if(this.descrip == ""){
              int = int + 1;
              document.getElementById("input1").setAttribute("style",this.required);
            }else{
              document.getElementById("input1").setAttribute("style","border-color");
            }
            if(this.puntaje == ""){
              int = int + 1;
              document.getElementById("input2").setAttribute("style",this.required);
            }else{
              document.getElementById("input2").setAttribute("style","border-color");
            }
            const info = {
              idEx: this.examenid,
              puntaje: this.puntaje,
              descrip: this.descrip
            };
            var message3 = document.getElementById("message3");
            if(int == 0){
              message3.setAttribute("style","display: none;");
              axios({
                method: 'post', url: '/saveQuestTL', data: info
              })
              .then(function (response) {
                $('#modal3').modal('hide');
              })
              .catch(function (error) {
                alert(error);
              });
            }else {
              message3.setAttribute("style","display: flex;");
            }
          }
        }
    }
</script>
<style media="screen">
  #message3{
    display:none;
  }
</style>
