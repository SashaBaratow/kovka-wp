<?php

function simpleBBparse($text) {
	//return $text;
    $text = htmlspecialchars($text);
    //$text = nl2br($text);
    $text = preg_replace("#\[red\](.*?)\[/red\]#si", '<span style="color:#e5524c;">\\1</span>', $text);
  	$text = preg_replace("#\[big\](.*?)\[/big\]#si", '<span style="font-size:150%;line-height:1;">\\1</span>', $text);
    $text = preg_replace("#\[b\](.*?)\[/b\]#si", '<strong>\\1</strong>', $text);
    $text = preg_replace("#\[i\](.*?)\[/i\]#si", '<i>\\1</i>', $text);
    $text = preg_replace("#\[u\](.*?)\[/u\]#si", '<u>\\1</u>', $text);
    $text = html_entity_decode($text);
	//and some more rules [...]
    return $text;
}

//ШОРТ-КОД ПРИМЕЧАНИЕ КАЛЬКУЛЯТОРА
function calc_mark_shortcode( $atts, $content = null ) {
	$content = esc_attr(trim($content));
	return '<span id="calc-mark">'.$content.'</span>';
}
add_shortcode( 'calc-mark', 'calc_mark_shortcode' );

//ШОРТ-КОД КНОПКА
function btn_shortcode( $atts, $content = null ) {
	
	$btn_text = esc_attr(trim($content));
	$btn_url = esc_attr(trim($atts['href']));
	
	$btn_text = (($btn_text=="") ? "Текст кнопки" : $btn_text);
	$btn_url = (($btn_url=="") ? "#" : $btn_url);
	
	$btn_output = '<a class="btn btn-danger btn-lg" href="'.$btn_url.'">'.$btn_text.'</a>';
	
	return $btn_output;
}
add_shortcode( 'button', 'btn_shortcode' );

//ШОРТ-КОД YOUTUBE
function youtube_shortcode( $atts, $content = null ) {
$a = shortcode_atts( array(
), $atts );

	$youtube_url = esc_attr(trim($content));
	$youtube_width = esc_attr(trim($a['width']));
	$youtube_height = esc_attr(trim($a['height']));

	$pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
	$pattern .= '(?:www\.)?';         #  Optional www subdomain.
	$pattern .= '(?:';                #  Group host alternatives:
	$pattern .= 'youtu\.be/';         #    Either youtu.be,
	$pattern .= '|youtube\.com';      #    or youtube.com
	$pattern .= '(?:';                #    Group path alternatives:
	$pattern .= '/embed/';        	  #      Either /embed/,
	$pattern .= '|/v/';               #      or /v/,
	$pattern .= '|/watch\?v=';    	  #      or /watch?v=,    
	$pattern .= '|/watch\?.+&v='; 	  #      or /watch?other_param&v=
	$pattern .=  ')';                 #    End path alternatives.
	$pattern .= ')';                  #  End host alternatives.
	$pattern .= '([\w-]{11})';        # 11 characters (Length of Youtube video ids).
	$pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.

	
	if($youtube_url!="") {
		preg_match($pattern, $youtube_url, $matches);
		if(isset($matches[1])) {
			
			return '<div class="wrapper" style="max-width:900px;margin:0 auto;">
						<div class="youtube" data-embed="'.$matches[1].'">
							<div class="play-button"></div>
						</div>
					</div>';					
					
		} else {
			return "";
		}
	} else {
		return "";
	}
}
add_shortcode( 'youtube', 'youtube_shortcode' );

