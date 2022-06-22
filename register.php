<?php include "./Partials/header.php" ?>

<body class="position-relative" style="min-height: 100vh;">
    <?php include "./Partials/navigation.php" ?>
    <div class="container">
        <h2 class="text-center my-4">Create an Account</h2>
        <div class="w-50 mx-auto bg-light p-5 rounded">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required />
                </div>
                <div class="mb-3">
                    <label class="form-label  fw-bold">Phone:</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" required />
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
                </div>
                <button class="btn btn-primary w-100" type="submit">Register</button>
            </form>
            <p class="text-center my-1">Already have an account? <a href="login.php">Sign In</a>
        </div>
    </div>
</body>

<script>
    document.title = "Register Page";
</script>

<?php include "./Partials/footer.php" ?>

<?php
include "./database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty(trim($_POST["name"])) && !empty(trim($_POST["email"])) && !empty(trim($_POST["phone"])) && !empty(trim($_POST["password"]))) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO register (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hash_password')";

        if ($db_connect == true) {
            $email_sql = "SELECT * FROM register WHERE email='$email'";
            $email_result = mysqli_query($db_connect, $email_sql);
            $email_row = $email_result->fetch_assoc();

            // Let's check if the database receives the same email
            if ($email_row) {
                echo '<div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 m-3 w-25" role="alert">
                This email already used. try another email.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } else {
                // if the email is not found then create a new user
                $result = mysqli_query($db_connect, $sql);

                if ($result) {
                    echo '<div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 m-3 w-25" role="alert">
                New User Create Successful.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                    header("Location: login.php");
                    exit();
                }
            }
        }
    } else {
        echo '<div class="alert alert-primary alert-dismissible fade show position-absolute bottom-0 end-0 m-3 w-25" role="alert">
                Fields required.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>