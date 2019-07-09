<template>
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-primary">
        <div class="card-body">
          <div class="text-center">
            <h5 class="h3 text-white mb-0">WELCOME TO THE DASHBOARD OF KEEPSAFE</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default{
    created(){
      this.$store.commit('changeCurrentPage', 'dashboard')
      this.$store.commit('changeCurrentMenu', 'dashboardMenu')
    }
  }

</script>