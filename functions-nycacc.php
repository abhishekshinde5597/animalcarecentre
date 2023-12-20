<?php
//shortcode serch 
add_shortcode('search_home', 'search_home');
function search_home(){
ob_start();
?>
<div class="ny_search_tabs">
    <!-- <ul class="ny_tab_links">
        <li class="search_tab_link active"><a href="#search_animal">Search By Animal</a></li>
        <li class="search_tab_link"><a href="#search_location">Search By Location</a></li>
    </ul> -->
	<div class="ny_tab_content">
		<form method="GET" action="https://nycacc.app/" autocomplete="on" target="_blank">
			<div class="formTabs">
				<div id="search_animal" class="tab active">
					<div class="ny_search_box">
						<div class="ny-animal">
						<label>Search By Animal</label>
						<select name="species" id="species">
							<option value="All" selected="selected">All Animals</option>
							<option value="Cat">Cat</option>
							<option value="Dog">Dog</option>
							<option value="Rabbit">Rabbit</option>
							<option value="Guinea Pig">Guinea Pig</option>
						</select>
		                </div>
						<div class="ny-location">
						<label>Search By Location</label>
						<select name="location" id="locations">
							<option value="All" selected="selected">Any Location</option>
							<option value="Manhattan">Manhattan</option>
							<option value="Brooklyn">Brooklyn</option>
							<option value="Staten Island">Staten Island</option>
							<option value="In Foster">In Foster</option>
						</select>
						</div>
						<button type="submit" class="ny-submit-button">Search</button>
					</div>
				</div>

				<div id="search_location" class="tab">
					<!-- <div class="ny_search_box">
						<select name="location" id="locations">
							<option value="All" selected="selected">Any Location</option>
							<option value="Manhattan">Manhattan</option>
							<option value="Brooklyn">Brooklyn</option>
							<option value="Staten Island">Staten Island</option>
							<option value="In Foster">In Foster</option>
						</select>
					</div> -->
				</div>
			</div>
			<!-- <button type="submit" class="ny-submit-button">Search</button> -->
		</form>
    </div>
</div>
<?php
return ob_get_clean();
}
//**comunity kid post type  */
// Custom Post Type: Community Kid
function create_custom_post_type_CommunityKid() {
    $labels = array(
        'name'               => __('Community Kids', 'text-domain'),
        'singular_name'      => __('Community Kid', 'text-domain'),
        'menu_name'          => __('Community Kids', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Community Kid', 'text-domain'),
        'edit_item'          => __('Edit Community Kid', 'text-domain'),
        'new_item'           => __('New Community Kid', 'text-domain'),
        'view_item'          => __('View Community Kid', 'text-domain'),
        'search_items'       => __('Search Community Kids', 'text-domain'),
        'not_found'          => __('No community kids found', 'text-domain'),
        'not_found_in_trash' => __('No community kids found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'community-kid'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-groups', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    );

    register_post_type('CommunityKid', $args);
}
add_action('init', 'create_custom_post_type_CommunityKid');

// Custom Taxonomy for Community Kid
function create_custom_CommunityKid_taxonomies() {
    // Category Taxonomy
    $category_labels = array(
        'name'                       => __('Kid Categories', 'text-domain'),
        'singular_name'              => __('Kid Category', 'text-domain'),
        'search_items'               => __('Search Kid Categories', 'text-domain'),
        'popular_items'              => __('Popular Kid Categories', 'text-domain'),
        'all_items'                  => __('All Kid Categories', 'text-domain'),
        'edit_item'                  => __('Edit Kid Category', 'text-domain'),
        'update_item'                => __('Update Kid Category', 'text-domain'),
        'add_new_item'               => __('Add New Kid Category', 'text-domain'),
        'new_item_name'              => __('New Kid Category Name', 'text-domain'),
        'separate_items_with_commas' => __('Separate categories with commas', 'text-domain'),
        'add_or_remove_items'        => __('Add or remove Kid categories', 'text-domain'),
        'choose_from_most_used'      => __('Choose from the most used Kid categories', 'text-domain'),
        'menu_name'                  => __('Kid Categories', 'text-domain'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'community-kid-category'),
    );

    register_taxonomy('CommunityKid_category', 'communitykid', $category_args);
}
add_action('init', 'create_custom_CommunityKid_taxonomies');

//--------------->custom post type for event<-------------------- //
function create_custom_post_type_Event() {
	$labels = array(
		'name'               => __('Events', 'text-domain'),
		'singular_name'      => __('Event', 'text-domain'),
		'menu_name'          => __('Events', 'text-domain'),
		'add_new'            => __('Add New', 'text-domain'),
		'add_new_item'       => __('Add New Events', 'text-domain'),
		'edit_item'          => __('Edit Events', 'text-domain'),
		'new_item'           => __('New Events', 'text-domain'),
		'view_item'          => __('View Events', 'text-domain'),
		'search_items'       => __('Search Events', 'text-domain'),
		'not_found'          => __('No resources found', 'text-domain'),
		'not_found_in_trash' => __('No resources found in Trash', 'text-domain'),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var'           => true,
		'rewrite'             => array('slug' => 'event'),
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-calendar-alt', // You can choose an appropriate icon from Dashicons.
		'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields','excerpt'),
	);

	register_post_type('Event', $args);
}
add_action('init', 'create_custom_post_type_Event');

function create_custom_Event_taxonomies() {
    // Category Taxonomy
    $category_labels = array(
        'name'                       => __('Categories', 'text-domain'),
        'singular_name'              => __('Category', 'text-domain'),
        'search_items'               => __('Search Categories', 'text-domain'),
        'popular_items'              => __('Popular Categories', 'text-domain'),
        'all_items'                  => __('All Categories', 'text-domain'),
        'edit_item'                  => __('Edit Category', 'text-domain'),
        'update_item'                => __('Update Category', 'text-domain'),
        'add_new_item'               => __('Add New Category', 'text-domain'),
        'new_item_name'              => __('New Category Name', 'text-domain'),
        'separate_items_with_commas' => __('Separate categories with commas', 'text-domain'),
        'add_or_remove_items'        => __('Add or remove categories', 'text-domain'),
        'choose_from_most_used'      => __('Choose from the most used categories', 'text-domain'),
        'menu_name'                  => __('Categories', 'text-domain'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'event_category'),
    );

    register_taxonomy('Event_category', 'event', $category_args);
}
add_action('init', 'create_custom_Event_taxonomies');


function create_custom_post_type_Press() {
    $labels = array(
        'name'               => __('Press', 'text-domain'),
        'singular_name'      => __('Press', 'text-domain'),
        'menu_name'          => __('Press', 'text-domain'),
        'add_new'            => __('Add New', 'text-domain'),
        'add_new_item'       => __('Add New Press', 'text-domain'),
        'edit_item'          => __('Edit Press', 'text-domain'),
        'new_item'           => __('New Press', 'text-domain'),
        'view_item'          => __('View Press', 'text-domain'),
        'search_items'       => __('Search Press', 'text-domain'),
        'not_found'          => __('No resources found', 'text-domain'),
        'not_found_in_trash' => __('No resources found in Trash', 'text-domain'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'press'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-admin-site', // You can choose an appropriate icon from Dashicons.
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields','excerpt'),
    );

    register_post_type('press', $args);
}
add_action('init', 'create_custom_post_type_Press');

function create_custom_Press_taxonomies() {
    // Category Taxonomy
    $category_labels = array(
        'name'                       => __('Categories', 'text-domain'),
        'singular_name'              => __('Category', 'text-domain'),
        'search_items'               => __('Search Categories', 'text-domain'),
        'popular_items'              => __('Popular Categories', 'text-domain'),
        'all_items'                  => __('All Categories', 'text-domain'),
        'edit_item'                  => __('Edit Category', 'text-domain'),
        'update_item'                => __('Update Category', 'text-domain'),
        'add_new_item'               => __('Add New Category', 'text-domain'),
        'new_item_name'              => __('New Category Name', 'text-domain'),
        'separate_items_with_commas' => __('Separate categories with commas', 'text-domain'),
        'add_or_remove_items'        => __('Add or remove categories', 'text-domain'),
        'choose_from_most_used'      => __('Choose from the most used categories', 'text-domain'),
        'menu_name'                  => __('Categories', 'text-domain'),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'press_category'),
    );

    register_taxonomy('press_category', 'press', $category_args);
}
add_action('init', 'create_custom_press_taxonomies');

// -------------->Register the "news" custom post type<-------------------//
function create_news_post_type() {
    $labels = array(
        'name' => 'News',
        'singular_name' => 'News',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New News',
        'edit_item' => 'Edit News',
        'new_item' => 'New News',
        'view_item' => 'View News',
        'search_items' => 'Search News',
        'not_found' => 'No news found',
        'not_found_in_trash' => 'No news found in Trash',
        'parent_item_colon' => 'Parent News:',
        'menu_name' => 'News',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
		'menu_icon' => 'dashicons-rss',
        'rewrite' => array('slug' => 'newsletters'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('news', $args);
}
add_action('init', 'create_news_post_type');

function create_news_category_taxonomy(){
$taxonomy_labels = array(
	        'name'                       => 'News Categories',
	        'singular_name'              => 'News Category',
	        'search_items'               => 'Search News Categories',
	        'popular_items'              => 'Popular News Categories',
	        'all_items'                  => 'All News Categories',
	        'parent_item'                => 'Parent News Category',
	        'parent_item_colon'          => 'Parent News Category:',
	        'edit_item'                  => 'Edit News Category',
	        'update_item'                => 'Update News Category',
	        'add_new_item'               => 'Add New News Category',
	        'new_item_name'              => 'New News Category Name',
	        'separate_items_with_commas' => 'Separate News Categories with commas',
	        'add_or_remove_items'        => 'Add or remove News Categories',
	        'choose_from_most_used'      => 'Choose from the most used News Categories',
	        'menu_name'                  => 'Categories',
	    );
	
	    $taxonomy_args = array(
	        'labels'            => $taxonomy_labels,
	        'hierarchical'      => true,
	        'public'            => true,
	        'show_ui'           => true,
	        'show_in_rest'      => true,
	        'show_admin_column' => true,
	        'rewrite'           => array( 'slug' => 'News-category' ),
	    );

		
	
	    register_taxonomy( 'News_category', 'news', $taxonomy_args );

		$city_labels = array(
			'name'                       => _x('Tags', 'taxonomy general name', 'text-domain'),
			'singular_name'              => _x('Tag', 'taxonomy singular name', 'text-domain'),
			'search_items'               => __('Search Tags', 'text-domain'),
			'popular_items'              => __('Popular Tags', 'text-domain'),
			'all_items'                  => __('All Tags', 'text-domain'),
			'edit_item'                  => __('Edit Tag', 'text-domain'),
			'update_item'                => __('Update Tag', 'text-domain'),
			'add_new_item'               => __('Add New Tag', 'text-domain'),
			'new_item_name'              => __('New Tag Name', 'text-domain'),
			'separate_items_with_commas' => __('Separate tags with commas', 'text-domain'),
			'add_or_remove_items'        => __('Add or remove tags', 'text-domain'),
			'choose_from_most_used'      => __('Choose from the most used tags', 'text-domain'),
			'menu_name'                  => __('Tags', 'text-domain'),
		);
		
		$city_args = array(
			'hierarchical'      => false,
			'labels'            => $city_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'tags'),
		);
		
		register_taxonomy('news_tag', 'news', $city_args);

}
add_action('init', 'create_news_category_taxonomy');

//------------>Show all event post type shortcode<------------//
function Events_posttype(){
	ob_start();
	
	echo'<div id="events">';
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$args = array(
	'post_type' => 'event',
	'posts_per_page' =>6,
	'order' => 'ASC',
	'paged' => $paged,
	);
	
	$query = new WP_Query($args);
	if ($query->have_posts()) {
	echo '<div class="event-post-type">';
	while ($query->have_posts()) {
		$query->the_post();
		echo '<div class="event-post-type-item">';
		if (has_post_thumbnail()) {
			echo '<div class="event-post-type-thumbnail">';
			echo'<a href="' . get_permalink() . '">';
			the_post_thumbnail();
		    echo'</a>';
			echo'</div>';
		}
		    $start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

        $formatted_output = $date1 . ' - ' . $date2;
		echo '<div class="event-post-type-date_time">' . get_field('event_date') .' | '.$formatted_output . '</div>';
		echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
		echo '<div class="event-post-type-address">' . get_field('address') . '</div>'; 
		echo'<div class="learnmore">';
		echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
		echo'</div>';
		echo '</div>';
	}
	echo '</div>';
	$total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace($paged, '%#%', esc_url(get_pagenum_link($paged))),
	        'current' => $paged,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
	wp_reset_postdata();
	} else {
	echo '<p>No posts found.</p>';
	}
	echo'</div>';
	
	return ob_get_clean();
	}
add_shortcode('Events_posttype', 'Events_posttype');

//----------->upcoming event postshortcode<--------------//
function upcoming_events_shortcode() {
    ob_start();
    echo '<div id="upcoming_events">';
    $today = date('Y-m-d'); 
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 3,
        'meta_key' => 'event_date', 
        'meta_value' => $today,
        'meta_compare' => '>=', 
        'meta_type' => 'DATE',
        'orderby' => 'meta_value',
        'order' => 'ASC',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="event-post-type">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="event-post-type-item">';
            if (has_post_thumbnail()) {
                echo '<div class="event-post-type-thumbnail">';
				echo'<a href="' . get_permalink() . '">';
                the_post_thumbnail();
                echo'</a>';
			    echo'</div>';
            }
			$start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

        $formatted_output = $date1 . ' - ' . $date2;
            echo '<div class="event-post-type-date_time">' . get_field('event_date') . ' | ' . $formatted_output . '</div>';
			echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
            echo '<div class="event-post-type-address">' . get_field('address') . '</div>';
            echo'<div class="learnmore">';
            echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
            echo'</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No posts found.</p>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('upcoming_events', 'upcoming_events_shortcode');

//------------->pagination and post ajax response<---------------------//
function events_posts() {
	$currentPage = isset($_POST['currentPage']) ? $_POST['currentPage'] : 1;
	$args = array(
		'post_type' => 'event',
		'posts_per_page' =>6,
		'order' => 'ASC',
		'paged' => $currentPage,
		);
		
		$query = new WP_Query($args);
		if ($query->have_posts()) {
		echo '<div class="event-post-type">';
		while ($query->have_posts()) {
			$query->the_post();
			echo '<div class="event-post-type-item">';
			if (has_post_thumbnail()) {
				echo '<div class="event-post-type-thumbnail">';
				echo'<a href="' . get_permalink() . '">';
				the_post_thumbnail();
				echo'</a>';
				echo '</div>';
			}
			$start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

            $formatted_output = $date1 . ' - ' . $date2;
			echo '<div class="event-post-type-date_time">' . get_field('event_date') .' | '.$formatted_output . '</div>';
			echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
			echo '<div class="event-post-type-address">' . get_field('address') . '</div>';
			echo'<div class="learnmore">';  
			echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		$total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'current' => $currentPage,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
		wp_reset_postdata();
		} else {
		echo '<p>No posts found.</p>';
		}
		echo'</div>';
		
    $response = ob_get_clean();
    echo $response;
	//print_R($response);
    wp_die();
}
add_action('wp_ajax_events_posts', 'events_posts');
add_action('wp_ajax_nopriv_events_posts', 'events_posts');

// ------------------>shorcode for press post type<---------------------- //
function press_category_filter_shortcode() {
    ob_start();
    ?>
<div class="press_filter">
    <div class="press_filter-content">
    <h3>Explore Press Releases by Year</h3>
    <select id="press-category-filter" class="press-category-selected">
        <div class="press-release">
        </div>
        <option value="">Choose Year</option>
        <?php
		$categories = get_terms('press_category');
        foreach ($categories as $category) {
            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }	
        ?>
    </select>
	</div>
</div>

    <div id="post-container">
        <?php
	  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
       $args = array(
	   'post_type' => 'press',
	   'posts_per_page' => 9,
	   'order' => 'DESC',
	   'paged' => $paged,
        );

    $query = new WP_Query($args);
	 if ($query->have_posts()) {
        echo '<div class="press-post-type">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="press-post-type-item">';
            if (has_post_thumbnail()) {
                echo '<div class="press-post-type-thumbnail">';
				$url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">';
			} else {
				echo '<a href="' . get_permalink() . '">';
			}
                the_post_thumbnail();
                echo '</a></div>';
            }
			//print_r($categories);
            echo '<h3 class="press-post-type-date"><a href="javascript:void(0)">' . get_the_date() . '</a></h3>';
            echo '<p class="press-post-type-title">' . get_the_title() . '</p>';
			echo'<div class="readmore">'; 
			$url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">Read more</a>';
			} else {
				echo '<a href="' . esc_url(get_permalink()) . '">Read more</a>';
			}
			echo'</div>'; 
            echo '</div>';
        }
        echo '</div>';
		$total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $paged ) ) ),
	        'current' => $paged,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
        wp_reset_postdata();
	} else {
		echo '<p>No posts found.</p>';
	}

	?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('press_category_filter', 'press_category_filter_shortcode');


