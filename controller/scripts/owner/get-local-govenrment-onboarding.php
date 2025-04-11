<?php   
    include ('../../config/config.php');
    
    // $country = trim($_POST['country']);
    $state = trim($_POST['state']);

    $sqlGetcities ="SELECT * FROM `cities` WHERE StateID='$state' ORDER BY CityName";
    $queryGetcities = mysqli_query($link, $sqlGetcities);
    $rowGetcities = mysqli_fetch_assoc($queryGetcities);
    $countGetcities = mysqli_num_rows($queryGetcities);

    if($countGetcities > 0)
    {
        echo '<option value="0">L.G.A </option>';
        
        do{
            $CityName = $rowGetcities['CityName'];
            $CityID = $rowGetcities['CityID'];

            echo '<option value="'.$CityID.'">'.$CityName.'</option>';

        }while($rowGetcities = mysqli_fetch_assoc($queryGetcities));
        
    }
    else{
        echo '<option value="0">No record found</option>';
    }
?>                