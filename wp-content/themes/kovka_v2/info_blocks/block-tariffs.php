<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_sub_title = trim($post_info_block_fields["infoblock_subtitle"]);
$block_text = trim($post_info_block_fields["infoblock_tariff_bottom_text"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);

$block_padding_top_tarif = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_tarif = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_tarif = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_tarif = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];


$padding_top_tarif = $block_padding_top_tarif / 16;
$padding_bottom_tarif = $block_padding_bottom_tarif / 16;
$margin_top_tarif = $block_margin_top_tarif / 16;
$margin_bottom_tarif = $block_margin_bottom_tarif / 16;

$block_list = $post_info_block_fields["infoblock_tariffs"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];

switch ($block_list_cols) {
    case 1:
      $block_list_col_class = 'col-12 col-sm-12 col-md-12 biglist-col-single';
      break;
    case 2:
      $block_list_col_class = 'col-12 col-sm-6 col-md-6';
      break;
    case 3:
      $block_list_col_class = 'col-12 col-sm-12 col-md-6 col-lg-4';
      break;
    case 4:
      $block_list_col_class = 'col-12 col-sm-12 col-sm-4 col-md-3';
      break;
    case 5:
      $block_list_col_class = 'col-12 col-sm-4 col-md-2';
      break;
    case 6:
      $block_list_col_class = 'col-12 col-sm-4 col-md-2';
      break;
  }

