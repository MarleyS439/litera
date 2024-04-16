<?php
    session_start($_SESSION['authAdmin']);
    session_destroy($_SESSION['authAdmin']);
    header("location: ../../index.php");
?>