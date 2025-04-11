$(document).ready(function () {
	var CURRENT_DATE = new Date();
	var d = new Date();

	var content = 'January February March April May June July August September October November December'.split(' ');
	var weekDayName = 'SUN MON TUES WED THURS FRI'.split(' ');
	var daysOfMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];


	// Returns the day of week which month starts (eg 0 for Sunday, 1 for Monday, etc.)
	function getCalendarStart(dayOfWeek, currentDate) {
		var date = currentDate - 1;
		var startOffset = (date % 7) - dayOfWeek;
		if (startOffset > 0) {
			startOffset -= 7;
		}
		return Math.abs(startOffset);
	}

	// Render Calendar
	function renderCalendar(startDay, totalDays, currentDate,) {
		var currentRow = 1;
		var currentDay = startDay;
		var $table = $('table');
		var $week = getCalendarRow();
		var $day;
		var i = 1;

		var year = currentDate.getFullYear();
		var month = currentDate.getMonth() + 1;
		var emmaday = currentDate.getDate();

		var emma_currentDate = new Date();

		// Get the current year, month, and day
		var emma_year = emma_currentDate.getFullYear();
		var emma_month = emma_currentDate.getMonth() + 1;
		var emma_days = emma_currentDate.getDate();

		if (month < 10) {
			var emma_get_current_month = '0' + month;
		} else {
			var emma_get_current_month = month;
		}

		for (; i <= totalDays; i++) {

			if (i < 10) {
				var emma_get_current_day = '0' + i;
			} else {
				var emma_get_current_day = i;
			}

			$day = $week.find('td').eq(currentDay);
			$day.text(i);

			$day.addClass('emmacalender' + year + emma_get_current_month + emma_get_current_day+' emmacalender');

			$day.attr({
				'data-year': year,
				'data-month': emma_get_current_month,
				'data-day': emma_get_current_day,
				'data-bs-toggle': "modal",
				'data-bs-target': "#emma_calender_launch_update_and_delete_modal"
			});

			if (i === emma_days && month === emma_month && year === emma_year) {
				$('.emmacalender' + year + emma_get_current_month + emma_get_current_day).addClass('today');
			} else {

			}
			// +1 next day until Saturday (6), then reset to Sunday (0)
			currentDay = ++currentDay % 7;

			// Generate new row when the day is Saturday, but only if there are
			// additional days to render
			if (currentDay === 0 && (i + 1 <= totalDays)) {
				$week = getCalendarRow();
				currentRow++;
			}
		}
	}

	// Clear generated calendar
	function clearCalendar() {
		var $trs = $('tr').not(':eq(0)');
		$trs.remove();
		$('.month-year').empty();
	}

	// Generates table row used when rendering Calendar
	function getCalendarRow() {
		var $table = $('table');
		var $tr = $('<tr/>');
  
		for (var i = 0; i < 7; i++) {
		  var $td = $('<td/>');
		  $tr.append($td);
		}

		$table.append($tr);
		return $tr;
	  }

	function myCalendar() {
		var month = d.getUTCMonth();
		var day = d.getUTCDay();
		var year = d.getUTCFullYear();
		var date = d.getUTCDate();
		var totalDaysOfMonth = daysOfMonth[month];
		var counter = 1;

		var $h3 = $('<h3>');

		$h3.text(content[month] + ' ' + year);
		$h3.appendTo('.month-year');

		var currentDate = new Date(year, month, date);  // Create a Date object

		// Determine if Month && Year are current for Date Highlight
		if (CURRENT_DATE.getUTCMonth() === month && CURRENT_DATE.getUTCFullYear() === year) {
			dateToHighlight = date;
		}

		// Getting February Days Including The Leap Year
		if (month === 1) {
			if ((year % 100 !== 0) && (year % 4 === 0) || (year % 400 === 0)) {
				totalDaysOfMonth = 29;
			}
		}

		// Get Start Day
		renderCalendar(getCalendarStart(day, date), totalDaysOfMonth, currentDate);
	}


	function navigationHandler(dir) {
		d.setUTCMonth(d.getUTCMonth() + dir);
		clearCalendar();
		myCalendar();
		emma_institution_id();
	}

	// Bind Events
	$('.prev-month').click(function () {
		navigationHandler(-1);
	});
	$('.next-month').click(function () {
		navigationHandler(1);
	});

	// Generate Calendar
	myCalendar();
});

