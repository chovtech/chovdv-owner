<!DOCTYPE html>
    <html>
        <head>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <!------ Include the above in your HEAD tag ---------->

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

            <style>
                /*!
 * FullCalendar v1.6.4 Stylesheet
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */
 @import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');

td.fc-day {

background:#FFF !important;
font-family: 'Roboto', sans-serif;

}
td.emma_fc-today {
	background:#fff !important;
	position: relative;


}

.emma_fc-first th{
	font-family: 'Roboto', sans-serif;
    background:#007ffb !important;
	color:#ffffff;
	font-size:14px !important;
	font-weight:500 !important;

	}
.emma_fc-event-inner {
	font-family: 'Roboto', sans-serif;
    background: #03a9f3!important;
    color: #FFF!important;
    font-size: 12px!important;
    font-weight: 500!important;
    padding: 5px 0px!important;
}

.fc {
	direction: ltr;
	text-align: left;
	}
	
.fc table {
	border-collapse: collapse;
	border-spacing: 0;
	}
	
html .fc,
.fc table {
	font-size: 1em;
	font-family: "Helvetica Neue",Helvetica;

	}
	
.fc td,
.fc th {
	padding: 0;
	vertical-align: top;
	}



/* Header
------------------------------------------------------------------------*/

.emma_fc-header td {
	white-space: nowrap;
	padding: 15px 10px 0px;
}

.emma_fc-header-left {
	width: 25%;
	text-align: left;
}
	
.emma_fc-header-center {
	text-align: center;
	}
	
.emma_fc-header-right {
	width: 25%;
	text-align: right;
	}
	
.emma_fc-header-title {
	display: inline-block;
	vertical-align: top;
	margin-top: -5px;
}
	
.emma_fc-header-title h2 {
	margin-top: 0;
	white-space: nowrap;
	font-size: 32px;
    font-weight: 100;
    margin-bottom: 10px;
		font-family: 'Roboto', sans-serif;
}
	span.emma_fc-button {
    font-family: 'Roboto', sans-serif;
    border-color: #007ffb;
	color: #007ffb;
}
.emma_fc-state-down, .emma_fc-state-active {
    background-color: #007ffb !important;
	color: #FFF !important;
}
.fc .emma_fc-header-space {
	padding-left: 10px;
	}
	
.emma_fc-header .emma_fc-button {
	margin-bottom: 1em;
	vertical-align: top;
	}
	
/* buttons edges butting together */

.emma_fc-header .emma_fc-button {
	margin-right: -1px;
	}
	
.emma_fc-header .fc-corner-right,  /* non-theme */
.emma_fc-header .ui-corner-right { /* theme */
	margin-right: 0; /* back to normal */
	}
	
/* button layering (for border precedence) */
	
.emma_fc-header .emma_fc-state-hover,
.emma_fc-header .ui-state-hover {
	z-index: 2;
	}
	
.emma_fc-header .emma_fc-state-down {
	z-index: 3;
	}

.emma_fc-header .emma_fc-state-active,
.emma_fc-header .ui-state-active {
	z-index: 4;
	}
	
	
	
/* Content
------------------------------------------------------------------------*/
	
.fc-content {
	clear: both;
	zoom: 1; /* for IE7, gives accurate coordinates for [un]freezeContentHeight */
	}
	
.fc-view {
	width: 100%;
	overflow: hidden;
	}
	
	

/* Cell Styles
------------------------------------------------------------------------*/

    /* <th>, usually */
.fc-widget-content {  /* <td>, usually */
	border: 1px solid #e5e5e5;
	}
.fc-widget-header{
    border-bottom: 1px solid #EEE; 
}	
.fc-state-highlight { /* <td> today cell */ /* TODO: add .fc-today to <th> */
	background: #fcf8e3;
}

.fc-state-highlight > div > div.fc-day-number{
    background-color: #020202;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 4px;
}
	
