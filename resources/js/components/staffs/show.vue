<template>
	<div class="modal fade" id="add_staffs_modal" tabindex="-1" role="dialog" aria-labelledby="add_staffs_modal" aria-hidden="true">
		<div class="modal-dialog modal- modal-dialog-centered modal- modal-fullscreen" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6 class="modal-title" id="modal-title-default">{{details.name}} Details</h6>
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
		                <p class="form-control" v-if="key==='name' || key==='email'">{{details[key]}}</p>
		                <p class="form-control" v-if="key!=='name' && key!=='email'">{{details.details[key]}}</p>
		              </div>
		            </div>
		          </div>
		        </div>
		        <hr v-if="index !== last" class="my-4" />
		      </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
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
          details:{}
        },
        fields:{
          'Staff Information':{
            name:{
              display_name:'Full Name',
              col:'6',
            },
            email:{
              display_name:'Email Address',
              col:'6',
            },
            d_o_b:{
              display_name:'Date of Birth',
              col:'4',
            },
            license_no:{
              display_name:'License No',
              col:'4',
            },
            license_expiry:{
              display_name:'License Expiry',
              col:'4',
            },
          },
          'Contact Information':{
            address:{
              display_name:'Address',
              col:'4',
            },
            contact:{
              display_name:'Contact No',
              col:'4',
            },
            joined_date:{
              display_name:'Joined Date',
              col:'4',
            },
          },
          'About':{
            about:{
              display_name:'About',
              col:'12',
            },
          },
        },
      }
    },
    computed: {
      last(){
         return Object.keys(this.fields).length-1;
      }
    },
}

</script>