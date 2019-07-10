<template>
  <div class="card">
    <div class="card-header">
      <div class="col-md-4">
        <div class="nav-wrapper">
          <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
              <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Client Details</a>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'clientPantry', query: { whereClient: form.id }}" class="nav-link mb-sm-3 mb-md-0" id="events" data-toggle="tab" href="" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">Pantry List
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div v-for="(section,sec_name,index) in fields">
        <h6 class="heading-small text-muted mb-4">{{sec_name}}</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div :class="'col-lg-'+item['col']" v-for="item,key in section">
              <div class="form-group">
                <label class="form-control-label" :for="'input-'+key">{{item['display_name']}}</label>
                <input 
                  v-if="item['type']==='text' || item['type']==='number'" 
                  :class="{'not-validated':errors[key]}" 
                  :type="item['type']" 
                  :id="'input-'+key" 
                  :placeholder="item['display_name']" 
                  v-model="form[key]"
                  class="form-control" 
                >
                <div class="custom-control custom-checkbox mb-3" v-if="key==='account_limit'">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" checked="" v-model="form['cr_ac_approve']">
                  <label class="custom-control-label" for="customCheck2">Credit Account Approved</label>
                </div>
                <select v-if="item['type']==='select' && key==='state'" v-model="form.state" class="form-control">
                  <option v-for="state,id in states" :value="id">{{state}}</option>
                </select>
                <select v-if="item['type']==='select' && key==='billing_state'" v-model="form.billing_state" class="form-control">
                  <option v-for="state,id in states" :value="id">{{state}}</option>
                </select>
                <date-picker 
                  v-if="item['type']==='date'"  
                  v-model="form[key]"
                  lang='en' 
                  input-class="form-control"
                  valueType="format" 
                ></date-picker>
                <textarea 
                  v-if="item['type']==='textarea'" 
                  rows="4" 
                  :class="{'not-validated':errors[key]}" 
                  class="form-control" 
                  placeholder="Beware footnote will appear live in job details on handhelds" 
                  v-model="form.footnote"
                ></textarea>
                <div class="invalid-feedback" style="display: block;" v-if="errors[key]">
                  {{errors[key][0]}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4"/>
      </div>
      <h6 class="heading-small text-muted mb-4">Client Contacts</h6>
      <div class="row" v-for="(field, index) in form.contacts">
        <div class="col-md-3">
          <div class="form-group">
            <input :class="{'not-validated':errors.contacts}"  type="text" class="form-control" placeholder="Name" v-model="field.name">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Position" v-model="field.position">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone" v-model="field.phone">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Fax" v-model="field.fax">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" v-model="field.email">
          </div>
        </div>
        <div class="col-md-1">
          <button class="btn btn-outline-danger" @click="deleteRow(index)">Delete</button>
        </div>

      </div>
      <button class="btn btn-outline-success" @click="addRow">Add Client Contacts</button>
     
    </div>
    <div class="card-footer text-center">
       <button class="btn btn-outline-primary" @click="update">Update changes</button>
    </div>
  </div>
</template>

<script>

  import vSelect from 'vue-select'
  import 'vue-select/dist/vue-select.css'

  export default{
    components: {
      vSelect
    },
    props: ['job_types','job_statuses'],
    data(){
      return{
        client_id:'',
        states:{},
        form: {
          contacts:[],
        },
        errors:{},
        fields:{},
      }
    },
    created(){
      this.$store.commit('changeCurrentPage', 'editClient')
      this.$store.commit('changeCurrentMenu', 'clientsMenu')
    },
    mounted(){
      if(this.$route.query.whereClient===undefined){
        this.$router.push({name:'clients'});
      }
      else{
        this.client_id = this.$route.query.whereClient;
      }
      this.getClientDetails(this.$route.query.whereClient);
      this.defSettings()
    },
    methods:{
      getClientDetails(id){
        axios.get('/clients/'+id)
        .then((response) => {
          this.form = response.data;
          this.form.contacts = JSON.parse(response.data.contacts);
        })
      },  
      defSettings(){
        axios.get('/states').then(response => this.states = response.data)
        axios.get('/clientDetailsFields').then(response => this.fields = response.data)
      },
      addRow() {
        this.form.contacts.push({
          name: '',
          position: '',
          phone: '',
          fax: '',
          email: '',
        })
      },
      deleteRow(index) {
        this.form.contacts.splice(index,1)
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
<style>
  .not-validated{
    border-color: #fb6340;
  }
  .form-control .vs__dropdown-toggle {
    border: 0px !important;
  }
</style>