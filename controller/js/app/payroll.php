<script>



  

    $(document).ready(function () {

        // abba_get_wallet_details();

         //minnify_innitialization();
       

    });

    function minnify_innitializatietailson() {
       

        var request = new XMLHttpRequest();
        request.open('POST', 'https://api.monnify.com/api/v1/auth/login/');
        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('Authorization', 'Basic  TUtfUFJPRF9aOTgwR0c0UFlBOjI0Wk1VNlZDQlRCOUs1RkRDVjI2VTU1OEZUTEZQMFQ5');

        request.onreadystatechange = function () {
            if (this.readyState === 4) {
                // console.log('Status:', this.status);
                // console.log('Headers:', this.getAllResponseHeaders());
                var abc = this.responseText;
                const myObj = JSON.parse(abc);
                var accessstoken = myObj["responseBody"]['accessToken'];

         

                localStorage.setItem('storedtoken', accessstoken);
                // console.log('Body:', accessstoken);
            }
        };
        request.send();
    }




 



  
        //pros load new content here

        $(document).ready(function () {


            var currentDate = new Date();

            // Format the date as YYYY-MM
            var formattedDate = currentDate.toISOString().slice(0, 7);

            // Set the formatted date as the value of the date input field
            $('.prosstartamountmonth_instantpayment').val(formattedDate);
            $('.prosstartamountmonth-scheule').val(formattedDate);


                 prosloadstaffconforsalary();
                 prosloadexamloadsaryforshedule();
        });


        $('body').on('change', '.prosstartamountmonth_instantpayment', function() {
            prosloadstaffconforsalary();
        });


        
        $('body').on('change', '.prosstartamountmonth-scheule', function() {
            prosloadexamloadsaryforshedule();
        });




        

      

        function prosloadstaffconforsalary()
        {

            $('.prosloadstaffcontentsalary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            
            var user_id = $('#user_id').val();
            var user_type = $('#user_type').val();

            var dateforsalrypaid = $('.prosstartamountmonth_instantpayment').val();
            var prostag_data = 'datapay'; 

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros_load_staff_payment.php",
                data: { user_id:user_id,
                    user_type:user_type,
                    dateforsalrypaid:dateforsalrypaid,
                    prostag_data:prostag_data
                },
                success: function (data) {
                    $('.prosloadstaffcontentsalary').html(data);
                }

            });

        }



        function prosloadexamloadsaryforshedule()
        {

            $('.prosloadstaffforshedule-salary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            
            var user_id = $('#user_id').val();
            var user_type = $('#user_type').val();

            var dateforsalrypaid = $('.prosstartamountmonth-scheule').val();
            var prostag_data = 'datashedule'; 

            

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros_load_staff_payment.php",
                data: { 
                    user_id:user_id,
                    user_type:user_type,
                    dateforsalrypaid:dateforsalrypaid,
                    prostag_data:prostag_data
                },
                success: function (data) {
                    $('.prosloadstaffforshedule-salary').html(data);
                }

            });

        }




        //PROS LOAD



        $('body').on('change', '.prosselectallcheckedall', function() {

                var checkStatus = $(this).prop('checked');

                    if(checkStatus == true)
                    {
                        $(".proscheckedainputnamesalaryeach").prop('checked', $(this).prop("checked"));
                       

                              var totalsalarytobepaid = [];
                                $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                                    totalsalarytobepaid.push($(this).data('amount'));
                                });
                                
                                
                                var total = 0;

                                for (var i in totalsalarytobepaid) {
                                            total += totalsalarytobepaid[i];
                                }
                            
                                $('.prosloadsalaybulkamount_inititated').val(total);

                                if(total == '0')
                                {
                                    var grandtotal =  '0.00';
                                }else
                                {
                                    var grandtotal =  total.toLocaleString("en-US");
                                }
                              

                                
                      
                    }
                    else if(checkStatus == false)
                    {

                        $(".proscheckedainputnamesalaryeach").prop('checked', false);
                        var grandtotal =  '0.00';

                        $('.prosloadsalaybulkamount_inititated').val(0);
                    }
                   
                    $('.prosloadamountcontent').html(grandtotal);




        });






        
        $('body').on('change', '.prosselectallcheckedallshedule', function() {

                var checkStatus = $(this).prop('checked');

                if(checkStatus == true)
                {
                    $(".proscheckedainputnamesalaryeachshedule").prop('checked', $(this).prop("checked"));
                

                          var totalsalarytobepaid = [];
                            $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                                totalsalarytobepaid.push($(this).data('amount'));
                            });
                            
                            
                            var total = 0;

                            for (var i in totalsalarytobepaid) {
                                        total += totalsalarytobepaid[i];
                            }
                        
                            $('.prosloadsalaybulkamount_inititatedschedule').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';
                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }
                            

                                
                    
                    }
                    else if(checkStatus == false)
                    {

                        $(".proscheckedainputnamesalaryeachshedule").prop('checked', false);
                        var grandtotal =  '0.00';

                        $('.prosloadsalaybulkamount_inititatedschedule').val(0);
                    }
                
                    $('.prosloadamountcontent-schedule').html(grandtotal);




            });



            $('body').on('change', '.proscheckedainputnamesalaryeach', function() {
                    if ($('.proscheckedainputnamesalaryeach:checked').length === $('.proscheckedainputnamesalaryeach').length) {
                    
                        $(".prosselectallcheckedall").prop('checked', true);
                        var selTotalSingle = $('.proscheckedainputnamesalaryeach:checked').length;
                        
                    } else {
                        $(".prosselectallcheckedall").prop('checked', false);

                        var selTotalSingle = $('.proscheckedainputnamesalaryeach:checked').length;

                    }


                        var totalsalarytobepaid = [];
                        $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                        });
                    
                        
                        var total = 0;

                        for (var i in totalsalarytobepaid) {
                                    total += totalsalarytobepaid[i];
                        }

                        $('.prosloadsalaybulkamount_inititated').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';

                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }

                    $('.prosloadamountcontent').html(grandtotal);
                });




                $('body').on('change', '.proscheckedainputnamesalaryeachshedule', function() {
                    if ($('.proscheckedainputnamesalaryeachshedule:checked').length === $('.proscheckedainputnamesalaryeachshedule').length) {
                    
                        $(".prosselectallcheckedallshedule").prop('checked', true);
                        var selTotalSingle = $('.proscheckedainputnamesalaryeachshedule:checked').length;
                        
                    } else {
                        $(".prosselectallcheckedallshedule").prop('checked', false);

                        var selTotalSingle = $('.proscheckedainputnamesalaryeachshedule:checked').length;

                    }


                        var totalsalarytobepaid = [];
                        $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                        });
                    
                        
                        var total = 0;

                        for (var i in totalsalarytobepaid) {
                                    total += totalsalarytobepaid[i];
                        }

                        $('.prosloadsalaybulkamount_inititatedschedule').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';

                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }

                    $('.prosloadamountcontent-schedule').html(grandtotal);
                });
                    

               
           




   //pros pay salary in bulk
        function payWithMonnifyBulk()
        {
           

            // minnify_innitialization();
                        
                     $('.abba_transfer_bulk').html('Processing..<i class="fa fa-spinner fa-spin"></i>');

                  

                        var amountcountent = parseInt($('.prosloadamountcontent').html());


                        var AmountType = parseInt($('.paymenttypeamountinput').val());
                        var prospaymentype = $('.prosgeneralpaymenttypecheck:checked').val();

                        var paymenetmonth = $('.prosstartamountmonth_instantpayment').val();

                      

                            var totalsalarytobepaid = [];
                            var walletbankname = [];
                            var accounname = []; 
                            var accounnum = []; 
                            var accountref = []; 
                            var staffID = []; 
                            var InstitutionID = []; 

                            var pros_totalamoun_owner =     parseInt($('.prosgetwallet_amount_school').val());
                            var totalamounttosent_allstaff =  parseInt($('.prosloadsalaybulkamount_inititated').val());


                          $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                            accounname.push($(this).data('accname'));
                            accounnum.push($(this).data('accnum'));
                            accountref.push($(this).data('ref'));
                            staffID.push($(this).data('staffid'));
                            InstitutionID.push($(this).data('inst'));

                            walletbankname.push($(this).val());
                        });



                            // var bank_code = $('.bank_code option:selected').val();
                        
                            var narration = 'From - <?php echo $PrimaryName . ' ' . $SecondaryName; ?>';

                            var storedtoken = localStorage.getItem('storedtoken');

                            var UserID = '<?php echo $UserID; ?>';

                            var UserType = '<?php echo $userType; ?>';

               

                    if ($('.proscheckedainputnamesalaryeach:checked').length > 0) {

                  
                          $('.abba_transfer_bulk').prop('disabled', true);

                          totalsalarytobepaid = totalsalarytobepaid.toString();
                          walletbankname = walletbankname.toString();
                          accounname = accounname.toString();
                          accounnum = accounnum.toString();
                          accountref = accountref.toString();
                          staffID = staffID.toString();
                          InstitutionID = InstitutionID.toString();


                          



                          if(totalamounttosent_allstaff > AmountType)
                            {


                                $.wnoty({
                                    type: 'warning',
                                    message: 'Insufficient funds!! Seems Amount inputed is greater than what you have in your' +prospaymentype+'.',
                                    autohideDelay: 5000
                                });


                                $('.abba_transfer_bulk').html('Proceed');
                                $('.abba_transfer_bulk').prop('disabled', false);

                        
                            }else if(paymenetmonth == '')
                            {

                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!! Select month you want to pay salary for',
                                            autohideDelay: 5000
                                        });


                                        $('.abba_transfer_bulk').html('Proceed');
                                        $('.abba_transfer_bulk').prop('disabled', false);

                            }
                            
                            else
                            {
                                          $('.abba_transfer_bulk').prop('disabled', true);

                                            $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/wallet/pros_transferbulk_money.php",
                                            data: {  
                                                    totalsalarytobepaid:totalsalarytobepaid,
                                                    walletbankname:walletbankname,
                                                    accounname:accounname,
                                                    accounnum:accounnum,
                                                    accountref:accountref,
                                                    narration:narration,
                                                    storedtoken:storedtoken,
                                                    UserID:UserID,
                                                    UserType:UserType,
                                                    staffID:staffID,
                                                    InstitutionID:InstitutionID,
                                                    AmountType:AmountType,
                                                     prospaymentype:prospaymentype,
                                                     totalamounttosent_allstaff:totalamounttosent_allstaff,
                                                     paymenetmonth:paymenetmonth
                                                },
                                                success: function (output) {

                                                       


                                                    if(output.trim() == '1')
                                                    {


                                                                $.wnoty({
                                                                    type: 'success',
                                                                    message: 'Great!! Salary paid successfully',
                                                                    autohideDelay: 5000
                                                                });

                                                               
                                                                prosloadstaffconforsalary();

                                                                prosloadpayementtypecontenthere();   
                                                               prosloadpayementtypecontenthereschedule();  
                                                               prosloastaffsallryamount();


                                                    }else
                                                    {
                                                        
                                                    }

                                                    $('.abba_transfer_bulk').prop('disabled', false);
                                                    $('.abba_transfer_bulk').html('Proceed');
                                                  
                                            }
                                        });
                                            
                            }
                         
                          
                             

                     }else
                     {




                               $.wnoty({
                                    type: 'error',
                                    message: 'kindly select staff to be paid before you proceed.',
                                    autohideDelay: 5000
                                });


                                $('.abba_transfer_bulk').html('Proceed');
                                $('.abba_transfer_bulk').prop('disabled', false);
                     }


                  

                   
            
        }

 





