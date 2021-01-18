<footer id="footer" class="small-12 columns no-padding">
    <div class="global-page-container">
        <div class="small-11 small-centered large-12 columns footer-section">
            <div class="follow-us small-5 medium-3 small-offset-1 medium-offset-0 columns">
                <h4 class="footer-section-title">Siga-nos</h4>
                <a href="http://www.facebook.com" target="_blank"><img src="img/social-icons/facebook.svg" alt="facebook-icon" target="_blank"></a>
                <a href="http://www.twitter.com" target="_blank"><img src="img/social-icons/twitter.svg" alt="facebook-icon"></a>
                <a href="http://www.instagram.com" target="_blank"><img src="img/social-icons/instagram.svg" alt="facebook-icon"></a>
            </div>
            <div class="contato small-5 medium-3 small-offset-1 medium-offset-0 columns">
                <h4 class="footer-section-title">Contato</h4>
                <p>
                    São Paulo/SP<br>
                    mwrt@gmail.com
                </p>
            </div>
            <div class="horario small-5 medium-3 small-offset-1 medium-offset-0 columns">
                <h4 class="footer-section-title">Horários do Grupo</h4>

                <!-- DIAS DA SEMANA DINAMICO -->
                <?php 

                            $dia_semana = date('w'); // RETORNA Nº DO DIA DA SEMANA
                            $agora = strtotime('now'); // RETORNA A HORA EXATA NO MOMENTO
                            $inicio_dia = strtotime('today'); // RETORNA A QTD DE SEGUNDOS DO 1º MINUTO DO DIA
                            $hora_atual = $agora - $inicio_dia; // QTD DE SEGUNDOS DESDE O INICIO DO DIA

                            // RETORNA SE ESTA ENTRE SEGUNDA E SEXTA
                            if($dia_semana >= 1 && $dia_semana <= 5){

                                if($hora_atual < 70200 || $hora_atual > 79200) { // 70200 SEGUNDOS DAS 00H00 ATE 19:30 || 79200 SEGUNDOS ATE 22:00
                                    $texto_horario = 'Não atendendo no momento';
                                    $classe_horario = 'horario-fechado';
                                }   else {
                                    $texto_horario = 'Atendendo no momento';
                                    $classe_horario = 'horario-aberto';
                                }

                                // METODO PARA VERFICIAR SE E FINAL DE SEMANA
                            } elseif ($dia_semana >= 6 ) {
                                $texto_horario = 'Não atendendo no momento';
                                $classe_horario = 'horario-fechado';
                            }

                            // HORA E DIA ATUAL
                            $data_agora = date('d/m/Y');
                            $hora_agora = date('H:i');
                            switch ($dia_semana) {
                                case 1:
                                $dia = 'Segunda-feira';
                                break;
                                case 2:
                                $dia = 'Terça-feira';
                                break;
                                case 3:
                                $dia = 'Quarta-feira';
                                break;
                                case 4:
                                $dia = 'Quinta-feira';
                                break;
                                case 5:
                                $dia = 'Sexta-feira';
                                break;
                                case 6:
                                $dia = 'Sábado';
                                break;
                                case 7:
                                $dia = 'Domingo';
                                break;
                            }
                            ?>
                            <!-- FIM DIAS DA SEMANA DINAMICO-->

                            <p>Seg-Sex: 19h30 - 22h00<br>
                                <span class="<?php echo $classe_horario; ?>"><?php echo $texto_horario ?></span><br>
                                <?php echo $hora_agora .' '. $dia .', '. $data_agora ?><br>

                            </div>
                            <div class="como-chegar small-5 medium-3 small-offset-1 medium-offset-0 columns">
                                <h4 class="footer-section-title">Como chegar</h4>
                                <div id="map"></div>
                            </div>
                            <hr></hr>
                            <div class="copyright small-12 columns">
                                <!-- ANO ATUAL DINAMICO -->
                                <?php $ano_atual = date("Y"); ?>
                                <?php echo $ano_atual; ?> &copy; Todos os direitos reservados
                                <!-- FIM ANO ATUAL DINAMICO -->
                            </div>
                        </div>
                    </div>
                </footer>


                <script src="js/vendor/jquery.js"></script>
                <script src="js/vendor/slick.min.js"></script>
                <script src="js/scripts.js"></script>
                <script src="js/foundation.min.js"></script>
                <script>
                    function initMap() {
                        var local = {lat: -23.584103, lng: -46.581057};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 16,
                            center: local,
                            styles: 
                            [
                            {
                                "featureType": "administrative",
                                "elementType": "geometry",
                                "stylers": [
                                {
                                    "visibility": "off"
                                }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "stylers": [
                                {
                                    "visibility": "off"
                                }
                                ]
                            },
                            {
                                "featureType": "road",
                                "elementType": "labels.icon",
                                "stylers": [
                                {
                                    "visibility": "off"
                                }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "stylers": [
                                {
                                    "visibility": "off"
                                }
                                ]
                            }
                            ]

                        });
                        var marker = new google.maps.Marker({
                            position: local,
                            map: map
                        });
                    }
                </script>
                <script 
                async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlo2Bml6zmqP1_xtT3aLybZdWZNP7l8CM&callback=initMap">
            </script>
            <script>
                $(document).foundation();
            </script>
        </body>

        </html>