.fc-cell-overlay { /* semi-transparent rectangle while dragging */
	background: #bce8f1;
	opacity: .3;
	filter: alpha(opacity=30); /* for IE */
	}
	


/* Buttons
------------------------------------------------------------------------*/

.emma_fc-button {
	position: relative;
	display: inline-block;
	padding: 0 .6em;
	overflow: hidden;
	height: 1.9em;
	line-height: 1.9em;
	white-space: nowrap;
	cursor: pointer;
	}
	
.fc-state-default { /* non-theme */
	border: 1px solid;
	}

.fc-state-default.fc-corner-left { /* non-theme */
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
	}

.fc-state-default.fc-corner-right { /* non-theme */
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
	}

/*
	Our default prev/next buttons use HTML entities like ‹ › « »
	and we'll try to make them look good cross-browser.
*/

.fc-text-arrow {
	margin: 0 .4em;
	font-size: 2em;
	line-height: 23px;
	vertical-align: baseline; /* for IE7 */
	}

.emma_fc-button-prev .fc-text-arrow,
.emma_fc-button-next .fc-text-arrow { /* for ‹ › */
	font-weight: bold;
	}
	
/* icon (for jquery ui) */
	
.emma_fc-button .fc-icon-wrap {
	position: relative;
	float: left;
	top: 50%;
	}
	
.emma_fc-button .ui-icon {
	position: relative;
	float: left;
	margin-top: -50%;
	
	*margin-top: 0;
	*top: -50%;
	}


.fc-state-default {
	border-color: #007ffb;
	color: #007ffb;	
}
.emma_fc-button-month.fc-state-default, .emma_fc-button-agendaWeek.fc-state-default, .emma_fc-button-agendaDay.fc-state-default{
    min-width: 67px;
	text-align: center;
	transition: all 0.2s;
	-webkit-transition: all 0.2s;
}
.emma_fc-state-hover,
.fc-state-down,
.emma_fc-state-active,
.fc-state-disabled {
	color: #333333;
	background-color: #FFE3E3;
	}

.emma_fc-state-hover {
	color: #ff3b30;
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	   -moz-transition: background-position 0.1s linear;
	     -o-transition: background-position 0.1s linear;
	        transition: background-position 0.1s linear;
	}

.emma_fc-state-down,
.emma_fc-state-active {
	background-color: #007ffb;
	background-image: none;
	outline: 0;
	color: #FFFFFF;
}

.fc-state-disabled {
	cursor: default;
	background-image: none;
	background-color: #ffffff;
	filter: alpha(opacity=65);
	box-shadow: none;
	border:1px solid #FFE3E3;
	color: #007ffb;
	}

	

/* Global Event Styles
------------------------------------------------------------------------*/

.fc-event-container > * {
	z-index: 8;
	}

.fc-event-container > .ui-draggable-dragging,
.fc-event-container > .ui-resizable-resizing {
	z-index: 9;
	}
	 
.fc-event {
	border: 1px solid #007ffb; /* default BORDER color */
	background-color: #FFF; /* default BACKGROUND color */
	color: #919191;               /* default TEXT color */
	font-size: 12px;
	cursor: default;
}
.fc-event.chill{
    background-color: #007ffb;
}
.fc-event.info{
    background-color: #007ffb;
}
.fc-event.important{
    background-color: #007ffb;
}
.fc-event.success{
    background-color: #007ffb;
}
.fc-event:hover{
    opacity: 0.7;
}
a.fc-event {
	text-decoration: none;
	}
	
a.fc-event,
.fc-event-draggable {
	cursor: pointer;
	}
	
.fc-rtl .fc-event {
	text-align: right;
	}

.emma_fc-event-inner {
	width: 100%;
	height: 100%;
	overflow: hidden;
	line-height: 15px;
	}
	
.fc-event-time,
.fc-event-title {
	padding: 0 1px;
	}
	
.fc .ui-resizable-handle {
	display: block;
	position: absolute;
	z-index: 99999;
	overflow: hidden; /* hacky spaces (IE6/7) */
	font-size: 300%;  /* */
	line-height: 50%; /* */
	}
	
	
	
