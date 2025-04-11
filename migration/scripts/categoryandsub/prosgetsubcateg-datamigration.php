<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../controller/config/config.php');
include('../../../controller/config/config2.php');

    $campusID = $_POST['campusID'];
    $categorytype = $_POST['categorytype'];
    
    $abba_campus_name = str_replace(' ', '_', $_POST['campusname']);
    $abba_campus_name_new = str_replace(',', '_', $_POST['campusname']);
    
    
    if($categorytype == 'category')
    {
        
    


            $select_old_category = mysqli_query($link_abba, "SELECT * FROM `category` WHERE InstitutionID='$campusID'");
            $select_old_category_cnt = mysqli_num_rows($select_old_category);

            if ($select_old_category_cnt > 0) {
                
            
                        $today = date("Y-m-d");
                    $seconds = date("hisa");
                    $time = $today . $seconds; 
                    
                    $csv_header = ["categoryIDOld", "categoryTypeOld", "categoryTitleOld", "InstitutionID", "UserID", "UserType","configTypeOld","date","CategoryIDNew","CategoryTypeNew","CategoryTitleNew"];
                
                    $fileName = $abba_campus_name . '-' . $time;
                    
                    
            
                    $Fname = fopen('../subjectcsv/' . $fileName . '.csv', 'w') or die("Unable to open file!");
                    $lineHeader = $csv_header;
                    fputcsv($Fname, $lineHeader);
                    
                     while ($select_old_category_cnt_row = mysqli_fetch_assoc($select_old_category)) {
                         
                           $categorytitleOLD = $select_old_category_cnt_row['categoryTitle'];
                           $categoryIDOld = $select_old_category_cnt_row['categoryID'];
                           $categoryTypeOld = $select_old_category_cnt_row['categoryType'];
                           $InstitutionID = $select_old_category_cnt_row['InstitutionID'];
                           $UserID = $select_old_category_cnt_row['UserID'];
                            $UserType = $select_old_category_cnt_row['UserType'];
                            $configType = $select_old_category_cnt_row['configType'];
                            $date = $select_old_category_cnt_row['date'];
                           
                           
                           
                           
                           
                           $select_template_category = mysqli_query($link, "SELECT * FROM `category` WHERE CategoryTitle LIKE '%$categorytitleOLD%'");
                            $select_template_category_cntrow = mysqli_fetch_assoc($select_template_category);
                           $select_template_category_cnt = mysqli_num_rows($select_template_category);
                           
                               if($select_template_category_cnt > 0)
                               {
                                   
                                     $CategoryIDNEW = $select_template_category_cntrow['CategoryID'];
                                     $CategoryTypeNEW = $select_template_category_cntrow['CategoryType'];
                                     $CategoryTitleNEW = $select_template_category_cntrow['CategoryTitle'];
                                                          
                               }else
                               {
                                  
                                  
                                  
                                     $CategoryIDNEW = 'NULL';
                                     $CategoryTypeNEW = 'NULL';
                                     $CategoryTitleNEW = 'NULL';
                               }
                          
                          
                          
                           
                                
                                $lineData = array($categoryIDOld, $categorytitleOLD, $categoryTypeOld, $InstitutionID, $UserID, $UserType,$configType,$date,$CategoryIDNEW,$CategoryTypeNEW,$CategoryTypeNEW);
            
                                fputcsv($Fname, $lineData);
                    }
            
                       //set headers to download file rather than displayed
                    $downloadPaths = 'https://edumess-v2.edumess.com/migration/scripts/subjectcsv/' . $fileName . '.csv';
                    
                    echo '<a href="https://edumess-v2.edumess.com/migration/scripts/subjectcsv/'.$fileName .'.csv" download="'.$fileName .'.csv">Download Category</a>';
            
                    
                    $downloadname = $abba_campus_name . '-' . $time;
                    
                    $abba_json = (object) [
                        'downloadPaths' => $downloadPaths,
                        'downloadname' => $downloadname,
                        'abbafilename' => '../subjectcsv/'.$fileName.'.csv'
                    ];
                    
                    // echo $abba_json_content = json_encode($abba_json);
            
            } else {
                echo "No data found in the old category.";
            }
            
    }else if($categorytype == 'subcategory')
    {
        
        
        
                $pros_getsubject_category = mysqli_query($link_abba,"SELECT * FROM `subcategory` WHERE InstitutionID='$campusID'");
                $pros_getsubject_category_cnt = mysqli_num_rows($pros_getsubject_category);
                
                
                if($pros_getsubject_category_cnt > 0)
                {
                    
                    
                    
                    
                       $today = date("Y-m-d");
                    $seconds = date("hisa");
                    $time = $today . $seconds; 
                    
                    $csv_header = ["SubcategoryIDOld", "CategoryIDOld", "InstitutionID", "SubcategoryTitle", "SubcategoryIDNew","CategoryIDNew","SubcategoryTitleNew"];
                
                    $fileName = $abba_campus_name . '-'.'-Subcategory'. $time;
                    
                    
                    
            
                    $Fname = fopen('../categorywithsubcsv/' . $fileName . '.csv', 'w') or die("Unable to open file!");
                    $lineHeader = $csv_header;
                    fputcsv($Fname, $lineHeader);
                    
                    
                      while ($pros_getsubject_category_cnt_row = mysqli_fetch_assoc($pros_getsubject_category)) {
                            
                            
                            $subCategoryIDOLD = $pros_getsubject_category_cnt_row['subCategoryID'];
                            $categoryIDOLD = $pros_getsubject_category_cnt_row['categoryID'];
                            $subCategoryTitleOLD = $pros_getsubject_category_cnt_row['subCategoryTitle'];
                            $InstitutionID = $pros_getsubject_category_cnt_row['InstitutionID'];
                            $UserID = $pros_getsubject_category_cnt_row['UserID'];
                            $date = $pros_getsubject_category_cnt_row['date'];
                            
                            
                            $select_template_sub = mysqli_query($link,"SELECT * FROM `subcategory` WHERE SubcategoryTitle LIKE '%$subCategoryTitleOLD%'");
                            $select_template_sub_cnt_row = mysqli_fetch_assoc($select_template_sub);
                            
                             $select_template_sub_cnt = mysqli_num_rows($select_template_sub);
                             
                             
                             if($select_template_sub_cnt > 0)
                             {
                                 
                                 
                                 $SubcategoryIDNEW = $select_template_sub_cnt_row['SubcategoryID'];
                                 $CategoryIDNEW = $select_template_sub_cnt_row['CategoryID'];
                                 $SubcategoryTitleNEW = $select_template_sub_cnt_row['SubcategoryTitle'];
                                 
                                 
                                 
                                
                                 
                                 
                             }else
                             {
                                 
                                 
                                  $SubcategoryIDNEW = 'NULL';
                                 $CategoryIDNEW = 'NULL';
                                 $SubcategoryTitleNEW = 'NULL';
                             }
                            
                            
                             $subCategoryIDOLD = $pros_getsubject_category_cnt_row['subCategoryID'];
                            
                            
                          $lineData = array($subCategoryIDOLD, $categoryIDOLD, $InstitutionID, $subCategoryTitleOLD, $SubcategoryIDNEW, $CategoryIDNEW,$SubcategoryTitleNEW);
            
                                fputcsv($Fname, $lineData);
                          
                          
                      }
                      
                         //set headers to download file rather than displayed
                        $downloadPaths = 'https://edumess-v2.edumess.com/migration/scripts/categorywithsubcsv/' . $fileName . '.csv';
                        
                        echo '<a href="https://edumess-v2.edumess.com/migration/scripts/categorywithsubcsv/'.$fileName .'.csv" download="'.$fileName .'.csv">Download Subcategory</a>';
                
                        
                        $downloadname = $abba_campus_name . '-' . $time;
                        
                        $abba_json = (object) [
                            'downloadPaths' => $downloadPaths,
                            'downloadname' => $downloadname,
                            'abbafilename' => '../categorywithsubcsv/'.$fileName.'.csv'
                        ];
                    
                }else
                {
                             echo "No data found in the old Sub category.";
                }
                
                
                
        
        
        
    }
?>