//onchange on date and month for schedule payment
$('body').on('change', '.pros_general_schedule_input', function() {
   var amountschedule = $('.prosamountschedule').val();
   var datescheduled = $('.schedulepaymentdate').val();
   var monthschedule = $('.prosstartamountmonth-scheule').val();

  
        if(amountschedule == '' || amountschedule == '' || monthschedule == '')
        {
                                               
                $('.pros_transfer_schedulebtn').prop('disabled', true);
        }else
        {
           
            $('.pros_transfer_schedulebtn').prop('disabled', false);
        }
});
//onchange on date and month for schedule payment
  
//onkeyup on amount  for schedule payment
$('body').on('keyup', '.pros_general_schedule_input_amount', function() {

         var amountschedule = $('.prosamountschedule').val();
         var datescheduled = $('.schedulepaymentdate').val();
         var monthschedule = $('.prosstartamountmonth-scheule').val();



        if(amountschedule == '' || amountschedule == '' || monthschedule == '')
        {
                                            
                $('.pros_transfer_schedulebtn').prop('disabled', true);
        }else
        {
    
            $('.pros_transfer_schedulebtn').prop('disabled', false);
        }
});
//onkeyup on amount  for schedule payment


$('body').on('click', '.pros_transfer_schedulebtn', function() {

        var amountschedule = $('.prosamountschedule').val();
        var datescheduled = $('.schedulepaymentdate').val();
        var monthschedule = $('.prosstartamountmonth-scheule').val();
        
        
          var AmountType = $('.paymenttypeamountinput').val();

          
                    
          var amountverifytype  = $('.paymenttypeamountinputschedule').val();

          var pros_amount_forallstaff = $('.prosloadsalaybulkamount_inititatedschedule').val();
         
    
    
            var UserID = '<?php echo $UserID; ?>';
            var UserType = '<?php echo $userType; ?>';

       
           var prospaymentype = $('.prosgeneralpaymenttypecheck_schedule:checked').val();
             


            var staffID = [];
            
            
           $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                
                staffID.push($(this).data('staffid'));
               
            });
           
  
        
      
            var staffidvalidate = staffID.some(function (value) {
                    // Use typeof to check if the value is a string before calling trim
                    return typeof value === 'string' && value.trim() === '';
                });

     
        $('.pros_transfer_schedulebtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');


        if(amountschedule == '' || datescheduled == '' || monthschedule == '')
        {

                        $.wnoty({
                            type: 'warning',
                            message: 'Hey!! No field should be left blank .',
                            autohideDelay: 5000
                        });

                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
 

        }else if(staffID == '')
        {


                     $.wnoty({
                            type: 'warning',
                            message: 'Hey!! Select staff to Schedule fee for.',
                            autohideDelay: 5000
                        });

                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
 

        }
        
        else
        {

                if(parseInt(pros_amount_forallstaff) >  parseInt(amountschedule))
                {


                        $.wnoty({
                            type: 'warning',
                            message: 'Hey!! Scheduled amount should not be less than expected amount .',
                            autohideDelay: 5000
                        });
                        
                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
                    
                
                        
                 }else if(parseInt(amountschedule) >  parseInt(amountverifytype))
                  {


                              $.wnoty({
                                    type: 'warning',
                                    message: 'Insufficient Funds!! ' + prospaymentype + ' amount is not enough to schedule salary payment',
                                    autohideDelay: 5000
                                });
                                                                
                             $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
               }
                
                else
                {


                    staffID = staffID.toString();

                   
                 

                          $('.pros_transfer_schedulebtn').prop('disabled', true);

                                 $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/wallet/pros_proceeed_scheedule_salary.php",
                                            data: {  
                                                   

                                                     amountschedule:amountschedule,
                                                    datescheduled:datescheduled,
                                                    monthschedule:monthschedule,
                                                    pros_amount_forallstaff:pros_amount_forallstaff,
                                                    UserID:UserID,
                                                    UserType:UserType,
                                                     prospaymentype:prospaymentype,
                                                     AmountType:AmountType,
                                                     staffID:staffID
                                                },
                                                success: function (output) {
                                                    
                                                
                                                   
                                                    $('.pros_transfer_schedulebtn').prop('disabled', false);

                                                    if(output.trim() == '2')
                                                    {

                                                                $.wnoty({
                                                                    type: 'warning',
                                                                    message: 'Hey!!  Seems staff Salary has been scheduled for the month selected.',
                                                                    autohideDelay: 5000
                                                                });
                                                                $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');

                                                    }else
                                                    {
                                                              $.wnoty({
                                                                    type: 'success',
                                                                    message: 'Hey!!  Staff salary scheduled successufully.',
                                                                    autohideDelay: 5000
                                                                });
                                                                $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');



                                                                abba_get_wallet_details();
                                                               

                                                                
                                                                prosloadpayementtypecontenthereschedule();  
                                                                prosloaloadsceulesalaryherehistory();
                                                               

                                                    }

                                                      

                                                }
                                 });



                    
                }

        }

     

        
});







