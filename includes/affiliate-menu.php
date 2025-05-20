<style>
    
    #verification-input > input {
        width: 40px;
        height: 60px;
        font-size: 36px;
        text-align: center;
        border: 2px solid #666;
        border-radius: 8px;
        color:#666;
    }
    
    .center-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    /* Firefox */
    input[type="number"] {
        -moz-appearance: textfield;
    }
    
</style>

<input type="hidden" value="<?php #echo $UserID;?>" id="user_id">
<input type="hidden" value="<?php #echo $UType;?>" id="user_type">

<aside id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
            <img src="../../assets/images/adminImg/favicon.png" style="width: 15%;" alt=""> <span>EduMESS </span>
        </div>
        <div class="close-icon" style="cursor: pointer;" onclick="closeSidebar()">
            <span class="material-icons-sharp">close</span>
        </div>
    </div>

    <ul class="sidebar-List">
        <li class="sidebar-list-item ">
            <a href="../home">
                <i class='bx bx-grid-alt' style="margin-right: 10px;"></i>
                <span>Dashboard</span>
            </a>
           
        </li>

        <li class="sidebar-list-item ">
            <a href="../schools">
                <i class='fa fa-university sideicon' style="margin-right: 10px;"></i>
                <span class="links_name"> Schools</span>
            </a>
           
        </li>
        <li class="sidebar-list-item">
            <a href="../my-affiliates/">
                <i class='bx bxs-network-chart' style="margin-right: 10px;"></i>
                <span class="links_name">Affiliates</span>
            </a>
            
        </li>
        <li class="sidebar-list-item">
            <a href="../earnings/">
                <i class='bx bx-transfer' style="margin-right: 10px;"></i>
                <span class="links_name">Earnings</span>
            </a>

        </li>

        <li class="">
            <div class="upgrades">
                <h5>₦<?php echo number_format($WalletBal); ?></h5>
                <h6>Wallet Balance</h6>
                <button type="button" data-bs-toggle="modal" data-bs-target="#pros_withdrawModal" style="font-size: 10px;" class="btn btn-sm btn-primary">
                    Click to Withdraw
                </button>
            </div>

        </li>
    </ul>
</aside>

<!--==== Transfer Modal==== -->
<div class="modal fade" id="pros_withdrawModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="pros_withdrawModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-body">
                <div align="center">
                    <h4 class="mt-3"><i class="fas fa-money-bill-wave"></i> Withdraw</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">

                    <div class="col-12 account_user_name">

                        <!-- <div class="row">
                            <div class="col-md-7 col-12"> -->
                        <div class="row">
                            <input type="hidden" class="prosloadsalaybulkamount_inititated">
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-md-12 ps-0">
                                    <p class="ps-3 textmuted fw-medium h6 mb-0">Wallet Balance</p>
                                    <span class="h4 fw-medium d-flex ps-3">₦ <span class="textmuted prosloadamountcontent" ><?php echo number_format($WalletBal); ?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div>
                        </div> -->
                        <div class="mb-2" style="font-weight:600;">
                            Withdrawal Account Details
                        </div>
                        <div class="mb-2" style="font-weight:500;">
                            <span class="">Bank: <?php echo $Bank; ?></span>
                        </div>
                        <div class="mb-2" style="font-weight:500;">
                            <span class="">Acc. No.: <?php echo $BankAccNo; ?></span>
                        </div>
                        <div class="mb-2" style="font-weight:500;">
                            <span class="account_holder_name">Acc. Name: <?php echo $BankAccName; ?></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="number"
                                style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                class="form-control form-control-sm withdraw_amt" id="floatingInput"
                                placeholder="name">
                            <label for="floatingInput"
                                style="color: #afafaf; margin-top: 2px; font-weight: 500;">Amount</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="padding: 30px;">
                        <button class="btn btn-primary verify_withdrawal" style="width: 100%;" type="button">
                            <i class="fas fa-money-bill-wave"></i> Withdraw
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
<div class="modal fade" id="pros_withdrawModal2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="pros_withdrawModalLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-body">
                <div align="center">
                    <h4 class="mt-3"><i class="fas fa-money-bill-wave"></i> Withdraw Verification</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row" style="padding-top: 50px; margin: 0 5px 0 5px;">

                    <div class="col-12 account_user_name">

                        <!-- <div class="row">
                            <div class="col-md-7 col-12"> -->
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="row justify-content-center">
                                    A verification code has been sent to your registered email address
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-md-12 ps-0">
                                    <p class="ps-3 textmuted fw-medium h6 mb-0">Withdrawal Amount</p>
                                    <span class="h4 fw-medium d-flex ps-3">₦ <span class="textmuted withdrawal_md_amt"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 center-content">
                        <div id="verification-input">
                            <input type="number" class="n1"/>
                            <input type="number" class="n2"/>
                            <input type="number" class="n3"/>
                            <input type="number" class="n4"/>
                            <input type="number" class="n5"/>
                            <input type="number" class="n6"/>
                        </div>
                        <p>Click to <a href="#" id="resendLink" class="disabled">resend code</a> in <span id="countdown"></span></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" style="padding: 30px;">
                        <button class="btn btn-primary proceed_withdrawal" style="width: 100%;" type="button">
                            <i class="fas fa-money-bill-wave"></i> Withdraw
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
<!--===Withdrawer Modal=======-->

<!-- affiliate js -->
<?php include('../../controller/js/affiliate/withdrawal.php'); ?>