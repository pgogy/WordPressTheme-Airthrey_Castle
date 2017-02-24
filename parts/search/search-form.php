<div id="searchform">
	<form action="<?PHP echo esc_url( home_url( '/' ) ) ?>" method="GET">
		<label for="searchbox"><?PHP echo __("Search for", "airthrey_castle"); ?></label>
		<input id="searchbox" type="text" maxlength="100" class='airthrey_castle_search_box' name="s" value="<?PHP echo esc_html(__("Enter term....", "airthrey_castle")); ?>" />
		<input type="submit" value="<?PHP echo esc_html(__("Search", "airthrey_castle")); ?>" />
	</form>
</div>