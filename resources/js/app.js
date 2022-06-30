/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./main');
require('./adminlte');
require('./dashboard3');
require('./global');


window.Vue = require('vue').default;
window.$ = require('jquery');

// resources/assets/js/app.js

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
import Vue from 'vue';
//add as many widget as you may need

// resources/assets/js/app.js
$('.datepicker').datepicker();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/Sidebar.vue').default);
Vue.component('content-component', require('./components/NewContent.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('add-teacher', require('./components/Content.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const new_app = new Vue({
    el: '#newapp',
})
