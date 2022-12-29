<?php
get_header();
?>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();

		$post_id = get_the_ID();
		$page_header = get_field("page_header", $post_id);
		$page_header_simple = get_field("page_header_simple", $post_id);
		if ($page_header_simple) get_template_part('page-header-simple', '');
		if ($page_header) get_template_part('page-header', '');
		$banner = get_field("infoblocks_list", $post_id);
		$page_header_title = get_field("page_title2", $post_id);
		if (!$page_header_title) $page_header_title = get_the_title();
?>
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