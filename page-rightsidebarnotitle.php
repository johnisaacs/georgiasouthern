<?php
/*
Template Name: Primary, Right Sidebar - manually add H1
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
						<div id="main" class="col-sm-9">							
							<?php the_content(); ?>
						</div>
						<div id="sidebar" class="right col-sm-3">
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