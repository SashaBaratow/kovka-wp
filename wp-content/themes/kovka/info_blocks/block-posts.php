<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_posts = $post_info_block_fields["infoblock_posts"];
$posts_id = [];


$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top / 16;
$padding_bottom = $block_padding_bottom / 16;
$margin_top = $block_margin_top / 16;
$margin_bottom = $block_margin_bottom / 16;

foreach ($block_posts as $post) {
    $posts_id[] = $post->ID;
}
?>


<section class="news" id="<?=$block_id;?>">
    <style>
        .news {
            padding-top:<?= $padding_top?>rem;
            padding-bottom:<?= $padding_bottom?>rem;
            margin-top: <?= $margin_top?>rem;
            margin-bottom:<?= $margin_bottom;?>rem;
        }
        .news__list {
            display: flex;
            margin: 0 -0.56rem;
            flex-wrap: wrap;
        }
        .news__list a{
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <div class="section-head">
            <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?= $block_title ?></h2>
        </div>
        <div class="news__list">
            <?php
            // параметры по умолчанию
            $my_posts = get_posts(array(
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'ACS',
                'include' => $posts_id,
                'post_type' => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
//            the_date('d-m-Y');
            global $post;

            foreach ($my_posts as $post) {
                setup_postdata($post); ?>
<!--                    --><?php //var_dump($post);?>
                <a href="<?= the_permalink();?>" class="news__item ">
                    <div class="news__head">
                        <img src="<?= get_the_post_thumbnail_url( $post->ID, 'full' );?>" alt="">
                        <h3 class="news__title"><?= the_title()?></h3>
                    </div>
                    <div class="news__info">
                        <div class="news__data"> <?php the_time('d/m/Y') ?> </div>
                        <?php $category = get_the_category( $post->ID );
                            foreach ($category as $cat){ ?>
                                <div class="news__cat"><?= $cat->name?></div>
                            <?php }
                        ?>
                    </div>
                    <p><?= the_excerpt()?></p>
                    <span class="btn dark-btn text-btn dark-text">Читать</span>
                </a>
            <?php }
            wp_reset_postdata(); // сброс
            ?>
        </div>
    </div>
</section>





