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

$(document).ready(function() {
	var recipeCookie = document.cookie.indexOf('showRecipes');
	if (recipeCookie === -1){

	} else {
		$('.recipeContainer').addClass('recipeContainerVisible')
	};
});