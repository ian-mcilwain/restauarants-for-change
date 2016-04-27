<?php

/*
	Template Name: Home page
*/

get_header();  ?>

<div class="main">

    <div class="container">
        <h1><?php  _e('Restaurants for change', 'restaurantForChange')?></h1> <!-- this is hidden -->

        <div class="callToAction">
            <h2><?php  _e('On', 'restaurantForChange')?> <span class="date"><?php  _e('October 21, 2015,', 'restaurantForChange')?></span> <?php  _e('we’re asking you out on a dinner date.', 'restaurantForChange')?></h2>
            <h3><?php  _e( 'One night. 13 cities. 50+ restaurants. One goal:', 'restaurantForChange')?><br><?php  _e('supporting the right to healthy food for all Canadians.', 'restaurantForChange')?></h3>
            <h3 class="octothorpe"><?php  _e( '#restaurantsforchange', 'restaurantForChange')?></h3>
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_pink.svg" alt="">
        </div> <!-- call to action ends here -->

        <div id="scrollToAbout" class="aboutSection">
            <?php // Start the loop ?>
            <div class="aboutContent">
             <?php $aboutContent = new WP_Query(array(
                 'post_type' => 'about',
                 )); ?>

                 <?php if ( $aboutContent->have_posts() ) : ?>

                     <?php while ( $aboutContent->have_posts() ) : $aboutContent->the_post(); ?>

                        <h2><?php the_title() ?></h2>
                        <p> <?php the_content(); ?> </p>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else:  ?>
                <?php endif; ?>
            </div> <!-- about content ends here -->
        </div> <!-- aboutSection ends here -->

        <div class="videoContainer">
            <?php echo do_shortcode("[vimeography id='4']"); ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_pink.svg" alt="">
        </div> <!-- video container ends here -->

        <div class="mapInfo">
            <?php $mapContent = new WP_Query(array(
            'post_type' => 'restaurant',
            )); ?>

            <?php if ( $mapContent->have_posts() ) : ?>

                <?php while ( $mapContent->have_posts() ) : $mapContent->the_post(); ?>
                    <p class="latLong">
                        <?php the_field('location'); ?>
                    </p>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php else:  ?>
            <?php endif; ?>
        </div> <!-- mapInfo ends here. This is a hidden div-->

        <div class="restaurantNameInfo">
            <?php $mapContent = new WP_Query(array(
                'post_type' => 'restaurant'
                )); ?>
                <?php if ( $mapContent->have_posts() ) : ?>

                    <?php while ( $mapContent->have_posts() ) : $mapContent->the_post(); ?>
                        <p class="nameOfRestaurant">
                            <?php the_title(); ?>
                        </p>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else:  ?>
                <?php endif; ?>
        </div> <!-- restaurantNameInfo ends here.  This is a hidden div -->

        <div class="cityPicker clearfix"  id="scrollToRestaurants" >
            <h2 class="reservationsTitle"><?php  _e('Make a reservation', 'restaurantForChange')?></h2>
            <div class="citiesList clearfix">
                <h3><?php  _e('Pick your city', 'restaurantForChange')?></h3>
                <ul class="citiesLeft">
                    <li><a class="calgary cities" href="#"><p>Calgary</p></a></li>
                    <li><a class="edmonton cities" href="#"><p>Edmonton</p></a></li>
                    <li><a class="halifax cities" href="#"><p>Halifax/Dartmouth</p></a></li>
                    <li><a class="hamilton cities" href="#"><p>Hamilton</p></a></li>
                    <li><a class="cities kingston" href="#"><p>Kingston</p></a></li>
                    <li><a class="montreal cities" href="#"><p>Montreal</p></a></li>
                    <li><a class="ottawa cities" href="#"><p>Ottawa/Perth</p></a></li>
                </ul>
                <ul class="citiesRight">
                    <li><a class="cities stJohns" href="#"><p>St. John's</p></a></li>
                    <li><a class="cities saskatoon" href="#"><p>Saskatoon</p></a></li>
                    <li><a class="cities stratford" href="#"><p>Stratford</p></a></li>
                    <li><a class="cities toronto" href="#"><p>Toronto</p></a></li>
                    <li><a class="cities vancouver" href="#"><p>Vancouver</p></a></li>
                    <li><a class="cities winnipeg" href="#"><p>Winnipeg</p></a></li>
                </ul>
            </div> <!-- citiesList ends here -->
            <div class="calgaryRestaurantsList restaurantsList">
                <h2><?php  _e('Calgary Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $calgaryQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'calgary',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $calgaryQuery->have_posts() ) : ?>
                    <?php while ($calgaryQuery->have_posts()) : $calgaryQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"> <?php the_field('phone_number') ?></h6>
                                    <h5><?php the_field('location') ?></h5>
                                    <h4><?php the_field('website') ?></h4>
                                    </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- calgaryRestaurantList -->
            <div class="edmontonRestaurantsList restaurantsList">
                <h2><?php  _e('Edmonton Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $edmontonQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'edmonton',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $edmontonQuery->have_posts() ) : ?>
                    <?php while ($edmontonQuery->have_posts()) : $edmontonQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- edmontonRestaurantList -->
            <div class="halifaxRestaurantsList restaurantsList">
                <h2><?php  _e('Halifax Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $halifaxQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'halifax',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $halifaxQuery->have_posts() ) : ?>
                    <?php while ($halifaxQuery->have_posts()) : $halifaxQuery->the_post(); ?>
                        <ul>
                            <li>
                            <a class="individualRestaurantName" href="#">
                                <h3><?php the_title(); ?></h3>
                                <h6><?php the_field('address') ?></h6>
                                <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                <h4><?php the_field('website') ?></h4>
                                <h5><?php the_field('location') ?></h5>
                            </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- halifaxRestaurantList -->
            <div class="hamiltonRestaurantsList restaurantsList">
                <h2><?php  _e('Hamilton Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $hamiltonQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'hamilton',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $hamiltonQuery->have_posts() ) : ?>
                    <?php while ($hamiltonQuery->have_posts()) : $hamiltonQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- hamiltonRestaurantList -->
            <div class="montrealRestaurantsList restaurantsList">
                <h2><?php  _e('Montreal Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $montrealQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'montreal',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $montrealQuery->have_posts() ) : ?>
                    <?php while ($montrealQuery->have_posts()) : $montrealQuery->the_post(); ?>
                        <ul>
                            <li>
                            <a class="individualRestaurantName" href="#">
                                <h3><?php the_title(); ?></h3>
                                <h6><?php the_field('address') ?></h6>
                                <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                <h4><?php the_field('website') ?></h4>
                                <h5><?php the_field('location') ?></h5>
                            </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- montrealRestaurantList -->
            <div class="ottawaRestaurantsList restaurantsList">
                <h2><?php  _e('Ottawa Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'Ottawa',
                                    ),
                                ),
                            ) 
                            );  ?>
                <?php if ( $ottawaQuery->have_posts() ) : ?>
                <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                    <ul>
                        <li>
                            <a class="individualRestaurantName" href="#">
                                <h3><?php the_title(); ?></h3>
                                <h6><?php the_field('address') ?></h6>
                                <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                <h4><?php the_field('website') ?></h4>
                                <h5><?php the_field('location') ?></h5>
                            </a>
                        </li>
                    </ul>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else:  ?>
                <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- ottawaRestaurantList -->
            <div class="stJohnsRestaurantsList restaurantsList">
                <h2><?php  _e("St. John's Restaurants", 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'st-johns',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                          </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- stJohnsRestaurantList -->
            <div class="saskatoonRestaurantsList restaurantsList">
                <h2><?php  _e('Saskatoon Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'saskatoon',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                         </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- saskatoonRestaurantList -->
            <div class="stratfordRestaurantsList restaurantsList">
                <h2><?php  _e('Stratford Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'stratford',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                    </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- stratfordRestaurantList -->
            <div id="torontoList" class="torontoRestaurantsList restaurantsList">
                <h2><?php  _e('Toronto Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'toronto',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- torontoRestaurantList -->
            <div class="vancouverRestaurantsList restaurantsList">
                <h2><?php  _e('Vancouver Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'vancouver',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- vancouverRestaurantList -->
            <div class="winnipegRestaurantsList restaurantsList">
                <h2><?php  _e(' Winnipeg Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'winnipeg',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- winnipegRestaurantList -->
            <div class="kingstonRestaurantsList restaurantsList">
                <h2><?php  _e('Kingston Restaurants', 'restaurantForChange')?></h2>
                <div class="restaurantListContainer">
                    <?php
                    $projectTerms = wp_get_post_terms( $post->ID, 'city' ); 
                    $ottawaQuery = new WP_Query( 
                        array( 
                            'post_type' => 'restaurant', 
                            'project_type' => $projectTerms, 
                            'post__not_in' => array( $post->ID ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => 'kingston',
                                    ),
                                ),
                            ) 
                            );  ?>
                    <?php if ( $ottawaQuery->have_posts() ) : ?>
                    <?php while ($ottawaQuery->have_posts()) : $ottawaQuery->the_post(); ?>
                        <ul>
                            <li>
                                <a class="individualRestaurantName" href="#">
                                    <h3><?php the_title(); ?></h3>
                                    <h6><?php the_field('address') ?></h6>
                                    <h6 class="phoneNumber"><?php the_field('phone_number') ?></h6>
                                    <h4><?php the_field('website') ?></h4>
                                    <h5><?php the_field('location') ?></h5>
                                </a>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else:  ?>
                    <?php endif; ?>
                </div>
                <a class="exploreAnotherCity" href="#"><?php  _e('Explore another City', 'restaurantForChange')?></a>
            </div> <!-- kingstonRestaurantList -->


            <div class="singleRestaurantData">
                <div class="singleRestaurantDataInner">
                </div>
                <a class ="slideBack" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow_white(L).svg" alt=""></a>
            </div>

            <div class="reservationsMap">
                <div id="map">
                </div>
            </div>
        </div> <!-- city Picker ends here -->

        <div class="inviteYourFriends">
            <div class="inviteInner">
                <p><?php  _e('Dining out is more fun with friends. ', 'restaurantForChange')?><span class="invitePartTwo"><?php  _e('Share the event with your friends and invite them to join you!', 'restaurantForChange')?></span></p>

                <div class="shareButtons">
                    <div class="fb-share-button" data-href="http://www.restaurantsforchange.ca/" data-layout="button_count"></div>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.restaurantsforchange.ca/">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
            </div>
        </div>


        <div id="scrollToSocial" class="getSocial">

            <div class="emailSignup">
                <div class="emailSignupInner">
                    <h2><?php  _e('Want a sneak peak at what you could be tasting on October 21? Sign up for updates and we’ll reveal delicious recipes from Restaurants for Change chefs!', 'restaurantForChange')?></h2>
                    <form action="" class="mailChimpFormOne">
                        <div class="emailSignupInput">
                            <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                                <label for="emailOne"><i class="fa fa-envelope-o"></i></label>
                                <input type="email" name='emailOne' class="emailOne" placeholder="name@email.com (required)" required>
                                <input type="text" name='firstNameBox1' class="firstNameBox1" placeholder='first name'>
                                <input type="text" name='lastNameBox1' class="lastNameBox1" placeholder='last name'>
                                <input type="text" name='cityBox1' class="cityBox1" placeholder='city'>
                                <input type="text" name='provinceBox1' class='provinceBox1' placeholder='province'>
                            <?php else: ?>
                                <label for="emailOne"><i class="fa fa-envelope-o"></i></label>
                                <input type="email" name='emailOne' class="emailOne" placeholder="nom@email.com (obligitoire)" required>
                                <input type="text" name='firstNameBox1' class="firstNameBox1" placeholder='Prénom'>
                                <input type="text" name='lastNameBox1' class="lastNameBox1" placeholder='Nom'>
                                <input type="text" name='cityBox1' class="cityBox1" placeholder='Ville'>
                                <input type="text" name='provinceBox1' class='provinceBox1' placeholder='Province'>
                            <?php endif ?>
                        </div>

                        <div class="successBoxContainer">
                        <p class="successBoxOne"></p>
                        </div> <!-- emailSignupInput ends here -->

                        <input type="submit" value="<?php  _e('SHOW ME THE RECIPES', 'restaurantForChange')?>" class="subscribe">
                    </form>
                </div> <!-- emailSignupInner ends here -->
            </div> <!-- email signup ends here -->


            <div class="recipeContainer clearfix">
                <h3><?php  _e('Click on chef to reveal recipe', 'restaurantForChange')?></h3>
                <div class="recipeInner">
                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/soft-polenta-with-stewed-mushrooms-and-parsley-salad/">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/soft-polenta-with-stewed-mushrooms-and-parsley-salad/">
                    <?php endif ?>

                    
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/ben-kramer-headshot.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/polenta.jpg" alt=""></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Ben Kramer</h3>
                                <h3>Elements Restaurant</h3>
                                <h3 class="recipeName"><?php  _e('Soft polenta with Stewed Mushrooms and Parsley Salad', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href="<?php echo get_site_url(); ?>/soft-polenta-with-stewed-mushrooms-and-parsley-salad/" data-layout="button_count"></div>

                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/soft-polenta-with-stewed-mushrooms-and-parsley-salad/">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>
                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/harissa-spiced-lamb-chops-with-eggplant-caponata" target="">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/cotelettes-dagneau-a-la-harissa-sur-caponata-daubergine/?lang=fr" target="">
                    <?php endif ?>
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/LoraKirkHeadshot.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/LoraKirkRecipePhoto.jpg" alt=""></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Lora Kirk</h3>
                                <h3>Ruby Watchco</h3>
                                <h3 class="recipeName"><?php  _e('Harissa Spiced Lamb Chops with Eggplant Caponata', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href="<?php echo get_site_url(); ?>/harissa-spiced-lamb-chops-with-eggplant-caponata" data-layout="button_count"></div>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/harissa-spiced-lamb-chops-with-eggplant-caponata">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>

                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/lobster-salad">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/lobster-salad/?lang=fr">
                    <?php endif ?>
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/ToddPerrin.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/ToddPerrinRecipePhoto.jpg" alt=""></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Todd Perrin</h3>
                                <h3>Mallard Cottage</h3>
                                <h3 class="recipeName"><?php  _e('Lobster Salad', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href="<?php echo get_site_url(); ?>/lobster-salad" data-layout="button_count"></div>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/lobster-salad">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>

                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/leek-and-potato-soup/">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/leek-and-potato-soup/?lang=fr">
                    <?php endif ?>
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/JamieHarlingHeadshot.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/leeks.jpg" alt=""></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Jamie Harling</h3>
                                <h3>Rouge Restaurant</h3>
                                <h3 class="recipeName"><?php  _e('Leek and Potato Soup', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href="<?php echo get_site_url(); ?>/leek-and-potato-soup/" data-layout="button_count"></div>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/leek-and-potato-soup/">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>

                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/beet-relish">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/beet-relish/?lang=fr">
                    <?php endif ?>
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/richmondStation.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/beets.jpg" alt=""></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Carl Heinrich and Ryan Donovan</h3>
                                <h3>Richmond Station</h3>
                                <h3 class="recipeName"><?php  _e('Beet Relish', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href="<?php echo get_site_url(); ?>/beet-relish" data-layout="button_count"></div>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/beet-relish">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>
                    
                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <a href="<?php echo get_site_url(); ?>/preserved-lake-fish-salad">
                    <?php else: ?>
                    <a href="<?php echo get_site_url(); ?>/preserved-lake-fish-salad/?lang=fr">
                    <?php endif ?>
                        <div class="recipe">
                            <div class="recipeImage">
                                <figure class="front" ><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/BlairLesbackHeadshot.jpg" alt=""></figure>
                                <figure class="back"><img src="<?php echo get_template_directory_uri(); ?>/img/chefImages/fish.jpg"></figure>
                            </div>
                            <div class="recipeInfo">
                                <h3 class="chefName" >Blair Lebsack</h3>
                                <h3>RGE RD</h3>
                                <h3 class="recipeName"><?php  _e('Preserved Lake Fish Salad', 'restaurantForChange')?></h3>
                                <div class="fb-share-button" data-href='<?php echo get_site_url(); ?>/preserved-lake-fish-salad" alt="">' data-layout="button_count"></div>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_site_url(); ?>/preserved-lake-fish-salad" alt="">">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                            </div>
                        </div> <!-- recipe ends here -->
                    </a>
                </div> <!-- recipeInner ends here -->
            </div> <!-- recipeContainer ends here -->
        </div> <!-- get social ends here -->

        <div id="scrollToBenefits" class="whoBenefits">
            <div class="benefitsText">
                 <?php // Start the loop ?>
                 <?php $benefitsContent = new WP_Query(array(
                   'post_type' => 'whobenefits',
                   )); ?>
                   <?php if ( $benefitsContent->have_posts() ) : ?>
                    <?php while ( $benefitsContent->have_posts() ) : $benefitsContent->the_post(); ?>
                        <h2><?php the_title() ?></h2>
                        <p> <?php the_content(); ?> </p>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else:  ?>
                <?php endif; ?>
            </div>
            <div class="aboutLogos">
                <?php  dynamic_sidebar( 'who-benefits-logo-widget-area' ); ?>
            </div>
        </div> <!-- whoBenefits ends here -->

        <div id="scrollToNews" class="latestNews">
            <h2><?php  _e('Latest News', 'restaurantsforchange')?></h2> 
            <?php $latestPosts = new WP_Query(array(
            'post_type' => 'newsitem', // we only want blog posts
            )); ?>
            <div class="newsItems">
                <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
                    <div class="newsItem">
                        <?php

                        $thumb_id = get_post_thumbnail_id();

                        $thumb_url = wp_get_attachment_image_src($thumb_id,'newsImage', true);


                        ?>
                        <a href="<?php echo get_permalink(); ?> "><img src="<?php  echo $thumb_url[0];?> " alt=""></a>
                        <h3> <?php the_title(); ?></h3>  
                    </div> <!-- newsItem ends here -->
                <?php endwhile; //end custom loop ?> 
            </div> <!-- newsItems ends here -->
        </div> <!-- latest news ends here -->

        <div id="scrollToSponsors" class="sponsors">
            <h2><?php  _e('Thanks To our Sponsors', 'restaurantsforchange')?></h2>
            <div class="sponsorLogos clearfix">

                <div class="nationalSponsors clearfix">
                    <h3><?php  _e('National Sponsors', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'national-sponsor-logo-widget-area' ); ?>
                </div>
                <div class="mediaSponsors">
                <div class="nationalMediaSponsors clearfix">
                    <h3><?php  _e('National Media Sponsors', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'national-media-sponsor-logo-widget-area' ); ?>
                </div>

                <div class="regionalMediaSponsors clearfix">
                    <h3><?php  _e('Regional Media Sponsors', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'regional-media-sponsor-logo-widget-area' ); ?>
                </div>
                </div>

                <div class="eventSponsors clearfix">
                    <h3><?php  _e('Event Sponsors', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'event-sponsor-logo-widget-area' ); ?>
                </div>

                <div class="communitySponsors clearfix">
                    <h3><?php  _e('Community-Partners', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'community-sponsor-logo-widget-area' ); ?>
                </div>

                <div class="otherSponsors clearfix">
                    <h3><?php  _e('In-Kind Sponsors', 'restaurantsforchange')?></h3>
                    <?php  dynamic_sidebar( 'other-sponsor-logo-widget-area' ); ?>
                </div>

                <div class="restaurantSponsors clearfix">
                    <?php if (ICL_LANGUAGE_CODE == "en"): ?>
                    <h3>Restaurants</h3>
                    <?php else: ?>
                    <h3>Restos</h3>
                    <?php endif ?>
                                        <?php  dynamic_sidebar( 'restaurant-sponsor-logo-widget-area' ); ?>
                </div>
            </div> <!-- sponsor logos ends here -->
        </div> <!-- sponsor area ends here -->

    </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>