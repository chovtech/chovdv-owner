



                                 
        <!--===pros post transaction here INCOME===-->
        <div class="modal fade modalshow modalfade" id="prosperpostincometransaction" tabindex="-1"
            aria-labelledby="prosperpostincometransactionLabel" aria-hidden="true" style="z-index:2000;">
            <div class="modal-dialog dialogcontent modal-dialog-scrollable"
                style="border-top-left-radius: 20px; width: 100%;">
                <div class="modal-content modalcontent" style="background-color: #ffffff;">


                    <div class="modal-header">
                        <h5 class="modal-title text-primary">Post Payment (Income)<i class=""></i>
                        </h5>

                        <button type="button" id="pros-assignoptionfee-moal-btn" class="btn btn-sm btn-primary"
                            style="float: right; font-size: 12px;">
                            <i class='fa fa-plus'></i> Optional Fee
                        </button>

                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">



                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Campus<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactioncampus">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Class<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionclass">
                                        <option value="0">Select Class</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Session<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionsession">
                                        <option value="NULL">Select Session</option>
                                        <?php
                                                    $selectsessionpros = mysqli_query($link, "SELECT * FROM `session`");
                                                    $selectsessionproscnt = mysqli_num_rows($selectsessionpros);
                                                    $selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros);



                                                    if ($selectsessionproscnt > 0) {
                                                        do {


                                                            $sessionName = $selectsessionproscnt_row['sessionName'];
                                                            $sessionID = $selectsessionproscnt_row['sessionID'];
                                                            $sessionStatus = $selectsessionproscnt_row['sessionStatus'];


                                                            if ($sessionStatus == '1') {
                                                                $prosselectcurrentsession = 'selected';
                                                            } else {
                                                                $prosselectcurrentsession = '';
                                                            }

                                                            echo '<option ' . $prosselectcurrentsession . ' value="' . $sessionName . '">' . $sessionName . '</option>';



                                                        } while ($selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros));
                                                    } else {
                                                        echo '<option value="NULL">No session found</option>';
                                                    }

                                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Term<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionterm">
                                        <option value="NULL">Select Term</option>


                                    </select>
                                </div>
                            </div>




                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Transction Type <span style="color:orangered;">*</span> </label>
                                    <div class="hidden-toggles">
                                        <input name="coloration-level" type="radio" id="coloration-low" value="Normal"
                                            class="hidden-toggles__input prosnormalpaymentincome progeneral-transactypeforincome">
                                        <label for="coloration-low" class="hidden-toggles__label">Normal</label>
                                        <input name="coloration-level" type="radio" value="Scholarship"
                                            id="coloration-medium"
                                            class="hidden-toggles__input progeneral-transactypeforincome">
                                        <label for="coloration-medium" class="hidden-toggles__label">Scholarship</label>
                                        <input name="coloration-level" type="radio" value="Discount" id="coloration-high"
                                            class="hidden-toggles__input progeneral-transactypeforincome">
                                        <label for="coloration-high" class="hidden-toggles__label">Discount</label>

                                    </div>
                                </div>
                            </div>


                            <p></p>
                            <div class="col-sm-12">
                                <div class="form-group abba_local-forms">
                                    <label>Student<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionstudent">
                                        <option value="0">Select Student</option>
                                    </select>
                                </div>
                            </div>


 

                            <!-- PROS LOAD PYMENT BALANCE AND PAID -->
                            <div class="row">
                                <div class="col-sm-12" style="display:none;" id="prosloadincometransactionamount">
                                    <div style="display: flex; margin-right: 10px; float: right;">
                                        <div>
                                            Paid
                                            <p class="mt-3">

                                                <span
                                                    style="font-weight: 500; background: #EEEEEE; border-radius: 10px; padding: 4px 4px 4px 2px;">
                                                    <i class='bx bx-up-arrow-alt'
                                                        style="font-size: 14px; font-weight: 500; transform: rotate(45deg); color: #28f828"></i>
                                                    <span style="font-size: 12px; color: #0cec0c; font-weight: 600;"
                                                        id="prosloadpaidamountincome"> </span>
                                                </span>
                                            </p>
                                        </div>&nbsp;&nbsp;
                                        <div style="margin-left: 5px;">
                                            <span class="ms-3">Balance</span>
                                            <p class="mt-3">
                                                <span
                                                    style="font-weight: 500; background: #EEEEEE; border-radius: 10px;  padding: 4px 4px 4px 2px;">

                                                    <i class='bx bx-up-arrow-alt'
                                                        style="font-size: 14px; font-weight: 500; transform: rotate(130deg); color: #ff0000;"></i>
                                                    <span style="font-size: 12px; color: #ff0000; font-weight: 500;"
                                                        id="prosloadbalanceamountincome"></span>
                                                    <!-- <span class="fa fa-eye text-primary"></span> -->

                                                </span><br>
                                                <a class="ms-3" data-bs-toggle="collapse" href="#multiCollapseExample1"
                                                    aria-expanded="false" aria-controls="multiCollapseExample1"
                                                    style="color:blue;font-size:12px;cursor:pointer;">view Details</a>
                                            </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- PROS LOAD PYMENT BALANCE AND PAID -->


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collapse multi-collapse "  id="multiCollapseExample1">
                                        <div class="card card-body prosloadfeesummarycontent">


                                            <div class="table-responsive prosload-paymentsummaryforincome">


                                            </div>


                                        </div>
                                    </div><br>
                                </div>
                            </div>




                            <div class="col-sm-12">
                                <div class="form-group abba_local-forms">
                                    <label>Amount<span style="color:orangered;">*</span> </label>
                                    <input type="number" class="form-control prospostransactionicomeamount"
                                        placeholder="Amount" />
                                </div>
                            </div>

                        </div>






                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
                        <button type="button"
                            class="btn btn-sm text-white mt-2 rounded-3 bg-primary pros-submit-income-posttransaction-btn">
                            <i class="fas fa"> Pay</i> <img
                                src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- === pros post transaction here INCOME== -->





          <!--===pros post transaction here exp===-->
          <div class="modal fade modalshow modalfade" id="prosperpostincometransactionexpen" tabindex="-1"
            aria-labelledby="prosperpostincometransactionLabel" aria-hidden="true" style="z-index:2000;">
            <div class="modal-dialog dialogcontent modal-dialog-scrollable"
                style="border-top-left-radius: 20px; width: 100%;">
                <div class="modal-content modalcontent" style="background-color: #ffffff;">


                    <div class="modal-header">
                        <h5 class="modal-title text-primary">Post Payment (Expenditure)<i class=""></i>
                        </h5>

                        <!-- <button type="button" id="pros-assignoptionfee-moal-btn" class="btn btn-sm btn-primary"
                            style="float: right; font-size: 12px;">
                            <i class='fa fa-plus'></i> Optional Fee
                        </button> -->

                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">



                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Campus<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactioncampusexp">
                                        <option value="NULL">Select Campus</option>
                                    </select>
                                </div>
                            </div>


                           
                           

                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Session<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionsessionexp">
                                        <option value="NULL">Select Session</option>
                                        <?php
                                                    $selectsessionpros = mysqli_query($link, "SELECT * FROM `session`");
                                                    $selectsessionproscnt = mysqli_num_rows($selectsessionpros);
                                                    $selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros);



                                                    if ($selectsessionproscnt > 0) {
                                                        do {


                                                            $sessionName = $selectsessionproscnt_row['sessionName'];
                                                            $sessionID = $selectsessionproscnt_row['sessionID'];
                                                            $sessionStatus = $selectsessionproscnt_row['sessionStatus'];


                                                            if ($sessionStatus == '1') {
                                                                $prosselectcurrentsession = 'selected';
                                                            } else {
                                                                $prosselectcurrentsession = '';
                                                            }

                                                            echo '<option ' . $prosselectcurrentsession . ' value="' . $sessionName . '">' . $sessionName . '</option>';



                                                        } while ($selectsessionproscnt_row = mysqli_fetch_assoc($selectsessionpros));
                                                    } else {
                                                        echo '<option value="NULL">No session found</option>';
                                                    }

                                                    ?>
                                    </select>
                                </div>
                            </div>

                           
                            <div class="col-sm-6">
                                <div class="form-group abba_local-forms">
                                    <label>Class<span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactiontermexp">
                                        <option value="0">Select Term</option>
                                    </select>
                                </div>
                            </div>
                           




                            <div class="col-sm-6">
                                 
                                <div class="form-group abba_local-forms">
                                    <label>Expense Type <span style="color:orangered;">*</span> </label>
                                    <select class="form-control" id="prosperloadtransactionexptitle">
                                        <option value="NULL">Select Expense Type</option>
                                       
                                           <?php
                                                $prosfetexp = mysqli_query($link, "SELECT * FROM `category` INNER JOIN `subcategory` ON `category`.`CategoryID` = `subcategory`.`CategoryID` WHERE `category`.`CategoryType`='expenditure'");
                                                $prosfetexpcnt = mysqli_num_rows($prosfetexp);
                                                $prosfetexpcntrow = mysqli_fetch_assoc($prosfetexp);

                                                if($prosfetexpcnt > 0)
                                                {
                                                      do{

                                                       $SubcategoryTitle =  $prosfetexpcntrow['SubcategoryTitle'];
                                                       $SubcategoryID =  $prosfetexpcntrow['SubcategoryID'];
                                                       $CategoryID =  $prosfetexpcntrow['CategoryID'];

                                                       echo '<option data-id="'.$CategoryID.'" value="'.$SubcategoryID.'">'.$SubcategoryTitle.'</option>';

                                                      }while($prosfetexpcntrow = mysqli_fetch_assoc($prosfetexp));
                                                }


                                           ?>


                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-">
                                <div class="form-group abba_local-forms">
                                    <label>Amount<span style="color:orangered;">*</span> </label>
                                    <input type="number" class="form-control prospostransactionicomeamountexpen prosgeneralerrohandlerexp"
                                        placeholder="Amount" />
                                </div>
                            </div>

                        </div>
                      

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
                        <button type="button"
                            class="btn btn-sm text-white mt-2 rounded-3 bg-primary pros-submit-income-posttransactionexp-btn">
                            <i class="fas fa"> Post</i> <img
                                src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- === pros post transaction here exp== -->




    <!--===pros load optional fee here=======-->
    <div class="modal fade" id="pros-assignoptionalfeehere-modal" tabindex="-1"
        aria-labelledby="pros-assignoptionalfeehere-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content " style="border-radius: 20px;">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">Optional Fee<i class=""></i>
                    </h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div align="center" id="prosnorecoredselectalloption">

                           <?php                         
                             prosloadnotimagefound($link);
                            ?>

                    </div>

                    <div id="prosload-optionalfeecontent">
                    </div>


                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
                        <button type="button"
                            class="btn btn-sm text-white mt-2 rounded-3 bg-primary pros-submit-optionalfee-assignmentbtn">Assign
                            <i class="fa fa-plus" style="font-size:12px;"> </i> </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--===pros load optional fee here=======-->



    <!--===PROS SUBMIT RECEIPT HERE=======-->
    <!-- Modal -->
    <div class="modal fade" id="prosload-share-receipt-modal" tabindex="-1" aria-labelledby="prosload-share-receipt-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog " style="padding:10px;">
            <div class="modal-content ">
                <div class="modal-body">

                        <input type="hidden" id="pros-storeref-nohere">
                    <center>
                        <h6>Set Parent's WhatsApp number below</h6>
                    </center>
                    <br>
                    <div class="proscontentadminrecord" >
                           
                           
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="parentwhatnumber" class="form-label">Input WhatsApp Number</label>
                                            <input type="number" class="form-control parentwanumbertrasaction" id="parentwhatnumber" placeholder="">
                                        </div>
                                        
                                        <button type="button"
                                               class="btn btn-sm text-white mt-2  bg-primary btn-lg  parentsphonenumbersave_btn" style="width:100%;">Save
                                        </button>
                                    </div>
                                </div>
                            </div>

                        <!--<center>-->
                        <!--    <ul class="prosiconsadminrecord d-flex flex-row gap-3">-->
                        <!--        <a href="javascript:void();" class="prosloadwhatmodalmessgebtn" id="proswhatappbtn"><i-->
                        <!--                class="fab fa-whatsapp"></i></a>-->
                        <!--        <a href="javascript:void();" class="prosload-sms-messgebtn" id="pros-smsbtn"><i-->
                        <!--                class="fa fa-sms"></i></a>-->
                        <!--        <a href="javascript:void();" id="prosloademailinputforemailbtn"><i-->
                        <!--                class="fa fa-envelope"></i></a>-->
                        <!--    </ul>-->
                        <!--</center>-->
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===PROS SUBMIT RECEIPT HERE=======-->


       


        <!--==== Withdraw Modal==== -->
        <div class="modal fade" id="pros-delete-transaction" tabindex="-1"
            aria-labelledby="pros-delete-transactionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-body">
                        
                            <button type="button" style="float:right;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div align="center">
                            <h4 class="mt-3">Delete Transaction</h4>
                        </div>

                        <div class="row ms-2">
                                
                                Are you sure you want to delete this transaction?<br>
                            <span><strong>Note:</strong> This action is irreversible.</span>

                        </div>
                    </div>
                                    <input type="hidden" id="pros-delete-transaction">
                                    <input type="hidden" id="prosdeletecampustransactionhere">


                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-sm bg-light text-primary mt-2 rounded-3 btn-outline-primary"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"> Close</i></button>
                        <button type="button"
                            class="btn btn-sm text-white mt-2 rounded-3 bg-danger pros-delete-transaction-btn">
                            Delete <i class="fa fa-times" style="font-size:12px;"> </i> </button>
                    </div>


                </div>
            </div>
        </div>
        <!--===Withdraw Modal=======-->

      <!--==Individualize Bill Modal==-->
        <div class="modal fade" id="individualizebillModal" tabindex="-1"
            aria-labelledby="individualizebillModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div align="center">
                            <h5 style="font-weight: 500;">Individualize Bill</h5>
                        </div>

                        <button type="button" 
                            class="btn btn-sm btn-primary prosprint-indviduli-fee-btn"
                            style="float: right; font-size: 12px;">
                            <i class='bx bx-mail-send'></i> Print
                        </button>

                    </div>
                    <div class="modal-body prosloadindividualizebill" >

                        
                   

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--==Individualize Bill Modal==-->



     <!--===Send message Individual Modal==-->
        <div class="modal fade" id="prossendmessageindividual" tabindex="-1"
        aria-labelledby="prossendmessageindividualLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div align="center">
                        <h4 style="font-weight: 500;">Compose Message</h4>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="row pt-5">
                        <div class="col-12">
                            <!--Ps this collape theme is for  Whatapp -->
                            <div class="row pb-4">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="collapse" id="collapseExample301wa">
                                        <div class="card card-body prosloadwhatcontenthere-direct" >
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div>

                            <!--Ps this collape theme is for both Whatapp and SMS message-->
                            <div class="row pb-4">
                                <div class="col-3"></div>
                                <div class="col-6 ">
                                    <div class="collapse" id="collapseExample402">
                                        <div class="card card-body prosloademailmessagecontenthere">
                                           
                                              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div>

                            <fieldset class="checkbox-group">

                                <div class="checkbox" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample301wa"
                                    aria-expanded="false"
                                    aria-controls="collapseExample301wa">
                                    <label class="checkbox-wrapper prosgeneralmessageclick">
                                        <input type="radio" name="singlemessage" value="whatsApp" class="checkbox-input proscheckmessagesinglehere-type" />
                                        <span class="checkbox-tile">
                                            <span class="checkbox-icon"><i class='bx bxl-whatsapp' style="color: #28f828; font-size: 40px;"></i></span>
                                            <span class="checkbox-label">Whatsapp</span>
                                            <!-- <small style="font-size: 10px;">1,200
                                                Units</small> -->
                                        </span>
                                    </label>
                                </div>

                                <div class="checkbox coming_soon" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample301"
                                    aria-expanded="false"
                                    aria-controls="collapseExample301">
                                    <label class="checkbox-wrapper prosgeneralmessageclick">
                                        <input type="radio" name="singlemessage" value="sms" class="checkbox-input proscheckmessagesinglehere-type"
                                                />
                                        <span class="checkbox-tile">
                                            <span class="checkbox-icon">
                                                 <i class='bx bx-message-rounded'  style="font-size: 40px; color: #2260ff;"></i>
                                                   
                                            </span>
                                            <span class="checkbox-label">SMS-Mail</span>
                                            <small style="font-size: 10px;">1,200
                                                Units</small>
                                        </span>
                                    </label>
                                </div>
                                
                                <div class="checkbox" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample402"
                                    aria-expanded="false"
                                    aria-controls="collapseExample402">
                                    <label class="checkbox-wrapper prosgeneralmessageclick">
                                        <input type="radio" class="checkbox-input proscheckmessagesinglehere-type" value="email" name="singlemessage"/>
                                        <span class="checkbox-tile">
                                            <span class="checkbox-icon">
                                                <i class='bx bx-envelope'
                                                    style="color: #ff0000; font-size: 40px;"></i>
                                            </span><i class='bx bxl-gmail'></i>
                                            <span class="checkbox-label">E-mail</span>
                                        </span>
                                    </label>
                                </div>
                                <legend class="checkbox-group-legend">How do you want to
                                    send?</legend>
                            </fieldset>

                            <!--Ps this collape theme is for both Whatapp and SMS message-->
                            <div class="collapse" id="collapseExample301">
                                <div style="padding: 30px;">
                                    <div class="mb-3">
                                        <select class="form-select" style="color: #666666;"
                                            aria-label="Default select example">
                                            <option selected>Sender ID</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" style="color: #666666;"
                                            class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-3">
                                            <div class="mb-1"
                                                style="height: 45px; background-color: #f7f7f7; padding: 10px;">
                                                <div style="font-size: 15px;">Recipient
                                                </div>
                                            </div>
                                            <div class="card card-body"
                                                style="height: 51vh;">
                                                <div class="mb-3">
                                                    <input type="text"
                                                        style="color: #666666; border: none; border-bottom: #888888 solid 1px;"
                                                        class="form-control"
                                                        placeholder="Search Recipient">
                                                </div>
                                                <div class="form-check prosloadnamefochatwhataap-box">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <textarea class="textarea_editor form-control prosmeassge-content-single"
                                                rows="15"
                                                placeholder="Enter text ..."></textarea>
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <div class="card" style="height: 59vh;">
                                                <div style="padding: 10px;">
                                                    {Student Fee Details}
                                                    <hr>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                              <!--Ps this collape theme is for  Whatapp -->
                            <div class="collapse" id="collapseExample301wa">
                                <div style="padding: 30px;">
                                    
                                    <!--<div class="mb-3">-->
                                    <!--    <select class="form-select" style="color: #666666;"-->
                                    <!--        aria-label="Default select example">-->
                                    <!--        <option selected>Sender ID</option>-->
                                    <!--    </select>-->
                                    <!--</div>-->
                                    
                                    <div class="mb-3">
                                        <input type="text" style="color: #666666;"
                                            class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-3">
                                            <div class="mb-1"
                                                style="height: 45px; background-color: #f7f7f7; padding: 10px;">
                                                <div style="font-size: 15px;">Recipient
                                                </div>
                                            </div>
                                            <div class="card card-body"
                                                style="height: 51vh;">
                                                <div class="mb-3">
                                                    <input type="text"
                                                        style="color: #666666; border: none; border-bottom: #888888 solid 1px;"
                                                        class="form-control messagetitlewa"
                                                        placeholder="Search Recipient">
                                                </div>
                                                <div class="form-check prosloadnamefochatwhataap-box">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <textarea class="textarea_editor form-control prosmeassge-content-singlewa"
                                                rows="15"
                                                placeholder="Enter text ..."></textarea>
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <div class="card" style="height: 59vh;">
                                                <div style="padding: 10px;">
                                                    {Student Fee Details}
                                                    <hr>
                                                       <div class="proloadstudenfeewhat"></div>
                                                       

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Ps this collape theme is for E-mail message-->
                            <div class="collapse" id="collapseExample402">
                                <div style="padding: 30px;">
                                    <div class="mb-3">
                                        <input type="text" style="color: #666666;"
                                            class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-12 col-lg-3">
                                            <div class="mb-1"
                                                style="height: 45px; background-color: #f7f7f7; padding: 10px;">
                                                <div style="font-size: 15px;">Recipient
                                                </div>
                                            </div>
                                            <div class="card card-body"
                                                style="height: 51vh;">
                                                <div class="mb-3">
                                                    <input type="text"
                                                        style="color: #666666; border: none; border-bottom: #888888 solid 1px;"
                                                        class="form-control"
                                                        placeholder="Search Recipient">
                                                </div>
                                                <div class="form-check prosloademailnamepros">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <textarea class="textarea_editor form-control"
                                                rows="15"
                                                placeholder="Enter text ..."></textarea>
                                        </div>
                                        <div class="col-md-12 col-lg-3">
                                            <div class="card" style="height: 59vh;">
                                                <div style="padding: 10px;">
                                                    {Student Fee Details}
                                                    <hr>
                                                     <div class="proloadstudenfeewhat"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pros-submitted-message-singlebtn">Send Message</button>
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
    <!--===Send mesaage Individual Modal==-->



            <!--===Send message Group Modal=======-->
            <div class="modal fade" id="exampleModalSend" tabindex="-1"
                aria-labelledby="exampleModalLabelSend" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div align="center">
                                <h4 style="font-weight: 500;">Compose Message</h4>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="row pt-5">
                                <div class="col-12">

                                    <fieldset class="checkbox-group">

                                        <div class="checkbox" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample101"
                                            aria-expanded="false"
                                            aria-controls="collapseExample101">
                                            <label class="checkbox-wrapper prosgeneralmessageclick">
                                                <input type="radio" name="prosloadallradion" class="checkbox-input" />
                                                
                                                <span class="checkbox-tile">
                                                    
                                                     <span class="checkbox-icon"> <i class='bx bxl-whatsapp' style="color: #28f828; font-size: 40px;"></i></span>
                                                     <span class="checkbox-label">Whatsapp</span>
                                                     <!--<small style="font-size: 10px;">1,200  Units</small>-->
                                                     
                                                 </span>
                                            </label>
                                        </div>
                                        
                                        <div class="checkbox coming_soon" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample101"
                                            aria-expanded="false"
                                            aria-controls="collapseExample101">
                                            <label class="checkbox-wrapper prosgeneralmessageclick">
                                                <input type="radio" name="prosloadallradion" class="checkbox-input"
                                                     />
                                                <span class="checkbox-tile">
                                                    
                                                    <span class="checkbox-icon"><i class='bx bx-message-rounded' style="font-size: 40px; color: #2260ff;"></i> </span>
                                                     
                                                    <span class="checkbox-label"> SMS-Mail </span>
                                                    <small style="font-size: 10px;"> </small>
                                                       
                                                        
                                                </span>
                                            </label>
                                        </div>
                                        <div class="checkbox" data-bs-toggle="collapse"
                                            data-bs-target="#collapseExample202"
                                            aria-expanded="false"
                                            aria-controls="collapseExample202">
                                            <label class="checkbox-wrapper prosgeneralmessageclick">
                                                <input type="radio" name="prosloadallradion" class="checkbox-input" />
                                                <span class="checkbox-tile">
                                                    <span class="checkbox-icon">
                                                        <i class='bx bx-envelope'
                                                            style="color: #ff0000; font-size: 40px;"></i>
                                                    </span><i class='bx bxl-gmail'></i>
                                                    <span class="checkbox-label">E-mail</span>
                                                </span>
                                            </label>
                                        </div>
                                        <legend class="checkbox-group-legend">How do you want to
                                            send?</legend>
                                    </fieldset>

                                    <!--Ps this collape theme is for both Whatapp and SMS message-->
                                    <div class="collapse" id="collapseExample101">
                                        <div style="padding: 30px;">
                                            <div class="mb-3">
                                                <!--<select class="form-select" style="color: #666666;"-->
                                                <!--    aria-label="Default select example">-->
                                                <!--    <option selected>Sender ID</option>-->
                                                <!--</select>-->
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" style="color: #666666;"
                                                    class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="mb-1"
                                                        style="height: 45px; background-color: #f7f7f7; padding: 10px;">
                                                        <div style="font-size: 15px;">Recipient
                                                        </div>
                                                    </div>
                                                    <div class="card card-body"
                                                        style="height: 51vh; overflow-y: auto;">
                                                        <div class="mb-3">
                                                            <input type="text"  style="color: #666666; border: none; border-bottom: #888888 solid 1px;" class="form-control prosloadfeedrivesearch"  placeholder="Search Recipient">
                                                         </div>
                                                         
                                                         
                                                              <div id="prosloadwhatmesscontstudentwhatcont"></div>
                                                        
                                                       
                                                       

                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <textarea class="textarea_editor form-control"
                                                        rows="15"
                                                        placeholder="Enter text ..."></textarea>
                                                </div>
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="card" style="height: 59vh;">
                                                        <div style="padding: 10px;">
                                                            {AllStudFeeDetails}
                                                            <hr>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Ps this collape theme is for E-mail message-->
                                    <div class="collapse" id="collapseExample202">
                                        <div style="padding: 30px;">
                                            <div class="mb-3">
                                                <input type="text" style="color: #666666;"
                                                    class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="mb-1"
                                                        style="height: 45px; background-color: #f7f7f7; padding: 10px;">
                                                        <div style="font-size: 15px;">Recipient
                                                        </div>
                                                    </div>
                                                    <div class="card card-body"
                                                        style="height: 51vh;">
                                                        <div class="mb-3">
                                                            <input type="text"
                                                                style="color: #666666; border: none; border-bottom: #888888 solid 1px;"
                                                                class="form-control"
                                                                placeholder="Search Recipient">
                                                        </div>
                                                        
                                                         <div id="prosloademailmesscontstudentemailcont"></div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <textarea class="textarea_editor form-control"
                                                        rows="15"
                                                        placeholder="Enter text ..."></textarea>
                                                </div>
                                                <div class="col-md-12 col-lg-3">
                                                    <div class="card" style="height: 59vh;">
                                                        <div style="padding: 10px;">
                                                            {AllStudFeeDetails}
                                                            <hr>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Send Message</button>
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--===Send  message Group Modal=======-->


            <!-- LOAD CATEGORY SUMMARY CONENT HERE -->

                    <!-- Request Item -->
                    <div class="modal fade" id="prosviewcategorysubpymenteach-modal" tabindex="-1" aria-labelledby="prosviewcategorysubpymenteach-modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content"  style="border-radius: 20px;">

                                <div class="modal-header">
                                    <h5 class="modal-title text-primary">
                                        <i class="fas fa-eye"> View Category Details</i>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body prosloadcategoryitemsfeeinbit">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                                    <button type="button" class="btn btn-primary btn-sm" id="pros-print-categorybtn"> 
                                        <i class="fa fa-print"> Print</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
             <!-- LOAD CATEGORY SUMMARY CONENT HERE -->


            <div id="prosloadsinglemessagecontent"></div>




            <!-- PROS LOAD SCHOOL PROCEED CONTENT MODAL -->


                    <!-- Request Item -->
                    <div class="modal fade" id="prosloadmodalforschoolproced" tabindex="-1" aria-labelledby="prosloadmodalforschoolprocedLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content"  style="border-radius: 20px;">

                                <div class="modal-header">
                                    <h5 class="modal-title text-primary">
                                        <i class="fas fa-eye">CLASS FEE SUMMARY</i>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body prosloadschoolsummayforeachclass">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                                    <button type="button" class="btn btn-primary btn-sm pros-printclassfeesummary-scholprocced-btn" > 
                                        <i class="fa fa-print"> Print</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- PROS LOAD SCHOOL PROCEED CONTENT MODAL -->
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
            <!--==== =Transfer Modal In Bulk===== -->
         <div class="modal fade" id="prosloadcountdown" tabindex="-1" aria-labelledby="prosloadcountdownLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-body overflow-auto">
                        <div align="center">
                            <h4 class="mt-3"><i class="fas fa-hourglass-start"></i> Set Fee Countdown</h4>
                        </div>
                                  <br>

                                       <div class="form-group abba_local-forms ">
                                            <label>Start Date<span style="color:orangered;">*</span> </label>
                                            <input type="date" class="form-control prosgestartdatecoundown schedulepaymentdate" >
                                        </div>


                                        <div class="form-group abba_local-forms ">
                                            <label>End Date<span style="color:orangered;">*</span> </label>
                                            <input type="date" class="form-control prosgeenddatecoundown schedulepaymentdate" >
                                        </div>


                                       
                                        <div class="form-group abba_local-forms ">
                                            <label>Description<span style="color:orangered;">*</span> </label>
                                            <textarea class="form-control proscoundowndescription" placeholder="Enter text (max 158 characters)" maxlength="158" id="floatingTextarea2" style="height: 100px"></textarea>
                                        </div>




                                            <div class="row">
                                                    <div class="col-12" style="padding: 30px;">
                                                        <button class="btn btn-primary prossubmit-timecountdownbtn" data-id="save"   style="width: 100%;" type="button">
                                                            <i class="fas fa-hourglass-start"></i>  Set Now
                                                        </button>
                                                        <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                                                            by EduMESS
                                                        </div>
                                                    </div>
                                            </div>

                              

                                
     
                                
                     </div>
                </div>
            </div>
        </div>
        <!--===Transfer Modal In Bulk=======-->
                                
                                
                  
          <!--=======HOSTEL MODAL CONTENT HERE=======-->
          
         
          
