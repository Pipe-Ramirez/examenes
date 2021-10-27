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
                <tr v-for="(element, index) in preguntas" :key="element.id">
                  <td>{{element.pregunta}}</td>
                  <td>{{element.tipo}}</td>
                  <td>{{element.puntaje}}</td>
                  <td><button class="btn btn-danger" title="Eliminar" v-on:click="deleteQuest(element.id, index)"> - </button></td>
                </tr>
              </tbody>
            </table>
          </div>
              <div class="col-md-3">
                <!-- Modal1 -->
                <falso-verdadero :examenid="examen[0]['id']" @newQuestFV="newQuestFV"> </falso-verdadero>
              </div>

              <div class="col-md-3">
                <!-- Modal2 -->
                <multiple :examenid="examen[0]['id']" @newQuestM="newQuestM"> </multiple>
              </div>

              <div class="col-md-3">
                <!-- Modal3 -->
                <texto :examenid="examen[0]['id']" @newQuestT="newQuestT"> </texto>
              </div>

        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
      props:['examen'],
      data(){
        return{
          preguntas: [{
            'id': "",
            'id_examen': "",
            'tipo': "",
            'puntaje': "",
            'pregunta': ""
          }]
        }
      },
      mounted() {
        const info = { id: this.examen[0]['id'] };
        axios.post('/preguntas', info)
        .then((response) =>{
          this.preguntas = response.data
        });
      },
      methods: {
        newQuestFV(pregunta_nuevo){
          this.preguntas.push(pregunta_nuevo);
        },
        newQuestM(pregunta_nuevo){
          this.preguntas.push(pregunta_nuevo);
        },
        newQuestT(pregunta_nuevo){
          this.preguntas.push(pregunta_nuevo);
        },
        deleteQuest(idQuest, index){
          const info = { id: idQuest };
          axios.post('/deleteQuest', info)
          .then((response) =>{
            this.preguntas.splice(index,1);
            console.log(this.preguntas);
          });
        }
      }
    }
  </script>
