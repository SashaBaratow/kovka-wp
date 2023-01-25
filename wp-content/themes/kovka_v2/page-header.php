<?php

$post_id = get_the_ID();
$post_type = get_post_type( $post_id );

$page_header_title = get_field("page_header_title", $post_id);
$page_header_text_cns = get_field("page_header_text_cns", $post_id);
$page_header_text_cns_down = get_field("page_header_text_cns_down", $post_id);
$page_header_image_cns = get_field("page_header_image_cns", $post_id);
$page_header_btn_text = get_field("header_btn_text", $post_id);
$page_header_btn_link = get_field("header_btn_link", $post_id);

?>
<section class="page-header">
    <div class="left-side">
        <div class="info">
            <h1><?= $page_header_title; ?></h1>
            <hr>
            <p><?= $page_header_text_cns; ?></p>
            <a href="<?= $page_header_btn_link; ?>"><?= $page_header_btn_text; ?></a>
        </div>
    </div>
    <div class="right-side" style="background-image: url('<?= get_template_directory_uri()?>/assets/img/r-slider.jpg');">
    <?php if (!empty($page_header_text_cns_down)): ?>
    <div class="info">
            <p>
                <?= $page_header_text_cns_down; ?> <br>
            </p>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php if (!empty($page_header_text_cns_down)): ?>
<div class="info-mob">
    <p>
       <?= $page_header_text_cns_down; ?> <br>
    </p>
</div>
<?php endif; ?>