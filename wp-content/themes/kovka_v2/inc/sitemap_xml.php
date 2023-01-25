<?php
/****************************************************
* XML Sitemap spectexdv.ru
*****************************************************/

add_action('admin_menu', 'xml_sitemap_menu');
function xml_sitemap_menu() {
	add_options_page('SITEMAP XML', 'XML-Sitemap', 'manage_options', 'xml_sitemap', 'xml_sitemap_page');
}

function xml_sitemap_page(){
	global $domain_aliases;
	
	echo '
	<div class="wrap">
	<h1>Генерация файлов XML-Sitemap для доменов запущена:</h1>';
	
	foreach($domain_aliases as $domain_alias => $domain_alias_data) {
		
		$sitemap_file_info = xml_sitemap_generation($domain_alias);
		
		echo 'Генерация для домена <strong>'.$domain_alias.'</strong>/'.$sitemap_file_info['filename'].' (<strong>'.$sitemap_file_info['url_count'].'</strong> страниц)';
		echo '<br />';
		
	}

	echo '</div>';	
	
	
}

function xml_sitemap_generation($set_domain = '') {
  global $auto_vendors;
	
  $url_count = 0;

  if($set_domain=="") return;
  $domain_for_sitemap = correctDomainUrl($set_domain);
  $sitemap_file_name = domainOption('sitemap_xml', false, $set_domain);
  if($sitemap_file_name=="") return;
  
  //$sitemap_file_name = "sitemap/".$sitemap_file_name.".xml";
  $sitemap_file_name = "sitemap/".$sitemap_file_name;

  $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
  $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
  
  if(domainOption('blog_category', false, $set_domain)>0) {
	  
	  $postsForSitemap = get_posts(array(
		'numberposts' => -1,
		'orderby' => 'modified',
		'post_status'  => 'publish',
		'post_type'  => 'post',
		'order'    => 'DESC'
	  ));

	  foreach($postsForSitemap as $post) {
		
		$post_id = $post->ID;
		
		$postdate_parts = explode(" ", $post->post_modified);
		$postdate = $postdate_parts[0];
		
		$post_url = get_permalink($post_id);
		$post_url =  str_replace( 'http://spectexdv.ru', $domain_for_sitemap, $post_url );
		$post_url =  str_replace( 'https://spectexdv.ru', $domain_for_sitemap, $post_url );
		
		$url_count++;
		
		$sitemap .= '<url>'.
		  '<loc>'. $post_url .'</loc>'.
		  '<lastmod>'. $postdate .'</lastmod>'.
		  '<changefreq>monthly</changefreq>'.
		  '<priority>1.0</priority>'.
		'</url>';

	  }	
	  
  }
  
  $pagesForSitemap = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'modified',
    'post_status' => 'publish',
    'post_type' => array('page', 'brand'),
    'order' => 'DESC'
  ));
  
  foreach($pagesForSitemap as $page) {
    //setup_postdata($page);
	
	$page_id = $page->ID;
	$page_parent_id = $page->post_parent;
	$page_template = get_page_template_slug( $page_id );
	
	$page_noindex = get_post_meta( $page_id, '_yoast_wpseo_meta-robots-noindex', true );
	$page_nofollow = get_post_meta( $page_id, '_yoast_wpseo_meta-robots-nofollow', true );
	
	if($page_noindex || $page_nofollow) continue;
	
    $pagedate_parts = explode(" ", $page->post_modified);
    $pagedate = $pagedate_parts[0];
	
	$page_url = get_permalink($page_id);
	$page_url =  str_replace( 'http://spectexdv.ru', $domain_for_sitemap, $page_url );
	$page_url =  str_replace( 'https://spectexdv.ru', $domain_for_sitemap, $page_url );
	
	$url_count++;
	
    $sitemap .= '<url>'.
      '<loc>'. $page_url .'</loc>'.
      '<lastmod>'. $pagedate .'</lastmod>'.
      '<changefreq>monthly</changefreq>'.
      '<priority>1.0</priority>'.
    '</url>';
	
  }

  $sitemap .= '</urlset>';

  $fp = fopen(ABSPATH . $sitemap_file_name, 'w');
  fwrite($fp, $sitemap);
  fclose($fp);

  return array('filename' => $sitemap_file_name, 'url_count' => $url_count);
}

//add_action("publish_post", "xml_sitemap_generation");
//add_action("publish_page", "xml_sitemap_generation");
?>
