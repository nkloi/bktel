/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import $ from 'jquery';
window.$ = window.jQuery = $;

require('./bootstrap');
window.Vue = require('vue').default;

// resources/js/app.js



import 'jquery-ui/ui/widgets/datepicker.js';

$('#datepicker').datepicker();
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
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('content-component', require('./components/ContentComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('registerstudent-component', require('./components/students/RegisterStudentComponent.vue').default);
Vue.component('registerteacher-component', require('./components/teachers/RegisterTeacherComponent.vue').default);
Vue.component('importteacher-component', require('./components/teachers/ImportTeacherComponent.vue').default);
Vue.component('importstudent-component', require('./components/students/ImportStudentComponent.vue').default);
Vue.component('importsubject-component', require('./components/subjects/ImportSubjectComponent.vue').default);
Vue.component('formsubject-component', require('./components/subjects/FormSubjectComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
