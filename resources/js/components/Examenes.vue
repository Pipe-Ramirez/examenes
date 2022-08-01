<template>
  <div class="row">
    <div class="">
      <div class="card mb-3">
        <a v-bind:href="'/examen/'+ examen.id" ><div id="titulo" class="p-0 card-header d-flex justify-content-center" style="font-weight: bold;">Examen "{{examen.titulo}}".</div></a>
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center"> Tiempo: {{examen.tiempo}} minutos</div>
          <div class="col-md-6 d-flex justify-content-center"> Cantidad de intentos: {{examen.intentos}} </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
      props:['examen'],
    }
</script>

<style media="screen">
  #titulo:hover{
    background-color: gold;
  }
</style>
