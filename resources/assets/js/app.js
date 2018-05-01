/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueOnsen from 'vue-onsenui';

import AppView from './components/AppView.vue';
import App from './components/App.vue';
import Child from './components/Pages/Child-1-1.vue';
import Child2 from './components/Pages/Child-1-1-1.vue';
import Login from './components/Auth/Login.vue'

import Router from 'vue-router'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueOnsen);
Vue.use(Router);

Vue.component('about', function (resolve) {
    require(['./components/Dashboard/About.vue'], resolve)
})
Vue.component('dashboard', function (resolve) {
    require(['./components/Dashboard/Dashboard.vue'], resolve)
})
Vue.component('settings', function (resolve) {
    require(['./components/Dashboard/Settings.vue'], resolve)
})


Vue.component('app-view', AppView)

const router = new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Login,
            children: [
                {
                    path: 'Child-1-1',
                    name: 'Child-1-1',
                    component: Child,
                    children: [
                        {
                            path: 'Child-1-1-1',
                            name: 'Child-1-1-1',
                            component: Child2
                        }
                    ]
                }
            ]
        }
    ]
})
new Vue({
        router,
        render: h => h(App)
}).$mount('#app');