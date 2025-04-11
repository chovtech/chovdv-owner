<?php


        include('../../config/config.php');
        $groupofschoolID = $_POST['groupSchoolID'];
        $usertype  = $_POST['userType'];

        $stafffname  = $_POST['staff_firstname'];
        $stafflname  = $_POST['staff_lastname'];
        $staffemail = $_POST['staff_email'];
        $phone = $_POST['phonenumfull'];

        $staff_datebirth = $_POST['staff_date'];
        $stafff_gender = $_POST['stafff_gender'];

       $submenuID = $_POST['adminmenufinal'];//json menu if admin

       $dateregister = date("Y-m-d"); 

       
       

        $staffverify = mysqli_query($link,"SELECT * FROM `staff` WHERE InstitutionID='$groupofschoolID' AND StaffEmail='$staffemail'");
        $staffverifycnt_rows  = mysqli_num_rows($staffverify);

        if($staffverifycnt_rows  > 0)
        {
            echo 'exist';
        }else
        {

            $passwordmd5 = md5(1234);
            


            if($usertype == 'nonteaching' || $usertype == 'Senior executive/Board member')
            {

                
                        $insert_staff = mysqli_query($link,"INSERT INTO `staff`( `InstitutionID`,  `Role`, `StaffFirstName`,  `StaffLastName`, `StaffMainNumber`, `StaffEmail`,`StaffType`,`StaffDOB`,`DateHired`, `StaffGender`)
                        VALUES ('$groupofschoolID','$usertype','$stafffname','$stafflname', '$phone','$staffemail','1','$staff_datebirth','$dateregister','$stafff_gender')");


                        if($insert_staff === true)
                        {
                            echo 'success';

                            
                        }else
                        {
                            echo  'fail';
                        }


            }else
            {



                $insert_staff = mysqli_query($link,"INSERT INTO `staff`( `InstitutionID`,  `Role`, `StaffFirstName`,  `StaffLastName`, `StaffMainNumber`, `StaffEmail`,`StaffType`,`StaffDOB`,`DateHired`, `StaffGender`)
                VALUES ('$groupofschoolID','$usertype','$stafffname','$stafflname', '$phone','$staffemail','0','$staff_datebirth','$dateregister','$stafff_gender')");

                if($insert_staff == true)
                {
                        $staffID =  mysqli_insert_id($link);

                        $insertlogin = mysqli_query($link,"INSERT INTO `userlogin`(`InstitutionIDOrCampusID`, `UserID`, `UserRegNumberOrUsername`, `UserPassword`, `UserType`) 
                        VALUES ('$groupofschoolID','$staffID','$staffemail','$passwordmd5','$usertype')");




                    if($usertype == 'admin'){

                        $insert_staff_menu = mysqli_query($link,"INSERT INTO `menupermission`(`AdministrativeMenu`, `UserID`) VALUES ('$submenuID','$staffID')");
                    }
                          




                        if($insertlogin === true)
                        {
                            echo 'success';

                            
                        }else
                        {
                            echo  'fail';
                        }

                }else
                {

                }

            }
                

            }



?>