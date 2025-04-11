function ekene_get_function() {

    var ekene_inst = $('.abba-change-institution option:selected').val();

    $('#ekenecampus').html('<option value="NULL" Selected>Loading....</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/ekene-inset-asset.php",
        data: { institution: ekene_inst },
        success: function (output) {

            $('#ekenecampus').html(output);
        }
    });



    $('#ekenecategory').html('<option value="NULL" Selected>Loading....</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/ekene-category.php",
        success: function (output) {

            $('#ekenecategory').html(output);
        }
    });

}

$(document).ready(function () {
    ekene_get_function();
});

$('body').on('change', '.abba-change-institution', function () {
    ekene_get_function();
});

$('body').on('click', '#createvalue', function () {

    var ekene_inst = $('.abba-change-institution option:selected').val();

    var userID = $('#user_id').val();

    var usertype = $('#user_type').val();

    var ekene_campus = $('#ekenecampus option:selected').val();

    var ekene_category = $('#ekenecategory').val();

    var ekene_assetname = $('#ekeneassetname').val();

    var initial_value = $('#initialvalue').val();

    var ekene_quantity = $('#ekenequantity').val();

    var ekene_rate = $('#ekenerate').val();

    if (ekene_campus == '' || ekene_campus == 'NULL') {

        $("#ekenecampus").css("border-color", "Red");
    }
    else if (ekene_category == '' || ekene_category == 'NULL') {
        $("#ekenecategory").css("border-color", "Red");
        $("#ekenecampus").css("border-color", "green");
    }
    else if (ekene_assetname == '' || ekene_assetname == 'NULL') {
        $("#ekeneassetname").css("border-color", "Red");
        $("#ekenecategory").css("border-color", "green");
        $("#ekenecampus").css("border-color", "green");
    }
    else if (initial_value == '' || initial_value == 'NULL') {
        $("#initialvalue").css("border-color", "Red");
        $("#ekeneassetname").css("border-color", "green");
        $("#ekenecategory").css("border-color", "green");
        $("#ekenecampus").css("border-color", "green");
    }
    else if (ekene_quantity == '' || ekene_quantity == 'NULL') {
        $("#ekenequantity").css("border-color", "Red");
        $("#initialvalue").css("border-color", "green");
        $("#ekeneassetname").css("border-color", "green");
        $("#ekenecategory").css("border-color", "green");
        $("#ekenecampus").css("border-color", "green");
    }
    else if (ekene_rate == '' || ekene_rate == 'NULL') {
        $("#ekenerate").css("border-color", "Red");
        $("#ekenequantity").css("border-color", "green");
        $("#initialvalue").css("border-color", "green");
        $("#ekeneassetname").css("border-color", "green");
        $("#ekenecategory").css("border-color", "green");
        $("#ekenecampus").css("border-color", "green");
    }
    else {
        $("#ekenerate").css("border-color", "green");
        $("#ekenequantity").css("border-color", "green");
        $("#initialvalue").css("border-color", "green");
        $("#ekeneassetname").css("border-color", "green");
        $("#ekenecategory").css("border-color", "green");
        $("#ekenecampus").css("border-color", "green");

        $('#createvalue').html('<center><i class="fa fa-spinner fa-spin"></i> Creating...</center>');

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/assets/ekene-create.php",
            data: {
                USERID: userID,
                USERTYPE: usertype,
                ekenecampus: ekene_campus,
                institution: ekene_inst,
                ekenecategory: ekene_category,
                ekeneassetname: ekene_assetname,
                initialvalue: initial_value,
                ekenequantity: ekene_quantity,
                ekenerate: ekene_rate
            },
            success: function (output) {
                $('#createvalue').text("Create")
                if (output == 1) {
                    $.wnoty({
                        type: 'warning',
                        message: '<small>This asset already exist.</small>',
                        autohideDelay: 5000, // 5 seconds
                        position: 'top-right',
                        autohide: true
                    });
                }
                else if (output == 2) {
                    $.wnoty({
                        type: 'success',
                        message: '<small>Record successfully.</small>',
                        autohideDelay: 5000, // 5 seconds
                        position: 'top-right',
                        autohide: true
                    });
                    display_function ();
                }
                else {
                    $.wnoty({
                        type: 'error',
                        message: '<small>Record not created.</small>',
                        autohideDelay: 5000, // 5 seconds
                        position: 'top-right',
                        autohide: true
                    });
                }


            }
        });
    }
});

function ekene_function() {

    var ekene_inst = $('.abba-change-institution option:selected').val();

    $('#selectcampus').html('<option value="NULL" Selected>Loading....</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/ekene-inset-asset.php",
        data: { institution: ekene_inst },
        success: function (output) {

            $('#selectcampus').html(output);
        }
    });



    $('#selecttype').html('<option value="NULL" Selected>Loading....</option>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/ekene-category.php",
        success: function (output) {

            $('#selecttype').html(output);
        }
    });

}

$(document).ready(function () {
    ekene_function();
});

