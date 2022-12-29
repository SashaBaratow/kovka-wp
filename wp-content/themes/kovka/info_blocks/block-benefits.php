<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top_ben / 16;
$padding_bottom = $block_padding_bottom_ben / 16;
$margin_top = $block_margin_top_ben / 16;
$margin_bottom = $block_margin_bottom_ben / 16;


$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image = $post_info_block_fields["infoblock_background_image"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);


$block_btn = $post_info_block_fields["infoblock_btn"];
$block_btn_url = $post_info_block_fields["infoblock_btn_url"];
$block_image = $post_info_block_fields["infoblock_image"];
$block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];

$block_list = $post_info_block_fields["infoblock_biglist"];
$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];



$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';
//my variables
$cns_btn = $post_info_block_fields["cns_btns"];
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
<!-- Преимущества -->

<section class="benefits" id="<?= $block_id; ?>">
    <style>
         #<?= $block_id; ?> {
             padding-top:<?= $padding_top?>rem;
             padding-bottom:<?= $padding_bottom?>rem;
             margin-top: <?= $margin_top?>rem;
             margin-bottom:<?= $margin_bottom;?>rem;
         }

         .benefits__img.illustration {
                width: <?= $block_list_icon_width ?>;
                min-width: <?= $block_list_icon_width ?> ;
                height: auto;
                background: none;
         }
         .benefits__img {
                width: <?= $block_list_icon_width ?>;
                min-width: <?= $block_list_icon_width ?> ;
                height: auto;
         }

        .benefits__item {
            <?php switch ($block_list_cols) {
            case 1: ?>
            width: 100%;
           <?php break;
            case 2: ?>
            width: calc(100% / 2 - 1.08rem);
           <?php
            break;
            case 3: ?>
            width: calc(100% / 3 - 1.08rem);
            <?php break;
            case 4: ?>
            width: calc(100% / 4 - 1.08rem);
            <?php break;
            case 5: ?>
            width: calc(100% / 5 - 1.08rem);
            <?php break;
            case 6: ?>
            width: calc(100% / 6 - 1.08rem);
            <?php break;
        }

        ?>
        }
        .benefits__list {
            flex-wrap: wrap;
        }
    </style>
    <div class="container">
        <div class="section-head">
            <?php if ($block_title != '') { ?>
                <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?>><?= $block_title; ?></h2>
            <?php } ?>
            <?php if (!empty($cns_btn )):?>
                <?php foreach($cns_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
                    <a href="<?=$header_btns_cns_item['case_btn_link_cns']?>" class="<?php
                    switch ($header_btns_cns_item['case_btn_type_cns']) {
                        case 'link':
                            echo "link";
                            break;
                        case 'colored':
                            echo " btn";
                            break;
                        case 'bordered':
                            echo " btn outline-btn";
                            break;
                    }
                    switch ($header_btns_cns_item['case_btn_color_cns']) {
                        case 'red':
                            echo " red-btn";
                            break;
                        case 'blue':
                            echo " hell-blue-btn";
                            break;
                        case 'dark_blue':
                            echo " blue-btn";
                            break;
                    }
                    ?> ">
                        <?=$header_btns_cns_item['case_btn_name_cns'];?>
                    </a>
                <?php } ?>
            <?php endif;?>
        </div>
        <div class="benefits__list">
            <?php
            $bl_i = 0;
            foreach ($block_list as $block_list_item => $block_list_item_data) :
                $bl_i++;
                $has_icon = (($block_list_type == "img" && $block_list_item_data['icon'] != "") || ($block_list_type == "num") ? true : false);
                $has_icon_left = (($block_list_type == "img" && $block_list_item_data['icon'] != "" && $block_list_icon_aligment == "left") || ($block_list_type == "num" && $block_list_icon_aligment == "left") ? true : false);
                $img = $block_list_item_data['infoblock_image'];
                ?>
                <div class="benefits__item <?= $block_list_icon_aligment; ?> ">
                    <?php if (!empty($block_list_item_data['infoblock_illustratio_cns']) && $block_list_type == 'illustratio' ):?>
                        <div class="benefits__img <?= 'illustration' ?>">
                            <img src="<?= $block_list_item_data['infoblock_illustratio_cns']?>" style="width:<?= $block_list_icon_width; ?>; width: 100%;" alt="<?= !empty($block_list_item_data['infoblock_illustratio_cns_alt']) ? $block_list_item_data['infoblock_illustratio_cns_alt'] : ''?>">
                        </div>
                    <?php endif; ?>
                    <?php if ($has_icon) : ?>
                        <?php if (($block_list_type == "img") && ($block_list_item_data['icon'] != "")) : ?>
                            <div class="benefits__img">
                                <img src="<?= $block_list_item_data['icon']; ?>" style="width:<?= $block_list_icon_width; ?>" title="<?= $block_list_item_data['title']; ?> - <?= $block_list_item_data['descr']; ?>" alt="<?= $block_list_item_data['title']; ?>" class="benefits__icon">
                            </div>
                        <?php elseif ($block_list_type == "num") : ?>
                            <div class="benefits__img <?= 'num'?>">
                                <span style="font-size: 50px;color:<?= $block_list_num_color; ?>!important;"><?= $block_list_item_data['number']; ?></span>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="benefits__descr">
                        <h3><?= $block_list_item_data['title']; ?></h3>
                        <p><?= $block_list_item_data['descr']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Преимущества х -->
