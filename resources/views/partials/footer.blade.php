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

<!-- contact iconen -->
<div href="#" class="text-center p-2 show" id="abs-contact" title="Back to top">
<a href="/contact" class="contact" title="contact">
  <svg class="svg-inline--fa fa-clipboard fa-w-14 fa-2x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Pro 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2024 Fonticons, Inc.--><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-4.7 132.7c6.2 6.2 6.2 16.4 0 22.6l-64 64c-6.2 6.2-16.4 6.2-22.6 0l-32-32c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L112 249.4l52.7-52.7c6.2-6.2 16.4-6.2 22.6 0zM192 272c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H208c-8.8 0-16-7.2-16-16zm-16 80H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg>
</a>
<a href="https://wa.me/0224219087?text=Ik%20ben%20geïnteresseerd%20in%20uw%20aangeboden%20producten" target="_blank" title="whatsapp">
  <svg class="svg-inline--fa fa-whatsapp fa-w-14 fa-2x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
</a>
  <!-- <svg class="svg-inline--fa fa-chevron-up fa-w-14 fa-3x" aria-hidden="true" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg><i class="fas fa-chevron-up fa-3x"></i> -->
</div>

