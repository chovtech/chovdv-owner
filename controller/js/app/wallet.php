<script>

    $(document).ready(function () {

        var NIN = '<?php echo $NIN; ?>';

        var BVN = '<?php echo $BVN; ?>';
        
        if(NIN == '' || NIN == '0' || NIN == 'NULL' || BVN == '' || BVN == '0' || BVN == 'NULL')
        {
            $('#bin_nin_modal').modal('show');
        }
        else
        {
            
            minnify_innitialization();

            abba_get_wallet_details();
    
        }
        
    });
    
    
    
    $("body").on("click", ".abba_save_bvn_nin", function () {

        var NIN = $('.nin').val();
    
        var BVN = $('.bvn').val();
        
        if(NIN == '' || NIN == '0' || NIN == 'NULL' || BVN == '' || BVN == '0' || BVN == 'NULL')
        {
            $.wnoty({
                type: 'warning',
                message: "Hey! Input both your NIN and BVN to proceed.",
                autohideDelay: 5000
            });
        }
        else
        {
            
            minnify_innitialization();
            
            abba_get_wallet_details();
    
            $('#bin_nin_modal').modal('hide');

        }
    });

    $("body").on("click", ".toggle-visibility", function () {

        var abba_var = $(this).data('id');

        var $amount = $("#" + abba_var);
        var originalText = $amount.text();
        var data_amt_Text = $("#" + abba_var).data('amt');
        var hiddenText = "₦*****";

        if (originalText === hiddenText) {
            $amount.html(data_amt_Text);
            $("." + abba_var).html(data_amt_Text);
            $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        }
        else {
            $amount.html(hiddenText);
            $("." + abba_var).html(hiddenText);
            $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });


    // function to get campus
    function abba_get_wallet_details() {

        $('.wallet_balance').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.pending_withdrawal').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.amount_withdrawn').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.abba_bank_name').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.abba_account_number').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.abba_account_name').html('<i class="fa fa-spinner fa-spin"></i>');

        $('.display_transactions').html('<tr><td colspan=5 align="center"><i class="fa fa-spinner fa-spin fs-5"></i></td></tr>');

        var user_id = $('#user_id').val();

        var user_type = $('#user_type').val();

        var storedtoken = localStorage.getItem('storedtoken');
        
        var NIN_check = '<?php echo $NIN; ?>';

        var BVN_check = '<?php echo $BVN; ?>';
        
        if(NIN_check == '' || NIN_check == '0' || NIN_check == 'NULL' || BVN_check == '' || BVN_check == '0' || BVN_check == 'NULL'){
            
            var NIN = $('.nin').val();
    
            var BVN = $('.bvn').val();
            
            if(NIN == '' || NIN == '0' || NIN == 'NULL' || BVN == '' || BVN == '0' || BVN == 'NULL')
            {
                $.wnoty({
                    type: 'error',
                    message: "Please input your correct NIN and BVN to proceed",
                    autohideDelay: 10000
                });
            }
            else
            {
                abba_get_wallet_data();
            }
            
        }
        else
        {
            var NIN = NIN_check;
    
            var BVN = BVN_check;
            
            abba_get_wallet_data();
            
        }
        
        function abba_get_wallet_data(){
            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/get_wallet_dashboard_summary.php",
                data: { user_id: user_id, storedtoken: storedtoken, NIN: NIN, BVN: BVN },
                //cache: false,
                success: function (output) {
                    // alert(output);
    
                    console.log(output);
    
                    var jsonData = JSON.parse(output);
    
                    var wallet_balance = jsonData.wallet_balance;
    
                    var pending_withdrawal = jsonData.pending_withdrawal;
    
                    var amount_withdrawn = jsonData.amount_withdrawn;
    
                    var abba_bank_name = jsonData.abba_bank_name;
    
                    var abba_account_number = jsonData.abba_account_number;
    
                    var abba_account_name = jsonData.abba_account_name;
                    
                    var abba_wallet_checker = jsonData.abba_wallet_checker;
                    
                    if(abba_wallet_checker === 1){
                        
                        $.wnoty({
                            type: 'error',
                            message: "An error has occured, please reload your page, input your correct BVN and NIN and try again.",
                            autohideDelay: 10000
                        });
                        
                        $('#bin_nin_modal').modal('show');
                    }
                    else
                    {
                        
                        $('.wallet_balance').html(wallet_balance);
        
                        $('.wallet_balance').data("amt", wallet_balance);
        
                        $('.pending_withdrawal').html(pending_withdrawal);
        
                        $('.pending_withdrawal').data("amt", pending_withdrawal);
        
                        $('.amount_withdrawn').html(amount_withdrawn);
        
                        $('.amount_withdrawn').data("amt", pending_withdrawal);
        
                        $('.abba_bank_name').html(abba_bank_name);
        
                        $('.abba_account_number').html(abba_account_number);
        
                        $('.abba_account_name').html(abba_account_name);
        
                        $.ajax({
                            type: "POST",
                            url: "../../controller/scripts/owner/wallet/get_wallet_dashboard_trans.php",
                            data: { user_id: user_id, storedtoken: storedtoken, user_type: user_type },
                            //cache: false,
                            success: function (result) {
                                $('.display_transactions').html(result);
            
                                    $('#table1').DataTable({
                                        responsive: true
                                    });
                            }
        
                        });
    
                    }
    
                }
            });
        }
        
    }

    function minnify_innitialization() {
       

        var request = new XMLHttpRequest();
        request.open('POST', 'https://api.monnify.com/api/v1/auth/login/');
        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('Authorization', 'Basic  TUtfUFJPRF9aOTgwR0c0UFlBOjI0Wk1VNlZDQlRCOUs1RkRDVjI2VTU1OEZUTEZQMFQ5');

        request.onreadystatechange = function () {
            if (this.readyState === 4) {
                // console.log('Status:', this.status);
                // console.log('Headers:', this.getAllResponseHeaders());
                var abc = this.responseText;
                const myObj = JSON.parse(abc);
                var accessstoken = myObj["responseBody"]['accessToken'];



                localStorage.setItem('storedtoken', accessstoken);
                // console.log('Body:', accessstoken);
            }
        };
        request.send();
    }


    function payWithMonnify() {

        $('.abba_fund_wallet_btn').html('Processing..<i class="fa fa-spinner fa-spin"></i>');
        $('.abba_fund_wallet_btn').prop('disabled', true);

        var funding_amt = parseFloat($(".funding_amt").val());
       




        if($(".funding_amt").val() == '')
        {


                    $('.abba_fund_wallet_btn').html('<i class="fas fa-arrow-right"></i>Proceed');
                    $('.abba_fund_wallet_btn').prop('disabled', false);



                    $.wnoty({
                        type: 'warning',
                        message: "Hey! Input Amount to proceed",
                        autohideDelay: 5000
                    });


        }else
        {

        

                var charge_percent = parseFloat(<?php echo $charge; ?>);

                var charge_amt = (charge_percent / 100) * funding_amt;

                if (charge_amt > 750) {
                    var final_amt_paying = funding_amt + 750;

                    var final_charge_amt = 750;
                }
                else {
                    var final_amt_paying = charge_amt + funding_amt;

                    var final_charge_amt = charge_amt;
                }

                var UserID = '<?php echo $UserID; ?>';

                var UserType = '<?php echo $userType; ?>';

                var Transaction_Type = 'Credit';

                var d = new Date();
                var n = d.getTime();
                var p = Math.floor((Math.random() * 100) + 1);
                var referencenumber = "RX" + n + "-" + p;

                MonnifySDK.initialize({
                    amount: final_amt_paying,
                    currency: "NGN",
                    reference: new String((new Date()).getTime()),
                    ustomerFullName: '<?php echo $PrimaryName; ?>',
                    customerEmail: '<?php echo $Email; ?>',
                    apiKey: "<?php echo $MonnifyLivePaymentApi; ?>",
                    contractCode: "<?php echo $MonnifyLiveContractCode; ?>",
                    paymentDescription: "Fund Wallet",
                    onLoadStart: () => {
                        console.log("loading has started");
                    },
                    onLoadComplete: () => {
                        console.log("SDK is UP");
                    },

                    onComplete: function (response) {
                        //Implement what happens when the transaction is completed.
                        console.log(response);
                        var statusnew = response['status'];
                        
                                    
                                if (statusnew == 'SUCCESS') {



                                         prosceedwithfunding();
                                        
                            
                            
                            
                                }
                                else {
            
                                    $.wnoty({
                                        type: 'error',
                                        message: "Oops! Transaction failed please try again later.",
                                        autohideDelay: 5000
                                    });

                                                 $('.abba_fund_wallet_btn').html('<i class="fas fa-arrow-right"></i> Proceed');
                                                $('.abba_fund_wallet_btn').prop('disabled', false);
                                }

                    
                        
                    },
                    onClose: function (data) {

                        //Implement what should happen when the modal is closed here
                        // console.log(data);

                        var paymentStatus = data['paymentStatus'];
                        var status = data['status'];

                        if (paymentStatus == 'USER_CANCELLED') {

                            $.wnoty({
                                type: 'warning',
                                message: "Oops! Transaction Cancelled.",
                                autohideDelay: 5000
                            });

                            $('#fundwalletModal').modal('hide')
                        }
                        else {

                            if (status == 'SUCCESS') {

                                $.wnoty({
                                    type: 'success',
                                    message: "Great! Transaction Successful",
                                    autohideDelay: 5000
                                });
                            }
                            else {

                                $.wnoty({
                                    type: 'error',
                                    message: "Oops! Transaction failed please try again later.",
                                    autohideDelay: 5000
                                });
                            }

                        }

                        $('#fundwalletModal').modal('hide')

                        $('.abba_fund_wallet_btn').html('<i class="fas fa-arrow-right"></i> Proceed');
                        $('.abba_fund_wallet_btn').prop('disabled', false);
                    }
                });
            }
    }



    function prosceedwithfunding()
    {



        var funding_amt = parseFloat($(".funding_amt").val());
        
         var charge_percent = parseFloat(<?php echo $charge; ?>);

            var charge_amt = (charge_percent / 100) * funding_amt;

            if (charge_amt > 750) {
                var final_amt_paying = funding_amt + 750;

                var final_charge_amt = 750;
            }
            else {
                var final_amt_paying = charge_amt + funding_amt;

                var final_charge_amt = charge_amt;
            }

            var UserID = '<?php echo $UserID; ?>';

            var UserType = '<?php echo $userType; ?>';

            var Transaction_Type = 'Credit';

            var d = new Date();
            var n = d.getTime();
            var p = Math.floor((Math.random() * 100) + 1);
            var referencenumber = "RX" + n + "-" + p;



                $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/wallet/abba_insert_transaction.php",
                        data: { final_charge_amt: final_charge_amt, funding_amt: funding_amt, UserID: UserID, UserType: UserType, referencenumber: referencenumber, date: d, time: n, Transaction_Type: Transaction_Type },
                        success: function (output) {

                         
    
                            // alert(output);
    
                            if (output == '1') {
                                $.wnoty({
                                    type: 'success',
                                    message: "Great! Registered Successfully",
                                    autohideDelay: 5000
                                });
                            }
    
                            abba_get_wallet_details();
    
                            $('#fundwalletModal').modal('hide')
    
                            $('.abba_fund_wallet_btn').html('<i class="fas fa-arrow-right"></i> Proceed');
                            $('.abba_fund_wallet_btn').prop('disabled', false);
                        }
                    });


        
    }








    $(document).ready(function () {
        var typingTimer;
        var doneTypingInterval = 1500; // 1 second (adjust as needed)

        $('.account_name').on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

    

        $('.account_name').on('keydown', function () {
            clearTimeout(typingTimer);
        });

        function doneTyping() {
            // The user has finished typing. You can perform your actions here.
            var account_number = $('.account_name').val();

            var bank_code = $('.bank_code option:selected').val();

            var numDigits = account_number.replace(/\D/g, "").length;

            if (numDigits === 10) {
                $('.account_user_name').html('<i class="fa fa-spinner fa-spin"></i>');

                var request = new XMLHttpRequest();

                var apiUrl = `https://api.monnify.com/api/v1/disbursements/account/validate?accountNumber=${account_number}&bankCode=${bank_code}`;

                request.open('GET', apiUrl);

                request.onreadystatechange = function () {
                    if (this.readyState === 4) {
                        if (this.status === 200) {
                            // console.log('Status:', this.status);
                            // console.log('Headers:', this.getAllResponseHeaders());

                            try {
                                var response = JSON.parse(this.responseText);
                                if (response.requestSuccessful) {
                                    var accountNumber = response.responseBody.accountNumber;
                                    var accountName = response.responseBody.accountName;
                                    var bankCode = response.responseBody.bankCode;

                                    $('.account_user_name').html(`<div class="mb-2" style="font-weight:600;"><i class="fas fa-user-circle text-primary" style="font-size:18px;"></i> <span class="account_holder_name">` + accountName + `</span></div>`);

                                    // Now you can use accountNumber, accountName, and bankCode as needed
                                    // console.log('Account Number:', accountNumber);
                                    // console.log('Account Name:', accountName);
                                    // console.log('Bank Code:', bankCode);
                                } else {
                                    console.error('Request not successful:', response.responseMessage);

                                    $('.account_user_name').val('Account Name Unavailable');
                                }
                            } catch (error) {
                                console.error('Error parsing JSON:', error);

                                $('.account_user_name').val('Account Name Unavailable');
                            }
                        } else {
                            console.error('Request failed with status:', this.status);

                            $('.account_user_name').val('Account Name Unavailable');
                        }
                    }
                };

                request.send();

            }
            else {
                $('.account_user_name').val('Invalid Account Number');
            }
        }
    });


    $('body').on('click', '.abba_transfer', function () {

        $('.abba_transfer').html('Transferring..<i class="fa fa-spinner fa-spin"></i>');
        $('.abba_transfer').prop('disabled', true);

        minnify_innitialization();

        var account_number = $('.account_name').val();
        
        // alert(account_number);
        
        var bank_code = $('.bank_code option:selected').val();

        var account_name = $('.account_holder_name').html();
        

        var transfer_amt = $('.transfer_amt').val();

        var narration = 'From - <?php echo $PrimaryName . ' ' . $SecondaryName; ?>';

        var storedtoken = localStorage.getItem('storedtoken');

        var UserID = '<?php echo $UserID; ?>';

        var UserType = '<?php echo $userType; ?>';

        if (account_number == '' || account_number == 0 || bank_code == '' || bank_code == 0 || account_name == '' || account_name == 0 || transfer_amt == '' || transfer_amt == 0) {
            $.wnoty({
                type: 'error',
                message: "No field should be empty",
                autohideDelay: 5000
            });

            $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
            $('.abba_transfer').prop('disabled', false);

        }
        else {

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/abba_transfer_money.php",
                data: { account_number: account_number, bank_code: bank_code, account_name: account_name, transfer_amt: transfer_amt, storedtoken: storedtoken, narration: narration, UserID: UserID, UserType: UserType },
                success: function (output) {
                    
                     
                    
                           
                            
                            
                  if (output == 1) {

                      $('#set_transfer_pin_Modal').modal('show');
                      $('#withdrawModal').css('z-index', 1040);

                                                
                        var abba_modal = localStorage.getItem('pinstat');

                            if (abba_modal === '1') { // Use strict equality and compare with '1'
                                var OTPContainer = $("#abba-otp-input");
                                var OTPValueContainer = $("#abba-otp-value");
                                var inputs = OTPContainer.find("input:not(#abba-otp-value)");
                            } else {
                                var OTPContainer = $("#abba-enter-otp-input");
                                var OTPValueContainer = $("#abba-enter-otp-value");
                                var inputs = OTPContainer.find("input:not(#abba-enter-otp-value)");
                            }

                              // Convert the jQuery object to an array for better alert output



                                inputs.on("keyup", function (e) {
                                    handleKeyUp(e, $(this));
                                
                                });



                                            
                                    inputs.on("input", function () {
                                        handleInput($(this));
                                    });

                                    inputs.on("keydown", function (e) {
                                        handleKeyDown(e, $(this));
                                    });

                                    inputs.on("keyup", function (e) {
                                        handleKeyUp(e, $(this));
                                    });



                        $('body').on('click', '.abba-pin-btn', function () {
                          

                            localStorage.setItem('pinstat', 1);

                            $('.abba-pin-btn').html('Setting Pin..<i class="fa fa-spinner fa-spin"></i>');
                            $('.abba-pin-btn').prop('disabled', true);
                            
                            // var otpValue = $("#abba-otp-value").val();
                            var OTPContainer = $("#abba-otp-input");

                              var otpValues = OTPContainer.find("input:lt(4)").map(function() {
                                    return $(this).val().trim();
                                }).get();

                                var isValid = otpValues.some(function(value) {
                                    return value == '';
                                });

                               

                                if (isValid) {
                                    // At least one of the first four OTP fields is non-empty
                                    $('.abba-pin-btn').html('<i class="fas fa-key"></i> Set Pin');
                                    $('.abba-pin-btn').prop('disabled', false);

                                    $.wnoty({
                                        type: 'warning',
                                        message: "Input your four digits pin to proceed.",
                                        autohideDelay: 5000
                                    });
                                } else {

                                                
                                                $.ajax({
                                                    type: "POST",
                                                    url: "../../controller/scripts/owner/wallet/abba_inser_transaction_pin.php",
                                                    data: { UserID: UserID, UserType: UserType, otpValue: otpValues },
                                                    success: function (result) {
                                                

                                                        $('.abba-pin-btn').html('<i class="fas fa-key"></i> Set Pin');
                                                        $('.abba-pin-btn').prop('disabled', false);

                                                        $('#set_transfer_pin_Modal').modal('hide');
                                                        $('#withdrawModal').css('z-index', 1050);

                                                        $.wnoty({
                                                            type: 'success',
                                                            message: "Great, Pin Set Successfully",
                                                            autohideDelay: 5000
                                                        });


                                                        $.ajax({
                                                            type: "POST",
                                                            url: "../../controller/scripts/owner/wallet/abba_transfer_money.php",
                                                            data: { account_number: account_number, bank_code: bank_code, account_name: account_name, transfer_amt: transfer_amt, storedtoken: storedtoken, narration: narration, UserID: UserID, UserType: UserType },
                                                            success: function (data) {

                                                                if(data.trim() === 'success')
                                                                {
                                                                    $.wnoty({
                                                                        type: 'success',
                                                                        message: "Transfer Successful",
                                                                        autohideDelay: 5000
                                                                    });

                                                                    $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
                                                                    $('.abba_transfer').prop('disabled', false);
                                                                }
                                                                else{
                                                                    $.wnoty({
                                                                        type: 'warning',
                                                                        message: data,
                                                                        autohideDelay: 5000
                                                                    });

                                                                    $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
                                                                    $('.abba_transfer').prop('disabled', false);
                                                                }

                                                            }
                                                        });
                                                    }
                                                });


                                   
                                }
                            

                        });
                        
                    }
                    else {

                        localStorage.setItem('pinstat', 0);

                        $('#enter_transfer_pin_Modal').modal('show');
                        
                        $('#enter_transfer_pin_Modal').modal('hide');
                        $('#withdrawModal').css('z-index', 1050);


                        $('body').on('click', '.abba-enter-pin-btn', function () {

                            var otpValue = parseFloat($("#abba-enter-otp-value").val());
                            
                            var TransactionPin = parseFloat(<?php echo $TransactionPin; ?>);
                                 

                            if(otpValue === TransactionPin)
                            {
                                $('#enter_transfer_pin_Modal').modal('hide');
                                $('#withdrawModal').css('z-index', 1050);

                                $.ajax({
                                    type: "POST",
                                    url: "../../controller/scripts/owner/wallet/abba_transfer_money.php",
                                    data: { account_number: account_number, bank_code: bank_code, account_name: account_name, transfer_amt: transfer_amt, storedtoken: storedtoken, narration: narration, UserID: UserID, UserType: UserType },
                                    success: function (data) {
            
                                        if(data.trim() === 'success')
                                        {
                                            $.wnoty({
                                                type: 'success',
                                                message: "Transfer Successful",
                                                autohideDelay: 5000
                                            });

                                            $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
                                            $('.abba_transfer').prop('disabled', false);
                                        }
                                        else{
                                            $.wnoty({
                                                type: 'warning',
                                                message: data,
                                                autohideDelay: 5000
                                            });

                                            $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
                                            $('.abba_transfer').prop('disabled', false);
                                        }
                                        
                                        abba_get_wallet_details();

                                    }
                                });
                            }
                            else{
                                $.wnoty({
                                    type: 'error',
                                    message: 'Incorrect Pin',
                                    autohideDelay: 5000
                                });
                            }
                        });

                    }

                    $('.abba_transfer').html('<i class="fas fa-exchange-alt"></i> Transfer');
                    $('.abba_transfer').prop('disabled', false);
                }

            });
        }

    });




    // $(document).ready(function () {

        var abba_modal = localStorage.getItem('pinstat');

      

        if(abba_modal === 1)
        {
            var OTPContainer = $("#abba-otp-input");
            var OTPValueContainer = $("#abba-otp-value");
            var inputs = OTPContainer.find("input:not(#abba-otp-value)");

        }
        else{
            var OTPContainer = $("#abba-enter-otp-input");
            var OTPValueContainer = $("#abba-enter-otp-value");
            var inputs = OTPContainer.find("input:not(#abba-enter-otp-value)");

        }
        
        // Focus first input
        const firstInput = inputs.first();
        firstInput.focus();

        inputs.on("input", function () {
            handleInput($(this));
        });

        inputs.on("keydown", function (e) {
            handleKeyDown(e, $(this));
        });

        inputs.on("keyup", function (e) {
            handleKeyUp(e, $(this));
        });

        inputs.on("focus", function () {
            $(this).select();
        });

        function updateValue(inputs) {
            const value = inputs.toArray().map(input => input.value ? input.value : "*").join("");
           
            OTPValueContainer.val(value);
        }

        function isValidInput(input) {
            return Number(input.val()) === 0 && input.val() !== "0" ? false : true;
        }

        function setInputValue(input, value) {
            input.val(value);
          

        }

        function resetInput(input) {
            setInputValue(input, "");
        }

        function focusNext(input) {
            const nextInput = input.next("input");
            if (nextInput.length > 0) {
                nextInput.focus().select();
            }
        }

        function focusPrev(input) {
            const prevInput = input.prev("input");
            if (prevInput.length > 0) {
                prevInput.focus().select();
            }
        }

        function handleValidMultiInput(input) {
            const inputLength = input.val().length;
            const curIndex = inputs.index(input);
            const endIndex = Math.min(curIndex + inputLength - 1, inputs.length - 1);
            const inputsToChange = inputs.slice(curIndex, endIndex + 1);
            inputsToChange.each(function (index) {
                setInputValue($(this), input.val()[index]);
            });
            focusPrev(inputs.eq(endIndex));
        }

        function handleInput(input) {
            if (!isValidInput(input)) {
                handleInvalidInput(input);
                return;
            }
            if (input.val().length === 1) {
                handleValidSingleInput(input);
            } else {
                handleValidMultiInput(input);
            }
            updateValue(inputs);
           
        }

        function handleValidSingleInput(input) {
            setInputValue(input, input.val().slice(-1));
            focusNext(input);
           
        }

        function handleInvalidInput(input) {
            resetInput(input);
        }

        function handleKeyDown(e, input) {
            const key = e.key;
            const curIndex = inputs.index(input);
            if (key === "Delete") {
                resetInput(input);
                focusPrev(input);
            }
            if (key === "ArrowLeft") {
                e.preventDefault();
                focusPrev(input);
            }
            if (key === "ArrowRight") {
                e.preventDefault();
                focusNext(input);
            }
        }

        function handleKeyUp(e, input) {
            const key = e.key;
            if (key === "Backspace") {
                focusPrev(input);
            }
        }


        //pros load new content here

        $(document).ready(function () {


            var currentDate = new Date();

            // Format the date as YYYY-MM
            var formattedDate = currentDate.toISOString().slice(0, 7);

            // Set the formatted date as the value of the date input field
            $('.prosstartamountmonth_instantpayment').val(formattedDate);
            $('.prosstartamountmonth-scheule').val(formattedDate);


                 prosloadstaffconforsalary();
                 prosloadexamloadsaryforshedule();
        });


        $('body').on('change', '.prosstartamountmonth_instantpayment', function() {
            prosloadstaffconforsalary();
        });


        
        $('body').on('change', '.prosstartamountmonth-scheule', function() {
            prosloadexamloadsaryforshedule();
        });


      

        function prosloadstaffconforsalary()
        {

            $('.prosloadstaffcontentsalary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            
            var user_id = $('#user_id').val();
            var user_type = $('#user_type').val();

            var dateforsalrypaid = $('.prosstartamountmonth_instantpayment').val();
            var prostag_data = 'datapay'; 

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros_load_staff_payment.php",
                data: { user_id:user_id,
                    user_type:user_type,
                    dateforsalrypaid:dateforsalrypaid,
                    prostag_data:prostag_data
                },
                success: function (data) {
                    $('.prosloadstaffcontentsalary').html(data);
                }

            });

        }



        function prosloadexamloadsaryforshedule()
        {

            $('.prosloadstaffforshedule-salary').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');
            
            var user_id = $('#user_id').val();
            var user_type = $('#user_type').val();

            var dateforsalrypaid = $('.prosstartamountmonth-scheule').val();
            var prostag_data = 'datashedule'; 

            

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros_load_staff_payment.php",
                data: { 
                    user_id:user_id,
                    user_type:user_type,
                    dateforsalrypaid:dateforsalrypaid,
                    prostag_data:prostag_data
                },
                success: function (data) {
                    $('.prosloadstaffforshedule-salary').html(data);
                }

            });

        }




        //PROS LOAD



        $('body').on('change', '.prosselectallcheckedall', function() {

                var checkStatus = $(this).prop('checked');

                    if(checkStatus == true)
                    {
                        $(".proscheckedainputnamesalaryeach").prop('checked', $(this).prop("checked"));
                       

                              var totalsalarytobepaid = [];
                                $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                                    totalsalarytobepaid.push($(this).data('amount'));
                                });
                                
                                
                                var total = 0;

                                for (var i in totalsalarytobepaid) {
                                            total += totalsalarytobepaid[i];
                                }
                            
                                $('.prosloadsalaybulkamount_inititated').val(total);

                                if(total == '0')
                                {
                                    var grandtotal =  '0.00';
                                }else
                                {
                                    var grandtotal =  total.toLocaleString("en-US");
                                }
                              

                                
                      
                    }
                    else if(checkStatus == false)
                    {

                        $(".proscheckedainputnamesalaryeach").prop('checked', false);
                        var grandtotal =  '0.00';

                        $('.prosloadsalaybulkamount_inititated').val(0);
                    }
                   
                    $('.prosloadamountcontent').html(grandtotal);




        });






        
        $('body').on('change', '.prosselectallcheckedallshedule', function() {

                var checkStatus = $(this).prop('checked');

                if(checkStatus == true)
                {
                    $(".proscheckedainputnamesalaryeachshedule").prop('checked', $(this).prop("checked"));
                

                          var totalsalarytobepaid = [];
                            $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                                totalsalarytobepaid.push($(this).data('amount'));
                            });
                            
                            
                            var total = 0;

                            for (var i in totalsalarytobepaid) {
                                        total += totalsalarytobepaid[i];
                            }
                        
                            $('.prosloadsalaybulkamount_inititatedschedule').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';
                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }
                            

                                
                    
                    }
                    else if(checkStatus == false)
                    {

                        $(".proscheckedainputnamesalaryeachshedule").prop('checked', false);
                        var grandtotal =  '0.00';

                        $('.prosloadsalaybulkamount_inititatedschedule').val(0);
                    }
                
                    $('.prosloadamountcontent-schedule').html(grandtotal);




            });



            $('body').on('change', '.proscheckedainputnamesalaryeach', function() {
                    if ($('.proscheckedainputnamesalaryeach:checked').length === $('.proscheckedainputnamesalaryeach').length) {
                    
                        $(".prosselectallcheckedall").prop('checked', true);
                        var selTotalSingle = $('.proscheckedainputnamesalaryeach:checked').length;
                        
                    } else {
                        $(".prosselectallcheckedall").prop('checked', false);

                        var selTotalSingle = $('.proscheckedainputnamesalaryeach:checked').length;

                    }


                        var totalsalarytobepaid = [];
                        $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                        });
                    
                        
                        var total = 0;

                        for (var i in totalsalarytobepaid) {
                                    total += totalsalarytobepaid[i];
                        }

                        $('.prosloadsalaybulkamount_inititated').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';

                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }

                    $('.prosloadamountcontent').html(grandtotal);
                });




                $('body').on('change', '.proscheckedainputnamesalaryeachshedule', function() {
                    if ($('.proscheckedainputnamesalaryeachshedule:checked').length === $('.proscheckedainputnamesalaryeachshedule').length) {
                    
                        $(".prosselectallcheckedallshedule").prop('checked', true);
                        var selTotalSingle = $('.proscheckedainputnamesalaryeachshedule:checked').length;
                        
                    } else {
                        $(".prosselectallcheckedallshedule").prop('checked', false);

                        var selTotalSingle = $('.proscheckedainputnamesalaryeachshedule:checked').length;

                    }


                        var totalsalarytobepaid = [];
                        $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                        });
                    
                        
                        var total = 0;

                        for (var i in totalsalarytobepaid) {
                                    total += totalsalarytobepaid[i];
                        }

                        $('.prosloadsalaybulkamount_inititatedschedule').val(total);

                            if(total == '0')
                            {
                                var grandtotal =  '0.00';

                            }else
                            {
                                var grandtotal =  total.toLocaleString("en-US");
                            }

                    $('.prosloadamountcontent-schedule').html(grandtotal);
                });
                    

               
           




   //pros pay salary in bulk
        function payWithMonnifyBulk()
        {
           

            minnify_innitialization();
                        
                     $('.abba_transfer_bulk').html('Processing..<i class="fa fa-spinner fa-spin"></i>');

                  

                        var amountcountent = parseInt($('.prosloadamountcontent').html());


                        var AmountType = parseInt($('.paymenttypeamountinput').val());
                        var prospaymentype = $('.prosgeneralpaymenttypecheck:checked').val();

                        var paymenetmonth = $('.prosstartamountmonth_instantpayment').val();



                        
                       
                        
                       



                            var totalsalarytobepaid = [];
                            var walletbankname = [];
                            var accounname = []; 
                            var accounnum = []; 
                            var accountref = []; 
                            var staffID = []; 
                            var InstitutionID = []; 

                            var pros_totalamoun_owner =     parseInt($('.prosgetwallet_amount_school').val());
                            var totalamounttosent_allstaff =  parseInt($('.prosloadsalaybulkamount_inititated').val());


                          $.each($('.proscheckedainputnamesalaryeach:checked'),function(){
                            totalsalarytobepaid.push($(this).data('amount'));
                            accounname.push($(this).data('accname'));
                            accounnum.push($(this).data('accnum'));
                            accountref.push($(this).data('ref'));
                            staffID.push($(this).data('staffid'));
                            InstitutionID.push($(this).data('inst'));

                            walletbankname.push($(this).val());
                        });



                            // var bank_code = $('.bank_code option:selected').val();
                        
                            var narration = 'From - <?php echo $PrimaryName . ' ' . $SecondaryName; ?>';

                            var storedtoken = localStorage.getItem('storedtoken');

                            var UserID = '<?php echo $UserID; ?>';

                            var UserType = '<?php echo $userType; ?>';

               

                    if ($('.proscheckedainputnamesalaryeach:checked').length > 0) {

                  
                          $('.abba_transfer_bulk').prop('disabled', true);

                          totalsalarytobepaid = totalsalarytobepaid.toString();
                          walletbankname = walletbankname.toString();
                          accounname = accounname.toString();
                          accounnum = accounnum.toString();
                          accountref = accountref.toString();
                          staffID = staffID.toString();
                          InstitutionID = InstitutionID.toString();


                          



                          if(totalamounttosent_allstaff > AmountType)
                            {


                                $.wnoty({
                                    type: 'warning',
                                    message: 'Insufficient funds!! Seems Amount inputed is greater than what you have in your' +prospaymentype+'.',
                                    autohideDelay: 5000
                                });


                                $('.abba_transfer_bulk').html('Proceed');
                                $('.abba_transfer_bulk').prop('disabled', false);

                        
                            }else if(paymenetmonth == '')
                            {

                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!! Select month you want to pay salary for',
                                            autohideDelay: 5000
                                        });


                                        $('.abba_transfer_bulk').html('Proceed');
                                        $('.abba_transfer_bulk').prop('disabled', false);

                            }
                            
                            else
                            {
                                          $('.abba_transfer_bulk').prop('disabled', true);
                                            $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/wallet/pros_transferbulk_money.php",
                                            data: {  
                                                    totalsalarytobepaid:totalsalarytobepaid,
                                                    walletbankname:walletbankname,
                                                    accounname:accounname,
                                                    accounnum:accounnum,
                                                    accountref:accountref,
                                                    narration:narration,
                                                    storedtoken:storedtoken,
                                                    UserID:UserID,
                                                    UserType:UserType,
                                                    staffID:staffID,
                                                    InstitutionID:InstitutionID,
                                                    AmountType:AmountType,
                                                     prospaymentype:prospaymentype,
                                                     totalamounttosent_allstaff:totalamounttosent_allstaff,
                                                     paymenetmonth:paymenetmonth
                                                },
                                                success: function (output) {

                                                




                                                    if(output.trim() == '1')
                                                    {


                                                                $.wnoty({
                                                                    type: 'success',
                                                                    message: 'Great!! Salary paid successfully',
                                                                    autohideDelay: 5000
                                                                });

                                                                abba_get_wallet_details();
                                                                prosloadstaffconforsalary();

                                                                prosloadpayementtypecontenthere();   
                                                               prosloadpayementtypecontenthereschedule();  


                                                    }else
                                                    {
                                                        
                                                    }

                                                    $('.abba_transfer_bulk').prop('disabled', false);
                                                    $('.abba_transfer_bulk').html('Proceed');
                                                  
                                            }
                                        });
                                            
                            }
                         
                          
                             

                     }else
                     {




                               $.wnoty({
                                    type: 'error',
                                    message: 'kindly select staff to be paid before you proceed.',
                                    autohideDelay: 5000
                                });


                                $('.abba_transfer_bulk').html('Proceed');
                                $('.abba_transfer_bulk').prop('disabled', false);
                     }


                  

                   
            
        }

 





