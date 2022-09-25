<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Job Management</title>
    <link href="../assets/images/logo.png" rel="shortcut icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom style -->
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Resume Content Management</a>
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
          <a href="formJob.php" class="btn btn-success float-right">
            <i class="fa fa-plus-square"></i> New contact
          </a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="table-responsive">
          <h5>List of jobs</h5>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Company</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
      require_once("./entities/jobs.class.php");

      $jobs = Jobs::list_jobs();

      if(isset($_POST["btnDelete"])){
        $idDelete = $_POST['id'];
        echo "ID: ".$idDelete;
        $result = Jobs::delete($idDelete);

        //Failure catching
        if(!$result)
        {
        header("Location: listJobs.php?failure");
        }
        {
        header("Location: listJobs.php");
        }
      }

      foreach($jobs as $job){
        echo "<tr>";
        echo "<th scope='row'>".$job['ID']."</th>";
        echo "<td>".$job['title']."</td>";
        echo "<td>".$job['companyName']."</td>";
        echo "<td>".$job['startDate']."</td>";
        echo "<td>".$job['endDate']."</td>";
        echo "<td class='actionForm'>";
        echo "<button type='submit' name='btnEdit' class='btn btn-success' style='margin-right:2%'><i class='fa fa-pencil'></i>";
        echo "<form method='post'><input type='hidden' name='id' value=".$job['ID']."> 
        <button type='submit' name='btnDelete' class='btn btn-danger'>
        <i class='fa fa-trash'></i></form>";
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