/* Horizontal Events
------------------------------------------------------------------------*/

.fc-event-hori {
	border-width: 1px 0;
	margin-bottom: 1px;
	}

.fc-ltr .fc-event-hori.fc-event-start,
.fc-rtl .fc-event-hori.fc-event-end {
	border-left-width: 1px;
	/*
border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
*/
	}

.fc-ltr .fc-event-hori.fc-event-end,
.fc-rtl .fc-event-hori.fc-event-start {
	border-right-width: 1px;
	/*
border-top-right-radius: 3px;
	border-bottom-right-radius: 3px;
*/
	}
	
/* resizable */
	
.fc-event-hori .ui-resizable-e {
	top: 0           !important; /* importants override pre jquery ui 1.7 styles */
	right: -3px      !important;
	width: 7px       !important;
	height: 100%     !important;
	cursor: e-resize;
	}
	
.fc-event-hori .ui-resizable-w {
	top: 0           !important;
	left: -3px       !important;
	width: 7px       !important;
	height: 100%     !important;
	cursor: w-resize;
	}
	
.fc-event-hori .ui-resizable-handle {
	_padding-bottom: 14px; /* IE6 had 0 height */
	}
	
	
	
/* Reusable Separate-border Table
------------------------------------------------------------*/

table.fc-border-separate {
	border-collapse: separate;
	}
	
.fc-border-separate th,
.fc-border-separate td {
	border-width: 1px 0 0 1px;
	}
	
.fc-border-separate th.fc-last,
.fc-border-separate td.fc-last {
	border-right-width: 1px;
	}
	

/* .fc-border-separate tr.fc-last td { */
	
/* } */
.fc-border-separate .fc-week .emma_fc-first{
    border-left: 0;
}
.fc-border-separate .fc-week .fc-last{
    border-right: 0;
}
.fc-border-separate tr.fc-last th{
    border-bottom-width: 1px;
    border-color: #007ffb;
    font-size: 16px;
    font-weight: 300;
	line-height: 30px;
}
.fc-border-separate tbody tr.emma_fc-first td,
.fc-border-separate tbody tr.emma_fc-first th {
	border-top-width: 0;
	}
	
	

/* Month View, Basic Week View, Basic Day View
------------------------------------------------------------------------*/

.fc-grid th {
	text-align: center;
	}

.fc .fc-week-number {
	width: 22px;
	text-align: center;
	}

.fc .fc-week-number div {
	padding: 0 2px;
	}
	
.fc-grid .fc-day-number {
	float: right;
	padding: 0 2px;
	}
	
.fc-grid .fc-other-month .fc-day-number {
	opacity: 0.3;
	filter: alpha(opacity=30); /* for IE */
	/* opacity with small font can sometimes look too faded
	   might want to set the 'color' property instead
	   making day-numbers bold also fixes the problem */
	}
	
.fc-grid .fc-day-content {
	clear: both;
	padding: 2px 2px 1px; /* distance between events and day edges */
	}
	
/* event styles */
	
.fc-grid .fc-event-time {
	font-weight: bold;
	}
	
/* right-to-left */
	
.fc-rtl .fc-grid .fc-day-number {
	float: left;
	}
	
.fc-rtl .fc-grid .fc-event-time {
	float: right;
	}
	
	

/* Agenda Week View, Agenda Day View
------------------------------------------------------------------------*/

.fc-agenda table {
	border-collapse: separate;
	}
	
.fc-agenda-days th {
	text-align: center;
	}
	
.fc-agenda .fc-agenda-axis {
	width: 50px;
	padding: 0 4px;
	vertical-align: middle;
	text-align: right;
	white-space: nowrap;
	font-weight: normal;
	}

.fc-agenda .fc-week-number {
	font-weight: bold;
	}
	
.fc-agenda .fc-day-content {
	padding: 2px 2px 1px;
	}
	
