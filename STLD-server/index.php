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
$sr_no = 1;
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
  <br><br>
  <div class="form-group" align="center">
    <div class="col-lg-11">
      <table class="table table-hover">
        <thead class="bg-primary">
          <tr>
            <th class="text-secondary" scope="col">SR.NO</th>
            <th class="text-secondary" scope="col">LAB NUMBER</th>
            <th class="text-secondary" scope="col">LAB NAME</th>
            <th class="text-secondary" scope="col">COMMAND</th>
            <th class="text-secondary" scope="col">STATUS</th>
          </tr>
        </thead>
        <?php
        $labs = R::findAll('lab');
        foreach ($labs as $lab) {
        ?>
          <tr class="table-secondary">
            <td><?php echo $sr_no; ?></td>
            <td><?php echo $lab->number; ?></td>
            <td><?php echo $lab->name; ?></td>
            <?php
            if ($lab->status == 'awake') { ?>
              <td><a href="shutdown.php?id=<?php echo $lab->id; ?>">Shutdown</a></td>
            <?php
            } else { ?>
              <td><a href="reset.php?id=<?php echo $lab->id; ?>">Reset</a></td>
            <?php  }

            if ($lab->status == 'awake') { ?>
              <td class="bg-success">Online</td>
            <?php
            } else { ?>
              <td class="bg-danger">Offline</td>
            <?php  }

            ?>
          </tr>
        <?php
          $sr_no++;
        }
        ?>
      </table>
    </div>
  </div>

</body </html>