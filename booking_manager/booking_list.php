<?php include '../view/header.php'; ?>
<main>

    <h1>Booking List</h1>

    <section>
        <!-- display a table of products -->
        <h2>Bookings</h2>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Member ID</th>
                <th>Date</th>
                <th class="right">Time</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($bookings as $booking) : ?>
            <tr>
                <td><?php echo $booking['booking_id']; ?></td>
                <td><?php echo $booking['member_id']; ?></td>
                <td><?php echo $booking['booking_date']?></td>
                <td class="right"><?php echo $booking['booking_time']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="booking_id"
                           value="<?php echo $booking['booking_id']; ?>">
                    <input type="hidden" name="booking_id"
                           value="<?php echo $booking['booking_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_booking">
                    <input type="hidden" name="booking_id"
                           value="<?php echo $booking['booking_id']; ?>">
                    <input type="hidden" name="booking_id"
                           value="<?php echo $booking['booking_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Booking</a></p>
        <p><a href="?action=list_bookings">List Bookings</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>