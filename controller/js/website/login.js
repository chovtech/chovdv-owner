  //log user in

  $('body').on('click','#signinbtn',function(){
        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        var uname = $('#signinemail').val();
        var pwd = $('#signinpassword').val();
        $(this).prop("disabled", true);
        $.ajax({
                    
            type : 'post',
            url : '../controller/login/proccessuserlogin.php', 
            data :  {uname:uname,pwd:pwd}, //Pass $id
            success : function(data)
            {
                $(this).prop("disabled", false);
                $(this).html("Verifying...<i class='fas fa-circle-notch fa-spin'></i>");
                var userrole = (data);

                

                 if(userrole == 'consultant'){
                    $(this).html("Login");
                    $(this).prop("disabled", false);
                    $(this).html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                    window.location.href = "../consultant/";
                }else if(userrole == 'owner')
                {
                    $(this).html("Login");
                    $(this).prop("disabled", false);
                    $(this).html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                    window.location.href = "../owner/";  
                }
            }

        });

     
});