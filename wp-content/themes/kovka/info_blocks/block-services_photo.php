<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$infoblock_services_photo_list = $post_info_block_fields["infoblock_services_photo_list"];


$block_padding_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top_ben / 16;
$padding_bottom = $block_padding_bottom_ben / 16;
$margin_top = $block_margin_top_ben / 16;
$margin_bottom = $block_margin_bottom_ben / 16;


$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';
//my variables

switch ($block_list_cols) {
    case 1:
        $block_list_col_class = 'col-12 col-sm-12 col-md-12';
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

<style>
    #<?= $block_id; ?> {
        padding-top:<?= $padding_top?>rem;
        padding-bottom:<?= $padding_bottom?>rem;
        margin-top: <?= $margin_top?>rem;
        margin-bottom:<?= $margin_bottom;?>rem;
    }
</style>

<section id="<?= $block_id; ?>" class="service-photo">
    <div class="container">
        <span class="subtitle">  <?= $block_subtitle ?></span>
        <h3 class="main-title text-center w-100 mb-3"> <?= $block_title ?> </h3>
        <hr>
        <div class="row mt-5 flex-wrap justify-content-between">
            <?php foreach ($infoblock_services_photo_list as $info_item): ?>
            <div class="<?= $block_list_col_class; ?> mb-5">
                <div class="service-photo-item">
                    <div class="photo-block">
                        <img class="photo" src="<?= $info_item['services_icon_img'] ?>" alt="">
                    </div>
                    <div class="block-desc">
                        <h3> <?= $info_item['services_icon_title'] ?> </h3>
                        <p><?= $info_item['services_icon_text'] ?></p>
                        <a href="<?= $info_item['services_icon_link'] ?>"> + </a>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

