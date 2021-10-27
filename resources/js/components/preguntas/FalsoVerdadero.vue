message2<template>
  <div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form v-on:submit.prevent="saveQuest()" action="">
          <div class="card-header"> Falso - Verdadero
            <div class="float-right">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="alert alert-danger m-2" role="alert" id="message2">
            Debes llenar todos los campos.
          </div>
          <div class="p-4">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Seleccione una opción:</label>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio" value="1" id="radio1">
                  <label class="form-check-label" for="radio1">
                    Verdadero
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio" value="2" id="radio2">
                  <label class="form-check-label" for="radio2">
                    Falso
                  </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Puntaje</label>
                  <input v-model="puntaje" type="number" class="form-control" id="text" >
                </div>
              </div>
            </div>
            <div class="mb-3 pt-3">
              <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
              <textarea v-model="descrip" class="form-control" id="textarea" rows="3"></textarea>
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
          fv:'',
          puntaje:'',
          descrip:'',
          required:'border-color:#dc3545;box-shadow: 1px 1px 3px #dc3545;list-style:none;',
        }
      },
        mounted() {
            // console.log('Component mounted.')
        },
        methods: {
          saveQuest(){
            var int = 0;
            var radio1=document.getElementById('radio1');
            var radio2=document.getElementById('radio2');
            if(radio1.checked || radio2.checked){
            }else {
              int = int + 1;
            }
            if(this.puntaje == ""){
              int = int + 1;
              document.getElementById("text").setAttribute("style",this.required);
            }else{
              document.getElementById("text").setAttribute("style","border-color");
            }
            if(this.descrip == ""){
              int = int + 1;
              document.getElementById("textarea").setAttribute("style",this.required);
            }else{
              document.getElementById("textarea").setAttribute("style","border-color");
            }
            if(radio1.checked){
              this.fv = radio1.value;
            }
            if(radio2.checked){
              this.fv = radio2.value;
            }
            const info = {
              idEx: this.examenid,
              fv: this.fv,
              puntaje: this.puntaje,
              descrip: this.descrip
            };
            var message2 = document.getElementById("message2");
            if(int == 0){
              message2.setAttribute("style","display: none;");
              axios.post('/saveQuestFV', info)
              .then((response) =>{
                this.$emit('newQuestFV',response.data);
                $('#modal1').modal('hide');
              });
            }else{
              message2.setAttribute("style","display: flex;");
            }
          }
        }
    }
</script>
<style media="screen">
  #message2{
    display:none;
  }
</style>
