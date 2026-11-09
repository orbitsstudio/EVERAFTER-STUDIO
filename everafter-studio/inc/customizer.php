<?php
/**
 * Everafter Studio Theme Customizer
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer panels, sections, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function everafter_customize_register( $wp_customize ) {

	// Enable selective refresh for widgets and titles
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// -------------------------------------------------------------
	// PANEL: Everafter Studio Options
	// -------------------------------------------------------------
	$wp_customize->add_panel(
		'everafter_theme_options',
		array(
			'title'       => __( 'Everafter Studio Options', 'everafter-studio' ),
			'description' => __( 'Configure luxury typography, hero elements, contact details, and editorial content.', 'everafter-studio' ),
			'priority'    => 25,
		)
	);

	// -------------------------------------------------------------
	// SECTION 1: Brand Colors & Palette
	// -------------------------------------------------------------
	$wp_customize->add_section(
		'everafter_colors_section',
		array(
			'title'    => __( 'Brand Colors & Palette', 'everafter-studio' ),
			'panel'    => 'everafter_theme_options',
			'priority' => 10,
		)
	);

	// Ivory Background
	$wp_customize->add_setting(
		'everafter_color_ivory',
		array(
			'default'           => '#F7F4EF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'everafter_color_ivory',
			array(
				'label'    => __( 'Ivory Background Color', 'everafter-studio' ),
				'section'  => 'everafter_colors_section',
				'settings' => 'everafter_color_ivory',
			)
		)
	);

	// Soft Gold Accent
	$wp_customize->add_setting(
		'everafter_color_soft_gold',
		array(
			'default'           => '#B49A70',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'everafter_color_soft_gold',
			array(
				'label'    => __( 'Soft Gold Accent Color', 'everafter-studio' ),
				'section'  => 'everafter_colors_section',
				'settings' => 'everafter_color_soft_gold',
			)
		)
	);

	// Charcoal Dark Surface
	$wp_customize->add_setting(
		'everafter_color_charcoal',
		array(
			'default'           => '#242321',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'everafter_color_charcoal',
			array(
				'label'    => __( 'Charcoal Surface Color', 'everafter-studio' ),
				'section'  => 'everafter_colors_section',
				'settings' => 'everafter_color_charcoal',
			)
		)
	);

	// -------------------------------------------------------------
	// SECTION 2: Hero Section Settings
	// -------------------------------------------------------------
	$wp_customize->add_section(
		'everafter_hero_section',
		array(
			'title'       => __( 'Homepage Hero Section', 'everafter-studio' ),
			'panel'       => 'everafter_theme_options',
			'priority'    => 20,
			'description' => __( 'Customize the fullscreen cinematic hero shown on the homepage.', 'everafter-studio' ),
		)
	);

	// Kicker Tagline
	$wp_customize->add_setting(
		'everafter_hero_kicker',
		array(
			'default'           => __( 'International Luxury Wedding Photography', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_kicker',
		array(
			'label'   => __( 'Hero Top Kicker', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Heading
	$wp_customize->add_setting(
		'everafter_hero_heading',
		array(
			'default'           => 'Your Story. Beautifully Remembered.',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_heading',
		array(
			'label'       => __( 'Hero Heading', 'everafter-studio' ),
			'description' => __( 'HTML allowed, e.g. <em>Remembered</em>', 'everafter-studio' ),
			'section'     => 'everafter_hero_section',
			'type'        => 'textarea',
		)
	);

	// Hero Description
	$wp_customize->add_setting(
		'everafter_hero_description',
		array(
			'default'           => __( 'Editorial wedding imagery and cinematic films for couples celebrating love in the world’s most breathtaking destinations. Crafted with timeless fine-art sensibility.', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_description',
		array(
			'label'   => __( 'Hero Description', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'textarea',
		)
	);

	// Hero Background Image
	$wp_customize->add_setting(
		'everafter_hero_bg_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'everafter_hero_bg_image',
			array(
				'label'       => __( 'Hero Background Image', 'everafter-studio' ),
				'description' => __( 'Upload a high-resolution 16:9 photo for the cinema hero.', 'everafter-studio' ),
				'section'     => 'everafter_hero_section',
			)
		)
	);

	// Hero Primary Button Label
	$wp_customize->add_setting(
		'everafter_hero_btn1_label',
		array(
			'default'           => __( 'Explore Our Stories', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_btn1_label',
		array(
			'label'   => __( 'Primary Button Label', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Primary Button URL
	$wp_customize->add_setting(
		'everafter_hero_btn1_url',
		array(
			'default'           => '#stories',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_btn1_url',
		array(
			'label'   => __( 'Primary Button Link', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Secondary Button Label
	$wp_customize->add_setting(
		'everafter_hero_btn2_label',
		array(
			'default'           => __( 'Book Your Date', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_btn2_label',
		array(
			'label'   => __( 'Secondary Button Label', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'text',
		)
	);

	// Hero Secondary Button URL
	$wp_customize->add_setting(
		'everafter_hero_btn2_url',
		array(
			'default'           => '#inquire',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'everafter_hero_btn2_url',
		array(
			'label'   => __( 'Secondary Button Link', 'everafter-studio' ),
			'section' => 'everafter_hero_section',
			'type'    => 'text',
		)
	);

	// -------------------------------------------------------------
	// SECTION 3: Studio Philosophy / Intro
	// -------------------------------------------------------------
	$wp_customize->add_section(
		'everafter_intro_section',
		array(
			'title'    => __( 'Studio Philosophy & Intro', 'everafter-studio' ),
			'panel'    => 'everafter_theme_options',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'everafter_intro_heading',
		array(
			'default'           => __( 'Poetic imagery rooted in candid emotion and enduring beauty.', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'everafter_intro_heading',
		array(
			'label'   => __( 'Intro Heading', 'everafter-studio' ),
			'section' => 'everafter_intro_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'everafter_intro_body',
		array(
			'default'           => __( 'At Everafter Studio, we view weddings not merely as sequences of scheduled events, but as deeply emotional tapestries of human connection. Our approach blends editorial high-fashion aesthetics with quiet, unobtrusive documentary storytelling. Every frame is composed with intentionality, honoring authentic light, intimate glances, and the rare elegance of your celebration.', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'everafter_intro_body',
		array(
			'label'   => __( 'Intro Paragraph', 'everafter-studio' ),
			'section' => 'everafter_intro_section',
			'type'    => 'textarea',
		)
	);

	// -------------------------------------------------------------
	// SECTION 4: Contact & Studio Info
	// -------------------------------------------------------------
	$wp_customize->add_section(
		'everafter_contact_section',
		array(
			'title'    => __( 'Studio Contact & Inquiries', 'everafter-studio' ),
			'panel'    => 'everafter_theme_options',
			'priority' => 40,
		)
	);

	// Destination email for inquiries
	$wp_customize->add_setting(
		'everafter_inquiry_recipient',
		array(
			'default'           => get_option( 'admin_email' ),
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'everafter_inquiry_recipient',
		array(
			'label'       => __( 'Inquiry Notification Email', 'everafter-studio' ),
			'description' => __( 'Email address where contact form submissions are delivered.', 'everafter-studio' ),
			'section'     => 'everafter_contact_section',
			'type'        => 'email',
		)
	);

	// Phone Number
	$wp_customize->add_setting(
		'everafter_contact_phone',
		array(
			'default'           => '+1 (800) 482-9104',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'everafter_contact_phone',
		array(
			'label'   => __( 'Studio Phone Number', 'everafter-studio' ),
			'section' => 'everafter_contact_section',
			'type'    => 'text',
		)
	);

	// Studio Address / Locations
	$wp_customize->add_setting(
		'everafter_contact_address',
		array(
			'default'           => __( 'Offices in Milan · Paris · New York', 'everafter-studio' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'everafter_contact_address',
		array(
			'label'   => __( 'Studio Locations Text', 'everafter-studio' ),
			'section' => 'everafter_contact_section',
			'type'    => 'text',
		)
	);

	// Social Links
	$wp_customize->add_setting(
		'everafter_instagram_url',
		array(
			'default'           => 'https://instagram.com/everafterstudio',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'everafter_instagram_url',
		array(
			'label'   => __( 'Instagram Profile URL', 'everafter-studio' ),
			'section' => 'everafter_contact_section',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'everafter_vimeo_url',
		array(
			'default'           => 'https://vimeo.com/everafterstudio',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'everafter_vimeo_url',
		array(
			'label'   => __( 'Vimeo / Video Channel URL', 'everafter-studio' ),
			'section' => 'everafter_contact_section',
			'type'    => 'url',
		)
	);

	// -------------------------------------------------------------
	// SECTION 5: Footer Content
	// -------------------------------------------------------------
	$wp_customize->add_section(
		'everafter_footer_section',
		array(
			'title'    => __( 'Footer & Copyright', 'everafter-studio' ),
			'panel'    => 'everafter_theme_options',
			'priority' => 50,
		)
	);

	$wp_customize->add_setting(
		'everafter_footer_copyright',
		array(
			'default'           => sprintf( __( '© %s Everafter Studio. All Rights Reserved. Luxury Wedding Photography & Cinematic Films.', 'everafter-studio' ), gmdate( 'Y' ) ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'everafter_footer_copyright',
		array(
			'label'   => __( 'Copyright Text', 'everafter-studio' ),
			'section' => 'everafter_footer_section',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'everafter_customize_register' );

/**
 * Output dynamic CSS for Customizer color overrides in wp_head.
 */
function everafter_customizer_css() {
	$ivory     = get_theme_mod( 'everafter_color_ivory', '#F7F4EF' );
	$soft_gold = get_theme_mod( 'everafter_color_soft_gold', '#B49A70' );
	$charcoal  = get_theme_mod( 'everafter_color_charcoal', '#242321' );

	if ( '#F7F4EF' === $ivory && '#B49A70' === $soft_gold && '#242321' === $charcoal ) {
		return;
	}

	echo '<style type="text/css" id="everafter-customizer-css">';
	echo ':root {';
	echo '--color-ivory: ' . esc_attr( $ivory ) . ';';
	echo '--color-soft-gold: ' . esc_attr( $soft_gold ) . ';';
	echo '--color-charcoal: ' . esc_attr( $charcoal ) . ';';
	echo '}';
	echo '</style>';
}
add_action( 'wp_head', 'everafter_customizer_css' );
