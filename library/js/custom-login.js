jQuery(document).ready(
	function($) {
		
	$('.upload_image_button').click(function() {
		formfield = $(this).parent().find('.upload_image').prop('name');
		//console.log(formfield);
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	
	window.send_to_editor = function(html) {
		imgurl = $('img',html).prop('src');
		$('#' + formfield).val(imgurl);
		tb_remove();
	}
	
	// Tabs
	$('div.tabbed div').hide();
	$('div.t1').show();
	$('div.tabbed ul.tabs li.t1 a').addClass('tab-current');
	$('div.tabbed ul li a').css('cursor','pointer');

	$('div.tabbed ul li a').click(function(){
		var thisClass = this.className.slice(0,2);
		$('div.tabbed div').hide();
		$('div.' + thisClass).show();
		$('div.tabbed ul.tabs li a').removeClass('tab-current');
		$(this).addClass('tab-current');
	});
	
	// Queations
	$('#normal-sortables span.hide').hide();
	$('#normal-sortables a.question').click(function() {
		$(this).next().next().toggleClass('hide').toggleClass('show').toggle(380);
	});
	
	$('textarea').autoResize({
		// No animation:
		animate: false,
		// Extra space:
		extraSpace: 25
	});
	
	// External links
	$('a').filter(function() {
		return this.hostname && this.hostname !== location.hostname;
	}).prop('target','_blank');
	
});
