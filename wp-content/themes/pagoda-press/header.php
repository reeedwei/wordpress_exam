<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pagoda-press
 */

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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pagoda-press' ); ?></a>

	
	<?php $sticky_menu = get_theme_mod( 'pagoda_press_sticky_menu_option', pagoda_press_get_default_sticky_menu() ); ?>
	<header id="masthead" class="site-header<?php echo $sticky_menu ? esc_attr( ' sticky-header' ) : ''; ?>">


	
	<!-- top-bar -->
	<div class="top-bar">
		<div class="container">
			<div class="top-wrapper">
				<div class="top-search"><?php get_search_form();?></div>
				<?php get_template_part( 'template-parts/social', 'links' ); ?>
			</div>
		</div>
	</div>
	<!-- top-bar -->



	
		<div class="header-wrapper">
		<div class="container">
			<div class="site-header-wrapper">
				<div class="site-branding">
					
					<?php the_custom_logo(); ?>
						
						<div class="site-identity">

							<?php if( get_theme_mod( 'show_hide_site_title', pagoda_press_get_default_site_title_show_hide() ) ) { ?>
								<div class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a>
								</div>
							<?php } ?>


							<?php $pagoda_press_description = get_bloginfo( 'description' ); ?>
							<?php if( get_theme_mod( 'show_hide_site_tagline', pagoda_press_get_default_site_tagline_show_hide() ) ) { ?>
								<div class="site-description"><?php echo $pagoda_press_description; ?></div>
							<?php } ?>
						</div>
					
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button id="nav-icon3" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						
  <span></span>
  <span></span>
  <span></span>
  <span></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		</div>
	</header><!-- #masthead -->

	<?php
		if( get_theme_mod( 'pagoda_press_breadcrumbs_option', pagoda_press_get_default_breadcrumbs() ) ) {
			if( function_exists( 'pagoda_press_get_breadcrumbs' ) ) {
				pagoda_press_get_breadcrumbs();
			}
		}
