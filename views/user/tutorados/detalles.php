<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Sistema de Tutorias">
            <meta name="author" content="LANI">

            
            <!-- ========== Icon  ========== -->
            <?=$this->load->view('includes/base_favicon','',TRUE)?>
            
            
            <title>Sistema de tutorias</title>
            <!-- ========== Base CSS ========== -->
            <?=$this->load->view('includes/base_css','',TRUE)?>
            <!-- ========== Menu Top  ========== -->

            </head>

        

        <body class="fixed-left">


              <?=$this->load->view('includes/menutop','',TRUE)?>
              <!-- ========== End Menu Top  ========== -->


              <!-- ========== Menu Top  ========== -->
              <?=$this->load->view('includes/menuleft','',TRUE)?>
              <!-- ========== End Menu Top  ========== -->
            <!-- Begin page -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           <div class="content-page">
                <!-- Start content -->
                <div class="content">



                    
                <div class="container">
                <!-- ========== Menu de navegacion  ========== -->
                <?=navegacion()?>
                <!-- ========== End Menu de navegacion  ========== -->
                                
                    
                    <div class="row">
                    	<div class="col-md-4">
                    		
                    		<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><center><b>Información Personal</b></center></h4>
								<div class="p-20">
									<div class="about-info-p">
                                    <center>
                                        <img src="<?=base_url('tutorados/foto/'.$tutora->idpersonas)?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    
                                        <br>
                                        <br>

                                    <i class="md-stars"><strong></i><font size="2"> Matricula </font></strong>
                                    <p class="about-info-p"><i class="md md-radio-button-on"><strong></i><font size="4"> <?=$tux->nocuenta?> </font></strong></p>
                                    </center>
                                        <strong>Nombre Completo:</strong>
                                        <br>
                                        <p class="text-muted"><i class="md md-school"></i><?='  '.$tux->nombre.' '.$tutora->apellidopat.' '.$tutora->apellidomat ?></p>
                                    </div>
                                    
                                    <div class="about-info-p">
                                        <strong>Email:</strong>
                                        <br>
                                        <p class="text-muted"><?=$tutora->email ?></p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>CURP:</strong>
                                        <br>
                                        <p class="text-muted"><?=$tutora->curp ?></p>
                                    </div>
                                    <strong>Dirección:</strong>
                                        <br>
                                        <p class="text-muted"><?='CALLE '.$tutora->callenum.', '.$tutora->colonia_v. ', '.$tutora->nom_municipio_v ?></p>
                                        <strong>Código Postal:</strong>
                                    
                                        <br>
                                        <p class="text-muted"><?=$tutora->codigopostal_v ?></p>

                                    </div>
                                    
								</div>


                                <!-- Personal-Information -->
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Materias reprobadas de Cuatrimestres anteriores</b></h4>    
                                <div class="p-20">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                    <table class="table m-0 table-striped">
                                        <thead>
                                            <tr>
                                                <center><th class="tabla-alumnos-id">Materia</th></center>
                                                <center><th class="tabla-alumnos-id">Calificación</th></center>
                                            </tr>
                                       </thead>

                                    <?php foreach ($ante as $key)  { ?>            
                                            
                                                
                                                <tbody>
                                                <tr>
                                                    <td class="tabla-alumnos-id"> <?= $key->nombre ?> </td>
                                                    <td class="tabla-alumnos-id"> <?= $key->calificacion ?> </td>
                                                </tr>
                                                </tbody>
                                                
                                    <?php  } ?>
                                              
                                            </table>

                                   

                                    </div>
                                </div>
                            </div>


							</div>
							
                        <div class="col-md-8">
                        	
                        	<div class="card-box m-t-20">
								<h4 class="m-t-0 header-title"><center><b>Calificaciones del Cuatrimestre Actual</b></center></h4>
								<div class="p-20">
									
                                        <div class="table-responsive" data-pattern="priority-columns">
                                        <table class="table table-striped m-0">
                                            <thead>

                                                <tr>
                                                    <th class="tabla-alumnos-id">Materia</th>
                                                    <th class="tabla-alumnos-id">Promedio Final</th>
                                                    <th class="tabla-alumnos-id">P1</th>
                                                    <th class="tabla-alumnos-id">P2</th>
                                                    <th class="tabla-alumnos-id">P3</th>
                                                    <th class="tabla-alumnos-id">P4</th>                              

                                                </tr>
                                                </thead>

                                                
                                                <?php foreach ($tutora->materias as $keyy => $materia) { ?>

                                                <tbody class="table table-striped">
                                                    <tr>
                                                        <td class="tabla-alumnos-id" scope="row"><?= $materia->asignatura;?></td>
                                                        

                                                        <?php
                                                            if($materia->promedio != NULL ){ ?>
                                                                <td class="tabla-alumnos-id" > <?= $materia->promedio?></td>
                                                         
                                                         <?php   }
                                                         else{
                                                            echo "<td class='tabla-alumnos-id' >No asignada </td>";
                                                         }
                                                        ?>

                                                      
                                                <!-- iterar en un foreach la variable del controlador llamada parciales
                                                y hacer un id por parcial con ayuda de la posicion de key e ir imprimiendo los campos-->

                                                <?php foreach ($pa1 as $key => $p1) {  ?>
                                                    <td class="tabla-alumnos-id"> <?= "No asignada" ?></td> 
                                                <?php  } ?>

                                                <?php foreach ($pa2 as $key => $p2) {  ?>
                                                    <td class="tabla-alumnos-id"> <?= "No asignada" ?></td>
                                                <?php  } ?>

                                                <?php foreach ($pa2 as $key => $p3) {  ?>
                                                    <td class="tabla-alumnos-id"> <?= "No asignada" ?></td>
                                                <?php  } ?>

                                                <?php foreach ($pa2 as $key => $p4) {  ?>
                                                    <td class="tabla-alumnos-id"> <?= "No asignada" ?></td>
                                                <?php  } ?>

                                                <?php  } ?>


                                                                                                           
                                                    </tr>
                                                    
                                                

                                                
                                                </tbody>

                                        </table>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <table id="demo-foo-filtering" data-page-size="10">
                                            <tbody>
                                                
                                                <tr>
                                                 <td class="tabla-alumnos-id">
                                                    <font size="3" >
                                                    <span class="label label-primary">Promedio General: <?=$tutora->promedio?></span>
                                                    </font>
                                                </td>
                                                </tr>

                                                <tr>
                                                    <center><td class="tabla-alumnos-id">
                                                    <br>
                                                    <font size="3">
                                                        <span class="label label-pink">Materias Reprobadas en este cuatrimestre: <?=$tutora->reprobadas?></span>
                                                    </font>
                                                    </center></td>
                                                </tr>
                                                


                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
								</div>
							</div>

                 	
                        	<div class="card-box">
								<h4 class="m-t-0 m-b-20 header-title"><center><b>Historial de Tutorias</b></h4></center>
								
								<div class="table-responsive">


                                    <div class="text-muted">Número de Tutoria: </div>
                                        <div class="timeline-2">
                                        <div class="time-item">
                                            <div class="item-info">
                                                <p class="text-info"><strong>Problemática tratada</strong></p>
                                                <a  class="btn btn-default btn-xs waves-effect waves-light" href="<?=base_url('tutorias/alumno/'.$tutora->idpersonas)?>"><i class="fa fa-plus"> </i> Detalles </a>
                                            </div>
                                        </div>
                                        </div>    

                                        
                                </div>
                            </div>
					            
					            
					            
					            <div class="clearfix"></div>
							</div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

              
            </div>

                <!-- ========== Footer ========== -->
                <?=$this->load->view('includes/footer','',TRUE)?>
                <!-- ========== End Footer ========== -->
            
            </div>
        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- ========== Base JS ========== -->
        <?=$this->load->view('includes/base_js','',TRUE)?>
    </body>
</html>