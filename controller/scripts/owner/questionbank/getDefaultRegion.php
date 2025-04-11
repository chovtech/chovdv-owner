<?php   
    include ('../../../config/config.php');
    
    $region ="SELECT * FROM `schemeofworkregion` ORDER BY schemeofworkregionName ASC";

    $queryregion = mysqli_query($link, $region);
    $rowGetregion = mysqli_fetch_assoc($queryregion);
    $numregion = mysqli_num_rows($queryregion);

    if($numregion > 0)
    {
        echo '<option value="NULL">Select Region</option>';
        
        do{
            $regionID = $rowGetregion['schemeofworkregionID'];
            $regionName = $rowGetregion['schemeofworkregionName'];

            echo '<option value="'.$regionID.'">'.$regionName.'</option>';

        }while($rowGetregion = mysqli_fetch_assoc($queryregion));
        
    }
    else{
        echo '<option value="NULL">No Region</option>';
    }
?>  