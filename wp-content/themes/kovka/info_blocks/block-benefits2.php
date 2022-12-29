<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

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

$block_list = $post_info_block_fields["infoblock_biglist_2"];
$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];
$block_list_is_html = $post_info_block_fields["infoblock_biglist_is_html"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';

switch ($block_list_cols) {
  case 1:
    $block_list_col_class = 'col-12 col-sm-12 col-md-12 biglist-col-single';
    break;
  case 2:
    $block_list_col_class = 'col-12 col-sm-6 col-md-6';
    break;
  case 3:
    $block_list_col_class = 'col-12 col-sm-12 col-md-6 col-lg-4';
    break;
  case 4:
    $block_list_col_class = 'col-12 col-sm-12 col-sm-4 col-md-3';
    break;
  case 5:
    $block_list_col_class = 'col-12 col-sm-4 col-md-2';
    break;
  case 6:
    $block_list_col_class = 'col-12 col-sm-4 col-md-2';
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
    <? if (($block_background_color!='') && ($block_background_color!='#ffffff')) { ?>
      background-color:<?=$block_background_color;?>;
    <? } ?>
  }

  



  <?php if($block_list_icon_aligment!="left") { ?>
      #<?=$block_id;?> .media.top,
      #<?=$block_id;?> .media.top-center {
        flex-direction: column;
      }

      #<?=$block_id;?> .media.top .media-body,
      #<?=$block_id;?> .media.top-center .media-body {
        margin-top: 20px;
        margin-left: 0;
      }
      #<?=$block_id;?> .media.top-center {
        align-items: center;
        text-align: center;
      }
  <?php } ?>

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


  .item-icon img ,
  .item-icon span{
    margin: 0 0 0 0;
    font-weight: bold;
  }

  .beeding_block .media {
    position: relative;
    margin-bottom: 30px;
    border: 1px #d8d8d8 solid;
    padding: 45px 15px 50px 15px;
  }
  .beeding_block.heading-layout1 h2,
  .beeding_block .media-body .item-title {
    margin: 0px 0px 7px 0px;
    font-weight: 700;
    font-size: 20px;
    color: #816d53;
  }
  .beeding_block .heading-layout1 p,
  .beeding_block .media-body p {
    margin-bottom: 40px;
    color: #373737;
  }

  .beeding_block a > .media:hover:after ,
  .beeding_block  a > .media:hover:before {
      width: calc(100% + 2px);
      height: calc(100% + 2px);
      opacity: 1;
      visibility: visible;
  }

  .beeding_block a >  .media:after ,
  .beeding_block a > .media::before {
      position: absolute;
      z-index: 0;
      content: " ";
      width: 0;
      height: 0;
      border: 1px #a68f65 solid;
      opacity: 0;
      visibility: hidden;
      transition: all 0.7s ease-in-out;
      -webkit-transition: all 0.7s ease-in-out;
  }

  .beeding_block a > .media::after {
    bottom: -1px;
    right: -1px;
    border-top: 0;
    border-left: 0;;
  }

  .beeding_block a > .media::before {
    top: -1px;
    left: -1px;
    border-right: 0;
    border-bottom: 0;
  }


  .beeding_block .media h5{
    margin: 0px 0px 7px 0px;
    font-weight: 700;
    font-size: 20px;
    color: #816d53;
  }
  .heading-layout1 h2 {
    font-size: 32px;
    font-weight: 500;
    letter-spacing: 0.02em;
    color: #1e1d24;
    margin-bottom: 40px;
  }

  a.item-title:hover {
    color: #fc5a0a;
  }



.beeding__block-column a:hover h5{
  color: #57a4e0;
  transition: all 0.3s ease-in-out;
}




@media (max-width: 768px){

  .media {
    margin: 30px 0;
    align-items: center;
    text-align: center;
  }
  .media .left .item-icon img ,   .item-icon span{
      margin: 0 0 20px 0;
    }
}
  

</style>

<section id="<?= $block_id; ?>" class="beeding_block">
  <div class="container">
    <div class="row d-flex justify-content-end">
      <div class="col-lg-12">
        <div class="service-box-layout2">
          <div class="heading-layout1 text-center<?= ((!$block_with_heading) ? ' d-none' : ''); ?>">
            <h2><?= $block_title; ?></h2>
            <span class="vc_sep_holder vc_sep_holder_l">
              <span style="border-color:#9c865f;" class="vc_sep_line"></span>
            </span>
            <p><?= $block_subtitle; ?></p>
          </div>
          <div class="row  beeding__block-column">
            <?php
            $bl_i = 0;
            foreach ($block_list as $block_list_item => $block_list_item_data) :
              $bl_i++;
              $has_icon = (($block_list_type == "img" && $block_list_item_data['icon'] != "") || ($block_list_type == "num") ? true : false);
              $has_icon_left = (($block_list_type == "img" && $block_list_item_data['icon'] != "" && $block_list_icon_aligment == "left") || ($block_list_type == "num" && $block_list_icon_aligment == "left") ? true : false);

            ?>
  
              <div class="<?= $block_list_col_class; ?>">
              <?php if ($block_list_item_data['descr_link']) : ?>
              <a class="box-icon-modern-link" href="<?= $block_list_item_data['descr_link']; ?>">
              <?php endif; ?>  
               <div class="media <?= $block_list_icon_aligment; ?>">
                  <?php if ($has_icon) : ?>
                    <div class="item-icon">
                      <?php if (($block_list_type == "img") && ($block_list_item_data['icon'] != "")) : ?>
                        <img src="<?= $block_list_item_data['icon']; ?>" style="max-width:<?= $block_list_icon_width; ?>" alt="<?= $block_list_item_data['icon_alt']; ?>" />
                      <?php elseif ($block_list_type == "num") : ?>
                        <span style="font-size: 50px;color:<?= $block_list_num_color; ?>!important;"><?= $bl_i; ?></span>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <div class="media-body">
                    <?php if ($block_list_is_html) : ?>
                      <?= $block_list_item_data['descr_html']; ?>
                    <?php else : ?>                     
                      <h5 class="item-title box-icon-modern-title"><?= $block_list_item_data['title']; ?></h5>                 
                      <p class="box-icon-modern-text"><?= $block_list_item_data['descr']; ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <?php if ($block_list_item_data['descr_link']) : ?>
                </a>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>