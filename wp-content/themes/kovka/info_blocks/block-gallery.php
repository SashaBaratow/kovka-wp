<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_gal = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_gal = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_gal = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_gal = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

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

$block_list = $post_info_block_fields["infoblock_biglist"];
$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_gall = $post_info_block_fields["infoblock_gallery"];

$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];
$block_list_is_html = $post_info_block_fields["infoblock_biglist_is_html"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = '6';

$padding_top_gal = $block_padding_top_gal / 16;
$padding_bottom_gal = $block_padding_bottom_gal / 16;
$margin_top_gal  = $block_margin_top_gal / 16;
$margin_bottom_gal  = $block_margin_bottom_gal / 16;

$vertical_photo = $post_info_block_fields["vertical_photos"];

switch ($block_list_cols) {
  case 1:
    $block_list_col_class = '1';
    break;
  case 2:
    $block_list_col_class = '2';
    break;
  case 3:
    $block_list_col_class = '3';
    break;
  case 4:
    $block_list_col_class = '4';
    break;
  case 5:
    $block_list_col_class = '5';
    break;
  case 6:
    $block_list_col_class = '6';
    break;
}

?>

<style>
  #<?= $block_id; ?> {
    padding-top: <?= $padding_top_gal; ?>px;
    padding-bottom: <?= $padding_bottom_gal; ?>px;
    margin-top: <?= $margin_top_gal; ?>px;
    margin-bottom: <?= $margin_bottom_gal; ?>px;
    position: relative;
    <? if (($block_background_color != '') && ($block_background_color != '#ffffff')) { ?>background-color: <?= $block_background_color; ?>;
    <? } ?>
  }

  <? if ($block_white_foreground) { ?>#<?= $block_id; ?>h2,
  #<?= $block_id; ?>p {
    color: #ffffff;
  }

  <? } ?><? if ($block_background_image != '' && $block_background_enable) { ?><? if ($block_dark_overlay) { ?>#<?= $block_id; ?>:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: #000;
    opacity: 0.7;
    z-index: 1;
  }

  <? } ?>#<?= $block_id; ?>>div {
    position: relative;
    z-index: 5;
  }

  #<?= $block_id; ?>:after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: url(<?= $block_background_image; ?>);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 0;
  }

  @media only screen and (min-width: 768px) {
    #<?= $block_id; ?>:after {
      background-attachment: fixed;
    }
  }

  @media only screen and (max-width: 767px) {
    #<?= $block_id; ?>:after {
      <?php if ($block_background_image_mobile != "") { ?>background-image: url(<?= $block_background_image_mobile; ?>);
      <?php } ?>
    }
  }

  <? } ?>
</style>

<!-- Галерея -->
<section class="gallery" id="<?= $block_id; ?>">
  <div class="container">
    <h2 class="text-center"><?= $block_title; ?></h2>
    <p class="text-center"><?= $block_subtitle; ?></p>
    <div class="gallery__list" id="gallery-<?= $block_id; ?>">
      <?php
      foreach ($block_gall as $img) { ?>
        <div class="gallery__item  <?= $vertical_photo=='yes' ? 'vertical' : '' ?>"  data-src="<?= $img['url'];?>">
          <img src="<?= $img['url'];?>" alt="">
<!-- 			<div class="d-none"> <? var_dump($img)?> </div> -->
        </div>
      <?php }
      ?>
    </div>
  </div>
</section>
<!-- Галерея х -->

<script>
	function initGall(){
		$('#gallery-<?= $block_id; ?>').lightGallery();
	}
	initGall();
	
	$('#<?= $block_id; ?> .gallery__list').on('init breakpoint', function(event, slick) {
		initGall();
	})
	$('#<?= $block_id; ?> .gallery__list').slick({
		infinite: false,
		arrows: false,
		dots: true,
		slidesToShow: <?= $block_list_col_class; ?>,
		slidesToScroll: 1,
		responsive: [{
				breakpoint: 1198,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					infinite: false,
				}
			},
			{
				breakpoint: 932,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: false,
				}
			}
		]
	});
	
	
		
	
		
</script>