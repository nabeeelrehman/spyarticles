<?php
/**
 * The main template file.
 * 
 * @package vega
 */
?>
<?php get_header(); ?>
<?php get_template_part('parts/banner'); ?>

    <!-- ========== Content Starts ========== -->
    <div class="section blog-feed bg-white">
        <div class="container">
            <div class="row">
                <?php $post_type = get_post_type();
					if ($post_type == "sw_products"){
					?>      
                <div class="col-md-12 blog-feed-column gallery-filt">
				 <div class="sec-title text-center" style="margin-bottom: 50px;"><span>Search our dealer gallery</span></div>
					<?php
						 echo do_shortcode( '[searchandfilter fields="sw_categories,sw_colours,sw_materials,search" post_types="sw_products"]' );
					}
					else{
					?><div class="col-md-12 blog-feed-column"><?php	
					}
					?>
                 <div class="row">
                    <!-- Loop -->
                    <?php 
                    if ( have_posts() ) { 
                        while ( have_posts() ) : the_post();
                            get_template_part( 'parts/content', get_post_format() );
                        endwhile;
                    } 
                    else { ?>
                    <div class="no-results"><p><?php _e('No posts found.', 'vega'); ?></p></div>
                    <?php } ?>
                    <!-- /Loop -->
                    
                    <!-- Pagination -->
                    <div class="posts-pagination">
                        <div class="posts-pagination-block">
                            <?php if( get_next_posts_link() ) { next_posts_link('<span class="ic ic-angle-left"></span>'); }?>
                            <?php if( get_previous_posts_link() ) { previous_posts_link('<span class="ic ic-angle-right"></span>'); } ?>
                        </div>
                    </div>
                    <!-- /Pagination -->
                  </div>  
                </div> 
                
                <!-- Sidebar -->
                <!--<div class="col-md-3 sidebar">
                    <?php //get_sidebar(); ?>
                </div> -->
                <!-- /Sidebar -->
                
            </div> 
        </div> 
    </div> 
    <!-- ========== /Content Ends ========== -->

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>