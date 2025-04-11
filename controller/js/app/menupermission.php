<script>
    

    $(document).ready(function() {

        const optionMenu = document.querySelector(".select-menu"),
        selectBtn = optionMenu.querySelector(".select-btn"),
        options = optionMenu.querySelectorAll(".option"),
        sBtn_text = optionMenu.querySelector(".sBtn-text");

       

            $('body').on('click', '.select-btn', function() {
                optionMenu.classList.toggle("active")
            });



           $('#prosloadadmin-info').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
       

            var IntitutionID = localStorage.getItem("abba-stored-institution-id");
            var UserID = "<?php echo $UserID; ?>";

            $.ajax({
                type: "POST",
                url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-adminformenu-previledge.php",
                data: {
                    UserID: UserID,
                    IntitutionID: IntitutionID
                },
                cache: false,
                success: function(result) {

                    $('#prosloadadmin-info').html(result);

                }
            });


            

            

           // load permission menu here
            $('body').on('click', '.prosgeneraladmin-select', function(event) {
                       
                    var staffID = $(this).data('id');
                    var staffName = $(this).data('staff');


                    let selectedOption = $(this).find(".option-text").text();
                    sBtn_text.innerText = selectedOption;
                    optionMenu.classList.remove("active");
                   

                    $('#prosloadmessageforchoice').fadeOut('slow');

                    $('.prosloamenucontentready').fadeIn('slow');
                    $('#prosgetstaffIDinsert').val(staffID);
   
                    // $('.pros-loadpermission-menuhere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i>loading..</div>');

                    $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-loadmenuforpreveledge.php",
                        data: {
                            UserID: UserID,
                            IntitutionID: IntitutionID,
                            staffID:staffID
                        },
                        cache: false,
                        success: function(result) {
                               
                                  
                               if(result.trim() == 'notfound')
                               {
                                 
                               }else
                               {

                                
                                         var menuData = JSON.parse(result);
                                         
                                        

                                        // Loop through main menus
                                        for (var mainMenuId in menuData) {
                                               
                                            if (menuData.hasOwnProperty(mainMenuId)) {
                                                var submenus = menuData[mainMenuId];
                                                
                                                // Loop through submenus
                                                for (var i = 0; i < submenus.length; i++) {
                                                    var submenu = submenus[i];
                                                    var submenuId = submenu.submenu_id;
                                                    var prosMenuperStatus = submenu.pros_menuper_status;
                                                    
                                                    
                                                    
                                                    
                                                    console.log('Main Menu ID:', mainMenuId);
                                                    console.log('Submenu ID:', submenuId);
                                                    
                                                    // console.log('pros_menuper_status:', prosMenuperStatus);

                                                    for (var j = 0; j < prosMenuperStatus.length; j++) {
                                                        var status = prosMenuperStatus[j];
                                                          

                                                            if(status == '2')
                                                            {
                                                                $('#deletecheckbox'+submenuId).prop("checked", true);

                                                            }else if(status == '1')
                                                            {
                                                                $('#editcheckbox'+submenuId).prop("checked", true);

                                                            }else if(status == '3')
                                                            {
                                                                  
                                                                 $('#viewcheckbox'+submenuId).prop("checked", true);
                                                            }
                                                            
                                                            
                                                            

                                                    }
                                                    
                                                    // Use the data as needed...
                                                }
                                            }
                                        }

                               }
                            
                            // $('.pros-loadpermission-menuhere').html(result);

                        }
                    });
                    

                  
            });

    });


  //SELECT ALL FETATURES HERE
    $('body').on('change', '.pros-generalcheckedallfeatures', function(event) {
        
            if ($('.pros-generalcheckedallfeatures:checked').length === $('.pros-generalcheckedallfeatures').length) {

                    $(".pros-selectall-mainmenuhere").prop('checked', true);

                    $(".prosgeneralselpreviledgestatus").prop('checked', true);

                    
            } else {

                $(".pros-selectall-mainmenuhere").prop('checked', false);
            }
    });//SELECT ALL FETATURES HERE





    //SELECT ALL IN MAIN MENU
    $('body').on('change', '.pros-selectall-mainmenuhere', function(event) {

        var mainmenuID = $(this).data('id');

       
        if ($('.proscheckedmenu'+mainmenuID+':checked').length === $('.proscheckedmenu'+mainmenuID).length) {

            $(".proscheckedallmenupreviledge"+mainmenuID).prop('checked', true);

        } else {

            $(".proscheckedmenu"+mainmenuID).prop('checked', false); // Corrected class name here
        }
   });
   //SELECT ALL IN MAIN MENU
   




   $('body').on('click', '.pros-submitpermissionbtn', function(event) {

        var IntitutionID = localStorage.getItem("abba-stored-institution-id");
        var UserID = "<?php echo $UserID; ?>";
        var staffID = $('#prosgetstaffIDinsert').val();
        
       
         var main_menuarr = [];
         var mainmenuID = {};

        $.each($(".prosloadmaimmenugeneral"), function () {

            var mainMenuId = $(this).data('id');
            mainmenuID[mainMenuId] = [];
            main_menuarr.push(mainMenuId);

            var submenuarr = [];

            $.each($(".prosgeneralsubmenuchecked" + mainMenuId), function () {

                var subMenuId = $(this).data('id');
                var submenuObject = {
                    submenu_id: subMenuId,
                    pros_menuper_status: [] // Initialize an empty array to store pros_menuper_status values
                };

                // Nested $.each loop to extract pros_menuper_status values
                $.each($(this).find('.prosgeneralselpreviledgestatus:checked'), function () {
                    var status = $(this).val();
                    submenuObject.pros_menuper_status.push(status);
                });

                submenuarr.push(submenuObject);
            });

            mainmenuID[mainMenuId] = submenuarr;
        });

           var mainmenuIDJson = JSON.stringify(mainmenuID);

       

                 $.ajax({
                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insertadminpermision.php",
                        data:{
                            mainmenuIDJson:mainmenuIDJson,
                            IntitutionID:IntitutionID,
                            staffID:staffID,
                            UserID:UserID
                        },
                        cache: false,
                        success: function(result) {

                            if(result.trim() == 'success')
                            {


                                 $.wnoty({
                                        type: 'success',
                                        message: "Great!! permission granted successfully.",
                                        autohideDelay: 5000
                                    });  
                                    
                                    
                            }else
                            {

                                $.wnoty({
                                        type: 'error',
                                        message: "Hey!! menu permission failed.",
                                        autohideDelay: 5000
                                    });  
                                    

                            }
                                
                            // $('.pros-loadpermission-menuhere').html(result);

                        }
                    });
       
                
   });




   




  



    // var mainmenuID = [];
    //         $.each($(".pros-mainmenugeneralclass:checked"), function() {

    //             main_menuarr.push($(this).data('id'));
    //             var miancampus = $(this).data('id');

    //             var submenuarr = [];
    //             //loop through submenu here
    //             $.each($(".prossubmenuclass" + miancampus + ":checked"), function() {
    //                 submenuarr.push($(this).val());
    //                 submenuarr.push($(this).data('pros-menuper-status'));


    //             });
    //             //loop through submenu 
    //             main_menuarr.push(submenuarr);

    //         });




</script>