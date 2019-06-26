<template>
  <div class="modal fade" id="addJobEvents" tabindex="-1" role="dialog" aria-labelledby="add_staffs_modal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal- modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h6 class="modal-title" id="modal-title-default">Picking Slip Event</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" ref="closeModal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
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
                      <input class="custom-control-input" :id="'customCheck2_'+key" type="checkbox" checked="" v-model="form[key]">
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
          <button class="btn btn-outline-primary" @click="resetForm">Reset</button>
          <button class="btn btn-outline-primary" @click="save">Save changes</button>
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
          job_id:'',
        },
        confSettings:{
          installTypes:{},
          roofTypes:{},
          platformLengths:{},
          pitches:{},
          heights:{},
        },
        eventStatuses:{},
        eventTypes:{},
        eventVehicles:{},
        errors:{},
        fields:{
          'Job Details':{
            priority:{
              display_name:'Priority',
              col:'1',
              type: 'number',
            },
            superslip:{
              display_name:'Superslip',
              col:'1',
              type: 'checkbox',
            },
            date:{
              display_name:'Date',
              col:'2',
              type: 'date',
            },
            status:{
              display_name:'Status',
              col:'2',
              type: 'select',
            },
            type:{
              display_name:'Type',
              col:'2',
              type: 'select',
            },
            vehicle:{
              display_name:'Vehicle',
              col:'2',
              type: 'select',
            },
            boom_lift_req:{
              display_name:'Keepsafe Boom Lift Req',
              col:'2',
              type: 'checkbox',
            },
            rail_rate:{
              display_name:'Charge Rail Rate',
              col:'2',
              type: 'number',
            },
            platform_rate:{
              display_name:'Charge Rate Platform',
              col:'2',
              type: 'number',
            },
            int_platform_rate:{
              display_name:'Charge Rate Int. Platform',
              col:'2',
              type: 'number',
            },
            purchase_order:{
              display_name:'Purchase Order',
              col:'2',
              type: 'text',
            },
            ref:{
              display_name:'Ref',
              col:'2',
              type: 'text',
            },
            location:{
              display_name:'Location',
              col:'2',
              type: 'text',
            },
            note:{
              display_name:'Note, (available upon log-in)',
              col:'6',
              type: 'textarea',
            },
          },
          'General Details':{
            type_of_install:{
              display_name:"Type of Install",
              col:'2',
              type: 'select',
            },
            type_of_roof:{
              display_name:'Type of Roof',
              col:'2',
              type: 'select',
            },
            edge_protection_required:{
              display_name:'Edge protection required',
              col:'1',
              type: 'checkbox',
            },
            platform_required:{
              display_name:'Platform Required',
              col:'1',
              type: 'checkbox',
            },
            plank_system:{
              display_name:'Plank System',
              col:'2',
              type: 'select',
            },
            platform_lengths:{
              display_name:'Platform lengths',
              col:'2',
              type: 'select',
            },
            total_m_Rail:{
              display_name:"Total M's Rail",
              col:'2',
              type: 'number',
            },
            total_m_std_platform:{
              display_name:"Total M's STD Platform",
              col:'2',
              type: 'number',
            },
            total_m_internal_platform:{
              display_name:"Total M's Internal Platform",
              col:'2',
              type: 'number',
            },
            total_m_edge_void_1_rail:{
              display_name:"Total M's Edge Void 1 Rail",
              col:'2',
              type: 'number',
            },
            total_m_edge_void_2_rail:{
              display_name:"Total M's Edge Void 2 Rail",
              col:'2',
              type: 'number',
            },
            total_m_mesh_guard:{
              display_name:"Total M's Mesh Gaurd",
              col:'2',
              type: 'number',
            },
            total_m_kickboards:{
              display_name:"Total M's Kickboards",
              col:'2',
              type: 'number',
            },
            platform_charge_type:{
              display_name:"Platform Charge Type",
              col:'2',
              type: 'radio',
              one: 'Commercial',
              two: 'Domestic',
            },
            pitch:{
              display_name:"Pitch",
              col:'2',
              type: 'select',
            },
            height:{
              display_name:"Height",
              col:'2',
              type: 'select',
            },
            install_sign:{
              display_name:"Install Sign",
              col:'1',
              type: 'checkbox',
            },
            install_banner:{
              display_name:"Install Banner",
              col:'1',
              type: 'checkbox',
            },
            panel_patch:{
              display_name:"Panel Patch",
              col:'1',
              type: 'checkbox',
            },
            strapping_tools_etc:{
              display_name:"Strapping Tools etc",
              col:'1',
              type: 'checkbox',
            },
            extension_ladder:{
              display_name:"Extension Ladder",
              col:'1',
              type: 'checkbox',
            },
            step_ladder:{
              display_name:"Step Ladder",
              col:'1',
              type: 'checkbox',
            },
          },
        }
      }
    },
    mounted(){
      this.defSettings();
    },
    methods:{
      defSettings(){
        axios.get('installTypes').then(response => this.confSettings.installTypes = response.data);
        axios.get('roofTypes').then(response => this.confSettings.roofTypes = response.data);
        axios.get('platformLengths').then(response => this.confSettings.platformLengths = response.data);
        axios.get('pitches').then(response => this.confSettings.pitches = response.data);
        axios.get('heights').then(response => this.confSettings.heights = response.data);
      },
      save(){
        axios.post('/storeEvent',this.$data.form)
        .then((response) => {
          this.$parent.getResults();
          showNotify('primary','Event has been Created');
          this.resetForm();
          this.closeModal();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      },
      closeModal(){
        const elem = this.$refs.closeModal;
        elem.click()
      },
      resetForm(){
        this.$data.form = {
          job_id:'',
        };
      }
    },
    computed: {

    },
    watch: {
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