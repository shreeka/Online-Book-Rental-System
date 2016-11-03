<?php

function inkthemes_options() {
    // VARIABLES
    $themename = function_exists('wp_get_theme') ? wp_get_theme() : wp_get_theme();
    $themename = $themename['Name'];
    $shortname = "of";
    //Stylesheet Reader
    $alt_stylesheets = array("black" =>
        "black", "brown" => "brown", "blue" => "blue", "green" => "green", "pink" => "pink", "purple" => "purple", "red" => "red", "yellow" => "yellow");
    // Test data
    $test_array = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");
    // Multicheck Array
    $multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
    // Multicheck Defaults
    $multicheck_defaults = array("one" => "1", "five" => "1");
    // Background Defaults
    $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
    // Pull all the categories into an array
    // home page blog post on/off options
    $home_page_blog = array("on_with_sidebar" => __("On( With Sidebar )", 'colorway'), "on_without_sidebar" => __("On( Without Sidebar )", 'colorway'), "off" => __("Off", 'colorway'));
    // Home page slider on/off option
    $home_page_slider = array("on" => "On", "off" => "Off");
    // Home page blog post count
    $home_page_blog_post = array("3" => 3,"5" => 5, "10" => 10, "15" => 15);

    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }
    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = __('Select a page:', 'colorway');
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_stylesheet_directory_uri() . '/images/';

    $options = array(array("name" => __("General Settings", 'colorway'),
            "type" => "heading"),
        array("name" => __("Custom Logo", 'colorway'),
            "desc" => __("Choose your own logo. Optimal Size: 215px Wide by 55px Height", 'colorway'),
            "id" => "colorway_logo",
            "type" => "upload"),
        array("name" => __("Custom Favicon", 'colorway'),
            "desc" => __("Specify a 16px x 16px image that will represent your website's favicon.", 'colorway'),
            "id" => "colorway_favicon",
            "type" => "upload"),
        array("name" => __("Tracking Code", 'colorway'),
            "desc" => __("Paste your Google Analytics (or other) tracking code here.", 'colorway'),
            "id" => "colorway_analytics",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Home Page Blog post On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page blog post as per your requirement.", 'colorway'),
            "id" => "colorway_home_page_blog_post",
            "std" => "on_with_sidebar",
            "type" => "radio",
            "options" => $home_page_blog),
//****=============================================================================****//
//****-----------This code is used for creating slider settings--------------------****//							
//****=============================================================================****//						
        array("name" => __("Home Top Feature", 'colorway'),
            "type" => "heading"),
        array("name" => __("Home Top Feature Image", 'colorway'),
            "desc" => __("Choose Image for your Home Top Feature. Optimal Size: 900px x 350px", 'colorway'),
            "id" => "colorway_slideimage1",
            "type" => "upload"),
        array("name" => __("Home Top Feature Heading", 'colorway'),
            "desc" => __("Enter the Heading for Home Top Feature", 'colorway'),
            "id" => "colorway_slideheading1",
            "std" => "",
            "type" => "text"),
        array("name" => __("Home Top Feature Heading Link", 'colorway'),
            "desc" => __("Enter the Link URL in Heading for Home Top Feature", 'colorway'),
            "id" => "colorway_slidelink1",
            "std" => "",
            "type" => "text"),
        array("name" => __("Home Top Feature Description", 'colorway'),
            "desc" => __("Description for Home Top Feature", 'colorway'),
            "id" => "colorway_slidedescription1",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Home Page Slider On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page Slider as per your requirement.", 'colorway'),
            "id" => "colorway_home_page_slider",
            "std" => "on",
            "type" => "radio",
            "options" => $home_page_slider),
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//							
//****=============================================================================****//	
        array("name" => __("Home Page Settings", 'colorway'),
            "type" => "heading"),
        array("name" => __("Home Page Intro", 'colorway'),
            "desc" => __("Enter your heading text for home page", 'colorway'),
            "id" => "inkthemes_mainheading",
            "std" => "",
            "type" => "text"),
        //***Code for first column***//
        array("name" => __("First Feature Image", 'colorway'),
            "desc" => __("Choose image for your feature column first. Optimal size 198px x 115px", 'colorway'),
            "id" => "inkthemes_fimg1",
            "std" => "",
            "type" => "upload"),
        array("name" => __("First Feature Heading", 'colorway'),
            "desc" => __("Enter your heading line for first column", 'colorway'),
            "id" => "inkthemes_headline1",
            "std" => "",
            "type" => "text"),
        array("name" => __("First Feature Link", 'colorway'),
            "desc" => __("Enter your link for feature column first", 'colorway'),
            "id" => "inkthemes_link1",
            "std" => "",
            "type" => "text"),
        array("name" => __("First Feature Content", 'colorway'),
            "desc" => __("Enter your feature content for column first", 'colorway'),
            "id" => "inkthemes_feature1",
            "std" => "",
            "type" => "textarea"),
        //***Code for second column***//	
        array("name" => __("Second Feature Image", 'colorway'),
            "desc" => __("Choose image for your feature column second. Optimal size 198px x 115px", 'colorway'),
            "id" => "inkthemes_fimg2",
            "std" => "",
            "type" => "upload"),
        array("name" => __("Second Feature Heading", 'colorway'),
            "desc" => __("Enter your heading line for second column", 'colorway'),
            "id" => "inkthemes_headline2",
            "std" => "",
            "type" => "text"),
        array("name" => __("Second Feature Link", 'colorway'),
            "desc" => __("Enter your link for feature column second", 'colorway'),
            "id" => "inkthemes_link2",
            "std" => "",
            "type" => "text"),
        array("name" => __("Second Feature Content", 'colorway'),
            "desc" => __("Enter your feature content for column second", 'colorway'),
            "id" => "inkthemes_feature2",
            "std" => "",
            "type" => "textarea"),
        //***Code for third column***//	
        array("name" => __("Third Feature Image", 'colorway'),
            "desc" => __("Choose image for your feature column thrid. Optimal size 198px x 115px", 'colorway'),
            "id" => "inkthemes_fimg3",
            "std" => "",
            "type" => "upload"),
        array("name" => __("Third Feature Heading", 'colorway'),
            "desc" => __("Enter your heading line for third column", 'colorway'),
            "id" => "inkthemes_headline3",
            "std" => "",
            "type" => "text"),
        array("name" => __("Third Feature Link", 'colorway'),
            "desc" => __("Enter your link for feature column third", 'colorway'),
            "id" => "inkthemes_link3",
            "std" => "",
            "type" => "text"),
        array("name" => __("Third Feature Content", 'colorway'),
            "desc" => __("Enter your feature content for third column", 'colorway'),
            "id" => "inkthemes_feature3",
            "std" => "",
            "type" => "textarea"),
        //***Code for fourth column***//	
        array("name" => __("Fourth Feature Image", 'colorway'),
            "desc" => __("Choose image for your feature column fourth. Optimal size 198px x 115px", 'colorway'),
            "id" => "inkthemes_fimg4",
            "std" => "",
            "type" => "upload"),
        array("name" => __("Fourth Feature Heading", 'colorway'),
            "desc" => __("Enter your heading line for fourth column", 'colorway'),
            "id" => "inkthemes_headline4",
            "std" => "",
            "type" => "text"),
        array("name" => __("Fourth Feature link", 'colorway'),
            "desc" => __("Enter your link for feature column fourth", 'colorway'),
            "id" => "inkthemes_link4",
            "std" => "",
            "type" => "text"),
        array("name" => __("Fourth Feature Content", 'colorway'),
            "desc" => __("Enter your feature content for fourth column", 'colorway'),
            "id" => "inkthemes_feature4",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Home Page Testimonial", 'colorway'),
            "desc" => __("Enter your text for homepage testimonial in short paragraph.", 'colorway'),
            "id" => "inkthemes_testimonial",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Home Page Blog Heading", 'colorway'),
            "desc" => __("Enter your text for homepage blog heading.", 'colorway'),
            "id" => "inkthemes_blog_head",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Home Page Blog Posts", 'colorway'),
            "desc" => __("Select Number of Post you want to show on Home page.", 'colorway'),
            "id" => "inkthemes_blog_posts",
            "std" => "3",
            "type" => "radio",
            "options" => $home_page_blog_post),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => __("Styling Options", 'colorway'),
    "type" => "heading"),
        array("name" => __("Custom CSS", 'colorway'),
            "desc" => __("Quickly add some CSS to your theme by adding it to this block.", 'colorway'),
            "id" => "inkthemes_customcss",
            "std" => "",
            "type" => "textarea"),
        array("name" => __("Footer Settings", 'colorway'),
            "type" => "heading"),
        array("name" => __("Facebook URL", 'colorway'),
            "desc" => __("Enter your Facebook URL if you have one", 'colorway'),
            "id" => "colorway_facebook",
            "std" => "",
            "type" => "text"),
        array("name" => __("Twitter URL", 'colorway'),
            "desc" => __("Enter your Twitter URL if you have one", 'colorway'),
            "id" => "colorway_twitter",
            "std" => "",
            "type" => "text"),
        array("name" => __("RSS Feed URL", 'colorway'),
            "desc" => __("Enter your RSS Feed URL if you have one", 'colorway'),
            "id" => "colorway_rss",
            "std" => "",
            "type" => "text"),
        array("name" => __("Linked In URL", 'colorway'),
            "desc" => __("Enter your Linkedin URL if you have one", 'colorway'),
            "id" => "colorway_linkedin",
            "std" => "",
            "type" => "text"),
        array("name" => __("Stumble Upon URL", 'colorway'),
            "desc" => __("Enter your Stumble Upon URL if you have one", 'colorway'),
            "id" => "colorway_stumble",
            "std" => "",
            "type" => "text"),
        array("name" => __("Digg URL", 'colorway'),
            "desc" => __("Enter your Stumble Upon URL if you have one", 'colorway'),
            "id" => "colorway_digg",
            "std" => "",
            "type" => "text"),
		array("name" => __("Premium Features", 'colorway'),
            "type" => "heading"),
		array("name" => "More Slides",			
			"msg" => "Add Unlimited slides for your sideshow",
            "type" => "pro"),	
		array("name" => "Color Schemes",			
			"msg" => "Get Eight Different Color Schemes",
            "type" => "pro"),
		array("name" => "Seo Options",			
			"msg" => "SEO Inbuilt",
            "type" => "pro"),
		array("name" => "Testimonials Option",			
			"msg" => "Option to add Unlimited testimonials",
            "type" => "pro"),
		array("name" => "Rtl Compatiblity",			
			"msg" => "Only available in pro version",
            "type" => "pro"),
		
    );
    return apply_filters('inkthemes_option_defaults', array('of_template' => $options, 'theme_name' => $themename));
}

?>
