
$(document).ready(function(){
    $(".button").click(function(){
        var name = $(this).attr('data-filter');
        if(name == "all"){
            $(".shot-thumbnail").show('2000');
        }else{
            $(".shot-thumbnail").not("."+name).hide('2000');
            $(".shot-thumbnail").filter("."+name).show('2000');
        }
    })

    $(".navigation a").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    })
})

//menu pop-up open/close
$('.right_sideber_menu i.icofont-navigation-menu').on('click', function () {
    $('.right_popupmenu_area .right_sideber_menu_inner').addClass('tx-s-open')
})
$('.right_sideber_menu i.icofont-close-line-squared').on('click', function () {
    $('.right_popupmenu_area .right_sideber_menu_inner').removeClass('tx-s-open')
})
//mobile
$('.mobile_menu_o i.icofont-navigation-menu').on('click', function () {
    $('.mobile_p').addClass('tx-s-open')
})

$('.mobile_menu_o i.icofont-close').on('click', function () {
    $('.mobile_p').removeClass('tx-s-open')
})

// scroll menu hide/show
let menu = jQuery('.akin-main-menu')
jQuery(window).scroll(function (){
    if (jQuery(window).scrollTop() > 80){
        menu.addClass('bg-menu-black')
    }else {
        menu.removeClass('bg-menu-black')
    }
})

//menu / submenu +
// const isMobile = navigator.userAgentData.mobile
// console.log( navigator.userAgentData.mobile)
if (window.screen.width < 992) {
    let subLink = ' <a class="mean-expand" href="#" style="font-size: 18px"></a>'
    $('.sub-menu').after(subLink)

    $('.mean-expand').on('click', function (){
        $(this).prev().toggle('500')
        $(this).toggleClass('active')
    })
    $('.mean-expand.active').html('-')
}
if (window.screen.width < 768){
    $('.top-right-menu .social-icons').removeClass('text-right')
}

//cases - list

var galleryTop = new Swiper('.gallery-top', {
    slidesPerView: 1,
    loop: true,
    loopedSlides: 50,
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
    direction: 'vertical',
    slidesPerView: 4,
    slideToClickedSlide: true,
    spaceBetween: 35,
    loopedSlides: 50,
    speed: 800,
    autoplay: true,
    loop: true,
});
galleryTop.controller.control = galleryThumbs;
galleryThumbs.controller.control = galleryTop;

// reviews

// var swiper = new Swiper(".revSwiper", {
//     slidesPerView: 2,
//     spaceBetween: 30,
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
// });
$('.revSlider').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 2,
                dots: true
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
            }
        }
    ]
});

// partners

var swiperPart = new Swiper(".partSwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    freeMode: true,
    autoplay: {
        delay: 1000,
    },
});

// catalog

var swiper = new Swiper(".catalogSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    speed: 900,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".blockSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    speed: 900,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

//product cart
$('.related-posts-slider').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.block-posts-slider').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.blogcar_id1').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
});
$('.blogcar_id2').slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
});

let question = document.querySelectorAll(".question");

question.forEach(question => {
    question.addEventListener("click", event => {
        const active = document.querySelector(".question.active");
        if(active && active !== question ) {
            active.classList.toggle("active");
            active.nextElementSibling.style.maxHeight = 0;
        }
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if(question.classList.contains("active")){
            answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
            answer.style.maxHeight = 0;
        }
    })
})

// calculator

function init() {
    const sliders = document.getElementsByClassName("tick-slider-input");

    for (let slider of sliders) {
        slider.oninput = onSliderInput;

        updateValue(slider);
        updateValuePosition(slider);
        updateLabels(slider);
        updateProgress(slider);

        setTicks(slider);
    }
}

function onSliderInput(event) {
    updateValue(event.target);
    updateValuePosition(event.target);
    updateLabels(event.target);
    updateProgress(event.target);
}

function updateValue(slider) {
    let value = document.getElementById(slider.dataset.valueId);

    value.innerHTML = "<div>" + slider.value + "</div>";
}

function updateValuePosition(slider) {
    let value = document.getElementById(slider.dataset.valueId);

    const percent = getSliderPercent(slider);

    const sliderWidth = slider.getBoundingClientRect().width;
    const valueWidth = value.getBoundingClientRect().width;
    const handleSize = slider.dataset.handleSize;

    let left = percent * (sliderWidth - handleSize) + handleSize / 2 - valueWidth / 2;

    left = Math.min(left, sliderWidth - valueWidth);
    left = slider.value === slider.min ? 0 : left;

    value.style.left = left + "px";
}

function updateLabels(slider) {
    const value = document.getElementById(slider.dataset.valueId);
    const minLabel = document.getElementById(slider.dataset.minLabelId);
    const maxLabel = document.getElementById(slider.dataset.maxLabelId);

    const valueRect = value.getBoundingClientRect();
    const minLabelRect = minLabel.getBoundingClientRect();
    const maxLabelRect = maxLabel.getBoundingClientRect();

    const minLabelDelta = valueRect.left - (minLabelRect.left);
    const maxLabelDelta = maxLabelRect.left - valueRect.left;

    const deltaThreshold = 32;

    if (minLabelDelta < deltaThreshold) minLabel.classList.add("hidden");
    else minLabel.classList.remove("hidden");

    if (maxLabelDelta < deltaThreshold) maxLabel.classList.add("hidden");
    else maxLabel.classList.remove("hidden");
}

function updateProgress(slider) {
    let progress = document.getElementById(slider.dataset.progressId);
    const percent = getSliderPercent(slider);

    progress.style.width = percent * 100 + "%";
}

