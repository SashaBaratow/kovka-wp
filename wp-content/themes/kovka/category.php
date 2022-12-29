<?php
get_header();

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_posts = $post_info_block_fields["infoblock_lastposts_add"];
$posts_id = [];


$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top / 16;
$padding_bottom = $block_padding_bottom / 16;
$margin_top = $block_margin_top / 16;
$margin_bottom = $block_margin_bottom / 16;

?>


<section class="news last-news" id="<?=$block_id;?>">
    <style>
        #<?=$block_id;?> {
            padding-top:<?= $padding_top?>rem;
            padding-bottom:<?= $padding_bottom?>rem;
            margin-top: <?= $margin_top?>rem;
            margin-bottom:<?= $margin_bottom;?>rem;
        }
        #<?=$block_id;?> .news__list {
            display: flex;
            margin: 0 -0.56rem;
            flex-wrap: wrap;
        }
        #<?=$block_id;?> .news__list a{
            margin-bottom: 30px;
        }
        #news-list-wrap{
          flex-wrap: wrap;
          margin-bottom: 50px;
        }
        #news-list-wrap .news__item{
          flex-wrap: wrap;
          margin-bottom: 20px;
        }
    </style>
    <div class="container">
    <?= theme_breadcrumbs(); ?>
        <div class="section-head">
            <h1 class="section-title" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> >Новости и статьи</h1>
        </div>	
        <div class="news__list" id="news-list-wrap">
            <?php
            // параметры по умолчанию
            $my_posts = get_posts(array(
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'ACS',
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
                        <img src="<?= get_the_post_thumbnail_url( $post->ID, 'full' );?>" alt="<?= the_title()?>" title="Читать: <?= the_title()?>">
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

<?php get_footer();











