<?php
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    remove_action('template_redirect', 'wp_shortlink_header', 11);
});

function theme_dequeue_script()
{
    wp_enqueue_script('jquery');
    wp_dequeue_script('jquery-ui-core');
    wp_deregister_script('jquery-ui-core');
}

add_action('wp_print_scripts', 'theme_dequeue_script', 100);

function theme_add_scripts_and_styles()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('theme-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.3.min.js', [], null);
    wp_enqueue_script('boot_kovka', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', [], null, true);
    wp_enqueue_script('boot_kovka_min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], null, true);
    wp_enqueue_script('mean_kovka_min', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', [], null, true);
    wp_enqueue_script('slick_kovka_min', get_template_directory_uri() . '/assets/js/slick.min.js', [], null, true);
    wp_enqueue_script('swiper_kovka_min', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('fancy_kovka_min', get_template_directory_uri() . '/assets/fancy/jquery.fancybox.min.js', [], null, true);
//    wp_enqueue_script('jq-mask', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', [], null, true);
//    wp_enqueue_script('jq-mask-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js', [], null, true);
    wp_enqueue_script('main_kovka', get_template_directory_uri() . '/assets/js/main.js', [], null, true);

    wp_enqueue_style('slick_kovka', get_template_directory_uri() . '/assets/css/slick.css', [], null);
    wp_enqueue_style('slick_theme_kovka', get_template_directory_uri() . '/assets/css/slick-theme.css', [], null);
    wp_enqueue_style('icofont', get_template_directory_uri() . '/assets/css/icofont.min.css', [], null);
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', [], null);
    wp_enqueue_style('swiper_band', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], null);
    wp_enqueue_style('swiper_band_2', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], null);
    wp_enqueue_style('fancy_band', get_template_directory_uri() . '/assets/fancy/jquery.fancybox.min.css', [], null);
    wp_enqueue_style('dwnl_kovka', get_template_directory_uri() . '/assets/css/download.css', [], null);
    wp_enqueue_style('style_kovka', get_template_directory_uri() . '/assets/css/style.css', [], null);
    wp_enqueue_style( 'main-style_cns', get_stylesheet_uri());


}

add_action('wp_enqueue_scripts', 'theme_add_scripts_and_styles');

register_nav_menu('header', 'Меню в "шапке"');
register_nav_menu('footer-service', 'Меню сервис в "подвале"');
register_nav_menu('footer', 'Меню в "подвале"');
register_nav_menu('privacy', 'Меню политики конфиденциальности');

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    // var_dump($item);
    if ($item->current_item_ancestor) {
        $atts['class'] .= ' active';
    }
    if ($item->current_item_parent && !$item->current_item_ancestor) {
        $atts['class'] .= ' active';
    }
    if ($item->current) {
        $atts['class'] .= ' active';
    }

    return $atts;
}

add_theme_support('custom-logo', [
    'height' => 150,
    'width' => 50,
    'flex-width' => true,
    'flex-height' => true,
    'header-text' => '',
    'unlink-homepage-logo' => false, // WP 5.5
]);

add_theme_support('custom-logo', [
    'height' => 150,
    'width' => 250,
    'flex-width' => true,
    'flex-height' => true,
    'header-text' => '',
]);
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_image_size('gallery_thumb', 150, 110, true);
add_image_size('gallery_medium', 760, 480, true);
add_image_size('gallery_large', 1170, 700, true);

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/acf.php';
require_once get_template_directory() . '/inc/yml_xml.php';
// require_once get_template_directory() . '/inc/shortcodes.php';
// require_once get_template_directory() . '/inc/subdomains.php';
// require_once get_template_directory() . '/inc/seo.php';

function theme_infoblock_posttype_register()
{
    $labels = array(
        'name' => 'Инфо-блоки',
        'singular_name' => 'Инфо-блок',
        'add_new' => 'Добавить новый',
        'add_new_item' => 'Добавить новый',
        'edit_item' => 'Редактировать',
        'new_item' => 'Новый',
        'view_item' => 'Показать',
        'search_items' => 'Поиск',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'query_var' => false,
        'has_archive' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'show_in_nav_menus' => false,
        'publicaly_queryable' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title')
    );
    register_post_type('infoblock', $args);
}

function theme_review_posttype_register()
{
    $review_post_labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзыв',
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавление отзыва',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'view_item' => 'Показать отзыв',
        'search_items' => 'Поиск',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon' => ''
    );
    $review_post_args = array(

        'labels' => $review_post_labels,
        'supports' => array('title'/*, 'editor', 'thumbnail'*/),
        'hierarchical' => false,

        'show_in_nav_menus' => false,

        'public' => false,
        'publicly_queryable' => false,
        'show_in_nav_menus' => false,
        'rewrite' => false,

        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 7,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'capability_type' => 'post',
        'taxonomies' => ['review_taxonomy'],

    );

    // Registering your Custom Post Type
    register_post_type('review', $review_post_args);
}



