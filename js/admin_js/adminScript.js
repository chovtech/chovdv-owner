 $(window).on("load", function () {
        $("#gx-overlay").fadeOut("slow");
    });


 
         // For the Profile Dropdown
 
         function profilemyFunction() {
          document.getElementById("profilemyDropdown").classList.toggle("profileshow");
          }
          

          // Close the dropdown if the user clicks outside of it
          window.onclick = function(event) {
            if (!event.target.matches('.profiledropbtn')) {
                var dropdowns = document.getElementsByClassName("profiledropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('profileshow')) {
                      openDropdown.classList.remove('profileshow');
                  }
                }
            }
          }


         var sidebarOpen = false;
         var sidebar = document.getElementById("sidebar");

         function openSidebar() {
             if (!sidebarOpen) {
                 sidebar.classList.add("sidebar-responsive");
                 sidebarOpen = true;
             }
         }



         //For the Institution 

     function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
     }
   
   // Close the dropdown if the user clicks outside of it
   window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
   }  


    //close sidebar on mobile view 

     function closeSidebar() {
      if (sidebarOpen == true) {
          sidebar.classList.remove("sidebar-responsive");
          sidebarOpen = false;
      }
     }






    //  //==============CHARTS=============


      ///----Area Chart---------


      var areaChartOptions = {
        series: [{
        name: 'Students',
        data: [100, 313, 489, 893, 200, 284, 637, 842, 950, 284, 734, 150]
      }, {
        name: 'Parents',
        data: [304, 784, 284, 745, 454, 853, 398, 289, 804, 385, 698, 280]
      }],
        chart: {
        height: 350,
        type: 'area',
        toolbar: {
          show: false,
        },
      },
      colors: [ "#6699FF", "#33CC99" ],
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: 'smooth'
      },
      labels: ['Jan 20', 'Feb 20','Mar 20','Apr 20','May 20','Jun 20','Jul 20','Aug 20','Sep 20','Oct 20','Nov 20','Dec 20'],
      markers: {
        size: 0
      },
      tooltip: {
        shared: true,
        intersect: false,
  
        }
      };

      var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
      areaChart.render();




      /// Semi Circle Gauge


      
      var gaugeOptions = {
        series: [62],
        chart: {
        type: 'radialBar',
        offsetY: -20,
        sparkline: {
          enabled: true
        }
      },
      plotOptions: {
        radialBar: {
          startAngle: -90,
          endAngle: 90,
          track: {
            background: "#e7e7e7",
            strokeWidth: '97%',
            margin: 5, // margin is in pixels
            dropShadow: {
              enabled: true,
              top: 2,
              left: 0,
              color: '#999',
              opacity: 1,
              blur: 2
            }
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              offsetY: -2,
              fontSize: '22px'
            }
          }
        }
      },
      grid: {
        padding: {
          top: -10
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          shadeIntensity: 0.4,
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 50, 53, 91]
        },
      },
      labels: ['Average Results'],
      };

      var gaugeChart = new ApexCharts(document.querySelector("#gauge-chart"), gaugeOptions);
      gaugeChart.render();
    


    
      /// Simple Dounut for Attendance

           
        var attendanceOptions = {
          series: [41, 17, 15],
          labels: ['Yealy', 'Monthly', 'Daily',],
          chart: {
          width: 350,
          type: 'donut',
        },
        plotOptions: {
          pie: {
            startAngle: -90,
            endAngle: 270
          }
        },
        dataLabels: {
          enabled: false
        },

        fill: {
          type: 'gradient',
        },
       
        legend: {
          formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var attendanceChart = new ApexCharts(document.querySelector("#attendance-chart"), attendanceOptions);
        attendanceChart.render();
      
      
    
  


      /// Simple Dounut for Overall Performance

      var performanceOptions = {
        series: [10, 41, 17, 15],
        labels: ['Fail, Pass', 'Credit', 'Absent',],
        chart: {
        width: 270,
        type: 'donut',
      },
      plotOptions: {
        pie: {
          startAngle: -90,
          endAngle: 270
        }
      },
      dataLabels: {
        enabled: false
      },

      legend: {
        formatter: function(val, opts) {
          return val + " - " + opts.w.globals.series[opts.seriesIndex]
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
      };

      var performanceChart = new ApexCharts(document.querySelector("#performance-chart"), performanceOptions);
      performanceChart.render();



      //Calender


          
    let now = new Date()

    let monthList = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    let dayList = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
    let viewMode = {
        date : 'date',
        month : 'month',
        year: 'year'
    }
    let currentView = viewMode.date

    let currentMonth = now.getMonth()
    let currentYear = now.getFullYear()

    let headerName = document.getElementById('twoheaderName')
    let prevButton = document.getElementById('twoprevButton')
    let nextButton = document.getElementById('twonextButton')
    let dayNames = document.getElementById('twodayNames')
    let dayDates = document.getElementById('twodayDates')
    let monthSection = document.getElementById('twomonthSection')
    let yearSection = document.getElementById('twoyearSection')

    setCalender(currentMonth, currentYear)
    setDayNames()
    prevButton.addEventListener('click', prevButtonHandler)
    nextButton.addEventListener('click', nextButtonHandler)
    headerName.addEventListener('click', centerButtonHandler)

    function closeSelectMonth(month, year) {
      currentView = viewMode.date
      currentMonth = month
      monthSection.classList.remove('show')
      setCalender(month, year)
    }

    function closeSelectYear(year) {
      currentView = viewMode.month
      currentYear = year
      yearSection.classList.remove('show')
      setSelectMonth(year)
    }

    function setSelectMonth(year) {
      currentView = viewMode.month
      monthSection.innerHTML = ''
      monthSection.classList.add('show')

      headerName.innerHTML = year
        
      for(let i = 0; i < monthList.length; i++) {
        let month = document.createElement('button')
        let monthName = document.createTextNode(monthList[i])
        if(year === now.getFullYear() && i === now.getMonth()) {
          let thisMonth = document.createElement('span')
          month.setAttribute('class', 'mark')
          thisMonth.appendChild(monthName)
          month.appendChild(thisMonth)
        } else {
          month.appendChild(monthName)
        }
        month.addEventListener('click', () => closeSelectMonth(i, year))
        monthSection.appendChild(month)
      }
    }

    function setSelectYear(year) {
      currentView = viewMode.year
      yearSection.innerHTML = ''
      yearSection.classList.add('show')

      let yearLocation =  year % 10 === 0 ? 10 : year % 10
      let topBoundary = yearLocation === 10? year: year + (10 - yearLocation)
      let bottomBoundary = topBoundary - 9

      headerName.innerHTML = `${bottomBoundary} - ${topBoundary}`

      for(let i = 0; i < 12; i ++) {
        let yearString = bottomBoundary + i - 1
        let yearButton = document.createElement('button')
        let yearPrint = document.createTextNode(yearString)
        if(i < 1 || i > 10) {
          yearButton.setAttribute('class', 'offset')
        }
        if(yearString === now.getFullYear()) {
          let thisYear = document.createElement('span')
          yearButton.setAttribute('class', 'mark')
          thisYear.appendChild(yearPrint)
          yearButton.appendChild(thisYear)
        } else {
          yearButton.appendChild(yearPrint)
        }
        yearButton.addEventListener('click', () => closeSelectYear(yearString))
        yearSection.appendChild(yearButton)
      }
    }

    function setDayNames() {
      for(let i of dayList) {
        let day = document.createElement('div')
        let dayName = document.createTextNode(i.substring(0,2))
        day.appendChild(dayName)
        dayNames.appendChild(day)
      }
    }

    function getPrevMonthAndYear() {
      return ({
        year: (currentMonth === 0) ? currentYear - 1 : currentYear,
        month: (currentMonth === 0) ? 11 : currentMonth - 1
      })
    }

    function getDayInMonth(year, month) {
      return (32 - new Date(year, month, 32).getDate())
    }

    function prevButtonHandler() {
      switch(currentView) {
        case viewMode.year: {
          prevDecade()
          break
        }
        case viewMode.month: {
          prevYear()
          break
        }
        default: prevMonth()
      }
    }

    function centerButtonHandler() {
      switch(currentView) {
        case viewMode.date: {
          setSelectMonth(currentYear)
          break
        }
        case viewMode.month: {
          setSelectYear(currentYear)
          break
        }
      }
    }

    function nextButtonHandler() {
      switch(currentView) {
        case viewMode.year: {
          nextDecade()
          break
        }
        case viewMode.month: {
          nextYear()
          break
        }
        default: nextMonth()
      }
    }

    function prevDecade() {
      currentYear = currentYear - 10
      setSelectYear(currentYear)
    }
    function nextDecade() {
      currentYear = currentYear + 10
      setSelectYear(currentYear)
    }

    function prevYear() {
      currentYear = currentYear - 1
      setSelectMonth(currentYear)
    }
    function nextYear() {
      currentYear = currentYear + 1
      setSelectMonth(currentYear)
    }

    function prevMonth() {
      let  { year, month } = getPrevMonthAndYear()
      currentYear = year
      currentMonth = month
      setCalender(currentMonth, currentYear)
    }
    function nextMonth() {
      currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear
      currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1
      setCalender(currentMonth, currentYear)
    }

    function setCalender(month, year) {
      let selectedMonth = monthList[month]
      headerName.innerHTML = `${selectedMonth}`
      let prevDate = getPrevMonthAndYear()

      let firstDay = (new Date(year, month)).getDay()
      let dayInMonth = getDayInMonth(year, month)
      let prevdayInMonth = getDayInMonth(prevDate.year, prevDate.month)
      dayDates.innerHTML = ''

      let nextDayInMonth = (dayInMonth + firstDay) % 7 === 0 ? 0 : 7 - ((dayInMonth + firstDay) % 7)
      let boundary = firstDay + dayInMonth + nextDayInMonth

      for(let i = 0; i < boundary; i++) {
        if(i < firstDay || i >= firstDay + dayInMonth) {
          let day = document.createElement('button')
          let date = i < firstDay ? prevdayInMonth - (firstDay - 1 - i) : nextDayInMonth - (boundary - i) + 1
          let dayDate = document.createTextNode(date)
          day.setAttribute('class', 'offset')
          day.appendChild(dayDate)
          dayDates.appendChild(day)
          continue
        }
        let date = i - firstDay + 1
        let day = document.createElement('button')
        let dayDate = document.createTextNode(date)
        if(month === now.getMonth() && year === now.getFullYear() && date === now.getDate()) {
          day.setAttribute('class', 'mark')
          let mark = document.createElement('span')
          mark.appendChild(dayDate)
          day.appendChild(mark)
          dayDates.appendChild(day)
          continue
        }
        day.appendChild(dayDate)
        dayDates.appendChild(day)
      }
    }
function get_longitude_and_latitude(callback) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            var latitude_val = position.coords.latitude;
            var longitude_val = position.coords.longitude;
    
            // Call the callback function with the coordinates
            callback({
              latitude: latitude_val,
              longitude: longitude_val
            });
          },
          function(error) {
            // If geolocation is not supported or permission denied, return default values
            var latitude_val = 0;
            var longitude_val = 0;
            console.log("Error getting geolocation:", error.message);
    
            // Call the callback function with default values
            callback({
              latitude: latitude_val,
              longitude: longitude_val
            });
          }
        );
      } else {
        // If geolocation is not supported, return default values
        var latitude_val = 0;
        var longitude_val = 0;
        console.log("Geolocation is not supported by this browser.");
    
        // Call the callback function with default values
        callback({
          latitude: latitude_val,
          longitude: longitude_val
        });
      }
    }