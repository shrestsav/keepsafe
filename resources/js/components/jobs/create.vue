<template>
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Create Job</h3>
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
                  v-model="job[key]"
                  class="form-control" 
                >
                <div class="custom-control custom-checkbox mb-3" v-if="key==='account_limit'">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" checked="" v-model="job['cr_ac_approve']">
                  <label class="custom-control-label" for="customCheck2">Credit Account Approved</label>
                </div>
                <v-select
                  class="form-control"  
                  v-if="item['type']==='select' && key==='client_id'" 
                  v-model="job.client_id" 
                  :options="clients" 
                  :reduce="name => name.id" 
                  label="name" 
                  placeholder="Select Client"
                />
                <v-select
                  multiple
                  class="form-control" 
                  v-if="item['type']==='select' && key==='client_contacts'" 
                  v-model="job.client_contacts" 
                  :options="clientContacts" 
                  :reduce="name => name.id" 
                  label="name" 
                  placeholder="Add Client Contacts"
                  v-on:change="callme()" 
                />
                <select v-if="item['type']==='select' && key==='job_type'" v-model="job.job_type" class="form-control">
                  <option v-for="type,id in job_types" :value="id">{{type}}</option>
                </select>
                <select v-if="item['type']==='select' && key==='status'" v-model="job.status" class="form-control">
                  <option v-for="status,id in job_statuses" :value="id">{{status}}</option>
                </select>
                <date-picker 
                  v-if="item['type']==='date'"  
                  v-model="job[key]"
                  lang='en' 
                  input-class="form-control"
                  valueType="format" 
                ></date-picker>
                <textarea 
                  v-if="item['type']==='textarea' && key==='footnote'" 
                  rows="4" 
                  :class="{'not-validated':errors[key]}" 
                  class="form-control" 
                  placeholder="Beware footnote will appear live in job details on handhelds" 
                  v-model="job.footnote"
                ></textarea>
                <textarea 
                  v-if="item['type']==='textarea' && key==='invoice_note'" 
                  rows="4" 
                  :class="{'not-validated':errors[key]}" 
                  class="form-control" 
                  placeholder="Invoice Note will appear on invoices" 
                  v-model="job.invoice_note"
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
    </div>
    <div class="card-footer text-center">
       <button class="btn btn-outline-primary" @click="save">Save changes</button>
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
        job: {
          job_type:'',
          client_id:'',
          client_contacts:'',
          purchase_order:'',
          location:'',
          site_contact:'',
          site_phone:'',
          suburb:'',
          site_address:'',
          directions:'',
          footnote:'',
          AMORR:'',
          status:'',
          invoice_note:'',
        },
        clients:{},
        clientContacts:{},
        errors:{},
        fields:{
          'Job Information':{
            job_type:{
              display_name:'Job Type',
              col:'4',
              type: 'select',
            },
            client_id:{
              display_name:'Client',
              col:'4',
              type: 'select',
            },
            client_contacts:{
              display_name:'Job Contacts',
              col:'4',
              type: 'select',
            },
            purchase_order:{
              display_name:'Purchase Order',
              col:'4',
              type: 'text',
            },
            location:{
              display_name:'Location',
              col:'3',
              type: 'text',
            },
            site_contact:{
              display_name:'Site Contact',
              col:'3',
              type: 'text',
            },
            site_phone:{
              display_name:'Site Phone',
              col:'3',
              type: 'text',
            },
            suburb:{
              display_name:'Suburb',
              col:'3',
              type: 'text',
            },
            site_address:{
              display_name:'Site Address',
              col:'3',
              type: 'text',
            },
            directions:{
              display_name:'Directions',
              col:'3',
              type: 'text',
            },
            footnote:{
              display_name:'Footnote',
              col:'12',
              type: 'textarea',
            },
          },
          'Job Status':{
            AMORR:{
              display_name:"Approximate M's Of Rail Required",
              col:'6',
              type: 'number',
            },
            status:{
              display_name:'Current Status',
              col:'6',
              type: 'select',
            },
            invoice_note:{
              display_name:'Notes for Invoicing',
              col:'12',
              type: 'textarea',
            },
          },
        }
      }
    },
    mounted(){
      axios.get('/jobs/create')
        .then((response) => {
          this.clients = response.data;
        })
        .catch((error) => {
        })
    },
    methods:{
      getClientContacts(client_id){
        axios.post('/clientContacts',{'client_id':client_id})
          .then((response) => {
            this.clientContacts = response.data;
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            for (var prop in this.errors) {
              showNotify('danger',this.errors[prop])
            }       
          })
      },
      save(){
        axios.post('/jobs',this.$data.job)
        .then((response) => {
          this.$router.push({ path: '/' });
          showNotify('primary','Job Created');
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      }
    },
    computed: {
      client_id() {
        return this.job.client_id;
      }
    },
    watch: {
      client_id(newVal) {
        this.getClientContacts(newVal);
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