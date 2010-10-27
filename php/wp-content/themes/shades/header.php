<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php
		if ( is_single() ) { single_post_title(); _e( ' | ', 'shades' ); bloginfo( 'name' ); }
		elseif ( is_home() || is_front_page() ) { bloginfo( 'name' ); _e( ' | ', 'shades' ); bloginfo( 'description' ); shades_get_page_number(); }
		elseif ( is_page() ) { single_post_title( '' ); _e( ' | ', 'shades' ); bloginfo( 'name' ); }
		elseif ( is_search() ) { bloginfo( 'name' ); print __( ' | Search results for ', 'shades' ) . esc_html( $s ); shades_get_page_number(); }
		elseif ( is_404() ) { bloginfo( 'name' ); _e( ' | Not Found', 'shades' ); }
		else { bloginfo( 'name' ); wp_title( __( ' | ', 'shades' ) ); shades_get_page_number(); }
	?></title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
<!--[if IE 6]>
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/ie6.css" type="text/css" media="screen" />
<![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="mainwrap">
		<div id="header-container">
			<div id="header">
				<div id="header-left"></div>
				<div id="header-center">
					<h2><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h2> <!-- added URL code -->
					<p><?php bloginfo( 'description' ); ?></p>
				</div> <!-- #header-center -->
				<div id="header-right"></div>
			</div> <!-- #header -->
			<div class="clear"></div>
			<!-- <div class="menu"> -->
			<div id="centeredmenu">
				<?php shades_nav_menu(); ?>
			</div> <!-- #centeredmenu -->
		</div> <!-- #header-container -->
<?php /* Last Revision: Sept 12, 2010, v1.6 */ ?>