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
    <div class="jumbotron bg-warning text-white">
        <h1 class="display-4">Your Dashboard</h1>
    </div>

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
            <th colspan="2">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($custlist as $key=>$value){
                echo "<tr>";
                        echo "<td>".$value['cust_fname']."</td>";
                        echo "<td>".$value['cust_lname']."</td>";
                        echo "<td>".$value['cust_dob']."</td>";
                        echo "<td>".$value['cust_address']."</td>";
                        echo "<td>".$value['cust_login_name']."</td>";
                        echo "<td>".$value['cust_phone']."</td>";
                        echo "<td>".$value['cust_register_date']."</td>";
                        echo "<td><a href='customer_edit.php?id=".$value['cust_id']."' role='button' class='btn btn-warning'><i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='customer_delete.php?id=".$value['cust_id']."' role='button' class='btn btn-danger'><i class='fas fa-trash'></i></a></td>";
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
                            <input type="text" name="cust_fname" id="" class="form-control mr-2">
                        </div>
                        <div class="form-inline p-3">
                            <label for="" class="mr-2">Type</label>
                                <select name="prod_id" id="" class="form-control mr-2">
                                    <option value="---">Please Choose a Product</option>
                                    <?php
                                        foreach($prodlist as $key => $values){
                                            echo "<option value='".$values['prod_id']."'>".$values['prod_name']."</option>";
                                        }
                                    ?>
                                </select>

                            <label for="" class="mr-2">Date Needed</label>
                            <input type="date" name="cust_lname" id="" class="form-control mr-2">

                        </div>
                        <div class="form-group px-3">
                            <label for="" class="mr-2">Place/Office Address</label>
                            <input type="text" name="cust_address" id="" class="form-control">
                        </div>
                        <div class="px-3">
                            <form>
                            <label for="">Request Detail</label>
                            <textarea name="user_bio" id="editor1" rows="10" cols="80">
                            <?php echo $user['user_bio'] ?>
                            </textarea>
                            <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'editor1' );
                            </script>
                            </form>
                        </div>
                        <div class="pt-3 text-right">
                        <input type="reset" value="Reset" name="add" class="btn btn-danger">
                        <input type="submit" value="Update Request" name="update" class="btn btn-primary">  
                        </div> 
                    </form>
   </div>

   </div>
</body>
</html>