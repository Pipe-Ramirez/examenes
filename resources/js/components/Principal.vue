<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"> Exámenes </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <form v-on:submit.prevent="newExamen()" action="">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Crear nuevo Examen
                  </button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-content">
                      <div class="card-header mb-3">
                        Nuevo examen
                      </div>
                      <div class="p-2">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Título del examen</label>
                          <input type="text" class="form-control" v-model="titulo" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                          <textarea class="form-control" v-model="descrip" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Tiempo en minutos</label>
                          <input type="number" class="form-control" v-model="tiempo" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Intentos permitidos</label>
                          <input type="number" class="form-control" v-model="intentos" >
                        </div>
                      </div>
                      <div class="card-header modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro que deseas crear este examen?')" >
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
          <div class="row">
              <examenes v-for="examen in examenes" :key="examen.id" :examen="examen">
              </examenes>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data(){
        return {
          titulo: '',
          descrip: '',
          tiempo: '',
          intentos: '',
          examenes: [{
            'id': "",
            'titulo': "",
            'descripcion': "",
            'tiempo': "",
            'intentos': ""
          }],
        }
      },
      mounted() {
        axios.get('examenes')
        .then(response =>(this.examenes = response.data))
      },
      methods: {
        newExamen(){
          const info = {
            Etitulo: this.titulo,
            Edescrip: this.descrip,
            Etiempo: this.tiempo,
            Eintentos: this.intentos
          };
          axios({
            method: 'post', url: '/saveExamen', data: info
          })
          .then(function (response) {
            $('#exampleModal').modal('hide');
          })
          .catch(function (error) {
            alert(error);
          });
        }
      }
    }
</script>
