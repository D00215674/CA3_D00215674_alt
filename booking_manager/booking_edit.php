<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Booking</h1>
    <form action="index.php" method="post" id="add_booking_form">

        <input type="hidden" name="action" value="update_booking">
        
        <input type="hidden" name="booking_id"
               value="<?php echo $booking['booking_id']; ?>">
        
        <label>Member ID:</label>
        <select name="member_id">
        <?php foreach ( $members as $member ) : ?>
            <option value="<?php echo $member['member_id']; ?>">
                <?php echo $member['member_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>New Date:</label>
        <input type="input" name="booking_date"
               value="<?php echo $booking['booking_date']; ?>">
        <br>

        <label>New Time<:/label>
        <input type="input" name="booking_time"
               value="<?php echo $booking['booking_time']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_bookings"> View Booking List</a></p>

</main>
<?php include '../view/footer.php'; ?>