<?php
    session_start(); //this will allows us to use the $_SESSION variables
    require 'functions/jobreqDAO.php';
    $requestdao = new RequestAccessObject;
    if(isset($_POST['login'])){
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];
        //login function will search if the enterd username and password
        //is inside the table cutomer
        //if it is inside, the result of the function will be assigned
        //to the variable $credentials
        $credentials = $requestdao->login($useremail, $password);
        // checker
        $adminCredentials = $requestdao->adminLogin($useremail, $password);

        if(!empty($credentials)){
            $_SESSION['id'] = $credentials['requestor_id'];
            $_SESSION['name'] = $credentials['requestor_fname'];
            $_SESSION['logstat'] = "Active";
            header('Location: requestor/requestor_main.php');
        }elseif(!empty($adminCredentials)){
            $_SESSION['id'] = $adminCredentials['admin_id'];
            $_SESSION['name'] = $adminCredentials['admin_fname'];
            $_SESSION['logstat'] = "Active";
            header('Location: admin/admin_main.php');
        }else{
            echo "USER NOT FOUND!";
        }
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
    <title>Document</title>
</head>
<body>
        <div class="jumbotron bg-dark text-white text-center">
            <h1 class="display-4">Login</h1>
        </div>
        
        <div class="container mt-3">
            <form action="" method="post">
                <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="useremail" id="" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="text-center">
                <input type="submit" value="login" name="login" class="btn btn-dark btn-lg">
                <p>or</p><a class="" href="account.php">create NEW ACCOUNT</a>
                </div>
            </form>

        </div>
</body>
</html>