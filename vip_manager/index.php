<?php
require('../model/db_connect.php');
require('../model/member_db.php');
require('../model/vip_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'list_vips';
    }
} 

if ($action == 'list_vips') 
    {
    $vips = get_vip_members();

    include('vip_list.php');
    
} else if ($action == 'view_vips') {
    $vip_id = filter_input(INPUT_GET, 'vip_id', 
            FILTER_VALIDATE_INT);   
        $vips = get_vip_members();
        $vip = get_vip_member($vip_id);

        // Get vip member data
        $member_id = $vip['member_id'];
        $vip_name = $vip['vip_name'];
        $vip_email = $vip['vip_email'];

        include('vip_view.php');
}

else if ($action == 'show_edit_form') {
    $members = get_members();
    $vip_id = filter_input(INPUT_POST, 'vip_id', 
            FILTER_VALIDATE_INT);
    if ($vip_id == NULL || $vip_id == FALSE) {
        $error = "Missing or incorrect vip member id.";
        include('../errors/error.php');
    } else { 
        $vip = get_vip_member($vip_id);
        include('vip_edit.php');
    }
} else if ($action == 'update_vip') {
    $vip_id = filter_input(INPUT_POST, 'vip_id', FILTER_VALIDATE_INT);
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $vip_name = filter_input(INPUT_POST, 'vip_name');
    $vip_email = filter_input(INPUT_POST, 'vip_email');

    // Validate the inputs
    if ($vip_id == NULL || $vip_id == FALSE ||
            $member_id == NULL || $member_id == FALSE ||
            $vip_name == NULL || $vip_name == FALSE || 
            $vip_email == NULL || $vip_email == FALSE) {
        $error = "Invalid vip member data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_vip($vip_id, $member_id, $vip_name, $vip_email);

        // Display the Member List page for the current update
        header("Location: .?vip_id=$vip_id");
    }
} else if ($action == 'delete_vip') {
    $vip_id = filter_input(INPUT_POST, 'vip_id', 
            FILTER_VALIDATE_INT);
    if ($vip_id == NULL || $vip_id == FALSE) {
        $error = "Missing or incorrect vip member id.";
        include('../errors/error.php');
    } else { 
        delete_vip_member($vip_id);
        header("Location: .?vip_id=$vip_id");
    }
} else if ($action == 'show_add_form') {
    $members = get_members();
    include('vip_add.php');
} else if ($action == 'add_vip') {
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $vip_name = filter_input(INPUT_POST, 'vip_name');
    $vip_email = filter_input(INPUT_POST, 'vip_email');
    if ($vip_name == NULL || $vip_email == NULL || $member_id == NULL) {
        $error = "Invalid vip member data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_vip_member($member_id, $vip_name, $vip_email);
        header("Location: .?vip_id=$vip_id");
    }
}
?>