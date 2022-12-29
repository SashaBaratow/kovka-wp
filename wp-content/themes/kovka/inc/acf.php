<?php
	
	add_filter('acf/settings/path', 'my_acf_settings_path');
	function my_acf_settings_path( $path ) { $path = get_stylesheet_directory() . '/acf/'; return $path; }
	add_filter('acf/settings/dir', 'my_acf_settings_dir');
	function my_acf_settings_dir( $dir ) { $dir = get_stylesheet_directory_uri() . '/acf/'; return $dir; }
	//ACF SHOW ADMIN UI
	//add_filter('acf/settings/show_admin', '__return_false');
	add_filter('acf/settings/show_admin', '__return_true');
	include_once( get_stylesheet_directory() . '/acf/acf.php' );
	/**/
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> '',
			'menu_title'	=> 'Доп. настройки',
			'menu_slug' 	=> 'theme-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	
		// acf_add_options_page(array(
		// 	'page_title' 	=> 'Список доменов',
		// 	'menu_title'	=> 'Домены',
		// 	'menu_slug' 	=> 'domains-settings',
		// 	'capability'	=> 'edit_posts',
		// 	'redirect'		=> false
		// ));
		
		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Шорткоды доменов',
		// 	'menu_title'	=> 'Шорткоды',
		// 	'parent_slug'	=> 'domains-settings',
		// ));
		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Значения шорткодов',
		// 	'menu_title'	=> 'Значения шорткодов',
		// 	'parent_slug'	=> 'domains-settings',
		// ));
		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Настройки доменов',
		// 	'menu_title'	=> 'Настройки доменов',
		// 	'parent_slug'	=> 'domains-settings',
		// ));
	
	}	
	
	
	add_filter('acf/settings/save_json', function() {
	  return get_stylesheet_directory() . '/acf-json';
	});

	add_filter('acf/settings/load_json', function($paths) {
	  $paths = array(get_template_directory() . '/acf-json');

	  if(is_child_theme()){
		$paths[] = get_stylesheet_directory() . '/acf-json';
	  }

	  return $paths;
	});
/**/
/* ACF HOOKS */

				

