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

$idUserEdit = $_GET['idEdit'];

$results = Jobs::getOne($idUserEdit);

//Assign value into fields
$count =  0;
foreach ($results as $result) {
  if ($count == 0) {
    $_POST["txtTitle"] = $result['title'];
    $_POST["txtCompany"] = $result['companyName'];
    $_POST["txtDescription"] = $result['description'];
    $_POST["txtStartDate"] = $result["startDate"];
    $_POST["txtEndDate"] = $result["endDate"];
    $_POST["txtStack"] = $result["idStack"];
    $_POST["txtId"] = $result["ID"];
    $count++;
  } else {
    break;
  }
}

if (isset($_POST["btnSubmit"])) {
  $id = $_POST["txtIdNew"];
  $jobTitle = $_POST["txtTitleNew"];
  $jobCompany = $_POST["txtCompanyNew"];
  $jobDescription = $_POST["txtDescriptionNew"];
  $jobStartDate = $_POST["txtStartDateNew"];
  $jobEndDate = $_POST["txtEndDateNew"];
  $jobStack = $_POST["txtStackNew"];
  echo $id . ";" . $jobTitle . ";" . $jobCompany . ";" . $jobDescription . ";" . $jobStartDate . ";" . $jobEndDate . ";" . $jobStack;
  $resultUpdate = Jobs::update($id, $jobTitle, $jobCompany, $jobDescription, $jobStartDate, $jobEndDate, $jobStack);
  //echo $resultUpdate;

  //Failure catching
  if (!$resultUpdate) {
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
          <input class="form-control" name="txtIdNew" value="<?php echo isset($_POST["txtId"]) ? $_POST["txtId"] : ""; ?>" type="text" placeholder="ID" hidden />
        </div>
        <div class="form-group">
          <input class="form-control" name="txtTitleNew" value="<?php echo isset($_POST["txtTitle"]) ? $_POST["txtTitle"] : ""; ?>" type="text" placeholder="Job Title" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtCompanyNew" value="<?php echo isset($_POST["txtCompany"]) ? $_POST["txtCompany"] : ""; ?>" type="text" placeholder="Company Name" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtStartDateNew" value="<?php echo isset($_POST["txtStartDate"]) ? $_POST["txtStartDate"] : ""; ?>" type="date" placeholder="Start Date" />
        </div>
        <div class="form-group">
          <input class="form-control" name="txtEndDateNew" value="<?php echo isset($_POST["txtEndDate"]) ? $_POST["txtEndDate"] : ""; ?>" type="date" placeholder="End Date" />
        </div>

        <div class="form-group">
          <input class="form-control" name="txtStackNew" value="<?php echo isset($_POST["txtStack"]) ? $_POST["txtStack"] : ""; ?>" type="text" placeholder="Tech Stack" />
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="3" name="txtDescriptionNew" type="text" placeholder="Description"><?php echo isset($_POST["txtDescription"]) ? $_POST["txtDescription"] : ""; ?></textarea>
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