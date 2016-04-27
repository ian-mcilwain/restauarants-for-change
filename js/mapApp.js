var points = [];

var potato = [];

function getRestaurantName(){
	var numberOfCoordinates = $('.mapInfo').children().length;
	// console.log(numberOfCoordinates)
	for (var i = 1; i <= numberOfCoordinates; i = i + 1) {
		var rnText = $('.nameOfRestaurant:nth-child('+ i +')').html();
		// console.log(rnText);
		var rnText = rnText.trim();
		var nameObj = {rnText:rnText};
		potato.push(nameObj);

} // for ends here
} //getRestaurantName ends here

function getCoordinates(){
	var numberOfCoordinates = $('.mapInfo').children().length;
	for (var i = 1; i <= numberOfCoordinates; i = i + 1) {
		var llText = $('.latLong:nth-child('+ i +')').html();
		var llText = llText.trim();
		var llPieces = llText.split(',');  
		var llObj = {
			lat : llPieces[0].split(' ').pop(),
			lng : llPieces[1].split(' ').pop()
		}
		points.push(llObj);
} // for ends here
} //getCoordinates ends here

var markers = [];

var map = L.map('map').setView([50.590212, -96.723633], 3);

var myMapId = 'ian-mcilwain.66cd99d3'

var mapAccessToken = 'pk.eyJ1IjoiaWFuLW1jaWx3YWluIiwiYSI6IjMyN2E4NGVjMWIwNzBlMjk3YTJlZTI0Mjc2ZWMyNTU3In0.tml1N_O6Ans7ccoCzXwMrw';

var mapboxTiles = L.tileLayer('https://{s}.tiles.mapbox.com/v4/' + myMapId + '/{z}/{x}/{y}.png?access_token=' + mapAccessToken, { attribution: '<a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>' }).addTo(map);

function addMapPoints(lat, lng, pickle){
	var marker = L.marker([lat, lng]).bindPopup(pickle);
	map.addLayer(marker);
	markers.push(marker);
}

function makeMarkers(){
	for(var i=0; i<points.length; i++){
		var lat = points[i].lat;
		var lng = points[i].lng;
		var pickle = potato[i].rnText;
		// console.log(pickle);
		addMapPoints(lat, lng, pickle);
	}
}

$(window).load(function(){
	getCoordinates();
	getRestaurantName();
	makeMarkers();
	// console.log("window loaded");
});

$('.makeMarkers').submit(function(e){
	e.preventDefault();
	getCoordinates();
	getRestaurantName();
	makeMarkers();
});

$('.exploreAnotherCity').click(function(e){
	e.preventDefault();
	$('.citiesList').css({'display':'block'})
	$('.restaurantsList').css({'display':'none'})
	map.setView([50.590212, -96.723633], 3);
	$('.singleRestaurantDataInner').empty();
	$('.singleRestaurantData').removeClass('singleRestaurantDataVisible');
	$('.restaurantsList').removeAttr('id', 'restaurantsListSlideout');
	$('.reservationsMap').removeAttr('id', 'mapSlideout')

});

$('.calgary').click(function(e){
	e.preventDefault();
	map.setView([51.048615, -114.070846], 12);
	$('.citiesList').css({'display':'none'});
	$('.calgaryRestaurantsList').css({'display':'block'})
});

$('.edmonton').click(function(e){
	e.preventDefault();
	map.setView([53.544389, -113.490927], 12);
	$('.citiesList').css({'display':'none'});
	$('.edmontonRestaurantsList').css({'display':'block'})
});

$('.halifax').click(function(e){
	e.preventDefault();
	map.setView([44.648862, -63.57532], 12);
	$('.citiesList').css({'display':'none'});
	$('.halifaxRestaurantsList').css({'display':'block'})
});

$('.hamilton').click(function(e){
	e.preventDefault();
	map.setView([43.250021, -79.866091], 12);
	$('.citiesList').css({'display':'none'});
	$('.hamiltonRestaurantsList').css({'display':'block'})
});

