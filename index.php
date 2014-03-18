<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mnemópolis: memória, política e cidade nas imagens sobreviventes</title>
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./startup/flat-ui/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./startup/flat-ui/css/flat-ui.css">
    <link rel="stylesheet" href="./startup/common-files/css/icon-font.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/jquery.growl.css">
    <link rel="stylesheet" href="./dropzone/css/basic.css">
    <link rel="stylesheet" href="./dropzone/css/dropzone.css">
    <?php 
        $analytics_id = "UA-44330723-1";
    ?>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $analytics_id; ?>']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>
<div id="seo" style="display:none;">
    <h1>Chamada de Imagens Políticas Sobreviventes – CHIPS</h1>
    <img src="./img/chips-chamada.jpg"/>
    <p>Enquanto os algoritmos do Big Data criam bancos de imagens automatizados e massivos, CHIPS quer ativar outras formas de lembrar: uma memória fragmentária, afetiva, involuntária, cheia de lapsos e de imagens que sobrevivem segundo caminhos pouco sondáveis.</p>
    <p>Este murmúrio anônimo de nossas lembranças será continuamente compartilhado na web, construindo uma constelação de imagens ou um atlas formado pelos continentes móveis de nossas reminiscências em torno dos protestos políticos no Brasil.</p>
    <h4>Quais imagens dos protestos sobrevivem em sua memória?</h4>
    <p>Envie pelo menos três imagens que sobrevêm, de imediato, em sua lembrança.</p>
    <p>No mês de junho de 2014, mês de aniversário dos <strong>#protestosBR</strong>, disponibilizaremos na rede o atlas com as imagens enviadas por todos.</p>
    <h2>Mnemópolis: memória, política e cidade nas imagens sobreviventes</h2>
</div>
	<div class="page-wrapper">
		<header class="header-10">
            <div class="container">
                <div class="navbar col-sm-12" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle"></button>
                        <a class="brand" href="/">Mnemópolis</a>
                     </div>
                    <div class="collapse navbar-collapse pull-right">
                        <ul class="nav pull-left">
                            <li><a href="#/chips">CHIPS</a></li>
                            <li><a href="#/participar">Participar</a></li>
                        </ul>
                        <form class="navbar-form pull-left">
                            <a class="btn btn-info" href="http://medialabufrj.net">Ir para Medialab.UFRJ</a>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <section class="content-23 v-center bg-midnight-blue custom-bg parallax">
            <div>
                <div class="container">
                    <div class="hero-unit hero-unit-bordered">
                    <h1>quais imagens sobrevivem?</h1>
                    </div>
                </div>
            </div>
            <a class="control-btn fui-arrow-down" href="#"> </a>
        </section>

        <section id="chips" class="content-8 v-center">
            <div>
                <div class="container">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">

                            <h2>CHIPS</h2>

                            <h4>Chamada de Imagens Políticas Sobreviventes</h4>

                            <br/>

                            <p>Enquanto os algoritmos do Big Data criam bancos de imagens automatizados e massivos, CHIPS quer ativar outras formas de lembrar: uma memória fragmentária, afetiva, involuntária, cheia de lapsos e de imagens que sobrevivem segundo caminhos pouco sondáveis.</p>
                            <p>Este murmúrio anônimo de nossas lembranças será continuamente compartilhado na web, construindo uma constelação de imagens ou um atlas formado pelos continentes móveis de nossas reminiscências em torno dos protestos políticos no Brasil.</p>

                            <br/>
                            
                            <div id="participar">
                                
  
                                    <h4>Quais imagens dos protestos sobrevivem em sua memória?</h4>
                                    
                                    <br/>

                                    <p>Envie pelo menos três imagens que sobrevêm, de imediato, em sua lembrança.</p>

                                    <hr/>

                                    <form id="my-awesome-dropzone" action="./upload.php" class="dropzone"></form>

                                    <hr/>

                                    <p>No mês de junho de 2014, mês de aniversário dos <strong>#protestosBR</strong>, disponibilizaremos na rede o atlas com as imagens enviadas por todos.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer-3">
            <div class="container">
                <div class="row v-center">
                    <div class="col-sm-2">
                        <a class="brand" href="#">Mnemópolis:</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="additional-links">
                            memória, política e cidade nas imagens sobreviventes
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!--<h6>Medialab.UFRJ</h6>
                        <div class="address">
                            www.medialabufrj.net
                        </div>-->
                    </div>
                </div>
            </div>
        </footer>
        
    </div>

	<script src="./startup/common-files/js/jquery-1.10.2.min.js"></script>
    <script src="./startup/flat-ui/js/bootstrap.min.js"></script>
    <script src="./startup/common-files/js/modernizr.custom.js"></script>
    <script src="./startup/common-files/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="./startup/common-files/js/jquery.parallax.min.js"></script>
    <script src="./startup/common-files/js/startup-kit.js"></script>
    <script src="./js/director.min.js"></script>
    <script src="./js/jquery.growl.js"></script>
    <script src="./js/jquery.backgroundvideo.min.js"></script>
    <script src="./dropzone/dropzone.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>