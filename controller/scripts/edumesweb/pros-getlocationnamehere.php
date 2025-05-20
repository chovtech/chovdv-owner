<?php

                include('../../config/config.php');
                $CountryID  = $_POST['CountryID'];




                $pros_get_region = mysqli_query($link,"SELECT * FROM `franchiseregion` WHERE CountryID='$CountryID' ORDER BY FranchiseRegionTitle ASC");
                $pros_get_region_cnt_row = mysqli_fetch_assoc($pros_get_region);
                $pros_get_region_cnt = mysqli_num_rows($pros_get_region);

                if($pros_get_region_cnt > 0)
                {
                    echo '<option value="NULL" >Select Region</option>';

                            do{


                                $FranchiseRegionTitle = $pros_get_region_cnt_row['FranchiseRegionTitle'];
                                $FranchiseRegionID = $pros_get_region_cnt_row['FranchiseRegionID'];

                                

                                echo '<option  value="'.$FranchiseRegionID.'">'.$FranchiseRegionTitle.'</option>';

                            }while($pros_get_region_cnt_row = mysqli_fetch_assoc($pros_get_region));

                }else
                {
                        echo '<option value="NULL">No region found.</option>';
                }




?>