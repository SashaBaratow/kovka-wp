<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_title_underline = trim($post_info_block_fields["infoblock_title_underline"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_padding_top_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_info = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';
//my variables
$block_list = $post_info_block_fields["infoblock_infografica"];
$block_infografica_icon_aligment = $post_info_block_fields["infoblock_number_aligment"];

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
  #<?= $block_id; ?>{
    
    padding-top: $padding_top_info;
    padding-bottom:$padding_bottom_info;
    margin-top:$margin_top_info;
    margin-bottom: $margin_bottom_info;
  }
</style>
<!-- Преимущества -->
<section class="infographic" id="<?= $block_id; ?>">
    <style>
        .infographic {
            padding: 40px 0;
        }

        .infographic__item {
          <?php switch ($block_list_cols) {
            case 1: ?>
            width: 100%;
           <?php break;
            case 2: ?>
            width: calc(100% / 2 );
           <?php
            break;
            case 3: ?>
            width: calc(100% / 3 );
            <?php break;
            case 4: ?>
            width: calc(100% / 4 );
            <?php break;
            case 5: ?>
            width: calc(100% / 5);
            <?php break;
            case 6: ?>
            width: calc(100% / 6 );
            <?php break;
        }

        ?>
        }
    </style>
    <div class="container">
        <div class="section-head">
            <h2 class="section-title top-line" <?= $block_title_underline ? "style='text-decoration: underline;'" : '' ?> ><?= $block_title ?></h2>
            <span><?= $block_subtitle ?></span>
        </div>
        <div class="infographic__list">
            <?php foreach ($block_list as $block_list_item => $block_list_item_data) :?>
                <div class="infographic__item  <?= $block_infografica_icon_aligment == 'top-center' ? 'top-center' : '' ; ?>">
                    <div class="infographic__img num">
                        <span>
                          <?php if(!$block_list_item_data['infograph_set_icon']): ?>
                          <?= $block_list_item_data['number']; ?>
                          <?php else : ?>
                          <img src="<?= $block_list_item_data['infograph_icon']; ?>" alt="">  
                          <?php endif; ?>
                        </span>
                    </div>
                    <div class="infographic__descr">
                        <h3><?= $block_list_item_data['title']?></h3>
                        <p><?= $block_list_item_data['descr']; ?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<!-- Преимущества х -->


