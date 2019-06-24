// require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'

import create from './components/staffs/create.vue'
import index from './components/staffs/index.vue'


Vue.use(VueRouter)

const routes = [
  {name:'createStaff', path: '/create', component: create },
  {name:'listStaff', path: '/', component: index },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
