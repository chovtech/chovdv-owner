<?php
     
     include('../../config/config.php');

     $userID = $_POST['UserID'];
     $IntitutionID = $_POST['InstitutionID'];



     $verifyupdatequerysettings = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE  `InstitutionID`='$IntitutionID'");
    $verifyupdatequerysettingscnt = mysqli_num_rows($verifyupdatequerysettings);
     $verifyupdatequerysettingscntrow = mysqli_fetch_assoc($verifyupdatequerysettings);


   




?>





<?php

                if( $verifyupdatequerysettingscnt >0 )
                {
                    $description =  $verifyupdatequerysettingscntrow['Description'];
                    $Title =  $verifyupdatequerysettingscntrow['Title'];
                    $BackgroundImage =  $verifyupdatequerysettingscntrow['BackgroundImage'];
                    $Session =  $verifyupdatequerysettingscntrow['Session'];
                    $Term =  $verifyupdatequerysettingscntrow['Term'];

               
?>

                            



                                 <div class="row">
                                       <div class="col-12 col-sm-12">
                                           <div class="form-group local-forms mb-3">
                                               <label>Admission title </label> 
                                                  <?php
                                                        if($Title  == '')
                                                        {
                                                            
                                                       
                                                  ?>
                                                         <input class="form-control" value="Seeking a Journey of Knowledge and Growth? Apply for Admission Today!" data-id="<?php echo  $IntitutionID?>"  type="text" placeholder="Enter admin title" id="pros-admintitleedit">
                                                  <?php
                                                        }else
                                                        {
                                                            
                                                        
                                                  ?>
                                                         <input class="form-control" value="<?php echo $Title; ?>" data-id="<?php echo  $IntitutionID?>"  type="text" placeholder="Enter admin title" id="pros-admintitleedit">
                                                 <?php
                                                 
                                                  }
                                                  
                                                  ?>
                                              

                                           </div>
                                       </div>

                                       <div class="col-12 col-sm-12">
                                           <div class="form-group local-forms mb-3">
                                               <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                               
                                                  <?php
                                                        if($description  == '')
                                                        {
                                                            
                                                            
                                                   
                                                       
                                                  ?>
                                                  
                                                     <textarea class="form-control" id="prosadmindesedit" rows="3">Congratulations on taking the first step towards unlocking your full potential! We invite you to embark on a transformative educational experience by applying for admission to our prestigious institution. We look forward to welcoming you to the [Institution Name] family and witnessing your incredible journey of growth and achievement. See you soon!</textarea>
                                                  <?php
                                                       }else
                                                       {
                                                        
                                                  ?>
                                                    <textarea class="form-control" id="prosadmindesedit" rows="3"><?php echo $description; ?></textarea>
                                                  
                                                  <?php
                                                       } 
                                                  ?>
                                                  
                                           </div>
                                       </div>



                                       <div class="col-12 col-sm-12 mb-3">
                                           <div class="form-group local-forms">
                                               <label>Session </label>
                                               <select class="form-control select" id="editadminsionsession">

                                                   <option value="0">Select Session </option>

                                                   <?php

                                                                                                                                                    
                                                            $verifysession = mysqli_query($link, "SELECT * FROM `session`");
                                                            $verifysessioncnt = mysqli_num_rows($verifysession);
                                                            $verifysessioncntrow = mysqli_fetch_assoc($verifysession);

                                                            $verifysession_current = mysqli_query($link, "SELECT * FROM `session` WHERE sessionStatus='1'");
                                                            $verifysessioncnt_current = mysqli_num_rows($verifysession_current);
                                                            $verifysessioncntrow_current = mysqli_fetch_assoc($verifysession_current);

                                                            $currentsession = $verifysessioncntrow_current['sessionName'];
                                                             

                                                          do{

                                                            $sessionname = $verifysessioncntrow['sessionName'];

                                                            if($Session ==  $sessionname)
                                                            {
                                                                $selectedsession = 'selected';

                                                            }else
                                                            {
                                                                       $selectedsession = '';
                                                            }

                                                            echo '<option '.$selectedsession.' value="'.$sessionname.'">'.$sessionname.'</option>';
                                                             
                                                          }while($verifysessioncntrow = mysqli_fetch_assoc($verifysession));


                                                    ?>
                                                 


                                               </select>
                                           </div>
                                       </div>


                                       <div class="col-12 col-sm-12">
                                           <div class="form-group local-forms">
                                               <label>Term</label>
                                               <select class="form-control select" id="editadminterm">
                                                   <option value="0">Select Term </option>



                                                   <?php
                                                    
                             
                             
                                                     // select the current term here
                                                     $selecttermsemester = mysqli_query($link, "SELECT * FROM `termorsemester`");
                                                     $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                                                     $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);
                             
                                                   
                                                     // select the current term here


                                                     do{

                                                        $termnameID = $selecttermsemester_row['TermOrSemesterID'];
                                                        $termname = $selecttermsemester_row['TermOrSemesterName'];

                                                        if($Term == $termname)
                                                        {
                                                              $termselected = 'selected';
                                                        }else
                                                        {
                                                            $termselected = '';
                                                        }


                                                        echo '<option '.$termselected.' value="'. $termname.'">'. $termname.'</option>';

                                                     }while($selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester));
                                                   ?>
                                                 
                                               </select>
                                           </div>
                                       </div>
                                    </div>
