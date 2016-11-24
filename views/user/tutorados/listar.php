<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Progrmacion Operativa Anual">
    <meta name="author" content="Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala">
    <!-- ========== Icon  ========== -->
    <?=$this->load->view('includes/base_favicon','',TRUE)?>
    <!-- ========== /Icon  ========== -->
    <title><?=title()?></title>
    <!-- ========== Base CSS ========== -->
    <?=$this->load->view('includes/base_css','',TRUE)?>
    <!-- ========== /Base CSS ========== -->
</head>
<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
      <!-- ========== Menu Top  ========== -->
      <?=$this->load->view('includes/menutop','',TRUE)?>
      <!-- ========== End Menu Top  ========== -->

      <!-- ========== Menu Top  ========== -->
      <?=$this->load->view('includes/menuleft','',TRUE)?>
      <!-- ========== End Menu Top  ========== -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- ========== Alertas ========== -->
            <?=$this->alerts->get()?>
            <!-- ========== /Alertas ========== -->
            <div class="container">
                <!-- ========== Menu de navegacion  ========== -->
                <?=navegacion()?>
                <!-- ========== End Menu de navegacion  ========== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-card">
                                        <a class="pull-left" href="#">
                                            <img class="img-circle" src="<?=base_url('docente/imagen')?>" alt="">
                                        </a>
                                        <div class="member-info">
                                            <h4 class="m-t-0 m-b-5 header-title"><b><code><span class="text-danger"> #<?=user()->idpersonas.'</span></code> / '.user()->nombre.' '.user()->apellidopat.' '.user()->apellidomat?></b></h4>
                                            <p class="text-muted"><?=user()->email?></p>
                                            <strong>Alumnos totales:</strong> <span class="badge badge-default"> <?=$num_tutorados?> </span> / <strong>Alumnos criticos:</strong> <span class="badge badge-danger"> <?=$tutorados_reprobados?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default waves-effect waves-light"><i class="fa fa-print"></i> Imprimir lista de alumnos</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                     <div class="form-inline m-b-20">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <ul class="list-inline chart-detail-list">
                                                    <li>
                                                        <h5><i class="fa fa-circle m-r-5" style="color: #f05050;"></i> Alumno critico</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    Filtrar por  
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value=""> Todos </option>
                                                        <option value="regular"> Regulares </option>
                                                        <option value="critico"> Criticos </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" id="demo-foo-search" name="example-input1-group2" class="form-control" placeholder=" Buscar" autocomplete="on">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn waves-effect btn-white"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="demo-foo-filtering" class="table table-hover m-0 table table-actions-bar" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th style="width:40px !important">#</th>
                                                <th style="width:100px !important"> Matricula</th>
                                                <th> Nombre</th>
                                                <th> Correo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tutorados as $key => $tutorado) { ?>
                                            <tr>
                                                <td style="display: none;"><?=$tutorado->status?></td>
                                                <td><strong><?=($key+1)?></strong></td>
                                                <td><a href="<?=base_url('tutorados/detalles/'.$tutorado->idpersonas)?>" style="color:#fff" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalles del alumno"><span class="label label-<?=$tutorado->label?>"><?=$tutorado->nocuenta?></span></a></td>
                                               <td><a href="<?=base_url('tutorados/detalles/'.$tutorado->idpersonas)?>" style="text-decoration: underline;color: #797979;"><?=$tutorado->apellidopat.' '.$tutorado->apellidomat.' '.$tutorado->nombre?></a></td>
                                               <td><?=$tutorado->email?></td>
                                               <th></th>
                                           </tr>
                                           <?php } ?>
                                       </tbody>
                                   </table>

                                   <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
</div> <!-- content -->
<!-- ========== Footer ========== -->
<?=$this->load->view('includes/footer','',TRUE)?>
<!-- ========== End Footer ========== -->
</div>

<div id="form-objetivo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"> Recuperar contraseña </h4> 
            </div> 
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <input type="text" class="form-control" id="field-3" placeholder=" Correo Electronico"> 
                        </div> 
                    </div> 
                </div> 


            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default btn-rounded waves-effect waves-light"> Solicitar</button> 
            </div> 
        </div> 
    </div>
</div><!-- /.modal -->
<!-- END wrapper -->
<script>
    var resizefunc = [];
</script>
<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
</body>
</html>