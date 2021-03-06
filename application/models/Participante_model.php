<?php
class Participante_model extends CI_Model {

        public function __construct()
        {
			parent::__construct();
            $this->load->database();
        }
		public function get_sexo($sexo)
        {
            $query = $this->db->get_where('participante',array('sexo'=>$sexo,'sorteado'=>false,'presente'=>true));
            return $query->result_array();
        }
        public function get_all(){
            $query = $this->db->get_where('participante',array('sorteado'=>false,'presente'=>true));
            return $query->result_array();
        }
        
        public function get_ausentes(){
			$query = $this->db->get_where('participante',array('sorteado'=>false,'presente'=>false));
            return $query->result_array();
		}

        public function save($participante_id,$item,$presente,$sorteado){
            
            $this->db->where('id', $participante_id);
            $this->db->set('sorteado',$sorteado);
            $this->db->set('presente',$presente);
            $this->db->set('item',$item);
            $this->db->update('participante');
        }

        public function sorteados($sexo){
            if($sexo)
                $query = $this->db->get_where('participante',array('sorteado'=>true,'sexo'=>$sexo));
            else
                $query = $this->db->get_where('participante',array('sorteado'=>true));
            return $query->result_array();
        }
}
