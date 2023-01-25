<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_background_enable = $post_info_block_fields["infoblock_background_enable"];
$block_background_image = $post_info_block_fields["infoblock_background_image"];
$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];
$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);

$block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];
$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];

$block_btn = $post_info_block_fields["infoblock_btn"];
$block_btn_url = $post_info_block_fields["infoblock_btn_url"];
$block_image = $post_info_block_fields["infoblock_image"];
$block_image_orientation = $post_info_block_fields["infoblock_image_orientation"];

// $block_list = $post_info_block_fields["infoblock_list"];
// $block_list_type = $post_info_block_fields["infoblock_biglist_type"];
 
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

<?php

$block_showcase = array();
$block_type = $post_info_block_fields["infoblock_show_type"];

if ($block_type == "all") {
    // Все записи
    $team_query_args = array(
        'numberposts'    =>  -1,
        'post_type'  =>   'showcase',
        'order' => 'ASC',
    );
} else {
    // выбранные записи
    $block_list = $post_info_block_fields["infoblock_showcase_list"];
    $team_query_args = array(
        'numberposts'    =>  -1,
        'post_type'  =>   'showcase',
        'post__in' => $block_list,
        'orderby' => 'post__in',
        'order' => 'ASC',
    );
}
$showcase_query = get_posts($team_query_args);
$block_list_item = [];

foreach ($showcase_query as $list) {
    $id = $list->ID;
    $item = [
        'id' => $id,
        'name' => get_the_title($id),
        'descr' => get_field('showcase_descr', $id),
        'price' => get_field('showcase_price', $id),
        'link' => get_field('showcase_link', $id),
        'photo' => get_field('showcase_gall', $id),
    ];

    $block_list_item[] = $item;
}
?>

<style>
    #<?= $block_id; ?> {
        padding-top: <?= $block_padding_top; ?>px;
        padding-bottom: <?= $block_padding_bottom; ?>px;
        margin-top: <?= $block_margin_top; ?>px;
        margin-bottom: <?= $block_margin_bottom; ?>px;
        position: relative;
        <? if (($block_background_color != '') && ($block_background_color != '#ffffff')) { ?>background-color: <?= $block_background_color; ?>;
        <? } ?>
    }

    <? if ($block_white_foreground) { ?>#<?= $block_id; ?>h2,
    #<?= $block_id; ?>p {
        color: #ffffff;
    }

    <? } ?><? if ($block_background_image != '' && $block_background_enable) { ?><? if ($block_dark_overlay) { ?>#<?= $block_id; ?>:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.7;
        z-index: 1;
    }

    <? } ?>#<?= $block_id; ?>>div {
        position: relative;
        z-index: 5;
    }

    #<?= $block_id; ?>:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-image: url(<?= $block_background_image; ?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 0;
    }

    @media only screen and (min-width: 768px) {
        #<?= $block_id; ?>:after {
            background-attachment: fixed;
        }
    }

    @media only screen and (max-width: 767px) {
        #<?= $block_id; ?>:after {
            <?php if ($block_background_image_mobile != "") { ?>background-image: url(<?= $block_background_image_mobile; ?>);
            <?php } ?>
        }
    }

    <? } ?>
</style>

<section class="showcase" id="<?= $block_id; ?>">
    <div class="container">
        <h2 class="text-center"><?= $block_title; ?></h2>
        <p  class="text-center"><?= $block_subtitle; ?></p>
        <div class="showcase__sort">
            <button class="showcase__btn showcase__btn-min" data-sort="min-max">Цена по возрастанию</button>
            <button class="showcase__btn showcase__btn-max" data-sort="max-min">Цена по убыванию</button>
        </div>
        <div class="showcase__list row">
            <?php foreach ($block_list_item as $showcase_info => $showcase_info_data) { ?>
                <div class="<?= $block_list_col_class; ?> showcase__card">
                    <div class="showcase__item" data-price="<?= str_replace(" ", "", $showcase_info_data['price']); ?>">
                        <h3 class="showcase__title"><?= $showcase_info_data['name']; ?></h3>
                        <div class="showcase__gall-wrap">
                            <div class="showcase__gall">
                                <?php
                                foreach ($showcase_info_data['photo'] as $img) { ?>
                                    <div class="showcase__gall-item">
                                        <a href="#popup-painting" data-name="<?= $showcase_info_data['name']; ?>"><img src="<?= $img['sizes']['gallery_medium']; ?>" alt="" class="showcase__img"></a>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="showcase__gall__dot"></div>
                        </div>
                        <?php if($showcase_info_data['price'] != ''){ ?>
                        <span class="showcase__price"><?= $showcase_info_data['price']; ?> ₽</span>
                        <?php } ?>
                        <div class="showcase__des"><?= $showcase_info_data['descr']; ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    $('.showcase__gall').slick({
        infinite: false,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.showcase__gall-item a').on('click', function () {
        $('#popup-painting .modal-title span').text($(this).data('name'));
        $('#popup-painting #painting_name').val($(this).data('name'));
    })
</script>

<script>
    $(document).ready(function() {

        $('.showcase__btn-min').on('click', function() {
            sortProductsPriceAscending();
        });

        $('.showcase__btn-max').on('click', function() {
            sortProductsPriceDescending();
        });

        sortProductsPriceDescending();

        function sortProductsPriceAscending() {
            var gridItems = $('.showcase__card');

            gridItems.sort(function(a, b) {
                return $('.showcase__item', a).data("price") - $('.showcase__item', b).data("price");
            });

            $(".showcase__list").append(gridItems);

            $(".showcase__btn").removeClass("active");
            $('.showcase__btn-min').addClass("active");
        }

        function sortProductsPriceDescending() {
            var gridItems = $('.showcase__card');

            gridItems.sort(function(a, b) {
                return $('.showcase__item', b).data("price") - $('.showcase__item', a).data("price");
            });

            $(".showcase__list").append(gridItems);
            $(".showcase__btn").removeClass("active");
            $('.showcase__btn-max').addClass("active");
        }

    });
</script>