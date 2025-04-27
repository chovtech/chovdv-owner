<script>

    // verify withdrawal
    $('body').on('click', '.verify_withdrawal', function(){

        var withdraw_amt = parseFloat($('.withdraw_amt').val());

        var wallet_bal = parseFloat(<?php echo $WalletBal; ?>);

        var session = "<?php echo $pros_get_current_term_fetch['sessionName']; ?>";

        var term = "<?php echo $pros_get_current_term_fetch['TermOrSemesterID']; ?>";

        var user_id = "<?php echo $UserID; ?>";

        $('.verify_withdrawal').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');

        if (withdraw_amt < 500 || withdraw_amt === '' || withdraw_amt === null || withdraw_amt === undefined || isNaN(withdraw_amt))
        {
            $.wnoty({
                type: 'error',
                message: "A minimum of 500 is allowed.",
                autohideDelay: 5000
            });

            $('.verify_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else if(wallet_bal < withdraw_amt)
        {
             $.wnoty({
                type: 'error',
                message: "Insufficient Funds.",
                autohideDelay: 5000
            });

            $('.verify_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else
        {

            var formatted = withdraw_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            $('.withdrawal_md_amt').html(formatted);

            $.ajax({
                url:'../../controller/scripts/affiliate/withdrawal/verify_withdrawal.php',
                type:'POST',
                data:{"withdraw_amt":withdraw_amt, "wallet_bal":wallet_bal, "session":session, "term":term, "user_id":user_id},
                success: function(data) {

                    var verificationData = JSON.parse(data);

                    if (verificationData.status == 1)
                    {
                        $('#pros_withdrawModal').modal('hide');
                        $('#pros_withdrawModal2').modal('show');

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

    });

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

        minnify_innitialization();

        var withdraw_amt = parseFloat($('.withdraw_amt').val());

        var wallet_bal = parseFloat("<?php echo $WalletBal; ?>");

        var session = "<?php echo $pros_get_current_term_fetch['sessionName']; ?>";

        var term = "<?php echo $pros_get_current_term_fetch['TermOrSemesterID']; ?>";

        var user_id = "<?php echo $UserID; ?>";

        var BankAccName = "<?php echo $BankAccName; ?>";

        var BankAccNo = "<?php echo $BankAccNo; ?>";

        var BankCode = "<?php echo $BankCode; ?>";

        var storedtoken = localStorage.getItem('storedtoken');

        var n1 = $('.n1').val();
        var n2 = $('.n2').val();
        var n3 = $('.n3').val();
        var n4 = $('.n4').val();
        var n5 = $('.n5').val();
        var n6 = $('.n6').val();

        var ver_code_entered = n1+''+n2+''+n3+''+n4+''+n5+''+n6;

//         alert(ver_code_entered);

        $('.proceed_withdrawal').html('<i class="fas fa-spinner fa-spin" style="color:#ffffff;"></i>');

        if (withdraw_amt < 500 || withdraw_amt === '' || withdraw_amt === null || withdraw_amt === undefined || isNaN(withdraw_amt))
        {
            $.wnoty({
                type: 'error',
                message: "A minimum of 500 is allowed.",
                autohideDelay: 5000
            });

            $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else if(wallet_bal < withdraw_amt)
        {
             $.wnoty({
                type: 'error',
                message: "Insufficient Funds.",
                autohideDelay: 5000
            });

            $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');
        }
        else
        {

            var formatted = withdraw_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            $('.withdrawal_md_amt').html(formatted);

            $.ajax({
                url:'../../controller/scripts/affiliate/withdrawal/proceed_withdrawal.php',
                type:'POST',
                data:{"withdraw_amt":withdraw_amt,
                    "wallet_bal":wallet_bal,
                    "session":session,
                    "term":term,
                    "user_id":user_id,
                    "BankAccName":BankAccName,
                    "BankAccNo":BankAccNo,
                   "BankCode":BankCode,
                   "storedtoken":storedtoken,
                   "ver_code_entered":ver_code_entered},
                success:function(data){

//                     alert(data);
                    if(data == 1)
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
                    else if(data == 2)
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
                    else if(data == 4)
                    {
                        $.wnoty({
                            type: 'error',
                            message: "Invalid Verification Code.",
                            autohideDelay: 5000
                        });
                    }
                    else
                    {
                        $.wnoty({
                            type: 'error',
                            message: "Insufficient Funds.",
                            autohideDelay: 5000
                        });

                        $('#pros_withdrawModal2').modal('hide');
                    }

                    $('.proceed_withdrawal').html('<i class="fas fa-money-bill-wave"></i> Withdraw');

                    $('.withdraw_amt').val(0);
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


</script>


<script>
    let countdownTime = 5 * 60; // 5 minutes in seconds
    let countdownElement = document.getElementById('countdown');
    let resendLink = document.getElementById('resendLink');
    let countdownInterval;

    // Start countdown
    function startCountdown() {
        updateCountdownDisplay();
        resendLink.classList.add('disabled');
        resendLink.classList.remove('verify_withdrawal');
        resendLink.removeEventListener('click', handleResendClick); // Remove previous click if any

        countdownInterval = setInterval(() => {
            countdownTime--;

            if (countdownTime <= 0) {
                clearInterval(countdownInterval);
                countdownElement.textContent = '0:00';
                resendLink.classList.remove('disabled');
                resendLink.classList.add('verify_withdrawal');
                resendLink.addEventListener('click', handleResendClick);
            } else {
                updateCountdownDisplay();
            }
        }, 1000);
    }

    // Update the countdown display
    function updateCountdownDisplay() {
        let minutes = Math.floor(countdownTime / 60);
        let seconds = countdownTime % 60;
        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    // Handle resend click
    function handleResendClick(e) {
        e.preventDefault();
        // You can put your resend code logic here (e.g., send an AJAX request)

        // Restart the timer
        countdownTime = 5 * 60;
        startCountdown();
    }

    // Initial start
    startCountdown();
</script>