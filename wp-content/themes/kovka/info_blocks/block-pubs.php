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

$pubs_type = $post_info_block_fields["infoblock_pubs_type"];
$pubs_limit = $post_info_block_fields["infoblock_pubs_limit"];
$pubs_list = $post_info_block_fields["infoblock_pubs_list"];
$pubs_category = $post_info_block_fields["infoblock_pubs_cats"];


?>

<style>
	#<?= $block_id; ?> {
		padding-top: <?= $block_padding_top; ?>px;
		padding-bottom: <?= $block_padding_bottom; ?>px;
		margin-top: <?= $block_margin_top; ?>px;
		margin-bottom: <?= $block_margin_bottom; ?>px;
		position: relative;

		<? if (($block_background_color != '') && ($block_background_color != '#ffffff')) {
		?>background-color: <?= $block_background_color; ?>;
		<?
		}

		?>
	}

	<? if ($block_background_image != '') {
	?><? if ($block_dark_overlay) {
		?>#<?= $block_id; ?>:before {
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

	<?
		}

	?>#<?= $block_id; ?>>div {
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

	<?
	}

	?>
</style>

<section class="last-news <?= ($block_white_foreground != "") ? " white-foreground " : ""; ?>" id="<?= $block_id; ?>">
	<div class="container">
		<div class="<?= ((!$block_with_heading) ? 'd-none' : ''); ?>">
			<h2 class="text-center"><?= $block_title; ?></h2>
			<div class="text-center"><?= $block_subtitle; ?></div>
		</div>
		<div class="row last-news__list">

			<?php
			///// GET 
			$original_query = $wp_query;
			if (empty($pubs_list)) $pubs_type = "latest";
			$pubs_number_posts = (($pubs_type == "latest") ? $pubs_limit : -1);
			$pubs_query_args = array(
				'numberposts'    =>  $pubs_number_posts,
				'posts_per_page' =>  $pubs_number_posts,
				'post_type'  =>   'post',
				'post__not_in' => array($post_id),
			);
			if ($pubs_type == "latest") {
				if (!empty($pubs_category)) {
					$pubs_query_args['tax_query'] = array(
						array(
							'taxonomy' => 'category',
							'field' => 'term_id',
							'terms' => $pubs_category,
						)
					);
				}
				$pubs_query_args['orderby'] = 'date';
				$pubs_query_args['order'] = 'DESC';
			} else {
				$pubs_query_args['include'] = $pubs_list;
			}

			$blogs = get_posts($pubs_query_args);

			foreach ($blogs as $blog) {
				$pub_id = $blog->ID;
				$pub_item_title = get_the_title($pub_id);
				$pub_item_permalink = get_permalink($pub_id);
				$pub_item_descr = get_the_content('');
				$pub_item_descr_trim = wp_trim_words($pub_item_descr, 15, '...');

				$pub_image_arr = array();
				$pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($pub_id), 'medium_large');
				$pub_image_src = $pub_image_arr[0];

			?>
				<div class="col-md-4">
					<a href="<?= $pub_item_permalink; ?>" class="last-news__item">
						<div class="last-news__img-wrap">
							<img src="<?= $pub_image_src; ?>" alt="<?= $pub_item_title; ?>" class="last-news__img">
							<h3><?= $pub_item_title; ?></h3>
						</div>
						<span class="last-news__date"><?= $pub_item_date; ?></span>
						<p class="last-news__descr"><?= $pub_item_descr_trim  ?></p>
					</a>
				</div>
			<?php
			}
			wp_reset_postdata();

			?>
		</div>
	</div>
</section>