<script>


      $(document).ready(function(){
        // Handle collapse events
            $('.collapse').on('show.bs.collapse', function () {
              var currentCollapseId = $(this).attr('id');
              // Close other collapsibles
              $('.collapse').not('#' + currentCollapseId).collapse('hide');
            });
      });
      
      
      
        $(document).ready(function(){
            
                  var campusphone = window.intlTelInput(document.querySelector(".parentwanumbertrasaction"), {
                    separateDialCode: true,
                    preferredCountries: ["ng"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                 });
        
         });
      


    $(document).ready(function () {



        prosloadfinancetotaldashborad();
        prosloadtransactionhistory();
        $('#prosperloadtransactioncampus').html('<option>loading..</option>');
        $('.pros-load-campuspostransaction').html('<option>loading..</option>');
        $('#prosperloadtransactioncampusexp').html('<option>loading..</option>');

        
       
        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
        var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

        // get campus ajax
        var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/abba-get-campus.php",
            data: dataString,
            //cache: false,
            success: function (output) {
                $('#prosperloadtransactioncampus').html(output);
                $('.pros-load-campuspostransaction').html(output);

                $('#prosperloadtransactioncampusexp').html(output);

            }
        });

    });
    

    //load cl

    $('body').on('change', '#prosperloadtransactioncampusexp', function () {
       

          $('#prosperloadtransactionclass').html('<option>loading..</option>');
        //   $('#prosperloadtransactionexptitle').html('<option>loading..</option>');

            var campusID = $(this).val();

            if (campusID == 'NULL') {

               
                $('#prosperloadtransactiontermexp').html('<option>Select campus</option>');
                // $('#prosperloadtransactionexptitle').html('<option>Select campus</option>');

            } else {

            

                

                //LOAD TERM WITH ALIAS HERE
                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                    data: {
                        campusID: campusID
                    },
                    //cache: false,
                    success: function (output) {

                        $('#prosperloadtransactiontermexp').html(output);

                    }
                });


                // $.ajax({
                //     type: "POST",
                //     url: "../../controller/scripts/owner/pros-loadexpenituretitle.php",
                //     data: {
                //         campusID: campusID
                //     },
                //     //cache: false,
                //     success: function (output) {

                //         // $('#prosperloadtransactiontermexp').html(output);

                //     }
                // });

            }





    });

    
    
    // change of institution
