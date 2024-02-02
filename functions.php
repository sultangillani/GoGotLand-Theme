<?php

add_theme_support('post-thumbnails', array ('post','member','page') );
remove_filter('the_content', 'wpautop');
function fun_theme_head_section() {
   
}
add_action( 'wp_head', 'fun_theme_head_section' );


function gb_load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'gb_load_media_files' );

function gb_page_settings_meta_boxes() {
    add_meta_box( 'gb_page_meta', __( 'Page Settings', 'j_the_fun_theme' ), 'gb_page_settings_callback', 'page' );
    add_meta_box( 'gb_card_meta', __( 'Cards Settings', 'j_the_fun_theme' ), 'gb_card_settings_callback', 'card' );
    add_meta_box( 'gb_almedalen_meta', __( 'Almedalens Settings', 'j_the_fun_theme' ), 'gb_almedalen_settings_callback', 'almedalen' );
    add_meta_box( 'gb_member_meta', __( 'Team Member Settings', 'j_the_fun_theme' ), 'gb_team_member_settings_callback', 'gb_member' );
    add_meta_box( 'gb_booking_meta', __( 'Booking Settings', 'j_the_fun_theme' ), 'gb_booking_settings_callback', 'gb_booking' );
}
add_action( 'add_meta_boxes', 'gb_page_settings_meta_boxes' );

function gb_booking_settings_callback(){
    $booking_data = [
        'page_name',
        'service_name',
        'departure_date',
        'comeback_date',
        'guests',
        'user_email',
        'range_one',
        'range_two',
        'range_three',
        'range_four',
        'range_five',
        'range_six'
        
    ];
    
    $booking_data_type = [
        'hidden',
        'hidden',
        'date',
        'date',
        'text',
        'text',
        'text',
        'text',
        'text',
        'text',
        'text',
        'text'
    ];
    
    $booking_data_def = [
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        ''
    ];
    
    gb_add_multiple_fields(get_the_ID(), 'booking', 'j', $booking_data, $booking_data_type, $booking_data_def);
}

function gb_add_new_field($id,$name, $type, $label, $def){
    if($type == 'text'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = $def;
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">        
            <label><b><?php echo $label; ?></b></label><br /><br />
            <input type="text" class="gb_<?php echo $name; ?> data" name="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" style="display: block; width: 100%;" placeholder="<?php echo $label; ?>" />
        </div><br />
        <?php
    }
    
    if($type == 'date'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = $def;
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">        
            <label><b><?php echo $label; ?></b></label><br /><br />
            <input type="text" class="gb_<?php echo $name; ?> data datepicker" name="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" style="display: block; width: 100%;" placeholder="<?php echo $label; ?>" readonly/>
        </div><br />
        <?php
    }
    
    if($type == 'hidden'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = $def;
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">        
            <label><b><?php echo $label; ?></b></label><br /><br />
            <input type="text" class="gb_<?php echo $name; ?> data" name="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" style="display: block; width: 100%;" placeholder="<?php echo $label; ?>" readonly/>
        </div><br />
        <?php
    }
    /*<div class="field gb_extra_content_field">        
        <label><b>Extra Content</b></label><br /><br />
        <textarea class="gb_extra_content data" name="gb_extra_content" style="display: block; width: 100%;" placeholder="Extra Content"><?php echo $gb_extra_content; ?></textarea>
        
    </div><br />*/
    
    if($type == 'textarea'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = $def;
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">        
            <label><b><?php echo $label; ?></b></label><br /><br />
            <textarea class="gb_<?php echo $name; ?> data" name="gb_<?php echo $name; ?>" style="display: block; width: 100%;" placeholder="<?php echo $label; ?>"><?php echo $meta_data; ?></textarea>
        </div><br />
        <?php
    }
    
    if($type == 'color'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = $def;
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">        
            <label><b><?php echo $label; ?></b></label><br /><br />
            <input type="color" class="gb_<?php echo $name; ?> data" name="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" style="display: block; width: auto; min-width: 50px;" placeholder="<?php echo $label; ?>" />
        </div><br />
        <?php
    }
    
    if($type == 'editor'){
        ?>
            <div class="field gb_<?php echo $name; ?>_field">
                <label><b><?php echo $label; ?></b></label><br /><br />
                <?php
                    $meta_key = 'gb_' . $name;
                    $meta_data  = get_post_meta( $id, $meta_key,true );
                    
                    if(!$meta_data || $meta_data == ''){
                        $meta_data = $def;
                    }
                    
                    $editor_id = $meta_key;
                    
                    $args = array(
                        'tinymce'       => array(
                            'toolbar1'      => 'bold,italic,bullist,numlist,blockquote,wp_more,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,wp_adv',
                            'toolbar2'      => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo',
                            'toolbar3'      => '',
                        ),
                    );
                    wp_editor( $meta_data, $editor_id, $args );
                ?>
            </div><br />
        <?php
    }
    
    if($type == 'image'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = '';
        }
        ?>
        <div class="field gb_<?php echo $name; ?>_field">
            <label><b><?php echo $label; ?></b></label><br /><br />
            <div class="image_upload_option header_bg_image_upload">
                <?php 
                    if(!$meta_data || $meta_data == ''){
                        ?>
                        <img src="<?php echo $def; ?>" alt="" class="the_img"/><br />
                        <?php
                    }else{
                    ?>
                        <img src="<?php echo $meta_data; ?>" alt="" class="the_img"/><br />
                    <?php
                    }
                ?>
                <button type="button" class="gb_trigger_upload change_header_bg_image"><?php echo $label; ?></button>
                <button type="button" class="gb_trigger_remove_upload">Remove <?php echo $label; ?></button>
                <input type="hidden" class="gb_<?php echo $name; ?> save_data" name="gb_<?php echo $name; ?>" id="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" />
            </div>
        </div><br />
        <?php
    }
    
    if($type == 'images'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        if(!$meta_data || $meta_data == ''){
            $meta_data = '';
        }
        
        $meta_data = explode(',', $meta_data);
        ?>
        <div class="field gb_<?php echo $name; ?>_field">
            <label><b><?php echo $label; ?></b></label><br /><br />
            <div class="image_upload_option header_bg_image_upload">
                <?php
                    if(!$meta_data || $meta_data == '' || $meta_data[0] == '' || count($meta_data) < 1 ){
                        
                        ?>
                            <img src="<?php echo $def; ?>" alt="" class="the_img"/><br />
                        <?php
                    }else{
                        foreach($meta_data as $key => $meta){
                            ?>
                                <img src="<?php echo $meta; ?>" alt="" class="the_img" id="img_id_<?php echo $key; ?>"/>
                            <?php
                            if(count($meta_data) == ($key + 1) ){
                                echo '<br />';
                            }
                        }
                    }
                    
                    $meta_data = implode(',', $meta_data);
                ?>
                <button type="button" class="gb_trigger_uploads change_header_bg_image"><?php echo $label; ?></button>
                <button type="button" class="gb_trigger_remove_upload">Remove <?php echo $label; ?></button>
                <input type="hidden" class="gb_<?php echo $name; ?> save_datas" name="gb_<?php echo $name; ?>" id="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" />
            </div>
        </div><br />
        <?php
    }
    
    if($type == 'video'){
        $meta_key = 'gb_' . $name;
        $meta_data = get_post_meta($id, $meta_key, true);
        
        ?>
        <div class="field gb_<?php echo $name; ?>_field">
            <label><b><?php echo $label; ?></b></label><br /><br />
            <div class="image_upload_option header_bg_image_upload">
                <?php 
                    if(!$meta_data || $meta_data == ''){
                        ?>
                            <img src="<?php echo $def; ?>" alt="" class="the_img"/><br />
                        <?php 
                    }else{
                        ?>
                            <video id="myVideo" class="the_img gb_video" controls>
                                <source src="<?php echo $meta_data; ?>" type="video/mp4">
                            </video><br />
                        <?php
                    }
                ?>
                
                <button type="button" class="gb_trigger_upload_video change_header_bg_image"><?php echo $label; ?></button>
                <button type="button" class="gb_trigger_remove_video">Remove <?php echo $label; ?></button>
                <input type="hidden" class="gb_<?php echo $name; ?> save_data" name="gb_<?php echo $name; ?>" id="gb_<?php echo $name; ?>" value="<?php echo $meta_data; ?>" />
            </div>
        </div><br />
        <?php
    }
    
}

function gb_counter_fields($id, $page, $section, $counter){
    $meta_id = $page . '_section_' . $section . '_counter_' . $counter;
    $title = 'Section ' . ucfirst($section) . ' Counter ' . ucfirst($counter);
    gb_add_new_field( $id, $meta_id . '_from', 'text', $title . ' From', '' );
    gb_add_new_field( $id, $meta_id . '_to', 'text', $title . ' To', '' );
    gb_add_new_field( $id, $meta_id . '_extra_text', 'text', $title . ' Extra Text', '' );    
}

function gb_counter_fields_save($id, $page, $section, $counter){
    $meta_id = $page . '_section_' . $section . '_counter_' . $counter;
    gb_save_new_field( $id, $meta_id.'_from', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_to', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_extra_text', 'save', '' , '', '' );
}


function gb_range_slider_fields($id, $page, $section, $range_slider){
    $meta_id = $page . '_section_' . $section . '_range_slider_' . $range_slider;
    $title = 'Section ' . ucfirst($section) . ' Range Slider ' . ucfirst($range_slider);
    gb_add_new_field( $id, $meta_id . '_start_name', 'text', $title . ' Start Name', '' );
    gb_add_new_field( $id, $meta_id . '_end_name', 'text', $title . ' End Name', '' );   
    gb_add_new_field( $id, $meta_id . '_start_at', 'text', $title . ' Start From', '' );
    gb_add_new_field( $id, $meta_id . '_end_at', 'text', $title . ' End To', '' );
    gb_add_new_field( $id, $meta_id . '_default_value', 'text', $title . ' Default Value of Slider', '' );
}

function gb_range_slider_fields_save($id, $page, $section, $range_slider){
    $meta_id = $page . '_section_' . $section . '_range_slider_' . $range_slider;
    gb_save_new_field( $id, $meta_id.'_start_name', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_end_name', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_start_at', 'save', '' , '', '' );
	gb_save_new_field( $id, $meta_id.'_end_at', 'save', '' , '', '' );
	gb_save_new_field( $id, $meta_id.'_default_value', 'save', '' , '', '' );
	
}

function gb_boka_fields($id, $page, $section, $boka){
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_boka_' . $boka;
    $title = 'Section ' . ucfirst($section) . ' Boka ' . ucfirst($boka);
    gb_add_new_field( $id, $meta_id . '_image', 'image', $title . ' Image', $def_img );
    gb_add_new_field( $id, $meta_id . '_title', 'text', $title . ' Title', '' );
    gb_add_new_field( $id, $meta_id . '_link', 'text', $title . ' Link', '' );    
}

function gb_boka_fields_save($id, $page, $section, $boka){
    $meta_id = $page . '_section_' . $section . '_boka_' . $boka;
    gb_save_new_field( $id, $meta_id.'_image', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_title', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_link', 'save', '' , '', '' );
}

function gb_button_fields($id, $page, $section, $button){
    $meta_id = $page . '_section_' . $section . '_button_' . $button;
    $title = 'Section ' . ucfirst($section) . ' button ' . ucfirst($button);
    gb_add_new_field( $id, $meta_id . '_background_color', 'color', $title . ' Background Color', '' );
    gb_add_new_field( $id, $meta_id . '_color', 'color', $title . ' Color', '' );
    gb_add_new_field( $id, $meta_id . '_title', 'text', $title . ' Name', '' );
    gb_add_new_field( $id, $meta_id . '_link', 'text', $title . ' Link', '' );    
}

function gb_button_fields_save($id, $page, $section, $button){
    $meta_id = $page . '_section_' . $section . '_button_' . $button;
    gb_save_new_field( $id, $meta_id.'_background_color', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_color', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_title', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id.'_link', 'save', '' , '', '' );
}

function gb_add_multiple_fields($id, $page, $section, $purpose, $type, $def){
    
    for( $i = 0; $i < count($purpose); $i++){
        $meta_id = $page . '_section_' . $section . '_' . $purpose[$i];
        $title = ucfirst($page) . ' Section ' . ucfirst($section) . ' ' . ucfirst($purpose[$i]);
        $title = str_replace('_', ' ', $title);
        gb_add_new_field( $id, $meta_id, $type[$i], $title, $def[$i]);
    }
    
}

function gb_save_multiple_fields($id, $page, $section, $purpose, $type, $def){
    
    for( $i = 0; $i < count($purpose); $i++){
        $meta_id = $page . '_section_' . $section . '_' . $purpose[$i];
        gb_save_new_field($id, $meta_id, 'save', '' , '', $type[$i]);
    }
    
}

function gb_add_halfbox_fields($id, $page, $section, $halfbox){
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_halfbox_' . $halfbox;
    $title = 'Section ' . ucfirst($section) . ' Halfbox ' . ucfirst($halfbox);
    
    gb_add_new_field( $id, $meta_id . '_image', 'image', $title . ' Image', $def_img );
    gb_add_new_field( $id, $meta_id . '_background_color', 'color', $title . ' Background Color', '#F4F4F4');
    gb_add_new_field( $id, $meta_id . '_joining_title', 'text', $title . ' Joining Title', '');
    gb_add_new_field( $id, $meta_id . '_joining_title_color', 'color', $title . ' Joining Title Text Color', '#F0F0F0');
    gb_add_new_field( $id, $meta_id . '_title', 'text', $title . ' Title', '');
    gb_add_new_field( $id, $meta_id . '_title_color', 'color', $title . ' Title Text Color', '#F0F0F0');
    gb_add_new_field( $id, $meta_id . '_description', 'editor', $title . ' Description', '');
    gb_add_new_field( $id, $meta_id . '_logos', 'images', $title . ' Logos', $def_img);
    
    $options_v_box_one = [
		'start' => 'Top',
		'center' => 'Middle',
		'end' => 'Bottom'
	];
	
	joel_box_position_switch_options($id, $meta_id . '_positon_vertically', $title . ' Vertical Position', $options_v_box_one);
	
	$options_h_box_one = [
		'start' => 'Left',
		'center' => 'Center',
		'end' => 'Right'
	];
	
	joel_box_position_switch_options($id, $meta_id . '_positon_horizontally', $title . ' Horizontal Position', $options_h_box_one);
	
	
}

