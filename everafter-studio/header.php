<?php
/**
 * The header for Everafter Studio theme
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary" style="position:absolute; left:-9999px; top:auto; width:1px; height:1px; overflow:hidden;">
	<?php esc_html_e( 'Skip to content', 'everafter-studio' ); ?>
</a>

<header id="masthead" class="site-header <?php echo ( ! is_front_page() ) ? 'header-light is-scrolled' : ''; ?>">
	<div class="header-container">
		<!-- Zone 1: Brand Wordmark / Logo -->
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">
					<?php bloginfo( 'name' ); ?>
				</a>
				<?php
			}
			?>
		</div>

		<!-- Zone 2: Navigation Links -->
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'everafter-studio' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
			} else {
				// Default luxury navigation when menu is not yet assigned
				?>
				<ul id="primary-menu">
					<li><a href="<?php echo esc_url( home_url( '/#stories' ) ); ?>"><?php esc_html_e( 'Stories', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>"><?php esc_html_e( 'Portfolio', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Services', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#philosophy' ) ); ?>"><?php esc_html_e( 'About', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>"><?php esc_html_e( 'Contact', 'everafter-studio' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<!-- Zone 3: Primary Action & Mobile Toggle -->
		<div class="header-action">
			<a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>" class="btn-luxury btn-primary">
				<?php esc_html_e( 'Book a Consultation', 'everafter-studio' ); ?>
			</a>
			<button class="mobile-nav-toggle" aria-controls="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'everafter-studio' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
					<line x1="3" y1="12" x2="21" y2="12"></line>
					<line x1="3" y1="6" x2="21" y2="6"></line>
					<line x1="3" y1="18" x2="21" y2="18"></line>
				</svg>
			</button>
		</div>
	</div>
</header>

<div id="content" class="site-content">
