<template>
	<div class="card">
		<div class="card-header border-0">
			<div class="row">
				<div class="col-1">
					<router-link :to="{ name: 'jobEdit', params:{ job_id:job_id } }">
						<h3 class="mb-0">Edit Job Details</h3>
					</router-link>
				</div>
				|
				<div class="col-1">
					<router-link :to="{ name: 'jobEvent'}">
						<h3 class="mb-0">Event</h3>
					</router-link>
				</div>
				<div class="col-9 text-right">
					<button class="btn btn-outline-primary" data-toggle="modal" data-target="#addJobEvents" @click="passData()">Add Events</button>
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
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-footer py-4">
			<pagination :data="events" @pagination-change-page="getResults"></pagination>
		</div>
		<create></create>
	</div>
</template>

<script>
	import create from './create.vue'

	export default{
		components: {
			create
		},
		props:['job_id'],
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
			if(this.job_id===undefined){
				// this.$router.push({name:'jobIndex'});
			}
			this.getResults();
			this.defSettings();
		},
		methods:{
			getResults(page = 1) {
				this.$Progress.start();
				axios.get('listEvents/'+this.job_id+'?page=' + page)
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
			passData(){
				this.$children[3].eventStatuses = this.eventStatuses;
				this.$children[3].eventTypes = this.eventTypes;
				this.$children[3].eventVehicles = this.eventVehicles;
				this.$children[3].form.job_id = this.job_id;
			}
		}
	}

</script>