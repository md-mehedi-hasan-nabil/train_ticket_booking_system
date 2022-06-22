<?php include "./Partials/header.php" ?>

<body>
    <?php include "./Partials/navigation.php" ?>
    <div class="container">
        <h2 class="text-center my-5">Login To your Account</h2>
        <div class="w-50 mx-auto bg-light p-5 rounded">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
                </div>
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
            <p class="text-center my-1">Don’t have an account? <a href="register.php">Create an account</a></p>
        </div>
    </div>
</body>
<script>
document.title = "Login Page"
</script>

<?php include "./Partials/footer.php" ?>

<?php
include "./database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty(trim($_POST["email"])) && !empty(trim($_POST["password"]))) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM register WHERE email='$email'";

        if ($db_connect == true) {
            $result = mysqli_query($db_connect, $sql);
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION["login_user"] = $row;
                header("Location: dashboard.php");
                exit();
            } else {
                echo '<div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 m-3 w-25" role="alert">
                email or password is incorrect.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    }
}

?>