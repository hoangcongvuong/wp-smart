<?php get_header(); ?>
<?php $options = get_option('hcv-option') ?>
<div class="clear"></div>
<div id="home-content">
    
    
    <div id="right-home-content">
        <div id="wrap-HCVFadeSlider">

    
            <?php include 'HCVFadeSlider.php'; ?>
            
        </div>
        <div class="clear"></div>
          <h1 class="title">Kết quả tìm kiếm cho "<?php echo $_GET['s'] ?>"</h1>
          <?php
        	if(have_posts()) :
            while(have_posts()) : the_post();
            include 'news-box.php';
            endwhile;
            else : echo '<div id="search-notification">Không tìm thấy kết quả nào phù hợp</div>';
            endif; 
         ?>                   
    </div>
    <?php get_sidebar() ?>
</div>
<!------------------- Footer ----------------------->
<div class="clear"></div>
<?php get_footer(); ?>