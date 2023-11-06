<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

add_action('admin_head', function () {
    //speciale assets voor backend
    wp_register_style('block_style', asset_path('styles/style-editor.css'));
    wp_enqueue_style('block_style');
});

/**
 * Copyright name & url
 */
add_action('login_head', function () {
    echo "<style type='text/css'>
                .login h1 a {
                    background-image: url('".asset_path('images/logo-omgevingsdienst.svg')."');
                    background-size: 230px 72px;
                    width: 230px;
                    height: 72px;
                }
    </style>";
});

add_filter('login_headerurl', function () {
    $dev_copyright_url = 'https://indrukwekkend.nl';
    return !empty($dev_copyright_url) ? $dev_copyright_url : '';
});

add_filter('admin_footer_text', function () {
    $dev_copyright_name = 'Indrukwekkend';
    $dev_copyright_url = 'https://indrukwekkend.nl';

    if (!empty($dev_copyright_name) && !empty($dev_copyright_url)) {
        echo "Powered by <a href='" . $dev_copyright_url . "' target='_blank'>" . $dev_copyright_name . "</a>";
    }
});


// // //Gutenberg CSS
// add_action('admin_head', function () {
//     //speciale assets voor backend
//     wp_register_style('block_style', asset_path('styles/gutenberg.css'));
//     wp_enqueue_style('block_style');
// });

//Gutenberg template loader on post-types
function myplugin_register_template() {
    $post_type_object = get_post_type_object( 'page' );
    $post_type_object->template = array(
        array( 'indrukwekkend/header-intro' ),
    );

    $post_type_object = get_post_type_object( 'post' );
    $post_type_object->template = array(
        array( 'indrukwekkend/post-intro' ),
    );
}
//add_action( 'init',  __NAMESPACE__ . '\\myplugin_register_template' );
