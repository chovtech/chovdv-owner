<script>

          




            $(document).ready(function() {

                var fullURL = window.location.href;
                const urlParams = new URLSearchParams(window.location.search);


                var campusID = urlParams.get('camp');
                var IntitutionID = localStorage.getItem("abba-stored-institution-id");



                $('#prosloadtermaliashere').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
               


                $.ajax({
                    type: "POST",
                    url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-get-termalis-content-here.php",
                    data: { 
                            campusID:campusID,
                            IntitutionID:IntitutionID
                        },
                    success: function(result) {

                        $('#prosloadtermaliashere').html(result);

                    }
                }); //load sectiion content here   


                
              
            });





            $('body').on('click', '#pros-createsession-termbtn', function() {
                $(this).html('<div class="spinner-border spinner-border-sm" role="status"> <span class="sr-only"></span></div>creating...');
                    
                
                var fullURL = window.location.href;
                const urlParams = new URLSearchParams(window.location.search);


                var campusID = urlParams.get('camp');
                var IntitutionID = localStorage.getItem("abba-stored-institution-id");

                
                

                // var sessioname = $('.selcetsession-setup').val();

                var termID = [];
                var termnamealias = [];
                $('.pros-getterm-aliasvalue').each(function() {
                    termnamealias.push($(this).val());
                    termID.push($(this).data('id'));
                });


                var hasEmptyValue = termnamealias.some(function(value) {
                    return value.trim() === '';
                });


                 

                if (hasEmptyValue) {

                    $.wnoty({
                        type: 'warning',
                        message: "Hey!! check your alias name make sure none is left empty.",
                        autohideDelay: 5000
                    });

                    $('#pros-createsession-termbtn').html('Proceed');


                } else {

                    $('#pros-createsession-termbtn').prop('disabled',true);
                    termID = termID.toString();
                    termnamealias = termnamealias.toString();

                   

                    $.ajax({

                        type: "POST",
                        url: "<?php echo $defaultUrl; ?>/controller/scripts/owner/pros-insert-term-alias.php",
                        data: {

                            termID:termID,
                            termnamealias:termnamealias,
                            IntitutionID:IntitutionID,
                            campusID:campusID
                        },
                        success: function(feedback) {
                                       
                            $('#pros-createsession-termbtn').prop('disabled',false);
                            var pros_output = (feedback);
                            $('#pros-createsession-termbtn').html('Proceed');


                            if (pros_output.trim() === 'success') {

                                $.wnoty({
                                    type: 'success',
                                    message: "Great!! term  set successfully",
                                    autohideDelay: 5000
                                });

                            

                            }


                        }
                    });
                }

            });
            // create term end here


</script>