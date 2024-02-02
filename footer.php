
<footer class="joel_footer_section">
  <div class="container">
    <div class="footer_top_section row">
      <div class="col-12 col-md-8 left-widget">
        
        <!--<h5>För dig som arrangör av möten och konferenser på Gotland</h5>
        <ul class="d-flex flex-row joel_footer_links">
          <li><a href="">Upplevelser på Gotland</a></li>
          <li><a href="">Vårt team</a></li>
          <li><a href=""><span class="badge badge-pill badge-success">1</span>Jobb</a></li>
          <li><a href="">Almedalsveckan</a></li>
        </ul>
        
        <ul class="d-flex flex-row joel_follow">
          <li><span>Följ oss:</span></li>
          <li><a href="">LinkedIn</a></li>
          <li><a href="">Facebook</a></li>
          <li><a href="">Instagram</a></li>
        </ul>-->
        
        <?php if ( is_active_sidebar( 'top-left-widget' ) ) : ?>
          <?php dynamic_sidebar( 'top-left-widget' ); ?>
        <?php endif; ?>
      
      </div>
      <div class="col-12 col-md-4 right-widget d-flex flex-column align-items-center align-items-md-end justify-content-center">
        <?php if ( is_active_sidebar( 'top-right-widget' ) ) : ?>
          <?php dynamic_sidebar( 'top-right-widget' ); ?>
        <?php endif; ?>
      </div>
    </div>
    
    <div class="footer_bottom_section row">
      <div class="col-12 col-md-6 left-widget">
        <!--<ul class="d-flex flex-row">
          <li><a href="">Kontakta oss</a></li>
          <li><a href="">F.A.Q</a></li>
          <li><a href="">Integritetspolicy</a></li>
          <li><a href="">Cookies</a></li>
        </ul>-->
        
        <?php if ( is_active_sidebar( 'bottom-left-widget' ) ) : ?>
          <?php dynamic_sidebar( 'bottom-left-widget' ); ?>
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-6 right-widget d-flex flex-column align-items-center align-items-md-end justify-content-center">
        <?php if ( is_active_sidebar( 'bottom-right-widget' ) ) : ?>
          <?php dynamic_sidebar( 'bottom-right-widget' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<input type="hidden" class="get_admin_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>" />


<?php
    $gp_data_args = [
        'post_type' => 'card',
        'posts_per_page' => -1,
        'orderby' => 'ID',
        'order'   => 'DESC'
    ];
    $gp_data_query = new WP_Query( $gp_data_args );
    if( get_post_type() == 'card' || is_page_template( 'frontpage.php' ) ){
        
        if ( $gp_data_query->have_posts() ){
            while ( $gp_data_query->have_posts() ) {
                $gp_data_query->the_post();
                $gb_thumbnail_slider = get_post_meta(get_the_ID(), 'gb_thumbnail_slider', true);
                
                ?>
                <img src="<?php echo $gb_thumbnail_slider; ?>" class="joel_background_blur_image gbp_<?php echo get_the_ID(); ?>" style="display: none;"/>
                <?php
            }
        }
    }
?>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery-3.3.1.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery-ui.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/popper.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery.stellar.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery.countdown.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/swiper.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/aos.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/picturefill.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/lightgallery-all.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/jquery.mousewheel.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/photon/js/main.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/scrollForever.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/joel.js"></script>


<?php
  if ( is_page_template( 'frontpage.php' ) ) {
    ?>
    <script>
      $(document).ready(function(){
        
        
        //date_pick_selector('.joel_date_picker', '.fp_middle_section_calander .ui-datepicker-trigger','.departure');
        
        
        /*$(window).load(function(){
          $(".preload_container svg").delay(1000).fadeOut();
          $(".preload_container").delay(1000).fadeOut("slow");
        });*/
        
        //joel_scroll_to_the_target('.animate_down','', '.joel_fp_header_section');
        
        
        $('.joel_drop_down_btn').click(function(e){
          var $target = $('.joel_fp_extra_content_section'); 
          $('html,body').animate({scrollTop: $target.offset().top}, 1000);
          e.preventDefault();
        });
        
      });
      
    </script>
    <?php
  }
?>

  <script>
    
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
      
      //$("#myModal").modal();
      
      setInterval(function(){
        if( $('.swiper-button-next').hasClass('swiper-button-disabled') ){
          //$('.swiper-pagination span.swiper-pagination-bullet:eq(0)').trigger('click');
        }else{
          //$('.swiper-button-next').trigger('click');
        }
      },2000);
      
      //joel_filters_trigger_container
      
      $('.joel_filters_trigger_container .filters_btn').click(function(){
        var joel_filters_id = $(this).closest('.joel_filters_trigger_container').attr('data_target_id');
        joel_filters_id = '#' + joel_filters_id;
        $(joel_filters_id).toggleClass('d-flex');
        $(joel_filters_id).stop().slideToggle();
      });
      
      $(".swiper-container").scrollForever({
          placeholder: 0,
          dir: 'left',
          container: '.swiper-wrapper',
          inner: '.swiper-slide',
          speed: 1000,
          delayTime: 55,
          continuous: true,
          num: 1
          
          //https://www.jqueryscript.net/animation/jQuery-Plugin-For-Infinite-Any-Content-Scroller-scrollForever.html
      });
      
      $(' .joel_filters_buttons .nav-tabs').owlCarousel({
          loop: true,
          margin:10,   
          responsiveClass:true,
          autoplayHoverPause:true,
          autoplay:false,
          autoWidth:false,
          slideSpeed: 400,
          paginationSpeed: 400,
          autoplayTimeout: 3000,
          responsive:{
              0:{
                  items:2,
                  nav:true,
                  loop:false
              },
              450:{
                  items:3,
                  nav:true,
                  loop:false
              },
              768:{
                  items:4,
                  nav:true,
                  loop:false
              },
              992:{
                  items:8,
                  nav:true,
                  loop:false
              }
          }
      });
      
      
      //3
      <?php
        $data_args = [
          'post_type' => 'card',
          'posts_per_page' => -1,
          'orderby' => 'ID',
          'order'   => 'DESC'
        ];
        
        $data_query = new WP_Query( $data_args );
           
          if ( $data_query->have_posts() ){
            ?>
            var slider_target_json_data = {
              <?php
                while ( $data_query->have_posts() ) {
                  $data_query->the_post();
                  
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
                  $gb_youtube_video_link_new = explode('?', $gb_youtube_video_link);
                  $gb_youtube_video_link_new = str_replace('v=','', $gb_youtube_video_link_new[1]);
                  $gb_youtube_video_link_new = '/embed/' . $gb_youtube_video_link_new;
                  $gb_youtube_video_link = str_replace('/watch', $gb_youtube_video_link_new, $gb_youtube_video_link);
                  
                  $gb_contact_form_link = get_post_meta( get_the_ID(), 'gb_contact_form_link', true);
                  
                  $upplevelser_id = 'upplevelser_id=' . get_the_ID();
                  $gb_contact_form_link = str_replace('upplevelser_id=[pid]', $upplevelser_id , $gb_contact_form_link);
                  
                  $gb_extra_content = get_post_meta(get_the_ID(), 'gb_extra_content', true);
                  $gb_card_slider_images = get_post_meta( get_the_ID(), 'gb_card_slider_images', true);
                  ?>
                  "<?php echo get_the_ID(); ?>": {
                    "switches": {
                      "box_one": {
                        "joel_thin": "<?php echo $gb_part_one_a; ?>",
                        "joel_thick": "<?php echo $gb_part_one_b; ?>",
                      },
                      
                      "box_two": {
                        "joel_thin": "<?php echo $gb_part_two_a; ?>",
                        "joel_thick": "<?php echo $gb_part_two_b; ?>",
                      },
                      
                      "box_three": {
                        "joel_thin": "<?php echo $gb_part_three_a; ?>",
                        "joel_thick": "<?php echo $gb_part_three_b; ?>",
                      },
                      
                      "box_four": {
                        "joel_thin": "<?php echo $gb_part_four_a; ?>",
                        "joel_thick": "<?php echo $gb_part_four_b; ?>",
                      },
                      
                    },
                    
                    "joel_description_area_title": "<?php echo get_the_title(); ?>",
                    "joel_description_area_description": "<?php echo get_the_content(); ?>",
                    "joel_description_gadgets_logo": "<?php echo $gb_card_logo; ?>",
                    "joel_description_gadgets_logo_height": "<?php echo $gb_logo_height; ?>",
                    "joel_description_gadgets_logo_width": "<?php echo $gb_logo_width; ?>",
                    "film_link": "<?php echo $gb_youtube_video_link; ?>",
                    "book_link": "<?php echo $gb_contact_form_link; ?>",
                    "body_image": "<?php echo $gb_thumbnail_slider; ?>",
                    "card_slider_images": "<?php echo $gb_card_slider_images; ?>"
                  },
                  <?php
                }
                ?>
            };
            <?php  
          }
      ?>
      
      
        joel_frontpage_animation(slider_target_json_data);
        
        <?php
            if( is_page_template( 'artist.php' ) || is_page_template( 'single-card.php' ) || is_page_template( 'taxonomy-tabs.php' ) ){
                ?>
                setInterval(function(){
                    var get_target_id = $('.section_one.data_slider_section').attr('data_active_id');
                    var content = slider_target_json_data[get_target_id];
                    var film_link = content.film_link;
                    var fl = $('.film_link').attr('data-target');
                    
                    if(film_link == ''){
                        //Spela bildspel
                        $('.film_link').attr('data-target', '#myModalSlider');
                        $('.film_link').find('span').text('SPELA BILDSPEL');
                    }else{
                        $('.film_link').attr('data-target', '#myModal');
                        $('.film_link').find('span').text('SPELA FILM');
                    }
                    
                    $('.film_link').click(function(){
                        var get_target_id = $('.section_one.data_slider_section').attr('data_active_id');
                        var content = slider_target_json_data[get_target_id];
                        var card_slider_images = content.card_slider_images;
                        var fl = $(this).attr('data-target');
            
                        if(fl == '#myModalSlider'){
                            if(card_slider_images != ''){
                               card_slider_images = card_slider_images.split(',');
                                //console.log(card_slider_images);
                                var slider_html = '';
                                $.each(card_slider_images, function(i,v){
                                    
                                    if(v == card_slider_images[0]){
                                        slider_html = slider_html + '<div class="carousel-item active">';
                                    }else{
                                        slider_html = slider_html + '<div class="carousel-item">';
                                    }
                                    slider_html = slider_html + '<img src="' + v + '" alt="' + i + '" /></div>';
                                    
                                });
                                
                                $('.j_slider_model#myModalSlider').find('.carousel-inner').html(slider_html);
                            }
                        }
                    });  
                    
                },1000);
                <?php
            }
        ?>
      /*$(window).load(function(){
        $(".preload_container svg").delay(1000).fadeOut();
        $(".preload_container").delay(1000).fadeOut("slow");
      });*/
      
      
      
    });
    
  </script>
  