//post types for CNS
function theme_services_posttype_register()
{
    $services_post_labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга',
        'add_new' => 'Добавить услугу',
        'add_new_item' => 'Добавление услуги',
        'edit_item' => 'Редактировать услуги',
        'new_item' => 'Новая услуга',
        'view_item' => 'Показать услугу',
        'search_items' => 'Поиск',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon' => '',
        'dashicons-admin-post' => 'dashicons-layout'
    );
    $services_post_args = array(

        'labels' => $services_post_labels,
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'

        'hierarchical' => false,

        'publicly_queryable' => true,
        'show_in_nav_menus' => false,

        'public' => true,
        'publicly_queryable' => true,
        'show_in_nav_menus' => false,
        'rewrite' => true,

        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-list-view',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'post',
    );
    // Registering your Custom Post Type
    register_post_type('services', $services_post_args);
}

function theme_cases_posttype_register()
{
    $services_post_labels = array(
        'name' => 'Кейсы',
        'singular_name' => 'Кейс',
        'add_new' => 'Добавить кейсы',
        'add_new_item' => 'Добавление кейса',
        'edit_item' => 'Редактировать кейса',
        'new_item' => 'Новый кейс',
        'view_item' => 'Показать кейс',
        'search_items' => 'Поиск',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon' => '',
        'dashicons-admin-post' => 'dashicons-layout'
    );
    $services_post_args = array(
        'labels' => $services_post_labels,
        'public' => true,
        'supports' => ['title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'hierarchical' => false,
        'publicly_queryable' => true,
        'show_in_nav_menus' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_in_nav_menus' => false,
        'rewrite' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-images-alt',
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'taxonomies' => ['text'],
        'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type('cases', $services_post_args);
}
register_taxonomy('text', array('cases'), array(
        'hierarchical' => true,
        'label' => 'Выбрать тип кейса',
        'singular_label' => 'case_taxonomy',
    )
);
register_taxonomy('review_tax', array('review'), array(
        'hierarchical' => true,
        'label' => 'Рубрика Отзыва',
        'singular_label' => 'review_taxonomy',
    )
);
theme_services_posttype_register();
theme_cases_posttype_register();
theme_infoblock_posttype_register();
theme_review_posttype_register();

function wpb_sender_email($original_email_address)
{
    return 'no-reply@' . $_SERVER['HTTP_HOST'];
}

// Function to change sender name
function wpb_sender_name($original_email_from)
{
    return $_SERVER['HTTP_HOST'];
    return '';
}

add_filter('wp_mail_from', 'wpb_sender_email');
add_filter('wp_mail_from_name', 'wpb_sender_name');

function word_trim($string, $count, $ellipsis = FALSE)
{
    $words = explode(' ', $string);
    if (count($words) > $count) {
        array_splice($words, $count);
        $string = implode(' ', $words);

        if (is_string($ellipsis)) {
            $string .= $ellipsis;
        } elseif ($ellipsis) {
            $string .= '&hellip;';
        }
    }
    return $string;
}

/* СВОЙ ЛОГОТИП НА СТРАНИЦЕ АВТОРИЗАЦИИ */
function custom_login_logo()
{
    echo '<style type="text/css">
    body {background-color: #fff!important;}
    #login {
      padding: 2% 0 0!important;
      margin: auto;
    }
        h1 a { background-image:url(' . get_template_directory_uri() . '/assets/img/Logo.png) !important;width:150px!important;height:110px!important;background-position:center center!important;background-size:100%!important;background-repeat:no-repeat;outline:0 none!important }
    </style>';
}

function custom_loginpage_link()
{
    return 'http://' . $_SERVER['HTTP_HOST'];
}

add_action('login_head', 'custom_login_logo');
add_filter('login_headerurl', 'custom_loginpage_link');


//Кастомные иконки доп-разделов
add_action('admin_head', 'custom_admin_css');
function custom_admin_css()
{
    echo '
  <style>
  /* ИНФОБЛОКИ */
    #adminmenu #menu-posts-infoblock div.wp-menu-image:before { content: "\f164";vertical-align:middle!important; }
  /* ОТЗЫВЫ */
    #adminmenu #menu-posts-review div.wp-menu-image:before { content: "\f122";vertical-align:middle!important; }
  /* УСЛУГИ */
    #adminmenu #menu-posts-service div.wp-menu-image:before { content: "\f323";vertical-align:middle!important; }
  </style>';
}


function the_content_limit($max_char, $more_link_text = '...', $stripteaser = 0, $more_file = '')
{

    $post = get_page(get_the_ID());
    $content = apply_filters('the_content', $post->post_content);

    //$content = get_the_content($more_link_text, $stripteaser, $more_file);
    //$content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

    if (strlen($_GET['p']) > 0) {
    } else if ((strlen($content) > $max_char) && ($espacio = strpos($content, " ", $max_char))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
    }

    return $content;
}


add_action('admin_init', 'hide_editor');
function hide_editor()
{
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    if (!isset($post_id)) return;
    // Hide the editor on a page with a specific page template
    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'page-landing.php') { // the filename of the page template
        remove_post_type_support('page', 'editor');
    }
}


/* КАТЕГОРИИ КАТАЛОГА */
function theme_get_cats($tax = '')
{
    if ($tax == '') return array();

    $cats_args = array(
        'taxonomy' => array($tax), // название таксономии с WP 4.5
        'hide_empty' => false,
        'parent' => 0,
        //'orderby'       => 'id',
        //'order'         => 'ASC',
    );

    $cats = get_terms($cats_args);
    $cats_ready = array();
    foreach ($cats as $cat_obj) {
        $cat = array(
            'id' => $cat_obj->term_id,
            'slug' => $cat_obj->slug,
            'name' => $cat_obj->name,
            'description' => $cat_obj->description,
            'url' => get_term_link($cat_obj->term_id),
            'image' => '',
            'count' => $cat_obj->count,
        );
        $category_image = get_field('product_category_image', $tax . '_' . $cat_obj->term_id);
        if (!empty($category_image)) {
            //print_r($term_image);
            //$term_image_url = $term_image['sizes']['product-thumb'];
            $category_image_url = $category_image['sizes']['medium_large'];
            $cat['image'] = $category_image_url;
        }
        $cats_ready[$cat_obj->term_id] = $cat;
    }

    return $cats_ready;
}

/* ПАРСИНГ ССЫЛОК YOUTUBE */

function parseYouTube($youtube_url = '')
{
    if (trim($youtube_url) == "") return '';

    $pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
    $pattern .= '(?:www\.)?';         #  Optional www subdomain.
    $pattern .= '(?:';                #  Group host alternatives:
    $pattern .= 'youtu\.be/';         #    Either youtu.be,
    $pattern .= '|youtube\.com';      #    or youtube.com
    $pattern .= '(?:';                #    Group path alternatives:
    $pattern .= '/embed/';            #      Either /embed/,
    $pattern .= '|/v/';               #      or /v/,
    $pattern .= '|/watch\?v=';        #      or /watch?v=,
    $pattern .= '|/watch\?.+&v=';     #      or /watch?other_param&v=
    $pattern .= ')';                 #    End path alternatives.
    $pattern .= ')';                  #  End host alternatives.
    $pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
    $pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.

    preg_match($pattern, $youtube_url, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
}

/**/

/* ХЛЕБНЫЕ КРОШКИ */
function theme_breadcrumbs()
{
    // Set variables for later use
    $home_url = home_url('/');
    $home_text = 'Главная';
    $delimiter = ' <span class="breadcrumb-divider">/</span> ';              // Delimiter between crumbs
    $before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-current"><span itemprop="name">'; // Tag before the current crumb
    $after = '</span><meta itemprop="position" content="%last%" /></span>';                // Tag after the current crumb
    $page_addon = ''; // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links = '';
    $position = 2;  //1 - это главная

    $link_tpl = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link_tpl .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link_tpl .= '<meta itemprop="position" content="%3$s" />';
    $link_tpl .= '</span>';


    //Ищем страницу, обозначенную как "продажа недвижимости"
    $catalog_page = array();
    $catalog_page_search = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-catalog.php'
        )
    );
    if (!empty($catalog_page_search)) {
        $catalog_page['name'] = $catalog_page_search[0]->post_title;
        $catalog_page['url'] = get_page_link($catalog_page_search[0]->ID);
    }
    /**/

    //Ищем страницу, обозначенную как "альбом"
    $albums_page = array();
    $albums_page_search = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-albums.php'
        )
    );
    if (!empty($albums_page_search)) {
        $albums_page['name'] = $albums_page_search[0]->post_title;
        $albums_page['url'] = get_page_link($albums_page_search[0]->ID);
    }
    /**/

    //Ищем страницу, обозначенную как "Статьи"
    $pubs_page = array();
    $pubs_page_search = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-pubs.php'
        )
    );
    if (!empty($pubs_page_search)) {
        $pubs_page['name'] = $pubs_page_search[0]->post_title;
        $pubs_page['url'] = get_page_link($pubs_page_search[0]->ID);
    }
    /**/

    //Ищем страницу, обозначенную как "Преподаватели"
    $team_page = array();
    $team_page_search = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-team.php'
        )
    );
    if (!empty($team_page_search)) {
        $team_page['name'] = $team_page_search[0]->post_title;
        $team_page['url'] = get_page_link($team_page_search[0]->ID);
    }
    /**/

    /**
     * Set our own $wp_the_query variable. Do not use the global variable version due to
     * reliability
     */
    $wp_the_query = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if (is_singular()) {
        /**
         * Set our own $post variable. Do not use the global variable version due to
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post($queried_object);

        // Set variables
        $title = apply_filters('the_title', $post_object->post_title);
        $parent = $post_object->post_parent;
        $post_type = $post_object->post_type;
        $post_id = $post_object->ID;

        $parent_string = '';
        $post_type_link = '';


        if ('albums' === $post_type) {
            if (!empty($albums_page)) {
                $albums_page_link = sprintf($link_tpl, $albums_page['url'], $albums_page['name'], $position);
                $position += 1;
            }
            $category_links = $albums_page_link . $delimiter;
        }

        if ('team' === $post_type) {
            if (!empty($team_page)) {
                $team_page_link = sprintf($link_tpl, $team_page['url'], $team_page['name'], $position);
                $position += 1;
            }
            $category_links = $team_page_link . $delimiter;
        }

        if ('post' === $post_type) {
            if (!empty($pubs_page)) {
                $pubs_page_link = sprintf($link_tpl, $pubs_page['url'], $pubs_page['name'], $position);
                $position += 1;
            }
            $post_tax = 'category';
            // Get the post categories
            $categories = get_the_terms($post_id, $post_tax);
            if ($categories) {
                // Lets grab the first category
                $category = $categories[0];

                //Получаем категорию
                foreach ($categories as $category_item) {
                    if ($category_item->parent != 0) {
                        $category = $category_item;
                        break;
                    }
                }

                $parents = get_ancestors($category->term_id, $post_tax);
                $parents = array_reverse($parents);
                $parents[] = $category->term_id;

                $category_links = '';
                foreach ($parents as $cat) {
                    if ($cat == 1) continue; //без рубрики

                    $category_links .= sprintf($link_tpl, get_term_link($cat, $post_tax), get_term($cat, $post_tax)->name, $position);
                    $category_links .= $delimiter;
                    $position += 1;
                }

                // $category_links = $pubs_page_link . $delimiter . $category_links;
                $category_links = $pubs_page_link . $delimiter;
            }
        }


        if (!in_array($post_type, array('team', 'albums', 'post', 'page', 'attachment'))) {
            $post_type_object = get_post_type_object($post_type);
            $post_type_link = sprintf($link_tpl, esc_url(get_post_type_archive_link($post_type)), $post_type_object->labels->singular_name, $position);
            $position += 1;
        }

        // Get post parents if $parent !== 0
        if (0 !== $parent) {
            $parent_links = array();
            while ($parent) {
                $post_parent = get_post($parent);
                $parent_links[] = sprintf($link_tpl, esc_url(get_permalink($post_parent->ID)), get_the_title($post_parent->ID), $position);
                $parent = $post_parent->post_parent;
                $position += 1;
            }

            $parent_links = array_reverse($parent_links);
            $parent_string = implode($delimiter, $parent_links);
        }

        // Lets build the breadcrumb trail


        $post_link = $before . $title . $after;
        $post_link_ = sprintf($link_tpl, esc_url(get_permalink($post_object->ID)), get_the_title($post_object->ID), $position);
        if (is_paged()) $post_link = $post_link_;  //если активна пагинация, делаем ссылкой

        if ($parent_string) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ($post_type_link)
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ($category_links)
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if (is_archive()) {
        if (is_category() || is_tag() || is_tax()) {
            // Set the variables for this section
            $term_object = get_term($queried_object);
            $taxonomy = $term_object->taxonomy;
            $term_id = $term_object->term_id;
            $term_name = $term_object->name;
            $term_parent = $term_object->parent;
            $taxonomy_object = get_taxonomy($taxonomy);

            $parent_term_string = '';

            if (0 !== $term_parent) {
                // Get all the current term ancestors
                $parent_term_links = array();
                while ($term_parent) {
                    $term = get_term($term_parent, $taxonomy);
                    $parent_term_links[] = sprintf($link_tpl, esc_url(get_term_link($term)), $term->name, $position);
                    $term_parent = $term->parent;
                    $position += 1;
                }
                $parent_term_links = array_reverse($parent_term_links);
                $parent_term_string = implode($delimiter, $parent_term_links);
            }

            $current_term_link = $before . $term_name . $after;
            $current_term_link_ = sprintf($link_tpl, esc_url(get_term_link($term_object)), $term_name, $position);
            if (is_paged()) $current_term_link = $current_term_link_;  //если активна пагинация, делаем ссылкой

            if ($parent_term_string) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }
            /* ЕСЛИ ТАКСОНОМИЯ ОТНОСИТСЯ К КАТЕГОРИИ ПУБЛИКАЦИЙ */
            if (($taxonomy == "category") && (!empty($pubs_page))) {
                $pubs_page_link = sprintf($link_tpl, $pubs_page['url'], $pubs_page['name'], $position);
                $position += 1;
                // $breadcrumb_trail = $pubs_page_link . $delimiter . $breadcrumb_trail;
                $breadcrumb_trail = $breadcrumb_trail;
            }
            /**/
        } elseif (is_author()) {

            $breadcrumb_trail = __('Author archive for ') . $before . $queried_object->data->display_name . $after;
        } elseif (is_date()) {
            // Set default variables
            $year = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ($monthnum) {
                $date_time = DateTime::createFromFormat('!m', $monthnum);
                $month_name = $date_time->format('F');
            }

            if (is_year()) {

                $breadcrumb_trail = $before . $year . $after;
            } elseif (is_month()) {

                $year_link = sprintf($link_tpl, esc_url(get_year_link($year)), $year);

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;
            } elseif (is_day()) {

                $year_link = sprintf($link_tpl, esc_url(get_year_link($year)), $year);
                $month_link = sprintf($link_tpl, esc_url(get_month_link($year, $monthnum)), $month_name);

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }
        } elseif (is_post_type_archive()) {

            $post_type = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object($post_type);

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;
        }
    }

    // Handle the search page
    if (is_search()) {
        $breadcrumb_trail = $before . 'Поиск: ' . get_search_query() . $after;
    }

    // Handle 404's
    if (is_404()) {
        $breadcrumb_trail = $before . __('Error 404') . $after;
    }

    // Handle paged pages
    if (is_paged()) {

        if ($breadcrumb_trail == '') {

            $pubs_page_link = sprintf($link_tpl, $pubs_page['url'], $pubs_page['name'], $position);
            $position += 1;
            $breadcrumb_trail = $pubs_page_link;
        }

        $current_page = get_query_var('paged') ? get_query_var('paged') : get_query_var('page');
        $page_addon = $delimiter . $before . sprintf(__(' Страница %s '), number_format_i18n($current_page)) . $after;
    } else {
        $page_addon = '';
    }

    $breadcrumb_output_link = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

    $breadcrumb_output_link .= sprintf($link_tpl, $home_url, $home_text, 1);
    $breadcrumb_output_link .= $delimiter;
    $breadcrumb_output_link .= $breadcrumb_trail;
    $breadcrumb_output_link .= $page_addon;

    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

    $breadcrumb_output_link = str_replace('%last%', $position, $breadcrumb_output_link);

    return $breadcrumb_output_link;
}

