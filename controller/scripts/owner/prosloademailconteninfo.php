<?php

        include('../../config/config.php');
        
         $campusID = $_POST['campusID'];
         $UserID = $_POST['UserID'];
         $studentID = $_POST['studentID'];
         $phone = $_POST['phone'];
         $email = $_POST['email'];
         $schoolUrl = $_POST['link'];
         $regNo = $_POST['regno'];



        

 
                echo '
                  <a href="javascript:();" class="prossendlogintoinputbtnemail">send login details</a>

                  <input type="hidden" class="prosgetlinkforeamilhere" value="'.$schoolUrl .'">
                  <input type="hidden" class="prosgetregnoforeamilhere" value="'.$regNo .'">
                <div class="container border  bg-light">
                <div class="row">
                    
                    <div class="col-sm-12 border-left py-3">
                     <h5>Send Email to Applicant </h5>
                    <div class="form-group mb-3">
                        <h6 for="name">Title</h6>
                        <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Enter Title"
                        />
                    </div>
                    
                    <div class="form-group mb-3">
                        <h6 for="message">Message</h6>
                        <textarea class="form-control prosemaiildescription"  rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary prosproceedtosendemailbtn" >Send <i class="fa fa-envelope"></i></button>
                    </div>
                </div>
                </div>';





?>