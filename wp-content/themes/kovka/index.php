<?php get_header(); ?>

<?php 
    //Построение инфо-блоков на странице...
    include(locate_template('info_blocks/init.php'));
?>


        <!-- About Us Area Start Here -->
        <section class="about-wrap-layout2 bg-shape-2" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="about-box-layout2">
                            <div class="item-subtitle">Who We are</div>
                            <h2 class="item-title">The Right Choice for Quality 
                                Home Improvement for 
                                More Than 70 Years</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elitwesed diam nonummconsectetuer 
                                adipiscing euismod tinciduntrem ipsum dolor sit amet, consecteturm ipsum dolor.Dorem 
                                ipsum dolor sit amet, consectetuer adipiscing elitwesed diam nonummconsectetuer adipiscing 
                                euismod tinciduntrem ipsum dolor sit amet, consecteturm ipsum dolor.Dorem ipsum dolor sit amet, 
                                consectetuer adipiscing elitwesed diam nonummer.</p>
                            <div class="item-award">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="item-img">
                                            <img src="<?=get_template_directory_uri()?>/img/about/award.png" alt="Photo">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="item-img">
                                            <img src="<?=get_template_directory_uri()?>/img/about/award1.png" alt="Photo">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="item-img">
                                            <img src="<?=get_template_directory_uri()?>/img/about/award2.png" alt="Photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="about-box-layout3">
                            <div class="item-heading">
                                <h3 class="item-title">Request a Free Estimate</h3>
                                <p>Need to know how much your cost?</p>
                            </div>
                            <form class="contact-form-box" id="contact-form-2">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Name*" class="form-control" name="name" data-error="Name field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="email" placeholder="E-mail*" class="form-control" name="email" data-error="email field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Phone*" class="form-control" name="phone" data-error="Phone field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="select2" name="city">
                                            <option value="0">City</option>
                                            <option value="Australia">Australia</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="select2" name="states">
                                            <option value="0">State</option>
                                            <option value="Australia">Australia</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="select2" name="subject">
                                            <option value="0">Interested In</option>
                                            <option value="Australia">Australia</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="fw-btn-fill mg-t-10 bg-Primary text-textprimary">SUBMIT NOW<i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area End Here -->
        <!-- About Us Area Start Here -->
        <section class="about-wrap-layout3" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-box-layout4">
                            <div class="about-box-img">
                                <div class="item-img">
                                    <img src="<?=get_template_directory_uri()?>/img/about/about1.jpg" alt="about">
                                </div>
                                <div class="sl-number">01</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-box-layout4">
                            <div class="about-box-content">
                                <h2 class="item-title">An Experienced Roofing Solution company</h2>
                                <div class="item-subtitle">With More Than Half a Century of Experience And thousands of Innovative</div>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet they consec tetur, adipisci velit, 
                                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatemo 
                                    qui quia dolor sit amedipisci develit.</p>
                                <a href="#" class="ghost-btn-xl primary-border text-Primary mg-t-15">LEARN MORE<i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2">
                        <div class="about-box-layout5">
                            <div class="about-box-img">
                                <div class="item-img">
                                    <img src="<?=get_template_directory_uri()?>/img/about/about2.jpg" alt="about">
                                    <div class="item-icon">
                                        <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=1iIZeIy7TqM">
                                            <i class="flaticon-play-arrow"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="sl-number">02</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="about-box-layout5">
                            <div class="about-box-content">
                                <h2 class="item-title">We Strive To Be a Level Above The Competition Work</h2>
                                <div class="item-subtitle">With More Than Half a Century of Experience And thousands of Innovative</div>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet they consec tetur, adipisci velit, 
                                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatemo 
                                    qui quia dolor sit amedipisci develit.</p>
                                <a href="#" class="ghost-btn-xl primary-border text-Primary mg-t-15">LEARN MORE<i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area End Here -->
        <!-- Service Area Start Here -->
        <section class="service-wrap-layout1 bg-accent bg-common" style="display: none;" data-bg-image="<?=get_template_directory_uri()?>/img/figure/banner-shape1.png">
            <div class="container">
                <div class="heading-layout1 heading-light">
                    <div class="item-subtitle">Behind The Story</div>
                    <h2>Our Working Process</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/service/service1.jpg" alt="service">
                                <div class="sl-number">01</div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-service1.html">Schedule Estimate</a></h3>
                                <p>Horem ipsum dolor sitter amete  consectetuer adiplit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/service/service2.jpg" alt="service">
                                <div class="sl-number">02</div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-service1.html">Pick Material Color</a></h3>
                                <p>Horem ipsum dolor sitter amete  consectetuer adiplit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/service/service3.jpg" alt="service">
                                <div class="sl-number">03</div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-service1.html">Install New Roof</a></h3>
                                <p>Horem ipsum dolor sitter amete  consectetuer adiplit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/service/service4.jpg" alt="service">
                                <div class="sl-number">04</div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-service1.html">Enjoy Peace Of Mind</a></h3>
                                <p>Horem ipsum dolor sitter amete  consectetuer adiplit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Area End Here -->
        <!-- Project Area Start Here -->
        <section class="project-wrap-layout1 bg-common" style="display: none;" data-bg-image="<?=get_template_directory_uri()?>/img/project/project-bg.jpg">
            <div class="container">
                <div class="heading-layout1">
                    <div class="item-subtitle">Working Projects</div>
                    <h2>Our Latest Projects</h2>
                </div>
                <div class="row gutters-15">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project1.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project2.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project3.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project4.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project5.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="project-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/project/project6.jpg" alt="project">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-project1.html">Residential Roofing</a></h3>
                                <a href="single-project1.html" class="item-btn">DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Area End Here -->
        <!-- About Us Area Start Here -->
        <section class="about-wrap-layout1" style="display: none;">
            <div class="about-box-layout1">
                <div class="about-box-content">
                    <div class="item-header">
                        <div class="experience-year">25</div>
                        <ul class="item-title">
                            <li>Years Of</li>
                            <li>Working <span>Experience</span></li>
                        </ul>
                    </div>
                    <p>Rake a type specimen book. It has survived not only five 
                        centuries, but also the leap into electronic typesetting
                        emaining essentially unchanged.</p>
                    <a href="#" class="btn-fill-xl bg-textprimary text-primarytext">READ MORE<i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!-- About Us Area End Here -->
        <!-- Team Area Start Here -->
        <section class="team-wrap-layout1 bg-shape-1" style="display: none;">
            <div class="container">
                <div class="heading-layout1">
                    <div class="item-subtitle">Behind The Story</div>
                    <h2>Expert Team Members</h2>
                </div>
                <div class="row gutters-15">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="team-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/team/team1.png" alt="team">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-team1.html">Zahid Hasan</a></h3>
                                <div class="item-subtitle">Marketing Executive</div>
                                <ul class="item-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="team-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/team/team2.png" alt="team">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-team1.html">Jenia Zara</a></h3>
                                <div class="item-subtitle">Marketing Executive</div>
                                <ul class="item-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="team-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/team/team3.png" alt="team">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-team1.html">Robert Smith</a></h3>
                                <div class="item-subtitle">Marketing Executive</div>
                                <ul class="item-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="team-box-layout1">
                            <div class="item-img">
                                <img src="<?=get_template_directory_uri()?>/img/team/team4.png" alt="team">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><a href="single-team1.html">Daizy Rose</a></h3>
                                <div class="item-subtitle">Marketing Executive</div>
                                <ul class="item-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area End Here -->
        <!-- Progress Area Start Here -->
        <section class="progress-wrap-layout1 bg-common" style="display: none;" data-bg-image="<?=get_template_directory_uri()?>/img/figure/banner-shape1.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="progress-box-layout1">
                            <div class="progress-content">
                                <div class="item-icon">
                                    <i class="flaticon-apartment"></i>
                                </div>
                                <div class="item-content">
                                    <div class="counter count-number" data-num="1050">1050</div>
                                    <div class="count-title">Residential Projects Done</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="progress-box-layout1">
                            <div class="progress-content">
                                <div class="item-icon">
                                    <i class="flaticon-industry"></i>
                                </div>
                                <div class="item-content">
                                    <div class="counter count-number" data-num="1250">1250</div>
                                    <div class="count-title">Commertial Projects</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="progress-box-layout1">
                            <div class="progress-content">
                                <div class="item-icon">
                                    <i class="flaticon-helmet"></i>
                                </div>
                                <div class="item-content">
                                    <div class="counter count-number" data-num="650">650</div>
                                    <div class="count-title">Hard Working People</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="progress-box-layout1">
                            <div class="progress-content">
                                <div class="item-icon">
                                    <i class="flaticon-happy"></i>
                                </div>
                                <div class="item-content">
                                    <div class="counter count-number" data-num="3659">3659</div>
                                    <div class="count-title">Our Satisfied Clients</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Progress Area End Here -->
        <!-- Blog Area Start Here -->
        <section class="blog-wrap-layout1" style="display: none;">
            <div class="container">
                <div class="heading-layout1">
                    <div class="item-subtitle">What’s New Things</div>
                    <h2>Latest News &amp; Updates</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="blog-box-layout1">
                            <div class="item-img">
                               <a href="single-blog1.html"><img src="<?=get_template_directory_uri()?>/img/blog/blog.jpg" alt="blog"></a>
                               <div class="top-item">
                                    <div class="item-date">
                                        <span class="days">27</span>
                                        <span class="month">APR</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <a href="#" class="item-tag">ROOFING</a>
                                <h3 class="item-title"><a href="single-blog1.html">Many important brands are given 
                                    tree search us their trust.</a></h3>
                                <ul class="entry-meta">
                                    <li>by <a href="#">Lucas Adrone</a></li>
                                    <li>Comments: 0</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="blog-box-layout1">
                            <div class="item-img">
                                <a href="single-blog1.html"><img src="<?=get_template_directory_uri()?>/img/blog/blog1.jpg" alt="blog"></a>
                                <div class="top-item">
                                    <div class="item-date">
                                        <span class="days">26</span>
                                        <span class="month">APR</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <a href="#" class="item-tag">ROOFING</a>
                                <h3 class="item-title"><a href="single-blog1.html">Many important brands are given 
                                    tree search us their trust.</a></h3>
                                <ul class="entry-meta">
                                    <li>by <a href="#">Lucas Adrone</a></li>
                                    <li>Comments: 0</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
        <!-- Call To Action Area Start Here -->
        <section class="action-wrap-layout1 bg-common" style="display: none;" data-bg-image="<?=get_template_directory_uri()?>/img/figure/banner-shape.png">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-12">
                        <div class="action-box-layout1">
                            <h2 class="item-title">Get Your Roofing Project Started Today!</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 d-flex justify-content-lg-end justify-content-center">
                        <div class="action-box-layout1">
                           <a href="#" class="btn-fill-xl box-shadow bg-textprimary text-accent">GET A QUOTE<i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Area End Here -->
        <!-- Contact Area Start Here -->
        <section class="contact-wrap-layout1" style="display: none;">
            <div id="googleMap" class="google-map" style="width:100%; height:620px; border-radius: 0;"></div>
            <div class="contact-box-layout1">
                <h3 class="item-title">Contact Information</h3>
                <div class="media">
                    <div class="item-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="media-body space-md">
                        <ul>
                            <li>59 Street aorem Street, Chicago,</li>
                            <li>Newyork City</li>
                        </ul>
                    </div>
                </div>
                <div class="media">
                    <div class="item-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="media-body space-md">
                        <ul>
                            <li>+880-96-100-98</li>
                            <li>+880-96-100-98</li>
                        </ul>
                    </div>
                </div>
                <div class="media">
                    <div class="item-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="media-body space-md">
                        <ul>
                            <li>info@gmail.com</li>
                            <li>info@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End Here -->
<?php get_footer(); ?>