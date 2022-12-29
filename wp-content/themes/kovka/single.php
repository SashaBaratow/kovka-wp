<?php
get_header();

$post_id = get_the_ID();
$post_type = get_post_type( $post_id );
if (have_posts()) :
	while (have_posts()) :
		the_post();

		$pub_id = $post->ID;
		$pub_item_title = get_the_title();
		$pub_item_permalink = get_permalink();
		$pub_item_descr = get_the_content();
		$pub_item_cats = get_the_terms($pub_id, 'category');
		$pub_item_date = get_the_date('j F Y');
		$pub_image_arr = array();
		$pub_image_arr = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
		$pub_image_src = $pub_image_arr[0];
		$the_title = (get_field("page_title2", $post_id)) ?? get_the_title();
		
		$page_header_title = get_field("page_title2", $post_id);
		$page_header = get_field("page_header_simple", $post_id);
		$last_posts = get_field('last_posts_cns', $post_id);
		
		if ($page_header) get_template_part('page-header-simple', '');?>
		<style>
			body{
				background:#fff;
			}
			.list-style-type-inherit ul li:before {
				display: none;
			}

			.list-style-type-inherit ul {
				margin-top: 16px;
				padding-left: 25px;
			}

			.item-img {
				position: relative;
                max-height: 400px ;
			}
            .item-img  > img {
                height: 400px;
                object-fit: contain;
            }

			.singe__date {
				position: absolute;
				left: 1px;
				bottom: 1px;
				background: #ffffffeb;
				padding: 6px;
				color: #E31B08 !important;
				font-size: 16px;
			}
			.singe__date .fa:before{
				font-size: 19px;
			}

			.singe__date span{
				font-size: 16px;
			}

			.item-title{
				margin: 15px 0;
			}
			.single__navigation{
				margin-top: 30px;

			}

			.single__navigation a{
				color: #29242E !important;
                text-decoration: none;
			}
            .single__navigation a:hover{
                color: #29242E !important;
                text-decoration: underline;
            }
            /* .hedaer__recall.btn{
                background-color: #E31B08 !important; ;
                color: #fff!important;
                font-family: 'TRY Clother';
                padding-bottom: 0.62rem;
            } */
			.single_img_center{
				display:flex;
				justify-content: center;
			}
			.last-posts_items{
				padding: 30px 0;
			}
            /* .header__phone:hover{
                color:#29242E ;
            } */

		/*	my styles*/
		</style>
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<div class="container">
		<div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<a class="breadcrumbs__link" href="https://cns-corp.ru/" itemprop="item">
					<span itemprop="name">Главная</span>
				</a>
				<meta itemprop="position" content="1">
					</span> <span class="breadcrumb-divider">/</span>
					<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
					<a class="breadcrumbs__link" href="https://cns-corp.ru/stati/" itemprop="item">
						<span itemprop="name">Статьи</span>
					</a><meta itemprop="position" content="2">
				</span> 
				<span class="breadcrumb-divider">/</span> 
				<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-current">
				<span itemprop="name"><?= $post->post_title ?></span>
				<meta itemprop="position" content="3">
			</span>
		</div>
			<div class="row">
                <h1 class="mt-3"><?= $pub_item_title?></h1>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="service-box-layout6 list-style-type-inherit">
						<div class="item-img single_img_center" style="margin-bottom: 30px; margin-top: 30px;">
							<img  src="<?= $pub_image_src; ?>" alt="<?= $pub_item_title; ?>" title="Читать: <?= $pub_item_title; ?>" class="w-100">
							<div class="singe__date">
								<i class="fa fa-calendar-o"></i>
								<span> <?= $pub_item_date ?> </span>
							</div>
						</div>
						<div class="item-content">
							<div class="single__content mb-4">
								<?= apply_filters('the_content', $pub_item_descr); ?>
							</div>
						</div>
					</div>
					<!-- <div class="single__navigation d-flex justify-content-between mb-4">

						<div class="prev__new"><?php previous_post_link('%link', 'Предыдущий пост'); ?></div>
						<div class="next__new"><?php next_post_link('%link', 'Следующий пост'); ?></div>
					</div> -->
				</div>
				<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php get_sidebar('right'); ?>
				</div> -->
			</div>
			<div class="row mb-5">
                <div class="last-posts_items">
					
                    <?php if (!empty($last_posts)) { ?>
						<h5 class="mb-2">Последние материалы</h5>
                       <?php foreach ($last_posts as $post_item) {
                            ?>
                            <div class="post__item">
								<a class="mb-1 link-to-last-posts" href="/stati/<?= $post_item->post_name?>"><?= $post_item->post_title ?></a>
							</div>
                        <?php }
                    }
                    ?>

                </div>
            </div>
		</div>
	<?php endwhile;
endif;
?>
<?php

get_footer();
?>