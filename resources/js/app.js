require('./bootstrap');

import vue from 'vue';
window.Vue = vue;

import ProductsComponent from './components/ProductsComponent.vue';
Vue.component('products-component', ProductsComponent);

const app = new Vue({
    el: '#app'
});

window.$ = window.jQuery = require('jquery');
