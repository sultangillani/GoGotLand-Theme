<?php
    /**
    * Template Name: Blog Page
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header();
    
    $gb_card_header_left_image = get_post_meta( get_the_ID(), 'gb_header_left_image_hidden', true);
        
    if( !$gb_card_header_left_image || $gb_card_header_left_image == ''){
        $gb_card_header_left_image = get_stylesheet_directory_uri() . '/images/words.png';
    }
    
    $gb_header_right_text_id = get_post_meta( get_the_ID(), 'gb_header_right_text_id',true );
    if( !$gb_header_right_text_id || $gb_header_right_text_id == ''){
      $gb_header_right_text_id = '';
    }
    
    $gb_card_header_bg_image = get_post_meta( get_the_ID(), 'gb_card_header_bg_image', true);
        
    if( !$gb_card_header_bg_image || $gb_card_header_bg_image == ''){
        $gb_card_header_bg_image = get_stylesheet_directory_uri() . '/images/header_help.png';
    }
    
    $gb_card_section_one_logo = get_post_meta( get_the_ID(), 'gb_section_one_logo', true);
        
    if( !$gb_card_section_one_logo || $gb_card_section_one_logo == ''){
        $gb_card_section_one_logo = get_stylesheet_directory_uri() . '/logos/AVECK_ARR_logo.png';
    }
    
    $gb_bg_text_one  = get_post_meta( get_the_ID(), 'gb_bg_text_one',true );
    $gb_bg_text_two  = get_post_meta( get_the_ID(), 'gb_bg_text_two',true );
    $gb_bg_text_three  = get_post_meta( get_the_ID(), 'gb_bg_text_three',true );
    $gb_bg_text_four  = get_post_meta( get_the_ID(), 'gb_bg_text_four',true );
    $gb_bg_text_five  = get_post_meta( get_the_ID(), 'gb_bg_text_five',true );
    $gb_bg_text_six  = get_post_meta( get_the_ID(), 'gb_bg_text_six',true );
    $gb_bg_text_seven  = get_post_meta( get_the_ID(), 'gb_bg_text_seven',true );
       
    $gb_section_one_heading = get_post_meta( get_the_ID(), 'gb_section_one_heading', true);
        
    if( !$gb_section_one_heading || $gb_section_one_heading == ''){
        $gb_section_one_heading = 'Här kan du boka';
    }
    
    $gb_section_one_text = get_post_meta( get_the_ID(), 'gb_section_one_text', true);
        
    if( !$gb_section_one_text || $gb_section_one_text == ''){
        $gb_section_one_text = 'Välj ett område du vill ha vår hjälp med eller boka ett <a href="#">möte</a> med<br /> någon av våra proffsiga projektledare för Almedalsveckan. ';
    }
    
    
    $def_item_img = get_stylesheet_directory_uri() . '/logos/square_dum.png';
    
    $gb_section_one_item_image_one = get_post_meta( get_the_ID(), 'gb_section_one_item_image_one', true);
    if( !$gb_section_one_item_image_one || $gb_section_one_item_image_one == ''){
        $gb_section_one_item_image_one = $def_item_img;
    }
    
    $gb_section_one_item_text_one = get_post_meta( get_the_ID(), 'gb_section_one_item_text_one', true);
    if( !$gb_section_one_item_text_one || $gb_section_one_item_text_one == ''){
        $gb_section_one_item_text_one = 'Lokal';
    }
    
    $gb_section_one_item_link_one = get_post_meta( get_the_ID(), 'gb_section_one_item_link_one', true);
    if( !$gb_section_one_item_link_one || $gb_section_one_item_link_one == ''){
        $gb_section_one_item_link_one = '#';
    }
    
    
    $gb_section_one_item_image_two = get_post_meta( get_the_ID(), 'gb_section_one_item_image_two', true);
    if( !$gb_section_one_item_image_two || $gb_section_one_item_image_two == ''){
        $gb_section_one_item_image_two = $def_item_img;
    }
    
    $gb_section_one_item_text_two = get_post_meta( get_the_ID(), 'gb_section_one_item_text_two', true);
    if( !$gb_section_one_item_text_two || $gb_section_one_item_text_two == ''){
        $gb_section_one_item_text_two = 'Utomhusyta';
    }
    
    $gb_section_one_item_link_two = get_post_meta( get_the_ID(), 'gb_section_one_item_link_two', true);
    if( !$gb_section_one_item_link_two || $gb_section_one_item_link_two == ''){
        $gb_section_one_item_link_two = '#';
    }
    
    
    $gb_section_one_item_image_three = get_post_meta( get_the_ID(), 'gb_section_one_item_image_three', true);
    if( !$gb_section_one_item_image_three || $gb_section_one_item_image_three == ''){
        $gb_section_one_item_image_three = $def_item_img;
    }
    
    $gb_section_one_item_text_three = get_post_meta( get_the_ID(), 'gb_section_one_item_text_three', true);
    if( !$gb_section_one_item_text_three || $gb_section_one_item_text_three == ''){
        $gb_section_one_item_text_three = 'Tält';
    }
    
    $gb_section_one_item_link_three = get_post_meta( get_the_ID(), 'gb_section_one_item_link_three', true);
    if( !$gb_section_one_item_link_three || $gb_section_one_item_link_three == ''){
        $gb_section_one_item_link_three = '#';
    }
    
    $gb_section_one_item_image_four = get_post_meta( get_the_ID(), 'gb_section_one_item_image_four', true);
    if( !$gb_section_one_item_image_four || $gb_section_one_item_image_four == ''){
        $gb_section_one_item_image_four = $def_item_img;
    }
    
    $gb_section_one_item_text_four = get_post_meta( get_the_ID(), 'gb_section_one_item_text_four', true);
    if( !$gb_section_one_item_text_four || $gb_section_one_item_text_four == ''){
        $gb_section_one_item_text_four = 'Teknik';
    }
    
    $gb_section_one_item_link_four = get_post_meta( get_the_ID(), 'gb_section_one_item_link_four', true);
    if( !$gb_section_one_item_link_four || $gb_section_one_item_link_four == ''){
        $gb_section_one_item_link_four = '#';
    }
    
    $gb_section_one_item_image_five = get_post_meta( get_the_ID(), 'gb_section_one_item_image_five', true);
    if( !$gb_section_one_item_image_five || $gb_section_one_item_image_five == ''){
        $gb_section_one_item_image_five = $def_item_img;
    }
    
    $gb_section_one_item_text_five = get_post_meta( get_the_ID(), 'gb_section_one_item_text_five', true);
    if( !$gb_section_one_item_text_five || $gb_section_one_item_text_five == ''){
        $gb_section_one_item_text_five = 'Talare';
    }
    
    $gb_section_one_item_link_five = get_post_meta( get_the_ID(), 'gb_section_one_item_link_five', true);
    if( !$gb_section_one_item_link_five || $gb_section_one_item_link_five == ''){
        $gb_section_one_item_link_five = '#';
    }
    
    $gb_section_one_item_image_six = get_post_meta( get_the_ID(), 'gb_section_one_item_image_six', true);
    if( !$gb_section_one_item_image_six || $gb_section_one_item_image_six == ''){
        $gb_section_one_item_image_six = $def_item_img;
    }
    
    $gb_section_one_item_text_six = get_post_meta( get_the_ID(), 'gb_section_one_item_text_six', true);
    if( !$gb_section_one_item_text_six || $gb_section_one_item_text_six == ''){
        $gb_section_one_item_text_six = 'Catering';
    }
    
    $gb_section_one_item_link_six = get_post_meta( get_the_ID(), 'gb_section_one_item_link_six', true);
    if( !$gb_section_one_item_link_six || $gb_section_one_item_link_six == ''){
        $gb_section_one_item_link_six = '#';
    }
    
    
    //Section 2
    $def_img = get_stylesheet_directory_uri() . '/images/jag.png';
    $section_two_image = gb_show_new_field( get_the_ID(), 'section_two_image', $def_img, '');
    
    $def_heading = 'Jag har jobbat med almedalen <br class="d-none d-lg-block">året runt, i mer än tio år.';
    $section_two_heading = gb_show_new_field( get_the_ID(), 'section_two_heading', $def_heading, '');
    
    $def_text = '<p>Med vår erfarenhet skapar vi trygghet, kreativitet och kvalitet för dig <br class="d-none d-lg-block">som kund. Vi är resurstarka och en lokal aktör som gör skillnad.</p>';
    $section_two_editor = gb_show_new_field( get_the_ID(), 'section_two_editor', $def_text, 'editor');
    
    //Section 3 
    $def_img = get_stylesheet_directory_uri() . '/images/jag.png';
    $section_three_image = gb_show_new_field( get_the_ID(), 'section_three_image', $def_img, '');
    
    $def_heading = 'Vi jobbar med lokala proffs och <br class="d-none d-lg-block"/>kvalitetsäkrar varje moment för dig.';
    $section_three_heading = gb_show_new_field( get_the_ID(), 'section_three_heading', $def_heading, '');
    
    $def_text = '<p>Med hållbarhet, trygghet, kreativitet, kvalitet och års av sammarbeten <br class="d-none d-lg-block"/>utgör vi en komplett samarbetspartner och totalleverantör.</p><a href=""><span>Ring oss nu </span> <i class="fas fa-chevron-right"></i></a>';
    $section_three_editor = gb_show_new_field( get_the_ID(), 'section_three_editor', $def_text, 'editor');
    
    //Section 4
    $def_heading = 'Några av våra ytor';
    $section_four_editor = gb_show_new_field( get_the_ID(), 'section_four_heading', $def_heading, '');
    
    //Section 5
    $def_img = get_stylesheet_directory_uri() . '/images/almend_image.png';
    $section_five_image = gb_show_new_field( get_the_ID(), 'section_five_image', $def_img, '');
    
    $def_heading = 'En färdigpaketerad lösning <br class="d-none d-md-block">med allt för ett lyckat event';
    $section_five_heading = gb_show_new_field( get_the_ID(), 'section_five_heading', $def_heading, '');
    
    $def_text = '<p class="box_text">Vi har riggat två ytor med teknik, bild, ljud och <br class="d-none d-md-block">vädersäkring för dig som vill ha det enkelt</p><p><a href=""><span>Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a href=""><span>Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $section_five_editor = gb_show_new_field( get_the_ID(), 'section_five_editor', $def_text, 'editor');
    
    //Section 6
    $def_img = get_stylesheet_directory_uri() . '/icons/home_icon.png';
    $section_six_image = gb_show_new_field( get_the_ID(), 'section_six_image', $def_img, '');
    
    $def_heading = 'Vi lagerhåller dessutom möbler och <br class="d-none d-lg-block">material för er i Visby tills det är dags igen. ';
    $section_six_heading = gb_show_new_field( get_the_ID(), 'section_six_heading', $def_heading, '');
    
    $def_text = 'Förfrågan';
    $section_six_text = gb_show_new_field( get_the_ID(), 'section_six_text', $def_text, '');
    
    $def_link = '#';
    $section_six_link = gb_show_new_field( get_the_ID(), 'section_six_link', $def_link , '');
    
    $def_img = get_stylesheet_directory_uri() . '/images/map.png';
    $section_seven_image = gb_show_new_field( get_the_ID(), 'section_seven_image', $def_img, '');
    
    
?>

<!-- frontpage Content -->

<section class="joel_fp_header_section">
    <div class="stage_video_overlay d-flex justify-content-center align-items-end" style="background: #fff;">
        <img src="<?php echo $gb_card_header_bg_image; ?>" class="header_help"/>
    </div>
    <!--<video autoplay="" muted="" loop="" id="myVideo" class="stage_video">
        <source src="video/gogotland_klipp_HD.mp4" type="video/mp4">
    </video>-->
    
    <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header_3.png" id="myVideo" class="stage_video"/>-->
		<div class="container">
			<div class="middle_section d-flex align-items-start justify-content-start">
				
        <div class="row">
            <div class="col-12 col-md-7 left_image_sec">
                <img src="<?php echo $gb_card_header_left_image; ?>" class="left_image" />
            </div>
            <div class="col-12 col-md-5 d-flex flex-column align-items-start justify-content-center right_text_sec">
                <!--<p>Vi har tillgång till en rad lokaler i Visby innerstad, som rymmer allt från mindre sällskap upp till 1 200 personer. Vi hjälper företag att nå ut och vårt framgångsrecept är enkelt:  En kontakt - en faktura!</p>
                <a href=""><span>Se våra almedalsytor</span> <i class="fas fa-chevron-right"></i></a>-->
                <?php echo $gb_header_right_text_id; ?>
            </div>
        </div>
        
        <div class="joel_info_links d-none d-md-block">
          
          <div class="row joel_info_links_a">
            
            <div class="col-4 info_link_cont d-flex align-items-end justify-content-center">
              <span class="info_link_one"><?php echo $gb_bg_text_three; ?></span>
            </div>
            
            <div class="col-4 info_link_cont col-4 info_link_cont d-flex align-items-start justify-content-start">
              <span class="info_link_two"><?php echo $gb_bg_text_four; ?></span>
            </div>
            
            <div class="col-4 info_link_cont d-flex align-items-center justify-content-start">
              <span class="info_link_three"><?php echo $gb_bg_text_five; ?></span>
            </div>
            
          </div>
          
          <div class="row joel_info_links_b">
            
            <div class="col-6 info_link_cont d-flex align-items-center justify-content-center">
              <span class="info_link_four"><?php echo $gb_bg_text_two; ?></span>
            </div>
            
            <div class="col-6 info_link_cont d-flex align-items-start justify-content-center justify-content-md-end justify-content-lg-center">
              <span class="info_link_five"><?php echo $gb_bg_text_six; ?></span>
            </div>
            
          </div>
          
          <div class="row joel_info_links_c">
            
            <div class="col-6 info_link_cont d-flex align-items-center justify-content-center">
              <span class="info_link_six"><?php echo $gb_bg_text_one; ?></span>
            </div>
            
            <div class="col-6 info_link_cont d-flex align-items-start justify-content-center justify-content-md-end justify-content-lg-center">
              <span class="info_link_seven"><?php echo $gb_bg_text_seven; ?></span>
            </div>
            
          </div>
          
        </div>
        
      </div>
      
      
    </div>
        
</section>

<section class="joel_fp_extra_content_section">
    <div class="container">
      <!--AVECK_ARR_logo-->
      <div class="row j_right_logo_sec">
        <div class="col-12 d-flex justify-content-center justify-content-md-end align-items-center">
          <img src="<?php echo $gb_card_section_one_logo; ?>" alt="AVECK_ARR_logo" class="adjust_logo"/>
        </div>
      </div>
      
      <div class="joel_fp_extra_part_one">
        <h3 class="joel_fp_extra_po_heading"><?php echo $gb_section_one_heading; ?></h3>
        <?php echo $gb_section_one_text; ?>
        <!--<p>Välj ett område du vill ha vår hjälp med eller boka ett <a href="#">möte</a> med<br /> någon av våra proffsiga projektledare för Almedalsveckan. </p>-->
      </div>
      
      <div class="row joel_fp_extra_part_two">
        
        <div class="col-md-12 col-sm-12 circle_row_col">
          <div class="row no-gutters">
            
            
            <a href="<?php echo $gb_section_one_item_link_one; ?>" class="col-md-2 col-4 circle_thumbs d-flex circle_thumbs align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_one; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $gb_section_one_item_text_one; ?></span>
            </a>
            
            <a href="<?php echo $gb_section_one_item_link_two; ?>" class="col-md-2 col-4 circle_thumbs d-flex circle_thumbs align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_two; ?>" alt="Ellipse" class="img_circle"/>
              <span>Utomhusyta</span>
            </a>
            
            <a href="<?php echo $gb_section_one_item_link_three; ?>" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_three; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $gb_section_one_item_text_three; ?></span>
            </a>
          
            <a href="<?php echo $gb_section_one_item_link_four; ?>" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_four; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $gb_section_one_item_text_four; ?></span>
            </a>
            
            <a href="<?php echo $gb_section_one_item_link_five; ?>" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_five; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $gb_section_one_item_text_five; ?></span>
            </a>
            
            <a href="<?php echo $gb_section_one_item_link_six; ?>" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo $gb_section_one_item_image_six; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $gb_section_one_item_text_six; ?></span>
            </a>
            
            
          </div>
          
        </div>
        
        
      </div>
      
      
      <div class="row joel_jag_row">
          
          <div class="col-12 col-md-4 joel_jag_img_col d-flex justify-content-center align-items-center">
              <img src="<?php echo $section_two_image; ?>" alt="Ellipse" class="joel_jag_img"/>
          </div>
          
          <div class="col-12 col-md-8 joel_jag_desc_col d-flex align-items-center align-items-md-start justify-content-center flex-column">
            <h3><?php echo $section_two_heading; ?></h3>
            <?php echo $section_two_editor; ?>
          </div>
          
      </div>
      
      <div class="row joel_jag_row joel_jag_row_two">
          
          <div class="col-12 col-md-8 joel_jag_desc_col d-flex align-items-center align-items-md-start justify-content-center flex-column">
            <h3><?php echo $section_three_heading; ?></h3>
            <?php echo $section_three_editor; ?>
          </div>
          
          <div class="col-12 col-md-4 joel_jag_img_col d-flex justify-content-center align-items-center">
            
              <div id="carouselExampleFade" class="carousel carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
                    $section_three_images = explode(',', $section_three_image);
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block" src="<?php echo $section_three_images[0]; ?>" alt="slide_0">
                    </div>
                    <?php
                    if( count($section_three_images) > 1 ){
                        foreach($section_three_images as $key => $image){
                            if($key != 0){
                                ?>
                                  <div class="carousel-item">
                                      <img class="d-block" src="<?php echo $image; ?>" alt="slide_<?php echo $key; ?>">
                                  </div>
                                <?php
                            }
                        }
                    }
                  ?>
                  
                  
                  <!--<div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_b.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_c.png" alt="Third slide">
                  </div>
                  
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_d.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_e.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_f.png" alt="Third slide">
                  </div>
                  
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_g.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" src="<?php echo get_stylesheet_directory_uri(); ?>/logos/slide_logo_h.png" alt="Second slide">
                  </div>-->
                  
                </div>
                
              </div>
              
          </div>
          
          
      </div>
      
      
    </div>
</section>

<section class="joel_fp_blog_section">
  <div class="container">
    <div class="row">
      <div class="col-12 blog_section_title">
        <h3><?php echo $section_four_editor; ?></h3>
      </div>
    </div>
    
    <?php
        $card_args = [
            
            'post_type' => 'almedalen',
            'posts_per_page' => -1,
            'meta_key'     => 'gb_card_slider_images',
            'meta_value'   => '',
            'meta_compare' => '!=',
            'orderby' => 'ID',
            'order'   => 'DESC'
            
        ];
        $card_query = new WP_Query( $card_args );
        $card_ind = 0;
        if ( $card_query->have_posts() ){
            while ( $card_query->have_posts() ) {
                
                $card_query->the_post();
                
                $gb_thumbnail_slider = get_post_meta(get_the_ID(), 'gb_thumbnail_slider', true);
                $gb_card_logo = get_post_meta(get_the_ID(), 'gb_card_logo', true);
                
                $gb_part_one_a = get_post_meta( get_the_ID() , 'gb_part_one_a', true);
                $gb_part_one_b = get_post_meta( get_the_ID() , 'gb_part_one_b', true);
                
                $gb_part_two_a = get_post_meta( get_the_ID() , 'gb_part_two_a', true);
                $gb_part_two_b = get_post_meta( get_the_ID() , 'gb_part_two_b', true);
                
                $gb_part_three_a = get_post_meta( get_the_ID() , 'gb_part_three_a', true);
                $gb_part_three_b = get_post_meta( get_the_ID() , 'gb_part_three_b', true);
                
                $gb_part_four_a = get_post_meta( get_the_ID() , 'gb_part_four_a', true);
                $gb_part_four_b = get_post_meta( get_the_ID() , 'gb_part_four_b', true);
                
                $gb_logo_width = get_post_meta(get_the_ID(), 'gb_logo_width', true);
                $gb_logo_height = get_post_meta(get_the_ID(), 'gb_logo_height', true);
                $gb_youtube_video_link = get_post_meta( get_the_ID(), 'gb_youtube_video_link', true);
                $gb_contact_form_link = get_post_meta( get_the_ID(), 'gb_contact_form_link', true);
                $gb_extra_content = get_post_meta(get_the_ID(), 'gb_extra_content', true);
                $gb_card_slider_images = get_post_meta(get_the_ID(), 'gb_card_slider_images', true);
                $gb_card_slider_label = get_post_meta(get_the_ID(), 'gb_card_slider_label', true);
                
                if($card_ind == 2){
                    ?>
                    </div>
                    </section>
                    <section class="joel_custom_box_section">
                        
                        <div class="joel_custom_boxes_container">
                          <div class="row no-gutters">
                            
                            <div class="col-12 col-md-12 joel_custom_box_three">
                              <img src="<?php echo $section_five_image; ?>" alt="Box" class="box_bg"/>
                              <div class="box_mirror"></div>
                              <div class="container">
                                <div class="row no-gutters align-items-center justify-content-start">
                                  <div class="col-md-6 col-sm-8 col-12">
                                    <h1 class="joel_cb_joining_write"></h1>
                                    <h2><?php echo $section_five_heading; ?></h2>
                                    <div class="box_text">
                                        <?php echo $section_five_editor; ?>
                                    </div>
                                    <!--<div class="joel_custom_box_logos">
                                      <a href="#" class="joel_custom_box_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_b.png" alt="Logo B" /></a>
                                      <a href="#" class="joel_custom_box_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_c.png" alt="Logo C" /></a>
                                      <a href="#" class="joel_custom_box_logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_a.png" alt="Logo A" /></a>
                                    </div>-->
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          
                        </div>
                        
                    </section>
                    <section class="joel_fp_blog_section joel_fp_blog_section_view_more">
                    <div class="container">
                    <?php
                }
                
                if($card_ind == 3){
                    ?>
                    <div class="row a_row align-items-center">
            
                        <div class="col-12 offset-md-1 col-md-2 d-flex justify-content-center">
                          <img src="<?php echo $section_six_image; ?>" alt="icon">
                        </div>
                        
                        <div class="col-12 col-md-7">
                          <h2><?php echo $section_six_heading; ?></h2>
                        </div>
                        
                        <div class="col-12 col-md-2">
                          <a href="<?php echo $section_six_link; ?>" class="act_btn"><?php echo $section_six_text; ?></a>
                        </div>
                        
                    </div>
                    <?php
                }
                
                $card_ind++;
                    
                    $slider_images_exp = explode(',', $gb_card_slider_images);
                    $this_post = get_post(get_the_ID());
                    
                    ?>
            
                        <div class="row blog_post_row" data_post_id="<?php echo get_the_ID(); ?>">
                          
                            <div class="col-12 col-lg-6 blog_post_slider">
                                <div id="demo_<?php echo get_the_ID(); ?>" class="carousel slide" data-ride="carousel">
                                  
                                  <!-- The slideshow -->
                                  <?php
                                    if($gb_card_slider_label && $gb_card_slider_label != ''){
                                        ?>
                                        <div class="sticker_container">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sticker.png" alt="sticker"/>
                                            <p class="sticker_text"><?php echo $gb_card_slider_label; ?></p>
                                        </div>
                                        <?php
                                    }
                                  ?>
                                  
                                  
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img src="<?php echo $slider_images_exp[0]; ?>" alt="0">
                                    </div>
                                    
                                    <?php
                                        if( count($slider_images_exp) > 1 ){
                                            foreach($slider_images_exp as $key => $img){
                                                if($key != 0){
                                                    
                                                    ?>
                                                        <div class="carousel-item <?php echo $key; ?>">
                                                            <img src="<?php echo $img; ?>" alt="<?php echo $key; ?>">
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                    
                                  </div>
                                  
                                  <!-- Left and right controls -->
                                  <a class="carousel-control-prev cont" href="#demo_<?php echo get_the_ID(); ?>" data-slide="prev">
                                    <!--<span class="carousel-control-prev-icon"></span>-->
                                    <i class="fas fa-chevron-left"></i>
                                  </a>
                                  <a class="carousel-control-next cont" href="#demo_<?php echo get_the_ID(); ?>" data-slide="next">
                                    <!--<span class="carousel-control-next-icon"></span>-->
                                    <i class="fas fa-chevron-right"></i>
                                  </a>
                                
                                </div>
                            </div>
                          
                          <div class="col-12 col-lg-6 blog_post_caption">
                            
                            <h3><?php echo get_the_title(); ?></h3>
                            <p><?php echo $gb_extra_content; ?></p>
                            
                            <div class="capt_extra_info row">
                              
                              <div class="col-6 capt_extra_info_col d-flex flex-column justify-content-center align-items-center">
                                <span><?php echo $gb_part_one_a; ?></span>
                                <b><?php echo $gb_part_one_b; ?></b>
                              </div>
                              
                              <div class="col-6 capt_extra_info_col d-flex flex-column justify-content-center align-items-center">
                                <span><?php echo $gb_part_two_a; ?></span>
                                <b><?php echo $gb_part_two_b; ?></b>
                              </div>
                              
                              <div class="col-6 capt_extra_info_col d-flex flex-column justify-content-center align-items-center">
                                <span><?php echo $gb_part_three_a; ?></span>
                                <b><?php echo $gb_part_three_b; ?></b>
                              </div>
                              
                              <div class="col-6 capt_extra_info_col d-flex flex-column justify-content-center align-items-center">
                                <span><?php echo $gb_part_four_a; ?></span>
                                <b><?php echo $gb_part_four_b; ?></b>
                              </div>
                              
                            </div>
                            
                          </div>
                        </div>
                        
                    <?php
                    
            }
        }
        
        if( $card_ind > 5 ){
        
            ?>
                <div class="row joel_view_more_btn_container justify-content-center">
                  <div class="col-12 d-flex justify-content-center">
                    <button class="joel_view_more_btn">Visa fler</button>
                  </div>
                </div>
            <?php
        }
  ?>
  
</section>

<?php
$gb_email_title_text = get_option('gb_email_title_text');
$gb_email_placeholder_text = get_option('gb_email_placeholder_text');
$gb_email_extra_text = get_option('gb_email_extra_text');
$gb_email_submit_text = get_option('gb_email_submit_text');
$gb_email_submit_color = get_option('gb_email_submit_color');
?>

<section class="joel_posts_section">
  
  <img src="<?php echo $section_seven_image; ?>" class="map_img"/>
  
  <div class="container">
    
    <div class="joel_email_subs_section">
      <div class="row email_subs_row no-gutters justify-content-center align-items-center">
        <div class="col-12 col-lg-10 email_subs_col">
          <h2 class="email_subs_head"><i class="fas fa-chevron-right" aria-hidden="true"></i> <?php echo $gb_email_title_text; ?></h2>
          <input type="text" class="email_subs_field" placeholder="<?php echo $gb_email_placeholder_text; ?>">
          <div class="email_subs_btn_container">
            <input type="button" class="email_subs_button" id="email_subs_button" value="<?php echo $gb_email_submit_text; ?>" style="background: <?php echo $gb_email_submit_color; ?>;">
          </div>
          <p><?php echo $gb_email_extra_text; ?></p>
        </div>
      </div>
    </div>
    
  </div>
</section>

<!-- End of frontpage Content -->
<?php
  get_footer();
?>
