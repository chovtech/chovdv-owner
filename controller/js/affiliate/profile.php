<script>

     
    $(document).ready(function() {
        
            const $image_crop = $('#prosloadimage').croppie({
                enableExif: false,
                viewport: {
                width:300,
                height:300,
                type:'square' //circle
                },
                boundary:{
                width:350,
                height:350
                }    
            });



        $('body').on('change', '.prosloadstaffimageonchage', function() {
            
            
            
            var reader = new FileReader();
            reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
            };
            reader.readAsDataURL(this.files[0]);
        
            $('#prosloadstaffimagemodal').modal('show');

        
        });


        $('.prosuploalogobtnhere').click(function(event){

                    $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                    }).then(function(response){

                    var AffiliateID = <?php echo $AffiliateID; ?>;
            


                $('#wizardPicturePreview').attr('src', response);
                $('.prosuploalogobtnhere').html('<i class="fa fa-spinner fa-pulse"></i>uploading');
                
                $.ajax({
                    url:'../../controller/scripts/affiliate/profiles/pros-upload_affiliate_image.php',
                    type:'POST',
                    data:{"image":response, "AffiliateID":AffiliateID,},
                    success:function(data){
                        
                        $('.prosuploalogobtnhere').html('Saved');
                        
                        $('#prosloadstaffimagemodal').modal('hide');
                        if(data.trim() == 'success')
                        {
                            $('.posloadimagecontentforall').attr('src', response);
                            $('.pros_load_header_image').attr('src', response);
                            

                                
                                $.wnoty({
                                    type: 'success',
                                    message: 'Great!! image uploaded successfully.',
                                    autohideDelay: 3000, // 5 seconds
                                    position:'top-right',
                                    autohide:true
                                });
                            
                        }else{

                            }

                        
                        
                    }
                    });
                });
        });
    
    // Additional code or event handlers can go here
     });



     

    $(document).ready(function() {

        var staffnumbernew = window.intlTelInput(document.querySelector("#prosstaffnumberedit"), {
            separateDialCode: true,
            preferredCountries: ["ng"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });


        var StaffReligion = '<?php echo $rowGetUserDetails['Religion'] ; ?>';
        var staffstate = '<?php echo  $rowGetUserDetails['State'] ; ?>';
        var stafflga = '<?php echo  $rowGetUserDetails['LGA']; ?>';
        $('#pros_get_staff_religion').val(StaffReligion);


            // load state here
            var country = $('#country').val();
            var dataString = '&country=' + country;

            $('#pros-staffstate').html('<option value="0">Loading...</option>');
            //  load state
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/get-state-onboarding.php",
                data: dataString,
                success: function(result) {
                    $('#pros-staffstate').html(result);
                    $('#pros-staffstate').val(staffstate);


                    //  load lga
                    var dataString = '&state=' + staffstate;

                    $('#pros-lga').html('<option value="0">Loading...</option>');

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/get-local-govenrment-onboarding.php",
                        data: dataString,
                        success: function(result) {
                            $('#pros-lga').html(result);
                            $('#pros-lga').val(stafflga);


                        }
                    });
                    //  load lga


                }
            });

        // load state here

    });
        //pros submit staff contact info here




        
    // load sate on country change
    $('body').on('change', '#country', function() {
        var country = $(this).val();
        var dataString = '&country=' + country;

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/get-state-onboarding.php",
            data: dataString,
            success: function(result) {
                $('#pros-staffstate').html(result);
            }

        });

    });
    // load sate on country change



    // load lga on state change
    $('body').on('change', '#pros-staffstate', function() {
        var staffstate = $(this).val();
        var dataString = '&state=' + staffstate;

        $('#pros-lga').html('<option value="0">Loading...</option>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/get-local-govenrment-onboarding.php",
            data: dataString,
            success: function(result) {
                $('#pros-lga').html(result);
            }
        });
        //  load lga


    });
    // load lga on state change

</script>