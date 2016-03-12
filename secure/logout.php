<?php

    //statring session
    session_start(); 
    
    //signing out
    unset($_SESSION['user']);
    unset($_SESSION['role']);
    
    //sending back to login screen and passing logout message via header
    echo("<script>window.location = '../index.html'</script>");
    exit();

?> 
