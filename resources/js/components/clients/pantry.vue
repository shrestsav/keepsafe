<template>
  <div class="card">
    <div class="card-header">
      <div class="col-md-4">
        <div class="nav-wrapper">
          <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
              <router-link :to="{ name: 'editClient', query: { whereClient: form.id }}" class="nav-link mb-sm-3 mb-md-0" id="events" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Client Details
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Pantry List</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div v-for="(section,sec_name,index) in fields">
        <h6 class="heading-small text-muted mb-4">{{sec_name}}</h6>
        <div class="pl-lg-4">
          <div class="form-group row" v-for="item,key in section">
            <label :for="'input-'+key" class="col-md-3 col-form-label form-control-label">{{item['display_name']}}</label>
            <div class="col-md-5">
              <input 
                v-if="item['type']==='number'"
                :class="{'not-validated':errors[key]}" 
                :placeholder="item['display_name']" 
                :id="'input-'+key"
                v-model="form[key]"
                class="form-control" 
                type="number">
              <textarea 
                v-if="item['type']==='textarea'" 
                rows="4" 
                :class="{'not-validated':errors[key]}" 
                class="form-control" 
                placeholder="Note" 
                v-model="form.footnote"
              ></textarea>
            </div>
            <label class="col-md-2 col-form-label form-control-label">{{defaultPantryPrice[key]}}</label>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
      <button class="btn btn-outline-primary" @click="update">Update changes</button>
    </div>
  </div>
</template>

<script>

  export default{
    data(){
      return{
        client_id:'',
        defaultPantryPrice:{},
        form: {},
        errors:{},
        fields:{},
        clientPantryPrice:{},
      }
    },
    created(){
      this.$store.commit('changeCurrentPage', 'clientPantry')
      this.$store.commit('changeCurrentMenu', 'clientsMenu')
    },
    mounted(){
      if(this.$route.query.whereClient===undefined){
        this.$router.push({name:'clients'});
      }
      else{
        this.client_id = this.$route.query.whereClient;
      }
      this.getClientPantryPrice(this.$route.query.whereClient);
      this.defSettings()
    },
    methods:{
      getClientPantryPrice(id){
        axios.get('/clientPantryPrice/'+id)
        .then((response) => {
          this.form = response.data;
        })
      },  
      defSettings(){
        axios.get('/states').then(response => this.states = response.data)
        axios.get('/pantryPriceListFields').then(response => this.fields = response.data)
        axios.get('/defaultPantryPrice').then(response => this.defaultPantryPrice = response.data)
      },
      update(){
        axios.patch('/clients/'+this.client_id,this.$data.form)
        .then((response) => {
          console.log(response)
          showNotify('primary','Updated')
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      }
    },
  }

</script>
