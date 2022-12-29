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
  
  $block_btn = $post_info_block_fields["infoblock_btn"];
  $block_btn_url = $post_info_block_fields["infoblock_btn_url"];
  $block_image = $post_info_block_fields["infoblock_image"];
  $block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];
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
  
  #<?=$block_id;?> .recall-img {position:relative;display:block;width:100%;height:100%;z-index:3;}
  #<?=$block_id;?> .recall-img img {max-width:100%;position:absolute;top:-75px;}
  #<?=$block_id;?> .order-1 .recall-img img {right:0;}
  #<?=$block_id;?> .order-2 .recall-img img {left:0;}
</style>

<section id="<?=$block_id;?>" class="recall <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row">
      <div class="col-md-5 d-none d-md-block <?=(($block_image_orientation=="right") ? " order-2 " : " order-1 ");?>">
        <?php if($block_image!="") { ?>
          <div class="recall-img"><img src="<?=$block_image;?>" /></div>
        <?php } ?>
      </div>
            <div class="col-md-7 text-center <?=(($block_image_orientation=="right") ? " order-1 text-md-right " : " order-2 text-md-left");?>">
                <div class="section-heading "><?=$block_title;?></div>
                <div class="section-subheading"><?=$block_subtitle;?></div>
        <?php if($block_btn!="") { ?>
        <div class="my-3">
          <a href="<?=$block_btn_url;?>" class="btn btn-lg btn-primary"><?=$block_btn;?></a>
        </div>
        <?php } ?>
            </div>
        </div>
    </div>
</section>
