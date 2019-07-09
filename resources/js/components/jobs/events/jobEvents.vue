<template>
	<div class="card">
		<div class="card-header border-0">
      <div class="row">
        <div class="col-md-4">
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              <li class="nav-item">
                <router-link :to="{ name: 'editJob', query: { whereJob: $route.query.whereJob } }" class="nav-link mb-sm-3 mb-md-0" id="editJob" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Edit Job
                </router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="events" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Events
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8 text-right">
          <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addJobEvents" @click="passData('create',2)">Add Events</button>
        </div>
      </div>
		</div>
		<div class="table-responsive">
			<table class="table align-items-center table-flush">
				<thead class="thead-light">
					<tr>
						<th>S.No</th>
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
						<td>{{eventTypes[event.type]}}</td>
						<td>{{eventStatuses[event.status]}}</td>
						<td>{{event.boom_lift_req}}</td>
						<td>{{eventVehicles[event.vehicle]}}</td>
						<td>{{event.date}}</td>
						<td>{{event.ref}}</td>
						<td>
							<a href="#" class="table-action" data-toggle="modal" data-target="#editJobEvents" @click="passData('edit',3,event.id)">
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
    <create v-if="loaded"></create>
		<edit v-if="loaded"></edit>
	</div>
</template>

<script>

  import create from './create.vue'
	import edit from './edit.vue'
	export default{
		components: {
			create,edit
		},
		data(){
			return{
        job:{},
				errors:{},
				events:{},
        loaded:false,
			}
		},
    created(){
      this.$store.commit('changeCurrentPage', 'jobEvents')
      this.$store.commit('changeCurrentMenu', 'jobsMenu')
    },
    mounted(){
      if(this.$route.query.whereJob===undefined){
        this.$router.push({name:'jobs'});
      }
      this.defSettings();
      this.getJobDetails(this.$route.query.whereJob)
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
      getJobDetails(id){
        axios.get('/jobs/'+id)
        .then((response) => {
          this.job = response.data;
          this.getResults();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      },
			getResults(page = 1) {
				axios.get('/listEvents/'+this.job.id+'?page=' + page)
				.then(response => {
					this.events = response.data;
          this.loaded = true;  
				});
			},
			defSettings(){
        axios.get('/eventStatuses').then(response => this.$store.commit('changeEventStatuses', response.data));
				axios.get('/eventTypes').then(response => this.$store.commit('changeEventTypes', response.data));
				axios.get('/eventVehicles').then(response => this.$store.commit('changeEventVehicles', response.data));
			},
			passData(type,child,id = null){ 
        if(type==='create' || type==='edit'){
          if(type==='edit' && id!==null){
            this.$children[child].getData(id);
          }
          else{
  				  this.$children[child].initializeForm();
            this.$children[child].job = this.job;
          }
          
        }
			}
		}
	}

</script>