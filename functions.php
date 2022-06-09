<?php
// creating  menus
function custom_new_menu_of_letsshoptheme()
{
    register_nav_menus(
        array(
            'header' => 'Header Menu',
            'footer' => 'Footer Menu',
        )
    );
}
add_action('init', 'custom_new_menu_of_letsshoptheme');

add_post_type_support( 'product', 'thumbnail' );
function create_new_post_type_product()
{
    register_post_type(
        'product',
        array(
            'labels' => array(
                'name' => __('Product'),
            ),
            $rewrite = array(
                'slug' => 'product',
                'pages' => true,
                'feeds' => true,
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
    register_taxonomy(
        'product_category',
        array('product'),
        array(
            'labels' => array(
                'name'    =>  'Product Category',
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            ),
            $rewrite = array(
                'slug' => 'product_category'

            )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_new_post_type_product');
/* Custom Post Type End */

function header_and_theme_setup() {

    add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

    add_theme_support(
		'custom-background',
		apply_filters(
			'header_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
}
add_action( 'after_setup_theme', 'header_and_theme_setup' );

/**
 * Add a sidebar.
 */
function letsshoptheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'letsshoptheme_widgets_init' );
get_page_template();