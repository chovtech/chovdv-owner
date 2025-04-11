
$(document).ready(function () {
    abba_get_dashboard_content();
    
    var prosgetinstition = $('.abba-change-institution option:selected').data('id');
    
  
      
      prosloadadmincalendarhere(prosgetinstition);
});


$('body').on('change', '.abba-change-institution', function () {

    abba_get_dashboard_content();
    
     var prosgetinstition = $('.abba-change-institution option:selected').data('id');
    
      prosloadadmincalendarhere(prosgetinstition);
});


function abba_get_dashboard_content() {
    
    var abba_instituion_id = $('.abba-change-institution option:selected').data('id');
    
    var user_id = $('#user_id').val();

    $('#get_total_students').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#abba_display_stud_increase').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#student_owing').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#student_payed').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#total_income').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#total_expected_income').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#total_dept').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#upcoming_birthdays').html('<i class="fa fa-spinner fa-spin"></i>');

    $('#best_student').html('<i class="fa fa-spinner fa-spin"></i>');
    
    $('#wallet_balance').html('<i class="fa fa-spinner fa-spin"></i>');
    
    $('#abba_student_average').html('<i class="fa fa-spinner fa-spin"></i>');
    
    $('#student_owing_percent').html('<i class="fa fa-spinner fa-spin"></i>');
            
    $('#student_payed_percent').html('<i class="fa fa-spinner fa-spin"></i>');

    $.ajax({
        type: "POST",
        url: "../../controller/scripts/owner/dashboard_data/abba_dashboard_data.php",
        data: { abba_instituion_id: abba_instituion_id, user_id: user_id },
        //cache: false,
        success: function (output) {

            console.log(output);

            var jsonData = JSON.parse(output);

            var tot_stud = jsonData.total_students;

            var get_tot_stud_increase = jsonData.total_students_percent;

            var tot_parent = jsonData.total_parent;

            var tot_staff = jsonData.total_staff;

            var student_owing = jsonData.student_owing;

            var student_payed = jsonData.student_payed;

            var total_income = jsonData.total_income;

            var total_expected_income = jsonData.total_expected_income;

            var total_dept = jsonData.total_dept;
            
            var upcoming_birthdays = jsonData.upcoming_birthdays;

            var best_student = jsonData.best_student;
            
            var wallet_balance = jsonData.wallet_balance;
            
            var abba_student_average = jsonData.abba_student_average;
            
            var student_owing_percent = jsonData.student_owing_percent;
            
            var student_payed_percent = jsonData.student_payed_percent;

            var tot_stud_comma = tot_stud.replace(/,/g, '');
            
            var tot_parent_comma = tot_parent.replace(/,/g, '');

            var tot_staff_comma = tot_staff.replace(/,/g, '');

            $('#get_total_students').html(tot_stud);

            $('#abba_display_stud_increase').html(get_tot_stud_increase);

            $('#student_owing').html(student_owing);

            $('#student_payed').html(student_payed);

            $('#total_income').html(total_income);

            $('#total_expected_income').html(total_expected_income);

            $('#total_dept').html(total_dept);

            $('#upcoming_birthdays').html(upcoming_birthdays);

            $('#best_student').html(best_student);

            $('#wallet_balance').html(wallet_balance);
            
            $('#abba_student_average').html(abba_student_average);
            
            $('#student_owing_percent').html(student_owing_percent);
            
            $('#student_payed_percent').html(student_payed_percent);
            

            
            // ///----Bar Chart---------

            var barChartOptions = {
                series: [{
                    data: [tot_staff_comma, tot_stud_comma, tot_parent_comma]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    events: {
                        click: function (chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },

                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: [
                        ['Staffs'],
                        ['Students'],
                        ['Parents'],
                    ],
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                }
            };

            var barchart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
            barchart.render();

        }
    });
}



// pros admin calender or event here
    function prosloadadmincalendarhere(prosgetinstition)
    {
        
        
                 $.ajax({
                    type: "POST",
                    url: "../../controller/scripts/owner/dashboard_data/prosloadadmincalendar.php",
                    data: {prosgetinstition:prosgetinstition},
                    //cache: false,
                    success: function (output) {
                        
                        $('.prosloadcalendforadmin').html(output);
                    
                    }
                 });
    }

// pros admin calender or event here