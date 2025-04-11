//==========================Update Profile Info================================================
$('#profileBtn').on('click', function(e){
    $('#output').html(' ');
    $('#profileBtn').attr("disabled","disabled");	
   // $this.attr("disabled","disabled");
       $('#profileBtn').html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating...');

        //collect the values and make it a jquery value
        var fname = $("#fname").val();
        var sname = $("#sname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var waphoneno = $("#waphoneno").val();
        var address = $("#address").val();
        var AgencyOrSchoolOwnerID =  $("#AgencyOrSchoolOwnerID").val();
       
        //Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'fname='+ fname +  '&sname='+ sname + '&email='+ email + '&phone='+ phone + '&address='+ address + '&AgencyOrSchoolOwnerID='+ AgencyOrSchoolOwnerID + '&waphoneno=' + waphoneno;
		   
            $.ajax({
                type: "POST",
                url: "../controller/scripts/owner/update_profile.php",
                data: dataString,
                //cache: false,
                success: function(resultFromUpdate_Profile)
                {
                    $('#output').html(resultFromUpdate_Profile);

                    $('#profileBtn').html('Update Profile');
                    $('#profileBtn').removeAttr("disabled");						  				
                }
            });				
});

//==========================Update Profile Info================================================


//==========================Update Password================================================
                
                $(document).ready(function(){
				$("#passwordBtn").click(function(){
                
                $('#passwordBtn').attr("disabled","disabled");
                $('#passwordBtn').html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating...');

				
				//collect the values and make it a jquery value
					var oldPassword = $("#oldPassword").val();
                    var newPassword = $("#newPassword").val();

                    var passworddb = $("#passworddb").val();
                    var UserLoginID =  $("#UserLoginID").val();
                    
                    if(oldPassword == "" || newPassword == ""){
                          
                        alert('No filed can be empty. Thanks');
                        $('#passwordBtn').html('Update Password');
                        $('#passwordBtn').removeAttr("disabled");	
                    }
                    else
                    {
					// Returns successful data submission message when the entered information is stored in database.
					var dataString = 'UserLoginID='+ UserLoginID +  '&newPassword='+ newPassword + '&oldPassword='+ oldPassword + '&passworddb='+ passworddb;
					
					       // AJAX Code To Submit Form.
                            $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/update_password.php",
                            data: dataString,
                            cache: false,
                                success: function(result)
                                {
                                    $('#output').html(result);
                                    $('#passwordBtn').html('Update Password');
                                    $('#passwordBtn').removeAttr("disabled");					  				
                                }
                            }); 
				 
                    }

				});
				});


//==========================Update Password================================================