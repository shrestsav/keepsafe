<template>
	<div class="modal fade" id="showJobDetails" tabindex="-1" role="dialog" aria-labelledby="add_staffs_modal" aria-hidden="true">
		<div class="modal-dialog modal- modal-dialog-centered modal- modal-fullscreen" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6 class="modal-title" id="modal-title-default">Job Details</h6>
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
                    <p class="form-control" v-if="key!=='job_type' && key!=='status'  && key!=='client_contacts' && key!=='client_id'">{{details[key]}}</p>
                    <p class="form-control" v-if="key==='job_type'">{{jobTypes[details[key]]}}</p>
                    <p class="form-control" v-if="key==='status'">{{jobStatuses[details[key]]}}</p>
		                <p class="form-control" v-if="key==='client_id'">{{details.client.name}}</p>
                    <br v-if="key==='client_contacts'">
                    <button v-if="key==='client_contacts'" type="" class="btn btn-primary btn-sm" v-for="contact in details.contacts">{{contact.name}}</button>
		              </div>
		            </div>
		          </div>
		        </div>
		        <hr v-if="index !== last" class="my-4" />
		      </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default{
		data(){
			return{
        details:{
          client:{},
          contacts:{},
        },
        jobTypes:{},
        jobStatuses:{},
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
      axios.get('/jobTypes')
      .then((response) => {
        this.jobTypes = response.data;
      })
      .catch((error) => {
      })

      axios.get('/jobStatuses')
      .then((response) => {
        this.jobStatuses = response.data;
      })
      .catch((error) => {
      })
    },
    computed: {
      last(){
         return Object.keys(this.fields).length-1;
      }
    },
}

</script>