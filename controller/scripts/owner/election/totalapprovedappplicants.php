<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$get_electionapplicants = "SELECT * FROM `electionapplicants` WHERE `Status` = '2' ";
$get_electionapplicants_query = mysqli_query($link, $get_electionapplicants);
$get_electionapplicants_fetch = mysqli_fetch_assoc($get_electionapplicants_query);
$get_electionapplicants_rows = mysqli_num_rows($get_electionapplicants_query);

if($get_electionapplicants_rows > 0){

  
    
    echo $get_electionapplicants_rows;
        
  
}else{
    echo 0;
}

?>