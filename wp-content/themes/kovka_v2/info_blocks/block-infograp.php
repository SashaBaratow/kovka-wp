<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_padding_top_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

//my variables
$block_list = $post_info_block_fields["infoblock_infografica"];

$padding_top_info = $block_padding_top_info / 16;
$padding_bottom_info = $block_padding_bottom_info / 16;
$margin_top_info  = $block_margin_top_info / 16;
$margin_bottom_info  = $block_margin_bottom_info / 16;

$cns_btn = $post_info_block_fields["cns_btns"];
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

<style>
  #<?= $block_id; ?> {
    
    padding-top: <?= $padding_top_info ?>;
    padding-bottom:<?= $padding_bottom_info ?>;
    margin-top:<?= $margin_top_info ?>;
    margin-bottom: <?= $margin_bottom_info; ?>
  }
</style>


<section id="<?= $block_id; ?>" class="infographics">
    <div class="container">
        <span class="subtitle"> <?= $block_subtitle ?> </span>
        <h3 class="main-title text-center w-100 mb-3"> <?= $block_title ?> </h3>
        <hr class="">
        <div class="infographics-item-overlay row mt-5 d-flex flex-row flex-nowrap  justify-content-center" >
        <?php foreach ($block_list as $block_list_item => $block_list_item_data) : ?>
            <div class=" infographics-item">
                <div class="numbers d-flex justify-content-center">
                    <span class="counter" data-target="<?= $block_list_item_data['number']; ?>">1</span>
                    <span>+</span>
                </div>
                <h5><?= $block_list_item_data['descr']; ?></h5>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
</section>


