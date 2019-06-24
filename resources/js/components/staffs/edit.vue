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
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" @click="save">Save changes</button>
          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>