if( function_exists('acf_add_local_field_group') ) {

		acf_add_local_field_group(array(
			'key' => 'shortcodes',
			'title' => 'Список шорткодов',
			'type' => 'text',
			'fields' => array (),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-shortkody',
					),
				),
			),
		));

      /** 
         * Initial Repeater Field
         *
         */
        acf_add_local_field( array (
            'key'               => 'shortcodes_list_group',
            'label'             => 'Список шорткодов',
            'name'              => 'shortcodes_list',
            'type'              => 'repeater',
            'parent'            => 'shortcodes',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array (
                'width'             => '',
                'class'             => '',
                'id'                => '',
            ),
            'collapsed'         => '',
            'min'               => '',
            'max'               => '',
            'layout'            => 'table',
            'button_label'      => 'Добавить ШОРТКОД'
        ));

        acf_add_local_field( array (
            'key'            => 'shortcode_name',
            'label'          => 'Название',
            'name'           => 'shortcode_name',
            'parent'         => 'shortcodes_list_group', // key of parent repeater
            'type'           => 'text',
            'instructions'   => '',
            'required'       => 1,
        ));
        acf_add_local_field( array (
            'key'            => 'shortcode_code',
            'label'          => 'Код',
            'name'           => 'shortcode_code',
            'parent'         => 'shortcodes_list_group', // key of parent repeater
            'type'           => 'text',
            'instructions'   => '',
            'required'       => 1,
        ));
		
		
		$tmp_shortcodes = acf_get_shortcodes_list();	//Получаем список шорткодов
		$tmp_domains = acf_get_domains_list();	//Получаем список доменов
		
		
		/* ШОРТКОДЫ ДЛЯ ДОМЕНОВ (BEGIN) */
		
		acf_add_local_field_group(array(
			'key' => 'shortcodes_domains',
			'title' => 'Значения шорткодов для доменов',
			'type' => 'text',
			"label_placement" => "left",
			'fields' => array (),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-znacheniya-shortkodov',
					),
				),
			),
		));
		
		foreach($tmp_domains as $tmp_domain => $tmp_domain_data ) {
			
			// vars
			$tmp_domain_alias = $tmp_domain_data['alias'];
			$tmp_domain_descr = $tmp_domain_data['descr'];
			
			acf_add_local_field( array (
				'placement'		=> 'left',
				'key'            => 'domain_'.$tmp_domain_alias,
				'label'          => $tmp_domain_descr,
				'parent'         => 'shortcodes_domains', // key of parent repeater
				'type'           => 'tab',
				'instructions'   => '',
			));
			
			acf_add_local_field( array (
				'key'            => 'shortcode_label_'.$tmp_domain_alias,
				'label'          => 'ШОРТКОДЫ',
				'name'           => '',
				'parent'         => 'shortcodes_domains', // key of parent repeater
				'type'           => 'message',
				'esc_html'           => 0,
				'new_lines'           => 'br',
				'message'           => 'ЗНАЧЕНИЕ ДЛЯ ДОМЕНА: <strong>'.$tmp_domain_alias.'</strong>',
			));
			
			
			foreach($tmp_shortcodes as $tmp_shortcode => $tmp_shortcode_data) {
				
				$tmp_shortcode_code = $tmp_shortcode_data['code'];
				$tmp_shortcode_name = $tmp_shortcode_data['name'];
				
				acf_add_local_field( array (
					'key'            => 'shortcode_'.$tmp_domain_alias.'_'.$tmp_shortcode_code,
					'label'          => $tmp_shortcode_name,
					'name'           => 'shortcode_'.$tmp_domain_alias.'_'.$tmp_shortcode_code,
					'parent'         => 'shortcodes_domains', // key of parent repeater
					'type'           => 'text',
					'instructions'   => $tmp_shortcode_code,
					//'required'       => 1,
				));					
				
			}
			
		}
		
		/* ШОРТКОДЫ ДЛЯ ДОМЕНОВ (END) */
		
		/* НАСТРОЙКИ ДЛЯ ДОМЕНОВ (BEGIN) */
		
		acf_add_local_field_group(array(
			'key' => 'options_domains',
			'title' => 'Настройки для доменов',
			'type' => 'text',
			"label_placement" => "left",
			'fields' => array (),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-nastrojki-domenov',
					),
				),
			),
		));		
		
		
		$blog_cats = theme_get_cats('category');
		$blog_cats_option_select = array();
		$blog_cats_option_select[0] = 'не выбрано';
		foreach($blog_cats as $blog_cat_id => $blog_cat_data) {
			$blog_cats_option_select[$blog_cat_id] = $blog_cat_data['name'];
		}
		
		foreach($tmp_domains as $tmp_domain => $tmp_domain_data ) {
			
			// vars
			$tmp_domain_alias = $tmp_domain_data['alias'];
			$tmp_domain_descr = $tmp_domain_data['descr'];
			
			acf_add_local_field( array (
				'placement'		=> 'left',
				'key'            => 'domain_'.$tmp_domain_alias,
				'label'          => $tmp_domain_descr,
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'tab',
				'instructions'   => '',
			));
			
			acf_add_local_field( array (
				'key'            => 'option_label_'.$tmp_domain_alias,
				'label'          => 'НАСТРОЙКА',
				'name'           => '',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'message',
				'esc_html'           => 0,
				'new_lines'           => 'br',
				'message'           => 'ЗНАЧЕНИЕ ДЛЯ ДОМЕНА: <strong>'.$tmp_domain_alias.'</strong><br /><i>Если не заполнено, берется из основного домена</i>',
			));
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_sitemap_xml',
				'label'          => 'НАЗВАНИЕ ФАЙЛА XML-КАРТЫ САЙТА',
				'name'           => 'option_'.$tmp_domain_alias.'_sitemap_xml',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => 'В каталоге сайта /sitemap/',
				//'required'       => 1,
			));
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_notification_email',
				'label'          => 'EMAIL-адреса для получения сообщений из форм',
				'name'           => 'option_'.$tmp_domain_alias.'_notification_email',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => 'Можно несколько адресов через запятую.',
				//'required'       => 1,
			));			
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_blog_category',
				'label'          => 'Категория для БЛОГА',
				'name'           => 'option_'.$tmp_domain_alias.'_blog_category',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'select',
				'multiple'		 => 0,
				'allow_null'	 => 0,
				'default_value'	 => 1,
				'ajax'			 => 0,
				'instructions'   => 'Если категория не выбрана, то блог отображаться не будет',
				'choices'   	 => $blog_cats_option_select,
				//'required'       => 1,
			));			
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_robots_txt',
				'label'          => 'Содержимое Robots.txt',
				'name'           => 'option_'.$tmp_domain_alias.'_robots_txt',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'textarea',
				'rows'           => 5,
				'instructions'   => '<span style="color:red;">Адрес карты сайта прописывать не нужно. Она добавляется автоматически</span>',
				//'required'       => 1,
			));	
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_head_code',
				'label'          => 'Код в HEAD',
				'name'           => 'option_'.$tmp_domain_alias.'_head_code',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'textarea',
				'rows'           => 4,
				'instructions'   => '',
				//'required'       => 1,
			));				
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_body_start_code',
				'label'          => 'Код после открытия BODY',
				'name'           => 'option_'.$tmp_domain_alias.'_body_start_code',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'textarea',
				'rows'           => 4,
				'instructions'   => '',
				//'required'       => 1,
			));				
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_body_end_code',
				'label'          => 'Код перед закрытием BODY',
				'name'           => 'option_'.$tmp_domain_alias.'_body_end_code',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'textarea',
				'rows'           => 4,
				'instructions'   => '',
				//'required'       => 1,
			));		
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_phone',
				'label'          => 'Телефон №1',
				'name'           => 'option_'.$tmp_domain_alias.'_phone',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));	
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_phone2',
				'label'          => 'Телефон №2',
				'name'           => 'option_'.$tmp_domain_alias.'_phone2',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));	
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_copyright',
				'label'          => 'Копирайт',
				'name'           => 'option_'.$tmp_domain_alias.'_copyright',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_address_text',
				'label'          => 'Адрес (текст)',
				'name'           => 'option_'.$tmp_domain_alias.'_address_text',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_address_lat',
				'label'          => 'Адрес (широта)',
				'name'           => 'option_'.$tmp_domain_alias.'_address_lat',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));	
			acf_add_local_field( array (
				'key'            => 'option_'.$tmp_domain_alias.'_address_lon',
				'label'          => 'Адрес (долгота)',
				'name'           => 'option_'.$tmp_domain_alias.'_address_lon',
				'parent'         => 'options_domains', // key of parent repeater
				'type'           => 'text',
				'instructions'   => '',
				//'required'       => 1,
			));
				
			
		}
		
		/* НАСТРОЙКИ ДЛЯ ДОМЕНОВ (END) */

}

