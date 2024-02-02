var get_admin_url = $('.get_admin_url').val();

function email_subs_function(){
    $('.email_subs_button').click(function(){
        var btn_parent = $(this).closest('.joel_email_subs_section');
        var gt_email = btn_parent.find('.email_subs_field').val();
        var gt_pid = btn_parent.attr('data_id');
        var t = $(this);
        $.ajax({
            type : "post",
            dataType : "json",
            url : get_admin_url,
            data : {action: "gb_subscription_data", 'email' : gt_email, 'pid': gt_pid},
            success: function(response) {
                if(response.success && response.success != ''){
                    t.closest('.email_subs_col').find('.joel_suc_subscibes').remove();
                    t.closest('.email_subs_col').find('.joel_err_subscibes').remove();
                    
                    t.closest('.email_subs_col').find('.email_subs_field').after('<span class="joel_suc_subscibes d-block d-lg-none">' + response.success + '</span>');
                    t.closest('.email_subs_col').find('.email_subs_btn_container').after('<span class="joel_suc_subscibes d-none d-lg-block">' + response.success + '</span>');
                    
                    t.closest('.email_subs_col').find('.email_subs_btn_container').fadeOut();
                    t.closest('.email_subs_col').find('.email_subs_field').attr('disabled','disabled').css('background', '#f3f3f3;');
                    
                    //t.closest('.email_subs_col').find('.second_email_subs_btn').css('marginTop', '0px');
                }
               
                if(response.error && response.error != ''){
                    //error    
                    t.closest('.email_subs_col').find('.joel_suc_subscibes').remove();
                    t.closest('.email_subs_col').find('.joel_err_subscibes').remove();
                    
                    t.closest('.email_subs_col').find('.email_subs_field').after('<span class="joel_err_subscibes d-block d-lg-none">' + response.error + '</span>');
                    t.closest('.email_subs_col').find('.email_subs_btn_container').after('<span class="joel_err_subscibes d-none d-lg-block">' + response.error + '</span>');
                    t.closest('.email_subs_col').find('.email_subs_field').val('');
                }
            }
        });
        
    });
}

email_subs_function();

$('.joel_email_subs_section').attr('data_id', '0');

$('.blog_post_row').click(function(){
    //joel_email_subs_section
    var j_gid_subs_form = $('.j_gid_subs_form').html();
    $('.j_gid_row_form').slideUp(function(){
        $(this).remove();    
    });
    
    $(this).after('<div class="j_gid_row_form d-flex align-items-center justify-content-center" style="display: none;">' + j_gid_subs_form + '</div>');
    $('.j_gid_row_form').slideDown();
    
    //data_post_id
    
    var data_post_id = $(this).attr('data_post_id');
    if( data_post_id == '' || data_post_id == undefined || data_post_id == null){
        data_post_id = 0;
    }
    
    $('.j_gid_row_form .joel_email_subs_section').attr('data_id', data_post_id);
    
    email_subs_function();
});

    
$(window).scroll(function(){
    
        var img = $('.img-parallax');
        var imgParent = $('.img-parallax').parent();
        var speed = img.data('speed');
        var imgY = imgParent.offset().top;
        var winY = $(this).scrollTop();
        var winH = $(this).height();
        var parentH = imgParent.innerHeight();
    
    
        // The next pixel to show on screen      
        var winBottom = winY + winH;
    
        // If block is shown on screen
        if (winBottom > imgY && winY < imgY + parentH) {
          // Number of pixels shown after block appear
          var imgBottom = ((winBottom - imgY) * speed);
          // Max number of pixels until block disappear
          var imgTop = winH + parentH;
          // Porcentage between start showing until disappearing
          var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
        }
        
        imgPercent = (imgPercent * 1.5);
        $('.img-parallax').css({
          'top': (imgPercent + 30) + '%',
          'transform': 'translate(-50%, -' + (imgPercent * 1.2) + '%)'
        });
        
        
});
  





