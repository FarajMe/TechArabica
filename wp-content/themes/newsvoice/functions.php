<?php
/**
 * Theme functions and definitions
 *
 * @package Newsvoice
 */

if ( ! function_exists( 'newsvoice_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function newsvoice_enqueue_styles() {
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'newsair-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'newsvoice-style', get_stylesheet_directory_uri() . '/style.css', array( 'newsair-style-parent' ), '1.0' );
		wp_dequeue_style( 'newsair-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'newsvoice-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		//wp_enqueue_style( 'newsvoice-dark', get_template_directory_uri() . '/css/colors/dark.css');

		if(is_rtl()){
		wp_enqueue_style( 'newsair_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'newsvoice_enqueue_styles', 9999 );

function newsvoice_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('newsvoice', get_stylesheet_directory() . '/languages');

require( get_stylesheet_directory() . '/hooks/hook-front-page-main-banner-section.php' );

} 
add_action( 'after_setup_theme', 'newsvoice_theme_setup' );


if (!function_exists('newsvoice_get_block')) :
    /**
     *
     *
     * @since Newsvoice 1.0.0
     *
     */
    function newsvoice_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('hooks/blocks/block-' . $section, $block);

    }
endif;

function newsvoice_customize_register($wp_customize) {

require( get_stylesheet_directory() . '/customize/theme-layout.php' );

}
add_action('customize_register', 'newsvoice_customize_register');



/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Newsair
 */

if (!function_exists('newsair_post_categories')) :
    function newsair_post_categories($separator = '&nbsp')
    {
        if ( 'post' === get_post_type() ) {
            $categories = wp_get_post_categories(get_the_ID());
            if(!empty($categories)){
                ?>
                <div class="bs-blog-category">
                    <?php
                    foreach($categories as $c){
                        $style = '';
                        $cat = get_category( $c );
                        // $color = get_term_meta($cat->term_id, 'category_color', true);
                        $color = get_theme_mod('category_' .absint($cat->term_id). '_color' , '#008080');
                        if($color){
                            $style = "background-color:".esc_attr($color);
                        }
                        ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" style="<?php echo esc_attr($style);?>" id="<?php echo 'category_' .absint($cat->term_id). '_color'; ?>" >
                            <?php echo esc_html($cat->cat_name);?>
                        </a>
                    <?php } ?>
                 </div>
                <?php
            }
        }
        
    }
endif;