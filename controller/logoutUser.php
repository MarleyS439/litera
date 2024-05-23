<?php
    session_start();

    if(isset($_SESSION['authUser'])){
        unset($_SESSION['authUser']);
    }
    header('Location: ./../index.php');
    exit();
?>