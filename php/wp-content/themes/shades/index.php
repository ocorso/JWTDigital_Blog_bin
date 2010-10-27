<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
	<div id="content">
		<div id="main-blog">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'shades' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<div class="postdata">
							<?php _e( 'Posted by ', 'shades' ); the_author(); _e( ' on ', 'shades' ); the_time( get_option( 'date_format' ) ); _e( ' in ', 'shades' ); the_category( ', ' ); the_shortlink( __('Short Link'), '', ' &#124; ', '' ); edit_post_link( __( 'Edit', 'shades' ), __( ' &#124; ', 'shades' ), __( '', 'shades' ) ); ?>
						</div>
						<div class="post-comments">
							<?php comments_popup_link( __( 'No Comments', 'shades' ), __( '1 Comment', 'shades' ), __( '% Comments', 'shades' ), '', __( 'Closed', 'shades' ) ); ?>
						</div>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
						} ?>
						<?php the_content( __( 'Read more... ', 'shades' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
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
		</div><!--end main blog-->
		<?php get_sidebar(); ?>
	</div><!--end content-->
</div><!--end wrapper-->
<?php get_footer(); ?>
<?php /* Last Revision: Sept 9, 2010, v1.6 */ ?>