<?php

$domain_aliases = wp_cache_get('domain_aliases', 'template_cache_group');
if (!$domain_aliases) {
	$domain_aliases = array();
	$domain_aliases_option = get_field('domains', 'option');
	if (!empty($domain_aliases_option)) {
		foreach ($domain_aliases_option as $domain_alias => $domain_alias_data) {
			$domain_alias_ = $domain_alias_data['domain_alias'];
			$domain_descr_ = $domain_alias_data['domain_descr'];
			$domain_https_ = $domain_alias_data['domain_https'];
			$domain_aliases[$domain_alias_] = array('https' => $domain_https_, 'descr' => $domain_descr_, 'options' => array());
		}
	}
	wp_cache_set('domain_aliases', $domain_aliases, 'template_cache_group');
}

function currentDomain()
{
	global $domain_aliases;

	$current_host = $_SERVER['HTTP_HOST'];
	$current_host = str_replace('www.', '', $current_host);

	if (isset($domain_aliases[$current_host])) {
		return $current_host;
	}
}

define('DEFAULT_URL', get_field('default_url', 'option'));
define('CURRENT_DOMAIN', currentDomain());

function correctDomainUrl($set_domain = '')
{
	global $domain_aliases;

	$domain_for_url = CURRENT_DOMAIN;
	if ($set_domain != "") $domain_for_url = $set_domain;

	if (isset($domain_aliases[$domain_for_url])) {
		return (($domain_aliases[$domain_for_url]['https']) ? 'https' : 'http') . '://' . $domain_for_url;
	} else {
		return 'http://pkaspekt.loc';
	}
}
function descrDomain()
{
	global $domain_aliases;

	if (isset($domain_aliases[CURRENT_DOMAIN])) {
		return $domain_aliases[CURRENT_DOMAIN]['descr'];
	} else {
		return '';
	}
}

function wpse_attach_img_url($url, $post_id)
{
	//Skip file attachments
	if (!wp_attachment_is_image($post_id)) {
		return $url;
	}
	$url =  str_replace('http://pkaspekt.loc', correctDomainUrl(), $url);
	$url =  str_replace('https://pkaspekt.loc', correctDomainUrl(), $url);
	return $url;
}
add_filter('wp_get_attachment_url', 'wpse_attach_img_url', 10, 2);

function wpse_attach_image_srcset($sources, $size_array, $image_src, $image_meta, $attachment_id)
{
	$arr_new = [];
	foreach ($sources as $key => $val) {
		$arr_new[$key] = [];
		foreach ($val as $k => $v) {
			if ('url' == $k) {
				$v =  str_replace('http://pkaspekt.loc', correctDomainUrl(), $v);
				$v =  str_replace('https://pkaspekt.loc', correctDomainUrl(), $v);
			}
			$arr_new[$key][$k] = $v;
		}
	}
	$sources = [];
	$sources = array_merge($sources, $arr_new);
	return $sources;
}
add_filter('wp_calculate_image_srcset', 'wpse_attach_image_srcset', 10, 5);

function wpse_theme_root_uri($theme_root_uri, $siteurl, $stylesheet_or_template)
{

	$theme_root_uri =  str_replace('http://pkaspekt.loc', correctDomainUrl(), $theme_root_uri);
	$theme_root_uri =  str_replace('https://pkaspekt.loc', correctDomainUrl(), $theme_root_uri);
	return $theme_root_uri;
}
add_filter('theme_root_uri', 'wpse_theme_root_uri', 10, 3);

function wpse_plugins_url($url, $path, $plugin)
{

	$url =  str_replace('http://pkaspekt.loc', correctDomainUrl(), $url);
	$url =  str_replace('https://pkaspekt.loc', correctDomainUrl(), $url);
	return $url;
}
add_filter('plugins_url', 'wpse_plugins_url', 10, 3);


function wpse_pre_option_siteurl_and_home($pre_option, $option)
{
	return correctDomainUrl();
}
add_filter('pre_option_siteurl', 'wpse_pre_option_siteurl_and_home', 10, 2);
add_filter('pre_option_home',    'wpse_pre_option_siteurl_and_home', 10, 2);

$custom_shortcodes = wp_cache_get('custom_shortcodes', 'template_cache_group');
if (!$custom_shortcodes) {
	$custom_shortcodes = array();
	$custom_shortcodes_option = get_field('shortcodes_list', 'option');

	if (!empty($custom_shortcodes_option)) {
		foreach ($custom_shortcodes_option as $custom_shortcode => $custom_shortcode_data) {
			$custom_shortcode_code = trim($custom_shortcode_data['shortcode_code']);
			if ($custom_shortcode_code == '') continue;

			$shortcode_value = get_field('shortcode_' . CURRENT_DOMAIN . '_' . $custom_shortcode_code, 'option');
			$custom_shortcodes[$custom_shortcode_code] = $shortcode_value;
		}
	}
	wp_cache_set('custom_shortcodes', $custom_shortcodes, 'template_cache_group');
}


function customShortcodesParse($buffer)
{
	global $custom_shortcodes;

	if (wp_doing_ajax() || is_admin()) return $buffer;

	$buffer = do_shortcode($buffer);
	$buffer = simpleBBparse($buffer);

	$search = array();
	$replace = array();
	foreach ($custom_shortcodes as $custom_shortcode_code => $custom_shortcode_value) {
		$search[] = '%' . $custom_shortcode_code . '%';
		$replace[] = $custom_shortcode_value;
	}

	if (!empty($search) && !empty($replace)) $buffer = str_replace($search, $replace, $buffer);

	return $buffer;
}

function domainOption($key = '', $set_main = true, $set_domain = '')
{
	$domain_for_option = CURRENT_DOMAIN;
	if ($set_domain != "") $domain_for_option = $set_domain;

	$domain_option = get_field('option_' . $domain_for_option . '_' . $key, 'option');
	$domain_option = trim($domain_option);
	if ($domain_option == "" && $set_main) {
		$domain_option = get_field('option_spectexdv.loc_' . $key, 'option');
		$domain_option = trim($domain_option);
	}
	return $domain_option;
}
