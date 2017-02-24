<?PHP
	
	class airthrey_castleFilter{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_airthrey_castle_index", array($this, "index"));
			add_action("wp_ajax_airthrey_castle_index", array($this, "index"));
			add_action("wp_ajax_nopriv_airthrey_castle_filter", array($this, "filter"));
			add_action("wp_ajax_airthrey_castle_filter", array($this, "filter"));
			add_action("wp_ajax_nopriv_airthrey_castle_show_posts", array($this, "show_posts"));
			add_action("wp_ajax_airthrey_castle_show_posts", array($this, "show_posts"));
		}
		
		function index(){
		
			$request = json_decode(stripslashes($_REQUEST['query']));
			
			$data = array();
			
			$vars = array();
			
			$posts = query_posts(array("paged" => $request->query_vars->paged));
			
			while ( have_posts() ) : the_post();

				ob_start();
				get_template_part( 'parts/content/content-all', get_post_format() );
				array_push($data, ob_get_clean());

			endwhile;
			
			print_r(json_encode($data));

			wp_reset_postdata();
	
			die(0);
 
		}

		function show_posts(){
			if(wp_verify_nonce($_POST['nonce'], "airthrey_castle_filter"))
			{
			
				$sort = explode("_", $_POST['order']);
				
				$args = array( 'post_type' => 'post' , 'orderby' => $sort[0] , 'order' => $sort[1] , 'posts_per_page' => $_POST['posts']);
				
				if($_POST['category']!=0){
					$args['cat'] = $_POST['category'];
				}
				if($_POST['tag']!=0){
					$args['tag_id'] = $_POST['tag'];
				}
				if($_POST['author']!=0){
					$args['author'] = $_POST['author'];
				}
				
				$query = new WP_Query( $args );
			
				if($_POST['date']!=0){
					foreach($query->posts as $index => $post){
						if(strpos($post->post_date, $_POST['date'])!==0){
							unset($query->posts[$index]);
						}
					}
				}
				
				if($_POST['text']!=""){
					foreach($query->posts as $index => $post){
						$post_text = " " . strtolower($post->post_title . " " . $post->post_content);
						if(strpos($post_text, strtolower($_POST['text']))===FALSE){
							unset($query->posts[$index]);
						}
					}
				}
				
				$response = new StdClass();
				$data = array();
				
				foreach($query->posts as $post){	
					ob_start();
					set_query_var( 'post', $post );
					get_template_part( 'parts/content/content-scroll', get_post_format($post->ID) );
					array_push($data,ob_get_clean());
				}
			
				echo json_encode($data);
				wp_reset_postdata();
			}
			else
			{
				echo esc_html(__("Nonce failed","airthrey_castle"));
			}
			wp_die();
		}
	
		function filter(){
			if(wp_verify_nonce($_POST['nonce'], "airthrey_castle_filter"))
			{
			
				$args = array( 'post_type' => 'post' , 'orderby' => 'menu_order' , 'order' => 'ASC' , 'posts_per_page' => -1);
				
				if($_POST['category']!=0){
					$args['cat'] = $_POST['category'];
				}
				if($_POST['tag']!=0){
					$args['tag_id'] = $_POST['tag'];
				}
				if($_POST['author']!=0){
					$args['author'] = $_POST['author'];
				}
				
				$query = new WP_Query( $args );
			
				$response = new StdClass();
			
				if($_POST['date']==0){
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'airthrey_castle'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'airthrey_castle'));
					}
				}else{
					foreach($query->posts as $index => $post){
						if(strpos($post->post_date, $_POST['date'])!==0){
							unset($query->posts[$index]);
						}
					}
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'airthrey_castle'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'airthrey_castle'));
					}
				}
				
				if($_POST['text']==""){
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'airthrey_castle'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'airthrey_castle'));
					}
				}else{
					foreach($query->posts as $index => $post){
						$post_text = " " . strtolower($post->post_title . " " . $post->post_content);
						if(strpos($post_text, strtolower($_POST['text']))===FALSE){
							unset($query->posts[$index]);
						}
					}
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'airthrey_castle'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'airthrey_castle'));
					}
				}
				
				echo json_encode($response);
				
			}
			else
			{
				echo esc_html(__("Nonce failed","airthrey_castle"));
			}
			wp_die();
		}	
	
	}
	
	$airthrey_castleFilter = new airthrey_castleFilter();
	