<?php
function get_vip_members() {
    global $db;
    $query = 'SELECT * FROM vip_members
              ORDER BY vip_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $vip_members = $statement->fetchAll();
    $statement->closeCursor();
    return $vip_members;
}

function get_vip_members_by_name() {
    global $db;
    $query = 'SELECT * FROM vip_members
              WHERE member_id = :member_id
              ORDER BY vip_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $vip_members = $statement->fetchAll();
    $statement->closeCursor();
    return $vip_members;
}

function get_vip_member($vip_id) {
    global $db;
    $query = 'SELECT * FROM vip_members
              WHERE vip_id = :vip_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":vip_id", $vip_id);
    $statement->execute();
    $vip_member = $statement->fetch();
    $statement->closeCursor();
    return $vip_member;
}

function delete_vip_member($vip_id) {
    global $db;
    $query = 'DELETE FROM vip_members
              WHERE vip_id = :vip_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vip_id', $vip_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vip_member($member_id, $vip_name, $vip_email) {
    global $db;
    $query = 'INSERT INTO vip_members
                 (member_id, vip_name, vip_email)
              VALUES
                 (:member_id, :vip_name, :vip_email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->bindValue(':vip_name', $vip_name);
    $statement->bindValue(':vip_email', $vip_email);
    $statement->execute();
    $statement->closeCursor();
}

function update_vip($vip_id, $member_id, $vip_name, $vip_email) {
    global $db;
    $query = 'UPDATE vip_members
              SET member_id = :member_id,
                  vip_name = :vip_name,
                  vip_email = :vip_email
               WHERE vip_id = :vip_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->bindValue(':vip_name', $vip_name);
    $statement->bindValue(':vip_email', $vip_email);
    $statement->bindValue(':vip_id', $vip_id);
    $statement->execute();
    $statement->closeCursor();
}
?>