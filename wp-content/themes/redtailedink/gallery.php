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
			
				
			</section>
			
			
			
			
			
		
		<?php endwhile; ?>
		<nav class="pagination">
			<ul>
				<li><?php next_posts_link('&laquo; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
			</ul>
		</nav>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
	
	</section>
<?php get_footer(); ?>
