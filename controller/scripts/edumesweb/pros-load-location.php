<?php

                include('../../config/config.php');
                $Location  = $_POST['Location'];




                $pros_get_location = mysqli_query($link,"SELECT * FROM  `franchiselocation` WHERE FranchiseRegionID='$Location' ORDER BY FranchiseLocationTitle ASC");
                $pros_get_location_cnt_row = mysqli_fetch_assoc($pros_get_location);
                $pros_get_location_cnt = mysqli_num_rows($pros_get_location);

                if($pros_get_location_cnt > 0)
                {

                           echo '<option value="NULL" >Select Location</option>';

                            do{


                                $FranchiseLocationTitle = $pros_get_location_cnt_row['FranchiseLocationTitle'];
                                $FranchiseLocationID = $pros_get_location_cnt_row['FranchiseLocationID'];

                                

                                echo '<option  value="'.$FranchiseLocationID.'">'.$FranchiseLocationTitle.'</option>';

                            }while($pros_get_location_cnt_row = mysqli_fetch_assoc($pros_get_location));

                }else
                {
                        echo '<option value="NULL">No location found.</option>';
                }




?>