//onchange on date and month for schedule payment
$('body').on('change', '.pros_general_schedule_input', function() {
   var amountschedule = $('.prosamountschedule').val();
   var datescheduled = $('.schedulepaymentdate').val();
   var monthschedule = $('.prosstartamountmonth-scheule').val();

  
        if(amountschedule == '' || amountschedule == '' || monthschedule == '')
        {
                                               
                $('.pros_transfer_schedulebtn').prop('disabled', true);
        }else
        {
           
            $('.pros_transfer_schedulebtn').prop('disabled', false);
        }
});
//onchange on date and month for schedule payment
  
//onkeyup on amount  for schedule payment
$('body').on('keyup', '.pros_general_schedule_input_amount', function() {

         var amountschedule = $('.prosamountschedule').val();
         var datescheduled = $('.schedulepaymentdate').val();
         var monthschedule = $('.prosstartamountmonth-scheule').val();



        if(amountschedule == '' || amountschedule == '' || monthschedule == '')
        {
                                            
                $('.pros_transfer_schedulebtn').prop('disabled', true);
        }else
        {
    
            $('.pros_transfer_schedulebtn').prop('disabled', false);
        }
});
//onkeyup on amount  for schedule payment


$('body').on('click', '.pros_transfer_schedulebtn', function() {

        var amountschedule = $('.prosamountschedule').val();
        var datescheduled = $('.schedulepaymentdate').val();
        var monthschedule = $('.prosstartamountmonth-scheule').val();
        
        
          var AmountType = $('.paymenttypeamountinput').val();

          
                    
          var amountverifytype  = $('.paymenttypeamountinputschedule').val();
                
            
           

            var pros_amount_forallstaff = $('.prosloadsalaybulkamount_inititatedschedule').val();
    
    
            var UserID = '<?php echo $UserID; ?>';
            var UserType = '<?php echo $userType; ?>';

       
           var prospaymentype = $('.prosgeneralpaymenttypecheck_schedule:checked').val();
             


            var staffID = [];
            
            
           $.each($('.proscheckedainputnamesalaryeachshedule:checked'),function(){
                
                staffID.push($(this).data('staffid'));
               
            });
  
        
      
            var staffidvalidate = staffID.some(function (value) {
                    // Use typeof to check if the value is a string before calling trim
                    return typeof value === 'string' && value.trim() === '';
                });

     
        $('.pros_transfer_schedulebtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');


        if(amountschedule == '' || datescheduled == '' || monthschedule == '')
        {

                        $.wnoty({
                            type: 'warning',
                            message: 'Hey!! No field should be left blank .',
                            autohideDelay: 5000
                        });

                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
 

        }else if(staffID == '')
        {


                     $.wnoty({
                            type: 'warning',
                            message: 'Hey!! Select staff to Schedule fee for.',
                            autohideDelay: 5000
                        });

                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
 

        }
        
        else
        {

                if(parseInt(pros_amount_forallstaff) >  parseInt(amountschedule))
                {


                        $.wnoty({
                            type: 'warning',
                            message: 'Hey!! Scheduled amount should not be less than expected amount .',
                            autohideDelay: 5000
                        });
                        
                        $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
                    
                
                        
                 }else if(parseInt(amountschedule) >  parseInt(amountverifytype))
                  {


                              $.wnoty({
                                    type: 'warning',
                                    message: 'Insufficient Funds!! ' + prospaymentype + ' amount is not enough to schedule salary payment',
                                    autohideDelay: 5000
                                });
                                                                
                             $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');
               }
                
                else
                {


                    staffID = staffID.toString();

                 

                          $('.pros_transfer_schedulebtn').prop('disabled', true);

                                 $.ajax({
                                            type: "POST",
                                            url: "../../controller/scripts/owner/wallet/pros_proceeed_scheedule_salary.php",
                                            data: {  
                                                   

                                                     amountschedule:amountschedule,
                                                    datescheduled:datescheduled,
                                                    monthschedule:monthschedule,
                                                    pros_amount_forallstaff:pros_amount_forallstaff,
                                                    UserID:UserID,
                                                    UserType:UserType,
                                                     prospaymentype:prospaymentype,
                                                     AmountType:AmountType,
                                                     staffID:staffID
                                                },
                                                success: function (output) {
                                                    
                                                
                                                   
                                                    $('.pros_transfer_schedulebtn').prop('disabled', false);

                                                    if(output.trim() == '2')
                                                    {

                                                                $.wnoty({
                                                                    type: 'warning',
                                                                    message: 'Hey!!  Seems staff Salary has been scheduled for the month selected.',
                                                                    autohideDelay: 5000
                                                                });
                                                                $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');

                                                    }else
                                                    {
                                                              $.wnoty({
                                                                    type: 'success',
                                                                    message: 'Hey!!  Staff salary scheduled successufully.',
                                                                    autohideDelay: 5000
                                                                });
                                                                $('.pros_transfer_schedulebtn').html('<i class="fas fa-credit-card"></i> Schedule Now');



                                                                abba_get_wallet_details();
                                                               

                                                                
                                                                prosloadpayementtypecontenthereschedule();  

                                                               

                                                    }

                                                      

                                                }
                                 });



                    
                }

        }

     

        
});