function press_category_filter() {
	$category_slug = isset($_POST['categorySlug']) ? $_POST['categorySlug'] : '';
	$currentPage = isset($_POST['currentPage']) ? $_POST['currentPage'] : 1;

	$args = array(
		'post_type' => 'press',
		'posts_per_page' => 9,
		'order' => 'DESC',
		'paged' => $currentPage,
		 );

	if($category_slug){	
	$args['tax_query'] = array(
				array(
					'taxonomy' => 'press_category',
					'field' => 'slug',
					'terms' => $category_slug,
				),
	   );
	}
	 $query = new WP_Query($args);
	  if ($query->have_posts()) {
		 echo '<div class="press-post-type">';
		 while ($query->have_posts()) {
			 $query->the_post();
			 echo '<div class="press-post-type-item">';
			 if (has_post_thumbnail()) {
				 echo '<div class="press-post-type-thumbnail">';
				 $url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">';
			} else {
				echo '<a href="' . get_permalink() . '">';
			}
				 the_post_thumbnail();
				 echo '</a></div>';
			 }
			 //print_r($categories);
			 echo '<h3 class="press-post-type-date"><a href="javascript:void(0)">' . get_the_date() . '</a></h3>';
			 echo '<p class="press-post-type-title">' . get_the_title() . '</p>';
			 echo'<div class="readmore">'; 
			 $url = get_field('url');
			 if ($url != "") {
				 echo '<a href="' . esc_url($url) . '" target="_blank">Read more</a>';
			 } else {
				 echo '<a href="' . esc_url(get_permalink()) . '">Read more</a>';
			 }
			 echo'</div>';
			 echo '</div>';
		 }
		 echo '</div>';
		 $total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'current' => $currentPage,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
		 wp_reset_postdata();
	 } else {
		 echo '<p>No posts found.</p>';
	 }
    $response = ob_get_clean();
    echo $response;
	//print_R($response);
    wp_die();
}
add_action('wp_ajax_press_category_filter', 'press_category_filter');
add_action('wp_ajax_nopriv_press_category_filter', 'press_category_filter');


