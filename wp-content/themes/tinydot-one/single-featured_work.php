<?php
/**
 * The template for displaying my featured work for my portfolio.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINYDoT One
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main single-page" role="main">


    <?php while ( have_posts() ) : the_post(); 
            
        $project = get_field('project');
        $client = get_field('client');
        $link = get_field('live_site_link');
        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');
        $image_3 = get_field('image_3');
        $size = "large";
    
    ?>
    <h3 class="single-title"><?php the_title(); ?></h3>
            
    <div class="single-flexbox-featured"> 
        
        <div class="single-work-meta">
            
            
            <img class="mobile-single-featured"<?php echo wp_get_attachment_image($image_1, $size); ?>

            <h6><span class="project-metadata-header">Project: </span> <?php echo $project; ?></h6>
            <h6><span class="project-metadata-header">Client: </span><?php echo $client; ?></h6>

            <p class="single-content"><?php the_content(); ?></p>
            
            <p><a href="<?php echo $link; ?>" target="_blank">Live Site Link</a></p>

        </div>

        <div class="single-work-image">
            <figure class="single-image">
            <?php if($image_1){ ?>
                <?php echo wp_get_attachment_image($image_1, $size); ?>
            </figure>
             <?php } ?>
            <figure class="single-image">
             <?php if($image_2){ ?>
                <?php echo wp_get_attachment_image($image_2, $size); ?>
            </figure>
            <?php } ?>
            <figure class="single-image">
            <?php  if($image_3){ ?>
                <?php echo wp_get_attachment_image($image_3, $size); ?>
            </figure>
            <?php } ?>
        </div>

    </div> 
<?php endwhile; // End of the loop. ?>
            <div class="single-button-container">
                <div id="skip-to-contact" class="contact-section">
                    <div class="continue-reading contact-me">

                        <a href="mailto:admin@wearetinydot.com?subject=Hey, Meg! What's the next step?">
                            <?php
                                    printf(
                                            wp_kses( __( 'Contact Us', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    );
                            ?>
                        </a>
                    </div>
                </div>
                <div class="continue-reading front-excerpt">
                             <a href="/featured-work" rel="bookmark">
                                <?php
                                        printf(
                                                wp_kses( __( 'Projects List %s', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                        );
                                ?>
                            </a>
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
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();

