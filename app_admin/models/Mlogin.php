<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modelos / Modelo Login
 *
 * Tareas necesarias para crear el login y logout del sistema
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Mlogin extends CI_Model
{
    /**
     * Instancia de base de datos
     *
     * @var Object
     */
    protected $sii;

    /**
     * Constructor
     *
     * @return  void
     */
    function __construct(){
        parent::__construct();
        //Inicialisamos la base de datos
        $this->sii = $this->load->database('sii', TRUE);
        //Inicialisamos modelos
        $this->load->model('mperiodos');
        $this->load->model('mdocentes');
    }
    // --------------------------------------------------------------------

    /**
     * Optiene el docente de la base de datos y crea la sesion
     *
     * @param   Int
     * @param   String
     * @return  void
     */
    public function login($numero,$password)
    {
        if(!$docente=$this->mdocentes->obtener($numero))
            $this->alerts->danger('login','No. de profesor incorrecto.');

        /*//Comparamos contraseña
        if ( strcasecmp(md5($password),$docente->password)!=0 )
            $this->alerts->danger('login','Contraseña incorrecta.');
        */

        //Creamos la session de docente
        $this->crear_sesion($docente,$this->mperiodos->actual()->idperiodo);
    }
    // --------------------------------------------------------------------

    /**
     * Crea la sesion en cookies
     *
     * @param   Object
     * @param   Object
     * @return  void
     */
    private function crear_sesion($docente,$periodo)
    {

        $session_data = array(
            "logged"    => TRUE,
            "usuario"   => $docente,
            "periodo"   => $periodo,
            );

        $this->session->set_userdata($session_data);
    }
    // --------------------------------------------------------------------
    
    /**
     * Cerrar la sesion en cookies
     *
     * @return  void
     */
    public function cerrar_sesion()
    {
        $this->session->unset_userdata( array('logged' => '', 'usuario' => '', 'periodo' => '') );
        $this->session->sess_destroy();
        $this->session->sess_regenerate(TRUE);
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Mlogin.php 
 * Ubicacion: ./app_user/models/Mlogin.php
 */