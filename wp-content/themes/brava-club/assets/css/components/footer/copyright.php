            <?php 
                $logo = get_field('logo', 'option'); 
                if( $logo ) : 
            ?>
            <div class="copyright">
                <div class="container">
                    <ul>
                        <?php foreach( $logo as $row ) : ?>
                        <li>
                            <?php 
                                if($row[url_do_logo]) : 
                                    echo "<a href='".$row[url_do_logo]."'>";
                                endif;
                                echo '<img src="'.$row[imagem_do_logo].'" />'; 
                                if($row[url_do_logo]) : 
                                    echo "</a>";
                                endif;
                            ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>