<?php 
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('Cannot connect to database');
	if(!isset($_POST['names']))
	{
		$sqli = "SELECT * FROM theme_options";
		$query = mysqli_query($con, $sqli);
?>
		<form  class="form popup create-option-form" >
        
			Option Name : <input type="text" class="option-name" />
			<select class="option-type">
			
            <option value="text">Text</option>
            
<?php 
		while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
?>
			<option value="<?php echo $row['label'] ?>"><?php echo $row['label'] ?></option>
<?php
		}
?>
			</select>
			<span class="add-option pointer">&nbsp;&nbsp;</span>
			<span class="close pointer">&nbsp;</span>
			
		</form>
<?php
	}
	
	else
	{
		$names = explode('!@#$%^&*',$_POST['names']);
		$types = explode('!@#$%^&*',$_POST['types']);
		$count = count($names);
?>

        
    <div id="content-file-themeoptions">
        <div class="pointer" id="close-content-file-themeoptions"></div>
        
        <textarea cols="150" rows="40">&lt;?php
        	$default = array(
        <?php
        		for($i=0;$i < $count;$i++)
        		{
        		      if($types[$i] == 'upload with link')
                      {
          ?>
                            '<?php echo $names[$i]; ?>'=&gt;'',
                            '<?php echo $names[$i]; ?>-link'=&gt;'',
            
           <?php
                     }
                      else
                      {
        ?>
        			'<?php echo $names[$i]; ?>'=&gt;'',
        		
        <?php
                        }
        		}
        ?>
        			'last'=&gt;''
        		);
        		
        		if(get_option('hcv-option')==false) : update_option('hcv-option', $default); endif;
        		$options = get_option('hcv-option');
        			
        		/**
        		 * Register Options Page
        		 */
        		add_action('admin_menu','vmz_register_options_page');
        		function vmz_register_options_page()
        		{
        			add_theme_page( 'VietMoz Theme Options', 'VietMoz Options', 'manage_options', 'vmz_theme_options', 'vmz_theme_options' );
        		}
        
        
        
        		function vmz_theme_options()
        		{
        		if(isset($_POST['submit'])) : 
        		$new_options = array(
        <?php
        		for($i=0;$i < $count;$i++)
        		{
        		  if($types[$i]=='upload with link')
                  {
        ?>
                    '<?php echo $names[$i]; ?>'=&gt;$_POST['<?php echo $names[$i]; ?>'],
                    '<?php echo $names[$i]; ?>-link'=&gt;$_POST['<?php echo $names[$i]; ?>-link'], 
        <?php
                  }
                  else
                    {
        ?>
        			'<?php echo $names[$i]; ?>'=&gt;$_POST['<?php echo $names[$i]; ?>'],
        <?php 
                    }
        		}
        ?>
        			'last'=&gt;''
        		);
        		update_option('hcv-option', $new_options);
                echo '<div id="wrap-theme-options-feedback"><br />';
        		echo '<p id="theme-options-feedback">Lưu thành công</p>';
                echo '</div>';
        		endif;
        		$options = get_option('hcv-option');
        ?&gt;
        		&lt;div id="wrap"&gt;
        		&lt;link rel="stylesheet" type="text/css" href="&lt;?php echo get_template_directory_uri().'/includes/theme-options/theme-options.css'; ?>" /&gt;
        		&lt;form action="" method="POST"&gt;
        			&lt;ul id="hcv-nav"&gt;
        				&lt;li class="active" id="general"&gt;Tổng quan&lt;/li&gt;
        				&lt;li id="home"&gt;Trang chủ&lt;/li&gt;
        				&lt;li id="sidebar"&gt;Sidebar&lt;/li&gt;
        			&lt;/ul&gt;
        			
        			&lt;div class="option general"&gt;
        <?php 
        		for($i=0;$i<$count;$i++)
        		{
        			switch($types[$i])
        			{
        				case 'text' : 
        ?>
        				&lt;div class="list text <?php echo $names[$i] ?>"&gt;
        					&lt;label for="<?php echo $names[$i] ?>"&gt;<?php echo $names[$i] ?> : &lt;/label&gt;
        					&lt;input type="text" name="<?php echo $names[$i] ?>" id="<?php echo $names[$i] ?>" value="&lt;?php echo $options['<?php echo $names[$i] ?>']; ?&gt;"  /&gt;            
        				&lt;/div&gt;
        				&lt;div class="clear"&gt;&lt;/div&gt;
        <?php
        				break;
        				case 'upload' :
        ?>				
        				&lt;div class="list upload <?php echo $names[$i]; ?>"&gt;
        					&lt;label class="image" for="<?php echo $names[$i]; ?>"&gt;<?php echo $names[$i]; ?> : &lt;/label&gt;
        					&lt;input class="url" type="text" name="<?php echo $names[$i]; ?>" id="<?php echo $names[$i]; ?>-image-url" value="&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;"  /&gt;
        					&lt;input type="button" class="button-upload" id="<?php echo $names[$i]; ?>-image" value="Upload" /&gt;
        					&lt;input type="button" class="button-remove" id="<?php echo $names[$i]; ?>-image-" value="Remove" /&gt;
        					&lt;br /&gt;
        					&lt;img class="<?php echo $names[$i]; ?>-img"  id="<?php echo $names[$i]; ?>-image-display" src="&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;"/&gt;                    
        				&lt;/div&gt;
        				&lt;div class="clear"&gt;&lt;/div&gt;
        
        
        <?php
        
        				break;
        				case 'upload with link' :
        ?>
        				&lt;div class="list upload-with-link <?php echo $names[$i]; ?>"&gt;
        					&lt;label style="height: 60px;"&gt;<?php echo $names[$i]; ?> : &lt;/label&gt;
        					&lt;span class="label"&gt;Liên kết : &lt;/span&gt;
        					&lt;input name="<?php echo $names[$i]; ?>-link" type="text" value="&lt;?php echo $options['<?php echo $names[$i]; ?>-link']; ?&gt;"  /&gt;&lt;br /&gt;
        					&lt;label class="image"&gt;Hình ảnh : &lt;/label&gt;
        					&lt;input class="url" type="text" name="<?php echo $names[$i]; ?>" id="<?php echo $names[$i]; ?>-image-url" value="&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;"  /&gt;
        					&lt;input type="button" class="button-upload" id="<?php echo $names[$i]; ?>-image" value="Upload" /&gt;
        					&lt;input type="button" class="button-remove" id="<?php echo $names[$i]; ?>-image-" value="Remove" /&gt;&lt;br /&gt;
        					&lt;img class="<?php echo $names[$i]; ?>-img" id="<?php echo $names[$i]; ?>-image-display" src="&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;"/&gt;						
        				&lt;/div&gt;
        				&lt;div class="clear"&gt;&lt;/div&gt;
        
        <?php
        
        				break;
        				case 'textarea' :
        ?>
        				&lt;div class="list textarea <?php echo $names[$i]; ?>"&gt;
        					&lt;label for="<?php echo $names[$i]; ?>"&gt;<?php echo $names[$i]; ?> : &lt;/label&gt;
        					&lt;textarea cols="70" rows="3" name="<?php echo $names[$i]; ?>" id="<?php echo $names[$i]; ?>"&gt;&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;&lt;/textarea&gt;            
        				&lt;/div&gt;
        				&lt;div class="clear"&gt;&lt;/div&gt;
        <?php
        				break;
        				case 'checkbox' :
        ?>
        				&lt;div class="list checkbox <?php echo $names[$i]; ?>"&gt;
        					&lt;label&gt;<?php echo $names[$i]; ?> : &lt;/label&gt;
        					&lt;input type="checkbox" name="<?php echo $names[$i]; ?>" id="<?php echo $names[$i]; ?>" value="&lt;?php echo $options['<?php echo $names[$i]; ?>']; ?&gt;"  /&gt;            
        				&lt;/div&gt;
        				&lt;div class="clear"&gt;&lt;/div&gt;
        <?php                        
        				break;
                        case 'select category':
        ?>
                        &lt;div class="list select-category <?php echo $names[$i] ?>"&gt;
        					&lt;label for="<?php echo $names[$i] ?>" style="height: 60px;"&gt;<?php echo $names[$i] ?> : &lt;/label&gt;
        					&lt;select name="<?php echo $names[$i] ?>" id="<?php echo $names[$i] ?>"&gt;
                            &lt;?php 
                                $moment = array(
                                    'hide_empty'    =&gt; 0
                                );
                                $categories = get_categories($moment);
                                foreach($categories as $category)
                                {
                            ?&gt;
                                    &lt;option &lt;?php if($options['<?php echo $names[$i] ?>']==$category -&gt; term_id) echo 'selected'; ?&gt; value="&lt;?php echo $category -&gt; term_id ?&gt;"&gt;&lt;?php echo $category -&gt; cat_name ?&gt;&lt;/option&gt;
                            &lt;?php        
                                }
                            ?&gt;
                            
                            &lt;/select&gt;					
        				&lt;/div&gt;
        <?php
                        break;
                        case 'select post':
        ?>
                        &lt;div class="list <?php echo $names[$i] ?> <?php echo $names[$i] ?>"&gt;
        					&lt;label for="<?php echo $names[$i] ?>" style="height: 60px;"&gt;<?php echo $names[$i] ?> : &lt;/label&gt;
        					&lt;select name="<?php echo $names[$i] ?>" id="<?php echo $names[$i] ?>"&gt;
                            &lt;?php 
                                $moment = array(
                                    'orderby'           =&gt; 'name',
                                    'order'             =&gt; 'ASC',
                                    'posts_per_page'    =&gt; -1
                                );
                                $posts = get_posts($moment);
                                
                                foreach($posts as $post)
                                {    
                            ?&gt;
                                    &lt;option &lt;?php if($options['<?php echo $names[$i] ?>']== $post -&gt; ID) echo 'selected'; ?&gt; value="&lt;?php echo $post -&gt; ID; ?&gt;"&gt;&lt;?php echo $post -&gt; post_name; ?&gt;&lt;/option&gt;
                            &lt;?php        
                                }
                            ?&gt;
                            
                            
                            &lt;/select&gt;					
        				&lt;/div&gt;
        <?php
                        break;
                        case 'select page':
        ?>
                        &lt;div class="list <?php echo $names[$i] ?> <?php echo $names[$i] ?>"&gt;
        					&lt;label for="<?php echo $names[$i] ?>" style="height: 60px;"&gt;<?php echo $names[$i] ?> : &lt;/label&gt;
        					&lt;select name="<?php echo $names[$i] ?>" id="<?php echo $names[$i] ?>"&gt;
                            &lt;?php 
                                
                                $pages = get_pages();
                                
                                foreach($pages as $page)
                                {    
                            ?&gt;
                                    &lt;option &lt;?php if($options['<?php echo $names[$i] ?>']== $page -&gt; ID) echo 'selected'; ?&gt; value="&lt;?php echo $page -&gt; ID; ?&gt;"&gt;&lt;?php echo $page -&gt; post_name; ?&gt;&lt;/option&gt;
                            &lt;?php        
                                }
                            ?&gt;
                            
                            
                            &lt;/select&gt;					
        				&lt;/div&gt;
        <?php
        				default : echo '';
        ?>				
        <?php
        			}	
        			
        		}
        ?>
        			&lt;p id="submit"&gt;
        				&lt;input type="submit" name="submit"  value="Lưu Không ?"  /&gt;            
        			&lt;/p&gt;
        			&lt;/div&gt;
        		&lt;/form&gt;
        		&lt;/div&gt;
        
        &lt;?php	
        }
        ?&gt;</textarea>
    </div>


<?php
	}
?>