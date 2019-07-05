<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">Jobs</h3>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Client</th>
            <th>Type</th>
            <th>Status</th>
            <th>Suburb</th>
            <th>Location</th>
            <th>Events</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="job,key in jobs.data">
            <td>{{++key}}</td>
            <td>{{job.client.name}}</td>
            <td>{{job_types[job.job_type]}}</td>
            <td>{{job_statuses[job.status]}}</td>
            <td>{{job.suburb}}</td>
            <td>{{job.location}}</td>
            <td>{{job.events_count}}</td>
            <td>
              <a href="#" class="table-action" @click="showDetails(key-1)" data-toggle="modal" data-target="#showJobDetails">
                <i class="fas fa-eye"></i>
              </a>
              <router-link :to="{ name: 'jobEdit', query: { whereJob: job.id }  }" class="table-action">
                <i class="fas fa-edit"></i>
              </router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer py-4">
      <pagination :data="jobs" @pagination-change-page="getResults"></pagination>
    </div>
    <show></show>
  </div>
</template>

<script>
  import show from './show.vue'

  export default{
    props:['job_statuses','job_types'],
    components: {
      show
    },
    data(){
      return{
        errors:{},
        jobs:{},
      }
    },
    mounted(){
      this.getResults();
    },
    methods:{
      getResults(page = 1) {
        axios.get('listJobs?page=' + page)
          .then(response => {
            this.jobs = response.data;
          });
      },
      showDetails(key){
        this.$children[1].details = this.jobs.data[key]
      },
    }

  }

</script>