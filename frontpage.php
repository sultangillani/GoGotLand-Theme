<?php
    /**
    * Template Name: Front Page
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header();
    
    $def_img = get_stylesheet_directory_uri() . '/images/slide2.jpg';
    $frontpage_section_one_image = gb_show_new_field( get_the_ID(), 'frontpage_section_one_image', $def_img, '');
    $frontpage_section_one_heading = gb_show_new_field( get_the_ID(), 'frontpage_section_one_heading', 'Planera er nästa <br>Gotlandskonferens', '');
    $def_text = 'Sätt ihop en helt skräddarsydd plan med  dag till dag planering <br class="d-none d-lg-block"/>med vårt team av projektledare, kreatörer och Gotländska eldsjälar.';
    $frontpage_section_one_description = gb_show_new_field( get_the_ID(), 'frontpage_section_one_description', $def_text, '');
    
    $frontpage_section_one_calender_link = gb_show_new_field( get_the_ID(), 'frontpage_section_one_calender_link', '', '');
    
    $frontpage_section_one_logo_slider_images = gb_show_new_field( get_the_ID(), 'frontpage_section_one_logo_slider_images', '', '');
    $frontpage_section_one_logo_slider_images = explode(',', $frontpage_section_one_logo_slider_images);
    
    $frontpage_section_one_header_bottom_logos = gb_show_new_field( get_the_ID(), 'frontpage_section_one_header_bottom_logos', '', '');
    $frontpage_section_one_header_bottom_logos = explode(',', $frontpage_section_one_header_bottom_logos);

    $frontpage_section_two_heading = gb_show_new_field( get_the_ID(), 'frontpage_section_two_heading', 'Det här kan vi göra för dig', '');
    
    $def_text = '<p>Vi har en portfölj utav de absolut roligaste och upplevelserna på Gotland.<br /> Vårt mål är att göra det så smidigt som möjligt för dig - ge dig en kontakt till hela Gotland. </p>';
    $frontpage_section_two_description = gb_show_new_field( get_the_ID(), 'frontpage_section_two_description', $def_text, '');
    
    $frontpage_section_two_label_image = gb_show_new_field( get_the_ID(), 'frontpage_section_two_label_image', '', '');
    //frontpage_section_three_image
    $def_img = get_stylesheet_directory_uri() . '/images/slide3.png';
    $frontpage_section_three_image = gb_show_new_field( get_the_ID(), 'frontpage_section_three_image', $def_img, '');
    
    $frontpage_section_three_heading = gb_show_new_field( get_the_ID(), 'frontpage_section_three_heading', 'Finns ingen bättre plats <br class="d-none d-md-block">för en riktig show', '');
    
    $def_text = '<p class="box_text">Fånga det perfekta ögonblicket under <br class="d-none d-md-block">en föreställning i någon av våra ruiner.</p><p><a href=""><span>Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a href=""><span>Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $frontpage_section_three_description = gb_show_new_field( get_the_ID(), 'frontpage_section_three_description', $def_text, '');
    
    /**/
    $frontpage_section_three_halfbox_one_image =  gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_image', '', '');
    $frontpage_section_three_halfbox_one_background_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_background_color', '#000', '');
    $frontpage_section_three_halfbox_one_joining_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_joining_title', '', '');
    $frontpage_section_three_halfbox_one_joining_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_joining_title_color', '#fff', '');
    $frontpage_section_three_halfbox_one_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_title', 'Klimatsmart konferens', '');
    $frontpage_section_three_halfbox_one_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_title_color', '#fff', '');
    
    $def_text = '<p class="box_text" style="text-align: center;"><span style="color: #777777;">Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.</span></p><p style="text-align: center;"><a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $frontpage_section_three_halfbox_one_description = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_description', $def_text, '');
    
    $frontpage_section_three_halfbox_one_logos = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_one_logos', '', '');
    $frontpage_section_three_halfbox_one_logos = explode(',', $frontpage_section_three_halfbox_one_logos);
    
    $frontpage_section_three_halfbox_one_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_one_positon_vertically');
    $frontpage_section_three_halfbox_one_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_one_positon_horizontally');
	
    $frontpage_section_three_halfbox_two_image =  gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_image', '', '');
    $frontpage_section_three_halfbox_two_background_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_background_color', '#000', '');
    $frontpage_section_three_halfbox_two_joining_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_joining_title', '', '');
    $frontpage_section_three_halfbox_two_joining_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_joining_title_color', '#fff', '');
    $frontpage_section_three_halfbox_two_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_title', 'Klimatsmart konferens', '');
    $frontpage_section_three_halfbox_two_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_title_color', '#fff', '');
    
    $def_text = '<p class="box_text" style="text-align: center;"><span style="color: #777777;">Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.</span></p><p style="text-align: center;"><a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $frontpage_section_three_halfbox_two_description = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_description', $def_text, '');
    
    $frontpage_section_three_halfbox_two_logos = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_two_logos', '', '');
    $frontpage_section_three_halfbox_two_logos = explode(',', $frontpage_section_three_halfbox_two_logos);
    
    $frontpage_section_three_halfbox_two_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_two_positon_vertically');
    $frontpage_section_three_halfbox_two_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_two_positon_horizontally');
	
    
    $frontpage_section_three_halfbox_three_image =  gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_image', '', '');
    $frontpage_section_three_halfbox_three_background_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_background_color', '#000', '');
    $frontpage_section_three_halfbox_three_joining_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_joining_title', '', '');
    $frontpage_section_three_halfbox_three_joining_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_joining_title_color', '#fff', '');
    $frontpage_section_three_halfbox_three_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_title', 'Klimatsmart konferens', '');
    $frontpage_section_three_halfbox_three_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_title_color', '#fff', '');
    
    $def_text = '<p class="box_text" style="text-align: center;"><span style="color: #777777;">Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.</span></p><p style="text-align: center;"><a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $frontpage_section_three_halfbox_three_description = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_description', $def_text, '');
    
    $frontpage_section_three_halfbox_three_logos = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_three_logos', '', '');
    $frontpage_section_three_halfbox_three_logos = explode(',', $frontpage_section_three_halfbox_three_logos);
    
    $frontpage_section_three_halfbox_three_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_three_positon_vertically');
    $frontpage_section_three_halfbox_three_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_three_positon_horizontally');
	
    
    $frontpage_section_three_halfbox_four_image =  gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_image', '', '');
    $frontpage_section_three_halfbox_four_background_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_background_color', '#000', '');
    $frontpage_section_three_halfbox_four_joining_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_joining_title', '', '');
    $frontpage_section_three_halfbox_four_joining_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_joining_title_color', '#fff', '');
    $frontpage_section_three_halfbox_four_title = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_title', 'Klimatsmart konferens', '');
    $frontpage_section_three_halfbox_four_title_color = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_title_color', '#fff', '');
    
    $def_text = '<p class="box_text" style="text-align: center;"><span style="color: #777777;">Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.</span></p><p style="text-align: center;"><a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Läs mer</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a> <a style="color: #5dbb63;" href="#"><span style="color: #5dbb63;">Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $frontpage_section_three_halfbox_four_description = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_description', $def_text, '');
    
    $frontpage_section_three_halfbox_four_logos = gb_show_new_field( get_the_ID(), 'frontpage_section_three_halfbox_four_logos', '', '');
    $frontpage_section_three_halfbox_four_logos = explode(',', $frontpage_section_three_halfbox_four_logos);
    
    $frontpage_section_three_halfbox_four_positon_vertically = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_four_positon_vertically');
    $frontpage_section_three_halfbox_four_positon_horizontally = joel_box_position_switch_options_data( get_the_ID(), 'frontpage_section_three_halfbox_four_positon_horizontally');
	
    
    
    $page_id = get_the_ID();
