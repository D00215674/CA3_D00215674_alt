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
        $action = 'list_members';
    }
} 

if ($action == 'list_members') 
    {
    $members = get_members();

    include('member_list.php');
    
} else if ($action == 'view_members') {
    $member_id = filter_input(INPUT_GET, 'member_id', 
            FILTER_VALIDATE_INT);   
        $members = get_members();
        $member = get_member($member_id);

        // Get member data
        $member_name = $member['member_name'];
        $member_email = $member['member_email'];
        $member_address = $member['member_address'];

        include('member_view.php');
}

else if ($action == 'show_edit_form') {
    $member_id = filter_input(INPUT_POST, 'member_id', 
            FILTER_VALIDATE_INT);
    if ($member_id == NULL || $member_id == FALSE) {
        $error = "Missing or incorrect member id.";
        include('../errors/error.php');
    } else { 
        $member = get_member($member_id);
        include('member_edit.php');
    }
} else if ($action == 'update_member') {
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $member_name = filter_input(INPUT_POST, 'member_name');
    $member_email = filter_input(INPUT_POST, 'member_email');
    $member_address = filter_input(INPUT_POST, 'member_address');

    // Validate the inputs
    if ($member_id == NULL || $member_id == FALSE ||
            $member_name == NULL || $member_name == FALSE || 
            $member_email == NULL || $member_email == FALSE || 
            $member_address == NULL || $member_address == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_member($member_id, $member_name, $member_email, $member_address);

        // Display the Member List page for the current update
        header("Location: .?member_id=$member_id");
    }
} else if ($action == 'delete_member') {
    $member_id = filter_input(INPUT_POST, 'member_id', 
            FILTER_VALIDATE_INT);
    if ($member_id == NULL || $member_id == FALSE) {
        $error = "Missing or incorrect member id.";
        include('../errors/error.php');
    } else { 
        delete_member($member_id);
        header("Location: .?member_id=$member_id");
    }
} else if ($action == 'show_add_form') {
    $members = get_members();
    include('member_add.php');
} else if ($action == 'add_member') {
    $member_name = filter_input(INPUT_POST, 'member_name');
    $member_email = filter_input(INPUT_POST, 'member_email');
    $member_address = filter_input(INPUT_POST, 'member_address');
    if ($member_name == NULL || $member_email == NULL || $member_address == NULL) {
        $error = "Invalid member data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_member($member_name, $member_email, $member_address);
        header("Location: .?member_id=$member_id");
    }
}
?>