$(document).ready(function () {

	var emma_institution_id_for_calender = $(".abba-change-institution").val();

	$("#emma_load_session").html("<option value='NULL'>Loading...</option>");

	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_calender/emma_get_session.php',
		data: { emma_send_the_institution: emma_institution_id_for_calender },
		success: function (output) {
			$("#emma_load_session").html(output);
		}
	});

	$("#emma_load_term").html("<option value='NULL'>Loading...</option>");

	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_calender/emma_get_term.php',
		data: { emma_send_the_institution_term: emma_institution_id_for_calender },
		success: function (termoutcome) {
			$("#emma_load_term").html(termoutcome);
		}
	});

});

var currentEventNumber = 1; // Initialize the current event number

// Function to update event numbers
function updateEventNumbers() {
	$('.emma_calender_purpose_card').each(function (index) {
		var newEventNumber = index + 1;
		$(this).find('.card-header').text('Event ' + newEventNumber);
	});
}

function emmaloadpurposes(){
	var emma_institution_id_for_calender_purpose = $(".abba-change-institution").val();

	$('#emma_load_purpose_values_for_calender').html("<option value='NULL'>Loading...</option>");

	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_calender/emma_create_calender_purposes.php',
		data: { emma_send_institution_for_purpose: emma_institution_id_for_calender_purpose },
		success: function (outcome) {
			$("#emma_load_purpose_values_for_calender").html(outcome);
		}
	});
}

$(document).ready(function(){
    var emma_institution_id_for_calender = $(".abba-change-institution").val();

	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_calender/emma_create_calender_event.php',
		data: { emma_send_institution: emma_institution_id_for_calender },
		success: function (outcome) {
// 			alert(outcome);
			localStorage.setItem('emma_load_purposes', outcome);
			// localStorage.setItem('emmaloadpurposesforfirstcard', outcome);

		}
	});
});

// Emma Function to add a new card
function addNewCard() {

	var removeIconHtml = currentEventNumber > 1 ?
		'<i class="fa fa-times fs-4 text-danger float-end remove_purpose_card" style="cursor:pointer;"></i>' :
		'';

	var emmaloadpurposeandtitleforcalender =
		'<div class="card mt-3 emma_calender_purpose_card" style="">' +
		'<div class="row">' +

		'<div class="col-3">' +
		'<div class="card-header">Event ' + currentEventNumber + '</div>' +
		'</div>' +

		'<div class="col-9">' +
		'<small class="form-group">' +
		removeIconHtml +
		'</small>' +
		'</div>' +

		'</div>' +
		'<div class="card-body">' +
		'<div class="col-12 col-sm-12">' +
		'<div class="form-group abba_local-forms emma_select_purposes">' +
		'<label>Purposes<span style="color:orangered;">*</span></label>' +
		'<select class="form-control emma_load_purpose_values emma_load_purposes'+currentEventNumber+'">' +
		'<option value="NULL">emma_load_purposes'+currentEventNumber+'</option>' +
		'</select>' +
		'</div>' +
		'</div>' +
		'<div class="abba_local-forms  emma_add_calender_title mt-4">' +
		'<label>Title<span style="color:orangered;">*</span></label>' +
		'<input type="text" class="form-control emma_load_title_values emma_event_title" placeholder="Event Title">' +
		'</div>' +
		'</div>' +
		'</div>';

	$(document.createElement('div')).append(emmaloadpurposeandtitleforcalender).appendTo('#emma_load_calender_card_values');

	

	var emma_get_calender_purpose_and_title = localStorage.getItem('emma_load_purposes');

	$('.emma_load_purposes'+currentEventNumber).html("<option value='NULL'>Loading...</option>");


	$('.emma_load_purposes'+currentEventNumber).html(emma_get_calender_purpose_and_title);


	$(".remove_purpose_card").click(function () {
		$(this).closest('.emma_calender_purpose_card').fadeOut("slow", function () {
			$(this).remove();
			updateEventNumbers(); // Emma Update event numbers after removal
		});
	});

	currentEventNumber++; // Emma increment event number
}

$("body").on("click",".emma_create_event_button",function(){
	
	var emmapurposevalues = $(".emmaloadpurposesforfirstcard").val();
	var emmatitlevalues = $("#emma_load_title_values_for_calender").val();

	var datastring = "emmasendpurposes=" + emmapurposevalues + "&emmasendtitle=" + emmatitlevalues;
	$.ajax({
		type: 'POST',
		url: '../../controller/scripts/owner/emma_calender/emma_calender/emma_calender_insert_values.php',
		data: datastring,
		success: function (result) {
			$("#emma_load_title_values_for_calender").val('');

			if(result == 2){
				$.wnoty({
					type: 'success',
					message: "Event Successfully Created",
					autohideDelay: 5000
				});
			}else{
				$.wnoty({
					type: 'warning',
					message: "Event Not Set",
					autohideDelay: 5000
				});
			}

			emma_institution_id();
		}
	});

});

