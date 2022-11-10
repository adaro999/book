<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT  b.*,concat(c.lastname,', ', c.firstname,' ',c.middlename) as client from `booking_list` b inner join homeowner_user c on b.client_id = c.id where b.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
        $qry2 = $conn->query("SELECT c.*, cc.name as category from `electrician_user` c inner join category_list cc on c.category_id = cc.id where c.id = '{$cab_id}' ");
        if($qry2->num_rows > 0){
            foreach($qry2->fetch_assoc() as $k => $v){
                if(!isset($$k))
                $$k=$v;
            }
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <fieldset class="border-bottom">
            <legend class="h5 text-muted"> Electrician Details</legend>
            <dl>
                <dt class="">Account Number</dt>
                <dd class="pl-4"><?= isset($body_no) ? $body_no : "" ?></dd>
                <dt class="">Job Category</dt>
                <dd class="pl-4"><?= isset($category) ? $category : "" ?></dd>
                <dt class="">Expertise</dt>
                <dd class="pl-4"><?= isset($expertise_text) ? $expertise_text : "" ?></dd>
                <dt class="">Complete Name</dt>
                <dd class="pl-4"><?= isset($electrician_name) ? $electrician_name : "" ?></dd>
                <dt class="">Contact Details</dt>
                <dd class="pl-4"><?= isset($electrician_contact) ? $electrician_contact : "" ?></dd>
                <dt class="">Permanent Address</dt>
                <dd class="pl-4"><?= isset($electrician_address) ? $electrician_address : "" ?></dd>
            </dl>
        </fieldset>
        </div>
        <!-- <div class="clear-fix my-2"></div> -->
        <div class="col-md-6">
            <fieldset class="bor">
                <legend class="h5 text-muted"> Booking Details</legend>
                <dl>
                    <dt class="">Ref. Code</dt>
                    <dd class="pl-4"><?= isset($ref_code) ? $ref_code : "" ?></dd>
                    <dt class="">Household Owner</dt>
                    <dd class="pl-4"><?= isset($client) ? $client : "" ?></dd>
                    <dt class="">Address</dt>
                    <dd class="pl-4"><?= isset($pickup_zone) ? $pickup_zone : "" ?></dd>
                    <dt class="">Job Description</dt>
                    <dd class="pl-4"><?= isset($drop_zone) ? $drop_zone : "" ?></dd>
                    <dt class="">Status</dt>
                    <dd class="pl-4">
                        <?php 
                            switch($status){
                                case 0:
                                    echo "<span class='badge badge-secondary bg-gradient-secondary px-3 rounded-pill'>Pending</span>";
                                    break;
                                case 1:
                                    echo "<span class='badge badge-primary bg-gradient-primary px-3 rounded-pill'>Electrician Confirmed</span>";
                                    break;
                                case 2:
                                    echo "<span class='badge badge-warning bg-gradient-warning px-3 rounded-pill'>In Progress</span>";
                                    break;
                                case 3:
                                    echo "<span class='badge badge-success bg-gradient-success px-3 rounded-pill'>Completed</span>";
                                    break;
                                case 4:
                                    echo "<span class='badge badge-danger bg-gradient-danger px-3 rounded-pill'>Cancelled</span>";
                                    break;
                            }
                        ?>
                    </dd>
                </dl>
            </fieldset>
        </div>
    </div>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-danger btn-flat bg-gradient-red" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
