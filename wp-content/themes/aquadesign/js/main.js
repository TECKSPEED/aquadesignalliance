$(document).ready(function () {
    $("div.w-nav-button.menu-button").click(function () {
        if($(this).hasClass('w--open')){
            $(this).removeClass('w--open');
			$("nav.w-nav-menu.nav-menu").removeClass("w--nav-menu-open");
			$("body").removeClass('locked');
		}
        else{
            $(this).addClass("w--open");
			$("nav.w-nav-menu.nav-menu").addClass("w--nav-menu-open");
			$("body").addClass('locked');
		}
	});
	
	$("ul#primary-menu.menu li, ul#mobile.menu li").each(function (e) {
		if($(this).find("ul.sub-menu a").length > 0) {
			$(this).addClass("has-sub");
		}
	});

	$(window).resize( function (){
		$("nav.w-nav-menu.nav-menu").removeClass("w--nav-menu-open");
		$("div.w-nav-button.menu-button").removeClass("w--open");
		$("li.menu-item.showing").removeClass("showing");
		$("body").removeClass('locked');
		if($(window).width() < 992) {
			$(".mobile-menu").css("display", "block");
			$(".mobile-menu-logo").css("display", "block");
			$(".desktop-menu").css("display", "none");
		}
		else {
			$(".mobile-menu").css("display", "none");
			$(".mobile-menu-logo").css("display", "none");
			$(".desktop-menu").css("display", "block");
		}
	});

	if($(window).width() < 992) {
		$(".mobile-menu").css("display", "block");
		$(".desktop-menu").css("display", "none");
		$(".mobile-menu-logo").css("display", "block");
	}
	else {
		$(".mobile-menu").css("display", "none");
		$(".desktop-menu").css("display", "block");
		$(".mobile-menu-logo").css("display", "none");
	}
	
	$("li.menu-item").each( function() {
		if($(this).find("> ul").length > 0){
			$(this).find("> a").click(function(e) {
				if($(this).parent().is(".showing")) {
					$(this).parent().removeClass("showing");
				}
				else {
					$("li.menu-item.showing").removeClass("showing");
					$(this).parent().addClass("showing");
				}
					e.preventDefault();
					e.stopPropagation();
				
			});
		}
	});
	$("body").click(function(e) {
		if(!$(e.target).is("li.menu-item") && !$(e.target).is("li.menu-item *")) {
			$("li.menu-item.showing").removeClass("showing");
		}
	});
	// $("body").delegate("li.menu-item", "click", function (e){
		
	// });
});
jQuery(document).ready(function($){
	$('#slides').slidesjs({
		navigation: {
			active: true,
			effect: "slide"
		},
		pagination: {
			active: false,
			generatePagination: false
		},
		effect: {
			slide: {
				speed: 3000
			}
		},
		preload: true,
		preloadImage: '<?php echo get_template_directory_uri(); ?>/images/loading.gif',
		width: 300,
		height: 300,
		play: {
			auto: true,
			interval: 5000
		},
		pause: 4500,
		hoverPause: true,
		generatePagination: false

	});

    $( ".swipebox" ).swipebox( {
        useCSS : true, // false will force the use of jQuery for animations
        useSVG : false, // false to force the use of png for buttons
        initialIndexOnArray : 0, // which image index to init when a array is passed
        hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
        removeBarsOnMobile : true, // false will show top bar on mobile devices
        hideBarsDelay : 0, // delay before hiding bars on desktop
        videoMaxWidth : 1140, // videos max width
        beforeOpen: function() {}, // called before opening
        afterOpen: null, // called after opening
        afterClose: function() {}, // called after closing
        loopAtEnd: true // true will return to the first image after the last image is reached
	});


});


