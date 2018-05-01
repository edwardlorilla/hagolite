/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

window.Vue = require('vue');

import VueOnsen from 'vue-onsenui';
import AppView from './components/AppView.vue';

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.use(VueOnsen);

Vue.component('about', function (resolve) {
    require(['./components/Dashboard/About.vue'], resolve)
})
Vue.component('dashboard',function (resolve) {
    require(['./components/Dashboard/Dashboard.vue'], resolve)
})
Vue.component('settings', function (resolve) {
    require(['./components/Dashboard/Settings.vue'], resolve)
})



Vue.component('app-view', AppView)

