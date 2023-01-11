<?php

$post_id = get_the_ID();
$post_type = get_post_type( $post_id );

$page_header_title = get_field("page_header_title", $post_id);
$page_header_image_cns = get_field("page_header_image_cns", $post_id);
$page_header_form_buttons = get_field("page_header_form_buttons", $post_id);

global $post;
?>

<section class="simple-page-header mb-5" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/breck-kum-1.jpg');">
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 txtc  text-center ccase">
                    <div class="brpt brptsize">
                        <h2> <?=  !empty($page_header_subtitle )  ? $page_header_subtitle : '' ?> </h2>
                    </div>
                    <div class="breadcumb-inner">
                        <?= theme_breadcrumbs(); ?>
<!--                        <ul>Вы сейчас здесь!<i class="icofont-thin-right"></i>-->
<!--                            <li><a href="/" rel="v:url" property="v:title">Home</a>-->
<!--                            </li>-->
<!--                            <i class="icofont-thin-right"></i><span class="current">About</span></ul>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>