
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('principal', require('./components/Principal.vue').default);
Vue.component('preguntas', require('./components/Preguntas.vue').default);
Vue.component('modal-nuevo-examen', require('./components/ModalNuevoExamen.vue').default);

Vue.component('multiple', require('./components/preguntas/Multiple.vue').default);
Vue.component('examenes', require('./components/Examenes.vue').default);
Vue.component('texto', require('./components/preguntas/Texto.vue').default);
Vue.component('falso-verdadero', require('./components/preguntas/FalsoVerdadero.vue').default);



const app = new Vue({
    el: '#app',

});
