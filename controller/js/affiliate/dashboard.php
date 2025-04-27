
<script>



        $(document).ready(function () {
            pros_load_dash_borard_content();
        });



        // $("body").on("click", ".toggle-visibility", function () {

        //         var abba_var = $(this).data('id');

        //         var $amount = $("#" + abba_var);
        //         var originalText = $amount.text();
        //         var data_amt_Text = $("#" + abba_var).data('amt');
        //         var hiddenText = "₦*****";

        //         if (originalText === hiddenText) {
        //             $amount.html(data_amt_Text);
        //             $("." + abba_var).html(data_amt_Text);
        //             $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        //         }
        //         else {
        //             $amount.html(hiddenText);
        //             $("." + abba_var).html(hiddenText);
        //             $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        //         }
        //  });

        // pros_load_dash_borard_content function
        function pros_load_dash_borard_content() {


                $('.pros_school_dashborad_content').html(`<div align="center">
                        <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                    </div>`);

                    $('#prosload_totalearnper_term').html(`
                        <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                   `);
                    
                    $('#prosload_total_affiliate').html(`<div align="center">
                        <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i>
                    </div>`);




                var user_id = $('#user_id').val();
                var user_type = $('#user_type').val();


                var crnt_session = $('#pros_load_crrnt_session_gen').val();
                var crnt_term = $('#pros_load_crrnt_term_gen').val();
       

                
               
                
                var session = $('.pros_load_session_general option:selected').val();
               
                // var term = $('#pros_load_term_basesession option:selected').val();

                $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/affiliate/dashboard/load_dashboard.php",
                    data: {
                        user_id: user_id,
                        user_type: user_type,
                        session: session,
                        crnt_session:crnt_session,
                        crnt_term:crnt_term
                        // term: term
                    },
                    success: function (data) {
                        

                    
                    
                        try {
                            var response = JSON.parse(data);

                            // Access values
                            var total_institutions = response.total_institutions;
                            var total_active_campuses = response.total_active_campuses;
                            var total_inactive_campuses = response.total_inactive_campuses;
                            var owner_cont = response.owner_cont;
                            var termly_amount = response.termly_amount;




                          
                            $('#prosload_totalearnper_term').html(`₦`+termly_amount);
                            $('#prosload_total_affiliate').html(3);



                              $('.pros_school_dashborad_content').html(`
                                        <div class="col-6">
                                            <h6 style="font-size: 12px; margin-top: 5px; margin-left: -80px; ">Total Schools</h6>
                                            <p></p>
                                            <h4 style="margin-left: -80px; ">${total_institutions}</h4>
                                            </div>

                                            <div class="col-6">
        
                                            
                                            <h6 style="font-size: 12px; color: #98ff7e;">Active Campuses</h6>
                                            <h6 style="color: #333333;">${total_active_campuses}</h6>
                                        
                                            
                                            <h6 style="font-size: 12px; color: #b4030c;">Inactive Campus</h6>
                                            <h6 style="color: #333333;">${total_inactive_campuses}</h6>
                                        </div> `);
                                               
                            // 'total_institutions' => mysqli_num_rows($institution_result),
                            // 'total_active_campuses' => $total_active_campus,
                            // 'total_inactive_campuses' => $total_inactive_campus,
                            // 'owner_cont' => $pros_row_cnt_owner,
                            // 'termly_amount' => $termly_amount,


                            // $('#abba_display_staff_summary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
                                            
                                    

                        } catch (error) {
                            console.error("Failed to parse JSON:", error);
                        }
                    }
                });


        }
   
</script>