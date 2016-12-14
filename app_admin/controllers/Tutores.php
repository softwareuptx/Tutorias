<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modulo Tutores
 *
 * Modulo de Tutores
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Tutores extends CI_Controller
{
    /**
     * Constructor
     *
     * @return  void
     */
    function __construct(){
        parent::__construct();
        //Verificamos conexion al SII
        conexion_sii();
        $this->load->model('mdocentes');
    }
    // --------------------------------------------------------------------
    
    /**
     * Lista de tutores
     *
     * @return  void
     */
    public function index()
    {

        $this->load->view('tutores/listar');
    }
}
/* Final del archivo Tutores.php 
 * Ubicacion: ./app_user/controllers/Tutores.php
 */