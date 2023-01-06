<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);


$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top / 16;
$padding_bottom = $block_padding_bottom / 16;
$margin_top = $block_margin_top / 16;
$margin_bottom = $block_margin_bottom / 16;

?>
<section class="block" id="<?=$block_id;?>" >
    <div class="container">
        <div class="info d-flex flex-column justify-content-center align-items-center">
            <span class="subtitle"> <?= $block_subtitle ?> </span>
            <h3 class="main-title mb-0"> <?= $block_title ?> </h3>
        </div>
        <div class="blog_wrap blogcar_id1  slick-slider">
            <?php
            // параметры по умолчанию
            $my_posts = get_posts(array(
                'numberposts' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            global $post;

            foreach ($my_posts as $post) {
            setup_postdata($post); ?>
                <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 374px;" tabindex="-1">
                <div class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                    <div class="busi_singleBlog">
                        <div class="witr_sb_thumb">
                            <a href="<?= the_permalink(); ?>" tabindex="-1">
                                <img width="390" height="350" src="<?= the_post_thumbnail_url();?>" class="attachment-akin-blog-default size-akin-blog-default wp-post-image" alt="" decoding="async" loading="lazy">
                            </a>
                            <div class="witr_top_category">
                            </div>
                        </div>
                        <div class="all_blog_color">
                            <div class="witr_blog_con bs5">
                                <h2>
                                    <a href="<?= the_permalink(); ?>" tabindex="-1">
                                        <?= the_title(); ?>
                                    </a>
                                </h2>
                                <p> <?= the_excerpt(); ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                wp_reset_postdata(); // сброс
            ?>
        </div>
    </div>
</section>













