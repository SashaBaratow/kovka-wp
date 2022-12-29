<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_sub_title = trim($post_info_block_fields["infoblock_subtitle"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);

$block_padding_top_ser = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_ser = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_ser = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_ser = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top_ser = $block_padding_top_ser / 16;
$padding_bottom_ser = $block_padding_bottom_ser / 16;
$margin_top_ser = $block_margin_top_ser / 16;
$margin_bottom_ser = $block_margin_bottom_ser / 16;


$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image = $post_info_block_fields["infoblock_background_image"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);


$block_btn = $post_info_block_fields["infoblock_btn"];
$block_btn_url = $post_info_block_fields["infoblock_btn_url"];
$block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];

$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];


$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';
//my variables
$block_list = $post_info_block_fields["infoblock_serviceslist"];
$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_image = $post_info_block_fields["image"];
$block_image_bg = $post_info_block_fields["service_img_bg"];
$block_service_name = $post_info_block_fields["name"];
$block_service_text = $post_info_block_fields["servise_text"];
$block_btn_service_cns = $post_info_block_fields["btns_service_cns"];
?>
<!-- Преимущества -->
<section class="services"  id="<?= $block_id; ?>">
    <style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_ser?>rem;
            padding-bottom:<?= $padding_bottom_ser?>rem;
            margin-top: <?= $margin_top_ser?>rem;
            margin-bottom:<?= $margin_bottom_ser?>rem;
        }
        .services .section-head span{
            max-width: 28.25rem;
            text-align: right;
            font-size: 0.94rem;
            color: #787772;
        }

        .services__item {
            width: calc(100% / 3 - 1.12rem);
        }
        .services__item-head.head-margin img {
            margin: 1.25rem 0;
        }
    </style>
    <div class="container">
        <div class="section-head">
            <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?=$block_title?></h2>
            <span><?= $block_sub_title?></span>
        </div>
        <div class="services__list">
            <?php foreach ($block_list as $block_list_item => $block_list_item_data) :?>
                <div class="services__item <?= $block_list_item_data['infoblock_servise_icon_aligment'] ?>">
                    <div class="services__item-head <?= $block_list_item_data['service_img_bg'] ? 'head-bg' : 'head-margin'?> ">
                        <img src="<?=$block_list_item_data['image']?>" alt="<?=$block_list_item_data['name']?>" title="<?=$block_list_item_data['name']?> - <?=$block_list_item_data['servise_text']?>">
                    </div>
                    <div class="services__item-descr">
                        <h3><?=$block_list_item_data['name']?></h3>
                        <p><?=$block_list_item_data['servise_text']?></p>
                        <?php foreach($block_list_item_data['btns_service_cns'] as $header_btns_cns_items => $header_btns_cns_item) { ?>
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
                        <?php }?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!-- Преимущества х -->

