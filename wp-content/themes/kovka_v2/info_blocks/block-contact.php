<?php

$block_title = trim($post_info_block_fields["infoblock_title"]);
$block_subtitle = trim($post_info_block_fields["infoblock_subtitle"]);

$block_with_heading = (($block_title != "" || $block_subtitle != "") ? true : false);

$block_padding_top_cont = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_top"];
$block_padding_bottom_cont = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_padding_bottom"];
$block_margin_top_cont = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_top"];
$block_margin_bottom_cont = (int)$post_info_block_fields["infoblock_padding_margin"]["infoblock_margin_bottom"];

$block_background_color = strtolower($post_info_block_fields["infoblock_background_color"]);

$block_btn = trim($post_info_block_fields["infoblock_btn"]);
$block_btn = (($block_btn != "") ? $block_btn : 'Отправить');
?>


<style>
	#<?= $block_id; ?> {
		padding-top: <?= $block_padding_top_cont; ?>px;
		padding-bottom: <?= $block_padding_bottom_cont; ?>px;
		margin-top: <?= $block_margin_top_cont; ?>px;
		margin-bottom: <?= $block_margin_bottom_cont; ?>px;
		position: relative;

		<? if (($block_background_color !='') && ($block_background_color !='#ffffff')) {
			?>background-color: <?= $block_background_color; ?>;
			<?
		}

		?>
	}

	.callback .item-title {
		font-size: 46px;
		color: white;
		margin: 0;
		text-transform: none;
	}

	.callback h5 {
		color: white;
	}

	.callback-btn {
		display: block;
		padding: 15px 30px;
		letter-spacing: .04em;
		font-weight: 500;
		font-size: 12px;
		background-color: white;
		color: black;
		border-radius: .12rem;
	}

	.callback-btn:hover {
		background-color: black;
		color: white;
	}

	@media only screen and (max-width: 1200px) {
		.callback .item-title {
			font-size: 28px;
			color: white;
			margin: 0;
			text-transform: none;
		}
	}


	@media only screen and (max-width: 768px) {
		.callback .callback-btn {
			margin-top: 30px;
		}
	}
</style>

<!-- Call To Action Area Start Here -->
<section id="<?= $block_id; ?>" class="callback action-wrap-layout1 bg-common <?= ($block_white_foreground != "") ? " white-foreground " : ""; ?>" data-bg-image="<?= get_template_directory_uri() ?>/img/figure/banner-shape.png">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-9 col-md-7 col-12">
				<div class="action-box-layout1">
					<h2 class="item-title"><?= $block_title; ?></h2>
					<h5><?= $block_subtitle; ?></h5>
				</div>
			</div>
			<div class="col-lg-3 col-md-5 col-12 d-flex justify-content-lg-end justify-content-start">
				<div class="action-box-layout1">
					<a href="#popup" class="callback-btn text-uppercase bg-textprimary text-accent" onclick="ym(61467418, 'reachGoal', 'cons_btn'); return true;"><?= $block_btn; ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Call To Action Area End Here -->