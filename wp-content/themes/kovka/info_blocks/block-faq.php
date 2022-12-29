<?php

  $block_with_heading = (($block_title!="" || $block_subtitle!="") ? true : false);

  

  $block_padding_top_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

  $block_padding_bottom_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

  $block_margin_top_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

  $block_margin_bottom_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

  

  $block_background_enable = $post_info_block_fields["infoblock_background_enable"];

  $block_background_image = $post_info_block_fields["infoblock_background_image"];

  $block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];

  $block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);

  

  $block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];

  $block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];



  $block_list = $post_info_block_fields["infoblock_faqlist"];



  $block_image = $post_info_block_fields["infoblock_image"];

  $block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];

//    my variables
$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_side_block_status = trim($post_info_block_fields["faq_show_hide_side_block"]);
$block_side_illustration = trim($post_info_block_fields["faq_block_illustration_cns"]);
$block_side_title = trim($post_info_block_fields["faq_block_title_cns"]);
$block_side_text = trim($post_info_block_fields["faq_block_text_cns"]);
$block_side_btn = ($post_info_block_fields["cns_btns"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_link = $post_info_block_fields["cns_link_faq"];
$block_btn_form = $post_info_block_fields["cns_btns_form_color"];
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);

$padding_top_faq = $block_padding_top_faq / 16;
$padding_bottom_faq = $block_padding_bottom_faq / 16;
$margin_top_faq  = $block_margin_top_faq / 16;
$margin_bottom_faq  = $block_margin_bottom_faq / 16;
?>
<style>
       #<?= $block_id; ?> {
        padding-top: <?= $padding_top_faq; ?>rem;
        padding-bottom: <?= $padding_bottom_faq; ?>rem;
        margin-top: <?= $margin_top_faq; ?>rem;
        margin-bottom: <?= $margin_bottom_faq; ?>rem;
    }
</style>

<!-- Faq Page Area Start Here -->
<section class="faq" id="<?=$block_id;?>">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title"  <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?= $block_title?></h2>
            <?php if (!empty($block_link )):?>
                <?php foreach($block_link as $header_btns_cns_items => $header_btns_cns_item) { ?>
                    <a href="<?= $header_btns_cns_item['case_btn_link_cns']?>" class="<?php
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
                    }switch ($header_btns_cns_item['case_btn_color_cns']) {
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
                        <?=$header_btns_cns_item['case_btn_name_cns'];?>
                    </a>
                <?php } ?>
            <?php endif;?>
        </div>
        <div class="faq__wrap two-col info-leftq">
            <div class="faq-box-layout1" style="width:<?= $block_side_block_status  ? '' : '100%'?>;">
                <div class="faq-page-accordion">
                    <div class="panel-group" id="accordion">
                        <?php

                        $faq_i = 0;

                        foreach($block_list as $faq_item => $faq_item_data) {

                            $faq_i++;

                            $tmp_answer = trim($faq_item_data['faq_answer']);

                            $tmp_answer = strip_tags($tmp_answer);

                            $tmp_answer = trim($tmp_answer);

//                            my variables
                            $have_button_in_answer = $faq_item_data['faq_btn_yes_no'];
                            $faq_btn = $faq_item_data['cns_btns_faq'];

                            ?>
                            <div class="card faq__item">
                                <div class=" " style="border-bottom: 0;">
                                    <div class="panel-title">
                                        <a aria-expanded="false" class="card-header faq-btn accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$faq_i;?>">
                                            <?=$faq_item_data['faq_question'];?>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.6669 17.8798L16.9469 12.2264C16.823 12.1015 16.6755 12.0023 16.513 11.9346C16.3505 11.8669 16.1763 11.832 16.0003 11.832C15.8242 11.832 15.65 11.8669 15.4875 11.9346C15.325 12.0023 15.1775 12.1015 15.0536 12.2264L9.40026 17.8798C9.27529 18.0037 9.17609 18.1512 9.1084 18.3137C9.04071 18.4761 9.00586 18.6504 9.00586 18.8264C9.00586 19.0024 9.04071 19.1767 9.1084 19.3392C9.17609 19.5017 9.27529 19.6491 9.40026 19.7731C9.65007 20.0214 9.98801 20.1608 10.3403 20.1608C10.6925 20.1608 11.0304 20.0214 11.2803 19.7731L16.0003 15.0531L20.7203 19.7731C20.9686 20.0194 21.3038 20.1583 21.6536 20.1598C21.8291 20.1608 22.003 20.1271 22.1655 20.0608C22.3279 19.9944 22.4757 19.8967 22.6003 19.7731C22.7297 19.6536 22.8342 19.5097 22.9076 19.3495C22.9811 19.1894 23.0221 19.0164 23.0283 18.8403C23.0345 18.6643 23.0058 18.4888 22.9438 18.3239C22.8817 18.159 22.7876 18.0081 22.6669 17.8798Z" fill="#29242E"/>
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                                <div aria-expanded="false" id="collapse<?=$faq_i;?>" role="tabpanel" class="panel-collapse collapse ">
                                    <div class="card-body ">
                                        <p><?=$faq_item_data['faq_answer'];?></p>
                                        <?php if( $have_button_in_answer): ?>
                                            <?php foreach($faq_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
                                                <a href="<?= $header_btns_cns_item['case_btn_link_cns']?>" class="<?php
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
                                                ?> " style="<?= $header_btns_cns_item['case_btn_type_cns'] == 'link' ? 'padding-left: 0;' : '' ?>">
                                                    <?=$header_btns_cns_item['case_btn_name_cns'];?>
                                                </a>
                                            <?php } ?>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
                <div class="faq__form-title">Остались вопросы? Закажите консуьтацию специалиста!</div>
                <form class="ajax-form d-flex align-items-center" action="#" method="POST" enctype="multipart/form-data" id="recall-form" >
                    <input type="hidden" name="form_id" value="1">
                    <input type="hidden" name="mark" value="">
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
                    <?php if ($block_btn_form): ?>
                        <?php foreach ($block_btn_form as $header_btns_cns_items => $header_btns_cns_item) { ?>
                            <button class="<?php
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
                            </button>
                        <?php } ?>
                    <?php endif; ?>
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
                    <div class="form-response"></div>
                </form>
            </div>
            <?php if ($block_side_block_status) :?>
            <div class="faq__info">
                <img src="<?= $block_side_illustration?>" alt="<?= $block_title?>" title="<?= $block_title?> - компания CNS">
                <div class="faq__info-title"><?= $block_side_title?></div>
                <p><?= $block_side_text?></p>
                <?php foreach($block_side_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
                    <a href="<?= $header_btns_cns_item['case_btn_link_cns']?>" class="<?php
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
                    ?> " >
                        <?=$header_btns_cns_item['case_btn_name_cns'];?>
                    </a>
                <?php } ?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- Faq Page Area End Here -->

