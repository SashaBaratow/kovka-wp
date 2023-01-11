<?php
get_header();
?>
<?php
 include('page-header-simple.php');
if (have_posts()):
    while (have_posts()) :
        the_post();
        $post_id = get_the_ID();
        $product = wc_get_product( $post_id );
        ?>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gallery">
                            <h1 class="product-title"><span> <?php the_title(); ?></span> </h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        //Построение инфо-блоков на странице...
        //Предустановленные блоки
        $post_info_blocks = [
            ['infoblock_add_type' => 'select', 'infoblock_item_object' => 0],	//ID БЛОКА
        ];
        include(locate_template('info_blocks/init.php'));
        ?>
    <?php
    endwhile;
endif;
?>

    <div class="swiper catalog">
        <div class="container">
            <div class="info">
<!--                <span class="subtitle"> Provide Service </span>-->
                <h3>Похожими товарам</h3>
                <hr>
<!--                <p>Studio practice focused on modern design, landscapes from our inception.</p>-->
            </div>
            <div class="row">
                <div class="swiper catalogSwiper">
                    <div class="swiper-wrapper">
                        <?php
                        global $product;
                        $terms = get_the_terms($product->ID, 'product_cat');
                        $cat_array = json_decode(json_encode($terms), true);
                        $current_cat = $cat_array[0]["slug"];
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                            'product_cat'    => $current_cat
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                            global $product; ?>
                            <div class="swiper-slide">
                            <div class="top-img">
                                <span class="atrr">SALE!</span>
                                <a class="item-link" href="#">
                                    <?= woocommerce_get_product_thumbnail() ?>
                                </a>
                                <div class="product-links">
                                    <div class="product-link">
                                        <a href="#">
                                            <i class="icofont-heart"></i>
                                        </a>
                                    </div>
                                    <div class="product-link">
                                        <a href="#">
                                            <i class="icofont-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="product-link">
                                        <a href="<?= get_permalink(); ?>">
                                            <i class="icofont-eye-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="info-bottom">
                                <h2><?= get_the_title(); ?></h2>
                                <span> <?= $product->get_price_html(); ?> </span>
                            </div>
                        </div>
                        <?php
                        endwhile;

                        wp_reset_query();
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>