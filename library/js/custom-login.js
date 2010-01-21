jQuery(document).ready(
	function() {
		var f = jQuery.farbtastic('#lets-get-this-color');
		var p = jQuery('#lets-get-this-color').css('opacity', 0.25);
		var selected;
		jQuery('.colorwell')
			.each(function () { f.linkTo(this); jQuery(this).css('opacity', 0.75); })
			.focus(function() {
				if (selected) {
					jQuery(selected).css('opacity', 0.75).removeClass('colorwell-selected');
			}
		f.linkTo(this);
		p.css('opacity', 1);
		jQuery(selected = this).css('opacity', 1).addClass('colorwell-selected');
	});
			
	// Setting the tabs in the sidebar hide and show, setting the current tab
	jQuery('.tab-content').hide();
	jQuery('.t1').show();
	
	jQuery('ul.tabs li.t1 a').addClass('tab-current');
	jQuery('ul li a').css('cursor','pointer');
	
	jQuery('#tab ul.tabs li.t1 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t1').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t2 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t2').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	jQuery('#tab ul.tabs li.t3 a').click(
		function() {
			jQuery('#tab div.tab-content').hide();
			jQuery('ul.tabs li a').removeClass('tab-current');
			jQuery('#tab').find('div.t3').show();
			jQuery(this).addClass('tab-current');			
		}
	);
	
	// Dock h3 toggle
	jQuery('#dock h3').click(function() {
		jQuery(this).next().toggle(280);
	});
	
	// #left h3 toggle
	//jQuery('#left .postbox .inside').hide();
	//jQuery('#left .postbox:first .inside').show();
	jQuery('#left .postbox h3').append('<span><abbr title="Click here to hide the box below">click to toggle</abbr></span>');
	jQuery('#left .postbox h3').click(function() {

		jQuery(this).next().toggle(280);

	});
	
	// #left Warning h3 hide
	jQuery('#left .postbox.warning h3').append('<span class="hide"><abbr title="HIDE!!">Click to remove this box!</abbr></span>');
	jQuery('#left .postbox.warning h3').click(function() {

		jQuery(this).parent().hide();

	});
	
});
