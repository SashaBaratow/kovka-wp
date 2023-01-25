<?php
$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_btn = trim($post_info_block_fields["infoblock_btn"]);

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

$services_list = $post_info_block_fields["infoblock_serviceslist_v2"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';

switch ($block_list_cols) {
  case 1:
    $block_list_col_class = 'col-12 col-sm-12 col-md-12 biglist-col-single';
    $img_height = "535";
    break;
  case 2:
    $block_list_col_class = 'col-12 col-sm-6 col-md-6';
    $img_height = "535";
    break;
  case 3:
    $block_list_col_class = 'col-12 col-sm-12 col-md-6 col-lg-4';
    $img_height = "345";
    break;
  case 4:
    $block_list_col_class = 'col-12 col-sm-12 col-sm-4 col-md-3';
    $img_height = "256";
    break;
  case 5:
    $block_list_col_class = 'col-12 col-sm-4 col-md-2';
    $img_height = "170px";
    break;
  case 6:
    $block_list_col_class = 'col-12 col-sm-4 col-md-2';
    $img_height = "170px";
    break;
}

$priceArr = [];

$navItem = false;


foreach ($services_list as $services_item => $service_item_data) {
  if (strpos($service_item_data['service_url'], '#') !== false) {
    
  }else{
    $navItem = true;
  }
};



?>

<style>
	#<?= $block_id; ?> {
		padding-top: <?= $block_padding_top; ?>px;
		padding-bottom: <?= $block_padding_bottom; ?>px;
		margin-top: <?= $block_margin_top; ?>px;
		margin-bottom: <?= $block_margin_bottom; ?>px;
		position: relative;
		<? if (($block_background_color != '') && ($block_background_color != '#ffffff')) { ?>background-color: <?= $block_background_color; ?>;
		<? } ?>
	}
	<? if ($block_background_image != '' && $block_background_enable) { ?><? if ($block_dark_overlay) { ?>#<?= $block_id; ?>:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.5;
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
<section id="<?= $block_id; ?>" class="services-v2 <?= ($block_white_foreground != "") ? " white-foreground " : ""; ?> ">
	<div class="container">
		<h2 class="text-center"><?= $block_title; ?></h2>
		<p class="text-center"><?= $block_subtitle; ?></p>
		<div class="services-v2__list row" <?php if($navItem) echo 'itemscope itemtype="http://www.schema.org/SiteNavigationElement"' ?> >
			<?php if (!empty($services_list)) { ?>
				<?php foreach ($services_list as $services_item => $service_item_data) { ?>
					<div class="<?= $block_list_col_class; ?> mb-20">
						<?php if ($service_item_data['service_url']) { ?>
						
<!--  start 						 -->
				
						<div  class="services-v2__item custom-link" data-name="<?= $service_item_data['service_title']; ?>" data-wa="<?= $service_item_data['infoblock_wa_text']; ?>" <?php if($navItem) echo 'itemprop="url"' ?>>
						<?php } else { ?>
							<div class="services-v2__item">
						<?php } ?>

							<h3 class="services-v2__title" <?php if($navItem) echo 'itemprop="name"' ?>><?= $service_item_data['service_title']; ?></h3>
							<a href="<?= $service_item_data['service_url']; ?>" class="services-v2__img-wrap">
                <?php 
                  if(!empty( $service_item_data['service_img_list'] )) { ?>
                    <div class="price-list__gall">
                        <div class="price-gall-list">
                            <?php
                            foreach ($service_item_data['service_img_list'] as $item) { ?>
                            <div>
                              <img src="<?= $item['url']; ?>" alt=""  style="height:<?= $img_height; ?>px">
                            </div>
                            <?php }
                            ?>
                        </div>
                        <div class="price-gall-list__dot"></div>
                    </div>
                  <? }else { ?>
                    <img src="<?= $service_item_data['service_img']['sizes']['gallery_medium']; ?>" style="height:<?= $img_height; ?>px" alt="" class="services-v2__img">
                  <? } ?>
							</a>
							<?php if($service_item_data['service_price'] != ''){ ?>
                <span class="services-v2__price"><?= $service_item_data['service_price']; ?> ₽</span>
                <?php 
                if (preg_match("/(?<=[—_ ])?[0-9]+$/", $service_item_data['service_price'], $match)) {
                  $priceArr[] = reset($match);
                 };
                ?>
                
              <?php } ?>
							
							<p>
								<?= $service_item_data['service_descr']; ?>
							</p>
							<?php if($block_btn != ''){?>
							<a href="<?= $service_item_data['service_url']; ?>" class="btn-burgundy but"><span ><?= $block_btn; ?></span></a>
							<?php } ?>
					<?php if ($service_item_data['service_url']) { ?>
					</div>
          
							
<!-- end 							 -->
							
					<?php } else { ?>
					</div>
					<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
</section>
<?php 
SchemaORGRegistry::setAssoc('priceList', $block_id, $priceArr);
?>
<script>
$(document).ready(function() {
	let mh = 0;
	$("#<?= $block_id; ?> .services-v2__title").each(function () {
	       var h_block = parseInt($(this).height());
	       if(h_block > mh) {
	         mh = h_block;
	       };
	   });
	$("#<?= $block_id; ?> .services-v2__title").css('min-height', mh);
	if (window.matchMedia('(max-width: 767px)').matches) {
		$('div.services-v2__item').each(function( ) {
			$(this).off();
			$(this).removeClass('custom-link');
      let text = $(this).data('wa');
 			
			$(this).attr("target", "_blank");
			$(this).find('.but').removeClass('btn-burgundy').addClass('btn-green whatsApp');
			$(this).find('.but').attr('href', `https://api.whatsapp.com/send?phone=79117056060&text=${text}`);
		});
	}
  $('.services-v2__item .price-list__gall').click(function (e) {
    e.stopPropagation();    
    e.preventDefault();
  });
})
</script>