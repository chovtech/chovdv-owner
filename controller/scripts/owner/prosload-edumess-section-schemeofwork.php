<?php

            include('../../config/config.php');

            $legendpros_here = $_POST['prosloadedumess_section'];

            if($legendpros_here == 'legendary')
            {
                        $pros_loadedumess_section = mysqli_query($link,"SELECT * FROM `schemeofworkregion`  ORDER by schemeofworkregionName ASC");
                        $pros_loadedumess_section_cnt = mysqli_num_rows($pros_loadedumess_section);
                        $pros_loadedumess_section_cnt_rows = mysqli_fetch_assoc($pros_loadedumess_section);
                        
                        
                        
                        




                        if($pros_loadedumess_section_cnt > 0)
                        {

                                   echo '<option value="0">Select Region</option>';

                                    do{


                                       $SectionListName =  $pros_loadedumess_section_cnt_rows['schemeofworkregionName'];
                                       $SectionListID =  $pros_loadedumess_section_cnt_rows['schemeofworkregionID'];
                                       $countryID =  $pros_loadedumess_section_cnt_rows['countryID'];

                                       if($countryID == '161')
                                       {
                                           $countryselected = 'selected';
                                       }else
                                       {

                                             $countryselected = '';

                                       }

                                        echo '<option '.$countryselected.' value="'.$SectionListID.'">'.$SectionListName.'</option>';



                                    }while($pros_loadedumess_section_cnt_rows = mysqli_fetch_assoc($pros_loadedumess_section));
                        }else
                        {

                            echo '<option value="0">No region found</option>';
                        }
            }
           



?>