<script>

    // verify withdrawal
    $('body').on('click', '.verify_withdrawal', function(){

        send_code();

    });
    
    $('body').on('click', '#backBtn_withdraw', function(){

        $('#pros_withdrawModal').modal('show');
        $('#pros_withdrawModal2').modal('hide');
        
        $('.n1').val('');
        $('.n2').val('');
        $('.n3').val('');
        $('.n4').val('');
        $('.n5').val('');
        $('.n6').val('');
        
    });
    
    function send_code() {
        
        var withdraw_amt = parseFloat($('.withdraw_amt').val());

        var transfer_fee = (parseFloat(<?php echo $transfer_fee; ?>) / 100) * withdraw_amt;
        var transfer_cap = parseFloat(<?php echo $transfer_cap; ?>);
        var transfer_min = 10; // minimum fee
        
        // Clamp the fee between ₦10 (min) and transfer_cap (max)
        var transfer_fee_final = Math.min(Math.max(transfer_fee, transfer_min), transfer_cap);
        
        var final_withdraw_amt = withdraw_amt + transfer_fee_final;


        var wallet_bal = parseFloat(<?php echo $WalletBal; ?>);

        var session = "<?php echo $pros_get_current_term_fetch['sessionName']; ?>";

        var term = "<?php echo $pros_get_current_term_fetch['TermOrSemesterID']; ?>";

        var user_id = "<?php echo $UserID; ?>";

        var Email = "<?php echo $Email; ?>";
        
        // alert(Email);

        if (withdraw_amt < 100 || withdraw_amt === '' || withdraw_amt === null || withdraw_amt === undefined || isNaN(withdraw_amt))
        {
            $.wnoty({
                type: 'error',
                message: "A minimum of 100 is allowed.",
                autohideDelay: 5000
            });
        }
        else if(wallet_bal < withdraw_amt)
        {
             $.wnoty({
                type: 'error',
                message: "Insufficient Funds.",
                autohideDelay: 5000
            });
        }
        else
        {
            
                
            $('.verify_withdrawal').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');
            $('#resendLink').html('<i class="fas fa-spinner fa-spin"></i>');


            var formatted = withdraw_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            var formatted_transfer_fee_final = transfer_fee_final.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            var formatted_final_withdraw_amt = final_withdraw_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            

            $('.withdrawal_md_amt').html(formatted);
            
            $('.withdrawal_fee_amt').html(formatted_transfer_fee_final);
            
            $('.withdrawal_tot_amt').html(formatted_final_withdraw_amt);

            $.ajax({
                url:'../../controller/scripts/affiliate/withdrawal/verify_withdrawal.php',
                type:'POST',
                data:{"withdraw_amt":withdraw_amt, "wallet_bal":wallet_bal, "session":session, "term":term, "user_id":user_id, "Email":Email},
                success: function(data) {
                    
                    // console.log(data);
                    

                    var verificationData = JSON.parse(data);
                   

                    if (verificationData.status == 1)
                    {
                        $('#pros_withdrawModal').modal('hide');
                        $('#pros_withdrawModal2').modal('show');
                        
                        startCountdown();
                        
                        $.wnoty({
                            type: 'success',
                            message: "A verification code has been sent your registered email address",
                            autohideDelay: 7000
                        });

                    }
                    else
                    {
                        $.wnoty({
                            type: 'error',
                            message: "An error occurred, Please reload your page and try again.",
                            autohideDelay: 5000
                        });
                    }

                    $('.verify_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');

                    $('#resendLink').html('Resend Code');

                }
            });
        }
        
    }

    //Generate Transfer Token
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


    // Proceed withdrawal
    $('body').on('click', '.proceed_withdrawal', function(){

        // minnify_innitialization();

        var withdraw_amt = parseFloat($('.withdraw_amt').val());

        var transfer_fee = (parseFloat(<?php echo $transfer_fee; ?>) / 100) * withdraw_amt;
        var transfer_cap = parseFloat(<?php echo $transfer_cap; ?>);
        var transfer_min = 10; // minimum fee
        
        // Clamp the fee between ₦10 (min) and transfer_cap (max)
        var transfer_fee_final = Math.min(Math.max(transfer_fee, transfer_min), transfer_cap);
        
        var final_withdraw_amt = withdraw_amt;
        
        console.log(transfer_fee_final);


        var wallet_bal = parseFloat("<?php echo $WalletBal; ?>");

        var session = "<?php echo $pros_get_current_term_fetch['sessionName']; ?>";

        var term = "<?php echo $pros_get_current_term_fetch['TermOrSemesterID']; ?>";

        var user_id = "<?php echo $UserID; ?>";

        var BankAccName = "<?php echo $BankAccName; ?>";

        var BankAccNo = "<?php echo $BankAccNo; ?>";

        var BankCode = "<?php echo $BankCode; ?>";

        var withdrawal_recipient_code = "<?php echo $withdrawal_recipient_code; ?>";

        // var storedtoken = localStorage.getItem('storedtoken');

        var n1 = $('.n1').val();
        var n2 = $('.n2').val();
        var n3 = $('.n3').val();
        var n4 = $('.n4').val();
        var n5 = $('.n5').val();
        var n6 = $('.n6').val();

        var ver_code_entered = n1+''+n2+''+n3+''+n4+''+n5+''+n6;

//         alert(ver_code_entered);

        $('.proceed_withdrawal').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');

        if (withdraw_amt < 100 || withdraw_amt === '' || withdraw_amt === null || withdraw_amt === undefined || isNaN(withdraw_amt))
        {
            $.wnoty({
                type: 'error',
                message: "A minimum of 100 is allowed.",
                autohideDelay: 5000
            });

            $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else if(wallet_bal < final_withdraw_amt)
        {
            $.wnoty({
                type: 'error',
                message: "Insufficient Funds.",
                autohideDelay: 5000
            });

            $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else if(ver_code_entered == '' || ver_code_entered == '0' || ver_code_entered == null)
        {
             $.wnoty({
                type: 'error',
                message: "Invalid Verification Code.",
                autohideDelay: 5000
            });

            $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else
        {

            var formatted = final_withdraw_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            $('.withdrawal_md_amt').html(formatted);

            $.ajax({
                url:'../../controller/scripts/affiliate/withdrawal/proceed_withdrawal.php',
                type:'POST',
                data:{"withdraw_amt":final_withdraw_amt,
                    "wallet_bal":wallet_bal,
                    "session":session,
                    "term":term,
                    "user_id":user_id,
                    "BankAccName":BankAccName,
                    "BankAccNo":BankAccNo,
                  "BankCode":BankCode,
                //   "storedtoken":storedtoken,
                  "ver_code_entered":ver_code_entered,
                  "transfer_fee_final":transfer_fee_final,
                  "withdrawal_recipient_code":withdrawal_recipient_code
                    
                },
                success:function(data){

                    console.log(data);

                    if(data == '1')
                    {
                        $.wnoty({
                            type: 'success',
                            message: "Transfer Successful.",
                            autohideDelay: 5000
                        });

                        $('#pros_withdrawModal2').modal('hide');

                        setTimeout(function() {
                            location.reload();
                        }, 3000); // 5000 milliseconds = 5 seconds

                    }
                    else if(data == '2')
                    {
                        $.wnoty({
                            type: 'error',
                            message: "An error occurred, Please reload your page and try again.",
                            autohideDelay: 5000
                        });

                        $('#pros_withdrawModal2').modal('hide');

                        setTimeout(function() {
                            location.reload();
                        }, 3000); // 5000 milliseconds = 5 seconds

                    }
                    else if(data == '4')
                    {
                        $.wnoty({
                            type: 'error',
                            message: "Invalid Verification Code.",
                            autohideDelay: 5000
                        });
                    }
                    else if(data == '3')
                    {
                        $.wnoty({
                            type: 'error',
                            message: "Insufficient Funds.",
                            autohideDelay: 5000
                        });

                        $('#pros_withdrawModal2').modal('hide');
                    }
                    else
                    {
                        $.wnoty({
                            type: 'error',
                            message: "An error occurred, Please reload your page and try again.",
                            autohideDelay: 5000
                        });

                        $('#pros_withdrawModal2').modal('hide');

                        setTimeout(function() {
                            location.reload();
                        }, 5000); // 5000 milliseconds = 5 seconds

                    }

                    $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');

                    $('.withdraw_amt').val('');
                    $('.n1').val('');
                    $('.n2').val('');
                    $('.n3').val('');
                    $('.n4').val('');
                    $('.n5').val('');
                    $('.n6').val('');

                }
            });
        }

    });


    const inputs = Array.from(document.getElementById("verification-input").children);

    function getFirstEmptyIndex() {
    	return inputs.findIndex((input) => input.value === "");
    }

    inputs.forEach((input, i) => {
    	input.addEventListener("keydown", (e) => {
    		if (e.key === "Backspace") {
    			if (input.value === "" && i > 0) {
    				inputs[i - 1].value = "";
    				inputs[i - 1].focus();
    			}

    			for (let j = i; j < inputs.length; j++) {
    				let value = inputs[j + 1] ? inputs[j + 1].value : "";
    				inputs[j].setRangeText(value, 0, 1, "start");
    			}
    		}

    		if (e.key === "ArrowLeft" && i > 0) {
    			inputs[i - 1].focus();
    		}

    		if (e.key === "ArrowRight" && i < inputs.length - 1) {
    			inputs[i + 1].focus();
    		}
    	});

    	input.addEventListener("input", (e) => {
    		input.value = "";

    		const start = getFirstEmptyIndex();
    		inputs[start].value = e.data;

    		if (start + 1 < inputs.length) inputs[start + 1].focus();
    	});

    	input.addEventListener("paste", (e) => {
    		e.preventDefault();

    		const text = (event.clipboardData || window.clipboardData).getData("text");
    		const firstEmpty = getFirstEmptyIndex();
    		const start = firstEmpty !== -1 ? Math.min(i, firstEmpty) : i;

    		for (let i = 0; start + i < inputs.length && i < text.length; i++) {
    			inputs[start + i].value = text.charAt(i);
    		}

    		inputs[Math.min(start + text.length, inputs.length - 1)].focus();
    	});

    	input.addEventListener("focus", () => {
    		const start = getFirstEmptyIndex();
    		if (start !== -1 && i > start) inputs[start].focus();
    	});
    });


    let countdownTime = 5 * 60; // 5 minutes in seconds
    let countdownElement = document.getElementById('countdown');
    let resendLink = document.getElementById('resendLink');
    let countdownInterval;

    function startCountdown() {
        // Clear any existing interval
        clearInterval(countdownInterval);

        // Reset the time
        countdownTime = 5 * 60;

        updateCountdownDisplay();
        resendLink.classList.add('disabled');
        resendLink.style.color = 'lightgrey';
        resendLink.removeEventListener('click', handleResendClick);

        countdownInterval = setInterval(() => {
            countdownTime--;

            if (countdownTime <= 0) {
                clearInterval(countdownInterval);
                countdownElement.textContent = '0:00';
                resendLink.classList.remove('disabled');
                resendLink.style.color = '#007ffb';
                resendLink.addEventListener('click', handleResendClick);
            } else {
                updateCountdownDisplay();
            }
        }, 1000);
    }

    function updateCountdownDisplay() {
        let minutes = Math.floor(countdownTime / 60);
        let seconds = countdownTime % 60;
        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    function handleResendClick(e) {
        e.preventDefault();
        send_code(); // your custom function
        startCountdown(); // restart from 5 minutes
    }

</script>