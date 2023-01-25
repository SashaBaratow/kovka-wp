<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_pr_list = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_pr_list = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_pr_list = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_pr_list = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image = $post_info_block_fields["infoblock_background_image"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);

$block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];
$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];

$block_contacts = $post_info_block_fields["infoblock_price_list"];
// whatsapp_btn
$block_btn = $post_info_block_fields["infoblock_banner_btn"];
$block_btn_link1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_link"];
$block_btn_text1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_text"];
$block_btn_color1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_color"];

$block_btn_link2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_link"];
$block_btn_text2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_text"];
$block_btn_color2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_color"];

$block_btn_wa = $block_btn['infoblock_banner_btn_1']["infoblock_banner_wa"];
$block_btn_wa2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_wa"];

$priceArr = [];

$padding_top_pr_list = $block_padding_top_pr_list / 16;
$padding_bottom_pr_list = $block_padding_bottom_pr_list / 16;
$margin_top_pr_list = $block_margin_top_pr_list / 16;
$margin_bottom_pr_list = $block_margin_bottom_pr_list / 16;

?>


<style>
    #<?= $block_id; ?> {
        padding-top: <?= $padding_top_pr_list; ?>px;
        padding-bottom: <?= $padding_bottom_pr_list; ?>px;
        margin-top: <?= $margin_top_pr_list; ?>px;
        margin-bottom: <?= $margin_bottom_pr_list; ?>px;
        position: relative;
        <? if (($block_background_color != '') && ($block_background_color != '#ffffff')) { ?>background-color: <?= $block_background_color; ?>;
        <? } ?>
    }

    <? if ($block_background_image != '') { ?><? if ($block_dark_overlay) { ?>#<?= $block_id; ?>:before {
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

<!-- Прайс-лист -->
<section id="<?= $block_id; ?>" class="price-list<?= ($block_white_foreground != "") ? " white-foreground " : ""; ?>">
    <div class="container">
        <h2 class="text-center"><?= $block_title; ?></h2>
        <div class="price-list__list row justify-content-center">
            <?php
            foreach ($block_contacts as $col) {
                if ($col["pricelist_col_type"] == "price") { ?>
                    <div class="col-sm-12 col-lg-4">
                        <div class="price-list__item <?= $col['pricelist_col_total']['pricelist_col_hit'][0]; ?>">
                            <span><?= $col['pricelist_col_total']['pricelist_col_sum']; ?> ₽</span>
                            <?php
                            if (preg_match("/(?<=[—_ ])?[0-9]+$/", $col['pricelist_col_total']['pricelist_col_sum'], $match)) {
                                $priceArr[] = reset($match);
                            };
                            ?>
                            <p>
                                <?= $col['pricelist_col_total']['pricelist_col_text']; ?>
                            </p>
							<?php if(!wp_is_mobile()){?> 						
                            <a href="<?= $col['pricelist_col_total']['pricelist_col_link']; ?>" class="btn-orange but custom-link" data-price="<?= $col['pricelist_col_total']['pricelist_col_sum']; ?>"><span><?= $col['pricelist_col_total']['pricelist_col_btn-name']; ?></span></a>
							<?}?>
<!-- start adding whatsapp btn -->
			 <div class="banner__btn-row">
				 <div class="d-none">
				 	<? var_dump($block_btn_color1)?>
				 </div>
            <?php if ($block_btn_link1 != '' && wp_is_mobile() || $block_btn_color1 == 'green' && wp_is_mobile()) { ?>
                <?php if ($block_btn_color1 == 'green') { ?>
                    <a href="https://api.whatsapp.com/send?phone=79117056060%20&text=<?= $block_btn_wa ?>" target="_blank" class="banner__btn btn-<?= $block_btn_color1; ?> but">
                <?php } else{ ?>
                    <a href="<?= $block_btn_link1; ?>" class="banner__btn btn-<?= $block_btn_color1; ?> but">
                <?php }?>
                    <span><?= $block_btn_text1; ?></span>
                </a>
            <?php } ?>

        </div>			
<!-- end adding whatsapp btn -->
							
                        </div>
                    </div>
                <?php } elseif ($col["pricelist_col_type"] == "gall") { ?>
                    <div class="col-md-12 col-sm-12 col-lg-4">
                        <div class="price-list__gall">
                            <div class="price-gall-list">
                                <?php
                                foreach ($col['pricelist_col_gall'] as $item) { ?>
                                    <div>
                                        <img src="<?= $item['sizes']['gallery_medium']; ?>" alt="">
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="price-gall-list__dot"></div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
</section>
<!-- Прайс-лист x -->


<?php
SchemaORGRegistry::setAssoc('priceList_two', $block_id, $priceArr);

?>