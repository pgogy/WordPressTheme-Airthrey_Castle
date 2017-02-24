<div id="comments" class="comments-area">
	<?php 
		global $wp_query;
		if(isset($wp_query->query['cpage'])){
			$offset = $wp_query->query['cpage'] * get_option('comments_per_page');
		}else{
			$offset = 0;
		}
		if(get_option('default_comments_page')=="newest"){
			$order = "ASC";
		}else{
			$order = "DESC";
		}

		$args = array(
			'status' => 'approve',
			'number' => get_option('comments_per_page'),
			'post_id' => get_the_ID(),
			'offset' => $offset,
			'order' => $order
		);

		$comments = get_comments($args);
		?><ol class="comment-list"><?PHP
		foreach($comments as $comment){
			?>	
			<li id="comment-<?PHP echo $comment->comment_ID; ?>" class="comment even thread-even depth-1" font-size="24px">
				<article id="div-comment-<?PHP echo $comment->comment_ID; ?>" class="comment-body">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?PHP 
								$size = get_avatar_data($comment->comment_author_email);
								echo get_avatar($comment->comment_author_email, $size['size']); 
							?>
							<span class="fn">
								<a href="<?PHP echo get_comment_author_url($comment->comment_ID); ?>" rel="external nofollow" class="url"><?PHP echo get_comment_author($comment->comment_ID); ?></a>
							</span> 
							<span class="says"><?PHP echo __("comments", "airthrey_castle"); ?>:</span>	
						</div>
						<div class="comment-metadata">
							<a href="<?PHP echo get_permalink(get_the_id()); ?>?cpage=<?PHP echo $wp_query->query['cpage']; ?>#comment-<?PHP echo $comment->comment_ID; ?>" >
								<time datetime="<?PHP echo str_replace($comment->comment_date_gmt," ","T") ?>+00:00">
									<?PHP echo comment_date(); ?>						
								</time>
							</a>
						</div>
					</footer>
					<div class="comment-content">
						<p><?PHP echo get_comment_text( $comment->comment_ID ); ?></p>
					</div>
					<div class="reply">
						<a rel="nofollow" class="comment-reply-link" href="<?PHP 

									$link = get_permalink(get_the_id()); 
									if(strpos($link, "?")!==FALSE){
										$char = "&";
									}else{
										$char = "?";
									}

									echo $link;

									?><?PHP echo $char; ?>cpage=<?PHP echo $wp_query->query['cpage']; ?>&replytocom=<?PHP echo $comment->comment_ID; ?>#respond" aria-label="<?PHP echo esc_html(__("Reply to", "airthrey_castle")); ?> <?PHP get_comment_author($comment->comment_ID); ?>">
							<?PHP echo __("Reply to", "airthrey_castle"); ?> <?PHP echo get_comment_author($comment->comment_ID); ?>
						</a>
					</div>
				</article>
			</li>	
			<?PHP
		}

		?>
		</ol>
	<?PHP
		echo paginate_comments_links( 
					array(
							"before_page_number" => __("Comment Page", "airthrey_castle") . " ",
							"prev_text" => __("Previous comment page", "airthrey_castle"),
							"next_text" => __("Next comment page", "airthrey_castle"),
						)
					);
		?>
	<?PHP
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'airthrey_castle' ); ?></p>
	<?php endif; ?>

	<?php 
		ob_start();
		comment_form(
				array(
					"cancel_reply_before" => "<span>",
					"cancel_reply_after" => "</span>"
					)
			    	);
		$comment_form = ob_get_contents(); 
		ob_end_clean();
		$comment_form = str_replace('type="text"', 'type="text" maxlength="200"', $comment_form);
		$comment_form = str_replace('type="url"', 'type="url" maxlength="200"', $comment_form);
		$comment_form = str_replace('type="email"', 'type="email" maxlength="200"', $comment_form);
		$comment_form = str_replace('<textarea ', '<textarea maxlength="20000000"', $comment_form);
		$comment_form = str_replace("novalidate", "", $comment_form);
		echo $comment_form;
	?>
</div>