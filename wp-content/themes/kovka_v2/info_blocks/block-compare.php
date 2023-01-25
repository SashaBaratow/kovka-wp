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
	
	$block_list = $post_info_block_fields["infoblock_comparelist"];
	
	$block_list_img_width = $post_info_block_fields["infoblock_list_img_width"];
	
	$block_list_col_class = 'col-6 col-sm-6 col-md-6';
?>



<style>
	.comparelist {}
	.comparelist .comparelist-col {}
	.comparelist .comparelist-col:before {content:'';width:1px;background:#454545;position:absolute;left:0;top:0;height:100%;}
	.comparelist .comparelist-col:first-child:before {display:none;}
	.comparelist-col-content {
		padding: 20px 5px;
		background: transparent;
	}
	.comparelist-col-content .compare-img {text-align:center;max-height:250px;max-width:100%;width:100%;margin:0 auto;margin-bottom:25px;}
	.comparelist-col-content .compare-img img {display:inline-block;max-width:90%;}
	.comparelist-col-content .compare-title {text-align:center;font-weight: 700;font-size: 1.8em;color:#454545;margin-bottom:15px;}
	.comparelist-col-content .compare-opts {list-style:none;padding:0;margin:0;}
	.comparelist-col-content .compare-opts li {list-style:none;padding:0;margin:0;margin-bottom:10px;display:block;text-align:left;}
	
	@media only screen and (max-width: 767px) {
		.comparelist-col-content {
			padding: 10px 0;
		}
		.comparelist-col-content .compare-title {text-align:center;font-weight:600;font-size:1.3em; line-height: 1em;margin-bottom:10px;}
		.comparelist-col-content .compare-opts li {font-size:0.8em;line-height: 1.3em;}
	}
	/*
	.comparelist .comparelist-col:first-child .comparelist-col-content, .comparelist .comparelist-col:first-child .comparelist-col-content * {text-align:right;}
	*/
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

<section id="<?=$block_id;?>" class="comparelist <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row <?=((!$block_with_heading) ? 'd-none' : '');?>">
            <div class="col-md-12 text-left">
                <h2 class="section-heading"><?=$block_title;?></h2>
                <div class="section-subheading"><?=$block_subtitle;?></div>
            </div>
        </div>
		<div class="row comparelist-row justify-content-center align-items-center-off">
			<?php 
				$pl_i = 0;
				foreach($block_list as $block_list_item => $block_list_item_data) {
					$pl_i++;
					
					$block_comparelist_item_descr = explode(PHP_EOL, $block_list_item_data['compare_content']);
					
					?>
					<div class="<?=$block_list_col_class;?> comparelist-col">
						<div class="comparelist-col-content">
							<div class="compare-img" style="max-width:<?=$block_list_img_width;?>"><img src="<?=$block_list_item_data['compare_image'];?>" alt="<?=$block_list_item_data['compare_image_alt'];?>" /></div>
							<div class="compare-title"><?=$block_list_item_data['compare_title'];?></div>
							<ul class="compare-opts">
							<?php foreach($block_comparelist_item_descr as $block_comparelist_item_descr_line) { 
									$block_comparelist_item_descr_line = trim($block_comparelist_item_descr_line);
									if($block_comparelist_item_descr_line=="") continue;
							?>
								<li><?=$block_comparelist_item_descr_line;?></li>
							<?php } ?>
							</ul>
						</div>
					</div>
					<?php
				}
			?>
		</div>	
    </div>
</section>
