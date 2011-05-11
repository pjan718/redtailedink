	<footer class="body">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area') ) : else : ?>
        <?php endif; ?>
		
		<div class="kazLogo">
		
		</div>
		
		<p class="fontface">
			<a href="http://ajy.co/">Copyright &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> </a>
		</p>
	</footer>
	<!-- analytics -->
	<?php wp_footer(); ?>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/custom.js"></script>
</body>
</html>
