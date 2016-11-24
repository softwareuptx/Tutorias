<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTutorados extends CI_Model{


    protected $sii;

    function __construct(){
        parent::__construct();
        $this->sii = $this->load->database('sii', TRUE);
    }


    function getPeriodo(){

        $this->sii->select('idperiodo');
        $this->sii->where('actual',1);
        return $this->sii->get('periodo')->row()->idperiodo;
    }


    public function getTutorado($idpersonas){
        $this->sii->select('resultado.nocuenta,persona.idpersonas,persona.nombre,persona.apellidopat,persona.apellidomat,persona.email,resultado.idplan_estudios,fechanaci,curp,email,nom_municipio_v,colonia_v,codigopostal_v,callenum');
        $this->sii->distinct();
        $this->sii->from('tutoria, resultado, parcial, alumno, persona');
        $this->sii->where('resultado.nocuenta=tutoria.alumno_nocuenta');
        $this->sii->where('persona.idpersonas',(int)$idpersonas);
        $this->sii->where('resultado.idresultado=parcial.idresultado');
        $this->sii->where('resultado.nocuenta=alumno.nocuenta');
        $this->sii->where('alumno.idpersonas=persona.idpersonas');
        $this->sii->where('tutoria.fechafin IS NULL');
        $this->sii->where('resultado.idplan_estudios=alumno.idplan_estudios');

        $this->sii->order_by("persona.apellidopat, persona.apellidomat, persona.nombre");

        return $this->sii->get()->row();
    }

/*
    public function getAnterior($nocuenta, $idplan_estudios){
        $this->sii->select('materia.nombre as nombre, resutado.idmateria as id, max(resultado.calificacion) as calificacion, count (resultado.idmateria as reprobadas)');
        $this->sii->from('resultado, materia');
        $this->sii->where("resultado.nocuenta='$nocuenta'");
        $this->sii->where("resultado.estatus='FIRMADO'");
        $this->sii->where("materia.idmateria=r.idmateria");
        $this->sii->where("resultado.id_plan_estudios='$idplan_estudios'");

        $this->sii->group_by("resultado.idmateria");
        $this->sii->having("calificacion < 70");

        return $this->sii->get()->result();

    }//fin de getAnterior
*/

    public function getTira($nocuenta,$plan){

        $this->sii->select('materia.nombre as nombre, resultado.idmateria as id, max(resultado.calificacion) as calificacion, count(resultado.idmateria) as reprobadas');
        $this->sii->from('resultado');
        $this->sii->join('materia' , 'resultado.idmateria = materia.idmateria');
        $this->sii->where('resultado.nocuenta',(int)$nocuenta);
        $this->sii->where('resultado.estatus',"FIRMADO");
        $this->sii->where('materia.idmateria = resultado.idmateria');
        $this->sii->where('resultado.idplan_estudios',(int)$plan);
        $this->sii->group_by('resultado.idmateria');
        $this->sii->where('calificacion < 70 ');
        
        return $this->sii->get()->result();
    }  

    public function getPromedioAnt($nocuenta, $idplan_estudios){
        $this->sii->select("resultado.idmateria, resulltado.nocuenta, max(resulltado.calificacion) as cal");
        $this->sii->from("resultado, alumno, persona, materia");
        $this->sii->where("resultado.nocuenta = '$nocuenta'");
        $this->sii->where("alumno.nocuenta = resultado.nocuenta");
        $this->sii->where("alumno.idpersonas = persona.idpersonas");
        $this->sii->where("resultado.idplan_estudios = alumno.idplan_estudios");
        $this->sii->where("resultado.estatus = 'FIRMADO'");

        $this->sii->group_by("resultado.idmateria");
        $this->sii->having("max(calificacion < 70)");

        return $this->sii->get()->result();

    }

    
    public function getTutorados($idprofesor){

        $this->sii->select('resultado.nocuenta,persona.idpersonas,persona.nombre,persona.apellidopat,persona.apellidomat,persona.email,resultado.idplan_estudios,fechanaci,curp,email,telefono1');
        $this->sii->distinct();
        $this->sii->from('tutoria, resultado, parcial, alumno, persona');
        $this->sii->where('resultado.nocuenta=tutoria.alumno_nocuenta');
        $this->sii->where('tutoria.profesor_idprofesor',(int)$idprofesor);
        $this->sii->where('resultado.idresultado=parcial.idresultado');
        $this->sii->where('resultado.nocuenta=alumno.nocuenta');
        $this->sii->where('alumno.idpersonas=persona.idpersonas');
        $this->sii->where('tutoria.fechafin IS NULL');
        $this->sii->where('resultado.idplan_estudios=alumno.idplan_estudios');

        $this->sii->order_by("persona.apellidopat, persona.apellidomat, persona.nombre");

        return $this->sii->get();
    }

    public function getMaterias($idperiodo,$nocuenta){

        $this->sii->select('materia.nombre AS asignatura,grupo.idgrupo AS grupo, resultado.idmateria AS idmateria, resultado.idresultado AS idresultado, resultado.calificacion as cal ');
        $this->sii->from('grupo,resultado,materia');

        $this->sii->where('grupo.idperiodo',(int)$idperiodo);
        $this->sii->where('grupo.idgrupo=resultado.idgrupo');
        $this->sii->where('resultado.idprofesor=grupo.idprofesor');
        $this->sii->where('resultado.nocuenta',$nocuenta);
        $this->sii->where('materia.idmateria=resultado.idmateria');
        $this->sii->where('grupo.idplan_estudios=resultado.idplan_estudios');
        
        //$this->sii->where('parcial.idresultado=resultado.idresultado');

        return $this->sii->get()->result();
    }

    public function getPromedio($idresultado){

        $this->sii->select('ROUND(sum(calificacion*(porcentaje))/sum(porcentaje) ) as calificacion');
        $this->sii->from('parcial');
        $this->sii->where('idresultado',$idresultado);
        $this->sii->where('calificacion IS NOT NULL');

        return $this->sii->get()->row()->calificacion;
    }

    //parciales con calificación
    public function getUnidad($idresultado){

        $this->sii->select('calificacion, num_eval');
        $this->sii->from('parcial');
        $this->sii->where('idresultado',$idresultado);
        $this->sii->order_by("num_eval");

        return $this->sii->get()->result();
    }

    public function getP1($idresultado){
        $this->sii->select('calificacion, num_eval, idresultado');
        $this->sii->from('parcial');
        $this->sii->where('idresultado',$idresultado);
        $this->sii->where('num_eval=1');
        return $this->sii->get()->result();
    }

    public function getP2($idresultado){
        $this->sii->select('calificacion, num_eval');
        $this->sii->from('parcial');
        $this->sii->where('idresultado',$idresultado);
        $this->sii->where('num_eval=2');
        return $this->sii->get()->result();
    }



    public function getAllpromedio($nocuenta){

        $this->sii->select('(100 * (sum(parcial.calificacion * ( parcial.porcentaje/100 ))) ) / sum(parcial.porcentaje) as ponderado');
        $this->sii->from('resultado,parcial');
        $this->sii->where('resultado.nocuenta',$nocuenta);
        $this->sii->where('resultado.estatus!=',"FIRMADO");
        $this->sii->where('parcial.idresultado=resultado.idresultado');
        $this->sii->where('parcial.calificacion IS NOT NULL');
        $this->sii->group_by("parcial.idresultado");
        $this->sii->order_by("parcial.idresultado");

        return $this->sii->get();

    }
}