var navbarHeight = 50; 
var headerHeight = 205;
var navbarColor = "51,51,51";

$(window).scroll(function() {
	fixNavbar();
});

$(window).load(function() {
	fixNavbar();
});

function fixNavbar() {
	var ySmall = ($(window).scrollTop() * (navbarHeight / headerHeight)); 
	var navOpacity = ySmall / navbarHeight; 
		
	if (navOpacity > 1 || navFix == 1) { navOpacity = 1; }
	if (navOpacity < 0 ) { navOpacity = 0; }
	
	//var navBackColor = 'rgba(' + navbarColor + ',' + navOpacity + ')';
	//$('.navbar').css({"background-color": navBackColor});
	
	var backgroundColor = $('.navbar-inverse').css('color');
	console.log(backgroundColor);
	
	backgroundColor = backgroundColor.slice(backgroundColor.indexOf('(') + 1, backgroundColor.indexOf(')'));
	
	var colorPart = backgroundColor.split(','), i = colorPart.length;
	
	while (i--)
	{
		colorPart[i] = parseInt(colorPart[i], 10);
	}
	
	
	var newBackgroundColor = 'rgba(' + colorPart[0] + ',' + colorPart[1] + ',' + colorPart[2] + ',' + navOpacity + ')';
	$('.navbar').css({"background-color": newBackgroundColor});
	
		console.log(newBackgroundColor);

	var shadowOpacity = navOpacity * 0.4;
	
	if ( ySmall > 1) {
		$('.navbar').css({"box-shadow": "0 2px 3px rgba(0,0,0," + shadowOpacity + ")"});
	} else {
		$('.navbar').css({"box-shadow": "none"});
	}
}