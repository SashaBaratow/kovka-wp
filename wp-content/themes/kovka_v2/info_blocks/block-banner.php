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

$block_list = $post_info_block_fields["infoblock_clientlist"];

$block_list_img_width = $post_info_block_fields["infoblock_list_img_width"];
$block_btn = $post_info_block_fields["infoblock_banner_btn"];

$block_btn_link1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_link"];
$block_btn_text1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_text"];
$block_btn_color1 = $block_btn['infoblock_banner_btn_1']["infoblock_banner_btn_color"];

$block_btn_link2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_link"];
$block_btn_text2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_text"];
$block_btn_color2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_btn_color"];

$block_btn_wa = $block_btn['infoblock_banner_btn_1']["infoblock_banner_wa"];
$block_btn_wa2 = $block_btn['infoblock_banner_btn_2']["infoblock_banner_wa"];

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
</style>


<section id="<?= $block_id; ?>" class="banner <?= ($block_white_foreground != "") ? " white-foreground " : ""; ?> ">
    <img src="<?= $block_background_image; ?>" alt="" class="banner-bg">
    <div class="banner__content">
        <h1><?= $block_title; ?></h1>
        <p><?= $block_subtitle; ?></p>
        <div class="banner__btn-row">
            <?php if ($block_btn_link1 != '' || $block_btn_color1 == 'green') { ?>
                <?php if ($block_btn_color1 == 'green') { ?>
                    <a href="https://api.whatsapp.com/send?phone=79117056060%20&text=<?= $block_btn_wa ?>" target="_blank" class="banner__btn btn-<?= $block_btn_color1; ?> but">
                <?php } else{ ?>
                    <a href="<?= $block_btn_link1; ?>" class="banner__btn btn-<?= $block_btn_color1; ?> but">
                <?php }?>
                    <span><?= $block_btn_text1; ?></span>
                </a>
            <?php } ?>
            <?php if ($block_btn_link2 != '' || $block_btn_color2 == 'green') { ?>
                <?php if ($block_btn_color2 == 'green') { ?>
                    <a href="https://api.whatsapp.com/send?phone=79117056060%20&text=<?= $block_btn_wa2 ?>" target="_blank" class="banner__btn btn-<?= $block_btn_color2; ?> but">
                <?php } else{ ?>
                    <a href="<?= $block_btn_link2; ?>" class="banner__btn btn-<?= $block_btn_color2; ?> but">
                <?php }?>
                    <span><?= $block_btn_text2; ?></span>
                </a>
            <?php } ?>
            
        </div>
    </div>
</section>
<?php
if (!is_front_page()) { ?>
    <div class="container">
        <?php get_template_part('breadcrumbs', ''); ?>
    </div>
<?php }
?>