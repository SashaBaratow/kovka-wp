<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_title_num = trim($post_info_block_fields["infoblock_title_num"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top_recall = $block_padding_top_recall / 16;
$padding_bottom_recall = $block_padding_bottom_recall / 16;
$margin_top_recall = $block_margin_top_recall / 16;
$margin_bottom_recall = $block_margin_bottom_recall / 16;

$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_image = $post_info_block_fields["infoblock_image"];
$block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);
$block_btn = trim($post_info_block_fields["infoblock_btn"]);
$block_btn = (($block_btn != "") ? $block_btn : 'Отправить');

//my variables
$block_background_color_cns = strtolower($post_info_block_fields["recall_form_bg"]);
$block_form_image = $post_info_block_fields["infoblock_background_image"];
$block_form_type = $post_info_block_fields["recall_form_type"];
$block_form_img_position = $post_info_block_fields["recall_form_img_position"];
$block_form_btn_color = $post_info_block_fields["cns_btns_form_color"];
?>
<section class="recall" id="<?= $block_id; ?>" >
    <style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_recall?>rem;
            padding-bottom:<?= $padding_bottom_recall?>rem;
            margin-top: <?= $margin_top_recall?>rem;
            margin-bottom:<?= $margin_bottom_recall;?>rem;
        }
    </style>
    <div class="container">
        <div class="recall__item white d-flex <?= $block_form_img_position == 'left' ? '' : 'img-right' ?> " style="background: <?php
        switch ($block_background_color_cns){
            case 'white':
                echo "#fff";
                break;
            case 'blue':
                echo "linear-gradient(95.52deg, #1268CD 0%, #0655B1 100%);";
                break;
            case 'black':
                echo "linear-gradient(95.52deg, #29242E 0%, #19161C 100%);";
                break;
        } ?>">
            <div class="recall__img">
                <img src="<?=$block_form_image?>" alt="<?= $block_title; ?>" title="<?= $block_title; ?> - компания CNS">
            </div>
            <div class="recall__form <?= $block_background_color_cns != 'white' ? 'color-white' : '' ?>">
                <h2 <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?>><?= $block_title; ?></h2>
                <p><?= $block_subtitle; ?></p>
                <?php if(!empty($block_form_btn_color)): ?>
                <form class="ajax-form d-flex align-items-center <?= $block_form_type == 'question' ? 'three-field' : '' ?>" action="#" method="POST" enctype="multipart/form-data" id="recall-form" >
                    <input type="hidden" name="form_id" value="2">
                    <input type="hidden" name="mark" value="">
                    <div class="form-group form-email has-error has-danger">
                        <?php if($block_background_color_cns != 'white'){ ?>
                            <img src="<?= get_template_directory_uri()?>/assets/img/mail-Icon-w.png" alt="E-mail" title="Ваш E-mail">
                        <?php }else{  ?>
                            <img src="<?= get_template_directory_uri()?>/assets/img/mail-Icon.png" alt="E-mail" title="Ваш E-mail">
                        <?php }?>
                        <input type="email" class="style-input" autocomplete="off" required="" name="email" placeholder="E-Mail">
                        <div class="help-block with-errors d-none">
                            <ul class="list-unstyled">
                                <li>Пожалуйста, заполните это поле.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group form-phone">
                        <?php if($block_background_color_cns != 'white'){ ?>
                            <img src="<?= get_template_directory_uri()?>/assets/img/phone-Icon-w.png" alt="Телефон" title="Ваш телефон">
                        <?php }else{  ?>
                            <img src="<?= get_template_directory_uri()?>/assets/img/phone-Icon.png" alt="Телефон" title="Ваш телефон">
                        <?php }?>
                        <input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$" autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__" inputmode="text">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group form-msg has-error has-danger" style="display: <?= $block_form_type == 'question' ? '' : 'none' ?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width: 1.27rem;margin-right: 0.31rem;">
                            <path d="M10.0003 1.6665C8.35215 1.6665 6.74099 2.15525 5.37058 3.07092C4.00017 3.9866 2.93206 5.28809 2.30133 6.81081C1.6706 8.33353 1.50558 10.0091 1.82712 11.6256C2.14866 13.2421 2.94234 14.727 4.10777 15.8924C5.27321 17.0578 6.75807 17.8515 8.37458 18.173C9.99109 18.4946 11.6666 18.3296 13.1894 17.6988C14.7121 17.0681 16.0136 16 16.9292 14.6296C17.8449 13.2592 18.3337 11.648 18.3337 9.99984C18.3337 8.90549 18.1181 7.82186 17.6993 6.81081C17.2805 5.79976 16.6667 4.8811 15.8929 4.10728C15.1191 3.33346 14.2004 2.71963 13.1894 2.30084C12.1783 1.88205 11.0947 1.6665 10.0003 1.6665ZM10.0003 16.6665C8.68179 16.6665 7.39286 16.2755 6.29653 15.543C5.2002 14.8104 4.34572 13.7692 3.84113 12.5511C3.33655 11.3329 3.20453 9.99244 3.46176 8.69924C3.719 7.40603 4.35393 6.21814 5.28628 5.28579C6.21863 4.35344 7.40652 3.7185 8.69973 3.46127C9.99293 3.20403 11.3334 3.33606 12.5516 3.84064C13.7697 4.34522 14.8109 5.19971 15.5435 6.29604C16.276 7.39236 16.667 8.6813 16.667 9.99984C16.667 11.7679 15.9646 13.4636 14.7144 14.7139C13.4641 15.9641 11.7684 16.6665 10.0003 16.6665Z" fill="white"/>
                            <path d="M9.16698 12.7999C9.1679 12.5812 9.2547 12.3717 9.40865 12.2165C9.48612 12.1384 9.57829 12.0764 9.67984 12.0341C9.78139 11.9918 9.89031 11.97 10.0003 11.97C10.1103 11.97 10.2192 11.9918 10.3208 12.0341C10.4223 12.0764 10.5145 12.1384 10.592 12.2165C10.7459 12.3717 10.8327 12.5812 10.8336 12.7999C10.8333 12.9918 10.7667 13.1777 10.6451 13.3262C10.5234 13.4747 10.3543 13.5767 10.1662 13.6149C9.9781 13.6531 9.78257 13.6252 9.61266 13.5359C9.44275 13.4466 9.30888 13.3014 9.23365 13.1249C9.18987 13.0221 9.1672 12.9116 9.16698 12.7999Z" fill="white"/>
                            <path d="M8.74941 6.46772C9.12976 6.24828 9.5612 6.1329 10.0003 6.13318C10.6634 6.13318 11.2992 6.39658 11.7681 6.86542C12.2369 7.33426 12.5003 7.97014 12.5003 8.63318C12.5003 9.29623 12.2369 9.93211 11.7681 10.401C11.2992 10.8698 10.6634 11.1332 10.0003 11.1332C9.7793 11.1332 9.56734 11.0454 9.41106 10.8891C9.25478 10.7328 9.16698 10.5209 9.16698 10.2999C9.16698 10.0788 9.25478 9.86688 9.41106 9.7106C9.56734 9.55432 9.7793 9.46652 10.0003 9.46652C10.1465 9.46594 10.2899 9.42694 10.4162 9.35343C10.5425 9.27992 10.6472 9.17448 10.7199 9.0477C10.7926 8.92093 10.8307 8.77726 10.8303 8.63112C10.83 8.48498 10.7912 8.34151 10.7179 8.21509C10.6445 8.08868 10.5393 7.98377 10.4126 7.91089C10.2859 7.838 10.1423 7.79971 9.99618 7.79986C9.85004 7.8 9.70651 7.83858 9.57998 7.91171C9.45346 7.98484 9.34839 8.08996 9.27532 8.21652C9.16001 8.39791 8.97908 8.52773 8.77031 8.57886C8.56155 8.63 8.3411 8.59849 8.15502 8.49093C7.96893 8.38337 7.8316 8.20806 7.77172 8.00164C7.71183 7.79522 7.73402 7.57364 7.83365 7.38318C8.05321 7.0029 8.36905 6.68715 8.74941 6.46772Z" fill="white"/>
                        </svg>

                        <input type="text" class="style-input" autocomplete="off" required="" name="message" placeholder="Ваш вопрос">
                        <div class="help-block with-errors d-none">
                            <ul class="list-unstyled">
                                <li>Пожалуйста, заполните это поле.</li>
                            </ul>
                        </div>
                    </div>
                    
                    <?php if (!empty($block_form_btn_color )):?>
                        <?php foreach($block_form_btn_color as $header_btns_cns_items => $header_btns_cns_item) { ?>
                            <button  class="<?php
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
                                case 'white':
                                    echo " white-btn";
                                    break;
                            }
                            ?> btn disabled " type="submit">
                                <?=empty($header_btns_cns_item['case_btn_name_cns'])  ? 'Отправить' : $header_btns_cns_item['case_btn_name_cns'];?>
                            </button>
                        <?php } ?>
                    <?php endif;?>
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
                <?php endif; ?>
            </div>
        
        </div>
    </div>
</section>