//------------>news shorcode<----------------- 
function news_posttype(){
	ob_start();
	
	echo'<div id="news">';
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$args = array(
	'post_type' => 'news',
	'posts_per_page' =>10,
	'order' => 'DESC',
	'paged' => $paged,
	);
	
	$news = new WP_Query($args);
	if ($news->have_posts()) {
	echo '<div class="news-press-post-type">';
	while ($news->have_posts()) {
		$news->the_post();
		echo '<div class="press-post-type-item">';
		if (has_post_thumbnail()) {
			echo '<div class="press-post-type-thumbnail"><a href="' . get_permalink() . '">';
			the_post_thumbnail();
			echo '</div>';
		}
		    global $post;
			$tags = get_the_terms( $post->ID, 'news_tag' );
			$categories = get_the_terms( $post->ID, 'News_category' );
			foreach($categories as $category){
			$categoryname = esc_html($category->name);
			}
			if (!empty($tags)) {
			foreach ($tags as $tag) {
			$tags_name = esc_html($tag->name); // Get the name of each category
			echo'<h3 class="press-post-type-news-tag">'.$categoryname.': '.$tags_name.'</h3>';
			}
			}
		echo '<div class="press-post-type-title">' . get_the_title() . '</div>';
		echo'<div class="readmore">'; 
		$url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">Read more</a>';
			} else {
				echo '<a href="' . esc_url(get_permalink()) . '">Read more</a>';
			}
		echo'</div>'; 
		echo '</div>';
	}
	echo '</div>';
	$total_pages = $news->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace($paged, '%#%', esc_url(get_pagenum_link($paged))),
	        'current' => $paged,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $news->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
	wp_reset_postdata();
	} else {
	echo '<p>No posts found.</p>';
	}
	echo'</div>';
	
	return ob_get_clean();
	}
