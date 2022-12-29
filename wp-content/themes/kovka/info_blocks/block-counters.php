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
	
	$block_list = $post_info_block_fields["infoblock_counterlist"];
	
	$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
	$block_list_col_class = 'col-md-3';
	
	switch($block_list_cols) {
		case 1:
			$block_list_col_class = 'col-12 col-sm-12 col-md-12';
		break;
		case 2:
			$block_list_col_class = 'col-12 col-sm-6 col-md-6';
		break;
		case 3:
			$block_list_col_class = 'col-12 col-sm-4 col-md-4';
		break;
		case 4:
			$block_list_col_class = 'col-12 col-sm-6 col-md-6 col-lg-3';
		break;
		case 5:
			$block_list_col_class = 'col-12 col-sm-4 col-md-2';
		break;
		case 6:
			$block_list_col_class = 'col-12 col-sm-6 col-md-2';
		break;
		
	}	
?>


<style>
	#<?=$block_id;?> {
		padding-top:<?=$block_padding_top;?>px;
		padding-bottom:<?=$block_padding_bottom;?>px;
		margin-top:<?=$block_margin_top;?>px;
		margin-bottom:<?=$block_margin_bottom;?>px;
		position:relative;
		<? if (($block_background_color!='') && ($block_background_color!='#ffffff') && $block_background_enable) { ?>
			background-color:<?=$block_background_color;?>;
		<? } ?>
	}
	<? if ($block_background_image!='' && $block_background_enable)  { ?>
	
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

<!-- Progress Area Start Here -->
<section id="<?=$block_id;?>" class="counterlist progress-wrap-layout1 <?=($block_white_foreground!="" && $block_background_enable) ? " white-foreground " : "";?>">
    <div class="container">
        <div class="heading-layout1 text-center<?=((!$block_with_heading) ? ' d-none' : '');?>">
          <h2><?=$block_title;?></h2>
          <p><?=$block_subtitle;?></p>
        </div>
        <div class="row">
            <?php 
              $bl_i = 0;
              foreach($block_list as $block_list_item => $block_list_item_data):
                $bl_i++;
                  
                  /*$tmp_counter_value = intval($block_list_item_data['counter_value']);
                  if($tmp_counter_value!=0) $block_list_item_data['counter_value'] = str_replace($tmp_counter_value, '<span class="counterUp">'.$tmp_counter_value.'</span>', $block_list_item_data['counter_value']);*/
            ?>
            <div class="<?=$block_list_col_class;?>">
                <div class="progress-box-layout1">
                    <div class="progress-content">
                        <div class="col-4 col-sm-3 item-icon">
                            <img src="<?=$block_list_item_data['counter_icon'];?>" alt="">
                        </div>
                        <div class="col-8 col-sm-9 item-content">
                            <div class="counter count-number" data-num="<?=$block_list_item_data['counter_value'];?>"><?=$block_list_item_data['counter_value'];?></div>
                            <div class="count-title"><?=$block_list_item_data['counter_title'];?></div>
                        </div>
                    </div>
                </div>
            </div>
              <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Progress Area End Here -->