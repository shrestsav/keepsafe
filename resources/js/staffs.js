// require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'

import create from './components/staffs/create.vue'


Vue.use(VueRouter)

const routes = [
  { path: '/addStaff', component: create },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
