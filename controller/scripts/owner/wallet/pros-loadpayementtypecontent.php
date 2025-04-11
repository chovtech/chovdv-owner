

<?php
                    
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');


        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];
        $proscheckedpayementtype= $_POST['proscheckedpayementtype'];
        $currentDate = date('Y-m-d');

        if($proscheckedpayementtype == 'wallet')
        {




            $select_agency_content = mysqli_query($link, "SELECT * FROM  agencyorschoolowner   WHERE AgencyOrSchoolOwnerID='$UserID'");
            $select_agency_content_cnt = mysqli_num_rows($select_agency_content);
            $select_agency_content_cnt_row = mysqli_fetch_assoc($select_agency_content);
    
    
            $walletamount =   $select_agency_content_cnt_row ['WalletBalance'];



             if( $walletamount == '0')
             {
                    $prosamounwall = '0.00';
             }else{


                $prosamounwall = number_format($walletamount);
               
             }


                echo '
                    <div class="col-md-7 col-12"> 
                        <div class="row"> 
                                  <input type="hidden" class="paymenttypeamountinput prosgeammountforpayementtype" value="'.$walletamount.'"> 

                            <div class="col-12 mb-4"> 
                                <div class="row"> 
                                    <div class="col-md-12 ps-0">
                                            <p class="ps-2 textmuted fw-bold  mb-0">TOTAL WALLET AMOUNT</p>
                                            <span class="fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent-type" >'.$prosamounwall.'</span></span> 
                                        </div> 
                                    </div> 
                                </div>
                            </div> 
                    </div> 
                ';



        }else if($proscheckedpayementtype == 'saved')
        {




            // $currentDate


               $getsavedcontent = mysqli_query($link,  "SELECT * FROM `edumesssavelock` WHERE UserID='$UserID' AND UserType='$UserType' AND SaveStatus='1'");

                $getsavedcontent_cnt = mysqli_num_rows($getsavedcontent);
                $getsavedcontent_row = mysqli_fetch_assoc($getsavedcontent);

               





                    if( $getsavedcontent_cnt  > 0)
                    {



                        $walletamount =   $getsavedcontent_row['Amount'];

                            if( $walletamount == '0')
                            {
                                    $prosamounwall = '0.00';
                            }else{


                                $prosamounwall = number_format($walletamount);
                            
                            }

                    }else
                    {



                        $walletamount = 0;
                        $prosamounwall = '0.00';
                    }
                
                       





                        

                echo '
                <div class="col-md-7 col-12"> 
                    <div class="row"> 
                          <input type="hidden" class="paymenttypeamountinput prosgeammountforpayementtype" value="'.$walletamount.'"> 
    
                        <div class="col-12 mb-4"> 
                            <div class="row"> 
                                <div class="col-md-12 ps-0">
                                        <p class="ps-2 textmuted fw-bold  mb-0">TOTAL SAVED AMOUNT</p>
                                        <span class=" fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent-type" >'.$prosamounwall.'</span></span> 
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                </div> 
             ';

        }else {



            
            $getsavedcontent = mysqli_query($link,  "SELECT * FROM `edumesssavelock` WHERE UserID='$UserID' AND UserType='$UserType' AND SaveStatus='2'");

            $getsavedcontent_cnt = mysqli_num_rows($getsavedcontent);
            $getsavedcontent_row = mysqli_fetch_assoc($getsavedcontent);

               if( $getsavedcontent_cnt > 0)
                {
                    $PayBackDate =   $getsavedcontent_row['PayBackDate'];
                }else

                {
                   
                    

                    $PayBackDate =   0;
                }
                   

           


            if( $PayBackDate > $currentDate  )
            {

                
                $prosamounwall = 'Funds ready, await scheduled date';


                echo '
                <div class="col-md-7 col-12"> 
                    <div class="row"> 
                                  <input type="hidden" class="paymenttypeamountinput" value="0"> 

                        <center><i class="fas fa-exclamation-circle"></i>'.$prosamounwall.'</center>
                                
                        <
                </div> 
            ';

                



            }else
            {




                if($getsavedcontent_cnt > 0)
                {



                    $walletamount =   $getsavedcontent_row['Amount'];
                    


                        if( $walletamount == '0')
                        {
                                $prosamounwall = '0.00';
                        }else{
        
        
                            $prosamounwall = number_format($walletamount);
                        
                        }
    

                }else{

                            $walletamount =  0;
                            
                             $prosamounwall = '0.00';
                   

                }



              

                                
                    echo '
                    <div class="col-md-7 col-12"> 
                        <div class="row"> 
                             <input type="hidden" class="paymenttypeamountinput prosgeammountforpayementtype" value="'.$walletamount.'"> 

                            <div class="col-12 mb-4"> 
                                <div class="row"> 
                                    <div class="col-md-12 ps-0">
                                            <p class="ps-2 textmuted fw-bold  mb-0">TOTAL LOCKED AMOUNT</p>
                                            <span class=" fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent-type" >'.$prosamounwall.'</span></span> 
                                        </div> 
                                    </div> 
                                </div>
                            </div> 
                    </div> 
                ';









            }

            
            
                  




        }
        


        
        

 ?>
