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
	
	$block_list = $post_info_block_fields["infoblock_clientlist"];
	
	$block_list_img_width = $post_info_block_fields["infoblock_list_img_width"];
	$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
	$block_list_col_class = 'col-12';
	
	switch($block_list_cols) {
		case 1:
			$block_list_col_class = 'col-12 col-sm-12 col-md-12';
		break;
		case 2:
			$block_list_col_class = 'col-12 col-sm-6 col-md-6';
		break;
		case 3:
			$block_list_col_class = 'col-6 col-sm-4 col-md-4';
		break;
		case 4:
			$block_list_col_class = 'col-6 col-sm-3 col-md-3';
		break;
		case 5:
			$block_list_col_class = 'col-6 col-sm-4 col-md-2';
		break;
		case 6:
			$block_list_col_class = 'col-6 col-sm-4 col-md-2';
		break;
		
	}	
?>


<style>
	.clients {}
	.clients-carousel {
		padding: 20px 40px;
		margin: 10px 0!important;
	}
	.clients-carousel .slick-arrow {
		position: absolute;
		width: 40px;
		height: 40px;
		display: block;
		box-sizing: border-box;
		border: 1px solid #dfdfe5;
		background: transparent;
		top: 50%;
		transform: translateY(-50%);
		cursor: pointer;
		transition: all .5s;
		background: #fff;
	}
	.clients-carousel .slick-prev {
		left:5px;
	}
	.clients-carousel .slick-prev:before {
		position: absolute;
		width: 16px;
		height: 16px;
		border-top: 2px solid #4c4e63;
		border-left: 2px solid #4c4e63;
		display: block;
		content: '';
		transform: rotate(-45deg);
		margin-left: 14px;
		margin-top: 10px;
		transition: all .5s;
		top: 2px;
	}
	.clients-carousel .slick-next {
		right:5px;
	}
	.clients-carousel .slick-next:before {
		position: absolute;
		width: 16px;
		height: 16px;
		border-top: 2px solid #4c4e63;
		border-right: 2px solid #4c4e63;
		display: block;
		content: '';
		transform: rotate(45deg);
		margin-left: 6px;
		margin-top: 10px;
		transition: all .5s;
		top: 2px;
	}
	.clients-carousel .slick-arrow:hover {
		background: #ff4465;
		border: 1px solid #ff4465;
	}
	.clients-carousel .slick-arrow:hover:before {
		border-color: #fff!important;
	}
	.client-col {
		position: relative;
		width: 120px;
		height: 120px;
		border: 1px solid transparent;
		transition: all .5s;
		cursor: default;
	}
	.client-col img {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		max-width: 80%;
	}
</style>


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

<section id="<?=$block_id;?>" class="clients <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row <?=((!$block_with_heading) ? 'd-none' : '');?>">
            <div class="col-md-12 text-left">
                <h2 class="section-heading"><?=$block_title;?></h2>
                <div class="section-subheading"><?=$block_subtitle;?></div>
            </div>
        </div>
		<div class="clients-carousel">
			<?php 
				$bl_i = 0;
				foreach($block_list as $block_list_item => $block_list_item_data) {
					$bl_i++;
					if($block_list_item_data['client_logo']=="") continue;
					?>
					<div class="<?=$block_list_col_class;?> client-col">							
						<img src="<?=$block_list_item_data['client_logo'];?>" alt="<?=$block_list_item_data['client_logo_alt'];?>" />
					</div>
					<?php
				}
			?>
		</div>	
    </div>
</section>