$('.montreal').click(function(e){
	e.preventDefault();
	map.setView([45.501689, -73.567256], 12);
	$('.citiesList').css({'display':'none'});
	$('.montrealRestaurantsList').css({'display':'block'})
});

$('.ottawa').click(function(e){
	e.preventDefault();
	map.setView([45.421530, -75.697193], 12);
	$('.citiesList').css({'display':'none'});
	$('.ottawaRestaurantsList').css({'display':'block'})
});

$('.stJohns').click(function(e){
	e.preventDefault();
	map.setView([47.560541, -52.712831], 12);
	$('.citiesList').css({'display':'none'});
	$('.stJohnsRestaurantsList').css({'display':'block'})
});

$('.saskatoon').click(function(e){
	e.preventDefault();
	map.setView([52.133214, -106.670046], 10);
	$('.citiesList').css({'display':'none'});
	$('.saskatoonRestaurantsList').css({'display':'block'})
});

$('.stratford').click(function(e){
	e.preventDefault();
	map.setView([43.370001, -80.982229], 12);
	$('.citiesList').css({'display':'none'});
	$('.stratfordRestaurantsList').css({'display':'block'})
});

$('.toronto').click(function(e){
	e.preventDefault();
	map.setView([43.653226, -79.383184], 12);
	$('.citiesList').css({'display':'none'});
	$('.torontoRestaurantsList').css({'display':'block'})
});

$('.vancouver').click(function(e){
	e.preventDefault();
	map.setView([49.282729, -123.120738], 12);
	$('.citiesList').css({'display':'none'});
	$('.vancouverRestaurantsList').css({'display':'block'})
});

$('.winnipeg').click(function(e){
	e.preventDefault();
	map.setView([49.899754, -97.137494], 12);
	$('.citiesList').css({'display':'none'});
	$('.winnipegRestaurantsList').css({'display':'block'})
});

$('.kingston').click(function(e){
	e.preventDefault();
	map.setView([44.231172, -76.485954], 12);
	$('.citiesList').css({'display':'none'});
	$('.kingstonRestaurantsList').css({'display':'block'})
});

$('.individualRestaurantName').click(function(e){
	e.preventDefault();
	var whatIneed = $(this).html();
	console.log(whatIneed);
	$('.singleRestaurantDataInner').empty();
	$('.singleRestaurantDataInner').append(whatIneed);
	console.log($('.singleRestaurantDataInner.phoneNumber').html());
	$('.singleRestaurantData').addClass('singleRestaurantDataVisible');
	$('.restaurantsList').attr('id', 'restaurantsListSlideout');
	$('.reservationsMap').attr('id', 'mapSlideout');
	var locatedAt = $('h5', this).html();
	var locatedAt = locatedAt.replace("lat: ", "");
	var locatedAt = locatedAt.replace("lng: ", "");
	var locatedAt = locatedAt.split(" ");
	var restaurantURL = $('h4', this).html();
	var restaurantURL = restaurantURL.trim();
	// console.log(restaurantURL);

	var phoneNum = $(".singleRestaurantDataInner .phoneNumber").html();

	$('.singleRestaurantDataInner').append('<h6><a href="tel:' + phoneNum + '">' + phoneNum + '</a></h6>')
	$('.singleRestaurantDataInner').append('<a href="' + restaurantURL + '" target="_blank">' + "website" + '</a>')
	// console.log(locatedAt);
	map.setView(locatedAt, 15)


	// var phoneLink = '<a href="' + phoneNum + '">' + phoneNum + '</a>'
	// console.log(phoneLink);
	// $(".phoneNumberLink").append(phoneLink);

});

$('.slideBack').click(function(e){
	e.preventDefault();
	$('.singleRestaurantData').removeClass('singleRestaurantDataVisible');
	$('.restaurantsList').removeAttr('id', 'restaurantsListSlideout');
	$('.reservationsMap').removeAttr('id', 'mapSlideout')
	map.setZoom(12);
});