<?php

/**
 * [metaBuild description]
 * @return [type] [description]
 */
function metaBuild(){
    echo '<meta name="author" content="'.get_bloginfo('name').' - AVIVATEC - Vitor Henrique vhenrique.vhs@gmail.com">';
    if( is_home() ){
        $description = get_bloginfo('description');
        echo '<meta name="description" content="'.$description.'">';

        $description = str_replace( ' ', ', ', $description );
        echo '<meta name="keywords" content="'.$description.'">';
    } else if( is_archive() ){
        global $wp_query;
        echo '<meta name="description" content="'.$description.'">';
        echo '<meta name="keywords" content="';
        echo $wp_query->query_vars->product_cat;
        echo $wp_query->query_vars->post_type;
        echo '">';
    } else if( is_single() ){
        echo '<meta name="description" content="'.get_the_title().'">';
        $title = str_replace( ' ', ', ', get_the_title() );
        echo '<meta name="keywords" content="'.$title.'">';
    } else{
        $description = get_bloginfo('description');
        echo '<meta name="description" content="'.$description.'">';
    }
}

// Limit wheels quanity to 4
function cartDashToCheckout($names){
    if(empty($names)){
        global $woocommerce;
        woocommerce_cart_totals();
        echo '<label>10 dias para entrega Sul e Sudeste, demais regiões de 10 à 30 dias</label>';
        echo '<input type="submit" class="button update-button" name="update_cart" value="Atualizar carrinho" />';
        wp_nonce_field( 'woocommerce-cart' );
        if ( $woocommerce->cart->coupons_enabled() ) { 
            echo '<div class="coupon"><h3 class="widget-title">'. _e( 'Coupon', 'woocommerce' ).'</h3>';
            echo '<input type="text" name="coupon_code"  id="coupon_code" value="" placeholder="';
            _e( 'Enter Coupon', 'commercegurus' );
            echo '"/>';
            echo '<input type="submit" class="button small expand" name="apply_coupon" value="';
            _e( 'Apply Coupon', 'commercegurus' );
            echo '" />';
            do_action( 'woocommerce_cart_coupon' );
            echo '</div>';
        }         
    } else{
        $names = array_unique( $names );
        wp_nonce_field( 'woocommerce-cart' );

        foreach($names as $name){
            // Concat on of each wheel, spacing by coma
            $wheelLabel .= '<b>'.$name.', </b>';
        }
            
        // If there are more than one wheel that is replica
        if(count( $names ) > 1){
            echo '<p>Os produtos '.$wheelLabel .' precisam ter a quantidade alterada para 4.</p>';
        } else{
            echo '<p>O produto '.$wheelLabel .' precisa ter a quantidade alterada para 4.</p>';
        }

        echo '<a href="'.get_permalink(1928).'">consulte-nos</a><br>';
        echo '<input type="submit" class="button" name="update_cart" value="Atualizar" />';
    }
}

// Custom post meta to make produtct release
function metaLanc() {
    global $post;
    $custom = get_post_custom($post->ID);
    $meta_value = $custom["metaLanc"][0];
    echo '<p><input type="hidden" name="metaLanc-nonce" value="'.wp_create_nonce( 'metaLanc-nonce' ).'" />';
    if($meta_value == "yes"){
        echo '<input type="checkbox" name="metaLanc" value="yes" checked> Sim</p>';
    } else{
        echo '<input type="checkbox" name="metaLanc" value="yes"> Sim</p>';
    }
}
add_action( 'admin_init', 'custom_create_lancamento' );
function custom_create_lancamento() { add_meta_box('metaLanc', 'Lançamento?', 'metaLanc', 'product'); }

add_action ('save_post', 'save_lancamento');
function save_lancamento(){
    global $post;
    if ( !wp_verify_nonce( $_POST['metaLanc-nonce'], 'metaLanc-nonce' )) {return $post->ID;}
    if ( !current_user_can( 'edit_post', $post->ID ))return $post->ID;
    update_post_meta($post->ID, "metaLanc", $_POST['metaLanc'] );
}


function redirectLink() {
    global $post;
    $custom = get_post_custom($post->ID);
    $meta_value = $custom["redirectLink"][0];
    echo '<p><input type="hidden" name="redirectLink-nonce" value="'.wp_create_nonce( 'redirectLink-nonce' ).'" />';
    echo '<input type="text" name="redirectLink" value="'.$meta_value.'" style="width:100%;" /></p>';
}
add_action( 'admin_init', 'custom_create_redirectLink' );
function custom_create_redirectLink() { add_meta_box('redirectLink', 'Link de redirecionamento', 'redirectLink', 'slides'); }

add_action ('save_post', 'save_redirectLink');
function save_redirectLink(){
    global $post;
    if ( !wp_verify_nonce( $_POST['redirectLink-nonce'], 'redirectLink-nonce' )) {return $post->ID;}
    if ( !current_user_can( 'edit_post', $post->ID ))return $post->ID;
    update_post_meta($post->ID, "redirectLink", $_POST['redirectLink'] );
}

// Remove default post type
add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
    remove_menu_page('edit.php');
}

 /**
 * Register widgetized area and update sidebar with default widgets
 */
function cg_widgets_init() {    
    register_sidebar( array(
        'name' => __( 'Sidebar', 'commercegurus' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Top Toolbar - Left', 'commercegurus' ),
        'id' => 'top-bar-left',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Top Toolbar - Right', 'commercegurus' ),
        'id' => 'top-bar-right',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Mobile Search', 'commercegurus' ),
        'id' => 'mobile-search',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Search', 'commercegurus' ),
        'id' => 'header-search',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Shop Sidebar', 'commercegurus' ),
        'id' => 'shop-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Below main body', 'commercegurus' ),
        'id' => 'below-body',
        'before_widget' => '<div class="row"><div id="%1$s" class="col-lg-12 %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'First Footer', 'commercegurus' ),
        'id' => 'first-footer',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Footer', 'commercegurus' ),
        'id' => 'second-footer',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'cg_widgets_init' );

?>