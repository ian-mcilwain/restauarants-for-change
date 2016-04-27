<?php get_header(); ?>

<div class="singleMain">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>


          <div class="entry-content">
            <?php 

            $image = get_field('news_item_photos');

            if( !empty($image) ): ?>

              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
            <h2><?php the_title(); ?></h2>
            <h3><?php the_field('author') ?></h3>
            <h3><?php the_field('date') ?></h3>
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

        </div><!-- #post-## -->


      <?php endwhile; // end of the loop. ?>
</div> <!-- /.main -->

</div> <!-- end of wrapper -->
<div class="backBox">
<a class ="recipeBack" href="<?php echo get_site_url(); ?>/#scrollToNews"><img src="<?php echo get_template_directory_uri(); ?>/img/TRI-pink.png" alt=""><p>BACK</p></a>
</div>