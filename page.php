<?php

/**
 * Template for Pages.
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Boilerplate
 * @since 1.00
 */

?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

			<?php echo get_post_meta( $post->ID, 'PostThumb', true ); ?>

			<p class="meta">
				<span>Posted on</span> <?php the_time( 'F jS, Y' ); ?> <span>by</span> <?php the_author(); ?>
			</p>

			<?php the_content( 'Read Full Article' ); ?>
		</div>

	<?php endwhile; ?>

<?php else: ?>

	<h2>Nothing Found</h2>

<?php endif; ?>

<?php get_footer(); ?>