
$(window).scroll(function(){
	var scrollDistance = $(window).scrollTop();
	if(scrollDistance >= 20) {
		$('nav').addClass("scrolledNav");
		$('.navLogo').attr("id", "scrolledNavLogo");
	} else {
		$('nav').removeClass("scrolledNav")
		$('.navLogo').removeAttr("id", "scrolledNavLogo")
	}
});

$("#hamburger").click(function(e){
	e.preventDefault();
	console.log('clicked on hamburger');
	$("#navUl").addClass('mobileUl');
});


$('.navBarLinks').click(function(){
	var y = $(window).scrollTop();
	$("#navUl").removeClass('mobileUl');
	$(window).scrollTop(y+10);
});

$("#navUl").click(function(){
	var y = $(window).scrollTop();
	$("#navUl").removeClass('mobileUl');
	$(window).scrollTop(y+2);
});