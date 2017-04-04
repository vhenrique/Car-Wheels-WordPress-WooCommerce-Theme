<?php
/**
 * The main template file.
 * @package commercegurus
 */
global $cg_options;
$cg_blog_sidebar = '';
if ( isset( $cg_options['cg_blog_sidebar'] ) ) {
    $cg_blog_sidebar = $cg_options['cg_blog_sidebar'];
}

if ( isset( $_GET['blogsidebar'] ) ) {
    $cg_blog_sidebar = $_GET['blogsidebar'];
}
global $themePrefix;
get_header(); ?>


    <div class="cg-section">
        <div class="wpb_row vc_row-fluid">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <ul class="mainSlider">
                        <a href="#" class="slidePrev actionSlider"><</a>
                        <a href="#" class="slideNext actionSlider">></a>
                        <?php $args = array('post_type'=>'slides', 'posts_per_page'=>-1);
                        $slides = get_posts($args); 
                        if(!empty($slides)){
                            foreach($slides as $slide){
                                if( strlen( get_post_meta( $slide->ID, 'redirectLink', true ) ) ) {
                                    echo '<li><a href="'.get_post_meta($slide->ID, 'redirectLink', true).'">';
                                    echo get_the_post_thumbnail($slide->ID, $themePrefix.'slides', array('title'=>$slide->post_title, 'alt'=>$slide->post_excerpt));
                                    echo '</a></li>';
                                } else{
                                    echo '<li>'.get_the_post_thumbnail($slide->ID, $themePrefix.'slides', array('title'=>$slide->post_title, 'alt'=>$slide->post_excerpt)).'</li>';
                                }
                            }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="wpb_row vc_row-fluid">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                        <div class="wpb_wrapper">
                            <div class="col-lg-12">
                                <div class="titlewrap"><h2>Mais vendidos</h2></div>
                            </div>
                        </div> 
                    </div>                                   
                    <div class="wpb_text_column wpb_content_element">
                        <div class="wpb_wrapper">
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel jcarousel_best_sellers">
                                    <ul class="products woogrid col-xs-product-2 col-sm-product-3 col-md-product-3 col-lg-product-5 grid-layout">  
                                    <?php $args = array('post_type'=>'product', 'posts_per_page'=>5, 'meta_key'=>'total_sales', 'orderby'=>'meta_value_num', 'order_by'=>'ASC');
                                    $productsTopSalles = new WP_Query( $args );
                                    if ( $productsTopSalles->have_posts() ) {
                                        while ( $productsTopSalles->have_posts() ) : $productsTopSalles->the_post();
                                            wc_get_template_part( 'content', 'product' );
                                        endwhile;
                                    } 
                                    wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
    <div class="container">
        <div class="wpb_row vc_row-fluid">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                        <div class="wpb_wrapper">
                            <div class="col-lg-12">
                                <div class="titlewrap"><h2>Lançamentos</h2></div>
                            </div>
                        </div> 
                    </div> 
                    <div class="wpb_text_column wpb_content_element">
                        <div class="wpb_wrapper">
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel jcarousel_best_sellers">
                                    <ul class="products woogrid col-xs-product-2 col-sm-product-3 col-md-product-3 col-lg-product-5 grid-layout">  
                                    <?php $args = array('post_type'=>'product', 'posts_per_page'=>5, 'meta_key'=>'metaLanc', 'meta_value'=>'yes');
                                    $productsLaunch =  new WP_Query($args);
                                    if ( $productsLaunch->have_posts() ) {
                                        while ( $productsLaunch->have_posts() ) : $productsLaunch->the_post();
                                            wc_get_template_part( 'content', 'product' );
                                        endwhile;
                                    }
                                    wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>

    <div class="container">
        <div class="wpb_row vc_row-fluid">
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">
                    <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                        <div class="wpb_wrapper">
                            <div class="col-lg-12">
                                <div class="titlewrap"><h2>Em destaque</h2></div>
                            </div>
                        </div> 
                    </div> 
                    <div class="wpb_text_column wpb_content_element">
                        <div class="wpb_wrapper">
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel jcarousel_best_sellers">
                                    <ul class="products woogrid col-xs-product-2 col-sm-product-3 col-md-product-3 col-lg-product-5 grid-layout">
                                        <?php $args = array('post_type'=>'product', 'posts_per_page'=>5, 'meta_key'=>'_featured', 'meta_value'=>'yes');
                                        $productsFeatured = new WP_Query($args);
                                        if( $productsFeatured->have_posts() ){
                                            while( $productsFeatured->have_posts() ) : $productsFeatured->the_post();
                                                wc_get_template_part( 'content', 'product' );
                                            endwhile;
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>

    <div class="cg-section">
        <div class="wpb_row vc_row-fluid vc_custom_1413905970138">    
            <div class="vc_col-sm-12 wpb_column vc_column_container">
                <div class="wpb_wrapper">     
                    <img data-fixed src="<?php echo get_template_directory_uri().'/images/banner-home.jpg' ?>" width="1920" height="425" alt="" >          
                </div> 
            </div> 
        </div>
    </div>
    <div class="container wp_last_content">
        <div class="wpb_row vc_row-fluid">
            <div class="col-lg-8">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element  vc_custom_1445520724765">
                        <div class="wpb_wrapper">
                            <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                <div class="wpb_wrapper">
                                    <div class="col-lg-12">
                                        <div class="titlewrap"><h2>Recomendamos para você</h2></div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="wpb_text_column wpb_content_element">
                                <div class="wpb_wrapper">
                                    <div class="jcarousel-wrapper">
                                        <div class="jcarousel jcarousel_share">
                                            <ul class="products woogrid col-xs-product-2 col-sm-product-3 col-md-product-3 col-lg-product-3 grid-layout">  
                                            <?php $args = array('post_type'=>'product', 'posts_per_page'=>3);
                                            $productsRecommended = new WP_Query($args);
                                            if( $productsRecommended->have_posts() ){
                                                while( $productsRecommended->have_posts() ) : $productsRecommended->the_post();
                                                    wc_get_template_part( 'content', 'product' );
                                                endwhile;
                                            } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div> 
                </div> 
            </div> 
            <div class="col-lg-4">
                <div class="wpb_wrapper">               
                    <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                        <div class="wpb_wrapper">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/colonialracing&amp;width=360&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=261528187203562" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:290px; float:right; background:#fff;" allowtransparency="true"></iframe>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
<?php get_footer(); ?>