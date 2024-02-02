<!DOCTYPE html>

<html>
<head>
    <title><?php wp_title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/fonts/icomoon/style.css">
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/lightgallery.min.css">    
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/swiper.css">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/aos.css">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/photon/css/style.css">
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js" ></script>
    <meta name="google-site-verification" content="G2oMgCR3kL64hg9EX3J7Cw-BZd0QmxANe1Wd4lycf3I" />
    
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/icons'; ?>/favicon.png">
    <?php
        $contact_form_section_one_base_color = gb_show_new_field( get_the_ID(), 'contact_form_section_one_base_color', '#76A674', '');
        $contact_form_section_one_base_background_color = gb_show_new_field( get_the_ID(), 'contact_form_section_one_base_background_color', '#f5f5f5', '');
    ?>
    
    <style type="text/CSS">
        .joel_my_card .joel_my_tab td:hover > span{
            background-color: <?php echo $contact_form_section_one_base_background_color; ?>;
            color: <?php echo $contact_form_section_one_base_color; ?>;    
        }
        
        .joel_my_card .joel_my_tab td.bg-info span{
            background-color: <?php echo $contact_form_section_one_base_background_color; ?>;
            color: <?php echo $contact_form_section_one_base_color; ?>;  
        }
        .user_page_content_body{
            min-height: 100px;
            
        }
        
        .user_page_content_body *{
            color: #fff;
            font-family: Raleway;
        }
        .joel_filters_buttons .nav-tabs .owl-item{
            vertical-align: top;
        }
        <?php
            //margin: 40px 0px;
            $user_agent = $_SERVER['HTTP_USER_AGENT']; 
            if (stripos( $user_agent, 'Chrome') !== false)
            {
                
            }
            
            elseif (stripos( $user_agent, 'Safari') !== false)
            {
            ?>
                .joel_contact_page .joel_fp_header_section{
                    z-index: -1;
                }
                @media (max-width: 575px) {
                   
                    .joel_contact_page .joel_fp_header_section{
                        background-attachment: initial;
                        z-index: -1;
                    }   
                }
            <?php   
            }
            
            if( is_404() ){
                ?>
                .user_page_content_body{
                    min-height: 100px;
                    margin: 100px 0px;
                    text-align: center;
                    font-family: Raleway;
                }
                
                .joel_slide_top_fix{
                    top: 0px;
                }
                <?php
            }
            
            if( ( is_page() && !is_page_template() ) || is_single() || is_archive() || is_404()) {
                $slider_option_switch = get_post_meta( get_the_ID(), 'slider_option_switch', true);
                
                if( ($slider_option_switch && $slider_option_switch == 'no') || !$slider_option_switch ){
                    if( !is_single() || ( is_single() && get_post_type() != 'card' ) ){
                        if( ( !is_tax('tabs') && get_post_type() != 'card') ){
                            ?>
                            .header_section .nav_section{
                                position: relative;
                            }
                            <?php
                        }
                    }
                }            
            }
        ?>
        
    </style>
    <script type="text/javascript">
        <?php
            if (stripos( $user_agent, 'Chrome') !== false)
            {
                
            }
            
            elseif (stripos( $user_agent, 'Safari') !== false)
            {
            ?>
                jQuery(document).ready(function($) {
                  
                  $(window).on('scroll', function() {
                    yPos = window.pageYOffset;
                    shift = yPos * 0.8 + 'px';
                    $('.joel_contact_page .joel_fp_header_section').css('top', shift);
                  });
                
                });
            <?php   
            }
        ?>
    </script>
</head>
<?php
  if ( is_page_template( 'landing_page.php' ) ) {
    
    echo '<body class="joel_landing_page_one">';
    
  }elseif ( is_page_template( 'frontpage.php' ) ) {
    
    echo '<body class="joel_front_page joel_landing_page_one">';
    
  }elseif ( is_page_template( 'artist.php' ) ) {
    
    echo '<body>';
    
  }elseif ( is_page_template( 'blog.php' ) ) {
    
    echo '<body class="joel_front_page joel_landing_page_one joel_html_page">';
    
  }elseif ( is_page_template( 'team.php' ) ) {
    
    echo '<body class="joel_front_page joel_landing_page_one joel_contact_page">';
    
  }elseif ( is_page_template( 'contact_form.php' ) ) {
    
    echo '<body class="joel_front_page joel_landing_page_one joel_html_page joel_html_contact_form">';
    
  }else{
    
    echo '<body class="joel_front_page joel_landing_page_one joel_html_page">';
    
  }
?>


