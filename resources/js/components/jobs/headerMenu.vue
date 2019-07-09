<template>
  <div class="vue_menus">
    <span v-if="currentMenu=='dashboardMenu'">
      <router-link :to="{ name:'staffs' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">List Staffs</span>
      </router-link>
      <router-link :to="{ name:'createStaff' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">Add Staff</span>
      </router-link>
    </span>

    <span v-if="currentMenu=='staffsMenu'">
      <router-link :to="{ name:'staffs' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">List Staffs</span>
      </router-link>
      <router-link :to="{ name:'createStaff' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">Add Staff</span>
      </router-link>
    </span>
    <!-- Clients Menus -->
    <span v-if="currentMenu=='clientsMenu'">
      <router-link :to="{ name: 'clients'}" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">Client List</span>
      </router-link>
      <router-link :to="{ name: 'createClient'}" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
        <span class="btn-inner--text">Add Client</span>
      </router-link>
    </span>

    <!-- Jobs Menus -->
    <span v-if="currentMenu=='jobsMenu'">
      <router-link :to="{ name: 'jobs'}" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
        <span class="btn-inner--text">Jobs</span>
      </router-link>
      <router-link :to="{ name: 'createJob' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
        <span class="btn-inner--text">Create Job</span>
      </router-link>
      <router-link :to="{ name: 'events' }" class="btn btn-sm btn-neutral">
        <span class="btn-inner--icon"><i class="fas fa-calendar-alt"></i></span>
        <span class="btn-inner--text">List All Events</span>
      </router-link>
    </span>
  </div>
</template>

<script type="text/javascript">
  
  export default{
    data(){
      return{
        errors:{},
        clients:{},
      }
    },
    computed: {
      currentMenu(){
        return this.$store.state.currentMenu;
      }
    },
    mounted(){
      
    },
    methods:{
    }
  }
</script>