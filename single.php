<?php

/**
 * Displays a single Post in full (the Posts permalink), typically with comments.
 *
 * @package    WordPress
 * @subpackage WordPressThemeBoilerplate
 * @author     Christopher Lamm <chris@theantichris.com>
 * @since      1.0.0
 */


get_header();

?>

	<div id="content" role="main">

		<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

				<div>
					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => __( 'Pages: ' ), 'next_or_number' => 'number' ) ); ?>

					<?php the_tags( __( 'Tags: ' ), ', ', '' ); ?>
				</div>

				<?php edit_post_link( __( 'Edit this entry', 'wptbp' ), '', '.' ); ?>
			</article>

			<?php comments_template(); ?>

		<?php endwhile; ?>

		<?php else: ?>

			<h2><?php _e( 'No posts were found.', 'wptbp' ); ?></h2>

		<?php endif; ?>

	</div>

<?php

get_sidebar();

get_footer();

?>