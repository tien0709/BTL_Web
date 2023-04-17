// Slider js
$(document).ready(function(){
    $('.slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        dots: true,
    });
  });

//navbar mobile js
  document.querySelector('.header-bar').addEventListener("click" , appearNav)
  function appearNav() {
    document.querySelector(".over_lay").style.display = 'block';
    document.querySelector(".navbar__mb").style.display = 'block';
  }

  document.querySelector('.over_lay').addEventListener("click" , closeNav)
  function closeNav() {
    document.querySelector(".over_lay").style.display = 'none';
    document.querySelector(".navbar__mb").style.display = 'none';
  }

// Product suggestions js
  $(document).ready(function(){
    $('.product-suggestions').slick({
      cssEase: 'linear',
        speed: 800,
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        autoplay: false,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        dots: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          }
        ]
    });
  });


  // Js star
  const stars = document.querySelectorAll('.star');
  stars.forEach(function(star, index) {
    star.addEventListener('click', function() {
      const rating = index + 1;
        stars.forEach(function(s, i) {
        if (i < rating) {
          s.classList.add('star-active');
        } else {
          s.classList.remove('star-active');
        }
      });
    });
  });
  
