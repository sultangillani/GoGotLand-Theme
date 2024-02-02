<?php
/**
* Template Name: Artist Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

	get_header();
	
	while ( have_posts() ) :
    		the_post();
	
	$pid = get_the_ID(); 
	
	$slider_args = [
	 
	 'post_type' => 'card',
	 'posts_per_page' => 7,
	 'meta_key'     => 'add_in_slider_switch',
	 'meta_value'   => 'yes',
	 'meta_compare' => '=',
	 'orderby' => 'ID',
	 'order'   => 'DESC'
	 
     ];
	
	$slider_query = new WP_Query( $slider_args );
	$slider_post_all_id = [];
	if ( $slider_query->have_posts() ){
		while ( $slider_query->have_posts() ) {
			$slider_query->the_post();
			array_push($slider_post_all_id, get_the_ID());
		}
	}
	
	$get_post = get_post($pid);
	//$get_post = get_post(396);
	//396
	$gb_thumbnail_slider = get_post_meta($get_post->ID, 'gb_thumbnail_slider', true);
	$gb_card_logo = get_post_meta($get_post->ID, 'gb_card_logo', true);
	
	$gb_part_one_a = get_post_meta( $get_post->ID , 'gb_part_one_a', true);
	$gb_part_one_b = get_post_meta( $get_post->ID , 'gb_part_one_b', true);
	
	$gb_part_two_a = get_post_meta( $get_post->ID , 'gb_part_two_a', true);
	$gb_part_two_b = get_post_meta( $get_post->ID , 'gb_part_two_b', true);
	
	$gb_part_three_a = get_post_meta( $get_post->ID , 'gb_part_three_a', true);
	$gb_part_three_b = get_post_meta( $get_post->ID , 'gb_part_three_b', true);
	
	$gb_part_four_a = get_post_meta( $get_post->ID , 'gb_part_four_a', true);
	$gb_part_four_b = get_post_meta( $get_post->ID , 'gb_part_four_b', true);
	
	$gb_logo_width = get_post_meta($get_post->ID, 'gb_logo_width', true);
	$gb_logo_height = get_post_meta($get_post->ID, 'gb_logo_height', true);
	$gb_youtube_video_link = get_post_meta( $get_post->ID, 'gb_youtube_video_link', true);
    $gb_youtube_video_link_new = explode('?', $gb_youtube_video_link);
    $gb_youtube_video_link_new = str_replace('v=','', $gb_youtube_video_link_new[1]);
    $gb_youtube_video_link_new = '/embed/' . $gb_youtube_video_link_new;
    $gb_youtube_video_link = str_replace('/watch', $gb_youtube_video_link_new, $gb_youtube_video_link);
	
	$gb_contact_form_link = get_post_meta( $get_post->ID, 'gb_contact_form_link', true);
	
	$upplevelser_id = 'upplevelser_id=' . $get_post->ID;
	$gb_contact_form_link = str_replace('upplevelser_id=[pid]', $upplevelser_id , $gb_contact_form_link);
	
	$gb_extra_content = get_post_meta($get_post->ID, 'gb_extra_content', true);
	
	$gb_card_slider_images = get_post_meta( $get_post->ID, 'gb_card_slider_images', true);
?>


<div class="che_sections_contain" champak="<?php echo $pid; ?>">
  <section class="section_one data_slider_section" id="section_one" data_active_id="<?php echo $get_post->ID; ?>">
      <div class="container">
        <div class="row justify-content-lg-center">
          <div class="joel_switches col-lg-10">
            <div class="row no-gutters joel_switches_row justify-content-center align-items-center">
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-6 joel_switch align-items-center justify-content-center box_one">
                <span class="joel_thin"><?php echo $gb_part_one_a; ?></span>
                <span class="joel_thick"><?php echo $gb_part_one_b; ?></span>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-6 joel_switch align-items-center justify-content-center box_two">
                <span class="joel_thin"><?php echo $gb_part_two_a; ?></span>
                <span class="joel_thick"><?php echo $gb_part_two_b; ?></span>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-6 joel_switch align-items-center justify-content-center box_three">
                <span class="joel_thin"><?php echo $gb_part_three_a; ?></span>
                <span class="joel_thick"><?php echo $gb_part_three_b; ?></span>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-6 joel_switch align-items-center justify-content-center box_four">
                <span class="joel_thin"><?php echo $gb_part_four_a; ?></span>
                <span class="joel_thick"><?php echo $gb_part_four_b; ?></span>
              </div>
              
            </div>
          </div>
        </div>
      </div>
  </section>
  
  <section class="section_two data_slider_section" id="section_two" data_active_id="<?php echo $get_post->ID; ?>">
      <div class="container joel_description_area">
        <div class="row align-items-center justify-content-center">
            
            <div class="col-12 col-md-10 text-center">
              
              <h4 class="joel_description_area_title"><?php echo $get_post->post_title; ?></h4>
              
              <div class="row align-items-center justify-content-center joel_description_area_row no-gutters">
                <div class="joel_description_area_description col-md-8"><?php echo $get_post->post_content; ?></div>
              </div>
              
              <div class="d-none d-lg-block">
                <div class="joel_description_gadgets row justify-content-center align-items-center no-gutters">
                  <div class="col-lg-3 col-sm-4 text-center joel_description_gadget film_link" data-toggle="modal" title="<?php echo $gb_youtube_video_link; ?>" data-target="<?php if($gb_youtube_video_link != ''){ echo '#myModal'; }else{ echo '#myModalSlider'; } ?>"><span>SPELA FILM</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/PLAY@2x.png@2x.png" class="icon_img"/></div>
                  <div class="col-lg-4 col-4 text-center joel_description_gadget"><img src="<?php echo $gb_card_logo; ?>" class="joel_description_gadgets_logo" alt="Activity LOGO" style="width: <?php echo $gb_logo_width; ?>; height: <?php echo $gb_logo_height; ?>;"/></div>
                  <a href="<?php echo $gb_contact_form_link; ?>" class="col-lg-3 col-4 text-center joel_description_gadget book_link"><span class="book" style="font-size: 12px;">Boka nu</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/TICKET@2x.png@2x.png" class="icon_img" style="width: 29px; height: 18px; margin-left: 8px; margin-bottom: 3px;"/></a>
                </div>
              </div>
              
              <div class="d-none d-sm-block d-md-block d-lg-none d-xl-none">
                <div class="joel_description_gadgets row justify-content-center align-items-center no-gutters">
                  <div class="col-lg-3 col-sm-4 text-center joel_description_gadget film_link" data-toggle="modal" data-target="<?php if($gb_youtube_video_link != ''){ echo '#myModal'; }else{ echo '#myModalSlider'; } ?>"><span>SPELA FILM</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/PLAY@2x.png@2x.png" class="icon_img"/></div>
                  <div class="col-lg-4 col-sm-4 text-center joel_description_gadget"><img src="<?php echo $gb_card_logo; ?>" class="joel_description_gadgets_logo" alt="Activity LOGO" style="width: <?php echo $gb_logo_width; ?>; height: <?php echo $gb_logo_height; ?>;" /></div>
                  <a href="<?php echo $gb_contact_form_link; ?>" class="col-lg-3 col-sm-4 text-center joel_description_gadget book_link"><span class="book" style="font-size: 12px;">Boka nu</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/TICKET@2x.png@2x.png" class="icon_img" style="width: 29px; height: 18px; margin-left: 8px; margin-bottom: 3px;"/></a>
                </div>
              </div>
              
              <div class="d-xs-block d-sm-none d-md-none d-lg-none d-xl-none">
                <div class="joel_description_gadgets row justify-content-center align-items-center no-gutters">
                  <div class="col-lg-4 col-sm-4 col-12 text-center joel_description_gadget"><img src="<?php echo $gb_card_logo; ?>" class="joel_description_gadgets_logo" alt="Activity LOGO" style="width: <?php echo $gb_logo_width; ?>; height: <?php echo $gb_logo_height; ?>;"/></div>
                  <div class="col-lg-3 col-sm-4 col-6 text-center joel_description_gadget film_link" data-toggle="modal" data-target="<?php if($gb_youtube_video_link != ''){ echo '#myModal'; }else{ echo '#myModalSlider'; } ?>"><span>SPELA FILM</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/PLAY@2x.png@2x.png" class="icon_img"/></div>
                  <a href="<?php echo $gb_contact_form_link; ?>" class="col-lg-3 col-sm-4 col-6 text-center joel_description_gadget book_link"><span class="book" style="font-size: 12px;">Boka nu</span> <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/TICKET@2x.png@2x.png" class="icon_img" style="width: 29px; height: 18px; margin-left: 8px; margin-bottom: 3px;"/></a>
                </div>
              </div>
              
          </div>
            
          <div class="row justify-content-center align-items-center konfere">
            <div class="col-12">        
              <p>Upptäck fler aktiviteter för er nästa konferens</p>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
    
<section class="section_three" id="section_three">
  <div class="container konferens">
    
    <div class="row">
      
      <div class="col-sm-12 d-flex justify-content-end joel_filters_trigger_container" data_target_id="joel_filters_id">        
        <button class="filters_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/menu@2x.png" class="icon_img"/> Populärast</button>
      </div>
      
      <div class="col-sm-12" id="joel_filters_id" style="display: none;">
        <div class="joel_filters_buttons d-flex">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php
					$tabs_terms = get_terms(
						array(
							'taxonomy' => 'tabs',
							'orderby' => 'term_id',
							'order' => 'ASC',
						)
					);
				?>
					
				<li class="nav-item">
					<a class="nav-link joel_filter_btn d-flex justify-content-center align-items-center active" id="<?php echo $tabs_terms[0]->slug; ?>-tab" data-toggle="tab" href="#<?php echo $tabs_terms[0]->slug; ?>" role="tab" aria-controls="<?php echo $tabs_terms[0]->slug; ?>" aria-selected="true"><?php echo $tabs_terms[0]->name; ?></a>
				</li>
				
				<?php
					foreach($tabs_terms as $key => $tab){
						if($key != 0){
							?>
								<li class="nav-item" key="<?php echo $key; ?>">
									<a class="nav-link joel_filter_btn d-flex justify-content-center align-items-center" id="<?php echo $tab->slug; ?>-tab" data-toggle="tab" href="#<?php echo $tab->slug; ?>" role="tab" aria-controls="<?php echo $tab->slug; ?>" aria-selected="true"><?php echo $tab->name; ?></a>
								</li>
							<?php
						}
					}
				?>
            
          </ul>
        </div>
      </div>
      
    </div>
    
    <div class="tab-content" id="myTabContent">
					<?php
						foreach($tabs_terms as $key => $tab){
							if($key == 0){
								?>
									<div class="tab-pane fade show active" id="<?php echo $tab->slug; ?>">
								<?php
							}else{
								?>
									<div class="tab-pane fade" id="<?php echo $tab->slug; ?>">
								<?php
							}
							?>
									<div class="row joel_thumbnail_content no-gutters">
										<?php
											$tab_args = array(
												'post_type' => 'card',
												'posts_per_page' => -1,
												'tax_query' => array(
													array(
														'taxonomy' => 'tabs',
														'field'    => 'slug',
														'terms'    => $tab->slug,
													)
												),
											);
											$tab_query = new WP_Query( $tab_args );
											
											if ( $tab_query->have_posts() ) {
												while ( $tab_query->have_posts() ) {
													$tab_query->the_post();
													$gb_thumbnail_slider = get_post_meta(get_the_ID(), 'gb_thumbnail_slider', true);
													$gb_card_logo = get_post_meta(get_the_ID(), 'gb_card_logo', true);
													$gb_card_thumbnail = get_post_meta(get_the_ID(), 'gb_card_thumbnail', true);
													
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
													?>
													<div class="col-12 col-sm-6 col-md-4 col-lg-3">
														<div class="card" target_data_id="<?php echo get_the_ID(); ?>">
																<div class="logo_container d-flex align-items-center justify-content-center">
																		<img src="<?php echo $gb_card_logo; ?>" alt="Card image cap" class="logo_img">
																</div>
																<img class="card-img-top" src="<?php echo $gb_card_thumbnail; ?>" alt="Card image cap">
																
																<div class="card-body">
																		<h5 class="card-heading"><?php echo get_the_title(); ?></h5>
																		<p class="card-text"><?php echo $get_post->post_excerpt; ?></p>
																</div>
														</div>
													</div>
													
													<?php
												}
											}
										?>
									</div>
								</div>
							<?php
						}
					?>
					
      <!--<div class="tab-pane fade show active" id="popularast">
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
    
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="6">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/klosterlängan_logog.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_3.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">I denna 800-åriga byggnad skapas idag helt unika exklusiva evenemang.</h5>
                <p class="card-text">Välkommen till det medeltida konventet Klosterlängan. Här arrangerar vi allt från mingel och fördrink till exklusiva middagar, möten och champagneprovningar.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="1">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/kultudralen_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/kultudralen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev 800 år av möten i en förstklassig och magisk eventmiljö.</h5>
                <p class="card-text">Tillsammans med Gotlands bästa restauratörer och underhållare skapar vi en oförglömlig upplevelse som vi garanterar kommer leva kvar i minnet hos Er. </p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="7">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/guidade.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Guidadeturer.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Låt öns bästa guider ta dig på er på en tur precis dit du vill.</h5>
                <p class="card-text">Våra turer som sträcker sig från innerstaden upp till rakbältena i norr och ner till Hoburgsgubben i söder. Du bestämmer om det är på cykel, i buss eller en härlig vandring.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="8">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/nolimits_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_4.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Vågar krypa ur trygghetszoner med fart, höjer eller småkryp.</h5>
                <p class="card-text">I den här aktiviteten sätter vi deltagarna på prov och utforskar no-go zones. Oavsett om det är rovdjur eller höjder så utmanar vi i vått och tort, högt och lågt. Rädslor blir hallon!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="9">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/gotbry.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_5.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev en riktig ölverkstad där det alltid pågår ett smakfullt experiment</h5>
                <p class="card-text">Under en ölprovning i det historiska bryggeriet innanför murarna kan du alltid känna dofterna från gäsningen, malten och passionen från bryggmästaren. </p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="10">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/kutkäldu_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/kutkäldu.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Vår hemligaste plats gömmer sig långt in i den gotländskaurskogen</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac scelerisque nisl. Proin enim enim, rutrum vel lorem sed, facilisis suscipit sapien. Mauris tristique nec arcu id lobortis. </p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="11">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/mb_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/mount_bike.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Låt öns bästa guider ta dig på er på en tur precis dit du vill.</h5>
                <p class="card-text">Våra turer som sträcker sig från innerstaden upp till rakbältena i norr och ner till Hoburgsgubben i söder. Du bestämmer om det är på cykel, i buss eller en härlig vandring.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="12">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="sma_grupper">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="stora_grupper">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="sommar">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="var">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="host">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="vinter">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="fysiska">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class=" tab-pane fade" id="avkopplande">
        
        <div class="row joel_thumbnail_content no-gutters">
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="3">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo_thumb.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_1.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Upplev ett medeltida Gotland med företaget anno 1300 a.c.</h5>
                <p class="card-text">Bland gränder och dimhöjda ruiner, gränder och annars låsta ruiner får ni lösa gåtor och uppgifter som kräver samarbete samtidigt som ni får uppleva världsarvsstaden Visby.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="2">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/Rectangle_2.png" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">En kommunikation och sammarbets- prövande aktivitet med massor skratt</h5>
                <p class="card-text">Denna övning sätter såväl samarbetsförmåga och kommunikation som konstnärlig talang på prov och allas kompetenser kommer verkligen att behövas när penslarna åker fram.</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="4">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/GUTASPELEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/gutaspelen.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Den gutniska femkampen lockar alltid fram tävlingsskallarna</h5>
                <p class="card-text">En pinne eller telefonstolpe, en bit rep, några kuddar och en varpa. Leken kan börja. Testa en bit gutnisk historia där förutsättningarna är enkla, att vinna är viktigt!</p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card" target_data_id="5">
              <div class="logo_container d-flex align-items-center justify-content-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Card image cap" class="logo_img">
              </div>
              <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/Thumbnails/skattkakl.jpg" alt="Card image cap">
              
              <div class="card-body">
                <h5 class="card-heading">Du vet aldrig vad du kan hitta i de gamla ruinerna eller i Visbys ringmur</h5>
                <p class="card-text">Visbys spännande historia går som en röd tråd genom aktiviteten och ni kommer att få uppleva Visby innerstads viktigaste sevärdheter samtidigt som ni alla jagar spillingskatten.</p>
              </div>
            </div>
          </div>
          
        </div>
      </div>-->
      
      <div class="row joel_view_more_btn_container justify-content-center">
        <div class="col-xs-12">
          <button class="joel_view_more_btn">Visa fler</button>
        </div>
      </div>
      
    </div>
      
    
  </div>
    
</section>

<?php
    if ( is_page_template( 'artist.php' ) || (is_single() && get_post_type() == 'card') ) {
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
                  <?php
                  $gb_youtube_video_link
                      ?>
                  <div class="modal-body">
                    <iframe width="560" height="315" class="modal_video" src="<?php echo $gb_youtube_video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  
                  <!-- Modal footer 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>-->
                  
                </div>
              </div>
            </div>
            
            <div class="modal fade j_slider_model" id="myModalSlider">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn btn-danger cl" data-dismiss="modal">×</button>
                  </div>
                  
                  <!-- Modal body -->
                  <?php
                  $gb_youtube_video_link
                      ?>
                  <div class="modal-body">
                    <div class="col-12 col-lg-12 blog_post_slider">
                        <div id="demo_347" class="carousel slide" data-ride="carousel">
                          
                              <!-- The slideshow -->
                            <div class="carousel-inner">
                            
                                <div class="carousel-item">
                                  <img src="http://new.gogotland.se/wp-content/uploads/2020/03/a.png" alt="0">
                                </div>
                                
                                <div class="carousel-item 1 active">
                                    <img src="http://new.gogotland.se/wp-content/uploads/2020/03/e.png" alt="1">
                                </div>
                                <div class="carousel-item 2">
                                    <img src="http://new.gogotland.se/wp-content/uploads/2020/03/c.png" alt="2">
                                </div>
                                
                            </div>
                          
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev cont" href="#demo_347" data-slide="prev">
                                <i class="fas fa-chevron-left" aria-hidden="true"></i>
                            </a>
                            <a class="carousel-control-next cont" href="#demo_347" data-slide="next">
                                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        
                        </div>
                    </div>
                    
                  </div>
                  
                  <!-- Modal footer 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>-->
                  
                </div>
              </div>
            </div>
            
        <?php
        
    }
?>

<?php
    endwhile;
	get_footer();
?>