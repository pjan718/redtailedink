<?php
/**
 * Dashboard Administration Screen
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Bootstrap */
require_once('./admin.php');

/** Load WordPress dashboard API */
require_once(ABSPATH . 'wp-admin/includes/dashboard.php');

wp_dashboard_setup();

wp_enqueue_script( 'dashboard' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'media-upload' );
wp_admin_css( 'dashboard' );
wp_admin_css( 'plugin-install' );
add_thickbox();

$title = __('Dashboard');
$parent_file = 'index.php';

if ( is_user_admin() )
	add_screen_option('layout_columns', array('max' => 4, 'default' => 1) );
else
	add_screen_option('layout_columns', array('max' => 4, 'default' => 2) );

add_contextual_help($current_screen,

	'<p>' . __( 'Welcome to your WordPress Dashboard! You will find helpful tips in the Help tab of each screen to assist you as you get to know the application.' ) . '</p>' .
	'<p>' . __( 'The Admin Bar at the top, new in 3.1, provides quick access to common tasks when you are viewing your site.' ) . '</p>' .
	'<p>' . __( 'The left-hand navigation menu provides links to the administration screens in your WordPress application. You can expand or collapse navigation sections by clicking on the arrow that appears on the right side of each navigation item when you hover over it. You can also minimize the navigation menu to a narrow icon strip by clicking on the faint separator lines between the Dashboard and Posts sections, or between Comments and Appearance; when minimized, the submenu items will be displayed on hover.' ) . '</p>' .
	'<p>' . __( 'You can configure your dashboard by choosing which boxes, or modules, to display in the work area, how many columns to display them in, and where each box should be placed. You can hide/show boxes and select the number of columns in the Screen Options tab. To rearrange the boxes, drag and drop by clicking on the title bar of the selected box and releasing when you see a gray dotted-line rectangle appear in the location you want to place the box. You can also expand or collapse each box by clicking once on the title bar of the box. In addition, some boxes are configurable, and will show a &#8220;Configure&#8221; link in the title bar when you hover over it.' ) . '</p>' .
	'<p>' . __( 'The boxes on your Dashboard screen are:' ) . '</p>' .
	'<p>' . __( '<strong>Right Now</strong> - Displays a summary of the content on your site and identifies which theme and version of WordPress you are using.' ) . '</p>' .
	'<p>' . __( '<strong>Recent Comments</strong> - Shows the most recent comments on your posts (configurable, up to 30) and allows you to moderate them.' ) . '</p>' .
	'<p>' . __( '<strong>Incoming Links</strong> - Shows links to your site found by Google Blog Search.' ) . '</p>' .
	'<p>' . __( '<strong>QuickPress</strong> - Allows you to create a new post and either publish it or save it as a draft.' ) . '</p>' .
	'<p>' . __( '<strong>Recent Drafts</strong> - Displays links to the 5 most recent draft posts you&#8217;ve started.' ) . '</p>' .
	'<p>' . __( '<strong>WordPress Development Blog</strong> - Come here for the latest scoop.' ) . '</p>' .
	'<p>' . __( '<strong>Other WordPress News</strong> - Shows the feed from <a href="http://planet.wordpress.org" target="_blank">WordPress Planet</a>. You can configure it to show a different feed of your choosing.' ) . '</p>' .
	'<p>' . __( '<strong>Plugins</strong> - Features the most popular, newest, and recently updated plugins from the WordPress.org Plugin Directory.' ) . '</p>' .
	'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
	'<p>' . __( '<a href="http://codex.wordpress.org/Dashboard_Screen" target="_blank">Documentation on Dashboard</a>' ) . '</p>' .
	'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>' ) . '</p>'
);

include (ABSPATH . 'wp-admin/admin-header.php');

$today = current_time('mysql', 1);
?>

<div class="wrap">
<?php screen_icon(); ?>
<h2><?php
echo esc_html( $title );
favorite_actions( $current_screen ); ?>
</h2>

<div id="dashboard-widgets-wrap">

<?php wp_dashboard(); ?>

<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->

<?php require(ABSPATH . 'wp-admin/admin-footer.php'); ?>