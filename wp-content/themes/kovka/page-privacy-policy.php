<?php
	get_header(); 
?>
<?php 								
	if (have_posts()): 
	while (have_posts()) : 
	the_post(); 
	
	$post_id = get_the_ID();
	$page_header = get_field( "page_header_simple", $post_id );	//шапка страницы 
	$page_header_big = get_field( "page_header", $post_id );	//шапка страницы 
	if ($page_header){
		get_template_part('page-header-simple', '');
	}else if ($page_header_big) {
		get_template_part('page-header', '');
	} else{
		get_template_part('breadcrumbs', '');
	}
	
?>

	<section id="content">		
		<div class="container">
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