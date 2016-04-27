<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <script src="http://use.typekit.net/row8yvr.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>

  <link rel="icon" type="image/svg" href="<?php echo get_template_directory_uri(); ?>/img/pink-aqua3.png">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/flexslider.css">
  <?php wp_head(); ?>
  <script type="text/javascript" charset="utf-8">
    $(window).load(function() {
      $('.flexslider').flexslider();
    });
  </script>
</head>


<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php if( ! is_front_page()) : ?>
  <div class="navSingle">
<?php else: ?>
  <div class="navHome">
<?php endif; ?>

<nav class="clearfix" id="navBar">
  <div class="navWrapper">
 
  <div class="navLogo">
  <?php if (ICL_LANGUAGE_CODE == "en"): ?>

  <a href="<?php echo get_site_url(); ?>">
  <img src="<?php echo get_template_directory_uri(); ?>/img/RFC_underline_logo_english-01.png" alt=""></a>
  <?php else: ?>
  <a href="<?php echo get_site_url(); ?>?lang=fr">
  <img src="<?php echo get_template_directory_uri(); ?>/img/RFC_underline_logo_french(white)-01.png" alt=""></a>
  <?php endif ?>

  </div>

  <div class="hamburger">
  <a id="hamburger" href="#"><p>&#9776</p></a>
  
  </div>
  <?php if (ICL_LANGUAGE_CODE == "en"): ?>
  <ul id="navUl">
  <?php else: ?>
  <ul id="navUl" class="frenchNavUl">
  <?php endif ?>

    <li id="homeLink">
     <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a href="<?php echo get_site_url(); ?>">
    <?php else: ?>
      <a href="<?php echo get_site_url(); ?>?lang=fr">
    <?php endif ?>
    <?php  _e('Home', 'restaurantsforchange')?>
    </a>
    </li>

    <li>
     <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToAbout">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToAbout">
    <?php endif ?>
    <?php  _e('About', 'restaurantsforchange')?>
    </a>
    </li>

    <li>
    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToRestaurants">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToRestaurants">
    <?php endif ?>

    <?php  _e('restaurants', 'restaurantsforchange')?>
    </a>
    </li>

    <li>
    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToSocial">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToSocial">
    <?php endif ?>

    <?php  _e("What's Cooking?", 'restaurantsforchange')?>
    </a>
    </li>

    <li>
    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToBenefits">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToBenefits">
    <?php endif ?>

    <?php  _e('Who Benefits', 'restaurantsforchange')?>
    </a>
    </li>

    <li>
     <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToNews">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToNews">
    <?php endif ?>


    <?php  _e('News', 'restaurantsforchange')?>

    </a>
    </li>

    <li>
     <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToSponsors">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToSponsors">
    <?php endif ?>
    
    <?php  _e('Sponsors', 'restaurantsforchange')?>
    </a>
    </li>

    <li>

    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>/#scrollToContact">
    <?php else: ?>
      <a class="navBarLinks" href="<?php echo get_site_url(); ?>?lang=fr/#scrollToContact">
    <?php endif ?>

    <?php  _e('Contact', 'restaurantsforchange')?>

    </a>
    </li>

    <li>
    <a class="navBarLinks" href="https://instagram.com/aplaceforfood/" target="_blank"><i class="fa fa-instagram"></i></a>
    <a class="navBarLinks" href="https://twitter.com/aplaceforfood?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
    <a class="navBarLinks" href="https://www.facebook.com/RestaurantsforChange" target="_blank"><i class="fa fa-facebook"></i></a>
    </li>
          <?php $langs = icl_get_languages('skip_missing=0&orderby=id&order=asc'); ?>
          <?php foreach ($langs as $lang) : ?>
            
            <li class="<?php echo (ICL_LANGUAGE_CODE == $lang['language_code']  ? 'current' : ''); ?> languageSelector">
              <a class="navBarLinks" href="<?php echo $lang['url']; ?>">
                <?php echo $lang['language_code']; ?>
              </a>
            </li>
          <?php endforeach; ?>
  </ul>
  </div>
</nav>

<?php if( ! is_front_page()) : ?>
  </div>
<?php else: ?>
  </div>
<?php endif; ?>


<?php if(is_front_page()) : ?>
<header id="topOfPage">
  <?php if (ICL_LANGUAGE_CODE == "en"): ?>
  <div class="container englishContainer">

  <img src="<?php echo get_template_directory_uri(); ?>/img/website_logo.svg" alt="">

  </div> <!-- /.container -->
<?php else: ?>
  <div class="container frenchContainer">
  <img src="<?php echo get_template_directory_uri(); ?>/img/website_logo(french).svg" alt="">
  </div> <!-- /.container -->
<?php endif ?>

</header><!--/.header-->
<?php endif; ?>
<div class="wrapper"> <!-- Wrapper starts here -->