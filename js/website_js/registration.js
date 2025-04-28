// view password content
$(function() {
    $("#viewpassword").click(function() {
        $("#signinpassword").css('width', '80%');
        $("#signinpassword").css('border', 'none');
        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $("#signinpassword").attr("type", type);



    });


    $(".viewpassresest").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $("#Confirmpassword").attr("type", type);
        $("#password").attr("type", type);



    });


    $(".viewpassresestsignup").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";

        $(".signuppassword").attr("type", type);




    });

});



// view password content



// view password signup
$(function() {
    $("#signuppassicon").click(function() {
        // $(".signuppassword").css('width', '80%');
        // $("#signuppassword").css('border', 'none');
        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $(".signuppassword").attr("type", type);



    });
});
// view password signup 





// get number with country code
var MainNumber = window.intlTelInput(document.querySelector("#Phone"), {
    separateDialCode: true,
    preferredCountries: ["ng"],
    hiddenInput: "full",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});
// get number with country code