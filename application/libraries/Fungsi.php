<?php

Class Fungsi{

	protected $ci;

	function __construct(){
		$this->ci =&get_instance();
	}

	function user_login(){
		$this->ci->load->model('m_auth');
		$id_staff = $this->ci->session->userdata('id_staff');
		$user_data = $this->ci->m_auth->get($id_staff)->row();
		return $user_data;
	}
}

?>