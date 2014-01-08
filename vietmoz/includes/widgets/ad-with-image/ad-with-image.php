<?php 
    //Register Widget
    add_action('widgets_init', 'widget_ad_with_image');
    function widget_ad_with_image()
    {
        register_widget('class_widget_ad_with_image');
    }
    //End Register Widget
    
    
    
    //Create Widget Class
    class class_widget_ad_with_image extends WP_widget
    {
        //Description Widget
        function class_widget_ad_with_image()
        {
            
            $widget_ops=array('class' => 'class_widget_ad_with_image', 'description'=>'AD Image');
            $control_ops=array('width' =>200, 'height'=>350, 'id-base'=>'id-widget-ad-with-image');
            $this->WP_widget('class_widget_ad_with_image',__('AD image','thietkeweb.vietmoz.com'),$widget_ops,$control_ops);
        }
        //End Description Widget
         
         
		 function widget($args,$instance)
		 {
			extract($args);
			$title = $instance['title'];
			$image = $instance['image'];
			$link = $instance['link'];
		?>
			<div class="wrap-ad-with-link">
				<div class="title"><?php echo $title; ?></div>
				<div class="ad-with-link">
					<a href="<?php echo $link ?>"><img src="<?php echo $image ?>" /></a>
				</div>
			</div>
		<?php
		 }
         
         
        function update($new_instance,$old_instance)
        {
            $instance=$old_instance;
            $instance['title'] = $new_instance['title'];
            $instance['image'] = $new_instance['image'];
            $instance['link'] = $new_instance['link'];
            return $instance;
        }
        
        
		function form($instance)
        {
            $defaults = array('title' => __( 'Default title' , 'thietkeweb.vietmoz.com' ),'image' => __( '' , 'thietkeweb.vietmoz.com' ),'link' => __( '' , 'thietkeweb.vietmoz.com' ));
            $instance = wp_parse_args((array) $instance, $defaults); 
			?>


			<p>
                <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link : ','thietkeweb.vietmoz.com'); ?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance['link']; ?>" />
			</p>	
			
            <p class="list image">
				
				
				<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image : ','thietkeweb.vietmoz.com'); ?></label>				
				<input class="url widefat" type="text"  id="image-url" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $instance['image']; ?>"  />
				<input type="button" class="vmz-button-upload" id="image"  value="Upload" />
				<input type="button" class="vmz-button-remove" id="image-" value="Remove" />
				<br />
				<img style="max-width:100%" class="image-img" src="<?php echo $instance['image']; ?>"/>                    
			</p>

			
			
			<?php
        }
    }
	//END Create Widget Class
?>