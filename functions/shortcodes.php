<?php
function site_identity_func( $atts = array(), $content = null ) {
	global $seafood_options;
	$logo_url = ($seafood_options['logo']['url']) ? $seafood_options['logo']['url'] : get_template_directory_uri(). '/images/logo.png';
	$logo_option = $seafood_options['logo-option'];
	$html = '';
	$atts = shortcode_atts( array(
		'class' => '',
		'container_class' => ''
	), $atts, 'site-identity' ); 
	
	
	$html .= '<div class="logo-wrapper '.$atts['container_class'].'">';
		if($logo_option == 'logo') :
			$html .= '<a class="logo '.$atts['class'].'" href="'.home_url().'">';
			list($width, $height) = getimagesize($logo_url);
			$html .= '<img class="img-responsive img-fluid" src="'.$logo_url.'" alt="'.get_bloginfo('name').' - Logo" width="'.$width.'" height="'.$height.'">';
			$html .= '</a>';
		else :
			$html .= '<div class="text-center '.$atts['class'].'">';
				$html .= '<h1 class="site-title"><a href="'.home_url().'">'.get_bloginfo('name').'</a></h1>';
				$html .= '<p class="site-description">'.get_bloginfo( 'description' ).'</p>';
			$html .= '</div>'; 
		endif;
	$html .= '</div>'; 
		
	return $html;
}
add_shortcode( 'site-identity', 'site_identity_func' );

function site_name_func( $atts = array(), $content = '' ) {
	$html = '';
	$atts = shortcode_atts( array(
		'link' => 0,
	), $atts, 'site-name' );
	if ($atts['link']) $html .=	'<a href="'.esc_url( home_url( '/' ) ).'">';
	$html .= get_bloginfo('name');
	if ($atts['link']) $html .=	'</a>';
	return $html;
}
add_shortcode( 'site-name', 'site_name_func' );
function copyright_symbol_func() {
	return '&copy;';
}
add_shortcode( 'copyright-symbol', 'copyright_symbol_func' );
function this_year_func() {
	return date('Y');
}
add_shortcode( 'this-year', 'this_year_func' );
function email_func( $atts = array(), $content = '' ) {	
	global $seafood_options;
	$contact_email = $seafood_options['contact-email'];
	$html = '';	
	$atts = shortcode_atts( array(
		'offset' => 0,
		'index' => 0,
		'all' => 1,
		'seperator' => ', ',
	), $atts, 'email' );
	$n = 1;

	$html .= '<span class="email-wrap">';
	if ($atts['index']) :
		$i = $atts['index'] - 1;
		$html .= '<span class="email">';
			$html .= '<a class="mailToShow" href="mailto:'.$contact_email[$i].'">'.$contact_email[$i].'</a>';
		$html .= '</span>';	
	else :
		foreach ($contact_email as $email) :
			if ($atts['offset'] AND $n > $atts['offset']) :
				$html .= '<span class="email">';
					$html .= '<a class="mailToShow" href="mailto:'.$email.'">'.$email.'</a>';
				$html .= '</span>';
				$html .= $atts['seperator'];
			endif;
			$n++;
		endforeach;
	endif;
	$output = rtrim(  $html, $atts['seperator']);
	$output .= '</span>';
	return $output;
}
add_shortcode( 'email', 'email_func' );

function phone_func( $atts = array(), $content = '' ) {
    global $seafood_options;
    $html = '';
	$atts = shortcode_atts( array(
		'offset' => 0,
		'index' => 0,
		'all' => 1,
		'seperator' => ', '
	), $atts, 'phone' );
	$n = 1; 
	$html .= '<span class="phone-number-wrap">';
	if ($atts['index']) :
		$i = $atts['index'] - 1;
	    $html .= '<span class="phone-number">';
	    $html .= '<a class="phoneToShow" href="tel:';
	    $html .= preg_replace('/[^0-9]/', '', $seafood_options['contact-phone'][$i]);
	    $html .= '" >';
	    $html .= $seafood_options['contact-phone'][$i];  
	    $html .= '</a>';
	    $html .= '</span>';		
	else :
		foreach ($seafood_options['contact-phone'] as $phone) :
			if ($n > $atts['offset']) :
			    $html .= '<span class="phone-number">';
			    $html .= '<a class="phoneToShow" href="tel:';
			    $html .= preg_replace('/[^0-9]/', '', $phone);
			    $html .= '" >';
			    $html .= $phone;  
			    $html .= '</a>';
			    $html .= '</span>';
			    $html .= $atts['seperator'];
			endif;
			$n++;
		endforeach;
	endif;
	$output = rtrim(  $html, $atts['seperator']);
	$output .= '</span>';
	return $output;
}
add_shortcode( 'phone', 'phone_func' );

