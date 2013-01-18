/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
AG_jQuery(document).ready(function(){
	AG_jQuery().piroBox({
		  my_speed: 400, //animation speed
		  bg_alpha: 0.5, //background opacity
		  slideShow : true, // true == slideshow on, false == slideshow off
		  slideSpeed : 4, //slideshow
		  close_all : '.piro_close, .piro_overlay' // add class .piro_overlay(with comma)if you want overlay click close piroBox
		  });
	});