function gb_save_halfbox_fields($id, $page, $section, $halfbox){
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_halfbox_' . $halfbox;
    $title = 'Section ' . ucfirst($section) . ' Halfbox ' . ucfirst($halfbox);
    
    gb_save_new_field( $id, $meta_id . '_image', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_background_color', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_joining_title', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_joining_title_color', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_title', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_title_color', 'save', '' , '', '' );
    gb_save_new_field( $id, $meta_id . '_description', 'save', '' , '', 'editor' );
    gb_save_new_field( $id, $meta_id . '_logos', 'save', '' , '', '' );
    joel_box_position_switch_options_save($id, $meta_id . '_positon_vertically');
    joel_box_position_switch_options_save($id, $meta_id . '_positon_horizontally');
    
}

function joel_box_position_switch_options($id, $key, $label, $options){
    $value = get_post_meta( $id, $key, true);
    ?>
    <div class="field slider_option">
        <label><b><?php echo $label; ?></b></label><br /><br />
        
        <?php 
            if( count($options) > 0){
                foreach( $options as $o_key => $o_value ){
                ?>
                    <label for="<?php echo $key . '_' . $o_key; ?>" >
                        <input type="radio" class="<?php echo $key; ?> switch" name="<?php echo $key; ?>" id="<?php echo $key . '_' . $o_key; ?>" value="<?php echo $o_key; ?>" <?php if($value == $o_key){ echo 'checked'; } ?> /><?php echo $o_value; ?>
                    </label>
                    &nbsp;&nbsp;
                    
                <?php
                }
            }
        ?>
        
        <input type="hidden" class="<?php echo $key; ?> data" name="<?php echo $key; ?>" value="<?php echo $value; ?>"/>
        
    </div><br />
    <?php    
}

function joel_box_position_switch_options_data($id, $key){
    $value = get_post_meta( $id, $key, true );    
    if( !$value || $value == ''){
        $value = 'center';    
    }
    
    return $value;
}

function joel_box_position_switch_options_save($id, $key){
    global $wpdb;
	$meta_key = $key;
	$data = $_POST[$meta_key];
	
	$data = str_replace('"', "'", $data);
	$data = $wpdb->_real_escape($data);
	
	update_post_meta( $id, $meta_key, $data);
}

function gb_page_settings_callback(){
    $slider_option_switch = get_post_meta( get_the_ID(), 'slider_option_switch', true);
    //_wp_page_template
    $wp_page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
    ?>
    <div class="field slider_option">
        <label><b>Default Card slider on this page</b></label><br /><br />
        
        <label for="slider_option_switch_yes" >
            <input type="radio" class="slider_option_switch switch" name="slider_option_switch" id="slider_option_switch_yes" value="yes" <?php if($slider_option_switch == 'yes'){ echo 'checked'; } ?> />Yes
        </label>
        
        &nbsp;&nbsp;
        
        <label for="slider_option_switch_no" >
            <input type="radio" class="slider_option_switch switch" name="slider_option_switch" id="slider_option_switch_no" value="no" <?php if($slider_option_switch == 'no'){ echo 'checked'; } ?> />No
        </label><br /> 
        
        <input type="hidden" class="slider_option_switch_data data" name="slider_option_switch_data" value="<?php echo $slider_option_switch; ?>"/>
        
        <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Do you want slider in this page? </span>
    </div><br />
    
    <?php
        $header_option_switch = get_post_meta( get_the_ID(), 'header_option_switch', true);
    ?>
    <div class="field header_option">
        <label><b>Header Type</b></label><br /><br />
        
        <label for="header_option_switch_yes" >
            <input type="radio" class="header_option_switch switch" name="header_option_switch" id="header_option_switch_yes" value="light" <?php if($header_option_switch == 'light'){ echo 'checked'; } ?> />Light header
        </label>
        
        &nbsp;&nbsp;
        
        <label for="header_option_switch_no" >
            <input type="radio" class="header_option_switch switch" name="header_option_switch" id="header_option_switch_no" value="dark" <?php if($header_option_switch == 'dark'){ echo 'checked'; } ?> />Dark header
        </label><br /> 
        
        <input type="hidden" class="header_option_switch_data data" name="header_option_switch_data" value="<?php echo $header_option_switch; ?>"/>
        
        <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Choose Header for the Page </span>
    </div><br />
    
    <?php
    
    
    if($wp_page_template == 'blog.php'){
        
        $gb_card_header_left_image = get_post_meta( get_the_ID(), 'gb_header_left_image_hidden', true);
        
        if( !$gb_card_header_left_image || $gb_card_header_left_image == ''){
            $gb_card_header_left_image = get_stylesheet_directory_uri() . '/images/words.png';
        }
        
        $gb_card_header_bg_image = get_post_meta( get_the_ID(), 'gb_card_header_bg_image', true);
        
        if( !$gb_card_header_bg_image || $gb_card_header_bg_image == ''){
            $gb_card_header_bg_image = get_stylesheet_directory_uri() . '/images/header_help.png';
        }
        
        $gb_card_section_one_logo = get_post_meta( get_the_ID(), 'gb_section_one_logo', true);
        
        if( !$gb_card_section_one_logo || $gb_card_section_one_logo == ''){
            $gb_card_section_one_logo = get_stylesheet_directory_uri() . '/logos/AVECK_ARR_logo.png';
        }
        
        ?>
        
        <h3>This Template Options</h3><br />
        <div class="field header_left_image_option">
            <label><b>Header Left Image</b></label><br /><br />
            <div class="image_upload_option header_left_image_upload">
                <img src="<?php echo $gb_card_header_left_image; ?>" alt="" class="the_img"/><br />
                <button type="button" class="gb_trigger_upload change_header_left_image">Header Left Image</button>
                <button type="button" class="gb_trigger_remove_upload">Remove Header Left Image</button>
                <input type="hidden" class="gb_header_left_image_hidden save_data" name="gb_header_left_image_hidden" id="gb_header_left_image_hidden" value="<?php echo $gb_card_header_left_image; ?>" />
            </div>
        </div><br /><br />
        
        <div class="field header_left_image_option">
            <label><b>Header Right Text</b></label><br /><br />
            
            <?php
            
            $content   = get_post_meta( get_the_ID(), 'gb_header_right_text_id',true );
            $editor_id = 'gb_header_right_text_id';
            
            $args = array(
                'tinymce'       => array(
                    'toolbar1'      => 'bold,italic,bullist,numlist,blockquote,wp_more,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,wp_adv',
                    'toolbar2'      => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo',
                    'toolbar3'      => '',
                ),
            );
            wp_editor( $content, $editor_id, $args );
            
            
            ?>
            
        </div><br /><br />
        
        <div class="field header_bg_image_option">
            <label><b>Header Background Image</b></label><br /><br />
            <div class="image_upload_option header_bg_image_upload">
                <img src="<?php echo $gb_card_header_bg_image; ?>" alt="" class="the_img"/><br />
                <button type="button" class="gb_trigger_upload change_header_bg_image">Header Background Image</button>
                <button type="button" class="gb_trigger_remove_upload">Remove Header Background Image</button>
                <input type="hidden" class="gb_card_header_bg_image save_data" name="gb_card_header_bg_image" id="gb_card_header_bg_image" value="<?php echo $gb_card_header_bg_image; ?>" />
            </div>
        </div><br /><hr />
        
        <h3><span class="dashicons dashicons-arrow-right-alt2"></span>Guided Text For Header Background Image</h3><br />
        
        <?php
            $gb_bg_text_one  = get_post_meta( get_the_ID(), 'gb_bg_text_one',true );
            $gb_bg_text_two  = get_post_meta( get_the_ID(), 'gb_bg_text_two',true );
            $gb_bg_text_three  = get_post_meta( get_the_ID(), 'gb_bg_text_three',true );
            $gb_bg_text_four  = get_post_meta( get_the_ID(), 'gb_bg_text_four',true );
            $gb_bg_text_five  = get_post_meta( get_the_ID(), 'gb_bg_text_five',true );
            $gb_bg_text_six  = get_post_meta( get_the_ID(), 'gb_bg_text_six',true );
            $gb_bg_text_seven  = get_post_meta( get_the_ID(), 'gb_bg_text_seven',true );
        ?>
        
        <div class="field gb_bg_text_one_field">        
            <label><b>Guide Text One</b></label><br /><br />
            <input type="text" class="gb_bg_text_one data" name="gb_bg_text_one" value="<?php echo $gb_bg_text_one; ?>" style="display: block; width: 100%;" placeholder="Guide Text One" />
        </div><br />
        
        <div class="field gb_bg_text_two_field">        
            <label><b>Guide Text Two</b></label><br /><br />
            <input type="text" class="gb_bg_text_two data" name="gb_bg_text_two" value="<?php echo $gb_bg_text_two; ?>" style="display: block; width: 100%;" placeholder="Guide Text Two" />
        </div><br />
        
        <div class="field gb_bg_text_three_field">        
            <label><b>Guide Text Three</b></label><br /><br />
            <input type="text" class="gb_bg_text_three data" name="gb_bg_text_three" value="<?php echo $gb_bg_text_three; ?>" style="display: block; width: 100%;" placeholder="Guide Text Three" />
        </div><br />
        
        <div class="field gb_bg_text_four_field">        
            <label><b>Guide Text Four</b></label><br /><br />
            <input type="text" class="gb_bg_text_four data" name="gb_bg_text_four" value="<?php echo $gb_bg_text_four; ?>" style="display: block; width: 100%;" placeholder="Guide Text Four" />
        </div><br />
        
        <div class="field gb_bg_text_five_field">        
            <label><b>Guide Text Five</b></label><br /><br />
            <input type="text" class="gb_bg_text_five data" name="gb_bg_text_five" value="<?php echo $gb_bg_text_five; ?>" style="display: block; width: 100%;" placeholder="Guide Text Five" />
        </div><br />
        
        <div class="field gb_bg_text_six_field">        
            <label><b>Guide Text Six</b></label><br /><br />
            <input type="text" class="gb_bg_text_six data" name="gb_bg_text_six" value="<?php echo $gb_bg_text_six; ?>" style="display: block; width: 100%;" placeholder="Guide Text Six" />
        </div><br />
        
        <div class="field gb_bg_text_seven_field">        
            <label><b>Guide Text Seven</b></label><br /><br />
            <input type="text" class="gb_bg_text_seven data" name="gb_bg_text_seven" value="<?php echo $gb_bg_text_seven; ?>" style="display: block; width: 100%;" placeholder="Guide Text Seven" />
        </div><br /><hr />
        
        <h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section One </h3><br />
        
        <div class="field section_one_logo_option">
            <label><b>Section One Logo</b></label><br /><br />
            <div class="image_upload_option section_one_logo_upload">
                <img src="<?php echo $gb_card_section_one_logo; ?>" alt="" class="the_img"/><br />
                <button type="button" class="gb_trigger_upload change_section_one_logo">Section One Logo</button>
                <button type="button" class="gb_trigger_remove_upload">Remove Section One Logo</button>
                <input type="hidden" class="gb_section_one_logo save_data" name="gb_section_one_logo" id="gb_section_one_logo" value="<?php echo $gb_card_section_one_logo; ?>" />
            </div>
        </div><br /><br />
        <?php
        
        gb_add_new_field( get_the_ID(), 'section_one_heading', 'text', 'Section One Heading', '');
        gb_add_new_field( get_the_ID(), 'section_one_text', 'editor', 'Section One Text', '');
        
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
        echo '<h3> Section One Items </h3><br />';
        gb_add_new_field( get_the_ID(), 'section_one_item_image_one', 'image', 'Item One Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_one', 'text', 'Item One Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_one', 'text', 'Item One Link', '');
        
        gb_add_new_field( get_the_ID(), 'section_one_item_image_two', 'image', 'Item Two Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_two', 'text', 'Item Two Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_two', 'text', 'Item Two Link', '');
        
        gb_add_new_field( get_the_ID(), 'section_one_item_image_three', 'image', 'Item Three Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_three', 'text', 'Item Three Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_three', 'text', 'Item Three Link', '');
        
        gb_add_new_field( get_the_ID(), 'section_one_item_image_four', 'image', 'Item Four Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_four', 'text', 'Item Four Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_four', 'text', 'Item Four Link', '');
        
        gb_add_new_field( get_the_ID(), 'section_one_item_image_five', 'image', 'Item Five Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_five', 'text', 'Item Five Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_five', 'text', 'Item Five Link', '');
        
        gb_add_new_field( get_the_ID(), 'section_one_item_image_six', 'image', 'Item Six Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_one_item_text_six', 'text', 'Item Six Text', '');
        gb_add_new_field( get_the_ID(), 'section_one_item_link_six', 'text', 'Item Six Link', '');
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Two </h3><br />';
        
        gb_add_new_field( get_the_ID(), 'section_two_image', 'image', 'Section Two Left Image', $def_img);
        gb_add_new_field( get_the_ID(), 'section_two_heading', 'text', 'Section Two Heading', '');
        gb_add_new_field( get_the_ID(), 'section_two_editor', 'editor', 'Section Two Description', '');
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Three </h3><br />';
        
        gb_add_new_field( get_the_ID(), 'section_three_heading', 'text', 'Section Three Heading', '');
        gb_add_new_field( get_the_ID(), 'section_three_editor', 'editor', 'Section Three Description', '');
        gb_add_new_field( get_the_ID(), 'section_three_image', 'images', 'Section Three Right Logos', $def_img);
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Four </h3><br />';
        gb_add_new_field( get_the_ID(), 'section_four_heading', 'text', 'Section Four Heading', '');
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Five </h3><br />';
        gb_add_new_field( get_the_ID(), 'section_five_heading', 'text', 'Section Five Heading', '');
        gb_add_new_field( get_the_ID(), 'section_five_editor', 'editor', 'Section Five Description', '');
        gb_add_new_field( get_the_ID(), 'section_five_image', 'image', 'Section Five Background Image', $def_img);
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Six </h3><br />';
        gb_add_new_field( get_the_ID(), 'section_six_heading', 'text', 'Section Six Heading', '');
        gb_add_new_field( get_the_ID(), 'section_six_link', 'text', 'Section Six Button Link', '');
        gb_add_new_field( get_the_ID(), 'section_six_text', 'text', 'Section Six Button Text', '');
        gb_add_new_field( get_the_ID(), 'section_six_image', 'image', 'Section Six Icon Image', $def_img);
        
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Section Six </h3><br />';
        gb_add_new_field( get_the_ID(), 'section_seven_image', 'image', 'Section Seven Email Subscription Background Image', $def_img);
        
    }
    
    
    if($wp_page_template == 'landing_page.php'){
        
        echo '<h3><span class="dashicons dashicons-arrow-right-alt2"></span>Header</h3><hr /><br />';
        
        $def_vid = home_url('/') . 'wp-content/uploads/2020/03/videogallery.png';
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
        
        gb_add_new_field( get_the_ID(), 'landing_section_one_video', 'video', 'Header Video', $def_vid);
        gb_add_new_field( get_the_ID(), 'landing_section_one_caption_title', 'text', 'Header Video Caption Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_one_caption_subtitle', 'text', 'Header Video Caption Sub Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_one_film_button_name', 'text', 'Header Video Spela Film Button Name', '');
        gb_add_new_field( get_the_ID(), 'landing_section_one_film_link', 'text', 'Header Video Spela Film Link', '');
        gb_add_new_field( get_the_ID(), 'landing_section_one_logos', 'images', 'Header Bottom Logos', $def_img);
        
        echo '<h3><span class="dashicons dashicons-arrow-right-alt2"></span>Section Two</h3><hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_start_text_editor', 'editor', 'Section Two Start Text Editor', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_one', 'image', 'Section Two Left First Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_one_text', 'text', 'Section Two Left First Image Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_one_link', 'text', 'Section Two Left First Image Link', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_two', 'image', 'Section Two Left Second Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_two_text', 'text', 'Section Two Left Second Image Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_left_logo_two_link', 'text', 'Section Two Left Second Image Link', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_one_background_color', 'color', 'Section Two Right Button One Background Color', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_one_text_color', 'color', 'Section Two Right Button One Text Color', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_one_name', 'text', 'Section Two Right Button One Name', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_one_link', 'text', 'Section Two Right Button One Link', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_two_background_color', 'color', 'Section Two Right Button two Background Color', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_two_text_color', 'color', 'Section Two Right Button two Text Color', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_two_name', 'text', 'Section Two Right Button Two Name', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_right_button_two_link', 'text', 'Section Two Right Button Two Link', '');
        
        echo '<hr />';
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_one_from', 'text', 'Section Two Counter One Starts From', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_one_to', 'text', 'Section Two Counter One Stops To', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_one_extra_text', 'text', 'Section Two Counter One Extra Text', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_two_from', 'text', 'Section Two Counter Two Starts From', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_two_to', 'text', 'Section Two Counter Two Stops To', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_two_extra_text', 'text', 'Section Two Counter Two Extra Text', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_two_counter_right_editor', 'editor', 'Section Two Counter Right Side Editor', '');
        gb_add_new_field( get_the_ID(), 'landing_section_two_bottom_logos_slider', 'images', 'Section Two Bottom Logos Slider', $def_img);
        
        echo '<h3><span class="dashicons dashicons-arrow-right-alt2"></span>Section Three</h3><hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_a_image', 'image', 'Section Three Box A Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_a_day_text', 'text', 'Section Three Box A Day Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_a_title', 'text', 'Section Three Box A Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_a_description', 'textarea', 'Section Three Box A Description', '');
        
        echo '<hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_b_image', 'image', 'Section Three Box B Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_b_day_text', 'text', 'Section Three Box B Day Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_b_title', 'text', 'Section Three Box B Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_b_description', 'textarea', 'Section Three Box B Description', '');
        
        echo '<hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_c_image', 'image', 'Section Three Box C Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_c_day_text', 'text', 'Section Three Box C Day Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_c_title', 'text', 'Section Three Box C Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_three_box_c_description', 'textarea', 'Section Three Box C Description', '');
        
        echo '<hr /><br />';
        
        echo '<h3><span class="dashicons dashicons-arrow-right-alt2"></span>Section Four</h3><hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigboxes_heading', 'text', 'Section Four BigBoxes Heading', '');
        
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_image', 'image', 'Section Four BigBox One Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_background_color', 'color', 'Section Four BigBox One Background Color', '#F4F4F4');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_joining_title', 'text', 'Section Four BigBox One Joining Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_joining_title_color', 'color', 'Section Four BigBox One Joining Title Text Color', '#404040');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_title', 'text', 'Section Four BigBox One Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_title_color', 'color', 'Section Four BigBox One Title Text Color', '#404040');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_text', 'textarea', 'Section Four BigBox One Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_text_color', 'color', 'Section Four BigBox One Text Color', '#777');
        
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_a_title', 'text', 'Section Four BigBox One Button A Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_a_link', 'text', 'Section Four BigBox One Button A Link', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_b_title', 'text', 'Section Four BigBox One Button B Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_b_link', 'text', 'Section Four BigBox One Button B Link', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_logos', 'images', 'Section Four BigBox One Logos', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_one_button_text_colors', 'color', 'Section Four BigBox One Button Text Colors', '#5DBB63');
        $options_v_box_one = [
            'start' => 'Top',
            'center' => 'Middle',
            'end' => 'Bottom'
        ];
        
        joel_box_position_switch_options(get_the_ID(), 'landing_section_four_bigbox_one_content_positon_vertically', 'Section Four BigBox One Vertical Position', $options_v_box_one);
        
        $options_h_box_one = [
            'start' => 'Left',
            'center' => 'Center',
            'end' => 'Right'
        ];
        
        joel_box_position_switch_options(get_the_ID(), 'landing_section_four_bigbox_one_content_positon_horizontally', 'Section Four BigBox One Horizontal Position', $options_h_box_one);
        
        echo '<hr /><br />';
        
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_image', 'image', 'Section Four BigBox Two Image', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_background_color', 'color', 'Section Four BigBox Two Background Color', '#F4F4F4');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_joining_title', 'text', 'Section Four BigBox Two Joining Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_joining_title_color', 'color', 'Section Four BigBox Two Joining Title Text Color', '#F0F0F0');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_title', 'text', 'Section Four BigBox Two Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_title_color', 'color', 'Section Four BigBox Two Title Text Color', '#F0F0F0');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_text', 'textarea', 'Section Four BigBox Two Text', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_text_color', 'color', 'Section Four BigBox Two Text Color', '#F0F0F0');
        
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_a_title', 'text', 'Section Four BigBox Two Button A Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_a_link', 'text', 'Section Four BigBox Two Button A Link', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_b_title', 'text', 'Section Four BigBox Two Button B Title', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_b_link', 'text', 'Section Four BigBox Two Button B Link', '');
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_logos', 'images', 'Section Four BigBox Two Logos', $def_img);
        gb_add_new_field( get_the_ID(), 'landing_section_four_bigbox_two_button_text_colors', 'color', 'Section Four BigBox Two Button Text Colors', '#f0f0f0');
        
        $options_v_box_two = [
            'start' => 'Top',
            'center' => 'Middle',
            'end' => 'Bottom'
        ];
        
        joel_box_position_switch_options(get_the_ID(), 'landing_section_four_bigbox_two_content_positon_vertically', 'Section Four BigBox Two Vertical Position', $options_v_box_two);
        
        $options_h_box_two = [
            'start' => 'Left',
            'center' => 'Center',
            'end' => 'Right'
        ];
        
        joel_box_position_switch_options(get_the_ID(), 'landing_section_four_bigbox_two_content_positon_horizontally', 'Section Four BigBox Two Horizontal Position', $options_h_box_two);
        
    }
    
    
    if($wp_page_template == 'team.php'){
        echo '<h3><span class="dashicons dashicons-arrow-right-alt2"></span>Team Header</h3><hr /><br />';
        
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
        gb_add_new_field( get_the_ID(), 'team_section_one_header_image', 'image', 'Team Header Image:', $def_img);
        gb_add_new_field( get_the_ID(), 'team_section_one_header_title', 'text', 'Team Header Title:', '');
        gb_add_new_field( get_the_ID(), 'team_section_one_header_subtitle', 'text', 'Team Header SubTitle:', '');
        
        echo '<hr /><br />';
        
        $team_two_fields = [
            'title',
            'description'
        ];
        
        $team_two_fields_type = [
            'text',
            'editor'
        ];
        
        $team_two_fields_def = [
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'team' , 'two', $team_two_fields, $team_two_fields_type, $team_two_fields_def);
        
        echo '<hr /><br />';
        gb_counter_fields( get_the_ID() ,'team' , 'two', 'one' );
        
        echo '<hr />';
        
        gb_counter_fields( get_the_ID() ,'team' , 'two', 'two' );
        
        echo '<hr />';
        
        gb_counter_fields( get_the_ID() ,'team' , 'two', 'three' );
        
        echo '<hr />';
        
        gb_counter_fields( get_the_ID() ,'team' , 'two', 'four' );
        
        echo '<hr />';
        
        gb_counter_fields( get_the_ID() ,'team' , 'two', 'five' );
        
        echo '<hr /><br />';
        
        $team_three_fields = [
            'heading',
            'description'
        ];
        
        $team_three_fields_type = [
            'text',
            'editor'
        ];
        
        $team_three_fields_def = [
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'team' , 'three', $team_three_fields, $team_three_fields_type, $team_three_fields_def);
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'one' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'two' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'three' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'four' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'five' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'team' , 'three', 'six' );
        
        echo '<hr />';
        
        gb_button_fields( get_the_ID() ,'team' , 'three', 'one' );
        
        echo '<hr />';
        
        gb_button_fields( get_the_ID() ,'team' , 'three', 'two' );
        
        echo '<hr /><br />';
        
        $team_four_fields = [
            'image',
            'heading',
            'description'
        ];
        
        $team_four_fields_type = [
            'image',
            'text',
            'editor'
        ];
        
        $team_four_fields_def = [
            $def_img,
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'team' , 'four', $team_four_fields, $team_four_fields_type, $team_four_fields_def);
        
    }
    
    if($wp_page_template == 'frontpage.php'){
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
        
        echo '<hr /><br />';
        
        $frontpage_one_fields = [
            'image',
            'heading',
            'description',
            'calender_link',
            'logo_slider_images',
            'header_bottom_logos'
        ];
        
        $frontpage_one_fields_type = [
            'image',
            'text',
            'editor',
            'text',
            'images',
            'images'
        ];
        
        $frontpage_one_fields_def = [
            $def_img,
            '',
            '',
            '',
            $def_img,
            $def_img
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'frontpage' , 'one', $frontpage_one_fields, $frontpage_one_fields_type, $frontpage_one_fields_def);
        
        echo '<hr /><br />';
        
        $frontpage_two_fields = [
            'heading',
            'description'
        ];
        
        $frontpage_two_fields_type = [
            'text',
            'editor'
        ];
        
        $frontpage_two_fields_def = [
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'frontpage' , 'two', $frontpage_two_fields, $frontpage_two_fields_type, $frontpage_two_fields_def);
        
        
        echo '<hr />';
        
        gb_add_new_field( get_the_ID(), 'frontpage_section_two_label_image', 'image', 'Section Two Label Image', $def_img);   
        
        echo '<h1>Boka Nu Chat Fields</h1><hr /><br />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'one' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'two' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'three' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'four' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'five' );
        
        echo '<hr />';
        
        gb_boka_fields( get_the_ID() ,'frontpage' , 'two', 'six' );
        
        echo '<hr />';
        
        gb_button_fields( get_the_ID() ,'frontpage' , 'two', 'one' );
        
        echo '<hr />';
        
        gb_button_fields( get_the_ID() ,'frontpage' , 'two', 'two' );
        
        echo '<hr /><br />';
        
        $frontpage_three_fields = [
            'image',
            'heading',
            'description'
        ];
        
        $frontpage_three_fields_type = [
            'image',
            'text',
            'editor'
        ];
        
        $frontpage_three_fields_def = [
            $def_img,
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'frontpage' , 'three', $frontpage_three_fields, $frontpage_three_fields_type, $frontpage_three_fields_def);
        
        echo '<hr /><br />';
        
        gb_add_halfbox_fields( get_the_ID() ,'frontpage' , 'three', 'one' );
        
        echo '<hr />';
        
        gb_add_halfbox_fields( get_the_ID() ,'frontpage' , 'three', 'two' );
        
        echo '<hr />';
        
        gb_add_halfbox_fields( get_the_ID() ,'frontpage' , 'three', 'three' );
        
        echo '<hr />';
        
        gb_add_halfbox_fields( get_the_ID() ,'frontpage' , 'three', 'four' );
        
    }
    
    if($wp_page_template == 'contact_form.php'){
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
         
        $contact_form_top_section_fields = [
            'heading',
            'description',
            'progress_image_one',
            'progress_image_two',
            'progress_image_three',
            'progress_image_four',
            'base_background_color',
            'base_color'
        ];
        
        $contact_form_top_section_fields_type = [
            'text',
            'editor',
            'image',
            'image',
            'image',
            'image',
            'color',
            'color'
        ];
        
        $contact_form_top_section_fields_def = [
            '',
            '',
            $def_img,
            $def_img,
            $def_img,
            $def_img,
            '#f5f5f5',
            '#76a674'
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'one', $contact_form_top_section_fields, $contact_form_top_section_fields_type, $contact_form_top_section_fields_def);
        
        echo '<hr /><br />';
        
        $contact_form_all_heading_fields = [
            'heading_month',
            'heading_date',
            'heading_number_of_nights',
    		'heading_number_of_guests',
    		'heading_year'
    		
        ];
        
        $contact_form_all_heading_fields_type = [
            'text',
            'text',
    		'text',
    		'text',
            'text'
        ];
        
        $contact_form_all_heading_fields_def = [
            '',
            '',
            '',
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'one', $contact_form_all_heading_fields, $contact_form_all_heading_fields_type, $contact_form_all_heading_fields_def);
        
        echo '<hr /><br />';
        
        $contact_form_two_fields = [
            'heading',
            'description'
            
    		
        ];
        
        $contact_form_two_fields_type = [
            'text',
            'editor'
        ];
        
        $contact_form_two_fields_def = [
            '',
            ''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'two', $contact_form_two_fields, $contact_form_two_fields_type, $contact_form_two_fields_def);
        
        
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'one');
        echo '<hr /><br />';
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'two');
        echo '<hr /><br />';
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'three');
        echo '<hr /><br />';
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'four');
        echo '<hr /><br />';
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'five');
        echo '<hr /><br />';
        gb_range_slider_fields(get_the_ID(), 'contact_form' , 'two', 'six');
        
        echo '<hr /><br />';
        
        $contact_form_three_fields = [
            'button_one_text',
            'button_one_background_color',
            'button_one_color',
    		'button_two_text',
    		'button_two_background_color',
			'button_two_color',
			'button_three_text',
    		'button_three_background_color',
			'button_three_color',
			'button_four_text'
    		
        ];
        
        $contact_form_three_fields_type = [
            'text',
            'color',
    		'color',
    		'text',
            'color',
			'color',
			'text',
            'color',
			'color',
			'text'
        ];
        
        $contact_form_three_fields_def = [
            '',
            '#ffffff',
            '#A8A8A8',
            '',
            '#ffffff',
            '#A8A8A8',
			'',
            '#76a674',
			'#ffffff',
			''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'three', $contact_form_three_fields, $contact_form_three_fields_type, $contact_form_three_fields_def);
        
        
        echo '<hr /><br />';
        
        $contact_form_email_fields = [
            'heading',
            'description',
            'email_heading',
			'email_extra_text'
    		
        ];
        
        $contact_form_email_fields_type = [
            'text',
            'editor',
            'text',
            'text'
        ];
        
        $contact_form_email_fields_def = [
            '',
			'',
			'',
			''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'subscription', $contact_form_email_fields, $contact_form_email_fields_type, $contact_form_email_fields_def);
        
        echo '<hr /><br />';
        
        $contact_form_thank_you_fields = [
            'heading',
            'description',
            'ty_heading',
            'ty_description',
			'ty_extra_text',
			'ty_email',
			'ty_number',
			'ty_number_with_code'
    		
        ];
        
        $contact_form_thank_you_fields_type = [
            'text',
            'editor',
            'text',
            'editor',
            'text',
            'text',
            'text',
            'text'
        ];
        
        $contact_form_thank_you_fields_def = [
            '',
			'',
            '',
			'',
			'',
			'',
			'',
			''
        ];
        
        gb_add_multiple_fields( get_the_ID() ,'contact_form' , 'thank_you', $contact_form_thank_you_fields, $contact_form_thank_you_fields_type, $contact_form_thank_you_fields_def);
        
        
    }
    
}


