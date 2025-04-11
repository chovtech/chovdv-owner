// testimonials
$(document).ready(function () {

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        grabCursor: true,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
});

// language change
$('body').on('change', '#changelanguage', function () {

    var lang = $(this).val();

    localStorage.setItem('lang', lang);

    location.href = '?lang=' + lang;
    
});

$(document).ready(function () {
    
    var lang = localStorage.getItem('lang');
    
    if (lang == 0 || lang == '' || lang == null) 
    {
        
        $('#changelanguage').val('english');
        
        var langnew = 'english';
    }
    else
    {
        $('#changelanguage').val(lang);
        
        var langnew = lang;

        // Get the current URL
        var url = new URL(window.location.href);

        // Get the value of a parameter named "paramName"
        var paramValue = url.searchParams.get("lang");

        // Check if the parameter value exists
        if (paramValue) {
            // Parameter value exists
            console.log("Parameter value:", paramValue);

            localStorage.setItem('lang', paramValue);

            $('#changelanguage').val(paramValue);

        }
        else {
            // Parameter value does not exist
            console.log("Parameter value not found");

            window.location.href = url+'?lang=' + lang;

            localStorage.setItem('lang', paramValue);

            $('#changelanguage').val(paramValue);
        }
    }
    
    $('a').each(function() {
        var href = $(this).attr('href');
        $(this).attr('href', href + '?lang='+langnew);
    });

});


// Franchise top bana 
var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};

window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};




// bana animated Text

document.addEventListener("DOMContentLoaded", function () {
    const txts_sec = document.querySelector(".animate-text-second").children;
    const txtsLen_sec = txts_sec.length;
    let index_sec = 0;
    const textInTimer_sec = 3000;
    const textOutTimer_sec = 2800;

    function animateText_sec() {
        for (let i = 0; i < txtsLen_sec; i++) {
            txts_sec[i].classList.remove("text-in_sec", "text-out_sec");
        }
        txts_sec[index_sec].classList.add("text-in_sec");

        setTimeout(function () {
            txts_sec[index_sec].classList.add("text-out_sec");
        }, textOutTimer_sec);

        setTimeout(function () {
            if (index_sec == txtsLen_sec - 1) {
                index_sec = 0;
            } else {
                index_sec++;
            }
            animateText_sec();
        }, textInTimer_sec);
    }

    animateText_sec();

    const txts = document.querySelector(".animate-text").children;
    const txtsLen = txts.length;
    let index = 0;
    const textInTimer = 3000;
    const textOutTimer = 2800;

    function animateText() {
        for (let i = 0; i < txtsLen; i++) {
            txts[i].classList.remove("text-in", "text-out");
        }
        txts[index].classList.add("text-in");

        setTimeout(function () {
            txts[index].classList.add("text-out");
        }, textOutTimer);

        setTimeout(function () {
            if (index == txtsLen - 1) {
                index = 0;
            } else {
                index++;
            }
            animateText();
        }, textInTimer);
    }

    animateText();
});


// statistics Counter
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function countToTarget() {
        var counters = document.querySelectorAll('.counter');

        counters.forEach(function (counter) {
            var target = parseInt(counter.getAttribute('data-target'));
            var span = counter.querySelector('.count');
            var start = 0;
            var step = Math.max(Math.floor(target / 100), 1); // Ensure minimum step size of 1
            var duration = 13000;
            var interval = duration / Math.max(target, 200); // Use Math.max to prevent division by 0

            var timer = setInterval(function () {
                start += step;
                if (start >= target) {
                    clearInterval(timer);
                    start = target;
                }

                span.textContent = formatNumberWithCommas(start);
            }, interval);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        countToTarget();
    });


    document.addEventListener('DOMContentLoaded', function () {
        countToTarget();
    });