<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Examen: {{examen[0]['titulo']}}
            <div class="float-right">
              <a href="#" class="btn btn-warning" onclick="history.go(-1)">Átras</a>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar pregunta
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal2">
                      Opción multiple
                    </button>
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal3">
                      Texto libre
                    </button>
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal1">
                      Falso / Verdadero
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="p-2">
            <table class="table table-success table-striped">
              <thead>
                <tr>
                  <th scope="col">Pregunta</th>
                  <th scope="col">Tipo pregunta</th>
                  <th scope="col">Puntaje</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="examen in preguntas" :key="examen.id">
                  <td>{{examen.pregunta}}</td>
                  <td>{{examen.tipo}}</td>
                  <td>{{examen.puntaje}}</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
            </table>
          </div>
              <div class="col-md-3">
                <!-- Modal1 -->
                <falso-verdadero :examenid="examen[0]['id']"> </falso-verdadero>
              </div>

              <div class="col-md-3">
                <!-- Modal2 -->
                <multiple :examenid="examen[0]['id']"> </multiple>
              </div>

              <div class="col-md-3">
                <!-- Modal3 -->
                <texto :examenid="examen[0]['id']"> </texto>
              </div>

        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
      props:['examen', 'preguntas'],
        mounted() {
            console.log()
        }
    }
</script>