function gb_save_new_field($id,$name, $type, $label, $def, $edit){
    global $wpdb;
    if($type == 'save'){
        $meta_key = 'gb_' . $name;
        $data = $_POST[$meta_key];
        
        if( $data == '' ){
            $data = $def;
        }
        if($edit != 'editor'){
            $data = str_replace('"', "'", $data);
            $data = $wpdb->_real_escape($data);
        }
        update_post_meta( $id, $meta_key, $data);
    }
}



//Cards
function gb_card_settings_callback(){
    $gb_card_logo = get_post_meta(get_the_ID(), 'gb_card_logo', true);
    
    if( !$gb_card_logo || $gb_card_logo == ''){
        $gb_card_logo = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    }
    
    $gb_card_thumbnail = get_post_meta(get_the_ID(), 'gb_card_thumbnail', true);
    
    if( !$gb_card_thumbnail || $gb_card_thumbnail == ''){
        $gb_card_thumbnail = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    }
    
    $gb_thumbnail_slider = get_post_meta(get_the_ID(), 'gb_thumbnail_slider', true);
    
    if( !$gb_thumbnail_slider || $gb_thumbnail_slider == ''){
        $gb_thumbnail_slider = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    }
    
    $add_in_slider_switch = get_post_meta( get_the_ID(), 'add_in_slider_switch', true);
    
    $gb_youtube_video_link = get_post_meta( get_the_ID(), 'gb_youtube_video_link', true);
    $gb_contact_form_link = get_post_meta( get_the_ID(), 'gb_contact_form_link', true);
    
    $part_one_a = get_post_meta( get_the_ID(), 'gb_part_one_a', true);
    $part_one_b = get_post_meta( get_the_ID(), 'gb_part_one_b', true);

    $part_two_a = get_post_meta( get_the_ID(), 'gb_part_two_a', true);
    $part_two_b = get_post_meta( get_the_ID(), 'gb_part_two_b', true);
    
    $part_three_a = get_post_meta( get_the_ID(), 'gb_part_three_a', true);
    $part_three_b = get_post_meta( get_the_ID(), 'gb_part_three_b', true);
    
    $part_four_a = get_post_meta( get_the_ID(), 'gb_part_four_a', true);
    $part_four_b = get_post_meta( get_the_ID(), 'gb_part_four_b', true);
    
    $gb_logo_width = get_post_meta(get_the_ID(), 'gb_logo_width', true);
    $gb_logo_height = get_post_meta(get_the_ID(), 'gb_logo_height', true);
    $gb_extra_content = get_post_meta(get_the_ID(), 'gb_extra_content', true);
    ?>
    <div class="field logo_option">
        <label><b>Card logo</b></label><br /><br />
        <div class="image_upload_option logo_upload">
            <img src="<?php echo $gb_card_logo; ?>" alt="" class="the_img"/><br />
            <button type="button" class="gb_trigger_upload change_logo">Change Logo</button>
            <button type="button" class="gb_trigger_remove_upload">Remove Logo</button>
            <input type="hidden" class="gb_logo_hidden save_data" name="gb_logo_hidden" id="gb_logo_hidden" value="<?php echo $gb_card_logo; ?>" />
        </div>
        
    </div><br />
    
    <div class="field gb_logo_width_field">        
        <label><b>Logo Width</b></label><br /><br />
        <input type="text" class="gb_logo_width data" name="gb_logo_width" value="<?php echo $gb_logo_width; ?>" style="display: block; width: 100%;" placeholder="Logo Width" />
    </div><br />
    
    <div class="field gb_logo_height_field">        
        <label><b>Logo Height</b></label><br /><br />
        <input type="text" class="gb_logo_height data" name="gb_logo_height" value="<?php echo $gb_logo_height; ?>" style="display: block; width: 100%;" placeholder="Logo Height" />
    </div><br />
    
    <div class="field gb_extra_content_field">        
        <label><b>Extra Content</b></label><br /><br />
        <textarea class="gb_extra_content data" name="gb_extra_content" style="display: block; width: 100%;" placeholder="Extra Content"><?php echo $gb_extra_content; ?></textarea>
    </div><br />
    
    <div class="field thumbnail_option">
        <label><b>Card thumbnail</b></label><br /><br />
        <div class="image_upload_option thumbnail_upload">
            <img src="<?php echo $gb_card_thumbnail; ?>" alt="" class="the_img"/><br />
            <button type="button" class="gb_trigger_upload change_thumbnail">Change Thumbnail</button>
            <button type="button" class="gb_trigger_remove_upload">Remove Thumbnail</button>
            <input type="hidden" class="gb_thumbnail_hidden save_data" name="gb_thumbnail_hidden" id="gb_thumbnail_hidden" value="<?php echo $gb_card_thumbnail; ?>"/>
        </div>
    </div><br />
    
    <div class="field thumbnail_slider_option">
        <label><b>Card thumbnail_slider</b></label><br /><br />
        <div class="image_upload_option thumbnail_slider_upload">
            <img src="<?php echo $gb_thumbnail_slider; ?>" alt="" class="the_img"/><br />
            <button type="button" class="gb_trigger_upload change_thumbnail_slider">Change Thumbnail Slider</button>
            <button type="button" class="gb_trigger_remove_upload">Remove Thumbnail Slider</button>
            <input type="hidden" class="gb_thumbnail_slider_hidden save_data" name="gb_thumbnail_slider_hidden" id="gb_thumbnail_slider_hidden" value="<?php echo $gb_thumbnail_slider; ?>"/>
        </div>
    </div><br />
    
    <div class="field add_in_slider">
        <label><b>Add this in slider</b></label><br /><br />
        
        <label for="add_in_slider_switch_yes" >
            <input type="radio" class="add_in_slider_switch switch" name="add_in_slider_switch" id="add_in_slider_switch_yes" value="yes" <?php if($add_in_slider_switch == 'yes'){ echo 'checked'; } ?> />Yes
        </label>
        
        &nbsp;&nbsp;
        
        <label for="add_in_slider_switch_no" >
            <input type="radio" class="add_in_slider_switch switch" name="add_in_slider_switch" id="add_in_slider_switch_no" value="no" <?php if($add_in_slider_switch == 'no'){ echo 'checked'; } ?> />No
        </label><br /> 
        
        <input type="hidden" class="add_in_slider_switch_data data" name="add_in_slider_switch_data" value="<?php echo $add_in_slider_switch; ?>"/>
        
        <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Choose Header for the Page </span>
    </div><br />
    
    <div class="field gb_youtube_video_link_field">        
        <label><b>Youtube Video Link</b></label><br /><br />
        <input type="text" class="gb_youtube_video_link data" name="gb_youtube_video_link" value="<?php echo $gb_youtube_video_link; ?>" style="display: block; width: 100%;" placeholder="Youtube Video Link" />
        <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Put the link of the video which you want to display in Spela Film button </span>
    </div><br />
    
    <div class="field gb_contact_form_link_field">        
        <label><b>Contact Form Link</b></label><br /><br />
        <input type="text" class="gb_contact_form_link data" name="gb_contact_form_link" value="<?php echo $gb_contact_form_link; ?>" style="display: block; width: 100%;" placeholder="Contact Form Link" />
        <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Put the link of the Contact Page which you want to redirect from Boka Nu button. There is a parameter which will help the form to lt you know what service user use for booking. Pareameter is <i style="font-weight: bold;">upplevelser_id=[pid]</i> [pid] is shortcode which collects the the unique id of the service.</span>
    </div><br />
    
    <h2 class="gb_ei_class">Extra Information</h2>
    
    <div class="field field_two gb_contact_form_link_field">        
        <label><b>Part 1</b></label><br /><br />
        <input type="text" class="gb_contact_form_link data" name="gb_part_one_a" value="<?php echo $part_one_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
        <input type="text" class="gb_contact_form_link data" name="gb_part_one_b" value="<?php echo $part_one_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
    </div><br />
    
    <div class="field field_two gb_contact_form_link_field">        
        <label><b>Part 2</b></label><br /><br />
        <input type="text" class="gb_contact_form_link data" name="gb_part_two_a" value="<?php echo $part_two_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
        <input type="text" class="gb_contact_form_link data" name="gb_part_two_b" value="<?php echo $part_two_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
    </div><br />
    
    <div class="field field_two gb_contact_form_link_field">        
        <label><b>Part 3</b></label><br /><br />
        <input type="text" class="gb_contact_form_link data" name="gb_part_three_a" value="<?php echo $part_three_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
        <input type="text" class="gb_contact_form_link data" name="gb_part_three_b" value="<?php echo $part_three_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
    </div><br />
    
    <div class="field field_two gb_contact_form_link_field">        
        <label><b>Part 4</b></label><br /><br />
        <input type="text" class="gb_contact_form_link data" name="gb_part_four_a" value="<?php echo $part_four_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
        <input type="text" class="gb_contact_form_link data" name="gb_part_four_b" value="<?php echo $part_four_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
    </div><br />
    
    <?php
    echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Blog Page Slider Info </h3><br />';
    
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    gb_add_new_field( get_the_ID(), 'card_slider_images', 'images', 'Card Slider Images', $def_img);
    /*gb_add_new_field( get_the_ID(), 'card_slider_label', 'text', 'Card Slider Label', '');*/
    
}

