<?php



$block_title = trim($post_info_block_fields["infoblock_title"]);

$block_padding_top_map = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];

$block_padding_bottom_map = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];

$block_margin_top_map = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];

$block_margin_bottom_map = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$padding_top_map = $block_padding_top_map / 16;
$padding_bottom_map = $block_padding_bottom_map / 16;
$margin_top_map = $block_margin_top_map / 16;
$margin_bottom_map = $block_margin_bottom_map / 16;

$block_background_enable = $post_info_block_fields["infoblock_background_enable"];

$block_background_image = $post_info_block_fields["infoblock_background_image"];

$block_background_image_mobile = $post_info_block_fields["infoblock_background_image_mobile"];

$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);
$block_dark_overlay = $post_info_block_fields["infoblock_dark_overlay"];
$block_white_foreground = $post_info_block_fields["infoblock_white_foreground"];
$block_map = $post_info_block_fields["map_new"];

$block_map_phone = $option_phone ?? '';

?>





<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>



<!-- Contact Area Start Here -->


<!-- Contact Area End Here -->
<section class="map" id="<?= $block_id; ?>" style="min-height:23.75rem;">
    <style>
        #<?= $block_id; ?> {
            padding-top:<?= $padding_top_map?>rem;
            padding-bottom:<?= $padding_bottom_map?>rem;
            margin-top: <?= $margin_top_map?>rem;
            margin-bottom:<?= $margin_bottom_map;?>rem;
        }
    </style>
    <div class="container">
        <div id="<?= $block_id; ?>-map" class="map-block">
        </div>
        <div class="map__info-wrap">
            <div class="map__info">
                <h2><?= $block_title?></h2>
                <ul>
                    <?php
                    if (!empty($block_map['map_elements'])):
                        foreach ($block_map['map_elements'] as $element => $block_map_element_item):
                            if(empty($block_map_element_item['map_link'])) : ?>
                            <li>
                                <img src="<?= $block_map_element_item['map_icon']?>" alt="<?= $block_map_element_item['map_text']?>">
                                <span><?= $block_map_element_item['map_text']?></span>
                            </li>
                            <?php elseif(!empty($block_map_element_item['map_link'])): ?>
                            <li>
                                <img src="<?= $block_map_element_item['map_icon']?>" alt="<?= $block_map_element_item['map_text']?>">
                                <a href="<?= $block_map_element_item['map_link'] ?>" ><?= $block_map_element_item['map_text']?></a>
                            </li>
                        <?php endif; endforeach; endif;?>
                </ul>
                <p><?= $block_map['text_over_map_btn']?></p>
                <?php if ($block_map['cns_btns_map'] ):?>
                    <?php foreach($block_map['cns_btns_map'] as $header_btns_cns_items => $header_btns_cns_item) { ?>
                        <a href="<?= $header_btns_cns_item['case_btn_link_cns']?>" class="<?php
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
                        }
                        ?> ">
                            <?=$header_btns_cns_item['case_btn_name_cns'];?>
                        </a>
                    <?php } ?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<script>

    var welcomeMap;

    var welcomeMarkers = [{

        "map_point_lat": "<?= $block_map['map_new_shirota']; ?>",

        "map_point_lng": "<?= $block_map['map_new_dolgota']; ?>",

        "map_point_address": "<?= $block_map['map_new_adres']; ?>"

    }];



    // Дождёмся загрузки API и готовности DOM.

    ymaps.ready(init);



    function init() {

        welcomeMap = new ymaps.Map('<?= $block_id; ?>-map', {

            center: [<?= $block_map['map_new_shirota']; ?>, <?= $block_map['map_new_dolgota']; ?>], // Москва

            zoom: 8,

            controls: []

        });



        var zoomControl = new ymaps.control.ZoomControl({

            options: {

                size: "large",

                position: {

                    right: 50,

                    top: 120

                }

            }

        });



        var fullscreenControl = new ymaps.control.FullscreenControl({

            options: {

                position: {

                    right: 50,

                    top: 50

                }

            }

        });



        welcomeMap.events.add('balloonopen', function(e) {

            var balloon = e.get('balloon');

            welcomeMap.events.add('click', function(e) {

                if (e.get('target') === welcomeMap) { // Если клик был на карте, а не на геообъекте

                    welcomeMap.balloon.close();

                }

            });

        });



        // Добавление контролов на карту

        welcomeMap.controls.add(zoomControl);

        welcomeMap.controls.add(fullscreenControl);

        welcomeMap.behaviors.disable('scrollZoom');



        var myCollection = new ymaps.GeoObjectCollection();





        for (var i = 0; i < welcomeMarkers.length; i++) {

            var marker_obj = welcomeMarkers[i];



            var lat = parseFloat(marker_obj.map_point_lat);

            var lon = parseFloat(marker_obj.map_point_lng);

            var popupText = marker_obj.map_point_address;

            var popupPhone = (marker_obj.map_point_phone) ? "<br>" + marker_obj.map_point_phone : "";





            myCollection.add(

                new ymaps.Placemark([lat, lon], {

                    balloonContent: popupText + popupPhone

                }, {

                    iconLayout: 'default#image',

                    iconImageHref: '<?php bloginfo('stylesheet_directory'); ?>/img/point.png',

                    iconImageSize: [30, 53],

                    iconImageOffset: [-22, -60],

                    // Балун не имеет тени

                    balloonShadow: false,

                }));



        }





        welcomeMap.geoObjects.add(myCollection);

        welcomeMap.setBounds(myCollection.getBounds(), {

            checkZoomRange: true

        }).then(function() {

            if (welcomeMap.getZoom() > 11) welcomeMap.setZoom(16);

        }); // Масштабируем карту на область видимости геообъекта.

    }

</script>