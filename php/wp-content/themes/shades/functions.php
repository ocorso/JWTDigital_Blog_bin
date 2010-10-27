<?php
// Get the page number
function shades_get_page_number() {
    if ( get_query_var( 'paged' ) ) {
	print ' | ' . __( 'Page ' , 'shades' ) . get_query_var( 'paged' );
    }
}
// end get_page_number

// Widget definitions
if ( function_exists( 'register_sidebar' ) )
    register_sidebars( 2, array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><!-- .widget -->',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
				) );

// Show Avatar
function show_avatar( $comment, $size ) {
    $email = strtolower( trim( $comment->comment_author_email ) );
    $rating = "G"; // [G | PG | R | X]
    if ( function_exists( 'get_avatar' ) ) {
	echo get_avatar( $email, $size );
    } else {
	$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5( $email ) . "&size=" . $size."&rating=".$rating;
	echo "<img src='$grav_url'/>";
    }
}

// Start Dynamic Copyright
function bns_dynamic_copyright() {
    /* Get all posts */
    $all_posts = get_posts( 'post_status=publish&order=ASC' );
    /* Get first post */
    $first_post = $all_posts[0];
    /* Get date of first post */
    $first_date = $first_post->post_date_gmt;
    $first_year = substr( $first_date, 0, 4 );
    if ( $first_year == '' ) {
	$first_year = date( 'Y' );
    }
    
    /* Display common footer copyright notice */
    _e( 'Copyright &copy; ' );
    /* Display first post year and current year */
    if ( $first_year == date( 'Y' ) ) {
        /* Only display current year if no posts in previous years */
	echo date( 'Y' );
    } else {
	echo $first_year . "-" . date( 'Y' );
    }
    
    /* Display blog name from 'General Settings' page */
    echo '  <strong>' . get_bloginfo( 'name' ) . '</strong>  ';
    _e( 'All rights reserved.' );
}
// End Dynamic Copyright

// Start Theme Version
function bns_theme_version () {
    $theme_version = ''; /* Clear variable */
    /* Get details of the theme / child theme */
    $blog_css_url = get_stylesheet_directory() . '/style.css';
    $my_theme_data = get_theme_data( $blog_css_url );
    $parent_blog_css_url = get_template_directory() . '/style.css';
    $parent_theme_data = get_theme_data( $parent_blog_css_url );
    /* Create and append to string to be displayed */
    $theme_version .= '<br />' . $my_theme_data['Name'] . ' v' . $my_theme_data['Version'];
    if ( $blog_css_url != $parent_blog_css_url ) {
	$theme_version .= ' a child of the ' . $parent_theme_data['Name'] . ' v' . $parent_theme_data['Version'];
    }
    $theme_version .= ' theme from <a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>.';
    /* Display string */
    echo $theme_version;
}
// End Theme Version

// Tell WordPress to run shades_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'shades_setup' );

if ( ! function_exists( 'shades_setup' ) ):
    function shades_setup(){
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Add theme support for editor-style
	add_editor_style();
	
	// This theme allows users to set a custom background
	add_custom_background();
	
	// Add wp_nav_menu() custom menu support
	function shades_nav_menu() {
	    if ( function_exists( 'wp_nav_menu' ) )
        wp_nav_menu( array(
				   'theme_location' => 'top-menu',
				   'fallback_cb' => 'shades_list_pages'
				   ) );
	    else
        shades_list_pages();
	}
	
	function shades_list_pages() {
    if ( is_home() || is_front_page() ) { ?>
      <ul><?php wp_list_pages( 'title_li=' ); ?></ul>
    <?php } else { ?>
      <ul>
        <li><a href="<?php bloginfo( 'url' ); ?>"><?php _e( 'Home', 'shades' ); ?></a></li>
        <?php wp_list_pages( 'title_li=' ); ?>
      </ul>
    <?php }
  }
	
	add_action( 'init', 'register_shades_menu' );
	function register_shades_menu() {
	    register_nav_menu( 'top-menu', __( 'Top Menu' ) );
	}
	// wp_nav_menu() end
	
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'shades', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
	    require_once( $locale_file );
    }
endif;

// Start BNS Modified Post - requires WordPress version 3.0 or greater
if ( version_compare( $wp_version, "2.999", ">" ) ) {
    function bns_modified_post(){
	/* If the post date and the last modified date are different display modified date */
	if ( get_the_date() <> get_the_modified_date() ) {
	    echo '<div class="bns-modified-post">'; /* CSS wrapper for modified date details */
	    echo 'Last modified by ' . get_the_modified_author() . ' on ' . get_the_modified_date();
	    echo '</div><!-- .bns-modified-post -->';
	}
    }
}
// End BNS Modified Post

// Set the content width based on the theme's design and stylesheet, see #main-blog element in style.css
if ( ! isset( $content_width ) ) $content_width = 630;
?>
<?php /* Last Revision: Sept 6, 2010, v1.6 */ ?>