<?php

  $block_title = trim($post_info_block_fields["infoblock_title"]);
  $block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
  $block_vertical_horizontal =$post_info_block_fields["infoblock_vertical_horizontal"];
  $block_color =$post_info_block_fields["infoblock_color"];
  $block_num_color =$post_info_block_fields["infoblock_steps_num_color"];
  $block_vertical_block_title =$post_info_block_fields["steps_side_block_title"];
  $block_steps_color =$post_info_block_fields["infoblock_steps_num_color"];

  $block_vertical_block_text =$post_info_block_fields["steps_side_block_text"];
  $block_vertical_block_img =$post_info_block_fields["step_image"];
  $block_vertical_block_btn =$post_info_block_fields["cns_btns"];
  $block_vertical_block_form_btn =$post_info_block_fields["cns_btns_form_color"];
  $block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);


  $block_padding_top_step = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

  $block_padding_bottom_step = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

  $block_margin_top_step = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

  $block_margin_bottom_step = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

    $padding_top_ser = $block_padding_top_step / 16;
    $padding_bottom_ser = $block_padding_bottom_step / 16;
    $margin_top_ser = $block_margin_top_step / 16;
    $margin_bottom_ser = $block_margin_bottom_step / 16;

  $block_list = $post_info_block_fields["infoblock_stepslist"];

  $block_list_col_class = 'col-lg-3 col-md-6';
  
