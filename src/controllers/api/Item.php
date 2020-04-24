<?php

require APPPATH . 'libraries/REST_Controller.php';

class Item extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index_get($id = 0){
		if(!empty($id)){
			$data = $this->db->get_where("items", ['id' => $id])->row_array();
		}else{
			$data = $this->db->get("items")->result();
		}

		$this->response($data, REST_Controller::HTTP_OK);
	}

	public fucntion index_post(){
		$input = $this->input->post();
		$this->db->insert('items', $input);

		$this->response(['Item creado con éxito'], REST_Controller::HTTP_OK);
	}

	public function index_put($id){
		$input = $this->put();
		$this->db->update('items', $input, array('id'=>$id));

		$this->respose(['Item actualizado con éxito'], REST_Controller::HTTP_OK);
	}

	public fucntion index_delete($id){
		$this->db->delete('items', array('id'=>$id));

		$this->respose(['Item eliminado con éxito'], REST_Controller::HTTP_OK);
	}
}