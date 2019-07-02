<template>
	<div class="card">
		<div class="card-header border-0">
			<div class="row">
				<div class="col-2">
					<router-link :to="{ name: 'jobEdit', params:{ job_id:job.id } }">
						<h3 class="mb-0">Edit Job Details</h3>
					</router-link>
				</div>
				|
				<div class="col-2">
					<router-link :to="{ name: 'jobEvent'}">
						<h3 class="mb-0">Event</h3>
					</router-link>
				</div>
				<div class="col-7 text-right">
					<button class="btn btn-outline-primary" data-toggle="modal" data-target="#addJobEvents" @click="passData('create',3)">Add Events</button>
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
							<a href="#" class="table-action" data-toggle="modal" data-target="#editJobEvents" @click="passData('edit',4,event.id)">
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
    <create></create>
		<edit></edit>
	</div>
</template>

<script>

  import create from './create.vue'
	import edit from './edit.vue'
	export default{
		components: {
			create,edit
		},
		props:['job'],
		data(){
			return{
				errors:{},
				events:{},
				eventStatuses:{},
				eventTypes:{},
				eventVehicles:{},
			}
		},
		mounted(){
			if(this.job===undefined){
				this.$router.push({name:'jobIndex'});
			}
			this.getResults();
			this.defSettings();
		},
		methods:{
			getResults(page = 1) {
				this.$Progress.start();
				axios.get('listEvents/'+this.job.id+'?page=' + page)
				.then(response => {
					this.$Progress.finish();
					this.events = response.data;
				});
			},
			defSettings(){
				axios.get('eventStatuses').then(response => this.eventStatuses = response.data);
				axios.get('eventTypes').then(response => this.eventTypes = response.data);
				axios.get('eventVehicles').then(response => this.eventVehicles = response.data);
			},
			passData(type,child,id = null){
        if(type==='create' || type==='edit'){
  				this.$children[child].eventStatuses = this.eventStatuses;
  				this.$children[child].eventTypes = this.eventTypes;
  				this.$children[child].eventVehicles = this.eventVehicles;
  				this.$children[child].job = this.job;
          if(type==='edit' && id!==null)
            this.$children[child].getData(id);
          else
  				  this.$children[child].initializeForm();
          
        }
			}
		}
	}

</script>