window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueProgressBar from 'vue-progressbar'
import moduleStore from './stores/jobs.js'

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueProgressBar, {
  color: '#2dce89',
  failedColor: 'red',
  thickness: '4px',
  height: '2px'
})

import index from './components/jobs/index.vue'
import create from './components/jobs/create.vue'
import edit from './components/jobs/edit.vue'
import event from './components/jobs/events/index.vue'
import allEvent from './components/jobs/events/all.vue'

const routes = [
  {name:'jobIndex', path: '/', component: index },
  {name:'jobCreate', path: '/create', component: create, props:true },
  {name:'jobEdit', path: '/edit', component: edit, props:true },
  {name:'jobEvent', path: '/event', component: event, props:true },
  {name:'allEvent', path: '/allEvent', component: allEvent},
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const store = new Vuex.Store(moduleStore);
const app = new Vue({
    el: '#app',
    router,
    store
});
