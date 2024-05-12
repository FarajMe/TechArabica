<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Newsvoice
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'newsvoice' ); ?></a>
    <div class="wrapper" id="custom-background-css">
      <!--header--> 
      <?php do_action('newsair_action_newsair_header_type_section'); 
 $newsair_enable_main_slider = get_theme_mod('show_main_banner_section',1);

      ?>
<!--mainfeatured start-->
<!--mainfeatured start-->
<div class="mainfeatured<?php if (!empty($main_banner_section_background_image)) { echo ' over mt-0'; }?>">
    <div class="featinner">
        <!--container-->
        <div class="container">
            <!--row-->
             <div class="row gx-1<?php echo esc_attr($slider_position);?>">              
                <?php
                    do_action('newsvoice_action_front_page_main_section_1');
                ?>  
            </div><!--/row-->
        </div><!--/container-->
    </div>
</div>
<!--mainfeatured end-->