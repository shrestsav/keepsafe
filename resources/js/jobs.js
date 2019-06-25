window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueRouter)
Vue.use(VueProgressBar, {
  color: '#2dce89',
  failedColor: 'red',
  thickness: '4px',
  height: '2px'
})

import index from './components/jobs/index.vue'
import create from './components/jobs/create.vue'
import edit from './components/jobs/create.vue'
import event from './components/jobs/event.vue'

const routes = [
  {name:'jobIndex', path: '/', component: index },
  {name:'jobCreate', path: '/create', component: create, props:true },
  {name:'jobEdit', path: '/edit', component: edit, props:true },
  {name:'jobEvent', path: '/event', component: event, props:true },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
