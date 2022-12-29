<?php
get_header();
?>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();

		$post_id = get_the_ID();
		$page_header_title = get_field("page_title2", $post_id);
		if (!$page_header_title) $page_header_title = get_the_title();
?>
		<?php
		if ($banner[0]["infoblock_item"]["infoblock_type"] !== 'banner') { ?>
			<section class="page-header">
				<div class="container">
					<h1><?= $page_header_title; ?></h1>
				</div>
				<div class="container">
					<?php get_template_part('breadcrumbs', ''); ?>
				</div>
			</section>
			<section id="content" class="margin__all">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php the_content() ?>
						</div>
					</div>
				</div>
			</section>

		<?php } ?>
		<section id="content" class="mt-5">
			<div class="container">
				<div class="row">
					<?php
					$original_query = $wp_query;
					$pubs_query_args = array(
						'post_type'  =>   'post',
						'post_status' => 'publish',
						'paged' => get_query_var('paged'),
						'posts_per_page' => 9, 
						'orderby'       => 'date',
						'order'         => 'DESC',
					);
					$wp_query = new WP_Query($pubs_query_args);
					get_template_part('post', 'loop');
					wp_reset_postdata();
					?>
				</div>


			</div>
		</section>

		<?php
		//Построение инфо-блоков на странице...
		include(locate_template('info_blocks/init.php'));
		?>

<?php
	endwhile;
endif;
?>
<?php
get_footer();
?>