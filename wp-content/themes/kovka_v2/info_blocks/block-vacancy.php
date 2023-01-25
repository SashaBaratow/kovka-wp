<?php
	$block_title = trim($post_info_block_fields["infoblock_title"]);
	$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
	
	$block_with_heading = (($block_title!="" || $block_subtitle!="") ? true : false);
	
	$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
	$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
	$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
	$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];
	
	$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
	$block_background_image = $post_info_block_fields["infoblock_background_image"];
	$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
	$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);
	
	$block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];
	$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];
	
	$vacancy_list = $post_info_block_fields["infoblock_vacancy_list"];

?>

<style>
	#<?=$block_id;?> {
		padding-top:<?=$block_padding_top;?>px;
		padding-bottom:<?=$block_padding_bottom;?>px;
		margin-top:<?=$block_margin_top;?>px;
		margin-bottom:<?=$block_margin_bottom;?>px;
		position:relative;
		<? if (($block_background_color!='') && ($block_background_color!='#ffffff')) { ?>
			background-color:<?=$block_background_color;?>;
		<? } ?>
	}
	<? if ($block_background_image!='')  { ?>
	
	<? if ($block_dark_overlay)  { ?>
	#<?=$block_id;?>:before {
		content: '';
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background:#000;
		opacity:0.7;
		z-index:1;
	}
	<? } ?>
	#<?=$block_id;?>>div {position:relative;z-index:5;}
	#<?=$block_id;?>:after {
		content: '';
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-image:url(<?=$block_background_image;?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		z-index:0;
	}
	@media only screen and (min-width: 768px) {
		#<?=$block_id;?>:after {
			background-attachment:fixed;
		}
	}
	@media only screen and (max-width: 767px) {
		#<?=$block_id;?>:after {
			<?php if($block_background_image_mobile!="") { ?>
			background-image:url(<?=$block_background_image_mobile;?>);
			<?php } ?>
		}
	}
	<? } ?>	
</style>

<section id="<?=$block_id;?>" class="vacancy <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row <?=((!$block_with_heading) ? 'd-none' : '');?>">
            <div class="col-md-12 text-left">
                <h2 class="section-heading"><?=$block_title;?></h2>
                <div class="section-subheading"><?=$block_subtitle;?></div>
            </div>
        </div>
		
        <div class="row vacancy-carousel">
				
				<?php 
					///// GET
					
					$vacancy_query_args = array(
						'numberposts'  =>  -1,
						'post_type'  =>  'vacancy',
						'include'  =>  $vacancy_list,
						'orderby' => 'post__in'
					);
							
					// get the posts with our query arguments
					$vacancy_query = get_posts( $vacancy_query_args );
					$vacancy_ready = array();
					foreach ( $vacancy_query as $vacancy ) {
						$vacancy_id = $vacancy->ID;
						$vacancy_item_title = get_the_title( $vacancy_id );
						$vacancy_item_permalink = get_permalink( $vacancy_id );
						$vacancy_item_descr = apply_filters('the_content', $vacancy->post_content);
						$vacancy_item_descr_parts = get_extended( $vacancy_item_descr );
						//$vacancy_item_descr_short = wp_trim_words( $vacancy_item_descr, 20, '...' );
						$vacancy_item_descr_short = $vacancy_item_descr_parts['main'];			
									
						$vacancy_image_arr = array();
						$vacancy_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($vacancy_id), 'medium_large');
						$vacancy_image_src = $vacancy_image_arr[0];

						$vacancy_item_ready = array(
							'id' => $vacancy_id,
							'title' => $vacancy_item_title,
							'url' => $vacancy_item_permalink,
							'descr' => $vacancy_item_descr_short,
							'image' => $vacancy_image_src,
						);
						
						$vacancy_ready[] = $vacancy_item_ready;
						
					}

					$vacancy_i = 0;
					foreach ( $vacancy_ready as $vacancy ) {
						$vacancy_i++;

				?>
					<div class="col-md-6 col-12 mb-4 pb-4">
						<div class="vacancy-item">
								<div class="vacancy-title h4"><?=$vacancy['title'];?></div>
								<?php if($vacancy['image']!="") { ?>
								<div class="vacancy-image"><div style="background-image:url(<?=$vacancy['image'];?>);"></div></div>
								<?php } ?>
								<p class="vacancy-descr"><?=$vacancy['descr'];?></p>
								<div class="vacancy-more"><a href="<?=$vacancy['url'];?>" class="btn btn-md btn-outline-primary">подробнее</a></div>
						</div>
					</div>

				<?php } ?>
				
        </div>				
    </div>
</section>
