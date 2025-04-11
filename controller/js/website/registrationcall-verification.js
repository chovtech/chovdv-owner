
                // sign up verification
                $('body').on('click','#verifymailbtn',function(){
                    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>verifying');
                       var UserID = '<?php  echo $uid; ?>';
                       var valueone = $('#idone').val();
                       var valuetwo = $('#idtwo').val();
                       var valuethree = $('#idthree').val();
                       var valuefour = $('#idfour').val();
                       var valuefive = $('#idfive').val();
                       var totaltoken = valueone+valuetwo+valuethree+valuefour+valuefive;
                       
                       if(totaltoken == '')
                       {
                         $('#verifymailbtn').html('Verify Code');  
                       }else
                       {
                           
    
                      
                          $.ajax({
                              type : 'post',
                              url : '../controller/scripts/edumesweb/verifycode.php', //Here you will fetch records 
                              data : {totaltoken:totaltoken,UserID:UserID}, //Pass $id
                              success : function(data)
                              {
                                  $('#verifymailbtn').html('Proceed');

                                  var userrole = (data);
                                if(userrole == 'owner')
                                 {
                                     $(this).html("Login");
                                     $(this).prop("disabled", false);
                                     $(this).html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                        window.location.href = "../app/school/";
                                 }else{
                                    $('#pwmatcherr').html(data);//Show fetched data from database 
                                 }
                              }
                              
                          });
                          
                       }
                              
               });
               
              
    
                   $('body').on('click','#resendbtn',function(){
                  //   $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>verifying');
                       var UserID = '<?php  echo $uid; ?>';
                       
                          $.ajax({
                              type : 'post',
                              url : '../controller/scripts/edumesweb/resendcode.php', //Here you will fetch records 
                              data : {UserID:UserID}, //Pass $id
                              success : function(data)
                              {
                                
                                  // $('#pwmatcherr').html(data);//Show fetched data from database
                                  // $('#verifymailbtn').html('Proceed');
                                  
                                  $('#idone').val('');
                                  $('#idtwo').val('');
                                  $('#idthree').val('');
                                  $('#idfour').val('');
                                  $('#idfive').val('');
                                 location.reload()
                              }
                              
                          });
                              
               });
    
                               // sign up verification