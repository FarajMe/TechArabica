<?php 

if (!function_exists('newsair_main_content')) :
    function newsair_main_content()
    {
        if(!is_front_page() || !is_home()) {
            do_action('newsair_breadcrumb_content');
        }
        $newsair_content_layout = esc_attr(get_theme_mod('newsair_content_layout','grid-right-sidebar'));
        if($newsair_content_layout == "align-content-left" || $newsair_content_layout == "grid-left-sidebar") { ?>
            <!--col-lg-4-->
            <aside class="col-lg-4 sidebar-left">
                <?php get_sidebar();?>
            </aside>
            <!--/col-lg-4-->
        <?php } ?>
            <!--col-lg-8-->
        <?php if($newsair_content_layout == "align-content-right" || $newsair_content_layout == "align-content-left"){ ?>
            <div class="col-lg-8 content-right">
                <?php get_template_part('template-parts/content', get_post_format()); ?>
            </div>
        <?php } elseif($newsair_content_layout == "full-width-content") { ?>
            <div class="col-lg-12 content-full">
                <?php get_template_part('template-parts/content', get_post_format()); ?>
            </div>
        <?php }  if($newsair_content_layout == "grid-left-sidebar" || $newsair_content_layout == "grid-right-sidebar"){ ?>
            <div class="col-lg-8 content-right">
                <?php get_template_part('template-parts/content','grid'); ?>
            </div>
        <?php } elseif($newsair_content_layout == "grid-fullwidth") { ?>
            <div class="col-lg-12 content-full">
                <?php get_template_part('template-parts/content','grid'); ?>
            </div>
        <?php } ?>
            <!--/col-lg-8-->
        <?php if($newsair_content_layout == "align-content-right" || $newsair_content_layout == "grid-right-sidebar") { ?>
            <!--col-lg-4-->
            <aside class="col-lg-4 sidebar-right">
                <?php get_sidebar();?>
            </aside>
            <!--/col-lg-4-->
        <?php }        
    }
endif;
add_action('newsair_action_main_content_layouts', 'newsair_main_content', 40);

if (!function_exists('newsair_single_content')) :
    function newsair_single_content() { 
        $newsair_single_post_category = esc_attr(get_theme_mod('newsair_single_post_category','true'));
        $newsair_single_post_date_format = esc_attr(get_theme_mod('newsair_single_post_date_format', 'default-date'));
        $newsair_single_post_tag = esc_attr(get_theme_mod('newsair_single_post_tag','true'));
        $newsair_single_post_date = esc_attr(get_theme_mod('newsair_single_post_date','true'));
        $newsair_single_post_admin_details = esc_attr(get_theme_mod('newsair_single_post_admin_details','true'));
        global $post;
        if(have_posts()) {
            while(have_posts()) { the_post(); ?>
                <div class="bs-blog-post single"> 
                    <div class="bs-header">
                        <?php  if($newsair_single_post_category == true){ newsair_post_categories(); } ?>
                        <h1 class="title" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </h1>
                        <div class="bs-info-author-block">
                            <div class="bs-blog-meta mb-0">
                                <?php if($newsair_single_post_admin_details == true){ ?>
                                <span class="bs-author"><a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a> <?php esc_html_e('By','newsair'); ?>
                                    <a class="ms-1" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a>
                                </span>
                                <?php } if($newsair_single_post_date == true){ ?>
                                <span class="bs-blog-date">
                                    <?php if($newsair_single_post_date_format == 'default-date'){
                                        echo get_the_date('M'); echo get_the_date('j,'); echo get_the_date('Y'); 
                                    } else {
                                        echo esc_html(get_the_time(get_option('date_format'), get_the_ID()));
                                    } ?>
                                </span>
                                <?php }
                                $tag_list = get_the_tag_list();
                                $tags = get_the_tags();
                                if($newsair_single_post_tag == true){
                                if($tag_list){ ?>
                                <span class="newsair-tags tag-links">
                                    <?php foreach ($tags as $tag) {
                                    $tag_link = get_tag_link($tag->term_id);
                                    echo '#<a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a> ';
                                    } ?>
                                </span>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                <?php
                $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
                if($single_show_featured_image == true) {
                    if (has_post_thumbnail()) {
                        echo '<div class="bs-blog-thumb">';
                        the_post_thumbnail('', array('class' => 'img-fluid'));
                        echo '</div>';
                    
                        $thumbnail_id = get_post_thumbnail_id();
                        if ($thumbnail_id) {
                            $thumbnail_post = get_post($thumbnail_id);

                            if ($thumbnail_post) {
                                $caption = $thumbnail_post->post_excerpt;

                                if (!empty($caption)) {
                                    echo '<span class="featured-image-caption">' . esc_html($caption) . '</span>';
                                }
                            }
                        }
                    }
                } ?>
                <article class="small single">
                    <div class="entry-content">
                        <?php the_content(); newsair_edit_link(); newsair_social_share_post($post); ?>
                        <div class="clearfix mb-3"></div>
                        <?php
                        if(is_rtl()){
                            the_post_navigation(array( 
                            'prev_text' => '%title <div class="fa fa-angle-double-left"></div><span></span>',
                            'next_text' => '<div class="fa fa-angle-double-right"></div><span></span> %title', 
                            'in_same_term' => true,
                            ));
                        } else {
                            the_post_navigation(array(
                            'prev_text' => '<div class="fa fa-angle-double-left"></div><span></span> %title ',
                                'next_text' => ' %title <div class="fa fa-angle-double-right"></div><span></span>',
                                'in_same_term' => true,
                            ));
                        } 
                        wp_link_pages(array(
                        'before' => '<div class="single-nav-links">',
                        'after' => '</div>',
                        ));
                        ?>
                    </div>
              </article>
            </div>
            <?php }
            get_template_part('sections/single','author');
            get_template_part('sections/single','related');
            get_template_part('sections/single','comment');
        }
    }
endif;
add_action('newsair_action_main_single_content', 'newsair_single_content', 40);
