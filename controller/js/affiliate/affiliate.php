<script>

    $(document).ready(function(){

        loadAffiliates();

    });

    // Search Functionality
    $(document).ready(function(){

        $('#searchInput').on('keyup', function(){

            var keyword = $(this).val().toLowerCase();

            $('.affiliate-card').filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
            });
        });

    });

    // Affiliate Filter
    $('body').on('change', '#aff_level', function(){

        loadAffiliates();

    });



    // Affiliate Session
    $('body').on('change', '.abba-change-session', function(){

        loadAffiliates();

    });



    // Affiliate Term
    $('body').on('change', '.abba-change-term', function(){

        loadAffiliates();

    });

    // Load Affiliate Function
    function loadAffiliates(){

        var aff_level = $('#aff_level option:selected').val();

        var session = $('.abba-change-session option:selected').val();

        var term = $('.abba-change-term option:selected').val();

        var user_id = "<?php echo $UserID; ?>";

        $('#display_affiliates').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

        $('#f_l_aff_no').html('<i class="fas fa-spinner fa-spin" style="color:#007ffb;"></i>');
        $('#s_l_aff_no').html('<i class="fas fa-spinner fa-spin" style="color:#007ffb;"></i>');
        $('#f_l_aff_earn').html('<i class="fas fa-spinner fa-spin" style="color:#007ffb;"></i>');
        $('#s_l_aff_earn').html('<i class="fas fa-spinner fa-spin" style="color:#007ffb;"></i>');

        $.ajax({
            url:'../../controller/scripts/affiliate/affiliate/affiliates.php',
            type:'POST',
            data:{"user_id":user_id, "aff_level":aff_level, "session":session, "term":term},
            success:function(data){

                $("#display_affiliates").html(data);

                var f_l_aff_no_input = $('#aff_db_amt').val();
                var s_l_aff_no_input = $('#sub_db_amt').val();
                var f_l_aff_earn_input = $('#aff_db_earn').val();
                var s_l_aff_earn_input = $('#sub_db_earn').val();

                $('#f_l_aff_no').html(f_l_aff_no_input);
                $('#s_l_aff_no').html(s_l_aff_no_input);
                $('#f_l_aff_earn').html(f_l_aff_earn_input);
                $('#s_l_aff_earn').html(s_l_aff_earn_input);

            }
        });

    }

</script>