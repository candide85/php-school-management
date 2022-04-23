<?php
    ob_start();
    session_start();
    header('Location: login_admin.php');
    session_destroy();
?>