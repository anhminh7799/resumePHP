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
    <link rel="stylesheet" href="styleCV.css">
</head>

<body>
    <!-- <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Resume Content Management</a>
  </nav> -->
    <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="userMgt.php">Resume Content Management</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 ml-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="userMgt.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="listJobs.php">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="reviewCV.php">Preview</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    require_once("./entities/user.class.php");

    $users = users::list_users();

    $name = "";
    $dob = "";
    $phone = "";
    $email = "";
    $count = 0;

    foreach ($users as $user) {
        if ($count == 0) {
            $name = $user['fullName'];
            $dob = $user['dob'];
            $phone = $user['phone'];
            $email = $user['email'];
            $count++;
        } else {
            break;
        }
    }
    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-md-3">
                <div class="row personalInfor">
                    <div class="col-md-12">
                        <img src="./images/IMG_1017.JPG" alt="">
                    </div>
                </div>
                <div class="personalInforContainer">
                    <div class="row personalInfor">
                        <div class="col-md-12">
                            <h4>Personal Information</h4>
                        </div>
                    </div>
                    <div class="row personalInfor">
                        <div class="col-md-12 title">Full Name</div>
                        <div class=" col-md-12 content">
                            <?php
                            echo $name;
                            ?>
                        </div>
                    </div>
                    <div class="row personalInfor">
                        <div class="col-md-12 title">Day of birth</div>
                        <div class=" col-md-12 content">
                            <?php
                            echo $dob;
                            ?>
                        </div>
                    </div>
                    <div class="row personalInfor">
                        <div class="col-md-12 title">Phone</div>
                        <div class=" col-md-12 content">
                            <?php
                            echo $phone;
                            ?>
                        </div>
                    </div>
                    <div class="row personalInfor">
                        <div class="col-md-12 title">Email</div>
                        <div class=" col-md-12 content">
                            <?php
                            echo $email;
                            ?>
                        </div>
                    </div>
                    <div class="row aboutMe">
                        <div class="col-md-12 title">
                            <h4>About me</h4>
                        </div>
                        <div class="col-md-12 content">
                            I am a web developer. I am working with ASP.NET Core as back-end and HTML, CSS, JavaScript… as well.<br>
                            I am seeking for a professional, friendly, active environment to dedicate 100% young and passion.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 workingHeading">
                        WORKING EXPERIENCE
                    </div>
                </div>
                <?php
                require_once("./entities/jobs.class.php");

                $jobs = Jobs::list_jobs();

                foreach ($jobs as $job) {
                    echo "<div class='row'>";
                    echo "<div class='col-md-12 jobTitle'>";
                    echo "<h4>" . $job['title'] . "</h4>";
                    echo "</div>";
                    echo "<div class='col-md-12 jobContent'>";
                    echo "<div class='jobCompany'>";
                    echo  "<h5>" . $job['companyName'] . "</h5>";
                    echo "</div>";
                    echo "<div class='jobPeriod'>";
                    echo  "Start Date: " . $job['startDate'] . " <br> End Date: " . $job['endDate'];
                    echo "</div>";
                    echo "<div class='jobDescription'>";
                    // for description section
                    $jobDescription = $job['description'];
                    if (str_contains($jobDescription, "-")) {
                        str_replace("- ", "\n - ", $jobDescription);
                        echo nl2br($jobDescription);
                    } else {
                        echo $jobDescription;
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <strong>&copy;2022 - NGUYEN LE ANH MINH</strong>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>