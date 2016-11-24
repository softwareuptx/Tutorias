<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Programacion Operativa Anual (POA)
 * Controllers / Modulo Errors
 *
 * Modulo de Errores
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Errors extends CI_Controller
{
    /**
     * Muestra el error principal
     *
     * @return void
     */
    public function index()
    {

    }
    // --------------------------------------------------------------------
    
    /**
     * Muestra el error de base de datos del sii
     *
     * @return void
     */
    public function db_sii()
    {   
        $this->load->view('login_error');
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Errors.php 
 * Ubicacion: ./app_admin/controllers/Errors.php
 */