/* make axis border take precedence */
	
.fc-agenda-days .fc-agenda-axis {
	border-right-width: 1px;
	}
	
.fc-agenda-days .fc-col0 {
	border-left-width: 0;
	}
	
/* all-day area */
	
.fc-agenda-allday th {
	border-width: 0 1px;
	}
	
.fc-agenda-allday .fc-day-content {
	min-height: 34px; /* TODO: doesnt work well in quirksmode */
	_height: 34px;
	}
	
/* divider (between all-day and slots) */
	
.fc-agenda-divider-inner {
	height: 2px;
	overflow: hidden;
	}
	
.fc-widget-header .fc-agenda-divider-inner {
	background: #eee;
	}
	
/* slot rows */
	
.fc-agenda-slots th {
	border-width: 1px 1px 0;
	}
	
.fc-agenda-slots td {
	border-width: 1px 0 0;
	background: none;
	}
	
.fc-agenda-slots td div {
	height: 20px;
	}
	
.fc-agenda-slots tr.fc-slot0 th,
.fc-agenda-slots tr.fc-slot0 td {
	border-top-width: 0;
	}
	
.fc-agenda-slots tr.fc-minor th.ui-widget-header {
	*border-top-style: solid; /* doesn't work with background in IE6/7 */
	}
	


/* Vertical Events
------------------------------------------------------------------------*/

.fc-event-vert {
	border-width: 0 1px;
	}

.fc-event-vert.fc-event-start {
	border-top-width: 1px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	}

.fc-event-vert.fc-event-end {
	border-bottom-width: 1px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	}
	
.fc-event-vert .fc-event-time {
	white-space: nowrap;
	font-size: 10px;
	}

.fc-event-vert .emma_fc-event-inner {
	position: relative;
	z-index: 2;
	}
	
.fc-event-vert .fc-event-bg { /* makes the event lighter w/ a semi-transparent overlay  */
	position: absolute;
	z-index: 1;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #fff;
	opacity: .25;
	filter: alpha(opacity=25);
	}
	
.fc .ui-draggable-dragging .fc-event-bg, /* TODO: something nicer like .fc-opacity */
.fc-select-helper .fc-event-bg {
	display: none\9; /* for IE6/7/8. nested opacity filters while dragging don't work */
	}
	
/* resizable */
	
.fc-event-vert .ui-resizable-s {
	bottom: 0        !important; /* importants override pre jquery ui 1.7 styles */
	width: 100%      !important;
	height: 8px      !important;
	overflow: hidden !important;
	line-height: 8px !important;
	font-size: 11px  !important;
	font-family: monospace;
	text-align: center;
	cursor: s-resize;
	}
	
.fc-agenda .ui-resizable-resizing { /* TODO: better selector */
	_overflow: hidden;
	}
	
thead tr.emma_fc-first{
    background-color: #f7f7f7;
}
table.emma_fc-header{
    background-color: #FFFFFF;
    border-radius: 6px 6px 0 0;
}

.fc-week .fc-day > div .fc-day-number{
    font-size: 15px;
    margin: 2px;
    min-width: 19px;
    padding: 6px;
    text-align: center;
       width: 30px;
    height: 30px;
}
.fc-sun, .fc-sat{
    color: #b8b8b8;
}

.fc-week .fc-day:hover .fc-day-number{
    background-color: #B8B8B8;
    border-radius: 50%;
    color: #FFFFFF;
    transition: background-color 0.2s;
}
.fc-week .fc-day.fc-state-highlight:hover .fc-day-number{
    background-color:  #ff3b30;
}
.emma_fc-button-today{
    border: 1px solid rgba(255,255,255,.0);
}
.fc-view-agendaDay thead tr.emma_fc-first .fc-widget-header{
    text-align: right;
    padding-right: 10px;
}

/*!
 * FullCalendar v1.6.4 Print Stylesheet
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */

