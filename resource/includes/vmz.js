jQuery(document).ready(function($) {
	$('.button-upload').live('click',function() {
		tb_show('Upload file', 'media-upload.php?referer=vmz_theme_options&type=image&TB_iframe=true&post_id=0', false);
		var a = $(this).attr("id");
		window.send_to_editor = function(html){
		$(".url[id='" + a + "-url']").val($('img',html).attr('src'));
		$("#" + a + "-display").attr("src",$('img',html).attr('src'));
		tb_remove();
		}
		return false;
	});
	
	$('.button-remove').live('click',function() {
		var a = $(this).attr("id");
		$(".url[id='" + a + "url']").val('');
		$("#" + a + "display").attr("src",'');
	});
	
    
    
    
    $("#theme-options-feedback").fadeOut(3000);
    
	$("#hcv-nav li").live('click',function(){
		var a = $(this).attr("id");
		$(".option").css("display","none");
		$("." + a).slideDown();
		$("#hcv-nav li").removeClass("active");
		$(this).addClass("active");
	});
    
    
});
