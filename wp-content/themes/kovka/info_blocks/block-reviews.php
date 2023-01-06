<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$infoblock_review_text = trim($post_info_block_fields["infoblock_review_text"]);

$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top / 16;
$padding_bottom = $block_padding_bottom / 16;
$margin_top = $block_margin_top / 16;
$margin_bottom = $block_margin_bottom / 16;

$block_reviews = array();
//selected / all
$block_type = $post_info_block_fields["infoblock_reviews_type"];


if ($block_type == "all") {
    $block_reviews_query_args = array(
        'numberposts' => -1,
        'posts_per_page' => -1,
        'post_type' => 'review',
    );
    $block_list = get_posts($block_reviews_query_args);
} else {
    $block_list = $post_info_block_fields["infoblock_reviews_list"];
}
$block_list_item = [];
// block_list = all reviews
foreach ($block_list as $list) {
    $id = $list->ID;
    $item = [
        'review_name' => get_field('review_name', $id),
        'review_review' => get_field('review_review', $id),
        'review_rang' => get_field('review_rang', $id),
        'review_position' => get_field('review_position', $id),
        'review_image' => get_field('review_image', $id),
        'review_date' => get_the_date('d.m.y', $id),
        'review_logo' => get_field('review_image_logo', $id),
        'review_scan' => get_field('review_image_scan', $id),
        'review_link' => get_field('review_link_link', $id),
        'review_link_title' => get_field('review_link_title', $id),
        'review_work' => get_field('review_work', $id),
    ];
    $block_list_item[] = $item;
}

?>

<style>
    #<?= $block_id; ?> {
        padding-top: <?= $padding_top?>rem;
        padding-bottom: <?= $padding_bottom?>rem;
        margin-top: <?= $margin_top?>rem;
        margin-bottom: <?= $margin_bottom;?>rem;
        min-height: 400px;
    }
    #<?= $block_id; ?> .revSlider .slick-list.draggable {
        max-width: 50%;
    }
    #<?= $block_id; ?> .revSlider {
        display: flex;
        justify-content: flex-end;
    }
    #<?= $block_id; ?> .revSlider .slick-prev, #<?= $block_id; ?> .revSlider .slick-next {
        opacity: 1 !important;
    }
</style>

<section class="review" id="<?= $block_id; ?>">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="left ">
                    <div class="info" style="text-align: left;">
                        <span class="subtitle text-left"><?= $block_subtitle ?></span>
                        <h3><?= !empty($block_title) ? $block_title : '' ?></h3>
                        <hr>
                        <p><?= $infoblock_review_text ?></p>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="revSlider  slick-slider">
                    <?php foreach ($block_list_item as $block_list_item_data): ?>
                    <div class="slide">
                            <h5><?= $block_list_item_data['review_name']; ?> </h5>
                            <p>
                                <?= mb_strimwidth($block_list_item_data['review_review'], 0, 581, '...'); ?>

                            </p>
                            <div class="stars">
                                <?php
                                    switch ($block_list_item_data['review_rang']){
                                        case 1:
                                            echo ' <i class="icofont-star active"></i>';
                                            break;
                                        case 2:
                                            echo ' <i class="icofont-star active"></i> <i class="icofont-star active"></i>';
                                            break;
                                        case 3:
                                            echo ' <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i>';
                                            break;
                                        case 4:
                                            echo ' <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i>';
                                            break;
                                        case 5:
                                            echo ' <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i> <i class="icofont-star active"></i>';
                                            break;
                                    }
                                ?>

                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>