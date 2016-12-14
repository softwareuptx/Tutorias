<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modulo Login
 *
 * Modulo de sessiones para el sistema
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Login extends CI_Controller
{

    /**
     * Constructor
     *
     * @return  void
     */
    function __construct()
    {
        parent::__construct();
        //Validamos la conexion al SII
        conexion_sii();
        $this->load->model('mlogin');
        
    }
    // --------------------------------------------------------------------

    /**
     * Login
     *
     * @return  void
     */
    public function index()
    {
        // Validaciones de Formulario
        $this->form_validation->set_rules('numero', 'No. de profesor', 'required|numeric');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        if( $this->form_validation->run() && $this->input->post() )
        {
            $numero     = $this->input->post('numero',TRUE);
            $password   = $this->input->post('password',TRUE);

            $this->mlogin->login($numero,$password);
            redirect();
        }
        $this->load->view('login');
    }
    // --------------------------------------------------------------------
    
    /**
     * Destrulle la session existente
     *
     * @return void
     */
    public function logout()
    {    
        // Cerramos sesion de usuario
        $this->mlogin->cerrar_sesion();
        redirect();
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Login.php 
 * Ubicacion: ./app_user/controllers/Login.php
 */