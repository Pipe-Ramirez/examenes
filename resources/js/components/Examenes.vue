<template>
  <div class="col-md-2 m-2">
    <div class="card">
      <div class="card-header" style="font-weight: bold;">{{examen.titulo}}</div>
      <div class="card-body">
        <p class="card-text">Tiempo: {{examen.tiempo}}</p>
        <p class="card-text">Cantidad de intentos: {{examen.intentos}}</p>
        <a v-bind:href="'/preguntas/'+ examen.id" class="btn btn-success">Editar</a>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      props:['examen'],
      data(){
        return {
          oneExamen: [{
            'id': "",
            'titulo': "",
            'descripcion': "",
            'tiempo': "",
            'intentos': ""
          }],
          ide: this.examen.id
        }
      },
      methods: {
        
      },
      mounted(){

      }
    }

</script>
