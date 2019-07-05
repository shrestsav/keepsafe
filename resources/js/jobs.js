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
import invoice from './components/jobs/invoices/index.vue'

const routes = [
  {name:'jobIndex', path: '/', component: index },
  {name:'jobCreate', path: '/create', component: create, props:true },
  {name:'jobEdit', path: '/edit', component: edit, props:true },
  {name:'jobEvent', path: '/event', component: event, props:true },
  {name:'allEvent', path: '/allEvent', component: allEvent, props:true },
  {name:'invoice', path: '/invoice', component: invoice, props:true },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const store = new Vuex.Store(moduleStore);
const app = new Vue({
    el: '#app',
    router,
    store,
    mounted(){
      // Intercept all requests
      window.axios.interceptors.request.use(
        (config) => {
         // do something before sending requests
          this.$Progress.start();
          return config
        },
        (error) => {
          return Promise.reject(error);
        }
      );

      // Intercept all responses
      window.axios.interceptors.response.use(
        (response) => {
          this.$Progress.finish();
         // when success from server
          return response;
        },

        (error) => {
         // when error from server
          return Promise.reject(error);
        }
      );
    }
});
