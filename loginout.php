<?php

session_start();
    session_destroy();
    //the $_SESSION variables
    header('Location: index.php');

?>