/* ПОСТРАНИЧНАЯ НАВИГАЦИЯ */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes()
{
    return ' class="page-link" ';
}

function theme_posts_nav()
{
    if (is_single()) return;

    global $wp_query;


    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav><ul class="pagination justify-content-center">' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li class="page-item" >%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left"></i>'));

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="page-item active"' : ' class="page-item" ';

        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li class="page-item">…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="page-item active"' : ' class="page-item" ';
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li class="page-item"><span class="page-items-more">…</span></li>' . "\n";

        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item" ';
        printf('<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li class="page-item">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right"></i>'));

    echo '</ul></nav>' . "\n";
}

/* ПРЕФИКС URL ДЛЯ СТАТЕЙ = stati */
function add_rewrite_rules($wp_rewrite)
{
    $new_rules = array(
        'stati/page/(.+?)/?$' => 'index.php?pagename=stati&paged=' . $wp_rewrite->preg_index(1),
        'stati/(.+?)/?$' => 'index.php?post_type=post&name=' . $wp_rewrite->preg_index(1),
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action('generate_rewrite_rules', 'add_rewrite_rules');

function change_blog_links($post_link, $id = 0)
{
    $post = get_post($id);
    if (is_object($post) && $post->post_type == 'post') {
        return home_url('/stati/' . $post->post_name . '/');
    }
    return $post_link;
}

add_filter('post_link', 'change_blog_links', 1, 3);
/* КОЛ-ВО ПУБЛИКАЦИЙ НА СТРАНИЦУ */
function wpsites_query($query)
{
    if (($query->is_archive() || $query->is_category()) && $query->is_main_query() && !is_admin()) {
        $query->set('posts_per_page', 12);
    }
}

add_action('pre_get_posts', 'wpsites_query');

function true_russian_date_forms($the_date = '')
{
    if (substr_count($the_date, '---') > 0) {
        return str_replace('---', '', $the_date);
    }
    $replacements = array(
        "Январь" => "января",
        "Февраль" => "февраля",
        "Март" => "марта",
        "Апрель" => "апреля",
        "Май" => "мая",
        "Июнь" => "июня",
        "Июль" => "июля",
        "Август" => "августа",
        "Сентябрь" => "сентября",
        "Октябрь" => "октября",
        "Ноябрь" => "ноября",
        "Декабрь" => "декабря"
    );
    return strtr($the_date, $replacements);
}

add_filter('the_time', 'true_russian_date_forms');
add_filter('get_the_time', 'true_russian_date_forms');
add_filter('the_date', 'true_russian_date_forms');
add_filter('get_the_date', 'true_russian_date_forms');
add_filter('the_modified_time', 'true_russian_date_forms');
add_filter('get_the_modified_date', 'true_russian_date_forms');
add_filter('get_post_time', 'true_russian_date_forms');
add_filter('get_comment_date', 'true_russian_date_forms');


/* МОДИФИКАЦИЯ СФОРМИРОВАННОГО ВЫВОДА */
// function callback($buffer)
// {
//   $buffer = customShortcodesParse($buffer);
//   //$buffer = do_shortcode($buffer);
//   return $buffer;
// }

// function buffer_start()
// {
//   ob_start("callback");
// }
// function buffer_end()
// {
//   ob_end_flush();
// }

// add_action('init', 'buffer_start');
// add_action('wp_footer', 'buffer_end');
/**/

add_action('pre_get_posts', 'action_function_name_11');
function action_function_name_11($query)
{
    $queried_object = $query->get_queried_object();
    $content = (is_object($queried_object)) ? $queried_object->post_content : "";
    $pages = explode('<!--nextpage-->', $content);
    $numpages = count($pages);

    if ($query->is_main_query() && ($query->is_page || $query->is_single) && $query->get('page') && ($numpages == 1)) {
        $query->set_404();
        status_header(404);
        nocache_headers();
    }
}

function get_abc_brands()
{
    global $wpdb;

    $unic_brands = $wpdb->get_results("SELECT DISTINCT post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'brand' ORDER BY post_title ASC");

    if (empty($unic_brands)) return [];

    $abc_ru = [];
    $abc_en = [];

    foreach ($unic_brands as $brand) {
        $first = mb_strtolower(mb_substr($brand->post_title, 0, 1, 'UTF-8'));

        if (preg_match('/[а-я]/u', $first)) {
            $abc_ru[] = $first;
        } elseif (preg_match('/[a-z]/u', $first)) {
            $abc_en[] = $first;
        }
    }

    return [
        'ru' => array_unique($abc_ru),
        'en' => array_unique($abc_en),
    ];
}

function get_brands($get = null)
{
    global $wpdb;
    $query = null;
    $result = null;
    if ($get) {
        $like = $wpdb->esc_like($get) . '%';
        $query = $wpdb->prepare(
            "SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'brand' AND (post_title LIKE %s)",
            $like
        );
    } else {
        $query = "SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'brand'";
    }

    $total_query = "SELECT COUNT(1) FROM (${query}) AS count";
    $count = $wpdb->get_var($total_query);
    $params = pagination_params($count);

    if ($params['perpage'] == -1) {
        $result = $wpdb->get_results("{$query} ORDER BY post_title REGEXP '^[А-Яа-я]' DESC, post_title REGEXP '^[A-Za-z]' DESC, post_title ASC");
    } else {
        $result = $wpdb->get_results("{$query} ORDER BY post_title ASC LIMIT {$params['start_pos']}, {$params['perpage']}");
    }


    return [
        'brands' => $result,
        'params' => $params
    ];
}

function pagination_params($count = null)
{
    $perpage = -1;

    if (!$count) return null;

    $total = ceil($count / $perpage);

    if (!$total) $total = 1;

    if (get_query_var('paged')) {
        $page = (int)get_query_var('paged');
        if ($page < 1) $page = 1;
    } else {
        $page = 1;
    }

    if ($page > $total) $page = $total;

    $start_pos = ($page - 1) * $perpage;

    $params = [
        'page' => $page,
        'count' => $count,
        'total' => $total,
        'perpage' => $perpage,
        'start_pos' => $start_pos,
        'type' => 'array'
    ];

    return $params;
}

function pagination($params)
{
    if ($params['perpage'] == -1) return;

    $html = '<ul>';
    $big = 999999999;

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => $params['total'],
        'current' => $params['page'],
        'type' => 'array',
    ));

    foreach ($paginate_links as $link) {
        if ($link) {
            $link = str_replace(['page-numbers', 'current'], ['nav-item', 'active'], $link);
        }

        $html .= '<li>' . $link . '</li>';
    }
    $html .= '</ul>';

    return $html;
}

