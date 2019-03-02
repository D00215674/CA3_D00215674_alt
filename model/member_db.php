<?php
function get_members() {
    global $db;
    $query = 'SELECT * FROM members
              ORDER BY member_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;
}

function get_member($member_id) {
    global $db;
    $query = 'SELECT * FROM members
              WHERE member_id = :member_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();    
    $member = $statement->fetch();
    $statement->closeCursor();
    return $member;
}

function add_member($member_name, $member_email, $member_address) {
    global $db;
    $query = 'INSERT INTO members (member_name, member_email, member_address)
              VALUES (:member_name, :member_email, :member_address)';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_name', $member_name);
    $statement->bindValue(':member_email', $member_email);
    $statement->bindValue(':member_address', $member_address);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_member($member_id) {
    global $db;
    $query = 'DELETE FROM members
              WHERE member_id = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();
    $statement->closeCursor();
}

function update_member($member_id, $member_name, $member_email, $member_address)
{
    global $db;
    $query = 'UPDATE members
            SET member_name = :member_name,
                member_email = :member_email,
                member_address = :member_address
                WHERE member_id = :member_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_name', $member_name);
    $statement->bindValue(':member_email', $member_email);
    $statement->bindValue(':member_address', $member_address);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();
    $statement->closeCursor();            
}
?>