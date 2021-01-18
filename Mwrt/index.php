<!-- BARRA MENU SUPERIOR -->
<?php include 'header.php';?>
<?php include 'download.php';?>
<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!-- FIM BARRA MENU SUPERIOR -->

<!-- IMG E TITULO ICIAL DO TITULO -->
<div class="welcome-gallery small-12 columns">
    <div class="photo-section small-12 columns">
        <img class="homepage-main-photo" src="img/godot_engine.png" alt="slider imagem 1">
    </div>

    <div class="main-section-title small-10 columns">
        <div class="table">
            <div class="table-cell">
                <h1>Bem vindo ao site oficial</h1>
                <h2>Grupo MWRT</h2>
            </div>
        </div>
    </div>
    <!-- FIM IMG E TITULO INICIAL DO TITULO -->

    <!-- SOMBREAMENTO SOBRE A IMAGEM INICIAL -->
    <div class="photo-gradient">
    </div>
    <!-- FIM SOMBREAMENTO SOBRE A IMAGEM INICIAL -->
</div>

<div class="about-us small-11 large-12 columns no-padding small-centered">

    <div class="global-page-container">
        <div id="historia" class="about-us-title small-12 columns no-padding">
            <h3>Jogo</h3>
            <hr>
        </div>

        <img src="img/godot.jpg">

        <div class="about-us-text" align="justify" style="text-align: justify; margin-right: 25%;">
            <p>
            Com objetivo no desenvolvimento de um jogo em 2D com sua versão 1.0, utilizando a plataforma Godot para o desenvolvimento de recursos do jogo, destinado para plataforma desktop.</p>
            </p>
            <p>
                Skito é um jovem que sonhava em ser torna um guerreiro, pois seus pais eram grandes guerreiros na cidade, como grandes guerreiros sempre protegiam a vila, mas um certo dia apareceu um inimigo muito forte e sequestrou os pais de Skito. Em busca de achar os seus pais, Skito vai passar por muitos perigos e monstros, e acabar se tornando um guerreiro.
            </p>
        </div>
    </div>
</div>


<section class="text-center">

    <a href="download.php?arquivo=download/projectUni9.rar">
        <button type="button" class="btn btn-danger">Download do Jogo</button><br><br>
    </a>
    <a href="download.php?arquivo=download/doc.pdf">
        <button type="button" class="btn btn-danger">Download Documentação</button>
    </a>

    </section>

<div id="destaques" class="jogo small-12 large-12 columns no-padding">

    <div class="global-page-container">
        <div class="jogo-title small-12 columns no-padding">
            <br>
            <h3>Destaques do Jogo</h3>
            <hr></hr>
        </div>

        <div class="global-page-container">


            <div class="slider-jogo">
                <div class="slider-002 small-12 small-centered columns">

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
                            $sql = "SELECT * from jogo WHERE destaque = 1"; // IMAGEM SERA MOSTRADA OU NAO
                            $result = $db_connect-> query($sql);

                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){ ?>

                                    <!-- IMAGENS EM DESTAQUES -->

                                    <div class="jogo-item-outer bounce-hover small-10 medium-4 columns"> 
                                        <div class="jogo-item">
                                            <a href="descricao.php?descricao=<?php echo $row['codigo']; ?>">
                                                <div class="jogo-item-image">
                                                    <img src="img/jogo/<?php echo $row['codigo']; ?>.jpg" alt='<?php echo $row['nome'];?>'/>   
                                                </div>
                                                <div class="item-info">
                                                    <div class="title"><?php echo $row['nome']; ?></div>
                                                </div>
                                                <div class="gradient-filter">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- FIM IMAGENS EM DESTAQUES -->

                                <?php } 

                            } else {
                                'Não há destaques';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="contact-us small-11 large-12 columns no-padding small-centered">

            <div id="formulario" class="global-page-container">
                <div class="contact-us-title small-12 columns no-padding">
                    <br><br>
                    <h3>Dúvidas e Opiniões</h3>
                    <hr></hr>
                </div>

                <div class="reservation-form small-12 columns no-padding">
                    <form action="index.php#contact-us" method="post">
                        <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding small-centered">
                            <input type="text" name="nome" class="field" placeholder="Nome completo" required/>
                            <input type="email" name="email" class="field" placeholder="E-mail" required/>
                            <textarea type="text" name="mensagem" class="field" placeholder="Mensagem" required></textarea>
                        </div>

                        <!--<input type="button" name="submit" value="Enviar" class="btn btn-primary" style="margin-top: 5%; width: 35%;" />-->
                    </form>
                    <br><br>
                </div>

                <?php 

                // Inserir Arquivos do PHPMailer
                require 'phpmailer/Exception.php';
                require 'phpmailer/PHPMailer.php';
                require 'phpmailer/SMTP.php';

                // Usar as classes sem o namespace
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                function clean_input($input){
                    $input = trim($input);
                    $input = stripcslashes($input);
                    $input = htmlspecialchars($input);
                    return $input;
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $mensagem = $_POST['mensagem'];

                    // Limpar variaveis apos envio
                    $nome = clean_input($nome);
                    $email = clean_input($email);
                    $mensagem = clean_input($mensagem);

                    $texto_msg = 'E-mail enviado do sistema Wert M4' . '<br><br>' . 
                    'Nome: ' . $nome . '<br>' . 
                    'E-mail: ' . $email . '<br>' . 
                    'Mensagem: ' . $mensagem . '<br>'; 

                    // Criação do Objeto da Classe PHPMailer
                    $mail = new PHPMailer(true); 
                    $mail->CharSet = "UTF-8";

                    try {

                        // detalhes do envio
                        // $mail->SMTPDebug = 2;                                

                        // Usar SMTP para o envio
                        $mail->isSMTP();                                      

                        // Detalhes do servidor (Google)
                        $mail->Host = 'smtp.gmail.com';

                        // Permitir autenticação SMTP
                        $mail->SMTPAuth = true;                               

                        // Nome do usuário
                        $mail->Username = 'wertm4@gmail.com';        

                        // Senha do E-mail         
                        $mail->Password = 'wertm4.admin';                           

                        // Tipo de protocolo de segurança
                        $mail->SMTPSecure = 'tls';   

                        // Porta de conexão com o servidor                        
                        $mail->Port = 587;

                        // Autenticação com o Google
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

                        // Remetente
                        $mail->setFrom($email, $nome);

                        // Destinatário
                        $mail->addAddress('wertm4@gmail.com', 'Wert M4');
                        $mail->addAddress('email@email.com', 'user');

                        // Define conteúdo como HTML
                        $mail->isHTML(true);                                  

                        // Assunto
                        $mail->Subject = 'Dúvidas e Sugestões WertM4';
                        $mail->Body    = $texto_msg;
                        $mail->AltBody = $texto_msg;

                        // Enviar E-mail
                        $mail->send();
                        $confirmacao = 'Mensagem enviada com sucesso';
                    } catch (Exception $e) {
                        $confirmacao = 'A mensagem não foi enviada, entre em contado com o administrador do site';
                    }
                }

                ?>

                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){  ?>
                    <button type="button" class="btn btn-success"><?php echo $confirmacao; ?></button>
                <?php } ?>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        
