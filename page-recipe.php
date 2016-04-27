<?php

/*
	Template Name: recipe
*/

get_header();  ?>

<div class="recipeMain">
  <div class="container">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <h2><?php the_title(); ?></h2>
      <p class="recipeBy"><?php the_field('recipe-by') ?></p>
      <p class="recipeDate"><?php the_field('recipe-date') ?></p>
      <?php the_post_thumbnail('medium') ?>
      <?php the_content(); ?>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

</div><!--  wrapper ends here -->
<div class="backBox">
<a class ="recipeBack" href="<?php echo get_site_url(); ?>/#scrollToSocial"><img src="<?php echo get_template_directory_uri(); ?>/img/TRI-pink.png" alt=""><p>BACK</p></a>
</div>