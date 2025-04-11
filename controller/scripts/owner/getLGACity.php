<?php   
    include ('../../config/config.php');
    
    $country = trim($_POST['country']);
    $state = trim($_POST['state']);

    $sqlGetcities ="SELECT * FROM `cities` WHERE countryID='$country' AND StateID='$state' ORDER BY CityName";
    $queryGetcities = mysqli_query($link, $sqlGetcities);
    $rowGetcities = mysqli_fetch_assoc($queryGetcities);
    $countGetcities = mysqli_num_rows($queryGetcities);

    if($countGetcities > 0)
    {
        echo '<option value="0">Select L.G.A of Origin</option>';
        
        do{
            $CityName = $rowGetcities['CityName'];
            $CityID = $rowGetcities['CityID'];

            echo '<option value="'.$CityID.'">'.$CityName.'</option>';

        }while($rowGetcities = mysqli_fetch_assoc($queryGetcities));
        
    }
    else{
        echo '<option value="0">Select L.G.A/City</option>';
    }
?>                