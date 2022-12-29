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

$timetable_list = $post_info_block_fields["infoblock_timetable"];
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
</style>

<section class="timetable <?= ($block_white_foreground != "") ? " white-foreground " : ""; ?>" id="<?= $block_id; ?>">
    <div class="container">
        <h2 class="text-center"><?= $block_title; ?></h2>
        <p class="text-center"><?= $block_subtitle; ?></p>
        <div class="table-responsive">
            <table class="timetable__table">
                <thead>
                    <tr>
                        <th>Название курса</th>
                        <th>Пн</th>
                        <th>Вт</th>
                        <th>Ср</th>
                        <th>Чт</th>
                        <th>Пт</th>
                        <th>Сб</th>
                        <th>Вс</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($timetable_list as $item) { ?>
                        <tr>
                            <?php if ($item['timetable_tip'][0] == 'descr') { ?>
                                <td class="master-name"><?= $item['timetable_des']['timetable_name']; ?></td>
                                <td colspan="7"><a href="#popup-master" class="master-popup">
                                        <div class="master-time"><?= $item['timetable_des']['timetable_text']; ?></div><span>Записаться</span>
                                    </a></td>
                                <?php } else {
                                $i = 0;
                                foreach ($item['timetable_list'] as $td) {
                                    $i++  ?>
                                    <td <?php if ($i == 1) {
                                            echo 'class="master-name"';
                                        } ?>>
                                        <?php if ($i == 1) {
                                            echo $td;
                                        } elseif ($td) { ?>
                                            <a href="#popup-master" class="master-popup">
                                                <div class="master-time"><?= $td; ?></div><span>Записаться</span>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <?php }
                            } ?>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $('table').on('click', 'td', function(e) {
        var day = e.delegateTarget.tHead.rows[0].cells[this.cellIndex],
            name = this.parentNode.cells[0];
        $('#popup-master .modal-title span').text($(name).text())
        $('#popup-master #master-title').val($(name).text())
        $('#popup-master #master-day').val($(day).text())
        $('#popup-master #master-time').val($(this).find('.master-time').text())
    })
</script>