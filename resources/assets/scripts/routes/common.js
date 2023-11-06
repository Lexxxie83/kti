export default {
  init() {
    // JavaScript to be fired on all pages

    // Back to top pijltje, scroll naar boven
    if ($('#back-to-top').length) {
      var scrollTrigger = 100, // px
      backToTop = function () {
          var scrollTop = $(window).scrollTop();
          if (scrollTop > scrollTrigger) {
              $('#back-to-top').addClass('show');
          } else {
              $('#back-to-top').removeClass('show');
          }
      };
      backToTop();
      $(window).on('scroll', function () {
          backToTop();
      });
      $('#back-to-top').on('click', function (e) {
          e.preventDefault();
          $('html,body').animate({
              scrollTop: 0,
          }, 700);
      });
    }

    // Ga naar de offerte

    $('.offerte').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: $('#offerte').offset().top - 100,
        }, 700);
        $('#offerte-slider').toggleClass('slidedown slideup');
    });

    if ($('.nav-top').length) {
      var menuscrollTrigger = 250, // px
      hideShowMenu = function () {
          var scrollTop = $(window).scrollTop();
          if (scrollTop > menuscrollTrigger) {
              $('.nav-top').addClass('hide');
              $('.brand').addClass('small');
          } else {
              $('.nav-top').removeClass('hide');
              $('.brand').removeClass('small');
          }
      };
      $(window).on('scroll', function () {
          hideShowMenu();
      });
    }

    $('#search-open').click( function(){
      $('#search').addClass('active');
    }),
    $('#search-close').click( function(){
      $('#search').removeClass('active');
    }),

    $( 'button.hamburger' ).click(function() {
      $( this ).toggleClass('is-active');
      $('body').toggleClass('fixed-position');
      $('.mobile-navigation-container').toggleClass('open');
      $('.mobile-navigation-container').removeClass('closed');

      $('.mobile-navigation-overlay').toggleClass('open');
      $('.mobile-navigation-overlay').removeClass('closed');
    });


    // accordion navigatie op mobiel
    // http://cssmenumaker.com/blog/wordpress-accordion-menu-tutorial/
    
    $('#cssmenu li.has-sub>a').on('click', function(){
      // var href = $(this).attr('href'); 
      // $(this). attr('data-href', href);
      $(this).removeAttr('href');
      $(this).children('.link_text').prepend('<a>');

      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        // var dataHref = $(this).attr('data-href'); 
        // $(this). attr('href', dataHref);
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp();
      }
      else {
        element.addClass('open');
        element.children('ul').slideDown();
        element.siblings('li').children('ul').slideUp();
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp();
      }
      //$(this). attr('href', href);
    });
  
    $('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');  

    // nog een keer voor de Footer:
    $('#mobilefootermenu li.has-sub>a').on('click', function(){
      // var href = $(this).attr('href'); 
      // $(this). attr('data-href', href);
      $(this).removeAttr('href');
      $(this).children('.link_text').prepend('<a>');

      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        // var dataHref = $(this).attr('data-href'); 
        // $(this). attr('href', dataHref);
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp();
      }
      else {
        element.addClass('open');
        element.children('ul').slideDown();
        element.siblings('li').children('ul').slideUp();
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp();
      }
      //$(this). attr('href', href);
    });
  
    $('#mobilefootermenu>ul>li.has-sub>a').append('<span class="holder"></span>');  

    //open en sluit 
    $('#Trigger').click(function (e) {
      e.preventDefault();
      $('#offerte-slider').toggleClass('slidedown slideup');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