//PROS PAYEMENT TYPE AREA CONTENT HERE INSTANT PAYMENT HERE




$(document).ready(function() {
    // Get the current date
    var currentDate = new Date();

    // Format the date as YYYY-MM
    var formattedDate = currentDate.toISOString().slice(0, 7);

    // Set the formatted date as the value of the date input field
    $('.prosstartamountmonth_instantpayment').val(formattedDate);

    // Debugging: Display the formatted date in the console
   
});



$('body').on('change', '.prosgeneralpaymenttypecheck', function() {
    prosloadpayementtypecontenthere();    
});


$('body').on('change', '.prosgeneralpaymenttypecheck_schedule', function() {
    prosloadpayementtypecontenthereschedule();    
});



$('body').on('click', '.prospaysalrymodalbtn', function() {
    
    prosloadpayementtypecontenthere();   
    prosloadpayementtypecontenthereschedule();  
    
      prosloadstaffconforsalary();
      prosloadexamloadsaryforshedule();
    
    
});









function prosloadpayementtypecontenthere()
{
      

    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';
    var proscheckedpayementtype = $('.prosgeneralpaymenttypecheck:checked').val();


    $('.prosloadcontenttypeinstant').html('<span class="fa fa-spinner fa-spin"></span>');


    
        $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros-loadpayementtypecontent.php",
                data: {
                    UserID:UserID,
                    UserType:UserType,
                    proscheckedpayementtype:proscheckedpayementtype
                },
                success: function(output) {


                            $('.prosloadcontenttypeinstant').html(output);
                            
                           
                }
        });



}






