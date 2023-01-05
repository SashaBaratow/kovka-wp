<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_ben = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top = $block_padding_top_ben / 16;
$padding_bottom = $block_padding_bottom_ben / 16;
$margin_top = $block_margin_top_ben / 16;
$margin_bottom = $block_margin_bottom_ben / 16;


$block_list = $post_info_block_fields["infoblock_biglist"];
//$block_list_type = $post_info_block_fields["infoblock_biglist_type"];

$block_list_num_color = $post_info_block_fields["infoblock_biglist_num_color"];
$block_list_icon_width = $post_info_block_fields["infoblock_biglist_icon_width"];



$block_list_icon_aligment = $post_info_block_fields["infoblock_biglist_icon_aligment"];
$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';
//my variables
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

    <style>
         #<?= $block_id; ?> {
             padding-top:<?= $padding_top?>rem;
             padding-bottom:<?= $padding_bottom?>rem;
             margin-top: <?= $margin_top?>rem;
             margin-bottom:<?= $margin_bottom;?>rem;
         }
         .benefits .benefits-item.left {
             padding-left: <?= $block_list_icon_width ?>;
             position: relative;
         }
         .benefits .benefits-item.top-center img {
             height: <?= $block_list_icon_width ?>;
         }
         .benefits .benefits-item.top-center {
             padding-top: calc(<?= $block_list_icon_width ?> + 10px);
         }
         .benefits__img.illustration {
                width: <?= $block_list_icon_width ?>;
                min-width: <?= $block_list_icon_width ?> ;
                height: auto;
                background: none;
         }
         .benefits__img {
                width: <?= $block_list_icon_width ?>;
                min-width: <?= $block_list_icon_width ?> ;
                height: auto;
         }
    </style>

<!-- Преимущества х -->

<section id="<?= $block_id; ?>" class="benefits">
    <div class="container">
        <span class="subtitle"> <?= $block_subtitle; ?> </span>
        <h3 class="main-title text-center w-100 mb-3"> <?= $block_title; ?> </h3>
        <hr>
        <div class="benefits-block">
            <div class="row mt-5 flex-wrap ">
                <?php foreach ($block_list as $block_list_item => $block_list_item_data): ?>
                <div class="<?= $block_list_col_class; ?> mb-5 ">
                    <div class="benefits-item  <?php if ($block_list_icon_aligment == 'left') {echo 'left';} ?>
                    <?php if ($block_list_icon_aligment == 'top') {echo 'left-top';} ?> <?php if ($block_list_icon_aligment == 'top-center') {echo 'top-center';} ?>">
                        <img src="<?= $block_list_item_data['icon'] ?>" style="width:<?= $block_list_icon_width; ?>; alt="">
                        <div class="info-block">
                            <h5> <?= $block_list_item_data['title'] ?> </h5>
                            <p>
                                <?= $block_list_item_data['descr'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
