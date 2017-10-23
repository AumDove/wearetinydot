<?php
/**
 * The template for displaying featured work archive / index page
 *

 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Meg
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); 
                            $image_1 = get_field("image_1");
                            $size = "large";
                            $project = get_field('project');
                            $client = get_field('client');
                            $link = get_field('live_site_link');
                        ?>
                        
                        <div class="individual-frontpage-featured">   
                            <div class="featured-work-meta">
                                <h3><?php the_title(); ?></h3>
                                 <div class="featured-work-image">
                                <figure class="featured-image">
                                <?php if($image_1){ ?>
                                    <?php echo wp_get_attachment_image($image_1, $size); ?>
                                </figure>
                                 <?php } ?>
                                     
                                </div>
                                <h6><span class="project-metadata-header">Project:</span> <?php echo $project; ?></h6>
                                <h6><span class="project-metadata-header">Client: </span><?php echo $client; ?></h6>
                                <?php the_excerpt(); ?>
                                <p><a href="<?php echo $link; ?>" target="_blank">Live Site Link</a></p>

                            </div>
                        </div> 

                        
                        <div class="continue-reading front-excerpt">
                        <a href="<?php echo esc_url ( get_permalink() ); ?>" rel="bookmark">
                            <?php
                                    printf(
                                            wp_kses( __( 'Project Page %s', 'meg' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    );
                            ?>
                        </a>
                    </div>
                    
                     
                    
                        <?php
			endwhile; // End of the loop.
			?>
                    
                    <div class="continue-reading back-home-button">
                         <a href="/" rel="bookmark">
                             
                            <?php
                                    printf(
                                            wp_kses( __( 'Back Home %s', 'meg' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    );
                            ?>
                        </a>
                    </div>
                   <?php meg_paging_nav();?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();