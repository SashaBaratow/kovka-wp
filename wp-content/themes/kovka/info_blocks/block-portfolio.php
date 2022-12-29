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
	
	$block_list = $post_info_block_fields["infoblock_portfolio"];
	$block_list_col_class = 'col-md-4';
	
	$block_list_visible = (int)$post_info_block_fields["infoblock_portfolio_visible"];
	$block_list_more_btn = $post_info_block_fields["infoblock_portfolio_more_btn"];
?>


<style>
	.portfolio {}
	.portfolio-col {
		margin-bottom:10px;
	}
	.portfolio-col-content {
		margin:5px 0;
		padding: 10px 15px;
		background: #fff;
		box-shadow: 0 0 12px 1px rgba(0, 0, 0, 0.1);
		text-align: center;		
		transition: all 0.2s ease;
	}
	.portfolio-col-content .portfolio-image {text-align:center;margin-bottom:10px;}
	.portfolio-col-content .portfolio-image img {display:inline-block!important;max-height:240px;}
	.portfolio-col-content .portfolio-title {text-align:center;font-weight: 500;font-size: 1.5em;color: #454545;margin-bottom:10px;}
	.portfolio-col-content .portfolio-descr {text-align:left;margin-bottom:10px;}
	.portfolio-col-content .portfolio-comment {text-align:left;margin-bottom:10px;}
	.portfolio-col-content .portfolio-site {text-align:center;font-weight:600;color: #02a1df;margin-bottom:10px;}
	.portfolio-col-content:hover {
		box-shadow: 0 0 14px 1px rgba(0, 0, 0, 0.2);
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

<section id="<?=$block_id;?>" class="portfolio <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row <?=((!$block_with_heading) ? 'd-none' : '');?>">
            <div class="col-md-12 text-left">
                <h2 class="section-heading"><?=$block_title;?></h2>
                <div class="section-subheading"><?=$block_subtitle;?></div>
            </div>
        </div>
		<div class="row portfolio-carousel justify-content-center align-items-top">
			<?php 
				$bl_i = 0;
				foreach($block_list as $block_list_item => $block_list_item_data) {
					$bl_i++;
					?>
					<div class="<?=$block_list_col_class;?> portfolio-col <?=(($bl_i > $block_list_visible) ? 'd-md-none' : '');?>">
						<div class="portfolio-col-content h-100">
							<div class="portfolio-title"><?=$block_list_item_data['portfolio_title'];?></div>	
							<div class="portfolio-image">
								<?php if($block_list_item_data['portfolio_image_large']!="") { ?>
									<a href="<?=$block_list_item_data['portfolio_image_large'];?>" class="portfolio-zoom"><img src="<?=$block_list_item_data['portfolio_image'];?>" alt="<?=$block_list_item_data['portfolio_image_alt'];?>" /></a>
								<?php } else { ?>
									<img src="<?=$block_list_item_data['portfolio_image'];?>" alt="<?=$block_list_item_data['portfolio_image_alt'];?>" />
								<?php } ?>
							</div>
							<div class="portfolio-descr"><?=$block_list_item_data['portfolio_descr'];?></div>	
							<div class="portfolio-comment"><?=$block_list_item_data['portfolio_comment'];?></div>
							<div class="portfolio-site"><?=$block_list_item_data['portfolio_site'];?></div>
						</div>
					</div>
					<?php
				}
			?>
		</div>
		<?php if($bl_i > $block_list_visible) { ?>
		<div class="row d-none d-md-block">
			<div class="col-md-12 text-center py-3">
				<a href="#" class="btn btn-lg btn-outline-primary" data-action="more-portfolio"><?=$block_list_more_btn;?></a>
			</div>
		</div>
		<?php } ?>
    </div>
</section>
