<?php
require('../model/db_connect.php');
require('../model/member_db.php');
require('../model/vip_db.php');
require('../model/booking_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'list_bookings';
    }
} 

if ($action == 'list_bookings') 
    {
    $bookings = get_bookings();

    include('booking_list.php');
    
} else if ($action == 'view_bookings') {
    $booking_id = filter_input(INPUT_GET, 'booking_id', 
            FILTER_VALIDATE_INT);   
        $bookings = get_bookings();
        $booking = get_booking($booking_id);

        // Get booking data
        $member_id = $booking['member_id'];
        $booking_date = $booking['booking_date'];
        $booking_time = $booking['booking_time'];

        include('booking_view.php');
}

else if ($action == 'show_edit_form') {
    $members = get_members();
    $bookings = get_bookings();
    $booking_id = filter_input(INPUT_POST, 'booking_id', 
            FILTER_VALIDATE_INT);
    if ($booking_id == NULL || $booking_id == FALSE) {
        $error = "Missing or incorrect booking id.";
        include('../errors/error.php');
    } else { 
        $booking = get_booking($booking_id);
        include('booking_edit.php');
    }
} else if ($action == 'update_booking') {
    $booking_id = filter_input(INPUT_POST, 'booking_id', FILTER_VALIDATE_INT);
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $booking_date = filter_input(INPUT_POST, 'booking_date');
    $booking_time = filter_input(INPUT_POST, 'booking_time');

    // Validate the inputs
    if ($booking_id == NULL || $booking_id == FALSE ||
            $member_id == NULL || $member_id == FALSE ||
            $booking_date == NULL || $booking_date == FALSE || 
            $booking_time == NULL || $booking_time == FALSE) {
        $error = "Invalid booking data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_booking($booking_id, $member_id, $booking_date, $booking_time);

        // Display the Booking List page for the current update
        header("Location: .?booking_id=$booking_id");
    }
} else if ($action == 'delete_booking') {
    $booking_id = filter_input(INPUT_POST, 'booking_id', 
            FILTER_VALIDATE_INT);
    if ($booking_id == NULL || $booking_id == FALSE) {
        $error = "Missing or incorrect booking id.";
        include('../errors/error.php');
    } else { 
        delete_booking($booking_id);
        header("Location: .?booking_id=$booking_id");
    }
} else if ($action == 'show_add_form') {
    $members = get_members();
    include('booking_add.php');
} else if ($action == 'add_booking') {
    $member_id = filter_input(INPUT_POST, 'member_id', FILTER_VALIDATE_INT);
    $booking_date = filter_input(INPUT_POST, 'booking_date');
    $booking_time = filter_input(INPUT_POST, 'booking_time');
    if ($member_id == NULL || $booking_date == NULL || $booking_time == NULL) {
        $error = "Invalid booking data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_booking($member_id, $booking_date, $booking_time);
        header("Location: .?booking_id=$booking_id");
    }
}
?>