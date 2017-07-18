<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participante extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		parent::__construct();
		$this->load->model('participante_model');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
	}		
	public function index()
	{
		$this->loadView('participante/index');
	}

	public function view($sexo=NULL){
		if($sexo)
			$data['participantes'] = $this->participante_model->get_sexo($sexo);
		else
			$data['participantes'] = $this->participante_model->get_all();
		$this->loadView('participante/list',$data);
	}

	public function save(){
		$id=$this->input->post('id');
		$this->participante_model->save($id);
		$this->loadView('participante/index',array('message'=>'Sorteado com sucesso!'));
	}

	private function loadView($viewName,$data=NULL)
	{
		$this->load->view('templates/header');
		$this->load->view($viewName,$data);
		$this->load->view('templates/footer');
	}

	public function sorteados($sexo=NULL){
		$data['participantes']=$this->participante_model->sorteados($sexo);
		$this->loadView('participante/list_sorteados',$data);
	}
}