function getSliderPercent(slider) {
    const range = slider.max - slider.min;
    const absValue = slider.value - slider.min;

    return absValue / range;
}

function setTicks(slider) {
    let container = document.getElementById(slider.dataset.tickId);
    const spacing = parseFloat(slider.dataset.tickStep);
    const sliderRange = slider.max - slider.min;
    const tickCount = sliderRange / spacing + 1; // +1 to account for 0

    for (let ii = 0; ii < tickCount; ii++) {
        let tick = document.createElement("span");

        tick.className = "tick-slider-tick";

        container.appendChild(tick);
    }
}

function onResize() {
    const sliders = document.getElementsByClassName("tick-slider-input");

    for (let slider of sliders) {
        updateValuePosition(slider);
    }
}

window.onload = init;
window.addEventListener("resize", onResize);

(function() {

    window.inputNumber = function(el) {

        var min = el.attr('min') || false;
        var max = el.attr('max') || false;

        var els = {};

        els.dec = el.prev();
        els.inc = el.next();

        el.each(function() {
            init($(this));
        });

        function init(el) {

            els.dec.on('click', decrement);
            els.inc.on('click', increment);

            function decrement() {
                var value = el[0].value;
                value-= 0.1;
                value.toFixed(1)
                if(!min || value >= min) {
                    el[0].value = value;
                }
            }

            function increment() {
                var value = el[0].value;
                value++;
                if(!max || value <= max) {
                    el[0].value = value++;
                }
            }
        }
    }
})();

inputNumber($('.input-number'));

// image gallery
// init the state from the input
$(".image-checkbox").each(function () {
    if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
        $(this).addClass('image-checkbox-checked');
    }
    else {
        $(this).removeClass('image-checkbox-checked');
    }
});

// sync the state to the input
$(".image-checkbox").on("click", function (e) {
    $(this).toggleClass('image-checkbox-checked');
    var $checkbox = $(this).find('input[type="checkbox"]');
    $checkbox.prop("checked",!$checkbox.prop("checked"))

    e.preventDefault();
});

// calculator-end

// number inc
const counters = document.querySelectorAll(".counter");

counters.forEach((counter) => {
    counter.innerText = "0";
    const updateCounter = () => {
        const target = +counter.getAttribute("data-target");
        const count = +counter.innerText;
        const increment = target / 200;
        if (count < target) {
            counter.innerText = `${Math.ceil(count + increment)}`;
            setTimeout(updateCounter, 1);
        } else counter.innerText = target;
    };
    updateCounter();
});

// number inc end

//data-fancybox="gallery" .data('fancybox', 'gallery')
// single product fancy
// $('.woocommerce-product-gallery__wrapper > div > a').attr('data-fancybox', 'gallery');

    "use strict"; // Start of use strict


    let wprappGallery = $(".woocommerce-product-gallery__wrapper");
    let images = wprappGallery.children();
    let imagesThumb = [];
    let imagesFor = [];
    let imageHtml = "";

    images.each(function () {
        imagesThumb.push($(this).data("thumb"));
        imagesFor.push($(this).children("a").attr("href"));
    });

    imageHtml += '<div class="slider-for">';
    imagesFor.forEach(function (item, i) {
        imageHtml += '<div class="slider-item">';
        imageHtml +=
            '<a data-fancybox="gallery" href="' +
            (item ?
                item :
                "https://zip.re/wp-content/uploads/woocommerce-placeholder-600x600.png") +
            '">';
        imageHtml +=
            '<img src="' +
            (item ?
                item :
                "https://zip.re/wp-content/uploads/woocommerce-placeholder-600x600.png") +
            '"/>';
        imageHtml += "</a>";
        imageHtml += "</div>";
    });
    imageHtml += "</div>";
    //for

    //Nav Slide
    if (!imagesThumb.includes(undefined)) {
        imageHtml += '<div class="slider-nav">';
        imagesThumb.forEach(function (item, i) {
            imageHtml += '<div class="slider-item-nav">';
            // imageHtml += '<a data-fancybox="gallery" href="'+imagesFor[i]+'">';
            imageHtml +=
                '<img src="' +
                (item ?
                    item :
                    "https://zip.re/wp-content/uploads/woocommerce-placeholder-600x600.png") +
                '"/>';
            // imageHtml += '</a>';
            imageHtml += "</div>";
        });
        imageHtml += "</div>";
    }
    //nav

    wprappGallery.html(imageHtml);
    let productSlider = $('.product-block-slider');
    let dataProductSlider = productSlider.data("pr-slider");
    if (productSlider.hasClass("slider-active")) {
        $(`#${dataProductSlider} .products`).slick({
            slidesToShow: 4,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            infinite: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },],
        });
    }


    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
    });

    let slickNav = $(".slider-nav").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        infinite: false,
    });

    if (imagesThumb.length < 4) {
        $(".slick-track", slickNav).css("marginLeft", "0");
    }

// single product fancy end

// slingle product variations



$(document).on('change', '.variation-radios input', function() {
    $('.variation-radios input:checked').each(function(index, element) {
        var $el = $(element);
        var thisName = $el.attr('name');
        var thisVal  = $el.attr('value');
        $('select[name="'+thisName+'"]').val(thisVal).trigger('change');
    });
});
$(document).on('woocommerce_update_variation_values', function() {
    $('.variation-radios input').each(function(index, element) {
        var $el = $(element);
        var thisName = $el.attr('name');
        var thisVal  = $el.attr('value');
        $el.removeAttr('disabled');
        if($('select[name="'+thisName+'"] option[value="'+thisVal+'"]').is(':disabled')) {
            $el.prop('disabled', true);
        }
    });
});




// slingle product variations end


