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
  $block_type = $post_info_block_fields["infoblock_boughts_type"];

  if($block_type == "all" ) { 
    $block_boughts_query_args = array(
      'numberposts'    =>  -1,
      'posts_per_page'  =>  -1,
      'post_type'  =>   'bought',
    );
    $block_list = get_posts( $block_boughts_query_args );
  } else {
    $block_list = $post_info_block_fields["infoblock_bought_auto_list"];
  }

  foreach($block_list as $block_list_item => $block_list_data) {

    $block_bought_item = array();
    $block_bought_item['title'] = $block_list_data->post_title;
    $block_bought_item['price'] = get_field('bought_auto_price', $block_list_data->ID);
    $block_bought_item['url'] = get_permalink($block_list_data->ID);

    $pub_image_arr = array();
    $pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($block_list_data->ID), 'full');
    $pub_image_src = $pub_image_arr[0];
    $pub_image_alt = get_post_meta(get_post_thumbnail_id($block_list_data->ID), '_wp_attachment_image_alt', TRUE);

    $block_bought_item['image'] = $pub_image_src;
    $block_bought_item['alt'] = $pub_image_alt;
    
    $block_boughts[] = $block_bought_item;
  }
  
  
/*  echo '<pre>';
  print_r($block_white_foreground);
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

<section id="<?=$block_id;?>" class="boughts testimonial-wrap-layout1">
    <div class="container">
        <div class="heading-layout1 text-center<?=((!$block_with_heading) ? ' d-block' : '');?>">
            <h2><?=$block_title;?></h2>
            <p><?=$block_subtitle;?></p>
        </div>
        <div class="rc-carousel dot-control-layout1" data-loop="true" data-items="10" data-margin="30"
        data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="true"
        data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false"
        data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true"
        data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="3"
        data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="3" data-r-large-nav="false"
        data-r-large-dots="true" data-r-extra-large="3" data-r-extra-large-nav="false"
        data-r-extra-large-dots="true">
            <?php foreach ($block_boughts as $bought): ?>
            <div class="project-box-layout1">
                <div class="item-img">
                    <img src="<?=$bought['image'];?>" alt="<?=$bought['title'];?> - выкуп %v_gorode%">
                </div>
                <div class="item-content">
                    <h3 class="item-title"><?=$bought['title'];?></h3>
                    <div class="item-price"><?=$bought['price'];?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>