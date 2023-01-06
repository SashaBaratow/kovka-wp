<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_text = trim($post_info_block_fields["infoblock_text_img_text"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

?>

<style>
	#<?= $block_id; ?> {
		padding-top: <?= $block_padding_top_form; ?>px;
		padding-bottom: <?= $block_padding_bottom_form; ?>px;
		margin-top: <?= $block_margin_top_form; ?>px;
		margin-bottom: <?= $block_margin_bottom_form; ?>px;
		position: relative;
	}
</style>


<section class="recall mt-5 mb-5">
    <div class="container">
        <div class="row d-flex">
            <div class="clo-12 col-md-4">
                <div class="info d-flex flex-column justify-content-start align-items-start mt-5">
                    <span class="subtitle"> <?= $block_subtitle ?> </span>
                    <h3 class="main-title mb-0 text-left"><?= $block_title ?></h3>
                    <hr>
                    <p><?= $block_text ?></p>
                </div>
            </div>
            <div class="col-12 col-md-8">

                <form action="#" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="name" value="" size="40" placeholder="Имя*">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="email" name="email" value="" size="40" placeholder="Email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="number" value="" size="40" placeholder="Телефон*">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="text" name="text-30" value="" size="40" placeholder="Тема">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <textarea name="message" cols="40" rows="6" placeholder="Сообщение"></textarea>
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary">Отправить
                            </button>
                        </p>
                    </div>
                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>

            </div>
        </div>

    </div>
</section>