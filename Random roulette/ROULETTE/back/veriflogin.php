<?php

session_start();

if(!isset($_SESSION['login'])) {
    header("location:index.php?e=1");
    exit;
}

?>