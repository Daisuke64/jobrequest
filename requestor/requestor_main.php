<?php
    session_start(); //this will allows us to use the $_SESSION variables
    if($_SESSION['logstat'] !="Active"){
        header('Location: ../loginout.php');
    }
    require "../functions/jobreqDAO.php";
    $requestdao = new RequestAccessObject;
    $requestlist = $requestdao->retrieveAllJobs($_SESSION['id']);


    if(isset($_POST['add'])){
        //intialization of variables
        //getting the data from the form
       $job_name = $_POST['job_name'];
       $job_type = $_POST['job_type'];
       $job_date_needed = $_POST['job_date_needed'];
       $job_address = $_POST['job_address'];
       $job_detail = $_POST['job_detail'];
       $requestor_id = $_SESSION['id'];
       $requestdao->addJob($job_name, $job_type, $job_date_needed, $job_address, $job_detail, $requestor_id);
       header('Location: requestor_main.php'); //this will redirect us to the product table after product adding
    }
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
    <title>Dashboard</title>

    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 

</head>
<body>
    <div class="jumbotron bg-warning text-white text-center">
        <h1 class="display-4"><i class="fas fa-user-edit"></i> Your Dashboard</h1>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <a class="navbar-brand" href="../index.php">Logout</a>
    </nav>

    <div class="container-flued px-3">
        <table class="table table-striped">
        <thead>
            <tr class="bg-warning">
            <th>#</th>
            <th>Request Name</th>
            <th>Type</th>
            <th>Place/Office Address</th>
            <th>Date Needed</th>
            <th>Register Date</th>
            <th>Detail</th>
            <th>Result</th>
            <th colspan="3">   Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($requestlist as $key=>$value){
                echo "<tr>";
                        echo "<td>".$value['job_id']."</td>";
                        echo "<td>".$value['job_name']."</td>";
                        echo "<td>".$value['job_type']."</td>";
                        echo "<td>".$value['job_address']."</td>";
                        echo "<td>".$value['job_date_needed']."</td>";
                        echo "<td>".date('M d, Y', strtotime($value['job_register_date']))."</td>";
                        echo "<td>".$value['job_detail']."</td>";
                        if($value['job_status'] == "A"){
                            echo "<td><i class='far fa-thumbs-up'></i><td>";
                        }elseif($value['job_status'] == "D"){
                            echo "<td><i class='far fa-thumbs-down'></i><td>";
                        }else{
                            echo "<td><i class='far fa-pause-circle'></i><td>";
                        }
                        echo "<td><a href='requestor_edit.php?id=".$value['job_id']."' role='button' class='btn btn-warning'><i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='requestor_delete.php?id=".$value['job_id']."' role='button' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
                echo "</tr>";
            }

            ?>         
        </tbody>
        </table>
    </div>


    <div class="container bg-warning py-3 my-5">
                    <form action="" method="post">
                        <div><h3>New request </h3></div>
                        <div class="form-group px-3">
                        <label for="" class="mr-2">Request Name</label>
                            <input type="text" name="job_name" id="" class="form-control mr-2">
                        </div>
                        <div class="form-inline p-3">
                            <label for="" class="mr-2">Type</label>
                                <select name="job_type" id="" class="form-control mr-2">
                                    <option value="">Please Choose a Type</option>
                                    <option value="Home Repair">Home Repair</option>
                                    <option value="Cleaning Service">Cleaning Service</option>
                                    <option value="Pest Control">Pest Control</option>
                                </select>

                            <label for="" class="mr-2">Date Needed</label>
                            <input type="date" name="job_date_needed" id="" class="form-control mr-2">

                        </div>
                        <div class="form-group px-3">
                            <label for="" class="mr-2">Place/Office Address</label>
                            <input type="text" name="job_address" id="" class="form-control">
                        </div>
                        <div class="px-3">
                            <label for="">Request Detail</label>
                            <textarea name="job_detail" id="editor1" rows="10" cols="80">

                            </textarea>
                            <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'editor1' );
                            </script>
                            </div>
                        <div class="pt-3 text-right">
                        <input type="reset" value="Reset" name="reset" class="btn btn-danger">
                        <input type="submit" value="Post Request" name="add" class="btn btn-primary">  
                        </div> 
                    </form>
   </div>

   </div>
</body>
</html>