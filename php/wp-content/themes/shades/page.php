<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
	<div id="content">
		<div id="main-blog">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="clear">&nbsp;</div>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h1><?php the_title(); ?></h1>
						<div id="author_link"><?php _e( 'posted by ', 'shades' ); the_author_posts_link(); ?></div>
						<?php edit_post_link( __( 'Edit this page', 'shades' ), __( '&gt ', 'shades' ), __( ' &lt;', 'shades' ) ); ?>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
						} ?>						
						<?php the_content( __( 'Read more ...', 'shades' ) ); ?>
						<div class="clear"></div> <!-- For inserted media at the end of the post -->
						<?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
					</div> <!-- .post #post-ID -->
					<?php comments_template(); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<h2><?php printf( __( 'Search Results for: %s', 'shades' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'shades' ); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div><!-- #main blog -->
		<?php get_sidebar(); ?>
	</div><!-- #content -->
</div><!-- #wrapper -->
<?php get_footer();?>
<?php /* Last Revision: Sept 9, 2010, v1.6 */ ?>