//SAVING PLAN CONTENT HERE







$('body').on('click', '.pros_transfer_prossavebtn', function() {
    $('.pros_transfer_prossavebtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');

    // Retrieve the values
    var prossavititle_title = $('.prossavingplan_dessave').val();
    var Amount = $('.proscollectamountname').val();
    var Datenew = $('.prosgetsave_end_date').val();
    var datastatus = $(this).data('id');

        var UserID = '<?php echo $UserID; ?>';
        var UserType = '<?php echo $userType; ?>';



     var prostaffamountall = $('.prosloadsalaybulkamount_schedule').val();
 



    
    

    // Validate inputs
    if (prossavititle_title == '' || Amount == '' || Datenew == '') {


        $.wnoty({
            type: 'warning',
            message: 'Hey!! Make sure no field is left blank.',
            autohideDelay: 5000
        });
        $('.pros_transfer_prossavebtn').html('<i class="fas fa-save"></i> Schedule Now');

    } else {


      var amount_new  = parseInt(Amount);
      var staffamount  = parseInt(prostaffamountall);

       


             
                 $('.pros_transfer_prossavebtn').prop('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/wallet/pros-savefunds-edumess.php",
                        data: {
                            prossavititle_title: prossavititle_title,
                            Amount: Amount,
                            Date: Datenew,
                            UserID:UserID,
                            UserType:UserType,
                            datastatus:datastatus
                        },
                        success: function(output) {

                            
                        
                            $('.pros_transfer_prossavebtn').prop('disabled', false);
                            $('.pros_transfer_prossavebtn').html('<i class="fas fa-save"></i> Schedule Now');

                            if(output.trim() == '1')
                            {

                                        $.wnoty({
                                            type: 'success',
                                            message: 'Great!! ' + prossavititle_title + 'saved successfully',
                                            autohideDelay: 5000
                                        });

                                        prosloadsavescontent();
                                        //  prosloadsavescontentlock();
                                         abba_get_wallet_details();

                            }else if(output.trim() == '2')
                            {


                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!!  this plan has been set for this month by you already',
                                            autohideDelay: 5000
                                        });


                            }else if(output.trim() == '3')
                            {

                                         $.wnoty({
                                            type: 'warning',
                                            message: 'Insuficient Funds!! Fund your wallet to proceed with saving',
                                            autohideDelay: 5000
                                        });

                            }
                        

                            
                    
                        }
                    });



        

       
    }
});






