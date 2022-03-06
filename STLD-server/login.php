<?php
session_start();
if (isset($_SESSION['AUTH'])) {
    header("location:index.php");
    exit;
}
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    if (strcmp($password, "royal_stag") == 0) {
        $_SESSION['AUTH'] = "YES";
        header("location:index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <br><br><br><br><br>

    <form action="login.php" method="post">

        <div class="form-group" align="center">
            <label class="form-label mt-4">
                <h2>Shut The Lab Down</h2>
            </label>
           

            <div class="col-lg-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-primary" type="submit">Login</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>