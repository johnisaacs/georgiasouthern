<?php get_template_part( 'breadcrumbs' ); ?>
<!-- begin loop -->
	<h1 class="blue title"><?php the_title(); ?></h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	<?php the_content(); ?>
	<div class="clearfix"></div>
	<?php get_template_part( 'social' ); ?>	
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<!-- end loop -->