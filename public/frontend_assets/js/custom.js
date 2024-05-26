$(".back2top i").on('click', function () {
  $("html,body").animate({
    scrollTop: 0
  }, 1200)
})

$(window).on('scroll', function () {
  let scrolling = $(this).scrollTop()

  // back2top js
  if (scrolling > 20) {
    $(".back2top i").fadeIn(500)
  } else(
    $(".back2top i").fadeOut(500)
  )


  // navbar js
  if (scrolling > 50) {
    $(".navbar_main").addClass("nav_ex")
  } else {
    $(".navbar_main").removeClass("nav_ex")
  }
})


$(function () {
  "use strick"


  // back2top js




  // banner typed js
  $(".typed").typed({
    strings: ["Designer", "Developer", "Coder"],
    // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
    stringsElement: null,
    // typing speed
    typeSpeed: 10,
    // time before typing starts
    startDelay: 500,
    // backspacing speed
    backSpeed: 1,
    // time before backspacing
    backDelay: 500,
    // loop
    loop: true,
    // false = infinite
    loopCount: 1000,
    // show cursor
    showCursor: true,
    // character for cursor
    cursorChar: "|",
    // attribute to type (null == text)
    attr: null,
    // either html or text
    contentType: 'html',
    // call when done callback function
    callback: function () {},
    // starting callback function before each string
    preStringTyped: function () {},
    //callback for every typed string
    onStringTyped: function () {},
    // callback for reset
    resetCallback: function () {}
  });


  // full body cursor js
  new kursor({
    type: 4,
    removeDefaultCursor: true,
    color: '#ff014f',
  })



  // service part js

  $('.ser_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500,

    responsive: [{
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });








  // feedback part js

  $('.feed_slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500,

    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });


  // preloader js

  setTimeout(function () {
    $(".preloader ").fadeToggle()
  }, 4000)


  // full body wow js

  new WOW().init();






  // pricing part js

  $('.counter').counterUp({
    delay: 10,
    time: 1500
  });

})