//
require_once get_template_directory() . '/inc/mail.php';
/*
 * Adds menu data support for HC Off-canvas Nav
 */


add_filter('body_class', 'my_class_names');
function my_class_names($classes)
{

    // добавим класс 'class-name' в массив классов $classes
    if (is_page())
        $classes[] = 'theme-default';

    return $classes;
}


// function theme_team_posttype_register() {
//   $team_post_labels = array(
//     'name' => 'Наша команда',
//     'singular_name' => 'Сотрудник',
//     'add_new' => 'Добавить сотрудника',
//     'add_new_item' => 'Добавление сотрудника',
//     'edit_item' => 'Редактировать сотрудника',
//     'new_item' => 'Новый сотрудник',
//     'view_item' => 'Показать сотрудника',
//     'search_items' => 'Поиск',
//     'not_found' =>  'Не найдено',
//     'not_found_in_trash' => 'Не найдено в корзине',
//     'parent_item_colon' => '',
//     'dashicons-admin-post' => 'dashicons-groups'
//   );  
//   $team_post_args = array(

//     'labels'              => $team_post_labels,
//     'supports'            => array( 'title', 'editor', 'thumbnail' ),
//     'hierarchical'        => false,

//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_in_nav_menus'   => false,

//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_in_nav_menus'   => false,
//     'rewrite' => true,