add_shortcode('news_posttype', 'news_posttype');

function news_posts() {
	$currentPage = isset($_POST['currentPage']) ? $_POST['currentPage'] : 1;
	$args = array(
		'post_type' => 'news',
		'posts_per_page' =>10,
		'order' => 'DESC',
		'paged' => $currentPage,
		);
		
		$news = new WP_Query($args);
		if ($news->have_posts()) {
		echo '<div class="news-press-post-type">';
		while ($news->have_posts()) {
			$news->the_post();
			echo '<div class="press-post-type-item">';
			if (has_post_thumbnail()) {
				echo '<div class="press-post-type-thumbnail"><a href="' . get_permalink() . '">';
				the_post_thumbnail();
				echo '</div>';
			}
				global $post;
				$tags = get_the_terms( $post->ID, 'news_tag' );
				$categories = get_the_terms( $post->ID, 'News_category' );
				foreach($categories as $category){
				$categoryname = esc_html($category->name);
				}
				if (!empty($tags)) {
				foreach ($tags as $tag) {
				$tags_name = esc_html($tag->name); // Get the name of each category
				echo'<h3 class="press-post-type-news-tag">'.$categoryname.': '.$tags_name.'</h3>';
				}
				}
			echo '<div class="press-post-type-title">' . get_the_title() . '</div>';
			echo'<div class="readmore">'; 
		   $url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">Read more</a>';
			} else {
				echo '<a href="' . esc_url(get_permalink()) . '">Read more</a>';
			}
		    echo'</div>'; 
			echo '</div>';
		}
		echo '</div>';
		$total_pages = $news->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace($paged, '%#%', esc_url(get_pagenum_link($paged))),
	        'current' => $currentPage,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $news->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
		wp_reset_postdata();
		} else {
		echo '<p>No posts found.</p>';
		}
		echo'</div>';
		
    $response = ob_get_clean();
    echo $response;
	//print_R($response);
    wp_die();
}
add_action('wp_ajax_news_posts', 'news_posts');
add_action('wp_ajax_nopriv_news_posts', 'news_posts');


