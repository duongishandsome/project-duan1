<?php
function get_all_user_customer() {
    $sql = "select user_id, user_name, user_email, user_phone, user_status, role_name 
            from user left join user_role on user.role_id = user_role.role_id where role_name = 'Customer'  order by user_id asc";
    $list_user = pdo_query($sql);
    return $list_user;
}

function get_all_user_admin() {
    $sql = "select user_id, user_name, user_email, user_phone, user_status, role_name 
            from user left join user_role on user.role_id = user_role.role_id where role_name = 'Admin'  order by user_id asc";
    $list_user = pdo_query($sql);
    return $list_user;
}

function get_role() {
    $sql = "select * from user_role order by role_id desc";
    $list_role = pdo_query($sql);
    return $list_role;
}

function delete_user($id) {
    $sql1 = "DELETE FROM `comment` WHERE user_id=" . $id;
    pdo_execute($sql1);

    $sql2 = "DELETE FROM `order` WHERE user_id=" . $id;
    pdo_execute($sql2);

    $sql = "delete from user where user_id=" . $id;
    pdo_execute($sql);
}

function insert_user($username,  $email, $phone, $password, $status, $role)
{
    $sql = "insert into user(user_name, user_email, user_phone,user_password, user_status, role_id) 
            values('$username', '$email', '$phone', '$password', '$status', $role)";
    pdo_execute($sql);
}

function update_user_status($id) {
    $sql = "UPDATE user SET user_status = CASE
                WHEN user_status = 0 THEN 1
                WHEN user_status = 1 THEN 0
                ELSE user_status
            END where user_id=$id";
    pdo_execute($sql);
}


?>