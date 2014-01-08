<?php 

    //include 'includes/theme-options/theme-options.php';
	
	add_theme_support('post-thumbnails');
	   
    
    add_theme_support( 'post-formats', array('aside', 'image') );
	
    register_sidebar(array(
        'name'          => __('Trên cùng','thietkeweb.vietmoz.com'),
        'id'            => 'top',
        'description'   => __('Trên cùng website','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
    
    register_sidebar(array(
        'name'          => __('Menu trên cùng','thietkeweb.vietmoz.com'),
        'id'            => 'top-menu',
        'description'   => __('Menu trên cùng','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
    
    
    
    register_sidebar(array(
        'name'          => __('Sườn trái','thietkeweb.vietmoz.com'),
        'id'            => 'sidebar',
        'description'   => __('Sườn trái','thietkeweb.vietmoz.com'),
        'before_title'  => '<h3>',
    	'after_title'   => '</h3>'
    ));
    
    register_sidebar(array(
        'name'          => __('Tổng quan về công ty','thietkeweb.vietmoz.com'),
        'id'            => 'company-info',
        'description'   => __('Tổng quan về công ty','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
    
    register_sidebar(array(
        'name'          => __('Lĩnh vực chính','thietkeweb.vietmoz.com'),
        'id'            => 'whois',
        'description'   => __('Lĩnh vực chính','thietkeweb.vietmoz.com'),
        'before_title'  => '<h3>',
    	'after_title'   => '</h3>'
    ));
    
    register_sidebar(array(
        'name'          => __('Thông tin liên hệ','thietkeweb.vietmoz.com'),
        'id'            => 'contact',
        'description'   => __('Thông tin liên hệ','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
	
    
    register_sidebar(array(
        'name'          => __('Menu dưới cùng','thietkeweb.vietmoz.com'),
        'id'            => 'bottom-menu',
        'description'   => __('Menu dưới cùng','thietkeweb.vietmoz.com'),
        'before_title'  => '<h3>',
    	'after_title'   => '</h3>'
    ));
    
    register_sidebar(array(
        'name'          => __('Quảng cáo bên trái','thietkeweb.vietmoz.com'),
        'id'            => 'left-ad',
        'description'   => __('Quảng cáo bên trái','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
    
    register_sidebar(array(
        'name'          => __('Quảng cáo bên phải','thietkeweb.vietmoz.com'),
        'id'            => 'right-ad',
        'description'   => __('Quảng cáo bên phải','thietkeweb.vietmoz.com'),
        'before_title'  => '',
    	'after_title'   => ''
    ));
    
	register_nav_menu( 'main', 'Menu Chính' );
	
	
    function rename_post_formats( $safe_text ) {
        if ( $safe_text == 'Aside' )
            return 'Product';
        
        if ( $safe_text == 'Image' )
            return 'News';
        return $safe_text;
    }
    add_filter( 'esc_html', 'rename_post_formats' );
    
    
    
	function the_excerpt_max_charlength($charlength) {
    	$excerpt = get_the_excerpt();
    	$charlength++;
    
    	if ( mb_strlen( $excerpt ) > $charlength ) {
    		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
    		$exwords = explode( ' ', $subex );
    		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    		if ( $excut < 0 ) {
    			echo mb_substr( $subex, 0, $excut );
    		} else {
    			echo $subex;
    		}
    		echo '...';
    	} else {
    		echo $excerpt;
    	}
    }
	
	function vmz_register_script()
	{
		wp_register_script( 'js', get_template_directory_uri().'/includes/vmz.js', array('jquery','media-upload','thickbox') );  
		
		wp_enqueue_script('jquery');  

		wp_enqueue_script('thickbox');  
		wp_enqueue_style('thickbox');  

		wp_enqueue_script('media-upload');  
		wp_enqueue_script('js');
	}
	add_action('admin_enqueue_scripts', 'vmz_register_script');
	
?>