jQuery(function($){
	/*
	 * Select/Upload image(s) event
	 */
	 
	
	var home_url = window.location;
	home_url = home_url.origin;
	
	$('body').on('click', '.gb_trigger_upload', function(e){
		e.preventDefault();
 
    		var button = $(this),
    		    custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uncomment the next line if you want to attach image to the current post
				// uploadedTo : wp.media.view.settings.post.id, 
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false // for multiple image selection set to true
		}).on('select', function() { // it also has "open" and "close" events 
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			button.closest('.image_upload_option').find('.the_img').attr('src', attachment.url);
            button.closest('.image_upload_option').find('.save_data').val(attachment.url);
            
		})
		.open();
	});
 
    $('body').on('click', '.gb_trigger_upload_video', function(e){
		e.preventDefault();
 
    		var button = $(this),
    		    custom_uploader = wp.media({
			title: 'Insert Video',
			library : {
				// uncomment the next line if you want to attach image to the current post
				// uploadedTo : wp.media.view.settings.post.id, 
				type : 'video'
			},
			button: {
				text: 'Use this Video' // button label text
			},
			multiple: false // for multiple image selection set to true
		}).on('select', function() { // it also has "open" and "close" events 
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			
			var video_html = '<video id="myVideo" class="the_img gb_video" controls><source src="' + attachment.url + '" type="video/mp4"></video>';
			
			button.closest('.image_upload_option').find('.the_img').remove();
			button.closest('.image_upload_option').prepend(video_html);
            button.closest('.image_upload_option').find('.save_data').val(attachment.url);
            
		})
		.open();
	});
 
	/*
	 * Remove image event
	 */
	 
	
	$('body').on('click', '.gb_trigger_remove_upload', function(){
		$(this).closest('.image_upload_option').find('.the_img').remove();
		var img_html = '<img src="" alt="" class="the_img" />';
		$(this).closest('.image_upload_option').prepend(img_html);
		$(this).closest('.image_upload_option').find('.save_datas').val('');
		
		$(this).closest('.image_upload_option').find('.the_img').attr('src', '' + home_url + '/wp-content/uploads/2020/02/default_image_01.png');
        $(this).closest('.image_upload_option').find('.save_data').val('');
		return false;
	});
 
    $('body').on('click', '.gb_trigger_remove_video', function(){
		
		var video_html = '<img src="' + home_url + '/wp-content/uploads/2020/03/videogallery.png" alt="" class="the_img"/>';
		
		$(this).closest('.image_upload_option').find('.the_img').remove();
		$(this).closest('.image_upload_option').prepend(video_html);
        $(this).closest('.image_upload_option').find('.save_data').val('');
        
		return false;
	});
 
	//Multiple Images 
	$('body').on('click', '.gb_trigger_uploads', function(e){
			e.preventDefault();
 
    		var button = $(this),
    		    custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uncomment the next line if you want to attach image to the current post
				// uploadedTo : wp.media.view.settings.post.id, 
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: true // for multiple image selection set to true
		}).on('select', function() { // it also has "open" and "close" events 
			var attachments = custom_uploader.state().get('selection').toJSON();
			//console.log(attachments);
			button.closest('.image_upload_option').find('.the_img').remove();
			var all_img_urls = '';
			var img_len = attachments.length;
			
			$.each(attachments, function(i,v){
				var img_html = '<img src="' + v.url + '" alt="" class="the_img" id="img_id_' + i + '"/>';
				button.closest('.image_upload_option').prepend(img_html);
				if(img_len == (i + 1) ){
					all_img_urls += v.url;
				}else{
					all_img_urls += v.url + ',';
				}
				//console.log(i);
				
			});
			
			button.closest('.image_upload_option').find('.save_datas').val(all_img_urls);
			
			//<img src="<?php echo $meta_data; ?>" alt="" class="the_img"/>
			//$(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:95%;display:block;" />').next().val(attachment.id).next().show();
            //button.closest('.image_upload_option').find('.the_img').attr('src', attachment.url);
            //button.closest('.image_upload_option').find('.save_data').val(attachment.url);
            /* if you sen multiple to true, here is some code for getting the image IDs
			var attachments = frame.state().get('selection'),
			    attachment_ids = new Array(),
			    i = 0;
			attachments.each(function(attachment) {
 				attachment_ids[i] = attachment['id'];
				console.log( attachment );
				i++;
			});
			*/
		})
		.open();
	});
	
});

jQuery(document).ready(function($){
            
	$('.switch').click(function(){
		if( $(this).is(':checked') ){
			var slider_option_switch = $(this).val();
			$(this).closest('.field').find('input[type="hidden"].data').val( slider_option_switch );
		}
	});
	
	
	$('.field').each(function(){
		$(this).find('input[type="text"]').each(function(){
			var field_value = $(this).val();
			if(field_value != undefined){
				field_value = field_value.replace(/\\'/g, "'");
				$(this).val(field_value);
			}
		});
		
	});
	
	setInterval(function(){
	    $( ".datepicker" ).datepicker();    
	}, 2000);
	
});
