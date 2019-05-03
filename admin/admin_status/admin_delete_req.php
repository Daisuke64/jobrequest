<?php

    require '../../functions/jobreqDAO.php';
    $requestdao = new RequestAccessObject;
    $requestor_id = $_GET['id'];
    $requestdao->deleteRequestor($requestor_id);
    header('Location: ../admin_list_requestor.php');


?>