//---------------->top stories shortcode<---------------------//
function top_stories(){
    ob_start();
    
    echo'<div id="top-stories">';
    $args = array(
    'post_type' => 'press',
    'posts_per_page' =>4,
    'order' => 'DESC',
    'orderby' => 'post_views', 
    'paged' => 1,
    );
    
    $query = new WP_Query($args);
    if ($query->have_posts()) {
    echo '<div class="press-post-type">';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<div class="press-post-type-item">';
        if (has_post_thumbnail()) {
            echo '<div class="press-post-type-thumbnail"><a href="' . get_permalink() . '">';
            the_post_thumbnail();
            echo '</div>';
        }
        
        //print_r($categories);
        echo '<h3 class="press-post-type-date"><a href="' . get_permalink() . '">' . get_the_date() . '</a></h3>';
        echo '<div class="press-post-type-title">' . get_the_title() . '</div>';
        echo '<a href="' . get_permalink() . '">Read more</a>';
        echo '</div>';
    }
    echo '</div>';
    wp_reset_postdata();
    } else {
    echo '<p>No posts found.</p>';
    }
    echo'</div>';
    
    return ob_get_clean();
    }
    add_shortcode('top_stories', 'top_stories');

//--------------->recent post press<--------------------
	function recent_post(){
		ob_start();
		
		echo'<div id="recent_post">';
		$args = array(
		'post_type' => 'press',
		'posts_per_page' =>1,
		'order' => 'DESC',
		);
		
		$query = new WP_Query($args);
		if ($query->have_posts()) {
		echo '<div class="press-post-types">';
		while ($query->have_posts()) {
			$query->the_post();
			echo'<div class="press-thumbnail">';
			echo '<div class="press-post-type-item">';
			if (has_post_thumbnail()) {
				echo '<div class="press-post-type-thumbnail"><a href="javascript:void(0)">';
				the_post_thumbnail();
				echo '</div>';
			}
			echo'</div>';
			
			//print_r($categories);
			echo'<div class="recent-release-main">';
			echo'<h4>Recent Release</h4>';
			echo '<div class="press-post-type-title">' . get_the_title() . '</div>';
			echo '<h3 class="press-post-type-date"><a href="javascript:void(0)">' . get_the_date() . '</a></h3>';
			echo '<div class="press-post-type-excerpt">' .get_the_excerpt() . '</div>';
			echo'<div class="readmore">';
			$url = get_field('url');
			if ($url != "") {
				echo '<a href="' . esc_url($url) . '" target="_blank">Read more</a>';
			} else {
				echo '<a href="' . esc_url(get_permalink()) . '">Read more</a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		wp_reset_postdata();
		} else {
		echo '<p>No posts found.</p>';
		}
		echo'</div>';
		
		return ob_get_clean();
		}
		add_shortcode('recent_post', 'recent_post');


		//----------->post reding time<------------------//
		function post_read_time() {
			global $post;
			$author_id = $post->post_author;
			$author_name = get_the_author_meta('display_name', $post->post_author);
			$author_image = get_avatar($author_id, 32);
			$post_date = get_the_date('', $post);
			$field1 = get_field('description', $post->ID);
            $field2 = get_field('description2', $post->ID);
            $field3 = get_field('description3', $post->ID);
		    $thecontent = $field1 . ' ' . $field2 . ' ' . $field3;
			$words = str_word_count(strip_tags($thecontent));
			$m = floor($words / 200);
			$s = floor($words % 200 / (200 / 60));
			$estimate = $m . ' minute' . ($m == 1 ? '' : 's');
			$output = '<div> <span class="ny_author">'.$author_image.'' . $author_name . ' <b>-</b></span> <p><span class="ny_date">' . $post_date . '</span><span class="ny_rtime"><span>/</span>' . $estimate . ' Read</span></p></div>';
			return $output;
		}
		
		add_shortcode('reading_time', 'post_read_time');

		//Desktop site search
function Home_search(){
	ob_start();
	?>
  <div class="header-form-search">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	  <label>
		  <input type="search" id="search-input" class="search-field" placeholder="Search" value="" autocomplete="off" name="s" title="Search for:" />
		  <button id="btnClear">X</button>
	  </label>
	  <input type="submit" class="search-submit" value="Search" />
	  <div class= "form-img-main">
	  <p class="img-icon-search">
		  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
			  <path d="M13.0605 13.2501L10.5605 10.7501M10.5605 5.75C10.5605 8.51142 8.32197 10.75 5.56055 10.75C2.79912 10.75 0.560547 8.51142 0.560547 5.75C0.560547 2.98858 2.79912 0.75 5.56055 0.75C8.32197 0.75 10.5605 2.98858 10.5605 5.75Z" stroke="#1E1E1E" stroke-linecap="round"></path>
		  </svg>
	  </p>
	  </div>
  </form>
  <div id="suggestions"></div>
</div>
<?php
return ob_get_clean();
  }
add_shortcode('Home_search', 'Home_search');
           //mobile site search
		add_shortcode('serch_page', 'serch');
	
		function serch() {
			ob_start();
			?>
			<div class="header-form-search">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
					<label>
						<input type="search" id="searching" class="search-field" placeholder="Search" value="" name="s" title="Search for:" />
					</label>
					<input type="submit" class="search-submit" value="Search" />
				</form>
				<div id="suggestionssearching"></div>
			</div>
	 
			
			<?php
			return ob_get_clean();
		}

    //------------>ajax search suggestion<-------------------------
	add_action('wp_ajax_search_suggestions' , 'search_suggestions');
    add_action('wp_ajax_nopriv_search_suggestions','search_suggestions');
     function search_suggestions(){
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['search_query'] ), 'post_type' => array('page') ) );
	
    if( $the_query->have_posts() ) :
        echo '<ul>';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>
        <?php endwhile;
       echo '</ul>';
        wp_reset_postdata();  
    endif;

    die();
}



