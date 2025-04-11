$("body").on("click","#emma_add_items_button",function(){
   var emmagetinstitution_id = $(".abba-change-institution").val();

   $(".emmaloadcampusforbudgeting").html("<option value='NULL'>Loading...</option>");

   $.ajax({
       type:'POST',
       url:'../../controller/scripts/owner/emma_budgeting/emma_get_campus_for_budgeting.php',
       data:{emma_send_institution:emmagetinstitution_id},
       success:function(outcome){
           $(".emmaloadcampusforbudgeting").html(outcome);
       }
   });

   $(".emmaloadsessionforbudgeting").html("<option value='NULL'>Loading...</option>");

	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_budgeting/emma_get_session_for_budgeting.php',
		data: { emma_send_the_institution: emmagetinstitution_id },
		success: function (session) {
			$(".emmaloadsessionforbudgeting").html(session);
		}
	});
});

$("body").on('change','.emmaloadcampusforbudgeting',function(){
    var emma_send_campus = $(this).val();

    $(".emmaloadtermforbudgeting").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_budgeting/emma_get_term_for_budgeting.php',
        data:{emma_send_campus_for_term:emma_send_campus},
        success:function(results){
            $(".emmaloadtermforbudgeting").html(results);
        }
    });

    $(".emmaloadcategorytypeforbudgeting").html("<option value='NULL'>Loading...</option>");

    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_budgeting/emma_get_categorytype_for_budgeting.php',
        data:{emma_send_campus_for_category:emma_send_campus},
        success:function(category){
            $(".emmaloadcategorytypeforbudgeting").html(category);
        }
    });
});

$("body").on("change",".emmaloadcategorytypeforbudgeting",function(){
    var emmagetthiscategoryvalue = $(this).val();
    var emmasendcampusforbudget = $(".emmaloadcampusforbudgeting").val();
    
    var datastring = "emma_category_id=" + emmagetthiscategoryvalue + "&emmacamp=" + emmasendcampusforbudget;
    
    $.ajax({
        type:'POST',
        url:'../../controller/scripts/owner/emma_budgeting/emma_get_categorytitle_for_budgeting.php',
        data:datastring,
        success:function(categorytitle){
            $(".emmaloadcategorytitleforbudgeting").html(categorytitle);
        }
    });
});


$("body").on("change",".emmacheckallforcategorytitle",function(){
    var emmagetdataid = $(this).data('id');

    if($(this).is(':checked')) {
        $(".emmacheckall"+emmagetdataid).prop('checked', true);
    } else {
        $(".emmacheckall"+emmagetdataid).prop('checked', false);
    }
});

// function uncheckcategorytitle() {
//     var anyUnchecked = $(".emmacheckall").filter(function() {
//         return !$(this).is(':checked');
//     }).length > 0;

//     $(".emmacheckallforcategorytitle").prop('checked', !anyUnchecked);
//     // uncheckcategorytitle();
// }

$("body").on("change",".emmageneralclassforsubcategorytitle",function(){

    var emmagetdataidforlenght = $(this).data('cate');

    var itemslength = $(".emmacheckall"+emmagetdataidforlenght).length;

    var getcheckedleng = $(".emmacheckall"+emmagetdataidforlenght + ':checked').length;

      if(getcheckedleng == itemslength )
      {
        $(".emmasubcategorytitle"+emmagetdataidforlenght).prop('checked', true); 

      }else{
        $(".emmasubcategorytitle"+emmagetdataidforlenght).prop('checked', false); 
      }
});

$("body").on("click","#emma_select_all_checkboxes",function(){
    if($(this).is(':checked')) {
        $(".emmageneralclassforsubcategorytitle").prop('checked', true);
        $(".emmacheckallforcategorytitle").prop('checked', true);
    } else {
        $(".emmageneralclassforsubcategorytitle").prop('checked', false);
        $(".emmacheckallforcategorytitle").prop('checked', false);
    }
});

$("body").on("click",".emmacheckallforcategorytitle",function(){
    
    var emmadataid = $(this).data('id');
    if($(this).is(':checked')) {
        $(".emmacheckall"+emmadataid).prop('checked', true);
    } else {
        $(".emmacheckall"+emmadataid).prop('checked', false);

    }
});

