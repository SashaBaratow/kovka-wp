<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();

        $pub_id = $post->ID;
        $pub_item_title = get_the_title();
        $pub_item_permalink = get_permalink();
        $pub_item_descr = get_the_content('');
        $pub_item_cats = get_the_terms($pub_id, 'category');
        $team_position = get_field('team_position', $post_id);
        $team_img = get_field("team_img", $post_id)['sizes']['gallery_medium'];
        $block_gall = get_field('team_gall', $post_id);

        $pub_item_date = get_the_date('j F Y');
        $pub_image_arr = array();
        $pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
        $pub_image_src = $pub_image_arr[0];
        $page_header_title = get_field("page_title2", $post_id);
        if (!$page_header_title) $page_header_title = get_the_title();
?>
        <section class="page-header">
            <div class="container">
                <h1><?= $page_header_title; ?></h1>
            </div>
            <div class="container">
                <?php get_template_part('breadcrumbs', ''); ?>
            </div>
        </section>
        <section class="text-image" style="padding: 30px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-image__content">
                        <h2><?= $team_position; ?></h2>
                        <?php the_content() ?>
                    </div>
                    <div class="col-md-5 text-image__image">
                        <div class="text-image__image-gall2">
                            <img src="<?= $team_img; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Галерея -->
        <section class="gallery" id="gal<?= $pub_id; ?>" style="margin-bottom: 60px;">
            <div class="container">
                <h2 class="text-center">Портфолио</h2>
                <div class="gallery__list" id="gallery-<?= $pub_id; ?>">
                    <?php
                    foreach ($block_gall as $img) { ?>
                        <div class="gallery__item" data-src="<?= $img['url']; ?>">
                            <img src="<?= $img['sizes']['gallery_medium']; ?>" alt="">
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
        <!-- Галерея х -->

        <script>
            $('#gallery-<?= $pub_id; ?>').lightGallery();
            $('#gal<?= $pub_id; ?> .gallery__list').slick({
                infinite: false,
                arrows: false,
                dots: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1198,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 932,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 932,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        </script>
        <?php
        //Построение инфо-блоков на странице...
        include(locate_template('info_blocks/init.php'));
        ?>

<?php
    endwhile;
endif;
?>
<?php
get_footer();
?>