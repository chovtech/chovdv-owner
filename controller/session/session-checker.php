<?php

  ob_start();
  session_start();
 
 
  include('../controller/config/config.php');
 
 if(isset($_SESSION['spgowner']) && !empty($_SESSION['spgowner']))
 {
    header('location: ../app/home/');
 }
 elseif(isset($_SESSION['spgaffiliate']) && !empty($_SESSION['spgaffiliate']))
 {
    header('location: ../affiliate/home/');
 }
//  else
//  {
//      header('location: ../sign-in/');
//  }
 
 

?>