?>
<!-- frontpage Content -->
<section class="joel_fp_header_section">
    <div class="stage_video_overlay"></div>
    <!--<video autoplay="" muted="" loop="" id="myVideo" class="stage_video">
        <source src="video/gogotland_klipp_HD.mp4" type="video/mp4">
    </video>-->
    
    <img src="<?php echo $frontpage_section_one_image; ?>" id="myVideo" class="stage_video"/>
    
		<div class="container">
			<div class="middle_section d-flex align-items-center justify-content-center">
				
                <div class="fp_middle_title_section_contaniner">
                  <h3 class="fp_middle_section_title"><?php echo $frontpage_section_one_heading; ?></h3>
                  <div class="fp_middle_section_description"><?php echo $frontpage_section_one_description; ?></div>
                </div>
                
                <div class="fp_middle_section_calander d-flex align-items-center justify-content-center">
                  <form action="" method="post" class="calendar_submit front_page_calendar_submit">
                    <div class="row align-items-center justify-content-center">
                      
                      <div class="col-12 col-sm-6 col-md-3 cal_item d-flex align-items-center justify-content-center departure">
                        <div class="row no-gutters">
                          <div class="col-12 cal_top_sec">
                            <span class="cal_top">TILL GOTLAND</span>
                          </div>
                          <div class="col-8 cal_numb_sec">
                            <h2>15</h2>
                          </div>
                          <div class="col-4 cal_mon_sec">
                            <h6>Aug</h6>
                            <i class="fas fa-chevron-down"></i>
                          </div>
                          <input type="hidden" class="joel_date_picker" />
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-6 col-md-3 cal_item d-flex align-items-center justify-content-center">
                        <div class="row no-gutters">
                          <div class="col-12 cal_top_sec">
                            <span class="cal_top">FRÅN GOTLAND</span>
                          </div>
                          <div class="col-8 cal_numb_sec">
                            <h2>17</h2>
                          </div>
                          <div class="col-4 cal_mon_sec">
                            <h6>Aug</h6>
                            <i class="fas fa-chevron-down"></i>
                          </div>                  
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-6 col-md-3 cal_item d-flex align-items-center justify-content-center">
                        <div class="row no-gutters">
                          <div class="col-12 cal_top_sec">
                            <span class="cal_top">DELTAGARE</span>
                          </div>
                          <div class="col-8 cal_numb_sec">
                            <h2>75</h2>
                          </div>
                          <div class="col-4 cal_mon_sec">
                            <i class="fas fa-chevron-up"></i>
                            <i class="fas fa-chevron-down"></i>
                          </div>                  
                        </div>
                      </div>
                      
                      <div class="col-12 col-sm-6 col-md-3 cal_item d-flex align-items-center justify-content-center">
                        <button class="cal_sub_btn">SKAPA <br />PLAN</button>
                      </div>
                    
                    </div>
                  </form>
                </div>
                <?php
                
                    //$frontpage_section_one_logo_slider_images
                    if( count($frontpage_section_one_logo_slider_images) > 0 || $frontpage_section_one_logo_slider_images[0] != ''){
                        ?>
                        <div class="brands">
                            <div class="container">
                              <div class="row">
                                  <div class="col">
                                      <div class="brands_slider_container">
                                          <div class="owl-carousel owl-theme brands_slider">
                                                <?php 
                                                foreach($frontpage_section_one_logo_slider_images as $image_key => $image){
                                                    ?>
                                                        <div class="owl-item">
                                                            <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo $image; ?>" alt="logo_<?php echo $image_key; ?>" /></a></div>
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
                        <?php
                    }else{
                        ?>
                        <div class="brands">
                            <div class="container">
                              <div class="row">
                                  <div class="col">
                                      <div class="brands_slider_container">
                                          <div class="owl-carousel owl-theme brands_slider">
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-eventyr-1.png" alt="eventyr" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-grant-1.png" alt="grant" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-af-1.png" alt="af" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-payex-1.png" alt="payex" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-ica-1.png" alt="ica" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-springconf-1.png" alt="springconf" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-spotify-1.png" alt="spotify" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-diplomat-1.png" alt="diplomat" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-industrin-1.png" alt="industrin" /></a></div>
                                              </div>
                                              <div class="owl-item">
                                                  <div class="brands_item d-flex flex-column justify-content-center"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/new_logos/logo-tco-1.png" alt="tco" /></a></div>
                                              </div>
                                              
                                          </div> <!-- Brands Slider Navigation -->
                                          <div class="brands_nav brands_prev d-none"><i class="fas fa-chevron-left"></i></div>
                                          <div class="brands_nav brands_next d-none"><i class="fas fa-chevron-right"></i></div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
        		
                
				<a href="#" class="joel_drop_down_btn"><i class="fas fa-chevron-down"></i></a>
				 <?php
                
                    //$frontpage_section_one_logo_slider_images
                    if( count($frontpage_section_one_header_bottom_logos) > 0 || $frontpage_section_one_header_bottom_logos[0] != '' ){
                        ?>
        				<div class="d-flex align-items-center justify-content-end joel_logos">
        					<?php 
                                foreach($frontpage_section_one_header_bottom_logos as $image_key => $image){
                                    ?>
        					        <img src="<?php echo $image; ?>" class="logos_img_one logos_img_key_<?php echo $image_key; ?>"/>
        				            <?php
                                }
        				    ?>
        				</div>
        				<?php
                    }else{
                        ?>
        				<div class="d-flex align-items-center justify-content-end joel_logos">
					        <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/Kammar_Logo@2x.png@2x.png" class="logos_img_one"/>
			        		<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/VisitaLogo@2x.png@2x.png" class="logos_img_two"/>    
        				</div>
        				<?php    
                    }
                ?>
				
			</div>
		</div>
</section>

<section class="joel_fp_extra_content_section">
    <?php
        if($frontpage_section_two_label_image != ''){
            ?>
            <img src="<?php echo $frontpage_section_two_label_image;?>" alt="label_image" class="fp_label_image"/>
            <?php
            //echo $frontpage_section_two_label_image;
        }
    ?>
    <div class="container">
      <div class="joel_fp_extra_part_one">
        <h3 class="joel_fp_extra_po_heading"><?php echo $frontpage_section_two_heading; ?></h3>
        <?php echo $frontpage_section_two_description; ?>
      </div>
      
      <div class="row joel_fp_extra_part_two">
        
        <div class="col-md-12 col-sm-12 circle_row_col">
          <div class="row no-gutters">
            <?php
                
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'one');
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'two');
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'three');
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'four');
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'five');
                gb_boka_fields_show($page_id ,'frontpage' , 'two', 'six');
            ?>
            <!--<a href="#" class="col-md-2 col-4 circle_thumbs d-flex circle_thumbs align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fixa_a.png" alt="Ellipse" class="img_circle"/>
              <span>BOKA <br />FLYGET</span>
            </a>
            
            <a href="#" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boka_a.png" alt="Ellipse" class="img_circle"/>
              <span>BOKA <br />FÄRJAN</span>
            </a>
          
            <a href="#" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boka_b.png" alt="Ellipse" class="img_circle"/>
              <span>BOKA <br />HOTELLET</span>
            </a>
            
            <a href="#" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boka_c.png" alt="Ellipse" class="img_circle"/>
              <span>BOKA <br />MÖTESRUM</span>
            </a>
            
            <a href="#" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boka_d.png" alt="Ellipse" class="img_circle"/>
              <span>FIXA <br />FESTERNA</span>
            </a>
            
            <a href="#" class="col-md-2 col-4 circle_thumbs d-flex circle_thumbs align-items-center justify-content-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fixa_b.png" alt="Ellipse" class="img_circle"/>
              <span>FIXA <br />AKTIVITETERNA</span>
            </a>-->
            
          </div>
        </div>
        
        <div class="col-md-12 col-sm-12 j_extra_btns d-flex align-items-center justify-content-center">
          <div class="row no-gutters">
            <div class="col-12 d-flex flex-column flex-sm-row align-items-center justify-content-center">
                <?php
                    gb_button_fields_show_two($page_id ,'frontpage' , 'two', 'one', '');
                    gb_button_fields_show_two($page_id ,'frontpage' , 'two', 'two', '');
                ?>
                <!---<a href="index.html" class="j_btns btn_light"><span>Ta reda på hur vi gör</span> <i class="fas fa-chevron-right"></i></a> 
                <a href="index.html" class="j_btns btn_bg"><span>Se vilka vi är</span> <i class="fas fa-chevron-right"></i></a>--->
              
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
</section>


