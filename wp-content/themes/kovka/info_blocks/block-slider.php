<?php

$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];


if ($post_info_block_fields['infoblock_type'] == 'slider') :
    $block_slides = $post_info_block_fields["infoblock_slider"];
?>

    <style>

    <? if ($block_white_foreground) { ?>
    #<?= $block_id; ?> .slider-main__title h1 ,
    #<?= $block_id; ?> .slider-main__title h2 ,
    #<?= $block_id; ?> .slider-main__desc {
    color: #000000!important;
    }
    <? } ?>
        .slider {
            overflow: hidden;
        }

        .slider-main__item {
            width: 100%;
            height: auto;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .slider-main__info {
            color: #ffffff;
            padding-top: 50px;
        }


        .slider-main__title a {
            color: #fff;
        }

        .slider-main__title a:hover {
            color: #b73e02;
        }

        .slider-main__desc {
            font-size: 15px;
            line-height: 26px;
            margin-top: 25px;
            font-weight: 400;
        }


        .slider-main__title h1,
        .slider-main__title h2 {
            font-weight: 700;
            line-height: 1.22727;
            font-size: 30px;
            color: white;
        }

        .slider .button-lg {
            font-size: 16px;
            line-height: 25px;
            padding: 9px 30px 12px;
            margin-top: 30px;
            font-weight: 400;
            color: rgb(255, 255, 255);
            background-color: rgb(166, 143, 101);
            border-color: rgb(166, 143, 101);
            border-style: solid;
            border-width: 2px;
            display: inline-block;
        }

        .slider .button-lg:hover {
            background-color: transparent;
        }

        @media (min-width: 992px) {

            .slider-main__title h1,
            .slider-main__title h2 {
                font-size: 40px;
                line-height: 1;
            }
        }

        @media (min-width: 1200px) {

            .slider-main__title h1,
            .slider-main__title h2 {
                font-size: 50px;
                line-height: 1.3;
            }
        }

        @media (max-width: 576px) {
            .slider-main__info {
                text-align: center;
            }

        }
    </style>
    <section id="<?= $block_id; ?>" class="slider">
        <div class="slider-main">
            <?php if (!empty($block_slides)) { ?>
                <?php $i = 1;
                foreach ($block_slides as $slider) { ?>
                    <?php $tag = ($i == 1) ? 'h1' : 'h2'; ?>
                    <div class="slider-main__item" style="background-image: url(<?= $slider["slide_item_image"]; ?>);">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-10 col-md-8 col-lg-7 offset-lg-1">
                                    <div class="slider-main__info">
                                        <div class="slider-main__title">
                                            <<?= $tag; ?>>
                                                <?= $slider["slide_item_title"]; ?>
                                            </<?= $tag; ?>>
                                        </div>
                                        <div class="slider-main__desc"><?= $slider["slide_item_subtitle"]; ?></div>
                                        <a href="#popup" class="button button-lg button-secondary  button-winona" data-effect="mfp-zoom-in">
                                            <?= $slider["slide_item_url_title"]; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php $i++;
                } ?>
            <?php } ?>
        </div>
    </section>
    <script>
        $(function() {
            function myfun() {
                var width = parseInt($('.slider-main__item').css('width')),
                    h = 0;
                if (window.matchMedia("(min-width: 1200px)").matches) {
                    h = width / 2;
                } else if (window.matchMedia("(min-width: 1024px)").matches) {
                    h = width / 2.4;
                } else if (window.matchMedia("(min-width: 768px)").matches) {
                    h = width / 2;
                } else {
                    h = width / 1.2;
                }
                $(".slider-main__item").css('height', h);
            };
            myfun();
        });
    </script>

<?php endif; ?>