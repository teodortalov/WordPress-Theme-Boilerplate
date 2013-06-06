<?php

/**
 * Search results template.
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

			<h2><?php _e( 'Search Results', 'wptbp' ); ?></h2>

			<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div>
					<?php the_excerpt(); ?>
				</div>
			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<h2><?php _e( 'No matches were found.', 'wptbp' ); ?></h2>

		<?php endif; ?>

	</div>

<?php

get_sidebar();

get_footer();

?>