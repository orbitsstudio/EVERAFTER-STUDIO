<?php
/**
 * Register Custom Post Types and Taxonomies for Everafter Studio
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Wedding Stories and Portfolio custom post types.
 */
function everafter_register_custom_post_types() {

	// 1. Wedding Story CPT
	$story_labels = array(
		'name'                  => _x( 'Wedding Stories', 'Post type general name', 'everafter-studio' ),
		'singular_name'         => _x( 'Wedding Story', 'Post type singular name', 'everafter-studio' ),
		'menu_name'             => _x( 'Wedding Stories', 'Admin Menu text', 'everafter-studio' ),
		'name_admin_bar'        => _x( 'Wedding Story', 'Add New on Toolbar', 'everafter-studio' ),
		'add_new'               => __( 'Add New Story', 'everafter-studio' ),
		'add_new_item'          => __( 'Add New Wedding Story', 'everafter-studio' ),
		'new_item'              => __( 'New Wedding Story', 'everafter-studio' ),
		'edit_item'             => __( 'Edit Wedding Story', 'everafter-studio' ),
		'view_item'             => __( 'View Wedding Story', 'everafter-studio' ),
		'all_items'             => __( 'All Wedding Stories', 'everafter-studio' ),
		'search_items'          => __( 'Search Wedding Stories', 'everafter-studio' ),
		'not_found'             => __( 'No wedding stories found.', 'everafter-studio' ),
		'not_found_in_trash'    => __( 'No wedding stories found in Trash.', 'everafter-studio' ),
	);

	$story_args = array(
		'labels'             => $story_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'stories', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => 'wedding-stories',
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-camera',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'wedding_story', $story_args );

	// 2. Portfolio Item CPT
	$portfolio_labels = array(
		'name'                  => _x( 'Portfolio', 'Post type general name', 'everafter-studio' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post type singular name', 'everafter-studio' ),
		'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'everafter-studio' ),
		'name_admin_bar'        => _x( 'Portfolio Item', 'Add New on Toolbar', 'everafter-studio' ),
		'add_new'               => __( 'Add New Item', 'everafter-studio' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'everafter-studio' ),
		'new_item'              => __( 'New Portfolio Item', 'everafter-studio' ),
		'edit_item'             => __( 'Edit Portfolio Item', 'everafter-studio' ),
		'view_item'             => __( 'View Portfolio Item', 'everafter-studio' ),
		'all_items'             => __( 'All Portfolio Items', 'everafter-studio' ),
		'search_items'          => __( 'Search Portfolio', 'everafter-studio' ),
		'not_found'             => __( 'No portfolio items found.', 'everafter-studio' ),
		'not_found_in_trash'    => __( 'No portfolio items found in Trash.', 'everafter-studio' ),
	);

	$portfolio_args = array(
		'labels'             => $portfolio_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio-items', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => 'portfolio-gallery',
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'portfolio_item', $portfolio_args );

	// 3. Taxonomy: Portfolio Categories
	$cat_labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'everafter-studio' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'everafter-studio' ),
		'search_items'      => __( 'Search Categories', 'everafter-studio' ),
		'all_items'         => __( 'All Categories', 'everafter-studio' ),
		'edit_item'         => __( 'Edit Category', 'everafter-studio' ),
		'update_item'       => __( 'Update Category', 'everafter-studio' ),
		'add_new_item'      => __( 'Add New Category', 'everafter-studio' ),
		'new_item_name'     => __( 'New Category Name', 'everafter-studio' ),
		'menu_name'         => __( 'Categories', 'everafter-studio' ),
	);

	register_taxonomy(
		'portfolio_category',
		array( 'portfolio_item', 'wedding_story' ),
		array(
			'hierarchical'      => true,
			'labels'            => $cat_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'portfolio-category' ),
			'show_in_rest'      => true,
		)
	);

	// 4. Taxonomy: Locations
	$loc_labels = array(
		'name'              => _x( 'Destinations & Locations', 'taxonomy general name', 'everafter-studio' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'everafter-studio' ),
		'search_items'      => __( 'Search Locations', 'everafter-studio' ),
		'all_items'         => __( 'All Locations', 'everafter-studio' ),
		'edit_item'         => __( 'Edit Location', 'everafter-studio' ),
		'update_item'       => __( 'Update Location', 'everafter-studio' ),
		'add_new_item'      => __( 'Add New Location', 'everafter-studio' ),
		'new_item_name'     => __( 'New Location Name', 'everafter-studio' ),
		'menu_name'         => __( 'Locations', 'everafter-studio' ),
	);

	register_taxonomy(
		'wedding_location',
		array( 'wedding_story', 'portfolio_item' ),
		array(
			'hierarchical'      => false,
			'labels'            => $loc_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'destination' ),
			'show_in_rest'      => true,
		)
	);
}
add_action( 'init', 'everafter_register_custom_post_types' );

