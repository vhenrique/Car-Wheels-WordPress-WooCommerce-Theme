<?php

/**

 * Template Name: Página de Contato

 * @package commercegurus

 */

global $cg_options;

get_header();
cg_get_page_title(); ?>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="primary" class="content-area content-page-default">
                    <main id="main" class="site-main" role="main">
                        <?php while ( have_posts() ) : the_post();
                            get_template_part( 'content', 'page' );
                        endwhile; ?>
                        <h3>Onde estamos...</h3>
                        <div class="row">
                            <div class="col-lg-8" id="matriz">
                                <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1828.2016736324404!2d-46.68026134871528!3d-23.589863224900547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce575b2886482f%3A0xc812a8892a8d473b!2sColonial+Racing!5e0!3m2!1spt-BR!2sbr!4v1452601501754" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <div class="col-lg-4">
                                <h4><a href="#matriz">Matriz</a></h4>
                                Av. Juscelino Kubitschek, 1090, Itaim Bibi
                                São Paulo - SP Tel: (11) 2173 5600
                                <h4>Filial</h4>
                                Av. Juscelino Kubitschek, 1001,
                                Itaim Bibi - São Paulo - SP

                                Tel: (11) 2173 5600
                                <h4>Filial</h4>
                                Al. Maracatins, 333
                                Moema - São Paulo - SP
                                Tel: (11) 5052 8745
                            </div>
                        </div>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->
<?php get_footer(); ?>