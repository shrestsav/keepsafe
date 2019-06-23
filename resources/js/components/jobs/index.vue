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
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  export default{
    data(){
      return{
        errors:{},
        jobs:{},
      }
    },
    mounted(){
      axios.get('/listJobs')
        .then((response) => {
          console.log(response)
          this.jobs = response.data;
        })
        .catch((error) => {
        })
    },
  }

</script>