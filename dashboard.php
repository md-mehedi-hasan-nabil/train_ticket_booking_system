<?php include './Partials/header.php'; ?>

<body>
    <?php include "./Partials/navigation.php"; ?>
    <div class="container">
        <div class="row mt-4">       

            <?php
            include "./database/config.php";

            if (isset($_SESSION["login_user"])) {
                $user_info = $_SESSION["login_user"];
                $user_email = $user_info["email"];

                $sql = "SELECT * FROM booking WHERE email='$user_email'";

                if ($db_connect == true) {
                    $result = mysqli_query($db_connect, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col col-md-6 my-3">';
                            echo '<div class="card shadow"> <div class="card-body">';
                            echo '<p class="card-title"><b>Date: </b>' . $row["date"] . '</p>';
                            echo '<p class="card-title"><b>Class: </b>' . $row["class_name"] . '</p>';
                            echo '<small>' . $row["email"] . '</small><br/>';
                            echo '<a href=delete.php?booking_id=' . $row["booking_id"] . ' class="btn btn-danger btn-sm">Delete</a>';
                            echo ' </div></div></div>';
                        }
                    } else {
                        echo '<h3 class="text-center">No tickets available</h3>';
                    }
                }
            } else {
                header("Location: login.php");
                exit();
            }
            ?>
        </div> 
    </div>
</body>
<script>
    document.title = "Dashboard Page"
</script>

<?php
include "./Partials/footer.php";

if (!isset($_SESSION["login_user"])) {
    header("Location: login.php");
    exit();
}
    