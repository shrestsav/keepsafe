<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-2">
          <h3 class="mb-0">Event</h3>
        </div>
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
        this.$Progress.start();
        axios.get('listAllEvents/?page=' + page)
        .then(response => {
          this.$Progress.finish();
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