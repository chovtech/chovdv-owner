


<?php

            
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');


        
  
        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];



        $getsavedcontent = mysqli_query($link,  "SELECT * FROM `edumesssavelock` WHERE UserID='$UserID' AND UserType='$UserType' AND SaveStatus='1'");

        $getsavedcontent_cnt = mysqli_num_rows($getsavedcontent);
        $getsavedcontent_row = mysqli_fetch_assoc($getsavedcontent);

        if($getsavedcontent_cnt > 0)
        {



            do{



               $PlanTitle = $getsavedcontent_row ['PlanTitle'];
               $Amount = $getsavedcontent_row ['Amount'];

                echo '<div class="col-12">
                <div class="card pb-2" style="border:1px solid #E5E5E5;border-radius:15px;">
                    <div class="row">
                        <div class="col-8 d-flex align-items-center"
                            style="padding-top:20px;padding-bottom:15px;">
                            <span
                                style="border-radius: 5px;background-color:#f5f5f5;padding:10px;color:black;"
                                class="me-2 ms-3"><i class="fas fa-wallet fs-6"></i></span>
                            <span style="font-size:13px;color:black;">'.$PlanTitle.' <br><span
                                    style="font-size:10px;color:black;">.....</span></span>

                        </div>
                        <div class="col-4">

                        </div>
                        <div class="col-12" style="padding-bottom:15px;">
                            <div class="me-2 ms-3" style="color:black;font-size:11px;">
                                Saving: ₦ '.number_format($Amount ).'
                            </div>

                            <div class="progress me-2 ms-3" style="height: 6px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>

                    </div>

                </div>
               </div><br>';



            }while($getsavedcontent_row = mysqli_fetch_assoc($getsavedcontent));

          



        }else{


            echo '<br><center><i class="fas fa-exclamation-circle"></i> No Records Found.</center>';
        }




 ?>