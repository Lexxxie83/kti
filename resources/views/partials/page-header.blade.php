<!-- waar komt dit? -->
<?php if ( has_block( 'indrukwekkend/header-intro' ) || has_block( 'indrukwekkend/header-landing' ) || has_block( 'indrukwekkend/header-home' ) || has_block( 'indrukwekkend/header-verzorgingsgebied' ) ) { }
    else { ?>
    <?php   if ( function_exists('yoast_breadcrumb') && !is_front_page() && !is_home()  ) : ?>
      <div class="page-header">
          <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
        <h1><?php the_title(); ?></h1>
      </div>
      <?php endif; ?>
  <?php } ?>
