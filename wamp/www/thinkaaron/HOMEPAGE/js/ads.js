jQuery(document).ready(function($){
	var description = "The smartest icons library for web designers.",
		url = 'http://codyhouse.co/adv-banners/nc-banner-130x100.png';
	$('.ui8ad-text a').text(description).attr('href', 'https://nucleoapp.com/').css('display', 'block');
	$('.ui8ad-image').attr('href', 'https://nucleoapp.com/').find('img').attr('src', url).prop('alt', 'Nucleo, Customizable Vector Icons');
	$('.ui8ad-tag a').text('nucleoapp.com').attr('href', 'https://nucleoapp.com/');
});