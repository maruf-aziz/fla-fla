<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	//fungsi cek login
	public function login()
	{
        check_alredy_login();
		$this->load->view('login');
	}

	//fungsi proses login
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
		{
			$this->load->model('m_auth', 'auth');
			$query = $this->auth->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'id_staff' => $row->id_staff,
					'id_region' => 1,
					'level' => $row->level
                    // 'id_jadwal' => $row->id_jadwal
                );
                $this->session->set_userdata($params);
                $level = $row->level;

				// $this->session->set_flashdata('flash','Login Berhasil');	

				if($level == 1){
					echo "<script>window.location='".site_url('index.php/c_admin')."'</script>";
				}		
				else if($level == 2){
					echo "<script>window.location='".site_url('index.php/c_barista')."'</script>";
				}
				else{
					$this->session->set_flashdata('auth','Level Tidak Diketahui');
				}                
				
			}

			else
			{
				$this->session->set_flashdata('auth','Gagal');
				echo "<script>window.location='".site_url('index.php/auth/login')."'</script>";
			}
		}	

	}

	// fungsi logout
	public function logout()
	{
		$params = array('id_staff');
		$this->session->unset_userdata($params);
		redirect(base_url('index.php/auth/login'));
	}

	public function forget_pass(){
		$this->load->view('forget_password');
	}

	public function showPass(){
		$this->load->model('m_auth', 'model');
		$username = $this->input->post('username', TRUE);
		$password = "";
		$status = "";

		$data = $this->model->get_pass($username);
		if($data->num_rows() > 0 ){
			$row = $data->row();
			$password = $row->password;
			$status = "success";
		}
		else{
			$password = "11";
			$status = "Failed";
		}
		echo json_encode(array('pass' => $password, 'status' => $status));
	}
}
