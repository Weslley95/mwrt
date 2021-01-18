    <?php include 'header.php'; ?>
    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
    <div class="jogo-list small-11 large-12 columns no-padding small-centered">

        <div class="global-page-container">
            <div class="jogo-title small-12 columns no-padding">
                <h3>Conteúdos do Jogo</h3>
                <hr></hr>

            </div>
            <!-- CONEXAO BOM BANCO DE DADOS -> TABELA JOGO -->
            <?php 

            $server = 'localhost';
            $user = 'weslle68_admin';
            $password = 'f4011603a00';
            $db_name = 'weslle68_jogoGodot';
            $port = '3306';

            $db_connect = new mysqli($server,$user,$password,$db_name,$port);
            mysqli_set_charset($db_connect,"utf8");

            if ($db_connect->connect_error) {
                echo 'Falha: ' . $db_connect->connect_error;
            } else {
                            // echo 'Conexão feita com sucesso' . '<br><br>';
                            $sql = "SELECT DISTINCT categoria from jogo"; // IMAGEM SERA MOSTRADA OU NAO
                            $result = $db_connect-> query($sql);

                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){

                                    $categoria = $row['categoria']; ?>
                                    
                                    <div class="category-slider small-12 columns no-padding">
                                        <h4><?php echo $categoria; ?></h4>

                                        <div class="slider-jogo">
                                            <div class="slider-002 small-12 small-centered columns">

                                                <?php 

                                                    $sql2 = "SELECT * from jogo WHERE categoria = '$categoria'"; // IMAGEM SERA MOSTRADA OU NAO
                                                    $result2 = $db_connect-> query($sql2);

                                                    if ($result2->num_rows > 0){
                                                        while ($row2 = $result2->fetch_assoc()){ ?>

                                                            <div class="jogo-item-outer bounce-hover small-10 medium-4 columns"> 

                                                                <div class="jogo-item">
                                                                    <a href="descricao.php?descricao=<?php echo $row2['codigo']; ?>">
                                                                        <div class="item-image">
                                                                            <img src="img/jogo/<?php echo $row2['codigo']; ?>.jpg" alt="cogumelos"/>   
                                                                        </div>

                                                                        <div class="item-info">
                                                                            <div class="title"><?php echo $row2['nome']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="gradient-filter">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php }
                                                }

                                                ?>


                                            </div>
                                        </div>
                                    </div>

                                <?php }

                            } else {
                                echo 'Não há objetos a ser apresentado';
                            }

                        }
                        ?>
                        <!-- FIM CONEXAO BOM BANCO DE DADOS -> TABELA JOGO -->

                    </div>
                </div>

                <?php include 'footer.php'; ?>