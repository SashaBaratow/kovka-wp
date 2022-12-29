<?php

$post_id = get_the_ID();
$post_type = get_post_type( $post_id );

$page_header_title = get_field("page_header_title", $post_id);
$page_header_subtitle = get_field("page_header_subtitle", $post_id);
$page_header_punkts_text = get_field("page_header_punkts_text", $post_id);
$page_header_text_cns = get_field("page_header_text_cns", $post_id);
$page_header_with_benefits = get_field("page_header_with_benefits", $post_id);
$page_header_benefits = get_field("page_header_benefits", $post_id);
$header_btns_cns = get_field("header_btns_cns", $post_id);
$page_header_image_cns = get_field("page_header_image_cns", $post_id);
$page_header_form_buttons = get_field("page_header_form_buttons", $post_id);

global $post;
?>

<section class="page-header page-header-inner">
    <div class="container">
        <div class="d-flex">
            <div class="page-header__content">
                <?= theme_breadcrumbs(); ?>
                <h1 class="page-header__title"><?= $page_header_title; ?> </h1>
                <div class="page-header__text">
                    <?=  !empty($page_header_subtitle )  ? $page_header_subtitle : '' ?>
                </div>

            </div>
            <div class="page-header__right align-items-end">
                <?php if (!empty($header_btns_cns )):?>
                    <div class="page-header-btn">
                        <?php foreach($header_btns_cns as $header_btns_cns_items => $header_btns_cns_item) { ?>
                            <a href="#popup-consultation" class="<?php
                            switch ($header_btns_cns_item['header_btn_type_cns']) {
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
                            switch ($header_btns_cns_item['header_btn_color_cns']) {
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
                                <?=$header_btns_cns_item['header_btn_name_cns'];?>
                            </a>
                        <?php } ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>