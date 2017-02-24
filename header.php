<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?PHP
	get_template_part('parts/header/main');
?>
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header">
			<div class="branding-holder">
				<div class="site-branding">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?PHP echo get_bloginfo('name'); ?></a></p>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?PHP echo get_bloginfo('name'); ?></a></p>
					<?php endif;
				?>
				</div>
			</div>
			<div id="menu">
			<?PHP
				get_template_part( 'parts/header/menu/standard');
			?>
			</div>
		</header>
		<?PHP
			if(is_home()){
		?>
		<div id="sidemenu">
		<?PHP
			get_template_part( 'parts/filter-form/standard');
		?>
		</div>
		<?PHP
			}
		?>
		<div id="content" class="site-content">
