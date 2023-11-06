<?php 
add_theme_support( 'editor-color-palette', array(
	

	array(
		'name'	=> __( 'Oranje', 'indrukwekkend' ),
		'slug'	=> 'oranje',
		'color'	=> '#FF7900',
	),
	array(
		'name'	=> __( 'Groen', 'indrukwekkend' ),
		'slug'	=> 'groen',
		'color' => '#4CB134',
	),
	array(
		'name'	=> __( 'Donker Grijs', 'indrukwekkend' ),
		'slug'	=> 'donker-grijs',
		'color'	=> '#404853',
	),
  array(
		'name'	=> __( 'Grijs', 'indrukwekkend' ),
		'slug'	=> 'grijs',
		'color'	=> '#B4B5B5',
	),
	array(
		'name'	=> __( 'Licht Grijs', 'indrukwekkend' ),
		'slug'	=> 'licht-grijs',
		'color'	=> '#F1EFED',
	),
	array(
		'name'	=> __( 'Wit', 'indrukwekkend' ),
		'slug'	=> 'wit',
		'color'	=> '#FFFFFF',
	),
) );

// -- Disable Custom Colors
add_theme_support( 'disable-custom-colors' );


// Adds support for editor font sizes.
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => __( 'small', 'genesis-sample' ),
		'shortName' => __( 'S', 'genesis-sample' ),
		'size'      => 16,
		'slug'      => 'small'
	),
	array(
		'name'      => __( 'regular', 'genesis-sample' ),
		'shortName' => __( 'M', 'genesis-sample' ),
		'size'      => 21,
		'slug'      => 'regular'
	),
	array(
		'name'      => __( 'large', 'genesis-sample' ),
		'shortName' => __( 'L', 'genesis-sample' ),
		'size'      => 31,
		'slug'      => 'large'
	),
	array(
		'name'      => __( 'larger', 'genesis-sample' ),
		'shortName' => __( 'XL', 'genesis-sample' ),
		'size'      =>  36,
		'slug'      => 'larger'
	)
) );


// --Disable Yoast Love letter -->
add_action( 'template_redirect', function () {
 
	if ( ! class_exists( 'WPSEO_Frontend' ) ) {
			return;
	}

	$instance = WPSEO_Frontend::get_instance();

	// make sure, future version of the plugin does not break our site.
	if ( ! method_exists( $instance, 'debug_mark') ) {
			return ;
	}

	// ok, let us remove the love letter.
	 remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
}, 9999 );

?>