//---------------->top stories news shortcode<---------------------//
function top_stories_news(){
    ob_start();
    
    echo'<div id="top-stories">';
    $args = array(
    'post_type' => 'news',
    'posts_per_page' =>4,
    'order' => 'DESC',
    'orderby' => 'post_views', 
    'paged' => 1,
    );
    
    $query = new WP_Query($args);
    if ($query->have_posts()) {
    echo '<div class="press-post-type">';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<div class="press-post-type-item">';
        if (has_post_thumbnail()) {
            echo '<div class="press-post-type-thumbnail"><a href="' . get_permalink() . '">';
            the_post_thumbnail();
            echo '</div>';
        }
        
        //print_r($categories);
        echo '<h3 class="press-post-type-date"><a href="' . get_permalink() . '">' . get_the_date() . '</a></h3>';
        echo '<div class="press-post-type-title">' . get_the_title() . '</div>';
        echo '<a href="' . get_permalink() . '">Read more</a>';
        echo '</div>';
    }
    echo '</div>';
    wp_reset_postdata();
    } else {
    echo '<p>No posts found.</p>';
    }
    echo'</div>';
    
    return ob_get_clean();
    }
    add_shortcode('top_stories_news', 'top_stories_news');


//-----------------event detals time shortcode------------------
function event_time_shortcode($atts) {
    global $post;

    $atts = shortcode_atts(array(), $atts);

    $post_id = $post->ID;
    $start_time = get_field('start_time', $post_id);
    $end_time = get_field('end_time', $post_id);
    $event_date = get_field('date', $post_id);

    $start_timestamp = strtotime($start_time);
    $end_timestamp = strtotime($end_time);

    $date1 = date("g:ia", $start_timestamp);
    $date1 = str_replace(":00", "", $date1);

    $date2 = date("g:ia", $end_timestamp);
    $date2 = str_replace(":00", "", $date2);

    $formatted_output = $date1 . ' - ' . $date2;
	echo $formatted_output;

    //return '<div class="event-post-type-date_time">' . $event_date . ' | ' . $formatted_output . '</div>';
}
add_shortcode('event_time', 'event_time_shortcode');

