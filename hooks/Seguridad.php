<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Programacion Operativa Anual (POA)
 * Hooks / Seguridad
 *
 * Restringe el acceso al sistema
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */
class Seguridad
{
	/**
	 * Instancia del Framework
	 *
	 * @var Object
	 */
	protected $CI;

	/**
     * Inicializa las librerias requeridas
     *
     * @return	void
     */
	public function __construct()
	{
		$this->CI = get_instance();
		$this->CI->load->library('session','Alerts');
		$this->CI->load->helper('url');
	}
	// --------------------------------------------------------------------

	/**
     * Verifica la sesion creadad y las redirecciones
     *
     * @return	void
     */
	public function logged()
	{
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $this->CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $this->CI->router->method;
		//Declaramos las rutas permitidas
		$controllers 	= array('login','rest','errors');


		if($this->CI->session->userdata('logged') && $controller=='login')
			redirect();
		else if(!$this->CI->session->userdata('logged') && !in_array($controller,$controllers))
			redirect('login');
	}
	// --------------------------------------------------------------------
	
	/**
     * Verifica conexion al sii
     *
     * @return	void
     */
	public function conexion()
	{
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $this->CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $this->CI->router->method;


		if($controller=='errors' && $this->CI->session->error_db)
			redirect();
	}
	// --------------------------------------------------------------------
}
/* Final del archivo Seguridad.php 
 * Ubicacion: ./hooks/Seguridad.php
 */