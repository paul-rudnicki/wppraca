jQuery(function ($) {
	'use strict';
  	$(function() {
  		var $dashicons_menu = $('#dashicons-menu');
  		var $main_nav = $('#main-nav');
  		var flag = false;
  		if($(window).width() > 750){
	  		$dashicons_menu.hide();
	  		$main_nav.show();
  		} else {
	  		$dashicons_menu.show();
	  		$main_nav.hide();
  		}

  		$dashicons_menu.on('click', function(){
  			if (flag) {
  				$main_nav.slideUp();
  				flag = false;
  			} else {
	  			$main_nav.slideDown();
 					flag = true;
  			}
  		});
  		$( window ).resize(function() {
  			if($(window).width() > 750){
		  		$dashicons_menu.hide();
		  		$main_nav.show();
	  		} else {
		  		$dashicons_menu.show();
		  		$main_nav.hide();
	  		}
	  		flag = false;
  		});
  	});
});