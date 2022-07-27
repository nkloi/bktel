/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('register_student-component', require('./components/Student/RegisterStudentComponent.vue').default);
Vue.component('register_teacher-component', require('./components/Teacher/RegisterTeacherComponent.vue').default);
Vue.component('register_subject-component', require('./components/Subject/RegisterSubjectComponent.vue').default);
Vue.component('import_teacher-component', require('./components/Teacher/ImportTeacherComponent.vue').default);
Vue.component('import_student-component', require('./components/Student/ImportStudentComponent.vue').default);
Vue.component('import_subject-component', require('./components/Subject/ImportSubjectComponent.vue').default);
Vue.component('register_lectures-component', require('./components/Lectures/RegisterLectureComponent.vue').default);
Vue.component('upload_student-component', require('./components/Student/UploadStudentComponent.vue').default);
Vue.component('upload_mark-component', require('./components/Teacher/UploadMarkComponent.vue').default);
Vue.component('export_mark-component', require('./components/Teacher/ExportMarkComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