function joel_frontpage_animation(slider_target_json_data){
    var first_item_of_slider = $('.section_one.data_slider_section').attr('data_active_id');
    var first_item_of_slider_content = slider_target_json_data[first_item_of_slider];
    if(first_item_of_slider_content == 'undefined' || first_item_of_slider_content == undefined){
        
    }else{
        var first_item_of_slider_content_logo_width = first_item_of_slider_content.joel_description_gadgets_logo_width;
        var first_item_of_slider_content_logo_height = first_item_of_slider_content.joel_description_gadgets_logo_height;
        
        var c = slider_target_json_data[first_item_of_slider];
        
        var gbp_id = '.gbp_' + first_item_of_slider;
        $(gbp_id).show();
        //$('body > .joel_background_blur_image').attr('src', c.body_image);
            
        $('.data_slider_section').find('.joel_description_gadgets_logo').css({'width': first_item_of_slider_content_logo_width, 'height': first_item_of_slider_content_logo_height});
    }
    
    
    $('.swiper-wrapper .swiper-slide').click(function(){
      var get_target_id = $(this).attr('target_data_id');
      if(slider_target_json_data[get_target_id] == 'undefined' || slider_target_json_data[get_target_id] == undefined){
        
      }else{
        $('.section_one.data_slider_section').attr('data_active_id', get_target_id);
        $('.section_two.data_slider_section').attr('data_active_id', get_target_id);
        
        var content = slider_target_json_data[get_target_id];
        
        var gbp_id = '.gbp_' + get_target_id;
        
        
        $('body > .joel_background_blur_image').fadeOut(400);
        
        $(gbp_id).fadeIn(400);
        
        $('.data_slider_section').fadeOut(function(){
          var switches = content.switches;
          $.each(switches, function(i,v){
            var switch_par_class = '.' + i;
            $.each(v, function(ind,va){
              var switch_class = '.' + ind;
              $('.data_slider_section').find(switch_par_class).find(switch_class).html(va);
            });
          });
          
          var joel_description_area_title = content.joel_description_area_title;
          var joel_description_area_description = content.joel_description_area_description;
          var joel_description_gadgets_logo = content.joel_description_gadgets_logo;
          var film_link = content.film_link;
          var card_slider_images = content.card_slider_images;
          var book_link = content.book_link;
          
            
            
          $('.data_slider_section').find('.joel_description_area_title').html(joel_description_area_title);
          $('.data_slider_section').find('.joel_description_area_description').html(joel_description_area_description);
          $('.data_slider_section').find('.joel_description_gadgets_logo').attr('src',joel_description_gadgets_logo);
          $('.data_slider_section').find('.joel_description_gadgets_logo').css({'width': content.joel_description_gadgets_logo_width, 'height': content.joel_description_gadgets_logo_height});
          //$('.data_slider_section').find('.film_link').attr('href',film_link);
          //$('.modal-dialog .modal-body iframe.modal_video').attr('src',film_link);
          $('.data_slider_section').find('.book_link').attr('href',book_link);
          
          
          $('.joel_thumbnail_content').find('.details_area').removeClass("current");
          $('.joel_thumbnail_content > .details_area').html('');
          $('.joel_thumbnail_content > .details_area').slideUp();
          $('.joel_thumbnail_content > .details_area').addClass("d-none");
          if( $('.che_sections_contain').hasClass('sli') ){
            $('.che_sections_contain').removeClass('sli');
            $('.che_sections_contain').slideDown();
          }
          //sli
          
          //$('.data_slider_section').fadeIn();
          //$('.section_one').find('.joel_switches_row').;
        }).fadeIn(function(){
            //details_area
            $('html, body').animate({
                scrollTop: $(".che_sections_contain").offset().top
            }, 2000);
        });
      }
    });
    
    $('.section_three .card').click(function(){
      var get_target_id = $(this).attr('target_data_id');
      var target_json_data = slider_target_json_data[get_target_id ];
      var card_this = $(this);
      if( target_json_data == 'undefined' || target_json_data == undefined ){
        
      }else{
        $('.section_one.data_slider_section').attr('data_active_id', get_target_id);
        $('.section_two.data_slider_section').attr('data_active_id', get_target_id);
        
        var content = slider_target_json_data[get_target_id];
        
        $('.che_sections_contain').slideUp(function(){
          $(this).addClass('sli');
          
          //console.log(content);
          /*$('body > .joel_background_blur_image').fadeOut(400, function() {
            $(this).attr('src', content.body_image);
          }).fadeIn(400);*/
            
            
          var gbp_id = '.gbp_' + get_target_id;
        
        
          $('body > .joel_background_blur_image').fadeOut(400);
        
          $(gbp_id).fadeIn(400);
        
          var switches = content.switches;
          
          if( !$(card_this).parent().nextAll('.details_area').slice(0,1).hasClass("current") ){
            $.each(switches, function(i,v){
              var switch_par_class = '.' + i;
              $.each(v, function(ind,va){
                var switch_class = '.' + ind;
                $('.data_slider_section').find(switch_par_class).find(switch_class).html(va);
              });
            });
          }
          
          var joel_description_area_title = content.joel_description_area_title;
          var joel_description_area_description = content.joel_description_area_description;
          var joel_description_gadgets_logo = content.joel_description_gadgets_logo;
          var film_link = content.film_link;
          var book_link = content.book_link;
          
          if( !$(card_this).parent().nextAll('.details_area').slice(0,1).hasClass("current") ){
            $('.data_slider_section').find('.joel_description_area_title').html(joel_description_area_title);
            $('.data_slider_section').find('.joel_description_area_description').html(joel_description_area_description);
            $('.data_slider_section').find('.joel_description_gadgets_logo').attr('src',joel_description_gadgets_logo);
            $('.data_slider_section').find('.joel_description_gadgets_logo').css({'width': content.joel_description_gadgets_logo_width, 'height': content.joel_description_gadgets_logo_height});
            //$('.data_slider_section').find('.film_link').attr('href',film_link);
            //$('.modal-dialog .modal-body iframe.modal_video').attr('src',film_link);
            $('.data_slider_section').find('.book_link').attr('href',book_link);
          }
          var update_content = $('.che_sections_contain').html();
          
          if( $(card_this).parent().nextAll('.details_area').slice(0,1).hasClass("current") ){
            $('.joel_thumbnail_content > .current').fadeOut(function(){
              
              $.each(switches, function(i,v){
                var switch_par_class = '.' + i;
                $.each(v, function(ind,va){
                  var switch_class = '.' + ind;
                  $('.data_slider_section').find(switch_par_class).find(switch_class).html(va);
                });
              });
              
              $('.data_slider_section').find('.joel_description_area_title').html(joel_description_area_title);
              $('.data_slider_section').find('.joel_description_area_description').html(joel_description_area_description);
              $('.data_slider_section').find('.joel_description_gadgets_logo').attr('src',joel_description_gadgets_logo);
              $('.data_slider_section').find('.joel_description_gadgets_logo').css({'width': content.joel_description_gadgets_logo_width, 'height': content.joel_description_gadgets_logo_height});
              //$('.data_slider_section').find('.film_link').attr('href',film_link);
              //$('.modal-dialog .modal-body iframe.modal_video').attr('src',film_link);
              $('.data_slider_section').find('.book_link').attr('href',book_link);
              
              var update_content = $('.che_sections_contain').html();
              
              $('.joel_thumbnail_content > .current').html(update_content);
              $('.joel_thumbnail_content > .current').addClass('sli');
              $('.joel_thumbnail_content > .current').removeClass("d-none");
            }).fadeIn(function(){
                $('html, body').animate({
                    scrollTop: $(".details_area").not( ".d-none" ).offset().top
                }, 2000);
            });
            
          }else{
            
            $(card_this).closest('.joel_thumbnail_content').find('.details_area').removeClass("current");
            $(card_this).closest('.joel_thumbnail_content').find('.details_area').removeClass("sli");
            $(card_this).parent().nextAll('.details_area').slice(0,1).addClass("current");
            
            $('.joel_thumbnail_content > .details_area').html('');
            $('.joel_thumbnail_content > .current').html(update_content);
            $('.joel_thumbnail_content > .details_area').hide();
            $('.joel_thumbnail_content > .details_area').addClass("d-none");
            $('.joel_thumbnail_content > .current').addClass('sli');
            $('.joel_thumbnail_content > .current').removeClass("d-none");
            $('.joel_thumbnail_content > .current').slideDown(function(){
                $('html, body').animate({
                    scrollTop: $(".details_area").not( ".d-none" ).offset().top
                }, 2000);
            });
            
          }
          
            
          //$('.data_slider_section').fadeIn();
          //$('.section_one').find('.joel_switches_row').;
        });
        
        
      }
    });
    
    
    function joel_details_area_container(){
      $('.details_area').remove();
      
      $('.section_three .tab-content .tab-pane').each(function(){
        var cols = $(this).find('.joel_thumbnail_content div.col-md-4');
        var cols_len = cols.length;
        
        cols.each(function(i,v){
          var el = $(this);
          // Get clicked element index
          var index = el.index();
          // Check in which "group" it belongs
          var group = Math.ceil(index / 4);
          
          var win_width = $(window).width();
          // Insert what you want after the last item of that group
          
          
          if(win_width >= '992'){
            
            if( (i + 1) % 4 == 0 ){
              $(this).after('<div class="col-12 details_area d-none">product zoom</div>');
            }
            
          }else if(win_width >= '768'){
            
            if( (i + 1) % 3 == 0 ){
              $(this).after('<div class="col-12 details_area d-none">product zoom</div>');
            }
            
          }else if(win_width >= '576'){
            
            if( (i + 1) % 2 == 0 ){
              $(this).after('<div class="col-12 details_area d-none">product zoom</div>');
            }
            
          }else{
            $(this).after('<div class="col-12 details_area d-none">product zoom</div>');
          }
          
                      
        });
        
        $(this).find('.joel_thumbnail_content').each(function(){
          
          if( $(this).children('div:last-child').hasClass('details_area') ){
            
          }else{
            $(this).children('div:last-child').after('<div class="col-12 details_area d-none">product zoom</div>');
          }
          
        });
        
      });
    }
    
    joel_details_area_container();
    
    $(window).resize(function(){
        if( $('.che_sections_contain').hasClass('sli') ){
          $('.che_sections_contain').removeClass('sli');
          $('.che_sections_contain').slideDown();
        }
        $('.data_slider_section').show();
        joel_details_area_container();
    });
    
    //Limit Characters
    $(".card-body .card-text").each(function(){
      var card_text = $(this).text().length;
      
      $(this).text(function(index, currentText) {
          if(card_text > 180){
            //return currentText.substr(0, 180) + ' ...';
          }else{
            //return currentText.substr(0, 180);
          }
      });
      
    });
    
    $(".card-body .card-heading").each(function(){
      var card_text = $(this).text().length;
      //console.log(card_text);
      $(this).text(function(index, currentText) {
          if(card_text > 45){
            //return currentText.substr(0, 45) + ' ...';
          }else{
            //return currentText.substr(0, 45);
          }
          
      });
      
    });
    
    //Load More
    
    var number_to_show = 16;
    
    $('.section_three .tab-content .tab-pane').each(function(i,v){
        var this_cols = $(this);
        var cols = $(this).find('.joel_thumbnail_content div.col-md-4');
        cols.addClass('d-none');
        cols.hide();
        cols.slice(0, number_to_show).removeClass('d-none').show();
        
        if(i == 0){
            var c_lengt = $(this).find('.joel_thumbnail_content div.col-md-4').length;
            if(c_lengt <= number_to_show){
                $(".joel_view_more_btn").hide();
            }    
        }
        
    });
    
    
    $(".joel_view_more_btn").click(function(e){
      var tab_id = $('a.joel_filter_btn.active').attr('href');
      var card_lengt = $(tab_id).find('.joel_thumbnail_content div.col-md-4.d-none').length;
      $(this).attr('tab_control', tab_id);
      
      if( card_lengt <= 0 ){
        $(tab_id).find('.joel_thumbnail_content div.col-md-4').hide();
        $(tab_id).find('.joel_thumbnail_content div.col-md-4').addClass('d-none');
        $(tab_id).find('.joel_thumbnail_content div.col-md-4').slice(0, number_to_show).removeClass('d-none').show();
        
        var card_lengt = $(tab_id).find('.joel_thumbnail_content div.col-md-4.d-none').length;
        if( card_lengt > 0 ){
          $(this).text('Visa fler');
        }
        
      }else{
        $(tab_id).find('.joel_thumbnail_content div.col-md-4.d-none').slice(0, number_to_show).removeClass('d-none').slideDown();
        
        var card_lengt = $(tab_id).find('.joel_thumbnail_content div.col-md-4.d-none').length;
        if( card_lengt <= 0 ){
          $(this).text('Visa mindre');
        }
        
      }
      
      //this_cols.find('.joel_thumbnail_content div.d-none').slice(0, 4).slideDown();
      //https://www.youtube.com/watch?v=R60uXUNL-ow
      //Visa mindre
    });
    
    $('.nav-tabs .nav-item .nav-link').click(function(){
        
      $('.nav-tabs .nav-item .nav-link').removeClass('active');
      $(this).addClass('active');
      
      $('.tab-pane').removeClass('active');
      $('.tab-pane').removeClass('show');
      $('.tab-pane').css({'opacity': '0'});
      
      var tab_id_get = $(this).attr('href');
      
      $(tab_id_get).addClass('active');
      $(tab_id_get).animate({'opacity': '1'}, 1000);
      
      var get_id_href = $(this).attr('href');
      var tab_length = $(get_id_href).find('.card').parent().length;
      if(tab_length > number_to_show ){
        $(".joel_view_more_btn").slideDown();
      }else{
        $(".joel_view_more_btn").slideUp();
      }
      
    }).stop();
    
    
    $("#myModal").on('hidden.bs.modal', function (e) {
        $("#myModal iframe").attr("src", $("#myModal iframe").attr("src"));
    });
    
    setInterval(function(){
        $('.film_link').click(function(){
          var get_target_id = $('.section_one.data_slider_section').attr('data_active_id');
          var content = slider_target_json_data[get_target_id];
          var film_link = content.film_link;
          $('.modal_video').attr('src',film_link);  
        });
        
    },1000);
}



