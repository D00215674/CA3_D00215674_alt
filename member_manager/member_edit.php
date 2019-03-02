<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Member</h1>
    <form action="index.php" method="post" id="add_member_form">

        <input type="hidden" name="action" value="update_member">
        
        <input type="hidden" name="member_id"
               value="<?php echo $member['member_id']; ?>">

        <label>New Name:</label>
        <input type="input" name="member_name"
               value="<?php echo $member['member_name']; ?>">
        <br>

        <label>New E-mail:</label>
        <input type="input" name="member_email"
               value="<?php echo $member['member_email']; ?>">
        <br>

        <label>New Address:</label>
        <input type="input" name="member_address"
               value="<?php echo $member['member_address']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_members"> View Member List</a></p>

</main>
<?php include '../view/footer.php'; ?>