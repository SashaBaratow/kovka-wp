<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);


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
    }
    <? if ($block_background_image != '') { ?><? if ($block_dark_overlay) { ?>
    #
    <?= $block_id; ?>:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.7;
        z-index: -1;
    }

    <? } ?>
    #
    <?= $block_id; ?>:after {
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
        z-index: -2;
    }

    @media only screen and (min-width: 768px) {
    #<?= $block_id; ?>:after {
        background-attachment: fixed;
    }
    }

    @media only screen and (max-width: 767px) {
    #<?= $block_id; ?>:after {
        <?php if ($block_background_image_mobile != "") { ?> background-image: url(<?= $block_background_image_mobile; ?>);
    <?php } ?>
    }
    }

    <? } ?>
</style>
<section class="reviews" style="padding: 40px 0;">
    <div class="container">
        <div class="d-flex reviews__wrap-head">
            <h2 class="section-title" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> > <?= !empty($block_title) ? $block_title : '' ?> </h2>
            <div class="dots-container"></div>
        </div>

        <div class="reviews-wrap">

            <div class="reviews__list">
                <?php foreach ($block_list_item as $block_list_item_data): ?>
                <?php $counter = 1;?>
                    <div>
                        <div class="reviews__item d-flex">

                            <div class="reviews__img-block">
                                <a href="<?= $block_list_item_data['review_scan'] ?>" data-fancybox >
                                    <img src="<?= $block_list_item_data['review_image'] ?>" alt="Чиать отзыв: <?= $block_list_item_data['review_name']; ?> - <?= $block_list_item_data['review_work']; ?>" title="Читать отзыв о компании CNS: <?= $block_list_item_data['review_name']; ?> - <?= $block_list_item_data['review_work']; ?>">
                                </a>
                            </div>
                            <div  id="dialog-content<?= $counter;?>" style="display:none;">
                                <img src="<?= $block_list_item_data['review_scan'] ?>" alt="Отзыв: <?= $block_list_item_data['review_name']; ?> - <?= $block_list_item_data['review_work']; ?>" title="Отзыв о компании CNS: <?= $block_list_item_data['review_name']; ?> - <?= $block_list_item_data['review_work']; ?>">
                            </div>
                            <div class="reviews__content">
                                <div class="reviews__item-head d-flex">
                                    <img src="<?= $block_list_item_data['review_logo'] ?>" alt="">
                                    <div class="reviews__user">
                                        <h3 class="reviews__item-title"><?= $block_list_item_data['review_name']; ?></h3>
                                        <?php if (!empty($block_list_item_data['review_work'])): ?>
                                            <span><?= $block_list_item_data['review_work']; ?> </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="stars">
                                        <?= $block_list_item_data['review_rang']; ?>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.3337 8.41678C18.417 8.00011 18.0837 7.50011 17.667 7.50011L12.917 6.83344L10.7503 2.50011C10.667 2.33344 10.5837 2.25011 10.417 2.16678C10.0003 1.91678 9.50033 2.08344 9.25033 2.50011L7.16699 6.83344L2.41699 7.50011C2.16699 7.50011 2.00033 7.58345 1.91699 7.75011C1.58366 8.08345 1.58366 8.58344 1.91699 8.91678L5.33366 12.2501L4.50033 17.0001C4.50033 17.1668 4.50033 17.3334 4.58366 17.5001C4.83366 17.9168 5.33366 18.0834 5.75033 17.8334L10.0003 15.5834L14.2503 17.8334C14.3337 17.9168 14.5003 17.9168 14.667 17.9168C14.7503 17.9168 14.7503 17.9168 14.8337 17.9168C15.2503 17.8334 15.5837 17.4168 15.5003 16.9168L14.667 12.1668L18.0837 8.83344C18.2503 8.75011 18.3337 8.58345 18.3337 8.41678Z"
                                                  fill="#E31B08"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="reviews__text">
                                    <?= mb_strimwidth($block_list_item_data['review_review'], 0, 581, '...'); ?>
                                </div>
                            </div>
                        </div>
                        <a href="<?= $block_list_item_data['review_scan'] ?>" data-fancybox class="btn text-btn dark-text">
                            <?= $block_list_item_data['review_link_title'] ?>
                        </a>
                        <!-- <a href="" data-fancybox data-src="#dialog-content<?= $counter;?>" class="btn text-btn dark-text">
                            <?= $block_list_item_data['review_link_title'] ?>
                        </a> -->
                    </div>
                    <?php $counter++;?>
                <?php endforeach; ?>
            </div>
            <div class="slide-btn-wrap"></div>
        </div>
    </div>
</section>