function gb_almedalen_settings_callback(){
    $part_one_a = get_post_meta( get_the_ID(), 'gb_part_one_a', true);
    $part_one_b = get_post_meta( get_the_ID(), 'gb_part_one_b', true);

    $part_two_a = get_post_meta( get_the_ID(), 'gb_part_two_a', true);
    $part_two_b = get_post_meta( get_the_ID(), 'gb_part_two_b', true);
    
    $part_three_a = get_post_meta( get_the_ID(), 'gb_part_three_a', true);
    $part_three_b = get_post_meta( get_the_ID(), 'gb_part_three_b', true);
    
    $part_four_a = get_post_meta( get_the_ID(), 'gb_part_four_a', true);
    $part_four_b = get_post_meta( get_the_ID(), 'gb_part_four_b', true);
    $gb_extra_content = get_post_meta(get_the_ID(), 'gb_extra_content', true);
    
    ?>
        <div class="field gb_extra_content_field">        
            <label><b>Extra Content</b></label><br /><br />
            <textarea class="gb_extra_content data" name="gb_extra_content" style="display: block; width: 100%;" placeholder="Extra Content"><?php echo $gb_extra_content; ?></textarea>
            
        </div><br />
        
        <div class="field field_two gb_contact_form_link_field">        
            <label><b>Part 1</b></label><br /><br />
            <input type="text" class="gb_contact_form_link data" name="gb_part_one_a" value="<?php echo $part_one_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
            <input type="text" class="gb_contact_form_link data" name="gb_part_one_b" value="<?php echo $part_one_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
            
        </div><br />
        
        <div class="field field_two gb_contact_form_link_field">        
            <label><b>Part 2</b></label><br /><br />
            <input type="text" class="gb_contact_form_link data" name="gb_part_two_a" value="<?php echo $part_two_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
            <input type="text" class="gb_contact_form_link data" name="gb_part_two_b" value="<?php echo $part_two_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
            
        </div><br />
        
        <div class="field field_two gb_contact_form_link_field">        
            <label><b>Part 3</b></label><br /><br />
            <input type="text" class="gb_contact_form_link data" name="gb_part_three_a" value="<?php echo $part_three_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
            <input type="text" class="gb_contact_form_link data" name="gb_part_three_b" value="<?php echo $part_three_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
            
        </div><br />
        
        <div class="field field_two gb_contact_form_link_field">        
            <label><b>Part 4</b></label><br /><br />
            <input type="text" class="gb_contact_form_link data" name="gb_part_four_a" value="<?php echo $part_four_a; ?>" style="display: inline-block; width: 45%;" placeholder="A Side" />
            <input type="text" class="gb_contact_form_link data" name="gb_part_four_b" value="<?php echo $part_four_b; ?>" style="display: inline-block; width: 45%;" placeholder="B Side" />
            
        </div><br />
    <?php
        echo '<hr /><h3><span class="dashicons dashicons-arrow-right-alt2"></span> Blog Page Slider Info </h3><br />';
        
        $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
        gb_add_new_field( get_the_ID(), 'card_slider_images', 'images', 'Card Slider Images', $def_img);
        gb_add_new_field( get_the_ID(), 'card_slider_label', 'text', 'Card Slider Label', '');
}

function gb_team_member_settings_callback(){
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    
    $team_data = [
        'email',
        'phone_number',
        'phone_number_with_country_code',
        'image',
        'hover_image'
    ];
    
    $team_data_type = [
        'text',
        'text',
        'text',
        'image',
        'image'
    ];
    
    $team_data_def = [
        '',
        '',
        '',
        $def_img,
        $def_img
    ];
    //https://stackoverflow.com/questions/44468578/wordpress-uncaught-typeerror-wp-media-is-not-a-function
    gb_add_multiple_fields(get_the_ID(), 'team', 'member', $team_data, $team_data_type, $team_data_def);
    
    $gb_member_switch = get_post_meta( get_the_ID(), 'gb_member_switch_data', true );
    if(!$gb_member_switch || $gb_member_switch == ''){
        $gb_member_switch = 'yes';
    }
    ?>
    <hr />
    <div class="field gb_member">
        <label><b>Do this member show in the site?</b></label><br /><br />
        
        <label for="gb_member_switch_yes" >
            <input type="radio" class="gb_member_switch switch" name="gb_member_switch" id="gb_member_switch_yes" value="yes" <?php if($gb_member_switch == 'yes'){ echo 'checked'; } ?> />Yes
        </label>
        
        &nbsp;&nbsp;
        
        <label for="gb_member_switch_no" >
            <input type="radio" class="gb_member_switch switch" name="gb_member_switch" id="gb_member_switch_no" value="no" <?php if($gb_member_switch == 'no'){ echo 'checked'; } ?> />No
        </label><br /> 
        
        <input type="hidden" class="gb_member_switch_data data" name="gb_member_switch_data" value="<?php echo $gb_member_switch; ?>"/>
    </div><br />
    
    <?php
    
}

function gb_save_cards_meta( $post_id ) {
    
    if( get_post_type($post_id) == 'card' ) {
        $gb_logo_hidden = $_POST['gb_logo_hidden'];
        update_post_meta($post_id, 'gb_card_logo', $gb_logo_hidden);
        
        $gb_logo_height = $_POST['gb_logo_height'];
        if($gb_logo_height == ''){
            $gb_logo_height = 'auto';
        }
        update_post_meta($post_id, 'gb_logo_height', $gb_logo_height);
        
        
        $gb_logo_width = $_POST['gb_logo_width'];
        if($gb_logo_width == ''){
            $gb_logo_width = '100%';
        }
        update_post_meta($post_id, 'gb_logo_width', $gb_logo_width);
        
        $gb_thumbnail_hidden = $_POST['gb_thumbnail_hidden'];
        update_post_meta($post_id, 'gb_card_thumbnail', $gb_thumbnail_hidden);
        
        $gb_thumbnail_slider_hidden = $_POST['gb_thumbnail_slider_hidden'];
        update_post_meta($post_id, 'gb_thumbnail_slider', $gb_thumbnail_slider_hidden);
        
        $add_in_slider_switch = $_POST['add_in_slider_switch_data'];
        update_post_meta( $post_id, 'add_in_slider_switch', $add_in_slider_switch);
        
        $gb_youtube_video_link = $_POST['gb_youtube_video_link'];
        update_post_meta( $post_id, 'gb_youtube_video_link', $gb_youtube_video_link);
        
        $gb_contact_form_link = $_POST['gb_contact_form_link'];
        update_post_meta( $post_id, 'gb_contact_form_link', $gb_contact_form_link);
        
        $gb_extra_content = $_POST['gb_extra_content'];
        update_post_meta($post_id, 'gb_extra_content', $gb_extra_content);
        
        //gb_part_four_a
        
        
        $gb_part_one_a = $_POST['gb_part_one_a'];
        update_post_meta( $post_id, 'gb_part_one_a', $gb_part_one_a);
        
        $gb_part_one_b = $_POST['gb_part_one_b'];
        update_post_meta( $post_id, 'gb_part_one_b', $gb_part_one_b);
        
        
        $gb_part_two_a = $_POST['gb_part_two_a'];
        update_post_meta( $post_id, 'gb_part_two_a', $gb_part_two_a);
        
        $gb_part_two_b = $_POST['gb_part_two_b'];
        update_post_meta( $post_id, 'gb_part_two_b', $gb_part_two_b);
        
        
        $gb_part_three_a = $_POST['gb_part_three_a'];
        update_post_meta( $post_id, 'gb_part_three_a', $gb_part_three_a);
        
        $gb_part_three_b = $_POST['gb_part_three_b'];
        update_post_meta( $post_id, 'gb_part_three_b', $gb_part_three_b);
        
        
        $gb_part_four_a = $_POST['gb_part_four_a'];
        update_post_meta( $post_id, 'gb_part_four_a', $gb_part_four_a);
        
        $gb_part_four_b = $_POST['gb_part_four_b'];
        update_post_meta( $post_id, 'gb_part_four_b', $gb_part_four_b);
        
        gb_save_new_field($post_id, 'card_slider_images', 'save', '' , '', '');
    }
    
}

add_action( 'save_post', 'gb_save_cards_meta', 10, 2 );
add_action( 'publish_post', 'gb_save_cards_meta' );

function gb_save_almedalen_meta( $post_id ) {
    
    if( get_post_type($post_id) == 'almedalen' ) {
        $gb_extra_content = $_POST['gb_extra_content'];
        update_post_meta($post_id, 'gb_extra_content', $gb_extra_content);
        
        $gb_part_one_a = $_POST['gb_part_one_a'];
        update_post_meta( $post_id, 'gb_part_one_a', $gb_part_one_a);
        
        $gb_part_one_b = $_POST['gb_part_one_b'];
        update_post_meta( $post_id, 'gb_part_one_b', $gb_part_one_b);
        
        
        $gb_part_two_a = $_POST['gb_part_two_a'];
        update_post_meta( $post_id, 'gb_part_two_a', $gb_part_two_a);
        
        $gb_part_two_b = $_POST['gb_part_two_b'];
        update_post_meta( $post_id, 'gb_part_two_b', $gb_part_two_b);
        
        
        $gb_part_three_a = $_POST['gb_part_three_a'];
        update_post_meta( $post_id, 'gb_part_three_a', $gb_part_three_a);
        
        $gb_part_three_b = $_POST['gb_part_three_b'];
        update_post_meta( $post_id, 'gb_part_three_b', $gb_part_three_b);
        
        
        $gb_part_four_a = $_POST['gb_part_four_a'];
        update_post_meta( $post_id, 'gb_part_four_a', $gb_part_four_a);
        
        $gb_part_four_b = $_POST['gb_part_four_b'];
        update_post_meta( $post_id, 'gb_part_four_b', $gb_part_four_b);
        
        gb_save_new_field($post_id, 'card_slider_images', 'save', '' , '', '');
        gb_save_new_field($post_id, 'card_slider_label', 'save', '' , '', '');
    }
    
}

add_action( 'save_post', 'gb_save_almedalen_meta', 10, 2 );
add_action( 'publish_post', 'gb_save_almedalen_meta' );

function gb_save_gb_member_meta( $post_id ) {
    
    if( get_post_type($post_id) == 'gb_member' ) {
        $team_data = [
            'email',
            'phone_number',
            'phone_number_with_country_code',
            'image',
            'hover_image'
        ];
        
        $team_data_type = [
            'text',
            'text',
            'text',
            'image',
            'image'
        ];
        
        $team_data_def = [
            '',
            '',
            '',
            '',
            ''
        ];
        gb_save_multiple_fields($post_id, 'team', 'member', $team_data, $team_data_type, $team_data_def);
        
        $gb_member_switch_data = $_POST['gb_member_switch_data'];
        update_post_meta( $post_id, 'gb_member_switch_data', $gb_member_switch_data);
    }
    
}

add_action( 'save_post', 'gb_save_gb_member_meta', 10, 2 );
add_action( 'publish_post', 'gb_save_gb_member_meta' );

function gb_save_gb_booking_meta( $post_id ) {
    
    if( get_post_type($post_id) == 'gb_booking' ) {
        $booking_data = [
            'page_name',
            'service_name',
            'departure_date',
            'comeback_date',
            'guests',
            'user_email',
            'range_one',
            'range_two',
            'range_three',
            'range_four',
            'range_five',
            'range_six'
            
        ];
        
        $booking_data_type = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
        
        $booking_data_def = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
        
        gb_save_multiple_fields($post_id, 'booking', 'j', $booking_data, $booking_data_type, $booking_data_def);
    }
}

add_action( 'save_post', 'gb_save_gb_booking_meta', 10, 2 );
add_action( 'publish_post', 'gb_save_gb_booking_meta' );

