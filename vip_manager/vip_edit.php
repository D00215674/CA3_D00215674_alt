<?php include '../view/header.php'; ?>
<main>
    <h1>Edit VIP Member</h1>
    <form action="index.php" method="post" id="add_vip_form">

        <input type="hidden" name="action" value="update_vip">
        
        <input type="hidden" name="vip_id"
               value="<?php echo $vip['vip_id']; ?>">
        
        <label>Member ID:</label>
        <select name="member_id">
        <?php foreach ( $members as $member ) : ?>
            <option value="<?php echo $member['member_id']; ?>">
                <?php echo $member['member_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>New Name:</label>
        <input type="input" name="vip_name"
               value="<?php echo $vip['vip_name']; ?>">
        <br>

        <label>New E-mail:</label>
        <input type="input" name="vip_email"
               value="<?php echo $vip['vip_email']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_vips"> View VIP Member List</a></p>

</main>
<?php include '../view/footer.php'; ?>