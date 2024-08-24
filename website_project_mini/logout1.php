<?php
    session_start();

    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: not_logged_in.php');
    exit();
?>