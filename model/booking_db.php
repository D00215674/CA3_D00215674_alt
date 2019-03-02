<?php

function get_bookings() {
    global $db;
    $query = 'SELECT * FROM bookings
              ORDER BY booking_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $bookings = $statement->fetchAll();
    $statement->closeCursor();
    return $bookings;
}

function get_booking($booking_id) {
    global $db;
    $query = 'SELECT * FROM bookings
              WHERE booking_id = :booking_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':booking_id', $booking_id);
    $statement->execute();    
    $booking = $statement->fetch();
    $statement->closeCursor();
    return $booking;
}
    
function add_booking($member_id, $booking_date, $booking_time) {
    global $db;
    $query = 'INSERT INTO bookings (member_id, booking_date, booking_time)
              VALUES (:member_id, :booking_date, :booking_time)';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->bindValue(':booking_date', $booking_date);
    $statement->bindValue(':booking_time', $booking_time);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_booking($booking_id) {
    global $db;
    $query = 'DELETE FROM bookings
              WHERE booking_id = :booking_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':booking_id', $booking_id);
    $statement->execute();
    $statement->closeCursor();
}

function update_booking($booking_id, $member_id, $booking_date, $booking_time)
{
    global $db;
    $query = 'UPDATE bookings
            SET member_id = :member_id,
                booking_date = :booking_date,
                booking_time = :booking_time
                WHERE booking_id = :booking_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->bindValue(':booking_date', $booking_date);
    $statement->bindValue(':booking_time', $booking_time);
    $statement->bindValue(':booking_id', $booking_id);
    $statement->execute();
    $statement->closeCursor();            
}

?>