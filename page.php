<?php

/**
 * Displays a single page.
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
				<h1><?php the_title(); ?></h1>

				<div>
					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => __( 'Pages: ' ), 'next_or_number' => 'number' ) ); ?>
				</div>

				<?php edit_post_link( __( 'Edit this entry', 'wptbp' ), '', '.' ); ?>
			</article>

			<?php comments_template(); ?>

		<?php endwhile; endif; ?>

	</div>

<?php

get_sidebar();

get_footer();

?>