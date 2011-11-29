<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'ari' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'ari' ); ?></p>

<?php endif; ?>


<?php /* Start the Loop. */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (is_sticky()) echo __( '<h3 class="sticky-label">Featured</h3>', 'ari' ); ?>
	<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'ari' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<?php the_excerpt(); ?>
			<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time('d. F Y') ?></a> <?php _e( 'by', 'ari' ); ?> <?php the_author() ?></span><br/>	
	<?php else : ?>
	
			<?php if ( has_post_thumbnail() ): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<?php endif; ?>

			<?php the_content( __( 'Continue Reading &rarr;', 'ari' ) ); ?>
			<div class="clear"></div>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'ari' ), 'after' => '</div>' ) ); ?>
			
			<p class="meta"><span><a href="<?php the_permalink(); ?>"><?php the_time('d. F Y') ?></a> <?php _e( 'by', 'ari' ); ?> <?php the_author() ?></span><br/>				
	<?php endif; ?>

				<?php if ( count( get_the_category() ) ) : ?>
					<?php printf( __( 'Categories: %2$s', 'ari' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					|
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<?php printf( __( 'Tags: %2$s', 'ari' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					|
				<?php endif; ?>
				
				<?php comments_popup_link( __( 'Leave a comment', 'ari' ), __( '1 comment', 'ari' ), __( '% comments', 'ari' ) ); ?>
				<?php edit_post_link( __( 'Edit &rarr;', 'ari' ), '| ', '' ); ?></p>
	</div>
	<!--end Post-->

		<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. ?>


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<p class="previous"><?php next_posts_link( __( '&larr; Older posts', 'ari' ) ); ?></p>
				<p class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'ari' ) ); ?></p>
<?php endif; ?>