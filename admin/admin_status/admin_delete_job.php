<?php
    require '../../functions/jobreqDAO.php';
    $requestdao = new RequestAccessObject;
    $job_id = $_GET['id'];
    $requestdao->deleteCompletelyJob($job_id);
    header('Location: ../admin_list_decided.php');
?>