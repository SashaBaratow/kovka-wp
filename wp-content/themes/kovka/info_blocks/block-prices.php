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
	
	$block_list = $post_info_block_fields["infoblock_pricelist"];
	$block_list_count = count($block_list);
	
	$block_list_col_class = 'col-12 col-md-6 col-lg-3';
	
	if($block_list_count <=2) {
		$block_list_col_class = 'col-12 col-md-6 col-lg-4 pricelist-col';
	} elseif($block_list_count == 3) {
		$block_list_col_class = 'col-12 col-md-4 col-lg-4 pricelist-col';
	} elseif($block_list_count == 4) {
		$block_list_col_class = 'col-12 col-md-6 col-lg-3 pricelist-col pricelist-col-mini';
	} elseif($block_list_count > 4) {
		$block_list_col_class = 'col-12 col-md-6 col-lg-4 pricelist-col pricelist-col-mini';
	}
	
?>


<style>
	.pricelist {}
	.pricelist-col-content {
		padding: 20px 15px 130px 15px;
		margin-bottom:15px;
		background: #fff;
		/*
		box-shadow: 0 0 12px 1px rgba(0, 0, 0, 0.1);
		*/
		text-align: center;		
		transition: all 0.2s ease;
		position:relative;
	}
	.price-icon {position:relative;width:100%;height:60px;margin-bottom:20px;line-height:60px;}
	.price-icon:before {
		position: absolute;
		height: 25px;
		width: 3px;
		display: block;
		top: -32px;
		left: 50%;
		transform: translateX(-50%);
		border-left: 3px solid #f0a3ba;
		content: '';
	}
	.price-icon img {max-width:100%;display:inline-block;}
	.pricelist-col-content .price-title {
		position: relative;
		display: block;
		margin: auto;
		font-size: 22px;
		color: #4c4e63;
		font-family: 'Museo Cyrillic';
		font-weight: 700;
		text-align: center;
		margin-bottom: 15px;
	}
	.pricelist-col-content .price-subtitle {
		position: relative;
		display: block;
		margin: auto;
		color: #e5524c;
		font-size: 15px;
		margin-bottom: 5px;
		text-align: center;	
	}
	.pricelist-col-content .price-comment {text-align:center;margin-bottom: 5px;}
	.pricelist-col-content .price-btn-wrap {
		text-align: center;
		padding: 10px;
		position: absolute;
		width: 100%;
		bottom: 10px;
		left:0;		
	}
	.pricelist-col-content .price-opts {
		list-style:none;padding:5px 15px;margin:0 auto;
	}
	.pricelist-col-content .price-opts li {
		list-style:none;padding:0;text-align:left;
		position: relative;
		padding-left: 40px;
		color: #746f7d;
		font-size: 14px;
		margin: 10px 0;
		line-height: 18px;	
	}
	.pricelist-col-content .price-opts li:before {
		position: absolute;
		width: 20px;
		height: 20px;
		display: block;
		content: '\2713';
		box-sizing: border-box;
		border: 1px solid #50a9f2;
		color: #50a9f2;
		text-align: center;
		border-radius: 10px;
		left: 0;
		top: -2px;
		line-height: 20px;
	}
	.pricelist-col-content .price-opts li i {color:#02a1df;margin-right:10px;}
	.pricelist-col-content:hover {
		box-shadow: 0 0 14px 1px rgba(0, 0, 0, 0.2);
	}
	.price-value-wrap {
		text-align: center;
		padding: 10px;
		position: absolute;
		width: 100%;
		bottom: 65px;
		left:0;	
		display: block;
		color: #746f7d;
		font-size: 14px;	
	}
	.price-value-wrap .price-value {
		position: relative;
		display: block;
		color: #e2517d;
		font-size: 36px;
		line-height: 1;
		margin: 3px 0;	
	}
	.pricelist-col-mini .price-value-wrap .price-value {
		font-size: 28px;
	}
	@media only screen and (max-width: 767px) {
		.price-value-wrap .price-value {
			font-size: 28px;
		}
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

<section id="<?=$block_id;?>" class="pricelist <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row <?=((!$block_with_heading) ? 'd-none' : '');?>">
            <div class="col-md-12 text-left">
                <h2 class="section-heading"><?=$block_title;?></h2>
                <div class="section-subheading"><?=$block_subtitle;?></div>
            </div>
        </div>
		<div class="row pricelist-row justify-content-center align-items-center-off">
			<?php 
				$pl_i = 0;
				foreach($block_list as $block_list_item => $block_list_item_data) {
					$pl_i++;
					
					$block_pricelist_item_descr = explode(PHP_EOL, $block_list_item_data['priceblock_content']);
					
					?>
					<div class="<?=$block_list_col_class;?> pricelist-col mb-2">
						<div class="pricelist-col-content h-100 ">
							<?php if($block_list_item_data['priceblock_icon']!="") { ?><div class="price-icon"><img src="<?=$block_list_item_data['priceblock_icon'];?>" /></div><?php } ?>
							<div class="price-title"><?=$block_list_item_data['priceblock_title'];?></div>
							<div class="price-subtitle"><?=$block_list_item_data['priceblock_subtitle'];?></div>
							<ul class="price-opts">
							<?php foreach($block_pricelist_item_descr as $block_pricelist_item_descr_line) { 
									$block_pricelist_item_descr_line = trim($block_pricelist_item_descr_line);
									if($block_pricelist_item_descr_line=="") continue;
							?>
								<li><?=$block_pricelist_item_descr_line;?></li>
							<?php } ?>
							</ul>
							<div class="price-value-wrap">
								<div class="price-value-before"><?=$block_list_item_data['priceblock_price_before'];?></div>
								<div class="price-value"><?=$block_list_item_data['priceblock_price'];?></div>
								<div class="price-value-after"><?=$block_list_item_data['priceblock_price_after'];?></div>
							</div>
							<!--<div class="price-comment"><?=$block_list_item_data['priceblock_comment'];?></div>-->
							<?php if($block_list_item_data['priceblock_btn']!="") { ?><div class="price-btn-wrap"><a href="<?=$block_list_item_data['priceblock_btn_url'];?>" class="btn btn-md btn-secondary"><?=$block_list_item_data['priceblock_btn'];?></a></div><?php } ?>
						</div>
					</div>
					<?php
				}
			?>
		</div>	
    </div>
</section>
