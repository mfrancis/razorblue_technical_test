<?php

include 'db_conn.php';

$db = $conn;

public function sqlTask() {
    global $db;

    $sql = "
        SELECT users.username, 
            SUM(orders.amount) as total_amount 
        FROM 
            users 
        LEFT JOIN 
            orders 
        ON 
            users.id = orders.user_id 
        ORDER BY total_amount DESC";

    return $db->query($sql);
}