jQuery(function(jQuery) {
	jQuery('.custom_upload_image_button').click(function() {  
        
        formfield = jQuery(this).siblings('.custom_upload_image');
        preview = jQuery(this).siblings('.custom_preview_image');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) {
        	imgurl = jQuery('img',html).attr('src');
            classes = jQuery('img', html).attr('class');
            width = jQuery('img', html).attr('width');
            height = jQuery('img', html).attr('height');
            id = classes.replace(/(.*?)wp-image-/, '');
            formfield.val(id);  
            preview.attr('src', imgurl);
            jQuery('p.img_dim').text('Image Dimension : ' + width + ' x ' + height );
            jQuery('small.removeImage a').css('display', 'block');
            jQuery('small.removeImage a').css('float', 'left');
            jQuery('small.removeImage a').css('margin-left', '15px');
            jQuery('small.removeImage a').css('margin-top', '2px');
            tb_remove();  
        }  
        return false;  
    });  
      
    jQuery('.custom_clear_image_button').click(function() {
    	var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
    	jQuery(this).parent().siblings('.custom_upload_image').val('');  
        jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
        return false;  
    });
    jQuery('.custom_clear_image_button').click(function() {
    	jQuery(this).hide();
    	jQuery('.img_dim').hide();
    });
  
});