function uncheckselectall() {
    var anyUnchecked = $(".emmageneralclassforsubcategorytitle").filter(function() {
        return !$(this).is(':checked');
    }).length > 0;

    $("#emma_select_all_checkboxes").prop('checked', !anyUnchecked);
}

function uncheckselectallforsubtitle() {
    var anyUnchecked = $(".emmacheckallforcategorytitle").filter(function() {
        return !$(this).is(':checked');
    }).length > 0;

    $("#emma_select_all_checkboxes").prop('checked', !anyUnchecked);
}

$("body").on("click",".emmageneralclassforsubcategorytitle",function(){
    uncheckselectall();
});

$("body").on("click",".emmacheckallforcategorytitle",function(){
    uncheckselectallforsubtitle();
});

$("body").on('change','.emmageneralclassforsubcategorytitle',function(){
    var emma_sub_category_data_id = $(this).data('ide');
    var emma_category_data_id = $(this).data('cate');
    
    $(".emmaloaddataidforsubcategory").val(emma_sub_category_data_id);
    $(".emmaloaddataidforcategory").val(emma_category_data_id);
});

$("body").on("click","#emma_add_items_button",function(){
    $("#budgetModalforadditems").modal('hide');
});

$("body").on("click",".emmasubmitbutton",function(){
    var emma_campus_for_budgeting = $(".emmaloadcampusforbudgeting").val();
    var emma_session_for_budgeting = $(".emmaloadsessionforbudgeting").val();
    var emma_term_for_budgeting = $(".emmaloadtermforbudgeting").val();
    var emma_category_type_for_budgeting = $(".emmaloadcategorytypeforbudgeting").val();

   

    var emma_category_id_for_budgeting = [];
    var emma_subcategory_id_for_budgeting = [];
    var emma_sub_category_type_for_budgeting = [];

    $('.emmageneralclassforsubcategorytitle:checked').each(function() {

        var emmagetcheckedvalues = $(this).val();
        var categoryid = $(this).data('cate');
        var subcategoryid = $(this).data('ide');
       

        if(emmagetcheckedvalues == 'NULL' || emmagetcheckedvalues == '') {

            emma_sub_category_type_for_budgeting.push('');
            emma_subcategory_id_for_budgeting.push('');
            emma_category_id_for_budgeting.push('');
        }else{
            emma_sub_category_type_for_budgeting.push($(this).val());
            emma_subcategory_id_for_budgeting.push(subcategoryid);
            emma_category_id_for_budgeting.push(categoryid);
        }
    });

    
    $(".emmaloadtablecontent").html('<div align="center" class="mt-3"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

    if(emma_campus_for_budgeting == '' || emma_campus_for_budgeting == 'NULL'){
        $.wnoty({
			type: 'warning',
			message: "Select Campus",
			autohideDelay: 5000
		});
    }else if(emma_session_for_budgeting == '' || emma_session_for_budgeting == 'NULL'){
        $.wnoty({
			type: 'warning',
			message: "Select Session",
			autohideDelay: 5000
		});
    }else if(emma_term_for_budgeting == '' || emma_term_for_budgeting == 'NULL'){
        $.wnoty({
			type: 'warning',
			message: "Select Term",
			autohideDelay: 5000
		});
    }else if(emma_category_type_for_budgeting == '' || emma_category_type_for_budgeting == 'NULL'){
        
        $.wnoty({
			type: 'warning',
			message: "Select Category",
			autohideDelay: 5000
		});

    }else if(emma_sub_category_type_for_budgeting.length === 0){

        $.wnoty({
			type: 'warning',
			message: "Select at least one sub-category",
			autohideDelay: 5000
		});

    }else{
       
        var datastring = "campusbudgeting=" + emma_campus_for_budgeting + "&sessionbudgeting=" + emma_session_for_budgeting + "&termbudgeting=" + emma_term_for_budgeting
        + "&categorytypebudgeting=" + emma_category_type_for_budgeting + "&emmacategorydataid=" + emma_category_id_for_budgeting + "&emmasubcategorydataid=" + 
        emma_subcategory_id_for_budgeting + "&subcategorytypebudgeting=" + emma_sub_category_type_for_budgeting;


        emma_category_id_for_budgeting = emma_category_id_for_budgeting.toString();
        emma_subcategory_id_for_budgeting = emma_subcategory_id_for_budgeting.toString();
        emma_sub_category_type_for_budgeting = emma_sub_category_type_for_budgeting.toString();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_display_budgeting_values.php',
            data:datastring,
            success:function(insert){
                $(".emmaloadtablecontent").html(insert);
            }
        });
    }
});



