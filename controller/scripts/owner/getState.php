<?php   
    include ('../../config/config.php');
    
    $country = trim($_POST['country']);

    $sqlGetstates ="SELECT * FROM `states` WHERE countryID='$country' ORDER BY StateName";
    $queryGetstates = mysqli_query($link, $sqlGetstates);
    $rowGetstates = mysqli_fetch_assoc($queryGetstates);
    $countGetstates = mysqli_num_rows($queryGetstates);

    if($countGetstates > 0)
    {
        echo '<option value="0">Select State of Origin</option>';
        
        do{
            $StateName = $rowGetstates['StateName'];
            $StateID = $rowGetstates['StateID'];

            echo '<option value="'.$StateID.'">'.$StateName.'</option>';

        }while($rowGetstates = mysqli_fetch_assoc($queryGetstates));
        
    }
    else{
        echo '<option value="0">Select State</option>';
    }
?>                