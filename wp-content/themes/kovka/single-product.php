<?php
get_header();
?>
<?php
if (have_posts()):
    while (have_posts()) :
        the_post();

        $post_id = get_the_ID();
        $product = wc_get_product( $post_id );
        ?>


        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gallery">
                            <h1 class="product-title"><span> <?php the_title(); ?></span> </h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        //Построение инфо-блоков на странице...
        //Предустановленные блоки
        $post_info_blocks = [
            ['infoblock_add_type' => 'select', 'infoblock_item_object' => 0],	//ID БЛОКА
        ];
        include(locate_template('info_blocks/init.php'));
        ?>

    <?php
    endwhile;
endif;
?>
<?php
get_footer();
?>