<?php
    session_destroy();
    unset($_SESSION);
    header('location:se_connecter'); 
?>