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
                                                            //                                                        ?>
<!--                                                            <ul id="menu-main-menu" class="main-menu clearfix" style="display: none;">-->
<!--                                                                <li id="menu-item-3657"-->
<!--                                                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-3657">-->
<!--                                                                    <a href="#">Home</a>-->
<!--                                                                    <ul class="sub-menu" style="display: none;">-->
<!--                                                                        <li id="menu-item-7283"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7281 current_page_item menu-item-7283">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/"-->
<!--                                                                               aria-current="page">Home Page</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7877"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7877">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-black-page/">Home-->
<!--                                                                                Black Page</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7475"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7475">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-minimal-page/">Home-->
<!--                                                                                Minimal Page</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-6751"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6751">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-minimal-black/">Home-->
<!--                                                                                Minimal Black</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-6508"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6508">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-studio-page/">Home-->
<!--                                                                                Studio Page</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-6798"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6798">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-studio-black/">Home-->
<!--                                                                                Studio Black</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-6511"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6511">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-project-gallery/">Home-->
<!--                                                                                Project Gallery</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-6797"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6797">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-project-black/">Home-->
<!--                                                                                Project Black</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7482"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7482">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-side-menu-page/">Home-->
<!--                                                                                Side Menu Page</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7105"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7105">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-architecture-firm/">Home-->
<!--                                                                                Architecture Firm</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7411"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7411">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-architecture-black/">Home-->
<!--                                                                                Architecture Black</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7571"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7571">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-portfolio-showcase/">Home-->
<!--                                                                                Portfolio showcase</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7707"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7707">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/home-portfolio-black/">Home-->
<!--                                                                                Portfolio Black</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-7857"-->
<!--                                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7857">-->
<!--                                                                            <a href="#">Landing Page</a>-->
<!--                                                                            <ul class="sub-menu" style="display: none;">-->
<!--                                                                                <li id="menu-item-7823"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7823">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/landing-one-page/">Landing-->
<!--                                                                                        One Page</a>-->
<!--                                                                                </li>-->
<!--                                                                                <li id="menu-item-7841"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7841">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/landing-two-page/">Landing-->
<!--                                                                                        Two Page</a>-->
<!--                                                                                </li>-->
<!--                                                                                <li id="menu-item-7850"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7850">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/landing-page-three/">Landing-->
<!--                                                                                        Page Three</a>-->
<!--                                                                                </li>-->
<!--                                                                            </ul>-->
<!--                                                                        </li>-->
<!--                                                                    </ul>-->
<!---->
<!--                                                                </li>-->
<!--                                                                <li id="menu-item-400"-->
<!--                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-400">-->
<!--                                                                    <a href="https://demo.themexbd.com/rtl/akin/about/">About</a>-->
<!--                                                                </li>-->
<!--                                                                <li id="menu-item-1901"-->
<!--                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1901">-->
<!--                                                                    <a href="https://demo.themexbd.com/rtl/akin/service/">Service</a>-->
<!--                                                                </li>-->
<!--                                                                <li id="menu-item-1803"-->
<!--                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1803">-->
<!--                                                                    <a href="#">Elements</a>-->
<!--                                                                    <ul class="sub-menu" style="display: none;">-->
<!--                                                                        <li id="menu-item-3502"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3502">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/team/">Team</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-519"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-519">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/testimonial/">Testimonial</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-503"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-503">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/faq/">Faq</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-11298"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11298">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/shop/">Shop</a>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-3563"-->
<!--                                                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3563">-->
<!--                                                                            <a href="#">Portfolio</a>-->
<!--                                                                            <ul class="sub-menu" style="display: none;">-->
<!--                                                                                <li id="menu-item-604"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-604">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/portfolio-grid/">Portfolio-->
<!--                                                                                        Grid</a></li>-->
<!--                                                                                <li id="menu-item-3557"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3557">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/portfolio-3column/">Portfolio-->
<!--                                                                                        3Column</a></li>-->
<!--                                                                                <li id="menu-item-3558"-->
<!--                                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3558">-->
<!--                                                                                    <a href="https://demo.themexbd.com/rtl/akin/portfolio-4column/">Portfolio-->
<!--                                                                                        4Column</a></li>-->
<!--                                                                            </ul>-->
<!--                                                                        </li>-->
<!--                                                                        <li id="menu-item-4950"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4950">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/pricing-table/">Pricing-->
<!--                                                                                Table</a></li>-->
<!--                                                                        <li id="menu-item-411"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-411">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/single-service/">Single-->
<!--                                                                                Service</a></li>-->
<!--                                                                    </ul>-->
<!--                                                                </li>-->
<!--                                                                <li id="menu-item-3410"-->
<!--                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3410">-->
<!--                                                                    <a href="#">Blog</a>-->
<!--                                                                    <ul class="sub-menu" style="display: none;">-->
<!--                                                                        <li id="menu-item-426"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/blog/">Blog-->
<!--                                                                                Gird</a></li>-->
<!--                                                                        <li id="menu-item-3409"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3409">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/blog-left-sidebar/">Blog-->
<!--                                                                                Left Sidebar</a></li>-->
<!--                                                                        <li id="menu-item-450"-->
<!--                                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-450">-->
<!--                                                                            <a href="https://demo.themexbd.com/rtl/akin/blog-right-sidebar/">Blog-->
<!--                                                                                Right Sidebar</a></li>-->
<!--                                                                    </ul>-->
<!--                                                                </li>-->
<!--                                                                <li id="menu-item-421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421 mean-last">-->
<!--                                                                    <a href="https://demo.themexbd.com/rtl/akin/contact/">Contact</a>-->
<!--                                                                </li>-->
<!--                                                            </ul>-->
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