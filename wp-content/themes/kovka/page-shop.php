<?php
/*
 * Template Name: МАГАЗИН
 */

?>
<?php
get_header();
?>
<?php

$post_id = get_the_ID();
$recommendet_products_arr = get_field("recommendet_products", 'option');

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

    <section class="shop_grid_area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"></div>
                <div class="col-lg-5"><p class="woocommerce-result-count"> Показано 1–8 из 11 результатов</p></div>
                <div class="col-lg-7">
                    <div class="d-flex order_tx">
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby" aria-label="Shop order" style="display: none;">
                                <option value="popularity" selected="selected">Top Sale</option>
                                <option value="rating">Top Rating</option>
                                <option value="date">New Product</option>
                                <option value="price">Price: low to high</option>
                                <option value="price-desc">Price: high to low</option>
                            </select>
                            <div class="nice-select orderby" tabindex="0"><span class="current">Top Sale</span>
                                <ul class="list">
                                    <li data-value="popularity" class="option selected focus">Top Sale</li>
                                    <li data-value="rating" class="option">Top Rating</li>
                                    <li data-value="date" class="option">New Product</li>
                                    <li data-value="price" class="option">Price: low to high</li>
                                    <li data-value="price-desc" class="option">Price: high to low</li>
                                </ul>
                            </div>
                            <input type="hidden" name="paged" value="1"></form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 sidebar-right content-widget pdsl">
                    <div class="blog-left-side widget">
                        <div id="archives-1" class="widget widget_archive">
                            <h2 class="widget-title">Категории</h2>
                            <ul>
                                <?php wp_list_categories(array('taxonomy' => 'product_cat', 'title_li' => '')); ?>
                            </ul>
                        </div>
                        <div id="em_recent_post_widget-1" class="widget widget_recent_data">
                            <div class="single-widget-item"><h2 class="widget-title">Популярные товары</h2>
                                <?php
                                $_pf = new WC_Product_Factory();
                                foreach ($recommendet_products_arr as $id) {
                                    $_product = $_pf->get_product($id);
//                                        var_dump($_product->get_price_html());  ?>
                                    <div class="recent-post-item">
                                        <div class="recent-post-image">
                                            <a href="#">
                                                <?php
                                                $image = wp_get_attachment_image_src($_product->get_image_id());
                                                ?>
                                                <img width="70" height="70"
                                                     src="<?= wp_get_attachment_image_url($_product->get_image_id()); ?>"
                                                     class="attachment-akin_recent_image size-akin_recent_image wp-post-image"
                                                     alt="" decoding="async" loading="lazy"
                                                     sizes="(max-width: 70px) 100vw, 70px">
                                            </a>
                                        </div>
                                        <div class="recent-post-text">
                                            <h4>
                                                <a href="<?= $_product->get_permalink(); ?>"> <?= $_product->get_name(); ?> </a>
                                            </h4>
                                            <span class="rcomment"><?= $_product->get_price_html(); ?></span>
                                        </div>
                                    </div>

                                <?php }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="tab-content">
                        <div id="tx_product_grid" class="bgimgload  fade tab-pane active show">
                            <div class=" row blog-messonary" style="position: relative; height: 812.218px;">
                                <?php
                                $args = array(
                                    'orderby' => 'name',
                                );
                                $products = wc_get_products($args);
                                foreach ($products as $item):
//                                        var_dump($item->price);
                                    ?>
                                    <div class="col-xl-4 col-sm-6 col-lg-4 col-md-6 grid-item product type-product sale ">
                                        <div class="tbd_product">
                                            <div class="tbd_product_inner">
                                                <div class="tbd_product_thumb">
                                                    <div class="tbd_sale_price"><span class="onsale tbd_sale_inner">Sale!</span>
                                                    </div>
                                                    <a href="<?= $item->get_permalink(); ?>" class="thumbnail_link">
                                                        <img style="min-height: 280px; object-fit: cover;" width="470"
                                                             height="520"
                                                             src="<?= wp_get_attachment_image_url($item->image_id); ?>"
                                                             class="img-fluid wp-post-image" alt="" decoding="async"
                                                             sizes="(max-width: 470px) 100vw, 470px">
                                                    </a>
                                                    <div class="thb_product_car">
                                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-11297  wishlist-fragment on-first-load">
                                                            <a href="#" rel="nofollow"
                                                               class="add_to_wishlist single_add_to_wishlist">
                                                                <i class="icofont-heart"></i>
                                                            </a>
                                                        </div>
                                                        <a title="Add To Cart" href="#" data-quantity="1"
                                                           class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                           rel="nofollow">
                                                            <i class="icofont-shopping-cart"></i>
                                                        </a>
                                                        <a href="#" class="button yith-wcqv-button"
                                                           data-product_id="11297">
                                                            Quick View </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tbd_product_content">
                                                <div class="tbd_product_content_inner">
                                                    <div class="tbd_product_title tbd_fload_right">
                                                        <a href="<?= $item->get_permalink(); ?>"
                                                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                            <h2 class="woocommerce-loop-product__title"><?= $item->name; ?></h2>
                                                        </a></div>
                                                    <div class="tbd_price_opt clearfix">
                                                        <span class="tbd_price">
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol"><?= $item->price ?></span> руб</span>
                                                                </ins>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php


//                                    echo the_posts_pagination( );
                                    ?>
                                    <?= the_posts_pagination(); ?>
<!--                                    <nav class="paginations">-->
<!--                                        <ul class="page-numbers">-->
<!--                                            <li><span aria-current="page" class="page-numbers current">1</span></li>-->
<!--                                            <li><a class="page-numbers"-->
<!--                                                   href="#">2</a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a class="next page-numbers" href="#">-->
<!--                                                    <i class="icofont-arrow-right"></i>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </nav>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
//Построение инфо-блоков на странице...
include(locate_template('info_blocks/init.php'));
?>

<?php
get_footer();
?>