?>
<!-- Преимущества -->
<section class="tariffs" id="<?= $block_id; ?>">
    <style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_tarif?>rem;
             padding-bottom:<?= $padding_bottom_tarif?>rem;
             margin-top: <?= $margin_top_tarif?>rem;
             margin-bottom:<?= $margin_bottom_tarif;?>rem;
        }
        .tariffs .section-head span{
            max-width: 28.25rem;
            text-align: right;
            font-size: 0.94rem;
            color: #787772;
        }
        .tariff_buttom_text{
            padding: 0 0.94rem;
            color: #6c6a6a;
        }

        .tariffs__item {
            <?php switch ($block_list_cols) {
            case 1: ?>
            width: 100%;
           <?php break;
            case 2: ?>
            width: calc(100% / 2 - 1.12rem);
           <?php
            break;
            case 3: ?>
            width: calc(100% / 3 - 1.12rem);
            <?php break;
            case 4: ?>
            width: calc(100% / 4 - 1.12rem);
            <?php break;
            case 5: ?>
            width: calc(100% / 5 - 1.12rem);
            <?php break;
            case 6: ?>
            width: calc(100% / 6 - 1.12rem);
            <?php break;
        }
        ?>
        }
        .tariffs__item-descr ol.tabel>li:nth-child(even) {
            display: flex;
            justify-content: flex-end;
        }
        .tariffs__list{
            flex-wrap:wrap;
        }
    </style>
    <div class="container">
        <div class="section-head">
            <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?= $block_title ?></h2>
            <span><?= $block_sub_title ?></span>
        </div>
        <div class="tariffs__list">
            <?php foreach ($block_list as $block_list_item => $block_list_item_data) : ?>
                <?php if (!empty($block_list_item_data['infoblock_tariff_img'] )): ?>
                    <div class="tariffs__item top-center ">
                        <div class="<?= $block_list_item_data['infoblock_tariff_illustration_icon'] == 'illustration' ? 'tariffs__item-head' : 'tariffs__item-icon' ?> <?= $block_list_item_data['infoblock_tariff_illustration_zalivka'] ? 'head-bg' : '' ?>  ">
                            <?php if (!empty($block_list_item_data['infoblock_tariff_img'])): ?>
                                <img src="<?= $block_list_item_data['infoblock_tariff_img'] ?>" alt="<?= $block_list_item_data['infoblock_tariff_title'] ?>" title="<?= $block_list_item_data['infoblock_tariff_title'] ?> - <?= $block_list_item_data['infoblock_tariff_subtitle'] ?>">
                            <?php endif; ?>
                        </div>
                        <div class="tariffs__item-descr">
                            <h3><?= $block_list_item_data['infoblock_tariff_title'] ?></h3>
                            <span class="tariffs__item-subtitle"><?= $block_list_item_data['infoblock_tariff_subtitle'] ?></span>
                            <?php if (!empty($block_list_item_data['infoblock_tariff_illustration_price'])): ?>
                                <span class="tariffs__price"><?= $block_list_item_data['infoblock_tariff_illustration_price'] ?></span>
                            <?php endif; ?>
                            <hr>
                            <ol class="<?= $block_list_item_data['infoblock_tariff_list_tabel'] == 'tabel' ? 'tabel' : '' ?>">
                                <?php foreach ($block_list_item_data['infoblock_tariff_illustration_punkts'] as $block_list_punkt_item) : ?>
                                    <li>
                                        <span><?= $block_list_punkt_item['infoblock_tariff_illustration_punkt_text'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="tariffs__bottom">
                            <?php if (!empty($block_list_item_data['infoblock_tariff_btn'])): ?>
                                <?php foreach ($block_list_item_data['infoblock_tariff_btn'] as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                    <a href="<?= $header_btns_cns_item['case_btn_link_cns'] ?>" class="<?php
                                    switch ($header_btns_cns_item['case_btn_type_cns']) {
                                        case 'link':
                                            echo "link";
                                            break;
                                        case 'colored':
                                            echo " btn";
                                            break;
                                        case 'bordered':
                                            echo " btn outline-btn";
                                            break;
                                    }
                                    switch ($header_btns_cns_item['case_btn_color_cns']) {
                                        case 'red':
                                            echo " red-btn";
                                            break;
                                        case 'blue':
                                            echo " hell-blue-btn";
                                            break;
                                        case 'dark_blue':
                                            echo " blue-btn";
                                            break;
                                    }
                                    ?> ">
                                        <?= $header_btns_cns_item['case_btn_name_cns']; ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="tariffs__item top-center">
                        <div class="tariffs__item-head <?= $block_list_item_data['infoblock_tariff_illustration_zalivka'] ? 'head-bg' : '' ?> tariffs__item--title-price">
                            <div>
                                <h3><?= $block_list_item_data['infoblock_tariff_title'] ?></h3>
                                <span class="tariffs__item-subtitle"><?= $block_list_item_data['infoblock_tariff_subtitle'] ?></span>
                                <?php if (!empty($block_list_item_data['infoblock_tariff_illustration_price'])): ?>
                                    <span class="tariffs__price"><?= $block_list_item_data['infoblock_tariff_illustration_price'] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tariffs__item-descr">
                            <ol class="<?= $block_list_item_data['infoblock_tariff_list_tabel'] == 'tabel' ? 'tabel' : '' ?>" >
                                <?php foreach ($block_list_item_data['infoblock_tariff_illustration_punkts'] as $block_list_punkt_item) : ?>
                                    <li>
                                        <span><?= $block_list_punkt_item['infoblock_tariff_illustration_punkt_text'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="tariffs__bottom">
                            <?php if (!empty($block_list_item_data['infoblock_tariff_btn'])): ?>
                                <?php foreach ($block_list_item_data['infoblock_tariff_btn'] as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                    <a href="<?= $header_btns_cns_item['case_btn_link_cns'] ?>" class="<?php
                                    switch ($header_btns_cns_item['case_btn_type_cns']) {
                                        case 'link':
                                            echo "link";
                                            break;
                                        case 'colored':
                                            echo " btn";
                                            break;
                                        case 'bordered':
                                            echo " btn outline-btn";
                                            break;
                                    }
                                    switch ($header_btns_cns_item['case_btn_color_cns']) {
                                        case 'red':
                                            echo " red-btn";
                                            break;
                                        case 'blue':
                                            echo " hell-blue-btn";
                                            break;
                                        case 'dark_blue':
                                            echo " blue-btn";
                                            break;
                                    }
                                    ?> ">
                                        <?= $header_btns_cns_item['case_btn_name_cns']; ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <span class="tariff_buttom_text"> <?= $block_text ?> </span>
    </div>
</section>
<!-- Преимущества х -->

<div class="modal" id="popup-tariffs" tabindex="-1" aria-labelledby="back-callTitle" style="display: none;" aria-hidden="true">
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
            <form class="popup-form ajax-form" method="post" data-successurl="" >
                <input type="hidden" name="form_id" value="1">
                <input type="hidden" name="mark" value="">
                <input type="hidden" name="tariff_name" id="tarif-name" value="">
                <div class="form-group form-email has-error has-danger">
                    <img src="<?= get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="E-mail" title="Ваш E-mail">
                    <input type="email" class="style-input" autocomplete="off" required="" name="name" placeholder="E-Mail">
                    <div class="help-block with-errors d-none">
                        <ul class="list-unstyled">
                            <li>Пожалуйста, заполните это поле.</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group form-phone">
                    <img src="<?= get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
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