$("#myModal").on('hidden.bs.modal', function (e) {
    $("#myModal iframe").attr("src", '');
});

$('.film_link').click(function(){
    if( $('.film_link').hasClass('joel_front_page_film_link') ){
        var get_film_link = $('.modal_video').attr('data_src');
        $('.modal_video').attr('src',get_film_link);  
    }
    
});

function counter(elem, prefix){
    $(elem).each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        
        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },
      
        {
      
          duration: 3000,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum) + prefix);
          },
          complete: function() {
            $this.text(this.countNum + prefix);
            //alert('finished');
          }
      
        });  
        
      
    });
}

setInterval(function(){
    if($('.brands_slider').length){
        var brandsSlider = $('.brands_slider');
        
        brandsSlider.owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:3000,
            nav:false,
            dots:false,
            autoWidth: false,
            items: 7,
            margin:0,
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 1,
                    autoWidth: false
                },
                
                380: {
                    items: 2,
                    autoWidth: false
                },
                
                // breakpoint from 480 up
                480 : {
                    items: 3,
                    autoWidth: false
                },
                // breakpoint from 768 up
                768 : {
                    items: 4,
                    autoWidth: false
                },
                
                992 : {
                    items: 5,
                    autoWidth: false
                },
                
                1100:{
                    items: 7,
                    autoWidth: false
                }
            }
        });
        
        if($('.brands_prev').length){
            var prev = $('.brands_prev');
            prev.on('click', function(){
                brandsSlider.trigger('prev.owl.carousel');
            });
        }
        
        if($('.brands_next').length){
            var next = $('.brands_next');
            next.on('click', function(){
                brandsSlider.trigger('next.owl.carousel');
            });
        }
    }

},1000);


