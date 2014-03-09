<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mnemopolis: memória, política e cidade nas imagens sobreviventes</title>
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo WP_THEME_URL; ?>/startup/flat-ui/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo WP_THEME_URL; ?>/startup/flat-ui/css/flat-ui.css">
    <link rel="stylesheet" href="<?php echo WP_THEME_URL; ?>/startup/common-files/css/icon-font.css">
    <link rel="stylesheet" href="<?php echo WP_THEME_URL; ?>/css/style.css">
	<?php wp_head(); ?>
</head>
<body>
	<div class="page-wrapper">
		<header class="header-10">
            <div class="container">
                <div class="navbar col-sm-12" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle"></button>
                        <a class="brand" href="/">Mnemopolis</a>
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
                    <h1>que imagem sobrevive?</h1>
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

                            <p>Se os algoritmos do Big Data criam bancos de imagens automatizados e massivos, CHIPS quer ativar outras formas de lembrar: uma memória fragmentária, afetiva, involuntária, cheia de lapsos e de imagens que sobrevivem segundo caminhos pouco sondáveis.</p>
                            <p>O fluxo de nossas lembranças será continuamente compartilhado na web, construindo uma uma constelação de imagens ou um atlas de inspiração warburgiana, formado pelos continentes móveis de nossas reminiscências em torno dos protestos iniciados desde junho de 2013 no Brasil.</p>

                            <br/>
                            
                            <div id="participar">
                                
                                
                                <?php if(is_user_logged_in()){ ?>

                                <?php
                                    global $current_user;
                                    get_currentuserinfo();
                                ?>
                                    <h4><span class="upper"><?php echo $current_user->display_name; ?></span>, que imagens dos protestos sobrevivem em sua memória?</h4>
                                    
                                    <br/>
                                    
                                    <p>Envie até três imagens que sobrevêm, sem muita seleção nem razão, em sua lembrança.</p>

                                    <div class="uploader">
                                        <p><input type="button" class="btn btn-primary" name="upload_btn" id="upload_btn" value="Enviar imagens" /></p>
                                        <!--<input type="text" name="settings[_unique_name]" id="_unique_name" />-->
                                    </div>

                                    <div id="uploader">
                                        
                                    </div>

                                <?php } else { ?>

                                    <h4>Que imagens dos protestos sobrevivem em sua memória?</h4>
                                    
                                    <br/>

                                    <p>Conecte-se pelos botões abaixo e envie até três imagens que sobrevêm, sem muita seleção nem razão, em sua lembrança.</p>

                                    <hr/>

                                    <?php do_action( 'social_connect_form' ); ?>    

                                <?php } ?>

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
                        <a class="brand" href="#">Mnemopolis:</a>
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

	<script src="<?php echo WP_THEME_URL; ?>/startup/common-files/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/startup/flat-ui/js/bootstrap.min.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/startup/common-files/js/modernizr.custom.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/startup/common-files/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/startup/common-files/js/jquery.parallax.min.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/startup/common-files/js/startup-kit.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/js/director.min.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/js/jquery.backgroundvideo.min.js"></script>
    <!--<script src="<?php echo WP_THEME_URL; ?>/js/jquery-fileupload.js"></script>-->
    <!--<script src="<?php echo WP_THEME_URL; ?>/js/JSXTransformer.js"></script>
    <script src="<?php echo WP_THEME_URL; ?>/js/react-with-addons.min.js"></script>-->
    <script src="<?php echo WP_THEME_URL; ?>/js/script.js"></script>
    <!--<script src="<?php echo WP_THEME_URL; ?>/js/uploader.js" type="text/jsx"></script>-->
	<?php wp_footer(); ?>
</body>
</html>