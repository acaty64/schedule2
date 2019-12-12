
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('schedule-main', require('./components/schedule/main.vue'));
Vue.component('schedule-edit-component', require('./components/schedule/edit.vue'));
Vue.component('check-component', require('./components/schedule/check.vue'));
// Vue.component('programadas-edit-component', require('./components/schedule/programadas/edit.vue'));

// import router 	from './routes.js';
import store 	from './store';
// import { store } from './components/schedule/edit/store.js';

const app = new Vue({
    el: '#app',
    // router,
    store,
});