$(document).ready(function () {
    prosloadsavescontent();
    prosloadsavescontentlock();
});




function prosloadsavescontent(){



var UserID = '<?php echo $UserID; ?>';

 var UserType = '<?php echo $userType; ?>';

 $('.prosloadsavenspincont').html('<i class="fa fa-spinner fa-spin"></i>');



 $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/wallet/pros-loadsave-edumess.php",
        data: {
            UserID:UserID,
            UserType:UserType
        },
        success: function(output) {

                    $('.prosloadsavenspincont').html(output);
        }
 });



}

//SAVING PLAN CONTENT HERE








//LOCKING PLAN CONTENT HERE





//LOCKING PLAN CONTENT HERE


$('body').on('click', '.pros_transfer_proslockbtn', function() {
    $('.pros_transfer_proslockbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span>');

    // Retrieve the values
    var prossavititle_title = $('.proslockplan_deslock').val();
    var Amount = $('.proscollectamountnamelock').val();
    var Datenew = $('.prosgetlock_end_date').val();
    var datastatus = $(this).data('id');



    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';


     var prostaffamountall = $('.prosloadsalaybulkamount_schedule').val();
 



    
    

    // Validate inputs
    if (prossavititle_title == '' || Amount == '' || Datenew == '') {


        $.wnoty({
            type: 'warning',
            message: 'Hey!! Make sure no field is left blank.',
            autohideDelay: 5000
        });
        $('.pros_transfer_proslockbtn').html('<i class="fas fa-block"></i> Lock Now');

    } else {


      var amount_new  = parseInt(Amount);
      var staffamount  = parseInt(prostaffamountall);

       


             
                 $('.pros_transfer_proslockbtn').prop('disabled', true);

                    $.ajax({
                        type: "POST",
                        url: "../../controller/scripts/owner/wallet/pros-savefunds-edumess.php",
                        data: {
                            prossavititle_title: prossavititle_title,
                            Amount: Amount,
                            Date: Datenew,
                            UserID:UserID,
                            UserType:UserType,
                            datastatus:datastatus
                        },
                        success: function(output) {
                        
                            $('.pros_transfer_proslockbtn').prop('disabled', false);
                            $('.pros_transfer_proslockbtn').html('<i class="fas fa-lock"></i> Lock Now');

                            if(output.trim() == '1')
                            {

                                        $.wnoty({
                                            type: 'success',
                                            message: 'Great!! ' + prossavititle_title + 'saved successfully',
                                            autohideDelay: 5000
                                        });

                                        prosloadsavescontentlock();
                                        abba_get_wallet_details();

                            }else if(output.trim() == '2')
                            {


                                        $.wnoty({
                                            type: 'warning',
                                            message: 'Hey!!  this plan has been set for this month by you already',
                                            autohideDelay: 5000
                                        });


                            }else if(output.trim() == '3')
                            {

                                         $.wnoty({
                                            type: 'warning',
                                            message: 'Insuficient Funds!! Fund your wallet to proceed with saving',
                                            autohideDelay: 5000
                                        });

                            }
                        

                            
                    
                        }
                    });

       
    }
});



