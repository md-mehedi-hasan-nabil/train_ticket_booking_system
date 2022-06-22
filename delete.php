<?php

include "./database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $booking_id = $_GET["booking_id"];

    if ($db_connect == true) {
        $sql = "DELETE FROM booking WHERE booking_id='$booking_id'";
        $result = mysqli_query($db_connect, $sql);
        if ($result) {
            header("Location: dashboard.php");
            exit();
        }
    }
}

