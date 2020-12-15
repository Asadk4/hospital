<!DOCTYPE html>
<!DOCTYPE html>
<html>
<title>TrackHS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("https://image.shutterstock.com/z/stock-photo-empty-gurney-in-a-long-corridor-394445152.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="home.php" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
        <a href="employee_index.php" class="w3-button w3-block w3-black">Employees</a>
    </div>
    <div class="w3-col s3">
      <a href="patients_index.php" class="w3-button w3-block w3-black">Patients</a>
    </div>
  </div>
</div>
</div>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                        <br> 
                        <br>    
                        <h2 class="pull-left">
                                Patient Information </h2>
                            <br>
                            <br>
                            <br>


                            <a href="createpatient.php" class="btn btn-primary" role="button">Add A New Patient</a>

 

                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";
                        // Attempt select query execution
                        $sql = "SELECT * FROM trackhs.patients";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Patient ID</th>";
                                echo "<th>First Name</th>";
                                echo "<th>Last Name</th>";
                                echo "<th>Street</th>";
                                echo "<th>City</th>";
                                echo "<th>State</th>";
                                echo "<th>Zipcode</th>";
                                echo "<th>Phone</th>";
                                echo "<th>Email</th>";
                                echo "<th>Employee ID</th>";

                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['patientid'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['street'] . "</td>";
                                    echo "<td>" . $row['city'] . "</td>";
                                    echo "<td>" . $row['state'] . "</td>";
                                    echo "<td>" . $row['zipcode'] . "</td>";
                                    echo "<td>" . $row['phone'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['employeeid'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='patients_read.php?patientid=" . $row['patientid'] . "' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-xs'>View Record</span></a>";
                                    echo "<a href='update.php?patientid=" . $row['patientid'] . "' title='Update Record' data-toggle='tooltip'><span class='btn btn-warning btn-xs'>Update</span></a>";
                                    echo "<a href='delete.php?patientid=" . $row['patientid'] . "' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-xs'>Delete</span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>

        </div>
    </body>
</html>