/*
 * Include this stylesheet on your page to get a more printer-friendly calendar.
 * When including this stylesheet, use the media='print' attribute of the <link> tag.
 * Make sure to include this stylesheet IN ADDITION to the regular fullcalendar.css.
 */
 
 
 /* Events
-----------------------------------------------------*/
 
.fc-event {
	background: #fff !important;
	color: #000 !important;
	}
	
/* for vertical events */
	
.fc-event-bg {
	display: none !important;
	}
	
.fc-event .ui-resizable-handle {
	display: none !important;
	}
	
	

            </style>

            <script>

                $(document).ready(function() {
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();
                    
                    /*  className colors
                    
                    className: default(transparent), important(red), chill(pink), success(green), info(blue)
                    
                    */		
                    
                    /* initialize the external events
                    -----------------------------------------------------------------*/
                
                    $('#external-events div.external-event').each(function() {
                    
                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };
                        
                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);
                        
                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true,      // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });
                        
                    });
                
                
                    /* initialize the calendar
                    -----------------------------------------------------------------*/
                    
                    var calendar =  $('#emma_calendar').fullCalendar({
                        header: {
                            left: 'title',
                            center: 'agendaDay,agendaWeek,month',
                            right: 'prev,next today'
                        },
                        editable: true,
                        firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
                        selectable: true,
                        defaultView: 'month',
                        
                        axisFormat: 'h:mm',
                        columnFormat: {
                            month: 'ddd',    // Mon
                            week: 'ddd d', // Mon 7
                            day: 'dddd M/d',  // Monday 9/7
                            agendaDay: 'dddd d'
                        },
                        titleFormat: {
                            month: 'MMMM yyyy', // September 2009
                            week: "MMMM yyyy", // September 2009
                            day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
                        },
                        allDaySlot: false,
                        selectHelper: true,
                        select: function(start, end, allDay) {
                            var title = prompt('Event Title:');
                            if (title) {
                                calendar.fullCalendar('renderEvent',
                                    {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },
                                    true // make the event "stick"
                                );
                            }
                            calendar.fullCalendar('unselect');
                        },
                        droppable: true, // this allows things to be dropped onto the calendar !!!
                        drop: function(date, allDay) { // this function is called when something is dropped
                        
                            // retrieve the dropped element's stored Event Object
                            var originalEventObject = $(this).data('eventObject');
                            
                            // we need to copy it, so that multiple events don't have a reference to the same object
                            var copiedEventObject = $.extend({}, originalEventObject);
                            
                            // assign it the date that was reported
                            copiedEventObject.start = date;
                            copiedEventObject.allDay = allDay;
                            
                            // render the event on the calendar
                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                            $('#emma_calendar').fullCalendar('renderEvent', copiedEventObject, true);
                            
                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove();
                            }
                            
                        },
                        
                        events: [
                            {
                                title: 'All Day Event',
                                start: new Date(y, m, 1)
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d-3, 16, 0),
                                allDay: false,
                                className: 'info'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d+4, 16, 0),
                                allDay: false,
                                className: 'info'
                            },
                            {
                                title: 'Meeting',
                                start: new Date(y, m, d, 10, 30),
                                allDay: false,
                                className: 'important'
                            },
                            {
                                title: 'Lunch',
                                start: new Date(y, m, d, 12, 0),
                                end: new Date(y, m, d, 14, 0),
                                allDay: false,
                                className: 'important'
                            },
                            {
                                title: 'Birthday Party',
                                start: new Date(y, m, d+1, 19, 0),
                                end: new Date(y, m, d+1, 22, 30),
                                allDay: false,
                            },
                            {
                                title: 'Click for Google',
                                start: new Date(y, m, 28),
                                end: new Date(y, m, 29),
                                url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
                                className: 'success'
                            }
                        ],			
                    });
                    
                    
                });

            </script>

        </head>

            <body>
            <div id='wrap'>

            <div id='emma_calendar'></div>

            <div style='clear:both'></div>
            </div>

        </body>
    </html>