function prosloadpayementtypecontenthereschedule()
{
      

    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';
    var proscheckedpayementtype = $('.prosgeneralpaymenttypecheck_schedule:checked').val();
   
  

    $('.prosloadcontenttypeinstant_schedule').html('<i class="fa fa-spinner fa-spin"></i>');

            
    
        $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros-loadpayementtypecontentsche.php",
                data: {
                    UserID:UserID,
                    UserType:UserType,
                    proscheckedpayementtype:proscheckedpayementtype
                },
                success: function(output) {

                    
                            $('.prosloadcontenttypeinstant_schedule').html(output);
                }
        });



}







$(document).ready(function() {
  prosloastaffsallryamount();
  prosloaloadsceulesalaryherehistory()
});


 




// PROS LOAD SALARY CONTENT
function prosloastaffsallryamount()
{

                var UserID = '<?php echo $UserID; ?>';
                var UserType = '<?php echo $userType; ?>';




               
                  $('.prosloastaff_salary_forpayroll').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            
    
                    $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/wallet/pros-staffsalarypayroll.php",
                            data: {
                                UserID:UserID,
                                UserType:UserType
                            
                            },
                            success: function(output) {
                                  
                                $('.prosloastaff_salary_forpayroll').html(output);
                                
                            }
                    });



                // alert(UserID);
        
}
// PROS LOAD SALARY CONTENT



