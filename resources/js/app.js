/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);

Vue.component('register_teacher-component', require('./components/Teacher/TeacherComponent.vue').default);
Vue.component('register_student-component', require('./components/Student/StudentComponent.vue').default);
Vue.component('import_teacher-component', require('./components/Teacher/ImportComponent.vue').default);
Vue.component('student_upload_file-component', require('./components/Student/UploadFileComponent.vue').default);
Vue.component('teacher_upload_mark-component', require('./components/Teacher/UploadMarkComponent.vue').default);
Vue.component('teacher_export_mark-component', require('./components/Teacher/ExportFileMarkComponent.vue').default);
Vue.component('upload_user_avartar-component', require('./components/User/UploadUserImage.vue').default);


Vue.component('test-component', require('./components/TestComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

