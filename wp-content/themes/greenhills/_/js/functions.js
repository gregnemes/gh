var scrollOffset = 40;
var cw,ch,hh,dh;

jQuery(document).ready(function($) {

	view(); //spy();
	
	$('#previous-1').click(function() {
	    $('#flexslider-1').flexslider('prev')
	    return false;		
	});		
	
	$('#next-1').click(function() {
	    $('#flexslider-1').flexslider('next')
	    return false;		
	});	
	
	$('#backtotop').click(function(event) {
	  	event.preventDefault();
		$('body,html').animate({scrollTop:0},2000);
	});
	
	$(".jump").click(function(e){
		e.preventDefault();
		var thelink = $(this).attr("href");
		thelink = thelink.toLowerCase();
		goToByScroll(thelink);	

	});
	
jQuery(document).bind('gform_confirmation_loaded', function(event, form_id){
	$("#success").removeClass('hidden');
	$("#success").addClass('success');	
	$("#content").removeClass('empty');
	$("#content").addClass('submitted');	
});	


});//end document.ready



$(window).ready(function() {


});//end window.ready



$(window).resize(function() {

	view();	
	
});//end window.resize


$(window).scroll(function(e) { 

	view(); // parallax(); spy();
        
	if($(this).scrollTop() >= scrollOffset && $("#header").hasClass('before')){
		$("#header").removeClass('before');
		$("#header").addClass('after');
		
	} 
	else if($(this).scrollTop() < scrollOffset && $("#header").hasClass('after')){
		$("#header").removeClass('after');
		$("#header").addClass('before');		 		 		
	}    

});//end window.scroll




function goToByScroll(locale){
	$('html,body').animate({
		scrollTop: $(locale).offset().top - scrollOffset
	},2000);
}


function view(){
	
	ch = $(window).height();
	cw = $(window).width();

	if($(window).width() > 767){
		$("#header").css('min-height',ch);
		$("#content").css('min-height',ch);
		cw -= 300;		
		$("#content").css('width',cw);		
	}
	

	
	$("section.block").css('min-height',ch);
		
}


function parallax(){

	if($(window).width() > 1024){	
		var body = $('body');
		var pElement = $('#background');
		
		var pTravel = 20;
		var pRatio = pTravel/100;
		
		var docH = $(document).height();
		
		var winH = $(window).height();
		
		var pH = docH - winH;
		
		var pBody = body.scrollTop(); 
	
		var pScroll = (pBody / pH) * 100; 
	
		var pNumTemp = -1*(pScroll*pRatio);	
		var pNum = pNumTemp + '%';
		var pNumBlur = pNumTemp + 'px';
	
		pElement.css('top', pNum );
	}	

}

function spy(){
	var menu = $('#nav-side');
	var targets = new Array();
	
	//an array with [i][0] = menu item and [i][1] = scroll item
	$('#nav-side .jump').each(function(i){
		targets[i] = new Array(2);
		var temp = $(this).attr('href');
		var offset = $(temp).offset();	
		targets[i][0] = $(this);		
		targets[i][1] = offset.top;
	});
	
	for(var j = 0; j < targets.length; j++){
		if(($(window).scrollTop()+250) >= targets[j][1]){
			$('#nav-side .jump').removeClass('active');
			targets[j][0].addClass('active');
			
			if(targets[j][0].attr('href') == '#work'){
				$('.carousel').carousel('cycle');	
			}
			else{
				$('.carousel').carousel('pause');	
			}
			
		}
	}	
	
}