<section class="joel_custom_box_section">
  <!--<div class="container">
    
    <div class="row align-items-center justify-content-center">
      <div class="col-12 joel_custom_box_heading">
        <h3>Rekomenderat för dig</h3>
      </div>
    </div>
    
  </div>-->
  
  
  <div class="joel_custom_boxes_container">
    <div class="row no-gutters">
      
      <div class="col-12 col-md-12 joel_custom_box_three">
        <img src="<?php echo $frontpage_section_three_image; ?>" alt="Box" class="box_bg"/>
        <div class="box_mirror"></div>
        <div class="container">
          <div class="row no-gutters align-items-center justify-content-start">
            <div class="col-md-6 col-sm-8 col-12">
              <h1 class="joel_cb_joining_write"></h1>
              <h2><?php echo $frontpage_section_three_heading; ?></h2>
              <?php echo $frontpage_section_three_description; ?>
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
    <div class="container">
    
        <?php
          $vhalfbox_one = $frontpage_section_three_halfbox_one_positon_vertically;
          $hhalfbox_one = $frontpage_section_three_halfbox_one_positon_horizontally;
          
            $o = $frontpage_section_three_halfbox_one_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
      <div class="row justify-content-center">
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $hhalfbox_one;?> justify-content-<?php echo $vhalfbox_one;?> joel_custom_box_one joel_custom_box" style="background-color: <?php echo $frontpage_section_three_halfbox_one_background_color; ?>; text-align: <?php echo $o;?>;">
            <?php 
                if( $frontpage_section_three_halfbox_one_image != '' ){
                ?>
                  <img src="<?php echo $frontpage_section_three_halfbox_one_image; ?>" alt="Box" class="box_bg"/>
                <?php
                }
            ?>
          <div class="box_mirror"></div>
            <div class="row no-gutters align-items-end justify-content-center joel_dark_bg">
                <div class="col-12">
                  <h1 class="joel_cb_joining_write" style="color: <?php echo $frontpage_section_three_halfbox_one_joining_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_one_joining_title; ?></h1>
                  <h2 style="color: <?php echo $frontpage_section_three_halfbox_one_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_one_title; ?></h2>
                  <?php echo $frontpage_section_three_halfbox_one_description; ?>
                  
                    <?php 
                        if( count($frontpage_section_three_halfbox_one_logos) > 0 && $frontpage_section_three_halfbox_one_logos[0] != ''){
                            ?>
                                <div class="joel_custom_box_logos">
                                    <?php
                                        foreach($frontpage_section_three_halfbox_one_logos as $logo_key => $logo){
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
        
        <?php
          $vhalfbox_two = $frontpage_section_three_halfbox_two_positon_vertically;
          $hhalfbox_two = $frontpage_section_three_halfbox_two_positon_horizontally;
          
            $o = $frontpage_section_three_halfbox_two_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $hhalfbox_two;?> justify-content-<?php echo $vhalfbox_two;?> joel_custom_box_two joel_custom_box" style="background-color: <?php echo $frontpage_section_three_halfbox_two_background_color; ?>; text-align: <?php echo $o;?>;">
            <?php 
                if( $frontpage_section_three_halfbox_two_image != '' ){
                ?>
                  <img src="<?php echo $frontpage_section_three_halfbox_two_image; ?>" alt="Box" class="box_bg"/>
                <?php
                }
            ?>
            <div class="box_mirror"></div>
            <div class="row no-gutters align-items-start justify-content-center joel_dark_bg">
                <div class="col-12">
                    <h1 class="joel_cb_joining_write" style="color: <?php echo $frontpage_section_three_halfbox_two_joining_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_two_joining_title; ?></h1>
                    <h2 style="color: <?php echo $frontpage_section_three_halfbox_two_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_two_title; ?></h2>
                    <?php echo $frontpage_section_three_halfbox_two_description; ?>
                  
                    <?php 
                        if( count($frontpage_section_three_halfbox_two_logos) > 0 && $frontpage_section_three_halfbox_two_logos[0] != ''){
                            ?>
                                <div class="joel_custom_box_logos">
                                    <?php
                                        foreach($frontpage_section_three_halfbox_two_logos as $logo_key => $logo){
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
        
        <?php
          $vhalfbox_three = $frontpage_section_three_halfbox_three_positon_vertically;
          $hhalfbox_three = $frontpage_section_three_halfbox_three_positon_horizontally;
          
            $o = $frontpage_section_three_halfbox_three_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $hhalfbox_three;?> justify-content-<?php echo $vhalfbox_three;?> joel_custom_box_two joel_custom_box" style="background-color: <?php echo $frontpage_section_three_halfbox_three_background_color; ?>; text-align: <?php echo $o;?>;">
            <?php 
                if( $frontpage_section_three_halfbox_three_image != '' ){
                ?>
                  <img src="<?php echo $frontpage_section_three_halfbox_three_image; ?>" alt="Box" class="box_bg"/>
                <?php
                }
            ?>
            <div class="box_mirror"></div>
            <div class="row no-gutters align-items-end justify-content-center joel_dark_bg">
                <div class="col-12">
                    <h1 class="joel_cb_joining_write" style="color: <?php echo $frontpage_section_three_halfbox_three_joining_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_three_joining_title; ?></h1>
                    <h2 style="color: <?php echo $frontpage_section_three_halfbox_three_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_three_title; ?></h2>
                    <?php echo $frontpage_section_three_halfbox_three_description; ?>
                  
                    <?php 
                        if( count($frontpage_section_three_halfbox_three_logos) > 0 && $frontpage_section_three_halfbox_three_logos[0] != ''){
                            ?>
                                <div class="joel_custom_box_logos">
                                    <?php
                                        foreach($frontpage_section_three_halfbox_three_logos as $logo_key => $logo){
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
        
        <?php
          $vhalfbox_four = $frontpage_section_three_halfbox_four_positon_vertically;
          $hhalfbox_four = $frontpage_section_three_halfbox_four_positon_horizontally;
          
            $o = $frontpage_section_three_halfbox_four_positon_horizontally;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
        
        <div class="col-12 col-md-6 d-flex align-items-<?php echo $hhalfbox_four;?> justify-content-<?php echo $vhalfbox_four;?> joel_custom_box_one joel_custom_box" style="background-color: <?php echo $frontpage_section_three_halfbox_four_background_color; ?>; text-align: <?php echo $o;?>;">
           <?php 
                if( $frontpage_section_three_halfbox_four_image != '' ){
                ?>
                  <img src="<?php echo $frontpage_section_three_halfbox_four_image; ?>" alt="Box" class="box_bg"/>
                <?php
                }
            ?>
            <div class="box_mirror"></div>
            <div class="row no-gutters align-items-start justify-content-center joel_dark_bg">
                <div class="col-12">
                    <h1 class="joel_cb_joining_write" style="color: <?php echo $frontpage_section_three_halfbox_four_joining_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_four_joining_title; ?></h1>
                    <h2 style="color: <?php echo $frontpage_section_three_halfbox_four_title_color; ?>; "><?php echo $frontpage_section_three_halfbox_four_title; ?></h2>
                    <?php echo $frontpage_section_three_halfbox_four_description; ?>
                  
                    <?php 
                        if( count($frontpage_section_three_halfbox_four_logos) > 0 && $frontpage_section_three_halfbox_four_logos[0] != ''){
                            ?>
                                <div class="joel_custom_box_logos">
                                    <?php
                                        foreach($frontpage_section_three_halfbox_four_logos as $logo_key => $logo){
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
    </div>
  </div>
  
</section>
<!-- End of frontpage Content -->
<?php 
  $film_button_link = get_theme_mod('film_button_link');
  if( $film_button_link == '' ){
    $film_button_link = 'https://www.youtube.com/watch?v=b4T8huZIcRw';
  }
  $film_button_link = str_replace('watch?v=', 'embed/', $film_button_link);
  
?>
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
        <iframe width="560" height="315" class="modal_video" data_src="<?php echo $film_button_link; ?>" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      
      <!-- Modal footer 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>-->
      
    </div>
  </div>
</div>

<script type="text/javascript">
//$frontpage_section_one_calender_link
    jQuery(document).ready(function($){
        $('.front_page_calendar_submit').click(function(){
            window.open(
              '<?php echo $frontpage_section_one_calender_link; ?>',
              '_blank' 
            );
        });
    });
    
</script>
<?php
    get_footer();
?>
