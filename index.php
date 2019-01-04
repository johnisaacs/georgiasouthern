<?php
/*
Default page template. 
*/
?>
<?php include('/web_templates/global/includes/emergency-alert.php'); ?>
<?php get_header(); ?>

		<div id="content" class="landing">
			<div id="inner-wrapper" class="container">
				
				<!-- begin loop -->
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<h1 class="title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<div class="clearfix"></div>		
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>	
				<div class="clearfloat"></div>
				<!-- end loop -->
						
					
			</div>	
		</div>	
	
<?php get_footer(); ?>
 			
</body>
</html>