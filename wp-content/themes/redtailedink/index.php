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
		
		<div id="rotator">
			
		</div>
		
		
			
		
		
	
	</section>
<?php get_footer(); ?>
