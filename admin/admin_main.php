<?php

        session_start(); //this will allows us to use the $_SESSION variables
        if($_SESSION['logstat'] !="Active"){
            header('Location: ../loginout.php');
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
    <title>Management</title>
    <style>
        #botton1{
            height: 320px; 
            background-color: #00a1e9;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all  0.3s ease;
        }
        #botton1:hover{
            background-color: red;
            text-decoration: none;
        }
        #botton2{
            height: 320px; 
            background-color: #434da2;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all  0.3s ease;
        }
        #botton2:hover{
            background-color: red;
        }
        #botton3{
            height: 320px; 
            background-color: #043c78;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all  0.3s ease;
        }
        #botton3:hover{
            background-color: red;
        }

    </style>
</head>
<body>
    <div class="jumbotron bg-primary text-white text-center">
        <h1 class="display-4">Management Menu</h1>
    </div>

    <nav class="navbar navbar-expand-sm navbar-dark fixed-top">
        <a class="navbar-brand" href="../index.php">Logout</a>
    </nav>


    <div class="container p-0 my-5">
       <div class="row">
            <div class="col-sm-4">
                <a href="admin_list_requestor.php" class="text-white" style="text-decoration: none;">
                    <div class="rounded text-center py-5" id="botton1">
                    <h1><i class="fas fa-users fa-4x"></i></h1>
                    <h3>Requestor List</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="admin_list_pen.php" class="text-white" style="text-decoration: none;">
                    <div class="rounded text-center py-5" id="botton2">
                    <h1><i class="fas fa-archive fa-4x"></i></h1>
                    <h3>Pending Requests</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="admin_list_decided.php" class="text-white" style="text-decoration: none;">
                    <div class="rounded text-center py-5" id="botton3">
                    <h1><i class="fas fa-dove fa-4x"></i></h1>
                    <h3>Decided Requests</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>