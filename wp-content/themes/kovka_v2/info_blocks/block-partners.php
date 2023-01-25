<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_text = trim($post_info_block_fields["infoblock_text_img_text"]);


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
<style>
    #<?= $block_id; ?> {
        padding-top:<?= $padding_top_part?>rem;
        padding-bottom:<?= $padding_bottom_part?>rem;
        margin-top: <?= $margin_top_part?>rem;
        margin-bottom:<?= $margin_bottom_part;?>rem;
    }
    #<?= $block_id; ?> .swiper-wrapper a img, #<?= $block_id; ?> .swiper-wrapper a picture {
        max-height: 50px;
    }
</style>
<section class="partners" id="<?= $block_id; ?>" >
    <div class="container">
        <div class="info mb-5">
            <span class="subtitle"> <?= $block_subtitle ?> </span>
            <h3> <?= $block_title?> </h3>
            <hr>
            <p> <?= $block_text ?> </p>
        </div>
        <div class="swiper partSwiper">
            <div class="swiper-wrapper">
                <?php foreach($block_list as $block_list_item => $block_list_item_data): ?>
                    <?php $imgId = attachment_url_to_postid ( $block_list_item_data['infoblock_partners_logo'] );
                    $alt_text = get_post_meta($imgId , '_wp_attachment_image_alt', true);
                    $title = get_the_title($imgId); ?>
                    <a href="<?= $block_list_item_data['infoblock_partners_link']?>" class="swiper-slide">
                        <img src="<?= $block_list_item_data['infoblock_partners_logo']?>" alt="<?= $alt_text; ?>" title="<?= $title ?>">
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>