<?php

            include('../../config/config.php');

           $UserID = $_POST['UserID'];
           $IntitutionID = $_POST['IntitutionID'];
           $staffID = $_POST['staffID'];
           $counter = 0;

           $verify_plan_from_sch = mysqli_query($link,"SELECT * FROM `institution` WHERE   InstitutionID='$IntitutionID'");
           $verify_plan_from_sch_cnt = mysqli_num_rows($verify_plan_from_sch);
           $verify_plan_from_sch_cnt_row = mysqli_fetch_assoc($verify_plan_from_sch);
           
            // $planID = $verify_plan_from_sch_cnt_row['ActualPlan'];

            

             
            $select_main_menu = mysqli_query($link, "SELECT * FROM `mainmenu`");
            $select_main_menu_cnt = mysqli_num_rows($select_main_menu);

            $select_menuassign_verify = mysqli_query($link,"SELECT * FROM `menupermission` WHERE UserID='$staffID'");
            $select_menuassign_verifycnt =  mysqli_num_rows($select_menuassign_verify);
            $select_menuassign_verifycntrow =  mysqli_fetch_assoc($select_menuassign_verify);
            
           


            if($select_menuassign_verifycnt > 0)
            {
                        echo $pros_amin_menu = $select_menuassign_verifycntrow['AdministrativeMenu'];
                        $menu_data = json_decode($pros_amin_menu, true);

            }else
            {

                echo 'notfound';

            }

          
            
           
           

?>