	<footer class="body">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-widget-area') ) : else : ?>
        <?php endif; ?>
		<!-- <p>
			<span>Copyright</span> &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> |
			<a href="http://ajy.co/"><span>Website Designed by</span> Aaron James Young</a>
		</p> -->
	</footer>
	<!-- analytics -->
	<?php wp_footer(); ?>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/custom.js"></script>
</body>
</html>
