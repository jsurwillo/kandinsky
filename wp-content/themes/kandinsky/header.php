<?php
/**
 * The header for our theme.
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<?php include_once(get_template_directory()."/assets/svg/svg.svg"); //all svgs ?>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'knd' ); ?></a>

<header id="site_header" class="site-header">
	
	<div class="site-header-panel">
		<div class="container-wide">
			
		<div class="site-panel-row">
			<div class="site-branding site-panel-cell">				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
					<div class="logo-temp" >
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/logo-temp.svg">
                    </div>					
					<div class="logo-name-cell">						
						<h1 class="logo-name"><?php bloginfo('name'); ?></h1>						
						<h2 class="logo-name"><?php bloginfo('description'); ?></h2>
					</div>
				</a>					
			</div>
			
			<?php $header_text = get_option('text_in_header'); ?>
			<div class="site-details site-panel-cell">
				<div class="site-details-cell"><?php echo apply_filters('rdc_the_content', $header_text); ?></div>
			</div>									
			
			<div class="trigger-button donate site-panel-cell">
				<a id="trigger_donate"  href="#help-us"><?php rdc_svg_icon('icon-logo');?><?php _e( 'Donate', 'knd' ); ?></a>
			</div>
			
			<div class="trigger-button menu site-panel-cell">
				<a id="trigger_menu" href="<?php echo home_url('sitemap');?>">
					<?php rdc_svg_icon('icon-menu');?>					
				</a>				
			</div>
			
		</div>	
		</div>
	</div>
	
	<!--<div id="newsletter_panel" class="newsletter-panel">
		<div class="newsletter-form"><?php echo rdc_get_newsletter_form(); ?></div>
	</div>-->
	<div class="nav-overlay"></div>
	<nav id="site_nav" class="site-nav">
		<div class="site-nav-title">
			<div class="snt-cell">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">
					<h1 class="logo-name"><?php bloginfo('name'); ?></h1>
					<h2 class="logo-name"><?php bloginfo('description'); ?></h2>
				</a>
			</div>
			<div id="trigger_menu_close" class="trigger-button close"><?php rdc_svg_icon('icon-close');?></div>
		</div>
		<?php
			$after = '<span class="submenu-trigger">'.rdc_svg_icon('icon-up', false).rdc_svg_icon('icon-down', false).'</span>';
			wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'main-menu', 'after' => $after));
		?>
		<div class="search-holder"><?php get_search_form();?></div>
		<?php #wp_nav_menu(array('theme_location' => 'social', 'container' => false, 'menu_class' => 'social-menu')); ?>
	</nav>		
</header>

<div id="site_content" class="site-content"><a name="#content"></a>