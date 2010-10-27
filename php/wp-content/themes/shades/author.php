<?php get_header(); ?>
<?php /* This sets the $curauth variable */
if( isset( $_GET['author_name'] ) ) :
	$curauth = get_userdatabylogin( $author_name );
else :
	$curauth = get_userdata( intval( $author ) );
endif;
?>
<div id="maintop"></div><!--end maintop-->
<div id="wrapper">
	<div id="content">
		<div id="main-blog">
			<div id="author" class="<?php if ( ( get_userdata( intval( $author ) )->ID ) == '1' ) echo 'administrator';
				/* elseif ( ( get_userdata( intval( $author ) )->ID ) == '2' ) echo 'jellybeen'; */ /* sample */
				/* add additional user_id following above example, echo the 'CSS element' you want to use for styling */
				?>">
				<h2><?php _e( 'About ', 'shades' ); ?><?php echo $curauth->display_name; ?></h2>
				<ul>
					<li><?php _e( 'Website', 'shades' ); ?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <?php _e( 'or', 'shades' ); ?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php _e( 'email', 'shades' ); ?></a></li>
					<li><?php _e( 'Biography', 'shades' ); ?>: <?php echo $curauth->user_description; ?></li>
				</ul>	
			</div> <!-- #author -->
			<h2><?php _e( 'Posts by ', 'shades' ); ?><?php echo $curauth->display_name; ?>:</h2>
			<!-- start the Loop -->
			<?php if ( have_posts() ) : ?>
				<?php $count = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $count++; ?>
					<div class="clear">&nbsp;</div>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="post-comments">
							<?php comments_popup_link( __( 'No Comments', 'shades' ), __( '1 Comment', 'shades' ), __( '% Comments', 'shades' ), '', __( 'Closed', 'shades' ) ); ?>
						</div>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'shades' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<div class="postdata">
							<?php _e( ' on ', 'shades' ); the_time( get_option( 'date_format' ) ); _e( ' in ', 'shades' ); the_category( ', ' ); edit_post_link( __( 'Edit', 'shades' ), __( ' &#124; ', 'shades' ), __( '', 'shades' ) ); ?>
						</div>
						<?php if ( $count == 1 ) : ?>
							<?php the_content( __( 'Read more ...', 'shades' ) ); ?>
						<?php else : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						<div class="clear"></div> <!-- For inserted media at the end of the post -->
						<p class="tags"><?php the_tags(); ?></p>
					</div> <!-- .post #post-ID -->
				<?php endwhile; ?>
				<div id="nav-global" class="navigation">
					<div class="left">
						<?php next_posts_link( __( '&laquo; Previous entries ', 'shades' ) ); ?>
					</div>
					<div class="right">
						<?php previous_posts_link( __( ' Next entries &raquo;', 'shades' ) ); ?>
					</div>
				</div>
			<?php else : ?>
				<h2><?php printf( __( 'Search Results for: %s', 'shades' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'shades' ); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
			<!-- end the Loop -->
		</div><!--end main blog-->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!--end content-->
</div><!--end wrapper-->
<?php get_footer();?>
<?php /* Last Revision: Sept 6, 2010, v1.6 */ ?>