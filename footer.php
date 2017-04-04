<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package commercegurus
 */
global $cg_options;
$cg_below_body_widget = '';
$cg_below_body_widget = $cg_options['cg_below_body_widget'];
$cg_footer_top_active = '';
$cg_footer_top_active = $cg_options['cg_footer_top_active'];
$cg_footer_bottom_active = '';
$cg_footer_bottom_active = $cg_options['cg_footer_bottom_active'];
$cg_footer_cards_display = '';
$cg_footer_cards_display = $cg_options['cg_show_credit_cards'];
$cg_back_to_top = '';
$cg_back_to_top = $cg_options['cg_back_to_top'];

function display_card( $card, $status ) {
    if ( $card == '1' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="visa"]' );
    }
    if ( $card == '2' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="mastercard"]' );
    }
    if ( $card == '3' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="paypal"]' );
    }
    if ( $card == '4' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="amex"]' );
    }
}

if ( $cg_below_body_widget == 'yes' ) {
    ?>
    <section class="below-body-widget-area">
        <div class="container">
            <?php if ( is_active_sidebar( 'below-body' ) ) { ?>
                <?php dynamic_sidebar( 'below-body' ); ?>  
            <?php } ?>
        </div>
    </section>
<?php } ?>

<footer class="footercontainer" role="contentinfo"> 
    <?php if ( $cg_footer_top_active == 'yes' ) { ?>
        <?php if ( is_active_sidebar( 'first-footer' ) ) : ?>
            <div class="lightwrapper">
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar( 'first-footer' ); ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.lightwrapper -->
        <?php endif; ?>
    <?php } ?>

    <?php if ( $cg_footer_bottom_active == 'yes' ) { ?>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div id="text-4" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 widget_text">
                            <img src="<?php echo $cg_options['site_logo']['url']; ?>" style="width:170px; margin-top:-18px"  />
                            <br><br>
                            <nav>
                                <?php echo wp_nav_menu(array('menu'=>'footer', 'container'=>'')); ?>
                            </nav>
                        </div>

                        <?php if ( is_active_sidebar( 'second-footer' ) ) :
                            dynamic_sidebar( 'second-footer' );
                        endif;
                        
                        echo '<ul class="col-lg-6 col-md-6 col-sm-10 col-xs-10 col-nr-3 paymentMethods">';
                        echo '<h4>Formas de pagamento</h4>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-1.png"></li>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-2.png"></li>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-3.png"></li>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-4.png"></li>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-5.png"></li>';
                        echo '<li><img src="'.get_template_directory_uri().'/images/bandeira-6.png"></li>';
                        echo '</ul>';

                        echo '<ul class="col-lg-3 col-md-3 col-sm-8 col-xs-8 col-nr-3 paymentMethods">';
                        echo '<h4>Segurança</h4>';
                        echo '<li class="clearSale col-md-4"><img src="'.get_template_directory_uri().'/images/bandeira-7.png"></li>';
                        echo '<li class="col-md-4">'; ?>
                            <a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=colonialstore.com','SiteLock','width=600,height=600,left=160,top=170');" >
                                <img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/colonialstore.com" />
                            </a>
                        <?php echo '</li>';
                        echo '</ul>'; ?>
                    </div>
                </div>
            </div>
    <?php } ?>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="bottom-footer-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    if ( class_exists( 'CGToolKit' ) ) {
                        if ( $cg_footer_cards_display == 'show' ) {
                            echo '<div class="footer-credit-cards">';
                            $cg_card_array = ($cg_options['cg_show_credit_card_values']);
                            foreach ( $cg_card_array as $card => $status ) {
                                display_card( $card, $status );
                            }
                            echo '</div>';
                        }
                    }
                    echo '<div class="footer-copyright">';
                    echo '<p>Preços e condições de pagamento válidos exclusivamente para compras efetuadas no site, podendo diferir na rede de lojas físicas. </p>';
                    echo '<p>As imagens dos produtos são meramente ilustrativa, todos os preços e condições comerciais estão sujeitos a alteração sem aviso prévio. </p>';
                    echo '<p>TDF PORTAL ONLINE E COMERCIO EIRELI EPP -  CNPJ: 19.394.172/0001-15 </p>';
                    echo '<p>Endereço: Rua Soares de Barros, 34 - CEP: 04538-060 - São Paulo - Telefone: 11 2173-5600</p>';
                    echo '<p>© '.date("Y").' Copyright Colonial Racing</p>';
                    echo '</div>'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ( $cg_back_to_top == 'yes' ) { ?>
        <a href="#0" class="cd-top">Top</a>
    <?php } ?>
</footer>
</div>
</div>
<?php
global $cg_live_preview;
if ( isset( $cg_live_preview ) )
    include("live-preview.php")
    ?>
<?php wp_footer(); ?>
</body>
</html>