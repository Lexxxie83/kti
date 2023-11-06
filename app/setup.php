<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'top_navigation' => __('Top Navigation', 'sage'),
        'mobile_navigation' => __('Mobiele Navigation', 'sage'),
        'footer1_navigation' => __('Footer links Navigation', 'sage'),
        'footer2_navigation' => __('Footer 2 Navigation', 'sage'),
        'footer3_navigation' => __('Footer 3 Navigation', 'sage'),
        'footer4_navigation' => __('Footer rechts Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Responsive embeds
     * @link https://thrivewp.com/youtube-embed-wordpress/
     * 
     */
    add_theme_support( 'responsive-embeds' );

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
    
    /**
     * Register support for Gutenberg wide images in your theme
     */
    add_theme_support( 'align-wide' );

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_theme_support('editor-styles');

    add_editor_style(asset_path('styles/style-editor.css'));

    /**
     * toevoegen van de vertaling
     * @link https://roots.io/docs/sage/9.x/localization/#generating-language-files
     */
    load_theme_textdomain('sage', get_template_directory() . '/lang');
    
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Add ACF JSON
 */
add_filter(
    'acf/settings/save_json',
    function ($path) {
        $targetDir = get_template_directory() . '/acf-json';
        return (file_exists($targetDir) && is_dir($targetDir)) ? $targetDir : $path;
    }
);

add_filter(
    'acf/settings/load_json',
    function ($paths) {
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }
);

/**
 * Add ACF options page
 */
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(__('Options', 'od'));

    // add sub page
    acf_add_options_page(
        array(
            'page_title' => __('General', 'od'),
            'menu_title' => __('General', 'od'),
            'parent_slug' => $parent['menu_slug'],
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => __('Header', 'od'),
            'menu_title' => __('Header', 'od'),
            'parent_slug' => $parent['menu_slug'],
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => __('Footer', 'od'),
            'menu_title' => __('Footer', 'od'),
            'parent_slug' => $parent['menu_slug'],
        )
    );
}
