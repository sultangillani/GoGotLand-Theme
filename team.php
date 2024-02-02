<?php
    /**
    * Template Name: Team Page
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header();
    
    //gb_show_new_field( get_the_ID(), 'landing_section_two_left_logo_one', $def_img, '');
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/images/jam3-agency-team.png';
    $team_section_one_header_image = gb_show_new_field( get_the_ID(), 'team_section_one_header_image', $def_img, '');
    $team_section_one_header_title = gb_show_new_field( get_the_ID(), 'team_section_one_header_title', 'Erfarenheten <br />sitter i väggarna.', '');
    $team_section_one_header_subtitle = gb_show_new_field( get_the_ID(), 'team_section_one_header_subtitle', 'Tillsammans hundratals år.', '');
    
    $team_section_two_title = gb_show_new_field( get_the_ID(), 'team_section_two_title', 'Hur kan vi utmana er?', '');
    $def_desc = '<p>Kan vi tillsammans bygga nya rustningar åt er personal? Utveckla talanger och behålla kompetenser.  <br>Tillsammans adressera utmaningar och skapar förutsättningar för lösningar.</p>';
    $team_section_two_description = gb_show_new_field( get_the_ID(), 'gb_team_section_two_description', $def_desc, '');
    
    $team_section_two_counter_one_from = gb_show_new_field( get_the_ID(), 'team_section_two_counter_one_from', '50', '');
    $team_section_two_counter_one_to = gb_show_new_field( get_the_ID(), 'team_section_two_counter_one_to', '78', '');
    $team_section_two_counter_one_extra_text = gb_show_new_field( get_the_ID(), 'team_section_two_counter_one_extra_text', 'använder oss för <br class="me_block_g_1200"> skapa engageman', '');
    
    $team_section_two_counter_two_from = gb_show_new_field( get_the_ID(), 'team_section_two_counter_two_from', '50', '');
    $team_section_two_counter_two_to = gb_show_new_field( get_the_ID(), 'team_section_two_counter_two_to', '80', '');
    $team_section_two_counter_two_extra_text = gb_show_new_field( get_the_ID(), 'team_section_two_counter_two_extra_text', 'sser konferenser på Gotland <br class="me_block_g_1200"> som ett klimatsmart alternativ', '');
    
    $team_section_two_counter_three_from = gb_show_new_field( get_the_ID(), 'team_section_two_counter_three_from', '50', '');
    $team_section_two_counter_three_to = gb_show_new_field( get_the_ID(), 'team_section_two_counter_three_to', '92', '');
    $team_section_two_counter_three_extra_text = gb_show_new_field( get_the_ID(), 'team_section_two_counter_three_extra_text', 'sanvänder event för att öka <br class="me_block_g_1200">försäljning och skapa leads', '');
    
    $team_section_two_counter_four_from = gb_show_new_field( get_the_ID(), 'team_section_two_counter_four_from', '50', '');
    $team_section_two_counter_four_to = gb_show_new_field( get_the_ID(), 'team_section_two_counter_four_to', '70', '');
    $team_section_two_counter_four_extra_text = gb_show_new_field( get_the_ID(), 'team_section_two_counter_four_extra_text', 'sanlitar oss för att <br class="me_block_g_1200">skapa lösningar', '');
    
    $team_section_two_counter_five_from = gb_show_new_field( get_the_ID(), 'team_section_two_counter_five_from', '50', '');
    $team_section_two_counter_five_to = gb_show_new_field( get_the_ID(), 'team_section_two_counter_five_to', '80', '');
    $team_section_two_counter_five_extra_text = gb_show_new_field( get_the_ID(), 'team_section_two_counter_five_extra_text', 'skonfererar på Gotland för att det <br class="me_block_g_1200">kokar av entreprenörsskap på ön', '');
    
    $team_section_three_heading = gb_show_new_field( get_the_ID(), 'team_section_three_heading', 'Det här kan vi göra för dig', '');
    $def_txt = '<p style="text-align: center;">Vi har en portfölj utav de absolut roligaste och upplevelserna på Gotland. Vårt mål är att göra det så smidigt som möjligt för dig - ge dig en kontakt till hela Gotland.</p>';
    $team_section_three_description = gb_show_new_field( get_the_ID(), 'team_section_three_description', $def_txt, '');
    
    $def_img = home_url('/') . '/wp-content/themes/jTheFunTheme/images/slide3.png';
    $team_section_four_image = gb_show_new_field( get_the_ID(), 'team_section_four_image', $def_img, '');
    $team_section_four_heading = gb_show_new_field( get_the_ID(), 'team_section_four_heading', "Finns ingen bättre plats <br class='d-none d-md-block'>för en riktig show", '');
    $def_desc = '<p class="box_text" style="text-align: left;">Fånga det perfekta ögonblicket under <br class="d-none d-md-block" />en föreställning i någon av våra ruiner.</p><p style="text-align: left;"><span style="color: #5dbb63;"><a style="color: #5dbb63;" href="#">Läs mer <i class="fas fa-chevron-right" aria-hidden="true"></i></a></span><a href="#"><span style="color: #5dbb63;">Boka eld</span> <i class="fas fa-chevron-right" aria-hidden="true"></i></a></p>';
    $team_section_four_description = gb_show_new_field( get_the_ID(), 'team_section_four_description', $def_desc, '');
    
    
    $page_id = get_the_ID();
?>

<!-- frontpage Content -->
<section class="joel_fp_header_section" style="background-image: url('<?php echo $team_section_one_header_image; ?>');">
    <div class="stage_video_overlay"></div>
    <!--<video autoplay="" muted="" loop="" id="myVideo" class="stage_video">
        <source src="video/gogotland_klipp_HD.mp4" type="video/mp4">circle_d
    </video>
    
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jam3-agency-team.png" id="myVideo" class="stage_video img-parallax" data-speed="-1"/>-->
    
		<div class="container">
			<div class="middle_section d-flex align-items-center justify-content-center">
				
                <div class="fp_middle_title_section_contaniner">
                  <h3 class="fp_middle_section_title"><?php echo $team_section_one_header_title; ?></h3>
                  <h5 class="fp_middle_section_subhead"><?php echo $team_section_one_header_subtitle; ?></h5>
                </div>
        
			</div>
		</div>
</section>

<section class="joel_fp_extra_content_section">
    <div class="container">
      <div class="joel_fp_extra_part_one">
        <h3 class="j_detail_head"><?php echo $team_section_two_title; ?></h3>
        <?php echo $team_section_two_description; ?>
      </div>
      
      <div class="row joel_fp_extra_part_three">
        
        <div class="col-lg-12 col-12 joel_counters">
          <div class="row no-gutters">
            
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex joel_counters_cont align-items-start justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $team_section_two_counter_one_to; ?>"><?php echo $team_section_two_counter_one_from; ?></h2>
                <span><?php echo $team_section_two_counter_one_extra_text; ?></span>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex joel_counters_cont align-items-start justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $team_section_two_counter_two_to; ?>"><?php echo $team_section_two_counter_two_from; ?></h2>
                <span><?php echo $team_section_two_counter_two_extra_text; ?></span>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex joel_counters_cont align-items-start justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $team_section_two_counter_three_to; ?>"><?php echo $team_section_two_counter_three_from; ?></h2>
                <span><?php echo $team_section_two_counter_three_extra_text; ?></span>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex joel_counters_cont align-items-start justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $team_section_two_counter_four_to; ?>"><?php echo $team_section_two_counter_four_from; ?></h2>
                <span><?php echo $team_section_two_counter_four_extra_text; ?></span>
              </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex joel_counters_cont align-items-start justify-content-center">
              <div class="j_count">
                <h2 class="counter" data-count="<?php echo $team_section_two_counter_five_to; ?>"><?php echo $team_section_two_counter_five_from; ?></h2>
                <span><?php echo $team_section_two_counter_five_extra_text; ?></span>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      
      <!---<div class="row joel_fp_extra_part_four">
        <div class="col-12 joel_client_logos">
          <ul class="joel_client_logos_list">
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-eventyr-1-1.png" alt="eventyr" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-grant-1-1.png" alt="grant" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-af-1-1.png" alt="af" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-payex-1-1.png" alt="payex" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-ica-1-1.png" alt="ica" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-springconf-1-1.png" alt="springconf" /></a></li>
            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/logo-spotify-1-1.png" alt="spotify" /></a></li>
          </ul>
        </div>
      </div>--->
      
      
    </div>
</section>

<?php
    $team_members_arg = [
        'post_type' => 'gb_member',
    	 'posts_per_page' => -1,
    	 'meta_key'     => 'gb_member_switch_data',
    	 'meta_value'   => 'yes',
    	 'meta_compare' => '=',
    	 'orderby' => 'ID',
    	 'order'   => 'ASC'
    ];
    
    $team_members_query = new WP_Query( $team_members_arg );
    
    if ( $team_members_query->have_posts() ){
        
        ?>
        <section class="joel_contact_company_details_section">
            <div class="container">
              <div class="row">
                <?php
                while ( $team_members_query->have_posts() ) {
        			$team_members_query->the_post();
        			$team_section_member_email = gb_show_new_field( get_the_ID(), 'team_section_member_email', 'someone@gmail.com', '');
        			$team_section_member_phone_number = gb_show_new_field( get_the_ID(), 'team_section_member_phone_number', '073 213 32 21', '');
        			$team_section_member_phone_number_with_country_code = gb_show_new_field( get_the_ID(), 'team_section_member_phone_number_with_country_code', '+46732133221', '');
        			
        			//team_section_member_image
        			$def_img = get_stylesheet_directory_uri() . '/images/circle_d.png';
        			$team_section_member_image = gb_show_new_field( get_the_ID(), 'team_section_member_image', $def_img, '');
        			$team_section_member_hover_image = gb_show_new_field( get_the_ID(), 'team_section_member_hover_image', $def_img, '');
        			$designation = get_the_terms( get_the_ID(), 'designation' );
        			$designation_count = count($designation);
        			?>
        			<div class="col-lg-4 col-md-6 col-sm-6 joel_contact_pic">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4 d-flex justify-content-center">
                              <img src="<?php echo $team_section_member_image; ?>" alt="white_circle" class="img-circle"/>
                              <img src="<?php echo $team_section_member_hover_image; ?>" alt="white_circle" class="hov_img-circle" style="display:none;"/>
                            </div>
                            <div class="col-8">
                               <h4><?php echo get_the_title(); ?></h4>
                               <p><a href="mailto:<?php echo $team_section_member_email; ?>"><?php echo $team_section_member_email; ?></a> &nbsp;</p>
                               <span><a href="tel:<?php echo $team_section_member_phone_number_with_country_code; ?>"><?php echo $team_section_member_phone_number; ?></a></span>
                                <i>
                                    <?php
                                        foreach( $designation as $key => $d ){
                                            if( ($designation_count - 1) == $key ){
                                                echo $d->name;	
                                            }else{
                                                echo $d->name . ', ';	
                                            }
                             	 	    }
                                    ?>
                                </i>
                            </div>
                        </div>
                    </div>
        			<?php
        		}
                ?>
                
              </div>
            </div>
        </section>
        <?php
		
    }
?>

        

<section class="joel_fp_extra_content_section joel_contact_extra_content_section">
    <div class="container">
       <div class="joel_fp_extra_part_one">
            <h3 class="joel_fp_extra_po_heading"><?php echo $team_section_three_heading; ?></h3>
            <?php echo $team_section_three_description; ?>
       </div>
      
      <div class="row joel_fp_extra_part_two">
        
        <div class="col-md-12 col-sm-12 circle_row_col">
          <div class="row no-gutters">
            
            <?php
                gb_boka_fields_show( $page_id, 'team', 'three', 'one' );
                gb_boka_fields_show( $page_id, 'team', 'three', 'two' );
                gb_boka_fields_show( $page_id, 'team', 'three', 'three' );
                gb_boka_fields_show( $page_id, 'team', 'three', 'four' );
                gb_boka_fields_show( $page_id, 'team', 'three', 'five' );
                gb_boka_fields_show( $page_id, 'team', 'three', 'six' );
            ?>
            
          </div>
        </div>
        
        <div class="col-md-12 col-sm-12 j_extra_btns d-flex align-items-center justify-content-center">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
                <?php 
                    gb_button_fields_show($page_id, 'team', 'three', 'one', '');
                    gb_button_fields_show($page_id, 'team', 'three', 'two', 'bg');
                ?> 
              <!--<a href="index.html" class="j_btns btn_light">Upptäck aktiviteter</a> 
              <a href="index.html" class="j_btns btn_bg">Skapa plan </a>-->
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
        <img src="<?php echo $team_section_four_image; ?>" alt="Box" class="box_bg">
        <div class="box_mirror"></div>
        <div class="container">
          <div class="row no-gutters align-items-center justify-content-start">
            <div class="col-md-6 col-sm-8 col-12">
              <h1 class="joel_cb_joining_write"></h1>
              <h2><?php echo $team_section_four_heading; ?></h2>
              
              <?php echo $team_section_four_description; ?>
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
<!-- End of frontpage Content -->
<?php
    get_footer();
?>
