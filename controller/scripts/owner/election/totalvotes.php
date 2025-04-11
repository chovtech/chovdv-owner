<?php

include("../../../config/config.php");

$institution = $_POST['institution'];

$get_electionvotes = "SELECT * FROM `electionvotes` ";
$get_electionvotes_query = mysqli_query($link, $get_electionvotes);
$get_electionvotes_fetch = mysqli_fetch_assoc($get_electionvotes_query);
$get_electionvotes_rows = mysqli_num_rows($get_electionvotes_query);

if($get_electionvotes_rows > 0){

  
    
    echo $get_electionvotes_rows;
        
  
}else{
    echo 0;
}

?>