setInterval(function(){
    $('.email_subs_field').each(function(){
        var email_subs_field = $(this).val();
        if( email_subs_field.length >= 7 ){
            //email_subs_btn_container
            $(this).closest('.email_subs_col').find('.second_email_subs_btn').css({ 'display': 'inline-block' });
            $(this).closest('.email_subs_col').find('.email_subs_button').fadeIn();  
        }else{
            $(this).closest('.email_subs_col').find('.email_subs_button').fadeOut(function(){
                $(this).closest('.email_subs_col').find('.second_email_subs_btn').css({ 'display': 'none' });    
            });
            //$(this).closest('.email_subs_col').find('.second_email_subs_btn').css({ 'display': 'none' });
        }
    });
    
    
    $('.email_subs_field').keyup(function(){
        $(this).closest('.email_subs_col').find('.joel_err_subscibes').remove();
    });


},1000);

function joel_scroll_to_the_target(btn,elem,target){
    $(btn).click(function(){
        var $target = $(target); 
        $(elem).animate({scrollTop: $target.height()}, 1000);
    });
    
}

function java_mktime(hour,minute,month,day,year) {
    return new Date(year, month - 1, day, hour, minute, 0).getTime() / 1000;
}

function get_all_dates_by_month(month,year){
    var list = [];
    var mon = ( month - 1);
    var yeear = year;
    
    for(var i = 1; i <= 31; i++){
        //var times = java_mktime(12,0,mon,i,yeear);
        var d = new Date(yeear,mon,i,12,0,0);
        if( d.getMonth() == mon){
            list[i] = i;   
        }
        
    }
    
    return list;
}


