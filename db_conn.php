<?php

$conn = mysqli_connect(
    "localhost",
    "markus",
    "",
    "razorblue_technical_test"
);

if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit;
}