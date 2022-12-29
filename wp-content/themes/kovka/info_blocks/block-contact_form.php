<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);
$block_text = trim($post_info_block_fields["infoblock_text"]);
$block_image = trim($post_info_block_fields["infoblock_image"]);
$block_image2 = trim($post_info_block_fields["infoblock_image2"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_form = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];


$block_contact_group = $post_info_block_fields["contact_form"];
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

<section class="contacts">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="contacts__info">
					<?php
						if($block_title != ''){?>
					<h2><?= $block_title; ?></h2>
							
						<?php }
					?>
					<ul class="contacts__list">
						<?php
						foreach ($block_contact_group as $value) { ?>
							<li><img src="<?= $value['contact_form_icon']['sizes']['thumbnail']; ?>" alt=""><span><?= $value['contact_form_text']; ?></span></li>
						<?php }
						?>
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="contacts__form">
					<form class="contacts-form ajax-form" action="<?= home_url($_SERVER['REQUEST_URI']); ?>"  method="post" data-successurl="<?= esc_url(home_url('/')); ?>spasibo">
						<p>Заполните форму обратной связи и мы свяжемся с Вами в течение 15 минут</p>
						<input type="hidden" name="form_id" value="6">
						<!--<input type="hidden" name="mark" value="">-->
						<div class="row">
							<div class="col-md-6 form-group">
								<input type="text" class="style-input" autocomplete="off" required="" name="name" placeholder="Ваше имя*">
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-md-6 form-group">
								<input type="tel" class="style-input" pattern="^\+\d?\(\d{3}\)\d{3}-\d{2}-\d{2}$" autocomplete="off" name="phone" required="" placeholder="+7 (___) ___-__-__">
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-md-12 form-group">
								<textarea class="style-area" autocomplete="off" name="message" placeholder="Комментарий"></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-md-12 form-group text-center">
								<button class="btn-orange but" type="submit">Оставить заявку</button>
							</div>
						</div>
						<div class="form-check form-check-inline pretty-check">
							<label>
								<input type="checkbox" checked="" required="" name="privacy" value="1">
								<span class="label-text" style=" vertical-align: super; ">Отправляя свои данные, Вы
									соглашаетесь
									с <a href="/privacy-policy/">политикой конфиданциальности.</a></span>
							</label>
						</div>
						<div class="form-response"></div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</section>