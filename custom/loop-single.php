<section role="main" class="col-md-9">
<div class="panel panel-primary">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	
	<!-- article -->
    

		
	
		
		
		<!-- post title -->
			<div class="panel-heading">
			  <h1 class="panel-title">
			    <?php the_title(); ?>
			  </h1>
	   		</div>
		<!-- /post title -->
		
		<!-- post details -->
		<div class="panel-body">
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'ck' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'ck' ), __( '1 Comment', 'ck' ), __( '% Comments', 'ck' )); ?></span>
			<!-- /post details -->
			
			<?php //ckwp_excerpt('ckwp_index'); // Build your custom callback length in functions.php ?>
			<?php the_content( ); ?>
			
			<?php edit_post_link(); ?>
		</div>
		
	

	<!-- /article -->
	
<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'ck' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
</div>

</section>