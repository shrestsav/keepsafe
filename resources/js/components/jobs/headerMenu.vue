<template>
  <div>
    <router-link :to="{ name: 'jobIndex'}" class="btn btn-sm btn-neutral">
      <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
      <span class="btn-inner--text">Jobs</span>
    </router-link>
    <router-link :to="{ name: 'jobCreate' }" class="btn btn-sm btn-neutral">
      <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
      <span class="btn-inner--text">Create Job</span>
    </router-link>
    <router-link :to="{ name: 'events' }" class="btn btn-sm btn-neutral">
      <span class="btn-inner--icon"><i class="fas fa-calendar-alt"></i></span>
      <span class="btn-inner--text">List All Events</span>
    </router-link>
  </div>
</template>