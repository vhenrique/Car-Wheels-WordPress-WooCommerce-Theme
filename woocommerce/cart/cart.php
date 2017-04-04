<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
if ( !defined( 'ABSPATH' ) ) exit;
global $woocommerce;
wc_print_notices();
do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="main-cart-wrap">
                <table class="shop_table cart" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name" colspan="3"><?php _e( 'Product', 'woocommerce' ); ?></th>
                            <th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
                            <th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
                            <th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>
                                <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                    <td class="product-remove">
                                        <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );?>
                                    </td>
                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        if ( !$_product->is_visible() )
                                            echo $thumbnail;
                                        else
                                            printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                                        ?>
                                    </td>
                                    <td class="product-name">
                                        <?php
                                        if ( !$_product->is_visible() )
                                            echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        else
                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

                                        // Meta data
                                        echo WC()->cart->get_item_data( $cart_item );

                                        // Backorder notification
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
                                            echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
                                        ?>
                                    </td>

                                    <td class="product-price">
                                        <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                    </td>
                                    <td class="product-quantity">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input( array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'step'      => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
                                                'max_value' => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                            ), $_product, false );
                                        }
                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key ); ?>
                                    </td>

                                    <td class="product-subtotal">
                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        do_action( 'woocommerce_cart_contents' );

                        do_action( 'woocommerce_after_cart_contents' ); ?>
                    </tbody>
                </table>
            </div>
            <?php do_action( 'woocommerce_after_cart' ); ?>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="cart-collaterals">
                <?php global $woocommerce;
                $units = $woocommerce->cart->get_cart();

                // Get Wheels' term children
                $children = get_term_children(60, 'product_cat');

                if(!empty($units)){
                     foreach($units as $unit => $values) {

                        // Get terms by each product in the cart
                        $terms = wp_get_post_terms($values['product_id'], 'product_cat');
                        foreach($terms as $term){
                            // When product is wheel
                            if($term->slug == 'replicas'){
                                $wheels[] = array('type'=>'replica', 'quantity'=>$values['quantity'], 'product_id'=>trim($values['product_id']));
                            } 
                        }
                    }
                } 

                if( !empty( $wheels ) ){
                    foreach( $wheels as $wheel ){
                        if( $wheel['quantity'] % 4 != 0 && $wheel['type'] == 'replica' ){
                            $names[] = get_the_title($wheel['product_id']);
                        }
                    }
                }
                cartDashToCheckout( $names );
                ?> 
            </div>
        </div>
    </div>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="wpb_text_column wpb_content_element">
            <div class="wpb_wrapper">
                <div class="jcarousel-wrapper">
                    <div class="jcarousel jcarousel_best_sellers">
                        <ul class="products woogrid col-xs-product-2 col-sm-product-3 col-md-product-3 col-lg-product-5 grid-layout">  
                            <?php $args = array('post_type'=>'product', 'posts_per_page'=>3, 'meta_key'=>'metaRecom', 'meta_value'=>'yes');
                            $productsRecommended = get_posts($args);                                    
                            if(!empty($productsRecommended)){
                                foreach($productsRecommended as $pr){
                                    echo '<li class="product cg-product-wrap"><div class="cg-product-img"><a href="'.get_permalink($pr->ID).'">';
                                    echo '<div class="first-flip">'.get_the_post_thumbnail( $pr->ID, 'shop_single' ).'</div><div class="back-flip back">';
                                    $product = new WC_product($pr->ID);
                                    $attachment_ids = $product->get_gallery_attachment_ids();
                                    echo wp_get_attachment_image($attachment_ids[0], 'imgList');
                                    echo '</div></a><div class="cg-quick-view-wrap"><a href="'.get_permalink($pr->ID).'" class="cg-quick-view" data-id="31">Olhada Rápida</a></div></div>';
                                    echo '<div class="cg-product-meta-wrap"><div class="cg-product-info"><a href="'.get_permalink($product->ID).'"><span class="name">'.$pr->post_title.'</span><span class="price">R$ '.$product->get_price_html().'</span></a><div class="clear"></div></div></div>';
                                        echo '<div class="cg-product-cta"><a href="'.get_permalink($pr->ID).'" rel="nofollow" data-product_id="'.$pr->ID.'" data-product_sku="" data-quantity="1" class="btn btn-default mt-5">Comprar</a></div></li>';
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div> 
        </div> 
    </div><!--/12 -->
</div><!--/row -->