function prosloadsavescontentlock(){



var UserID = '<?php echo $UserID; ?>';

 var UserType = '<?php echo $userType; ?>';

 $('.prosloadsavenspincontlock').html('<i class="fa fa-spinner fa-spin"></i>');



 $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/wallet/pros-loadlock-edumess.php",
        data: {
            UserID:UserID,
            UserType:UserType
        },
        success: function(output) {

                    $('.prosloadsavenspincontlock').html(output);
        }
 });



}


//PROS PAYEMENT TYPE AREA CONTENT HERE INSTANT PAYMENT HERE



// $(document).ready(function () {


//     prosloadpayementtypecontenthere();    
//     prosloadpayementtypecontenthereschedule();    


// });


$(document).ready(function() {
    // Get the current date
    var currentDate = new Date();

    // Format the date as YYYY-MM
    var formattedDate = currentDate.toISOString().slice(0, 7);

    // Set the formatted date as the value of the date input field
    $('.prosstartamountmonth_instantpayment').val(formattedDate);

    // Debugging: Display the formatted date in the console
   
});



$('body').on('change', '.prosgeneralpaymenttypecheck', function() {
    prosloadpayementtypecontenthere();    
});


$('body').on('change', '.prosgeneralpaymenttypecheck_schedule', function() {
    prosloadpayementtypecontenthereschedule();    
});



