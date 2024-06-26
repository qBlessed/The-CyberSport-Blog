<?php
include "./../../../path.php";
if(isset($_GET['logout'])) {
    session_start();
    session_destroy();
    /*
    echo "<pre>".print_r($_SESSION,1)."</pre>";
    die();
    */
    header('location:' . BASE_URL . "/log.php");
}