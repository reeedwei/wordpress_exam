<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RB Free Theme
 * @subpackage RB Blog Two
 * @version RB Blog Two 1.0.0
 * @since RB Blog Two 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		do_action( 'rb_blog_two_post_sticky' );
		do_action( 'rb_blog_two_post_visibility' );
		do_action( 'rb_blog_two_post_format' );	

		the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>				
	</header><!-- .entry-header -->

	<?php do_action( 'rb_blog_two_post_thumbnail' ); ?>

	<div class="entry-meta">
		<?php
		do_action( 'rb_blog_two_post_author' );
		do_action( 'rb_blog_two_post_publish_date' );
		do_action( 'rb_blog_two_post_categories' );
		do_action( 'rb_blog_two_post_comments_count' );
		do_action( 'rb_blog_two_post_edit' );
		?>
	</div><!-- .entry-meta -->

	<div class="entry-content">
		<?php
		the_excerpt();		
		do_action ( 'rb_blog_two_read_more_text' );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
