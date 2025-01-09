// Initialize when Elementor frontend is ready
jQuery(window).on('elementor/frontend/init', function () {

    // About Widget Counter
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-about-widget.default', function ($scope, $) {
        $scope.find('.wbea-about-counter-js').counterUp({
            delay: 10,
            time: 2000
        });
    });

    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-blog-carousel-widget.default', function ($scope, $) {
        var blog_carousel = $scope.find('.wbea-blog-carousel');
        var blog_items = blog_carousel.attr('wbea-blog-items');
        var blog_arrows = blog_carousel.attr('wbea-blog-arrows');
        var blog_loops = blog_carousel.attr('wbea-blog-loops');
        var blog_pause = blog_carousel.attr('wbea-blog-pause');
        var blog_autoplay = blog_carousel.attr('wbea-blog-autoplay');
        var blog_autoplay_speed = blog_carousel.attr('wbea-blog-autoplay-speed');
        var blog_autoplay_animation = blog_carousel.attr('wbea-blog-autoplay-animation');
    
        // Initialize Owl Carousel for Blog Carousel
        blog_carousel.owlCarousel({
            dots: true,
            loop: true,
            autoplay: blog_autoplay,
            margin: 30,
            nav: blog_arrows,
            autoplayTimeout: blog_autoplay_animation,
            autoplaySpeed: blog_autoplay_speed,
            autoplayHoverPause: blog_pause,
            items: blog_items,
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: blog_items,
                    nav: blog_arrows,
                    loop: blog_loops,
                }
            },
            onInitialized: equalizeHeights, // Equalize heights on initialization
            onChanged: equalizeHeights // Equalize heights on slide change
        });
    
        function equalizeHeights() {
            // Reset height to auto to calculate actual height of each item
            blog_carousel.find('.owl-item').css('height', 'auto');
    
            // Find the maximum height among all items
            var maxHeight = 0;
            blog_carousel.find('.owl-item').each(function () {
                var currentHeight = $(this).height();
                maxHeight = currentHeight > maxHeight ? currentHeight : maxHeight;
            });
    
            // Set the maximum height to all items
            blog_carousel.find('.owl-item').css('height', maxHeight + 'px');
        }
    });  

    // Counter Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-counter-widget.default', function ($scope, $) {
        $scope.find('.wbea-counter').counterUp({
            delay: 10,
            time: 2000
        });
    });

    // FAQ Widget
elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-faq-widget.default', function ($scope, $) {
    // Initial setup for FAQ
    $('.wbea-faq > li:eq(0) span').addClass('active').next().slideDown();

    // Handle click on FAQ items
    $('.wbea-faq span').click(function (j) {
        var dropDown = $(this).closest('li').find('p');

        // Close other FAQ items
        $(this).closest('.wbea-faq').find('p').not(dropDown).slideUp();

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            // Toggle active class
            $(this).closest('.wbea-faq').find('span.active').removeClass('active');
            $(this).addClass('active');
        }

        // Toggle dropdown
        dropDown.stop(false, true).slideToggle();
        j.preventDefault();
    });
});


    // Testimonial Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-testimonial-widget.default', function ($scope, $) {
        var testimonial_widget = $scope.find('.wbea-testimonials');
        var testimonial_dots = testimonial_widget.attr('wbea-testimonial-dots');
        var testimonial_loops = testimonial_widget.attr('wbea-testimonial-loops');
        var testimonial_autoplay = testimonial_widget.attr('wbea-testimonial-autoplay');
        var testimonial_pause = testimonial_widget.attr('wbea-testimonial-pause');
        var testimonial_autoplay_speed = testimonial_widget.attr('wbea-testimonial-autoplay-speed');
        var testimonial_autoplay_animation = testimonial_widget.attr('wbea-testimonial-autoplay-animation');

        // Initialize Owl Carousel for Testimonial Widget
        testimonial_widget.owlCarousel({
            nav: true,
            dots: testimonial_dots,
            autoplay: testimonial_autoplay,
            autoplayTimeout: testimonial_autoplay_animation,
            autoplaySpeed: testimonial_autoplay_speed,
            autoplayHoverPause: testimonial_pause,
            loop: testimonial_loops,
            items: 1,
            navText: [
                "<div class='wbea-testimonial-arrow wbea-testimonial-arrow-left'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-testimonial-arrow wbea-testimonial-arrow-right'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: true,
                }
            }
        });
    });

    // Team Carousel Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-team-carousel-widget.default', function ($scope, $) {
        var team_carousel = $scope.find('.wbea-team-carousel');
        var team_items = team_carousel.attr('wbea-team-items');
        var team_arrows = team_carousel.attr('wbea-team-arrows');
        var team_loops = team_carousel.attr('wbea-team-loops');
        var team_pause = team_carousel.attr('wbea-team-pause');
        var team_autoplay = team_carousel.attr('wbea-team-autoplay');
        var team_autoplay_speed = team_carousel.attr('wbea-team-autoplay-speed');
        var team_autoplay_animation = team_carousel.attr('wbea-team-autoplay-animation');

        // Initialize Owl Carousel for Team Carousel
        team_carousel.owlCarousel({
            dots: true,
            nav: team_arrows,
            margin: 30,
            autoplay: team_autoplay,
            autoplayTimeout: team_autoplay_animation,
            autoplaySpeed: team_autoplay_speed,
            autoplayHoverPause: team_pause,
            loop: team_loops,
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: team_items,
                    nav: team_arrows,
                    loop: team_loops,
                }
            }
        });
    });

    // Slider Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-slider-widget.default', function ($scope, $) {
        var slider_widget = $scope.find('.wbea-sliders');
        var slider_arrows = slider_widget.attr('wbea-slider-arrows');
        var slider_dots = slider_widget.attr('wbea-slider-dots');
        var slider_loops = slider_widget.attr('wbea-slider-loop');
        var slider_autoplay = slider_widget.attr('wbea-slider-autoplay');
        var slider_autoplaytimeout = slider_widget.attr('wbea-slider-autoplaytimeout');
        var slider_autoplayspeed = slider_widget.attr('wbea-slider-autoplayspeed');

        // Initialize Owl Carousel for Slider Widget
        slider_widget.owlCarousel({
            nav: slider_arrows,
            dots: slider_dots,
            autoplay: slider_autoplay,
            autoplaySpeed: slider_autoplaytimeout,
            autoplayTimeout: slider_autoplayspeed,
            loop: slider_loops,
            items: 1,
            margin: 32,
            autoplayHoverPause: true,
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
        });
    });

    // Services Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-services-widget.default', function ($scope, $) {
        var service_widget = $scope.find('.wbea-services');
        var services_scroll = service_widget.attr('wbea-services-scroll');
        var services_loop = service_widget.attr('wbea-services-loop');
        var services_autoplay = service_widget.attr('wbea-services-autoplay');
        var services_arrows = service_widget.attr('wbea-services-arrows');
        var services_pause = service_widget.attr('wbea-services-pause');
        var services_autoplay_speed = service_widget.attr('wbea-services-autoplay-speed');
        var services_autoplay_animation = service_widget.attr('wbea-services-autoplay-animation');

        // Initialize Owl Carousel for Services Widget
        service_widget.owlCarousel({
            nav: services_arrows,
            dots: false,
            autoplay: services_autoplay,
            autoplayHoverPause: services_pause,
            autoplaySpeed: services_autoplay_speed,
            margin: 20,
            autoHeight: true,
            autoplayTimeout: services_autoplay_animation,
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            onInitialized: setOwlItemHeight,
            onChanged: setOwlItemHeight,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: services_scroll,
                    nav: services_arrows,
                    loop: services_loop,
                }
            }
        });

        // Function to set equal height for Owl Carousel items
        function setOwlItemHeight(event) {
            // Reset heights
            $('.owl-item > div').css('height', 'auto');

            // Set equal height based on the tallest item
            var maxHeight = 0;
            $('.owl-item', event.target).each(function () {
                var itemHeight = $(this).height();
                maxHeight = Math.max(maxHeight, itemHeight);
            });

            $('.owl-item > div', event.target).height(maxHeight);
        }
    });

    // Products Category Carousel Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-products-category-carousel-widget.default', function ($scope, $) {
        var product_category_carousel = $scope.find('.wbea-product-category-carousel');
        var product_category_carousel_items = product_category_carousel.attr('wbea-product-category-carousel-items');
        var product_category_carousel_arrows = product_category_carousel.attr('wbea-product-category-carousel-arrows');
        var product_category_carousel_loops = product_category_carousel.attr('wbea-product-category-carousel-loops');
        var product_category_carousel_pause = product_category_carousel.attr('wbea-product-category-carousel-pause');
        var product_category_carousel_autoplay = product_category_carousel.attr('wbea-product-category-carousel-autoplay');
        var product_category_carousel_autoplay_speed = product_category_carousel.attr('wbea-product-category-carousel-autoplay-speed');
        var product_category_carousel_autoplay_animation = product_category_carousel.attr('wbea-product-category-carousel-autoplay-animation');

        // Initialize Owl Carousel for Product Category Carousel Widget
        product_category_carousel.owlCarousel({
            dots: false,
            margin: 30,
            autoplay: product_category_carousel_autoplay,
            autoplayTimeout: product_category_carousel_autoplay_animation,
            autoplaySpeed: product_category_carousel_autoplay_speed,
            autoplayHoverPause: product_category_carousel_pause,
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: product_category_carousel_items,
                    nav: product_category_carousel_arrows,
                    loop: product_category_carousel_loops,
                }
            }
        });

        function setEqualHeight() {
            var maxItemHeight = 0;
            // Reset the height of all product-category items to auto
            $('.wbea-product-category-carousel .wbea-product-category').css('height', 'auto');
            
            // Loop through each product-category item to find the tallest one
            $('.wbea-product-category-carousel .wbea-product-category').each(function() {
                var currentItemHeight = $(this).outerHeight();
                // Update the maximum item height if necessary
                if (currentItemHeight > maxItemHeight) {
                    maxItemHeight = currentItemHeight;
                }
            });
            
            // Set the height of all product-category items to the maximum item height
            $('.wbea-product-category-carousel .wbea-product-category').css('height', maxItemHeight);
        }
    
        // Call setEqualHeight on window load and resize
        $(window).on('load resize', function() {
            setEqualHeight();
        });
    });

    // Products Carousel Widget
    elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-products-carousel-widget.default', function ($scope, $) {
        var products_carousel = $scope.find('.wbea-products-carousel');
    
        products_carousel.owlCarousel({
            nav: products_carousel.attr('wbea-products-arrows'),
            dots: false,
            autoplay: products_carousel.attr('wbea-products-autoplay'),
            autoplayHoverPause: products_carousel.attr('wbea-products-pause'),
            autoplaySpeed: products_carousel.attr('wbea-products-autoplay-speed'),
            margin: 20,
            autoHeight: true,
            autoplayTimeout: products_carousel.attr('wbea-products-autoplay-animation'),
            navText: [
                "<div class='wbea-carousel-arrow-border'><svg width='17' height='14' viewBox='0 0 17 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16.7148 7.25C16.7148 7.88281 16.2227 8.375 15.625 8.375H4.83203L8.52344 12.1016C8.98047 12.5234 8.98047 13.2617 8.52344 13.6836C8.3125 13.8945 8.03125 14 7.75 14C7.43359 14 7.15234 13.8945 6.94141 13.6836L1.31641 8.05859C0.859375 7.63672 0.859375 6.89844 1.31641 6.47656L6.94141 0.851562C7.36328 0.394531 8.10156 0.394531 8.52344 0.851562C8.98047 1.27344 8.98047 2.01172 8.52344 2.43359L4.83203 6.125H15.625C16.2227 6.125 16.7148 6.65234 16.7148 7.25Z' fill='#111'/></svg></div>",
                "<div class='wbea-carousel-arrow-border'><svg width='16' height='14' viewBox='0 0 16 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z' fill='#111'/></svg></div>"
            ], 
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: products_carousel.attr('wbea-products-scroll'),
                    nav: products_carousel.attr('wbea-products-arrows'),
                    loop: products_carousel.attr('wbea-products-loop'),
                }
            },
            onInitialized: function (event) {
                equalizeProductHeightsByRow(event);
            },
            onTranslated: function (event) {
                equalizeProductHeightsByRow(event);
            }
        });
    
        function equalizeProductHeightsByRow(event) {
            var $currentSlide = $(event.target).find('.owl-item.active');
            var $products = $currentSlide.find('.wbea-single-product');
    
            // Reset heights
            $products.css('height', 'auto');
    
            var rowHeights = [];
    
            $products.each(function () {
                var $product = $(this);
                var productTop = $product.position().top;
    
                if (typeof rowHeights[productTop] === 'undefined') {
                    rowHeights[productTop] = 0;
                }
    
                rowHeights[productTop] = Math.max(rowHeights[productTop], $product.outerHeight());
            });
    
            $products.each(function () {
                var $product = $(this);
                var productTop = $product.position().top;
    
                $product.outerHeight(rowHeights[productTop]);
            });
        }
    });   


    // Filter Gallery Widget
