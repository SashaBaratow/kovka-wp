<?php

require_once get_template_directory().'/inc/sitemap_xml.php';

add_filter('robots_txt', 'theme_robots_txt', 10,  2);

function theme_robots_txt($output, $public) {
	$robots_lines = array();
	//строки файла
	
	/*
	$robots_lines[] = 'User-agent: *';
	$robots_lines[] = 'Disallow: /wp-admin/';
	$robots_lines[] = 'Allow: /wp-admin/admin-ajax.php';
	$robots_lines[] = '';
	*/
	
	$robots_content = domainOption('robots_txt');
	$robots_content_lines = explode(PHP_EOL, $robots_content);
	foreach($robots_content_lines as $robots_content_line) {
		$robots_lines[] = trim($robots_content_line);
	}
	
	$robots_lines[] = 'Disallow: *?abc=*';
	$robots_lines[] = '';
	
	//SITEMAP XML
	$sitemap_xml_name = domainOption('sitemap_xml', false);
	if($sitemap_xml_name!="") {
		$sitemap_xml_url = correctDomainUrl().'/sitemap/'.$sitemap_xml_name;
		$robots_lines[] = 'Sitemap: '.$sitemap_xml_url;
	}	
	//
	
	$robots_output = implode(PHP_EOL, $robots_lines);
	
	return $robots_output;

}

function filter_wpseo_title($title) {
    $title = customShortcodesParse($title);
    return $title;
}
function filter_wpseo_description($description) {
    $description = customShortcodesParse($description);
    return $description;
}

add_filter('wpseo_metadesc', 'filter_wpseo_description', 100, 1);
add_filter('wpseo_title', 'filter_wpseo_title', 100);
?>