<!-- create subject -->
<div class="modal fade modalshow modalfade" id="emma_hostel_edit_modal_pop_up" tabindex="-1"
        aria-labelledby="abba_create_class_ModalLabel" aria-hidden="true">
        <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
            <div class="modal-content modalcontent" style="background-color:#ffffff; ">

                <div class="modal-header">
                    <h5 class="modal-title text-primary">
                        <i class="fas fa-edit"> Edit hostel for campus</i>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="" id="emma_load_edit_content">
                    </div>
                   
                    <div class="row emmaloadedit-hostel-show" style="display:none;">
                        <div class="col-sm-12" >
                            <div class="form-group abba_local-forms" id="emma_hostel_name">
                                <label>Hostel Name<span style="color:orangered;">*</span> </label>
                                <input type="text" class="form-control emma_get_hostel_name" id="emma_get_hostel_name">
                            </div>

                            <div class="form-group abba_local-forms" id="emma_hostel_amount">
                                <label>Hostel Amount<span style="color:orangered;">*</span></label>
                                <input type="number" class="form-control emma_get_hostel_amount" id="emma_get_hostel_amount">
                            </div>  
                        </div>  
                    </div>
                </div>

                <div class="modal-footer" id="change_create_btn">
                    <span style="margin-left:-50px;"></span>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                    <button type="button" class="btn btn-primary btn-sm emma_proceed_to_change_hostel" id="emma_proceed_to_change_hostel"> 
                        <i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>
                    </button>
                </div>
            </div>
        </div>
    </div>

     <!-- load edit content here -->
     <div id="emmaloadeditfullhostelcontent"></div>
    <!-- load edit content here -->

    
     <!-- Delete Single class-->
    <div class="modal fade" id="emma_hostel_delete_modal_pop_up" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Hostel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p align="center">
                        Are you sure you want to delete this hostel <span id="display-delete_route_name"> </span>?<br><br>
                        <span class="text-danger">Note that all details concerning this class will be deleted as well.</span>
                        
                        <input type="hidden" id="delete_hostel_id">
                        <input type="hidden" id="delete_hostel_campus_id">
                        <input type="hidden" id="display-delete_hostel_name">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                    <button type="button" class="btn btn-danger btn-sm emmadeletehostelbtn"><i class="fa fa-trash"> Yes! Delete</i></button>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="emma_financeonboardingModal4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="financeonboardingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg emma_transport_modal">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn float-end text-primary emma_close_transport_modal" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times">Close</i></button>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card-body">
                                    <h3 class="fw-bold pt-3 pb-3">Hostel Set Up</h3>
                                    <p class="text-lg pb-3">Hi, I will be assisting you in setting up your hostel (to ensure you choose the right hostel). Please click 'Proceed' so we can begin.  </p>
                                    <!-- cards -->
                                    <div class="row row-cols-1 row-cols-lg-3 border-bottom"></div>
                                        <button class="btn btn-primary float-start btn-lg text-white mt-2 rounded-3 emma_hostel_proceed_btn" data-bs-target="#financeonboardingModal2" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fas fa"> Proceed</i> <i class="fas fa-angle-right"></i>
                                        </button>
                                </div>      
                            </div>     

                            <div class="col-lg-5">
                                <div class="row">
                                            
                                    <?php

                                        $pros_select_welcomingimage = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-welcoming-image'");
                                        $pros_select_welcomingimage_count = mysqli_num_rows($pros_select_welcomingimage);
                                        $pros_select_welcomingimage_row = mysqli_fetch_assoc($pros_select_welcomingimage);

                                        if ($pros_select_welcomingimage_count > 0) {
                                            $pros_general_welcomingimage = $pros_select_welcomingimage_row['BaseSixtyFour'];

                                            echo '<img src="'.$pros_general_welcomingimage.'" alt="">';
                                        
                                        }

                                    ?>
                                                        
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>



