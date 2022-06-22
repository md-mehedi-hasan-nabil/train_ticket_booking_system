<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <?php
                session_start();

                if (isset($_SESSION["login_user"])) {
                    $user_info = $_SESSION["login_user"];
                    if (isset($user_info["email"])) {

                        echo '<li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>';

                        echo '<li class="nav-item">
                        <a class="btn btn-danger me-2" href="logout.php">LogOut</a>
                </li>';

                        echo '<li class="nav-item">
                    <button class="btn btn-primary"> ' . $user_info["email"] . '</button>
                </li>';
                    }
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>';
                }

                ?>
            </ul>
        </div>
    </div>
</nav>