function date_pick_selector(elem, btn_class, clk_elem){
    $(elem).datepicker({
        showOn: "button",
        buttonText: "Select date"
    });
    
    $(clk_elem).click(function(){
        $(btn_class).trigger('click');   
    });
}


function joel_page_func(){
    var number_to_show = 3;
    
    $('.joel_html_page .joel_fp_blog_section_view_more').each(function(){
        var this_cols = $(this);
        var cols = $(this).find('.blog_post_row');
        cols.addClass('d-none');
        cols.hide();
        cols.slice(0, number_to_show).removeClass('d-none').show();
    });
    
    $('.joel_html_page .joel_fp_blog_section_view_more .joel_view_more_btn').click(function(){
      
      var tab_id = '.joel_html_page .joel_fp_blog_section_view_more';
      var card_lengt = $(tab_id).find('.blog_post_row.d-none').length;
      $(this).attr('tab_control', tab_id);
      
      //console.log(card_lengt);
      
      if( card_lengt <= 0 ){
        $(tab_id).find('.blog_post_row').hide();
        $(tab_id).find('.blog_post_row').addClass('d-none');
        $(tab_id).find('.blog_post_row').slice(0, number_to_show).removeClass('d-none').show();
        
        var card_lengt = $(tab_id).find('.blog_post_row.d-none').length;
        if( card_lengt > 0 ){
          $(this).text('Visa fler');
        }
        
      }else{
        $(tab_id).find('.blog_post_row.d-none').slice(0, number_to_show).removeClass('d-none').slideDown();
        
        var card_lengt = $(tab_id).find('.blog_post_row.d-none').length;
        if( card_lengt <= 0 ){
          $(this).text('Visa mindre');
        }
        
      }
    });
}
    
    
    
