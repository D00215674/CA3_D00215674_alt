<?php include '../view/header.php'; ?>
<main>
    <h1>Add Member</h1>
    <form action="index.php" method="post" id="add_member_form">
        <input type="hidden" name="action" value="add_member">

        <label>Member:</label>
        <br>

        <label>Name:</label>
        <input type="input" name="member_name">
        <br>

        <label>Email:</label>
        <input type="input" name="member_email">
        <br>

        <label>Address:</label>
        <input type="input" name="member_address">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Member">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_members">View Member List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>