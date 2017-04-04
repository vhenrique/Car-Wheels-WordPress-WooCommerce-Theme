<?php
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
                            <div class="col-lg-8">
                                <div class="filial on" id="matriz">
                                    <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1828.2016736324404!2d-46.68026134871528!3d-23.589863224900547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce575b2886482f%3A0xc812a8892a8d473b!2sColonial+Racing!5e0!3m2!1spt-BR!2sbr!4v1452601501754" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                </div>
                                <div class="filial" id="ItaimBibi">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1451.0431612065788!2d-46.67976118606823!3d-23.58999513113483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce575ae10a954b%3A0x231524234ea1cbd8!2sAv.+Pres.+Juscelino+Kubitschek%2C+1001+-+Vila+Nova+Concei%C3%A7%C3%A3o%2C+S%C3%A3o+Paulo+-+SP%2C+04543-011!5e0!3m2!1spt-BR!2sbr!4v1462904003150" width="100%" height="450" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="filial" id="Moema">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.9963996452675!2d-46.660582585164875!3d-23.60446206907019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a108180e60b%3A0x567bd96ceb01c2c2!2sAlameda+dos+Maracatins%2C+333+-+Indian%C3%B3polis%2C+S%C3%A3o+Paulo+-+SP%2C+04089-010!5e0!3m2!1spt-BR!2sbr!4v1462904112882" width="100%" height="450" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-4 accordion">
                                <div class="list-item on">
                                    <h4><a href="#" class="matriz">Matriz</a></h4>
                                    Av. Juscelino Kubitschek, 1090, Itaim Bibi
                                    São Paulo - SP Tel: (11) 2173 5600
                                </div>
                                <div class="list-item">
                                    <h4><a href="#" class="itaimBibi">Filial Itaim Bibi</a></h4>
                                    Av. Juscelino Kubitschek, 1001,
                                    Itaim Bibi - São Paulo - SP
                                    Tel: (11) 2173 5600
                                </div>
                                <div class="list-item">
                                    <h4><a href="#" class="moema">Filial Moema</a></h4>
                                    Al. Maracatins, 333
                                    Moema - São Paulo - SP
                                    Tel: (11) 5052 8745
                                </div>
                            </div>
                        </div>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->
<script type="text/javascript">
    $ = jQuery.noConflict();
    $('.matriz').click(function(e){
        e.preventDefault();
        $('div.row div.filial').removeClass('on');
        $('.accordion .list-item').removeClass('on');
        $(this).parents('.list-item').addClass('on');
        $('#matriz').addClass('on');
    });

    $('.itaimBibi').click(function(e){
        e.preventDefault();
        $('div.row div.filial').removeClass('on');
        $('.accordion .list-item').removeClass('on');
        $(this).parents('.list-item').addClass('on');
        $('#ItaimBibi').addClass('on');
    });

    $('.moema').click(function(e){
        e.preventDefault();
        $('div.row div.filial').removeClass('on');
        $('.accordion .list-item').removeClass('on');
        $(this).parents('.list-item').addClass('on');
        $('#Moema').addClass('on');
    });
</script>
<?php get_footer(); ?>