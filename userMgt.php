<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Information Management</title>
    <link href="../assets/images/logo.png" rel="shortcut icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom style -->
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="userMgt.php">Resume Content Management</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="userMgt.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listJobs.php" >Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviewCV.php" >Preview</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container" id="main-content">
      <div class="row">
        <div class="col-6 no-padding">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search by name ..." />
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i> Search
            </button>
          </form>
        </div>

        <div class="col-6 no-padding">
          <a href="./form.php" class="btn btn-success float-right">
            <i class="fa fa-plus-square"></i> New Job
          </a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="table-responsive">
          <h5>List of information</h5>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
      require_once("./entities/user.class.php");

      $users = users::list_users();

      foreach($users as $user){
        echo "<tr>";
        echo "<th scope='row'>".$user['ID']."</th>";
        echo "<td>".$user['fullName']."</td>";
        echo "<td>".$user['dob']."</td>";
        echo "<td>".$user['phone']."</td>";
        echo "<td>".$user['email']."</td>";
        echo "<td>";
        echo "<a href='#' class='mr-sm-2 text-primary'><i class='fa fa-pencil'></i></a>";
        echo "<a href='#' class='text-danger'><i class='fa fa-trash'></i></a>";
        echo "</td>";
        echo "</tr>";
      }
  ?>

            
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.container -->

    <footer class="container">
      <strong>&copy;2022 - NGUYEN LE ANH MINH</strong>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
