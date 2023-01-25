<?php get_header(); ?>

    <section class="simple-page-header mb-5" style="background-image: url('<?= get_template_directory_uri() ?>/assets/img/breck-kum-1.jpg');">
        <div class="breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 txtc  text-center ccase">
                        <div class="brpt brptsize">
                            <h2> Корзина </h2>
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
                <span itemprop="name">Корзина</span>
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

<?php include(locate_template('woocommerce/templates/cart/cart.php'));

get_footer();