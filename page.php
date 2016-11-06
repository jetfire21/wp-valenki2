<?php get_header();?>

<div class="page-home">
	<div class="container">
		<?php  wc_get_template_part( 'left', 'sidebar' ); ?>

		<div class="col-md-10 alex-content">
			 <?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

			    <h2><?php the_title();?></h2>
			    <?php the_content();?>

			<?php endwhile; // end of the loop. ?>
			<?php  else:?>
			<h3 class="error">not found</h3>
			<?php endif; ?>

			<?php 
			 $feedback = $_SERVER['REQUEST_URI'];
			 if( preg_match("/otzyvy/i", $feedback)): 
			 ?>
				<script src="https://vk.com/js/api/openapi.js?133" type="text/javascript"></script>
				<!--  обзор комментариев -->
<!-- 				
				<div id="vk_comments_browse"></div>
				<script type="text/javascript">
					window.onload = function () {
					VK.init({apiId: 5678013, onlyWidgets: true});
					VK.Widgets.CommentsBrowse('vk_comments_browse', {width: 300, limit: 5, mini: 0});
					}
				</script>
 -->
		 		
				<!-- Добавление комментариев -->
				<script type="text/javascript">
				  VK.init({apiId: 5678013, onlyWidgets: true});
				</script>

				<!-- Put this div tag to the place, where the Comments block will be -->

				<div id="vk_comments"></div>
				<script type="text/javascript">
				VK.Widgets.Comments("vk_comments", {limit: 10, width: "275", attach: false});
				</script>

			<?php endif;?>

		</div><!-- end .alex-content -->
	</div><!-- end .container -->
</div>	

<?php get_footer();?>