function display_function () {
    var emma_inst = $('.abba-change-institution option:selected').val();

    var userID1 = $('#user_id').val();

    var usertype2 = $('#user_type').val();

    var selectcampus = $('#selectcampus option:selected').val();

    var selecttype = $('#selecttype option:selected').val();
    $('#display_table').html('<div align="center"> <i class="fas fa-spinner fa-spin fs-1" style="color:#007ffb;"></i></div>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/display_asset.php",
        data: {
            institution1: emma_inst,
            USERID1: userID1,
            USERTYPE1: usertype2,
            selectcampus: selectcampus,
            selecttype: selecttype

        },

        success: function (output) {
           
            $('#display_table').html(output);


            // Initialize First Table
            $('#table1').DataTable({
                responsive: true
            });

            // Initialize Second Table
            $('#table2').DataTable({
                responsive: true
            });


        }

    });

}



$(document).ready(function(){

    display_function ();
    dashboard_function ();
   
});


function dashboard_function () {
    var ogukwe_inst = $('.abba-change-institution option:selected').val();
    var campus = $('#selectcampus option:selected').val();

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/dashboard.php",
        data: {
            ogukwe_inst: ogukwe_inst,
            campus: campus
           

        },
        success: function (output) {

                       $('#ekene_dashboard').html(output);
                       var totalassetvalue = $('#totalassetvalue').val();
                       var totalasset = $('#totalasset').val();
                         $('.total_asset').html(totalasset);
                         $('.asset_value').html(totalassetvalue);
                 }
    })
}


// $('#edit_asset_category').html('<option value="NULL" Selected>Loading....</option>');
// function ekene_edit_function() {
//     $.ajax({
//         type: "POST",
//         url: "../../controller/scripts/owner/assets/ekene_edit_category.php",
//         success: function (output) {

//             $('#edit_asset_category').html(output);
//         }
//     });
// }
// $(document).ready(function () {
//     ekene_edit_function();
// });



$("body").on('click', '#edit1', function () {

    var assetID = $(this).data('asset');
    var usercategoryid = $(this).data('category');
    var usercampusid = $(this).data('cam');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/edit_asset.php",
        data: {
            assetID: assetID,
            usercategoryid: usercategoryid,
            usercampusid: usercampusid

        },
        success: function (ekene) {
           
            $('#ekene-content').html(ekene);
        }
    });
});



$("body").on('click', '#editvalue', function () {

    // var ekene_inst = $('.abba-change-institution option:selected').val();

    // var userID = $('#user_id').val();

    // var usertype = $('#user_type').val();

    var edit_asset = $('#editasset').val();

    var edit_category = $('#edit_asset_category  option:selected').val();

    

    var edit_value = $('#editvalue').val();

    var edit_quantity = $('#editquantity').val();

    var editassetid = $('#editassetid').val();
    var edit_rate = $('#editrate').val();

    if (edit_asset == '' || edit_asset == 'NULL') {

        $("#editasset").css("border-color", "Red");
    }
    else if (edit_category == '' || edit_category == 'NULL') {
        $("#edit_asset_category").css("border-color", "Red");
        $("#editasset").css("border-color", "green");
    }
   
    else if (edit_value == '' || edit_value == 'NULL') {
        $("#editvalue").css("border-color", "Red");
      
        $("#edit_asset_category").css("border-color", "green");
        $("#editasset").css("border-color", "green");
    }
    else if (edit_quantity == '' || edit_quantity == 'NULL') {
        $("#editquantity").css("border-color", "Red");
        $("#editvalue").css("border-color", "green");
        $("#edit_asset_category").css("border-color", "green");
        $("#editasset").css("border-color", "green");
    }
    else if (edit_rate == '' || edit_rate == 'NULL') {
        $("#editrate").css("border-color", "Red");
        $("#editquantity").css("border-color", "green");
        $("#editvalue").css("border-color", "green");
        $("#edit_asset_category").css("border-color", "green");
        $("#editasset").css("border-color", "green");
    }
    else {
        $("#editrate").css("border-color", "green");
        $("#editquantity").css("border-color", "green");
        $("#editvalue").css("border-color", "green");
        $("#edit_asset_category").css("border-color", "green");
        $("#editasset").css("border-color", "green");

        $.ajax({
            type: "POST",
            url: "../../controller/scripts/owner/assets/edit_user_asset.php",
            data: {
                Userasset: edit_asset,
                Usercategory: edit_category,
                Uservalue: edit_value,
                Userquantity: edit_quantity,
                userrate: edit_rate,
                editassetid: editassetid
            },

            success: function(ekene) {
                $('#ekene-content').html(ekene);
                 
                display_function ();
            }
        })
    }

});

$("body").on('click', '#load_btn', function () {
    $('#load_btn').html('<center><i class="fa fa-spinner fa-spin fs-3"></i></center>');
    $('#load_btn').text("Load");
    display_function ();
    dashboard_function ();
});


$("body").on('click', '#delete', function() {

    var assetID = $(this).data('asset');
    
    $("#deleteuser").val(assetID);

});

$("body").on('click', '#deletebtn', function() {
    var deleteid = $("#deleteuser").val();
    $('#deletebtn').html(
        '<div class="spinner-border" role="status">  <span class="visually-hidden">Loading...</span></div>'
    );

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/assets/delete.php",
        data: {
            deleteid: deleteid
   },
        

        success: function(eken) {
            $('#deletebtn').html("Delete");
            $('#chisom').html(eken);
           
           
            display_function ();

        }
    });

});
