<?php include './Partials/header.php'; ?>

<body>
    <?php include "./Partials/navigation.php" ?>
    <div class="container">
        <div class="w-50 mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                  class="bg-light p-4 mt-2 rounded">
                <div class=" d-flex justify-content-between gap-3">
                    <div class="mb-3 w-100">
                        <label for="from" class="form-label fw-bold">From</label>
                        <select name="from_station" class=" form-select" aria-label="Default select example">
                            <option selected>From Station</option>
                            <option value="barisal">Barisal</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="dhaka">Dhaka</option>
                            <!--                            <option value="khulna">Khulna</option>
                                                        <option value="rajshahi">Rajshahi</option>
                                                        <option value="rangpur">Rangpur</option>
                                                        <option value="sylhet">Sylhet</option>-->
                        </select>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="to" class="form-label fw-bold">To</label>
                        <select name="to_station" class="form-select" aria-label="Default select example">
                            <option selected>To Station</option>
                            <option value="barisal">Barisal</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="khulna">Khulna</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="rangpur">Rangpur</option>
                            <option value="sylhet">Sylhet</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <div class="mb-3 w-100">
                        <label class="form-label fw-bold">Date of Journey</label>
                        <input name="journey_date" type="date" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="mb-3 w-100">
                        <label class="form-label fw-bold">Choose Class</label>
                        <select name="class_name" class="form-select" aria-label="Default select example">
                            <option selected>Choose a Class</option>
                            <option value="AC_B">AC_B</option>
                            <option value="AC_S">AC_S</option>
                            <option value="SNIGDHA">SNIGDHA</option>
                            <option value="F_BERTH">F_BERTH</option>
                            <option value="F_SEAT">F_SEAT</option>
                            <option value="F_CHAIR">F_CHAIR</option>
                            <option value="S_CHAIR">S_CHAIR</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-danger w-100" type="submit">Find Ticket</button>
            </form>
        </div>
        <div class="mt-5 mx-auto" style="width: 500px">
            <?php
            include "./database/config.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty(trim($_POST["from_station"])) && !empty(trim($_POST["to_station"])) && !empty(trim($_POST["class_name"])) && !empty(trim($_POST["journey_date"]))) {
                    if (trim($_POST["from_station"]) !== trim($_POST["to_station"])) {

                        $from_station = $_POST["from_station"];
                        $to_station = $_POST["to_station"];
                        $class_name = $_POST["class_name"];

                        $sql = "SELECT * FROM train WHERE from_station='$from_station'";

                        if ($db_connect == true) {
                            $result = mysqli_query($db_connect, $sql);
                            $row = $result->fetch_assoc();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo '<div class="card my-3 shadow rounded"> <div class="card-body">';
                                    echo '<h5 class="card-title">' . $row["from_station"] . ' to ' . $row["to_station"] . '</h5>';
                                    echo '<p class="card-text">';
                                    echo 'Date: ' . $_POST["journey_date"] . '<br/>' . 'Class: ' . $_POST["class_name"];
                                    echo '</p>';
                                    echo "</div> <a href=booking.php?id=" . $row["train_id"] . "&journey_date=" . $_POST["journey_date"] . "&class_name=" . $_POST["class_name"] . " class='btn btn-primary btn-sm m-3'>Booking</a> </div>";
                                }
                            }
                        }
                    } else {
                        echo '<div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 m-3 w-25" role="alert">
                                The two stations will not be the same.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                }
            }
            ?>
        </div>
</body>
<script>
    document.title = "Home Page"
</script>

<?php
include './Partials/footer.php';
