<?php
        	$default = array(
                			'text'=>'',
        		
                                    'uploadlink'=>'',
                            'uploadlink-link'=>'',
            
                   			'upload'=>'',
        		
                			'textarea'=>'',
        		
                			'checkbox'=>'',
        		
                			'select-category'=>'',
        		
                			'select-post'=>'',
        		
                			'select-page'=>'',
        		
                			'last'=>''
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
                			'text'=>$_POST['text'],
                            'uploadlink'=>$_POST['uploadlink'],
                    'uploadlink-link'=>$_POST['uploadlink-link'], 
                			'upload'=>$_POST['upload'],
                			'textarea'=>$_POST['textarea'],
                			'checkbox'=>$_POST['checkbox'],
                			'select-category'=>$_POST['select-category'],
                			'select-post'=>$_POST['select-post'],
                			'select-page'=>$_POST['select-page'],
                			'last'=>''
        		);
        		update_option('hcv-option', $new_options);
                echo '<div id="wrap-theme-options-feedback"><br />';
        		echo '<p id="theme-options-feedback">Lưu thành công</p>';
                echo '</div>';
        		endif;
        		$options = get_option('hcv-option');
        ?>
        		<div id="wrap">
        		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/includes/theme-options/theme-options.css'; ?>" />
        		<form action="" method="POST">
        			<ul id="hcv-nav">
        				<li class="active" id="general">Tổng quan</li>
        				<li id="home">Trang chủ</li>
        				<li id="sidebar">Sidebar</li>
        			</ul>
        			
        			<div class="option general">
                				<div class="list text text">
        					<label for="text">text : </label>
        					<input type="text" name="text" id="text" value="<?php echo $options['text']; ?>"  />            
        				</div>
        				<div class="clear"></div>
                				<div class="list upload-with-link uploadlink">
        					<label style="height: 60px;">uploadlink : </label>
        					<span class="label">Liên kết : </span>
        					<input name="uploadlink-link" type="text" value="<?php echo $options['uploadlink-link']; ?>"  /><br />
        					<label class="image">Hình ảnh : </label>
        					<input class="url" type="text" name="uploadlink" id="uploadlink-image-url" value="<?php echo $options['uploadlink']; ?>"  />
        					<input type="button" class="button-upload" id="uploadlink-image" value="Upload" />
        					<input type="button" class="button-remove" id="uploadlink-image-" value="Remove" /><br />
        					<img class="uploadlink-img" id="uploadlink-image-display" src="<?php echo $options['uploadlink']; ?>"/>						
        				</div>
        				<div class="clear"></div>
        
        				
        				<div class="list upload upload">
        					<label class="image" for="upload">upload : </label>
        					<input class="url" type="text" name="upload" id="upload-image-url" value="<?php echo $options['upload']; ?>"  />
        					<input type="button" class="button-upload" id="upload-image" value="Upload" />
        					<input type="button" class="button-remove" id="upload-image-" value="Remove" />
        					<br />
        					<img class="upload-img"  id="upload-image-display" src="<?php echo $options['upload']; ?>"/>                    
        				</div>
        				<div class="clear"></div>
        
        
                				<div class="list textarea textarea">
        					<label for="textarea">textarea : </label>
        					<textarea cols="70" rows="3" name="textarea" id="textarea"><?php echo $options['textarea']; ?></textarea>            
        				</div>
        				<div class="clear"></div>
                				<div class="list checkbox checkbox">
        					<label>checkbox : </label>
        					<input type="checkbox" name="checkbox" id="checkbox" value="<?php echo $options['checkbox']; ?>"  />            
        				</div>
        				<div class="clear"></div>
                                <div class="list select-category select-category">
        					<label for="select-category" style="height: 60px;">select-category : </label>
        					<select name="select-category" id="select-category">
                            <?php 
                                $moment = array(
                                    'hide_empty'    => 0
                                );
                                $categories = get_categories($moment);
                                foreach($categories as $category)
                                {
                            ?>
                                    <option <?php if($options['select-category']==$category -> term_id) echo 'selected'; ?> value="<?php echo $category -> term_id ?>"><?php echo $category -> cat_name ?></option>
                            <?php        
                                }
                            ?>
                            
                            </select>					
        				</div>
                                <div class="list select-post select-post">
        					<label for="select-post" style="height: 60px;">select-post : </label>
        					<select name="select-post" id="select-post">
                            <?php 
                                $moment = array(
                                    'orderby'           => 'name',
                                    'order'             => 'ASC',
                                    'posts_per_page'    => -1
                                );
                                $posts = get_posts($moment);
                                
                                foreach($posts as $post)
                                {    
                            ?>
                                    <option <?php if($options['select-post']== $post -> ID) echo 'selected'; ?> value="<?php echo $post -> ID; ?>"><?php echo $post -> post_name; ?></option>
                            <?php        
                                }
                            ?>
                            
                            
                            </select>					
        				</div>
                                <div class="list select-page select-page">
        					<label for="select-page" style="height: 60px;">select-page : </label>
        					<select name="select-page" id="select-page">
                            <?php 
                                
                                $pages = get_pages();
                                
                                foreach($pages as $page)
                                {    
                            ?>
                                    <option <?php if($options['select-page']== $page -> ID) echo 'selected'; ?> value="<?php echo $page -> ID; ?>"><?php echo $page -> post_name; ?></option>
                            <?php        
                                }
                            ?>
                            
                            
                            </select>					
        				</div>
        				
                			<p id="submit">
        				<input type="submit" name="submit"  value="Lưu Không ?"  />            
        			</p>
        			</div>
        		</form>
        		</div>
        
        <?php	
        }
        ?>