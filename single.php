<?php
/*
 Single Post Template 
*/
?>
<?php get_header(); ?>
	<div id="content" class="landing">
		<div id="inner-wrapper" class="container">	
			<div class="row">
				<div id="main" class="col-sm-12 post-<?php the_ID(); ?>">
					<div class="post">
						<?php get_template_part( 'loop-single' ); ?>
					</div>
				</div>	
			</div>
			<div class="clearfix"></div>				
		</div>	
	</div>		
<?php get_footer(); ?> 			
</body>
</html>