<?php
/**
 * Everafter Studio Admin Theme Options & Settings Page
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Theme Options menu page in WordPress admin.
 */
function everafter_add_theme_admin_menu() {
	add_theme_page(
		__( 'Everafter Studio Settings', 'everafter-studio' ),
		__( 'Everafter Options', 'everafter-studio' ),
		'manage_options',
		'everafter-theme-options',
		'everafter_render_theme_options_page'
	);
}
add_action( 'admin_menu', 'everafter_add_theme_admin_menu' );

/**
 * Render Theme Options Page.
 */
function everafter_render_theme_options_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$inquiry_email = get_theme_mod( 'everafter_inquiry_recipient', get_option( 'admin_email' ) );
	$customize_url = admin_url( 'customize.php?autofocus[panel]=everafter_theme_options' );
	?>
	<div class="wrap everafter-admin-wrap" style="max-width: 1000px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
		<div style="background: #242321; color: #F7F4EF; padding: 30px; margin-top: 20px; border-left: 4px solid #B49A70;">
			<h1 style="color: #F7F4EF; font-size: 26px; margin: 0 0 10px 0; font-weight: 400; letter-spacing: 0.1em; text-transform: uppercase;">
				EVERAFTER STUDIO
			</h1>
			<p style="color: #D8C6AE; font-size: 15px; margin: 0; line-height: 1.6;">
				<?php esc_html_e( 'Luxury Wedding Photography & Cinematic Wedding Films Theme Console.', 'everafter-studio' ); ?>
			</p>
		</div>

		<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-top: 24px;">
			<!-- Main Column -->
			<div>
				<!-- Quick Actions Card -->
				<div style="background: #fff; padding: 25px; border: 1px solid #ccd0d4; box-shadow: 0 1px 3px rgba(0,0,0,0.04); margin-bottom: 24px;">
					<h2 style="font-size: 18px; margin-top: 0; padding-bottom: 12px; border-bottom: 1px solid #eee;">
						<?php esc_html_e( 'Theme Customization & Management', 'everafter-studio' ); ?>
					</h2>
					<p style="font-size: 14px; color: #555; line-height: 1.6;">
						<?php esc_html_e( 'All visual elements, colors, typography, hero texts, and contact coordinates can be edited live with immediate visual preview in the WordPress Customizer.', 'everafter-studio' ); ?>
					</p>
					<div style="margin-top: 20px; display: flex; gap: 12px; flex-wrap: wrap;">
						<a href="<?php echo esc_url( $customize_url ); ?>" class="button button-primary button-hero" style="background: #B49A70; border-color: #9f845d; text-shadow: none;">
							<?php esc_html_e( 'Launch Theme Customizer', 'everafter-studio' ); ?>
						</a>
						<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=wedding_story' ) ); ?>" class="button button-secondary button-hero">
							<?php esc_html_e( 'Manage Wedding Stories', 'everafter-studio' ); ?>
						</a>
						<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_item' ) ); ?>" class="button button-secondary button-hero">
							<?php esc_html_e( 'Manage Portfolio Items', 'everafter-studio' ); ?>
						</a>
					</div>
				</div>

				<!-- Email & SMTP Setup Guidance -->
				<div style="background: #fff; padding: 25px; border: 1px solid #ccd0d4; box-shadow: 0 1px 3px rgba(0,0,0,0.04); margin-bottom: 24px;">
					<h2 style="font-size: 18px; margin-top: 0; padding-bottom: 12px; border-bottom: 1px solid #eee;">
						<?php esc_html_e( 'Inquiry Form & SMTP Email Delivery', 'everafter-studio' ); ?>
					</h2>
					<p style="font-size: 14px; color: #333; line-height: 1.6;">
						<strong><?php esc_html_e( 'Active Notification Recipient:', 'everafter-studio' ); ?></strong>
						<code><?php echo esc_html( $inquiry_email ); ?></code>
					</p>
					<div style="background: #fdfaf4; border-left: 4px solid #B49A70; padding: 14px 18px; margin: 15px 0; font-size: 13px; line-height: 1.6; color: #444;">
						<strong><?php esc_html_e( 'Important Note on WordPress Email Delivery:', 'everafter-studio' ); ?></strong><br />
						<?php esc_html_e( 'The theme uses standard WordPress wp_mail() to dispatch high-priority couple inquiries. Default PHP mail on many web hosts can be delayed or filtered as spam. For reliable production delivery, we strongly recommend configuring an authenticated SMTP plugin (such as WP Mail SMTP or Post SMTP) connected to your Google Workspace, SendGrid, or Postmark account.', 'everafter-studio' ); ?>
					</div>
				</div>

				<!-- One Click Demo Content -->
				<div style="background: #fff; padding: 25px; border: 1px solid #ccd0d4; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
					<h2 style="font-size: 18px; margin-top: 0; padding-bottom: 12px; border-bottom: 1px solid #eee;">
						<?php esc_html_e( 'Sample Wedding Stories & Demo Content', 'everafter-studio' ); ?>
					</h2>
					<p style="font-size: 14px; color: #555; line-height: 1.6;">
						<?php esc_html_e( 'Install curated editorial sample wedding stories (Lake Como, Provence, Amalfi Coast) and portfolio categories to preview the theme with luxury content immediately upon activation.', 'everafter-studio' ); ?>
					</p>
					<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
						<?php wp_nonce_field( 'everafter_install_demo_action', 'everafter_demo_nonce' ); ?>
						<input type="hidden" name="action" value="everafter_install_demo" />
						<button type="submit" class="button button-secondary" onclick="return confirm('<?php esc_attr_e( 'Generate sample wedding stories and portfolio categories?', 'everafter-studio' ); ?>');">
							<?php esc_html_e( 'Populate Sample Content', 'everafter-studio' ); ?>
						</button>
					</form>
				</div>
			</div>

			<!-- Sidebar Diagnostics Column -->
			<div>
				<div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
					<h3 style="font-size: 15px; margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
						<?php esc_html_e( 'System Status & Specs', 'everafter-studio' ); ?>
					</h3>
					<table style="width: 100%; font-size: 13px; line-height: 2;">
						<tr>
							<td><strong><?php esc_html_e( 'Theme Version:', 'everafter-studio' ); ?></strong></td>
							<td style="text-align: right;">1.0.0</td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'PHP Version:', 'everafter-studio' ); ?></strong></td>
							<td style="text-align: right;"><?php echo esc_html( phpversion() ); ?></td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'WordPress:', 'everafter-studio' ); ?></strong></td>
							<td style="text-align: right;"><?php echo esc_html( get_bloginfo( 'version' ) ); ?></td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'Memory Limit:', 'everafter-studio' ); ?></strong></td>
							<td style="text-align: right;"><?php echo esc_html( ini_get( 'memory_limit' ) ); ?></td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'Upload Max:', 'everafter-studio' ); ?></strong></td>
							<td style="text-align: right;"><?php echo esc_html( ini_get( 'upload_max_filesize' ) ); ?></td>
						</tr>
					</table>
				</div>

				<div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 3px rgba(0,0,0,0.04); margin-top: 20px;">
					<h3 style="font-size: 15px; margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
						<?php esc_html_e( 'Theme Documentation', 'everafter-studio' ); ?>
					</h3>
					<p style="font-size: 13px; color: #666; line-height: 1.5;">
						<?php esc_html_e( 'Need assistance? Read the complete README.md bundled inside the theme folder or contact the Everafter Studio engineering desk.', 'everafter-studio' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php
}
