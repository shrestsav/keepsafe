<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-2">
          <h3 class="mb-0">Invoice</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form>
        <h6 class="heading-small text-muted mb-4">Job Details</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <h4 class="mb-0">
                  Client
                </h4>
                <small>{{jobDetails.client.name}}</small>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <h4 class="mb-0">
                  Address
                </h4>
                <small>{{jobDetails.site_address}}</small>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <h4 class="mb-0">
                  Suburb
                </h4>
                <small>{{jobDetails.suburb}}</small>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <h4 class="mb-0">
                  Job Number
                </h4>
                <small>{{jobDetails.id}}</small>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <h4 class="mb-0">
                  Notes From Pantry List For Invoicing Client
                </h4>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et </small>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Select Events to invoice</h6>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th></th>
                <th>S.No</th>
                <th>Job ID</th>
                <th>Type</th>
                <th>Status</th>
                <th>Boom Lift</th>
                <th>Vehicle</th>
                <th>Date</th>
                <th>Ref</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="event,key in events.data">
                <td>
                  <div class="custom-control custom-checkbox mb-1">
                    <input class="custom-control-input" :id="'customCheck'+event.id" type="checkbox">
                    <label class="custom-control-label" :for="'customCheck'+event.id"></label>
                  </div>
                </td>
                <td>{{++key}}</td>
                <td>{{event.job_id}}</td>
                <td>{{eventTypes[event.type]}}</td>
                <td>{{eventStatuses[event.status]}}</td>
                <td>{{event.boom_lift_req}}</td>
                <td>{{eventVehicles[event.vehicle]}}</td>
                <td>{{event.date}}</td>
                <td>{{event.ref}}</td>
                <td>
                  <a href="#" class="table-action" data-toggle="modal" data-target="#editJobEvents" @click="passData('edit',1,event.id)">
                    <i class="fas fa-edit"></i>
                  </a>
                  <router-link :to="{ name:'invoice', params: { event_id:event.id } }" class="table-action">
                    <i class="fas fa-file-invoice"></i>
                  </router-link>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="events" @pagination-change-page="getJobEvents"></pagination>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Additional Charges</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Callout Description</label>
                <input type="text" id="input-username" class="form-control" placeholder="Callout Description">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Callout Fee</label>
                <input type="email" id="input-email" class="form-control" placeholder="Callout Fee">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Equipment Recovery</label>
                <input type="text" id="input-username" class="form-control" placeholder="Equipment Recovery">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Travel Charge</label>
                <input type="email" id="input-email" class="form-control" placeholder="Travel Charge">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Height/difficulty levy</label>
                <br><span class="text-muted text-sm font-weight-bold">Meter</span>
                <input type="text" id="input-username" class="form-control" placeholder="Meter">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-email">&nbsp</label>
                <br><span class="text-muted text-sm font-weight-bold">Rate</span>
                <input type="email" id="input-email" class="form-control" placeholder="Rate">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-username">On Site Charges</label>
                <br><span class="text-muted text-sm font-weight-bold">Hours</span>
                <input type="text" id="input-username" class="form-control" placeholder="Meter">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-email">&nbsp</label>
                <br><span class="text-muted text-sm font-weight-bold">Rate</span>
                <input type="email" id="input-email" class="form-control" placeholder="Rate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Damage Waiver(%)</label>
                <br><span class="text-muted text-sm font-weight-bold">%</span>
                <input type="text" id="input-username" class="form-control" placeholder="%">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <br>
                <br>
                <br>
                <div class="custom-control custom-checkbox mb-3">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" checked="">
                  <label class="custom-control-label" for="customCheck2">Apply damage waiver to other charge</label>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Discount</label>
                <input type="text" id="input-username" class="form-control" placeholder="Discount">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Description</label>
                <textarea rows="3" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Amount Charged</label>
                <input type="text" id="input-username" class="form-control" placeholder="Amount Charged">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label" for="input-username">NO MIN CHARGE</label>
                <div class="custom-control custom-checkbox mb-3">
                  <input class="custom-control-input" id="customCheck2" type="checkbox" checked="">
                  <label class="custom-control-label" for="customCheck2">This will turn off the minimum 30m charge on the invoice!</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Notes to appear in Invoice - Quote - P/O Request</h6>
        <div class="pl-lg-4">
          <div class="form-group">
            <textarea rows="4" class="form-control" placeholder=""></textarea>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Terms</h6>
        <div class="pl-lg-4">
          <div class="form-group">
            <div class="col-md-6">
              <div class="custom-control custom-radio mb-3">
                <input name="terms" class="custom-control-input" id="end_of_month" type="radio">
                <label class="custom-control-label" for="end_of_month">Payment terms strictly 30 days from end of month</label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input name="terms" class="custom-control-input" id="date_of_invoice" type="radio">
                <label class="custom-control-label" for="date_of_invoice">Payment terms strictly 30 days from date of invoice</label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input name="terms" class="custom-control-input" id="date_of_install" type="radio">
                <label class="custom-control-label" for="date_of_install">Payment terms strictly 7 days from date of install</label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input name="terms" class="custom-control-input" id="installation" type="radio">
                <label class="custom-control-label" for="installation">Payment due on installation</label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input name="terms" class="custom-control-input" id="removal" checked="" type="radio">
                <label class="custom-control-label" for="removal">Payment due on removal</label>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4" @click="toggleHireRate">Hire Rate Charges</h6>
        <div class="pl-lg-4" v-if="hireRate">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Rail</label>
                <input type="text" id="input-username" class="form-control" placeholder="Rail">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Platform</label>
                <input type="email" id="input-email" class="form-control" placeholder="Platform">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Edge Void 1 rail</label>
                <input type="email" id="input-email" class="form-control" placeholder="Edge Void 1 rail">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Edge Void 2 rail</label>
                <input type="email" id="input-email" class="form-control" placeholder="Edge Void 2 rail">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Kickboard</label>
                <input type="email" id="input-email" class="form-control" placeholder="Kickboard">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Meshguard</label>
                <input type="email" id="input-email" class="form-control" placeholder="Meshguard">
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="heading-small text-muted mb-4">Input details from</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-6">
              <div class="custom-control custom-radio mb-3">
                <input name="input_details" class="custom-control-input" id="automatic" type="radio">
                <label class="custom-control-label" for="automatic">Automatic</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="custom-control custom-radio mb-3">
                <input name="input_details" class="custom-control-input" id="manual" checked="" type="radio">
                <label class="custom-control-label" for="manual">Manual</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Equipment Recovery</label>
                <input type="text" id="input-username" class="form-control" placeholder="Equipment Recovery">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Travel Charge</label>
                <input type="email" id="input-email" class="form-control" placeholder="Travel Charge">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

  export default{
    data(){
      return{
        errors:{},
        events:{},
        eventDetails:{},
        jobDetails:{},
        hireRate:false,
      }
    },
    mounted(){
      if(this.$route.query.ofEvent===undefined){
        this.$router.push({name:'allEvent'});
      }
      this.getResults();
      this.defSettings();
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
    methods:{
      getResults() {
        axios.get('detailEvent/'+this.$route.query.ofEvent)
        .then(response => {
          this.eventDetails = response.data;
          this.getJobDetails();
          this.getJobEvents();
        });
      },
      getJobDetails(){
        axios.get('jobs/'+this.eventDetails.job_id)
        .then(response => {
          this.jobDetails = response.data;
        });
      },
      getJobEvents(page = 1) {
        axios.get('listEvents/'+this.eventDetails.job_id+'?page=' + page)
        .then(response => {
          this.events = response.data;
        });
      },
      defSettings(){
        axios.get('eventStatuses').then(response => this.$store.commit('changeEventStatuses', response.data));
        axios.get('eventTypes').then(response => this.$store.commit('changeEventTypes', response.data));
        axios.get('eventVehicles').then(response => this.$store.commit('changeEventVehicles', response.data));
      },
      passData(type,child,id = null){
        if(type==='edit' && id!==null)
          this.$children[child].getData(id);
      },
      toggleHireRate(){
        if(this.hireRate==false)
          this.hireRate = true;
        else
          this.hireRate = false; 
      }
    }
  }

</script>
<style type="text/css" scoped>
  .heading-small:hover{
    cursor: pointer;
  }
</style>