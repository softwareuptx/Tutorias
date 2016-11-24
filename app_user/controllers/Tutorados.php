<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modulo Tutorados
 *
 * Modulo de Tutorados
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Tutorados extends CI_Controller
{
    function __construct(){
        parent::__construct();
        //corremos el modelo
        conexion_sii();
        $this->load->model('mtutorados');
    }
    /**
     * Lista los tutorados
     *
     * @return  void
     */
    public function index()
    {
        $this->load->database('sii', TRUE);

        //Obtenemos lista de alumnos
        $tutorados = $this->mtutorados->getTutorados(user()->idprofesor);

        $data['num_tutorados'] = $tutorados->num_rows();
        $tutorados_reprobados = 0;
        //Recorremos los tutorados
        foreach ($tutorados->result() as $key => $tuto){

            //Obtenenmos las materias de cada tutorado
            $tuto->materias = $this->mtutorados->getMaterias($this->mperiodos->actual()->idperiodo,$tuto->nocuenta); 

            if($tuto->materias){

                $tuto->reprobadas=0;

                //Si existen materias procedemos a sacar el promedio de cada materia
                foreach ($tuto->materias as $keyy => $materia){

                    //Sacamos el promedio de cada materia
                    $materia->promedio = $this->mtutorados->getPromedio($materia->idresultado);

                    //Calculamos las materias reprobadas

                    if($materia->promedio!=NULL && $materia->promedio<70)
                        $tuto->reprobadas++;
                }

                if($tuto->reprobadas>0){
                    $tutorados_reprobados++;

                    $tuto->status = 'critico';
                    $tuto->label = 'danger';
                }else{
                    $tuto->status = 'regular';
                    $tuto->label = '';
                }

                //Sacamos el promedio general
                $Allpromedio = $this->mtutorados->getAllpromedio($tuto->nocuenta);
                $numpromedio = $Allpromedio->num_rows();

                $sum = 0;
                foreach ($Allpromedio->result() as $keyy => $prom){
                    $sum = $sum + $prom->ponderado;
                }

                $tuto->promedio = round($sum/$numpromedio,2);

                $data['tutorados'][] = $tuto;
            }
        }

        $data['tutorados_reprobados'] = $tutorados_reprobados;
        $data['tutorados_porcentaje'] = ($tutorados_reprobados*100)/$data['num_tutorados'];

        $this->load->view('tutorados/listar',$data);
    }
    // --------------------------------------------------------------------
    
    public function detalles($idAlumno=NULL,$idplan_estudios=NULL){

        if(!$idAlumno)
            display_404('hola');
        
        $tutorado=$this->mtutorados->getTutorado($idAlumno);

        $data['tux'] = $tutorado;
        $tutorado->materias = $this->mtutorados->getMaterias($this->mtutorados->getPeriodo(),$tutorado->nocuenta);    



        if($tutorado->materias){

            $tutorado->reprobadas=0;
                //Si existen materias procedemos a sacar el Promedio de cada materia
            foreach ($tutorado->materias as $keyy => $materia){
                    //Sacamos el promedio general de cada materia
                $materia->promedio = $this->mtutorados->getPromedio($materia->idresultado);

                $parciales=$materia->parciales = $this->mtutorados->getUnidad($materia->idresultado);
                    //$data['par'][] = $parcial;

                    //contando las materias que el alumno reprobo en el cuatrimestre
                if($materia->promedio!=NULL && $materia->promedio<70)
                    $tutorado->reprobadas++;
                    //imprimiendo el promedio general de cada materia y por parcial
                    //echo '<br><br> '.$materia->asignatura.' '.$materia->promedio.'<br><br><hr>'.json_encode($materia->parciales);

                    //echo json_encode($parciales).'<br><br>';
                    //print_r($parciales);
                $data['par']= $parciales;

                $pa1=$materia->parciales = $this->mtutorados->getP1($materia->idresultado);
                $data['pa1']=$pa1;

                $pa2=$materia->parciales = $this->mtutorados->getP2($materia->idresultado);
                $data['pa2']=$pa2;



                    //calculando el promedio general de las materias del alumno

                $Allpromedio = $this->mtutorados->getAllpromedio($tutorado->nocuenta);
                $numpromedio = $Allpromedio->num_rows();

                $sum = 0;
                foreach ($Allpromedio->result() as $keyy => $prom){
                    $sum = $sum + $prom->ponderado;
                    }//fin de foreach promedio

                    $tutorado->promedio = round($sum/$numpromedio,2);

                    //$data['materias'] = $tutorado;
                    $data['tutora'] = $tutorado;
                    
                    

                    //echo json_encode($parcial).'<br><br>';

                    //Materias reprobadas del cuatrimestre anterior
                    /*
                    $anteriores=$this->mtutorados->getAnterior($tutorado->nocuenta,$idplan_estudios);
                    $data['ante']=$anteriores;
                    $nocuenta=$tutorado->nocuenta;
                    echo $nocuenta;
                    //$ante=$this->mtutorados->getAnterior($nocuenta);
                    //$data['ant']=$ante;

*/


                    //Materias reprobadas del cuatrimestre anterior
                    $antes = $this->mtutorados->getTira($tutorado->nocuenta, $tutorado->idplan_estudios);
                    //print_r($antes); linea para imprmir un objeto con sus atributos etc. 


                    $data['ante'] = $antes;

                }//fin de foreach tutorado

            }//fin de 

            $this->load->view('tutorados/detalles',$data);



//cuidar variables


        }


        public function foto($idpersonas){

            $imagen = $this->mlogin->getPersona($idpersonas)->imagen;
            header("Content-Type:image/jpeg");
            echo $imagen;

        }
    }
/* Final del archivo Tutorados.php 
 * Ubicacion: ./app_user/controllers/Tutorados.php
 */