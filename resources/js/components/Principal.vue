<template>
  <div class="container">
    <div class="row">
      <div class="col-md">
        <div class="card" style="">
          <div class="card-header"> Exámenes
            <button type="button" class="btn btn-primary position-absolute top-0 end-0 m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Crear nuevo Examen
            </button>
          </div>

          <div class="row justify-content-center mt-3">
              <examenes v-for="examen in examenes" :key="examen.id" :examen="examen"> </examenes>
          </div>
        </div>
      </div>
    </div>
    <modal-nuevo-examen @new="nuevo"> </modal-nuevo-examen>
  </div>
</template>

<script>
    export default {
      mounted() {
        axios.get('examenes')
        .then(response =>(this.examenes = response.data))
      },
      data(){
        return {
          examenes: [{
            'id': "",
            'titulo': "",
            'descripcion': "",
            'tiempo': "",
            'created_at': "",
            'updated_at': "",
            'intentos': ""
          }]
        }
      },
      methods: {
        nuevo(examen_nuevo){
          this.examenes.push(examen_nuevo);
        }
      }
    }
</script>
