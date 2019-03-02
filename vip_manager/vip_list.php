<?php include '../view/header.php'; ?>
<main>

    <h1>Member List</h1>

    <section>
        <!-- display a table of vip members -->
        <h2>Members</h2>
        <table>
            <tr>
                <th>VIP ID</th>
                <th>Member ID</th>
                <th>Name</th>
                <th class="right">E-mail</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($vips as $vip) : ?>
            <tr>
                <td><?php echo $vip['vip_id']; ?></td>
                <td><?php echo $vip['member_id']; ?></td>
                <td><?php echo $vip['vip_name']?></td>
                <td class="right"><?php echo $vip['vip_email']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="vip_id"
                           value="<?php echo $vip['vip_id']; ?>">
                    <input type="hidden" name="vip_id"
                           value="<?php echo $vip['vip_id']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_vip">
                    <input type="hidden" name="vip_id"
                           value="<?php echo $vip['vip_id']; ?>">
                    <input type="hidden" name="vip_id"
                           value="<?php echo $vip['vip_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add VIP Member</a></p>
        <p><a href="?action=list_members">List VIP Members</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>