$(document).ready(function(){
	var count_option = 1;
	var s = 1;
	var name_option = '';
	var type_option= '';
	$(".close").live('click',function(){
		$(this).parent().remove();
		s = 1;
	});
	
    
    $(".close:only-of-type").live('click',function(){
        $("#popup").empty();
    })
	
    $("#refresh").click(function(){
        $("#popup").empty();
        s = 1; 
    });
	//ADD TABLE
	
	$("#add-table").live('click', function(){
		s ==$(this).id;
		if( (s == 1) || (s ==$(this).id ) )
		{
			$("#popup").append("<form class='form popup' id='add-table-popup-form'><input id='input-talbe-name' type='text' /><span class='close pointer'>&nbsp</span><span class='pointer' id='btn-add-talbe'>Ok</span></form><div class='clear'></div>");
			s = 0;	
		}
		$("#input-talbe-name").focus();		
	});	
	
	$("#btn-add-talbe").live("click",function(){
		$.post(
			"add-table.php",
			{
				name:$("#input-talbe-name").val()
			},
			function(data,status)
			{
				if(status=='success')
				{
					$("#add-table-popup-form").remove();
					$("#alert").empty();
					$("#alert").css("display","block");
					$("#alert").append(data);
					$("#alert").fadeOut(2000);
					s = 1;
				}
				else
				{
					alert("Error");
				}
			}
		);
	});
	
	
	
	//ADD CONTENT
	
	$("#add-content").live('click', function(){
		s == $(this).id;
		if( (s == 1) || (s ==$(this).id ) )
		{
			$("#popup").append("<form class='form popup' id='add-content-popup-form'><input id='input-content-name' type='text' /><br /><textarea id='text-area' cols='180' rows='20'></textarea><br />Thêm vào <select class='popup' id='select-table'><option value='most_functions'>Most Functions</option><option value='blocks'>Blocks</option><option value='widgets'>Widgets</option><option value='theme_options'>Theme Options</option></select><span class='close pointer'>&nbsp</span><span class='pointer' id='btn-add-content'>Ok</span></form><div class='clear'></div>");
			s = 0;	
		}
		$("#input-content-name").focus();		
	});
	
	$("#btn-add-content").live("click",function(){
		$.post(
			"add-content.php",
			{
				label:$("#input-content-name").val(),
				content:$("#text-area").val(),
				table:$("#select-table").val()
			},
			function(data,status)
			{
				if(status=='success')
				{
					$("#add-content-popup-form").remove();
					$("#alert").empty();
					$("#alert").css("display","block");
					$("#alert").append(data);
					$("#alert").fadeOut(2000);
					s = 1;
				}
				else
				{
					alert("Error");
				}
			}
		);
	});
	
	
	
	// GET CONTENT
	$("#get-content").live('click', function(){
		s == $(this).id;
		if( (s == 1) || (s == $(this).id ) )
		{
			$("#popup").append("<form class='form popup' id='get-content-popup-form'>Chọn <select class='popup' id='get-table'><option value=''>- Chọn -</option><option value='most_functions'>Most Functions</option><option value='blocks'>Blocks</option><option value='widgets'>Widgets</option><option value='theme_options'>Theme Options</option></select><span class='close pointer'>&nbsp</span></form><div class='clear'></div>");
			s = 0;	
		}
		$("#input-content-name").focus();		
	});
	
	$("#get-table").live("change",function(){
		$("#content").remove();
		$("#table").remove();
		$("#btn-get-content").remove();
		$.post(
			"get-content.php",
			{
				table:$("#get-table").val()
			},
			function(data,status)
			{			
				if(status=='success')
				{
					$("#get-content-popup-form").append(data);
				}
				else
				{
					alert("Error");
				}
			}
		);
	});
	
	$("#table").live("change",function(){
	   s ==$(this).id;
		$.post(
			"get-content.php",
			{
				table:$("#get-table").val(),
				id:$("#table").val()
			},
			function(data,status)
			{			
				if(status=='success')
				{
					$("#content").remove();
					$("#get-content-popup-form").append(data);
					$("#content").select();
					$("#content").focus();
				}
				else
				{
					alert("Error");
				}
			}
		);
	});
	
	
	//CREATE THEME OPTIONS
	$("#create-theme-options").live("click", function(){
	   s ==$(this).id;
		if((s == 1) || (s ==$(this).id ))
		{
			$.get(
			"create-theme-options.php",
			function(data)
			{
				$("#popup").append(data);
                $("#popup").prepend('<p id="vmz" class="pointer">OK</p>');
			}
		);	
		s = 0;
		}
	});
	
	$(".add-option").live("click", function(){
		$.get(
			"create-theme-options.php",
			function(data)
			{
				$("#popup").append(data);
			}
		)
		count_option++;
		//alert(count_option);
	});
	
	$(".create-option-form .close").live("click", function(){
		count_option--;
		//alert(count_option);
	});
	
	$("#vmz").live('click',function(){
		$("#opacity").css({"background":"black","opacity":"0.5","z-index":"10"});
        $("#content-file-themeoptions").css({"z-index":"12"});
		for(i=1;i<=count_option;i++)
		{
			if(i==1) 
			{
				name_option = $(".create-option-form:nth-of-type(" + i +") .option-name").val();
				type_option = $(".create-option-form:nth-of-type(" + i +") .option-type").val();
			}
			else
			{
				name_option = name_option + "!@#$%^&*" + $(".create-option-form:nth-of-type(" + i +") .option-name").val();
				type_option = type_option + "!@#$%^&*" + $(".create-option-form:nth-of-type(" + i +") .option-type").val();
			}
		}
		
		$.post(
			"create-theme-options.php",
			{
				names:name_option,
				types:type_option
			},
			function(data,status)
			{
				$("body").append(data);
				$("#content-file-themeoptions textarea").select();
			}
		);
	});
	
    
    $("#opacity").live('click',function(){
        $("#content-file-themeoptions").remove(); 
        $("#opacity").css({"opacity":"0","z-index":"-1"});
    });
    
    $("#close-content-file-themeoptions").live('click',function(){
        $("#content-file-themeoptions").remove(); 
        $("#opacity").css({"opacity":"0","z-index":"-1"});
    });
});