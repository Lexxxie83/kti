<?php
$foot_nav = array(
    'theme_location' => 'footer1_navigation',
    'container' => '',
    'menu_class' => '',
);
$foot_nav1 = array(
  'theme_location' => 'footer2_navigation',
  'container' => '',
  'menu_class' => '',
);
$foot_nav2 = array(
  'theme_location' => 'footer3_navigation',
  'container' => '',
  'menu_class' => '',
);

$foot_nav3 = array(
  'theme_location' => 'footer4_navigation',
  'container' => '',
  'menu_class' => '',
);
?>
 <?php  
  //footer titels uit options ACF pagina
  $footTitle1 = get_field('titel_kolom_1', 'option');
  $footTitle2 = get_field('titel_kolom_2', 'option');
  $footTitle3 = get_field('titel_kolom_3', 'option');
  $footduurzaam = get_field('titel_duurzaam', 'option'); 
 ?>

@if( get_field('contact'))

<?php 
  $formulier = get_field('formulier');
  $titel = $formulier['formulier_titel'];
  $formId = $formulier['form'];

  if($formId==0) {
    if (is_singular('vacatures')) {
      $formId=3;
    } elseif (is_singular('projecten')) {
      $formId=2;
    } elseif (is_singular(array( 'product', 'verzorgingsgebied' )) || is_page()) {
      $formId=1;
    }
  }

  $introText = $formulier['intro_tekst'];
  $aanvullend = $formulier['aanvullende_informatie'];
  $afbeelding = false;
  if(isset($formulier['afbeelding']['url'])) {
    $afbeelding = $formulier['afbeelding']['url'];
  }
?>
  <!-- Footer formulier -->
  <!-- <footer id="offerte" class="footer-offerte">

  <h3 class="h2"><?=$titel?></h3>
    
     <figure class="open-pijltje">
       <img src="@asset('images/wit-pijltje-knop.svg')">
      </figure>
    <div class="container footer-offerte-container slideup" id="offerte-slider">
    <p><strong><?=$introText?></strong></p>

    <div class="aanvullend">
      <div class="content">
        <p class="content-text"><?=$aanvullend?></p>
      </div>
      @if($afbeelding)
      <div class="afbeelding">
        <a href="<?=$afbeelding?>" data-lightbox="image-1">
          <img src="<?=$afbeelding?>" alt="" class="content-afbeelding">
        </a>
      </div>
      @endif
    </div>

    <?php // gravity_form( $formId, false, false, false, '', true ); ?>

    </div>
  </footer> -->

@endif
<!-- Footer banner -->
<footer class="footer-banner">
  <div class="container footer-banner-container">
    <img src="@asset('images/duurzaam-icoon.svg')" alt="" class="logoduurzaam">
    <h2><?=$footduurzaam?></h2>
  </div>
  <img src="@asset('images/oranjeV.svg')" alt="" class="haak">
</footer>

<!-- Footer navigatie -->
<footer class="content-info site-footer" id="menufooter" role="contentinfo">
  <div class="container">
    
    <!-- maak vier kolommen met 4 verschillende menus er in -->
    <div class="col menu-0">
      <a href="/" title="home">
        <img src="@asset('images/logo.png')" alt="" class="logoduurzaam">
      </a>
    </div>
    <div class="col menu-1">
    <p class="footer_titel"><?=$footTitle2?></p>
      {!! wp_nav_menu($foot_nav1) !!}
    </div>
    <div class="col menu-2">
      <p class="footer_titel"><?=$footTitle3?></p>
      {!! wp_nav_menu($foot_nav2) !!}
    </div>
    <div class="col menu-3">

    </div>
    <div class="col menu-4">
      <iframe class="mobile-hidden" frameborder="0" allowtransparency="true" src="https://www.klantenvertellen.nl/retrieve-widget.html?button=true&tenantId=99&locationId=1027470" width="400" height="340"></iframe>
    </div>

  </div>
</footer>

<div id='mobilefootermenu'>
  <ul>
    <li class='has-sub'><a href='#'><span><?=$footTitle1?></span></a>{!! wp_nav_menu($foot_nav) !!}</li>
    <li class='has-sub'><a href='#'><span><?=$footTitle2?></span></a>{!! wp_nav_menu($foot_nav1) !!}</li>
    <li class='has-sub'><a href='#'><span><?=$footTitle3?></span></a> {!! wp_nav_menu($foot_nav2) !!}</li>
  </ul>
</div>

<!-- Footer copyright -->
<footer class="content-info site-footer" id="mainfooter" role="contentinfo">
  <div class="container"> 
    <p>&copy; KTI Installatietechniek</p>  
    {!! wp_nav_menu($foot_nav3) !!}
  </div>
</footer>

<!-- Pijltje naar boven -->
<a href="#" class="text-center p-2 show" id="back-to-top" title="Back to top">
		<svg class="svg-inline--fa fa-chevron-up fa-w-14 fa-3x" aria-hidden="true" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg><!-- <i class="fas fa-chevron-up fa-3x"></i> -->
</a>
