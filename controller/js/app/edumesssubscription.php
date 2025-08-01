<script>
        $(document).ready(function(){
            
            // alert('helo');
            startcountfeedownnow();
            
            
            var checkallinstitution_pyment =   $('#selalinstitutionamount').each(function(){ this.checked = true; });
          
                 $(".getinstitutionsingle").each(function(){ this.checked = true; });
                 
                        $("#paytermlyid").each(function(){ this.checked = true; });
                        $('.getinstitutionsingle').prop('disabled', true);
                        $('#selalinstitutionamount').prop('disabled', true);
                        $('#discountedamount').fadeOut();
                        $('#discountamountid').fadeOut();
                                var amount_total = [];
                                $.each($('.getinstitutionsingle:checked'),function(){
                                    amount_total.push($(this).data('id'));
                                });
                            
                            var total = 0;
                            for (var i in amount_total) {
                            total += amount_total[i];
                            let grandtotal = total.toLocaleString("en-US");
                                  $('#displaybtnamount').html(grandtotal);
                                  $("#displaybtnamount").fadeIn('slow'); 
                                  $('#displayamount').html(grandtotal);
                                  $("#displayamount").fadeIn('slow'); 
                                  $("#displayamount_summarry").html('₦'+grandtotal); 
                                  
                               
                            }          
            
                // });

          
        
        
        
        });
        
        
        
        
        
        
        $('body').on('change','#selalinstitutionamount',function(){
              var checkallinstitution_pyment = $(this).prop('checked'); 
              var paymentmethod = $("input[type='radio'].paymentmethod:checked").val();
                if(checkallinstitution_pyment == true)
                {
                      $(".getinstitutionsingle").prop('checked',$(this).prop('checked')); 
                        var paymentmethod = $("input[type='radio'].paymentmethod:checked").val();

                          var amount_total = [];
                        var percentageset = [];
                            $.each($('.getinstitutionsingle:checked'),function(){
                                amount_total.push($(this).data('id'));
                                percentageset.push($(this).data('percent'));
                               
                            });
                          
                          var total = 0;
                        //    var percentset = 0;
                            for (var i in amount_total) {
                            total += amount_total[i];
                             
                              percentset = percentageset[i];
                            
                                     if(paymentmethod == 'Annually')
                                    {
                                        let totalamount =  total * 3;
                                             
                                        var percentage = (percentset / 100) * totalamount;
                                        var newamount = totalamount - percentage;
                                       
                                        let percentecntage = percentage.toLocaleString("en-US");
                                        let newamountotal = newamount.toLocaleString("en-US");
                                        let total_amount = totalamount.toLocaleString("en-US");
                                        $('#discountedamount').fadeIn('slow');
                                        $("#discountamountid").fadeIn('slow'); 
                                        $('#discountedamount').html('₦ '+total_amount);
                                        $('#discountamountid').html('('+percentset+'%OFF)');
                                        $('#displaybtnamount').html(newamountotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(newamountotal);
                                        $("#displayamount").fadeIn('slow'); 
                                        
                                    }else
                                    {
                                        let grandtotal = total.toLocaleString("en-US");
                                           
                                          $('#discountedamount').fadeOut(); 
                                          $('#discountamountid').fadeOut(); 
                                          $('#displaybtnamount').html(grandtotal);
                                         $("#displaybtnamount").fadeIn('slow'); 
                                         $('#displayamount').html(grandtotal);
                                         $("#displayamount").fadeIn('slow'); 
                                    }
                               
                             
                               
                            }
                }else if(checkallinstitution_pyment == false)
                {
                    $(".getinstitutionsingle").prop('checked', false); 
                    $('#displaybtnamount').html(0);
                    $("#displaybtnamount").fadeIn('slow');
                    $('#displayamount').html(0);
                    $("#displayamount").fadeIn('slow');
                    $('#discountedamount').fadeOut(); 
                    $('#discountamountid').fadeOut(); 
}
          });


          
          $('body').on('change','.getinstitutionsingle',function(){
             var paymentmethod = $("input[type='radio'].paymentmethod:checked").val();
                if($('.getinstitutionsingle:checked').length == $('.getinstitutionsingle').length)
                {
                    $("#selalinstitutionamount").each(function(){ this.checked = true; });
                    $('#selectAllStudent').prop('checked',true);
                    var selTotalSingle=parseInt($('.getinstitutionsingle:checked').length);
                     
                    if(selTotalSingle > 0)
                    {
                        var amount_total = [];
                        var percentageset = [];
                            $.each($('.getinstitutionsingle:checked'),function(){
                                amount_total.push($(this).data('id'));
                                percentageset.push($(this).data('percent'));
                               
                            });
                          
                          var total = 0;
                        //    var percentset = 0;
                            for (var i in amount_total) {
                            total += amount_total[i];
                             
                              percentset = percentageset[i];
                            
                                     if(paymentmethod == 'Annually')
                                    {
                                        let totalamount =  total * 3;
                                             
                                        var percentage = (percentset / 100) * totalamount;
                                        var newamount = totalamount - percentage;
                                       
                                        let percentecntage = percentage.toLocaleString("en-US");
                                        let newamountotal = newamount.toLocaleString("en-US");
                                        let total_amount = totalamount.toLocaleString("en-US");
                                        $('#discountedamount').fadeIn('slow');
                                        $("#discountamountid").fadeIn('slow'); 
                                        $('#discountedamount').html('₦ '+total_amount);
                                        $('#discountamountid').html('('+percentset+'%OFF)');
                                        $('#displaybtnamount').html(newamountotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(newamountotal);
                                        $("#displayamount").fadeIn('slow'); 
                                    }else
                                    {
                                        let grandtotal = total.toLocaleString("en-US");
                                           
                                      $('#discountedamount').fadeOut(); 
                                      $('#discountamountid').fadeOut(); 
                                      $('#displaybtnamount').html(grandtotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(grandtotal);
                                        $("#displayamount").fadeIn('slow'); 
                                    }
                               
                               
                            }        
                    }else
                    {
                                  $('#displaybtnamount').html(0);
                                  $('#displayamount').html(0);
                                  $("#displaybtnamount").fadeIn('slow'); 
                                  $("#displayamount").fadeIn('slow'); 
                                  $('#discountedamount').fadeOut(); 
                                    $('#discountamountid').fadeOut();
                                     
                    }
                 
                }else if($('.getinstitutionsingle:checked').length != $('.getinstitutionsingle').length)
                {
                    $("#selalinstitutionamount").each(function(){ this.checked = false; });
                    // $('#selectAllStudent').prop('checked',false);
                    var selecTotalSingle = parseInt($('.getinstitutionsingle:checked').length);
                   
                    if(selecTotalSingle > 0)
                     { 

                        var amount_total = [];
                        var percentageset = [];
                            $.each($('.getinstitutionsingle:checked'),function(){
                                amount_total.push($(this).data('id'));
                                percentageset.push($(this).data('percent'));
                               
                            });
                          
                          var total = 0;
                        //    var percentset = 0;
                            for (var i in amount_total) {
                            total += amount_total[i];
                             
                              percentset = percentageset[i];
                            
                                     if(paymentmethod == 'Annually')
                                    {
                                        let totalamount =  total * 3;
                                             
                                        var percentage = (percentset / 100) * totalamount;
                                        var newamount = totalamount - percentage;
                                       
                                        let percentecntage = percentage.toLocaleString("en-US");
                                        let newamountotal = newamount.toLocaleString("en-US");
                                        let total_amount = totalamount.toLocaleString("en-US");
                                        $('#discountedamount').fadeIn('slow');
                                        $("#discountamountid").fadeIn('slow'); 
                                        $('#discountedamount').html('₦ '+total_amount);
                                        $('#discountamountid').html('('+percentset+'%OFF)');
                                        $('#displaybtnamount').html(newamountotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(newamountotal);
                                        $("#displayamount").fadeIn('slow'); 
                                        
                                    }else
                                    {
                                        let grandtotal = total.toLocaleString("en-US");
                                           
                                      $('#discountedamount').fadeOut(); 
                                      $('#discountamountid').fadeOut(); 
                                      $('#displaybtnamount').html(grandtotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(grandtotal);
                                        $("#displayamount").fadeIn('slow'); 
                                    } 
                               
                            }      
                        
                     }else{
                                $('#displaybtnamount').html(0);
                                  $("#displaybtnamount").fadeIn('slow'); 
                                  $('#displayamount').html(0)
                                  $("#displayamount").fadeIn('slow');
                                  $('#discountedamount').fadeOut(); 
                                    $('#discountamountid').fadeOut(); 
                                
                     }

                }
          });

            $('body').on('change','.paymentmethod',function(){
                     var paymentmethod = $("input[type='radio'].paymentmethod:checked").val();

                        var amount_total = [];
                        var percentageset = [];
                            $.each($('.getinstitutionsingle:checked'),function(){
                                amount_total.push($(this).data('id'));
                                percentageset.push($(this).data('percent'));
                               
                            });
                          
                          var total = 0;
                            for (var i in amount_total) {
                            total += amount_total[i];
                             
                            percentset = percentageset[i];
                            
                                     if(paymentmethod == 'Annually')
                                    {
                                        let totalamount =  total * 3;
                                             
                                        var percentage = (percentset / 100) * totalamount;
                                        var newamount = totalamount - percentage;
                                       
                                        let percentecntage = percentage.toLocaleString("en-US");
                                        let newamountotal = newamount.toLocaleString("en-US");
                                        let total_amount = totalamount.toLocaleString("en-US");
                                        $('#discountedamount').fadeIn('slow');
                                        $("#discountamountid").fadeIn('slow'); 
                                        $('#discountedamount').html('₦ '+total_amount);
                                        $('#discountamountid').html('('+percentset+'%OFF)');
                                        $('#displaybtnamount').html(newamountotal);
                                        $("#displaybtnamount").fadeIn('slow'); 
                                        $('#displayamount').html(newamountotal);
                                        $("#displayamount").fadeIn('slow'); 
                                        
                                        
                                    }else
                                    {
                                       
                                        let grandtotal =  total.toLocaleString("en-US");
                                           
                                      $('#discountedamount').fadeOut(); 
                                      $('#discountamountid').fadeOut(); 
                                      $('#displayamount').html(grandtotal);
                                      $('#displaybtnamount').html(grandtotal);
                                    }
                            }    
                          
            });
            
            
            
            
            
            
            
                  function makePayment() {
                                 $('.paymentbtn').html('processing...<i class="fa fa-spinner fa-spin"></i>');

                                var selInstitution =[];
                                var InstitutionAmount =[];
                                var Institutionpercentage =[];
                                var planid =[];
                                
                                $('.getinstitutionsingle').each( function() {
                                    if($(this).is(':checked')) {
                                        selInstitution.push($(this).val());
                                        InstitutionAmount.push($(this).data('id'));
                                        Institutionpercentage.push($(this).data('percent'));
                                        planid.push($(this).data('plan'));
                                        
                                    }
                                });
                               
                               
                             let Institutionlength =  selInstitution.length;
                              var paymentmethod = $("input[type='radio'].paymentmethod:checked").val();
                              var session = '<?php echo $session_startcount; ?>';
                              var term = '<?php echo $termorsemesterdebt; ?>';
                              var email = '<?php echo $Email; ?>';
                              var name = '<?php echo $PrimaryName; ?>';
                               var userID = '<?php echo $UserID; ?>';
                              
                              
                             
      
                                var d = new Date();
                                var n = d.getTime();
                                var p = Math.floor((Math.random() * 100) + 1);
                                var referencenumber = "RX" + n + "-" + p;

                             var total = 0;
                            for (var i in InstitutionAmount) {
                                
                                 total += InstitutionAmount[i];
                                  percentset = Institutionpercentage[i];
                            
                                     if(paymentmethod == 'Annually')
                                    {
                                        let totalamount =  total * 3;
                                        var percentage = (percentset / 100) * totalamount;
                                        var newamount = totalamount - percentage;
                                        // let grandTotal = newamount.toLocaleString("en-US");
                                       
                                        $('#inputamoutval').val(newamount);
                                        // let total_amount = totalamount.toLocaleString("en-US");
                                    }else if(paymentmethod == 'Termly')
                                    {
                                        //  let grandTotal =  total.toLocaleString("en-US");
                                         $('#inputamoutval').val(total);
                                    }else{
                                        
                                        
                                                       $.wnoty({
                                                        type: 'warning',
                                                        message: "Hey!! Select A plan",
                                                        autohideDelay: 5000
                                                    });
                                                                        
                                        
                                             
                                    }
                            }
                                //  var  =  parseInt($('#inputamoutval').val()); 

                                 var chargeFee = '<?php echo $charge; ?>';
                                 var totalFeeold = (chargeFee / 100) * parseFloat($('#inputamoutval').val());
                                //   alert(totalFeeold);
                                 
                                       
                                if(totalFeeold > 2000)
                                {
                                       var totalFee = parseFloat($('#inputamoutval').val()) + 700;
                                }
                                else
                                {
                                    var totalFee = (chargeFee / 100) * parseFloat($('#inputamoutval').val()) +  parseFloat($('#inputamoutval').val());
                                }
                                //  alert(totalFee);
                                
                                var overalltotalamount = parseFloat(totalFee)+50;
                                
                                
                               
                              
                               
                               
                              
                            
                           
                                 
                                 
                                    if(Institutionlength == '0')
                                    {
                                        
                                        
                                                       $.wnoty({
                                                        type: 'warning',
                                                        message: "Hey!! Select Institution Before Proceeding!",
                                                        autohideDelay: 5000
                                                    });
                                        
                                        
                                       
                                        $('.paymentbtn').html('Pay ' + '₦' + 0);  
                                    }else
                                    {
                                         
                                        $('.paymentbtn').prop('disabled', true); 
                                        
                                        MonnifySDK.initialize({
                                            amount:overalltotalamount,
                                            currency: "NGN",
                                            reference: new String((new Date()).getTime()),
                                            customerFullName: name,
                                            customerEmail:email,
                                            apiKey: "<?php echo $MonnifyLivePaymentApi; ?>",
                                            contractCode: "<?php echo $MonnifyLiveContractCode; ?>",
                                            paymentDescription: "Subscription Fee",
                                    
                                            onLoadStart: () => {
                                                console.log("loading has started");
                                            },
                                            onLoadComplete: () => {
                                                console.log("SDK is UP");
                                            },

                                            onComplete: function(response) {
                                                //Implement what happens when the transaction is completed.
                                                console.log(response);
                                              
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "../../controller/scripts/owner/edumessssubscription/process_subscription.php",
                                                        data: {
                                                            
                                                             userID:userID,
                                                             total:total,
                                                             session:session,
                                                             paymentmethod:paymentmethod,
                                                             term:term
                                                         },
                                                        cache: false,
                                                        success: function(result){
                                                            
                                                            $('.paymentbtn').prop('disabled', false);
                                                            
                                                            if(result.trim() == 'success')
                                                            {
                                                                
                                                                
                                                                 $.wnoty({
                                                                    type: 'success',
                                                                    message: "Great!! Payment submitted successfully!",
                                                                    autohideDelay: 5000
                                                                  });
                                                                  
                                                                     $('#prosloadcountdowncontent').fadeOut('slow');
                                                                       $('#profeepaymentmodal').modal('hide');
                                                                     
                                                                
                                                                
                                                            }else
                                                            {
                                                                
                                                                 $.wnoty({
                                                                    type: 'failed',
                                                                    message: "Failed!! Payment could not be  made successfully!",
                                                                    autohideDelay: 5000
                                                                  });
                                                                
                                                            }
                                                            
                                                             
                                                            
                                                                       
                                                        
                                                             
                                                        }
                                                    });
                                                    
                                                    
                                            },
                                            onClose: function(data) {
                                                //Implement what should happen when the modal is closed here
                                                    var inputamount =  parseInt($('#inputamoutval').val());
                                                    let amountformat =  inputamount.toLocaleString("en-US");
                                                    $('.paymentbtn').prop('disabled', false); 
                                                    $('.paymentbtn').html('PAY ₦<span id="displaybtnamount">'+amountformat+'</span> <span class="ms-3 fa fa-arrow-right">');
                                               
                                                       console.log(data);
                                            }
                                        });
                                    }
                               
                    }
            
            
            
            
            
            function startcountfeedownnow() {
                
                var userID = '<?php echo $UserID; ?>';
                
                var starttime = $('#prosloadstartdate').val();
                var endtime =  $('#prosloadenddate').val();
                  var prossubscriptionstatus =  $('#prossubscriptionstatus').val();
                
                

                // Convert the start and end times to JavaScript Date objects
                let startDate = new Date(starttime);
                let endDate = new Date(endtime);

                let dayBox = document.getElementById("day-box");
                let hrBox = document.getElementById("hr-box");
                let minBox = document.getElementById("min-box");
                let secBox = document.getElementById("sec-box");

                // Output value in milliseconds
                let endTime = endDate.getTime();

                function countdown() {
                    let todayDate = new Date();
                    // Output value in milliseconds
                    let todayTime = todayDate.getTime();

                    let remainingTime = endTime - todayTime;

                    // 60sec => 1000 milliseconds
                    let oneMin = 60 * 1000;
                    // 1hr => 60 minutes
                    let oneHr = 60 * oneMin;
                    // 1 day => 24 hours
                    let oneDay = 24 * oneHr;

                    // Function to format number if it is a single digit
                    let addZeroes = num => num < 10 ? `0${num}` : num;

                    // If end date is before today date
                    if (endTime < todayTime) {
                        clearInterval(i);

                        $('#prosloadcountdowncontent').fadeOut('slow');
                        
                        
                        if(prossubscriptionstatus == '0')
                        {
                            
                            
                            
                                 $.ajax({
                                        type: "POST",
                                        url: "../../controller/scripts/owner/edumessssubscription/updateinstitutionstatus.php",
                                        data: {
                                            
                                             userID:userID
                                             
                                         },
                                        cache: false,
                                        success: function(result){
                                         
                                             
                                        }
                                    });
                            
                        }else
                        {
                            
                        }
                        
                        
                        
                       
                        
                        
                        // document.querySelector(".countdown").innerHTML = `<h1>Countdown had expired!</h1>`;
                    }
                    // If end date is not before today date
                    else {
                        // $('#prosloadcountdowncontent').fadeIn('slow');
                        // Calculating remaining days, hrs, mins, secs
                        let daysLeft = Math.floor(remainingTime / oneDay);
                        let hrsLeft = Math.floor((remainingTime % oneDay) / oneHr);
                        let minsLeft = Math.floor((remainingTime % oneHr) / oneMin);
                        let secsLeft = Math.floor((remainingTime % oneMin) / 1000);

                        // Displaying Values
                        dayBox.textContent = addZeroes(daysLeft);
                        hrBox.textContent = addZeroes(hrsLeft);
                        minBox.textContent = addZeroes(minsLeft);
                        secBox.textContent = addZeroes(secsLeft);
                    }
                }

                let i = setInterval(countdown, 1000);
                countdown();
            }
            
            
            $('body').on('click', '.prosclionhidetimmercontentbtn', function () {
       
            
                  $('.prosloadcountdowncontentcontent').fadeOut();
            
            
            });
            
            
            
        
        
     </script>