require('./bootstrap');

import * as Vue from 'vue'
import axios from "axios";
import 'es6-promise'
import VueRouter from "vue-router";
import VueAuth from '@websanova/vue-auth';
import {routes} from './routes';
import store from './store';
import VueAxios from 'vue-axios';
import Index from './Index';
import auth from './auth'

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

Vue.component('navbar', require('./components/Nav/Navbar.vue').default);

Vue.component('index', Index);

// vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`
Vue.use(VueAuth, auth)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.use(VueRouter);
 const router = new VueRouter({
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    store,
    router,
    created() {
        this.$store.dispatch('getProductItems');
      }
});
