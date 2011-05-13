<?php
/*
Template Name: Gallery
*/
?>
<?php get_header(); ?>
	
	<header class="body">
		
	<div class="logo">
			
	</div>
	
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('header-widget-area') ) : else : ?>
        <?php endif; ?>
	
	<nav class="fontface">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('nav-widget-area') ) : else : ?>
        <?php endif; ?>
	</nav>
    
	
	
	
	
	
	</header>

	<section class="body index">
		
		
		
			
		
		<?php get_sidebar(); ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			
			
			
			
			
		<div id="gallery">
			<section>
				<?php the_content(); ?>
				
					
				
			</section>
		</div>
			
				

			
			
			
			
			
		
		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
	
	</section>
<?php get_footer(); ?>