<?php
  if ( is_page_template( 'blog.php' ) ) {
    ?>
      <script>
        $(document).ready(function(){
          
          joel_page_func();
          
          $('.joel_drop_down_btn').click(function(e){
            var $target = $('.joel_fp_extra_content_section'); 
            $('html,body').animate({scrollTop: $target.offset().top}, 1000);
            e.preventDefault();
          });
          
        });
        
      </script>
    <?php
  }
?>

<?php
  if ( is_page_template( 'team.php' ) ) {
    ?>
      <script>
        $(document).ready(function(){
          
          
          
          $('.joel_drop_down_btn').click(function(e){
            var $target = $('.joel_fp_extra_content_section'); 
            $('html,body').animate({scrollTop: $target.offset().top}, 1000);
            e.preventDefault();
          });
          
          
          counter('.counter', '%');
        });
        
        jQuery(window).load(function(){
          jQuery(".preload_container svg").delay(1500).fadeOut(function(){
            
          });
          jQuery(".preload_container").delay(1500).fadeOut("slow");
          
        });
        
      </script>
    <?php
  }
?>

<?php
  if ( is_page_template( 'contact_form.php' ) ) {
    ?>
      <script>
        jQuery(document).ready(function($){
          
          joel_page_func();
          
          
          
          $('.joel_btns_gotland_form  .joel_next_btn').click(function(){
            
            if( $('.joe_follow_steps').val() == 'step_one' ){
              
              if( $('.guests-number').val() == '' || $('.guests-number').val() <= 0 ){
                  $('.guests-number').css('borderBottom', '2px solid #cd3232');
                  //d-none
                  $('.joel_tab_guests i.joel_req_field').removeClass('d-none');
              }else{
                  $('.guests-number').css('borderBottom', '2px solid #e1e1e1');
                  $('.joel_tab_guests i.joel_req_field').addClass('d-none');
                  
                  $('.gotland_form_step, table.joel_my_tab, .joel_cal_head').addClass('d-none');
                  $('.gotland_form_step_2').removeClass('d-none');
                  
                  $('.fp_middle_title_section_contaniner').addClass('d-none');
                  $('.fp_middle_title_section_contaniner.joel_form_part_two').removeClass('d-none');
                  
                  $('.joe_follow_steps').val('step_two');
                  $
                  setTimeout(function(){
                      $('.go_range_slider_unique:first-child').addClass('gb_anim_slide_now');
                  },400);
              }
              
            }else if( $('.joe_follow_steps').val() == 'step_two' ){
              
              $('.go_range_slider_unique .go_range_slider').each(function(){
                
                var range_target = $(this).attr('range_target');
                var data_class = '.joel_hidden_form_data .' + range_target;
                var t_range = $(this).val();
                
                $(data_class).val(t_range);
                
              });
              
              var contact_form_btn_text = $('.contact_form_btn_text').text();
              var contact_form_btn_text_val = $(this).text();
              
              $(this).text(contact_form_btn_text);
              $('.contact_form_btn_text').text(contact_form_btn_text_val);
              
              $('.gotland_form_step, table.joel_my_tab, .joel_cal_head').addClass('d-none');
              $('.gotland_form_step_3').removeClass('d-none');
              
              $('.fp_middle_title_section_contaniner').addClass('d-none');
              $('.fp_middle_title_section_contaniner.joel_form_part_three').removeClass('d-none');
              
              $('.joe_follow_steps').val('step_three');
              
              $('.joel_change_date_btn').addClass('d-none');
              $('.joel_change_range_data_btn').removeClass('d-none');
              
            }else if( $('.joe_follow_steps').val() == 'step_three' ){
              
              if( $('.email_subs_field').val() == '' ){
                
                  $('.email_subs_field').css('borderBottom', '2px solid #cd3232');
                  //d-none
                  $('.email_subs_col i.joel_req_field').removeClass('d-none');
                  
              }else{
                    
                    $('.email_subs_field').css('borderBottom', '2px solid #e1e1e1');
                    $('.email_subs_col i.joel_req_field').addClass('d-none');
                    $('.subs_email').val( $('.email_subs_field').val() );
                    
                    var get_admin_url = $('.get_admin_url').val();
                    var page_id = $('.j_page_id_detector').val();
                    var booking_id = '<?php echo $_GET['upplevelser_id']; ?>';
                    var j_departure_table = $('.joel_hidden_form_data .j_departure_table').val();
                    var j_comeback_table = $('.joel_hidden_form_data .j_comeback_table').val();
                    var j_guests = $('.joel_hidden_form_data .j_guests').val();
                    var ekonomisk = $('.joel_hidden_form_data .ekonomisk').val();
                    var mogen = $('.joel_hidden_form_data .mogen').val();
                    var kvinlig = $('.joel_hidden_form_data .kvinlig').val();
                    var lekfull = $('.joel_hidden_form_data .lekfull').val();
                    var avkopplande = $('.joel_hidden_form_data .avkopplande').val();
                    var staden = $('.joel_hidden_form_data .staden').val();
                    var subs_email = $('.joel_hidden_form_data .subs_email').val();
                    var t = $(this);
                    
                    var cf_data = {
                        action: "gb_default_contact_form",
                        'page_id': page_id,
                        'booking_id': booking_id,
                        'departure_date': j_departure_table,
                        'comeback_date': j_comeback_table,
                        'guests': j_guests,
                        'range_one': ekonomisk,
                        'range_two': mogen,
                        'range_three': kvinlig,
                        'range_four': lekfull,
                        'range_five': avkopplande,
                        'range_six': staden,
                        'email': subs_email,
                    };
                    
                    $.ajax({
                        type : "post",
                        dataType : "json",
                        url : get_admin_url,
                        data : cf_data,
                        success: function(response) {
                            console.log(response);
                            if(response.success && response.success != ''){
                                
                                $('.gotland_form_step, table.joel_my_tab, .joel_cal_head').addClass('d-none');
                                $('.gotland_form_step_4').removeClass('d-none');
                                $('.joel_btns_gotland_form').addClass('none_at_any_cost');
                                $('.joe_follow_steps').val('step_four');
                                $('.joel_req_field').addClass('d-none');
                                
                                $('.fp_middle_title_section_contaniner').addClass('d-none');
                                $('.fp_middle_title_section_contaniner.joel_form_part_four').removeClass('d-none');
                            }
                            
                            if(response.error && response.error != ''){
                                $('.joel_req_field').removeClass('d-none');
                                $('.joel_req_field').text(response.error);
                                
                            }
                        }
                        
                    });
                  
                }
              
            }
            
          });
          
          
          $('.joel_change_range_data_btn').click(function(){
            
            $('.gotland_form_step, table.joel_my_tab, .joel_cal_head').addClass('d-none');
            $('.gotland_form_step_2').removeClass('d-none');
            
            $('.joel_change_date_btn').removeClass('d-none');
            $('.joel_change_range_data_btn').addClass('d-none');
            
            var contact_form_btn_text = $('.contact_form_btn_text').text();
            var contact_form_btn_text_val = $('.joel_next_btn').text();
            
            $('.joel_next_btn').text(contact_form_btn_text);
            $('.contact_form_btn_text').text(contact_form_btn_text_val);
            
            $('.joe_follow_steps').val('step_two');
            
          });
          
          
          $('.joel_drop_down_btn').click(function(e){
            var $target = $('.joel_fp_extra_content_section'); 
            $('html,body').animate({scrollTop: $target.offset().top}, 1000);
            e.preventDefault();
          });
          
          setInterval(function(){
            
            joel_form_step_process('#month-body td','bg-info','.joel_hidden_form_data .joel_target_month_table', '.departure .cal_mon_sec h6', '.joel_tab_days', '.joel_tab_months','data-month');
            joel_form_step_process('#calendar-body td','bg-info','.joel_hidden_form_data .joel_target_days_table', '.departure .cal_numb_sec h2', '.joel_tab_nights', '.joel_tab_days','data_date');
            
            
            //Extend_one
            
            
            extend_one_joel_form_step_process('#night-body td', 'bg-info','.joel_hidden_form_data .joel_target_nights_table', '', '.joel_tab_years', '.joel_tab_nights', 'data-night', 'false');
            extend_one_joel_form_step_process('#years-body td', 'bg-info','.joel_hidden_form_data .joel_target_year_table', '', '.joel_tab_guests', '.joel_tab_years', 'data-year', 'true');
            //joel_form_step_process('#calendar-body td','bg-info','.joel_hidden_form_data .joel_target_days_table', '.departure .cal_numb_sec h2');
            
            
            //Reverse Functions
            joel_step_form_reverse('.departure .cal_mon_sec', '.gotland_form_step, table.joel_my_tab, .joel_cal_head','.gotland_form_step_1, .joel_tab_months', 'false','');
            joel_step_form_reverse('.departure .cal_numb_sec, .joel_btns_gotland_form .joel_change_date_btn', '.gotland_form_step, table.joel_my_tab, .joel_cal_head','.gotland_form_step_1, .joel_tab_days', 'false','.joel_hidden_form_data .joel_target_month_table');
            joel_step_form_reverse('.comeback .cal_numb_sec', '.gotland_form_step, table.joel_my_tab, .joel_cal_head','.gotland_form_step_1, .joel_tab_nights', 'false','.joel_hidden_form_data .joel_target_days_table');
            
            var joel_target_days_table = $('.joel_hidden_form_data .joel_target_days_table').val();
            
            if(joel_target_days_table != ''){
              $('#calendar-body td').each(function(){
                var get_attr = $(this).attr('data_date');
                $(this).removeClass('bg-info');
                
                if( get_attr == joel_target_days_table ){
                  $(this).addClass('bg-info');
                }
                
              });
            }
            
            
          },1000);
          
        });
        
      </script>
    <?php
  }
