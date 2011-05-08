<?php
    // Load jQuery
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
        wp_enqueue_script('jquery');
    }

    // Clean up the <head>
    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    }
    add_action('init', 'removeHeadLinks');
	wp_deregister_script('l10n');
	
    // remove version info from head and feeds
    function complete_version_removal() {
        return '';
    }
    add_filter('the_generator', 'complete_version_removal');

    // custom excerpt.
    function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
            $text = get_the_content('');
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			if (stristr($text,"<style")) { //get rid of CSS.
				$text1 = explode("<style", $text);
				$text2 = explode("</style>", $text);
				$text = $text1[0] . $text2[1]; //this might work
			}
            $text = strip_tags($text, '<strong>');
            //ALLOWED tags (will be rendered) - could add more
            //They count against the word count below, though
			$excerpt_length = 55; //default excerpt is 55 words
			$words = explode(' ', $text, $excerpt_length + 1);
			
			if (count($words)> $excerpt_length) {
				array_pop($words);
				array_push($words, '...'); //indicates "read more..."
				$text = implode(' ', $words);
			}
		}
		return $text;
	}
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
    add_filter('get_the_excerpt', 'improved_trim_excerpt');

    //Support for Featured Images for posts or pages
    add_theme_support( 'post-thumbnails' );
	
    //Support for WP3 menus - create menus in the admin interface, then add them to widget areas in
    //the theme (like, say, the Nav widget area). Menus are not baked into this theme.
    add_theme_support( 'menus');

    // add custom content after each post
    function add_post_content($content) {
        if(!is_feed() && !is_home()) {
            //$content .= '<p>This article is copyright &copy; '.date('Y').'&nbsp;'.bloginfo('name').'</p>';
            $content .= '';
        }
        return $content;
    }
    add_filter('the_content', 'add_post_content');

    //enable shortcodes in widgets
    if (!is_admin()) {
        add_filter('widget_text', 'do_shortcode', 11);
    }

	// sidebars / widget areas: I have one in the header, nav, sidebar, and footer
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id'   => 'sidebar-widgets',
        'description'   => 'These are widgets for the sidebar.',
        //'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //'after_widget'  => '</div>',
        'before_widget' => '',
        'after_widget' => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Nav Widget Area',
        'id'   => 'nav-widget-area',
        'description'   => 'These are widgets for the Navigation area (use a menu!).',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Header Widget Area',
        'id'   => 'header-widget-area',
        'description'   => 'These are widgets for the header.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '', // use h3's here?
        'after_title'   => ''
    ));

    register_sidebar(array(
        'name' => 'Footer Widget Area',
        'id'   => 'footer-widget-area',
        'description'   => 'These are widgets for the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));

?>
