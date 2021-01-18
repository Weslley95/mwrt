    <?php include 'header.php'; ?>
    
    <div class="product-page small-11 large-12 columns no-padding small-centered">

        <div class="global-page-container">

            <!-- CONEXAO BOM BANCO DE DADOS -> TABELA JOGO -->
            <?php 

            $cod_jogo = $_GET['descricao'];
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
                            $sql = "SELECT * from jogo WHERE codigo = '$cod_jogo'"; // IMAGEM SERA MOSTRADA OU NAO
                            $result = $db_connect-> query($sql);

                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){

                                    $jogo_nome = $row['nome'];
                                    $jogo_categoria = $row['categoria'];
                                    $jogo_desc = $row['descricao'];
                                 }

                            } 
                        }

                        ?>
                        <!-- FIM CONEXAO BOM BANCO DE DADOS -> TABELA JOGO -->
                        <?php if ($jogo_nome != NULL){ ?>

                        
                        <div class="product-section">
                            <div class="product-info small-12 large-5 columns no-padding">
                                <h3><?php echo $jogo_nome; ?></h3>
                                <!--<h4><?php echo $jogo_categoria; ?></h4>-->
                                <p><?php echo $jogo_desc; ?></p>
                            </div>

                            <div class="product-picture small-12 large-7 columns no-padding">
                                <img src="img/jogo/<?php echo $cod_jogo; ?>.jpg" alt="<?php echo $jogo_nome; ?>">
                            </div>

                        </div>

                        <?php } else {
                            echo 'Imagens do jogo não encontrado' . '<br>';
                        } ?>

                        <div class="go-back small-12 columns no-padding">

                            <a href="conteudo.php"><b>< Voltar ao conteúdo</b></a><br>
                            <a href="index.php"><b>< Voltar a página inicial</a></b>
                        </div>

                    </div>
                </div>



                <?php include 'footer.php'; ?>