</main>
        </div>
        <!-- Footer -->
        <footer>
            <?php if(is_front_page()) : get_template_part('assets/css/components/footer/servicos'); endif; ?>
            <?php get_template_part('assets/css/components/footer/copyright'); ?>
            <div class="footer">
                <div class="container">
                    <p>produzido por chá de bambu</p>
                    <!-- Template Part Social -->
                    <?php get_template_part('assets/css/components/social/social'); ?>
                </div>
            </div>
        </footer>
        <?php if(get_theme_mod('gmaps')) : ?>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
        <script type='text/javascript'>
        function init_map(){
            var myOptions = {zoom:15,disableDefaultUI: true,center:new google.maps.LatLng(-22.7615203,-41.9358735), mapTypeId: google.maps.MapTypeId.ROADMAP};
            
            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
            marker = new google.maps.Marker({
                map: map,position: new google.maps.LatLng(-22.7615203,-41.9358735)
            });
            infowindow = new google.maps.InfoWindow({
                content:'Pousada BravaClub'
            });
            google.maps.event.addListener(marker, 'click', function(){
                infowindow.open(map,marker);
            });
            infowindow.open(map,marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
        </script>
        <?php endif; ?>
        <?php wp_footer(); ?> 
        <div class="modal">
            <div class="modal-body">
                <a href="javascript:void(0)" onclick="closeModal(this)" class="fa fa-close close"></a>
                <div class="modal-content">
                
                </div>
            </div>
        </div>
    </body>
</html>