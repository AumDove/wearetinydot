<?php
/**
 * The template for displaying benefits page
 *

 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINYDoT One
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			
                        
                        <div class="archive-course-info">   
                            <h4 class="front-headline course-head">What We Offer</h4>
            
                            <ul class="frontpage-course-head">
                                <?php query_posts('post_type=course_info'); ?>
                                    <?php while ( have_posts() ): the_post();
                                        $icon = get_field("icon");
                                        $benefit = get_field("benefit_title");
                                        $description = get_field("description");
                                        $size = "medium";
                                    ?>

                                    <li class="individual-course-info">
                <!--                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>-->
                                        <figure><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($icon, $size); ?></a></figure>
                                        <p><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_metadata($description); ?></a></p>
                                    </li>

                                    <?php endwhile; //end of the loop. ?>
                                    <?php wp_reset_query(); //resets the altered query back to original. ?>

                            </ul>
                    </div>
                    
                     
                    
                        
                    
                    <div class="continue-reading back-home-button">
                         <a href="/" rel="bookmark">
                             
                            <?php
                                    printf(
                                            wp_kses( __( 'Back Home %s', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    );
                            ?>
                        </a>
                    </div>
                   <?php // tinydotone_paging_nav();?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();