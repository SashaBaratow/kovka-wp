<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_text = trim($post_info_block_fields["infoblock_text_img_text"]);
$img_text_ben_on_off = $post_info_block_fields["img_text_ben_on_off"];
$benefits_text_img = $post_info_block_fields["benefits_text_img"];

$infoblock_btn_on_off = $post_info_block_fields["infoblock_btn_on_off"];
$infoblock_btn_url = $post_info_block_fields["infoblock_btn_url"];
$infoblock_btn = $post_info_block_fields["infoblock_btn"];
$block_image = $post_info_block_fields["infoblock_image"];
$block_image_show = $post_info_block_fields["infoblock_show_image"];
$infoblock_image_orientation = $post_info_block_fields["infoblock_image_orientation"];



$block_btn = $post_info_block_fields["infoblock_btn"];

$block_padding_top_text = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_text = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_text = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_text = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_list = $post_info_block_fields["infoblock_collums_img_text"];
//$block_list_type = $post_info_block_fields["infoblock_biglist_type"];
$padding_top_text = $block_padding_top_text / 16;
$padding_bottom_text = $block_padding_bottom_text / 16;
$margin_top_text = $block_margin_top_text / 16;
$margin_bottom_text = $block_margin_bottom_text / 16;
?>

<style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_text?>rem !important;
            padding-bottom:<?= $padding_bottom_text?>rem !important;
            margin-top: <?= $margin_top_text?>rem !important;
            margin-bottom:<?= $margin_bottom_text;?>rem !important;
        }
    </style>
<section id="<?= $block_id; ?>" class="img-text <?php if($img_text_ben_on_off && !$block_image_show){echo 'no-img point';} ?>
<?php if(!$img_text_ben_on_off && !$block_image_show){echo 'no-img';} ?> ">
    <!--  no-img point  -->
    <div class="container">
        <div class="row d-flex  <?php if( $infoblock_image_orientation == 'left' && $block_image_show){ echo 'flex-row-reverse'; } ?>">
            <!--      col-lg-12    -->
            <div class="<?php if ($block_image_show || $img_text_ben_on_off){ echo 'col-12 col-md-6 col-lg-6 d-flex flex-column justify-content-start align-items-start pt-5'; }?>
            <?php if (!$block_image_show && !$img_text_ben_on_off){echo 'col-12 col-md-12 col-lg-12 d-flex flex-column justify-content-start align-items-center pt-5';} ?>">
                <span class="subtitle"> <?= $block_subtitle ?> </span>
                <h3 class="img-text-title <?php if (!$block_image_show && !$img_text_ben_on_off){echo 'text-center w-100';} ?>"> <?= $block_title ?> </h3>
                <hr>
                <p class="<?php if (!$block_image_show && !$img_text_ben_on_off){echo 'text-center';} ?>"><?= $block_text; ?></p>
                <?php if($img_text_ben_on_off && $block_image_show): ?>
                <?php foreach ($benefits_text_img as $benefits_item): ?>
                    <div class="points">
                    <img src="<?= $benefits_item["ben_icon"] ?>" alt="">
                    <div class="point-desc">
                        <h5> <?= $benefits_item["ben_title"] ?> </h5>
                        <span>
                           <?= $benefits_item["text"] ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; endif; ?>
                <?php if ($block_image_show && $infoblock_btn_on_off || $img_text_ben_on_off && $block_image_show && $infoblock_btn_on_off || !$block_image_show && !$img_text_ben_on_off && $infoblock_btn_on_off): ?>
                    <a href="<?= $infoblock_btn_url; ?>"><?= $infoblock_btn ?></a>
                <?php endif; ?>
            </div>
            <?php if($block_image_show): ?>
            <div class="col-12 col-md-6 col-lg-6 img-block">
                <img src="<?= $block_image ?>" alt="">
            </div>
            <?php endif; ?>
            <?php if(!$block_image_show && $img_text_ben_on_off): ?>
                <div class="col-12 col-md-6 col-lg-6 point-block">
                    <?php foreach ($benefits_text_img as $benefits_item): ?>
                        <div class="points">
                            <img src="<?= $benefits_item["ben_icon"] ?>" alt="">
                            <div class="point-desc">
                                <h5> <?= $benefits_item["ben_title"] ?> </h5>
                                <span>
                           <?= $benefits_item["text"] ?>
                        </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if (!$block_image_show && $img_text_ben_on_off && $infoblock_btn_on_off): ?>
                        <a style="width: fit-content;" href="<?= $infoblock_btn_url; ?>"><?= $infoblock_btn ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>