function gb_save_page_meta( $post_id ) {

    if( get_post_type($post_id) == 'page' ) {
        $value = $_POST['slider_option_switch_data']; // The value depends in fact on the value of another field
        update_post_meta($post_id, 'slider_option_switch', $value);
        
        $header_option_switch = $_POST['header_option_switch_data'];
        update_post_meta($post_id, 'header_option_switch', $header_option_switch);
        
        //Blog.php
        $gb_header_left_image_hidden = $_POST['gb_header_left_image_hidden'];
        update_post_meta( $post_id, 'gb_header_left_image_hidden', $gb_header_left_image_hidden);
        
        //gb_header_right_text_id
        $gb_header_right_text_id = $_POST['gb_header_right_text_id'];
        update_post_meta( $post_id, 'gb_header_right_text_id', $gb_header_right_text_id);
        
        //gb_card_header_bg_image
        $gb_card_header_bg_image = $_POST['gb_card_header_bg_image'];
        update_post_meta( $post_id, 'gb_card_header_bg_image', $gb_card_header_bg_image);
        
        
        //gb_bg_text_one
        $gb_bg_text_one = $_POST['gb_bg_text_one'];
        update_post_meta( $post_id, 'gb_bg_text_one', $gb_bg_text_one);
        
        //gb_bg_text_two
        $gb_bg_text_two = $_POST['gb_bg_text_two'];
        update_post_meta( $post_id, 'gb_bg_text_two', $gb_bg_text_two);
        
        //gb_bg_text_three
        $gb_bg_text_three = $_POST['gb_bg_text_three'];
        update_post_meta( $post_id, 'gb_bg_text_three', $gb_bg_text_three);
        
        //gb_bg_text_four
        $gb_bg_text_four = $_POST['gb_bg_text_four'];
        update_post_meta( $post_id, 'gb_bg_text_four', $gb_bg_text_four);
        
        //gb_bg_text_five
        $gb_bg_text_five = $_POST['gb_bg_text_five'];
        update_post_meta( $post_id, 'gb_bg_text_five', $gb_bg_text_five);
        
        //gb_bg_text_six
        $gb_bg_text_six = $_POST['gb_bg_text_six'];
        update_post_meta( $post_id, 'gb_bg_text_six', $gb_bg_text_six);
        
        //gb_bg_text_seven
        $gb_bg_text_seven = $_POST['gb_bg_text_seven'];
        update_post_meta( $post_id, 'gb_bg_text_seven', $gb_bg_text_seven);
        
        //gb_section_one_logo
        $gb_section_one_logo = $_POST['gb_section_one_logo'];
        update_post_meta( $post_id, 'gb_section_one_logo', $gb_section_one_logo);
        
        //gb_section_one_heading
        $gb_section_one_heading = $_POST['gb_section_one_heading'];
        update_post_meta( $post_id, 'gb_section_one_heading', $gb_section_one_heading);
        
        //gb_section_one_heading
        $section_one_text = $_POST['gb_section_one_text'];
        update_post_meta( $post_id, 'gb_section_one_text', $section_one_text);
        
        gb_save_new_field($post_id, 'section_one_item_image_one', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_one', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_one', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_one_item_image_two', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_two', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_two', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_one_item_image_three', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_three', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_three', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_one_item_image_four', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_four', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_four', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_one_item_image_five', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_five', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_five', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_one_item_image_six', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_text_six', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_one_item_link_six', 'save', '' , '', '');
        
        // Blog Section Two
        
        gb_save_new_field($post_id, 'section_two_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_two_heading', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_two_editor', 'save', '' , '', 'editor');
        
        gb_save_new_field($post_id, 'section_three_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_three_heading', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_three_editor', 'save', '' , '', 'editor');
        
        gb_save_new_field($post_id, 'section_four_heading', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_five_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_five_heading', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_five_editor', 'save', '' , '', 'editor');
        
        gb_save_new_field($post_id, 'section_six_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_six_heading', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_six_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'section_six_text', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'section_seven_image', 'save', '' , '', '');
        
        
        //LANDING PAGE
        gb_save_new_field($post_id, 'landing_section_one_video', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_one_caption_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_one_caption_subtitle', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_one_film_button_name', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_one_film_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_one_logos', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_start_text_editor', 'save', '' , '', 'editor');
        
        gb_save_new_field($post_id, 'landing_section_two_left_logo_one', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_left_logo_one_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_left_logo_one_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_left_logo_two', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_left_logo_two_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_left_logo_two_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_one_name', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_one_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_one_background_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_one_text_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_two_name', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_two_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_two_background_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_right_button_two_text_color', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'landing_section_two_counter_one_from', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_counter_one_to', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_counter_one_extra_text', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'landing_section_two_counter_two_from', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_counter_two_to', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_two_counter_two_extra_text', 'save', '' , '', '');
    
        gb_save_new_field($post_id, 'landing_section_two_counter_right_editor', 'save', '' , '', 'editor');
        gb_save_new_field($post_id, 'landing_section_two_bottom_logos_slider', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'landing_section_three_box_a_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_a_day_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_a_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_a_description', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'landing_section_three_box_b_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_b_day_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_b_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_b_description', 'save', '' , '', '');
        
        gb_save_new_field($post_id, 'landing_section_three_box_c_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_c_day_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_c_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_three_box_c_description', 'save', '' , '', '');
        
        
        gb_save_new_field($post_id, 'landing_section_four_bigboxes_heading', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_background_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_joining_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_joining_title_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_title_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_text_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_button_a_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_button_a_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_button_b_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_button_b_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_logos', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_one_button_text_colors', 'save', '' , '', '');
        
        joel_box_position_switch_options_save($post_id, 'landing_section_four_bigbox_one_content_positon_vertically');
        joel_box_position_switch_options_save($post_id, 'landing_section_four_bigbox_one_content_positon_horizontally');
        
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_background_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_joining_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_joining_title_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_title_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_text', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_text_color', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_button_a_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_button_a_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_button_b_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_button_b_link', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_logos', 'save', '' , '', '');
        gb_save_new_field($post_id, 'landing_section_four_bigbox_two_button_text_colors', 'save', '' , '', '');
        
        joel_box_position_switch_options_save($post_id, 'landing_section_four_bigbox_two_content_positon_vertically');
        joel_box_position_switch_options_save($post_id, 'landing_section_four_bigbox_two_content_positon_horizontally');
        
        //Team
        gb_save_new_field($post_id, 'team_section_one_header_image', 'save', '' , '', '');
        gb_save_new_field($post_id, 'team_section_one_header_title', 'save', '' , '', '');
        gb_save_new_field($post_id, 'team_section_one_header_subtitle', 'save', '' , '', '');
        
        
        $team_two_fields = [
            'title',
            'description'
        ];
        
        $team_two_fields_type = [
            '',
            'editor'
        ];
        
        $team_two_fields_def = [
            '',
            ''
        ];
            
        gb_save_multiple_fields($post_id, 'team', 'two', $team_two_fields, $team_two_fields_type, $team_two_fields_def);
        
        //get_the_ID() ,'team' , 'two', 'one'
        gb_counter_fields_save($post_id ,'team' , 'two', 'one');
        gb_counter_fields_save($post_id ,'team' , 'two', 'two');
        gb_counter_fields_save($post_id ,'team' , 'two', 'three');
        gb_counter_fields_save($post_id ,'team' , 'two', 'four');
        gb_counter_fields_save($post_id ,'team' , 'two', 'five');
        
        $team_three_fields = [
            'heading',
            'description'
        ];
        
        $team_three_fields_type = [
            '',
            'editor'
        ];
        
        $team_three_fields_def = [
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id ,'team' , 'three', $team_three_fields, $team_three_fields_type, $team_three_fields_def);
        
        gb_boka_fields_save($post_id ,'team' , 'three', 'one');
        gb_boka_fields_save($post_id ,'team' , 'three', 'two');
        gb_boka_fields_save($post_id ,'team' , 'three', 'three');
        gb_boka_fields_save($post_id ,'team' , 'three', 'four');
        gb_boka_fields_save($post_id ,'team' , 'three', 'five');
        gb_boka_fields_save($post_id ,'team' , 'three', 'six');
        
        gb_button_fields_save($post_id ,'team' , 'three', 'one');
        gb_button_fields_save($post_id ,'team' , 'three', 'two');
        
        $team_four_fields = [
            'image',
            'heading',
            'description'
        ];
        
        $team_four_fields_type = [
            '',
            '',
            'editor'
        ];
        
        $team_four_fields_def = [
            '',
            '',
            ''
        ];
            
        gb_save_multiple_fields($post_id, 'team', 'four', $team_four_fields, $team_four_fields_type, $team_four_fields_def);
        
        
        $frontpage_one_fields = [
            'image',
            'heading',
            'description',
            'calender_link',
            'logo_slider_images',
            'header_bottom_logos'
        ];
        
        $frontpage_one_fields_type = [
            '',
            '',
            'editor',
            '',
            '',
            ''
        ];
        
        $frontpage_one_fields_def = [
            $def_img,
            '',
            '',
            '',
            '',
        ];
        
        gb_save_multiple_fields( $post_id ,'frontpage' , 'one', $frontpage_one_fields, $frontpage_one_fields_type, $frontpage_one_fields_def);
        
        $frontpage_two_fields = [
            'heading',
            'description'
        ];
        
        $frontpage_two_fields_type = [
            '',
            'editor'
        ];
        
        $frontpage_two_fields_def = [
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id ,'frontpage' , 'two', $frontpage_two_fields, $frontpage_two_fields_type, $frontpage_two_fields_def);
        
        gb_save_new_field($post_id, 'frontpage_section_two_label_image', 'save', '' , '', '');
        
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'one');
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'two');
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'three');
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'four');
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'five');
        gb_boka_fields_save($post_id ,'frontpage' , 'two', 'six');
        
        gb_button_fields_save($post_id ,'frontpage' , 'two', 'one');
        gb_button_fields_save($post_id ,'frontpage' , 'two', 'two');
        
        $frontpage_three_fields = [
            'image',
            'heading',
            'description'
        ];
        
        $frontpage_three_fields_type = [
            '',
            '',
            'editor'
        ];
        
        $frontpage_three_fields_def = [
            $def_img,
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id, 'frontpage' , 'three', $frontpage_three_fields, $frontpage_three_fields_type, $frontpage_three_fields_def);
        
        gb_save_halfbox_fields( $post_id ,'frontpage' , 'three', 'one' );
        gb_save_halfbox_fields( $post_id ,'frontpage' , 'three', 'two' );
        gb_save_halfbox_fields( $post_id ,'frontpage' , 'three', 'three' );
        gb_save_halfbox_fields( $post_id ,'frontpage' , 'three', 'four' );
        
        $contact_form_top_section_fields = [
            'heading',
            'description',
            'progress_image_one',
            'progress_image_two',
            'progress_image_three',
            'progress_image_four',
            'base_background_color',
            'base_color'
        ];
        
        $contact_form_top_section_fields_type = [
            '',
            'editor',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
        
        $contact_form_top_section_fields_def = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'one', $contact_form_top_section_fields, $contact_form_top_section_fields_type, $contact_form_top_section_fields_def);
        
        
        $contact_form_all_heading_fields = [
            'heading_month',
            'heading_date',
            'heading_number_of_nights',
    		'heading_number_of_guests',
    		'heading_year'
    		
        ];
        
        $contact_form_all_heading_fields_type = [
            '',
            '',
    		'',
    		'',
            ''
        ];
        
        $contact_form_all_heading_fields_def = [
            '',
            '',
            '',
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'one', $contact_form_all_heading_fields, $contact_form_all_heading_fields_type, $contact_form_all_heading_fields_def);
        
        $contact_form_two_fields = [
            'heading',
            'description'
        ];
        
        $contact_form_two_fields_type = [
            '',
            'editor'
        ];
        
        $contact_form_two_fields_def = [
            '',
            ''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'two', $contact_form_two_fields, $contact_form_two_fields_type, $contact_form_two_fields_def);
        
        
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'one');
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'two');
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'three');
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'four');
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'five');
        gb_range_slider_fields_save($post_id, 'contact_form' , 'two', 'six');
    
        
        $contact_form_three_fields = [
            'button_one_text',
            'button_one_background_color',
            'button_one_color',
    		'button_two_text',
    		'button_two_background_color',
    		'button_two_color',
    		'button_three_text',
    		'button_three_background_color',
    		'button_three_color',
    		'button_four_text'
    		
        ];
        
        $contact_form_three_fields_type = [
            '',
            '',
    		'',
    		'',
            '',
    		'',
    		'',
            '',
    		'',
    		''
        ];
        
        $contact_form_three_fields_def = [
            '',
            '',
            '',
            '',
            '',
    		'',
    		'',
            '',
    		'',
    		''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'three', $contact_form_three_fields, $contact_form_three_fields_type, $contact_form_three_fields_def);
        
        
        $contact_form_email_fields = [
            'heading',
            'description',
            'email_heading',
			'email_extra_text'
    		
        ];
        
        $contact_form_email_fields_type = [
            '',
            'editor',
            '',
            ''
        ];
        
        $contact_form_email_fields_def = [
            '',
			'',
			'',
			''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'subscription', $contact_form_email_fields, $contact_form_email_fields_type, $contact_form_email_fields_def);
        
        $contact_form_thank_you_fields = [
            'heading',
            'description',
            'ty_heading',
            'ty_description',
			'ty_extra_text',
			'ty_email',
			'ty_number',
			'ty_number_with_code'
    		
        ];
        
        $contact_form_thank_you_fields_type = [
            '',
            'editor',
            '',
            'editor',
            '',
            '',
            '',
            ''
        ];
        
        $contact_form_thank_you_fields_def = [
            '',
			'',
            '',
			'',
			'',
			'',
			'',
			''
        ];
        
        gb_save_multiple_fields( $post_id ,'contact_form' , 'thank_you', $contact_form_thank_you_fields, $contact_form_thank_you_fields_type, $contact_form_thank_you_fields_def);
    
    }
    
}

add_action( 'save_post', 'gb_save_page_meta', 10, 2 );
add_action( 'publish_post', 'gb_save_page_meta', 10, 2 );

function gb_show_new_field($id, $key, $def, $edit){
    $meta_key = 'gb_' . $key;
    $data = get_post_meta( $id, $meta_key, true);
    if( !$data || $data == ''){
        $data = $def;
    }
    
    if($edit != 'editor'){
        $data = stripslashes($data);
    }
    
    return $data;
}

function gb_boka_fields_show($id, $page, $section, $boka){
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_boka_' . $boka;
    
    $image = gb_show_new_field( $id, $meta_id . '_image', $def_img, '');
    $title = gb_show_new_field( $id, $meta_id . '_title', 'BOKA', '');
    $link = gb_show_new_field( $id, $meta_id . '_link', '#', '');
    
    ?>
    <a href="<?php echo $link; ?>" class="col-md-2 col-4 circle_thumbs d-flex align-items-center justify-content-center">
      <img src="<?php echo $image; ?>" alt="Ellipse" class="img_circle" meta_id='<?php echo $meta_id; ?>' />
      <span><?php echo $title; ?></span>
    </a>
    <?php
    
}

function gb_button_fields_show($id, $page, $section, $button, $light_or_bg){
    if($light_or_bg == 'bg'){
        $cl = 'btn_bg';
    }else{
        $cl = 'btn_light';
    }
    
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_button_' . $button;
    
    $bc = gb_show_new_field( $id, $meta_id . '_background_color', '#76a674', '');
    $c = gb_show_new_field( $id, $meta_id . '_color', '#F2F2F2', '');
    $title = gb_show_new_field( $id, $meta_id . '_title', 'button', '');
    $link = gb_show_new_field( $id, $meta_id . '_link', '#', '');
    
    ?>
    <a href="<?php echo $link; ?>" class="j_btns <?php echo $cl; ?>" style="background-color: <?php echo $bc; ?>!important; color: <?php echo $c; ?>;"><?php echo $title; ?></a>
    <?php
    
}

function gb_button_fields_show_two($id, $page, $section, $button, $light_or_bg){
    if($light_or_bg == 'bg'){
        $cl = 'btn_bg';
    }else{
        $cl = 'btn_light';
    }
    
    $def_img = home_url('/') . 'wp-content/uploads/2020/02/default_image_01.png';
    $meta_id = $page . '_section_' . $section . '_button_' . $button;
    
    $bc = gb_show_new_field( $id, $meta_id . '_background_color', '#76a674', '');
    $c = gb_show_new_field( $id, $meta_id . '_color', '#F2F2F2', '');
    $title = gb_show_new_field( $id, $meta_id . '_title', 'button', '');
    $link = gb_show_new_field( $id, $meta_id . '_link', '#', '');
    
    ?>
    <a href="<?php echo $link; ?>" class="j_btns <?php echo $cl; ?>" style="background-color: <?php echo $bc; ?>!important; color: <?php echo $c; ?>;"><span style="color: <?php echo $c; ?>;"><?php echo $title; ?></span> <i class="fas fa-chevron-right" style="color: <?php echo $c; ?>;"></i></a>
    <?php
    
}


add_filter('enter_title_here', 'my_title_place_holder' , 20 , 2 );
function my_title_place_holder($title , $post){

    if( $post->post_type == 'gb_member' ){
        $my_title = "Member Name";
        return $my_title;
    }
    
    if( $post->post_type == 'gb_booking' ){
        $my_title = "Username";
        return $my_title;
    }
    
    return $title;

}

