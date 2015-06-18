/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

// Initial Page Load Scripts
jQuery(document).ready(function($) {

	// General - Width/Height Variables
	var sWidth = $(window).width(),
	sHeight = $(window).height(),
	sTop = $(window).scrollTop(),
	dividerHeight = $('#home-hero-divider').outerHeight();


	// Toolbar - Sizing/Placement
	var tbDropdown = $('#tb-newsletter').width() + $('#tb-search').width() + $('#tb-login').width() + 84,
	tbHeight = $('#nav-toolbar').height();
	$('#tb-newsletter-dropdown, #tb-search-dropdown').width(tbDropdown).css('top', tbHeight);
	$('#tb-search-dropdown').css('left', -($('#tb-newsletter').width() + 32 ));

	// Toolbar - Dropdown Functionality
	$('#tb-newsletter-button').click(function(e){
		if($('#tb-search-dropdown').hasClass('tb-dropdown-active')){
			$('#tb-search-dropdown').removeClass('tb-dropdown-active');
			$('#tb-search').removeClass('tb-button-active');
			setTimeout(function(){
    			$('#tb-newsletter-dropdown').toggleClass('tb-dropdown-active');
    		}, 350);
    		$('#tb-newsletter').toggleClass('tb-button-active');
		}
		else{
			$('#tb-newsletter-dropdown').toggleClass('tb-dropdown-active');
			$('#tb-newsletter').toggleClass('tb-button-active');
		};
	});
	$('#tb-search-button').click(function(e){
		if($('#tb-newsletter-dropdown').hasClass('tb-dropdown-active')){
			$('#tb-newsletter-dropdown').removeClass('tb-dropdown-active');
			$('#tb-newsletter').removeClass('tb-button-active');
			setTimeout(function(){
    			$('#tb-search-dropdown').toggleClass('tb-dropdown-active');
    		}, 350);
    		$('#tb-search').toggleClass('tb-button-active');	
		}
		else{
			$('#tb-search-dropdown').toggleClass('tb-dropdown-active');
			$('#tb-search').toggleClass('tb-button-active');
		};
	});

	// Toolbar - Close Toolbar Dropdowns When Any Other Element is Clicked
	$('#container').click(function(){
		$('#tb-newsletter-dropdown, #tb-search-dropdown').removeClass('tb-dropdown-active');
		$('#tb-newsletter, #tb-search').removeClass('tb-button-active');
	});

	// Main Navigation - Adding Active Class To Top Level LIs
	$('#menu-main-nav-1 li').each(function(){
		$(this).hover(function(){$(this).addClass('menu-item-active');}, function(){$(this).removeClass('menu-item-active');});
	});

	// Main Navigation - Adding Classes For Each Type of Dropwdown Menu
	$('#menu-main-nav-1 .menu-item-has-children ul').each(function(){
		var childCount = $(this).children('li').length;
		var grandchildCount = $(this).children('li').has('ul').length;

		if(childCount > 2 && grandchildCount > 0){
			$(this).addClass('big-guy');
		}
		if(childCount === 2 && grandchildCount > 0){
			$(this).addClass('average-guy');
		}
		if(childCount > 0 && grandchildCount === 0){
			$(this).addClass('little-guy');
		}
	});

	// Main Navigation - Setting The Left Position of the Non-Megamenu Dropdowns
	$('.little-guy, .average-guy').each(function(){
		var offsetFoo = $(this).parent('li').offset();
		$(this).css('left', offsetFoo.left);
	});

	// Main Navigation - Variable For Main Nav Height
	var navHeight = $('#outer-header').outerHeight();

	// Main Navigation - Control the on-scroll Transparency of the Home Page Main Navigation bar
	if($('body').hasClass('home')){
		$('#outer-header').addClass('transparent-header');

		$(window).scroll(function(){
			var sTop = $(window).scrollTop();
			if(sTop < 10) {
				$('#outer-header').addClass('transparent-header');
			}
			if(sTop > 10) {
				$('#outer-header').removeClass('transparent-header');
			}
		});
	};

	// Mobile Navigation - Set Container Height
	$('#mobile-nav').height(sHeight);

	// Mobile Navigation - Mobile Nav Closing Function
	function closeOut() {
		$('body').toggleClass('scroll-jam');
		$('#mobile-nav-container').toggleClass('nav-slide');
		$('#mobile-nav-button').toggleClass('mobile-button-active');
		$('#container').toggleClass('body-slide');
	}

	// Mobile Navigation - Close Mobile Nav on Menu Button Click
	$('#mobile-nav-button').click(function() {
		closeOut()
	});

	// Mobile Navigation - Close Mobile Nav When Any Other Element is Clicked
	$('#container').click(function() {
		if ($('#container').hasClass('body-slide')) {
			closeOut()
		} else {};
	});

	// Mobile Navigation - Adding Classes For Each Type of Dropwdown Menu
	$('#menu-main-nav .menu-item-has-children ul').each(function(){
		var childCount = $(this).children('li').length;
		var grandchildCount = $(this).children('li').has('ul').length;

		if(childCount > 0){
			$(this).parent('li').addClass('expandable');
		}
		if(childCount > 0 && grandchildCount > 0){
			$(this).addClass('big-expand');
		}
		if(childCount > 0 && grandchildCount === 0){
			$(this).addClass('little-expand');
		}
	});

	// Mobile Navigation - Adding Expand Buttons to Mobile Nav Top Level LI's That Are Expandable
	$('.expandable').each(function(){
		$(this).prepend('<div class="expand-button"></div>');
	}); 

	// Mobile Navigation - Open and Close Expandable Menus
	$('.expand-button').each(function(){
		$(this).click(function(){
			if($(this).siblings('ul').hasClass('expanded')){
					$(this).toggleClass('mobile-rotate');
					$(this).siblings('ul').toggleClass('expanded');
				}else{
					$('#menu-main-nav').children('li').children('ul').each(function(){
							$(this).removeClass('expanded');
							$(this).siblings('.expand-button').removeClass('mobile-rotate');
					});
					$(this).siblings('ul').toggleClass('expanded');
					$(this).toggleClass('mobile-rotate');
				};
		});
	});

	// Making Video Iframes Responsive
	$("#home-featured-video, #product-gallery").fitVids();

	//Single Product Gallery
	$(function(){

		var next = 4;
		var items = [];

		items = $("#product-gallery li").toArray();
		var numberOf = items.length;
		var previous = numberOf;

		if(numberOf == 3){
			var rep1 = items[2];
			rep1 = $(rep1).clone();
			var rep2 = items[1];
			rep2 = $(rep2).clone();
			var rep3 = items[0];
			rep3 = $(rep3).clone();
			items.unshift(rep3, rep2, rep1);
			numberOf = items.length;
			previous = numberOf;
		};
		if(numberOf == 4){
			var rep1 = items[3];
			rep1 = $(rep1).clone();
			var rep2 = items[2];
			rep2 = $(rep2).clone();
			var rep3 = items[1];
			rep3 = $(rep3).clone();
			var rep4 = items[0];
			rep4 = $(rep4).clone();
			items.unshift(rep4, rep3, rep2, rep1);
			numberOf = items.length;
			previous = numberOf;
		};
		// Remove all but first image from DOM
		$("#product-gallery").html("");
		$("#product-gallery").append(items[0], items[1], items[2], items[3], items[4]);
		$("#product-gallery li:first-child").addClass('left-hidden');
		$("#product-gallery li:last-child").addClass('right-hidden');
		$("#product-gallery li:nth-child(3)").addClass('gallery-active');

		function nextImage() {
			$("#product-gallery li:first").remove();
			$("#product-gallery li:first").addClass('left-hidden');
			$("#product-gallery li:last").removeClass('right-hidden');
	        $("#product-gallery").append(items[++next % numberOf]);
	        $("#product-gallery li:last").addClass('right-hidden');
	        previous = ++previous;
	        if(next <= 0){
				next = numberOf;
			}
			if(previous <= 0){
				previous = numberOf;
			}
	    }

	    function previousImage() {
	    	$("#product-gallery li:last-child").remove();
	    	$("#product-gallery li:first-child").removeClass('left-hidden');
	    	$("#product-gallery li:last-child").addClass('right-hidden');
	        $("#product-gallery").prepend(items[--previous % numberOf]);
	        $("#product-gallery li:first-child").addClass('left-hidden');
	        $("#product-gallery li:first-child").removeClass('right-hidden');
	        next = --next;
	        if(next <= 0){
				next = numberOf;
			}
			if(previous <= 0){
				previous = numberOf;
			}
	    }

		function adjust(){
			l = 0;
			$(".gallery-item").each(function(){
				var s = $(this).outerHeight();
				if(s > l){
					l = s;
				};
			});
		    $(".gallery-item").each(function(){
		    	var i = $(this);
		    	var h = i.outerHeight();
		    	var a = l - h;
		    	a = a /2;
		    	i.css('top', a);
		    });
	    }
	    setTimeout(adjust, 1000);

		function activate(){
			$("#product-gallery li").each(function(){
				$(this).removeClass('gallery-active');
			});
	    	setTimeout(function(){ $("#product-gallery li:nth-child(3)").addClass('gallery-active'); }, 300);
		}

	    $('#gallery-next').click(function(){
	    	$("#product-gallery li").each(function(){
	        	if($(this).hasClass('left-hidden')){
	        		$(this).removeClass('left-hidden');
	        	}
	        })
	    	nextImage();
	    	adjust();
	    	activate();
	    });

	    $('#gallery-previous').click(function(){
	    	$("#product-gallery li").each(function(){
	        	if($(this).hasClass('left-hidden')){
	        		$(this).removeClass('left-hidden');
	        	}
	        });
	    	previousImage();
	    	adjust();
	    	activate();
	    });

	});






	// Responsive jQuery - 480px Width and Below
	if (sWidth < 481) {
	
	}
	
	// Responsive jQuery - 481px Width and Above
	if (sWidth > 481) {
	
	}

		// Responsive jQuery - 481px Width and Above
	if (sWidth <=767) {

		$('#home-hero, #products-hero, #support-hero').height(sHeight - navHeight + 2).css('margin-top', '-2px');

	}
	
	// Responsive jQuery - 768px Width and Above
	if (sWidth >= 768) {
	
		// Load Gravatars
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});

		$('#home-hero, #products-hero, #support-hero').height(sHeight - dividerHeight - navHeight + 4).css('margin-top', '-2px');
		
	}

	if (sWidth < 1030) {
		// Main Navigationg - Adjust Main Header Placement To Compensate for the Addition of the Toolbar
		$('#outer-header').css('margin-top', '0');

		$('#content').css('margin-top', navHeight);

		$('#home-products-container').css('top', '0');

		$('#home-featured-container').css('top', '0');

		var gna = $('#gallery-nav').outerHeight();
		var pgh = $('#product-gallery').outerHeight();
		gna = (pgh + gna) / 2;
		$('#gallery-nav').css('margin-top', gna);

	}
	
	// Responsive jQuery - 1031px Width and Above
	if (sWidth > 1030) {
		$('#outer-header').css('margin-top', tbHeight);

		$('#content').css('margin-top', tbHeight + navHeight);

		$('#home-hero, #products-hero, #support-hero').height(sHeight - dividerHeight - 28).css('margin-top', -navHeight - 2);

		$('#home-products-container').css('top', ($('#home-products').height() - $('#home-products-container').height()) / 2);

		$('#home-featured-container').css('top', ($('#home-featured').height() - $('#home-featured-container').height()) / 2);
	}

	// Responsive jQuery - Repeat of all Responsive jQuery Scripts to be Executed On Screen Resize
	$(window).resize(function() {

		// General - Width/Height Variables
		var sWidth = $(window).width(),
		sHeight = $(window).height(),
		tbHeight = $('#nav-toolbar').outerHeight(),
		navHeight = $('#outer-header').outerHeight(),
		dividerHeight = $('#home-hero-divider').outerHeight();

		// Responsive jQuery - 480px Width and Below
		if (sWidth < 481) {
		
		}
		
		// Responsive jQuery - 481px Width and Above
		if (sWidth > 481) {
		
		}

		// Responsive jQuery - 767px Width and Below
		if (sWidth <= 767) {

			$('#home-hero, #products-hero, #support-hero').height(sHeight - navHeight + 2).css('margin-top', '-2px');

		}
		
		// Responsive jQuery - 768px Width and Above
		if (sWidth >= 768) {
		
			// Load Gravatars
			$('.comment img[data-gravatar]').each(function(){
				$(this).attr('src',$(this).attr('data-gravatar'));
			});

			$('#home-hero, #products-hero, #support-hero').height(sHeight - dividerHeight - navHeight + 4).css('margin-top', '-2px');
			
		}

		if (sWidth < 1030) {

			// Main Navigationg - Adjust Main Header Placement To Compensate for the Addition of the Toolbar
			$('#outer-header').css('margin-top', '0');

			$('#content').css('margin-top', navHeight);

			$('#home-products-container').css('top', '0');

			$('#home-featured-container').css('top', '0');

			var gna = $('#gallery-nav').outerHeight();
			var pgh = $('#product-gallery').outerHeight();
			gna = (pgh + gna) / 2;
			$('#gallery-nav').css('margin-top', gna);

		}
		
		// Responsive jQuery - 1031px Width and Above
		if (sWidth > 1030) {
			$('#outer-header').css('margin-top', tbHeight);

			$('#content').css('margin-top', tbHeight + navHeight);

			$('#home-hero, #products-hero, #support-hero').height(sHeight - dividerHeight - 28).css('margin-top', -navHeight - 2);

			$('#home-products-container').css('top', ($('#home-products').height() - $('#home-products-container').height()) / 2);

			$('#home-featured-container').css('top', ($('#home-featured').height() - $('#home-featured-container').height()) / 2);
		}
	});
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );