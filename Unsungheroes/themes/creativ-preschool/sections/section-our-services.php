<?php 
/**
 * Template part for displaying our_servicess Section
 *
 *@package Creativ Preschool
 */

    $our_services_section_title    = creativ_preschool_get_option( 'our_services_section_title' );
    $services_content_type         = creativ_preschool_get_option( 'services_content_type' );
    $number_of_items               = creativ_preschool_get_option( 'number_of_items' );

    if( $services_content_type == 'services_page' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_pages[] = creativ_preschool_get_option( 'our_services_page_'.$i );
        endfor;  
    elseif( $services_content_type == 'services_post' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_posts[] = creativ_preschool_get_option( 'our_services_post_'.$i );
        endfor;
    endif;
    ?>


    <?php if( !empty($our_services_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($our_services_section_title);?></h2>
			    <div class="anchor"><a href="#add" class="fa fa-arrow-down fa-2x"></a></div>
        </div><!-- .section-header -->
    <?php endif;?>
    
    <?php if( $services_content_type == 'services_page' ) : ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $our_services_pages ),
                'post__in'      => $our_services_pages,
                'orderby'       =>'post__in',
            );  

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = creativ_preschool_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>"><i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i></a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
				

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_preschool_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->

    <?php else: ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $our_services_posts ),
                'post__in'      => $our_services_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );   
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = creativ_preschool_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>"><i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i></a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                 
						
						<div class="anchor"><a href="#add"></a></div>

                        <div class="entry-content">
                            <?php
                                $excerpt = creativ_preschool_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
	<a name="add"></a>
        </div><!-- .section-content -->
    <?php endif;

			