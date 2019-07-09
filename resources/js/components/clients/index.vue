<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">Clients</h3>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Website</th>
            <th>Suburb</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item,key in clients">
            <td>{{++key}}</td>
            <td>{{item.name}}</td>
            <td>{{item.website}}</td>
            <td>{{item.suburb}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import DatePicker from 'vue2-datepicker'

  export default{
    components: { 
      DatePicker
    },
    data(){
      return{
        errors:{},
        clients:{},
      }
    },
    computed: {
      last(){
         return Object.keys(this.fields).length-1;
      },
    },
    created(){
      this.$store.commit('changeCurrentPage', 'clients')
      this.$store.commit('changeCurrentMenu', 'clientsMenu')
    },
    mounted(){
      axios.get('/clients/create')
        .then((response) => {
          this.clients = response.data;
        })
        .catch((error) => {
        })
    },
    methods:{
      save(){
        axios.post('/createStaff',this.$data.staff)
          .then((response) => {
            showNotify('primary','Staff Created');
            const elem = this.$refs.myBtn
            elem.click()
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            for (var prop in this.errors) {
              showNotify('danger',this.errors[prop])
            }       
          })
      }
    }
  }

</script>