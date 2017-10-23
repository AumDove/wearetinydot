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
            
        $icon = get_field("icon");
        $benefit = get_field("benefit_title");
        $description = get_field("description");
        $size = "medium";
    
    ?>
    <h3 class="single-title"><?php the_title(); ?></h3>
            
    <div class="single-flexbox-featured"> 
        
        <div class="single-work-meta">
  
            <img class="mobile-single-course"<?php echo wp_get_attachment_image($icon, $size); ?>
                 
            <h6><?php echo $benefit; ?></h6>
            <p><?php echo $description; ?></p>

        </div>

        

    </div> 
<?php endwhile; // End of the loop. ?>
            <div class="single-button-container">
                <div id="skip-to-contact" class="contact-section">
                    <div class="continue-reading contact-me">

                        <a href="https://tinydot.teachable.com/" target="_blank" rel="bookmark">
                            <?php
                                    printf(
                                            wp_kses( __( 'Enroll Now', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    );
                            ?>
                        </a>
                    </div>
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

