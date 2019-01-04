<?php
/**
 * Theme Functions 
 */
 
// Enqueue jquery
function add_custom_assets() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('bootstrap' , '//www.georgiasouthern.edu/web_templates/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.1.1', true);
	wp_enqueue_style('bootstrap-styles' , '//www.georgiasouthern.edu/web_templates/bootstrap/css/bootstrap.min.css', false, null, 'all');
	wp_enqueue_script('sticky' , '//www.georgiasouthern.edu/web_templates/global/js/plugin.sticky.js', array( 'jquery' ), null, true);
	wp_enqueue_script('lightbox' , '//www.georgiasouthern.edu/web_templates/global/js/plugin.lightbox.min.js', array( 'jquery' ), null, true);
	wp_enqueue_script('fa-scripts' , 'https://use.fontawesome.com/3c484262c3.js', array( 'jquery' ), null, true);
	wp_enqueue_script('global-scripts' , '//www.georgiasouthern.edu/web_templates/global/js/scripts.js', array( 'jquery' ), null, true);
	wp_enqueue_style('global-styles' , '//www.georgiasouthern.edu/web_templates/global/css/styles-staging.min.css', false, null, 'all');
	wp_enqueue_style('plugin-styles' , '//www.georgiasouthern.edu/web_templates/global/css/plugins.css', false, null, 'all');
	wp_enqueue_style('new-edu-styles' , get_stylesheet_directory_uri() . '/new.css', false, null, 'all');
	wp_enqueue_style('local-styles' , get_stylesheet_directory_uri() . '/style.css', false, null, 'all');
	
}
add_action('wp_enqueue_scripts', 'add_custom_assets');

// Remove wp version, api, xmlrpc and wlwmanifest links in meta
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// On login screen, replaces WP logo with Georgia Southern logo
add_action("login_head", "custom_login_logo");

function custom_login_logo() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('//cms.georgiasouthern.edu/~gsu/web_templates/CORE/images/wpthemes/wplogin-gsu-logo.png') no-repeat scroll center top transparent;
		height: 200px;
		width: 200px;
		margin: 0 auto;
	}
	.login #backtoblog a {display:none;}
	</style>
	";
}

// Add Pages, Remove News Access for Author Role
function gsu_author_caps() {
$role = get_role( 'author' );
$role->add_cap( 'unfiltered_html' );  
$role->add_cap( 'edit_pages' );
$role->add_cap( 'publish_pages' );
$role->add_cap( 'edit_published_pages' );
$role->add_cap( 'delete_published_pages' );
$role->remove_cap( 'edit_posts' );
$role->remove_cap( 'edit_published_posts' ); 
$role->remove_cap( 'publish_posts' ); 
$role->remove_cap( 'delete_published_posts' );
$role->remove_cap( 'delete_posts' ); 
}
add_action( 'admin_menu', 'gsu_author_caps');

//Add Media Library and additional Posts capabilities to Contributor Role
function gsu_contributor_caps() {
$role = get_role( 'contributor' );
$role->add_cap( 'unfiltered_html' ); 
$role->add_cap( 'edit_others_posts' );
$role->add_cap( 'edit_published_posts' ); 
$role->add_cap( 'upload_files' ); 
$role->add_cap( 'publish_posts' ); 
$role->add_cap( 'delete_published_posts' );
$role->add_cap( 'manage_categories' );
}
add_action( 'admin_menu', 'gsu_contributor_caps');

// Restrict Site Admin Access
function gsu_admin_caps() {
$role = get_role( 'administrator' );
$role->add_cap( 'unfiltered_html' );   
$role->remove_cap( 'activate_plugins' );
$role->remove_cap( 'delete_plugins' );
$role->remove_cap( 'delete_themes' );
$role->remove_cap( 'edit_plugins' );
$role->remove_cap( 'edit_themes' );
$role->remove_cap( 'import' );
$role->remove_cap( 'install_plugins' );
$role->remove_cap( 'install_themes' );
$role->remove_cap( 'switch_themes' );
$role->remove_cap( 'update_core' );
$role->remove_cap( 'update_plugins' );
$role->remove_cap( 'update_themes' );
$role->remove_cap( 'manage_sites' );
$role->remove_cap( 'manage_options' );
$role->remove_cap( 'remove_users' );
}
add_action( 'admin_menu', 'gsu_admin_caps');

