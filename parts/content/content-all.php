<article id="post-<?php the_ID(); ?>" <?php post_class("home-page"); ?> resource="?<?php the_ID() ; ?>#id" vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header title-holder">
		<p class="entry-title">
			<a href="<?PHP echo get_permalink(); ?>" rel="bookmark"><?PHP echo the_title(); ?></a>
		</p>
	</header>	
	<div class="content-holder">
		<div class="entry-content-index">
		<?php
			$content = strip_tags(get_the_content());
			echo substr($content,0,strpos($content,". ")) . "...";
		?>
		</div>
	</div>
</article>