//     'show_ui'             => true,
//     'show_in_menu'        => true,
//     'show_in_admin_bar'   => true,
//     'menu_position'       => 7,
//     'menu_icon'       => 'dashicons-groups',
//     'can_export'          => true,
//     'has_archive'         => false,
//     'exclude_from_search' => false,
//     'capability_type'     => 'post',

//   );

//   // Registering your Custom Post Type
//   register_post_type( 'team', $team_post_args );
// }

// function theme_gallery_posttype_register() {
//   $team_post_labels = array(
//     'name' => 'Галерея',
//     'singular_name' => 'Галерея',
//     'add_new' => 'Добавить галерею',
//     'add_new_item' => 'Добавить галерею',
//     'edit_item' => 'Редактировать галерею',
//     'new_item' => 'Новая галерею',
//     'view_item' => 'Показать галерею',
//     'search_items' => 'Поиск',
//     'not_found' =>  'Не найдено',
//     'not_found_in_trash' => 'Не найдено в корзине',
//     'parent_item_colon' => '',
//     'dashicons-admin-post' => 'dashicons-groups'
//   );  
//   $team_post_args = array(

//     'labels'              => $team_post_labels,
//     'supports'            => array( 'title', 'thumbnail' ),
//     'hierarchical'        => false,

//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_in_nav_menus'   => false,

