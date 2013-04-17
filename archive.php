<?php

/**
 * Displays posts in on particular day, month, year, category, tag, or author.
 *
 * @package WordPress
 * @subpackage WordPress_Theme_Boilerplate
 * @since 1.00
 *
 */

?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="main-content">

	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

			<?php echo get_post_meta( $post->ID, 'PostThumb', true ); ?>

			<p class="meta">
				<span>Posted on</span> <?php the_time( 'F jS, Y' ); ?> <span>by</span> <?php the_author(); ?>
			</p>

			<?php the_content( 'Read Full Article' ); ?>

			<p>
				<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
				Posted in <?php the_category( ', ' ); ?>
				<?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?>
			</p>
		</div>

		<?php endwhile; ?>

	<?php else: ?>

	<h2>Nothing Found</h2>

	<?php endif; ?>

</div>

<?php get_sidebar( 'secondary' ); ?>

<?php get_footer(); ?>