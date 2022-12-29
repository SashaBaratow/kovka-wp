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
  
  $pages_list = $post_info_block_fields["infoblock_pages_list"];
  $pages_list_cat = $post_info_block_fields["infoblock_pages_list_cat"];

  $active_name = "Вся техника";
  $active = '';
  $page_id = 0;
  if(is_page() && !is_front_page()) {
    global $post;
    $page_id = $post->ID;
    $active_name = (get_field( "page_title2", $page_id )) ?? $post->page_title;
    $active = 'class="active"';
  }

  ///// GET
  function get_pubs($pages = null){
    if(!$pages) return [];

    $pages_query_args = array(
      'numberposts'  =>  -1,
      'post_type'  =>  'page',
      'include'  =>  $pages,
      'orderby' => 'post__in'
    );
        
    // get the posts with our query arguments
    $pubs_query = get_posts( $pages_query_args );
    $pubs_ready = array();
    foreach ( $pubs_query as $pub ) {
      $pub_id = $pub->ID;
      $pub_item_title = (get_field( "page_title2", $pub_id )) ?? get_the_title( $pub_id );
      $pub_item_permalink = get_permalink( $pub_id );
      $pub_item_descr = apply_filters('the_content', $pub->post_content);
      $pub_item_descr_trim = wp_trim_words( $pub->post_content, 20, '...' );
      
      $pub_image_arr = array();
      $pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($pub_id), 'thumb-product-large');
      $pub_image_src = $pub_image_arr[0];

      $pub_item_ready = array(
        'id' => $pub_id,
        'title' => $pub_item_title,
        'url' => $pub_item_permalink,
        'descr' => $pub_item_descr_trim,
        'image' => $pub_image_src,
      );
      
      
      $pubs_ready[] = $pub_item_ready;
      
    }

    return $pubs_ready;
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

<!-- Service Area Start Here -->
<section id="<?=$block_id;?>" class="pages service-wrap-layout6 <?=($block_white_foreground!="") ? " white-foreground " : "";?> ">
    <div class="container">
        <div class="row">
          <?php if($block_with_heading): ?>
          <div class="col-md-12 col-12">
            <div class="heading-layout1">
              <h2 class="text-center"><?=$block_title?></h2>
              <p class="text-center"><?=$block_subtitle?></p>
            </div>
          </div>
          <?php endif; ?>
          <?php if($pages_list_cat): ?>
            <div class="col-lg-4 col-12 sidebar-break-md sidebar-widget-area">
                <div class="widget widget-service">

                    <div class="service-list">
                        <div class="active-el btn-service-collapse">
                            <span class="active-name"><?=$active_name; ?></span>
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                        <ul id="service-collapse" class="collapse">
                        <?php
                          
                          $pubs_cat_ready = get_pubs($pages_list_cat);
                          $pub_i = 0;
                          foreach ( $pubs_cat_ready as $pub ):
                            $pub_i++;
                        ?>
                        
                            <li>
                                <a <?=((!empty($active) && $pub['id'] == $page_id) ? $active : '')?> href="<?=$pub['url'];?>"><i class="fas fa-long-arrow-alt-right"></i><?=$pub['title'];?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
          <?php endif; ?>
            <div class="<?=((!$pages_list_cat) ? 'col-lg-12' : 'col-lg-8')?> col-12">
              <?php
                $pubs_ready = get_pubs($pages_list);
              ?>
                <div class="row">
                    <?php 
                    if($pubs_ready) :
                      $i = 0;
                      foreach ($pubs_ready as $pub):?>
                        <!-- <?php if($i == 3): $i = 0; ?>
                        </div>
                        <div class="row">
                        <?php endif; ?> -->
                      <div class="col-lg-4 col-md-6 col-6">
                          <div class="service-box-layout6">
                              <div class="item-img">
                                  <a href="<?=$pub['url'];?>"><img src="<?=$pub['image'];?>" alt="<?=$pub['title'];?> - выкуп %v_gorode_regione%"></a>
                              </div>
                              <div class="item-content">
                                  <h3 class="item-title"><a href="<?=$pub['url'];?>"><?=$pub['title'];?></a></h3>
                              </div>
                          </div>
                      </div>
                      <?php $i++; endforeach;?>
                    <?php else: ?>
                      <div class="col-12">
                        <p>Категория пуста.</p>
                      </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Service Area End Here -->
