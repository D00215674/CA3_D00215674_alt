<?php include '../view/header.php'; ?>
<main>
    <h1>Add VIP Member</h1>
    <form action="index.php" method="post" id="add_vip_form">
        <input type="hidden" name="action" value="add_vip">

        <label>Member ID:</label>
        <select name="member_id">
        <?php foreach ( $members as $member ) : ?>
            <option value="<?php echo $member['member_id']; ?>">
                <?php echo $member['member_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="input" name="vip_name">
        <br>

        <label>E-mail:</label>
        <input type="input" name="vip_email">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vip">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_vips">View VIP Member List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>