function youtube_lazyload () {
	
$output = <<<HTML
	
	
<style>
	.youtube-wrapper {
		max-width: 100%;
		position:relative;
	}

	.youtube {
		background-color: #000;
		margin-bottom: 30px;
		position: relative;
		padding-top: 56.25%;
		overflow: hidden;
		cursor: pointer;
	}
	.youtube img {
		width: 100%;
		top: -16.82%;
		left: 0;
		opacity: 0.85;
	}
	.youtube .play-button {
		width: 90px;
		height: 60px;
		background-color: #333;
		box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
		z-index: 1;
		opacity: 0.8;
		border-radius: 6px;
	}
	.youtube .play-button:before {
		content: "";
		border-style: solid;
		border-width: 15px 0 15px 26.0px;
		border-color: transparent transparent transparent #fff;
	}
	.youtube img,
	.youtube .play-button {
		cursor: pointer;
	}
	.youtube img,
	.youtube iframe,
	.youtube .play-button,
	.youtube .play-button:before {
		position: absolute;
	}
	.youtube .play-button,
	.youtube .play-button:before {
		top: 50%;
		left: 50%;
		transform: translate3d( -50%, -50%, 0 );
	}
	.youtube iframe {
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
	}
	.youtube img {
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		transition: all 0.5s ease;		
	}
	.youtube:hover img {
		transform:scale(1.03);
		-ms-transform:scale(1.03);
		-webkit-transform:scale(1.03);		
	}

</style>

<script>
	( function() {

		var youtube = document.querySelectorAll( ".youtube" );
		
		for (var i = 0; i < youtube.length; i++) {
			
			var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
			
			var image = new Image();
				image.src = source;
				image.addEventListener( "load", function() {
					youtube[ i ].appendChild( image );
				}( i ) );
			
				youtube[i].addEventListener( "click", function() {
					
					var iframe = document.createElement( "iframe" );

						iframe.setAttribute( "frameborder", "0" );
						iframe.setAttribute( "name", "Youtube AlexanderBar" );
						iframe.setAttribute( "allowfullscreen", "" );
						iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

						this.innerHTML = "";
						this.appendChild( iframe );
				} );    
		};
		
	} )();
</script>

HTML;

echo $output;	
	
}

add_action('wp_footer','youtube_lazyload'); //Добавляем в футер скрипт обработки youtube

//ШОРТ-КОД ФОТОГАЛЕРЕИ
function photo_gallery_shortcode( $atts, $content = null ) {
	$gallery_id = intval($atts['id']);
	
	$gallery_images = get_field('gallery', $gallery_id);
	$gallery_images_ready = array();
	if(!empty($gallery_images)) {
			$gallery_i = 0;
			foreach($gallery_images as $gallery_image => $gallery_image_data) {
				$gallery_item = array(
					'title' => $gallery_image_data['title'],
					'thumb' => $gallery_image_data['sizes']['medium'],
					'large' => $gallery_image_data['sizes']['large'],
				);
				$gallery_images_ready[] = $gallery_item;
				$gallery_i++;
			}			
		
	}
	
	$output = '
	<div class="hr-1">&nbsp;</div>
	<div class="gallery-wrapper">
		<div class="row">
				<!-- Image List -->
		';
				foreach($gallery_images_ready as $gallery_image => $gallery_images_data) {
					$output .= '<div class="item col-lg-3 col-md-3 col-sm-3 col-xs-12 mb15"><a href="'.$gallery_images_data['large'].'" rel="gallery" class="fancybox" title="'.esc_attr($gallery_images_data['title']).'"><img src="'.$gallery_images_data['thumb'].'" alt="'.esc_attr($gallery_images_data['title']).'" title="'.esc_attr($gallery_images_data['title']).'"></a></div>';
				}
				
		$output .= '
				<!-- /Image List -->				
		</div>
	</div>
	<div class="hr-1">&nbsp;</div>
	';	
	
	return $output;
	
}
add_shortcode( 'photo-gallery', 'photo_gallery_shortcode' );

//ДОБАВЛЯЕМ КОЛОНКУ С ШОРТ-КОДОМ НА СТРАНИЦУ ЗАПИСЕЙ ФОТОГАЛЕРЕИ

// ADD NEW COLUMN
function theme_admin_gallery_columns_head($columns) {
	$columns['shortcode'] = 'Шорт-код';
    return $columns;
}
// SHOW THE FEATURED IMAGE
function theme_admin_gallery_columns_content($column_name, $post_ID) {
    if ($column_name == 'shortcode') {
		echo '<input onClick="this.setSelectionRange(0, this.value.length)" type="text" value="[photo-gallery id='.$post_ID.']" />';
	}
}
add_filter('manage_gallery_posts_columns', 'theme_admin_gallery_columns_head');
add_action('manage_gallery_posts_custom_column', 'theme_admin_gallery_columns_content', 10, 2);
?>