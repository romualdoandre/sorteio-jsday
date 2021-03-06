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
		$logged=$this->session->has_userdata('logado');
		if($logged){
			$this->loadView('participante/index');
		}
		else
			$this->load->view('participante/login_form');
	}

	public function login(){
		$senha=$this->input->post('password');
		if($senha=='jsday'){
			$this->session->set_userdata('logado',true);
			redirect('/participante/');
		}
		else{
			$this->load->view('participante/login_form',array('mensagem'=>'Senha incorreta'));
		}

	}

	public function logout(){
		$this->session->unset_userdata('logado');
		redirect('/participante/');
	}

	public function view($sexo=NULL){
		$data=array();
		
		if($sexo)
			$data['participantes'] = $this->participante_model->get_sexo($sexo);
		else
			$data['participantes'] = $this->participante_model->get_all();
		$data['sorteado']=array_rand($data['participantes']);
		$this->loadView('participante/list',$data);
	}

	public function save(){
		$id=$this->input->post('id');
		$item=$this->input->post('item');
		$presente=$this->input->post('presente');
		$sorteado=$this->input->post('sorteado');
		$this->participante_model->save($id,$item,$presente,$sorteado);
		$this->loadView('participante/index',array('message'=>'Salvo com sucesso!'));
	}
	
	public function ausentes(){
		$data['participantes']=$this->participante_model->get_ausentes();
		$this->loadView('participante/list_sorteados',$data);
	}

	private function loadView($viewName,$data=NULL)
	{
		$logged=$this->session->has_userdata('logado');
		if($logged){
			$this->load->view('templates/header');
			$this->load->view($viewName,$data);
			$this->load->view('templates/footer');
		}
		else
			$this->load->view('participante/login_form');
		
	}

	public function sorteados($sexo=NULL){
		$data['participantes']=$this->participante_model->sorteados($sexo);
		$this->loadView('participante/list_sorteados',$data);
	}
}