//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_in_nav_menus'   => false,
//     'rewrite' => true,

//     'show_ui'             => true,
//     'show_in_menu'        => true,
//     'show_in_admin_bar'   => true,
//     'menu_position'       => 7,
//     'menu_icon'       => 'dashicons-format-gallery',
//     'can_export'          => true,
//     'has_archive'         => false,
//     'exclude_from_search' => false,
//     'capability_type'     => 'post',

//   );

//   // Registering your Custom Post Type
//   register_post_type( 'gallery', $team_post_args );
// }


// theme_team_posttype_register();
// theme_gallery_posttype_register();

function gram_record($num = 0, $vars = array())
{

    $strlen_num = strlen($num);

    if ($num <= 21) {
        $numres = $num;
    } elseif ($strlen_num == 2) {
        $parsnum = substr($num, 1, 2);
        $numres = str_replace('0', '10', $parsnum);
    } elseif ($strlen_num == 3) {
        $parsnum = substr($num, 2, 3);
        $numres = str_replace('0', '10', $parsnum);
    } elseif ($strlen_num == 4) {
        $parsnum = substr($num, 3, 4);
        $numres = str_replace('0', '10', $parsnum);
    } elseif ($strlen_num == 5) {
        $parsnum = substr($num, 4, 5);
        $numres = str_replace('0', '10', $parsnum);
    }

    if ($numres == 1) {
        $gram_num_record = $vars[0];
    } elseif ($numres < 5) {
        $gram_num_record = $vars[1];
    } elseif ($numres < 21) {
        $gram_num_record = $vars[2];
    } elseif ($numres == 21) {
        $gram_num_record = $vars[0];
    }

    return $gram_num_record;

}

