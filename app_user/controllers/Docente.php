<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modulo Docente
 *
 * Modulo de docente
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Docente extends CI_Controller {

    /**
     * Constructor
     *
     * @return  void
     */
    function __construct(){
        parent::__construct();
        //Corremos el modelo
        conexion_sii();
        $this->load->model('mlogin');
    }
    // --------------------------------------------------------------------

    /**
     * Muestra la información del docente
     *
     * @return  void
     */
    public function index()
    {

    }
    // --------------------------------------------------------------------
    
    /**
     * Muestra la imagen del docente
     *
     * @return void
     */
    public function imagen()
    {    
        $imagen = User()->imagen;

        if($imagen=='' || $imagen==NULL)
        {
            $imagen = '<img src="'.images('avatar_tutorias.png').'">';
        }
        header("Content-Type:image/jpeg");
        echo $imagen;
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Docente.php 
 * Ubicacion: ./app_user/controllers/Docente.php
 */