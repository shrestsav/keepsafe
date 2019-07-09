window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueProgressBar from 'vue-progressbar'
import moduleStore from './stores/store.js'
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

import dashboard from './components/dashboard.vue'

import clients from './components/clients/index.vue'
import createClient from './components/clients/create.vue'

import staffs from './components/staffs/index.vue'
import createStaff from './components/staffs/create.vue'

import headermenu from './components/jobs/headerMenu.vue'
import jobs from './components/jobs/index.vue'
import createJob from './components/jobs/create.vue'
import editJob from './components/jobs/edit.vue'

import events from './components/jobs/events/index.vue'
import jobEvents from './components/jobs/events/jobEvents.vue'

import invoice from './components/jobs/invoices/index.vue'

Vue.component('pagination', require('laravel-vue-pagination'));

const routes = [
  {name:'dashboard',  path: '/', component: dashboard },

  {name:'clients',  path: '/v/clients', component: clients },
  {name:'createClient',  path: '/v/createClient', component: createClient },
  
  {name:'staffs', path: '/v/staffs', component: staffs },
  {name:'createStaff', path: '/v/createStaff', component: createStaff },

  {name:'jobs', path: '/v/jobs', component: jobs },
  {name:'createJob', path: '/v/createJob', component: createJob, props:true },
  {name:'editJob', path: '/v/editJob', component: editJob, props:true },
  {name:'jobEvents', path: '/v/jobEvents', component: jobEvents, props:true },
  {name:'events', path: '/v/events', component: events, props:true },
  {name:'invoice', path: '/v/invoice', component: invoice, props:true },
]

const router = new VueRouter({
  mode:'history',
  routes // short for `routes: routes`
})

const store = new Vuex.Store(moduleStore);
const app = new Vue({
    el: '#app',
    data(){
      return{
        laravelMenu:false,
      }
    },
    components:{headermenu},
    router,
    store,
    computed:{
      currentPage(){
        return this.$store.state.currentPage;
      },
      currentMenu(){
        return this.$store.state.currentMenu;
      }
    },
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
