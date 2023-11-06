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
    <button class="hamburger hamburger--spin" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
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