
    $(document).ready(function(){

    
            emmaloadautitorycontent();
                $('.emma-load-campuspostransaction').html('<option>Loading..</option>');
            
                var abba_get_stored_instituion_id = localStorage.getItem("abba-stored-institution-id");
               

                // // get campus ajax
                var dataString = 'abba_instituion_id=' + abba_get_stored_instituion_id;

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/abba-get-campus.php",
                    data: dataString,
                    success: function (output) {
                        $('.emma-load-campuspostransaction').html(output);
                        
                    }
                });
       

                $(".emma-load-campuspostransaction").change(function(){
                    var emma_campus_id = $(this).val();
                   

                    // var datastring = 'emma_campus_id=' + emma_campus_id;

                    $('#emma_filterterm_id').html('<option>Loading..</option>');
                 
                
                    $.ajax({

                        type:"POST",
                        url:"../../controller/scripts/owner/audit-trail/audit-trail2.php",
                        data: {emma_campus_id:emma_campus_id},
                        success: function (result){
                            $('#emma_filterterm_id').html(result);
                            
                        }
                    });



                });
                
                $('body').on('click', '.clicktoview-tablecollapse', function(){
                    var row = $(this).data('id');
                    $("#" + row).toggle();
                
                });

               


               
       
    });



    $(".emma-load-value-btn").click(function(){
        emmaloadautitorycontent();
    });





    function emmaloadautitorycontent(){

        var emma_institution_id = $(".abba-change-institution").val();
        var emma_campus_value = $(".emma-load-campuspostransaction").val();
        var emma_transaction_value = $(".emma-transactiontype").val();
        var emma_session_value = $("#emmagetsessiontransactionfileter").val();
        var emma_term_value = $("#emma_filterterm_id").val();
        var emma_tuitiontype_value = $(".emmatutionfeetuitiontype").val();
        var emma_datestart_value = $(".emmaload-start-date-transhistory").val();
        var emma_dateend_value = $('.emmaload-end-date-transhistory').val();

        var datastring = 'abba-change-institution=' + emma_institution_id +'&emma-load-campuspostransaction=' + emma_campus_value + '&emma-transactiontype=' + emma_transaction_value + '&emmagetsessiontransactionfileter=' + emma_session_value + '&emma_filterterm_id=' + emma_term_value + '&emmatutionfeetuitiontype=' + emma_tuitiontype_value + '&emmaload-start-date-transhistory=' + emma_datestart_value + '&emmaload-end-date-transhistory=' + emma_dateend_value;
        
        
        $(".emma-load-value-btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>')

        $(".emma-load-transaction-auditory").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>')
    
        $.ajax({
            type:"POST",
            url:"../../controller/scripts/owner/audit-trail/emma_insert_audit_trail_value.php",
            data:datastring,
            success:function(outcome){
                $(".emma-load-transaction-auditory").html(outcome);
                $(".emma-load-value-btn").html("Load");                               
                
                    // Initialize Second Table
                    $('#table2').DataTable({
                    responsive: true
                    });                           
            }

            
        })



    }
    