$('body').on("click", ".emma_create_event_button", function () {

	var emma_institution_for_event = $(".abba-change-institution").val();
	var emma_event_start_date = $(".emma_start_event_date").val();
	// var emma_event_end_date = $(".emma_end_event_date").val();
	var emma_event_session = $("#emma_load_session").val();
	var emma_event_term = $("#emma_load_term").val();
	var emmapurposevalues = [];
	var emmatitlevalues = [];

	$.each($(".emma_load_purpose_values"), function () {

		var emmagetthispurpose = $(this).val();

		if (emmagetthispurpose == 'NULL' || emmagetthispurpose == '') {
			emmapurposevalues.push('');
		} else {
			emmapurposevalues.push($(this).val());
		}
	});

	$.each($(".emma_load_title_values"), function () {

		var emmagetthistitle = $(this).val();

		if (emmagetthistitle == 'NULL' || emmagetthistitle == '') {
			emmatitlevalues.push('');
		} else {
			emmatitlevalues.push($(this).val());
		}
	});

	if (emma_event_start_date == '' || emma_event_start_date == 'NULL') {
		$.wnoty({
			type: 'warning',
			message: "Add Start Date",
			autohideDelay: 5000
		});
	} else if (emma_event_session == '' || emma_event_session == 'NULL') {
		$.wnoty({
			type: 'warning',
			message: "Select Session",
			autohideDelay: 5000
		});
	} else if (emma_event_term == '' || emma_event_term == 'NULL') {
		$.wnoty({
			type: 'warning',
			message: "Select Term",
			autohideDelay: 5000
		});
	} else if (emmapurposevalues == 'NULL' || emmapurposevalues == '') {
		$.wnoty({
			type: 'warning',
			message: "Select a purpose",
			autohideDelay: 5000
		});
	} else if (emmatitlevalues == '' || emmatitlevalues == 'NULL') {
		$.wnoty({
			type: 'warning',
			message: "Create a Title",
			autohideDelay: 5000
		});
	} else {

		var datastring = "emma_session_for_calender=" + emma_event_session + "&emma_term_for_calender=" + emma_event_term + "&emma_event_institution=" + emma_institution_for_event + "&emma_start_date_for_event=" + emma_event_start_date + "&emmasendpurpose=" + emmapurposevalues + "&emmasendcalendertitle=" + emmatitlevalues;

		emmapurposevalues = emmapurposevalues.toString();
		emmatitlevalues = emmatitlevalues.toString();

		$.ajax({
			type: 'POST',
			url: '../../controller/scripts/owner/emma_calender/emma_calender_event_values.php',
			data: datastring,
			success: function (result) {
				if(result == 2) {
					$.wnoty({
						type: 'success',
						message: "Event Successfully Created",
						autohideDelay: 5000
					});

					$(".emma_start_event_date").val('');
					$(".emma_load_title_values").val('');
					
				} else if(result == ''){
					$.wnoty({
						type: 'warning',
						message: "Event Already Exists",
						autohideDelay: 5000
					});
				}else{
					$.wnoty({
						type: 'warning',
						message: "This Event Has Already Been Set",
						autohideDelay: 5000
					});
				}

				emma_institution_id();
			}
		});
	}
});


// Emma add new card on click of add new
$("body").on('click', '.add_new_purpose_and_title_for_calender', function () {
	addNewCard();
});

$("body").on('click', '.emma_add_event_button_for_calender', function(){
	emmaloadpurposes();
});

function emma_institution_id() {

	var emma_calender_institution = $(".abba-change-institution").val();
	
// 	alert(emma_calender_institution);

	$.ajax({
		type: "POST",
		url: "../../controller/scripts/owner/emma_calender/emma_calender_purpose_and_title.php",
		data: { emmasendinstitutionforcalender: emma_calender_institution },
		success: function (outcome) {
			
			var jsonDatacate = JSON.parse(outcome);

			for (var i = 0; i < jsonDatacate.length; i++) {

				var emma_calender_variables = jsonDatacate[i];

				var calenderdataidnew = emma_calender_variables.calenderdataid;
				var calenderstartdateforemmanew = emma_calender_variables.calenderstartdateforemma;
				// var calenderenddateforemmanew = emma_calender_variables.calenderenddateforemma;
				var calenderpurposeforemmanew = emma_calender_variables.calenderpurposeforemma;
				var calendersessionforemmanew = emma_calender_variables.calendersessionforemma;
				var calendertermorsemesterforemmanew = emma_calender_variables.calendertermorsemesterforemma;
				var calendertitleforemmanew = emma_calender_variables.calendertitleforemma;

				if(calendertitleforemmanew == ''){
					var emmadataid = 'No Record Found';
				}else{
					var emmadataid = calenderdataidnew;
				}

				$('.emmacalender'+calenderstartdateforemmanew).append('<br><div class="row text-white p-2"><div class="col-12 float-end bg-primary" style="border:radius:15px;">'+ calendertitleforemmanew + '</div></div>');

				// $('.emmacalender'+calenderenddateforemmanew).append('<br>'+calendertitleforemmanew);
			}
			
		}
	});
}
$(document).ready(function () {
	emma_institution_id()
	var emma_institution_for_events = $(".emmacalender").val();
});



