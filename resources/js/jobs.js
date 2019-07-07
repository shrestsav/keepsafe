window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueProgressBar from 'vue-progressbar'
import moduleStore from './stores/jobs.js'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueProgressBar, {
  color: '#2dce89',
  failedColor: 'red',
  thickness: '4px',
  height: '2px'
})
Vue.use(VueSweetalert2)

import headermenu from './components/jobs/headerMenu.vue'
import index from './components/jobs/index.vue'
import create from './components/jobs/create.vue'
import edit from './components/jobs/edit.vue'
import events from './components/jobs/events/index.vue'
import jobEvents from './components/jobs/events/jobEvents.vue'
import invoice from './components/jobs/invoices/index.vue'

Vue.component('pagination', require('laravel-vue-pagination'));

const routes = [
  {name:'jobIndex', path: '/', component: index },
  {name:'jobCreate', path: '/create', component: create, props:true },
  {name:'jobEdit', path: '/edit', component: edit, props:true },
  {name:'events', path: '/events', component: events, props:true },
  {name:'jobEvents', path: '/jobEvents', component: jobEvents, props:true },
  {name:'invoice', path: '/invoice', component: invoice, props:true },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const store = new Vuex.Store(moduleStore);
const app = new Vue({
    el: '#app',
    components:{headermenu},
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
