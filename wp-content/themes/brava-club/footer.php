</main>
        </div>
        <!-- Footer -->
        <footer>
            <?php if(is_front_page()) : get_template_part('assets/css/components/footer/servicos'); endif; ?>
            <div class="copyright">
                <div class="container">
                    <ul>
                        <li><img src="assets/imgs/trip2.png.0x60.png" alt=""></li>
                        <li><img src="assets/imgs/trip1.png.0x60.png" alt=""></li>
                        <li><img src="assets/imgs/booking-1.png.0x60.png" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="footer">
                <div class="container">
                    <p>produzido por chá de bambu</p>
                    <!-- Template Part Social -->
                    <ul class="social">
                        <li>
                            <a href="" title="Facebook" class="fa fa-facebook"></a>
                        </li>
                        <li>
                            <a href="" title="Instagram" class="fa fa-instagram"></a>
                        </li>                        
                        <li>
                            <a href="" title="Twitter" class="fa fa-twitter"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- <script src="node_modules/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="assets/css/components/pace/pace.min.js" type="text/javascript"></script>
        <script src="assets/css/components/transformicons/transformicons.min.js" type="text/javascript"></script>
        <script src="assets/css/components/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
        <script src="node_modules/latinize/latinize.js" type="text/javascript"></script>
        <script src="assets/js/functions.min.js" type="text/javascript"></script>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script> -->
        <!-- <script type='text/javascript'>
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
        <script>
            transformicons.add('.tcon')
        </script> -->
        <?php wp_footer(); ?> 
    </body>
</html>