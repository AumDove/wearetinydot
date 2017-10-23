<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TINYDoT One
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer footer-distributed" role="contentinfo">
            <div class="footer-container">
                <div class="footer-left">

                    <h3><span>TiNYDoT</span></h3>
                    
                    
    <!--<h3><img class="wordmark-logo-footer" src="images/tinydot_wordmark_extratiny2.png"></h3>-->
                    <p class="footer-links">
                            <a href="http://www.wearetinydot.dev/">Home</a>
                            ·
                            <a href="http://learn.wearetinydot.com/blog" target="_blank">Blog</a>
                            ·
                            <a href="https://learn.wearetinydot.com" target="_blank">Courses</a>
                            ·
                            <a href="http://www.wearetinydot.dev/policies/">Policies</a><!--
                            ·
                            <a href="#">About</a>
                            ·
                            <a href="#">F.A.Q.</a>
                            ·
                            <a href="#">Contact</a>-->
                    </p>
                    <div class="footer-icons">

                        <?php query_posts('post_type=social_links'); ?>
                            <?php while ( have_posts() ): the_post();

                                $socialicon = get_field("social_icon");
                                $medialink = get_field("media_link");
                            ?>

                            <li class="single-social-links">
                                <figure class="social-icon"><a target="_blank" href="<?php echo $medialink ?>"<?php echo $socialicon; ?></a></figure>
                            </li>

                        <?php endwhile; //end of the loop. ?>
                        <?php wp_reset_query(); //resets the altered query back to original. ?>

                    </div>
                    
                </div>

                <div class="footer-center">
                    <div class='footer-company-info'>
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p><span>2250 N Rock Rd.</span><span>Ste. 118-114</span>Wichita, Kansas</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>316-512-8861</p>
                        </div>

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p><a href="mailto:admin@wearetinydot.com?subject=What's the next step?">admin@wearetinydot.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="footer-right">

                        <p class="footer-company-about">
                                <span>About the company</span>
                                TiNYDoT is a web design and development company offering full package branding and coaching for business management.
                        </p>

                        
                        <p class="footer-company-name">TiNYDoT LLC &copy; 2017</p>
                    <p class="footer-company-name"><?php printf( esc_html__( 'Theme by %2$s', 'tinydotone' ), 'tinydotone', '<a href="http://www.megzencoding.com" target="_blank" rel="designer">Meg Miller</a>' ); ?></p>
                </div>
            </div>
<!--            <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tinydotone' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'tinydotone' ), 'WordPress' ); ?></a>
                <p>Copyright &copy; 2017 by TiNYDoT LLC. All rights reserved.</p>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme by %2$s', 'tinydotone' ), 'tinydotone', '<a href="http://www.megzencoding.com" target="_blank" rel="designer">Meg Miller</a>' ); ?>
                <span class="sep"> | </span>
            </div> .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