//white_circle

//https://www.jssor.com/demos/scrolling-logo-thumbnail-slider.slider



//Calender Script


let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);

var cm = currentMonth + 1;

$('.joel_tab_months #month-body td').each(function(){
    var td_contain_month = $(this).attr('data-month');
    if(td_contain_month == cm){
        //$(this).addClass('bg-info');
    }
    //$()   
});

var last_year = currentYear + 3;
$('.joel_tab_years #years-body').each(function(){
    for(var i = currentYear; i <= last_year; i++){
        $(this).find('tr').append('<td data-year="' + i + '"><span>' + i + '</span></td>');
    }
});


$('.joel_tab_years #years-body td').each(function(){
    var td_contain_month = $(this).attr('data-year');
    if(td_contain_month == currentYear){
        //$(this).addClass('bg-info');
    }
    //$()   
});

function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body"); // body of the calendar
    
    if(tbl != null){
    
        // clearing all previous cells
        tbl.innerHTML = "";
    
        // filing data about month and in the page via DOM.
        monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;
    
        // creating all cells
        let date = 1;
        for (let i = 0; i < 6; i++) {
            // creates a table row
            let row = document.createElement("tr");
    
            //creating individual cells, filing them up with data.
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    let cell = document.createElement("td");
                    let cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                }
                else if (date > daysInMonth) {
                    break;
                }
    
                else {
                    let cell = document.createElement("td");
                    let cell_child = document.createElement("span");
                    let cellText = document.createTextNode(date);
                    
                    cell.setAttribute('data_date', date);
                    cell_child.appendChild(cellText);
                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        //cell.classList.add("bg-info");
                    } // color today's date
                    cell.appendChild(cell_child);
                    row.appendChild(cell);
                    date++;
                }
    
    
            }
    
            tbl.appendChild(row); // appending each row into calendar body.
        }
    }
}


function joel_form_step_process(btn,class_sel, hidden_form_data, joel_front_data, remove_none_class, add_none_class, d_attr){
    
    $(btn).click(function(){
        
        var t_btn = $(this);
        var t_btn_attr = $(this).attr(d_attr);
        var t_btn_data = $(this).text();
        
        $(btn).removeClass(class_sel);
        t_btn.addClass(class_sel);
        
        if( $(joel_front_data).parent().hasClass('cal_mon_sec') ){
            $(joel_front_data).text(t_btn.text().substr(0, 3));
            //console.log( t_btn.text().substr(0, 3) );
        }else{
            $(joel_front_data).text(t_btn_data);
        }
        
        $(hidden_form_data).val(t_btn_attr);
        
        $(remove_none_class).removeClass('d-none');
        $(add_none_class).addClass('d-none');
        
        //console.log(add_none_class + ' | ' + remove_none_class);
        
        if(d_attr == 'data-month'){
            gt_date_chk = new Date();
            
            if( $('.joel_hidden_form_data .joel_target_year_table').val() == '' ){
                showCalendar( (t_btn_attr - 1),  gt_date_chk.getFullYear());
            }else{
                yrs = $('.joel_hidden_form_data .joel_target_year_table').val();
                showCalendar( (t_btn_attr - 1),  yrs);
            }
        }else{
            gt_date_chk = new Date();
            
            if( $('.joel_hidden_form_data .joel_target_year_table').val() == '' ){
                showCalendar( (t_btn_attr - 1),  gt_date_chk.getFullYear());
            }else{
                yrs = $('.joel_hidden_form_data .joel_target_year_table').val();
                showCalendar( (t_btn_attr - 1),  yrs);
            }
        }
        
        if( $('.joel_hidden_form_data .joel_target_nights_table').val() != '' ){
            
            var m = $('.joel_hidden_form_data .joel_target_month_table').val();
            var d = $('.joel_hidden_form_data .joel_target_days_table').val();
            var y = $('.joel_hidden_form_data .joel_target_year_table').val();
            var n = $('.joel_hidden_form_data .joel_target_nights_table').val();
            
            if( m == ''){
                m = currentMonth;
            }
            
            if( d == ''){
                d = today.getDate();
            }
            
            if( n == ''){
                n = 1;
            }
            
            if( y == ''){
                y = currentYear;
            }
            
            var user_date = m + '/' + d + '/' + y;
            var j_departure_date = new Date(user_date);
            
            $('.joel_hidden_form_data .j_departure_table').val(j_departure_date);
            
            var newDate = j_departure_date;
            newDate.setDate(parseInt( newDate.getDate() ) + parseInt(n) );
            
            $('.comeback .cal_numb_sec h2').text(newDate.getDate());
            
            
            $('#month-body td').each(function(){
                var swed_mon_name = $(this).attr('data-month');
                if( (newDate.getMonth() + 1) == swed_mon_name){
                    var now_date = new Date(user_date);
                    $('.comeback .cal_mon_sec h6').text( $(this).find('span').text().substr(0, 3) );
                    $('.joel_hidden_form_data .j_comeback_table').val(newDate);
                    $('.joel_hidden_form_data .j_departure_table').val(now_date);
                    
                    $('.departure .cal_numb_sec h2').text( now_date.getDate() );
                    
                    var gm =  now_date.getMonth() + 1;
                    
                    $('#month-body td').each(function(){
                        var data_month = $(this).attr('data-month');
                        if( data_month == gm ){
                            $('#month-body td').removeClass('bg-info');
                            $(this).addClass('bg-info');
                            var gmt = $(this).find('span').text().substr(0,3);
                            $('.departure .cal_mon_sec h6').text( gmt );
                        }
                    });
                    
                }
            });
            
        }
        
        
        
    });
    
    
}

