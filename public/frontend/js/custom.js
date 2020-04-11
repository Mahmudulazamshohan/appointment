$(document).ready(function(){


  $('#jr_menu').click(function(){
    $('.jr_header_area_start').animate({
      width:'toggle'
    }, 300)
  })

  $('#jr_menu').on('click', function () {
    $(this).toggleClass('jr_active');
  });

  $('.jr_reference_slide').owlCarousel({
    items:1,
    loop:true,
    dots:true,
    dotsData: true,
    nav:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  });


  // scroll js
  $.scrollIt({
          upKey: 38,                // key code to navigate to the next section
          downKey: 40,              // key code to navigate to the previous section
          easing: 'swing',         // the easing function for animation
          scrollTime: 1300,          // how long (in ms) the animation takes
          activeClass: 'active',    // class given to the active nav element
          onPageChange: null,       // function(pageIndex) that is called when page is changed
          topOffset: -0            // offste (in px) for fixed top navigation
        });
  });

