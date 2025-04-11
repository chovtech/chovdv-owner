

<?php




            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            include('../../../config/config.php');

            $user_id = $_POST['UserID'];
            $UserType = $_POST['UserType'];
            $ReceiptID = $_POST['ReceiptID'];


            $selectt_receipt = mysqli_query($link, "SELECT * FROM `wallettransactions` WHERE WalletTransactionID='$ReceiptID' AND  UserID='$user_id' AND UserType='$UserType'");
            $selectt_receiptcnt_row = mysqli_num_rows($selectt_receipt);
            $selectt_receiptcnt_rowcnt = mysqli_fetch_assoc($selectt_receipt);


            $Reference = $selectt_receiptcnt_rowcnt['Reference'];
            $Amount = $selectt_receiptcnt_rowcnt['Amount'];
            $Date = $selectt_receiptcnt_rowcnt['Date'];
            $Time = $selectt_receiptcnt_rowcnt['Time'];
            $TransactionType = $selectt_receiptcnt_rowcnt['TransactionType'];
            
            // Create a DateTime object by parsing the original date (assuming the format is Y-m-d)
            $parsedDate = DateTime::createFromFormat('Y-m-d', $Date);
            
            // Format the parsed date to 'M d, Y' (e.g., 'Dec 06, 2023')
            $formattedDate = $parsedDate ? $parsedDate->format('M d, Y') : 'Invalid Date';


            $parent_details = mysqli_query($link, "SELECT * FROM `agencyorschoolowner`
           
            WHERE `AgencyOrSchoolOwnerID`='$user_id'");

            $parent_details_cnt = mysqli_num_rows($parent_details);
            $parent_details_cnt_row = mysqli_fetch_assoc($parent_details);

            $ParentFirstName = $parent_details_cnt_row['AgencyOrSchoolOwnerName'];
            $ParentLastName = $parent_details_cnt_row['AgencyOrSchoolOwnerNameTwo'];

          

            

            $WalletBalance = $parent_details_cnt_row['WalletBalance'];
            $WalletAccountName = $parent_details_cnt_row['WalletAccountName'];
            $WalletAccountNumber = $parent_details_cnt_row['WalletAccountNumber'];
            $WalletBank = $parent_details_cnt_row['WalletBank'];



            if( $TransactionType == 'credit')
            {
                  $transactiontype = 'Acc Credited';
            }else{
                
                $transactiontype = 'Acc Credited';
            }


              

        echo '
           <br><br><div class="container " id="prosloadreceiptcontprin">
                                    
                <div class="row">
                    <div class="well col-xs-10 col-sm-10 col-md-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    
                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                    
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 text-right">
                                <p>
                                <u class="text-primary prossharereceptcontentbtn" style="font-size:15px;cursor:pointer;">Share <i class="fas fa-share"></i></u>
                                </p>
                            
                            </div>
                                        
                
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                        <img src="../../assets/images/favicon.png" style="width: 20%" data-dismiss="modal" aria-label="Close">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>
                                    <em>Transaction Receipt</em>
                                </p>
                            
                            </div>
                        </div>

                        <div class="row">

                            <div class="text-center">
                                <h5 class="text-primary">₦‎'.number_format($Amount).'</h5>
                                <h6 class="">Success</h6>
                                <p class="text-muted">'.$formattedDate.','.$Time.'</p>
                            </div>

                        

                                    <table class="table table-hover table-borderless">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th ></th>
                                                <th ></th>
                                                <th ></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td ><em>Transaction Type</em></td>
                                                <td  >  </td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td >'.$transactiontype .'</td>
                                            </tr>

                                            <tr>
                                            <td ><em>Ref</em></td>
                                            <td  >  </td>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td >'.$Reference .'</td>
                                        </tr>

                                            <tr>
                                                <td ><em>Recipient Details</em></td>
                                                <td class="" > </td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""><strong> '.$ParentFirstName.' '.$ParentLastName.'</strong> </td>
                                            </tr>

                                            <tr>
                                                <td class=""><em></em></td>
                                                <td class="" > </td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class="">'.$WalletBank.'| '.$WalletAccountNumber.'</td>
                                            </tr>

                                        
                                        
                                            

                                        </tbody>
                                    </table>
                            
                                <center>
                                    <p class="text-muted">Support</p>
                                    <a href="#" style="text-decoration:none;">help@edumess.com</a>
                                </center>
                        </div>
                    </div>
                </div>


                <div class="row">
                    
                    <div class="col-12" style="padding: 30px;">
                        <button class="btn btn-primary pros-print-receiptcontent-btn" style="width: 100%;" type="button">
                            Print  <i class="fas fa-print"></i>
                        </button>


                        <div align="center" style="color: #afafaf; font-size: 11px; font-weight: 500;">Powered
                            by EduMESS</div>
                    </div>
                </div>
        </div> ';



        
        
       





           
    


?>