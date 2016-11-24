<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sistema de Programacion Operativa Anual (POA)
 * Helpers / POA
 *
 * Funciones globales para el sistema
 *
 * @author Oficina de Desarrollo de Software / Universidad Politecnica de Tlaxcala
 */

/**
* Obitne el usuario logeado y valida si es correcto
*
* @return  Object
*/
if ( ! function_exists('user') )
{
	function user(){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$CI->load->library('session');
		$CI->load->model('mperiodos');
		$CI->load->model('mdocentes');

		//Validamos la sesion
		if($CI->session->userdata('logged'))
		{
			if( $usuario = $CI->mdocentes->obtener( $CI->session->userdata('usuario')->idpersonas ))
			{	
				//Obtenemos el periodo selecionado
				$usuario->periodo = $CI->mperiodos->obtener( $CI->session->userdata('periodo') );

				//Validos la clase de periodo
				if($usuario->periodo->actual==1)
				{
					$usuario->periodo->status 	= 'actual';
					$usuario->periodo->class 	= 'success';
				}else{
					$usuario->periodo->status 	= 'cerrado';
					$usuario->periodo->class 	= 'danger';
				}

				$usuario->logged = TRUE;

				return $usuario;
			}
		}
		
		$usario->logged = FALSE;
		return $usuario;
	}
}
// --------------------------------------------------------------------

/**
* Obitne el periodo activo
*
* @return  Object
*/
if ( ! function_exists('periodo') )
{
	function periodo(){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$periodo = $CI->mperiodos->actual();

		return $periodo;
	}
}
// --------------------------------------------------------------------

/**
* Obitne el menu activo
*
* @param String
* @return  Object
*/
if ( ! function_exists('menu') )
{
	function menu($menu=''){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;

		if($controller==$menu)
		{
			return 'active';
		}

		return NULL;
	}
}
// --------------------------------------------------------------------

/**
* Calcula el menu de navegacion
*
* @param 	String
* @param 	Array
* @return  	String
*/
if ( ! function_exists('navegacion') )
{
	function navegacion($titulo=NULL, $extra=array()){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$CI->load->helper('url');
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;


		$menu = '';

		//Concatenamos el menu
		$menu .= '
		<div class="row">
			<div class="col-sm-12">
				';
				if($titulo)
				{
					$menu .= '
					<h4 class="page-title">'.$titulo.'</h4>';
				}
				else if($metodo!='index')
				{
					$menu .= '<h4 class="page-title">'.ucwords($metodo).' '.ucwords($controller).'</h4>';
				}
				else
				{
					$menu .= '<h4 class="page-title">'.ucwords($controller).'</h4>';
				}

				$menu .= '
				<ol class="breadcrumb">
					<li>
						<a href="'.base_url().'">tutorias.uptlax</a>
					</li>
					';

					if($metodo=='index'){

						$menu .= '
						<li class="active">
							'.ucwords($controller).'
						</li>
						';
					}
					else
					{
						$menu .= '
						<li>
							<a href="'.base_url($controller).'">'.ucwords($controller).'</a>
						</li>
						<li class="active">
							'.ucwords($metodo).'
						</li>';
					}

					$menu .= '
				</ol>
			</div>
		</div>
		';


		return $menu;
	}
}
// --------------------------------------------------------------------

/**
* Calcula el titulo de la pagina
*
* @param 	String
* @return  	String
*/
if ( ! function_exists('title') )
{
	function title($titulo=NULL){
		
		//Instaceamos las librerias
		$CI = &get_instance();
		$CI->load->helper('url');
		
		//Obtenes la clase a la cual se esta accesando
		$controller 	= $CI->router->class;
		//Obtenes el metodo la cual se esta accesando
		$metodo 		= $CI->router->method;

		$temp = 'POA | ';

		if(!$titulo)
		{	
			if($metodo=='index')
			{
				$temp .= ucwords($controller);
			}
			else
			{
				$temp .= ucwords($metodo).' '.ucwords($controller);
			}

			$titulo = $temp;
		}



		return $titulo;
	}
}
// --------------------------------------------------------------------

/**
* Verifica la conexion al SII
*
* @return  	Void
*/
if ( ! function_exists('conexion_sii') )
{
	function conexion_sii(){

		//Librerias
		$CI = &get_instance();
		$CI->load->helper('url');
		
		$sii = $CI->load->database('sii', TRUE)->initialize();
		$CI->session->set_userdata('error_db', $sii);

		if(!$sii)
		{	
			//Cerramos la sesion de los usuarios
			$CI->session->unset_userdata( array('logged' => '', 'usuario' => '', 'periodo' => '') );
			$CI->session->sess_destroy();
			$CI->session->sess_regenerate(TRUE);
			redirect('errors/db_sii');
		}
	}
}
// --------------------------------------------------------------------