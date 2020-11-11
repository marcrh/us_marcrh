<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package us_marcrh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<div class="nav-wrapper container">
				<div class="left" style="display: flex">
    				<button class="menu-toggle btn" aria-controls="primary-menu" aria-expanded="false"><i class="material-icons">dehaze</i></button>
        			<?php the_custom_logo(); ?>   			    			
        			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    			</div>
    			<?php
    			wp_nav_menu(
    				array(
    					'theme_location' => 'menu-1',
    					'menu_id'        => 'primary-menu',
    				    'menu_class'     => 'right',
    				    'container'      => 'ul',
    				)
    			);
    			?>
    		
			</div><!-- .site-branding -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
