<?php /* Template Name: Archives */ ?>

<?php

/**
 * Displays organized list of all site content.
 *
 * @since 1.00
 *
 */

?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="main-content">
	<h2><?php the_title(); ?></h2>

	<div class="col">
		<h3>Archives by Year:</h3>
		<ul><?php wp_get_archives( 'type=yearly' ); ?></ul>
		<h3>Archives by Month:</h3>
		<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
		<h3>Archives by Day:</h3>
		<ul><?php wp_get_archives( 'type=daily' ); ?></ul>
		<h3>Archives by Category:</h3>
		<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
		<h3>Archives by Author:</h3>
		<ul><?php wp_list_authors(); ?></ul>
	</div>
	<div class="col">
		<h3>All Pages:</h3>
		<ul><?php wp_list_pages( 'title_li=' ); ?></ul>
		<h3>Archives by Tag:</h3>
		<ul><?php wp_tag_cloud(); ?></ul>
	</div>
</div>

<?php get_sidebar( 'secondary' ); ?>

<?php get_footer(); ?>