$("body").on('input', '.emmasetandcalculatebudgetamount', function(e){

    // Get the current cursor position
    var cursorPosition = getCaretPosition(this);
    
    // Get the text content of the element
    var editbudgetinputfieldold = $(this).text().trim();
    
    // Remove the currency sign '₦' and commas from the text
    var numberStr = editbudgetinputfieldold.replace(/[^\d.]/g, '');
    
    // Convert the text to a floating-point number
    var editbudgetinputfield = parseFloat(numberStr);

    // Check if the conversion resulted in a valid number
    if (!isNaN(editbudgetinputfield)) {
        var data_id_for_budgeted_amount = $(this).data('id');
        var emmaactualamount = parseFloat($(".emmainputforactualamount" + data_id_for_budgeted_amount).val());
        
        var emmasubstractbudgetamountfromactual = emmaactualamount - editbudgetinputfield;


        // Format the difference amount as currency
        const formatter_for_difference_amount = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
        const formattedNumber_for_difference_amount = formatter_for_difference_amount.format(emmasubstractbudgetamountfromactual);

        // const formatter_for_total_budget = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
        // const formattedNumber_for_total_budget = formatter_for_total_budget.format(emmasumupbudgetedamount);

        // Update the difference column
        $(".emmadifferencecolumn"+data_id_for_budgeted_amount).text(formattedNumber_for_difference_amount);
        // $(".emmaloadtotalbudgetedamount").text(formattedNumber_for_total_budget);

        // Format the edited budget amount as currency
        const formatter_for_budget_amount = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
        const formattedNumber_for_budget_amount = formatter_for_budget_amount.format(editbudgetinputfield);
        
        // Update the input element with the formatted budget amount
        $(this).text(formattedNumber_for_budget_amount);
    }

    // Set the cursor position back to its original location
    setCaretPosition(this, cursorPosition);

    collectTableValues();

    var emmaamountforbudget = [];
    var emmaamountfordifference = [];


    // emma total budget 
    $.each($(".emmasetandcalculatebudgetamount"), function () {
        var emmagetthisbudgetedamount = $(this).text();
        // Use regex to extract only numeric values
        var numericValue = parseFloat(emmagetthisbudgetedamount.replace(/[^0-9.-]+/g,""));
        if (!isNaN(numericValue)) {
            emmaamountforbudget.push(numericValue);
        }
    });

    var sum = emmaamountforbudget.reduce((a, b) => a + b, 0);

    const formatter_for_budget_total = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
        const formattedNumber_for_budget_total = formatter_for_budget_total.format(sum);
    $(".emmaloadtotalbudgetedamount").html(formattedNumber_for_budget_total);


    // emma total difference 
    $.each($(".emmasetandcalculatedifferenceamount"), function () {
        var emmagetthisdifferenceamount = $(this).text();
        // Use regex to extract only numeric values
        var numericValue = parseFloat(emmagetthisdifferenceamount.replace(/[^0-9.-]+/g,""));
        if (!isNaN(numericValue)) {
            emmaamountfordifference.push(numericValue);
        }
    });

    var sum = emmaamountfordifference.reduce((a, b) => a + b, 0);

    const formatter_for_difference_total = new Intl.NumberFormat('en-NG', { style: 'currency', currency: 'NGN' });
        const formattedNumber_for_difference_total = formatter_for_difference_total.format(sum);
    $(".emmaloadtotaldifferenceamount").html(formattedNumber_for_difference_total);

});


