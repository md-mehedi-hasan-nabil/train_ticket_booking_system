<?php

include "./database/config.php";

session_start();

if (isset($_SESSION["login_user"])) {
    $user_info = $_SESSION["login_user"];
    $user_email = $user_info["email"];

    $train_id = $_GET["id"];
    $journey_date = $_GET["journey_date"];
    $class_name = $_GET["class_name"];

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "INSERT INTO booking (date, class_name, email) VALUES ( '$journey_date', '$class_name', '$user_email')";

        if ($db_connect == true) {

            $result = mysqli_query($db_connect, $sql);

            if ($result) {
                header("Location: dashboard.php");
                exit();
            }
        }
    }
} else {
    header("Location: login.php");
    exit();
}


include './Partials/footer.php';

