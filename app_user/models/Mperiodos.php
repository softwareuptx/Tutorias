<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modelos / Modelo periodos
 *
 * Acciones para el modulo periodos
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Mperiodos extends CI_Model
{   
    /**
     * Database var
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
        $this->sii = $this->load->database('sii', TRUE);
    }
    // --------------------------------------------------------------------
    
    /**
     * Obtiene un registro en especifico
     *
     * @param   Int
     * @return  Object
     */
    public function obtener($id)
    {
        $this->sii->where('idperiodo',(int)$id);
        return $this->sii->get('periodo')->row();
    }
    // --------------------------------------------------------------------
    
    /**
     * Obtiene el periodo actual
     *
     * @return  object
     */
    public function actual()
    {
        return $this->sii->get_where('periodo',array('actual'=>1))->row();
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Mperiodos.php 
 * Ubicacion: ./app_user/models/Mperiodos.php
 */