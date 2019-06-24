<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">Staffs</h3>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="staff,key in staffs">
            <td>{{++key}}</td>
            <td>{{staff.name}}</td>
            <td>{{staff.email}}</td>
            <td>{{staff.details.contact}}</td>
            <td class="table-actions">
              <a href="#" class="table-action" @click="showDetails(key-1)" data-toggle="modal" data-target="#add_staffs_modal" data-original-title="Edit User Details">
                <i class="fas fa-user"></i>
              </a>
              <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User Details">
                <i class="fas fa-user-edit"></i>
              </a>
              <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                <i class="fas fa-trash"></i>
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
        staffs:{},
      }
    },
    mounted(){
      axios.get('/listStaffs')
        .then((response) => {
          console.log(response)
          this.staffs = response.data;
        })
        .catch((error) => {
        })
    },
    methods:{
      showDetails(key){
        this.$children[0].details = this.staffs[key];
      }
    }
  }

</script>