<!DOCTYPE html>
<html style="background-image: url(<?=images('textura_uptx.png')?>);">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Progrmacion Operativa Anual">
    <meta name="author" content="Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala">
    <!-- ========== Icon  ========== -->
    <?=$this->load->view('includes/base_favicon','',TRUE)?>
    <!-- ========== /Icon  ========== -->
    <title>Sistema de Tutorias</title>
    <!-- ========== Base CSS ========== -->
    <?=$this->load->view('includes/base_css','',TRUE)?>
    <!-- ========== /Base CSS ========== -->
</head>
<body style="background-color:transparent !important">
    <div class="wrapper">
        <div class="container-alt container-heead">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="wrapper-page signup-signin-page">
                        <div class="card-box">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="p-20">
                                            <img src="<?=images('logo_tutorias.png')?>" class="img-responsive" style="margin:0 auto">
                                            <hr><br><br><br>
                                            <div class="alert alert-danger">
                                                <strong>ERROR AL CONECTAR AL SII!</strong>
                                                <p>ESTE MODULO DEL SISTEMA REQUIERE UNA CONEXIÓN CON LA BASE DE DATOS DEL SII, POR FAVOR INTENTELO MAS TARDE O CONSULTE AL ADMINISTRADOR DEL SISTEMA.</p>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-20">
                                        <img src="<?=images('back_01.png')?>" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <center>
                    <img src="<?=images('logo_uptx_white.png')?>" alt="" style="margin:0 auto; max-width: 200px;opacity: .8">
                </center>
            </div>
        </div>
    </div>
</div>
<!-- ========== Modal Contra  ========== -->
<?=$this->load->view('includes/recuperarcontra','',TRUE)?>
<!-- ========== /Modal Contra  ========== -->
<script>
    var resizefunc = [];
</script>
<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->
</body>
</html>