?>

<?php
  if ( is_page_template( 'landing_page.php' ) ) {
    ?>
      <script>
        jQuery(document).ready(function($){
          
          $('.cl').click(function(){
            
            var modal_video_src = $('.modal_video').attr('src');
            $('.modal_video').attr('src','');
            $('.modal_appear_btn').attr('modal_video_src', modal_video_src);
            
          });
          
          $('.modal_appear_btn').click(function(){
            
            if( $(this).attr('modal_video_src') !== false && typeof $(this).attr('modal_video_src') !== typeof undefined ){
              var sp_modal_video_src = $(this).attr('modal_video_src');
              $('.modal_video').attr('src',sp_modal_video_src);
            }
            
          });
          
          counter('.counter', '%');
          
          //$('#myVideo').play();
        });
        
        jQuery(window).load(function(){
          jQuery(".preload_container svg").delay(1500).fadeOut(function(){
            
          });
          jQuery(".preload_container").delay(1500).fadeOut("slow");
          
        });
        
        
      </script>
    <?php
  }else{
    
  ?>
  
    <script type="text/javascript">
      
        jQuery(window).load(function(){
          jQuery(".preload_container svg").delay(1500).fadeOut();
          jQuery(".preload_container").delay(1500).fadeOut("slow");
        });
        
    </script>
    
  <?php
  }
?>

<?php wp_footer(); ?>

</body>
</html>