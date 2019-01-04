<?php
/*
Template Name: Home Page
*/
?>
<?php dynamic_sidebar( 'Informational Bar' ); ?>
<?php get_header(); ?>

<?php
// For News RSS feed
//include_once('rss/rss_fetch.inc');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
include_once($_SERVER['DOCUMENT_ROOT'] . '/rss/rss_fetch_new.inc'); 

?>
<script>
jQuery(document).ready(function($){
$('.graphic-item img').addClass('img-responsive');
});
</script>
	<div id="content">
		<!--<div class="container">
			<div class="row">	
				<div class="pull-right nav-tab bg-blue"><a href="http://consolidation.georgiasouthern.edu/">Consolidation Information</a></div>
			</div>
		</div>-->
		<div class="container-fluid">
			<div class="row">			
				<div class="home-banner" style="background-image:url(<?php header_image(); ?>)">					
				</div>			
			</div>
		</div>
		<!-- Audiences --> 
		<?php include('home-content/audience-tabs/tabs.php'); ?>		
		<?php include('home-content/audience-tabs/mobile.php'); ?>
		<!-- end Audiences -->
		
		<!-- News -->
			<section id="news-section">

				<div class="container">
					
					<div class="row">
						
						<div class="col-md-8 clearfix">
							<div class="news">
															
								<?php include('home-content/news.php'); ?>
								
							</div>
						</div>						
						
						
						<div class="col-md-4">			
							
							<div id="home-social" class="col-sm-6 col-md-12">
								<?php include('home-content/social.php'); ?>									
							</div>	
							<div id="events" class="col-sm-6 col-md-12">								
								
								<?php include("home-content/calendar.php"); ?>
								
							</div>
						</div>
					
					</div>
				
				</div>

			</section>
			<!-- end News -->
			<!-- Stories --> 
			<section id="stories-section">
				<div class="container">
					<div class="row">					
						<div class="col-xs-12"><h4>Georgia Southern Stories</h4></div>
							<?php include('home-content/stories.php'); ?>
						<div class="graphic-item col-sm-12 col-md-4">
							<?php include('home-content/graphic-announcement.php'); ?>
						</div>			
					</div>						
				</div>
			</section>
			<!-- end Stories --> 
		
	</div>
		
<?php get_footer(); ?>

</body>
</html>