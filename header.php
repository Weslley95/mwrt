<!doctype html>

<html class="no-js" lang="pt">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>MWRT</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/godot.ico">
    <link rel="stylesheet" href="css/foundation.css"/>
    <link rel="stylesheet" href="css/slick.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/vendor/modernizr.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- VLIBRAS -->
    <div vw class="enabled">
        <div vw-access-button class="active btn-info"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper btn-light"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <!-- FIM VLIBRAS -->
    <!-- WHATSAPP-->
    <style>
        .whatsapp {
            position: fixed;
            top: 92%;
            left: 0%;
            padding: 0px;
            z-index: 10000000;
            width: 50px;
        }
    </style>
    <div>
        <a href="https://chat.whatsapp.com/LhBbx3V8hSU25ZZkfypC2B" target="_blank">
            <img class="whatsapp" src="https://images.tcdn.com.br/static_inst/integracao/imagens/whatsapp.png" />
        </a>
    </div>
    <!-- WHATSAPP-->
    <!-- BARRA FIXA PARA 100% DO SITE-->
    <header>	
     <div class="main-header large-12 columns no-padding" style="height: 44px">
        <div class="global-page-container">
           <div class="logo small-6 small-offset-3 large-3 large-offset-0 columns no-padding">
              <a href="index.php" title="home">
                 <div class="table">
                    <div class="table-cell">
                       <h1>MWRT</h1>
                   </div>
               </div>
           </a>
       </div>
       <div class="main-menu show-for-large-up large-9 columns text-right">		
          <div class="table">
             <div class="table-cell">
                <ul class="menu-items">
                    <!--OPCOES MENU FIXO--> 
                    <?php include 'navigation-list.php';?>
                    <!--FIM OPCOES MENU FIXO-->
                </ul>
            </div>
        </div>
    </div>
    <div class="hamburguer-icon small-2 columns text-right">
        <div class="table">
            <div class="table-cell">
                <img src="img/menu/hamburguer.svg">
            </div> 
        </div>
    </div>
    <div class="right-space small-1 columns"></div>
</div>
</div>							
<div class="sliding-header-menu-outer">						
    <div class="sliding-header-menu">

        <div class="sliding-header-menu-close-button small-12 columns">
            <div class="table">
                <div class="table-cell">
                    <img class="close-icon" src="img/menu/close.svg">
                </div>	
            </div>	
        </div>
        <div class="sliding-header-menu-main-menu small-12 columns">

            <div class="table">
                <div class="table-cell">
                    <ul class="sliding-header-menu-li">
                        <!--OPCOES MENU FIXO--> 
                        <?php include 'navigation-list.php';?>
                        <!--FIM OPCOES MENU FIXO-->
                    </ul>
                </div>
            </div>

        </div>                           
    </div>
</div>
</header>
        <!-- FIM BARRA FIXA PARA 100% DO SITE-->