function extend_one_joel_form_step_process(btn,class_sel, hidden_form_data, joel_front_data, remove_none_class, add_none_class, d_attr, act_btns_res){
    
    $(btn).click(function(){
        //joel_form_step_process(btn,class_sel, hidden_form_data, joel_front_data, remove_none_class, add_none_class, d_attr);
        
        var t_btn = $(this);
        var t_btn_attr = $(this).attr(d_attr);
        var t_btn_data = $(this).text();
        
        $(btn).removeClass(class_sel);
        t_btn.addClass(class_sel);
        
        if( $(joel_front_data).parent().hasClass('cal_mon_sec') ){
            $(joel_front_data).text(t_btn.text().substr(0, 3));
            //console.log( t_btn.text().substr(0, 3) );
        }else{
            $(joel_front_data).text(t_btn_data);
        }
        
        $(hidden_form_data).val(t_btn_attr);
        
        $(remove_none_class).removeClass('d-none');
        $(add_none_class).addClass('d-none');
        
        
        var m = $('.joel_hidden_form_data .joel_target_month_table').val();
        var d = $('.joel_hidden_form_data .joel_target_days_table').val();
        var y = $('.joel_hidden_form_data .joel_target_year_table').val();
        var n = $('.joel_hidden_form_data .joel_target_nights_table').val();
        
        if( m == ''){
            m = currentMonth;
        }
        
        if( d == ''){
            d = today.getDate();
        }
        
        if( n == ''){
            n = 1;
        }
        
        if( y == ''){
            y = currentYear;
        }
        
        var user_date = m + '/' + d + '/' + y;
        var date = new Date(user_date);
        
        var newDate = date;
        newDate.setDate(parseInt( newDate.getDate() ) + parseInt(n) );
        
        $('.comeback .cal_numb_sec h2').text(newDate.getDate());
        
        
        $('#month-body td').each(function(){
            var swed_mon_name = $(this).attr('data-month');
            if( (newDate.getMonth() + 1) == swed_mon_name){
                var now_date = new Date(user_date);
                $('.comeback .cal_mon_sec h6').text( $(this).find('span').text().substr(0, 3) );
                $('.joel_hidden_form_data .j_comeback_table').val(newDate);
                $('.joel_hidden_form_data .j_departure_table').val(now_date);
                
                $('.departure .cal_numb_sec h2').text( now_date.getDate() );
                
                var gm =  now_date.getMonth() + 1;
                
                $('#month-body td').each(function(){
                    var data_month = $(this).attr('data-month');
                    if( data_month == gm ){
                        $('#month-body td').removeClass('bg-info');
                        $(this).addClass('bg-info');
                        var gmt = $(this).find('span').text().substr(0,3);
                        $('.departure .cal_mon_sec h6').text( gmt );
                    }
                });
                
            }
        });
        
        if(act_btns_res == 'true'){
            $('.joel_btns_gotland_form').removeClass('none_at_any_cost');
        }else{
            $('.joel_btns_gotland_form').addClass('none_at_any_cost');
        }
        
        //$('.comeback .cal_mon_sec h6').text(newDate.getMonth());
        
    });
}

function joel_step_form_reverse(btn,add_none_class,remove_none_class, act_btns_res, target_class){
    
    $(btn).click(function(){
        if( target_class != '' ){
            if( $(target_class).val() != '' ){
                $(add_none_class).addClass('d-none');
                $(remove_none_class).removeClass('d-none');
            }
        }else{
            $(add_none_class).addClass('d-none');
            $(remove_none_class).removeClass('d-none');
        }
        
        
        if(act_btns_res == 'true'){
            $('.joel_btns_gotland_form').removeClass('none_at_any_cost');
        }else{
            $('.joel_btns_gotland_form').addClass('none_at_any_cost');
        }
        
        $('.joe_follow_steps').val('step_one');
    });
    
    
}

