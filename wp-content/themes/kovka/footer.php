<?php
/*$footer_phone = domainOption('phone');
  $footer_legal_information = get_field('footer_legal_information', 'option');
  $footer_phone_link = preg_replace('/[^0-9]/', '', $footer_phone);*/
$footer_copyright = get_field('footer_copyrate', 'option');
$footer_contacts = get_field('footer_contacts', 'option');
$callback_fixed = get_field('callback_fixed_title_subtitle', 'option');
$popup_form = get_field('popup_title_subtitle', 'option');

$footer_logo = get_field('footer_logo_cns', 'option');
$header_contacts = get_field('header_phones', 'option');
$header_phone_link = preg_replace('/[^0-9]/', '', $header_contacts['phone']);
?>

<footer>
    <div class="witrfm_area">
        <div class="footer-middle" style="background-image: url('<?php get_template_directory_uri()?>/assets/img/footer-bg-img-1.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6  col-lg-4">
                        <div id="twr_description_widget-1" class="widget widget_twr_description_widget">
                            <div class="akin-description-area"><a href="https://demo.themexbd.com/rtl/akin/"><img
                                            decoding="async"
                                            src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_<?php get_template_directory_uri()?>/assets/img/https://demo.themexbd.com/rtl/akin/wp-content/uploads/2021/09/logo.png"
                                            alt="Footer logo" class="logo"></a>
                                <p>Studio practice focused on modern esign, interiors and landscapes. From our eption.
                                    Studio practice focused</p>
                                <p class="phone"><a href="tel:"> </a></p>
                                <div class="social-icons"><a class="facebook" href="#" title="Facebook"><i
                                                class="icofont-facebook"></i></a> <a class="twitter" href="#" title="Twitter"><i
                                                class="icofont-twitter"></i></a> <a class="rss" href="#" title="RSS"><i
                                                class="icofont-rss"></i></a> <a class="Pinterest" href="#" title="Pinterest"><i
                                                class="icofont-pinterest"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-lg-4">
                        <div id="nav_menu-2" class="widget widget_nav_menu"><h2 class="widget-title">Our Service</h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-lg-4">
                        <div id="about_us-widget-2" class="widget about_us"><h2 class="widget-title">Contact Us</h2>
                            <div class="about-footer">
                                <div class="footer-widget address">
                                    <div class="footer-logo"></div>
                                    <div class="footer-address">
                                        <div class="footer_s_inner">
                                            <div class="footer-sociala-icon"><i class="icofont-google-map"></i></div>
                                            <div class="footer-sociala-info"><p>2334 Peterson Street Kingston USA</p>
                                            </div>
                                        </div>
                                        <div class="footer_s_inner">
                                            <div class="footer-sociala-icon"><i class="icofont-phone"></i></div>
                                            <div class="footer-sociala-info"><p>+69 1123-2234-32</p></div>
                                        </div>
                                        <div class="footer_s_inner">
                                            <div class="footer-sociala-icon"><i class="icofont-envelope-open"></i></div>
                                            <div class="footer-sociala-info"><p>example@example.com</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mc4wp_form_widget-1" class="widget widget_mc4wp_form_widget">
                            <script>(function () {
                                    window.mc4wp = window.mc4wp || {
                                        listeners: [],
                                        forms: {
                                            on: function (evt, cb) {
                                                window.mc4wp.listeners.push(
                                                    {
                                                        event: evt,
                                                        callback: cb
                                                    }
                                                );
                                            }
                                        }
                                    }
                                })();</script>
                            <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-5214" method="post" data-id="5214"
                                  data-name="">
                                <div class="mc4wp-form-fields">
                                    <p><input type="email" name="EMAIL" placeholder="Enter your email" required="">
                                        <button type="submit" value="Subscribe"><span>Send</span></button>
                                    </p>
                                </div>
                                <label style="display: none !important;">Leave this field empty if you're human: <input
                                            type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                            autocomplete="off"></label><input type="hidden" name="_mc4wp_timestamp"
                                                                              value="1672221079"><input type="hidden"
                                                                                                        name="_mc4wp_form_id"
                                                                                                        value="5214"><input
                                        type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1">
                                <div class="mc4wp-response"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6  col-lg-d-none">
                        <div id="calendar-3" class="widget widget_calendar">
                            <div id="calendar_wrap" class="calendar_wrap">
                                <table id="wp-calendar" class="wp-calendar-table">
                                    <caption>December 2022</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col" title="Monday">M</th>
                                        <th scope="col" title="Tuesday">T</th>
                                        <th scope="col" title="Wednesday">W</th>
                                        <th scope="col" title="Thursday">T</th>
                                        <th scope="col" title="Friday">F</th>
                                        <th scope="col" title="Saturday">S</th>
                                        <th scope="col" title="Sunday">S</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="3" class="pad">&nbsp;</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <td>26</td>
                                        <td>27</td>
                                        <td id="today">28</td>
                                        <td>29</td>
                                        <td>30</td>
                                        <td>31</td>
                                        <td class="pad" colspan="1">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Previous and next months" class="wp-calendar-nav"><span
                                            class="wp-calendar-nav-prev"><a
                                                href="https://demo.themexbd.com/rtl/akin/2021/08/">« Aug</a></span> <span
                                            class="pad">&nbsp;</span> <span class="wp-calendar-nav-next">&nbsp;</span></nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6  col-sm-12">
                        <div class="copy-right-text"><p> Copyright © akin all rights reserved.</p></div>
                    </div>
                    <div class="col-lg-6 col-md-6  col-sm-12">
                        <div class="footer-menu">
                            <ul id="menu-footer-menu" class="text-right">
                                <li id="menu-item-5554"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5554"><a
                                            href="https://demo.themexbd.com/rtl/akin/about/">About</a></li>
                                <li id="menu-item-5555"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5555"><a
                                            href="https://demo.themexbd.com/rtl/akin/contact/">Contact</a></li>
                                <li id="menu-item-5556"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5556"><a
                                            href="https://demo.themexbd.com/rtl/akin/service/">Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal" id="popup-recall" tabindex="-1" aria-labelledby="back-callTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 21.56rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="back-callTitle">Обратный звонок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L15 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                    <path d="M15 1L1 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                  </svg>

                </span>
                </button>
            </div>
            <p class="descr-popup">Оставьте заявку и наш специалист свяжется с Вам в ближайшее время.</p>
            <form class="popup-form ajax-form" method="post" data-successurl="" novalidate="true">
                <input type="hidden" name="form_id" value="2">
                <input type="hidden" name="mark" value="">

                <div class="form-group form-email has-error has-danger">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="Email" title="Ваш Email">
                    <input type="text" class="style-input" autocomplete="off" required="" name="name" placeholder="E-Mail">
                    <div class="help-block with-errors d-none">
                        <ul class="list-unstyled">
                            <li>Пожалуйста, заполните это поле.</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group form-phone">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
                    <input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$" autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__" inputmode="text">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-check form-check-inline pretty-check">
                    <label class="d-flex align-items-center custom-checkbox">
                        <input type="checkbox" checked="" required="" name="privacy" value="1">
                        <span class="custom-checkbox-item">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.91416 0.205752C8.85993 0.151077 8.79541 0.10768 8.72433 0.0780654C8.65324 0.0484503 8.577 0.0332031 8.49999 0.0332031C8.42298 0.0332031 8.34674 0.0484503 8.27565 0.0780654C8.20457 0.10768 8.14005 0.151077 8.08582 0.205752L3.73999 4.55742L1.91416 2.72575C1.85785 2.67136 1.79139 2.6286 1.71856 2.59989C1.64572 2.57119 1.56795 2.55712 1.48968 2.55847C1.41141 2.55982 1.33417 2.57658 1.26237 2.60779C1.19058 2.63899 1.12563 2.68403 1.07124 2.74034C1.01685 2.79664 0.974085 2.86311 0.945383 2.93594C0.916681 3.00877 0.902605 3.08654 0.903959 3.16481C0.905313 3.24309 0.922071 3.32033 0.953275 3.39212C0.98448 3.46392 1.02952 3.52886 1.08582 3.58325L3.32582 5.82325C3.38005 5.87793 3.44457 5.92132 3.51565 5.95094C3.58674 5.98055 3.66298 5.9958 3.73999 5.9958C3.817 5.9958 3.89324 5.98055 3.96433 5.95094C4.03541 5.92132 4.09993 5.87793 4.15416 5.82325L8.91416 1.06325C8.97337 1.00863 9.02062 0.942331 9.05294 0.868539C9.08526 0.794748 9.10195 0.715062 9.10195 0.634502C9.10195 0.553943 9.08526 0.474257 9.05294 0.400465C9.02062 0.326674 8.97337 0.260377 8.91416 0.205752V0.205752Z" fill="white"></path>
                                </svg>
                            </span>
                        <span class="label-text" style=" vertical-align: super; ">Я согласен (на)
                            с <a href="/privacy-policy/">политикой конфиданциальности.</a></span>
                    </label>
                </div>
                <div class=" text-center">
                    <button class="btn red-btn" type="submit" style="max-width: 100%;">Заказать звонок</button>
                </div>
                <div class="form-response"></div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="popup-consultation" tabindex="-1" aria-labelledby="back-callTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 21.56rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="back-callTitle">Бесплатная консультация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L15 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                    <path d="M15 1L1 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                  </svg>

                </span>
                </button>
            </div>
            <p class="descr-popup">Задайте нам вопрос и наш специалист ответит в ближайшее время</p>
            <form class="popup-form ajax-form" method="post" data-successurl="" novalidate="true">
                <input type="hidden" name="form_id" value="2">
                <input type="hidden" name="mark" value="">

                <div class="form-group form-email has-error has-danger">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="Email" title="Ваш Email">
                    <input type="text" class="style-input" autocomplete="off" required="" name="email" placeholder="E-Mail">
                    <div class="help-block with-errors d-none">
                        <ul class="list-unstyled">
                            <li>Пожалуйста, заполните это поле.</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group form-phone">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
                    <input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$" autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__" inputmode="text">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group form-msg has-error has-danger">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width: 1.27rem;margin-right: 0.31rem;">
                        <path d="M10.0003 1.6665C8.35215 1.6665 6.74099 2.15525 5.37058 3.07092C4.00017 3.9866 2.93206 5.28809 2.30133 6.81081C1.6706 8.33353 1.50558 10.0091 1.82712 11.6256C2.14866 13.2421 2.94234 14.727 4.10777 15.8924C5.27321 17.0578 6.75807 17.8515 8.37458 18.173C9.99109 18.4946 11.6666 18.3296 13.1894 17.6988C14.7121 17.0681 16.0136 16 16.9292 14.6296C17.8449 13.2592 18.3337 11.648 18.3337 9.99984C18.3337 8.90549 18.1181 7.82186 17.6993 6.81081C17.2805 5.79976 16.6667 4.8811 15.8929 4.10728C15.1191 3.33346 14.2004 2.71963 13.1894 2.30084C12.1783 1.88205 11.0947 1.6665 10.0003 1.6665ZM10.0003 16.6665C8.68179 16.6665 7.39286 16.2755 6.29653 15.543C5.2002 14.8104 4.34572 13.7692 3.84113 12.5511C3.33655 11.3329 3.20453 9.99244 3.46176 8.69924C3.719 7.40603 4.35393 6.21814 5.28628 5.28579C6.21863 4.35344 7.40652 3.7185 8.69973 3.46127C9.99293 3.20403 11.3334 3.33606 12.5516 3.84064C13.7697 4.34522 14.8109 5.19971 15.5435 6.29604C16.276 7.39236 16.667 8.6813 16.667 9.99984C16.667 11.7679 15.9646 13.4636 14.7144 14.7139C13.4641 15.9641 11.7684 16.6665 10.0003 16.6665Z" fill="black"></path>
                        <path d="M9.16698 12.7999C9.1679 12.5812 9.2547 12.3717 9.40865 12.2165C9.48612 12.1384 9.57829 12.0764 9.67984 12.0341C9.78139 11.9918 9.89031 11.97 10.0003 11.97C10.1103 11.97 10.2192 11.9918 10.3208 12.0341C10.4223 12.0764 10.5145 12.1384 10.592 12.2165C10.7459 12.3717 10.8327 12.5812 10.8336 12.7999C10.8333 12.9918 10.7667 13.1777 10.6451 13.3262C10.5234 13.4747 10.3543 13.5767 10.1662 13.6149C9.9781 13.6531 9.78257 13.6252 9.61266 13.5359C9.44275 13.4466 9.30888 13.3014 9.23365 13.1249C9.18987 13.0221 9.1672 12.9116 9.16698 12.7999Z" fill="black"></path>
                        <path d="M8.74941 6.46772C9.12976 6.24828 9.5612 6.1329 10.0003 6.13318C10.6634 6.13318 11.2992 6.39658 11.7681 6.86542C12.2369 7.33426 12.5003 7.97014 12.5003 8.63318C12.5003 9.29623 12.2369 9.93211 11.7681 10.401C11.2992 10.8698 10.6634 11.1332 10.0003 11.1332C9.7793 11.1332 9.56734 11.0454 9.41106 10.8891C9.25478 10.7328 9.16698 10.5209 9.16698 10.2999C9.16698 10.0788 9.25478 9.86688 9.41106 9.7106C9.56734 9.55432 9.7793 9.46652 10.0003 9.46652C10.1465 9.46594 10.2899 9.42694 10.4162 9.35343C10.5425 9.27992 10.6472 9.17448 10.7199 9.0477C10.7926 8.92093 10.8307 8.77726 10.8303 8.63112C10.83 8.48498 10.7912 8.34151 10.7179 8.21509C10.6445 8.08868 10.5393 7.98377 10.4126 7.91089C10.2859 7.838 10.1423 7.79971 9.99618 7.79986C9.85004 7.8 9.70651 7.83858 9.57998 7.91171C9.45346 7.98484 9.34839 8.08996 9.27532 8.21652C9.16001 8.39791 8.97908 8.52773 8.77031 8.57886C8.56155 8.63 8.3411 8.59849 8.15502 8.49093C7.96893 8.38337 7.8316 8.20806 7.77172 8.00164C7.71183 7.79522 7.73402 7.57364 7.83365 7.38318C8.05321 7.0029 8.36905 6.68715 8.74941 6.46772Z" fill="black"></path>
                    </svg>

                    <input type="text" class="style-input" autocomplete="off" required="" name="message" placeholder="Ваш вопрос">
                    <div class="help-block with-errors d-none">
                        <ul class="list-unstyled">
                            <li>Пожалуйста, заполните это поле.</li>
                        </ul>
                    </div>
                </div>

                <div class="form-check form-check-inline pretty-check">
                    <label class="d-flex align-items-center custom-checkbox">
                        <input type="checkbox" checked="" required="" name="privacy" value="1">
                        <span class="custom-checkbox-item">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.91416 0.205752C8.85993 0.151077 8.79541 0.10768 8.72433 0.0780654C8.65324 0.0484503 8.577 0.0332031 8.49999 0.0332031C8.42298 0.0332031 8.34674 0.0484503 8.27565 0.0780654C8.20457 0.10768 8.14005 0.151077 8.08582 0.205752L3.73999 4.55742L1.91416 2.72575C1.85785 2.67136 1.79139 2.6286 1.71856 2.59989C1.64572 2.57119 1.56795 2.55712 1.48968 2.55847C1.41141 2.55982 1.33417 2.57658 1.26237 2.60779C1.19058 2.63899 1.12563 2.68403 1.07124 2.74034C1.01685 2.79664 0.974085 2.86311 0.945383 2.93594C0.916681 3.00877 0.902605 3.08654 0.903959 3.16481C0.905313 3.24309 0.922071 3.32033 0.953275 3.39212C0.98448 3.46392 1.02952 3.52886 1.08582 3.58325L3.32582 5.82325C3.38005 5.87793 3.44457 5.92132 3.51565 5.95094C3.58674 5.98055 3.66298 5.9958 3.73999 5.9958C3.817 5.9958 3.89324 5.98055 3.96433 5.95094C4.03541 5.92132 4.09993 5.87793 4.15416 5.82325L8.91416 1.06325C8.97337 1.00863 9.02062 0.942331 9.05294 0.868539C9.08526 0.794748 9.10195 0.715062 9.10195 0.634502C9.10195 0.553943 9.08526 0.474257 9.05294 0.400465C9.02062 0.326674 8.97337 0.260377 8.91416 0.205752V0.205752Z" fill="white"></path>
                                </svg>
                            </span>
                        <span class="label-text" style=" vertical-align: super; ">Я согласен (на)
                            с <a href="/privacy-policy/">политикой конфиданциальности.</a></span>
                    </label>
                </div>
                <div class=" text-center">
                    <button class="btn red-btn" type="submit" style="max-width: 100%;">Получить консультацию</button>
                </div>
                <div class="form-response"></div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="popup-services" tabindex="-1" aria-labelledby="back-callTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 21.56rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="back-callTitle">Заявка на услугу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L15 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                    <path d="M15 1L1 15" stroke="black" stroke-width="2" stroke-linecap="round"></path>
                  </svg>

                </span>
                </button>
            </div>
            <p class="descr-popup"><span id="serv-page-title"></span><br> Тариф “<span class="tarif-name"></span>”.</p>
            <form class="popup-form ajax-form" method="post" data-successurl="" novalidate="true">
                <input type="hidden" name="form_id" value="1">
                <input type="hidden" name="mark" value="">
                <input type="hidden" name="tariff_name" id="tarif-name" value="">
                <div class="form-group form-email has-error has-danger">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="Email" title="Ваш Email">
                    <input type="text" class="style-input" autocomplete="off" required="" name="name" placeholder="E-Mail">
                    <div class="help-block with-errors d-none">
                        <ul class="list-unstyled">
                            <li>Пожалуйста, заполните это поле.</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group form-phone">
                    <img src="<?= get_template_directory_uri()?>/assets/<?php get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
                    <input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$" autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__" inputmode="text">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-check form-check-inline pretty-check">
                    <label class="d-flex align-items-center custom-checkbox">
                        <input type="checkbox" checked="" required="" name="privacy" value="1">
                        <span class="custom-checkbox-item">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.91416 0.205752C8.85993 0.151077 8.79541 0.10768 8.72433 0.0780654C8.65324 0.0484503 8.577 0.0332031 8.49999 0.0332031C8.42298 0.0332031 8.34674 0.0484503 8.27565 0.0780654C8.20457 0.10768 8.14005 0.151077 8.08582 0.205752L3.73999 4.55742L1.91416 2.72575C1.85785 2.67136 1.79139 2.6286 1.71856 2.59989C1.64572 2.57119 1.56795 2.55712 1.48968 2.55847C1.41141 2.55982 1.33417 2.57658 1.26237 2.60779C1.19058 2.63899 1.12563 2.68403 1.07124 2.74034C1.01685 2.79664 0.974085 2.86311 0.945383 2.93594C0.916681 3.00877 0.902605 3.08654 0.903959 3.16481C0.905313 3.24309 0.922071 3.32033 0.953275 3.39212C0.98448 3.46392 1.02952 3.52886 1.08582 3.58325L3.32582 5.82325C3.38005 5.87793 3.44457 5.92132 3.51565 5.95094C3.58674 5.98055 3.66298 5.9958 3.73999 5.9958C3.817 5.9958 3.89324 5.98055 3.96433 5.95094C4.03541 5.92132 4.09993 5.87793 4.15416 5.82325L8.91416 1.06325C8.97337 1.00863 9.02062 0.942331 9.05294 0.868539C9.08526 0.794748 9.10195 0.715062 9.10195 0.634502C9.10195 0.553943 9.08526 0.474257 9.05294 0.400465C9.02062 0.326674 8.97337 0.260377 8.91416 0.205752V0.205752Z" fill="white"></path>
                                </svg>
                            </span>
                        <span class="label-text" style=" vertical-align: super; ">Я согласен (на)
                            с <a href="/privacy-policy/">политикой конфиданциальности.</a></span>
                    </label>
                </div>
                <div class=" text-center">
                    <button class="btn red-btn" type="submit" style="max-width: 100%;">Получить консультацию</button>
                </div>
                <div class="form-response"></div>
            </form>
        </div>
    </div>
</div>


<div id="go-top" style="display: block;"></div>


<?php wp_footer(); ?>
</body>
</html>