$('body').on('click', '.emmacalender', function () {

	var emma_calender_institution_for_event = $(".abba-change-institution").val();
	
	var year = $(this).data('year');

	var month = $(this).data('month');

	var day = $(this).data('day');

	var emma_dates = (year+'-'+month+'-'+day);

	$(".emmaloadyearfordelete").val(year);
	$(".emmaloadmonthfordelete").val(month);
	$(".emmaloaddayfordelete").val(day);


	var datastring = "emmadates=" + emma_dates + "&emmainstitution=" + emma_calender_institution_for_event;

	$.ajax({
		type:'POST',
		url:'../../controller/scripts/owner/emma_calender/emma_display_event_on_modal.php',
		data:datastring,
		success:function(outcome){
			$(".emmaloadmodalevent").html(outcome);
			$.ajax({
				type:'POST',
				url:'../../controller/scripts/owner/emma_calender/emma_delete_for_calender_title.php',
				data:datastring,
				success:function(results){
					
				}
			})
		}
	})
});

$('body').on('click', '.emma_edit_event_title', function () {

	var emmagetdatatitle = $(this).data('emmatitle');
	var emmagetdataid = $(this).data('idforedit');

	$(".emmadataidforedit").val(emmagetdataid);
	$('.emma_load_event_edit').val(emmagetdatatitle);
});

$('body').on('click', '.emma_save_edit_for_calender', function () {
	var emma_calender_institution_for_event_for_edit = $(".abba-change-institution").val();
	var emma_send_title_for_edit = $('.emma_load_event_edit').val();
	var emma_send_data_id_for_edit = $(".emmadataidforedit").val();

	var datastring = "emmaeditdataid=" + emma_send_data_id_for_edit + "&emmaeditinstitution=" + emma_calender_institution_for_event_for_edit + "&emmaedittitle=" + emma_send_title_for_edit;
	
	$.ajax({
		type:'POST',
		url:'../../controller/scripts/owner/emma_calender/emma_edit_for_calender_title.php',
		data:datastring,
		success:function(result){
			if(result == 10){
				$.wnoty({
					type: 'success',
					message: "Event successfully edited",
					autohideDelay: 5000
				});
			}else{
				$.wnoty({
					type: 'warning',
					message: "Event Already Exists",
					autohideDelay: 5000
				});
			}
		}
	})
});

$('body').on('click', '.emma_delete_event_title', function () {

	var emmagetdatatitlefordelete = $(this).data('idfordelete');
	
	$('.emma_load_event_delete').val(emmagetdatatitlefordelete);

});

$('body').on('click', '.emma_save_delete_for_calender', function () {

	var emma_calender_institution_for_event_for_delete = $(".abba-change-institution").val();
	var emma_send_title_for_delete = $('.emma_load_event_delete').val();
	var emma_calender_year_for_delete = $(".emmaloadyearfordelete").val();
	var emma_calender_month_for_delete = $(".emmaloadmonthfordelete").val();
	var emma_calender_day_for_delete = $(".emmaloaddayfordelete").val();

	var emma_dates_for_delete = (emma_calender_year_for_delete+'-'+emma_calender_month_for_delete+'-'+emma_calender_day_for_delete);
	var emma_dates_for_delete_for_jquery = (emma_calender_year_for_delete + emma_calender_month_for_delete + emma_calender_day_for_delete);


	var datastring = "emmadeletedate=" + emma_dates_for_delete +"&emmaeditinstitutiondelete=" + emma_calender_institution_for_event_for_delete + "&emmaedittitle=" + emma_send_title_for_delete;

	$.ajax({
		type:'POST',
		url:'../../controller/scripts/owner/emma_calender/emma_delete_for_calender_title.php',
		data:datastring,
		success:function(results){
			if(results == 1){
				$.wnoty({
					type: 'success',
					message: "Event Deleted Successfully",
					autohideDelay: 5000
				});
				emma_institution_id();
				$('.emmacalender'+emma_dates_for_delete_for_jquery).html('');
			}else{
				$.wnoty({
					type: 'warning',
					message: "Event Not Deleted",
					autohideDelay: 5000
				});
			}
		}
	});
});