?>
<!-- Service Area Start Here -->
<section class="steps" id="<?= $block_id; ?>">
    <style>
   
   #<?= $block_id; ?> {
        padding-top: <?=$padding_top_ser?>rem;
        padding-bottom: <?=$padding_bottom_ser?>rem;
        margin-top: <?=$margin_top_ser?>rem;
        margin-bottom: <?=$margin_bottom_ser ?>rem;
    }

    #<?= $block_id; ?> .steps__icon {
        background: #EEFAFE;
    }

    #<?= $block_id; ?> .steps__item:last-child::after {
        background: #56CCF2;
    }

    #<?= $block_id; ?> .steps__item {
        border-color: #56CCF2;
    }

    #<?= $block_id; ?> .color-blue .steps__item:last-child::after {
        background:'#E31B08';
    }

    #<?= $block_id; ?> .color-red .steps__item:last-child::after {
        background:#BD1302 !important;
    }

    #<?= $block_id; ?> .color-blue .steps__item {
        border-color: '#E31B08';
    }
    #<?= $block_id; ?> .color-blue .steps__item .num {
        color:#000;
    }
    #<?= $block_id; ?> .color-red .steps__item .num {
        color:#fff;
    }
    #<?= $block_id; ?> .color-red .steps__item {
        border-color: #BD1302 !important;
    }
    #<?= $block_id; ?> .color-red .steps__icon {
        background: #BD1302 !important;
    }
    </style>
    <div class="container">
        <div class="steps__wrap">
            <div class="section-head">
                <h2 class="section-title" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?>>
                    <?= $block_title?></h2>
                <span><?= $block_subtitle ?></span>
            </div>
            <div class="<?= $block_vertical_horizontal == 'vertical' ? 'steps__horizontal' : 'horizont' ?> steps__list-right  <?= $block_color == 'red' ? 'color-red' : 'color-blue' ?>">
                <div class="steps__list">
                    <?php
                    foreach($block_list as $block_list_item => $block_list_item_data): ?>
                        
                    <div class="steps__item">
                        <?php if ( $block_list_item_data['step_icon_number'] == 'icon'):?>
                        <div class="steps__icon num">
                            <img src="<?=  $block_list_item_data['step_icon']?>" alt="<?= $block_list_item_data['step_title']?>" title="<?= $block_list_item_data['step_title']?> - <?= $block_list_item_data['step_text']?>">
                        </div>

                        <?php elseif ( $block_list_item_data['step_icon_number'] == 'number') :?>
                        <div class="steps__icon num">
                            <span> <?= $block_list_item_data['step_number']?> </span>
                        </div>
                        <?php endif;?>
                        <div class="steps__descr">
                            <h3><?= $block_list_item_data['step_title']?></h3>
                            <p><?= $block_list_item_data['step_text']?></p>
                        </div>
                        <?php if ($block_list_item_data['add_step_btn'] ):?>
                        <?php foreach($block_list_item_data['steps_btn'] as $header_btns_cns_items => $header_btns_cns_item) { ?>
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
                                    ?> ">
                            <?=$header_btns_cns_item['case_btn_name_cns'];?>
                        </a>
                        <?php } ?>
                        <?php endif;?>
                    </div>
                    <?php endforeach;?>
                </div>
                <?php if( $block_vertical_horizontal == 'vertical'): ?>


                <div class="steps__text">
                    <?php if ( empty($block_vertical_block_img) ): ?>
                          <style>
                             .steps .section-title{
                                margin-bottom:0 !important;
                            }
                          </style>
                    <?php endif; ?>
                    <?php if(!empty($block_vertical_block_img)): ?>
                    <img src="<?= $block_vertical_block_img?>" alt="<?= $block_title?>" title="<?= $block_title?> - компания CNS">
                    <?php endif; ?>
                    <h3><?= $block_vertical_block_title?></h3>
                    <p><?= $block_vertical_block_text?></p>
                    <?php if ($block_vertical_block_btn ):?>
                    <?php foreach($block_vertical_block_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
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
                                ?> ">
                        <?=$header_btns_cns_item['case_btn_name_cns'];?>
                    </a>
                    <?php } ?>
                    <?php endif;?>
                    <?php if ($block_vertical_block_form_btn ):?>
                    <form class="ajax-form d-flex align-items-center" action="#" method="POST"
                        enctype="multipart/form-data" id="recall-form">
                        <input type="hidden" name="form_id" value="1">
                        <input type="hidden" name="mark" value="">
                        <div class="form-group form-email has-error has-danger">
                            <img src="<?= get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="E-mail" title="Ваш E-mail">
                            <input type="email" class="style-input" autocomplete="off" required="" name="name"
                                placeholder="E-Mail">
                            <div class="help-block with-errors d-none">
                                <ul class="list-unstyled">
                                    <li>Пожалуйста, заполните это поле.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group form-phone">
                            <img src="<?= get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
                            <input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$"
                                autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__"
                                inputmode="text">
                            <div class="help-block with-errors"></div>
                        </div>
                        <?php if ($block_vertical_block_form_btn ):?>
                        <?php foreach($block_vertical_block_form_btn as $header_btns_cns_items => $header_btns_cns_item) { ?>
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
                            <?=$header_btns_cns_item['case_btn_name_cns'];?>
                        </button>
                        <?php } ?>
                        <?php endif;?>
                        <div class="form-check form-check-inline pretty-check">
                            <label class="d-flex align-items-center custom-checkbox">
                                <input type="checkbox" checked="" required="" name="privacy" value="1">
                                <span class="custom-checkbox-item">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.91416 0.205752C8.85993 0.151077 8.79541 0.10768 8.72433 0.0780654C8.65324 0.0484503 8.577 0.0332031 8.49999 0.0332031C8.42298 0.0332031 8.34674 0.0484503 8.27565 0.0780654C8.20457 0.10768 8.14005 0.151077 8.08582 0.205752L3.73999 4.55742L1.91416 2.72575C1.85785 2.67136 1.79139 2.6286 1.71856 2.59989C1.64572 2.57119 1.56795 2.55712 1.48968 2.55847C1.41141 2.55982 1.33417 2.57658 1.26237 2.60779C1.19058 2.63899 1.12563 2.68403 1.07124 2.74034C1.01685 2.79664 0.974085 2.86311 0.945383 2.93594C0.916681 3.00877 0.902605 3.08654 0.903959 3.16481C0.905313 3.24309 0.922071 3.32033 0.953275 3.39212C0.98448 3.46392 1.02952 3.52886 1.08582 3.58325L3.32582 5.82325C3.38005 5.87793 3.44457 5.92132 3.51565 5.95094C3.58674 5.98055 3.66298 5.9958 3.73999 5.9958C3.817 5.9958 3.89324 5.98055 3.96433 5.95094C4.03541 5.92132 4.09993 5.87793 4.15416 5.82325L8.91416 1.06325C8.97337 1.00863 9.02062 0.942331 9.05294 0.868539C9.08526 0.794748 9.10195 0.715062 9.10195 0.634502C9.10195 0.553943 9.08526 0.474257 9.05294 0.400465C9.02062 0.326674 8.97337 0.260377 8.91416 0.205752V0.205752Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                                <span class="label-text" style=" vertical-align: super; ">Я согласен (на) с
                                    <a href="/privacy-policy/">политикой конфиданциальности.</a></span>
                            </label>
                        </div>
                        <div class="form-response"></div>
                    </form>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Service Area End Here -->