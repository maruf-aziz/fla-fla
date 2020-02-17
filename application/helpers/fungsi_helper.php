<?php

function check_alredy_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id_staff');
	if($user_session){
		redirect(base_url('index.php/c_barista'));
	}
}

function check_not_login()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id_staff');
	if(!$user_session){
		redirect(base_url('index.php/auth/login'));
	}
}

function check_admin()
{
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1)
	{
		redirect(base_url('index.php/c_barista'));	
	}
}

function check_user(){
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 2)
	{
		redirect(base_url('index.php/c_admin'));
	}
}

?>