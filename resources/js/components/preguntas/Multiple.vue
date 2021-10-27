<template>
  <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form v-on:submit.prevent="saveQuestMO()" action="" class="needs-validation" novalidate>
          <div class="card-header"> Opción multiple única opción
            <div class="float-right">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="alert alert-danger m-2" role="alert" id="message1">
            Debes llenar todos los campos.
          </div>
          <div class="row m-1">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <textarea v-model="descrip" class="form-control" id="descrip" rows="3"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Puntaje</label>
                <input v-model="puntaje" type="number" class="form-control" id="puntaje" >
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-2">
            <div class="input-group flex-nowrap">
              <label class="form-control col-md-1 justify-content-center" id="addon-wrapping">
                <input class="form-check-input m-1" type="radio" name="radio" value="1" id="a">
              </label>
              <input v-model="opc1" type="text" class="form-control" id="opc1">
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="input-group flex-nowrap">
              <label class="form-control col-md-1 justify-content-center" id="addon-wrapping">
                <input class="form-check-input m-1" type="radio" name="radio" value="2" id="b">
              </label>
              <input v-model="opc2" type="text" class="form-control" id="opc2">
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="input-group flex-nowrap">
              <label class="form-control col-md-1 justify-content-center" id="addon-wrapping">
                <input class="form-check-input m-1" type="radio" name="radio" value="3" id="c">
              </label>
              <input v-model="opc3" type="text" class="form-control" id="opc3">
            </div>
          </div>
          <div class="col-md-12 mb-2">
            <div class="input-group flex-nowrap">
              <label class="form-control col-md-1 justify-content-center" id="addon-wrapping">
                <input class="form-check-input m-1" type="radio" name="radio" value="4" id="d">
              </label>
              <input v-model="opc4" type="text" class="form-control" id="opc4">
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
          selec:'',
          opc1:'',
          opc2:'',
          opc3:'',
          opc4:'',
          puntaje:'',
          descrip:'',
          required:'border-color:#dc3545;box-shadow: 1px 1px 3px #dc3545;list-style:none;',
        }
      },
        mounted() {
            // console.log('Component mounted.')
        },
        methods: {
          saveQuestMO(){
            var int = 0;
            var a=document.getElementById('a');
            var b=document.getElementById('b');
            var c=document.getElementById('c');
            var d=document.getElementById('d');
            if(this.opc1 == ""){
              document.getElementById("opc1").setAttribute("style",this.required);

              int = int + 1;
            }else{
              document.getElementById("opc1").setAttribute("style","border-color");
            }
            if(this.opc2 == ""){
              document.getElementById("opc2").setAttribute("style",this.required);
              int = int + 1;
            }else{
              document.getElementById("opc2").setAttribute("style","border-color");
            }
            if(this.opc3 == ""){
              document.getElementById("opc3").setAttribute("style",this.required);
              int = int + 1;
            }else{
              document.getElementById("opc3").setAttribute("style","border-color");
            }
            if(this.opc4 == ""){
              document.getElementById("opc4").setAttribute("style",this.required);
              int = int + 1;
            }else{
              document.getElementById("opc4").setAttribute("style","border-color");
            }
            if(this.puntaje == ""){
              document.getElementById("puntaje").setAttribute("style",this.required);
              int = int + 1;
            }else{
              document.getElementById("puntaje").setAttribute("style","border-color");
            }
            if(this.descrip == ""){
              document.getElementById("descrip").setAttribute("style",this.required);
              int = int + 1;
            }else{
              document.getElementById("descrip").setAttribute("style","border-color");
            }
            if(a.checked){
              this.selec = a.value;
            }else if(b.checked){
              this.selec = b.value;
            }else if(c.checked){
              this.selec = c.value;
            }else if(d.checked){
              this.selec = d.value;
            }else{
              int = int + 1;
            }
            var message1 = document.getElementById("message1");
            if(int == 0){
              message1.setAttribute("style","display: none;");
              const info = {
                idEx: this.examenid,
                opc1: this.opc1,
                opc2: this.opc2,
                opc3: this.opc3,
                opc4: this.opc4,
                selec: this.selec,
                puntaje: this.puntaje,
                descrip: this.descrip
              };
              axios.post('/saveQuestMO', info)
              .then((response) =>{
                this.$emit('newQuestM',response.data);
                $('#modal2').modal('hide');
              });
            }else{
              message1.setAttribute("style","display: flex;");
            }
          }
        }
    }
</script>
<style media="screen">
  #message1{
    display:none;
  }
</style>