//PROS LOAD STAFF SCHEDULED SALARY

function prosloaloadsceulesalaryherehistory()
{
                var UserID = '<?php echo $UserID; ?>';
                var UserType = '<?php echo $userType; ?>';



                $('.prosloastaff_scheule_salaryhistory').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

            
    
                $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/wallet/pros-salaryschedulehistory-salarypayroll.php",
                        data: {
                            UserID:UserID,
                            UserType:UserType
                        
                        },
                        success: function(output) {
                          
                            
                            $('.prosloastaff_scheule_salaryhistory').html(output);
                            
                        }
                });



                
}


//PROS LOAD STAFF SCHEDULED SALARY




        $('body').on('click', '.prosloaddelet_submit_deletescheuled', function() {

                  var scheuledID = $(this).data('id');
                    $('.prosloadschedduleid_for_del').val(scheuledID);
        });



        $('body').on('click', '.prosdelete_schedulebtnall_btn', function() {


            $('.prosdelete_schedulebtnall_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Deleting...</span>');

             var scheduleID =  $('.prosloadschedduleid_for_del').val();

                var UserID = '<?php echo $UserID; ?>';
                var UserType = '<?php echo $userType; ?>';


                $('.prosdelete_schedulebtnall_btn').prop('disabled', true);
                
                $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/wallet/prosdelete_deletschedulesalry.php",
                        data: {
                            UserID:UserID,
                            UserType:UserType,
                            scheduleID:scheduleID
                        
                        },
                        success: function(output) {


                            $('.prosdelete_schedulebtnall_btn').html('Delete');
                            $('.prosdelete_schedulebtnall_btn').prop('disabled', false);


                             
                   
                  

                            if(output.trim() == '1')
                            {

                                            
                                    $.wnoty({
                                            type: 'success',
                                            message: 'Scheduled salary deleted successfully.',
                                            autohideDelay: 5000
                                       });

                                    prosloaloadsceulesalaryherehistory();


                            }else
                            {


                                           
                                   $.wnoty({
                                        type: 'warning',
                                        message: 'Scheduled salary failed to be deleted.',
                                        autohideDelay: 5000
                                    });

                            }
                            
                           
                            
                        }
                });


                

        });
        
        
        
        // PAY SALARY CONTENT HERE
        
        
        
         $(document).ready(function () {
              prosloadsalarycontenthere();
        });


      function prosloadsalarycontenthere()
      {
          
                var InstitutionID = $(".abba-change-institution option:selected").val();
                
                
                	
                
                 
                 
                 if(InstitutionID === 'NULL')
                 {
                     
                     
                      $('.prostaffforsalarysettings_payrol').html('<option value="NULL">Select institution at the header</option>');
                     
                     
                 }else
                 {
                     
                     
                      $('.prostaffforsalarysettings_payrol').html('<option value="NULL">loading..</option>');
                  
                      $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/wallet/prosloadstaffforset-salary.php",
                                data: {
                                   InstitutionID:InstitutionID
                                },
                                success: function(output) {
                
                
                                            $('.prostaffforsalarysettings_payrol').html(output);
                                            
                                           
                                }
                        });
    
                     
                 }
                
                
       
         
                    
      }
      
      
      
      $('body').on('change', '.prostaffforsalarysettings_payrol', function() {
          
          var InstitutionID = $(".abba-change-institution option:selected").val();
          var staffID = $(this).val();
          
          
          
         
          
           if(staffID == 'NULL')
             {
                 
                 
                  
                 
                 
             }else
             { 
                 
                 
               
                         $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/wallet/prosloadstaffslaryamunt.php",
                                data: {
                                  InstitutionID:InstitutionID,
                                  staffID:staffID
                                },
                                success: function(output) {
                                    
                                    
                                    var prosamount = parseInt(output);
                                    
                                    
                                   
                                     
                                    
                                    $('.staffsalaryamount_setpayroll').val(prosamount);

                                }
                        });
          
      
             }
          
          
          
          
      });
      
      
    // PROS LOAD SET SALARY CLICK
    
         $('body').on('click', '.prossetsalaryamountherebtn', function() {
             
             
             
                 var InstitutionID = $(".abba-change-institution option:selected").val();
                 var staffID = $('.prostaffforsalarysettings_payrol').val();
                 var prosAmount = $('.staffsalaryamount_setpayroll').val();
          
          
        
             if(staffID == 'NULL')
             {
                 
                 
                                    $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!! select staff to proceed.',
                                            autohideDelay: 5000
                                       });
                                       
                                       
                                        $('.prossetsalaryamountherebtn').html('Set Salary');
                                       
                 
                            
                 
             }else if(prosAmount == '')
             {
                  
              
              
                                  c
                                       
                                       $('.prossetsalaryamountherebtn').html('Set Salary');
              
                 
             }else
             {
                 
                 
                  
                  
                    $('.prossetsalaryamountherebtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">loading...</span>');
                    
                    
                     $.ajax({
                                type: "POST",
                                url: "../../controller/scripts/owner/wallet/prosetsalaryforstaff.php",
                                data: {
                                   InstitutionID:InstitutionID,
                                   staffID:staffID,
                                  prosAmount:prosAmount
                                },
                                success: function(output) {
                                    
                                    $('.prossetsalaryamountherebtn').html('Set Salary');
                                    
                                       if(output.trim() == '1')
                                       {
                                           
                                           
                                                    $.wnoty({
                                                        type: 'success',
                                                        message: 'Great!! salary set successfully.',
                                                        autohideDelay: 5000
                                                   });
                                           
                                       }else
                                       {
                                           
                                           
                                           
                                                  $.wnoty({
                                                        type: 'warning',
                                                        message: 'Failed!! salary set successfully.',
                                                        autohideDelay: 5000
                                                   });
                                           
                                       }
                                    
                                      
                                   

                                }
                        });
                    
                    
                    
             }
               
                
               
                
                
                
                
                
                
             
         });
      
      // PROS LOAD SET SALARY CLICK
      
      



        







</script>