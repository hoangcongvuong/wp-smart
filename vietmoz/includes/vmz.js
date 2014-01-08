jQuery(document).ready(function($) {
    //Do not change
	$(document).on('click','.button-upload',function() {
        var particular = $(this).attr("particular");
		var frame = wp.media({
            title : 'Thư viện hinh ảnh',
            multiple : false,
            library : { type : 'image'},
            button : { text : 'Chọn' }
		});
        
        frame.open();
 
        frame.on('close',function(){
            var attachments = frame.state().get('selection').toJSON();
            var attachment = attachments[0];
            $("#url-" + particular).val(attachment.url);
            $("#display-" + particular).fadeOut(1000);
            $("#display-" + particular).attr("src",attachment.url);
            $("#display-" + particular).fadeIn(1000);
        });
		return false;
	});	
    
    
	$(document).on('click','.button-remove',function() {
        var particular = $(this).attr("particular");
		$("#url-" + particular).val("");
        $("#display-" + particular).fadeOut(1000,function(){
            $("#display-" + particular).attr("src","");
        });
        
        
	});
	//End Do not change
    
    
    
        
    $("#theme-options-feedback").fadeOut(3000);
    
	$("#hcv-nav li").live('click',function(){
		var a = $(this).attr("id");
		$(".option").css("display","none");
		$("." + a).slideDown();
		$("#hcv-nav li").removeClass("active");
		$(this).addClass("active");
	});
    
    
    //Multi Field
    $("#add-slide").click(function(){
        var count_slide = $(".list-slide").size();
        var add = '<div class="clear"></div>\
        <div style="display:none" class="list-slide upload-with-link ">\
            <div class="item">\
                <label class="label">Liên kết : </label><br />\
                <input name="slide['+count_slide+'][link]" type="text" value=""  /><br /><br />\
            </div>\
            <div class="item">\
                <label class="image">Tiêu đề : </label><br />\
                <input class="url" type="text" name="slide['+count_slide+'][title]" id="-image-url" value=""  /><br /><br />\
            </div>\
            <div class="item">\
                <label class="image">Hình ảnh : </label><br />\
                <input class="url" type="text" name="slide['+count_slide+'][image]" id="url-slide-'+count_slide+'" value=""  />\
                <input type="button" class="button-upload pointer" particular="slide-'+count_slide+'" value="Upload" />\
        		<input type="button" class="button-remove pointer" particular="slide-'+count_slide+'"  value="Remove" /><br />\
        		<img style="display:none" class="display" id="display-slide-'+count_slide+'" src=""/><br />\
            </div>\
            <div class="item">\
                <label class="image">Caption : </label>	<br />\
                <textarea cols="90" rows="5" name="slide['+count_slide+'][caption]"></textarea><br />\
            </div>\
            <img  remove="'+count_slide+'" class="pointer remove-slide" src="http://localhost/sites/codex/wp-content/themes/test-theme/images/remove.png" />\
            <div class="clear"></div>\
        </div>';
        
        $(this).attr("order",parseInt($(this).attr("order"))+1);
        $("#content-slide").prepend(add);
        $(".list-slide").slideDown();
    });
    
    $(document).on("click",".remove-slide", function(){
        var current = $(this);
        $(this).parent().slideUp(500,function(){
            current.parent().remove();
        });
        
    });
    
});
