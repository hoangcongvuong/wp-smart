<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory').'/css/single.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory').'/css/404.css'; ?>" />
<div class="full">
    <div id="error-content">
        <h1 class="center">Rất tiếc ! Trang web mà bạn yêu cầu không tồn tại !</h1>
        <h2 class="center">Chúng tôi xin lỗi vì sự bất tiện này</h2>
        <div style="padding:17px">
            <div id="error-page-sidebar">
                <h2>Bạn có thể thử</h2>
                <ul>
                    <li><a href="<?php echo home_url() ?>/sitemap_index.xml">Sitemap</a> của chúng tôi</li>
                    <li>Tìm kiếm trên <span style="font-weight: bold;"><?php echo bloginfo('name'); ?> :</span>  </li>
                    <?php get_search_form(); ?>
                    
                </ul>
            <br /><br /><br />
                <h2>Hoặc bạn có thể xem thêm</h2>
                <?php
                    $moment = array(
                            'theme_location'  => 'main',                        	
                        	'container'       => 'div',
                        	'container_class' => '',
                        	'container_id'    => '',
                        	'menu_class'      => 'menu'                      
                    );
                    wp_nav_menu($moment);
                    ?>
            
            </div>
            
            <div id="error-page-content">
                <img id="error-image" src="<?php echo bloginfo('template_directory').'/images/404.png' ?>" />
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>