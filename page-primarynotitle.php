<?php
/*
Template Name: Primary - manually add H1
MultiEdit: Image,Sidebar 
*/
?>
<?php get_header(); ?>

		<div id="content" class="landing">
			<div id="inner-wrapper" class="container">
				
				<!-- begin loop -->
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
					<div class="row">
						<?php multieditDisplay('Image'); ?>
					</div>
					
					<div class="row">	
						<div id="main" class="col-sm-9 col-sm-push-3">							
							<?php the_content(); ?>
						</div>
						<div id="sidebar" class="left col-sm-3 col-sm-pull-9">
							<?php multieditDisplay('Sidebar'); ?>
						</div>
						
						<div class="clearfix"></div>		
						<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>	
						<div class="clearfloat"></div>
					</div>
				<!-- end loop -->				
					
			</div>	
		</div>	
	
<?php get_footer(); ?>
 			
</body>
</html>