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
            <th>Location</th>
            <th>Suburb</th>
            <th>Footnote</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item,key in jobs">
            <td>{{++key}}</td>
            <td>{{item.location}}</td>
            <td>{{item.suburb}}</td>
            <td>{{item.footnote}}</td>
            <td>
              <a href="#" class="table-action" @click="showDetails(key-1)" data-toggle="modal" data-target="#showJobDetails">
                <i class="fas fa-eye"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <show></show>
  </div>
</template>

<script>
  import show from './show.vue'

  export default{
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
      this.$Progress.start();
      axios.get('/listJobs')
        .then((response) => {
          console.log(response)
          this.jobs = response.data;
          this.$Progress.finish();
        })
        .catch((error) => {
        })
    },
    methods:{
      showDetails(key){
        this.$children[0].details = this.jobs[key]
      }
    }

  }

</script>