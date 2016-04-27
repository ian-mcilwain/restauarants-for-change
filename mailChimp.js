function showMeTheRecipes(email) {
	$('.successBoxOne').append(email + ' is signed up for the mailing list.  Check out the Recipes below!');
	$('.recipeContainer').addClass('recipeContainerVisible')
	document.cookie = "showRecipes"
}

$('.mailChimpFormOne').on('submit',function(e){
	e.preventDefault();
	$('.successBoxOne').empty();
	console.log('mail chimp form submitted');
	var email = $('.emailOne').val();
	var FNAME = $('.firstNameBox1').val();
	var LNAME = $('.lastNameBox1').val();
	var CITY = $('.cityBox1').val();
	var PROVINCE = $('.provinceBox1').val();
	$.ajax({
	  dataType: "json",
	  url: 'mc/index.php',
	  data: { email : email, callback : '?', FNAME : FNAME, LNAME : LNAME, CITY : CITY, PROVINCE : PROVINCE },
	  success: showMeTheRecipes(email)
	});
});



$('.mailChimpFormTwo').on('submit',function(e){
	e.preventDefault();
	$('.successBoxTwo').empty();
	console.log('mail chimp form submitted');
	var email = $('.emailTwo').val();
	console.log(email)

	$.ajax({
	  dataType: "json",
	  url: 'mc/index2.php',
	  data: { email : email, callback : '?'},
	  success: $('.successBoxTwo').append(email + ' is signed up for the mailing list')
	});
});


$(document).ready(function() {
	console.log(document.cookie)
	// console.log(document.cookie.indexOf('showRecipes'))
	var recipeCookie = document.cookie.indexOf('showRecipes');
	console.log(recipeCookie);
	if (recipeCookie === -1){

	} else {
		$('.recipeContainer').addClass('recipeContainerVisible')
	};
});