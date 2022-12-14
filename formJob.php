<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>MyContact App</title>
  <link href="../assets/images/logo.png" rel="shortcut icon" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Custom style -->
  <link href="style.css" rel="stylesheet" />
</head>

<?php
require_once("./entities/jobs.class.php");

?>

<?php
include_once("header.php");
if (isset($_POST["btnSubmit"])) {
  $jobTitle = $_POST["txtTitle"];
  $jobCompany = $_POST["txtCompany"];
  $jobDescription = $_POST["txtDescription"];
  $jobStartDate = $_POST["txtStartDate"];
  $jobEndDate = $_POST["txtEndDate"];
  $jobStack = $_POST["txtStack"];
  $newJob = new Jobs($jobTitle, $jobCompany, $jobDescription, $jobStartDate, $jobEndDate, $jobStack);
  $result = $newJob->save();

  //Failure catching
  if (!$result) {
    header("Location: add_product.php?failure");
  } {
    header("Location: listJobs.php");
  }
}
?>

<body>
  <div class="container" id="main-content">
    <div class="row d-flex justify-content-center">
      <form method="post" style="min-width: 300px;">
        <h5 class="text-center">Add new job</h5>

        <div class="form-group">
          <input class="form-control" name="txtTitle" value="<?php echo isset($_POST["txtTitle"]) ? $_POST["txtTitle"] : ""; ?>" type="text" placeholder="Job Title" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtCompany" value="<?php echo isset($_POST["txtCompany"]) ? $_POST["txtCompany"] : ""; ?>" type="text" placeholder="Company Name" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtStartDate" value="<?php echo isset($_POST["txtStartDate"]) ? $_POST["txtStartDate"] : ""; ?>" type="date" placeholder="Start Date" />
        </div>
        <div class="form-group">
          <input class="form-control" name="txtEndDate" value="<?php echo isset($_POST["txtEndDate"]) ? $_POST["txtEndDate"] : ""; ?>" type="date" placeholder="End Date" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtStack" value="<?php echo isset($_POST["txtEndDate"]) ? $_POST["txtEndDate"] : ""; ?>" type="text" placeholder="Tech Stack" />
        </div>

        <div class="form-group">
          <textarea class="form-control" rows="3" name="txtDescription" type="text" placeholder="Description"><?php echo isset($_POST["txtDescription"]) ? $_POST["txtDescription"] : ""; ?>"</textarea>
        </div>

        <div class="form-group">
          <button type="submit" name="btnSubmit" class="btn btn-block btn-primary">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div><!-- /.container -->

  <footer class="container">
    <strong>&copy; 2022 - Nguyen Le Anh Minh</strong>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>