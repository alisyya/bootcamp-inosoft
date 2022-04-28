// import index from "./Index";

// import Index from "./Index";

require('./bootstrap');

import Vue from "vue";
import axios from "axios";
import 'es6-promise'
import VueRouter from "vue-router";
import VueAuth from '@websanova/vue-auth';
import router from "./router";
import store from './store';
import VueAxios from 'vue-axios';
import Index from './Index';
import auth from "./auth";
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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

// Vue.component('navbar', require('./components/Nav/Navbar.vue').default);
Vue.router = router;
Vue.use(VueRouter);
// vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${window.location.origin}/api/v1`
Vue.use(VueAuth, auth)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    router,
    render(h) {
        return h(Index)
    }
})

//  const router = new VueRouter({
//     mode: 'history',
//     routes
// });
// const app = new Vue({
//     el: '#app',
//     store,
//     router,
//     created() {
//         this.$store.dispatch('getProductItems');
//       }
// });