function fax_func( $atts = array(), $content = '' ) {
    global $seafood_options;
    $html = '';
	$atts = shortcode_atts( array(
		'offset' => 0,
		'index' => 0,
		'all' => 1,
		'seperator' => ', '
	), $atts, 'fax' );
	$n = 1; 
	$html .= '<span class="fax-number-wrap">';
	if ($atts['index']) :
		$i = $atts['index'] - 1;
	    $html .= '<span class="fax-number">';
	    $html .= '<a class="faxToShow" href="tel:';
	    $html .= preg_replace('/[^0-9]/', '', $seafood_options['contact-fax'][$i]);
	    $html .= '" >';
	    $html .= $seafood_options['contact-fax'][$i];  
	    $html .= '</a>';
	    $html .= '</span>';		
	else :
		foreach ($seafood_options['contact-fax'] as $fax) :
			if ($n > $atts['offset']) :
			    $html .= '<span class="fax-number">';
			    $html .= '<a class="faxToShow" href="tel:';
			    $html .= preg_replace('/[^0-9]/', '', $fax);
			    $html .= '" >';
			    $html .= $fax;  
			    $html .= '</a>';
			    $html .= '</span>';
			    $html .= $atts['seperator'];
			endif;
			$n++;
		endforeach;
	endif;
	$output = rtrim(  $html, $atts['seperator']);
	$output .= '</span>';
	return $output;
}
add_shortcode( 'fax', 'fax_func' );
function address_func( $atts = array(), $content = '' ) {
	global $seafood_options;
	$contact_address = $seafood_options['contact-address'];
	$html = '';
	$atts = shortcode_atts( array(
		'offset' => 0,
		'map' => 0,
		'address' => 1
	), $atts, 'address' );
	$n = 1;
	$html .= '<span class="address-wrap">'; 
	foreach ($contact_address as $address) :
	$html .= '<span class="address">';
		if ($n > $atts['offset']) :
			if ($address[map_link]) $html .= '<a target="_blank" href="'.$address[map_link].'">';
			if ($atts['map']) :		
				$html .= '<span class="img-part">';
					$html .= '<img class="img-fluid img-map" src="'.$address[image].'" alt="">';
				$html .= '</span>';
			endif;
			if ($atts['address']) :	
				$html .= '<span class="text-part">';
					$html .= $address['description'];
				$html .= '</span>';
			endif;
			if ($address[map_link]) $html .= '</a>';	

		endif;
		$n++;		
	$html .= '</span>';
	endforeach;
	$html .= '</span>';
	return $html;
}
add_shortcode( 'address', 'address_func' );
function social_menu_fnc( $atts = array(), $content = '' ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
		$alt_tag = mos_alt_generator(get_the_ID());
	} 
	global $seafood_options;
	$html = '';
	$contact_social = $seafood_options['contact-social'];
	$contact_address = $seafood_options['contact-address'];
	$atts = shortcode_atts( array(
		'display' => 'inline',
		'title' => 0,
	), $atts, 'social_menu' );
	if ($atts['display'] == 'inline') $display = 'list-inline';
	else  $display = 'list-unstyled';
	$html .= '<ul class="'.$display.' social-menu">';
	foreach ($contact_social as $social) :	
		if ($social['link_url'] AND $social['basic_icon']) :
			$str = '';
			$basic_icon = do_shortcode(mos_home_url_replace($social['basic_icon']));

			if (filter_var($basic_icon, FILTER_VALIDATE_URL)) {
				//$basic_icon = do_shortcode();
				list($width, $height) = getimagesize($basic_icon);
				$str = '<span class="social-img"><img src="'.$basic_icon.'" alt="'.$alt_tag['social'] . $social['title'].'" width="'.$width.'" height="'.$height.'"></span>';
				if ($social['hover_icon']) {
					//$hover_icon = do_shortcode(str_replace('{{home_url}}', home_url(), $social['hover_icon']));
					$hover_icon = do_shortcode(mos_home_url_replace($social['hover_icon']));
					list($hwidth, $hheight) = getimagesize($hover_icon);
					$str .= '<span class="social-img-hover"><img src="'.$hover_icon.'" alt="'.$alt_tag['social'] . $social['title'].'" width="'.$hwidth.'" height="'.$hheight.'"></span>'; //hover_icon
				}
			}
			else { 
				$str = '<span class="social-icon"><i class="'.$social['basic_icon'].'"></i></span>';
				if ($social['hover_icon'])
					$str .= '<span class="social-icon-hover"><i class="'.$social['hover_icon'].'"></i></span>';
			}
			$html .= '<li class="social-list '.strtolower(preg_replace('/\s+/', '_', $social['title']));
			if ($atts['display'] == 'inline') $html .= ' list-inline-item';
			$html .= '"><a href="'.esc_url( $social['link_url'] ).'"';
			if ($social['target'])
				$html .= ' target="_blank"';
			$html .= '>' . $str;
			if ($atts['title']) $html .= '<span class="social-title">' . $social['title'] .'</span>';
			$html .= '</a></li>';
		endif;	
	endforeach;

	$html .= '</ul>';
	return $html;
}
add_shortcode( 'social_menu', 'social_menu_fnc' );
function theme_credit_func( $atts = array(), $content = '' ) {
	$html = "";
	$atts = shortcode_atts( array(
		'name' => 'Md. Mostak Shahid',
		'url' => 'http://mostak.belocal.oday',
	), $atts, 'theme-credit' );

	return $html = '<a href="'.$atts["url"].'" target="_blank" class="theme-credit">'.$atts["name"].'</a>';
}
add_shortcode( 'theme-credit', 'theme_credit_func' );
