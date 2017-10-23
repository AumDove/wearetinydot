<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



get_header(); ?>

<div id="primary" class="content-area">
    <main id="front" class="site-main" role="main">
<!--        <div id="skip-to-course-section" class="course-section">
            <div class="">
                <h4 class="course-head">Learn with TiNYDoT</h4>
                <h5 class="course-sub-head">Build Your Business &AMP; Keep Your Sanity</h5>
                <p class="course-intro">Our new course will help you get your business branded and on the web in a few short weeks. If you are ready to take the next step from freelance side-hustle to fully legit business, you&apos;ve come to the right place. </p>

                <ul class="frontpage-course-head frontpage-flexbox-featured">

                    <?php query_posts('posts_per_page=3&post_type=course_info'); ?>
                        <?php while ( have_posts() ): the_post();
                            $faicon = get_field("font_awesome");
                            $icon = get_field("icon");
                            $benefit = get_field("benefit_title");
                            $description = get_field("description");
                            $size = "small";
                        ?>

                        <li class="individual-course-info">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <h6><?php echo $benefit; ?></h6>
                            <figure class="awesome-icon"><?php echo $faicon; ?></figure>

                            <p><?php echo $description; ?></p>
                        </li>

                        <?php endwhile; //end of the loop. ?>
                        <?php wp_reset_query(); //resets the altered query back to original. ?>

                </ul>
            </div>
            
            <div class="continue-reading">
                    
                <a href="https://tinydot.teachable.com/" target="_blank" rel="bookmark">
                    <?php
                        printf(
                                wp_kses( __( 'Learn More', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        );
                    ?>
                </a>
            </div>
        
        
        -->
    <h4 id="skip-to-featured" class="front-headline">Featured Work</h4> 
        <ul class="frontpage-flexbox-featured">
            <?php query_posts('posts_per_page=3&post_type=featured_work'); ?>
                <?php while ( have_posts() ): the_post();
                    $image_1 = get_field("image_1");
                    $size = "medium";
                    $project = get_field('project');
                    $client = get_field('client');
                    $link = get_field('live_site_link');
                   
                ?>
            
                <li class="individual-frontpage-featured">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <figure><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image($image_1, $size); ?></a></figure>
                    
                   
                </li>
                
                <?php endwhile; //end of the loop. ?>
                <?php wp_reset_query(); //resets the altered query back to original. ?>
                
        </ul>
    
            <div class="all-work">
                <h4 class="front-headline"><a href="/featured-work" rel="bookmark">Check Out More Projects</a></h4>
                
                    <div class="continue-reading">

                    </div>

            </div>
        <div id="skip-to-contact" class="about-artist"><!-- Begin Artist About Section-->
                <h4 class="front-headline">About TiNYDoT</h4>
                <ul class="social-links-container">
                    <li class="single-social-links"><h6 class="social-head">Follow Us: </h6></li>
                    <?php query_posts('post_type=social_links'); ?>
                        <?php while ( have_posts() ): the_post();
                        
                            $socialicon = get_field("social_icon");
                            $medialink = get_field("media_link");
                        ?>
                    
                        <li class="single-social-links">
                            <figure class="social-icon"><a target="_blank" href=" <?php echo $medialink ?>"<?php echo $socialicon; ?></a></figure>
                            
                        </li>
                        
                        <?php endwhile; //end of the loop. ?>
                        <?php wp_reset_query(); //resets the altered query back to original. ?>
                       
                </ul>
                <div class="artist"><!-- Begin Artist Container -->
                    <div class="artist-top">
                        <p>After struggling to start our business as a web design and development company, we
                            decided it was time to come up with a better solution. We came up with a list
                            of simple steps that anyone can follow, to get their own business started from the
                            ground up. After months of work and countless hours of testing, we have developed a
                            step by step system for business owners to eliminate the insanity of wading though numerous
                            articles and infinitely flowing advice on how to start a business.</p>
                        <p>TiNYDoT also offers full service branding, design and development options for small business
                            owners who would like to step it up and get more professional with their online presence. If
                            you are looking to drastically improve your website, logo or company brand, we can help!
                        </p>
                    </div>
                
                
                <ul class="artist-container">
                    <?php query_posts('post_type=about_section'); ?>
                        <?php while ( have_posts() ): the_post();
                            $memberimage = get_field("member_image");
                            $size = "small";
                            $memberbio = get_field("member_bio");
                            $memberquote = get_field("member_quote");

                        ?>

                        <li class="box-artist-image">
                            <figure class="artist-img"><?php echo wp_get_attachment_image($memberimage, $size); ?></figure>
                        </li>
                        <li class="box-artist-desc">
                                <p class="artist-desc"><?php echo $memberbio; ?></p>
                        </li>
                        <li class="artist-bottom"> 
                            <blockquote><?php echo $memberquote; ?></blockquote>
                        </li>
                        
                        
                        
                    <?php endwhile; //end of the loop. ?>
                    <?php wp_reset_query(); //resets the altered query back to original. ?>

                </ul>
                <div class="continue-reading">

                    <a href="http://learn.wearetinydot.com/blog" target="_blank" rel="bookmark">
                        <?php
                            printf(
                                    wp_kses( __( 'Read Blog', 'tinydotone' ), array( 'span' => array( 'class' => array() ) ) ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            );
                        ?>
                    </a>
                </div>
                </div>
                
<!--                <div class="list-builder">
                    
                <script src="https://assets.convertkit.com/assets/CKJS4.js?v=21"></script>
                    <div class="ck_form_container ck_inline" data-ck-version="6">
                      <div class="ck_form ck_naked">
                            <div class="ck_form_fields">
                              <div id="ck_success_msg" style="display:none;">
                                <p>Success! Now check your email to confirm your subscription.</p>
                              </div>

                                Form starts here  
                              <form id="ck_subscribe_form" class="ck_subscribe_form" action="https://app.convertkit.com/landing_pages/280128/subscribe" data-remote="true">
                                <input type="hidden" value="{&quot;form_style&quot;:&quot;naked&quot;,&quot;embed_style&quot;:&quot;inline&quot;,&quot;embed_trigger&quot;:&quot;scroll_percentage&quot;,&quot;scroll_percentage&quot;:&quot;70&quot;,&quot;delay_seconds&quot;:&quot;10&quot;,&quot;display_position&quot;:&quot;br&quot;,&quot;display_devices&quot;:&quot;all&quot;,&quot;days_no_show&quot;:&quot;15&quot;,&quot;converted_behavior&quot;:&quot;show&quot;}" id="ck_form_options">
                                <input type="hidden" name="id" value="280128" id="landing_page_id">
                                <input type="hidden" name="ck_form_recaptcha" value="" id="ck_form_recaptcha">
                                <div class="ck_errorArea">
                                  <div id="ck_error_msg" style="display:none">
                                    <p>There was an error submitting your subscription. Please try again.</p>
                                  </div>
                                </div>
                                <div class="ck_control_group ck_email_field_group">
                                  <label class="ck_label" for="ck_emailField" style="display: none">Email Address</label>
                                  <input type="text" name="first_name" class="ck_first_name" id="ck_firstNameField" placeholder="First Name">
                                  <input type="email" name="email" class="ck_email_address" id="ck_emailField" placeholder="Email Address" required>
                                </div>
                                <div class="ck_control_group ck_captcha2_h_field_group ck-captcha2-h" style="position: absolute !important;left: -999em !important;">
                                  <input type="text" name="captcha2_h" class="ck-captcha2-h" id="ck_captcha2_h" placeholder="We use this field to detect spam bots. If you fill this in, you will be marked as a spammer.">
                                </div>


                                <button class="subscribe_button ck_subscribe_button btn fields" id="ck_subscribe_button">
                                  Sign Me Up!
                                </button>
                              </form>
                            </div>

                          </div>

                    </div>
                </div>-->
                
                
                
<!--                <ul class="social-links-container">
                    <h6 class="social-head">Follow Us: </h6>
                    <?php query_posts('post_type=social_links'); ?>
                        <?php while ( have_posts() ): the_post();
                        
                            $socialicon = get_field("social_icon");
                            $medialink = get_field("media_link");
                        ?>
                    
                        <li class="single-social-links">
                            <figure class="social-icon"><a target="_blank" href="<?php echo $medialink ?>"</a><?php echo $socialicon; ?></figure>
                        </li>
                        
                        <?php endwhile; //end of the loop. ?>
                        <?php wp_reset_query(); //resets the altered query back to original. ?>
                       
                </ul>-->
            
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();


