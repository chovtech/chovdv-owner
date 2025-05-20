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



    // Affiliate trans_type
    $('body').on('change', '#trans_type', function(){

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

        var trans_type = $('#trans_type option:selected').val();

        var user_id = "<?php echo $UserID; ?>";

        $('.display_transactions').html('<div class="justify-content-center"> <i class="fas fa-spinner fa-spin fs-5" style="color:#007ffb;"></i></div>');

        $('#f_l_aff_earn').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');
        $('#s_l_aff_earn').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');
        $('#aff_earn_l1_input').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');
        $('#aff_earn_l2_input').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');
        $('#aff_earn_l0_input').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');

        $.ajax({
            url:'../../controller/scripts/affiliate/transactions/transaction.php',
            type:'POST',
            data:{"user_id":user_id, "aff_level":aff_level, "session":session, "term":term, "trans_type":trans_type},
            success:function(data){

                $(".display_transactions").html(data);

                var f_l_aff_earn_input = $('#credit').val();
                var s_l_aff_earn_input = $('#debit').val();
                var aff_earn_l1_input = $('#aff_earn_l1').val();
                var aff_earn_l2_input = $('#aff_earn_l2').val();
                var aff_earn_l0_input = $('#aff_earn_l0').val();
                
                $('#f_l_aff_earn').html(f_l_aff_earn_input);
                $('#s_l_aff_earn').html(s_l_aff_earn_input);
                $('#aff_earn_l1_input').html(aff_earn_l1_input);
                $('#aff_earn_l2_input').html(aff_earn_l2_input);
                $('#aff_earn_l0_input').html(aff_earn_l0_input);

            }
        });

    }
    
    
    $('body').on('click', '.view_details_btn', function(){
        
        var affname = $(this).data('affname');
        var lvl = $(this).data('lvl');
        var term = $(this).data('term');
        var session = $(this).data('session');
        var ref = $(this).data('ref');
        var amt = $(this).data('amt');
        var status = $(this).data('status');
        var date = $(this).data('date');
        
        if(lvl == '0' || lvl == '' || lvl == 0)
        {
            $('#earning_type').html('Direct');
            $('#affiliate_name').html('NIL');
            $('#affiliate_type').html('NIL');
        }
        else
        {
            $('#earning_type').html('Affiliate');
            $('#affiliate_name').html(affname);
            $('#affiliate_type').html('Level '+lvl+' Affiliate');
        }
        
        if(status == 'CREDIT')
        {
            $('#trans_status').html('<span class="text-success">'+status+'</span>');
            
            $('.debit_hide').show();
        }
        else
        {
            $('#trans_status').html('<span class="text-danger">'+status+'</span>');
            
            $('.debit_hide').hide();
        }
        
        
        $('#reference').html(ref);
        
        $('#earn_amount').html(amt);
        
        $('#trans_session').html(session);
        $('#trans_term').html(term);
        $('#trans_date').html(date);
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("transactionSearch");
        const rows = document.querySelectorAll(".display_transactions tr:not(#noRecordsRow)");
        const noRecordsRow = document.getElementById("noRecordsRow");
    
        searchInput.addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;
    
            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                const isVisible = rowText.includes(searchTerm);
                row.style.display = isVisible ? "" : "none";
                if (isVisible) visibleCount++;
            });
    
            // Show or hide "No records found"
            noRecordsRow.style.display = visibleCount === 0 ? "" : "none";
        });
    });
</script>