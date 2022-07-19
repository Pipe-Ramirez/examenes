<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">
        <form v-on:submit.prevent="newExamen()" action="">
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-content">
              <div class="card-header mb-3">
                Nuevo examen
              </div>
              <div class="alert alert-danger m-2" role="alert" id="message3">
                Debes llenar todos los campos.
              </div>
              <div class="p-2">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Título del examen</label>
                  <input type="text" class="form-control" v-model="titulo"  id="textT">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                  <textarea class="form-control" v-model="descrip" rows="3" id="textD"></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Tiempo en minutos</label>
                  <input type="number" class="form-control" v-model="tiempo" id="textN" >
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Intentos permitidos</label>
                  <input type="number" class="form-control" v-model="intentos" id="textI" >
                </div>
              </div>
              <div class="card-header modal-footer">
                <button type="submit" class="btn btn-primary">
                  Guardar Examen
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        titulo: '',
        descrip: '',
        tiempo: '',
        intentos: '',
        required:'border-color:#dc3545;box-shadow: 1px 1px 3px #dc3545;list-style:none;',
      }
    },
    mounted() {
    },
    methods: {
      newExamen(){
        var int = 0;
        var textT = document.getElementById('textT');
        var textD = document.getElementById('textD');
        var textN = document.getElementById('textN');
        var textI = document.getElementById('textI');
        if(this.titulo == ""){
          int = int + 1;
          document.getElementById("textT").setAttribute("style",this.required);
        }else{
          document.getElementById("textT").setAttribute("style","border-color");
        }
        if(this.descrip == ""){
          int = int + 1;
          document.getElementById("textD").setAttribute("style",this.required);
        }else{
          document.getElementById("textD").setAttribute("style","border-color");
        }
        if(this.tiempo == ""){
          int = int + 1;
          document.getElementById("textN").setAttribute("style",this.required);
        }else{
          document.getElementById("textN").setAttribute("style","border-color");
        }
        if(this.intentos == ""){
          int = int + 1;
          document.getElementById("textI").setAttribute("style",this.required);
        }else{
          document.getElementById("textI").setAttribute("style","border-color");
        }

        const info = {
          Etitulo: this.titulo,
          Edescrip: this.descrip,
          Etiempo: this.tiempo,
          Eintentos: this.intentos
        };
        var message3 = document.getElementById("message3");
        if(int == 0){
          message3.setAttribute("style","display: none;");
          axios.post('/saveExamen', info)
          .then((response) =>{
            this.$emit('new',response.data);
            $('#exampleModal').modal('hide');
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