$('body').on('click', '.prospaysalrymodalbtn', function() {
    
    prosloadpayementtypecontenthere();   
    prosloadpayementtypecontenthereschedule();  
    
      prosloadstaffconforsalary();
      prosloadexamloadsaryforshedule();
    
    
});









function prosloadpayementtypecontenthere()
{
      

    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';
    var proscheckedpayementtype = $('.prosgeneralpaymenttypecheck:checked').val();


    $('.prosloadcontenttypeinstant').html('<span class="fa fa-spinner fa-spin"></span>');


    
        $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros-loadpayementtypecontent.php",
                data: {
                    UserID:UserID,
                    UserType:UserType,
                    proscheckedpayementtype:proscheckedpayementtype
                },
                success: function(output) {


                            $('.prosloadcontenttypeinstant').html(output);
                            
                           
                }
        });



}






function prosloadpayementtypecontenthereschedule()
{
      

    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';
    var proscheckedpayementtype = $('.prosgeneralpaymenttypecheck_schedule:checked').val();
  

    $('.prosloadcontenttypeinstant_schedule').html('<i class="fa fa-spinner fa-spin"></i>');

            
    
        $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/wallet/pros-loadpayementtypecontentsche.php",
                data: {
                    UserID:UserID,
                    UserType:UserType,
                    proscheckedpayementtype:proscheckedpayementtype
                },
                success: function(output) {

                              


                            $('.prosloadcontenttypeinstant_schedule').html(output);
                }
        });



}