<?php
  if ( is_page_template( 'blog.php' ) ) {
    $gb_email_title_text = get_option('gb_email_title_text');
    $gb_email_placeholder_text = get_option('gb_email_placeholder_text');
    $gb_email_extra_text = get_option('gb_email_extra_text');
    $gb_email_submit_text = get_option('gb_email_submit_text');
    $gb_email_submit_color = get_option('gb_email_submit_color');
    ?>
      <div class="j_gid_subs_form d-none"  >
  
        <div class="joel_email_subs_section" data_id="0">
          <div class="row email_subs_row no-gutters justify-content-center align-items-center">
            <div class="col-12 col-lg-10 email_subs_col">
              <h2 class="email_subs_head"><i class="fas fa-chevron-right" aria-hidden="true"></i><?php echo $gb_email_title_text; ?></h2>
              <input type="text" class="email_subs_field" name="email_subs_field" placeholder="<?php echo $gb_email_placeholder_text; ?>">
              <div class="email_subs_btn_container second_email_subs_btn">
                <input type="button" class="email_subs_button" id="email_subs_button" value="<?php echo $gb_email_submit_text; ?>" style="background: <?php echo $gb_email_submit_color; ?>;">
                <input type="hidden" class="email_subs_data_id" id="email_subs_data_id" name="email_subs_data_id" value="0">
              </div>
              <p><?php echo $gb_email_extra_text; ?></p>
            </div>
          </div>
        </div>
        
      </div>
      
    <?php  
  }
?>

<?php
  if(is_front_page()){
    ?>
      <div class="preload_container">
        <svg id="gogotland-logo" xmlns="http://www.w3.org/2ffffff/svg" viewBox="0 0 309.116 324.165">
          <g>
            <path id="circle-bot" d="M92.548,284.8a54.226,54.226,0,1,0-54.226-54.226A54.226,54.226,0,0,0,92.548,284.8" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="33.7"/>
            <path id="circle-mid" d="M270.794,162.037a54.226,54.226,0,1,1-54.226-54.226A54.226,54.226,0,0,1,270.794,162.037Z" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="33.7"/>
            <path id="circle-top" d="M92.548,39.368A54.226,54.226,0,1,1,38.322,93.594,54.226,54.226,0,0,1,92.548,39.368" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="33.7"/>
            <path id="circle-line" d="M187.35,39.368h-94.8" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="33.7"/>
          </g>
        </svg>
        
        <style>
          @-webkit-keyframes draw-in-circles {
              20%, 80% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          @keyframes draw-in-circles {
              20%, 80% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          @-webkit-keyframes draw-in-top {
              0%, 100% {
                  stroke-dashoffset: 341;
              }
              15%, 85% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          @keyframes draw-in-top {
              0%, 100% {
                  stroke-dashoffset: 341;
              }
              15%, 85% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          @-webkit-keyframes draw-move {
              0%, 10%, 90%, 100% {
                  stroke-dashoffset: 95;
                  -webkit-transform: translateX(50px);
                          transform: translateX(50px);
              }
              20%, 80% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          @keyframes draw-move {
              0%, 10%, 90%, 100% {
                  stroke-dashoffset: 95;
                  -webkit-transform: translateX(50px);
                          transform: translateX(50px);
              }
              20%, 80% {
                  stroke-dashoffset: 0;
                  -webkit-transform: none;
                          transform: none;
              }
          }
          
          #gogotland-logo #circle-bot, 
          #gogotland-logo #circle-mid {
              -webkit-animation: draw-in-circles 3s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95) both;
                      animation: draw-in-circles 3s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95) both;
          }
          #gogotland-logo #circle-top {
              -webkit-animation: draw-in-top 3s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95) both;
                      animation: draw-in-top 3s infinite cubic-bezier(0.445, 0.05, 0.55, 0.95) both;	
          }
          #gogotland-logo #circle-line {
              stroke-dasharray: 95;
              stroke-dashoffset: 95;
              -webkit-animation: draw-move 3s infinite cubic-bezier(0.39, 0.575, 0.565, 1) both;
                      animation: draw-move 3s infinite cubic-bezier(0.39, 0.575, 0.565, 1) both;
          }
          
          #gogotland-logo #circle-bot {
              stroke-dasharray: 341;
              stroke-dashoffset: 341;
              -webkit-transform: translate(30px, -30px);
                  -ms-transform: translate(30px, -30px);
                      transform: translate(30px, -30px);
          }
          
          #gogotland-logo #circle-top {
              stroke-dasharray: 341;
              stroke-dashoffset: 341;
              -webkit-transform: translate(30px, 30px);
                  -ms-transform: translate(30px, 30px);
                      transform: translate(30px, 30px);
          }
          
          #gogotland-logo #circle-mid {
              stroke-dasharray: 341;
              stroke-dashoffset: 341;
              -webkit-transform: translate(-40px, 0px);
                  -ms-transform: translate(-40px, 0px);
                      transform: translate(-40px, 0px);
          }
        
        </style>
      </div>
    <?php
  }