/**
 * Add Custom Meta Boxes for Wedding Stories and Portfolio.
 */
function everafter_add_custom_meta_boxes() {
	$screens = array( 'wedding_story', 'portfolio_item' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'everafter_project_meta',
			__( 'Editorial Project Details', 'everafter-studio' ),
			'everafter_render_project_meta_box',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'everafter_add_custom_meta_boxes' );

/**
 * Render Project Meta Box.
 *
 * @param WP_Post $post Current post object.
 */
function everafter_render_project_meta_box( $post ) {
	wp_nonce_field( 'everafter_save_project_meta', 'everafter_project_nonce' );

	$couple_names = get_post_meta( $post->ID, '_everafter_couple_names', true );
	$location     = get_post_meta( $post->ID, '_everafter_location', true );
	$wedding_date = get_post_meta( $post->ID, '_everafter_wedding_date', true );
	$film_gear    = get_post_meta( $post->ID, '_everafter_film_gear', true );
	$video_url    = get_post_meta( $post->ID, '_everafter_video_url', true );
	?>
	<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; padding: 10px 0;">
		<div>
			<label for="everafter_couple_names" style="display:block; font-weight:600; margin-bottom:5px;">
				<?php esc_html_e( 'Couple Names (e.g. Elena & Matteo):', 'everafter-studio' ); ?>
			</label>
			<input type="text" id="everafter_couple_names" name="everafter_couple_names" value="<?php echo esc_attr( $couple_names ); ?>" class="widefat" />
		</div>
		<div>
			<label for="everafter_location" style="display:block; font-weight:600; margin-bottom:5px;">
				<?php esc_html_e( 'Wedding Location (e.g. Villa Balbiano, Lake Como):', 'everafter-studio' ); ?>
			</label>
			<input type="text" id="everafter_location" name="everafter_location" value="<?php echo esc_attr( $location ); ?>" class="widefat" />
		</div>
		<div>
			<label for="everafter_wedding_date" style="display:block; font-weight:600; margin-bottom:5px;">
				<?php esc_html_e( 'Event Season / Date (e.g. September 2026):', 'everafter-studio' ); ?>
			</label>
			<input type="text" id="everafter_wedding_date" name="everafter_wedding_date" value="<?php echo esc_attr( $wedding_date ); ?>" class="widefat" />
		</div>
		<div>
			<label for="everafter_film_gear" style="display:block; font-weight:600; margin-bottom:5px;">
				<?php esc_html_e( 'Camera & Medium (e.g. Medium Format 120mm · Kodak Portra):', 'everafter-studio' ); ?>
			</label>
			<input type="text" id="everafter_film_gear" name="everafter_film_gear" value="<?php echo esc_attr( $film_gear ); ?>" class="widefat" />
		</div>
		<div style="grid-column: span 2;">
			<label for="everafter_video_url" style="display:block; font-weight:600; margin-bottom:5px;">
				<?php esc_html_e( 'Cinematic Film Embed URL (Optional Vimeo / YouTube link):', 'everafter-studio' ); ?>
			</label>
			<input type="url" id="everafter_video_url" name="everafter_video_url" value="<?php echo esc_url( $video_url ); ?>" class="widefat" placeholder="https://vimeo.com/..." />
		</div>
	</div>
	<?php
}

/**
 * Save Project Meta Data with sanitization and nonce verification.
 *
 * @param int $post_id Post ID.
 */
function everafter_save_project_meta( $post_id ) {
	if ( ! isset( $_POST['everafter_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['everafter_project_nonce'] ) ), 'everafter_save_project_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['everafter_couple_names'] ) ) {
		update_post_meta( $post_id, '_everafter_couple_names', sanitize_text_field( wp_unslash( $_POST['everafter_couple_names'] ) ) );
	}

	if ( isset( $_POST['everafter_location'] ) ) {
		update_post_meta( $post_id, '_everafter_location', sanitize_text_field( wp_unslash( $_POST['everafter_location'] ) ) );
	}

	if ( isset( $_POST['everafter_wedding_date'] ) ) {
		update_post_meta( $post_id, '_everafter_wedding_date', sanitize_text_field( wp_unslash( $_POST['everafter_wedding_date'] ) ) );
	}

	if ( isset( $_POST['everafter_film_gear'] ) ) {
		update_post_meta( $post_id, '_everafter_film_gear', sanitize_text_field( wp_unslash( $_POST['everafter_film_gear'] ) ) );
	}

	if ( isset( $_POST['everafter_video_url'] ) ) {
		update_post_meta( $post_id, '_everafter_video_url', esc_url_raw( wp_unslash( $_POST['everafter_video_url'] ) ) );
	}
}
add_action( 'save_post', 'everafter_save_project_meta' );
