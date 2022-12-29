<?php
$pub_id = $post->ID;
$pub_item_title = get_the_title();
$pub_item_permalink = get_permalink();
$pub_item_descr = get_the_content('');
$pub_item_cats = get_the_terms($pub_id, 'category');
$pub_item_descr_trim = wp_trim_words($pub_item_descr, 11, '...');

$pub_item_date = get_the_date('j F Y');
$pub_image_arr = array();
$pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
$pub_image_src = $pub_image_arr[0];

?>
<div class="col-md-4">
    <a href="<?= $pub_item_permalink; ?>" class="last-news__item">
        <div class="last-news__img-wrap">
            <img src="<?= $pub_image_src; ?>" alt="<?= $pub_item_title; ?>" class="last-news__img">
            <h3><?= $pub_item_title; ?></h3>
        </div>
        <span class="last-news__date"><?= $pub_item_date; ?></span>
        <p class="last-news__descr"><?= $pub_item_descr_trim  ?></p>
    </a>
</div>
