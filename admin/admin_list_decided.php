<?php
    session_start(); //this will allows us to use the $_SESSION variables
    if($_SESSION['logstat'] !="Active"){
        header('Location: ../loginout.php');
    }
    require "../functions/jobreqDAO.php";
    $requestdao = new RequestAccessObject;
    $JobRequestorAlist = $requestdao->retrieveAllJobsRequestorsA();
    $JobRequestorDlist = $requestdao->retrieveAllJobsRequestorsD();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Decided Requests</title>
</head>
<body>
    <div class="jumbotron bg-primary text-white text-center">
        <h1 class="display-4"><i class="fas fa-dove"></i> Decided Requests</h1>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <a class="navbar-brand" href="admin_main.php">Back</a>
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="#approved">Approved</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#rejected">Rejected</a>
            </li>
        </ul>
    </nav>

    <div class="mx-3"><h2><span class="p-2" style="background-color: rgb(247,247,247);"><i class="far fa-thumbs-up"></i>Approved</span></h2></span></div>
    <div class="container-flued mx-3 mt-3" id="approved">
 
            <table class="table table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Request Name</th>
                    <th>Type</th>
                    <th>Place/Office Address</th>
                    <th>Date Needed</th>
                    <th>Register Date</th>
                    <th>Detail</th>
                    <th>Requestor Name</th>
                    <th colspan="2">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($JobRequestorAlist as $key=>$value){
                        echo "<tr>";
                        echo "<td>".$value['job_id']."</td>";
                        echo "<td>".$value['job_name']."</td>";
                        echo "<td>".$value['job_type']."</td>";
                        echo "<td>".$value['job_address']."</td>";
                        echo "<td>".$value['job_date_needed']."</td>";
                        echo "<td>".date('M d, Y', strtotime($value['job_register_date']))."</td>";
                        echo "<td>".$value['job_detail']."</td>";
                        echo "<td>".$value['requestor_fname']." ".$value['requestor_lname']."</td>";
                        echo "<td><a href='admin_status/admin_delete_job.php?id=".$value['job_id']."' role='button' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
                        echo "</tr>";
                    }

                    ?>         
                </tbody>
            </table>
    </div>

    <div class="mx-3"><h2><span class="p-2" style="background-color: rgb(247,247,247);"><i class="far fa-thumbs-down"></i>Rejected</span></h2></div>
    <div class="container-flued mx-3 mt-3" id="rejected">
 
            <table class="table table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Request Name</th>
                    <th>Type</th>
                    <th>Place/Office Address</th>
                    <th>Date Needed</th>
                    <th>Register Date</th>
                    <th>Detail</th>
                    <th>Requestor Name</th>
                    <th colspan="2">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($JobRequestorDlist as $key=>$value){
                        echo "<tr>";
                        echo "<td>".$value['job_id']."</td>";
                        echo "<td>".$value['job_name']."</td>";
                        echo "<td>".$value['job_type']."</td>";
                        echo "<td>".$value['job_address']."</td>";
                        echo "<td>".$value['job_date_needed']."</td>";
                        echo "<td>".date('M d, Y', strtotime($value['job_register_date']))."</td>";
                        echo "<td>".$value['job_detail']."</td>";
                        echo "<td>".$value['requestor_fname']." ".$value['requestor_lname']."</td>";
                        echo "<td><a href='admin_status/admin_delete_job.php?id=".$value['job_id']."' role='button' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
                        echo "</tr>";
                    }

                    ?>         
                </tbody>
            </table>
    </div>

</body>
</html>