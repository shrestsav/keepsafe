<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="nav-wrapper">
        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
          <li class="nav-item" v-for="status,key in job_statuses_menu">
            <a class="nav-link mb-sm-3 mb-md-0" :class="key=='1' ? 'active' : ''" :id="key" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false" @click="getJobs(key)">{{status}}</a>
          </li>
        </ul>
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
              <span v-if="!deletedList">
                <a href="#" class="table-action" @click="showDetails(key-1)" data-toggle="modal" data-target="#showJobDetails" title="Show Job Details">
                  <i class="fas fa-eye"></i>
                </a>
                <router-link :to="{ name: 'jobEdit', query: { whereJob: job.id }  }" class="table-action" title="Edit Job">
                  <i class="fas fa-edit"></i>
                </router-link>
                <a href="#" class="table-action" @click="deleteJob(job.id)" title="Delete Job">
                  <i class="fas fa-trash"></i>
                </a>
              </span>
              <span v-if="deletedList">
                <a href="#" class="table-action" @click="restoreJob(job.id)" title="Restore Job">
                  <i class="fas fa-trash-restore"></i>
                </a>
              </span>
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
    props:['job_statuses','job_types','job_statuses_menu'],
    components: {
      show
    },
    data(){
      return{
        selectedStatus:'1', 
        errors:{},
        jobs:{},
        deletedList:false,
      }
    },
    mounted(){
      this.getResults();
    },
    methods:{
      getResults(page = 1) {
        if(this.deletedList)
          var route = 'deletedJobs';
        else
          var route = 'listJobs/'+this.selectedStatus;
        axios.get(route+'?page=' + page)
        .then(response => {
          this.jobs = response.data;
        });

      },
      showDetails(key){
        this.$children[1].details = this.jobs.data[key]
      },
      getJobs(key){        
        if(key==14)
          this.deletedList = true;
        else
          this.deletedList = false;
        this.selectedStatus = key;
        this.getResults();

      },
      deleteJob(key){
        this.$swal({
          type: 'error',
          title: 'Are you Sure you want to delete?',
          confirmButtonText:'Go Ahead',
          showCancelButton: true
        }).then((result) => {
          if(result.value){
            axios.delete('jobs/'+key)
            .then(response => {
              this.getResults();
              showNotify('success','Job '+key+' has been deleted successfully')
            });
          }
        })
      },
      restoreJob(key){
        this.$swal({
          type: 'error',
          title: 'Are you Sure you want to restore?',
          confirmButtonText:'Go Ahead',
          showCancelButton: true
        }).then((result) => {
          if(result.value){
            axios.post('restoreJob',{job_id:key})
            .then(response => {
              this.getResults();
              showNotify('success','Job '+key+' has been deleted successfully')
            });
          }
        })
      }
    }

  }

</script>
<style type="text/css">
  .table td, .table th {
    padding: 0.8rem;
  }
  .nav-pills .nav-item:not(:last-child) {
    padding-right: unset;
  }
  .nav-pills .nav-link {
    border-radius: unset;
  }
  .nav-wrapper{
    padding: unset;
  }
</style>