jQuery.noConflict();
(function($) { 
  $(function() {
    $('#north').tipsy({gravity: 'n'});
    $('.north').tipsy({gravity: 'n'});
    $('.south').tipsy({gravity: 's'});
    $('.east').tipsy({gravity: 'e'});
    $('.west').tipsy({gravity: 'w'});
    $('.north-west').tipsy({gravity: 'nw'});
    $('.north-east').tipsy({gravity: 'ne'});
    $('.south-west').tipsy({gravity: 'sw'});
    $('.south-east').tipsy({gravity: 'se'});
	$('.focus-example [title]').tipsy({trigger: 'focus', gravity: 'w'});
  });
})(jQuery);