<?php
    session_start();

    unset($_SESSION['loggedIn']);
    session_destroy();
    header('Location: subscription_success.php');
    exit();
?>