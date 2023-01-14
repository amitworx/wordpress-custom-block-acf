<?php 


// directory path
// directory uri

define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URI', get_stylesheet_directory_uri() );




// add bootsrap to the theme
function add_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_bootstrap' );



// add bootstrap to the editor
function add_bootstrap_editor() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
}
add_action( 'enqueue_block_editor_assets', 'add_bootstrap_editor' );




// block category
add_filter('block_categories_all', 'add_block_category', 10, 2);

function add_block_category($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom-blocks',
                'title' => 'Custom Blocks',
                'icon'  => 'wordpress',
            ),
        )
    );
}












// add our block to our block catergory
// carousel block
add_action( 'init', 'register_acf_blocks' );

function register_acf_blocks(){
    register_block_type( THEME_DIR . '/blocks/carousel' );
}



