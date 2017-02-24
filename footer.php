		</div>
		<?PHP
			get_template_part("parts/footer/scroll_up");
		?>
		<footer id="colophon" class="site-footer">
		<?php 
			if(!is_home()){
				get_sidebar('sidebar-one');
			}
			wp_footer();
		?>	
		</footer>
	</div>
	</body>
</html>
