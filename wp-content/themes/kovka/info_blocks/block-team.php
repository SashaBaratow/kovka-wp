<?php
$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_team_list = $post_info_block_fields["infoblock_team_list"];

$block_list_cols = (int)$post_info_block_fields["infoblock_cols"];
$block_list_col_class = 'col-12';

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
        padding-top: <?= $block_padding_top; ?>px;
        padding-bottom: <?= $block_padding_bottom; ?>px;
        margin-top: <?= $block_margin_top; ?>px;
        margin-bottom: <?= $block_margin_bottom; ?>px;
        position: relative;
    }
</style>


<?php

$team_query_args = array(
    'numberposts'    =>  -1,
    'post_type'  =>   'team',
    'post__in' => $block_team_list,
    'orderby' => 'post__in',
    'order' => 'ASC',
);

$team_query = get_posts($team_query_args);

$team_ready = array();

foreach ($team_query as $team_info) {
    $team_info_id = $team_info->ID;
    $team_info_name = get_the_title($team_info_id);
    $team_info_photo = get_field('team_img', $team_info_id);
    $team_info_permalink = get_permalink($team_info_id);
    $team_info_descr = get_field('team_min_des', $team_info_id);

    $team_info_ready = array(
        'id' => $team_info_id,
        'name' => $team_info_name,
        'photo' => $team_info_photo,
        'link' => $team_info_permalink,
        'descr' => $team_info_descr,
    );
    $team_ready[] = $team_info_ready;
}

?>

<section class="teachers" id="<?= $block_id; ?>">
    <div class="container">
        <h2 class="text-center"><?= $block_title; ?></h2>
        <p><?$block_subtitle;?></p>
        <div class="teachers__list row">
            <?php foreach ($team_ready as $team_info => $team_info_data) { ?>
                <div class="<?= $block_list_col_class; ?>">
                    <a href="<?= $team_info_data['link']; ?>" class="teachers__item">
                        <h3 class="teachers__name"><?= $team_info_data['name']; ?></h3>
                        <div class="teachers__img">
                            <img src="<?= $team_info_data['photo']['sizes']['gallery_medium']; ?>" alt="<?= $team_info_data['name']; ?>">
                        </div>
                        <div class="teachers__des">
                            <?= $team_info_data['descr']; ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>