function gb_page_card_init() {
    $labels = array(
        'name'                  => _x( 'Upplevelser', 'Post type general name', 'j_the_fun_theme' ),
        'singular_name'         => _x( 'Upplevelser', 'Post type singular name', 'j_the_fun_theme' ),
        'menu_name'             => _x( 'Upplevelser', 'Admin Menu text', 'j_the_fun_theme' ),
        'name_admin_bar'        => _x( 'Upplevelser', 'Add New on Toolbar', 'j_the_fun_theme' ),
        'add_new'               => __( 'Add New', 'j_the_fun_theme' ),
        'add_new_item'          => __( 'Add New Upplevelser', 'j_the_fun_theme' ),
        'new_item'              => __( 'New Upplevelser', 'j_the_fun_theme' ),
        'edit_item'             => __( 'Edit Upplevelser', 'j_the_fun_theme' ),
        'view_item'             => __( 'View Upplevelser', 'j_the_fun_theme' ),
        'all_items'             => __( 'All Upplevelser', 'j_the_fun_theme' ),
        'search_items'          => __( 'Search Upplevelser', 'j_the_fun_theme' ),
        'parent_item_colon'     => __( 'Parent Upplevelser:', 'j_the_fun_theme' ),
        'not_found'             => __( 'No Upplevelser found.', 'j_the_fun_theme' ),
        'not_found_in_trash'    => __( 'No Upplevelser found in Trash.', 'j_the_fun_theme' ),
        'featured_image'        => _x( 'Upplevelser Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'archives'              => _x( 'Upplevelser archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'j_the_fun_theme' ),
        'insert_into_item'      => _x( 'Insert into Upplevelser', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'j_the_fun_theme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Upplevelser', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'j_the_fun_theme' ),
        'filter_items_list'     => _x( 'Filter Upplevelser list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list_navigation' => _x( 'Upplevelser list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list'            => _x( 'Upplevelser list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'j_the_fun_theme' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'card' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-images-alt',
    );
 
    register_post_type( 'card', $args );
    

    $labels = array(
        'name'                  => _x( 'Almedalsveckan', 'Post type general name', 'j_the_fun_theme' ),
        'singular_name'         => _x( 'Almedalsveckan', 'Post type singular name', 'j_the_fun_theme' ),
        'menu_name'             => _x( 'Almedalsveckan', 'Admin Menu text', 'j_the_fun_theme' ),
        'name_admin_bar'        => _x( 'Almedalsveckan', 'Add New on Toolbar', 'j_the_fun_theme' ),
        'add_new'               => __( 'Add New', 'j_the_fun_theme' ),
        'add_new_item'          => __( 'Add New Almedalsveckan', 'j_the_fun_theme' ),
        'new_item'              => __( 'New Almedalsveckan', 'j_the_fun_theme' ),
        'edit_item'             => __( 'Edit Almedalsveckan', 'j_the_fun_theme' ),
        'view_item'             => __( 'View Almedalsveckan', 'j_the_fun_theme' ),
        'all_items'             => __( 'All Almedalsveckan', 'j_the_fun_theme' ),
        'search_items'          => __( 'Search Almedalsveckan', 'j_the_fun_theme' ),
        'parent_item_colon'     => __( 'Parent Almedalsveckan:', 'j_the_fun_theme' ),
        'not_found'             => __( 'No Almedalsveckan found.', 'j_the_fun_theme' ),
        'not_found_in_trash'    => __( 'No Almedalsveckan found in Trash.', 'j_the_fun_theme' ),
        'featured_image'        => _x( 'Almedalsveckan Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'archives'              => _x( 'Almedalsveckan archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'j_the_fun_theme' ),
        'insert_into_item'      => _x( 'Insert into Almedalsveckan', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'j_the_fun_theme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Almedalsveckan', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'j_the_fun_theme' ),
        'filter_items_list'     => _x( 'Filter Almedalsveckan list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list_navigation' => _x( 'Almedalsveckan list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list'            => _x( 'Almedalsveckan list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'j_the_fun_theme' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'almedalen' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'menu_icon'          => 'dashicons-pressthis',
    );
	
	register_post_type( 'almedalen', $args );
    
    $labels = array(
        'name'                  => _x( 'Bookings', 'Post type general name', 'j_the_fun_theme' ),
        'singular_name'         => _x( 'Booking', 'Post type singular name', 'j_the_fun_theme' ),
        'menu_name'             => _x( 'Bookings', 'Admin Menu text', 'j_the_fun_theme' ),
        'name_admin_bar'        => _x( 'Booking', 'Add New on Toolbar', 'j_the_fun_theme' ),
        'add_new'               => __( 'Add New', 'j_the_fun_theme' ),
        'add_new_item'          => __( 'Add New Booking', 'j_the_fun_theme' ),
        'new_item'              => __( 'New Booking', 'j_the_fun_theme' ),
        'edit_item'             => __( 'Edit Booking', 'j_the_fun_theme' ),
        'view_item'             => __( 'View Booking', 'j_the_fun_theme' ),
        'all_items'             => __( 'All Bookings', 'j_the_fun_theme' ),
        'search_items'          => __( 'Search Bookings', 'j_the_fun_theme' ),
        'parent_item_colon'     => __( 'Parent Bookings:', 'j_the_fun_theme' ),
        'not_found'             => __( 'No Bookings found.', 'j_the_fun_theme' ),
        'not_found_in_trash'    => __( 'No Bookings found in Trash.', 'j_the_fun_theme' ),
        'featured_image'        => _x( 'Booking Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'archives'              => _x( 'Booking archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'j_the_fun_theme' ),
        'insert_into_item'      => _x( 'Insert into Booking', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'j_the_fun_theme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Booking', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'j_the_fun_theme' ),
        'filter_items_list'     => _x( 'Filter bookings list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list_navigation' => _x( 'Bookings list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list'            => _x( 'Bookings list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'j_the_fun_theme' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gb_booking' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
        'menu_icon'          => 'dashicons-calendar-alt',
    );
 
    register_post_type( 'gb_booking', $args );
    
    
    $labels = array(
        'name'                  => _x( 'Members', 'Post type general name', 'j_the_fun_theme' ),
        'singular_name'         => _x( 'Member', 'Post type singular name', 'j_the_fun_theme' ),
        'menu_name'             => _x( 'Team', 'Admin Menu text', 'j_the_fun_theme' ),
        'name_admin_bar'        => _x( 'Team', 'Add New on Toolbar', 'j_the_fun_theme' ),
        'add_new'               => __( 'Add New', 'j_the_fun_theme' ),
        'add_new_item'          => __( 'Add New Member', 'j_the_fun_theme' ),
        'new_item'              => __( 'New Member', 'j_the_fun_theme' ),
        'edit_item'             => __( 'Edit Member', 'j_the_fun_theme' ),
        'view_item'             => __( 'View Member', 'j_the_fun_theme' ),
        'all_items'             => __( 'All Members', 'j_the_fun_theme' ),
        'search_items'          => __( 'Search Members', 'j_the_fun_theme' ),
        'parent_item_colon'     => __( 'Parent Members:', 'j_the_fun_theme' ),
        'not_found'             => __( 'No Members found.', 'j_the_fun_theme' ),
        'not_found_in_trash'    => __( 'No Members found in Trash.', 'j_the_fun_theme' ),
        'featured_image'        => _x( 'Member Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'j_the_fun_theme' ),
        'archives'              => _x( 'Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'j_the_fun_theme' ),
        'insert_into_item'      => _x( 'Insert into Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'j_the_fun_theme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'j_the_fun_theme' ),
        'filter_items_list'     => _x( 'Filter Members list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list_navigation' => _x( 'Members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'j_the_fun_theme' ),
        'items_list'            => _x( 'Members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'j_the_fun_theme' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gb_member' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
        'menu_icon'          => 'dashicons-networking',
    );
 
    register_post_type( 'gb_member', $args );
    //designation
    
    $labels = array(
        'name' => _x( 'Tabs', 'j_the_fun_theme' ),
        'singular_name' => _x( 'Tab', 'j_the_fun_theme' ),
        'search_items' =>  __( 'Search Tabs' ),
        'all_items' => __( 'All Tabs' ),
        'parent_item' => __( 'Parent Tab' ),
        'parent_item_colon' => __( 'Parent Tab:' ),
        'edit_item' => __( 'Edit Tab' ), 
        'update_item' => __( 'Update Tab' ),
        'add_new_item' => __( 'Add New Tab' ),
        'new_item_name' => __( 'New Tab Name' ),
        'menu_name' => __( 'Tabs' ),
    ); 	
     
    register_taxonomy('tabs',array('card'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tab' ),
    ));
    
    $labels = array(
        'name' => _x( 'Card Cats', 'j_the_fun_theme' ),
        'singular_name' => _x( 'Card Cat', 'j_the_fun_theme' ),
        'search_items' =>  __( 'Search Card Cats' ),
        'all_items' => __( 'All Card Cats' ),
        'parent_item' => __( 'Parent Card Cat' ),
        'parent_item_colon' => __( 'Parent Card Cat:' ),
        'edit_item' => __( 'Edit Card Cat' ), 
        'update_item' => __( 'Update Card Cat' ),
        'add_new_item' => __( 'Add New Card Cat' ),
        'new_item_name' => __( 'New Card Cat Name' ),
        'menu_name' => __( 'Card Cats' ),
    ); 	
     
    register_taxonomy('card_cats',array('card'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'card_cat' ),
    ));
    
    $labels = array(
        'name' => _x( 'Designations', 'j_the_fun_theme' ),
        'singular_name' => _x( 'Designation', 'j_the_fun_theme' ),
        'search_items' =>  __( 'Search Designations' ),
        'all_items' => __( 'All Designations' ),
        'parent_item' => __( 'Parent Designation' ),
        'parent_item_colon' => __( 'Parent Designation:' ),
        'edit_item' => __( 'Edit Designation' ), 
        'update_item' => __( 'Update Designation' ),
        'add_new_item' => __( 'Add New Designation' ),
        'new_item_name' => __( 'New Designation Name' ),
        'menu_name' => __( 'Designations' ),
    ); 	
     
    register_taxonomy('designation',array('gb_member'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'designation' ),
    ));
    
    register_nav_menus(
        array(
          'top-header-menu' => __( 'Top Header Menu' ),
          'header-menu' => __( 'Header Menu' ),
          'top-footer-menu' => __( 'Top Footer Menu' ),
          'footer-social-menu' => __( 'Footer Social Menu' ),
          'footer-menu' => __( 'Footer Menu' )
        )
    );
    
    register_sidebar( array (
        'name' => __( 'Footer Left Widget'),
        'id' => 'top-left-widget',
        'description' => __( 'Top Footer Left Widget Area'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array (
        'name' => __( 'Footer Right Widget'),
        'id' => 'top-right-widget',
        'description' => __( 'Top Footer Right Widget Area'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array (
        'name' => __( 'Bottom Footer Left Widget'),
        'id' => 'bottom-left-widget',
        'description' => __( 'Bottom Bottom Footer Left Widget Area'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array (
        'name' => __( 'Bottom Footer Right Widget'),
        'id' => 'bottom-right-widget',
        'description' => __( 'Bottom Bottom Footer Right Widget Area'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array (
        'name' => __( 'Menu Bottom Widget'),
        'id' => 'menu-bottom-widget',
        'description' => __( 'Bottom Bottom Footer Right Widget Area'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
}
 
add_action( 'init', 'gb_page_card_init' );

function j_the_fun_theme_customize_register( $wp_customize ) {
    
    /************************* Header Section ******************************/
    
    $wp_customize->add_section( 'j_the_fun_theme_header_section' , array(
        'title'      => __( 'Header', 'j_the_fun_theme' ),
        'priority'   => 30,
    ) );
    
    //Header Colors
    
    $wp_customize->add_setting( 'light_header_textcolor' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_number_color_light', array(
        'label'      => __( 'Light Header Number Color', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'light_header_textcolor',
        
    ) ) );
    
    $wp_customize->add_setting( 'dark_header_textcolor' , array(
        'default'   => '#000',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_number_color_dark', array(
        'label'      => __( 'Dark Header Number Color', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'dark_header_textcolor',
        
    ) ) );
    
    
    //Phone Number
    
    $wp_customize->add_setting( 'phone_number_text_field' , array(
        'default'   => '0498 213300',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( 'j_phone_number_text_field', array(
        'label'      => __( 'Phone Number', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'phone_number_text_field',
        
    ) );
    
    
    $wp_customize->add_setting( 'phone_number_text_field_with_code' , array(
        'default'   => '+46498213300',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( 'j_phone_number_text_field_with_code', array(
        'label'      => __( 'Phone Number With Country Code', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'phone_number_text_field_with_code',
    ) );
    
    //Spela Film Button
    
    $wp_customize->add_setting( 'dark_header_film_button_icon' , array(
        'default-image' => get_template_directory_uri() . '/icons/PLAY_bg.png',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'j_dark_header_film_button_icon', array(
        'label'      => __( 'Dark Header Film Button Icon', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'dark_header_film_button_icon',
        
    ) ) );
	
	$wp_customize->add_setting( 'film_button_name' , array(
        'default'   => 'SPELA FILM',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( 'j_film_button_name', array(
        'label'      => __( 'Film Button Name', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'film_button_name',
    ) );
    
    
    $wp_customize->add_setting( 'film_button_link' , array(
        'default'   => 'https://www.youtube.com/watch?v=b4T8huZIcRw',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( 'j_film_button_link', array(
        'label'      => __( 'Film Button link', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'film_button_link',
    ) );
    
    //Logos
    $wp_customize->add_setting( 'dark_header_logo' , array(
        'default-image' => get_template_directory_uri() . '/icons/goGotland_fullfarg_Logo@2x.png@2x.png',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'j_dark_header_logo', array(
        'label'      => __( 'Dark Header Logo', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'dark_header_logo',
        
    ) ) );
    
    $wp_customize->add_setting( 'light_header_logo' , array(
        'default-image' => get_template_directory_uri() . '/icons/VitLogo@2x.png@2x.png',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'j_light_header_logo', array(
        'label'      => __( 'Light Header Logo', 'j_the_fun_theme' ),
        'section'    => 'j_the_fun_theme_header_section',
        'settings'   => 'light_header_logo',
        
    ) ) );
    
    //https://wordpress.stackexchange.com/questions/215701/custom-image-section-in-customizer
    //https://codex.wordpress.org/Theme_Customization_API
}
add_action( 'customize_register', 'j_the_fun_theme_customize_register' );


function j_the_fun_theme_customize_css(){
    $header_option_switch = get_post_meta( get_the_ID(), 'header_option_switch', true);
    ?>
         <style type="text/css">
            <?php
                if($header_option_switch && $header_option_switch == 'dark'){
                    //Dark Header CSS
                    ?>
                        .header_two .nav_section .joel_contact a b{
                            color: <?php echo get_theme_mod('dark_header_textcolor'); ?> !important;
                        }
                    <?php
                }else{
                    //Light Header CSS
                    ?>
                        .header_section .nav_section .joel_contact > a b{
                            color: <?php echo get_theme_mod('light_header_textcolor'); ?> !important;
                        }
                    <?php
                }
            ?>
            
         </style>
    <?php
}
add_action( 'wp_head', 'j_the_fun_theme_customize_css');

function j_the_fun_theme_admin_head(){
    ?>
    
    <style type="text/css">
        
        .image_upload_option .the_img:first-child, .image_upload_option .the_img:nth-child(4n){
            margin-left: 0px;
        }
        
        .image_upload_option .the_img{
            width: 25%;
            height: auto;
            /*display: block;*/
            display: inline-block;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 0px 0px 7px #e5e5e5;
            margin-left: 15px;
            margin-top: 15px;
        }
        
        .image_upload_option .gb_video{
            width: 50%;
        }
        
        .image_upload_option .gb_trigger_upload, .image_upload_option .gb_trigger_uploads,.image_upload_option .gb_trigger_upload_video{
            display: inline-block;
            color: #fff;
            background: #007cba;
            border: none;
            padding: 8px 10px 10px 10px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .image_upload_option .gb_trigger_remove_upload, .image_upload_option .gb_trigger_remove_video{
            display: inline-block;
            color: #007cba;
            background: #ffffff;
            border: 1px solid #007cba;
            padding: 8px 10px 10px 10px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
        }
        
        .gb_ei_class{
            font-size: 18px !important;
            padding: 5px 0px !important;
            font-weight: 600 !important;
        }
        
        .field b{
            font-size: 15px;
        }
        
        input[type="color"]{
            width: auto;
            min-width: 50px;
            background: transparent;
            border: none;
            height: 50px;
            padding: 0px;
            cursor: pointer;
            box-shadow: 0px 0px 15px #ffffff;
            outline: none;
        }
        
        tbody .column-upplevelser_logo{
            background: #d4d4d4;    
        }
        
        <?php
    
            if(get_post_type() == 'gb_booking'){
                ?>
                    #edit-slug-box{
                        display: none;
                    }
                <?php
            }
        ?>
        
    </style>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/joel_admin.js"></script>
    <?php
    
    if(get_post_type() == 'gb_booking'){
        
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.field').each(function(){
                    var field = $(this).find('label b').text();
                    field = field.replace('Section J', 'Section');
                    $(this).find('label b').text(field);
                });    
                
            });
        </script>
        <?php    
    }
}


add_action( 'admin_head', 'j_the_fun_theme_admin_head');


function gb_extract_fulldate($date){
      $d= \DateTime::createFromFormat('D M d Y H:i:s e+', $date);

      $date = '';

      foreach($d as $de){
          $date = $date . $de;	
      }

      $date = explode(' ', $date);

      $date = strtotime($date[0]);

      return date("m/d/Y", $date);
}


add_action("wp_ajax_gb_default_contact_form", "gb_default_contact_form_func");
add_action("wp_ajax_nopriv_gb_default_contact_form", "gb_default_contact_form_func");

function gb_default_contact_form_func(){
    global $wpdb, $wp, $current_user;
    
    $result = [];
    
    $email = $_POST['email'];
    $page_id = $_POST['page_id'];
    $booking_id = $_POST['booking_id'];
    $booking_id = intval($booking_id);
    //booking_id
    $departure_date = $_POST['departure_date'];
    $departure_date = gb_extract_fulldate($departure_date);
    
    $comeback_date = $_POST['comeback_date'];
    $comeback_date = gb_extract_fulldate($comeback_date);
    
    $guests = $_POST['guests'];
    $range_one = $_POST['range_one'];
    $range_two = $_POST['range_two'];
    $range_three = $_POST['range_three'];
    $range_four = $_POST['range_four'];
    $range_five = $_POST['range_five'];
    $range_six = $_POST['range_six'];
    
    $post = get_post($page_id);
    $page_name = $post->post_title;
    
    if( $booking_id != '' && is_numeric($booking_id) && $booking_id != 0 && $booking_id != null){
        $booking = get_post($booking_id);
        $booking_name = $booking->post_title;
    }
    
    // Range Data
    $contact_form_section_two_range_slider_one_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_one_start_name', '', '');
    $contact_form_section_two_range_slider_one_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_one_end_name', '', '');
    
    if($contact_form_section_two_range_slider_one_start_name != '' && $contact_form_section_two_range_slider_one_end_name != ''){
        $range_one = $contact_form_section_two_range_slider_one_start_name . ' - ' . $contact_form_section_two_range_slider_one_end_name . ' (' . $range_one . ')';
    }
    
    $contact_form_section_two_range_slider_two_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_two_start_name', '', '');
    $contact_form_section_two_range_slider_two_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_two_end_name', '', '');
    
    if($contact_form_section_two_range_slider_two_start_name != '' && $contact_form_section_two_range_slider_two_end_name != ''){
        $range_two = $contact_form_section_two_range_slider_two_start_name . ' - ' . $contact_form_section_two_range_slider_two_end_name . ' (' . $range_two . ')';
    }
    
    $contact_form_section_two_range_slider_three_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_three_start_name', '', '');
    $contact_form_section_two_range_slider_three_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_three_end_name', '', '');
    
    if($contact_form_section_two_range_slider_three_start_name != '' && $contact_form_section_two_range_slider_three_end_name != ''){
        $range_three = $contact_form_section_two_range_slider_three_start_name . ' - ' . $contact_form_section_two_range_slider_three_end_name . ' (' . $range_three . ')';
    }
    
    $contact_form_section_two_range_slider_four_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_four_start_name', '', '');
    $contact_form_section_two_range_slider_four_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_four_end_name', '', '');
    
    if($contact_form_section_two_range_slider_four_start_name != '' && $contact_form_section_two_range_slider_four_end_name != ''){
        $range_four = $contact_form_section_two_range_slider_four_start_name . ' - ' . $contact_form_section_two_range_slider_four_end_name . ' (' . $range_four . ')';
    }
    
    $contact_form_section_two_range_slider_five_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_five_start_name', '', '');
    $contact_form_section_two_range_slider_five_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_five_end_name', '', '');
    
    if($contact_form_section_two_range_slider_five_start_name != '' && $contact_form_section_two_range_slider_five_end_name != ''){
        $range_five = $contact_form_section_two_range_slider_five_start_name . ' - ' . $contact_form_section_two_range_slider_five_end_name . ' (' . $range_five . ')';
    }
    
    $contact_form_section_two_range_slider_six_start_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_six_start_name', '', '');
    $contact_form_section_two_range_slider_six_end_name = gb_show_new_field( $page_id, 'contact_form_section_two_range_slider_six_end_name', '', '');
    
    if($contact_form_section_two_range_slider_six_start_name != '' && $contact_form_section_two_range_slider_six_end_name != ''){
        $range_six = $contact_form_section_two_range_slider_six_start_name . ' - ' . $contact_form_section_two_range_slider_six_end_name . ' (' . $range_six . ')';
    }
    // End of Range Data
    
    $gb_your_email = get_option('gb_contact_form_email');
    $gb_your_subject = get_option('gb_contact_form_subject');
    $gb_your_subject = str_replace('\"',"'", $gb_your_subject);
    $gb_your_subject = str_replace( "\'","'", $gb_your_subject);
    
    $gb_user_email_get_content = get_option('gb_contact_form_email_data');
    $gb_user_email_get_content = str_replace('\"',"'", $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "\'","'", $gb_user_email_get_content);
    
    
    //Shortcodes[service_name]$booking_name
    $gb_your_subject = str_replace( "[page_name]",$page_name, $gb_your_subject);
    $gb_your_subject = str_replace( "[departure_date]",$departure_date, $gb_your_subject);
    $gb_your_subject = str_replace( "[comeback_date]",$comeback_date, $gb_your_subject);
    $gb_your_subject = str_replace( "[guests]",$guests, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_one]",$range_one, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_two]",$range_two, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_three]",$range_three, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_four]",$range_four, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_five]",$range_five, $gb_your_subject);
    $gb_your_subject = str_replace( "[range_six]",$range_six, $gb_your_subject);
    $gb_your_subject = str_replace( "[email]",$email, $gb_your_subject);
    $gb_your_subject = str_replace( "[service_name]",$booking_name, $gb_your_subject);
    
    $gb_user_email_get_content = str_replace( "[page_name]",$page_name, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[service_name]",$booking_name, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[departure_date]",$departure_date, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[comeback_date]",$comeback_date, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[guests]",$guests, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_one]",$range_one, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_two]",$range_two, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_three]",$range_three, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_four]",$range_four, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_five]",$range_five, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[range_six]",$range_six, $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "[email]",$email, $gb_user_email_get_content);
    
    if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      
      $result['error'] = "Invalid email format.";
      
    }else{
        $username = explode('@', $email);
        $username = $username[0];
        
        if( !is_user_logged_in() && !email_exists( $email ) ){
            wp_create_user( $username, '', $email );
        }
        
        wp_mail( $gb_your_email, $gb_your_subject, $gb_user_email_get_content);
        
        $post_arr = array(
            'post_title'   => esc_html($username),
            'post_type'    => 'gb_booking',
			'post_status'  => 'publish'
        );
        
        $pid = wp_insert_post($post_arr);
        
        $meta_data = array(
            'gb_booking_section_j_page_name' => $page_name,
            'gb_booking_section_j_service_name' => $booking_name,
            'gb_booking_section_j_departure_date' => $departure_date,
            'gb_booking_section_j_comeback_date' => $comeback_date,
            'gb_booking_section_j_guests' => $guests,
            'gb_booking_section_j_user_email' => $email,
            'gb_booking_section_j_range_one' => $range_one,
            'gb_booking_section_j_range_two' => $range_two,
            'gb_booking_section_j_range_three' => $range_three,
            'gb_booking_section_j_range_four' => $range_four,
            'gb_booking_section_j_range_five' => $range_five,
			'gb_booking_section_j_range_six' => $range_six
        );
        
        foreach( $meta_data as $meta_key => $meta_value ){
            update_post_meta( $pid, $meta_key, $meta_value );    
        }
        
        $result['success'] = "You subscribes successfully.";
    }
    
    echo json_encode($result);
    
    wp_die();
    //gb_default_contact_form
}







add_action("wp_ajax_gb_subscription_data", "gb_subscription_data_func");
add_action("wp_ajax_nopriv_gb_subscription_data", "gb_subscription_data_func");

function gb_subscription_data_func() {
    global $wpdb, $wp, $current_user;
    
    $result = [];
    
    //Ragular Data
    
    $gb_your_email = get_option('gb_your_email');
    $gb_user_email_get_content_subject = get_option('gb_user_email_get_content_subject');
    $gb_user_email_post_content_subject = get_option('gb_user_email_post_content_subject');
    
    $gb_user_email_get_content = get_option('gb_user_email_get_content');
    $gb_user_email_get_content = str_replace('\"',"'", $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "\'","'", $gb_user_email_get_content);
    
    $gb_user_email_post_content =  get_option('gb_user_email_post_content');
    $gb_user_email_post_content = str_replace('\"',"'", $gb_user_email_post_content );
    $gb_user_email_post_content = str_replace("\'","'", $gb_user_email_post_content );
    
    $email = $_POST['email'];
    $pid = $_POST['pid'];
    
    //$result['email'] = $email;
    //$result['pid'] = $pid;
    
    if($pid != 0 && $pid != ''){
        $post = get_post($pid);
        $title = $post->post_title;
    }else{
        $title = 'General Subscribe';
    }
    
    $gb_user_email_get_content = str_replace( "[title]",$title, $gb_user_email_get_content);
    $gb_user_email_post_content = str_replace("[title]",$title, $gb_user_email_post_content );
    
    if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
      
      $result['error'] = "Invalid email format";
      
    }else{
        $username = explode('@', $email);
        $username = $username[0];
        
        if( !is_user_logged_in() && !email_exists( $email ) ){
            wp_create_user( $username, '', $email );
            
        }
        
        wp_mail( $email, $gb_user_email_post_content_subject, $gb_user_email_post_content);
            
        if( filter_var( $gb_your_email, FILTER_VALIDATE_EMAIL) ){
            wp_mail( $gb_your_email, $gb_user_email_get_content_subject, $gb_user_email_get_content);
        }
        
        $result['success'] = "You subscribes successfully.";
        
    }
    
    //wp_create_user( string $username, string $password, string $email = '' );
    $result['username'] = $username;
    $result['title'] = $title;
    
    echo json_encode($result);
    
    wp_die();
}



function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Email Subscription Options', 'j_the_fun_theme' ),
        'Email Subscription',
        'manage_options',
        'gb_email_subscription',
        'gb_email_subscription_func',
        'dashicons-email-alt',
        50
    );
    
    add_menu_page(
        __( 'ContactForm Settings', 'j_the_fun_theme' ),
        'Contact Form',
        'manage_options',
        'gb_contact_form',
        'gb_contact_form_func',
        'dashicons-phone',
        50
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function gb_contact_form_func(){
    global $wpdb, $wp, $current_user;
    $gb_your_email = get_option('gb_contact_form_email');
    $gb_your_subject = get_option('gb_contact_form_subject');
    $gb_user_email_get_content = get_option('gb_contact_form_email_data');
    $gb_user_email_get_content = str_replace('\"',"'", $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "\'","'", $gb_user_email_get_content);
    
    $def = '';
    ?>
    
    <style type="text/css">
        input[type="color"]{
            width: auto;
            min-width: 50px;
            background: transparent;
            border: none;
            height: 50px;
            padding: 0px;
            cursor: pointer;
            box-shadow: 0px 0px 15px #ffffff;
            outline: none;
        }
        
        .suc_msg{
            background: #dbefdd;
            border: 1px solid #73ab62;
            color: #73ab62;
            padding: 10px;
            display: block;
            width: 78%;
            border-radius: 5px;
        }
        
        .wp-core-ui .button-primary{
            float: none !important;
            margin-bottom: 10px;
        }
        
        .helper{
            color: #575757;
            font-style: italic;
            display: inline-block;
            margin-top: 10px;
        }
        .shorcodes_of_data{
            
        }
        
        .shrt_cde{
            padding: 5px 10px;
            border: 1px solid #fd795c;
            border-radius: 5px;
            display: inline-block;
            min-width: 20px;
            width: auto;
            color: #fd795c;
            background: rgba(255, 218, 210, 0.5);
            margin: 3px 0px;
        }
    </style>
    
    <h2>Contact Form Data by Email</h2><hr />
    
    <form method="post" action="">
        <div class="shorcodes_of_data">
            <label><b>Short Codes Which you can use in Editor</b></label><br /><br />
            <p class="shrt_cde">[page_name] = The page name where your contact form Exist and in your case the contact form is in Booking Page.</p>
            <p class="shrt_cde">[service_name] = The service name will provide the name of the service which user book with contact form.</p>
            <p class="shrt_cde">[departure_date] = The Departure date which user choose in the form.</p>
            <p class="shrt_cde">[comeback_date] = The Journey Home date which user choose in the form.</p>
            <p class="shrt_cde">[guests] = Total guests which user choose in the form.</p>
            <p class="shrt_cde">[range_one] = The range number from range one which user choose in the form.</p>
            <p class="shrt_cde">[range_two] = The range number from range two which user choose in the form.</p>
            <p class="shrt_cde">[range_three] = The range number from range three which user choose in the form.</p>
            <p class="shrt_cde">[range_four] = The range number from range four which user choose in the form.</p>
            <p class="shrt_cde">[range_five] = The range number from range five which user choose in the form.</p>
            <p class="shrt_cde">[range_six] = The range number from range six which user choose in the form.</p>
            <p class="shrt_cde">[email] = The email of user.</p>
            
        </div><br /><hr />
        
        <div class="field gb_your_email_field">        
            <label><b>Your Email</b></label><br /><br />
            <input type="text" class="gb_your_email data" name="gb_your_email" value="<?php echo $gb_your_email; ?>" style="display: block; width: 50%;" placeholder="Your Email/From" />
            <span class="helper">Your Email Where you recieve data from contact form submited by user.</span>
        </div><br /><hr />
        
        <div class="field gb_your_subject_field">        
            <label><b>Your Subject</b></label><br /><br />
            <input type="text" class="gb_your_subject data" name="gb_your_subject" value="<?php echo $gb_your_subject; ?>" style="display: block; width: 50%;" placeholder="Your Subject" />
        </div><br /><hr />
        
        <div class="field gb_contact_fom_userdata" style="width: 80%; ">
            <label><b>Email Description:</b></label><br /><br />
            <?php
            
                        
                if(!$gb_user_email_get_content || $gb_user_email_get_content == ''){
                    $gb_user_email_get_content = $def;
                }
                
                $editor_id = 'gb_user_contact_get_content';
                
                $args = array(
                    'tinymce'       => array(
                        'toolbar1'      => 'bold,italic,bullist,numlist,blockquote,wp_more,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,wp_adv',
                        'toolbar2'      => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo',
                        'toolbar3'      => '',
                    ),
                );
                wp_editor( $gb_user_email_get_content, $editor_id, $args );
                
            ?>
            <span class="helper">Setup the format of email which you get whenever user submit the contact form.</span>
        </div><br />
        
        
        <input type="button" name="save" id="save-post" class="button button-primary" value="Save Settings" /><br /><br />
        
    </form>
    
    <script type="text/javascript">
        
        jQuery(document).ready(function($){
            var get_admin_url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
            
            $('#save-post').click(function(){
                //Variables
                var email_address = $('.gb_your_email').val();
                var subject = $('.gb_your_subject').val();
                //console.log();
                //var email_data = tinymce.get('gb_user_email_get_content').getContent();
                var email_data = tinymce.editors.gb_user_contact_get_content.getContent();
                
                $.ajax({
                    type : "post",
                    dataType : "json",
                    url : get_admin_url,
                    data : {
                        action: "gb_contact_form_options",
                        'email': email_address,
                        'subject': subject,
                        'email_data': email_data
                    },
                    success: function(response) {
                        if(response.success && response.success != ''){
                            $('#save-post').closest('form').find('.suc_msg').remove();
                            $('#save-post').after('<span class="suc_msg">' + response.success + '</span>');  
                        }
                    }
                });
                
                
            });
        });
    </script>
    
    <?php
}

function gb_contact_form_options_func(){
    global $wpdb, $wp, $current_user;
    
    $result = [];
    
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $email_data = $_POST['email_data'];
    
    update_option('gb_contact_form_email', $email);
    update_option('gb_contact_form_subject', $subject);
    update_option('gb_contact_form_email_data', $email_data);
    
    $result['success'] = 'Settings Saved Successfully';
    
    echo json_encode($result);
    
    die();
}

add_action("wp_ajax_gb_contact_form_options", "gb_contact_form_options_func");
add_action("wp_ajax_nopriv_gb_contact_form_options", "gb_contact_form_options_func");


function gb_email_subscription_func(){
    global $wpdb, $wp, $current_user;
    
    $gb_email_title_text = get_option('gb_email_title_text');
    $gb_email_placeholder_text = get_option('gb_email_placeholder_text');
    $gb_email_extra_text = get_option('gb_email_extra_text');
    $gb_email_submit_text = get_option('gb_email_submit_text');
    $gb_email_submit_color = get_option('gb_email_submit_color');
    $gb_your_email = get_option('gb_your_email');
    
    $gb_user_email_get_content_subject = get_option('gb_user_email_get_content_subject');
    $gb_user_email_post_content_subject = get_option('gb_user_email_post_content_subject');
    
    $gb_user_email_get_content = get_option('gb_user_email_get_content');
    $gb_user_email_get_content = str_replace('\"',"'", $gb_user_email_get_content);
    $gb_user_email_get_content = str_replace( "\'","'", $gb_user_email_get_content);
    
    $gb_user_email_post_content =  get_option('gb_user_email_post_content');
    $gb_user_email_post_content = str_replace('\"',"'", $gb_user_email_post_content );
    $gb_user_email_post_content = str_replace("\'","'", $gb_user_email_post_content );
    $def = '';
    
    ?>
    
    <style type="text/css">
        input[type="color"]{
            width: auto;
            min-width: 50px;
            background: transparent;
            border: none;
            height: 50px;
            padding: 0px;
            cursor: pointer;
            box-shadow: 0px 0px 15px #ffffff;
            outline: none;
        }
        
        .suc_msg{
            background: #dbefdd;
            border: 1px solid #73ab62;
            color: #73ab62;
            padding: 10px;
            display: block;
            width: 78%;
            border-radius: 5px;
        }
        
        .wp-core-ui .button-primary{
            float: none !important;
            margin-bottom: 10px;
        }
        
        .helper{
            color: #575757;
            font-style: italic;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
    
    <h2>Email Subscription Options</h2><hr />
    
    <form method="post" action="">
        <div class="field gb_email_title_text_field">        
            <label><b>Email Subscription Title</b></label><br /><br />
            <input type="text" class="gb_email_title_text data" name="gb_email_title_text" value="<?php echo $gb_email_title_text; ?>" style="display: block; width: 50%;" placeholder="Email Subscription Title" />
        </div><br />    
        
        <div class="field gb_email_placeholder_text_field">        
            <label><b>Email Subscription Placeholder</b></label><br /><br />
            <input type="text" class="gb_email_placeholder_text data" name="gb_email_placeholder_text" value="<?php echo $gb_email_placeholder_text; ?>" style="display: block; width: 50%;" placeholder="Email Subscription Placeholder" />
        </div><br />
        
        <div class="field gb_email_extra_text_field">        
            <label><b>Email Subscription Extra</b></label><br /><br />
            <input type="text" class="gb_email_extra_text data" name="gb_email_extra_text" value="<?php echo $gb_email_extra_text; ?>" style="display: block; width: 50%;" placeholder="Email Subscription Extra" />
        </div><br />
        
        <div class="field gb_email_submit_text_field">        
            <label><b>Submit Button Text</b></label><br /><br />
            <input type="text" class="gb_email_submit_text data" name="gb_email_submit_text" value="<?php echo $gb_email_submit_text; ?>" style="display: block; width: 50%;" placeholder="Submit Button Text" />
            <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Submit button label</span>
        </div><br />
        
        <div class="field gb_email_submit_color_field">        
            <label><b>Submit Button Color</b></label><br /><br />
            <input type="color" class="gb_email_submit_color data" name="gb_email_submit_color" value="<?php echo $gb_email_submit_color; ?>" style="display: block; width: auto; min-width: 50px;" placeholder="Submit Button Color" />
            <span style="opacity: 0.7; font-style: italic; margin-top: 10px; display: block;"> Submit button background color</span>
        </div><br />
        
        <hr />
        
        <div class="field gb_your_email_field">        
            <label><b>Your Email/From</b></label><br /><br />
            <input type="text" class="gb_your_email data" name="gb_your_email" value="<?php echo $gb_your_email; ?>" style="display: block; width: 50%;" placeholder="Your Email/From" />
        </div><br /><br /><hr />
        
        <div class="field gb_user_email_get_content_subject_field">        
            <label><b>Your Email Subject</b></label><br /><br />
            <input type="text" class="gb_user_email_get_content_subject data" name="gb_user_email_get_content_subject" value="<?php echo $gb_user_email_get_content_subject; ?>" style="display: block; width: 50%;" placeholder="Your Email Subject" />
        </div><br /><br />
        
        <div class="field gb_user_email_content_field" style="width: 80%; ">
            <label><b>The email which you get after subscribe:</b></label><br /><br />
            <?php
            
                        
                if(!$gb_user_email_get_content || $gb_user_email_get_content == ''){
                    $gb_user_email_get_content = $def;
                }
                
                $editor_id = 'gb_user_email_get_content';
                
                $args = array(
                    'tinymce'       => array(
                        'toolbar1'      => 'bold,italic,bullist,numlist,blockquote,wp_more,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,wp_adv',
                        'toolbar2'      => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo',
                        'toolbar3'      => '',
                    ),
                );
                wp_editor( $gb_user_email_get_content, $editor_id, $args );
                
            ?>
            <span class="helper">If you use [title] shortcode then the email will show card title which user click for subscribtion</span>
        </div><br /><hr />
        
        <div class="field gb_user_email_post_content_subject_field">        
            <label><b>Users Email Subject</b></label><br /><br />
            <input type="text" class="gb_user_email_post_content_subject data" name="gb_user_email_post_content_subject" value="<?php echo $gb_user_email_post_content_subject; ?>" style="display: block; width: 50%;" placeholder="Users Email Subject" />
        </div><br /><br />
        
        <div class="field gb_user_email_content_field" style="width: 80%; ">
            <label><b>The email which user get after subscribe:</b></label><br /><br />
            <?php
            
                if(!$gb_user_email_post_content || $gb_user_email_post_content == ''){
                    $gb_user_email_post_content = $def;
                }
                
                $editor_id = 'gb_user_email_post_content';
                
                $args = array(
                    'tinymce'       => array(
                        'toolbar1'      => 'bold,italic,bullist,numlist,blockquote,wp_more,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,wp_adv',
                        'toolbar2'      => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo',
                        'toolbar3'      => '',
                    ),
                );
                wp_editor( $gb_user_email_post_content, $editor_id, $args );
                
            ?>
            <span class="helper">If you use [title] shortcode then the email will show card title which user click for subscribtion</span>
        </div><br />
        
        <input type="button" name="save" id="save-post" class="button button-primary" value="Save Settings" /><br /><br />
        
    </form>
    
    <script type="text/javascript">
        
        jQuery(document).ready(function($){
            var get_admin_url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
            
            $('#save-post').click(function(){
                //Variables
                var gb_email_title_text = $('.gb_email_title_text').val();
                var gb_email_placeholder_text = $('.gb_email_placeholder_text').val();
                var gb_email_extra_text = $('.gb_email_extra_text').val();
                var gb_email_submit_text = $('.gb_email_submit_text').val();
                var gb_email_submit_color = $('.gb_email_submit_color').val();
                var gb_your_email = $('.gb_your_email').val();
                
                var gb_user_email_get_content_subject = $('.gb_user_email_get_content_subject').val();
                var gb_user_email_post_content_subject = $('.gb_user_email_post_content_subject').val();
                
                var gb_user_email_get_content = tinymce.get('gb_user_email_get_content').getContent();
                var gb_user_email_post_content = tinymce.get('gb_user_email_post_content').getContent();
                
                //console.log( gb_email_title_text + ' | ' + gb_email_placeholder_text + ' | ' + gb_email_extra_text + ' | ' + gb_email_submit_text + ' | ' + gb_email_submit_color + ' | ' + gb_your_email + ' | ' + gb_user_email_get_content + ' | ' + gb_user_email_post_content );
                //Ajax Request
                $.ajax({
                    type : "post",
                    dataType : "json",
                    url : get_admin_url,
                    data : {
                        action: "gb_subscription_options",
                        'gb_email_title_text' : gb_email_title_text,
                        'gb_email_placeholder_text': gb_email_placeholder_text,
                        'gb_email_extra_text': gb_email_extra_text,
                        'gb_email_submit_text': gb_email_submit_text,
                        'gb_email_submit_color': gb_email_submit_color,
                        'gb_your_email': gb_your_email,
                        'gb_user_email_get_content_subject': gb_user_email_get_content_subject,
                        'gb_user_email_post_content_subject': gb_user_email_post_content_subject,
                        'gb_user_email_get_content': gb_user_email_get_content,
                        'gb_user_email_post_content': gb_user_email_post_content
                        
                    },
                    success: function(response) {
                        if(response.success && response.success != ''){
                            $('#save-post').closest('form').find('.suc_msg').remove();
                            $('#save-post').after('<span class="suc_msg">' + response.success + '</span>');  
                        }
                    }
                });
                
                
            });
        });
    </script>
    
    <?php
}

function gb_subscription_options_func(){
    global $wpdb, $wp, $current_user;
    
    $result = [];
    
   
    
    $gb_email_title_text = $_POST['gb_email_title_text'];
    $gb_email_title_text = str_replace('"', "'", $gb_email_title_text);
    
    $gb_email_placeholder_text = $_POST['gb_email_placeholder_text'];
    $gb_email_placeholder_text = str_replace('"', "'", $gb_email_placeholder_text);
    
    $gb_email_extra_text = $_POST['gb_email_extra_text'];
    $gb_email_extra_text = str_replace('"', "'", $gb_email_extra_text);
    
    $gb_email_submit_text = $_POST['gb_email_submit_text'];
    $gb_email_submit_text = str_replace('"', "'", $gb_email_submit_text);
    
    $gb_email_submit_color = $_POST['gb_email_submit_color'];
    $gb_your_email = $_POST['gb_your_email'];
    
    $gb_user_email_get_content_subject = $_POST['gb_user_email_get_content_subject'];
    $gb_user_email_post_content_subject = $_POST['gb_user_email_post_content_subject'];
    
    $gb_user_email_get_content = $_POST['gb_user_email_get_content'];
    $gb_user_email_post_content = $_POST['gb_user_email_post_content'];
    
    
    
    update_option('gb_email_title_text', $gb_email_title_text);
    update_option('gb_email_placeholder_text', $gb_email_placeholder_text);
    update_option('gb_email_extra_text', $gb_email_extra_text);
    update_option('gb_email_submit_text', $gb_email_submit_text);
    update_option('gb_email_submit_color', $gb_email_submit_color);
    update_option('gb_your_email', $gb_your_email);
    
    update_option('gb_user_email_get_content_subject', $gb_user_email_get_content_subject);
    update_option('gb_user_email_post_content_subject', $gb_user_email_post_content_subject);
    
    update_option('gb_user_email_get_content', $gb_user_email_get_content);
    update_option('gb_user_email_post_content', $gb_user_email_post_content);
    
     $result['success'] = 'Settings Saved Successfully';
    
    echo json_encode($result);
    
    die();
}

add_action("wp_ajax_gb_subscription_options", "gb_subscription_options_func");
add_action("wp_ajax_nopriv_gb_subscription_options", "gb_subscription_options_func");

function gb_email_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','gb_email_set_content_type' );


//Custom Element For Wp Bakery

function gb_vc_custom_mapping() {
         
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
    }
     
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Joel Theme Half Box', 'jTheFunTheme'),
            'base' => 'gb_half_box',
            'description' => __('Joel Theme Half Box', 'jTheFunTheme'), 
            'category' => __('Joel Theme Half Box', 'jTheFunTheme'),   
            'icon' => get_template_directory_uri().'/Icons/goGotland_fullfarg_Logo@2x.png@2x.png',
            'params' => array(   
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Joining Title', 'jTheFunTheme' ),
                    'param_name' => 'joining_title',
                    'value' => __( 'Title A', 'jTheFunTheme' ),
                    'description' => __( '', 'jTheFunTheme' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Field group',
                ),
                
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Joining Title Color", "jTheFunTheme" ),
                    "param_name" => "joining_title_color",
                    "value" =>  __( "#ffffff", "jTheFunTheme" ), 
                    "description" => __( "", "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Title', 'jTheFunTheme' ),
                    'param_name' => 'title',
                    'value' => __( 'Purpose Of This Box', 'jTheFunTheme' ),
                    'description' => __( '', 'jTheFunTheme' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Field group',
                ),
                
                
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Title Color", "jTheFunTheme" ),
                    "param_name" => "title_color",
                    "value" =>  __( "#ffffff", "jTheFunTheme" ), 
                    "description" => __( "", "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
                array(
                    "type" => "attach_image",
                    "class" => "",
                    "heading" => __( "Box Background Image", "jTheFunTheme" ),
                    "param_name" => "box_background_image",
                    "value" => '',
                    "description" => __( "Box Background Image", "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Box Background Color", "jTheFunTheme" ),
                    "param_name" => "box_background_color",
                    "value" =>  __( "#000000", "jTheFunTheme" ), 
                    "description" => __( "Background Color Will Appear if you not choose background image", "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
                array(
                    "type" => "textarea_html",
                    "class" => "",
                    "heading" => __( "Text Editor", "jTheFunTheme" ),
                    "param_name" => "content",
                    "value" => __( '<p class="box_text" style="text-align: center;"><span style="color: #404040;">Med nya naturgasfärjor och klimatkompenserade flygturer klimatneutrala hotell och fosilfria transporter, vi hjälper dig ta smarta val.</span></p> <p style="text-align: center;"><span style="color: #5dbb63;"><a style="color: #5dbb63;" href="#">Ta reda på mer <i class="fas fa-chevron-right" style="color: #5dbb63;" aria-hidden="true"></i></a> </span><span style="color: #5dbb63;"><a style="color: #5dbb63;" href="#">Boka <i class="fas fa-chevron-right" style="color: #5dbb63;" aria-hidden="true"></i></a> </span></p> ', "jTheFunTheme" ), 
                    "description" => __( '', "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
                array(
                    "type" => "attach_images",
                    "class" => "",
                    "heading" => __( "Bottom Logos", "jTheFunTheme" ),
                    "param_name" => "bottom_logos",
                    "value" => '',
                    "description" => __( "", "jTheFunTheme" ),
                    'group' => 'Field group',
                ),
                
               
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Content Vertical Position'),
                    'param_name'  => 'content_vertical_align',
                    'admin_label' => false,
                    'value'       => array(
                        'Top'   => 'start',
                        'Middle'   => 'center',
                        'Bottom' => 'end'
                    ),
                    'std'         => 'start',
                    'group' => 'Field group',
                    'description' => __("", "jTheFunTheme" )
                ),
                
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('Content Horizontal Position'),
                    'param_name'  => 'content_horizontal_align',
                    'admin_label' => false,
                    'value'       => array(
                        'Left'   => 'start',
                        'Center'   => 'center',
                        'Right' => 'end'
                    ),
                    'std'         => 'center',
                    'group' => 'Field group',
                    'description' => __("", "jTheFunTheme" )
                ),
                
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Element Class', 'jTheFunTheme' ),
                    'param_name' => 'element_class',
                    'value' => __( '', 'jTheFunTheme' ),
                    'description' => __( '', 'jTheFunTheme' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Field group',
                ),
                
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Element Id', 'jTheFunTheme' ),
                    'param_name' => 'element_id',
                    'value' => __( '', 'jTheFunTheme' ),
                    'description' => __( '', 'jTheFunTheme' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Field group',
                )
                
                
                
            ),
        )
    );                                
    
}

add_action( 'vc_before_init', 'gb_vc_custom_mapping' );


function gb_vc_custom_html( $atts, $content = null ) {
    //https://fjorgedigital.com/insights/blog/visual-composer-examples/
    // Params extraction
   //https://urosevic.net/wordpress/tips/dropdown-defaults-visual-composer/
        extract( shortcode_atts(
                array(
                    'joining_title'   => 'Title A',
                    'joining_title_color'   => '#ffffff',
                    'title'   => 'Purpose Of This Box',
                    'title_color'   => '#ffffff',
                    'box_background_image' => '', 
                    'box_background_color' => '#000000',
                    'bottom_logos' => '',
                    'content_vertical_align' => 'start',
                    'content_horizontal_align' => 'center',
                    'bottom_logos' => '',
                    'element_class' => '',
                    'element_id' => ''
                ), 
                $atts
            )
        );
			
	ob_start();
	
    ?>
        <?php
          
            $o = $content_horizontal_align;
            if( $o == 'start' ){
                $o = 'left';
            }elseif($o == 'end'){
                $o = 'right';
            }else{
                $o = 'center';    
            }
        ?>
    	<div class="col-12 col-md-12 vc_joel_custom_box d-flex align-items-<?php echo $content_horizontal_align; ?> justify-content-<?php echo $content_vertical_align; ?> <?php echo $element_class; ?>" id="<?php echo $element_id; ?>" style="background-color: <?php echo $box_background_color; ?>; text-align: <?php echo $o;?>;">
    	    <?php 
                if($box_background_image != ''){    	       
		            $bg_img = wp_get_attachment_image_src( $box_background_image, 'large' );
        		    ?>
            	        <img src="<?php echo $bg_img[0]; ?>" alt="Box" class="box_bg">
            	    <?php
                }
            ?>
        	<div class="box_mirror"></div>
        	<div class="row no-gutters joel_dark_bg">
        		<div class="col-12">
        		    
        			<h1 class="joel_cb_joining_write" style="color: <?php echo $joining_title_color; ?>;"><?php echo $joining_title; ?></h1>
        			<h2 style="color: <?php echo $title_color; ?>; "><?php echo $title; ?></h2>
        			<?php echo $content; ?>
        			
        			<?php
        			    if($bottom_logos != ''){  
        			        $bottom_logos = explode(',', $bottom_logos);
        			        ?>
            			        <div class="vc_joel_custom_box_logos d-flex align-items-center justify-content-<?php echo $content_horizontal_align; ?>">
                			        <?php
                    			        foreach($bottom_logos as $logo){
                    			            $logo_image = wp_get_attachment_image_src( $logo, 'large' );
                            			    ?>
                                    			<a href="#" class="joel_custom_box_logo"><img src="<?php echo $logo_image[0]; ?>" alt="Logo 0"></a>
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
    return ob_get_clean();
     
}

add_shortcode( 'gb_half_box', 'gb_vc_custom_html' );

function joel_add_card_columns($columns){
    $columns['upplevelser_logo'] = 'Upplevelser Logo';
    return $columns; 
}
add_filter('manage_card_posts_columns' , 'joel_add_card_columns');

function joel_fill_card_columns( $column, $post_id ) {
	switch ( $column ) {
	case 'upplevelser_logo' :
		$logo_url = get_post_meta( $post_id , 'gb_card_logo' , true );
		echo '<img src="' . $logo_url . '" alt="LOGO" style="width: 100px; height: auto;"/>';
		break;
	}
}
add_action( 'manage_card_posts_custom_column' , 'joel_fill_card_columns', 10, 2 );

//j_the_fun_theme
//https://www.youtube.com/watch?v=LRzR6MenPvU
?>