<div class="modal fade" id="emma_financeonboardingModal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="financeonboardingModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="float-end" align="right">
                <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
            </div>
            <div class="modal-body">

            <div class="row justify-content-center mt-2 emmahostelfirstcard" id="cardSection" style="display:none">
                <!-- col -->
                <div class="col-lg-9 col-md-8">
                    <h5 class="fw-bold pt-1">Please select a campus</h5>
                    <p class="small pb-5">kindly select the campus that you would like to set the hostel for</p>
                    <!-- cards -->
                    <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom" id="emma_display_hostel_onboarding_campus">

                    </div>
                    <button type="button" class="btn btn-md text-white float-end next_1_emma mt-2 emma_btn_next rounded-3 bg-primary"><i class="fas fa "> Next</i> <i class="fas fa-angle-right"></i></button>
                    <!-- /NEXT BUTTON-->
                </div> 
            </div>
            <!-- row -->  

            <div class="row justify-content-center form-business emmahostelsecondcard" style="display:none">
                <!-- col -->
                <div class="col-lg-9 col-md-8">
                    <h5 class="fw-bold">Hostel</h5>
                    <p class="small pb-0">Select your hostel details</p>
                    <!-- cards -->


                <div class="row mt-3 g-3 align-items-center abba_items_amt_add_single">
                <div class="col-lg-4 col-md-6 mt-2">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm emma_hostel_input_name" placeholder="Route Name"> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-2">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm emma_hostel_input_amount" placeholder="Enter Amount">
                      
                    </div>
                </div>

                 <div id="emmaloadhostelappededinputhere"></div>

             </div>
                      
             
             <div class="row mt-2">
                    <div class="col-sm-7">
                    </div>

                    <div class="col-sm-2">
                            <span class="circle-icon" id="emma_add_hostel_btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                Add New<i class="fa fa-plus"></i>            
                            </span>   
                    </div>


                    <div class="col-sm-3">
                             
                    </div>

             </div>

                 <input type="hidden" id="emmaloadinputappended">
                 <input type="hidden" class="emma_hostel_user_id" value="<?php echo $UserID; ?>">
                 <input type="hidden" class="emma_hostel_user_type" value="<?php echo $UType; ?>">
                                        
                           
                            
                    <!-- /cards -->
                    <!-- NEXT BUTTON-->
                    <button type="button" class="btn btn-md bg-light text-primary emma_hostel_back_button float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>
                        <button type="button" class="btn btn-md text-white emma_btn_next  float-end mt-2 rounded-3 bg-primary emma-onboarding-hostel-submit-button"> <i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                    <!-- /NEXT BUTTON-->
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row justify-content-center py-2 form-business emma_hostel_done_dummy"  style="display:none"> 
                <!-- col -->
                <div class="col-lg-9 col-md-8" id="successMessage">
                    <!-- success message -->
                    <div align="center">
                        <img src="../../assets/gif/done.gif" width="200" height="auto" alt="success-message">
                    </div>
                    <!-- /success message -->
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-9 col-md-8" id="successForm">
                    
                    <!-- NEXT BUTTON-->
                    <button type="button"
                        class="btn btn-md bg-light text-primary emma_back_btn float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>
                        <button type="button"
                        class="btn btn-md text-white float-end back mt-2 emma_close_btn rounded-3 btn-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                    <!-- /NEXT BUTTON-->
                </div>
                <!-- /col -->
            </div>


              </div>
        </div>
    </div>