$('body').on('change', '.abba-change-institution', function () {

            var institution_id = $('.abba-change-institution option:selected').data('id');
            var institution_name = $('.abba-change-institution option:selected').text();
            var institution_url = $('.abba-change-institution option:selected').data('url');

            localStorage.setItem("abba-stored-institution-id", institution_id);
            localStorage.setItem("abba-stored-institution-name", institution_name);
            localStorage.setItem("abba-stored-institution-CustomUrl", institution_url);
            
            $('#prosperloadtransactioncampus').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
            $('.pros-load-campuspostransaction').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
            $('#prosperloadtransactioncampusexp').html('<option>loading..</option>');

                prosloadfinancetotaldashborad();
                 prosloadtransactionhistory();
                // get campus ajax
                var dataString = 'abba_instituion_id=' + institution_id;

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-campus.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                        $('#prosperloadtransactioncampus').html(output);
                        $('.pros-load-campuspostransaction').html(output);
                        $('#prosperloadtransactioncampusexp').html(output);
                    }
                });
   
   
    
});



    // change number of students per page
    $('body').on('change', '#prosperloadtransactioncampus', function () {

          $('#prosperloadtransactionclass').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var campusID = $(this).val();

        if (campusID == 'NULL') {

              $('#prosperloadtransactionclass').html('<option>Select campus</option>');

        } else {

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadclass-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {
                    $('#prosperloadtransactionclass').html(output);

                }
            });

        }



    });


     $('body').on('change', '.pros-load-campuspostransaction', function () {
          var campusID = $(this).val();
          
           if (campusID == 'NULL') {

            $('#prosgethistoryfilterterm').html('<option value="NULL">Select campus</option>');
           

        } else {
            
            
              $('#prosgethistoryfilterterm').html('<option value="NULL">loading..</option>');
             $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {

                    $('#prosgethistoryfilterterm').html(output);

                }
            });
            
        }
         
     });
  


    // change number of students per page
    $('body').on('change', '#prosperloadtransactioncampus', function () {
        $('#prosperloadtransactionclass').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var campusID = $(this).val();

        if (campusID == 'NULL') {

            $('#prosperloadtransactionclass').html('<option>Select campus</option>');
            $('#prosperloadtransactionterm').html('<option>Select campus</option>');

        } else {

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadclass-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {
                    $('#prosperloadtransactionclass').html(output);

                }
            });



            //LOAD TERM WITH ALIAS HERE
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {

                    $('#prosperloadtransactionterm').html(output);

                }
            });

        }



    });

    // change number of students per class and session
    $('body').on('change', '#prosperloadtransactionclass', function () {
        prosloadstudendforpostpayment();
    });


    // change number of students per class and session
    $('body').on('change', '#prosperloadtransactionsession', function () {
        prosloadstudendforpostpayment();
    });



    // change number of students per term
    $('body').on('change', '#prosperloadtransactionterm', function () {
        prosloadstudendforpostpayment();
    });



    function prosloadstudendforpostpayment() {
        $('#prosperloadtransactionstudent').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');


        var campusID = $('#prosperloadtransactioncampus').val();
        var sessionName = $('#prosperloadtransactionsession').val();
        var ClassID = $('#prosperloadtransactionclass').val();
        var term = $('#prosperloadtransactionterm').val();


        if (ClassID == 'NULL' || ClassID == '0') {

            $('#prosperloadtransactionstudent').html('<option value="NULL">Select class </option>');

        } else if (sessionName == 'NULL' || sessionName == '0') {

            $('#prosperloadtransactionstudent').html('<option value="NULL">Select session </option>');

        } else {


            $('#prosperloadtransactionstudent').html('value="<option value="NULL">loading.. </option>"');


            //LOAD TERM WITH ALIAS HERE
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadstudent-forpostpayment.php",
                data: {
                    campusID: campusID,
                    sessionName: sessionName,
                    ClassID: ClassID,
                    term: term
                },
                //cache: false,
                success: function (output) {
                    
                           

                    $('#prosperloadtransactionstudent').html(output);

                }
            });


        }




    }


    //get amount for payment if chnage on students
    $('#prosperloadtransactionstudent').on('change', function () {
        
            prosloadstudentfeecontentforpayemnt();
    });   



        function prosloadstudentfeecontentforpayemnt()
        {
            
       
                // Get the selected option's data-amount attribute values
                var Paid = $('#prosperloadtransactionstudent option:selected').data('id');
                var Balance = $('#prosperloadtransactionstudent option:selected').data('bal');

                if (Paid == '0') {
                    var totalPaid = '0.00';

 
                } else {
                    var totalPaid = Paid;
                }





            var studentID = $('#prosperloadtransactionstudent').val();
            var campusID = $('#prosperloadtransactioncampus').val();

            var prosInstitutionID = localStorage.getItem("abba-stored-institution-id");


            if(studentID == 'NULL' || studentID == '0' || studentID == '')
            {
                $('#prosloadincometransactionamount').fadeOut('slow');
                $('.prosloadfeesummarycontent').fadeOut('slow');
            }else
            {


                    
                $('#prosloadincometransactionamount').fadeIn('slow');
                $('.prosloadfeesummarycontent').fadeIn('slow');

              
                    // if(Balance == '0')
                    // {

                    // }else
                    // {

                        $('#prosloadpaidamountincome').html('₦' + totalPaid);
                        $('#prosloadbalanceamountincome').html('₦' + Balance);




                    // }




                    $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/prosload-postpayment-summary.php",
                    data: {
                        campusID:campusID,
                        studentID:studentID,
                        prosInstitutionID:prosInstitutionID
                    },
                    //cache: false,
                    success: function (output) {
                           
                        $('.prosload-paymentsummaryforincome').html(output);
                        
                    }
                });
                
                

            }

          

    }



     //PROS SUBMIT EXPEN TRANSACTION HERE

        $('.pros-submit-income-posttransactionexp-btn').on('click', function () {
              
               $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>processing..   ');

                var campusID = $('#prosperloadtransactioncampusexp').val();
                var sessionName = $('#prosperloadtransactionsessionexp').val();
                var term = $('#prosperloadtransactiontermexp').val();
                var Amountpaying = $('.prospostransactionicomeamountexpen').val();
                var prosexpentype = $('#prosperloadtransactionexptitle').val();
                var categoryID = $('#prosperloadtransactionexptitle option:selected').data('id');

                var campusName = $('#prosperloadtransactioncampusexp option:selected').text();
                var institution_id =   $('.abba-change-institution option:selected').val();
                var userID =  '<?php echo $UserID; ?>';
               

                if(campusID == '' || campusID == 'NULL' || campusID == '0')
                {



                     $('#prosperloadtransactioncampusexp').css('border', '1px solid red');
                       $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select campus to proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');
                }else if(sessionName == '' || sessionName == 'NULL' || sessionName == '0')
                {


                     $('#prosperloadtransactioncampusexp').css('border', '1px solid green');
                     $('#prosperloadtransactionsessionexp').css('border', '1px solid red');
                       $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select session to proceed.",
                                autohideDelay: 5000
                        });
                        $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                }else if(term == '' || term == 'NULL' || term == '0')
                {
                    

                     $('#prosperloadtransactioncampusexp').css('border', '1px solid green');
                     $('#prosperloadtransactionsessionexp').css('border', '1px solid green');
                     $('#prosperloadtransactiontermexp').css('border', '1px solid red');

                      $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select term to proceed.",
                                autohideDelay: 5000
                        });
                        $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');
                }else if(prosexpentype == '' || prosexpentype == 'NULL' || prosexpentype == '0')
                {


                    
                     $('#prosperloadtransactioncampusexp').css('border', '1px solid green');
                     $('#prosperloadtransactionsessionexp').css('border', '1px solid green');
                     $('#prosperloadtransactiontermexp').css('border', '1px solid green');

                     $('#prosperloadtransactionexptitle').css('border', '1px solid red');

                      $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select Fee Title to Proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');
                }else if(Amountpaying == '' || Amountpaying == 'NULL' || Amountpaying == '0')
                {


                        $('#prosperloadtransactioncampusexp').css('border', '1px solid green');
                        $('#prosperloadtransactionsessionexp').css('border', '1px solid green');
                        $('#prosperloadtransactiontermexp').css('border', '1px solid green');
                        $('#prosperloadtransactionexptitle').css('border', '1px solid green');
                        $('.prospostransactionicomeamountexpen').css('border', '1px solid red');

                          $.wnoty({
                                    type: 'warning',
                                    message: "Hey!! Input Amount to proceed.",
                                    autohideDelay: 5000
                            });

                            $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                }else
                {


                        $('#prosperloadtransactioncampusexp').css('border', '1px solid green');
                        $('#prosperloadtransactionsessionexp').css('border', '1px solid green');
                        $('#prosperloadtransactiontermexp').css('border', '1px solid green');

                        $('#prosperloadtransactionexptitle').css('border', '1px solid green');

                        $('.prospostransactionicomeamountexpen').css('border', '1px solid green');

                        $('.pros-submit-income-posttransactionexp-btn').prop('disabled', true);


                        $('.pros-submit-income-posttransactionexp-btn').prop('disabled', false);
                                              $('.pros-submit-income-posttransactionexp-btn').html('<i class="fas fa"> Post</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');
                         $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/pros-assign-optionalfee-insertexp.php",
                                        data: {
                                                campusID:campusID,
                                                sessionName:sessionName,
                                                term:term,
                                                Amountpaying:Amountpaying,
                                                prosexpentype:prosexpentype,
                                                campusName:campusName,
                                                institution_id:institution_id,
                                                categoryID:categoryID
                                        },
                                        //cache: false,
                                        success: function (output) {
                                         

                                            if(output.trim() == 'success')
                                            {
                                                
                                                
                                                 prosloadtransaction_loststatement();
                                                 prosload_balance_sheetcontent();



                                                   $.wnoty({
                                                            type: 'success',
                                                            message: "Great!! Expense posted successfully.",
                                                            autohideDelay: 5000
                                                    });

                                                    // prosloadtransactionhistory();
                                            }else
                                            {
                                                
                                                   $.wnoty({
                                                            type: 'error',
                                                            message: "Fail! Expense didn't save successfully.",
                                                            autohideDelay: 5000
                                                    });

                                            }

                                           

                                        }
                            });







                }


                    

        });

     //PROS SUBMIT EXPEN TRANSACTION HERE
   


    //PROS SUBMIT INCOME TRANSACTION HERE


    $('.pros-submit-income-posttransaction-btn').on('click', function () {


                $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>processing..   ');



                var campusID = $('#prosperloadtransactioncampus').val();
                var sessionName = $('#prosperloadtransactionsession').val();
                var ClassID = $('#prosperloadtransactionclass').val();
                var term = $('#prosperloadtransactionterm').val();

                var studentID = $('#prosperloadtransactionstudent').val();
                var Amountpaying = $('.prospostransactionicomeamount').val();
                var userID =  '<?php echo $UserID; ?>';


                var transactionType = $('.progeneral-transactypeforincome:checked').val();
                var prosInstitutionID = localStorage.getItem("abba-stored-institution-id");
                 var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

                


                if(campusID == 'NULL' || campusID == '0')
                {
                        $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select campus to proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');


                }else if(ClassID == 'NULL' || ClassID == '0')
                {


                         $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select class to proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                }else if(sessionName == 'NULL' || sessionName == '0')
                {

                       $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select session to proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                }else if(term == 'NULL' || term == '0')
                {


                        $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select term to proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');


                }else if(studentID == 'NULL' || studentID == '0')
                {

                    
                        $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select student to post payment.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');


                }else if(transactionType == '' || transactionType === undefined)
                {


                        $.wnoty({
                                type: 'warning',
                                message: "Hey!! Select transaction type before you proceed.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');


                }
                
                else if(Amountpaying == '' || Amountpaying == '0')
                {




                       $.wnoty({
                                type: 'warning',
                                message: "Hey!! kindly input amount to post payment.",
                                autohideDelay: 5000
                        });

                        $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                }else{



                      $('.pros-submit-income-posttransaction-btn').attr('disabled', true);

                            //LOAD TERM WITH ALIAS HERE
                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/pros-proceeto-postpayment.php",
                                    data: {
                                        campusID:campusID,
                                        sessionName:sessionName,
                                        ClassID:ClassID,
                                        term:term,
                                        studentID:studentID,
                                        Amountpaying:Amountpaying,
                                        transactionType:transactionType,
                                        prosInstitutionID:prosInstitutionID,
                                        abba_get_stored_instituion_name:abba_get_stored_instituion_name,
                                        userID:userID

                                    },
                                    //cache: false,
                                    success: function (output) {


                                       
                                                if(output.trim() == 'error')
                                                {


                                                            $.wnoty({
                                                                    type: 'error',
                                                                    message: "Opps!! transaction failed.",
                                                                    autohideDelay: 5000
                                                            });
                                                      
                                                }else
                                                {


                                                        // $('#pros-storeref-nohere').val(output);
                                                        
                                                        
                                                         if(output.trim() == '1')
                                                         {
                                                             
                                                             $.wnoty({
                                                                    type: 'success',
                                                                    message: "Great!! transaction completed.",
                                                                    autohideDelay: 5000
                                                            });
                                                             
                                                         }else if(output.trim() == '2')
                                                         {
                                                               $.wnoty({
                                                                    type: 'success',
                                                                    message: "Great!! transaction completed. The remaining balance   has been credited to the parent's wallet",
                                                                    autohideDelay: 5000
                                                            });
                                                         }else if(output.trim() == '3')
                                                         {
                                                             
                                                             
                                                                  $.wnoty({
                                                                        type: 'success',
                                                                        message: "Great!! Transaction Successful!\n\n Please set this parent's WhatsApp number to receive transaction receipt.",
                                                                        autohideDelay: 5000
                                                                });
                                                                
                                                            
                                                                
                                                                    $('#prosload-share-receipt-modal').modal('show');
    
                                                                    $('#prosperpostincometransaction').css('z-index', 1040); // Increase z-index of first modal
                                                                 
                                                             
                                                         }
                                                        
                                                            
                                                         
                                                                                                 
                                                        
                                                        
                                                         $('#prosperpostincometransaction').modal('hide');
                                                        $('.pros-load-campuspostransaction').val(campusID);
                                                         $('.prostutionfeetuitiontype').val(transactionType);
                                                          
                                                           prosloadtransactionhistory();
                                                           prosloadfinancetotaldashborad();
                                                          
                                                            prosloadtransactionfeedrive();
                                                            prosloadmsgingbulkmsg();
                                                            prosloadtransaction_loststatement();
                                                            prosload_balance_sheetcontent();
                                                            prosload_load_categorysummaryhere();
                                                            prosloadschoolproceed();
                                                            
                                                            prosloadstudentfeecontentforpayemnt();
                                                            
                                                           
                                                                                                     

                                                         


                                                }
                                            $('.pros-submit-income-posttransaction-btn').html('<i class="fas fa"> Pay</i> <img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png">');

                                            $('.pros-submit-income-posttransaction-btn').attr('disabled', false);

                                       
                                    }
            });


                }


    });
    
    
    
    // <div class="form-check">
    //                                                 <input class="form-check-input"
    //                                                     type="checkbox" value=""
    //                                                     id="flexCheckDefault">
    //                                                 <label class="form-check-label"
    //                                                     for="flexCheckDefault">
    //                                                     Check All
    //                                                 </label>
    //                                             </div>
    
    
     
     
     $('.pros-sendmessagein-bulk-btn').on('click', function () {
         
            $('#prosloadwhatmesscontstudentwhatcont').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            $('#prosloadwhatmesscontstudentwhatcont').html('');
           
          var prosverify_cont = [];
         $('.prosloadfeedriveeach-check:checked').each(function() {
             
             
                prosverify_cont.push($(this).val());
                
                 var proemail = $(this).val();
                 var num = $(this).data('num');
                 var stud = $(this).data('stud');
                 
                    if(stud == '')
                    {
                        
                    }else
                    {
                        
                        
                              var prosloadnew = `
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="${proemail}" data-email="${num}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                       ${stud}
                                    </label>
                                </div>
                            `;
                            $('#prosloadwhatmesscontstudentwhatcont').append(prosloadnew);
                    }
                 
                          
                 
             
            //  value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'" 
             
                
         })
         
                    
         
         
     });
    
    
    // prosloadfeedriveeach-check" value="'.$ParentEmail.'" data-num="'.$parentmainnum.'"  data-stud="'.$studfullname.'" 
    
    
    
    
    ///PROS LOAD STUDEN FEE DRIVE IN BULK FOR MSG
    
                function prosloadmsgingbulkmsg()
                {
                    
                                // $('#prosloadwhatmesscontstudentwhatcont').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                
                                 var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                                var campusID = $('.pros-load-campuspostransaction-feedrive').val();
                                var session = $('#prosgetsessiontranfeedrive').val();
                                var sectionID = $('.pros-sectionfeedrive-feedrive').val();
                                var classID = $('.prosclass-loadfeedrive').val();
                                var status = $('.pros-loadstatusfeedrive').val();
                                var term = $('#prosloatermfeedrive').val();
                                
                                
                                
                                
                                
                                 $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/fee-drive/prosloadstudentfullmsgcontentbuk.php",
                                    data: {
                                        
                                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                                            campusID:campusID,
                                            session:session,
                                            sectionID:sectionID,
                                            classID:classID,
                                            status:status,
                                            term:term
                                            
                                    },
                                    //cache: false,
                                    success: function (output) {
                                        
                                        
                                    }
                                 });
                                
                                
                                
                
                
                
                              

                      
                }
                
                
     ///PROS LOAD STUDEN FEE DRIVE IN BULK FOR MSG
    
    
  


            // Reset z-index of first modal when second modal is closed
            $('#prosload-share-receipt-modal').on('hidden.bs.modal', function () {
                $('#prosperpostincometransaction').css('z-index', 1050); // Reset z-index of firstmodal
            });




        //PROS DOWNLOAD CURRENT TERM FEE

        $('body').on('click','.pros-downdloadcurrentpost-summary', function () {

                            
               var studentfullname = $(this).data("id");

                    const options = {
                        margin: 0.5,
                        filename: studentfullname+'Current term fee summary',
                        image: { 
                            type: 'jpeg', 
                            quality: 500
                        },
                        html2canvas: { 
                            scale: 1 
                        },
                        jsPDF: { 
                            unit: 'in', 
                            format: 'letter', 
                            orientation: 'portrait' 
                        }
                        }
                     
                //e.preventDefault();
                const element = document.getElementById('prosprintcurrentpost-summary');
                html2pdf().from(element).set(options).save();

        });

        //PROS DOWNLOAD CURRENT TERM FEE


      //PROS DOWNLOAD OLD FEE DEBT
        $('body').on('click','.pros-download-feesummary-feebtn', function () {
              
                  var studentfullname = $(this).data("id");

                    const options = {
                        margin: 0.5,
                        filename: studentfullname+'OLD DEBT FEE SUMMARY',
                        image: { 
                            type: 'jpeg', 
                            quality: 500
                        },
                        html2canvas: { 
                            scale: 1 
                        },
                        jsPDF: { 
                            unit: 'in', 
                            format: 'letter', 
                            orientation: 'portrait' 
                        }
                        }
                    
                    //e.preventDefault();
                    const element = document.getElementById('pros-download-oldsummary-feesummarycontent');
                    html2pdf().from(element).set(options).save();
        });
        //PROS DOWNLOAD OLD FEE DEBT

       

        //pros open and close optonal fee modal here
                $('body').on('click', '#pros-assignoptionfee-moal-btn', function(e) {
                            $('#pros-assignoptionalfeehere-modal').modal('show');
                            $('#prosperpostincometransaction').css('z-index', 1040); // Increase z-index of first modal

                            var campusID = $('#prosperloadtransactioncampus').val();
                            var sessionName = $('#prosperloadtransactionsession').val();
                            var ClassID = $('#prosperloadtransactionclass').val();
                            var term = $('#prosperloadtransactionterm').val();

                            var studentID = $('#prosperloadtransactionstudent').val();
                            

                        if(campusID == 'NULL' || campusID == '0' || ClassID == 'NULL' ||
                         ClassID == '' || sessionName == 'NULL' || sessionName == '' || term == 'NULL' || term == '' || studentID == 'NULL' || studentID == '') 
                         {

                            $('#prosload-optionalfeecontent').fadeOut('slow');
                            $('#prosnorecoredselectalloption').fadeIn('slow');


                         }else
                         {


                                
                                $('#prosnorecoredselectalloption').fadeOut();
                                $('#prosload-optionalfeecontent').fadeIn('slow');
                               
                            
                                  $('#prosload-optionalfeecontent').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                                    +'<span class="visually-hidden">...</span>');
                           

                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/pros-load-studentoptionalfee.php",
                                        data: {
                                            campusID:campusID,
                                            studentID:studentID,
                                            sessionName:sessionName,
                                             ClassID:ClassID,
                                             term:term
                                        },
                                        //cache: false,
                                        success: function (output) {
                                            
                                            $('#prosload-optionalfeecontent').html(output);
                                            
                                        }
                                    });

                         }




                });
                
                // Reset z-index of first modal when second modal is closed
                $('#pros-assignoptionalfeehere-modal').on('hidden.bs.modal', function () {
                $('#prosperpostincometransaction').css('z-index', 1050); // Reset z-index of firstmodal
            });
        //pros open and close optonal fee modal here



        //PROS ASSIGN OPTIONAL FEE BTN 
        $('.pros-submit-optionalfee-assignmentbtn').on('click', function () {


                $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>Submit..');



                          
                var campusID = $('#prosperloadtransactioncampus').val();
                var sessionName = $('#prosperloadtransactionsession').val();
                var ClassID = $('#prosperloadtransactionclass').val();
                var term = $('#prosperloadtransactionterm').val();
                var studentID = $('#prosperloadtransactionstudent').val();
                var prosInstitutionID = localStorage.getItem("abba-stored-institution-id");
               

               
               
                
                     var subcategoryID = [];
                     var catgoryID = [];
                   $('.prosper-check-optionalfeecontent:checked').each(function (index) {
                        subcategoryID.push($(this).val());
                        catgoryID.push($(this).data('id'));
                    });


                    if(subcategoryID == '' || subcategoryID == '0' || subcategoryID == 'NULL') 
                    {

                                $.wnoty({
                                        type: 'warning',
                                        message: "Hey!! choose optional fee before you proceed.",
                                        autohideDelay: 5000
                                });

                                $('.pros-submit-optionalfee-assignmentbtn').html('Assign <i class="fa fa-plus" style="font-size:12px;"> </i>');

                    }else
                    {

                                   $('.pros-submit-optionalfee-assignmentbtn').attr('disabled', true);

                                   subcategoryID = subcategoryID.toString();
                                     catgoryID = catgoryID.toString();


                                   
                                   $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/pros-assign-optionalfee-insert.php",
                                        data: {
                                            campusID:campusID,
                                            studentID:studentID,
                                            sessionName:sessionName,
                                             ClassID:ClassID,
                                             term:term,
                                             subcategoryID:subcategoryID,
                                             catgoryID:catgoryID,
                                             prosInstitutionID:prosInstitutionID
                                        },
                                        //cache: false,
                                        success: function (output) {




                                          

                                              $('.pros-submit-optionalfee-assignmentbtn').attr('disabled', false);
                                              $('.pros-submit-optionalfee-assignmentbtn').html('Assign <i class="fa fa-plus" style="font-size:12px;"> </i>');


                                              if(output.trim() == 'success')
                                              {

                                                            $.wnoty({
                                                                    type: 'success',
                                                                    message: "Great!! Optional fee updated successfully.",
                                                                    autohideDelay: 5000
                                                            });

                                              }else
                                              {

                                                              $.wnoty({
                                                                    type: 'error',
                                                                    message: "Opps!! Optional fee failed to be updated pls try again later.",
                                                                    autohideDelay: 5000
                                                              });

                                              }
                                            
                                        }
                                    });

                               
                    }

        });
         //PROS ASSIGN OPTIONAL FEE BTN 



        //SHARE RECEIPT TO WHATSAAP 
        // $('.prosloadwhatmodalmessgebtn').on('click', function () {

        //         var whatNo = $('#prosperloadtransactionstudent option:selected').data('wano');
        //         var RefNo = $('#pros-storeref-nohere').val();

        //         var campusID = $('#prosperloadtransactioncampus').val();
        //         var sessionName = $('#prosperloadtransactionsession').val();
        //         var ClassID = $('#prosperloadtransactionclass').val();
        //         var term = $('#prosperloadtransactionterm').val();
        //         var studentID = $('#prosperloadtransactionstudent').val();

        //         var prosInstitutionID = localStorage.getItem("abba-stored-institution-id");
        //         var URL = RefNo;
                
               
        //         // Open the URL in a new blank window or tab
        //         window.open(URL, '_blank');
        // });
         //SHARE RECEIPT TO WHATSAAP 



        //PROS LOAD TRANSACTION HISTORY CONTENT
      
            $('.pros-transactionhistory-btn').on('click', function () {
            
                    prosloadtransactionhistory();                 
            });


              function prosloadtransactionhistory()
              {

                             var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
                             var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");
                            var campusID =  $('.pros-load-campuspostransaction').val();
                            var transactionType =  $('.pros-transactiontype').val();
                            var prostutionfeetuitiontype =  $('.prostutionfeetuitiontype').val();
                             var session =  $('#prosgetsessiontransactionfileter').val();
                             var term =  $('#prosgethistoryfilterterm').val();
                             
                                

                            
                            var start_date =  $('.prosload-start-date-transhistory').val();
                            var end_date =  $('.prosload-end-date-transhistory').val();

                          
                          



                              $('.pros-load-transaction-history').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


                                  $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/pros-loadtransaction-history.php",
                                        data: {
                                                abba_get_stored_instituion_id:abba_get_stored_instituion_id,
                                                campusID:campusID,
                                                transactionType:transactionType,
                                                start_date:start_date,
                                                end_date:end_date,
                                                abba_get_stored_instituion_name:abba_get_stored_instituion_name,
                                                prostutionfeetuitiontype:prostutionfeetuitiontype,
                                                session:session,
                                                term:term
                                        },
                                        //cache: false,
                                        success: function (output) {
                                           
                                            
                                            $('.pros-load-transaction-history').html(output);

                                                $(document).ready(function(){
                                                    // Initialize First Table
                                                    $('#table1_pros').DataTable({
                                                        responsive: true
                                                    });


                                                });
                                                
                                        }
                                    });

              }

           

        //PROS LOAD TRANSACTION HISTORY CONTENT
        

        $('body').on('click','#pros-delete-transaction-here', function () {
                    var TransactionID =  $(this).data('id');
                    var campusID =  $(this).data('campus');
                    

                    $('#pros-delete-transaction').val(TransactionID);
                    $('#prosdeletecampustransactionhere').val(campusID);
                 
         });


        $('.pros-delete-transaction-btn').on('click', function () {


               $('.pros-delete-transaction-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden"></span>Deleting..');
               $('.pros-delete-transaction-btn').attr('disabled', true);
 
                var TransactionID =  $('#pros-delete-transaction').val();
                var campusID =    $('#prosdeletecampustransactionhere').val();

              

                    $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/pros-delete-transaction-made.php",
                            data: {
                                    campusID:campusID,
                                    TransactionID:TransactionID
                            },
                            //cache: false,
                            success: function (output) {
                                $('.pros-delete-transaction-btn').html('Delete <i class="fa fa-times" style="font-size:12px;"> </i>');
                                $('.pros-delete-transaction-btn').attr('disabled', false);
                                
                                   
                                    if(output.trim() == 'success')
                                    {

                                        
                                        $.wnoty({
                                                type: 'success',
                                                message: "Transaction removed successfully.",
                                                autohideDelay: 5000
                                        });
                                        $('#pros-delete-transaction').modal('hide');           


                                        prosloadtransactionhistory(); 

                                    }else
                                    {

                                    }
                                

                            }
                    });
        
        });





        //PROS LOAD TRANSATION DASHBOARD CONTENT HERE

              function  prosloadfinancetotaldashborad()
              {


                      var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
                      var UserID = '<?php echo $UserID ?>';

                    //   $('#prosloadbalancepaidfee').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
                    //   $('#prosloadbalancedebt').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
                      $('#prosloadwalletebalancecontent').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
                      $('#prosloadpendingwalletwithdrawer').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
                      $('#prosloadwithrawnamountcontent').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');
                        
                       


                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/pros-load-financeasboardcontent.php",
                                    data: {
                                        abba_get_stored_instituion_id: abba_get_stored_instituion_id,
                                        UserID: UserID
                                    },
                                    success: function (output) {
                                      
                                         
                                        $('#prosloadinputforfinancedashboard').html(output);
                                              
                                        
                                            var paidsummary =$('#prosamounpaidfinamsummary').val();
                                            var balancesummary =$('#prosamounbalancefinamsummary').val();
                                            var chargefee =$('#prosloadamounttobepaidsummary').val();
                                         

                                           

                                            // var withdrawnsumary =$('#proswallletwithdrawn').val();
                                            // var pendingsummary =$('#proswallletwithdrapending').val();
                                            // var walletbalsummary =$('#proswalletbalance').val();
                                           

                                            // $('#prosloadbalancepaidfee').html('₦'+paidsummary);
                                            // $('#prosloadbalancedebt').html('₦'+balancesummary)
                                            ;
                                            $('#prosloadwithrawnamountcontent').html('₦'+balancesummary);
                                            $('#prosloadpendingwalletwithdrawer').html('₦'+paidsummary);
                                            $('#prosloadwalletebalancecontent').html('₦'+chargefee);





                                    // $(document).ready(function () {
                                                var isHidden = false;

                                                // Initially, hide the number and show asterisks
                                                var prosgetamoun_walletbal = $('#prosloadwalletebalancecontent').text();
                                                // var prospaidwaletpaid  = $('#prosloadbalancepaidfee').text();
                                                // var prosbalanceamount  = $('#prosloadbalancedebt').text();

                                                var prospending  = $('#prosloadpendingwalletwithdrawer').text();
                                                var proswithdrawn  = $('#prosloadwithrawnamountcontent').text();


                                                

                                                $('.prosviewfinancewalletbal').on('click', function () {
                                                    
                                                    
                                                     $('.prosslidewaleteicon').toggleClass("fa-eye fa-eye-slash");
                                                    
                                                      
                                                    if (isHidden) {
                                                        
                                                        // If currently hidden, show the asterisks
                                                        $('#prosloadwalletebalancecontent').text('₦' + '*****');
                                                        // $('#prosloadbalancepaidfee').text('₦ '+'*****');
                                                        // $('#prosloadbalancedebt').text('₦' + '*****');
                                                        
                                                       
                                                        
                                                        
                                                    } else {
                                                        
                                                        // If currently showing, hide the number
                                                        $('#prosloadwalletebalancecontent').text(prosgetamoun_walletbal);
                                                        // $('#prosloadbalancepaidfee').text(prospaidwaletpaid);
                                                        // $('#prosloadbalancedebt').text(prosbalanceamount); 
                                                        
                                                        //  $('.prosslidewaleteicon').toggleClass("fa fa-eye");
                                                    }

                                                    // Toggle the state
                                                    isHidden = !isHidden;
                                                });





                                                $('.prosperwalletpendingshowbtn').on('click', function () {
                                                    if (isHidden) {
                                                        // If currently hidden, show the asterisks
                                                        $('#prosloadpendingwalletwithdrawer').text('₦' + '*****');
                                                       
                                                    } else {
                                                        // If currently showing, hide the number
                                                        $('#prosloadpendingwalletwithdrawer').text(prospending);
                                                       
                                                    }
                                                    // Toggle the state
                                                    isHidden = !isHidden;
                                                });




                                                $('.proswithdrawnamount').on('click', function () {
                                                    if (isHidden) {
                                                        // If currently hidden, show the asterisks
                                                        $('#prosloadwithrawnamountcontent').text('₦' + '*****');
                                                       
                                                    } else {
                                                        // If currently showing, hide the number
                                                        $('#prosloadwithrawnamountcontent').text(proswithdrawn);
                                                       
                                                    }
                                                    // Toggle the state
                                                    isHidden = !isHidden;
                                                });





                                                
                                    // });

                                            
                                    
      
                                            
                                    }
                                });





              }

         //PROS LOAD TRANSATION DASHBOARD CONTENT HERE



       
         //PROS FEE DRIVE AND INDUALIZE BILL HERE
      

         $(document).ready(function () {

                prosloadtransactionfeedrive();
                prosloadmsgingbulkmsg();
                prosloadtransaction_loststatement();
                prosload_balance_sheetcontent();
                prosload_load_categorysummaryhere();
                prosloadschoolproceed();
        
                $('.pros-load-campuspostransaction-feedrive').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                $('.pros-load-campuspostransaction-lossstatement').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                $('.pros-load-campuspostransaction-balancesheet').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                $('.pros-load-campuspostransaction-categorysummary').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
                $('.pros-load-campuspostransaction-schoolproceed').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');
              
                
                
                var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();

                var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");

                    // get campus ajax
                    var dataString = 'abba_instituion_id=' + abba_get_stored_institution_id;

                    $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-campus.php",
                    data: dataString,
                    //cache: false,
                    success: function (output) {
                       
                        $('.pros-load-campuspostransaction-feedrive').html(output);
                        $('.pros-load-campuspostransaction-lossstatement').html(output);
                        $('.pros-load-campuspostransaction-balancesheet').html(output);
                        $('.pros-load-campuspostransaction-categorysummary').html(output);
                        $('.pros-load-campuspostransaction-schoolproceed').html(output);

                        


                    }
                    });

        });
        


    //PROS LOAD TERM ON CAMPUS CHANGE FOR PROFIT AND LOSS Statement
    


    $('body').on('change', '.pros-load-campuspostransaction-balancesheet', function () {
                 var campusID = $(this).val();

                if (campusID == 'NULL') {

                    $('#prosloaterm-balancesheet').html('<option value="NULL">Select term</option>');
                } else {


                    $('#prosloaterm-balancesheet').html('<option value="NULL">loading..</option>');

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                    data: {
                        campusID: campusID
                    },
                    //cache: false,
                    success: function (output) {
                        $('#prosloaterm-balancesheet').html(output);

                    }
                });
            }

});

    $('body').on('change', '.pros-load-campuspostransaction-lossstatement', function () {


        var campusID = $(this).val();

            if (campusID == 'NULL') {

                $('#prosloaterm-profitstatement').html('<option value="NULL">Select term</option>');
            } else {
              $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {
                     $('#prosloaterm-profitstatement').html(output);

                }
            });
          }

    });


    //PROS LOAD TERM ON CHANGE OF CATEGORY SUMMARRY CAMPUS


                    
         $('body').on('change', '.pros-load-campuspostransaction-categorysummary', function () {

                var campusID = $(this).val();

                    if (campusID == 'NULL') {

                        $('#prosloaterm-categorysummary').html('<option value="NULL">Select term</option>');
                        $('.pros-load-classname-catefee').html('<option value="NULL">Select campus</option>');
                    } else {

                        $('.pros-load-classname-catefee').html('<option value="NULL">loading..</option>');



                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                        data: {
                            campusID: campusID
                        },
                        //cache: false,
                        success: function (output) {
                            $('#prosloaterm-categorysummary').html(output);

                        }
                    });

                 //PROS LOAD CLASS FOR EACH CAMPUS HERE
                    $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/populationandsummary/prosloadclassforeachcampus.php",
                            data: {
                                campusID: campusID
                            },
                            //cache: false,
                            success: function (output) {

                                $('.pros-load-classname-catefee').html(output);

                            }
                        });

                   //PROS LOAD CLASS FOR EACH CAMPUS HERE





                }

            });

    //PROS LOAD TERM ON CHANGE OF CATEGORY SUMMARRY CAMPUS


    


  //PEROS ONCHANGE ON CAMPUS TO LOAD SECTION AND TERM
    $('body').on('change', '.pros-load-campuspostransaction-feedrive', function () {
        $('#prosperloadtransactionclass').html('<option><i class="fa fa-spinner fa-spin">Loading..</i></option>');

        var campusID = $(this).val();

        if (campusID == 'NULL') {

            $('#prosloatermfeedrive').html('<option value="NULL">Select campus</option>');
            $('.pros-sectionfeedrive-feedrive').html('<option value="NULL">Select campus</option>');
           

        } else {

            $('#prosloatermfeedrive').html('<option value="NULL">loading..</option>');
            $('.pros-sectionfeedrive-feedrive').html('<option value="NULL">loading..</option>');
           
            //LOAD SECTION
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/fee-drive/pros-load-feedrive-section.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {

                    $('.pros-sectionfeedrive-feedrive').html(output);

                   

                }
            });


              //LOAD TERM WITH ALIAS HERE

              $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                data: {
                    campusID: campusID
                },
                //cache: false,
                success: function (output) {

                    $('#prosloatermfeedrive').html(output);

                }
            });

          
              


        }



    });




    //PEROS ONCHANGE ON SECTION TO LOAD  CLASSES
    $('body').on('change', '.pros-sectionfeedrive-feedrive', function () {
         
        var SectionID = $(this).val();
        var campusID = $('.pros-load-campuspostransaction-feedrive').val();


        if (SectionID == 'NULL') {


            $('.prosclass-loadfeedrive').html('<option value="NULL">Select class</option>');

        }else {


             $('.prosclass-loadfeedrive').html('<option value="NULL">loading..</option>');

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/fee-drive/pros-load-class-valuefilter.php",
                data: {
                    campusID: campusID,
                    SectionID:SectionID
                },
                //cache: false,
                success: function (output) {
                    $('.prosclass-loadfeedrive').html(output);

                }
            });
          

        }


        

    });



    //LOAD FEE DRIVE CONTENT
    $('body').on('click', '.pros-loadfeedrive-btn', function () {
        prosloadtransactionfeedrive();
        prosloadmsgingbulkmsg();
    });



   function  prosloadtransactionfeedrive(){


                var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                var campusID = $('.pros-load-campuspostransaction-feedrive').val();
                var session = $('#prosgetsessiontranfeedrive').val();
                var sectionID = $('.pros-sectionfeedrive-feedrive').val();
                var classID = $('.prosclass-loadfeedrive').val();
                var status = $('.pros-loadstatusfeedrive').val();
                var term = $('#prosloatermfeedrive').val();



                $('.pros-load-transaction-feedrive').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');



                        $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/fee-drive/pros-load-feedrivecontent.php",
                        data: {

                                abba_get_stored_institution_id:abba_get_stored_institution_id,
                                campusID:campusID,
                                session:session,
                                sectionID:sectionID,
                                classID:classID,
                                status:status,
                                term:term
                        },
                        //cache: false,
                        success: function (output) {
                              
                            $('.pros-load-transaction-feedrive').html(output);

                            $(document).ready(function(){
                                // Initialize First Table
                                $('#table2_pros').DataTable({
                                    responsive: true
                                });


                            });
                            
                            $(document).ready(function(){
                                var items = $(".pros-maintable .prostablerowpag");
                                var numItems = items.length;
                                var perPage = parseInt(12);
                                var prebtn = '<i class="fa fa-arrow-left"></i>';
                                var nextbtn = '<i class="fa fa-arrow-right"></i>';
                                    
                                items.slice(perPage).hide();

                                $('#pros-staffpaginationcont').pagination({

                                    items: numItems,
                                    itemsOnPage: perPage,
                                    prevText: prebtn,
                                    nextText: nextbtn,
                                    onPageClick : function (pageNumber){
                                        var showFrom = perPage * (pageNumber - 1);
                                        var showTo = showFrom + perPage;
                                        items.hide().slice(showFrom, showTo).show();
                                    }

                                });
                            });

                            $('#pros-staffpaginationcont').show();


    

                        }
                    });


   }
        

        $('body').on('change', '.pros-checkall-drive', function () {
            var checkStatus = $(this).prop('checked');

            if (checkStatus) {
                $(".prosloadfeedriveeach-check").prop('checked', true);
            } else {
                $(".prosloadfeedriveeach-check").prop('checked', false);
            }

            var selTotal = $('.prosloadfeedriveeach-check:checked').length;

            // Check the "Check All" checkbox only if all checkboxes are checked
            $('.pros-checkall-drive').prop('checked', selTotal === $('.prosloadfeedriveeach-check').length);
        });




    
      

            // CREATE EDIT,DELETE, AND ADMISSION CLASS HERE 
            $('body').on('click', '.showHideRow', function() {
                var row = $(this).data('id');
                $("#" + row).toggle();
                
            });



            $('body').on('click','.prosload-userindividualizebill-btn', function(){
                        

                   var studentID = $(this).data('stud');
                   var classID = $(this).data('class');
                   var sessionID = $(this).data('session');
                   var institutionID = $(this).data('inst');
                   var CampusID = $(this).data('campus');
                   var term = $(this).data('term');

                       $('.prosloadindividualizebill').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');




                     $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/fee-drive/prosload-adividualizebill.php",
                        data: {
                                studentID:studentID,
                                classID:classID,
                                sessionID:sessionID,
                                term:term,
                                institutionID:institutionID,
                                CampusID:CampusID
                        },
                        //cache: false,
                        success: function (output) {
                          
                              
                            $('.prosloadindividualizebill').html(output);

                        }
                    });





            });



            $('body').on('click', '.prosprint-indviduli-fee-btn', function () {

                    var element = document.querySelector('.prosloadindividualizebill');
                    // Add padding to the container element
                    // element.style.paddingRight = '40px';
                    // element.style.paddingLeft = '40px';

                    // Choose the element and generate the PDF
                    html2pdf().from(element).outputPdf().then(function (pdf) {
                        // Save the PDF using FileSaver.js with a custom filename
                        var full_file_name = 'individualize-bill.pdf';
                        saveAs(pdf, full_file_name);
                    });
            });

             


            //prosload message content here 

            $('body').on('click','#prosloadmessagecontentbtn', function(){


                    $('.prosloadwhatcontenthere-direct').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                    $('.prosloadnamefochatwhataap-box').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


                    var studentID = $(this).data('stud');
                    var institutionID = $(this).data('inst');
                    var CampusID = $(this).data('campus');

              

                    
                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/fee-drive/pros-mesagcontent-for-feedrive.php",
                        data: {
                                studentID:studentID,
                                institutionID:institutionID,
                                CampusID:CampusID
                        },
                        //cache: false,
                        success: function (output) {

                               $('#prosloadsinglemessagecontent').html(output);
                                 var phone = $('#prosgetparentforsingle-number').val();
                                 var fullname = $('#prosgetparentforsingle-fullname').val();
                                 var des_mesaage = 'Chat directly';

                                 var pros_parent_email = $('#prosloadstudemail').val();
                                 var pros_parentID = $('#prosloadparentid-formessage').val();
                                 
                                 
                                  var studendebt = $('#prosloaddebtamount').val();
                                  var studentname = $('#prosgetstudentforsingle-fullname').val();
                                  
                                  
                                  
                                  
                                  $('.prosloademailmessagecontenthere').html('<div style="font-size: 15px;">'+fullname+': <span  style="font-size: 12px; color: #9c9c9c;">'+pros_parent_email+'</span></div>');

                                    $('.proloadstudenfeewhat').html('<strong>Student Name:</strong> '+studentname+'<br><strong>Fee:</strong>'+studendebt)


                                 $('.prosloademailnamepros').html('<input class="form-check-input"  type="checkbox"  data-id="'+fullname+'" value="'+pros_parent_email+'"   id="flexCheckDefault">'+
                                    '<label class="form-check-label"  for="flexCheckDefault">'+
                                      fullname
                                    +'</label>');




                                 var proswatsinglecontent = '<div style="font-size: 15px;">' + fullname +'<br><span style="font-size: 12px; color: #9c9c9c;">'+phone+'</span></div>'+
                                            
                                    '<div style="float: right; font-size: 12px;">'+
                                        '<a href="https://wa.me/"'+phone+'" target="_blank" style="text-decoration: none;">'+
                                            '<i class="bx bxl-whatsapp" style="font-size: 14px;"></i>'+
                                            des_mesaage
                                             '</a>'+
                                    '</div>';


                                   var proslodcheckcontent  =  '<input class="form-check-input pros-generalcheck-namesinglemessage" checked   type="checkbox"  data-parentid="'+pros_parentID+'"  data-parentemail="'+pros_parent_email+'" data-id="'+phone+'" value="'+fullname+'" id="flexCheckDefault">'+
                                    '<label class="form-check-label" for="flexCheckDefault">'
                                              + fullname +
                                    '</label>';
                                  
                              
                                    $('.prosloadwhatcontenthere-direct').html(proswatsinglecontent);
                                    $('.prosloadnamefochatwhataap-box').html(proslodcheckcontent);

                        }
                    });


                        

            });




            $('body').on('click','.pros-submitted-message-singlebtn', function(){
                $('.pros-submitted-message-singlebtn').html('<i class="fas fa-spinner fa-spin " style="color:#007ffb;"></i>sending..');
                var selectedValue = $(".proscheckmessagesinglehere-type:checked").val();
               
                var message_content= $(".prosmeassge-content-singlewa").val();
               var messagetitlewa = $(".messagetitlewa").val();
               var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                


               
                prosname = [];
                prosnumber = []
                $('.pros-generalcheck-namesinglemessage:checked').each(function() {
                    prosname.push($(this).val());
                    prosnumber.push($(this).data('id'));
                });



                if(selectedValue === undefined || selectedValue == '')
                {

                                $.wnoty({
                                        type: 'warning',
                                        message: "Please select a message type: either WhatsApp, email, or SMS",
                                        autohideDelay: 5000
                                });

                                $('.pros-submitted-message-singlebtn').html('Send Message');

                }else if(prosname == '')
                {

                          $.wnoty({
                                        type: 'warning',
                                        message: "Please select a recepient to proceed.",
                                        autohideDelay: 5000
                                });
                                $('.pros-submitted-message-singlebtn').html('Send Message');

                }else if(message_content == '')
                {

                            $.wnoty({
                                        type: 'warning',
                                        message: "Enter your message content to proceed.",
                                        autohideDelay: 5000
                                });
                                $('.pros-submitted-message-singlebtn').html('Send Message');
                                
                    
                }else
                {


                            $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/fee-drive/pros-sendsinglemessagecontent.php",
                                data: {
                                    prosname:prosname,
                                    prosnumber:prosnumber,
                                    message_content:message_content,
                                    messagetitlewa:messagetitlewa,
                                    abba_get_stored_institution_id:abba_get_stored_institution_id
                                },
                                //cache: false,
                                success: function (output) {
                                    
                                        if(output == '1')
                                        {
                                           
                                           
                                            $.wnoty({
                                                type: 'success',
                                                message: "Message delivered successfully",
                                                            autohideDelay: 5000
                                            });
                                            $('.pros-submitted-message-singlebtn').html('Send Message'); 
                                        }
                                  
                                 

                                }
                            });

                }
                
               


                
                      
            });


            //pros click on message type single


            // $('body').on('click','.prosgeneralmessageclick', function(){
            //             alert('hello');
            // });
            


            //profit lost statement


             $('body').on('click','.pros-loadprofit-loss-btn', function(){
                prosloadtransaction_loststatement();
            });

          

            function prosloadtransaction_loststatement()
            {
               

                       $('.prosload-loss-stamentcontent-here').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');



                            
                        var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                        var campusID = $('.pros-load-campuspostransaction-lossstatement').val();
                        var session = $('#prosgetsession-profitloss-stament').val();
                        var term = $('#prosloaterm-profitstatement').val();
                        


                        

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/loss-statement/prosload-profitloasscontent.php",
                        data: {

                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                            campusID:campusID,
                            session:session,
                            term:term
                           

                        },
                        //cache: false,
                        success: function (output) {
                              
                            $('.prosload-loss-stamentcontent-here').html(output);

                        }
                    });


                  

            }





            $('body').on('click', '.prosprint-printcontent-profitlossbnt', function(){

                const element = document.getElementById("profitlossstatementcontent");
                element.style.paddingRight = '40px';
                    element.style.paddingLeft = '40px';
                // Choose the element and save the PDF for your user.
                html2pdf().from(element).save();
                    // var printStyle = document.querySelector("style");
                    
                    
            });


             
              //PROS LOAD BALANCE SHEET CONTENT HERE
                $('body').on('click', '.prosprint-printcontent-balancesheetbnt', function(){

                    
                    const element = document.getElementById("prosloadbalancesheetcontent");
                    element.style.paddingRight = '40px';
                    element.style.paddingLeft = '40px';
                    // Choose the element and save the PDF for your user.
                    html2pdf().from(element).save();
                        // var printStyle = document.querySelector("style");
                });

                
                $('body').on('click','.pros-load-balancesheet-btn', function(){
                    prosload_balance_sheetcontent();
                });


                function prosload_balance_sheetcontent()
                {

                          $('.prosload-balancesheet-content').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                        var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                        var campusID = $('.pros-load-campuspostransaction-balancesheet').val();
                        var session = $('#prosgetsession-balancesheet').val();
                        var term = $('#prosloaterm-balancesheet').val();


                        



                        $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/loss-statement/prosload-prosload-balancesheet.php",
                        data: {

                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                            campusID:campusID,
                            session:session,
                            term:term

                        },
                        //cache: false,
                        success: function (output) {
                              
                            $('.prosload-balancesheet-content').html(output);

                        }
                    });


                          


                    

                }

      

       
            
            //PROS LOAD CATEGORY SUMMARY CONTEN HERE

              
                    $('body').on('click','.pros-load-categorysummary-btn', function(){
                           prosload_load_categorysummaryhere();
                     });

                        function prosload_load_categorysummaryhere(){


                                $('.prosloadcategorysummary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                                var campusID = $('.pros-load-campuspostransaction-categorysummary').val();
                                var session = $('#prosgetsession-categorysummary').val();
                                var term = $('#prosloaterm-categorysummary').val();
                                var classID = $('.pros-load-classname-catefee').val();


                                $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/populationandsummary/prosload-category-summarycontent.php",
                                        data: {

                                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                                            campusID:campusID,
                                            session:session,
                                            term:term,
                                            classID:classID

                                        },
                                        //cache: false,
                                        success: function (output) {
                                          
                                            
                                              $('.prosloadcategorysummary').html(output);

                                        }
                                  });


                          


                                 

                        }
             //PROS LOAD CATEGORY SUMMARY CONTEN HERE

         


             //load category item in bit
             $('body').on('click', '.prosloadcateitemsdetails-sumarybtn', function(){
               
                  $('.prosloadcategoryitemsfeeinbit').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');



                    var abba_get_stored_institution_id = $(this).data('institution');
                    var campusID = $(this).data('camp');
                    var session = $(this).data('session');
                    var term = $(this).data('term');
                    var categoryID = $(this).data('catego');
                    var classID = $(this).data('class');
                    

                   

                    


                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/populationandsummary/prosload-category-summarycontent-bitsub.php",
                        data: {

                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                            campusID:campusID,
                            session:session,
                            term:term,
                            categoryID:categoryID,
                            classID:classID

                        },
                        //cache: false,
                        success: function (output) {
                            
                            
                            $('.prosloadcategoryitemsfeeinbit').html(output);

                        }
                    });



             });

             //load category item in bit


             $('body').on('click', '#pros-print-categorybtn', function () {

                    var element = document.querySelector('.prosloadcategorysummarycontent');
                    // Add padding to the container element
                    element.style.paddingRight = '40px';
                    element.style.paddingLeft = '40px';

                    // Choose the element and generate the PDF
                    html2pdf().from(element).outputPdf().then(function (pdf) {
                        // Save the PDF using FileSaver.js with a custom filename
                        var full_file_name = 'custom_filename.pdf';
                        saveAs(pdf, full_file_name);
                    });
               });

                


                $('body').on('click', '.prosprint-printcontent-categorycontent', function () {
                       
                        var element = document.getElementById('prosloadcategosummfullcontent');

                         element.style.paddingRight = '40px';
                         element.style.paddingLeft = '40px';

                    
                        var abba_get_stored_institution_name = $('.abba-change-institution option:selected').text();
                        var campus = $('.pros-load-campuspostransaction-categorysummary option:selected').text();
                        var session = $('#prosgetsession-categorysummary option:selected').text();
                        var term = $('#prosloaterm-categorysummary option:selected').text();


                        var  newinstitution_name =  abba_get_stored_institution_name === '' ? 'Select Institution' : '-' + abba_get_stored_institution_name;
                        var  campusnamenew =  campus === '' ? 'Select Campus' : '-' + campus;
                        var  sessionnew =  session === '' ? 'Select Session' :'-' + session;
                        var  termnew =  term === '' ? 'Select Term' : term;

                        var full_file_name = 'Category Fee For' + newinstitution_name + campusnamenew + sessionnew + ' '  + termnew;


                        // Clone the content and manipulate the clone
                        var clone = element.cloneNode(true);

                        // Remove elements to exclude from the clone
                        $(clone).find('.proshideviewiconforprint').remove();

                        // Generate PDF from the modified clone
                        html2pdf().from(clone).output('blob').then(function (pdfBlob) {
                            // Create a Blob and trigger the download
                            var a = document.createElement('a');
                            a.href = URL.createObjectURL(pdfBlob);
                            a.download = full_file_name + '.pdf';
                            a.click();
                            // You can add additional logic here, such as displaying a message that download is finished.
                            // console.log('Download finished!');
                        });
                    });



                    //PROS SCHOOL PROCEED CONTENT HERE


                    $('body').on('change', '.pros-load-campuspostransaction-schoolproceed', function () {

                                var campusID = $(this).val();

                                    if (campusID == 'NULL') {

                                        
                                        $('#prosloaterm-schoolproceed').html('<option value="NULL">Select campus</option>');
                                    } else {

                                        $('#prosloaterm-schoolproceed').html('<option value="NULL">loading..</option>');



                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/pros-loadterm-forpostpayment.php",
                                        data: {
                                            campusID: campusID
                                        },
                                        //cache: false,
                                        success: function (output) {
                                            $('#prosloaterm-schoolproceed').html(output);

                                        }
                                    });
                                }

                     });

                     $('body').on('click', '.pros-load-schoolproceed-btn', function () {
                           prosloadschoolproceed();
                     });
                     

                            //prosload schoool procced content here

                        function prosloadschoolproceed()  {
                                        


                            $('.prosloadshoolproceedcontent').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

                                var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();
                                var campusID = $('.pros-load-campuspostransaction-schoolproceed').val();
                                var session = $('#prosgetsession-schoolproceed').val();
                                var term = $('#prosloaterm-schoolproceed').val();



                                
                                $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/populationandsummary/prosload-schoolprocedcontenthere.php",
                                        data: {

                                            abba_get_stored_institution_id:abba_get_stored_institution_id,
                                            campusID:campusID,
                                            session:session,
                                            term:term
                                        },
                                        //cache: false,
                                        success: function (output) {
                                              $('.prosloadshoolproceedcontent').html(output);

                                        }
                                  });



                        }


                          //PROS LOAD SCHOOLPROCEE SUMMARY CONTENT HERE

                            $('body').on('click', '.prosloadschoolproceedbtnviewetails', function () {
                                            
                                       
                                        $('.prosloadschoolsummayforeachclass').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');


                                        var classname = $(this).data('class');
                                        var institutionID = $(this).data('inst');
                                        var CampusID = $(this).data('camp');
                                        var term = $(this).data('term');
                                        var session = $(this).data('session');





                                    $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/populationandsummary/prosload-schoolprocedcontentsumary.php",
                                        data: {

                                                classname:classname,
                                                institutionID:institutionID,
                                                CampusID:CampusID,
                                                term:term,
                                                session:session
                                        },
                                        //cache: false,
                                        success: function (output) {
                                              $('.prosloadschoolsummayforeachclass').html(output);

                                        }
                                  });

                                       
                                           
                             });


                            //PROS LOAD SCHOOLPROCEE SUMMARY CONTENT HERE

                            $('body').on('click', '.pros-printclassfeesummary-scholprocced-btn', function () {

                                   var element = document.querySelector('.prosprintclassfeesummary-schoolproceed');

                                 

                                    // Choose the element and generate the PDF
                                    html2pdf().from(element).outputPdf().then(function (pdf) {
                                        // Save the PDF using FileSaver.js with a custom filename
                                        var full_file_name = 'custom_filename.pdf';
                                        saveAs(pdf, full_file_name);
                                    });

                                        
                                  
                            });



                            $('body').on('click', '.Prosprintschoolproceedcontentinfo-bnt', function () {
                       
                                    var element = document.getElementById('prosloadschoolproceedcontent');

                                    element.style.paddingRight = '40px';
                                    element.style.paddingLeft = '40px';

                                
                                    // var abba_get_stored_institution_name = $('.abba-change-institution option:selected').text();
                                    // var campus = $('.pros-load-campuspostransaction-categorysummary option:selected').text();
                                    // var session = $('#prosgetsession-categorysummary option:selected').text();
                                    // var term = $('#prosloaterm-categorysummary option:selected').text();


                                    // var  newinstitution_name =  abba_get_stored_institution_name === '' ? 'Select Institution' : '-' + abba_get_stored_institution_name;
                                    // var  campusnamenew =  campus === '' ? 'Select Campus' : '-' + campus;
                                    // var  sessionnew =  session === '' ? 'Select Session' :'-' + session;
                                    // var  termnew =  term === '' ? 'Select Term' : term;

                                    var full_file_name = 'School-proceed-summary';


                                    // Clone the content and manipulate the clone
                                    var clone = element.cloneNode(true);

                                    // Remove elements to exclude from the clone
                                    $(clone).find('.prosloadschoolproceedbtnviewetails').remove();

                                    // Generate PDF from the modified clone
                                    html2pdf().from(clone).output('blob').then(function (pdfBlob) {
                                        // Create a Blob and trigger the download
                                        var a = document.createElement('a');
                                        a.href = URL.createObjectURL(pdfBlob);
                                        a.download = full_file_name + '.pdf';
                                        a.click();
                                        // You can add additional logic here, such as displaying a message that download is finished.
                                        // console.log('Download finished!');
                                    });
                   });

                            
                            
                            
                            
                            
                               //PROS SET COUNT DOWN HERE



                   $('body').on('click', '.prossubmit-timecountdownbtn', function () {



                           $('.prossubmit-timecountdownbtn').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:white;"></i></div>');

              
                            var sDate = $('.prosgestartdatecoundown').val();
                            var enddate = $('.prosgeenddatecoundown').val();
                            var des = $('.proscoundowndescription').val();

                          

                            var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();

                           if(sDate == '' || enddate  ==  '' || des == '') 
                           {




                                  $.wnoty({
                                        type: 'warning',
                                        message: "Please select a message type: either WhatsApp, email, or SMS",
                                        autohideDelay: 5000
                                  });

                                 $('.prossubmit-timecountdownbtn').html(' <i class="fas fa-hourglass-start"></i>  Set Now');


                           }else{




                                         $.ajax({
                                                    type: "POST",
                                                    url: "../../controller/scripts/owner/fee-drive/pros-insert-feedrive-countdown.php",
                                                    data: {

                                                        sDate:sDate,
                                                        enddate:enddate,
                                                        des:des,
                                                        abba_get_stored_institution_id:abba_get_stored_institution_id            
                                                    },
                                                    //cache: false,
                                                    success: function (output) {
                                                           
                                                        $('.prossubmit-timecountdownbtn').html(' <i class="fas fa-hourglass-start"></i>  Set Now');

                                                            if(output.trim() == '1')
                                                            {


                                                                   $.wnoty({
                                                                            type: 'success',
                                                                            message: "Great!! count down timer set successfully.",
                                                                            autohideDelay: 5000
                                                                    });
                                                                            
                                                            }else
                                                            {

                                                                $.wnoty({
                                                                            type: 'warning',
                                                                            message: "Hey!! count down timer failed pls try again.",
                                                                            autohideDelay: 5000
                                                                    });

                                                            }
     

                                                    }
                                            });


                           }
                           





                   });






                   $(document).ready(function () {
                        prosloadcoundowntimmer();
                    });

                    function prosloadcoundowntimmer() {
                        var abba_get_stored_institution_id = $('.abba-change-institution option:selected').val();

                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/fee-drive/prosload-countdowncontent.php",
                            data: {
                                abba_get_stored_institution_id: abba_get_stored_institution_id
                            },
                            success: function (output) {
                                if (output.trim() === '') {
                                    // Handle empty output if needed
                                } else {
                                    try {
                                        var jsonDatacate = JSON.parse(output);

                                        if (Object.keys(jsonDatacate).length > 0) {
                                            var itemnew = jsonDatacate;

                                            // Set values in input fields
                                            $('.prosgestartdatecoundown').val(itemnew.startdate);
                                            $('.prosgeenddatecoundown').val(itemnew.enddate);
                                            $('.proscoundowndescription').val(itemnew.description);
                                        } else {
                                            console.log("Empty JSON object or unexpected structure.");
                                        }
                                    } catch (error) {
                                        console.log("Error parsing JSON:", error);
                                    }
                                }
                            }
                        });
                    }

                            

                   //PROS SET COUNT DOWN HERE


                    
                    
                    
                    
                     $('body').on('click', '.parentsphonenumbersave_btn', function () {
                    
                    
                            $('.parentsphonenumbersave_btn').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:white;"></i></div>');
                              
                              
                            var number = $('.parentwanumbertrasaction').val();
                            var studentID = $('#prosperloadtransactionstudent').val();
                            var  CampusID = $('#prosperloadtransactioncampus').val();
                            
                          
                            
                            if(number == '')
                            {
                               
                                   $.wnoty({
                                            type: 'warning',
                                            message: "Hey!! Input number before proceeding.",
                                            autohideDelay: 5000
                                    });
                                    
                                          $('.parentsphonenumbersave_btn').html('Save');
                                
                            }else
                            {
                                
                                
                                  var formattedinput = [];
                                    document.querySelectorAll('.parentwanumbertrasaction').forEach(function(input) {
                                        // Get the `intlTelInput` plugin instance for the input field
                                        var iti = window.intlTelInputGlobals.getInstance(input);
                                        // Get the raw phone number value from the input field
                                        var numberformat = input.value;
                                        // Use the `intlTelInputUtils` library to format the phone number with its country code
                                        formattedinput.push(intlTelInputUtils.formatNumber(numberformat, iti.getSelectedCountryData()
                                            .iso2));
                                        // Display the formatted phone number in an alert message
                                    });
                                         
                                         
                                          
                                                        
                                                                    
                                    $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/prossubmit_parentphonenumberforpyement.php",
                                            data: {

                                                 formattedinput:formattedinput,
                                                 studentID:studentID,
                                                 CampusID:CampusID          
                                            },
                                            //cache: false,
                                            success: function (output) {
                                                   
                                                  $('.parentsphonenumbersave_btn').html('Save');


                                                if(output.trim() == '1')
                                                {
                                                    
                                                    $.wnoty({
                                                            type: 'success',
                                                            message: "Great!! number saved successfully.",
                                                            autohideDelay: 5000
                                                    });
                                                    
                                                    $('#prosload-share-receipt-modal').modal('hide');
                                                    
                                                }else
                                                {
                                                    
                                                }
                                                    

                                            }
                                    });
                                
                                
                                
                            }
                            
                           
                    
                     });
                    



   

    

</script>