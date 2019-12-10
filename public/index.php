<?php

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
/*

*/


require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$kernel->terminate($request, $response);


?>

<!--
<link href="css/custom.min.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">
<link href="https://framework-gb.cdn.gob.mx/qa/assets/styles/main.css" rel="stylesheet">
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
-->
<link href="/css/main.css" rel="stylesheet">
<script src="/js/gobmx.js"></script>
<!--
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/procesadorInicio.js"></script>
<script src="js/dataTables.responsive.min.js"></script>-->

<style>
    body{
        background: #009688;
    }

    .table>thead>tr>th {
        vertical-align: bottom !important;
        border-bottom: 0.5px solid #9b2448 !important;
        color: #972347 !important;
        font-weight: 100 !important;
    }

    h4{
        font-weight: 100;
        color: #9b2448;
        font-size: larger;
    }

    input{
        border-radius: 0px;
        border: 0.5px #DDD solid;
        box-shadow: none;
    }


    .form-control{
        margin-bottom: 10px !important;
        border-radius: 0;
        moz-border-radius: 0;
    }

    label{
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
        font-weight: normal;
        font-size: smaller;
    }

    .btn-cancelar{
        border: 2px solid #666;
        box-shadow: 0 0 0 0 #9D2449;
        background: #666;
        color: #FFF;
        border-radius: 0;
        moz-border-radius: 0;
    }

    .btn-primary{
        border-radius: 0;
        moz-border-radius: 0;
    }
</style>
<body>


<?php


//echo $_SESSION["aspirante"]->getNombre();
//$session = $request->getSession('aspirante')->getNombre();
$session = new Session();
$session->start();
//echo $session->get('aspirante')->getNombre();
?>

<!-- menu -->
<div style="margin-left:0;margin-right:0;border-radius:0;margin-top:0px;height:60px;box-shadow: inset 0px 4px 8px -3px rgba(17, 17, 17, .06);">
    <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top" style="font-family: sans-serif;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#subenlaces">
                    <span class="sr-only">Interruptor de Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Semarnat</a>
            </div>
            <div class="collapse navbar-collapse" id="subenlaces">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!$session->get('aspirante') && !$session->get('usuarioInstitucion')){ ?>
                        <li><a href="/aspirante/new">Registro de Aspirante</a></li>
                    <?php } ?>
                    <?php if($session->get('usuarioInstitucion')){ ?>
                        <li><a href="/oferta/practica/profesional/">Ofertas Estancias </a></li>
                    <?php } ?>
                    <?php if(!$session->get('usuarioInstitucion') && !$session->get('aspirante')){ ?>
                        <li><a href="/institucion_login">Intitución</a></li>
                    <?php } ?>

                    <?php if($session->get('aspirante') != null || $session->get('usuarioInstitucion') != null){ ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <?php if($session->get('aspirante')){ ?>
                                    <?php echo @$session->get('aspirante')->getNombre() ." ". $session->get('aspirante')->getApellidoPaterno()?>
                                <?php }else{ ?>
                                    <?php echo @$session->get('usuarioInstitucion')->getNombre() ." ". $session->get('usuarioInstitucion')->getApellido()?>
                                <?php } ?>

                                <img src="/image/picture.jpg"
                                     alt="" height="30px">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Perfil</a></li>
                                <li><a href="/logout">
                                        <i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php }?>
                </ul>

            </div>
        </div>
    </nav>



</div>

<!-- fin menu -->

<div style="margin-left:5%;margin-right:5%;background: #FFF;">
    <hr style=" margin-top: 6px;
						margin-bottom: 6px;
						border: 0;
						border-top: 1px solid #fff;"/>
    <div class="x_panel" style="table-layout: fixed !important;display: table !important;padding-top: 12px !important">
        <!--<div class="x_title" style="margin-top: 10px !important;margin-left: 10px !important">
            <h2> Panel principal<small> Detalles</small></h2>

            <div class="clearfix"></div>
        </div>-->

        <div style="width: 1000px;
                    margin: 0 auto !important;
                    left: 20% !important;
                    margin-left: 10% !important;
                ">
            <?php //include("vista/admin_alumno.php");
            $response->send();
            ?>

        </div>
        <br />
        <br />
        <br />
        <br />
    </div>
</div>
</body>
