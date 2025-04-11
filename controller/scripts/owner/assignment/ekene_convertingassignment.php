<?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include('../../../config/config.php');


        $dataid = $_POST["dataid"];

        $termid = $_POST["termid"];

        $campusid = $_POST["campusid"];
        
        $classid = $_POST["classid"];
        
        $subjectid = $_POST["subjectid"];

        $userid = $_POST["userid"];

        $usertype = $_POST["usertype"];

        $session = $_POST["session"];
        $cascore = $_POST["cascore"];
        date_default_timezone_set( 'Africa/Lagos');
        $currentDateTime = date('Y-m-d H:i:s');
        $Description = "just convert assignment to CA";
        $studentIDnew = explode(',',$_POST["studentIDnew"]);
        $maxscoreid = explode(',',$_POST["maxscoreid"]);
        $totalscoreid = explode(',',$_POST["totalscoreid"]);

        $success = 0;
        $failed = 0;


            foreach($studentIDnew as $key => $student)
            {
                    $maxscore = $maxscoreid[$key];
                    $totalscore = $totalscoreid[$key];
                    $averagescore = ($totalscore / $maxscore) * $cascore;

                    $roundup = round($averagescore , 2);
            
                    $sql = "SELECT * FROM `score`
                    WHERE `CampusID` = '$campusid'
                    AND `StudentID` = '$student'
                    AND `ClassOrDepartmentID` = '$classid'
                    AND `CourseOrSubjectID` = '$subjectid'
                    AND `Session` = '$session'
                    AND `TermOrSemester` = '$termid'";
                
                    $ekene_mysqli_query = mysqli_query($link, $sql);
                    $ekene_get_details = mysqli_fetch_assoc($ekene_mysqli_query);
                    $ekene_row_cnt_ekene = mysqli_num_rows($ekene_mysqli_query);
            
                    if($ekene_row_cnt_ekene > 0)
                    {

                        if ($dataid == 1) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA1` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";

                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 2) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA2` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 3) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA3` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";

                                                        $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                        if($updateQueryCAquery == true)
                                                        {
                                                        $success+=+1;

                                                        }else
                                                        {
                                                        $failed+=+1;
                                                        }
                        }
                        elseif ($dataid == 4) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA4` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";

                                                    $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                    if($updateQueryCAquery == true)
                                                    {
                                                    $success+=+1;

                                                    }else
                                                    {
                                                    $failed+=+1;
                                                    }
                        } elseif ($dataid == 5) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA5` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                    $failed+=+1;
                                                }
                        } elseif ($dataid == 6) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA6` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";

                                                    $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                    if($updateQueryCAquery == true)
                                                    {
                                                    $success+=+1;

                                                    }else
                                                    {
                                                    $failed+=+1;
                                                    }
                        }
                        elseif ($dataid == 7) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA7` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                    $failed+=+1;
                                                }
                        } elseif ($dataid == 8) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA8` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                    $failed+=+1;
                                                }
                        } elseif ($dataid == 9) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA9` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 10) {
                            $updateQueryCA = "UPDATE `score` 
                                            SET `CA10` = '$roundup' 
                                            WHERE `CampusID` = '$campusid' 
                                            AND `StudentID` = '$student' 
                                            AND `ClassOrDepartmentID` = '$classid' 
                                            AND `CourseOrSubjectID` = '$subjectid' 
                                            AND `Session` = '$session' 
                                            AND `TermOrSemester` = '$termid'";
                                                $updateQueryCAquery = mysqli_query($link, $updateQueryCA);                                                                    

                                                if($updateQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
            }

                                    }
                                    else
                                    {
                        if ($dataid == 1) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA1`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";


                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                  $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 2) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA2`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                $failed+=+1;
                                                }
            }
                        elseif ($dataid == 3) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA3`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 4) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA4`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 5) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA5`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        }
                        elseif ($dataid == 6) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA6`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 7) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA7`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 8) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA8`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;
            
                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 9) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA9`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                                $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                                if($insertQueryCAquery == true)
                                                {
                                                $success+=+1;

                                                }else
                                                {
                                                $failed+=+1;
                                                }
                        } elseif ($dataid == 10) {
                            $insertQueryCA = "INSERT INTO `score` 
                                            (`CampusID`, `StudentID`, `ClassOrDepartmentID`, `CourseOrSubjectID`, `Session`, `TermOrSemester`, `CA10`) 
                                            VALUES 
                                            ('$campusid', '$student', '$classid', '$subjectid', '$session', '$termid', '$roundup')";
                                            $insertQueryCAquery = mysqli_query($link, $insertQueryCA);       
                                            if($insertQueryCAquery == true)
                                            {
                                            $success+=+1;

                                            }else
                                            {
                                            $failed+=+1;
                                            }
                        }
                        
                    }
                    
                }


             


                    if ($success == 0)
                    {
                        

                        
                        echo "1";
                    }
                    else
                    {
                        echo "10";
                        
                        $insert2 = "INSERT INTO `activitylog`(`InstitutionIDOrCampusID`, `UserID`, `UserType`, `IpAddress`, `Location`, `Longitude`,
                        `Latitude`, `Description`, `Date/Time`) VALUES ('$campusid','$userid','$usertype',
                        '0','0','0','0','$Description','$currentDateTime')";
                        $insert2sl = mysqli_query($link, $insert2);
                    }

?>
 
          