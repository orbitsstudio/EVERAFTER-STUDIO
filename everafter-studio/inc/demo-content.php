<?php
/**
 * Sample Demo Content Generator for Everafter Studio
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle admin-post action to populate sample content.
 */
function everafter_handle_install_demo() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'Unauthorized access.', 'everafter-studio' ) );
	}

	check_admin_referer( 'everafter_install_demo_action', 'everafter_demo_nonce' );

	everafter_import_sample_data();

	wp_safe_redirect( add_query_arg( array( 'page' => 'everafter-theme-options', 'demo_installed' => 'true' ), admin_url( 'themes.php' ) ) );
	exit;
}
add_action( 'admin_post_everafter_install_demo', 'everafter_handle_install_demo' );

/**
 * Creates curated sample pages, stories, and portfolio items.
 */
function everafter_import_sample_data() {
	// 1. Pages with Templates
	$pages = array(
		'about'       => array(
			'title'    => 'About Us',
			'template' => 'page-about.php',
			'content'  => 'Everafter Studio is an international luxury wedding photography and cinematic film studio crafting timeless editorial narratives across Europe and beyond.',
		),
		'portfolio'   => array(
			'title'    => 'Portfolio',
			'template' => 'page-portfolio.php',
			'content'  => 'A curated collection of fine-art wedding imagery, editorial fashion portraits, and cinematic destination captures.',
		),
		'stories'     => array(
			'title'    => 'Wedding Stories',
			'template' => 'page-stories.php',
			'content'  => 'Complete visual retrospectives documenting extraordinary couples celebrating in the world’s most enchanting locales.',
		),
		'services'    => array(
			'title'    => 'Services',
			'template' => 'page-services.php',
			'content'  => 'Bespoke photographic and cinematographic commissions tailored for destination celebrations.',
		),
		'destination' => array(
			'title'    => 'Destination Weddings',
			'template' => 'page-destination.php',
			'content'  => 'Global wedding coverage with dedicated production logistics throughout Italy, France, Greece, and beyond.',
		),
		'contact'     => array(
			'title'    => 'Contact & Inquiries',
			'template' => 'page-contact.php',
			'content'  => 'We accept a limited number of commissions each calendar season to preserve our dedicated focus on every couple.',
		),
	);

	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug );
		if ( ! $existing ) {
			$page_id = wp_insert_post(
				array(
					'post_title'   => $data['title'],
					'post_name'    => $slug,
					'post_content' => $data['content'],
					'post_status'  => 'publish',
					'post_type'    => 'page',
				)
			);
			if ( $page_id && ! is_wp_error( $page_id ) && ! empty( $data['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $data['template'] );
			}
		}
	}

	// 2. Sample Categories
	$categories = array(
		'Destination Weddings',
		'Cinematic Films',
		'Bridal Editorial',
		'Pre-Wedding Portraits',
	);

	foreach ( $categories as $cat ) {
		if ( ! term_exists( $cat, 'portfolio_category' ) ) {
			wp_insert_term( $cat, 'portfolio_category' );
		}
	}

	// 3. Sample Locations
	$locations = array(
		'Lake Como, Italy',
		'Provence, France',
		'Amalfi Coast, Italy',
		'Santorini, Greece',
		'Tuscany, Italy',
	);

	foreach ( $locations as $loc ) {
		if ( ! term_exists( $loc, 'wedding_location' ) ) {
			wp_insert_term( $loc, 'wedding_location' );
		}
	}

	// 4. Sample Stories
	$stories = array(
		array(
			'title'    => 'Elena & Matteo — Villa Balbiano, Lake Como',
			'content'  => '<p>Bathed in the incandescent twilight of Lake Como, Elena and Matteo exchanged vows upon the grand antique stone terrace of Villa Balbiano. Surrounded by cascading olive greenery, neoclassical marble balustrades, and the serene expanse of the alpine water, every moment breathed timeless Italian romanticism.</p><p>Captured using medium-format analog film and cinematic 35mm cameras, their celebration unfolded as an intimate symphony of candid whispers, joyous garden toasts, and a moonlit boat send-off across the shimmering water.</p>',
			'names'    => 'Elena & Matteo',
			'location' => 'Villa Balbiano, Lake Como',
			'season'   => 'September 2026',
			'gear'     => 'Contax 645 · Kodak Portra 400 · Arri Alexa Mini',
		),
		array(
			'title'    => 'Camille & Alexandre — Château de Tourreau, Provence',
			'content'  => '<p>Set amidst the golden limestone walls, lavender terraces, and centuries-old cypress paths of Provence, Camille and Alexandre gathered close family from across three continents for a three-day celebration of Provencal joie de vivre.</p><p>From the candlelit courtyard welcome banquet to the vibrant garden celebration beneath trailing wisteria, the light rendered their story with exceptional softness and emotional weight.</p>',
			'names'    => 'Camille & Alexandre',
			'location' => 'Château de Tourreau, Provence',
			'season'   => 'June 2026',
			'gear'     => 'Leica M11 · 35mm Summilux · Kodak Tri-X 400',
		),
		array(
			'title'    => 'Isabella & Julian — Ravello Cliffside, Amalfi Coast',
			'content'  => '<p>Perched high above the azure Mediterranean on the terraces of Ravello, Isabella and Julian’s wedding embraced dramatic sea vistas and vibrant coastal elegance. The bride wore custom Valentino couture with delicate floral embroidery, caught by the afternoon sea breeze.</p><p>As sunset turned the cliffs into shades of amber and rose, guests celebrated under a canopy of Amalfi lemon trees.</p>',
			'names'    => 'Isabella & Julian',
			'location' => 'Villa Cimbrone, Ravello',
			'season'   => 'July 2026',
			'gear'     => 'Hasselblad 500C/M · Portra 800 · Sony FX9 Cinema',
		),
	);

	foreach ( $stories as $story ) {
		$check = get_page_by_title( $story['title'], OBJECT, 'wedding_story' );
		if ( ! $check ) {
			$story_id = wp_insert_post(
				array(
					'post_title'   => $story['title'],
					'post_content' => $story['content'],
					'post_status'  => 'publish',
					'post_type'    => 'wedding_story',
				)
			);
			if ( $story_id && ! is_wp_error( $story_id ) ) {
				update_post_meta( $story_id, '_everafter_couple_names', $story['names'] );
				update_post_meta( $story_id, '_everafter_location', $story['location'] );
				update_post_meta( $story_id, '_everafter_wedding_date', $story['season'] );
				update_post_meta( $story_id, '_everafter_film_gear', $story['gear'] );
			}
		}
	}
}
