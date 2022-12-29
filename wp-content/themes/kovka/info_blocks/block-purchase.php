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
  
  $block_boughts = array();
  $block_list = $post_info_block_fields["infoblock_purchase_list"];
  $block_list = array_reverse($block_list);

  foreach($block_list as $block_list_item => $block_list_data) {

    $block_bought_item = array();
    $block_bought_item['title'] = $block_list_data->post_title;
    $block_bought_item['url'] = get_permalink($block_list_data->ID);

    $pub_image_arr = array();
    $pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($block_list_data->ID), 'full');
    $pub_image_src = $pub_image_arr[0];
    $pub_image_alt = get_post_meta(get_post_thumbnail_id($block_list_data->ID), '_wp_attachment_image_alt', TRUE);

    $block_bought_item['image'] = $pub_image_src;
    $block_bought_item['alt'] = $pub_image_alt;
    
    $block_boughts[] = $block_bought_item;
  }
    
  /*echo '<pre>';
  print_r($block_boughts);
  echo '</pre>';*/
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
</style>

<section id="<?=$block_id;?>" class="purchase testimonial-wrap-layout1">
    <div class="container">
        <div class="heading-layout1 text-center<?=((!$block_with_heading) ? ' d-block' : '');?>">
            <h2><?=$block_title;?></h2>
            <p><?=$block_subtitle;?></p>
        </div>
        <div class="row">
            <?php foreach ($block_boughts as $purchase): ?>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
              <div class="service-box-layout6 d-flex align-items-center">
                <?php if(!empty($purchase['image'])) { ?>
                  <div class="item-img">
                      <img src="<?=$purchase['image']; ?>" alt="<?=$purchase['alt']; ?>">
                  </div>
                <?php } ?>
                  <div class="item-content">
                      <h3 class="item-title"><a href="<?=$purchase['url']; ?>"><?=$purchase['title']; ?></a></h3>
                  </div>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>