//PROS LOAD RECEIPT CONTENT HERE

$('body').on('click', '.prosprintreseceict-transctionbtn', function() {

    var UserID = '<?php echo $UserID; ?>';
    var UserType = '<?php echo $userType; ?>';
var ReceiptID = $(this).data('id');


$('#prosloadreceiiptcontenthere').html('<i class="fa fa-spinner fa-spin"></i>');

$.ajax({
    type: "POST",
    url: "../../controller/scripts/owner/wallet/prosloadreceiptcontethere.php",
    data: {
        UserID:UserID,
        UserType:UserType,
        ReceiptID:ReceiptID
    },
    success: function(output) {
                $('#prosloadreceiiptcontenthere').html(output);
                
    }
});


});
//PROS LOAD RECEIPT CONTENT HERE





$('body').on('click', '.pros-print-receiptcontent-btn', function() {
        const element = document.getElementById("prosloadreceiptcontprin");
            // Choose the element and save the PDF for your user.
            html2pdf().from(element).save();

});




$('body').on('click', '.prossharereceptcontentbtn', function() {
const element = document.getElementById("prosloadreceiptcontprin");
    const pdfInstance = html2pdf();

    // Generate the PDF from the specified element
    pdfInstance.from(element).outputPdf().then(pdf => {
        // Create a Blob from the PDF data
        const pdfBlob = new Blob([pdf], { type: 'application/pdf' });

        // Create a FormData object and append the PDF Blob
        const formData = new FormData();
        formData.append('file', pdfBlob, 'receipt.pdf');

        // Create a URL for the PDF Blob
        const pdfUrl = URL.createObjectURL(pdfBlob);

        // Create a link for sharing the PDF (e.g., a download link)
        const downloadLink = document.createElement('a');
        downloadLink.href = pdfUrl;
        downloadLink.download = 'receipt.pdf';



  

        // Add the link to the document
            document.body.appendChild(downloadLink);

            // Trigger a click on the link to initiate the download
            downloadLink.click();


            // Optionally, you can open WhatsApp with a pre-filled message containing the PDF download link
            const whatsappLink = `whatsapp://send?text=Here is your receipt: ${window.location.origin}/path/to/receipts/receipt.pdf`;
            window.location.href = whatsappLink;
        });

});






</script>