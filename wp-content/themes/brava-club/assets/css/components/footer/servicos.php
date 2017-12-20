<?php 
    $servico = new WP_Query( array( 'post_type' => 'servico', 'order' => 'DESC'));
?>
<?php if($servico->have_posts()=="1") : ?>
<div id="servicos" class="servicos">
    <div class="container">
        <div class="grid">
            <?php while ( $servico->have_posts() ) : $servico->the_post(); ?>
            <div>
                <h3><?php echo get_the_title(); ?></h3>
                <p>
                    <?php 
                        $feature_de_serviço = get_field('feature_de_serviço');
                        foreach( $feature_de_serviço as $i => $row ) :
                            echo $row[feature]."<br>";
                        endforeach;
                    ?>
                </p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div> 
<?php endif; ?>