?>
<?php
  $header_option_switch = get_post_meta( get_the_id(), 'header_option_switch', true);
  $header_logo_dark = get_theme_mod('dark_header_logo');
  
  if( $header_logo_dark == '' ){
    $header_logo_dark = get_template_directory_uri() . '/icons/goGotland_fullfarg_Logo@2x.png@2x.png';
  }
  
  $light_header_logo = get_theme_mod('light_header_logo');
  if( $light_header_logo == '' ){
    $light_header_logo = get_template_directory_uri() . '/icons/VitLogo@2x.png@2x.png';
  }
  
  
  $dark_header_film_button_icon = get_theme_mod('dark_header_film_button_icon');
  if( $dark_header_film_button_icon == '' ){
    $dark_header_film_button_icon = get_template_directory_uri() . '/icons/PLAY_bg.png';
  }
  
  $film_button_name = get_theme_mod('film_button_name');
  if( $film_button_name == '' ){
    $film_button_name = 'SPELA FILM';
  }
  
?>


<input type="hidden" class="j_page_id_detector" value="<?php echo get_the_ID(); ?>"/>
<header id="header_section" class="header_section <?php if($header_option_switch && $header_option_switch == 'dark'){ echo 'header_two'; }?>">
    <div class="joel_slide_menu d-flex flex-column">
        <div class="joel_slide_menu_mid_container d-flex flex-column">
        
            <div class="joel_slide_top_menu d-none d-sm-flex align-items-center justify-content-center">
                <?php
                    $args = [
                        'menu' => 'top-header-menu',    
                    ];
                    wp_nav_menu( $args );
                ?>
            </div>
            
            <div class="joel_slide_main_menu d-flex align-items-center justify-content-center">
                <?php
                    $args = [
                        'menu' => 'header-menu',    
                    ];
                    wp_nav_menu( $args );
                ?>
            </div>
            
            <div class="joel_slide_top_menu joel_slide_top_menu_mob d-flex d-sm-none align-items-center justify-content-center">
                <?php
                    $args = [
                        'menu' => 'top-header-menu',    
                    ];
                    wp_nav_menu( $args );
                ?>
            </div>
            
            <?php if ( is_active_sidebar( 'menu-bottom-widget' ) ) : ?>
                <div class="joel_menu_bottom_widget d-flex align-items-center justify-content-center">
                     <?php dynamic_sidebar( 'menu-bottom-widget' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
      $phone_number_text_field = get_theme_mod('phone_number_text_field');
      $phone_number_text_field_with_code = get_theme_mod('phone_number_text_field_with_code');
      
      if($header_option_switch && $header_option_switch == 'dark'){
        ?>
         
          <nav class="nav_section d-block" id="nav_section">
              <div class="container-fluid">
                  <div class="row">
                        <div class="col-8 joel_contact">
                            <div id="nav-icon1">
                              <span></span>
                              <span></span>
                              <span></span>
                            </div>
                        
                            <a href="tel:<?php echo $phone_number_text_field_with_code; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/phone_2.png" /> <b><?php echo $phone_number_text_field; ?></b></a>
                            <?php
                            
                            if ( is_page_template( 'frontpage.php' ) ) {
                                ?>
                                    <div class="col-6 col-lg-3 text-center joel_description_gadget film_link d-none d-sm-block" data-toggle="modal" data-target="#myModal">
                                        <span><?php echo $film_button_name; ?></span>
                                        <img src="<?php echo $dark_header_film_button_icon; ?>" class="icon_img"/>
                                    </div>
                                <?php
                            }
                            ?>
                        </div>
                      
                      <div class="col-4 text-right joel_logo">
                          <!--<a class="navbar-brand text-right" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/goGotland_fullfarg_Logo@2x.png@2x.png" alt="logo"/></a>-->
                          <a class="navbar-brand text-right" href="<?php echo home_url('/'); ?>"><img src="<?php echo $header_logo_dark; ?>" alt="logo"/></a>                        
                      </div>
                  </div>
              </div>
          </nav>
          
          <nav class="nav_section d-none" id="nav_section">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12 text-center joel_logo">
                            <a class="navbar-brand text-right" href="<?php echo home_url('/'); ?>"><img src="<?php echo $header_logo_dark; ?>" alt="logo"/></a> 
                      </div>
                      
                      <a href="tel:<?php echo $phone_number_text_field_with_code; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/phone_2.png" /> <b><?php echo $phone_number_text_field; ?></b></a>
                        <div id="nav-icon1">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                  </div>
              </div>
          </nav>
          
        <?php
      }else{
        ?>
          <nav class="nav_section d-block" id="nav_section">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-8 col-sm-8 joel_contact">
                        <div id="nav-icon1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                        <a href="tel:<?php echo $phone_number_text_field_with_code; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/PHONE@2x.png@2x.png" /> <b><?php echo $phone_number_text_field; ?></b></a>
                        <?php
                            if ( is_page_template( 'frontpage.php' ) ) {
                                ?>
                                    <div class="col-6 col-lg-3 text-center joel_description_gadget film_link d-none d-sm-block joel_front_page_film_link" data-toggle="modal" data-target="#myModal">
                                        <span><?php echo $film_button_name; ?></span>
                                        <img src="<?php echo $dark_header_film_button_icon; ?>" class="icon_img"/>
                                    </div>
                                <?php
                            }
                        ?>
                      </div>
                      <div class="col-4 col-sm-4 text-right joel_logo">
                          <a class="navbar-brand text-right" href="<?php echo home_url('/'); ?>"><img src="<?php echo $light_header_logo; ?>" alt="logo"/></a>
                      </div>
                  </div>
              </div>
          </nav>
          
          <nav class="nav_section d-none" id="nav_section">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12 text-center joel_logo">
                            <a class="navbar-brand text-right" href="<?php echo home_url('/'); ?>"><img src="<?php echo $light_header_logo; ?>" alt="logo"/></a>
                      </div>
                      
                      <a href="tel:<?php echo $phone_number_text_field_with_code; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/PHONE@2x.png@2x.png" /> <b><?php echo $phone_number_text_field; ?></b></a>
                        <div id="nav-icon1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                  </div>
              </div>
          </nav>
          
        <?php
      }
    ?>
    
    
    
    <?php
      if( get_post_type() == 'page' || (is_single() && get_post_type() == 'card') || (is_tax('tabs') && get_post_type() == 'card') ){
        $slider_option_switch = get_post_meta( get_the_id(), 'slider_option_switch', true);
        if( ( $slider_option_switch && $slider_option_switch == 'yes' ) || ( is_single() && get_post_type() == 'card' ) || (is_tax('tabs') && get_post_type() == 'card') ){
           
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
          if ( $slider_query->have_posts() ){ ?>
              <section class="slider_section" id="slider_section">
                  <div class="joel_slider_constant_title">
                    <h1>Låt äventyret börja.</h1>
                  </div>
                  
                  <div class="swiper-container images-carousel">
                      <div class="swiper-wrapper">
                          <?php
                          while ( $slider_query->have_posts() ) {
                            $slider_query->the_post();
                            $gb_thumbnail_slider = get_post_meta(get_the_ID(), 'gb_thumbnail_slider', true);
                            $gb_card_logo = get_post_meta(get_the_ID(), 'gb_card_logo', true);
                            ?>
                            <div class="swiper-slide" target_data_id="<?php echo get_the_ID(); ?>" >
                              <div class="image-wrap">
                                <div class="image-info">
                                  <img src="<?php echo $gb_card_logo; ?>" alt="Activity Image" class="act_logo"/>
                                </div>
                                <img src="<?php echo $gb_thumbnail_slider; ?>" alt="Image">
                              </div>
                            </div>
                            <?php
                          }
                          ?>
                          <!--<div class="swiper-slide" target_data_id="2">
                            
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/The_artist_logo.png" alt="Activity Image" class="act_logo"/>
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/The Artist@2x.jpg" alt="Image">
                            </div>
                          </div>
                          <div class="swiper-slide" target_data_id="3">
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Slaget_om_visby_logo.png" alt="Activity Image" class="act_logo" />
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/Visby2x.jpg" alt="Image">
                            </div>
                          </div>
                          <div class="swiper-slide" target_data_id="4">
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Gotland_Grand_Pr_xLogo.png" alt="Activity Image" class="act_logo"/>
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/GotlandPrix@2x.jpg" alt="Image">
                            </div>
                          </div>
                          <div class="swiper-slide" target_data_id="5">
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/cake_logo.png" alt="Activity Image" class="act_logo" />
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/img_2.jpg" alt="Image">
                            </div>
                          </div>
                          <div class="swiper-slide" target_data_id="6">
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/SKATTJAKTEN_logo.png" alt="Activity Image" class="act_logo"/>
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/img_1.jpg" alt="Image">
                            </div>
                          </div>
                          <div class="swiper-slide" target_data_id="7">
                            <div class="image-wrap">
                              <div class="image-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/logos/Havsfiske_logo.png" alt="Activity Image" class="act_logo"/>
                              </div>
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/photon/images/img_7.jpg" alt="Image">
                            </div>
                          </div>-->
                      </div>
              
                      <div class="swiper-pagination d-none"></div>
                      <div class="swiper-button-prev d-none"></div>
                      <div class="swiper-button-next d-none"></div>
                      <div class="swiper-scrollbar d-none"></div>
                  </div>
              </section>
            <?php
            wp_reset_postdata();
          }
          ?>
          
          <?php
        }
      }  
    ?>
</header>
