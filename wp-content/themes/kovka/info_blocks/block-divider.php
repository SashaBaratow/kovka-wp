<?php
	
	$block_title = trim($post_info_block_fields["infoblock_title"]);
	$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
	
	$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
	$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
	$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
	$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];
	
	$block_btn = $post_info_block_fields["infoblock_btn"];
	$block_btn_url = $post_info_block_fields["infoblock_btn_url"];
	
	$block_divider_text_aligment = $post_info_block_fields["infoblock_divider_text_aligment"];
	$block_divider_style = $post_info_block_fields["infoblock_divider_style"];
	$block_divider_icon = $post_info_block_fields["infoblock_icon"];
	
?>


<style>
	.divider-wrapper {background:#edf4f9;}
	
	.divider {position:relative;padding:0;margin:0;min-height:90px;}
	.divider.with-icon {padding-left:110px;}
	.divider .divider-icon {width:90px;height:100%;position:absolute;left:0;top:0;text-align:center;background:#e1edf5;}
	.divider .divider-icon img {max-width:70%;position:absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%,-50%);
		-ms-transform: translate(-50%,-50%);
		transform: translate(-50%,-50%);	
	}
	.divider .divider-icon:before {
		position: absolute;
		display: block;
		content: '';
		width: 20px;
		height: 0;
		border-style: solid;
		border-width: 45px 0 45px 20px;
		border-color: transparent transparent transparent #e1edf5;
		right: 0px;
		top: 50%;
		left: 100%;
		margin-top: -45px;
		z-index: 1;
	}
	.divider .divider-content {padding:0 20px;width:100%;}
	.divider .divider-content .divider-text {padding:10px 20px;width:100%;}
	.divider .divider-content .divider-text .divider-title {font-weight:500;font-family:'Museo Cyrillic';font-size:32px;}
	.divider .divider-content .divider-text .divider-subtitle {font-size:18px;}
	.divider .divider-content .divider-button {text-align:right;padding:0 20px;}
	
	.divider-wrapper.style2 {background:#ff7d85;color:#fff;}
	.divider-wrapper.style2 .divider-icon {background:#ff6f78;}
	.divider-wrapper.style2 .divider-icon:before {border-color: transparent transparent transparent #ff6f78;}
	
	@media only screen and (max-width: 767px) {
		.divider .divider-content {padding:0;}
		.divider .divider-content .divider-text {}
		.divider .divider-content .divider-text .divider-title {font-size:24px;}
		.divider .divider-content .divider-text .divider-subtitle {font-size:16px;}
		.divider .divider-content .divider-button {text-align:center;padding:10px 20px 20px 20px;}	
		.divider .divider-content .divider-button .btn {width:100%;}	
	}
	
</style>

<style>
	#<?=$block_id;?> {
		padding-top:<?=$block_padding_top;?>px;
		padding-bottom:<?=$block_padding_bottom;?>px;
		margin-top:<?=$block_margin_top;?>px;
		margin-bottom:<?=$block_margin_bottom;?>px;
		position:relative;
	}
</style>

<section id="<?=$block_id;?>">
	<div class="divider-wrapper <?=($block_divider_style!="") ? $block_divider_style : "";?>">
		<div class="container px-0">
			<div class="row">
				<div class="col-12">
					<div class="divider d-flex align-items-center <?=(($block_divider_icon!="") ? ' with-icon ' : '');?>">
						<?php if($block_divider_icon!="") { ?> 
						<div class="divider-icon">
							<img src="<?=$block_divider_icon;?>" />
						</div>
						<?php } ?>
						<div class="divider-content">
							<div class="d-block d-md-flex text-left align-items-center">
								<div class="divider-text text-center text-md-<?=$block_divider_text_aligment;?>">
									<?php if($block_title!="") { ?><div class="divider-title"><?=$block_title;?></div><?php } ?>
									<?php if($block_subtitle!="") { ?><div class="divider-subtitle"><?=$block_subtitle;?></div><?php } ?>
								</div>
								<?php if($block_btn!="") { ?>
								<div class="divider-button">
									<a href="<?=$block_btn_url;?>" class="btn btn-md btn-<?=($block_divider_style=="style2") ? 'light' : 'secondary';?>"><?=$block_btn;?></a> 
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
