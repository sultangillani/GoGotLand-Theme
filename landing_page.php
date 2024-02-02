<?php
    /**
    * Template Name: Landing Page
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header();
    
    
    $def_img = get_stylesheet_directory_uri() . '/video/gogotland_klipp_HD.mp4';
    $landing_section_one_video = gb_show_new_field( get_the_ID(), 'landing_section_one_video', $def_img, '');
    
    $so_title = 'Konferensresa till Gotland';
    $landing_section_one_caption_title = gb_show_new_field( get_the_ID(), 'landing_section_one_caption_title', '', '');
    
    $so_subtitle = 'Landningssida template';
    $landing_section_one_caption_subtitle = gb_show_new_field( get_the_ID(), 'landing_section_one_caption_subtitle', '', '');
    
    $so_film_button = 'SPELA FILM';
    $landing_section_one_film_button_name = gb_show_new_field( get_the_ID(), 'landing_section_one_film_button_name', $so_film_button, '');
    
    $so_film_link = 'https://www.youtube.com/watch?v=wzDRH90HAhs';
    $landing_section_one_film_link = gb_show_new_field( get_the_ID(), 'landing_section_one_film_link', '', '');
    $landing_section_one_film_link = str_replace('watch?v=', 'embed/', $landing_section_one_film_link);
    
    $landing_section_one_logos = gb_show_new_field( get_the_ID(), 'landing_section_one_logos', '', '');
    $landing_section_one_logos = explode(',', $landing_section_one_logos);
    
    if( count($landing_section_one_logos) > 1 ){
        if( $landing_section_one_logos[0] != '' ){
            $landing_section_one_logos = $landing_section_one_logos;
        }else{
            $landing_section_one_logos == '';
        }
    }
    
    $def_text = '<p>Att vara en helhetsleverantör för en konferens på Gotland innebär att vi bär många olika hattar...  goGotland  är ett kreativt evenemangsföretag som älskar att imponera våra kunder med innovativa evenemangsidéer och genom att bryta oss loss från normerna. Vi är också en pålitlig DMC-byrå som du kan lita på när du planerar ett off-site möte på Gotland. Om du letar efter en konferensarrangör på Gotland, glöm inte oss då för vi är experter på uplevelser kopplade till vår ö.</p><br><p>Utan att oroa dig kan du fortsätta festen med dina gäster under hela evenemanget.</p>';
    $landing_section_two_start_text_editor = gb_show_new_field( get_the_ID(), 'landing_section_two_start_text_editor', $def_text, 'editor');
    
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/Thumbnails/Ellipse.png';
    $landing_section_two_left_logo_one = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_one', $def_img, '');
    $landing_section_two_left_logo_one_text = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_one_text', '1 878 Hotellrum', '');
    $landing_section_two_left_logo_one_link = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_one_link', '#', '');
    
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/Thumbnails/Ellipse_2.png';
    $landing_section_two_left_logo_two = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_two', $def_img, '');
    $landing_section_two_left_logo_two_text = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_two_text', '135 Mötesrum', '');
    $landing_section_two_left_logo_two_link = gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_two_link', '#', '');    
    
    $landing_section_two_right_button_one_background_color = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_one_background_color', '#111', '');
    $landing_section_two_right_button_one_text_color = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_one_text_color', '#a8a8a8', '');
    $landing_section_two_right_button_one_name = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_one_name', 'Upptäck aktiviteter', '');
    $landing_section_two_right_button_one_link = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_one_link', '#', '');
    
    $landing_section_two_right_button_two_background_color = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_two_background_color', '#76a674', '');
    $landing_section_two_right_button_two_text_color = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_two_text_color', '#f2f2f2', '');
    $landing_section_two_right_button_two_name = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_two_name', 'Skapa plan', '');
    $landing_section_two_right_button_two_link = gb_show_new_field( get_the_ID(), 'landing_section_two_right_button_two_link', '#', '');
    
    $landing_section_two_counter_one_from = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_one_from', '50', '');
    $landing_section_two_counter_one_to = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_one_to', '96', '');
    $landing_section_two_counter_one_extra_text = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_one_extra_text', 'ser konferens på Gotland som ett klimatsmart alternativ', '');
    
    $landing_section_two_counter_two_from = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_two_from', '50', '');
    $landing_section_two_counter_two_to = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_two_to', '89', '');
    $landing_section_two_counter_two_extra_text = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_two_extra_text', 'anlitar oss för att själva kunna fokusera på rätt saker', '');
    
    $def_text = '<h2 class="j_detail_head">Vi kan hjälpa dig</h2><div class="j_detail_text">Kan vi tillsammans bygga nya rustningar åt er personal? Utveckla talanger och behålla kompetenser?  Tillsammans adresserar vi utmaningar och skapar lösningar. Antingen är vi den som ser till att infrastrukturen fungerar eller så hjäper vi er leda arbetet genom vår expertis i området. </div>';
    $landing_section_two_counter_right_editor = gb_show_new_field( get_the_ID(), 'landing_section_two_counter_right_editor', $def_text, 'editor');
    
    $def_logos = [
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-eventyr-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-grant-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-af-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-payex-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-ica-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-springconf-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-spotify-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-diplomat-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-industrin-1.png',
        home_url('/') . 'wp-content/themes/jTheFunTheme/logos/new_logos/logo-tco-1.png'
    ];
    $def_logos = implode(',', $def_logos);
    $landing_section_two_bottom_logos_slider = gb_show_new_field( get_the_ID(), 'landing_section_two_bottom_logos_slider', $def_logos, '');
    $landing_section_two_bottom_logos_slider = explode(',', $landing_section_two_bottom_logos_slider);
    
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/thumbnails/Guidadeturer.jpg';
    $landing_section_three_box_a_image = gb_show_new_field( get_the_ID(), 'landing_section_three_box_a_image', $def_img, '');
    $landing_section_three_box_a_day_text = gb_show_new_field( get_the_ID(), 'landing_section_three_box_a_day_text', 'Dag 1', '');
    $landing_section_three_box_a_title = gb_show_new_field( get_the_ID(), 'landing_section_three_box_a_title', 'Rauksafari', '');
    $def_desc = 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.';
    $landing_section_three_box_a_description = gb_show_new_field( get_the_ID(), 'landing_section_three_box_a_description', $def_desc, '');
    
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/thumbnails/klosterlängan.jpg';
    $landing_section_three_box_b_image = gb_show_new_field( get_the_ID(), 'landing_section_three_box_b_image', $def_img, '');
    $landing_section_three_box_b_day_text = gb_show_new_field( get_the_ID(), 'landing_section_three_box_b_day_text', 'Dag 2', '');
    $landing_section_three_box_b_title = gb_show_new_field( get_the_ID(), 'landing_section_three_box_b_title', 'Middag i exlusiv lokal', '');
    $def_desc = 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem quis bibendum auctor, nisi elit consequat ipsum.';
    $landing_section_three_box_b_description = gb_show_new_field( get_the_ID(), 'landing_section_three_box_b_description', $def_desc, '');
   
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/thumbnails/glashyddan.jpg';
    $landing_section_three_box_c_image = gb_show_new_field( get_the_ID(), 'landing_section_three_box_c_image', $def_img, '');
    $landing_section_three_box_c_day_text = gb_show_new_field( get_the_ID(), 'landing_section_three_box_c_day_text', 'Dag 3', '');
    $landing_section_three_box_c_title = gb_show_new_field( get_the_ID(), 'landing_section_three_box_c_title', 'Upplev 1200° värme', '');
    $def_desc = 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem quis bibendum auctor, nisi elit consequat ipsum.';
    $landing_section_three_box_c_description = gb_show_new_field( get_the_ID(), 'landing_section_three_box_c_description', $def_desc, '');
    
    $landing_section_four_bigboxes_heading = gb_show_new_field( get_the_ID(), 'landing_section_four_bigboxes_heading', 'Rekomenderat för dig', '');
    $landing_section_four_bigbox_one_image = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_image', '', '');
    $landing_section_four_bigbox_one_background_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_background_color', '#f4f4f4', '');
    $landing_section_four_bigbox_one_joining_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_joining_title', '', '');    
    $landing_section_four_bigbox_one_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_title', 'Klimatsmart konferens', '');
    $def_desc = 'Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.';
    $landing_section_four_bigbox_one_text = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_text', $def_desc, '');
    $landing_section_four_bigbox_one_button_a_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_a_title', 'Ta reda på mer', '');
    $landing_section_four_bigbox_one_button_a_link = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_a_link', '#', '');
    $landing_section_four_bigbox_one_button_b_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_b_title', 'Boka', '');
    $landing_section_four_bigbox_one_button_b_link = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_b_link', '#', '');  
    
    $landing_section_four_bigbox_one_logos = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_logos', '', '');
    $landing_section_four_bigbox_one_logos = explode(',', $landing_section_four_bigbox_one_logos);
    
    $landing_section_four_bigbox_one_button_text_colors = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_text_colors', '#5dbb63', '');
    $landing_section_four_bigbox_one_joining_title_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_joining_title_color', '#404040', '');    
    $landing_section_four_bigbox_one_title_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_title_color', '#404040', '');
    $landing_section_four_bigbox_one_text_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_one_text_color', '#777', '');
    
    $landing_section_four_bigbox_one_content_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'landing_section_four_bigbox_one_content_positon_vertically');
    $landing_section_four_bigbox_one_content_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'landing_section_four_bigbox_one_content_positon_horizontally');
    
    $landing_section_four_bigbox_two_image = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_image', '', '');
    $landing_section_four_bigbox_two_background_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_background_color', '#f4f4f4', '');
    $landing_section_four_bigbox_two_joining_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_joining_title', 'Konferens Ombord', '');    
    $landing_section_four_bigbox_two_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_title', 'En ny konferensupplevelse', '');
    $def_desc = 'När mötesagendan till havs är klar väntar en ö full av möjligheter.';
    $landing_section_four_bigbox_two_text = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_text', $def_desc, '');
    $landing_section_four_bigbox_two_button_a_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_a_title', 'Ta reda på mer', '');
    $landing_section_four_bigbox_two_button_a_link = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_a_link', '#', '');
    $landing_section_four_bigbox_two_button_b_title = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_b_title', 'Boka', '');
    $landing_section_four_bigbox_two_button_b_link = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_b_link', '#', '');  
    
    $landing_section_four_bigbox_two_logos = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_logos', '', '');
    $landing_section_four_bigbox_two_logos = explode(',', $landing_section_four_bigbox_two_logos);
    
    $landing_section_four_bigbox_two_button_text_colors = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_text_colors', '#f0f0f0', '');
    $landing_section_four_bigbox_two_joining_title_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_joining_title_color', '#f0f0f0', '');    
    $landing_section_four_bigbox_two_title_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_title_color', '#f0f0f0', '');
    $landing_section_four_bigbox_two_text_color = gb_show_new_field( get_the_ID(), 'landing_section_four_bigbox_two_text_color', '#f0f0f0', '');

    $landing_section_four_bigbox_two_content_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'landing_section_four_bigbox_two_content_positon_vertically');
    $landing_section_four_bigbox_two_content_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'landing_section_four_bigbox_two_content_positon_horizontally');
?>

<!-- Landing Page Content -->
<section class="joel_fp_header_section">
    <div class="stage_video_overlay"></div>
    <video autoplay muted loop id="myVideo" class="stage_video">
         <source src="<?php echo $landing_section_one_video; ?>" type="video/mp4">
    </video>
    
		<div class="container">
			<div class="middle_section d-flex align-items-center justify-content-center">
				
				<h1 class="middle_section_title"><?php echo $landing_section_one_caption_title; ?> <span><?php echo $landing_section_one_caption_subtitle; ?></span></h1>
				<?php
				    $dark_header_film_button_icon = get_theme_mod('dark_header_film_button_icon');
                    if( $dark_header_film_button_icon == '' ){
                        $dark_header_film_button_icon = get_template_directory_uri() . '/icons/PLAY_bg.png';
                    }
				?>
				<div class="film_link">
                  <div class="modal_appear_btn" data-toggle="modal" data-target="#myModal">
                    <span><?php echo $landing_section_one_film_button_name; ?></span>
                    <img src="<?php echo $dark_header_film_button_icon; ?>" class="icon_img"/>
                  </div>
				</div>
				
				<?php
				    //$landing_section_one_logos
				    if($landing_section_one_logos != ''){
    				    ?>
        				<div class="d-flex align-items-center justify-content-end joel_logos">
        				    <?php 
        				        foreach($landing_section_one_logos as $logo_key => $logo){
        				            ?>
        				            <img src="<?php echo $logo; ?>" class="logos_img_one logos_img_key_<?php echo $logo_key; ?>"/>
        				            <?php
        				        }
        				    ?>
        					
        				</div>
        				<?php
				    }
    			?>
				
			</div>
		</div>
</section>

<section class="joel_fp_extra_content_section">
    <div class="container">
      <div class="joel_fp_extra_part_one">
        <?php echo $landing_section_two_start_text_editor; ?>
      </div>
      
      <div class="row joel_fp_extra_part_two">
        
        <div class="col-md-7 col-sm-12">
          <div class="row no-gutters">
            
            <a href="<?php echo $landing_section_two_left_logo_one_link; ?>" class="col-md-6 col-6 circle_thumbs d-flex circle_thumbs align-items-center justify-content-center">
              <img src="<?php echo $landing_section_two_left_logo_one; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $landing_section_two_left_logo_one_text; ?></span>
            </a>
            
            <a href="<?php echo $landing_section_two_left_logo_two_link; ?>" class="col-md-6 col-6 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo $landing_section_two_left_logo_two; ?>" alt="Ellipse" class="img_circle"/>
              <span><?php echo $landing_section_two_left_logo_two_text; ?></span>
            </a>
          
          </div>
        </div>
        
        <div class="col-md-5 col-sm-12 j_extra_btns d-flex align-items-center justify-content-center">
          <div class="row no-gutters">
            <div class="col-md-12">
              <a href="<?php echo $landing_section_two_right_button_one_link; ?>" class="j_btns btn_light" style="background: <?php echo $landing_section_two_right_button_one_background_color; ?>; color: <?php echo $landing_section_two_right_button_one_text_color; ?>;"><?php echo $landing_section_two_right_button_one_name; ?></a>
              <a href="<?php echo $landing_section_two_right_button_two_link; ?>" class="j_btns btn_bg" style="background: <?php echo $landing_section_two_right_button_two_background_color; ?>; color: <?php echo $landing_section_two_right_button_two_text_color; ?>;"><?php echo $landing_section_two_right_button_two_name; ?></a>
            </div>
          </div>
        </div>
        
      </div>
      
      <div class="row joel_fp_extra_part_three no-gutters">
        
        <div class="col-lg-6 col-12 joel_counters">
          <div class="row no-gutters">
            
            <div class="col-md-6 d-flex joel_counters_cont align-items-center justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $landing_section_two_counter_one_to; ?>"><?php echo $landing_section_two_counter_one_from; ?></h2>
                <span><?php echo $landing_section_two_counter_one_extra_text; ?></span>
              </div>
            </div>
            
            <div class="col-md-6 d-flex joel_counters_cont align-items-center justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $landing_section_two_counter_two_to; ?>"><?php echo $landing_section_two_counter_two_from; ?></h2>
                <span><?php echo $landing_section_two_counter_two_extra_text; ?></span>
              </div>
            </div>
          
          </div>
        </div>
        
        <div class="col-lg-6 col-12 joel_counter_detail d-flex justify-content-start align-content-center">
          <div class="row no-gutters">
            
            <div class="col-md-12 joel_counter_detail_text">
              <?php echo $landing_section_two_counter_right_editor; ?>
            </div>
            
          </div>
        </div>
        
      </div>
      
      <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">
                        <div class="owl-carousel owl-theme brands_slider">
                            <?php 
                            //$landing_section_two_bottom_logos_slider
                            foreach( $landing_section_two_bottom_logos_slider as $logo_key => $logo){
                                ?>
                                <div class="owl-item" data_key="<?php echo $logo_key; ?>">
                                    <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo $logo; ?>" alt="" /></a></div>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div> <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev d-none"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next d-none"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row joel_group_image">
          <div class="col-12">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/flp.png" alt="" class="joel_group_image_img"/>
          </div>
        </div>
      </div>
      
    </div>
</section>

<section class="joel_posts_section">
  <div class="container">
    
    <div class="joel_posts_container d-none d-lg-block">
      <div class="row post_row no-gutters justify-content-center align-items-center">
        <div class="col-4 post_img">
          <img src="<?php echo $landing_section_three_box_a_image; ?>" alt="Shape A"/>
          <i class="fas fa-caret-left locate" aria-hidden="true"></i>
        </div>
        <div class="col-4 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_a_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_a_title; ?></h4>
          <p><?php echo $landing_section_three_box_a_description; ?> </p>
        </div>
        
        <div class="col-4 post_img">
          <img src="<?php echo $landing_section_three_box_c_image; ?>" alt="Shape B"/>
          <i class="fas fa-caret-up locate" aria-hidden="true"></i>
        </div>
        <div class="col-4 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_b_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_b_title; ?></h4>
          <p><?php echo $landing_section_three_box_b_description; ?> </p>    
        </div>
        
        <div class="col-4 post_img">
          <img src="<?php echo $landing_section_three_box_b_image; ?>" alt="Shape C"/>
          <i class="fas fa-caret-right locate" aria-hidden="true"></i>
        </div>
        <div class="col-4 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_c_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_c_title; ?></h4>
          <p><?php echo $landing_section_three_box_c_description; ?> </p>    
        </div>
      
      </div>
    </div>
    
    <div class="joel_posts_container d-none d-sm-block d-md-block d-lg-none">
      <div class="row post_row no-gutters justify-content-center align-items-center">
        <div class="col-6 post_img">
          <img src="<?php echo $landing_section_three_box_a_image; ?>" alt="Shape A"/>
          <i class="fas fa-caret-left locate" aria-hidden="true"></i>
        </div>
        <div class="col-6 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_a_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_a_title; ?></h4>
          <p><?php echo $landing_section_three_box_a_description; ?> </p>
        </div>
        
        <div class="col-6 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_b_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_b_title; ?></h4>
          <p><?php echo $landing_section_three_box_b_description; ?> </p>     
        </div>
        
        <div class="col-6 post_img">
          <img src="<?php echo $landing_section_three_box_b_image; ?>" alt="Shape C"/>
          <i class="fas fa-caret-right locate" aria-hidden="true"></i>
        </div>
        
        <div class="col-6 post_img">
          <img src="<?php echo $landing_section_three_box_c_image; ?>" alt="Shape B"/>
          <i class="fas fa-caret-left locate" aria-hidden="true"></i>
        </div>
        
        <div class="col-6 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_c_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_c_title; ?></h4>
          <p><?php echo $landing_section_three_box_c_description; ?> </p>   
        </div>
        
      </div>
    </div>
    
    
    <div class="joel_posts_container d-block d-sm-none">
      <div class="row post_row no-gutters justify-content-center align-items-center">
        
        <div class="col-12 post_img">
          <img src="<?php echo $landing_section_three_box_a_image; ?>" alt="Shape A"/>
          <i class="fas fa-caret-up locate" aria-hidden="true"></i>
        </div>
        
        <div class="col-12 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_a_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_a_title; ?></h4>
          <p><?php echo $landing_section_three_box_a_description; ?> </p>
        </div>
        
        <div class="col-12 post_img">
          <img src="<?php echo $landing_section_three_box_b_image; ?>" alt="Shape C"/>
          <i class="fas fa-caret-up locate" aria-hidden="true"></i>
        </div>
        
        <div class="col-12 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_b_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_b_title; ?></h4>
          <p><?php echo $landing_section_three_box_b_description; ?> </p>    
        </div>
        
        <div class="col-12 post_img">
          <img src="<?php echo $landing_section_three_box_c_image; ?>" alt="Shape B"/>
          <i class="fas fa-caret-up locate" aria-hidden="true"></i>
        </div>
        
        <div class="col-12 post_txt">
          <h5 class="day"><?php echo $landing_section_three_box_c_day_text; ?></h5>
          <h4 class="post_head"><?php echo $landing_section_three_box_c_title; ?></h4>
          <p><?php echo $landing_section_three_box_c_description; ?> </p>   
        </div>
        
      </div>
    </div>
    
<?php
    $gb_email_title_text = get_option('gb_email_title_text');
    $gb_email_placeholder_text = get_option('gb_email_placeholder_text');
    $gb_email_extra_text = get_option('gb_email_extra_text');
    $gb_email_submit_text = get_option('gb_email_submit_text');
    $gb_email_submit_color = get_option('gb_email_submit_color');
?>
    
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

<section class="joel_custom_box_section">
  <div class="container">
    
    <div class="row align-items-center justify-content-center">
      <div class="col-12 joel_custom_box_heading">
        <h3><?php echo $landing_section_four_bigboxes_heading?></h3>
      </div>
    </div>
    
  </div>
  
  
  <div class="joel_custom_boxes_container">
    
    <div class="container">
      <div class="row justify-content-center">
        
        <?php
            $additional_class = '';
            if($landing_section_four_bigbox_one_image != ''){
                $additional_class = 'joel_custom_box_two';
            }else{
                $additional_class = 'joel_custom_box_one';
            }
            
            $o = $landing_section_four_bigbox_one_content_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $landing_section_four_bigbox_one_content_positon_horizontally;?> justify-content-<?php echo $landing_section_four_bigbox_one_content_positon_vertically;?> <?php echo $additional_class; ?> joel_custom_box" style="background: <?php echo $landing_section_four_bigbox_one_background_color; ?>; text-align: <?php echo $o;?>;">
            <?php
                if($landing_section_four_bigbox_one_image != ''){
                    ?>
                    <img src="<?php echo $landing_section_four_bigbox_one_image; ?>" alt="Box" class="box_bg"/>
                    <?php
                }
            ?>
          <div class="box_mirror"></div>
          <h1 class="joel_cb_joining_write" style="color: <?php echo $landing_section_four_bigbox_one_joining_title_color; ?>;"><?php echo $landing_section_four_bigbox_one_joining_title; ?></h1>
          <h2 style="color: <?php echo $landing_section_four_bigbox_one_title_color; ?>;"><?php echo $landing_section_four_bigbox_one_title; ?></h2>
          
          <p class="box_text" style="color: <?php echo $landing_section_four_bigbox_one_text_color; ?>; "><?php echo $landing_section_four_bigbox_one_text; ?></p>
          
          <p><a href="<?php echo $landing_section_four_bigbox_one_button_a_link; ?>" style="color: <?php echo $landing_section_four_bigbox_one_button_text_colors; ?>;"><?php echo $landing_section_four_bigbox_one_button_a_title; ?> </a><i class="fas fa-chevron-right" aria-hidden="true"></i> <a href="<?php echo $landing_section_four_bigbox_one_button_b_link; ?>" style="color: <?php echo $landing_section_four_bigbox_one_button_text_colors; ?>;"><?php echo $landing_section_four_bigbox_one_button_b_title; ?> </a><i class="fas fa-chevron-right" aria-hidden="true"></i></p>
          
          <?php 
           if(count($landing_section_four_bigbox_one_logos) > 0 && $landing_section_four_bigbox_one_logos[0] != '' ){
                ?>
                    <div class="joel_custom_box_logos">
                    <?php 
                        foreach($landing_section_four_bigbox_one_logos as $logo_key => $logo){ 
                            ?>
                                <a href="#" class="joel_custom_box_logo"><img src="<?php echo $logo; ?>" alt="Logo <?php echo $logo_key; ?>" /></a>
                            <?php
                        }
                    ?>
                    </div>
                <?php
           }
          ?>
        </div>
        
        <?php
            $additional_class = '';
            if($landing_section_four_bigbox_two_image != ''){
                $additional_class = 'joel_custom_box_two';
            }else{
                $additional_class = 'joel_custom_box_one';
            }
            
            $o = $landing_section_four_bigbox_two_content_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $landing_section_four_bigbox_two_content_positon_horizontally;?> justify-content-<?php echo $landing_section_four_bigbox_two_content_positon_vertically;?>  <?php echo $additional_class; ?> joel_custom_box" style="background: <?php echo $landing_section_four_bigbox_two_background_color; ?>; text-align: <?php echo $o;?>;" >
            <?php
                if($landing_section_four_bigbox_two_image != ''){
                    ?>
                    <img src="<?php echo $landing_section_four_bigbox_two_image; ?>" alt="Box" class="box_bg"/>
                    <?php
                }
            ?>
          <div class="box_mirror"></div>
          <h1 class="joel_cb_joining_write" style="color: <?php echo $landing_section_four_bigbox_two_joining_title_color; ?>;"><?php echo $landing_section_four_bigbox_two_joining_title; ?></h1>
          <h2 style="color: <?php echo $landing_section_four_bigbox_two_title_color; ?>;"><?php echo $landing_section_four_bigbox_two_title; ?></h2>
          
          <p class="box_text" style="color: <?php echo $landing_section_four_bigbox_two_text_color; ?>; "><?php echo $landing_section_four_bigbox_two_text; ?></p>
          
          <p><a href="<?php echo $landing_section_four_bigbox_two_button_a_link; ?>" style="color: <?php echo $landing_section_four_bigbox_two_button_text_colors; ?>;"><?php echo $landing_section_four_bigbox_two_button_a_title; ?> </a><i class="fas fa-chevron-right" aria-hidden="true"></i> <a href="<?php echo $landing_section_four_bigbox_two_button_b_link; ?>" style="color: <?php echo $landing_section_four_bigbox_two_button_text_colors; ?>;"><?php echo $landing_section_four_bigbox_two_button_b_title; ?> </a><i class="fas fa-chevron-right" aria-hidden="true"></i></p>
          
          <?php 
           if(count($landing_section_four_bigbox_two_logos) > 0 && $landing_section_four_bigbox_two_logos[0] != '' ){
                ?>
                    <div class="joel_custom_box_logos">
                    <?php 
                        foreach($landing_section_four_bigbox_two_logos as $logo_key => $logo){ 
                            ?>
                                <a href="#" class="joel_custom_box_logo"><img src="<?php echo $logo; ?>" alt="Logo <?php echo $logo_key; ?>" /></a>
                            <?php
                        }
                    ?>
                    </div>
                <?php
           }
          ?>
        </div>
        
      </div>
    </div>
  </div>
  
</section>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="btn btn-danger cl" data-dismiss="modal">×</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <iframe width="560" height="315" class="modal_video" src="<?php echo $landing_section_one_film_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      
      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>-->
      
    </div>
  </div>
</div>

<!-- End of Landing Page Content -->
<?php
    get_footer();
?>

