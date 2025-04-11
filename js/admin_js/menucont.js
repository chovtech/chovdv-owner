const sideMenu  = document.querySelector("aside");
const menuBtn  = document.querySelector("#menu-btn");
const closeBtn  = document.querySelector("#close-btn");
const themeToggler  = document.querySelector(".theme-toggler");

// show sidebar
menuBtn.addEventListener('click', ()=> {
    sideMenu.style.display = 'block';
});

// close sidebar
closeBtn.addEventListener('click', ()=> {
    sideMenu.style.display = 'none';
});

// change theme
themeToggler.addEventListener('click', ()=> {
 
   document.body.classList.toggle('dark-theme-variables');
   themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
   themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});


// Get all menu links
var links = document.querySelectorAll('.sidebarmenu a');

// Add click event listener to each menu link
links.forEach(function(link) {
  link.addEventListener('click', function(event) {
    // Prevent the default link behavior
    event.preventDefault();

    // Remove the "active" class from all menu links
    links.forEach(function(link) {
      link.classList.remove('active');
    });

    // Add the "active" class to the clicked menu link
    link.classList.add('active');
  });
});




// $('body').on('click','#menu-btndestop',function(){
//     $('.sidemenu-content').toggle();
//     // $('aside').toggle('collapsed');
// });

var menuBtn2 = document.getElementById("menu-btndestop");
menuBtn2.addEventListener("click", function() {
    var sideBar = document.querySelector("aside");
    var mainbody = document.querySelector(".containernav");
    sideBar.classList.toggle("collapsed");
    mainbody.classList.toggle("collapsed");
});