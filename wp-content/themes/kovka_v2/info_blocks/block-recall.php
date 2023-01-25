<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$infoblock_btn_url = trim($post_info_block_fields["infoblock_btn_url"]);
$infoblock_btn_text = trim($post_info_block_fields["infoblock_btn"]);


$block_padding_top_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_recall = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top_recall = $block_padding_top_recall / 16;
$padding_bottom_recall = $block_padding_bottom_recall / 16;
$margin_top_recall = $block_margin_top_recall / 16;
$margin_bottom_recall = $block_margin_bottom_recall / 16;


//my variables
$block_bg_image = $post_info_block_fields["infoblock_background_image"];
?>
<style>
    #<?= $block_id; ?> {
        padding-top:<?= $padding_top_recall?>rem;
        padding-bottom:<?= $padding_bottom_recall?>rem;
        margin-top: <?= $margin_top_recall?>rem;
        margin-bottom:<?= $margin_bottom_recall;?>rem;
    }
    <?php if(!empty($block_bg_image)){ ?>
        #<?= $block_id; ?> {
            background-image:url("<?=$block_bg_image?>");
            background-size: cover;
            background-repead: no-repead;
        }
    <?php } else {?>
        #<?= $block_id; ?> {
            background-color: #000;
        }
    <?php }
 ?>

</style>
<section id="<?= $block_id; ?>" class="cta">
    <div class="container">
        <div class="row d-flex justify-content-center justify-content-md-between align-items-center text-center  text-md-left">
            <div class="col-12 col-md-8 ">
                <h2 class="mb-5 mb-md-0"> <?= $block_title ?> </h2>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <a href="<?= $infoblock_btn_url ?>"> <?= $infoblock_btn_text ?> </a>
            </div>
        </div>
    </div>
</section>
