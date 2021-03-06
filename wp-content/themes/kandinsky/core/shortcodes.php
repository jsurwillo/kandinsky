<?php
/**
 * Shortcodes
 **/

add_filter('widget_text', 'do_shortcode');

/** sitemap **/
add_shortcode('rdc_sitemap', 'rdc_sitemap_screen');
function rdc_sitemap_screen($atts){
	
	$out =  wp_nav_menu(array('theme_location' => 'sitemap', 'container' => false, 'menu_class' => 'sitemap', 'echo'=> false));
	
	return $out;
}


/** Youtube video caption **/
add_shortcode('yt_caption', 'rdc_yt_caption_screen');
function rdc_yt_caption_screen($atts, $content = null){	
	
	return '<div class="yt-caption">'.apply_filters('rdc_the_content', $content).'</div>';
}


/** Buttons **/
add_shortcode('rdc_btn', 'rdc_btn_screen');
function rdc_btn_screen($atts){
	
	extract(shortcode_atts(array(				
		'url'  => '',
		'txt'  => ''
	), $atts));
	
	if(empty($url))
		return '';
	
	$url = esc_url($url);
	$txt = apply_filters('rdc_the_title', $txt);
	
	ob_start();
?>
<span class="rdc-btn"><a href="<?php echo $url;?>" class="rdc-button"><?php echo $txt;?></a></span>
<?php
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}



/** Toggle **/
if(!shortcode_exists( 'su_spoiler' ))
	add_shortcode('su_spoiler', 'rdc_su_spoiler_screen');

function rdc_su_spoiler_screen($atts, $content = null){
	
	extract(shortcode_atts(array(
        'title' => 'Подробнее',
        'open'  => 'no',
		'class' => ''
    ), $atts));
	
	if(empty($content))
		return '';
	
	$title = apply_filters('rdc_the_title', $title);
	$class = (!empty($class)) ? ' '.esc_attr($class) : '';
	if($open == 'yes')
		$class .= ' toggled';
	
	ob_start();
?>
<div class="su-spoiler<?php echo $class;?>">
	<div class="su-spoiler-title"><span class="su-spoiler-icon"></span><?php echo $title;?></div>
	<div class="su-spoiler-content"><?php echo apply_filters('rdc_the_content', $content);?></div>
</div>
<?php
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}

/** Quote **/
add_shortcode('rdc_quote', 'rdc_quote_screen');
function rdc_quote_screen($atts, $content = null) {
	
	extract(shortcode_atts(array(
        'name' => '',        
		'class' => ''
    ), $atts));
	
	if(empty($content))
		return '';
	
	$name = apply_filters('rdc_the_title', $name);
	$class = (!empty($class)) ? ' '.esc_attr($class) : '';
	ob_start();
?>
<div class="rdc-quote <?php echo $class;?>">	
	<div class="rdc-quote-content"><?php echo apply_filters('rdc_the_content', $content);?></div>
	<?php if(!empty($name)) { ?>
		<div class="rdc-quote-cite"><?php echo $name;?></div>
	<?php } ?>
</div>
<?php
	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}
