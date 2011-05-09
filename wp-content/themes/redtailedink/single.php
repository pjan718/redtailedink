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
		
		
			
		
		<?php get_sidebar(); ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			
			
			
			
		
			<section>
				<?php the_content(); ?>
				
					<section class="post">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p> <!-- edit this meta stuff? -->
					<span>Posted on:</span> <?php the_time('F jS, Y'); ?>
					<span>by</span> <?php the_author(); ?> |
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
				</p>
			</section>
				
			</section>
			
			
			
			
			<footer> <!-- post metadata -->
				<p><?php the_tags('<span>Tags:</span> ', ', ', ''); ?></p>
				<p><span>Posted in</span> <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				<?php //comments_template(); //this is only in single.php ?>
			</footer>
		</article>
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
