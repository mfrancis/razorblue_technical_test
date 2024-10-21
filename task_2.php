<?php

include 'db_conn.php';

$db = $conn;

public function ip_search($ipAddress) {
    global $db;

    // Check if the IP Address is valid
    if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
        return false;
    }

    $ipSql = "SELECT ip_address FROM ip_addresses WHERE ip_address LIKE '%$ipAddress%'";

    $runIpSql = mysqli_query($db, $ipSql);
    $totalRows = mysqli_num_rows($runIpSql);
    $list = [];

    if ($totalRows === 0) {
        return false;
    }

    foreach ($runIpSql as $row) {
        $list[] = $row['ip_address'];
    }

    return $list;
}