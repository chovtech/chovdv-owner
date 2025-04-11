<script>

    // check local storage for default institution
    $(document).ready(function (){

        var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
        var abba_get_stored_instituion_name = localStorage.getItem("abba-stored-institution-name");
        var abba_get_stored_instituion_CustomUrl = localStorage.getItem("abba-stored-institution-CustomUrl");

        var abba_change_institution = $(".abba-change-institution option:selected").val()

        if (abba_get_stored_instituion_id == 0 || abba_get_stored_instituion_id == '' || abba_get_stored_instituion_id == null || abba_get_stored_instituion_id == 'undefined')
        {

            // Check if no option is selected (when the first disabled option is selected)
            if (abba_change_institution == '') {
                // Select the first option programmatically
                $(".abba-change-institution").val($(".abba-change-institution option:eq(1)").val());
            }
            else{
                // alert('not working');
            }

            var institution_id = $('.abba-change-institution option:selected').data('id');

            var institution_name = $('.abba-change-institution option:selected').text();

            var institution_url = $('.abba-change-institution option:selected').data('url');

            localStorage.setItem("abba-stored-institution-id", institution_id);
            localStorage.setItem("abba-stored-institution-name", institution_name);
            localStorage.setItem("abba-stored-institution-CustomUrl", institution_url);

            $('#text-to-copy').val('https://'+institution_url+'/parent-invite/parent-invite.php');

            // New WhatsApp URL
                var newURL = "whatsapp://send?text=https://"+institution_url+"/parent-invite/parent-invite.php";
            
            // Set the new href attribute of the link

            $("#abba_parent_invite_link").attr("href", newURL);

        }
        else {

            $('#text-to-copy').val('https://'+abba_get_stored_instituion_CustomUrl+'/parent-invite/parent-invite.php');

            // New WhatsApp URL
            var newURL = "whatsapp://send?text=https://"+abba_get_stored_instituion_CustomUrl+"/parent-invite/parent-invite.php";
                    
            // Set the new href attribute of the link

            $("#abba_parent_invite_link").attr("href", newURL);


            $('.abba-change-institution').val(abba_get_stored_instituion_id);

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

    });
</script>