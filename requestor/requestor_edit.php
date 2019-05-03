<?php
    session_start(); //this will allows us to use the $_SESSION variables
    if($_SESSION['logstat'] !="Active"){
        header('Location: ../loginout.php');
    }

    require '../functions/jobreqDAO.php';
   $requestdao = new requestAccessObject;
   $job_id = $_GET['id']; //this will hold the id passed from the url
   $job = $requestdao->retrieveSingleJob($job_id);
   if(isset($_POST['update'])){
       //intialization of variables
       //getting the data from the form
        $job_name = $_POST['job_name'];
        $job_type = $_POST['job_type'];
        $job_date_needed = $_POST['job_date_needed'];
        $job_address = $_POST['job_address'];
        $job_detail = $_POST['job_detail'];
        $requestdao->updateJob($job_name, $job_type, $job_date_needed, $job_address, $job_detail, $job_id);
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
    <title>Edit Job Request</title>

    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 

</head>
<body>
    <div class="jumbotron bg-warning text-center">
        <h1 class="display-4">Edit Job Request</h1>    
    </div>

    <div class="container mt-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Request Name</label>
                <input type="text" name="job_name" id="" class="form-control" value="<?php echo $job['job_name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select name="job_type" id="" class="form-control mr-2">
                                    <option selected value="<?php echo $job['job_type'] ?>"><?php echo $job['job_type'] ?></option>
                                    <option value="Home Repair">Home Repair</option>
                                    <option value="Cleaning Service">Cleaning Service</option>
                                    <option value="Pest Control">Pest Control</option>
                                </select>
            </div>
            <div class="form-group">
                <label for="">Place/Office Address</label>
                <input type="text" name="job_address" id="" class="form-control" value="<?php echo $job['job_address'] ?>">
            </div>
            <div class="form-group">
                <label for="">Date Needed</label>
                <input type="date" name="job_date_needed" id="" class="form-control" value="<?php echo $job['job_date_needed'] ?>">
            </div>    
            <div class="form-group">
                <label for="">Request Detail</label>
                <textarea name="job_detail" id="editor1" rows="10" cols="80">
                <?php echo $job['job_detail'] ?>
                </textarea>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                </script>
            </div> 
            <div class="mb-5">
            <input type="reset" value="Reset" name="reset" class="btn btn-danger">
            <input type="submit" value="Update Request" name="update" class="btn btn-primary">
            </div>

            </div>
        </form>
    </div>
</body>
</html>