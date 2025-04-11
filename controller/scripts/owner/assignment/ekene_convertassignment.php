<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../config/config.php');


 $convertdatacampusid = $_POST["convertdatacampusid"];

 $ekene_convert_query = "SELECT * FROM `resultsetting` WHERE `CampusID` = '$convertdatacampusid'" ;
 
 $ekene_mysqli_query = mysqli_query($link, $ekene_convert_query);
 $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
 $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);
 if ($ekene_row_cnt_ekene > 0)
 {
    $NumberOfCA = $ekene_get_details["NumberOfCA"];
    if ($NumberOfCA == 1) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>';
    }
    elseif ($NumberOfCA == 2) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>';
    }
    elseif ($NumberOfCA == 3) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>';
    }
 
    elseif ($NumberOfCA == 4) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>';
    }
    elseif ($NumberOfCA == 5) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>';
    }
    elseif ($NumberOfCA == 6) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        $CA6Title = $ekene_get_details["CA6Title"];
        $CA6Score = $ekene_get_details["CA6Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>
        <option data-id="6" value="'.$CA6Score.'">'.$CA6Title.'('.$CA6Score.')</option>';
    }
    elseif ($NumberOfCA == 7) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        $CA6Title = $ekene_get_details["CA6Title"];
        $CA6Score = $ekene_get_details["CA6Score"];
        $CA7Title = $ekene_get_details["CA7Title"];
        $CA7Score = $ekene_get_details["CA7Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>
        <option data-id="6" value="'.$CA6Score.'">'.$CA6Title.'('.$CA6Score.')</option>
        <option data-id="7" value="'.$CA7Score.'">'.$CA7Title.'('.$CA7Score.')</option>';
    }
    elseif ($NumberOfCA == 8) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        $CA6Title = $ekene_get_details["CA6Title"];
        $CA6Score = $ekene_get_details["CA6Score"];
        $CA7Title = $ekene_get_details["CA7Title"];
        $CA7Score = $ekene_get_details["CA7Score"];
        $CA8Title = $ekene_get_details["CA8Title"];
        $CA8Score = $ekene_get_details["CA8Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>
        <option data-id="6" value="'.$CA6Score.'">'.$CA6Title.'('.$CA6Score.')</option>
        <option data-id="7" value="'.$CA7Score.'">'.$CA7Title.'('.$CA7Score.')</option>
        <option data-id="8" value="'.$CA8Score.'">'.$CA8Title.'('.$CA8Score.')</option>';
    }
    elseif ($NumberOfCA == 9) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        $CA6Title = $ekene_get_details["CA6Title"];
        $CA6Score = $ekene_get_details["CA6Score"];
        $CA7Title = $ekene_get_details["CA7Title"];
        $CA7Score = $ekene_get_details["CA7Score"];
        $CA8Title = $ekene_get_details["CA8Title"];
        $CA8Score = $ekene_get_details["CA8Score"];
        $CA9Title = $ekene_get_details["CA9Title"];
        $CA9Score = $ekene_get_details["CA9Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>
        <option data-id="6" value="'.$CA6Score.'">'.$CA6Title.'('.$CA6Score.')</option>
        <option data-id="7" value="'.$CA7Score.'">'.$CA7Title.'('.$CA7Score.')</option>
        <option data-id="8" value="'.$CA8Score.'">'.$CA8Title.'('.$CA8Score.')</option>
        <option data-id="9" value="'.$CA9Score.'">'.$CA9Title.'('.$CA9Score.')</option>';
    }
    elseif ($NumberOfCA == 10) {
        $CA1Title = $ekene_get_details["CA1Title"];
        $CA1Score = $ekene_get_details["CA1Score"];
        $CA2Title = $ekene_get_details["CA2Title"];
        $CA2Score = $ekene_get_details["CA2Score"];
        $CA3Title = $ekene_get_details["CA3Title"];
        $CA3Score = $ekene_get_details["CA3Score"];
        $CA4Title = $ekene_get_details["CA4Title"];
        $CA4Score = $ekene_get_details["CA4Score"];
        $CA5Title = $ekene_get_details["CA5Title"];
        $CA5Score = $ekene_get_details["CA5Score"];
        $CA6Title = $ekene_get_details["CA6Title"];
        $CA6Score = $ekene_get_details["CA6Score"];
        $CA7Title = $ekene_get_details["CA7Title"];
        $CA7Score = $ekene_get_details["CA7Score"];
        $CA8Title = $ekene_get_details["CA8Title"];
        $CA8Score = $ekene_get_details["CA8Score"];
        $CA9Title = $ekene_get_details["CA9Title"];
        $CA9Score = $ekene_get_details["CA9Score"];
        $CA10Title = $ekene_get_details["CA10Title"];
        $CA10Score = $ekene_get_details["CA10Score"];
        echo '<option data-id="1" value="'.$CA1Score.'">'.$CA1Title.'('.$CA1Score.')</option>
        <option data-id="2" value="'.$CA2Score.'">'.$CA2Title.'('.$CA2Score.')</option>
        <option data-id="3" value="'.$CA3Score.'">'.$CA3Title.'('.$CA3Score.')</option>
        <option data-id="4" value="'.$CA4Score.'">'.$CA4Title.'('.$CA4Score.')</option>
        <option data-id="5" value="'.$CA5Score.'">'.$CA5Title.'('.$CA5Score.')</option>
        <option data-id="6" value="'.$CA6Score.'">'.$CA6Title.'('.$CA6Score.')</option>
        <option data-id="7" value="'.$CA7Score.'">'.$CA7Title.'('.$CA7Score.')</option>
        <option data-id="8" value="'.$CA8Score.'">'.$CA8Title.'('.$CA8Score.')</option>
        <option data-id="9" value="'.$CA9Score.'">'.$CA9Title.'('.$CA9Score.')</option>
        <option data-id="10" value="'.$CA10Score.'">'.$CA10Title.'('.$CA10Score.')</option>';
    }

   
 }



 ?>