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
        <section class="content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
                        <div class="akin-single-blog-details">
                            <div class="akin-single-blog--thumb">
                                <img width="900" height="550" src="<?= the_post_thumbnail_url(); ?>" class="img-fluid wp-post-image" alt="" decoding="async" sizes="(max-width: 900px) 100vw, 900px"></div>
                            <div class="akin-single-blog-details-inner">
                                <div class="akin-single-blog-title">
                                    <h2><?= the_title(); ?></h2>
                                </div>
                                <div class="akin-single-blog-content">
                                    <div class="single-blog-content">
                                        <?= the_content(); ?>
                                        <div class="page-list-single"></div>
                                    </div>
                                </div>
                                <div class="witr_next_previous">
                                    <div class="txbd_previous">
                                        <?php previous_post_link('%link', 'Предыдущая статья'); ?>
                                    </div>
                                    <div class="txbd_next">
                                        <?php next_post_link('%link', 'Следующая статья'); ?>
                                    </div>
                                </div>
                                <div class="akin-blog-social">
                                    <div class="akin-single-icon">
                                        <div class="akin-single-icon"><a
                                                    href="https://www.facebook.com/sharer/sharer.php?u=https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/"
                                                    target="_blank"><i class="icofont-facebook"></i></a><a
                                                    href="https://twitter.com/share?https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/&amp;text=Business%20With%20Remote%20Us%20Unity%20–%20Building"
                                                    target="_blank"><i class="icofont-twitter"></i></a><a
                                                    href="https://plus.google.com/share?url=https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/"
                                                    target="_blank"><i class="icofont-google-plus"></i></a><a
                                                    href="http://www.linkedin.com/shareArticle?url=https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/&amp;title=Business%20With%20Remote%20Us%20Unity%20–%20Building"
                                                    target="_blank"><i class="icofont-linkedin"></i></a><a
                                                    href="https://pinterest.com/pin/create/bookmarklet/?url=https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/&amp;description=Business%20With%20Remote%20Us%20Unity%20–%20Building&amp;media=https://demo.themexbd.com/rtl/akin/wp-content/uploads/2021/08/bl1-1.jpg"
                                                    target="_blank"><i class="icofont-pinterest"></i></a><a
                                                    href="http://reddit.com/submit?url=https://demo.themexbd.com/rtl/akin/business-with-remote-us-unity-building/&amp;title=Business%20With%20Remote%20Us%20Unity%20–%20Building"
                                                    target="_blank"><i class="icofont-reddit"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="blog-page">
                            <div class="container">
                                <div class="info d-flex flex-column justify-content-center align-items-center">
                                    <h3 class="main-title mb-0">Возможно вам будет интересно</h3>
                                    <hr>
                                </div>
                                <div class="witr_blog_area13">
                                    <div class="blog_wrap blogcar_id2  slick-slider">
                                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 367px;" tabindex="-1">
                                            <div  class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                                                <div class="busi_singleBlog">
                                                    <div class="witr_sb_thumb">
                                                        <a href="#" tabindex="-1">
                                                            <img loading="lazy" width="390" height="350" src="img/bl11jpg.jpg" class="attachment-akin-blog-default size-akin-blog-default wp-post-image"   alt="" decoding="async">
                                                        </a>
                                                        <div class="witr_top_category">
                                                        </div>
                                                    </div>
                                                    <div class="all_blog_color">
                                                        <div class="witr_blog_con bs5">
                                                            <h2>
                                                                <a href="#" tabindex="-1">
                                                                    Business With Remote Us Unity – Building
                                                                </a>
                                                            </h2>
                                                            <p>
                                                                Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit, sed do
                                                            </p>
                                                            <div class="learn_more_adn">
                                                                <a class="learn_btn adnbtn2" href="#" tabindex="-1">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 367px;" tabindex="-1">
                                            <div  class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                                                <div class="busi_singleBlog">
                                                    <div class="witr_sb_thumb">
                                                        <a href="#" tabindex="-1">
                                                            <img loading="lazy" width="390" height="350" src="img/bl11jpg.jpg" class="attachment-akin-blog-default size-akin-blog-default wp-post-image"   alt="" decoding="async">
                                                        </a>
                                                        <div class="witr_top_category">
                                                        </div>
                                                    </div>
                                                    <div class="all_blog_color">
                                                        <div class="witr_blog_con bs5">
                                                            <h2>
                                                                <a href="#" tabindex="-1">
                                                                    Business With Remote Us Unity – Building
                                                                </a>
                                                            </h2>
                                                            <p>
                                                                Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit, sed do
                                                            </p>
                                                            <div class="learn_more_adn">
                                                                <a class="learn_btn adnbtn2" href="#" tabindex="-1">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 367px;" tabindex="-1">
                                            <div  class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                                                <div class="busi_singleBlog">
                                                    <div class="witr_sb_thumb">
                                                        <a href="#" tabindex="-1">
                                                            <img loading="lazy" width="390" height="350" src="img/bl11jpg.jpg" class="attachment-akin-blog-default size-akin-blog-default wp-post-image"   alt="" decoding="async">
                                                        </a>
                                                        <div class="witr_top_category">
                                                        </div>
                                                    </div>
                                                    <div class="all_blog_color">
                                                        <div class="witr_blog_con bs5">
                                                            <h2>
                                                                <a href="#" tabindex="-1">
                                                                    Business With Remote Us Unity – Building
                                                                </a>
                                                            </h2>
                                                            <p>
                                                                Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit, sed do
                                                            </p>
                                                            <div class="learn_more_adn">
                                                                <a class="learn_btn adnbtn2" href="#" tabindex="-1">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 367px;" tabindex="-1">
                                            <div  class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                                                <div class="busi_singleBlog">
                                                    <div class="witr_sb_thumb">
                                                        <a href="#" tabindex="-1">
                                                            <img loading="lazy" width="390" height="350" src="img/bl11jpg.jpg" class="attachment-akin-blog-default size-akin-blog-default wp-post-image"   alt="" decoding="async">
                                                        </a>
                                                        <div class="witr_top_category">
                                                        </div>
                                                    </div>
                                                    <div class="all_blog_color">
                                                        <div class="witr_blog_con bs5">
                                                            <h2>
                                                                <a href="#" tabindex="-1">
                                                                    Business With Remote Us Unity – Building
                                                                </a>
                                                            </h2>
                                                            <p>
                                                                Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit, sed do
                                                            </p>
                                                            <div class="learn_more_adn">
                                                                <a class="learn_btn adnbtn2" href="#" tabindex="-1">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12 slick-slide" data-slick-index="0" aria-hidden="true" style="width: 367px;" tabindex="-1">
                                            <div  class="post-1265 post type-post status-publish format-standard has-post-thumbnail hentry category-developer">
                                                <div class="busi_singleBlog">
                                                    <div class="witr_sb_thumb">
                                                        <a href="#" tabindex="-1">
                                                            <img loading="lazy" width="390" height="350" src="img/bl11jpg.jpg" class="attachment-akin-blog-default size-akin-blog-default wp-post-image"   alt="" decoding="async">
                                                        </a>
                                                        <div class="witr_top_category">
                                                        </div>
                                                    </div>
                                                    <div class="all_blog_color">
                                                        <div class="witr_blog_con bs5">
                                                            <h2>
                                                                <a href="#" tabindex="-1">
                                                                    Business With Remote Us Unity – Building
                                                                </a>
                                                            </h2>
                                                            <p>
                                                                Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit, sed do
                                                            </p>
                                                            <div class="learn_more_adn">
                                                                <a class="learn_btn adnbtn2" href="#" tabindex="-1">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
	<?php endwhile;
endif;
?>

<?php

get_footer();
?>