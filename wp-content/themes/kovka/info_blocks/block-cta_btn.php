<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_cta = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_cta = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_cta = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_cta = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image = $post_info_block_fields["infoblock_background_image"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);

$block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];
$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];


$block_btn = $post_info_block_fields["infoblock_btn"];
$block_btn_url = $post_info_block_fields["infoblock_btn_url"];
$block_btn_color = $post_info_block_fields["infoblock_btn_color"];
$block_image = $post_info_block_fields["infoblock_image"];
$block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];

$block_list = $post_info_block_fields["infoblock_biglist"];
$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];
$block_list_is_html = $post_info_block_fields["infoblock_biglist_is_html"];

$image = $block_image['sizes']['gallery_medium'];

$padding_top_cta = $block_padding_top_cta / 16;
$padding_bottom_cta = $block_padding_bottom_cta / 16;
$margin_top_cta  = $block_margin_top_cta / 16;
$margin_bottom_cta  = $block_margin_bottom_cta / 16;
?>

<style>
    #<?= $block_id; ?> {
        padding-top: <?= $padding_top_cta; ?>px;
        padding-bottom: <?= $padding_bottom_cta; ?>px;
        margin-top: <?= $margin_top_cta; ?>px;
        margin-bottom: <?= $margin_bottom_cta; ?>px;
        position: relative;
        <? if (($block_background_color != '') && ($block_background_color != '#ffffff')) { ?>background-color: <?= $block_background_color; ?>;
        <? } ?>
    }

    <? if ($block_white_foreground) { ?>#<?= $block_id; ?> {
        color: #fff;
    }

    <? } ?><? if ($block_background_image != '' && $block_background_enable) { ?><? if ($block_dark_overlay) { ?>#<?= $block_id; ?>:before {
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

<!-- CTA Кнопка -->
<section class="feedback<?= ($block_white_foreground != "") ? " white-foreground " : ""; ?>" id="<?= $block_id; ?>">
    <div class="container">
        <div class="feedback__row">
            <div class="feedback__content <?php if (!$image) {echo 'text-center w-100';} ?>">
                <h2><?= $block_title; ?></h2>
                <p><?= $block_subtitle; ?></p>
                <?php if ($image) { ?>
                <div class="feedback__img">
                    <img src="<?= $image; ?>" alt="">
                </div>
                <?php } ?>
                <a href="<?= $block_btn_url; ?>" class="btn-<?= $block_btn_color; ?> but"><span><?= $block_btn; ?></span></a>
            </div>
            <?php if ($image) { ?>
                <div class="feedback__img">
                    <img src="<?= $image; ?>" alt="">
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<!-- CTA Кнопка х -->