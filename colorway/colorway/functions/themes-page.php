<?php
// Add scripts and stylesheet
function enqueue_styles() {
    global $themename, $themeslug, $options;
    wp_register_style($themeslug . 'storecss', get_template_directory_uri() . '/functions/theme-page-style.css');
    wp_enqueue_style($themeslug . 'storecss');
}
// Add page to the menu
function inkthemes_add_menu() {
    $page = add_theme_page('InkThemes Themes Page', 'InkThemes Themes', 'administrator', 'themes', 'inkthemes_page_init');
    add_action('admin_print_styles-' . $page, 'enqueue_styles');
}
add_action('admin_menu', 'inkthemes_add_menu');
// Create the page
function inkthemes_page_init() {
    $root = get_template_directory_uri();
    ?>
    <div id="contain">
        <div id="themesheader">
        <div style="clear: both;"></div>
        </div>
        <div id="container" class="theme_container">
		<div class="top_banner">
		<a href="<?php echo esc_url('http://www.inkthemes.com'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/functions/images/ink.png"/></a>
		<h1><?php _e('join inkthemes membership', 'colroway'); ?></h1>
		<div class="ruler"></div>
		<p><?php _e('Get 100% complete access to our entire collection of 47+ WordPress Themes for only $147', 'colroway'); ?></p>
		<a class="btn" target="_blank" href="<?php echo esc_url('http://www.inkthemes.com/offers/inkthemes-membership'); ?>" target="_blank"><?php _e('GRAB THIS OFFER $147 ONLY', 'colroway'); ?></a>
		</div>       
		<div class="page_feature_wrapper">
		<div class="page_feature">
		<h2><?php _e('What You Will Get', 'colroway'); ?></h2>
		<div class="ruler"></div>
		<div class="clear"></div>
		<div class="feature_item one odd">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico1.png" />
		<h3><?php _e('Get Access to All InkThemes', 'colroway'); ?></h3>
		<p><?php _e('Launch your new site in few minutes with 47+ fully functional WordPress Themes.', 'colroway'); ?></p>
		</div> 
		<div class="feature_item two even">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico2.png" />
		<h3><?php _e('Forum Support', 'colroway'); ?></h3>
		<p><?php _e('Unparalleled technical support will make your website building hassle free.', 'colroway'); ?></p>
		</div>
		<div class="feature_item three odd">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico3.png" />
		<h3><?php _e('Use on Multiple Domains', 'colroway'); ?></h3>
		<p><?php _e('Use the themes on multiple domains for yourself or for your clients.', 'colroway'); ?></p>
		</div>
		<div class="feature_item four even">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico4.png" />
		<h3><?php _e('Consistent Updates', 'colroway'); ?></h3>
		<p><?php _e('We bring your needs into action with regular updates to bring the best themes for you.', 'colroway'); ?></p>
		</div>
		<div class="feature_item five odd">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico5.png" />
		<h3><?php _e('Photoshop Files', 'colroway'); ?></h3>
		<p><?php _e('Do design edits easily. Get layered photoshop files for all the themes.', 'colroway'); ?></p>
		</div>
		<div class="feature_item six even">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/ico6.png" />
		<h3><?php _e('One Click Install', 'colroway'); ?></h3>
		<p><?php _e('Preloaded with sample data. You are just a click away from building astounding website.', 'colroway'); ?></p>
		</div>
		</div> 
		<div class="theme_feature">
		<h2><?php _e('popular wordpress Themes from inkthemes', 'colroway'); ?></h2>
		<div class="ruler"></div>
		<ul>
		<li>
		<div class="item animated">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/th1.png" />
		<span class="zoom"><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/corporate-wordpress-theme/'); ?>" target="_blank"><?php _e('Read More', 'colroway'); ?></a></span>
		</div>
		<p><?php _e('Business & Blog', 'colroway'); ?></p>
		<span class="detail"><?php _e('WordPress Themes', 'colroway'); ?></span>
		</li>
		<li>
		<div class="item animated">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/th2.png" />
		<span class="zoom"><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/geocraft-directory-listing-wordpress-theme/'); ?>" target="_blank"><?php _e('Read More', 'colroway'); ?></a></span>
		</div>
		<p><?php _e('Directory & Classified', 'colroway'); ?></p>
		<span class="detail"><?php _e('WordPress Themes', 'colroway'); ?></span>
		</li>
		<li>
		<div class="item animated">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/th3.png" />
		<span class="zoom"><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/videocraft-wordpress-theme/'); ?>" target="_blank"><?php _e('Read More', 'colroway'); ?></a></span>
		</div>
		<p><?php _e('Video & Membership', 'colroway'); ?></p>
		<span class="detail"><?php _e('WordPress Themes', 'colroway'); ?></span>
		</li>
		<li>
		<div class="item animated">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/th4.png" />
		<span class="zoom"><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/appointway-wordpress-theme/'); ?>" target="_blank"><?php _e('Read More', 'colroway'); ?></a></span>
		</div>
		<p><?php _e('Appointment & Lead', 'colroway'); ?></p>
		<span class="detail"><?php _e('WordPress Themes', 'colroway'); ?></span>
		</li>
		<li>
		<div class="item animated">
		<img src="<?php echo get_template_directory_uri(); ?>/functions/images/th5.png" />
		<span class="zoom"><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/wordpress-marketplace-theme/'); ?>" target="_blank"><?php _e('Read More', 'colroway'); ?></a></span>
		</div>
		<p><?php _e('Ecommerce & Sales', 'colroway'); ?></p>
		<span class="detail"><?php _e('WordPress Themes', 'colroway'); ?></span>
		</li>
		</ul>
		<h4><a href="<?php echo esc_url('http://www.inkthemes.com/wp-themes/wordpress-marketplace-theme/'); ?>" target="_blank"><?php _e('And many More...', 'colroway'); ?></a></h4>
		</div> 	
		<div class="bottom_feature">
		<h1><?php _e('BUMPER BONUSES (OVER $820) FOR FREE', 'colroway'); ?></h1>
		</div> 
		</div> 
        </div>
    </div>
    <?php
}
