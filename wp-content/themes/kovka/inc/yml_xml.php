<?php

/****************************************************
 * XML yml art-kvartira
 *****************************************************/

add_action('admin_menu', 'xml_yml_menu');
function xml_yml_menu()
{
    add_options_page('yml XML', 'XML-yml', 'manage_options', 'xml_yml', 'xml_yml_page');
}

function xml_yml_page()
{

    echo '
	<div class="wrap">
	<h1>Генерация файла XML-YML запущена:</h1>';

    $yml_file_info = xml_yml_generation();

    echo $yml_file_info['filename'] . ' (<strong>' . $yml_file_info['url_count'] . '</strong> страниц)';

    echo '</div>';
}

function xml_yml_generation()
{

    $url_count = 0;

    $yml_file_name = 'art_yml.xml';
    $yml_txt_file_name = str_replace('.xml', '.txt', $yml_file_name);

    $today = wp_date("Y-m-d H:i:s");

    $yoastDescMain = get_post_meta(749, '_yoast_wpseo_metadesc', true);

    $yml = '<?xml version="1.0" encoding="UTF-8"?>';
    $yml .= '<yml_catalog date="' . $today . '">';
    $yml .= '<shop>';
    $yml .= '<name>АРТ-Квартира</name>';
    $yml .= '<company>' . $yoastDescMain . '</company>';
    $yml .= '<url>' . get_site_url() . '</url>';
    $yml .= '<currencies><currency id="RUR" rate="1"/></currencies>';

    $yml_txt = '';

    //id страниц 
    $page_all_id = [];
    //   $page_all_id_test = 0;

    $yml .= '<categories>';

    $menu_name = 'header';
    $locations = get_nav_menu_locations();

    if ($locations && isset($locations[$menu_name])) {

        // получаем элементы меню
        $menu_items = wp_get_nav_menu_items($locations[$menu_name]);
        $priceArr = [];
        $price_serv = [];


        foreach ($menu_items as $item) {

            $pageID = url_to_postid($item->url);


            $info_blocks = get_field("infoblocks_list", $pageID);


            if ($info_blocks) {
                foreach ($info_blocks as $info_block_data) {
                    $info_block_fields = 0;
                    if ($info_block_data['infoblock_add_type'] == "select") {
                        $info_block_obj_id = (int)$info_block_data['infoblock_item_object'];
                        $info_block_fields = get_fields($info_block_obj_id);
                    } else {
                        $info_block_fields = $info_block_data['infoblock_item'];
                    }

                    if (!is_null($info_block_fields['infoblock_serviceslist_v2'])) {
                        foreach ($info_block_fields['infoblock_serviceslist_v2'] as $value) {
                            if (preg_match("/(?<=[—_ ])?[0-9]+$/", $value['service_price'], $match)) {
                                $priceArr[] = reset($match);
                            };
                            
                        }
                    }
                    if (!is_null($info_block_fields['infoblock_price_list'])) {
                        if (preg_match("/(?<=[—_ ])?[0-9]+$/", $info_block_fields["infoblock_price_list"]["pricelist_col1"]["pricelist_col_total"]["pricelist_col_sum"], $match)) {
                            $priceArr[] = reset($match);
                        };
                        if (preg_match("/(?<=[—_ ])?[0-9]+$/", $info_block_fields["infoblock_price_list"]["pricelist_col2"]["pricelist_col_total"]["pricelist_col_sum"], $match)) {
                            $priceArr[] = reset($match);
                        };
                        if (preg_match("/(?<=[—_ ])?[0-9]+$/", $info_block_fields["infoblock_price_list"]["pricelist_col3"]["pricelist_col_total"]["pricelist_col_sum"], $match)) {
                            $priceArr[] = reset($match);
                        };
                    }
                }
            }
            $parentID;
            if ($item->title != 'Контакты' && $item->title != 'О нас' && $item->title != 'Цены' && $item->title != 'Для детей') {

                if ($item->menu_item_parent == 0 && $item->post_parent == 0) {
                    $yml .= '<category id="' . $item->object_id . '">' . $item->title . '</category>';
                    $parentID = $item->object_id;
                }
            }
            $priceArr = [];
        }
    }

    $yml .= '</categories>';

    $postsForyml = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'modified',
        'post_type'  => 'page',
        'order'    => 'DESC'
    ));

    
    $yml .= '<offers>';
    foreach ($postsForyml as $post) {

        
        $post_id = $post->ID;
        $post_parent = $post->post_parent;

        $block_list = get_field("infoblocks_list", $post_id);

        $page_title = '';

        if ($block_list) {
            foreach ($block_list as $info_block_info) {
                $info_block_fields = 0;
                if ($info_block_info['infoblock_add_type'] == "select") {
                    $info_block_obj_id = (int)$info_block_info['infoblock_item_object'];
                    $info_block_fields = get_fields($info_block_obj_id);
                } else {
                    $info_block_fields = $info_block_info['infoblock_item'];
                }
                if ($info_block_fields['infoblock_type'] == 'banner') {
                    $page_title = $info_block_fields['infoblock_title'];
                }
            }
        }
        if ($page_title == '') {
            $page_title = get_the_title($post_id);
        }
        
        if ($post_parent == 0) {
            $post_parent = $post_id;
        }else{
            $ancestors=get_post_ancestors($post->ID);
            $root=count($ancestors)-1;
            $post_parent = $ancestors[$root];
        }
        

        $price = [];

        if ($block_list) {
            foreach ($block_list as $info_block_data) {
                $info_block_fields = 0;
                if ($info_block_data['infoblock_add_type'] == "select") {
                    $info_block_obj_id = (int)$info_block_data['infoblock_item_object'];
                    $info_block_fields = get_fields($info_block_obj_id);
                } else {
                    $info_block_fields = $info_block_data['infoblock_item'];	
                }

                if($info_block_fields["infoblock_type"] == 'services_v2'){
                    if (!is_null($info_block_fields['infoblock_serviceslist_v2'])) {
                        foreach ($info_block_fields['infoblock_serviceslist_v2'] as $value) {
                            if (preg_match("/(?<=[—_ ])?[0-9]+$/", $value['service_price'], $match)) {
                                $price[] = reset($match);
                            };
                        }
                    }
                }
                
                if ($info_block_fields["infoblock_type"] == 'price_list') {
                  if (!is_null($info_block_fields['infoblock_price_list'])) {

                    foreach ($info_block_fields['infoblock_price_list'] as $col) {
                        if ($col["pricelist_col_type"] == "price") { 

                            if (preg_match("/(?<=[—_ ])?[0-9]+$/", $col['pricelist_col_total']['pricelist_col_sum'], $match)) {
                                $price[] = reset($match);
                                
                            };
                        }
                    }
                    }
                }

                if ($price) {
                    break;
                }
            }
                    // var_dump(''.get_the_title($post_id).' id - '.$post_id.'');
    
                    // echo '<hr>';
                    // var_dump($price);
                    // echo '<hr>';
        }


        $postdate_parts = explode(" ", $post->post_modified);
        $postdate = $postdate_parts[0];

        $post_cat_id = get_field('cat', $post_id)->ID;
        $cat_title = get_field('cat', $post_id)->post_title;
        
        $cat_thumb = get_the_post_thumbnail_url($post_id, 'medium');
        $post_url = get_permalink($post_id);

        $yoast = YoastSEO()->meta->for_post($post_id);
        $yoastImage = '';

        $main_img = get_field('params_group', $post_id)['main_img'];
        $gallery = get_field('params_group', $post_id)['gallery'];

        $specifications = get_field('specifications', $post_id);

        if ($main_img != '') {
            $yoastImage = $main_img;
        } else {
            $yoastImage = $cat_thumb;
        }
        // var_dump(''.get_the_title($post_id).' id - '.$post_id.'');
        // echo '<hr>';
        // var_dump($price);
        // echo '<hr>';
        // echo '<hr>';
        // --
        if (!empty($price) && get_the_title($post_id) != 'test' && get_the_title($post_id) != 'czeny' && get_the_title($post_id) != 'Цены') {
            $url_count++;
            $yml .= '<offer id="' . $url_count . '" available="true">';
            $yml .= '<name>'.$page_title.'</name>';
            $yml .= '<description>' . $yoast->description . '</description>';
            $yml .= '<url>' . $post_url . '</url>';
            $yml .= '<price>' . round(min($price), 2) . '</price>';
            $yml .= '<currencyId>RUR</currencyId>';
            $yml .= '<categoryId>' . $post_parent . '</categoryId>';
            $yml .= '<picture>' . $yoastImage . '</picture>';
            $yml .= '</offer>';
            // --
        }
        $price = [];
    }

    $yml .= '</offers>';

    $yml .= '</shop>';
    $yml .= '</yml_catalog>';

    $fp = fopen(ABSPATH . $yml_file_name, 'w');
    fwrite($fp, $yml);
    fclose($fp);

    // $yml_txt = convertEOL($yml_txt);
    $yml_txt = iconv("UTF-8", "windows-1251", $yml_txt);
    // $yml_txt = convertEOL($yml_txt);

    $fp = fopen(ABSPATH . $yml_txt_file_name, 'w');
    fwrite($fp, $yml_txt);
    fclose($fp);

    return array('filename' => $yml_file_name, 'url_count' => $url_count);
}
