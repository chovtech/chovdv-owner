<?php


         error_reporting(E_ALL);
         ini_set('display_errors', 1);
        
         include('../../../config/config.php');
        
         $InstitutionID =  $_POST['prosgetinstition'];
         
        
         
         $proslectcalenar = mysqli_query($link," SELECT * FROM `calender` INNER JOIN `calender_purpose` ON `calender`.`Purpose_ID` = `calender_purpose`.`sn`  
         WHERE `calender`.InstitutionID='$InstitutionID' LIMIT 2");
         
         $proslectcalenarcnt = mysqli_num_rows($proslectcalenar);
         $proslectcalenarcntrow = mysqli_fetch_assoc($proslectcalenar);
         

          
          
          if($proslectcalenarcnt > 0)
          {
              
              
              
                echo '<br><table class="table" style="font-size: 12px;">
                
                     <tbody>
                        <tr>
                            <th colspan="12">
                                Upcoming Events
                            </th>
                        </tr>';
                
                
                
              
              
                       $proscheckstudentcount = 0;
              
                  do{
                      
                      
                      
                         $Session =  $proslectcalenarcntrow['Session'];
                         $Title =  $proslectcalenarcntrow['Title'];
                         $End_Date =  $proslectcalenarcntrow['End_Date'];
                         $Start_Date =  $proslectcalenarcntrow['Start_Date'];
                         $Purpose =  $proslectcalenarcntrow['Purpose'];
                         
                         

                         $finaldate = date('jS', strtotime($End_Date));
                      
                         $proscheckstudentcount++;
                        
                         if($proscheckstudentcount == '1')
                         {
                             
                             $prosactiveclass = 'active';
                             
                         }else
                         {
                             $prosactiveclass = ''; 
                         }
                         
                         
                         
                         
                         
                         
                         
                        
    
                                       
                                           echo  '<tr>
                                                <th scope="row">
                                                    <div
                                                        style="height: 30px; width: 30px; border-radius: 50%; background-color: rgb(206, 255, 255);">
                                                        <span style="font-size: 15px; padding-left: 5px; color: #2a7df8;">
                                                            <i class="bx bx-calendar-event"></i> 
                                                        </span>
                                                    </div>
                                                </th>
                                                <td style="font-weight: bold;">'.$Title.'</td>
                                                <td>
                                                    <div
                                                        style="height: 28px; width: 28px; border-radius: 50%; background-color: rgb(29, 13, 247);">
                                                        <span style="font-size: 15px; padding-left: 4px; color: #ffffff;">'.$finaldate.'
                                                           
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>';
                                        
                      
                      
                               
                      
                  }while($proslectcalenarcntrow = mysqli_fetch_assoc($proslectcalenar));
                  
                  echo '</tbody>
                    </table>';
              
          }else
          {
              
          }
          
          
         
         
         
         
         
?>