$('.guests-number').on('change', function(){
    var guests_val = $(this).val();
    $('.joel_guests_cont .cal_numb_sec h2').text(guests_val);
    $('.joel_hidden_form_data .j_guests').val(guests_val);
    //joel_guests_cont
    //console.log(guests_val);
});

$('.guests-number').on('keyup',function(){
    $(this).trigger('change');
});


$('.cal_mon_sec i').click(function(){
    
    var i_this = $(this);
    var guests_val = $('.guests-number').val();
    
    if( guests_val == '' ){
        guests_val = 0;
    }
    
    if( i_this.hasClass('fa-chevron-up') ){
        guests_val  = parseInt(guests_val) + 1; 
    }else if( i_this.hasClass('fa-chevron-down') ){
        guests_val  = parseInt(guests_val) - 1;
    }
    
    $('.guests-number').val(guests_val);
    $('.guests-number').trigger('change');
    
});


$('.go_range_slider').on('change', function(){
    var range_target = $(this).attr('range_target');
    var data_class = '.joel_hidden_form_data .' + range_target;
    var t_range = $(this).val();
    
    $(data_class).val(t_range);
    //range_target
    
});

setInterval(function(){
    if( $('.guests-number').val() != '' && $('.guests-number').val() < 0 ){
        $('.guests-number').val(0);
        $('.joel_guests_cont .cal_numb_sec h2').text( $('.guests-number').val() );
        $('.joel_hidden_form_data .j_guests').val( $('.guests-number').val() );
    }
    
    //
    $('.nav-tabs .owl-nav .owl-prev, .nav-tabs .owl-nav .owl-next').text('');
},500);


$('.joel_contact_company_details_section .joel_contact_pic').hover(function(){
    $(this).find('.img-circle').hide();
    $(this).find('.hov_img-circle').show();
}).mouseleave(function(){
    $(this).find('.img-circle').show();
    $(this).find('.hov_img-circle').hide();
});

//Widget Classes

$('.joel_footer_section .widget-container ul').addClass('d-flex flex-row');
$('.joel_footer_section .widget-container .menu-top-footer-menu-container ul').addClass('joel_footer_links');
$('.joel_footer_section .widget-container .menu-footer-social-menu-container ul').addClass('joel_follow');

$('.joel_footer_section .joel_follow').closest('.widget-container').addClass('cl-inline-title d-flex flex-sm-row flex-column align-items-sm-center justify-content-center justify-content-md-start');

$('.joel_footer_section .widget-container #menu-top-footer-menu li').addClass('d-flex align-items-center');
/************************** Image Upload **************************/

//Email Subscription

//Calender Validation


if( !$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').closest('.header_section').hasClass('header_two') ){
    
}else{
    $('.joel_slide_menu').css('background', 'rgba(236, 236, 236, 0.9)');
}

$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
	$(this).toggleClass('open');
	
	if( $(this).hasClass('open') ){
	    
	    
	    
	    $('.joel_slide_menu').addClass('opsh');
	    $('.nav_section').addClass('joel_slide_top_fix');
	    $('body').css('overflowY', 'hidden');
	    //$('.user_page_content_body').css('margin', '0px 0px');
	    setTimeout(function(){
	        $('.joel_slide_menu a').addClass('link_show_animation');
	    },300);
	    
	}else{
	    
	    $('.joel_slide_menu').removeClass('opsh');
	    $('.nav_section').removeClass('joel_slide_top_fix');
	    $('body').css('overflowY', 'auto');
	    setTimeout(function(){
	        $('.joel_slide_menu a').removeClass('link_show_animation');
	    },300);
	    //$('.user_page_content_body').css('margin', '100px 0px');
	    
	}
	
});

$('.circle_thumbs').click(function(){
    
    
    //window.HubSpotConversations.widget.remove();
    
    const status = window.HubSpotConversations.widget.status();

    if (status.loaded) {
      window.HubSpotConversations.widget.refresh();
      window.HubSpotConversations.widget.open();
    } else {
      window.HubSpotConversations.widget.load();
      window.HubSpotConversations.widget.open();
    }
    
    $(this).trigger('click');
    
});

//calendar_submit


//https://developers.hubspot.com/docs/methods/conversations_api/hubspot-conversations-javascript-api?_ga=2.196599653.839402927.1586295245-899226794.1586295245
