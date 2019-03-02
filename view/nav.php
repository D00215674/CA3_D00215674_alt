<nav>
    <ul>
        <!-- display links for all categories -->
        <?php foreach($members as $member) : ?>
        <li>
            <a href="?member_id=<?php 
                      echo $member['member_id']; ?>">
                <?php echo $member['member_name']; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>