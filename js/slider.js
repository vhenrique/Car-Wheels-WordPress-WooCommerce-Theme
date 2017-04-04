$ = jQuery.noConflict();
$(document).ready(function(){
	setInterval(autoPlay, 5000);

	// Main slider at Home page auto next button event
	$('.slideNext').click(function(e){ 
		e.preventDefault();
		autoPlay(); 
	});

	$('.slidePrev').click(function(e){
		e.preventDefault();
		$('.mainSlider li').first().removeClass('on');
		$('.mainSlider li').first().before($('.mainSlider li').last());
		$('.mainSlider li').first().addClass('on');
	});
});
function autoPlay(){
	$('.mainSlider li').first().removeClass('on');
	$('.mainSlider li').last().after($('.mainSlider li').first());
	$('.mainSlider li').first().addClass('on');
}