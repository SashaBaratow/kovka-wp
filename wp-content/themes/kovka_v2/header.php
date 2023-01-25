<?php
$header_contacts = get_field('header_phones', 'option');
$header_fb = get_field('footer_facebook_url', 'option');
$header_phone_link = preg_replace('/[^0-9]/', '', $header_contacts['phone']);
$header_logo = get_field('header_logo', 'option');
$header_logo_white = get_field('header_logo_light', 'option');
$header_btn_text = get_field('top_menu_btn_text', 'option');
$header_btn_link = get_field('top_menu_btn_link', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- WP HEAD -->
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="akin-header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-lg-9 col-xl-9 col-md-9 col-sm-12">
                        <div class="top-address text-left">
                            <p>
                                <span> <i class="icofont-home"></i> <?= $header_contacts['address_head'] ?> </span>
                                <a href="tel:"> <i class="icofont-ui-call"></i><?= $header_contacts['phone'] ?> </a>
                                <a href="mailto:demo@example.com">
                                    <i class="icofont-envelope"></i>
                                    <?= $header_contacts['email'] ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-xl-3 col-md-3 col-sm-12 ">
                        <div class="top-right-menu">
                            <ul class="social-icons text-right text_m_center">
                                <li><a class="facebook social-icon" href="#" title="Facebook"><i
                                                class="icofont-facebook"></i></a></li>
                                <li><a class="twitter social-icon" href="#" title="Twitter"><i class="icofont-twitter"></i></a>
                                </li>
                                <li><a class="instagram social-icon" href="#" title="Instagram"><i
                                                class="icofont-instagram"></i></a></li>
                                <li><a class="tumblr social-icon" href="#" title="Tumblr"><i class="icofont-tumblr"></i></a>
                                </li>
                                <li><a class="pinterest social-icon" href="#" title="Pinterest">
                                        <i class="icofont-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tx_top2_relative">
            <div class="">
                <div class="mobile_logo_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mobilemenu_con">
                                    <div class="mobile_menu_logo text-center">
                                        <a href="https://demo.themexbd.com/rtl/akin/" title="Akin">
                                            <img decoding="async"
                                                 src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img/https://demo.themexbd.com/rtl/akin/wp-content/uploads/2021/09/logo2-1.png"
                                                 alt="Akin">
                                        </a>
                                    </div>
                                    <div class="mobile_menu_option">
                                        <div class="mobile_menu_o mobile_opicon">
                                            <i class="icofont-navigation-menu openclass"></i>
                                        </div>
                                        <div class="mobile_menu_inner mobile_p">
                                            <div class="mobile_menu_content">
                                                <div class="mobile_menu_logo text-center">
                                                    <a href="https://demo.themexbd.com/rtl/akin/" title="Akin"> <img
                                                                decoding="async"
                                                                src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img/https://demo.themexbd.com/rtl/akin/wp-content/uploads/2021/09/logo2-1.png"
                                                                alt="Akin"> </a></div>
                                                <div class="menu_area mobile-menu mean-container">
                                                    <div class="mean-bar">
                                                        <a href="#nav" class="meanmenu-reveal"
                                                           style="right: 0px; left: auto; display: inline;">
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </a>
                                                        <nav class="mean-nav">
                                                            <?php
                                                            wp_nav_menu(array(
                                                                'theme_location'    => 'header',
                                                                'depth'             => 3,
                                                                'container'         => false,
                                                                'menu_id'           => 'menu-main-menu',
                                                                'fallback_cb'       => 'WP_Bootstrap_Navwalker',
                                                                'walker'            => new WP_Bootstrap_Navwalker(),
                                                                'items_wrap' => '<ul class="%2$s" itemprop="about" itemscope itemtype="http://schema.org/ItemList">%3$s</ul>'
                                                            ));
                                                           ?>
                                                        </nav>
                                                    </div>
                                                </div>
                                                <div class="mobile_menu_o mobile_cicon"><i
                                                            class="icofont-close closeclass"></i></div>
                                            </div>
                                        </div>
                                        <div class="mobile_overlay"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tx_relative_m">
                    <div class="">
                        <div class="mainmenu_width_tx  ">
                            <div class="akin-main-menu one_page hidden-xs hidden-sm witr_search_wh witr_h_h20"
                                 style="z-index: auto; position: static; top: auto;">
                                <div class="akin_nav_area scroll_fixed postfix">
                                    <div class="container-fluid">
                                        <div class="row logo-left">
                                            <div class="col-md-3 col-sm-3 col-xs-4">
                                                <div class="logo">
                                                    <a class="main_sticky_main_l dark-logo" href="/" title="=logo">
                                                        <img decoding="async" src="<?= $header_logo ?>" alt="logo">
                                                    </a>
                                                    <a class="main_sticky_main_l light-logo" href="/" title="=logo">
                                                        <img decoding="async" src="<?= $header_logo_white ?>" alt="logo">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-8">
                                                <div class="tx_mmenu_together">
                                                    <nav class="akin_menu nologo_menu13">
                                                        <?php
                                                        wp_nav_menu(array(
                                                            'theme_location'    => 'header',
                                                            'depth'             => 3,
                                                            'container'         => false,
                                                            'menu_id'           => 'menu-main-menu-1',
                                                            'fallback_cb'       => 'WP_Bootstrap_Navwalker',
                                                            'walker'            => new WP_Bootstrap_Navwalker(),
                                                            'items_wrap' => '<ul class="%2$s" itemprop="about" itemscope itemtype="http://schema.org/ItemList">%3$s</ul>'
                                                        ));
//                                                        ?>
                                                    </nav>
                                                    
                                                    <div class="menu_popup_option">
                                                        <div class="right_popupmenu_area">
                                                            <div class="right_side_icon">
                                                                <div class="right_sideber_menu">
                                                                    <i class="icofont-navigation-menu openclass"></i>
                                                                </div>
                                                            </div>
                                                            <div class="right_sideber_menu_inner">
                                                                <div class="right_sideber_content">
                                                                    <div class="blog-left-side widget">
                                                                        <div id="about_us-widget-1" class="widget about_us">
                                                                            <h2 class="widget-title">Адрес</h2>
                                                                            <div class="about-footer">
                                                                                <div class="footer-widget address">
                                                                                    <div class="footer-logo">
                                                                                        <p><?= $header_contacts['address_head'] ?></p>
                                                                                    </div>
                                                                                    <div class="footer-address">
                                                                                        <div class="footer_s_inner">
                                                                                            <div class="footer-sociala-icon">
                                                                                                <i class="icofont-google-map"></i>
                                                                                            </div>
                                                                                            <div class="footer-sociala-info">
                                                                                                <p><?= $header_contacts['address_head'] ?></p></div>
                                                                                        </div>
                                                                                        <div class="footer_s_inner">
                                                                                            <div class="footer-sociala-icon">
                                                                                                <i class="icofont-phone"></i>
                                                                                            </div>
                                                                                            <div class="footer-sociala-info">
                                                                                                <p><?= $header_contacts['phone'] ?></p></div>
                                                                                        </div>
                                                                                        <div class="footer_s_inner">
                                                                                            <div class="footer-sociala-icon">
                                                                                                <i class="icofont-envelope-open"></i>
                                                                                            </div>
                                                                                            <div class="footer-sociala-info">
                                                                                                <p><?= $header_contacts['email'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="footer_s_inner">
                                                                                            <div class="footer-sociala-icon">
                                                                                                <i class="icofont-ui-clock"></i>
                                                                                            </div>
                                                                                            <div class="footer-sociala-info">
                                                                                                <p><?= $header_contacts['footer_work_time_cns'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="right_side_icon right_close_class">
                                                                        <div class="right_sideber_menu"><i
                                                                                    class="icofont-close-line-squared closeclass"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pr-count">
                                                        <?=WC()->cart->get_cart_contents_count();?> товара -
                                                    </div>
                                                    <?php
                                                    if ( is_active_sidebar( 'sidebar-1' ) ) : ?>                                                        <aside class="widget-area">
                                                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                                                    </aside><!-- .widget-area -->
                                                    <?php
                                                    endif;
                                                    ?>
                                                    <div class="cart-min">
<!--                                                        --><?php //echo wc_get_cart_url(); ?>
                                                        <a class="mini-cart " href="#" title="<?php _e( 'Показать корзину.' ); ?>">
                                                            <span class="mini-cart__products-qty"><?=WC()->cart->get_cart_contents_count();?> товара - <?php echo WC()->cart->get_cart_total(); ?></span>
                                                            <span class="wc-block-mini-cart__quantity-badge"></span>
                                                        </a>
                                                        <div class="cart-content">

                                                        </div>
                                                    </div>
                                                    <div class="donate-btn-header">
                                                        <a class="dtbtn" href=" <?= $header_btn_link ?>"> <?= $header_btn_text ?> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none; width: 1903px; height: 106.391px; float: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>