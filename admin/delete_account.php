<div class="modal fade" id="deleteuser-<?php echo $fetch['user_id'] ?>" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=delete" class="form-horizontal" method="POST">
            <input type="hidden" name="uid" value="<?php echo $fetch['user_id']; ?>" />
            <input type="hidden" name="eid" value="<?php echo $fetch['employee_id']; ?>" />
            <div class="modal-body">
                <p>Do you want to delete <strong><?php echo $fetch['lastname'].', '.$fetch['firstname'].' '.$fetch['middlename'] ?></strong> as an Employee and System User?</p>
            </div>
            <div class="modal-footer">
                <button  class="savebtn" name="delUser"id='deleteuser'>Yes</button>
                <button type="button" class="closebtn" data-bs-dismiss="modal">No</button>
            </div>
        </form>
        </div>
    </div>
</div>