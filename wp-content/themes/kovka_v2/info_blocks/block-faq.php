<?php

  $block_padding_top_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

  $block_padding_bottom_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

  $block_margin_top_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

  $block_margin_bottom_faq = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];




  $block_list = $post_info_block_fields["infoblock_faqlist"];

//    my variables
$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_side_block_status = trim($post_info_block_fields["faq_show_hide_side_block"]);
$block_side_illustration = trim($post_info_block_fields["faq_block_illustration_cns"]);
$block_side_title = trim($post_info_block_fields["faq_block_title_cns"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

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

<section id="<?=$block_id;?>" class="faq">
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="info w-100 d-flex flex-column justify-content-center align-items-center mt-5">
                <span class="subtitle"> <?= $block_subtitle ?> </span>
                <h3 class="main-title mb-0 text-center"><?= $block_title ?></h3>
                <hr>
            </div>
        </div>
        <div class="wrapper">
            <?php
            foreach($block_list as $faq_item => $faq_item_data) {
                $tmp_answer = trim($faq_item_data['faq_answer']);
                $tmp_answer = strip_tags($tmp_answer);
                $tmp_answer = trim($tmp_answer);
                $have_button_in_answer = $faq_item_data['faq_btn_yes_no'];
                $faq_btn = $faq_item_data['cns_btns_faq'];
            ?>
            <div class="container-faq">
                <div class="question">
                    <?=$faq_item_data['faq_question'];?>
                </div>
                <div class="answercont">
                    <div class="answer">
                        <?=$faq_item_data['faq_answer'];?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
