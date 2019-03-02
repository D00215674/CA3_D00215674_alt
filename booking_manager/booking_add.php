<?php include '../view/header.php'; ?>
<main>
    <h1>Add Booking</h1>
    <form action="index.php" method="post" id="add_booking_form">
        <input type="hidden" name="action" value="add_booking">

        <label>Booking:</label>
        <br>

        <label>Member ID:</label>
        <select name="member_id">
        <?php foreach ( $members as $member ) : ?>
            <option value="<?php echo $member['member_id']; ?>">
                <?php echo $member['member_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Date:</label>
        <input type="input" name="booking_date">
        <br>

        <label>Time:</label>
        <input type="input" name="booking_time">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Booking">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_bookings">View Booking List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>