function acf_get_domains_list() {
		
	$domains = array();
	$domains_option = get_field('domains', 'option');
	if(!empty($domains_option)) {
		foreach($domains_option as $domain_option => $domain_option_data) {
			$domains[] = array(
				'alias' => $domain_option_data['domain_alias'],
				'descr' => $domain_option_data['domain_descr'],
			);
		}
	} 	
	return $domains;
	
}
function acf_get_shortcodes_list() {
		
	$shortcodes = array();
	$shortcodes_option = get_field('shortcodes_list_group', 'option');
	if(!empty($shortcodes_option)) {
		foreach($shortcodes_option as $shortcode_option => $shortcode_option_data) {
			$shortcodes[] = array(
				'code' => $shortcode_option_data['shortcode_code'],
				'name' => $shortcode_option_data['shortcode_name'],
			);
		}
	} 	
	return $shortcodes;
	
}

function acf_load_domains_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    // if has rows
    if( have_rows('domains', 'option') ) {
        // while has rows
        while( have_rows('domains', 'option') ) {
            // instantiate row
            the_row();
            // vars
            $value = get_sub_field('domain_alias');
            $label = get_sub_field('domain_descr');
            // append to choices
            $field['choices'][ $value ] = $label;
        }
    }
    // return the field
    return $field;
}
add_filter('acf/load_field/name=domains_list', 'acf_load_domains_choices');

?>