/****************************************************  start swiper  **********************************************************/
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
        spaceBetween: 5,
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
      },
    },
  });
  var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
        spaceBetween: 30,
      },

    },
  });
  /****************************************************  end swiper  **********************************************************/

  /****************************************************  select menuIcon/hidenMenu/close  **********************************************************/
  let menuIcon = document.querySelector(".menu-icon");
  let hidenMenu = document.querySelector(".hiden-menu");
  let close = document.querySelector(".close");

  /***************************************************  addEventListener click to  menuIcon/close **********************************************************/
  menuIcon.addEventListener("click",function(){
    hidenMenu.style.display = "block"
    hidenMenu.style.transform = "translateY(0px)"
  })
  
  close.addEventListener("click",function(){
    hidenMenu.style.display = "none"
    hidenMenu.style.transform = "translateY(-500px)"
  })
  
  
  function myFunction(x) {
    if (x.matches) { // If media query matches
      $(".hiden-menu").addClass("fixed-bottom")
      $(".header").addClass("fixed-bottom")
      $(".logo-sm").removeClass("d-none")

      
    } else {
      $(".hiden-menu").removeClass("fixed-bottom")
      $(".header").removeClass("fixed-bottom")
      $(".logo-sm").addClass("d-none")
    }
  }
  
  var x = window.matchMedia("(max-width: 700px)")
  myFunction(x) // Call listener function at run time
  x.addListener(myFunction) // Attach listener function on state changes
  