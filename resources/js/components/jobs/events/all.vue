<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="nav-wrapper">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
          <li class="nav-item" v-for="status,key in eventStatuses">
            <a class="nav-link mb-sm-3 mb-md-0" :id="key" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false"><i :class="'fas fa-'+icons[key]+' mr-2'"></i>{{status}}</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Job ID</th>
            <th>Type</th>
            <th>Status</th>
            <th>Boom Lift</th>
            <th>Vehicle</th>
            <th>Date</th>
            <th>Ref</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="event,key in events.data">
            <td>{{++key}}</td>
            <td>{{event.job_id}}</td>
            <td>{{eventTypes[event.type]}}</td>
            <td>{{eventStatuses[event.status]}}</td>
            <td>{{event.boom_lift_req}}</td>
            <td>{{eventVehicles[event.vehicle]}}</td>
            <td>{{event.date}}</td>
            <td>{{event.ref}}</td>
            <td>
              <a href="#" class="table-action" data-toggle="modal" data-target="#editJobEvents" @click="passData('edit',1,event.id)">
                <i class="fas fa-edit"></i>
              </a>
              <router-link :to="{ name:'invoice', query: { ofEvent: event.id } }" class="table-action" data-toggle="tooltip" data-placement="top" title="Invoice">
                <i class="fas fa-file-invoice"></i>
              </router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer py-4">
      <pagination :data="events" @pagination-change-page="getResults"></pagination>
    </div>
    <edit></edit>
  </div>
</template>

<script>

  import edit from './edit.vue'
  export default{
    components: {
      edit
    },
    data(){
      return{
        errors:{},
        events:{},
        icons:{
          '1':'calendar',
          '2':'power-off',
          '3':'clock',
          '4':'sync',
          '5':'check',
          '6':'times',
          '7':'quote-left',
        }
      }
    },
    mounted(){
      this.getResults();
      this.defSettings();
    },
    computed: {
      eventStatuses(){
        return this.$store.state.eventStatuses;          
      },
      eventTypes(){
        return this.$store.state.eventTypes;        
      },
      eventVehicles(){
        return this.$store.state.eventVehicles;
      }
    },
    methods:{
      getResults(page = 1) {
        axios.get('listAllEvents/?page=' + page)
        .then(response => {
          this.events = response.data;
        });
      },
      defSettings(){
        axios.get('eventStatuses').then(response => this.$store.commit('changeEventStatuses', response.data));
        axios.get('eventTypes').then(response => this.$store.commit('changeEventTypes', response.data));
        axios.get('eventVehicles').then(response => this.$store.commit('changeEventVehicles', response.data));
      },
      passData(type,child,id = null){
        if(type==='edit' && id!==null)
          this.$children[child].getData(id);
      }
    }
  }

</script>