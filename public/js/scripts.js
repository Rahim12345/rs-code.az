$(function () {
    "use strict";

    // --- Caching Selectors for Performance ---
    const $window = $(window);
    const $document = $(document);
    const $body = $("body");
    const $html = $(".html"); // Assuming .html is on <html> or <body> tag
    const $navbar = $(".navbar");
    const $topnav = $(".topnav");
    const $logo = $(".navbar.change .logo > img");

    // --- Page Loader ---
    $html.addClass("remove");
    $window.on("load", function () {
        setTimeout(function () {
            $html.removeClass("remove");
        }, 300); // Changed from 750ms to 300ms as requested
    });

    // --- Modal Function ---
    function openModal() {
        document.getElementById('id01').style.display = 'block';
    }

    // --- Image Loading Progress (Currently commented out in original code) ---
    // $("body").imagesLoaded().progress(onProgress);
    function onProgress(imgLoad, image) {
        $(image.img).parents(".imgLoad").addClass("loaded");
    }

    // --- VanillaTilt Initialization ---
    VanillaTilt.init(document.querySelectorAll('.tilt'), {
        max: 1
    });

    // --- Password Toggle Function (with fix) ---
    let passwordVisible = false;
    window.toggle = function() { // Made globally accessible if called from HTML onclick
        const passwordInput = document.getElementById("password");
        passwordVisible = !passwordVisible;
        if (passwordVisible) {
            passwordInput.setAttribute("type", "text");
        } else {
            passwordInput.setAttribute("type", "password");
        }
    }

    // --- Random Background Color for .div elements ---
    $(".div").each(function () {
        const hue = `rgb(${Math.floor(Math.random() * 57) + 200}, ${Math.floor(Math.random() * 57) + 200}, ${Math.floor(Math.random() * 57) + 200})`;
        $(this).css("background-color", hue);
    });

    // --- Menu Dropdowns ---
    $('.menu-items .menu-item-type-custom.dropdown .dropdown-btn').on('click', function () {
        $(this).toggleClass('open').prev('ul').slideToggle(500);
    });

    $('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
        $(this).toggleClass('open').prev('.mega-menu').slideToggle(500);
    });

    // --- Combined Click Handlers for Body Toggle ---
    $("#BtnM, #BtnM2, #BtnM3").on('click', function () {
        $body.toggleClass("active");
    });
    $(".cnlBtn").on('click', function () {
        $body.removeClass("active");
    });

    // --- Hamburger Menu Logic ---
    let menuOpen = false;
    $('.topnav .menu-icon').on('click', function () {
        menuOpen = !menuOpen;
        const $hamenu = $('.hamenu');
        $hamenu.toggleClass("open");

        if (menuOpen) {
            $hamenu.animate({ left: 0 });
            $('.topnav .menu-icon .text').addClass('open');
            $(".topnav.dark").addClass("navlit");
            $(".topnav.dark .logo img").attr('src', '/img/rs-code.png').css('width', '250px');
            $window.on('scroll', noScroll);
        } else {
            $hamenu.delay(50).animate({ left: "-100%" });
            $('.topnav .menu-icon .text').removeClass('open');
            $(".topnav.dark").removeClass("navlit");
            $(".topnav.dark .logo img").attr('src', '/img/rs-code.png').css('width', '250px');
            $window.off('scroll', noScroll);
        }
    });

    function noScroll() {
        window.scrollTo(0, 0);
    }

    // --- Hamburger Menu Hover Effects ---
    $('.hamenu .menu-links .main-menu > li').on('mouseenter', function () {
        $(this).css("opacity", "1").siblings().css("opacity", ".5");
    }).on('mouseleave', function () {
        $(".hamenu .menu-links .main-menu > li").css("opacity", "1");
    });

    // --- Sub-menu Logic ---
    $('.main-menu > li .dmenu').on('click', function () {
        $(".main-menu").addClass("gosub");
        $(this).closest('li').find(".sub-menu").addClass("sub-open");
    });

    $('.main-menu .sub-menu li .sub-link.back').on('click', function () {
        $(".main-menu").removeClass("gosub");
        $(".main-menu .sub-menu").removeClass("sub-open");
    });


    // --- Consolidated Scroll Handler ---
    function handleScroll() {
        const scrollPos = $window.scrollTop();

        // Navbar scroll effect
        if (scrollPos > 100) {
            $navbar.addClass("nav-scroll");
            $(".btnHidden").addClass("hidden");
            $logo.attr('src', '/img/rs-code.png').css('width', '250px');
        } else {
            $navbar.removeClass("nav-scroll");
            $(".btnHidden").removeClass("hidden");
            $logo.attr('src', '/img/rs-code.png').css('width', '250px');
        }

        // Topnav scroll effect
        if (scrollPos > 60) {
            $topnav.addClass("nav-scroll");
        } else {
            $topnav.removeClass("nav-scroll");
        }

        // Page progress bar
        const pageHeight = $document.height() - $window.height();
        const progress = pageHeight > 0 ? (100 * scrollPos / pageHeight) : 0;
        $("div.progress").css("height", progress + "%");

        // Fixed slider parallax effect
        const $fixedSliderCaption = $('.fixed-slider .caption, .fixed-slider .capt .parlx');
        $fixedSliderCaption.css({
            'transform': `translate3d(0, ${-(scrollPos * 0.20)}px, 0)`,
            'opacity': 1 - scrollPos / 600
        });
    }

    $window.on('scroll', handleScroll);


    // --- Swiper Initializations (with unique variable names) ---
    const parallaxSlider = new Swiper('.slider-prlx .parallax-slider', {
        speed: 2000, autoplay: false, parallax: true, loop: true,
        on: {
            init: function () {
                this.slides.each(slide => {
                    $(slide).find('.bg-img').attr({ 'data-swiper-parallax': 0.75 * this.width });
                });
            },
            resize: function () { this.update(); }
        },
        pagination: { el: '.slider-prlx .parallax-slider .swiper-pagination', type: 'fraction', clickable: true },
        navigation: { nextEl: '.slider-prlx .parallax-slider .next-ctrl', prevEl: '.slider-prlx .parallax-slider .prev-ctrl' }
    });

    const parallaxShowCase = new Swiper('.showcase-full .parallax-slider', {
        speed: 1000, autoplay: false, parallax: true, mousewheel: true, loop: true,
        on: {
            init: function () {
                this.slides.each(slide => {
                    $(slide).find('.bg-img').attr({ 'data-swiper-parallax': 0.75 * this.width });
                });
            },
            resize: function () { this.update(); }
        },
        pagination: { el: '.showcase-full .parallax-slider .swiper-pagination', clickable: true },
        navigation: { nextEl: '.showcase-full .parallax-slider .next-ctrl', prevEl: '.showcase-full .parallax-slider .prev-ctrl' }
    });

    // Other sliders... (assigning unique names)
    const metroSlider = new Swiper('.metro .swiper-container', { speed: 3000, autoplay:true, loop: true, slidesPerView: 3, spaceBetween: 0, breakpoints: { 200: { slidesPerView: 1 }, 767: { slidesPerView: 2 }, 991: { slidesPerView: 3 } }, pagination: { el: '.metro .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.metro .swiper-button-next', prevEl: '.metro .swiper-button-prev' } });
    const bestSlider = new Swiper('.best-slider .swiper-container', { speed: 700, autoplay:false, loop: true, slidesPerView: 5, spaceBetween: 20, breakpoints: { 200: { slidesPerView: 1, allowTouchMove: true, autoplay:true }, 767: { slidesPerView: 2, allowTouchMove: true, autoplay:true }, 991: { slidesPerView: 3, allowTouchMove: true, autoplay:true }, 1200: { slidesPerView: 5, allowTouchMove: false } }, pagination: { el: '.best-slider .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.best-slider .swiper-button-next', prevEl: '.best-slider .swiper-button-prev' } });
    const othersSlider = new Swiper('.others .swiper-container', { speed: 700, autoplay:false, loop: true, slidesPerView: 4, breakpoints: { 200: { slidesPerView: 1, allowTouchMove: true, autoplay:true }, 767: { slidesPerView: 2, allowTouchMove: true, autoplay:true }, 991: { slidesPerView: 3, allowTouchMove: true, autoplay:true }, 1200: { slidesPerView: 4, allowTouchMove: false } }, pagination: { el: '.others .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.others .swiper-button-next', prevEl: '.others .swiper-button-prev' } });
    const blogGridSlider = new Swiper('.blog-grid .swiper-container', { speed: 3000, autoplay:false, loop: true, slidesPerView: 3, spaceBetween: 0, breakpoints: { 200: { slidesPerView: 1, allowTouchMove: true }, 767: { slidesPerView: 2, allowTouchMove: true }, 991: { slidesPerView: 3, allowTouchMove: true }, 1200: { slidesPerView: 3, allowTouchMove: false } }, pagination: { el: '.blog-grid .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.blog-grid .swiper-button-next', prevEl: '.blog-grid .swiper-button-prev' } });
    const priceSlider = new Swiper('.princ .swiper-container', { speed: 3000, autoplay:true, loop: true, slidesPerView: 1, spaceBetween: 0, breakpoints: { 991: { slidesPerView: 2 }, 1200:{ slidesPerView: 3, autoplay:false } }, pagination: { el: '.blog-grid .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.blog-grid .swiper-button-next', prevEl: '.blog-grid .swiper-button-prev' } });
    const caroulSlider = new Swiper('.caroul .swiper-container', { speed: 3000, autoplay:true, loop: true, slidesPerView: 4, spaceBetween: 0, breakpoints: { 200: { slidesPerView: 1 }, 767: { slidesPerView: 2 }, 991: { slidesPerView: 3 }, 1200: { slidesPerView: 4 } }, pagination: { el: '.caroul .swiper-pagination', type: 'progressbar' }, navigation: { nextEl: '.caroul .swiper-button-next', prevEl: '.caroul .swiper-button-prev' } });


    // --- Set Background Images from data-background attribute ---
    $(".bg-img, section").each(function () {
        const background = $(this).data("background");
        if (background) {
            $(this).css("background-image", `url(${background})`);
        }
    });

    // --- VS Menu Toggle ---
    $(".navbar-toggler").on('click', function() {
        $(".vs-menu-wrapper").addClass("vs-body-visible");
    });
    $(".vs-menu-toggle").on('click', function() {
        $(".vs-menu-wrapper").removeClass("vs-body-visible");
    });

    // --- Mouse Hover Effect on .items ---
    $('.items').on('mouseenter', function () {
        $(this).addClass("active").siblings().removeClass("active");
    });

    // --- Animated Button Text ---
    document.querySelectorAll('.button').forEach(button => {
        button.innerHTML = `<div><span>${button.textContent.trim().split('').join('</span><span>')}</span></div>`;
    });

    // --- Parallaxie Initialization ---
    $('.parallaxie').parallaxie({ speed: 0.2, size: "cover" });

    // --- Tooltip ---
    $('[data-tooltip-tit]').hover(function () {
        $('<div class="div-tooltip-tit"></div>').text($(this).attr('data-tooltip-tit')).appendTo('body').fadeIn('slow');
    }, function () {
        $('.div-tooltip-tit').remove();
    }).mousemove(function (e) {
        $('.div-tooltip-tit').css({ top: e.pageY + 10, left: e.pageX + 20 });
    });

    $('[data-tooltip-sub]').hover(function () {
        $('<div class="div-tooltip-sub"></div>').text($(this).attr('data-tooltip-sub')).appendTo('body').fadeIn('slow');
    }, function () {
        $('.div-tooltip-sub').remove();
    }).mousemove(function (e) {
        $('.div-tooltip-sub').css({ top: e.pageY - 15, left: e.pageX + 30 });
    });

    // --- WOW.js Initialization ---
    const wow = new WOW({ animateClass: 'animated', offset: 100 });
    wow.init();

    // --- Hide/Show Navbar on Scroll (Debounced) ---
    let didScroll;
    let lastScrollTop = 0;
    const delta = 5;
    const navbarHeight = $('#navi').outerHeight();

    $window.on("scroll", function () {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        const st = $(this).scrollTop();
        if (Math.abs(lastScrollTop - st) <= delta) return;
        if (st > lastScrollTop && st > navbarHeight) {
            $('#navi').css('top', '-100px');
        } else {
            if (st + $window.height() < $document.height()) {
                $('#navi').css('top', '0');
            }
        }
        lastScrollTop = st;
    }

    // --- Pace Preloader ---
    window.paceOptions = {
        ajax: true, document: true, eventLag: false,
        restartOnPushState: false, restartOnRequestAfter: false, elements: false
    };
    Pace.on('done', function () {
        $('#preloader, .loading').addClass("isdone");
    }).start();

    // --- Scroll Back to Top Button ---
    const progressPath = document.querySelector('.progress-wrap path');
    if (progressPath) {
        const pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = `${pathLength} ${pathLength}`;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

        const updateProgress = function () {
            const scroll = $window.scrollTop();
            const height = $document.height() - $window.height();
            const progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        };
        updateProgress();
        $window.on('scroll', updateProgress);

        const offset = 150;
        $window.on('scroll', function () {
            if ($(this).scrollTop() > offset) {
                $('.progress-wrap').addClass('active-progress');
            } else {
                $('.progress-wrap').removeClass('active-progress');
            }
        });
        $('.progress-wrap').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 550);
            return false;
        });
    }

    // --- Custom Mouse Cursor ---
    function mousecursor() {
        if ($body.length) {
            const cursorInner = document.querySelector(".cursor-inner");
            const cursorOuter = document.querySelector(".cursor-outer");

            window.onmousemove = function (e) {
                cursorOuter.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
                cursorInner.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
            };

            $body.on("mouseenter", "a, .cursor-pointer", function () {
                cursorInner.classList.add("cursor-hover");
                cursorOuter.classList.add("cursor-hover");
            }).on("mouseleave", "a, .cursor-pointer", function () {
                if (!($(this).is("a") && $(this).closest(".cursor-pointer").length)) {
                    cursorInner.classList.remove("cursor-hover");
                    cursorOuter.classList.remove("cursor-hover");
                }
            });

            cursorInner.style.visibility = "visible";
            cursorOuter.style.visibility = "visible";
        }
    }
    mousecursor();

    // --- Fixed Slider Margin ---
    const slidHeight = $(".fixed-slider").outerHeight();
    $(".main-content").css({ marginTop: slidHeight });

    // --- Swiper Data API (from original code, kept for compatibility) ---
    $('[data-carousel="swiper"]').each(function () {
        const $this = $(this);
        const container = $this.find('[data-swiper="container"]').attr('id');
        const conf = {
            navigation: { nextEl: `#${$this.find('[data-swiper="next"]').attr('id')}`, prevEl: `#${$this.find('[data-swiper="prev"]').attr('id')}` },
            pagination: { el: `#${$this.find('[data-swiper="pagination"]').attr('id')}`, clickable: true },
            slidesPerView: $this.data('items'),
            autoplay: $this.data('autoplay'),
            initialSlide: $this.data('initial'),
            loop: $this.data('loop'),
            parallax: $this.data('parallax'),
            spaceBetween: $this.data('space'),
            speed: $this.data('speed'),
            centeredSlides: $this.data('center'),
            effect: $this.data('effect'),
            direction: $this.data('direction'),
            mousewheel: $this.data('mousewheel')
        };
        if ($this.hasClass('showcase-grid')) {
            conf.breakpoints = { 0: { slidesPerView: 1 }, 640: { slidesPerView: 2 }, 1024: { slidesPerView: 4 } };
        }
        if (container) {
            new Swiper(`#${container}`, conf);
        }
    });
});
