<?php
    /**
    * Template Name: Booking Form
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header();
    
    //Välj preliminär avrese månad
    $contact_form_section_one_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading', 'Inget möte är det andra likt.', '');
    $contact_form_section_two_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_two_heading', 'Inget möte är det andra likt.', '');
    $contact_form_section_subscription_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_subscription_heading', 'Inget möte är det andra likt.', '');
    $contact_form_section_thank_you_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_heading', 'Inget möte är det andra likt.', '');
    
    
    $def_desc = '<p style="text-align: left;">Inför varje event går vi igenom våra ringar för att skapa <br class="d-none d-lg-block" />en delad bild av er tid på ön. Upptäck er känsla här....</p>'; 
    $contact_form_section_one_description = gb_show_new_field( get_the_ID(), 'contact_form_section_one_description', $def_desc, '');
    
    $def_desc = '<p style="text-align: left;">Inför varje event går vi igenom våra ringar för att skapa <br class="d-none d-lg-block" />en delad bild av er tid på ön. Upptäck er känsla här....</p>'; 
    $contact_form_section_two_description = gb_show_new_field( get_the_ID(), 'contact_form_section_two_description', $def_desc, '');
    
    $def_desc = '<p style="text-align: left;">Inför varje event går vi igenom våra ringar för att skapa <br class="d-none d-lg-block" />en delad bild av er tid på ön. Upptäck er känsla här....</p>'; 
    $contact_form_section_subscription_description = gb_show_new_field( get_the_ID(), 'contact_form_section_subscription_description', $def_desc, '');
    
    $def_desc = '<p style="text-align: left;">Inför varje event går vi igenom våra ringar för att skapa <br class="d-none d-lg-block" />en delad bild av er tid på ön. Upptäck er känsla här....</p>'; 
    $contact_form_section_thank_you_description = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_description', $def_desc, '');
    
    
    $def_img = get_stylesheet_directory_uri() . '/Icons/Group_2.png';
    $contact_form_section_one_progress_image_one = gb_show_new_field( get_the_ID(), 'contact_form_section_one_progress_image_one', $def_img, '');
    
    $def_img = get_stylesheet_directory_uri() . '/Icons/Group_3.png';
    $contact_form_section_one_progress_image_two = gb_show_new_field( get_the_ID(), 'contact_form_section_one_progress_image_two', $def_img, '');
    
    $def_img = get_stylesheet_directory_uri() . '/Icons/Group_4.png';
    $contact_form_section_one_progress_image_three = gb_show_new_field( get_the_ID(), 'contact_form_section_one_progress_image_three', $def_img, '');
    
    $def_img = get_stylesheet_directory_uri() . '/Icons/Group_5.png';
    $contact_form_section_one_progress_image_four = gb_show_new_field( get_the_ID(), 'contact_form_section_one_progress_image_four', $def_img, '');
    
    
    $contact_form_section_one_heading_month = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading_month', 'Välj preliminär avrese månad', '');
    $contact_form_section_one_heading_date = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading_date', 'Välj preliminärt avresedatum', '');
    $contact_form_section_one_heading_number_of_nights = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading_number_of_nights', 'Välj prelimiminärt antal nätter', '');
    $contact_form_section_one_heading_number_of_guests = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading_number_of_guests', 'Uppskattat antal gäster', '');
    $contact_form_section_one_heading_year = gb_show_new_field( get_the_ID(), 'contact_form_section_one_heading_year', 'Välj år', '');
    
    $contact_form_section_subscription_email_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_subscription_email_heading', 'Vi håller hårt i din data med vår GDPR Policy.', '');
    $contact_form_section_subscription_email_extra_text = gb_show_new_field( get_the_ID(), 'contact_form_section_subscription_email_extra_text', 'Vi håller hårt i din data med vår GDPR Policy.', '');
    
    //Buttons
    $contact_form_section_three_button_one_text = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_one_text', 'Ändra datum', '');
    $contact_form_section_three_button_one_background_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_one_background_color', '#ffffff', '');
    $contact_form_section_three_button_one_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_one_color', $def_desc, '#a8a8a8');
    
    $contact_form_section_three_button_two_text = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_two_text', 'Ändra känsla', '');
    $contact_form_section_three_button_two_background_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_two_background_color', '#ffffff', '');
    $contact_form_section_three_button_two_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_two_color', '#a8a8a8', '');
    
    $contact_form_section_three_button_three_text = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_three_text', 'Nästa', '');
    $contact_form_section_three_button_three_background_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_three_background_color', '#76a674', '');
    $contact_form_section_three_button_three_color = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_three_color', '#ffffff', '');
    
    $contact_form_section_three_button_four_text = gb_show_new_field( get_the_ID(), 'contact_form_section_three_button_four_text', 'Begär förslag', '');
    
    $contact_form_section_thank_you_ty_heading = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_heading', 'Din plan är nu i trygga händer', '');
    $def_txt = '<p style="text-align: left;">Din plan är nu på väg in i händerna på någon av våra erfarna eventmakare som kommer hjälpa <br class="d-none d-lg-block" />dig vidare inom 48 timmar. Har du några frågor kan du alltid höra av dig direkt till oss på <br class="d-none d-lg-block" />telefon eller skicka ett mail.</p>';
    $contact_form_section_thank_you_ty_description = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_description', $def_txt, '');
    $contact_form_section_thank_you_ty_extra_text = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_extra_text', 'Frågor? Tveka inte att kontakta oss', '');
    $contact_form_section_thank_you_ty_email = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_email', 'info@gogotland.se', '');
    $contact_form_section_thank_you_ty_number = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_number', '0498 213300', '');
    $contact_form_section_thank_you_ty_number_with_code = gb_show_new_field( get_the_ID(), 'contact_form_section_thank_you_ty_number_with_code', '+46498213300', '');
    
    
    $contact_form_section_two_range_slider_one_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_one_start_name', 'Ekonomisk', '');
    $contact_form_section_two_range_slider_one_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_one_end_name', 'Lyxig', '');
    $contact_form_section_two_range_slider_one_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_one_start_at', '1', '');
    $contact_form_section_two_range_slider_one_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_one_end_at', '10', '');
    $contact_form_section_two_range_slider_one_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_one_default_value', '5', '');
    
    
    $contact_form_section_two_range_slider_two_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_two_start_name', 'Mogen', '');
    $contact_form_section_two_range_slider_two_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_two_end_name', 'Ungdomlig', '');
    $contact_form_section_two_range_slider_two_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_two_start_at', '1', '');
    $contact_form_section_two_range_slider_two_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_two_end_at', '10', '');
    $contact_form_section_two_range_slider_two_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_two_default_value', '5', '');
    
    
    $contact_form_section_two_range_slider_three_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_three_start_name', 'Kvinlig', '');
    $contact_form_section_two_range_slider_three_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_three_end_name', 'Manlig', '');
    $contact_form_section_two_range_slider_three_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_three_start_at', '1', '');
    $contact_form_section_two_range_slider_three_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_three_end_at', '10', '');
    $contact_form_section_two_range_slider_three_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_three_default_value', '5', '');


    $contact_form_section_two_range_slider_four_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_four_start_name', 'Lekfull', '');
    $contact_form_section_two_range_slider_four_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_four_end_name', 'Sofistikerad', '');
    $contact_form_section_two_range_slider_four_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_four_start_at', '1', '');
    $contact_form_section_two_range_slider_four_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_four_end_at', '10', '');
    $contact_form_section_two_range_slider_four_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_four_default_value', '5', '');
    
    
    $contact_form_section_two_range_slider_five_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_five_start_name', 'Avkopplande', '');
    $contact_form_section_two_range_slider_five_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_five_end_name', 'Aktiva', '');
    $contact_form_section_two_range_slider_five_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_five_start_at', '1', '');
    $contact_form_section_two_range_slider_five_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_five_end_at', '10', '');
    $contact_form_section_two_range_slider_five_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_five_default_value', '5', '');
    
    
    $contact_form_section_two_range_slider_six_start_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_six_start_name', 'Staden', '');
    $contact_form_section_two_range_slider_six_end_name = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_six_end_name', 'Landet', '');
    $contact_form_section_two_range_slider_six_start_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_six_start_at', '1', '');
    $contact_form_section_two_range_slider_six_end_at = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_six_end_at', '10', '');
    $contact_form_section_two_range_slider_six_default_value = gb_show_new_field( get_the_ID(), 'contact_form_section_two_range_slider_six_default_value', '5', '');
    
?>

<!-- frontpage Content -->
<section class="joel_fp_header_section">
    
    <!--<video autoplay="" muted="" loop="" id="myVideo" class="stage_video">
        <source src="video/gogotland_klipp_HD.mp4" type="video/mp4">
    </video>-->
        <div class="contact_form_btn_text d-none"><?php echo $contact_form_section_three_button_four_text; ?></div>
		<div class="container">
			<div class="middle_section d-flex align-items-center justify-content-center">
				
            <div class="fp_middle_title_section_contaniner joel_form_part_one">
              <h3 class="fp_middle_section_title"><?php echo $contact_form_section_one_heading; ?></h3>
              <span class="fp_middle_section_description"><?php echo $contact_form_section_one_description; ?></span>
            </div>
        
            <div class="fp_middle_title_section_contaniner joel_form_part_two d-none">
              <h3 class="fp_middle_section_title"><?php echo $contact_form_section_two_heading; ?></h3>
              <span class="fp_middle_section_description"><?php echo $contact_form_section_two_description; ?></span>
            </div>
            
            <div class="fp_middle_title_section_contaniner joel_form_part_three d-none">
              <h3 class="fp_middle_section_title"><?php echo $contact_form_section_subscription_heading; ?></h3>
              <span class="fp_middle_section_description"><?php echo $contact_form_section_subscription_description; ?></span>
            </div>
            
            <div class="fp_middle_title_section_contaniner joel_form_part_four d-none">
              <h3 class="fp_middle_section_title"><?php echo $contact_form_section_thank_you_heading; ?></h3>
              <span class="fp_middle_section_description"><?php echo $contact_form_section_thank_you_description; ?></span>
            </div>
            
        <div class="fp_middle_section_calander d-flex flex-column align-items-center justify-content-center">
          
			<div class="container">
                <div class="gotland_form_step_1 gotland_form_step">
                    <img src="<?php echo $contact_form_section_one_progress_image_one; ?>" class="joel_form_progress"/>
                    <div class="card joel_my_card">
                      <h4 class="joel_cal_head joel_tab_days d-none"><?php echo $contact_form_section_one_heading_date; ?></h4>
                      <h3 class="card-header d-none" id="monthAndYear"></h3>
                      <table class="joel_my_tab table table-responsive-sm joel_tab_days d-none" id="calendar">
                          <thead>
                          <tr class="joel_days_name">
                              <th>Sun</th>
                              <th>Mon</th>
                              <th>Tue</th>
                              <th>Wed</th>
                              <th>Thu</th>
                              <th>Fri</th>
                              <th>Sat</th>
                          </tr>
                          </thead>
              
                          <tbody id="calendar-body">
              
                          </tbody>
                      </table>
                      
                        <h4 class="joel_cal_head joel_tab_months"><?php echo $contact_form_section_one_heading_month; ?></h4>
                        <table class="joel_my_tab table table-responsive-sm joel_tab_months" id="calendar">
                          
                          <tbody id="month-body" class="d-none d-sm-block">
                            
                            <tr>
                              <td data-month="1"><span>Januari</span></td>
                              <td data-month="2"><span>Februari</span></td>
                              <td data-month="3"><span>Mars</span></td>
                              <td data-month="4"><span>April</span></td>
                            </tr>
                            
                            <tr>
                              <td data-month="5"><span>Maj</span></td>
                              <td data-month="6"><span>Juni</span></td>
                              <td data-month="7"><span>Juli</span></td>
                              <td data-month="8"><span>Augusti</span></td>
                            </tr>
                            
                            <tr>
                              <td data-month="9"><span>September</span></td>
                              <td data-month="10"><span>Oktober</span></td>
                              <td data-month="11"><span>November</span></td>
                              <td data-month="12"><span>December</span></td>
                            </tr>
                          </tbody>
                          
                          <tbody id="month-body" class="d-block d-sm-none">
                            
                            <tr>
                              <td data-month="1"><span>Jan</span></td>
                              <td data-month="2"><span>Feb</span></td>
                              <td data-month="3"><span>Mars</span></td>
                              <td data-month="4"><span>April</span></td>
                              <td data-month="5"><span>Maj</span></td>
                              <td data-month="6"><span>Juni</span></td>
                              <td data-month="7"><span>Juli</span></td>
                              <td data-month="8"><span>Aug</span></td>
                              <td data-month="9"><span>Sep</span></td>
                              <td data-month="10"><span>Okt</span></td>
                              <td data-month="11"><span>Nov</span></td>
                              <td data-month="12"><span>Dec</span></td>
                            </tr>
                          </tbody>
                          
                        </table>
                      
                        <h4 class="joel_cal_head joel_tab_nights d-none"><?php echo $contact_form_section_one_heading_number_of_nights; ?></h4>
                        <table class="joel_my_tab table table-responsive-sm joel_tab_nights d-none" id="calendar">
                          
                          <tbody id="night-body">
                            
                            <tr>
                              <td data-night="1"><span>1</span></td>
                              <td data-night="2"><span>2</span></td>
                              <td data-night="3"><span>3</span></td>
                              <td data-night="4"><span>4</span></td>
                              <td data-night="5"><span>5</span></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      
                        <h4 class="joel_cal_head joel_tab_years d-none"><?php echo $contact_form_section_one_heading_year; ?></h4>
                        <table class="joel_my_tab table table-responsive-sm joel_tab_years d-none" id="calendar">
                          <thead>
                          <tr class="joel_days_name">
                              <th>Sun</th>
                              <th>Mon</th>
                              <th>Tue</th>
                              <th>Wed</th>
                          </tr>
                          </thead>
              
                          <tbody id="years-body">
                            
                            <tr>
                              
                            </tr>
                            
                          </tbody>
                        </table>
                      
                        <h4 class="joel_cal_head joel_tab_guests d-none"><?php echo $contact_form_section_one_heading_number_of_guests; ?></h4>
                        <table class="joel_my_tab table table-responsive-sm joel_tab_guests d-none" id="calendar">
                          <thead>
                          <tr class="joel_days_name">
                              <th>Sun</th>
                          </tr>
                          </thead>
              
                          <tbody id="guests-body">
                            
                            <tr>
                              <td>
                                <span><input type="number" class="guests-number" placeholder="Ange antal" /><br />
                                  <i class="joel_req_field d-none">This field is required!</i>
                                </span>
                              </td>
                            </tr>
                            
                          </tbody>
                        </table>
                      
                      <div class="form-inline d-none">
                          <button class="btn btn-outline-primary col-sm-6" id="previous">Previous</button>
                          <button class="btn btn-outline-primary col-sm-6" id="next">Next</button>
                      </div>
                      <form class="form-inline d-none">
                          <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                          <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                              <option value=0>Jan</option>
                              <option value=1>Feb</option>
                              <option value=2>Mar</option>
                              <option value=3>Apr</option>
                              <option value=4>May</option>
                              <option value=5>Jun</option>
                              <option value=6>Jul</option>
                              <option value=7>Aug</option>
                              <option value=8>Sep</option>
                              <option value=9>Oct</option>
                              <option value=10>Nov</option>
                              <option value=11>Dec</option>
                          </select>
              
              
                          <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                          <option value=1990>1990</option>
                          <option value=1991>1991</option>
                          <option value=1992>1992</option>
                          <option value=1993>1993</option>
                          <option value=1994>1994</option>
                          <option value=1995>1995</option>
                          <option value=1996>1996</option>
                          <option value=1997>1997</option>
                          <option value=1998>1998</option>
                          <option value=1999>1999</option>
                          <option value=2000>2000</option>
                          <option value=2001>2001</option>
                          <option value=2002>2002</option>
                          <option value=2003>2003</option>
                          <option value=2004>2004</option>
                          <option value=2005>2005</option>
                          <option value=2006>2006</option>
                          <option value=2007>2007</option>
                          <option value=2008>2008</option>
                          <option value=2009>2009</option>
                          <option value=2010>2010</option>
                          <option value=2011>2011</option>
                          <option value=2012>2012</option>
                          <option value=2013>2013</option>
                          <option value=2014>2014</option>
                          <option value=2015>2015</option>
                          <option value=2016>2016</option>
                          <option value=2017>2017</option>
                          <option value=2018>2018</option>
                          <option value=2019>2019</option>
                          <option value=2020>2020</option>
                          <option value=2021>2021</option>
                          <option value=2022>2022</option>
                          <option value=2023>2023</option>
                          <option value=2024>2024</option>
                          <option value=2025>2025</option>
                          <option value=2026>2026</option>
                          <option value=2027>2027</option>
                          <option value=2028>2028</option>
                          <option value=2029>2029</option>
                          <option value=2030>2030</option>
                      </select></form>
                  </div>
                
                
                  <form action="" method="post" class="calendar_submit">
                    <div class="row align-items-center justify-content-center fp_middle_section_calander_row">
                      
                      <div class="col-12 col-sm-6 col-md-4 cal_item d-flex align-items-center justify-content-center departure">
                        <div class="row no-gutters">
                          <div class="col-12 cal_top_sec">
                            <span class="cal_top">AVRESA</span>
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
                      
                      <div class="col-12 col-sm-6 col-md-4 cal_item d-flex align-items-center justify-content-center comeback">
                        <div class="row no-gutters">
                          <div class="col-12 cal_top_sec">
                            <span class="cal_top">HEMRESA</span>
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
                      
                      <div class="col-12 col-sm-12 col-md-4 cal_item d-flex align-items-center justify-content-center joel_guests_cont">
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
                      
                    
                    </div>
                  </form>
                </div>
            
            <div class="gotland_form_step_2 gotland_form_step d-none">
              <img src="<?php echo $contact_form_section_one_progress_image_two; ?>" class="joel_form_progress"/>
              <div class="joel_gotland_range_sliders">
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_one_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_one_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_one" name="" min="<?php echo $contact_form_section_two_range_slider_one_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_one_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_one_default_value; ?>" range_target="ekonomisk" />
                </div>
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_two_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_two_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_two" name="" min="<?php echo $contact_form_section_two_range_slider_two_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_two_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_two_default_value; ?>" range_target="mogen"/>
                </div>
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_three_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_three_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_three" name="" min="<?php echo $contact_form_section_two_range_slider_three_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_three_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_three_default_value; ?>" range_target="kvinlig"/>
                </div>
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_four_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_four_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_four" name="" min="<?php echo $contact_form_section_two_range_slider_four_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_four_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_four_default_value; ?>" range_target="lekfull"/>
                </div>
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_five_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_five_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_five" name="" min="<?php echo $contact_form_section_two_range_slider_five_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_five_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_five_default_value; ?>" range_target="avkopplande"/>
                </div>
                
                <div class="go_range_slider_unique d-flex align-items-center justify-content-center flex-column">
                  <div class="row range_text">
                    <div class="col-6 range_text_a"><?php echo $contact_form_section_two_range_slider_six_start_name; ?></div>
                    <div class="col-6 range_text_b"><?php echo $contact_form_section_two_range_slider_six_end_name; ?></div>
                  </div>
                  <input type="range" class="go_range_slider range_six" name="" min="<?php echo $contact_form_section_two_range_slider_six_start_at; ?>" max="<?php echo $contact_form_section_two_range_slider_six_end_at; ?>" step="1" value="<?php echo $contact_form_section_two_range_slider_six_default_value; ?>" range_target="staden"/>
                </div>
                
              </div>
            </div>
            
            <div class="gotland_form_step_3 gotland_form_step d-none">
              <img src="<?php echo $contact_form_section_one_progress_image_three; ?>" class="joel_form_progress"/>
              <div class="joel_email_subs_section">
                <div class="row email_subs_row no-gutters justify-content-center align-items-center">
                  <div class="col-12 col-lg-8 email_subs_col">
                    <h2 class="email_subs_head"> <i class="ei">3</i><i class="fas fa-chevron-right" aria-hidden="true"></i> <?php echo $contact_form_section_subscription_email_heading; ?></h2>
                    <input type="text" class="email_subs_field" placeholder="Skriv din epostadress här...">
                    <br />
                    <i class="joel_req_field d-none">This field is required!</i>
                    <br />
                    <div class="email_subs_btn_container">
                      <input type="button" class="email_subs_button" id="email_subs_button" value="Skicka">
                      
                    </div>
                    <p><?php echo $contact_form_section_subscription_email_extra_text; ?></p>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="gotland_form_step_4 gotland_form_step d-none">
              <br />
              <img src="<?php echo $contact_form_section_one_progress_image_four; ?>" class="joel_form_progress"/>
              <div class="joel_email_subs_section">
                <div class="row email_subs_row no-gutters justify-content-center align-items-center">
                  <div class="col-12 col-lg-8 email_subs_col">
                    <h2 class="email_subs_head"> <i class="ei">4</i><i class="fas fa-chevron-right" aria-hidden="true"></i><?php echo $contact_form_section_thank_you_ty_heading; ?></h2>
                    <?php echo $contact_form_section_thank_you_ty_description; ?>
                    <br />
                    <br />
                    <br />
                    <h5><?php echo $contact_form_section_thank_you_ty_extra_text; ?></h5>
                    
                    <br />
                    <br />
                    <div class="row">
                      <div class="col-sm-6 col-12 joel_contact d-flex align-items-center justify-content-center justify-content-sm-end">
                          <a href="tel:<?php echo $contact_form_section_thank_you_ty_number_with_code; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/phone_2.png"> <b><?php echo $contact_form_section_thank_you_ty_number; ?></b></a>
                      </div>
                      
                      <div class="col-sm-6 col-12 text-right joel_logo d-flex align-items-center justify-content-center justify-content-sm-start">
                          <a class="navbar-brand text-right" href="mailto:info@gogotland.se"><?php echo $contact_form_section_thank_you_ty_email; ?></a>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="joel_btns_gotland_form d-flex align-items-center justify-content-center none_at_any_cost">
              <button type="button" class="joel_change_range_data_btn d-none" style="color: <?php echo $contact_form_section_three_button_two_color; ?>; background-color: <?php echo $contact_form_section_three_button_two_background_color; ?>;"><?php echo $contact_form_section_three_button_two_text; ?></button>
              <button type="button" class="joel_change_date_btn" style="color: <?php echo $contact_form_section_three_button_one_color; ?>; background-color: <?php echo $contact_form_section_three_button_one_background_color; ?>;" ><?php echo $contact_form_section_three_button_one_text; ?></button>
              <button type="button" class="joel_next_btn" style="color: <?php echo $contact_form_section_three_button_three_color; ?>; background-color: <?php echo $contact_form_section_three_button_three_background_color; ?>;" ><?php echo $contact_form_section_three_button_three_text; ?></button>
            </div>
            
            <div class="d-none">
              <input type="hidden" class="joe_follow_steps" value="step_one" />
              
              <form action="" method="post" class="joel_hidden_form_data">
                <input type="hidden" class="joel_target_days_table" value=""/>
                <input type="hidden" class="joel_target_month_table" value=""/>
                <input type="hidden" class="joel_target_nights_table" value=""/>
                <input type="hidden" class="joel_target_year_table" value=""/>
                
                <input type="hidden" class="j_departure_table" value=""/>
                <input type="hidden" class="j_comeback_table" value=""/>
                
                <input type="hidden" class="j_guests" value=""/>
                
                <input type="hidden" class="ekonomisk" value=""/>
                <input type="hidden" class="mogen" value=""/>
                <input type="hidden" class="kvinlig" value=""/>
                <input type="hidden" class="lekfull" value=""/>
                <input type="hidden" class="avkopplande" value=""/>
                <input type="hidden" class="staden" value=""/>
                
                <input type="hidden" class="subs_email" value=""/>
                
              </form>
            </div>
            
          </div>
        </div>
        
			</div>
		</div>
</section>

<?php
    get_footer();
?>
