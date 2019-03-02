 <?php include '../view/header.php'; ?>
<main>

    <h1>Member List</h1>

    <section>
        <!-- display a table of products -->
        <h2>Members</h2>
        <table>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th class="right">Address</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($members as $member) : ?>
            <tr>
                <td><?php echo $member['member_id']; ?></td>
                <td><?php echo $member['member_name']; ?></td>
                <td><?php echo $member['member_email']?></td>
                <td class="right"><?php echo $member['member_address']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['member_id']; ?>">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['member_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_member">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['member_id']; ?>">
                    <input type="hidden" name="member_id"
                           value="<?php echo $member['member_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Member</a></p>
        <p><a href="?action=list_members">List Members</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>