</div>
 <!--=======HOSTEL MODAL CONTENT HERE=======-->                          
                                
                                
                                
                                
     <!--==========TRANSPORT MODAL CONTENT HERE==========-->
     
     
     
     
    <!-- Edit Modal For Transport/Route -->
     <div class="modal fade modalshow modalfade" id="emma_transport_edit_modal_pop_up" tabindex="-1"
            aria-labelledby="abba_create_class_ModalLabel" aria-hidden="true">
            <div class="modal-dialog dialogcontent modal-dialog-scrollable" style="border-top-left-radius: 20px; width: 100%;">
                <div class="modal-content modalcontent" style="background-color:#ffffff; ">
    
                    <div class="modal-header">
                        <h5 class="modal-title text-primary">
                            <i class="fas fa-edit"> Add/Update Route</i>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div style="" id="emaloadeditmodalconten">
                        </div>
                       
                        <div class="row emmmaloadedit-show" style="display:none;">
                            <input type="hidden" id="loadcampusidforedit">
                            <div class="col-sm-12" >
                                <div class="form-group abba_local-forms" id="emma_route_name">
                                    <label>Route Name<span style="color:orangered;">*</span> </label>
                                    <input type="text" class="form-control emma_get_route_name" id="emma_get_route_name">
                                </div>
                            </div>
                            
                            <div class="form-group abba_local-forms" id="emma_route_amount">
                                <label>Route Amount<span style="color:orangered;">*</span></label>
                                <input type="number" class="form-control emma_get_route_amount" id="emma_get_route_amount">
                            </div>    
                        </div>
                    </div>
                            
    
                    <div class="modal-footer" id="change_create_btn">
                        <!--<span style="margin-left:-50px;">kjdkfs</span>-->
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times"> Close</i></button>
                        <button type="button" class="btn btn-primary btn-sm" id="emma_proceed_to_change_route"> 
                            <i class="fas fa"> Save Changes</i> <i class="fas fa-angle-right"> </i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
         <!-- load edit content here -->
         <div id="emmaloadeditfullcontent"></div>
        <!-- load edit content here -->
    
        
         <!-- Delete modal for transport-->
         <div class="modal fade" id="emma_transport_delete_modal_pop_up" tabindex="-1" aria-labelledby="delClassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-danger" id="exampleModalLabel"> Delete Route </i></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p align="center">
                            Are you sure you want to delete this route <span id="display-delete_route_name"> </span>?<br><br>
                            <span class="text-danger">Note that all details concerning this class will be deleted as well.</span>
                            
                            <input type="hidden" id="delete_route_id">
                            <input type="hidden" id="delete_campus_id">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                class="fa fa-times"> Close</i></button>
                        <button type="button" class="btn btn-danger btn-sm emmadeleteroutebtn"><i class="fa fa-trash"> Yes!
                                Delete</i></button>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="modal fade" id="emma_financeonboardingModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="financeonboardingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg emma_transport_modal">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn float-end text-primary emma_close_transport_modal" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times">Close</i></button>
                            </div>
                        </div>
    
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card-body">
                                        <h3 class="fw-bold pt-3 pb-3">Transport Set Up</h3>
                                        <p class="text-lg pb-3">Hi, I will be assisting you in setting up your route (to ensure you follow the right route). Please click 'Proceed' so we can begin.  </p>
                                        <!-- cards -->
                                        <div class="row row-cols-1 row-cols-lg-3 border-bottom"></div>
                                            <button class="btn btn-primary float-start btn-lg text-white mt-2 rounded-3 emma_proceed_btn" ><i class="fas fa"> Proceed</i> <i class="fas fa-angle-right"></i>
                                            </button>
                                    </div>      
                                </div>     
    
                                <div class="col-lg-5">
                                    <div class="row">
                                                
                                        <?php
    
                                            $pros_select_welcomingimage = mysqli_query($link, "SELECT * FROM defaultimages WHERE ImageName='abba-welcoming-image'");
                                            $pros_select_welcomingimage_count = mysqli_num_rows($pros_select_welcomingimage);
                                            $pros_select_welcomingimage_row = mysqli_fetch_assoc($pros_select_welcomingimage);
    
                                            if ($pros_select_welcomingimage_count > 0) {
                                                $pros_general_welcomingimage = $pros_select_welcomingimage_row['BaseSixtyFour'];
    
                                                echo '<img src="'.$pros_general_welcomingimage.'" alt="">';
                                            
                                            }
    
                                        ?>
                                                            
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>
    
    
    <div class="modal fade" id="emma_transportroutemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="financeonboardingModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="float-end" align="right">
                    <button type="button" class="btn float-end text-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                </div>
                <div class="modal-body emma_finance_modal_body">
    
                <div class="row justify-content-center mt-2 emmafirstcard" id="cardSection" style="display:none">
                    <!-- col -->
                    <div class="col-lg-9 col-md-8">
                        <h5 class="fw-bold pt-1">Please select a campus</h5>
                        <p class="small pb-5">kindly select the campus that you would like to set the finances for</p>
                        <!-- cards -->
                        <div class="row row-cols-1 row-cols-lg-3 g-4 pb-5 border-bottom" id="emma_display_onboarding_campus">
    
                        </div>
                        <button type="button" class="btn btn-md text-white float-end next_1_emma mt-2 emma_btn_next rounded-3 bg-primary"><i class="fas fa "> Next</i> <i class="fas fa-angle-right"></i></button>
                        <!-- /NEXT BUTTON-->
                    </div> 
                </div>
                <!-- row -->
    
                <div class="row justify-content-center form-business emmasecondcard" style="display:none">
                    <!-- col -->
                    <div class="col-lg-9 col-md-8">
                        <h5 class="fw-bold">Transport(Route)</h5>
                        <p class="small pb-0">Select your route details</p>
                        <!-- cards -->
    
    
                    <div class="row mt-3 g-3 align-items-center abba_items_amt_add_single">
                    <div class="col-lg-4 col-md-6 mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm emma_input_name" placeholder="Route Name"> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-sm emma_input_amount" placeholder="Enter Amount">
                          
                        </div>
                    </div>
    
                     <div id="emmaloadappededinputhere"></div>
    
                 </div>
                          
                 
                 <div class="row mt-2">
                        <div class="col-sm-7">
                        </div>
    
                        <div class="col-sm-2">
                                <span class="circle-icon" id="emma_add_route_btn" style="color:#007bff;font-size:12px;cursor:pointer;">
                                    Add New<i class="fa fa-plus"></i>            
                                </span>   
                        </div>
    
    
                        <div class="col-sm-3">
                                 
                        </div>
    
                        <input type="hidden" id="emmaloadinputappendedroute">
                     <input type="hidden" class="emma_route_user_id" value="<?php echo $UserID; ?>">
                     <input type="hidden" class="emma_route_user_type" value="<?php echo $UType; ?>">
    
                 </div>
    
                     <input type="hidden" id="emmaloadinputappended">
                     <input type="hidden" class="emma_user_id" value="<?php echo $UserID; ?>">
                     <input type="hidden" class="emma_user_type "value="<?php echo $UType; ?>">
                                            
                               
                                
                        <!-- /cards -->
                        <!-- NEXT BUTTON-->
                        <button type="button" class="btn btn-md bg-light text-primary emma_back_button float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>
                            <button type="button" class="btn btn-md text-white next_1_emma  float-end mt-2 rounded-3 bg-primary emma-onboarding-submit-button"> <i class="fas fa"> Submit</i> <i class="fas fa-angle-right"> </i></button>
                        <!-- /NEXT BUTTON-->
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->
    
                <!-- row -->
                <div class="row justify-content-center py-2 form-business emma_done_dummy"  style="display:none"> 
                    <!-- col -->
                    <div class="col-lg-9 col-md-8" id="successMessage">
                        <!-- success message -->
                        <div align="center">
                            <img src="../../assets/gif/done.gif" width="200" height="auto" alt="success-message">
                        </div>
                        <!-- /success message -->
                    </div>
                    <!-- /col -->
                    <!-- col -->
                    <div class="col-lg-9 col-md-8" id="successForm">
                        
                        <!-- NEXT BUTTON-->
                        <button type="button"
                            class="btn btn-md bg-light text-primary emma_back_btn float-start back mt-2 rounded-3 btn-outline-primary"><i class="fas fa-angle-left"> Back</i></button>
                            <button type="button"
                            class="btn btn-md text-white float-end back mt-2 emma_close_btn rounded-3 btn-primary" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"> Close</i></button>
                        <!-- /NEXT BUTTON-->
                    </div>
                    <!-- /col -->
                </div>
    
    
                  </div>
            </div>
        </div>
    </div>
     
     <!--==========TRANSPORT MODAL CONTENT HERE==========-->
                            
    



