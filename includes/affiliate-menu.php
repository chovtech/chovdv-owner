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
            <a href="">
                <i class='fa fa-university sideicon' style="margin-right: 10px;"></i>
                <span class="links_name"> Schools</span>
            </a>
           
        </li>
        <li class="sidebar-list-item">
            <a href="">
                <i class='bx bxs-network-chart' style="margin-right: 10px;"></i>
                <span class="links_name">Marketers</span>
            </a>
            
        </li>
      
         

        
      
        
        <li class="">
            <div class="upgrades">
                <span class='fas fa-money-bill'></span>
                <h6>Click to Withdraw here</h6>
                <button type="button" data-bs-toggle="modal" data-bs-target="#pros_withdrawModal" style="font-size: 10px;" class="btn btn-sm btn-primary">
                    Withdraw Now
                </button>
            </div>

            <!-- <small style="margin-left: 30%; cursor: pointer; font-size: 14px;" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa fa-cog fa-spin"></i>
                Settings
            </small> -->
            
        </li>
    </ul>
</aside>





<!-- <div id="abba_keep_default_institutition" style="display:none;">

</div> -->




   <!--==== Transfer Modal==== -->
   <div class="modal fade" id="pros_withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="border-radius: 20px;">
                                <div class="modal-body">
                                    <div align="center">
                                    <h4 class="mt-3"><i class="fas fa-money-bill-wave"></i> Withdraw</h4>
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
                                                        <p class="ps-3 textmuted fw-bold h6 mb-0">Wallet Balance</p>
                                                        <span class="h4 fw-bold d-flex ps-3">₦ <span class="textmuted prosloadamountcontent" >0.00</span></span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </div>
                                        </div> -->

                                           <div class="mb-2" style="font-weight:600;"><i class="fas fa-user-circle text-primary" style="font-size:18px;"></i> <span class="account_holder_name">Prosper Ortese</span></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number"
                                                style="height: 50px; border: none; border-bottom: #b3b3b3 solid 1px;"
                                                class="form-control form-control-sm transfer_amt" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput"
                                                style="color: #afafaf; margin-top: 2px; font-weight: 500;">Amount</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-12" style="padding: 30px;">
                                        <button class="btn btn-primary abba_transfer" style="width: 100%;" type="button">
                                        <i class="fas fa-money-bill-wave"></i> Withdraw Now
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
                    