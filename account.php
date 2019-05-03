<?php

    session_start(); //this will allows us to use the $_SESSION variables
    if($_SESSION['logstat'] !="Active"){
        header('Location: loginout.php');
    }
 
   require 'functions/jobreqDAO.php';
   $requestdao = new RequestAccessObject;
   if(isset($_POST['add'])){
       //intialization of variables
       //getting the data from the form
      $requestor_fname = $_POST['requestor_fname'];
      $requestor_lname = $_POST['requestor_lname'];
      $requestor_address = $_POST['requestor_address'];
      $requestor_phone = $_POST['requestor_phone'];
      $requestor_email = $_POST['requestor_email'];
      $requestor_password = $_POST['requestor_password'];
      $requestdao->addrequestor($requestor_fname, $requestor_lname, $requestor_address, $requestor_phone, $requestor_email, $requestor_password);
      header('Location: index.php'); //this will redirect us to the product table after product adding
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
    <title>Create New Account</title>
</head>
<body>
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-4">Create New Account</h1>    
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">Back</a>
    </nav>

    <div class="container mt-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="requestor_fname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="requestor_lname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Home Address</label>
                <input type="text" name="requestor_address" id="" class="form-control">
            </div>    
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="requestor_phone" id="" class="form-control">
            </div>  
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" name="requestor_email" id="" class="form-control">
            </div>  
            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="requestor_password" id="" class="form-control">
            </div>
       
            <input type="reset" value="Reset" name="add" class="btn btn-danger">
            <input type="submit" value="Create" name="add" class="btn btn-dark">

            </div>
        </form>
    </div>
</body>
</html>