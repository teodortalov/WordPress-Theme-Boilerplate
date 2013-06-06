<?php

/**
 * Home page and default template.
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
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<?php the_content(); ?>
			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<h2><?php _e( 'No posts were found.', 'wptbp' ); ?></h2>

		<?php endif; ?>

	</div>

<?php

get_sidebar();

get_footer();

?>