function custom_footer_nav()
{
    $menu_name = 'footer';
    $locations = get_nav_menu_locations();
    $menu_list = '';

    if ($locations && isset($locations[$menu_name])) {

        // получаем элементы меню
        $menu_items = wp_get_nav_menu_items($locations[$menu_name]);

        // создаем список
        $menu_list = '<div class="footer__nav-col">';
        foreach ((array)$menu_items as $key => $menu_item) {
            if ($menu_item->menu_item_parent == '0') {
                $temp_id = $menu_item->ID;
                if ($key != 0) {
                    $menu_list .= '</ul>';
                    $menu_list .= '</div>';
                    $menu_list .= '<div class="footer__nav-col">';
                }
                $menu_list .= '<ul class="footer__nav">';
                $menu_list .= '<li><h3>' . $menu_item->title . '</h3></li>';
            }

            if ($menu_item->menu_item_parent == $temp_id) {
                $menu_list .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }
        }
        $menu_list .= '</ul>';
        $menu_list .= '</div>';
    }

    return $menu_list;
}

class SchemaORGRegistry
{
    /**
     * @var array Reader[]
     */
   // private static array $schema = [];
    // private static array $schemaAssoc = [];

    public static function set($key, $val)
    {
        if (!isset(self::$schema[$key])) {
            self::$schema[$key] = $val;
        } else {
            throw new \Exception('Element with key = ' . $key . " already defined\n");
        }
    }

