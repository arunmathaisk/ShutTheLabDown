<?php
require 'rb-sqlite.php';
session_start();
if (!isset($_SESSION['AUTH'])) {
    header("location:login.php");
    exit;
}
$cur_dir = getcwd();
$cur_dir = "sqlite:" . $cur_dir . "/stld.db";
R::setup($cur_dir);
$lab = R::dispense('lab');
$lab->name = '';
$lab->number = '';
$lab->status = "awake";
$sr_no = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lab->name = $_POST["lab_name"];
    $lab->number = $_POST["lab_number"];
    R::store($lab);
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Shut The Lab Down</a>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="createnewlab.php">Create Lab</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="deletelabs.php">Delete Labs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
</head>


<body>
    <br><br><br><br>

    <form action="createnewlab.php" method="post">

        <div class="form-group" align="center">
            <label class="form-label mt-4">
                <h2>Create New Lab</h2>
            </label>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" name="lab_number" >
                    <label for="floatingInput">Lab Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="lab_name" >
                    <label for="floatingInput">Lab Name</label>
                </div>
                

                <br>
                <button type="submit" class="btn btn-outline-primary">Create</button>

            </div>
        </div>
    </form>

</body>

</html>