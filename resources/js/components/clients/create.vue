<template>
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Add Client</h3>
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
                  v-model="client[key]"
                  class="form-control" 
                >
                <div class="custom-control custom-checkbox mb-3" v-if="key==='account_limit'">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" checked="" v-model="client['cr_ac_approve']">
                  <label class="custom-control-label" for="customCheck2">Credit Account Approved</label>
                </div>
                <select v-if="item['type']==='select' && key==='state'" v-model="client.state" class="form-control">
                  <option v-for="state,id in states" :value="id">{{state}}</option>
                </select>
                <select v-if="item['type']==='select' && key==='billing_state'" v-model="client.billing_state" class="form-control">
                  <option v-for="state,id in states" :value="id">{{state}}</option>
                </select>
                <date-picker 
                  v-if="item['type']==='date'"  
                  v-model="client[key]"
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
                  v-model="client.footnote"
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
      <div class="row" v-for="(field, index) in client.contacts">
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
       <button class="btn btn-outline-primary" @click="save">Save changes</button>
    </div>
  </div>
</template>

<script>

  export default{
    data(){
      return{
        states:{},
        client: {
          name:'',
          address:'',
          suburb:'',
          state:'',
          postcode:'',
          phone:'',
          fax:'',
          account_limit:'',
          cr_ac_approve:'',
          billing_email:'',
          billing_address:'',
          billing_suburb:'',
          billing_state:'',
          billing_postcode:'',
          website:'',
          abn:'',
          charge_rate:'',
          footnote:'',
          contacts:[],
        },
        errors:{},
        fields:{
          'Client Information':{
            name:{
              display_name:'Client Name',
              col:'4',
              type: 'text',
            },
            address:{
              display_name:'Address',
              col:'4',
              type: 'text',
            },
            suburb:{
              display_name:'Suburb',
              col:'4',
              type: 'text',
            },
            state:{
              display_name:'State',
              col:'3',
              type: 'select',
            },
            postcode:{
              display_name:'Postcode',
              col:'3',
              type: 'text',
            },
            phone:{
              display_name:'Phone',
              col:'3',
              type: 'text',
            },
            fax:{
              display_name:'Fax',
              col:'3',
              type: 'text',
            },
            account_limit:{
              display_name:'Account Limit',
              col:'3',
              type: 'number',
            },
          },
          'Billing Information':{
            billing_email:{
              display_name:'Billing Email',
              col:'4',
              type: 'text',
            },
            billing_address:{
              display_name:'Billing Address',
              col:'4',
              type: 'text',
            },
            billing_suburb:{
              display_name:'Billing Suburb',
              col:'4',
              type: 'text',
            },
            billing_state:{
              display_name:'Billing State',
              col:'4',
              type: 'select',
            },
            billing_postcode:{
              display_name:'Billing Postcode',
              col:'4',
              type: 'text',
            },
          },
          'Other Information':{
            website:{
              display_name:'Website',
              col:'4',
              type: 'text',
            },
            abn:{
              display_name:'A.B.N',
              col:'4',
              type: 'text',
            },
            charge_rate:{
              display_name:'Charge Rate',
              col:'4',
              type: 'number',
            },
            footnote:{
              display_name:'Footnote',
              col:'12',
              type: 'textarea',
            },
          },
        }
      }
    },
    created(){
      this.$store.commit('changeCurrentPage', 'createClient')
      this.$store.commit('changeCurrentMenu', 'clientsMenu')
    },
    mounted() {
      this.defSettings()
    },
    methods:{
      defSettings(){
        axios.get('/states').then(response => this.states = response.data);
      },
      addRow() {
        this.client.contacts.push({
          name: '',
          position: '',
          phone: '',
          fax: '',
          email: '',
        })
      },
      deleteRow(index) {
        this.client.contacts.splice(index,1)
      },
      save(){
        axios.post('/clients',this.$data.client)
          .then((response) => {
            this.$router.push({ name: 'clients' });
            showNotify('primary','Client Created');
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
<style scoped>
  .not-validated{
    border-color: #fb6340;
  }
</style>