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

// Search_pc

  document.querySelector('.header__search').addEventListener("click" , appearOver)
  function appearOver() {
    document.querySelector(".over_lay").style.display = 'block';
  }
  document.querySelector('.over_lay').addEventListener("click" , closeOver)
  function closeOver() {
    document.getElementById("search-suggestions").style.display = 'none';
    document.getElementById("search-suggestions_mb").style.display = 'none !important';
  }


// Search_mb
  document.querySelector('.header-searchMobile').addEventListener("click" , appearSearch)
  function appearSearch() {
    document.querySelector(".over_lay").style.display = 'block';
    document.querySelector(".searchMobile").style.display = 'block';
  }

  document.querySelector('.over_lay').addEventListener("click" , closeSearch)
  function closeSearch() {
    document.querySelector(".over_lay").style.display = 'none';
    document.querySelector(".searchMobile").style.display = 'none';

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


  // Comment
  function setRating(value) {
    var stars = document.querySelectorAll('.rate .star i');
    rating = value;
    for (var i = 0; i < stars.length; i++) {
        if (i < rating) {
            stars[i].classList.add('fa-starActive');
        } else {
            stars[i].classList.remove('fa-starActive');
        }
    }
    document.getElementById('rating').value = rating;
}



  








