<?php
    session_start();

    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: grattis_prenumenerat1.php');
    exit();
?>