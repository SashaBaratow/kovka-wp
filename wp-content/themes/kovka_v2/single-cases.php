<?php
global $post;
get_header();
$product_category_id = get_field('case_product_cat', $post->ID);
$term = get_term( $product_category_id, 'product_cat' );
$cases_btn_text = get_field('cases_btn_text', 'option');
$cases_btn_link = get_field('cases_btn_link', 'option');
?>
    <section class="simple-page-header mb-5"
             style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/breck-kum-1.jpg');">
        <div class="breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 txtc  text-center ccase">
                        <div class="brpt brptsize">
                            <h2> <?= the_title(); ?> </h2>
                        </div>
                        <div class="breadcumb-inner">
                            <div class="breadcumb-inner">
                                <div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a class="breadcrumbs__link" href="http://kovka/" itemprop="item">
                    <span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1">
            </span>
                                    <span class="breadcrumb-divider"> &gt; </span>
                                    <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a class="breadcrumbs__link" href="" itemprop="item">
                    <span itemprop="name">Кейсы</span>
                </a>
                <meta itemprop="position" content="2">
            </span>
                                    <span class="breadcrumb-divider"> &gt; </span>
                                    <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"
                                          class="breadcrumb-current">
                <span itemprop="name"><?= the_title(); ?></span>
                <meta itemprop="position" content="3">
            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        $post_id = get_the_ID();
        $case_gallery = get_field('case_gallery_cns', $post_id);
        $case_text_cns = get_field('case_text_cns', $post_id);
        ?>
        <section class="cases-list">
            <div class="container">
                <div class="row-1 d-flex flex-column flex-md-row">
                    <div class="col-lg-6 left">
                        <div class="swiper-container gallery-thumbs">

                            <div class="swiper-wrapper">
                                <?php foreach ($case_gallery as $img): ?>
                                 <div class="swiper-slide"><img src="<?= $img ?>" alt=""></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <?php foreach ($case_gallery as $img): ?>
                                    <div class="swiper-slide"><img src="<?= $img ?>" alt=""></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 right">
                        <h1 class="main-title text-center w-100 mb-3"> <?= the_title(); ?> </h1>
                        <hr class="">
                        <?= $case_text_cns;?>
                        <a href="<?= $cases_btn_link ?>"><?= $cases_btn_text ?></a>
                    </div>
                </div>
            </div>
        </section>
   <?php     //Построение инфо-блоков на странице...
		include(locate_template('info_blocks/init.php'));
    endwhile;
endif;
?>
    <div class="swiper catalog">
        <div class="container">
            <div class="info">
                <!--                <span class="subtitle"> Provide Service </span>-->
<!--                <h3></h3>-->
<!--                <hr>-->
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
                            'product_cat'    => $term->slug
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