    public static function setAssoc($assoc, $key, $val)
    {
        if (!isset(self::$schemaAssoc[$assoc][$key])) {
            self::$schemaAssoc[$assoc][$key] = $val;
        } else {
            throw new \Exception('Element with key = ' . $key . " already defined\n");
        }
    }

    public static function get($key)
    {
        return self::$schema[$key];
    }

    public static function getAssoc($assoc)
    {
        return self::$schemaAssoc[$assoc];
    }

    public static function getAll(): array
    {
        return self::$schema;
    }

}

;

// доп настройка плагина AMP
add_action('request', 'reset_permalinks');
function reset_permalinks($query_vars)
{

    $keys = parse_url($_SERVER['REQUEST_URI']); // parse the url
    $path = explode("/", $keys['path']); // splitting the path
    $last = end($path); // get the value of the last element

    if (strpos($_SERVER['REQUEST_URI'], "/amp/") !== false || $last == "amp") {
        $query_vars['amp'] = 1;
        $url_arr = explode("/", $query_vars['name']);
        $url_clear = implode("/", array_diff($url_arr, ["amp"]));
        $query_vars['name'] = $url_clear;
    }
    return $query_vars;
}

// variations

function variation_radio_buttons($html, $args) {
    $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
        'options'          => false,
        'attribute'        => false,
        'product'          => false,
        'selected'         => false,
        'name'             => '',
        'id'               => '',
        'class'            => '',
        'show_option_none' => __('Choose an option', 'woocommerce'),
    ));

    if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
        $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
        $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']);
    }

    $options               = $args['options'];
    $product               = $args['product'];
    $attribute             = $args['attribute'];
    $name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
    $id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
    $class                 = $args['class'];
    $show_option_none      = (bool)$args['show_option_none'];
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

    if(empty($options) && !empty($product) && !empty($attribute)) {
        $attributes = $product->get_variation_attributes();
        $options    = $attributes[$attribute];
    }

    $radios = '<div class="variation-radios">';

    if(!empty($options)) {
        if($product && taxonomy_exists($attribute)) {
            $terms = wc_get_product_terms($product->get_id(), $attribute, array(
                'fields' => 'all',
            ));

            foreach($terms as $term) {
                if(in_array($term->slug, $options, true)) {
                    $id = $name.'-'.$term->slug;
                    $radios .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($term->slug).'" '.checked(sanitize_title($args['selected']), $term->slug, false).'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $term->name)).'</label>';
                }
            }
        } else {
            foreach($options as $option) {
                $id = $name.'-'.$option;
                $checked    = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'], sanitize_title($option), false) : checked($args['selected'], $option, false);
                $radios    .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($option).'" id="'.sanitize_title($option).'" '.$checked.'><label for="'.esc_attr($id).'">'.esc_html(apply_filters('woocommerce_variation_option_name', $option)).'</label>';
            }
        }
    }

    $radios .= '</div>';

    return $html.$radios;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'variation_radio_buttons', 20, 2);

function variation_check($active, $variation) {
    if(!$variation->is_in_stock() && !$variation->backorders_allowed()) {
        return false;
    }
    return $active;
}
add_filter('woocommerce_variation_is_active', 'variation_check', 10, 2);

// variations end