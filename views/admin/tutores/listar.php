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
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                     <div class="form-inline m-b-20">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
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
<!-- END wrapper -->
<script>
    var resizefunc = [];
</script>
<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
</body>
</html>