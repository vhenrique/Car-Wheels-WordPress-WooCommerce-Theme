<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( !defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

global $cg_options, $product;
$meta_icons = $cg_options['product_share_icons'];
?>

<?php if ( $meta_icons == 'yes' ) { ?>
    <div class="social-icons">
        <a class="facebook-icon" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><span class="icon-facebook"></span></a>
        <a class="twitter-icon" href="https://twitter.com/share?url=<?php echo get_permalink(); ?>" target="_blank"><span class="icon-twitter"></span></a>
        <a class="pinterest-icon" href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&amp;description=<?php echo get_the_title(); ?>" target="_blank"><span class="icon-pinterest"></span></a>
        <a class="googleplus-icon" href="//plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank"><span class="fa fa-google-plus"></span></a>
    </div>
<?php } ?>

<?php
do_action( 'woocommerce_share' );

?>