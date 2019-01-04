<?php
/*
Template Name: SEM Landing Page
MultiEdit: Image,Sidebar 
*/
?>

<?php get_header( 'sem' ); ?>

		<div id="content" class="landing">
			<div id="inner-wrapper" class="container">
				
				<!-- begin loop -->
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
					<div class="row">
						<?php multieditDisplay('Image'); ?>
					</div>
					
					<div class="row">	
						<div id="main" class="col-sm-9">
							<h1 class="title"><?php the_title(); ?></h1>
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
	
<?php get_footer( 'sem' ); ?>
 			
</body>
</html>