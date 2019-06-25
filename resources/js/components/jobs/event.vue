<template>
	<div class="card">
		<div class="card-header border-0">
			<div class="row">
				<div class="col-1">
          <h3 class="mb-0">Job</h3>
        </div>
        |
        <div class="col-2">
          <router-link :to="{ name: 'jobEvent'}">
            <h3 class="mb-0">Event</h3>
          </router-link>
          
        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<h3 class="mb-0">Events for Job</h3>
			</div>
		</div>
		<div class="table-responsive">

				
			<table class="table align-items-center table-flush">
				<thead class="thead-light">
					<tr>
						<th>S.No</th>
						<th>Client</th>
						<th>Type</th>
						<th>Status</th>
						<th>Suburb</th>
						<th>Location</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr >
						<td>hdfgh</td>
						<td>hfd</td>
						<td>hdf</td>
						<td>fh</td>
						<td>hdfh</td>
						<td>hfgh</td>
						<td>

						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-footer py-4">
			<pagination :data="jobs" @pagination-change-page="getResults"></pagination>
		</div>
		<show></show>
	</div>
</template>