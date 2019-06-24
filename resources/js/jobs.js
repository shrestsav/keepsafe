window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'

import index from './components/jobs/index.vue'
import create from './components/jobs/create.vue'

Vue.use(VueRouter)
Vue.use(VueProgressBar, {
  color: '#fcfb00',
  failedColor: 'red',
  height: '2px'
})

const routes = [
  {name:'jobIndex', path: '/', component: index },
  {name:'jobCreate', path: '/create', component: create, props:true },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
