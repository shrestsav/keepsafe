window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'

import index from './components/clients/index.vue'
import create from './components/clients/create.vue'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: index },
  { path: '/create', component: create },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
