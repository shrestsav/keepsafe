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

import create from './components/staffs/create.vue'
import index from './components/staffs/index.vue'

const routes = [
	{name:'listStaff', path: '/', component: index },
  	{name:'createStaff', path: '/create', component: create },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
