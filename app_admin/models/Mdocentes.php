<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Tutorias
 * Modelos / Modelo docente
 *
 * Acciones para el modulo docente
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Mdocentes extends CI_Model
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
     * Optiene un docente en especifico
     *
     * @param   Int
     * @return  Object
     */
    public function obtener($idpersonas){

        $this->sii->select('persona.idpersonas,nombre,apellidopat,apellidomat,imagen,profesor.idprofesor,grado_siglas,email,persona.profesor_activo,imagen');
        $this->sii->join('profesor','profesor.idpersonas=persona.idpersonas');
        $this->sii->where('persona.idpersonas',(int)$idpersonas);

        return $this->sii->get('persona')->row();
    }
    // --------------------------------------------------------------------
}
/* Final del archivo Mdocentes.php 
 * Ubicacion: ./app_user/models/Mdocentes.php
 */