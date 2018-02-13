require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
