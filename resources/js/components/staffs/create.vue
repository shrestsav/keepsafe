<template>
  <div class="modal fade" id="add_staffs_modal" tabindex="-1" role="dialog" aria-labelledby="add_staffs_modal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal- modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Add New Staff</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" ref="myBtn">
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
                      v-if="item['type']!=='textarea' && item['type']!=='date'" 
                      :class="{'not-validated':errors[key]}" 
                      :type="item['type']" 
                      :id="'input-'+key" 
                      :placeholder="item['display_name']" 
                      v-model="staff[key]"
                      class="form-control" 
                    >
                    <date-picker 
                      v-if="item['type']==='date'"  
                      v-model="staff[key]"
                      lang='en' 
                      input-class="form-control"
                      valueType="format" 
                    ></date-picker>
                    <textarea 
                      v-if="item['type']==='textarea'" 
                      rows="4" 
                      class="form-control" 
                      placeholder="Brief Introduction about staff" 
                      v-model="staff.about"
                    ></textarea>
                    <div class="invalid-feedback" style="display: block;" v-if="errors[key]">
                      {{errors[key][0]}}
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <hr v-if="index !== last" class="my-4" />
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" @click="save">Save changes</button>
          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
        </div>
      </div>
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
        staff: {
          name:'',
          email:'',
          d_o_b:'',
          license_no:'',
          license_expiry:'',
          password:'',
          password_confirmation:'',
          address:'',
          contact:'',
          joined_date:'',
          about:'',
        },
        errors:{},
        fields:{
          'Staff Information':{
            name:{
              display_name:'Full Name',
              col:'6',
              type: 'text',
            },
            email:{
              display_name:'Email Address',
              col:'6',
              type: 'email',
            },
            d_o_b:{
              display_name:'Date of Birth',
              col:'4',
              type: 'date',
            },
            license_no:{
              display_name:'License No',
              col:'4',
              type: 'text',
            },
            license_expiry:{
              display_name:'License Expiry',
              col:'4',
              type: 'date',
            },
            password:{
              display_name:'Password',
              col:'6',
              type: 'password',
            },
            password_confirmation:{
              display_name:'Confirm Password',
              col:'6',
              type: 'password',
            },
          },
          'Contact Information':{
            address:{
              display_name:'Address',
              col:'4',
              type: 'text',
            },
            contact:{
              display_name:'Contact No',
              col:'4',
              type: 'text',
            },
            joined_date:{
              display_name:'Joined Date',
              col:'4',
              type: 'date',
            },
          },
          'About':{
            about:{
              display_name:'About',
              col:'12',
              type: 'textarea',
            },
          },
        }
      }
    },
    computed: {
      last(){
         return Object.keys(this.fields).length-1;
      }
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
<style scoped>
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
</style>