// document.getElementById("emmasetandcalculatebudgetamount").addEventListener("keypress", function(event) {
//     // Prevent the default action of inserting text
//     event.preventDefault();
// });

    // Function to get the current cursor position in a contenteditable element
    function getCaretPosition(element) {
        var caretOffset = 0;
        var doc = element.ownerDocument || element.document;
        var win = doc.defaultView || doc.parentWindow;
        var sel;
        if (typeof win.getSelection != "undefined") {
            sel = win.getSelection();
            if (sel.rangeCount > 0) {
                var range = win.getSelection().getRangeAt(0);
                var preCaretRange = range.cloneRange();
                preCaretRange.selectNodeContents(element);
                preCaretRange.setEnd(range.endContainer, range.endOffset);
                caretOffset = preCaretRange.toString().length;
            }
        } else if ((sel = doc.selection) && sel.type != "Control") {
            var textRange = sel.createRange();
            var preCaretTextRange = doc.body.createTextRange();
            preCaretTextRange.moveToElementText(element);
            preCaretTextRange.setEndPoint("EndToEnd", textRange);
            caretOffset = preCaretTextRange.text.length;
        }
        return caretOffset;
    }

    // Function to set the cursor position in a contenteditable element
    function setCaretPosition(element, pos) {
        var range, selection;
        if (document.createRange) {
            // For modern browsers
            range = document.createRange();
            if (element.childNodes[0] && element.childNodes[0].length >= pos) {
                range.setStart(element.childNodes[0], pos); // Set the start position of the range
            } else {
                range.setStart(element, 0);
            }
            range.collapse(true); // Collapse the range to the start
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range); // Add the range to the selection
        } else if (document.selection) {
            // For older versions of Internet Explorer
            range = document.body.createTextRange();
            range.moveToElementText(element);
            range.moveStart("character", pos); // Move the start of the range by the specified number of characters
            range.collapse(true); // Collapse the range to the start
            range.select(); // Select the range
        }
    }
    

    function collectTableValues() {
        var tableValues = [];
        $(".emmasetandcalculatebudgetamount").each(function(){
            var cellValue = parseFloat($(this).text().replace(/[^\d.]/g, ''));
            if (!isNaN(cellValue)) {
                tableValues.push(cellValue);
            }
        });
    }

    
    $("body").on("click",".emmaproceedandinsertbuttonforbudgeting",function(){

        var emma_campus_id_for_budgeting = $(".emmaloadcampusforbudgeting").val();
        var emma_session_type_for_budgeting = $(".emmaloadsessionforbudgeting").val();
        var emma_term_id_for_budgeting = $(".emmaloadtermforbudgeting").val();
        var emma_category_type_for_budgeting = $(".emmaloadcategorytypeforbudgeting").val();
        var emma_data_id_for_sub_category = [];
        var emma_actual_amount_for_budgeting = [];
        var emma_budgeted_amount_for_budgeting = [];
        var emma_difference_amount_for_budgeting = [];

        $.each($(".emmasubcategoryidforbudgeting"), function () {
            var emmagetthissubcategorydataid = $(this).val();
    
            if (emmagetthissubcategorydataid == 'NULL' || emmagetthissubcategorydataid == '') {
                emma_data_id_for_sub_category.push('');
            } else {
                emma_data_id_for_sub_category.push($(this).val());
            }
        });

        $.each($(".emmasetandcalculateactualamount"), function () {
            var emmagetthisactualamount = $(this).text().replace('₦', '').replace(/,/g, '');

            if(emmagetthisactualamount == '' || emmagetthisactualamount == 'NULL'){
                $.wnoty({
                    type: 'warning',
                    message: "No Input Should be Empty",
                    autohideDelay: 5000
                });
                emma_actual_amount_for_budgeting.push('');
            } else {
                emma_actual_amount_for_budgeting.push(emmagetthisactualamount);
            }
        });
    

        $.each($(".emmasetandcalculatebudgetamount"), function () {
            var emmagetthisbudgetamount = $(this).text().replace('₦', '').replace(/,/g, '');

            if(emmagetthisbudgetamount == '' || emmagetthisbudgetamount == 'NULL'){
                emma_budgeted_amount_for_budgeting.push('');
            } else {
                emma_budgeted_amount_for_budgeting.push(emmagetthisbudgetamount);
            }
        });
       
        $.each($(".emmasetandcalculatedifferenceamount"), function () {
            var emmagetthisdifference_amount = $(this).text().replace('₦', '').replace(/,/g, '');

            if(emmagetthisdifference_amount == '' || emmagetthisdifference_amount == 'NULL'){
                emma_difference_amount_for_budgeting.push('');
            } else {
                emma_difference_amount_for_budgeting.push(emmagetthisdifference_amount);
            }
        });
        
        var datastring = "emma_budget_camp_id=" + emma_campus_id_for_budgeting + "&emma_budget_session=" + emma_session_type_for_budgeting + 
        "&emma_budget_term_id=" + emma_term_id_for_budgeting + "&emma_budget_category=" + emma_category_type_for_budgeting + "&emma_budget_sub_category_data_id=" + emma_data_id_for_sub_category + "&emma_budget_actual_amt=" + 
        emma_actual_amount_for_budgeting + "&emma_budget_budgeted_amt=" + emma_budgeted_amount_for_budgeting + "&emma_budget_difference_amt=" + 
        emma_difference_amount_for_budgeting;


        emma_data_id_for_sub_category = emma_data_id_for_sub_category.toString();
        emma_actual_amount_for_budgeting = emma_actual_amount_for_budgeting.toString();
        emma_budgeted_amount_for_budgeting = emma_budgeted_amount_for_budgeting.toString();
        emma_difference_amount_for_budgeting = emma_difference_amount_for_budgeting.toString();
        
        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_insert_budget.php',
            data:datastring,
            success:function(outcome){
          
                if(outcome == 1){
                    $("#budgetModal2").modal('hide');
                    $("#addItemsModalfordropdowns").modal('hide');
                    
                    $.wnoty({
                        type: 'success',
                        message: "Budget Created Successfully",
                        autohideDelay: 5000
                    });

                }
                else
                {
                    $.wnoty({
                        type: 'warning',
                        message: "Budget Not Created",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });

    $(document).ready(function(){
        var emmagetinstitution_id = $(".abba-change-institution").val();
        
        $("#emma_load_campus_for_budget").html("<option value='NULL'>Loading...</option>");

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_get_campus_for_display.php',
            data:{institutionID:emmagetinstitution_id},
            success:function(campusid){
                $("#emma_load_campus_for_budget").html(campusid);
            }
        });

        $("#emma_load_session_for_budget").html("<option value='NULL'>Loading...</option>");

        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/emma_budgeting/emma_get_session_for_display.php',
            data: { emma_send_the_institution: emmagetinstitution_id },
            success: function (session) {
                $("#emma_load_session_for_budget").html(session);
            }
        });
    });

    $("body").on('change','#emma_load_campus_for_budget',function(){
        var emma_send_campus = $(this).val();
    
        $("#emma_load_term_for_budget").html("<option value='NULL'>Loading...</option>");

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_get_term_for_display.php',
            data:{emma_send_campus_for_term:emma_send_campus},
            success:function(term){
                $("#emma_load_term_for_budget").html(term);
            }
        });
    });

    $("body").on("click","#emmaloadbudgetingvalues",function(){
        emmaloaddatatablecontents();
    });

    function emmaloaddatatablecontents(){

        var emma_campus_id_for_budgeting = $("#emma_load_campus_for_budget").val();
        var emma_session_type_for_budgeting = $("#emma_load_session_for_budget").val();
        var emma_term_id_for_budgeting = $("#emma_load_term_for_budget").val();
        var emma_category_type_for_budgeting = $("#emma_load_category_for_budget").val();

        if(emma_campus_id_for_budgeting == '' || emma_campus_id_for_budgeting == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select Campus",
                autohideDelay: 5000
            });
        }else if(emma_session_type_for_budgeting == '' || emma_session_type_for_budgeting == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select Session",
                autohideDelay: 5000
            });
        }else if(emma_term_id_for_budgeting == '' || emma_term_id_for_budgeting == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select Term",
                autohideDelay: 5000
            });
        }else if(emma_category_type_for_budgeting == '' || emma_category_type_for_budgeting == 'NULL'){
            $.wnoty({
                type: 'warning',
                message: "Select TransactionType",
                autohideDelay: 5000
            });
        }else{
            var datastring = "emmacampusload=" + emma_campus_id_for_budgeting + "&emmasessionload=" + emma_session_type_for_budgeting + 
            "&emmatermload=" + emma_term_id_for_budgeting + "&emmacategoryload=" + emma_category_type_for_budgeting;
            
            $.ajax({
                type:'POST',
                url:'../../controller/scripts/owner/emma_budgeting/emma_load_datatable_values.php',
                data:datastring,
                success:function(budget){
                    $(".emmaloadbudgettable").html(budget);

                    $(document).ready(function(){
                        $('#emmaloadtable').DataTable({
                            responsive: true
                        });
                    });
                }
            })
        }
    }

    $("body").on("click","#emmaediticon",function(){

        var emma_data_id = $(this).data('id');
        var emma_data_budget = $(this).data('budget');
        var emma_data_campus = $(this).data('campus');
        var emma_data_sub_category = $(this).data('subcategory');
        var emma_data_sub_title = $(this).data('subtitle');
        var emma_data_difference = $(this).data('difference');
        var emma_data_actual_amount = $(this).data('actualamount');
        var emma_data_actual_amount_hidden = $(this).data('actualamounthidden');


        $(".emma_budget_edit_data_id").val(emma_data_id);
        $(".emma_budget_edit_data_budget").val(emma_data_budget);
        $(".emma_budget_edit_campus_id").val(emma_data_campus);
        $(".emma_budget_edit_sub_category_id").val(emma_data_sub_category);
        $(".emma_budget_edit_sub_title").html(emma_data_sub_title);
        $(".emma_budget_edit_difference").val(emma_data_difference);
        $(".emma_budget_edit_actual_amount").html(emma_data_actual_amount);
        $(".emma_budget_edit_actual_amount_hidden").val(emma_data_actual_amount_hidden);

    });


    $("body").on('input', '.emma_budget_edit_data_budget', function(e){
        console.log("Input event captured."); // Log to check if the input event is being captured
        
        // Get the current cursor position
        var cursorPosition = getCaretPositionedit(this);
        
        // Get the text content of the element
        var editbudgetinputfieldoldedit = $(this).val().trim();
        
        // Remove any non-numeric characters from the text
        var numberStredit = editbudgetinputfieldoldedit.replace(/[^\d.]/g, ''); // Only digits and dot are allowed
        
        // Convert the text to a floating-point number
        var editbudgetinputfieldedit = parseFloat(numberStredit);
    
        // Check if the conversion resulted in a valid number
        if (!isNaN(editbudgetinputfieldedit)) {
            // Update the value of the input field with the filtered numeric input
            $(this).val(numberStredit);
            
            // Set the cursor position back to its original location
            setCaretPositionedit(this, cursorPosition);
            
            // var data_id_for_budgeted_amount = $(this).data('id');
            var emmaactualamount = parseFloat($(".emma_budget_edit_actual_amount_hidden").val());
          
            var emmasubstractbudgetamountfromactualamountedit = emmaactualamount - editbudgetinputfieldedit;

            // Update the difference column
            $(".emma_budget_edit_difference").val(emmasubstractbudgetamountfromactualamountedit);
        }
    
        collectTableValuesedit(); // Collect table values after handling input
    
    });
    
        // Function to get the current cursor position in a contenteditable element
        function getCaretPositionedit(element) {
            var caretOffset = 0;
            var doc = element.ownerDocument || element.document;
            var win = doc.defaultView || doc.parentWindow;
            var sel;
            if (typeof win.getSelection != "undefined") {
                sel = win.getSelection();
                if (sel.rangeCount > 0) {
                    var range = win.getSelection().getRangeAt(0);
                    var preCaretRange = range.cloneRange();
                    preCaretRange.selectNodeContents(element);
                    preCaretRange.setEnd(range.endContainer, range.endOffset);
                    caretOffset = preCaretRange.toString().length;
                }
            } else if ((sel = doc.selection) && sel.type != "Control") {
                var textRange = sel.createRange();
                var preCaretTextRange = doc.body.createTextRange();
                preCaretTextRange.moveToElementText(element);
                preCaretTextRange.setEndPoint("EndToEnd", textRange);
                caretOffset = preCaretTextRange.text.length;
            }
            return caretOffset;
        }
        
        // Function to set the caret position in an editable element
        function setCaretPositionedit(element, pos) {
            var range, selection;
            if (document.createRange) {
                // For modern browsers
                range = document.createRange();
                if (element.childNodes[0] && element.childNodes[0].length >= pos) {
                    range.setStart(element.childNodes[0], pos); // Set the start position of the range
                } else {
                    range.setStart(element, 0);
                }
                range.collapse(true); // Collapse the range to the start
                selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range); // Add the range to the selection
            } else if (document.selection) {
                // For older versions of Internet Explorer
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.moveStart("character", pos); // Move the start of the range by the specified number of characters
                range.collapse(true); // Collapse the range to the start
                range.select(); // Select the range
            }
        }
        
        // Function to collect table values
        function collectTableValuesedit() {
            var tableValues = [];
            $(".emma_budget_edit_data_budget").each(function(){
                var cellValue = parseFloat($(this).val().replace(/[^\d.]/g, ''));
                if (!isNaN(cellValue)) {
                    tableValues.push(cellValue);
                }
            });
        }

    $("body").on("click",".emma_edit_budget_button",function(){

        var edit_data_id = $(".emma_budget_edit_data_id").val();
        var edit_actual = $(".emma_budget_edit_actual_amount_hidden").val();
        var edit_budget = $(".emma_budget_edit_data_budget").val();
        var edit_campus_id = $(".emma_budget_edit_campus_id").val();
        var edit_sub_category_id = $(".emma_budget_edit_sub_category_id").val();
        var edit_budget_amount = $(".emma_budget_edit_difference").val();

        var datastring = "editdataid=" + edit_data_id + "&editactual=" + edit_actual + "&emmabudget=" + edit_budget + "&emmacampusid=" + edit_campus_id + "&emmasubcategoryid=" + edit_sub_category_id + "&edit_budget_amount=" + edit_budget_amount;

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_edit_for_budgeting.php',
            data:datastring,
            success:function(editbudget){
                if(editbudget == 1){

                    emmaloaddatatablecontents();

                    $.wnoty({
                        type: 'success',
                        message: "Budget Updated Successfully",
                        autohideDelay: 5000
                    });
                    $("#edditbudget").modal('hide');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Budget Not Updated",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });

    $("body").on("click","#emmadeleteicon",function(){
        var emma_data_id_delete = $(this).data('id');
        var emma_data_campus_delete = $(this).data('campus');
        var emma_data_subcategory_delete = $(this).data('campus');


        $(".emma_budget_delete_data_id").val(emma_data_id_delete);
        $(".emma_budget_delete_campus_id").val(emma_data_campus_delete);
        $(".emma_budget_delete_sub_category_id").val(emma_data_subcategory_delete);

    });
    
    $("body").on("click","#emmadeleteicon",function(){
        var emmagetinstitution_id_for_display = $(".abba-change-institution").val();

        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_delete_display_image.php',
            data:{institution:emmagetinstitution_id_for_display},
            success:function(displaydeleteimg){
                $(".displaydeleteimg").html(displaydeleteimg);
            }
        });
    });

    $("body").on("click",".emma_delete_budget_button",function(){
        var edit_data_id_for_delete = $(".emma_budget_delete_data_id").val();
        var edit_campus_id_for_delete = $(".emma_budget_delete_campus_id").val();

        var datastring = "deletedataidfordelete=" + edit_data_id_for_delete + "&deletecampusidfordelete=" + edit_campus_id_for_delete;


        $.ajax({
            type:'POST',
            url:'../../controller/scripts/owner/emma_budgeting/emma_delete_for_budgeting.php',
            data:datastring,
            success:function(deletebudget){

                if(deletebudget == 1){
                    $.wnoty({
                        type: 'success',
                        message: "Budget Deleted Successfully",
                        autohideDelay: 5000
                    });
                    emmaloaddatatablecontents();
                    $("#deletebudget").modal('hide');
                }else{
                    $.wnoty({
                        type: 'warning',
                        message: "Budget Not Deleted",
                        autohideDelay: 5000
                    });
                }
            }
        });
    });