elementorFrontend.hooks.addAction('frontend/element_ready/webbricks-filter-gallery-widget.default', function ($scope, $) {
    function equalizeImageHeights() {
        var maxHeight = 0;

        $(".wbea-grid-active .wbea-single-filter-gallery img").each(function() {
            $(this).height('auto'); // Reset height to auto
            var currentHeight = $(this).height();
            maxHeight = currentHeight > maxHeight ? currentHeight : maxHeight;
        });

        $(".wbea-grid-active .wbea-single-filter-gallery img").height(maxHeight);
    }

    // Initialize Isotope
    var grid = $(".wbea-grid-active").isotope({
        itemSelector: ".wbea-grid-item",
        percentPosition: true,
        masonry: {
            columnWidth: ".wbea-grid-item"
        }
    });

    // Ensure images are loaded before initializing Isotope and calculating heights
    $(".wbea-grid-item img").imagesLoaded(function () {
        grid.isotope(); // Re-layout after loading images
        equalizeImageHeights(); // Equalize heights after images are loaded
    });

    // Filter Gallery Menu Click
    $(".wbea-filter-gallery-menu").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        grid.isotope({ filter: filterValue });

        // Equalize image heights after filtering
        setTimeout(function() {
            equalizeImageHeights();
        }, 300); // Adjust the timeout as needed

        // Isotope Menu Active
        $(this).addClass("active").siblings().removeClass("active");
    });

    // Ensure images are loaded before recalculating heights after filtering
    grid.on('arrangeComplete', function() {
        $(".wbea-grid-item img").imagesLoaded(function () {
            equalizeImageHeights();
        });
    });
});


});