//serch.php first page than post
add_filter( 'posts_orderby', 'order_search_by_posttype', 10, 2 );
function order_search_by_posttype( $orderby, $wp_query ){
    if( ! $wp_query->is_admin && $wp_query->is_search ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'page' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2' 
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}

//**comunnity kid post short code */
function Comunity_kid_post(){
	ob_start();
	echo'<div id="comunity">';
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$args = array(
	'post_type' => 'communitykid',
	'posts_per_page' =>6,
	'order' => 'ASC',
	'paged' => $paged,
	);
	
	$query = new WP_Query($args);
	if ($query->have_posts()) {
	echo '<div class="event-post-type">';
	while ($query->have_posts()) {
		$query->the_post();
		echo '<div class="event-post-type-item">';
		if (has_post_thumbnail()) {
			echo '<div class="event-post-type-thumbnail">';
			echo'<a href="' . get_permalink() . '">';
			the_post_thumbnail();
		    echo'</a>';
			echo'</div>';
		}
		    $start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

        $formatted_output = $date1 . ' - ' . $date2;
		echo '<div class="event-post-type-date_time">' . get_field('event_date') .' | '.$formatted_output . '</div>';
		echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
		echo '<div class="event-post-type-address">' . get_field('address') . '</div>'; 
		echo'<div class="learnmore">';
		echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
		echo'</div>';
		echo '</div>';
	}
	echo '</div>';
	$total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace($paged, '%#%', esc_url(get_pagenum_link($paged))),
	        'current' => $paged,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
	wp_reset_postdata();
	} else {
	echo '<p>No posts found.</p>';
	}
	echo'</div>';
	
	return ob_get_clean();
	}
add_shortcode('Comunity_kid_post', 'Comunity_kid_post');


function comunity_posts() {
	$currentPage = isset($_POST['currentPage']) ? $_POST['currentPage'] : 1;
	$args = array(
		'post_type' => 'communitykid',
		'posts_per_page' =>6,
		'order' => 'ASC',
		'paged' => $currentPage,
		);
		
		$query = new WP_Query($args);
		if ($query->have_posts()) {
		echo '<div class="event-post-type">';
		while ($query->have_posts()) {
			$query->the_post();
			echo '<div class="event-post-type-item">';
			if (has_post_thumbnail()) {
				echo '<div class="event-post-type-thumbnail">';
				echo'<a href="' . get_permalink() . '">';
				the_post_thumbnail();
				echo'</a>';
				echo '</div>';
			}
			$start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

            $formatted_output = $date1 . ' - ' . $date2;
			echo '<div class="event-post-type-date_time">' . get_field('event_date') .' | '.$formatted_output . '</div>';
			echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
			echo '<div class="event-post-type-address">' . get_field('address') . '</div>';
			echo'<div class="learnmore">';  
			echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		$total_pages = $query->max_num_pages;
		if ($total_pages > 1) {
			echo '<div class="pagination">';
			global $wp_query;
			$big = 999999999; // need an unlikely integer
	         echo paginate_links( array(
	        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'current' => $currentPage,
			'prev_text'    => __('«'),
            'next_text'    => __('»'),
	        'total'   => $query->max_num_pages,
			'prev_next'   => TRUE,
	         ) );
			 }
		wp_reset_postdata();
		} else {
		echo '<p>No posts found.</p>';
		}
		echo'</div>';
		
    $response = ob_get_clean();
    echo $response;
	//print_R($response);
    wp_die();
}
add_action('wp_ajax_comunity_posts', 'comunity_posts');
add_action('wp_ajax_nopriv_comunity_posts', 'comunity_posts');


//----------->upcoming event postshortcode<--------------//
function upcoming_communitykid_events() {
    ob_start();
    echo '<div id="upcoming_events">';
    $today = date('Y-m-d'); 
    $args = array(
        'post_type' => 'communitykid',
        'posts_per_page' => 3,
        'meta_key' => 'event_date', 
        'meta_value' => $today,
        'meta_compare' => '>=', 
        'meta_type' => 'DATE',
        'orderby' => 'meta_value',
        'order' => 'ASC',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<div class="event-post-type">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<div class="event-post-type-item">';
            if (has_post_thumbnail()) {
                echo '<div class="event-post-type-thumbnail">';
				echo'<a href="' . get_permalink() . '">';
                the_post_thumbnail();
                echo'</a>';
			    echo'</div>';
            }
			$start_time = get_field('start_time'); 
            $end_time = get_field('end_time');

            $start_timestamp = strtotime($start_time);
            $end_timestamp = strtotime($end_time);

            $date1 = date("g:ia", $start_timestamp);
            $date1 = str_replace(":00", "", $date1);

            $date2 = date("g:ia", $end_timestamp);
            $date2 = str_replace(":00", "", $date2);

        $formatted_output = $date1 . ' - ' . $date2;
            echo '<div class="event-post-type-date_time">' . get_field('event_date') . ' | ' . $formatted_output . '</div>';
			echo '<div class="event-post-type-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
            echo '<div class="event-post-type-address">' . get_field('address') . '</div>';
            echo'<div class="learnmore">';
            echo '<a href="' . get_permalink() . '">Learn more <img src="/wp-content/uploads/2023/08/Vector-9.svg" alt="Learn more"></a>';
            echo'</div>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No posts found.</p>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('upcoming_communitykid_events', 'upcoming_communitykid_events');










?>