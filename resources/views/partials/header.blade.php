<header class="banner site-header" id="masthead" role="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-top">
      @if (has_nav_menu('top_navigation'))
        {!! wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav']) !!}
      @endif
      <button class='search-header-icon' id='search-open'><i class="fas fa-search"></i></button>
    </nav>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div class="mobile-menu">
        <!-- contact iconen -->
        <div href="#" class="text-center p-2 show" id="mobile-menu-contact" title="Back to top"> 
          <a href="/contact" class="contact" title="contact">
            <svg class="svg-inline--fa fa-phone fa-w-14 fa-2x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
          </a>
          <a href="https://wa.me/+31851093115?text=Ik%20ben%20geïnteresseerd%20in%20uw%20aangeboden%20producten" target="_blank" title="whatsapp">
            <svg class="svg-inline--fa fa-whatsapp fa-w-14 fa-2x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
          </a>
        </div>
        <!-- mobile menu -->
        <button class="hamburger hamburger--spin" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
    </div>
  </div>
</header>
<header class="mobile-navigation-container closed">

    <nav class="nav-mobile">
      <div class="search">
        
        <form action="/?s" method="get" class="search-form">
          <i class="fas fa-search"></i>
          <span class="widget">
            <input class="input-legacy  input-legacy--button input-legacy--open footer__input" type="search" name="s" placeholder="Zoeken">
          </span>
        </form>
      </div>
      @if (has_nav_menu('mobile_navigation'))
        {!! wp_nav_menu(['theme_location' => 'mobile_navigation', 'container_id' => 'cssmenu', 'walker' => new CSS_Menu_Maker_Walker()]) !!}
      @endif
      @if (has_nav_menu('top_navigation'))
        {!! wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>

</header>
<div class="mobile-navigation-overlay closed"></div>


<div id="search">
<button class='search-header-icon' id='search-close'><i class="fas fa-times"></i></button>
    <form role="search" method="get" class="search-form-header" action="/">
        <label>
            <span class="screen-reader-text">Zoeken naar:</span>
            <input type="search" class="search-field" placeholder="Zoeken …" value="" name="s">
        </label>
        <button type="submit" class="search-submit">Zoeken</button>
    </form>
</div>
