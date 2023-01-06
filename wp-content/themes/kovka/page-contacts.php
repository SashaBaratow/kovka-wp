<?php
	get_header(); 
?>
<?php 								
	if (have_posts()): 
	while (have_posts()) : 
	the_post(); 
	
	$post_id = get_the_ID();
	$page_header = get_field( "page_header", $post_id );	//шапка страницы
    $title = get_field('contact_title');
    $contact_subtitle = get_field('contact_subtitle');
    $contact_text = get_field('contact_text');
    $contact_addres = get_field('contact_addres');
    $contact_phone = get_field('contact_phone');
    $contact_email = get_field('contact_email');

?>
        <section class="contacts mt-5 mb-5">
            <div class="container">
                <div class="row d-flex">
                    <div class="clo-12 col-md-4">
                        <div class="info d-flex flex-column justify-content-start align-items-start mt-5">
                            <span class="subtitle"> <?= $contact_subtitle ?> </span>
                            <h3 class="main-title mb-0 text-left"><?= $title ?></h3>
                            <hr>
                            <p><?= $contact_text ?></p>
                            <h5 class="mb-3"> Наш адрес </h5>
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <span><?= $contact_addres ?></span>
                            </div>
                            <div class="phone ">
                                <i class="icofont-phone"></i>
                                <span> <a href="tel:<?= $contact_phone ?>"><?= $contact_phone ?></a></span>
                            </div>
                            <div class="email">
                                <i class="icofont-envelope-open"></i>
                                <span><a href="mailto:<?= $contact_email ?>"><?= $contact_email ?></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="name" value="" size="40" placeholder="Имя*">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="email" name="email" value="" size="40" placeholder="Email">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="number" value="" size="40" placeholder="Телефон*">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" name="text-30" value="" size="40" placeholder="Тема">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <textarea name="message" cols="40" rows="6" placeholder="Сообщение"></textarea>
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-primary">Отправить
                                    </button>
                                </p>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
<?php

		//Построение инфо-блоков на странице...

		//Предустановленные блоки
		$post_info_blocks = [
            ['infoblock_add_type' => 'select', 'infoblock_item_object' => 532]
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
<!--<script>-->
<!--setTimeout(() => {-->
<!--	window.location.href = 'https://cns-corp.ru';-->
<!--}, "15000")-->
<!--</script>-->
