<?php 
/**
 * Template part for displaying About Section
 *
 *@package Creativ Preschool
 */
    $our_courses_section_title    = creativ_preschool_get_option( 'our_courses_section_title' );
    $cs_content_type              = creativ_preschool_get_option( 'cs_content_type' );
    $number_of_cs_items           = creativ_preschool_get_option( 'number_of_cs_items' );


    

    if( $cs_content_type == 'cs_page' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $our_courses_posts[] = creativ_preschool_get_option( 'our_courses_page_'.$i );
        endfor;  
    elseif( $cs_content_type == 'cs_post' ) :
        for( $i=1; $i<=$number_of_cs_items; $i++ ) :
            $our_courses_posts[] = creativ_preschool_get_option( 'our_courses_post_'.$i );
        endfor;
    endif;
    ?>

    <?php if( !empty($our_courses_section_title) ):?>
        <div class="section-header">
            <div class="wrapper">
                <h2 class="section-title"><?php echo esc_html($our_courses_section_title);?></h2>
            </div><!-- .wrapper -->
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $cs_content_type == 'cs_page' ) : ?>
        <div class="section-content page-section clear">
            <div class="wrapper courses-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1200, "dots": true, "arrows":false, "autoplay": false, "fade": false }'>
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $our_courses_posts ),
                    'post__in'      => $our_courses_posts,
                    'orderby'       =>'post__in',
                );        
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    
                    <article>
                        <div class="featured-course-wrapper">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="featured-image">
                                    <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url(); ?>"/></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = creativ_preschool_the_excerpt( 25 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .featured-course-wrapper -->
                    </article>

                  <?php endwhile;?>
                  <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div><!-- .wrapper -->
        </div><!-- .section-content -->
    
    <?php else: 

          $agent = $_SERVER['HTTP_USER_AGENT'];
          
          if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS"))
   {
    showCTA_Mobile();
   }
   else{
            showCTA();
            
            }
        ?>

       

    <?php endif;

    




function showCTA(){
    $name = array("Let's Garden","Let's Cook","Let's Exercise","Let's Art");
    $background_image_array = array("https://unsungheroes.tk/wp-content/uploads/2021/04/gardening-2.jpg",
    "https://unsungheroes.tk/wp-content/uploads/2021/04/recipe-1.jpg",
     "https://unsungheroes.tk/wp-content/uploads/2021/04/sport.jpg",
     "https://unsungheroes.tk/wp-content/uploads/2021/05/Drawing.png");
    $background_url_array =  array("https://unsungheroes.tk/lets-garden/","https://unsungheroes.tk/dessert/","https://unsungheroes.tk/sport/","https://unsungheroes.tk/arts/");

    
    echo '<section class="elementor-section elementor-top-section elementor-element elementor-element-ca54fab elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ca54fab" data-element_type="section" style="background-color:#0fbaf4;">
    <div class="elementor-container elementor-column-gap-default">';

    for ($i = 0; $i <= 3; $i++) {  

  
      
        echo '   <!-- CTA'.$i.' -->
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ea3cbf5" data-id="ea3cbf5" data-element_type="column" style="margin: 200px 0px 50px 0px;">
        <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-1f7b22a elementor-cta--skin-classic elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action" data-id="1f7b22a" data-element_type="widget" data-widget_type="call-to-action.default">
        <div class="elementor-widget-container">
        <a href="'.$background_url_array[$i].'" class="elementor-cta" style="width:265px;height:408px;">
        <div class="elementor-cta__bg-wrapper">
        <div class="elementor-cta__bg elementor-bg" style="background-image: url('.$background_image_array[$i].');"></div>
        <div class="elementor-cta__bg-overlay"></div>
        </div>
                <div class="elementor-cta__content">
        
                        <h4 class="elementor-cta__title elementor-cta__content-item elementor-content-item">
            '.$name[$i].'					</h4>
        
        
                        <div class="elementor-cta__button-wrapper elementor-cta__content-item elementor-content-item ">
        <span class="homepage_cta_btn">
            Find More					</span>
        </div>
                </div>
            </a>
        </div>
        </div>
        </div>
        </div>';

    }
        


echo '</div></section>';
}

function showCTA_Mobile(){
    $name = array("Let's Garden","Let's Cooking","Let's Exercise","Let's Art");
    $background_image_array = array("https://unsungheroes.tk/wp-content/uploads/2021/04/gardening-2.jpg",
    "https://unsungheroes.tk/wp-content/uploads/2021/04/recipe-1.jpg",
     "https://unsungheroes.tk/wp-content/uploads/2021/04/sport.jpg",
     "https://unsungheroes.tk/wp-content/uploads/2021/04/muesum.png");
    $background_url_array =  array("https://unsungheroes.tk/lets-garden/","https://unsungheroes.tk/dessert/","https://unsungheroes.tk/sport/","https://unsungheroes.tk/arts/");


    echo '<div class="wrapper courses-slider" data-slick="{"slidesToShow": 4, "slidesToScroll": 1,"infinite": false, "speed": 1200, "dots": false, "arrows":false, "autoplay": false, "fade": false }" >';
    for ($i = 0; $i <= 3; $i++) {  		
          
            echo ' <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ea3cbf5" data-id="ea3cbf5" data-element_type="column" style="margin: 100px 0px 50px 0px;">
            <div class="elementor-widget-wrap elementor-element-populated">
      
                        <div class="elementor-element elementor-element-1f7b22a elementor-cta--skin-classic elementor-animated-content elementor-bg-transform elementor-bg-transform-zoom-in elementor-widget elementor-widget-call-to-action" data-id="1f7b22a" data-element_type="widget" data-widget_type="call-to-action.default">
            <div class="elementor-widget-container">    
            <a href="'.$background_url_array[$i].'" class="elementor-cta" style="width:265px;height:408px;margin-left: 20px;">
            <div class="elementor-cta__bg-wrapper">
            <div class="elementor-cta__bg elementor-bg" style="background-image: url('.$background_image_array[$i].');">
            </div>
            <div class="elementor-cta__bg-overlay"></div>
            </div>
                    <div class="elementor-cta__content">
            
                            <h4 class="elementor-cta__title elementor-cta__content-item elementor-content-item">
                '.$name[$i].'					</h4>
            
            
                            <div class="elementor-cta__button-wrapper elementor-cta__content-item elementor-content-item ">
            <span class="homepage_cta_btn">
                Find More					</span>
            </div>
                    </div>
                </a>
            </div>
            </div>
            </div>
            </div>';


   
   }
   echo '</div><!-- .wrapper -->';
}

