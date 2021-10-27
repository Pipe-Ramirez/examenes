<template>
  <!-- <div class=""> -->
    <div class="col-md-2 m-2">
      <div class="card" style="width:150px !important;">
        <div class="card-header" style="font-weight: bold;">{{examen.titulo}}</div>
        <div class="card-body" style="height: 200px; width:120px !important;">
          <p class="card-text">Tiempo: {{examen.tiempo}}</p>
          <p class="card-text">Cantidad de intentos: {{examen.intentos}}</p>
          <a v-bind:href="'/examen/'+ examen.id" class="btn btn-success">Editar</a>
        </div>
      </div>
    </div>
  <!-- </div> -->

</template>

<script>
    export default {
      props:['examen'],
    }

</script>