// Remove News from menu for Authors
function remove_adminmenus_for_author() {
	global $menu;
	if(!current_user_can( 'edit_posts' )) {	
	remove_menu_page( 'edit.php' );
	}
}
add_action( 'admin_menu', 'remove_adminmenus_for_author' );

// Add Custom Header support
function custom_header_support() {
$args = array(
	'width'         => 1400,
	'height'        => 350,
	'default-image' => get_template_directory_uri() . '/img/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header_support' );

// Register Sidebars
add_action( 'widgets_init' , 'register_custom_sidebars' );

function register_custom_sidebars() {
register_sidebar(array(
  'name' => __( 'Informational Bar' ),
  'id' => 'informational-message',
  'description' => __( 'Informational Banner - enter message to display in a colored bar at the top of the University home page.' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '',
  'after_title' => ''
	));
register_sidebar(array(
	  'name' => __( 'Home Banner Photo' ),
	  'id' => 'home-banner-image',
	  'description' => __( 'Home Page Photo Banner' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row One - Audience Icons' ),
	  'id' => 'home-row-one',
	  'description' => __( 'Home page row 1.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Two - Intro Message' ),
	  'id' => 'home-row-two',
	  'description' => __( 'Home page row 2.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Three - News and Events' ),
	  'id' => 'home-row-three',
	  'description' => __( 'Home page row 3.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Four - Future Students' ),
	  'id' => 'home-row-four',
	  'description' => __( 'Home page row 4.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Five - Testimonial' ),
	  'id' => 'home-row-five',
	  'description' => __( 'Home page row 5.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Six - Campuses' ),
	  'id' => 'home-row-six',
	  'description' => __( 'Home page row 6.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));
	register_sidebar(array(
	  'name' => __( 'Home Row Seven - Graphic Ads' ),
	  'id' => 'home-row-seven',
	  'description' => __( 'Home page row 7.  Use a Content Block to add content.' ),
	  'before_widget' => '',
	  'after_widget'  => '',
	  'before_title' => '',
	  'after_title' => ''
	));	
}

// Custom WordPress Admin Footer
function remove_footer_admin () {
	echo 'Theme Copyright &copy; Marketing &amp; Communications and Information Technology Services Web Team, Georgia Southern University';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Customize wp admin bar
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('about');
	$wp_admin_bar->remove_menu('wporg');
	$wp_admin_bar->remove_menu('documentation');
	$wp_admin_bar->remove_menu('support-forums');
	$wp_admin_bar->remove_menu('feedback');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('new-link');
	$wp_admin_bar->remove_menu('new-user');
	$wp_admin_bar->remove_menu('new-media');
	$wp_admin_bar->remove_menu('w3tc');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

// Customize tinymce editor
function customize_mce_buttons($init) {
	$init['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,alignjustify,link,unlink,wp_more,spellchecker,fullscreen,wp_adv';
	$init['toolbar2'] = 'formatselect,pastetext,removeformat,charmap,superscript,subscript,outdent,indent,undo,redo,table,wp_help';
	$init['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6";
	return $init;
}
add_filter('tiny_mce_before_init', 'customize_mce_buttons');

// REMOVE LINKS, COMMENTS FROM ADMIN PANEL
function gsudept_remove_menu_pages() {		
		remove_menu_page('edit-comments.php');
		remove_menu_page('link-manager.php');		
		//remove_menu_page('users.php');
		//remove_menu_page('options-writing.php');
		//remove_menu_page('options-reading.php');
		//remove_menu_page('options-discussion.php');
		//remove_menu_page('options-privacy.php');
		//remove_menu_page('options-permalinks.php');
		//remove_menu_page('import.php');
		//remove_menu_page('upload.php');
		//remove_menu_page('tools.php');
		//remove_menu_page('options-general.php');
	}
add_action( 'admin_menu', 'gsudept_remove_menu_pages' );

// Removes unnecessary widgets from Appearance-->Widgets menu
function remove_wp_widgets() {
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Links');
	}
add_action('widgets_init','remove_wp_widgets', 1);
remove_action( 'widgets_init', 'akismet_register_widgets' );

// CHANGE POSTS TO NEWS
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';	
	echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action( 'init', 'change_post_object_label' );
    
// remove version info from head and feeds
add_filter('the_generator', 'digwp_complete_version_removal');
function digwp_complete_version_removal() {
    return '';
}

// clear rss widget cache every 15 mins
//add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 900;' ) );
add_action( 'wp_feed_cache_transient_lifetime', function(){
		return 900;
});

// 3/30/16 - RHickey, fix to resolve issue introduced in WP 4.4.2 with URL used for img srcset attributes
// In SSL, force URLs in srcset attributes to use https. 
// This prevents mixed content errors when displaying content on secure sites, i.e., on MyGS or when users are logged in to WordPress admin. 

function ssl_srcset( $sources ) {
  if(is_ssl()) {
	  foreach ( $sources as &$source ) {
		$source['url'] = set_url_scheme( $source['url'], 'https' );
	}
  }
  return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'ssl_srcset' );

// Track user last login time 
add_action('wp_login','wpdb_capture_user_last_login', 10, 2);
function wpdb_capture_user_last_login($user_login, $user){
    update_user_meta($user->ID, 'last_login', current_time('mysql'));
}

// Display user last login time in WP Admin
add_filter( 'manage_users_columns', 'wpdb_user_last_login_column');
function wpdb_user_last_login_column($columns){
    $columns['lastlogin'] = __('Last Login', 'lastlogin');
    return $columns;
}
 
add_action( 'manage_users_custom_column',  'wpdb_add_user_last_login_column', 10, 3); 
function wpdb_add_user_last_login_column($value, $column_name, $user_id ) {
    if ( 'lastlogin' != $column_name )
        return $value;
 
    return get_user_last_login($user_id,false);
}

function get_user_last_login($user_id,$echo = true){
    $date_format = get_option('date_format') . ' ' . get_option('time_format');
    $last_login = get_user_meta($user_id, 'last_login', true);
    $login_time = 'Never logged in';
    if(!empty($last_login)){
       if(is_array($last_login)){
            $login_time = mysql2date($date_format, array_pop($last_login), false);
        }
        else{
            $login_time = mysql2date($date_format, $last_login, false);
        }
    }
    if($echo){
        echo $login_time;
    }
    else{
        return $login_time;
    }
}

// Exclude Posts from appearing in feed
add_action('pre_get_posts', 'exclude_category' );
function exclude_category( &$wp_query ) {
    // Exclude from loop, archive and feed but not from category page/feed
   if( is_home() || ( is_feed() && !is_category() ) || ( is_archive() && !is_category() )) { // Exclude from home, feed, but not from category page/feed
        set_query_var('category__not_in', array( 4,5 )); // Exclude category with ID 
    }
}

//Secure JSON API with secret key
add_action('init','json_api_apikey_check' , 1 );
function json_api_apikey_check() {
	$api_key = '23dc17b0-a494-4f64-80d4-8a14095e2ecc';
	$base = get_option('json_api_base', 'api');
	$this_url = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ( ( isset($_REQUEST['json'] ) || strstr($this_url , $base.'/') ) && ( !isset($_REQUEST['gsapikey']) || $_REQUEST['gsapikey'] != '23dc17b0-a494-4f64-80d4-8a14095e2ecc' ) )
	{
	header("Location:http://www.georgiasouthern.edu/");
	exit;
	}
}