<?php
                }else{

               

?>







                                                    
                                                    <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group local-forms mb-3">
                                                            <label>Admission title </label> 
                                                            <input class="form-control" value="Seeking a Journey of Knowledge and Growth? Apply for Admission Today!" data-id="<?php echo  $IntitutionID?>"  type="text"placeholder="Enter admin title" id="pros-admintitleedit">
             
                                                        </div>
                                                    </div>
             
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group local-forms mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                               <textarea class="form-control" id="prosadmindesedit" rows="3">Congratulations on taking the first step towards unlocking your full potential! We invite you to embark on a transformative educational experience by applying for admission to our prestigious institution. We look forward to welcoming you to the [Institution Name] family and witnessing your incredible journey of growth and achievement. See you soon!</textarea>


                                                        </div>
                                                    </div>
             
             
             
                                                    <div class="col-12 col-sm-12 mb-3">
                                                        <div class="form-group local-forms">
                                                            <label>Session </label>
                                                            <select class="form-control select" id="editadminsionsession">
             
                                                                <option value="0">Select Group </option>
             
                                                                <?php
             
                                                                                                                                                                 
                                                                         $verifysession = mysqli_query($link, "SELECT * FROM `session`");
                                                                         $verifysessioncnt = mysqli_num_rows($verifysession);
                                                                         $verifysessioncntrow = mysqli_fetch_assoc($verifysession);
             
                                                                         $verifysession_current = mysqli_query($link, "SELECT * FROM `session` WHERE sessionStatus='1'");
                                                                         $verifysessioncnt_current = mysqli_num_rows($verifysession_current);
                                                                         $verifysessioncntrow_current = mysqli_fetch_assoc($verifysession_current);
             
                                                                          $currentsession = $verifysessioncntrow_current['sessionName'];
                                                                          
             
                                                                       do{
             
                                                                         $sessionname = $verifysessioncntrow['sessionName'];
             
                                                                         if($currentsession ==  $sessionname)
                                                                         {


                                                                             $selectedsession = 'selected';
             
                                                                         }else
                                                                         {
                                                                                    $selectedsession = '';
                                                                         }
             
                                                                         echo '<option '.$selectedsession.' value="'.$sessionname.'">'.$sessionname.'</option>';
                                                                          
                                                                       }while($verifysessioncntrow = mysqli_fetch_assoc($verifysession));
             
             
                                                                 ?>
                                                              
             
             
                                                            </select>
                                                        </div>
                                                    </div>
             
             
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group local-forms">
                                                            <label>Term</label>
                                                            <select class="form-control select" id="editadminterm">
                                                                <option value="0">Select Group </option>
             
             
             
                                                                <?php
                                                                 
                                          
                                          
                                                                  // select the current term here
                                                                  $selecttermsemester = mysqli_query($link, "SELECT * FROM `termorsemester`");
                                                                  $selecttermsemester_cnt = mysqli_num_rows($selecttermsemester);
                                                                  $selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester);
                                          
                                                                
                                                                  // select the current term here
             
             
                                                                  do{
             
                                                                     $termnameID = $selecttermsemester_row['TermOrSemesterID'];
                                                                     $termname = $selecttermsemester_row['TermOrSemesterName'];
             
                                                                     if($Term == $termname)
                                                                     {
                                                                           $termselected = 'selected';
                                                                     }else
                                                                     {
                                                                         $termselected = '';
                                                                     }
             
             
                                                                     echo '<option '.$termselected.' value="'. $termname.'">'. $termname.'</option>';
             
                                                                  }while($selecttermsemester_row = mysqli_fetch_assoc($selecttermsemester));
                                                                ?>
                                                              
                                                            </select>
                                                        </div>
                                                    </div>
                                                 </div>                       
                             



<?php
              
                    
                }

?>