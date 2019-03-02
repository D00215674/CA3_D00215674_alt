<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Members</h2>
        <?php include '../view/nav.php'; ?>        
    </aside>
    <section>
        <ul class="nav">
            <!-- display links for products in selected category -->
            <li>
                <a href="?action=view_member&amp;member_id=<?php 
                          echo $member_name['member_id']; ?>">
                    <?php echo $member_name['member_name']; ?>
                    <?php echo $member_name['member_email']?>
                    <?php echo $member_name['member_address']?>
                </a>
            </li>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>