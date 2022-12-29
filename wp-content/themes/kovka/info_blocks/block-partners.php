<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_image = $post_info_block_fields["infoblock_image"];
$block_partner_btn = $post_info_block_fields["cns_btns"];


$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top_part = $block_padding_top / 16;
$padding_bottom_part = $block_padding_bottom / 16;
$margin_top_part = $block_margin_top_map / 16;
$margin_bottom_part = $block_margin_top / 16;

$block_list = $post_info_block_fields["infoblock_partners"];
//$block_list_type = $post_info_block_fields["infoblock_biglist_type"];
?>
<section class="partners" id="<?= $block_id; ?>">
    <style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_part?>rem;
            padding-bottom:<?= $padding_bottom_part?>rem;
            margin-top: <?= $margin_top_part?>rem;
            margin-bottom:<?= $margin_bottom_part;?>rem;
        }
    </style>
    <div class="container">
        <div class="section-head">
            <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?= $block_title?></h2>
            <?php if ($block_partner_btn ):?>
                <?php foreach($block_partner_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
                    <a href="<?= $header_btns_cns_item['case_btn_link_cns']?>" class="<?php
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
    </div>

    <div class="partners__list">
        <?php foreach($block_list as $block_list_item => $block_list_item_data): ?>
        <div>
            <div class="partners__item">
                <?php $imgId = attachment_url_to_postid ( $block_list_item_data['infoblock_partners_logo'] ); 
                $alt_text = get_post_meta($imgId , '_wp_attachment_image_alt', true);
                $title = get_the_title($imgId); ?>
                <img src="<?= $block_list_item_data['infoblock_partners_logo']?>" alt="<?= $alt_text; ?>" title="<?= $title ?>">
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>