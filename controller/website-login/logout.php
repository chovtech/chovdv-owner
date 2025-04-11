<?php 
    session_start();
    include ('../config/config.php');

    if(session_destroy())
    {
      header("Location: ../../sign-in/");
    }
?>
