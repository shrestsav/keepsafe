<template>
  <div class="modal fade" id="editJobEvents" tabindex="-1" role="dialog" aria-labelledby="add_staffs_modal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal- modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h6 class="modal-title" id="modal-title-default">Edit Picking Slip Event</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" ref="closeModal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div v-for="(section,sec_name,index) in fields" v-if="(form.job.job_type=='1' && sec_name!=='Brackets Req Const' && sec_name!=='Brackets Req Reno' && sec_name!=='Brackets Req Pole') || (form.job.job_type=='2' && sec_name!=='Brackets Req' && sec_name!=='On Roof Systems') || form.superslip">
            <h6 class="heading-small text-muted mb-4">{{sec_name}}</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div :class="'col-lg-'+item['col']" v-for="item,key in section" v-if="item['type']!=='custom' || form.type=='5'">
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
                    <date-picker 
                      v-if="item['type']==='custom' && key==='off_hired' && form.type=='5'"
                      v-model="form[key]"
                      lang='en' 
                      input-class="form-control"
                      valueType="format" 
                      :class="{'not-validated':errors[key]}" 
                    ></date-picker>
                    <input 
                      v-if="item['type']==='custom' && key==='hire_days' && form.type=='5'" 
                      :class="{'not-validated':errors[key]}" 
                      type="number" 
                      :id="'input-'+key" 
                      :placeholder="item['display_name']" 
                      v-model="form[key]"
                      class="form-control" 
                    >
                    <div v-if="item['type']==='2text'">
                      <input 
                        :class="{'not-validated':errors[key]}" 
                        type="text" 
                        placeholder="25x25s" 
                        v-model="form[key]['25x25s']"
                        class="form-control" 
                      >
                      <input 
                        :class="{'not-validated':errors[key]}" 
                        type="text" 
                        placeholder="30x30s" 
                        v-model="form[key]['30x30s']"
                        class="form-control" 
                      >
                    </div>
                    <div class="col-md-12" v-if="item['type']==='radio'">
                      <div class="custom-control custom-radio mb-3">
                        <input :name="key" class="custom-control-input" id="customRadio5" type="radio" value="1" v-model="form[key]">
                        <label class="custom-control-label" for="customRadio5">{{item['one']}}</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input :name="key" class="custom-control-input" id="customRadio6" type="radio" value="2" v-model="form[key]">
                        <label class="custom-control-label" for="customRadio6">{{item['two']}}</label>
                      </div>
                    </div>
                    <div class="custom-control custom-checkbox mb-3" v-if="item['type']==='checkbox'">
                      <input class="custom-control-input" :id="'customCheck2_'+key" type="checkbox" v-model="form[key]">
                      <label class="custom-control-label" :for="'customCheck2_'+key"></label>
                    </div>
                    <select class="form-control" v-if="key==='status'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="status,key in eventStatuses" :value="key">{{status}}</option>
                    </select>
                    <select class="form-control" v-if="key==='type'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="type,key in eventTypes" :value="key">{{type}}</option>
                    </select>
                    <select class="form-control" v-if="key==='vehicle'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="vehicle,key in eventVehicles" :value="key">{{vehicle}}</option>
                    </select>
                    <select class="form-control" v-if="key==='type_of_install'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="install,key in confSettings.installTypes" :value="key">{{install}}</option>
                    </select>
                    <select class="form-control" v-if="key==='type_of_roof'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="roof,key in confSettings.roofTypes" :value="key">{{roof}}</option>
                    </select>
                    <select class="form-control" v-if="key==='plank_system'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="key in 5" :value="key">{{key}}</option>
                    </select>
                    <select class="form-control" v-if="key==='platform_lengths'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="length,key in confSettings.platformLengths" :value="key">{{length}}</option>
                    </select>
                    <select class="form-control" v-if="key==='pitch'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="pitch,key in confSettings.pitches" :value="key">{{pitch}}</option>
                    </select>
                    <select class="form-control" v-if="key==='height'" v-model="form[key]" :class="{'not-validated':errors[key]}" >
                      <option v-for="height,key in confSettings.heights" :value="key">{{height}}</option>
                    </select>
                    <date-picker 
                      v-if="item['type']==='date'"  
                      v-model="form[key]"
                      lang='en' 
                      input-class="form-control"
                      valueType="format" 
                      :class="{'not-validated':errors[key]}" 
                    ></date-picker>
                    <textarea 
                      v-if="item['type']==='textarea'" 
                      rows="4" 
                      :class="{'not-validated':errors[key]}" 
                      class="form-control" 
                      placeholder="" 
                      v-model="form[key]"
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
        <div class="modal-footer">
          <button class="btn btn-outline-primary" @click="update">Update changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import vSelect from 'vue-select'
  import 'vue-select/dist/vue-select.css'
  import DatePicker from 'vue2-datepicker'

  export default{
    components: {
      vSelect, DatePicker
    },
    data(){
      return{
        form: {
          '6.5s':{
            '25x25s':'',
            '30x30s':'',
          },
          '4.5s':{
            '25x25s':'',
            '30x30s':'',
          },
          '3.25s':{
            '25x25s':'',
            '30x30s':'',
          },
          '2s':{
            '25x25s':'',
            '30x30s':'',
          },
          job:{
            job_type:'',
          }
        },
        confSettings:{
          installTypes:{},
          roofTypes:{},
          pitches:{},
          heights:{},
        },
        errors:{},
        fields:{},
      }
    },
    computed: {
      eventStatuses(){
        return this.$store.state.eventStatuses;          
      },
      eventTypes(){
        return this.$store.state.eventTypes;        
      },
      eventVehicles(){
        return this.$store.state.eventVehicles;
      }
    },
    created(){
    },
    mounted(){
      this.defSettings();
    },
    methods:{
      getData(event_id){
        axios.get('detailEvent/'+event_id).then((response) => {
          this.form = response.data;
          this.initializeForm();
        });
      },
      clearForm(arrSection){
        arrSection.forEach((section) => {
          this.form[section].forEach(function(field){
            console.log(field);
          })
        })
      },
      defSettings(){
        axios.get('installTypes').then(response => this.confSettings.installTypes = response.data);
        axios.get('roofTypes').then(response => this.confSettings.roofTypes = response.data);
        axios.get('pitches').then(response => this.confSettings.pitches = response.data);
        axios.get('heights').then(response => this.confSettings.heights = response.data);
        axios.get('jobEventFields').then(response => this.fields = response.data);
      },
      update(){
        axios.post('/updateEvent',this.$data.form)
        .then((response) => {
          console.log(response.data)
          this.$parent.getResults();
          showNotify('primary','Event has been Updated');
          this.closeModal();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      },
      initializeForm(){
        var json_field_list = {
          'GD_list' : 'General Details',
          'NORR_list' : 'Number of Rails Req',
          'BOMR_list' : 'Breakdown of M Required',
          'UB_list' : 'Universal Brackets',
          'BR_list' : 'Brackets Req',
          'BRC_list' : 'Brackets Req Const',
          'BRR_list' : 'Brackets Req Reno',
          'BRP_list' : 'Brackets Req Pole',
          'ORS_list' : 'On Roof Systems'
        };
        for(var list in json_field_list){ 
          this.form[list] = [];
          for(var field in this.fields[json_field_list[list]]){
            this.form[list].push(field);
          }
        }
        this.form.json_field_list = json_field_list;
        
      },
      closeModal(){
        const elem = this.$refs.closeModal;
        elem.click()
      },
    },
  }

</script>
<style>
  .mx-datepicker{
    width: unset;
    display: unset;
  }
  .mx-datepicker-popup{
    top: 0 !important;
  }
  .not-validated{
    border-color: #fb6340;
  }
  .form-control .vs__dropdown-toggle {
    border: 0px !important;
  }
</style>